<?php

namespace Daw;
use PDO;
use PDOException;
use Exception;

class BasePDO {
    protected $sql;
    protected $table;
    protected $idColumn;

    public function __construct($config) {
        try {
            if (!is_array($config)) {
                throw new \PDOException("La configuración debe ser un array");
            }

            // Validar que existan todas las claves necesarias
            $required_keys = ['host', 'dbname', 'user', 'pass', 'charset'];
            foreach ($required_keys as $key) {
                if (!isset($config[$key])) {
                    throw new \PDOException("Falta la clave de configuración: $key");
                }
            }

            $dsn = sprintf(
                "mysql:host=%s;dbname=%s;charset=%s",
                $config['host'],
                $config['dbname'],
                $config['charset']
            );

            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->sql = new \PDO($dsn, $config['user'], $config['pass'], $options);
            
        } catch (\PDOException $e) {
            throw new \PDOException("Error de conexión: " . $e->getMessage());
        }
    }
}


class UsuarisPDO extends BasePDO {
    private $db;
    public function __construct($config) {
        try {
            $this->db = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
                $config['user'],
                $config['pass']
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
    }

    public function getAllEvents() {
        try {
            $stmt = $this->db->prepare("SELECT * FROM ESDEVENIMENTS");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los eventos: " . $e->getMessage());
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->db->prepare("
                SELECT id, nom, cognoms, correu_electronic, nom_usuari, 
                       rol, data_registre, ultima_connexio, imatge_perfil
                FROM usuaris 
                WHERE id = :id
            ");
            
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            throw new Exception("Error al obtener usuario: " . $e->getMessage());
        }
    }

    public function add($nom, $cognom, $email, $nom_usuari, $contrasenya) {
        try {
            // Verificar si el correo ya existe
            $checkEmail = "SELECT COUNT(*) FROM {$this->table} WHERE correu_electronic = :correu_electronic";
            $stmCheck = $this->sql->prepare($checkEmail);
            $stmCheck->execute([':correu_electronic' => $email]);
            if ($stmCheck->fetchColumn() > 0) {
                return ['error' => 'El correo ya está registrado'];
            }

            $query = "INSERT INTO {$this->table} (nom, cognom, correu_electronic, nom_usuari, contrasenya) 
                     VALUES (:nom, :cognom, :correu_electronic, :nom_usuari, :contrasenya);";
            
            $stm = $this->sql->prepare($query);
            $stm->execute([
                ':nom' => $nom,
                ':cognom' => $cognom,
                ':correu_electronic' => $email,
                ':nom_usuari' => $nom_usuari,
                ':contrasenya' => $contrasenya
            ]);
            
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['error' => 'Error al registrar usuario: ' . $e->getMessage()];
        }
    }

    public function update($id, $nom, $cognom, $email, $contrasenya) {
        $query = "UPDATE {$this->table} 
                 SET nom = :nom, cognom = :cognom, email = :email, contrasenya = :contrasenya 
                 WHERE {$this->idColumn} = :id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":nom" => $nom,
            ":cognom" => $cognom,
            ":email" => $email,
            ":contrasenya" => $contrasenya,
            ":id" => $id
        ]);
    }

    public function login($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM usuaris WHERE correu_electronic = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['contrasenya'])) {
                // Actualizar última conexión
                $this->updateLastConnection($usuario['id']);
                
                // Eliminar la contraseña antes de guardar en sesión
                unset($usuario['contrasenya']);
                
                // Guardar todos los datos necesarios en la sesión
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nom' => $usuario['nom'],
                    'cognoms' => $usuario['cognoms'],
                    'correu_electronic' => $usuario['correu_electronic'],
                    'nom_usuari' => $usuario['nom_usuari'],
                    'rol' => $usuario['rol'],
                    'data_registre' => $usuario['data_registre'],
                    'ultima_connexio' => $usuario['ultima_connexio'],
                    'imatge_perfil' => $usuario['imatge_perfil']
                ];
                
                return ['success' => true, 'usuario' => $usuario];
            }
            
            return ['error' => 'Credenciales incorrectas'];
        } catch (PDOException $e) {
            return ['error' => 'Error en el login: ' . $e->getMessage()];
        }
    }

    private function updateLastConnection($userId) {
        try {
            $stmt = $this->db->prepare("UPDATE usuaris SET ultima_connexio = NOW() WHERE id = :id");
            return $stmt->execute([':id' => $userId]);
        } catch (PDOException $e) {
            error_log("Error actualizando última conexión: " . $e->getMessage());
            return false;
        }
    }

    public function verificarCredenciales($email, $password) {
        try {
            $query = "SELECT * FROM {$this->table} WHERE correu_electronic = :email LIMIT 1";
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':email' => $email]);
            $usuario = $stmt->fetch();
    
            if ($usuario && password_verify($password, $usuario['contrasenya'])) {
                return $usuario;
            }
            
            return false;
        } catch (\PDOException $e) {
            error_log("Error al verificar credenciales: " . $e->getMessage());
            return false;
        }
    }
    

    // Método para crear un administrador
    public function createAdmin($nom, $cognom, $email, $nom_usuari, $contrasenya) {
        try {
            $query = "INSERT INTO {$this->table} (nom, cognom, correu_electronic, nom_usuari, contrasenya, rol) 
                     VALUES (:nom, :cognom, :correu_electronic, :nom_usuari, :contrasenya, 'admin')";
            
            $stm = $this->sql->prepare($query);
            $stm->execute([
                ':nom' => $nom,
                ':cognom' => $cognom,
                ':correu_electronic' => $email,
                ':nom_usuari' => $nom_usuari,
                ':contrasenya' => password_hash($contrasenya, PASSWORD_DEFAULT)
            ]);
            
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['error' => 'Error al crear administrador: ' . $e->getMessage()];
        }
    }

    public function updateProfilePhoto($userId, $fileName) {
        try {
            $query = "UPDATE {$this->table} SET imatge_perfil = :imatge_perfil WHERE id_usuari = :id_usuari";
            $stm = $this->sql->prepare($query);
            $stm->execute([
                ':imatge_perfil' => $fileName,
                ':id_usuari' => $userId
            ]);
            
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['error' => 'Error al actualizar la foto de perfil: ' . $e->getMessage()];
        }
    }

    /**
     * Verifica si un correo electrónico ya existe en la base de datos
     */
    public function emailExists($correu_electronic) {
        try {
            $query = "SELECT COUNT(*) FROM {$this->table} WHERE correu_electronic = :correu_electronic";
            $stm = $this->sql->prepare($query);
            $stm->execute([':correu_electronic' => $correu_electronic]);
            
            return $stm->fetchColumn() > 0;
        } catch (\PDOException $e) {
            // Manejar el error de manera apropiada
            error_log("Error verificando email: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Registra un nuevo usuario
     */
    public function register($nom, $cognoms, $correu_electronic, $contrasenya, $rol = 'usuario') {
        try {
            // Verificar si el correo ya existe
            if ($this->emailExists($correu_electronic)) {
                return ['error' => 'El correo electrónico ya está registrado'];
            }

            // Hash de la contraseña
            $hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);

            // Preparar la consulta
            $query = "INSERT INTO {$this->table} (nom, cognoms, correu_electronic, contrasenya, rol) 
                     VALUES (:nom, :cognoms, :correu_electronic, :contrasenya, :rol)";
            
            $stm = $this->sql->prepare($query);
            $stm->execute([
                ':nom' => $nom,
                ':cognoms' => $cognoms,
                ':correu_electronic' => $correu_electronic,
                ':contrasenya' => $hashed_password,
                ':rol' => $rol
            ]);

            return ['success' => true];
        } catch (\PDOException $e) {
            return ['error' => 'Error al registrar usuario: ' . $e->getMessage()];
        }
    }

    /**
     * Actualiza el rol de un usuario
     */
    public function updateUserRole($userId, $newRole) {
        try {
            // Validar el rol
            $validRoles = ['usuario', 'admin'];
            if (!in_array($newRole, $validRoles)) {
                return ['error' => 'Rol no válido'];
            }

            $query = "UPDATE {$this->table} SET rol = :rol WHERE id = :id";
            $stm = $this->sql->prepare($query);
            $result = $stm->execute([
                ':rol' => $newRole,
                ':id' => $userId
            ]);

            if ($result) {
                return ['success' => true];
            } else {
                return ['error' => 'No se pudo actualizar el rol'];
            }
        } catch (\PDOException $e) {
            return ['error' => 'Error al actualizar rol: ' . $e->getMessage()];
        }
    }

    /**
     * Obtiene todos los usuarios
     */
    public function getAllUsers() {
        try {
            $query = "SELECT id, nom, cognoms, correu_electronic, rol, created_at 
                     FROM {$this->table} 
                     ORDER BY created_at DESC";
            
            $stm = $this->sql->prepare($query);
            $stm->execute();
            
            return $stm->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error obteniendo usuarios: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtiene un usuario por su ID
     */
    public function getUserById($userId) {
        try {
            // Debug: Imprimir la consulta
            error_log("Consultando usuario con ID: " . $userId);
            
            $query = "SELECT id, nom, cognoms, correu_electronic, nom_usuari, 
                            rol, data_registre, ultima_connexio, imatge_perfil 
                     FROM usuaris 
                     WHERE id = :id";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id' => $userId]);
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Debug: Imprimir el resultado
            error_log("Resultado de la consulta: " . print_r($result, true));
            
            return $result;
        } catch (PDOException $e) {
            error_log("Error en getUserById: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Elimina un usuario
     */
    public function deleteUser($userId) {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stm = $this->sql->prepare($query);
            $result = $stm->execute([':id' => $userId]);

            if ($result) {
                return ['success' => true];
            } else {
                return ['error' => 'No se pudo eliminar el usuario'];
            }
        } catch (\PDOException $e) {
            return ['error' => 'Error al eliminar usuario: ' . $e->getMessage()];
        }
    }
}

class EsdevenimentsPDO extends BasePDO {
    public function __construct($config) {
        parent::__construct($config);
        $this->table = 'esdeveniments';
        $this->idColumn = 'id_esdev';
    }

    public function add($titol, $descripcio, $data, $hora, $latitud, $longitud, $imatge) {
        $query = "INSERT INTO {$this->table} (titol, descripcio, data, hora, latitud, longitud, imatge) 
                 VALUES (:titol, :descripcio, :data, :hora, :latitud, :longitud, :imatge);";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":titol" => $titol,
            ":descripcio" => $descripcio,
            ":data" => $data,
            ":hora" => $hora,
            ":latitud" => $latitud,
            ":longitud" => $longitud,
            ":imatge" => $imatge
        ]);
    }

    public function update($id, $titol, $descripcio, $data, $hora, $latitud, $longitud, $imatge) {
        $query = "UPDATE {$this->table} 
                 SET titol = :titol, descripcio = :descripcio, data = :data, 
                     hora = :hora, latitud = :latitud, longitud = :longitud, imatge = :imatge 
                 WHERE {$this->idColumn} = :id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":titol" => $titol,
            ":descripcio" => $descripcio,
            ":data" => $data,
            ":hora" => $hora,
            ":latitud" => $latitud,
            ":longitud" => $longitud,
            ":imatge" => $imatge,
            ":id" => $id
        ]);
    }

    /**
     * Obtiene el listado de todos los eventos
     * @return array
     */
    public function llistat() {
        try {
            $query = "SELECT * FROM {$this->table} ORDER BY data DESC";
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error al obtener el listado de eventos: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtiene un evento por su ID
     * @param int $id
     * @return array|null
     */
    public function getById($id) {
        try {
            $query = "SELECT * FROM {$this->table} WHERE {$this->idColumn} = :id";
            $stmt = $this->sql->prepare($query);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error al obtener el evento: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Crea un nuevo evento
     * @param array $data
     * @return bool
     */
    public function crear($data) {
        try {
            $query = "INSERT INTO {$this->table} (titol, descripcio, data, hora, imatge) 
                     VALUES (:titol, :descripcio, :data, :hora, :imatge)";
            $stmt = $this->sql->prepare($query);
            return $stmt->execute([
                'titol' => $data['titol'],
                'descripcio' => $data['descripcio'],
                'data' => $data['data'],
                'hora' => $data['hora'],
                'imatge' => $data['imatge'] ?? 'default.png'
            ]);
        } catch (\PDOException $e) {
            error_log("Error al crear el evento: " . $e->getMessage());
            return false;
        }
    }
}

class CategoriesPDO extends BasePDO {
    public function __construct($config) {
        parent::__construct($config);
        $this->table = 'CATEGORIES';
        $this->idColumn = 'id_categoria';
    }

    public function add($nom, $descripcio) {
        $query = "INSERT INTO {$this->table} (nom, descripcio) VALUES (:nom, :descripcio);";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":nom" => $nom,
            ":descripcio" => $descripcio
        ]);
    }

    public function update($id, $nom, $descripcio) {
        $query = "UPDATE {$this->table} SET nom = :nom, descripcio = :descripcio WHERE {$this->idColumn} = :id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":nom" => $nom,
            ":descripcio" => $descripcio,
            ":id" => $id
        ]);
    }
}

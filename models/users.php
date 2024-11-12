<?php

class users
{

    private PDO $sql;

    /**
     *
     * @param PDO $sql Database connection object (PDO)
     */
    public function __construct(PDO $sql)
    {
        $this->sql = $sql;
        try {
            $this->sql->query("SELECT 1"); // Ejecuta una consulta simple
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
    

    public function addAllUser($username, $surname, $name, $email, $role, $profile_img, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO USUARIS (nom, cognom, nom_usuari, correu_electronic, contrasenya, imatge_perfil, rol) 
                  VALUES (:nom, :cognom, :nom_usuari, :correu_electronic, :contrasenya, :imatge_perfil, :rol)";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":nom" => $name,
            ":cognom" => $surname,
            ":nom_usuari" => $username,
            ":correu_electronic" => $email,
            ":contrasenya" => $hashedPassword,
            ":imatge_perfil" => $profile_img,
            ":rol" => $role
        ]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error. {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function add($username, $surname, $name, $email, $role, $password)
{
    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO USUARIS (nom, cognom, nom_usuari, correu_electronic, contrasenya, rol) 
                  VALUES (:nom, :cognom, :nom_usuari, :correu_electronic, :contrasenya, :rol)";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ':nom' => $name,
            ':cognom' => $surname,
            ':nom_usuari' => $username,
            ':correu_electronic' => $email,
            ':contrasenya' => $hashed_password,
            ':rol' => $role
        ]);
        echo "Usuario registrado con éxito."; // Mensaje para confirmar éxito
        return ['success' => true];
    } catch (PDOException $e) {
        die("Error al registrar el usuario: " . $e->getMessage());
    }
}


    public function delete($id)
    {
        $query = "DELETE FROM USUARIS WHERE id_usuari = :id_usuari";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id_usuari" => $id]);  // El parámetro debe coincidir con el de la consulta

        // Manejo de errores
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            die("Error al eliminar: {$err[0]} - {$err[1]}\n{$err[2]}");
        }
    }

    public function getById($id)
    {
        $query = "select id_usuari, nom_usuari, cognoms, nom, correu_electronic, rol, imatge_perfil from USUARIS where id_usuari = :id_usuari";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id_usuari" => $id]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllUsers()
    {
        $query = "select id_usuari, nom_usuari, cognoms, nom, correu_electronic, rol, imatge_perfil from USUARIS;";
        $results = [];
        foreach ($this->sql->query($query, PDO::FETCH_ASSOC) as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function getAll()
    {
        $query = "select id_usuari, nom_usuari, cognoms, nom, correu_electronic, rol, imatge_perfil, contrasenya from USUARIS;";
        $results = [];
        foreach ($this->sql->query($query, PDO::FETCH_ASSOC) as $result) {
            $results[] = $result;
        }
        return $results;
    }

    /*public function getSession($user_id, $username, $surname, $name, $email, $role, $password)
    {
        $query = "select user_id, username, surname, name, email, role, password from users order by user_id desc limit 1;"; 
        $results = [$user_id, $username, $surname, $name, $email, $role, $password];
        foreach ($this->sql->query($query, PDO::FETCH_ASSOC) as $result) {
            $results[] = $result;
        }
        return $results;
    }*/

    // Función para hacer un update en el dashboard.
    public function update($id, $data)
    {
        $query = "UPDATE USUARIS SET 
                nom = :name, 
                cognoms = :surname, 
                nom_usuari = :username, 
                correu_electronic = :email, 
                rol = :role";

        // Añade el campo de contraseña solo si está presente
        if (!empty($data['contrasenya'])) {
            $query .= ", contrasenya = :contrasenya";
        }

        // Añade el campo de imagen solo si está presente
        if (!empty($data['imatge_perfil'])) {
            $query .= ", imatge_perfil = :imatge_perfil";
        }

        $query .= " WHERE id_usuari = :id_usuari";

        $stm = $this->sql->prepare($query);

        // Asignar valores para los parámetros obligatorios
        $params = [
            ':nom' => $data['name'],
            ':cognoms' => $data['surname'],
            ':nom_usuari' => $data['username'],
            ':correu_electronic' => $data['email'],
            ':rol' => $data['role'],
            ':id_usuari' => $id
        ];
        // Agregar `password` e `imgProfile` solo si existen en `$data`
        if (!empty($data['contrasenya'])) {
            $params[':contrasenya'] = password_hash($data['contrasenya'], PASSWORD_DEFAULT);
        }
        if (!empty($data['imatge_perfil'])) {
            $params[':imatge_perfil'] = $data['imatge_perfil'];
        }

        $stm->execute($params);
    }

    public function getUserLogin($username, $password){
        // Seleccionamos el hash de la contraseña y otros datos del usuario
        $query = "SELECT id_usuari, nom_usuari, cognoms, nom, correu_electronic, rol, contrasenya FROM USUARIS WHERE nom_usuari = :nom_usuari";
        $stm = $this->sql->prepare($query);

        // Ejecutamos la consulta solo con el nombre de usuario
        $stm->execute([":nom_usuari" => $username]);

        // Obtenemos el resultado
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        // Si el usuario existe, verificamos la contraseña
        if ($user && password_verify($password, $user['contrasenya'])) {
            // Si la verificación es exitosa, retornamos los datos del usuario
            return $user;
        }

        // Si no coincide o el usuario no existe, retornamos false
        return false;
    }



    public function lastInsertId()
    {
        return $this->sql->lastInsertId();
    }
}

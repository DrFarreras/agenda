<?php

class Users
{

    private PDO $sql;

    /**
     *
     * @param PDO $sql Database connection object (PDO)
     */
    public function __construct(PDO $sql)
    {
        $this->sql = $sql;
    }

    public function addAllUser($username, $surname, $name, $email, $role, $profile_img, $password)
    {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, surname, name, email, role, profile_img, password) VALUES (:username, :surname, :name, :email, :role, :profile_img, :password);";
        $stm = $this->sql->prepare($query);
        $stm->execute([":username" => $username, ":surname" => $surname, ":name" => $name, ":email" => $email, ":role" => $role, ":profile_img" => $profile_img, ":password" => $hashedPassword]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error. {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function add($username, $surname, $name, $email, $role, $password)
    {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, surname, name, email, role, password) VALUES (:username, :surname, :name, :email, :role, :password);";
        $stm = $this->sql->prepare($query);
        $stm->execute([":username" => $username, ":surname" => $surname, ":name" => $name, ":email" => $email, ":role" => $role, ":password" => $hashedPassword]);

        $id = $this->sql->lastInsertId();

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error. {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }


        return $id;
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE user_id = :user_id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":user_id" => $id]);  // El parámetro debe coincidir con el de la consulta

        // Manejo de errores
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            die("Error al eliminar: {$err[0]} - {$err[1]}\n{$err[2]}");
        }
    }

    public function getById($id)
    {
        $query = "select user_id, username, surname, name, email, role, profile_img from users where user_id = :user_id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":user_id" => $id]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllUsers()
    {
        $query = "select user_id, username, surname, name, email, role from users;";
        $results = [];
        foreach ($this->sql->query($query, PDO::FETCH_ASSOC) as $result) {
            $results[] = $result;
        }
        return $results;
    }

    public function getAll()
    {
        $query = "select user_id, username, surname, name, email, role, profile_img, password from users;";
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
        $query = "UPDATE users SET 
                name = :name, 
                surname = :surname, 
                username = :username, 
                email = :email, 
                role = :role";

        // Añade el campo de contraseña solo si está presente
        if (!empty($data['password'])) {
            $query .= ", password = :password";
        }

        // Añade el campo de imagen solo si está presente
        if (!empty($data['profile_img'])) {
            $query .= ", profile_img = :profile_img";
        }

        $query .= " WHERE user_id = :user_id";

        $stm = $this->sql->prepare($query);

        // Asignar valores para los parámetros obligatorios
        $params = [
            ':name' => $data['name'],
            ':surname' => $data['surname'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':role' => $data['role'],
            ':user_id' => $id
        ];
        // Agregar `password` e `imgProfile` solo si existen en `$data`
        if (!empty($data['password'])) {
            $params[':password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        if (!empty($data['profile_img'])) {
            $params[':profile_img'] = $data['profile_img'];
        }

        $stm->execute($params);
    }

    public function getUserLogin($username, $password){
        // Seleccionamos el hash de la contraseña y otros datos del usuario
        $query = "SELECT user_id, username, surname, name, email, role, password FROM users WHERE username = :username";
        $stm = $this->sql->prepare($query);

        // Ejecutamos la consulta solo con el nombre de usuario
        $stm->execute([":username" => $username]);

        // Obtenemos el resultado
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        // Si el usuario existe, verificamos la contraseña
        if ($user && password_verify($password, $user['password'])) {
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

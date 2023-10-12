<?php

namespace App\Models;

use MF\Model\Model;

class User extends Model
{

    private $id;
    private $name;
    private $email;
    private $password;
    private $created_at;
    private $updated_at;

    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    //salvar
    public function save()
    {

        $query = "insert into users(name, email, password)values(:name, :email, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':name', $this->__get('name'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':password', $this->__get('password'));
        $stmt->execute();

        return $this;
    }

    //validar se o cadastro pode ser feito
    public function validateDate()
    {

        $validate = true;
        if (strlen($this->__get('name')) < 3) {
            $validate = false;
        }
        if (!filter_var($this->__get('email'), FILTER_VALIDATE_EMAIL)) {
            $validate = false;
        }

        if (strlen($this->__get('password')) < 6) {
            $validate = false;
        }

        return $validate;
    }


    //recuperar um usuário por e-mail
    public function getUser()
    {
        $query = "select name, email from users where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //recuperar um usuário por id
    public function getUserById($id)
    {
        $query = "select name, email, password from users where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        // Verifique se a consulta foi bem-sucedida antes de buscar os resultados
        if ($stmt->execute()) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            // Trate os erros de consulta, se houver
            return false;
        }
    }

    public function authenticate()
    {
        $query = "select id, name, email from users where email = :email and password = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':password', $this->__get('password'));
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user['id'] != '' && $user['name'] != '') {
            $this->__set('id', $user['id']);
            $this->__set('name', $user['name']);
        }

        return $this;
    }
}

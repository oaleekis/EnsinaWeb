<?php

namespace App\Models;

use MF\Model\Model;

class Course extends Model
{

    private $id;
    private $name;
    private $description;
    private $category;
    private $qty_lesson;
    private $total_hours;
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

        $query = "insert into courses(name, description, category, qty_lesson, total_hours)values(:name, :description, :category, :qty_lesson, :total_hours)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':name', $this->__get('name'));
        $stmt->bindValue(':description', $this->__get('description'));
        $stmt->bindValue(':category', $this->__get('category'));
        $stmt->bindValue(':qty_lesson', $this->__get('qty_lesson'));
        $stmt->bindValue(':total_hours', $this->__get('total_hours'));
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
        if (strlen($this->__get('description') < 5)) {
            $validate = false;
        }

        if (strlen($this->__get('category')) < 5) {
            $validate = false;
        }

        return $validate;
    }

    //recuperar um curso por nome
    public function getCourse()
    {
        $query = "select name from courses where name = :name";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':name', $this->__get('name'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $query = "select id, name, description, category, qty_lesson, total_hours, created_at, updated_at from courses";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

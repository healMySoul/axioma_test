<?php

class Position extends Model
{
    public $errors = [];

    public function getList()
    {
        $sql = 'SELECT * FROM position';
        $stmt = App::$db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public function getById($id)
    {
        $id = (int) $id;
        
        $sql = 'SELECT * FROM position WHERE id = :id';
        $stmt = App::$db->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch();
    }

    public function save()
    {

    }
}

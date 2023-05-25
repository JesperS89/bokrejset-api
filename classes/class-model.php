<?php
require_once "db.php";

class Class_Model extends DB
{
  protected $table = "classes";
  public function getAllClasses()
  {
    return $this->getAll($this->table);
  }
  public function getClassById(int $id)
  {
    try {
      $query = "SELECT students.*, classes.name as class_name FROM $this->table
      JOIN students ON students.class_id = $this->table.id
      WHERE $this->table.id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

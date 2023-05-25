<?php

require_once "db.php";

class Student_Model extends DB
{
  protected $table = "students";

  public function getAllStudents()
  {
    return $this->getAll($this->table);
  }
  public function getStudentById(int $id)
  {
    try {
      $query = "SELECT * FROM $this->table where id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

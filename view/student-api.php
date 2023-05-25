<?php

class StudentAPI
{
  public function outputStudents(array $students): void
  {
    $json = [
      "student_count" => count($students),
      "result" => $students,
    ];
    header("Content-Type: application/json");
    echo json_encode($json);
  }
}

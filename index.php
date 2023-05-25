<?php
require "classes/student-model.php";
require "view/student-api.php";
require "classes/class-model.php";
$pdo = require "partials/connect.php";

$db = new DB($pdo);

$studentModel = new Student_Model($pdo);
$studentOutput = new StudentAPI();
$classModel = new Class_Model($pdo);

$students = $studentModel->getAllStudents();

if (isset($_GET["action"])) {
  $chosenAction = filter_var($_GET["action"], FILTER_SANITIZE_SPECIAL_CHARS);

  if ($chosenAction == "students") {
    $studentOutput->outputStudents($studentModel->getAllStudents());
  }
  if (strpos($chosenAction, "studentid=") === 0) {
    filter_var(
      $studentId = filter_var(
        substr($chosenAction, strlen("studentid=")),
        FILTER_SANITIZE_NUMBER_INT
      )
    );
    $studentOutput->outputStudents($studentModel->getStudentById($studentId));
  }
  if ($chosenAction == "classes") {
    $studentOutput->outputStudents($studentModel->getAllStudents());
  }

  if (strpos($chosenAction, "classId=") === 0) {
    $classId = filter_var(
      substr($chosenAction, strlen("classId=")),
      FILTER_SANITIZE_NUMBER_INT
    );
    $studentOutput->outputStudents($classModel->getClassById($classId));
  }
}

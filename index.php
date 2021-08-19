<?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, "test_php");

  // Check connection
  if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
  }
  $sql = 'SELECT id, name, 1st_grade, 2st_grade, 3st_grade,4st_grade,sc_board FROM student_data WHERE id = 3';
  $result = $conn->query($sql);
  $student = $result->fetch_array(MYSQLI_ASSOC);
  // for ($i=0; $i < $result->num_rows; $i++) { 
  //   var_dump($row);
  // }

  if ($student['sc_board'] == 0) {
    $div_num = 0;
    if ($student['1st_grade'] != NULL)
      $div_num += 1;
    if ($student['2st_grade'] != NULL)
      $div_num += 1;
    if ($student['3st_grade'] != NULL)
      $div_num += 1;
    if ($student['4st_grade'] != NULL)
      $div_num += 1;
    $total = (int)$student['1st_grade']+(int)$student['2st_grade'] + (int)$student['3st_grade'] + (int)$student['4st_grade'];
    $avarage = $total/$div_num;
    $student["avarage"] = (int)$avarage;
    $student["pass"] = false;
    if ($student["avarage"] >= 7) {
      $student["pass"] = true;
    }
  }
  else{
    $div_num = 0;
    $compare_list = array();
    if ($student['1st_grade'] != NULL)
      array_push($compare_list, (int)$student['1st_grade']);
    if ($student['2st_grade'] != NULL)
      array_push($compare_list, (int)$student['2st_grade']);
    if ($student['3st_grade'] != NULL)
      array_push($compare_list, (int)$student['3st_grade']);
    if ($student['4st_grade'] != NULL)
      array_push($compare_list, (int)$student['4st_grade']);
    if (count($compare_list) >= 2) {
      $student["avarage"] = max($compare_list);
    }    
    $student["pass"] = false;
    var_dump($student["avarage"]);
    if ($student["avarage"] > 8) {
      $student["pass"] = true;
    }
  }
  
?>
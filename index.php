<?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, "student");

  // Check connection
  if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
  }

  $id = explode('/', $_SERVER['REQUEST_URI'])[2];
  $sql = 'SELECT id, name, 1st_grade, 2st_grade, 3st_grade,4st_grade,sc_board FROM student_data WHERE id ='.$id;
  $result = $conn->query($sql);
  $student = $result->fetch_array(MYSQLI_ASSOC);
  
  $res_array = array();
  $res_array["id"] = $student['id'];
  $res_array["Name"] = $student['name'];
  
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

    
    $res_array["School_name"] = 'CSM';
    $res_array["avarage"] = (int)$avarage;
    $res_array["pass"] = false;
    if ($res_array["avarage"] >= 7) {
      $res_array["pass"] = true;
    }

    echo json_encode($res_array);
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
    
    $res_array["School_name"] = 'CSMB';
    $res_array["max_grade"] = max($compare_list);
    
    if ($res_array["max_grade"] > 8 && count($compare_list) >= 2){
      $res_array["pass"] = true;
    }
    else{
      $res_array["pass"] = false;
    }
    header("Content-type: text/xml; charset=utf-8");
    $response = '<?xml version="1.0" encoding="utf-8"?>';
    $response = $response.'<studentData><ID>'.$res_array['id'].'</ID><Name>'.$res_array['Name'].'</Name><School>'.$res_array["School_name"].'</School><Grade>'.$res_array['max_grade'].'</Grade><passStatus>'.$res_array['pass'].'</passStatus></studentData>';
    echo $response;
  }
  
?>
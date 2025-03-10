<?php
session_start();
include "crud.php";
$crud = new Crud("127.0.0.1", "root", "", "acar");

// if($crud->conn->connect_error){
//     echo "error in connection";
// }else{
//     echo "success";
// }

if(isset($_GET["registerStudent"])){

    
    // initialization of variables that were called from the client
    $email = $_POST['email'];
    $admission = $_POST['admission'];
    $password = $_POST['password'];
    $names = $_POST['names'];
    $phoneNumber = $_POST['phoneNumber'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $fetch = $crud->fetch_data("select * from students where admNo = '$admission'");

    if(count($fetch) > 0){
        echo "admission_exists";
    }else{

        // crud function to insert data in the database
        $insert = $crud->insert_data("students", ["admNo" => $admission, "courseName"=>$course, "names" => $names, "courseCode" => $course, "email" => $email, "phoneNo" => $phoneNumber, "password" => $hashed_password]);
        
        // what happens next if the insertion was successful otherwise issue a failure error
        if ($insert) {
            echo "successful";
        }else{
            echo "some error occured";
            echo $crud->conn->error;
        }
    }


    
}

if (isset($_GET['loginStudent'])){
    $admission = $_POST['username'];
    $password = $_POST['password'];
    $fetch = $crud->fetch_data("select * from students where admNo = '$admission'");
    if(count($fetch) > 0){
        if(password_verify($password,$fetch[0]["password"])){
            $_SESSION['admission'] = $fetch[0]['admNo'];
            // input other session variables here;
            echo "login_success";
        }else{
            // echo password_hash($password, PASSWORD_DEFAULT);
            echo "incorrect_password";
        }
    }else{
        echo "no_user_found";
    }
}

if (isset($_GET["addCourse"])){
    $courseCode = $_POST['course_code'];
    $courseName = $_POST['course_name'];

    $fetch = $crud->fetch_data("select * from courseRegistration where courseCode = '$courseCode'");
    if(count($fetch) > 0){
        echo "course_exist";
    }else{
        $insert = $crud->insert_data("courseRegistration", ["courseName" => $courseName, "courseCode" => $courseCode]);
        if ($insert){
            echo "success";
        }else{
            echo "some error occured ".$crud->conn->error;
        }
        
    }
}

if (isset($_GET["addUnit"])){
    $unit_code = $_POST["unit_code"];
    $unit_name = $_POST["unit_name"];
    $course = $_POST["course"];

    $fetch = crud->fetch_data("select * from unitregistration where unitCode = '$unit_code'");
    if(count($fetch) > 0){
        echo "unit_code_exist";
    }else{
        $insert = $crud->insert_data("unitregistration", ["unitName"=>$unit_name, "unitCode"=> $unit_code, "course" => $course]);
        if($insert){
            echo "successful";
        }else{
            echo "some error occured";
        }
    
    }
}


if(isset($_GET['addReminder'])){
    $unit = $_POST["unit"];
    $time = $_POST["time"];
    $venue = $_POST["venue"];
    $group = $_POST["group"];
    $day_of_the_week = $_POST["day_of_the_week"];
    $fetch = $crud->fetch_data("select * from reminders where unit = '$unit' and time='$time' and dayOfTheWeek = '$day_of_the_week'");
    if(count($fetch) > 0){
        echo "lecturers_clashing";
    }else{
        $insert = $crud->insert_data("reminders", ["unit" => $unit, "time" => $time, "venue" => $venue, "group" => $group, "dayOfThe
        week" => $day_of_the_week]);
        if($insert){
            echo "successfull";
        }else{
            echo "some_error_occured";
        }
    }
}


?>
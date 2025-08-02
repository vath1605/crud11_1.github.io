<?php 
session_start();
include 'db.php';
    if(isset($_POST['btnSubmit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if($name != '' && $email != '' && $pass != '' && $cpass != ''){
            $query_email = "SELECT * FROM tbl_user WHERE email = '$email'";
            $res_email = mysqli_query($conn,$query_email);
            if(mysqli_num_rows($res_email)>0){
                $_SESSION['msg'] = "The email was taken by someone else.";
                $_SESSION['isSuccess'] = false;
            }else{
                if($pass == $cpass){
                $query = "INSERT INTO tbl_user(name,email,pass) VALUES('$name','$email','$pass')";
                $res = mysqli_query($conn,$query);
                if($res){
                    $_SESSION['msg']= "User Information Inserted Successfully.";
                    $_SESSION['isSuccess'] = true;
                }
                }else{
                    $_SESSION['msg'] = "Password and Confirm Password is not match.";
                    $_SESSION['isSuccess'] = false;
                }
            }
        }else{
            $_SESSION['msg'] = "Please fill out all fields.";
            $_SESSION['isSuccess'] = false;
        }
        header('Location: index.php');
    }
?>
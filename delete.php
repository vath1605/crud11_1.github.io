<?php
    if(isset($_GET['deleteId'])){
        include 'db.php';
        $id = $_GET['deleteId'];
        $query_delete = "DELETE FROM tbl_user WHERE id='$id'";
        try {
            $query_delete_run = mysqli_query($conn,$query_delete);
        } catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }
        if($query_delete_run){
            header('Location: user.php');
        }
    }
?>
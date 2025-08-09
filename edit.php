<?php 
session_start();
if(isset($_GET['editId'])){
    include 'db.php';
    $id = $_GET['editId'];
    $query_select = "SELECT * FROM tbl_user WHERE id='$id'";
    try {
        $query_select_run = mysqli_query($conn,$query_select);
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }

    if(mysqli_num_rows($query_select_run)>0){
        $user = mysqli_fetch_assoc($query_select_run);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <header class="container d-flex align-items-center" style="height: 10vh;">
        <a href="user.php" class="btn btn-secondary">Back</a>
    </header>
    <main class="container d-flex align-items-center justify-content-center" style="height: 90vh;">
        <form method="post" action="edit.php" class="col-5 p-5 rounded-4 shadow my-5">
            <div class="mb-4">
                <h4 class="text-center">Update Form</h4>
                <p class="text-secondary text-center"> Update the user information form .</p>
            </div>
            <?php 
                session_start();
                if(isset($_SESSION['msg'])){
            ?>
            <div class="mb-3">
                <div class="card <?= $_SESSION['isSuccess'] ? 'bg-success' : 'bg-danger' ?> rounded-3">
                    <div class="card-body d-flex py-2 align-items-center">
                        <h6 class="text-light mt-2 fw-bold">
                            <?= $_SESSION['msg'] ?>
                        </h6>
                    </div>
                </div>
            </div>
            <?php } 
                unset($_SESSION['msg']);
                unset($_SESSION['isSuccess']);
            ?>
            <div class="mb-3">
                <label for="name" class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" value="<?= $user['name'] ?>" placeholder="Etec Center" class="form-control" name="name" id="name">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address <span class="text-danger">*</span></label>
                <input placeholder="example123@gmail.com" value="<?= $user['email'] ?>" type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password <span class="text-danger">*</span></label>
                <input placeholder="########" type="text" value="<?= $user['pass'] ?>" class="form-control" name="pass" id="pass">
            </div>
            <div class="mb-3">
                <label for="cpass" class="form-label">Confirm-Password <span class="text-danger">*</span></label>
                <input placeholder="########" type="text" class="form-control" value="<?= $user['pass'] ?>" name="cpass" id="cpass">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
        </form>
    </main>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</html>
<?php 
    if(isset($_POST['btnUpdate'])){
        include 'db.php';
        $name = $_POST['name'];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if($name != '' && $email != '' && $pass != '' && $cpass != ''){
                if($pass == $cpass){
                $query = "UPDATE tbl_user SET name='$name' , email = '$email' , pass = '$pass' WHERE id = '$id'";
                $res = mysqli_query($conn,$query);
                if($res){
                    $_SESSION['msg']= "User Information Updated Successfully.";
                    $_SESSION['isSuccess'] = true;
                }
                }else{
                    $_SESSION['msg'] = "Password and Confirm Password is not match.";
                    $_SESSION['isSuccess'] = false;
            }
        }else{
            $_SESSION['msg'] = "Please fill out all fields.";
            $_SESSION['isSuccess'] = false;
        }
        header('Location: user.php');
    }
?>
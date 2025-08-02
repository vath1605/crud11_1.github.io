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
    <header class="container">
        <nav class="navbar d-flex justify-content-center w-100">
            <ul class="w-25 bg-primary px-0 rounded-pill justify-content-evenly py-3 h-auto d-flex">
            <li class="nav-link"><a class="text-decoration-none text-light fw-bold text-uppercase active" href="index.html">Register</a></li>
            <li class="nav-link"><a class="text-decoration-none text-light fw-bold text-uppercase" href="user.html">Users</a></li>
            </ul>
        </nav>
    </header>
    <main class="container d-flex py-5 justify-content-center">
        <form method="post" action="insert.php" class="col-5 p-5 rounded-4 shadow my-5">
            <div class="mb-4">
                <h4 class="text-center">Register Form</h4>
                <p class="text-secondary text-center">Register to our service for making your days.</p>
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
                <input type="text" placeholder="Etec Center" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address <span class="text-danger">*</span></label>
                <input placeholder="example123@gmail.com" type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password <span class="text-danger">*</span></label>
                <input placeholder="########" type="password" class="form-control" name="pass" id="pass">
            </div>
            <div class="mb-3">
                <label for="cpass" class="form-label">Confirm-Password <span class="text-danger">*</span></label>
                <input placeholder="########" type="password" class="form-control" name="cpass" id="cpass">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</html>
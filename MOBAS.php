<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login MOBAS</title>
</head>
<link rel="stylesheet" href="./css/login.css">
<body>
<img src="./Gambar/Logofix.png" alt="Logo">
    <nav class="container_login">
        <div>
            <h1> MOBENG <br> Administrator</h1>
        </div>
        <div>
            <form action="#" method="post" class="kotaklogin">
                <label for="uname">Username</label><br>
                <input type="text" placeholder="Enter Your Username" id="uname" name="uname"> <br>
                <label for="pass">Password</label><br>
                <input type="password" placeholder="Enter Your Password" id="pass" name="pass"><br><br>
                <button type="submit">Login</button>
                <?php if(isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
            </form>
        </div>
    </nav>

</body>
</html>

    


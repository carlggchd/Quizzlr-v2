<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="loginPage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div class="login-container">
        <div class="photo-column">
            <img src="../../../carlRandomizer/photos/login-page-smol.jpg" alt="classroom">
        </div>
        <div class="form-column">
            <div class="loginForm">
                <h1>Student Login</h1>
                <form action="../../../carlRandomizer//main//LOGIN/login.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
     		    <p class="error-msg"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="username" placeholder="User Name"><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
                
                <div class="login-Button">
                    <a href="activateAccount.php"> <p class="activateAccount">activate your account</p> </a>
                    <button type="submit">Login</button>
                </div>
                </form>
            </div>
         </div>
    </div>
         
        
    <!-- <script src="../../../carlRandomizer/index.js"> </script> -->

<footer>
  <p>&copy; 2023 Quizzlr </p>
</footer>
</body>
</html>
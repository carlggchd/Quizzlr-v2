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
                <form>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                  <div class="login-Button">
                    <a href="activateAccount.php"> <p class="activateAccount">activate your account</p> </a>
                    <input type="button" value="Login" onclick="validateLogin()"> 
                  </div>
                <p id="error"></p>
                </form>
            </div>
         </div>
    </div>
         
        
    <script src="../../../carlRandomizer/index.js"> </script>

<footer>
  <p>&copy; 2023 Quizzlr </p>
</footer>
</body>
</html>
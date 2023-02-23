<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="activateAccount.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account-Activation</title>
</head>
<body>
  

    <header>
        <h1>Student Registration Form</h1>
      </header>
      
      <div class="container">
        <form autocomplete="off" action="../../../carlRandomizer/main/LOGIN/savetoDB/process_form.php" onsubmit="return showAlert();" method="post">
        
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>

          <label for="Fname">First Name:</label>
          <input type="text" id="Fname" name="Fname" required>

          <label for="Mname">Middle Name:</label>
          <input type="text" id="Mname" name="Mname" required>

          <label for="Lname">Last Name:</label>
          <input type="text" id="Lname" name="Lname" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
    
          <label for="phone">Phone:</label>
          <input type="tel" id="phone" name="phone" required>
    
          <label for="dob">Date of Birth:</label>
          <input type="date" id="dob" name="dob" required>  <br><br>   
          <label for="address">Address:</label>
          <textarea id="address" name="address" required></textarea>
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
    
          <button type="submit" name="submit">Submit</button>


           

        </form>
      </div>
     
    <script>
  function showAlert() {
      alert("Data sent to database, your form has been submitted!");
  }

    </script>

      <footer>
        <p>&copy; 2023 Quizzlr </p>
      </footer>
</body>
</html>
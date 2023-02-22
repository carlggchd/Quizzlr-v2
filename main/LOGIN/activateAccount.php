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
        <form action="../../../carlRandomizer/main/LOGIN/savetoDB/process_form.php" onsubmit="return showReview();" method="post">
          <label for="Fname">First Name:</label>
          <input type="text" id="Fname" name="Fname" required>

          <label for="Fname">Middle Name:</label>
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
    
          <button type="submit"  name="submit">Submit </button>


            <div id="review-section">
                <h2>Review Your Input:</h2>
                <p id="review-Fname"></p>
                <p id="review-Mname"></p>
                <p id="review-Lname"></p>
                <p id="review-email"></p>
                <p id="review-phone"></p>
                <p id="review-dob"></p>
                <p id="review-address"></p>
                <p id="review-gender"></p>
            </div>

        </form>
      </div>
     
     
    <script>

function showReview() {
  // Get the values of the input fields
  var Fname = document.getElementById("Fname").value;
  var Mname = document.getElementById("Mname").value;
  var Lname = document.getElementById("Lname").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var dob = document.getElementById("dob").value;
  var address = document.getElementById("address").value;
  var gender = document.getElementById("gender").value;

  // Set the text of the review section to the values of the input fields
  document.getElementById("review-Fname").innerHTML = "First Name: " + Fname;
  document.getElementById("review-Mname").innerHTML = "Middle Name: " + Mname;
  document.getElementById("review-Lname").innerHTML = "Last Name: " + Lname;
  document.getElementById("review-email").innerHTML = "Email: " + email;
  document.getElementById("review-phone").innerHTML = "Phone: " + phone;
  document.getElementById("review-dob").innerHTML = "Date of Birth: " + dob;
  document.getElementById("review-address").innerHTML = "Address: " + address;
  document.getElementById("review-gender").innerHTML = "Gender: " + gender;

  // Show the review section
  document.getElementById("review-section").style.display = "block";
}

    </script>

      <footer>
        <p>&copy; 2023 Quizzlr </p>
      </footer>
</body>
</html>
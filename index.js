// function for loginPage.html
function validateLogin() { 
    const studentNumber = document.getElementById("studentNumber").value;
    const password = document.getElementById("password").value;
  
    if (studentNumber === "" || password === "") {
      document.getElementById("error").innerHTML = "Please enter both student number and password";
    } else if (studentNumber === "911619" && password === "123456") {
      alert("Logged in successfully!")
      window.location.href = "../../../carlRandomizer/main/QUIZ/quizPage.php";
    } else {
      document.getElementById("error").innerHTML = "Invalid student number or password";
    }
  }

  const inputFields = document.querySelectorAll('input');
  inputFields.forEach(function(inputField) {
    inputField.addEventListener('keydown', function(event) {
      if (event.code === 'Enter' || event.code === "NumpadEnter") {
        event.preventDefault();
        validateLogin();
      }
    });
  });


  
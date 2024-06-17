function validateForm() {
	var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  
  if (name === "" || email === "" || password === "") {
    alert("Please fill in all fields");
    return false;
  }
  
  if (password.length < 8) {
    alert("Password must be 8 characters or more");
    return false;
  }
  
  return true;
}

function checkPasswordMatch() {
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("psw-repeat");
  const passwordError = document.getElementById('password-error');

  if (passwordInput.value !== confirmPasswordInput.value) {
    passwordError.textContent = 'Passwords do not match';
    confirmPasswordInput.setCustomValidity('Passwords do not match');
  } else {
    passwordError.textContent = '';
    confirmPasswordInput.setCustomValidity('');
  }
}


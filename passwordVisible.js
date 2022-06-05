function myFunction() {
  var x = document.getElementById('myPassword');
  if (x.type === 'password') {
    x.type = 'text';
    document.getElementById('passWrite').innerHTML = 'Hide Password';
  } else {
    x.type = 'password';
    document.getElementById('passWrite').innerHTML = 'Show Password';
  }
}

function signUpPass() {
  var x = document.getElementById('password');
  var y = document.getElementById('confirmPassword');
  if (x.type === 'password') {
    x.type = 'text';
    y.type = 'text';
    document.getElementById('passWriteSignUp').innerHTML = 'Hide Password';
  } else {
    x.type = 'password';
    y.type = 'password';
    document.getElementById('passWriteSignUp').innerHTML = 'Show Password';
  }
}
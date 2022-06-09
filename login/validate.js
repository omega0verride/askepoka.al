function validateLogin() {
  let username = document.getElementById('myUsername').value;
  let password = document.getElementById('myPassword').value;
  let regex = /^[a-z0-9]+$/i;

  if (!regex.test(username)) {
    document.getElementById('errorLogin').innerHTML = '<p>TESTTTT<p>';
  }

  if (password === null || password === '') {
    console.log('Password cannot be empty!');
  }

  
}

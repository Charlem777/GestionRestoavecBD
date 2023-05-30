
<template>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Authentification Professionnelle</title>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
      <div class="login-form">
        <h1>Authentification</h1>
        <form action="verification.php" method="post">
          <label for="username">Nom d'utilisateur:</label>
          <input type="text" id="username" name="username" required><br><br>
          <label for="password">Mot de passe:</label>
          <input type="password" id="password" name="password" required><br><br>
             <input type="submit" value="Se connecter">     
          
        </form>
        
      </div>
    </body>
    </html>
</template>

<script>

</script>

<style>

* {
    box-sizing: border-box;
  }
  
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 20px;
  }
  
  h1 {
    text-align: center;
    color: #333;
  }
  
  .login-form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  
  .login-form label {
    display: block;
    margin-bottom: 10px;
    color: #333;
  }
  
  .login-form input[type="text"],
  .login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .login-form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .login-form input[type="submit"]:hover {
    background-color: #555;
  }
  
  @media (max-width: 480px) {
    .login-form {
      padding: 10px;
    }
    
    .login-form input[type="text"],
    .login-form input[type="password"],
    .login-form input[type="submit"] {
      padding: 5px;
      font-size: 14px;
    }
  }
</style>
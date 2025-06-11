<?php
session_start();
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/errorHandler.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<style>
    /* Reset general */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Estilo del body */
body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f4f6f8;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
 
}


/* Contenedor del formulario */
form {
  background-color: white;
  padding: 2rem;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-top: 2rem;
}

/* Etiquetas */
label {
  font-weight: 500;
  color: #2c3e50;
}

/* Inputs */
input[type="text"],
input[type="password"] {
  padding: 0.6rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
}

/* Botón */
input[type="submit"] {
  background-color: #3498db;
  color: white;
  padding: 0.7rem;
  border: none;
  border-radius: 6px;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #2980b9;
}
#home_page {
      display: inline-block;
      margin-top: 1.5rem;
      padding: 0.75rem 1.5rem;
      background-color: #3498db;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 8px;
      transition: background-color 0.3s;
    }

/* Link de registro */
p {
  font-size: 0.9rem;
  text-align: center;
}

p a {
  color: #3498db;
  text-decoration: none;
  font-weight: 500;
}

p a:hover {
  text-decoration: underline;
}
<?php include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/estiloNav.php');?>
</style>
<body>
<header>
  <nav>
    <ul>
      <li><a href='/index.php' id='home_page'>Home</a></li>
  </ul>
  </nav>
  </header>
  <form action="signup.proc.php" method="POST">
    <label for="user_name"> Nombre de usuario</label>
    <input type="text" name="user_name" id="user_name" required>

    <label for="user_password"> Contraseña</label>
    <input type="password" name="user_password" id="user_password" required>

    <label for="user_password2"> Repetir contraseña</label>
    <input type="password" name="user_password2" id="user_password2" required>

    <?php

      if($_SESSION['user_type']=== 'admin_user'){
        echo " <select name='select'>
        <option value='common_user'> Usuario común</option>
        <option value='admin_user'> Administrador</option>
        </select>";
      }else{

        echo "<label for='user_type'>Tipo de usuario</label>
              <input type='text' name='user_type' id='user_type'  value='common_user'readOnly>";
      }
    ?>

    <input type="submit" name="submitBtn" id="submitBtn" value="Sign up">
  </form>  
</body>
</html>
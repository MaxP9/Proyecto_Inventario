
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="static/css/style.css">
  <link rel="shortcut icon" href="static/img/airam.jpeg" type="image/x-icon">
</head>

<body>

<h1 id="app"></h1>

<form  id="formu" method="POST">

  <img class="hola" src="static/img/airam.jpeg" alt="luna">

    
  <div class="container">

               
    <div class="group">
        <input  type="text" name="user" class="input-text" id="user" placeholder="   ">
        <label for="user" class="label">Numero de Documento:</label>
        <span class="line"></span>
    </div>
    
    <div class="group">
        <input type="password" name="password" class="input-text" id="password" placeholder="  ">
        <label for="password" class="label">Contraseña: </label>
        <span class="line"></span>
    </div>
  <input type="submit" class="submit" value="ingresar">
  </div>

</form>
<?php
  include('includes/seguridad.php');
  include('includes/conexion.php');
    $user=trim($_POST['user']??null);//toma el dato nombre de usuario
  $pass=trim($_POST['password']??null);//toma el dato contraseña

  //Valida si los campos no estan vacios
  if($user != '' && $pass != '' && $user != null or $pass != null){
  //  $pass=sha1(md5($pass));#Encripta la contraseña

    //Valida si el usuario y la contraseña existen en la base de datos
    $sql="SELECT * FROM usuario WHERE id_usuario='$user' and pass='$pass' ";
    $query=mysqli_query($ok,$sql);
   $row=mysqli_fetch_array($query);
   
    
    //Si el usuario existe en la base de datos se crea la variable sesion
    if($row>0){
      session_start();        
      $_SESSION['autenticado']=session_id();#Guarda el id de la sesion
      $_SESSION['identificacion']=$row[0];
      $_SESSION['user']=$row[1];
      $_SESSION['correo']=$row[2];
      $_SESSION['rol']=$row[4];

      
        header('location:php/index.php'); 
      
      exit();
    }else{
      echo "<script type='text/javascript'>MostrarAlerta('Error al iniciar sesion, usuario invalido', 'error', 'login.php');</script>";
    }
  }else{
    echo "<script type='text/javascript'>MostrarAlerta('Rellene ambos campos de texto', 'error', '../index.html');</script>";
  }
?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src='js/sweet.js'></script>  <!-- cargando la funcion para el sweet alert -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="static/js/main.js"></script>
    
</body>
</html>
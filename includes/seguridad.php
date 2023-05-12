
<?php
    session_start();

    //Recibi GET para el cierre de sesion desde un in boton
    if(isset($_REQUEST["sesion"])){
        if($_REQUEST["sesion"]=="cerrar"){
            SesionOff();
        }
    }

    //comprobamos que el usuario este autenticado
    function ComprobarSesion(){
        $valid_session = isset($_SESSION['autenticado']) ? $_SESSION['autenticado'] === session_id() : FALSE;
        if (!$valid_session ) {
            SesionOff();
            exit();
        }
    }

    //Funcion de cerrar sesion
    function SesionOff(){
        session_unset();
        session_destroy();
        header("Location:../login.php");
    }

?>







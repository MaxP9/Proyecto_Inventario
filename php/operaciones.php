<?php

$crud=$_REQUEST['crud']??null;

if($crud !='delete' && $crud !='deleteventa'&& $crud !='deletepro'&& $crud !='deleteentrada'&& $crud !='deleteusu'){
    $code=$_POST['code']??null;

$nombre_producto=$_POST['nombre'];
$cantidad=$_POST['cantidad']??null;
$costo=$_POST['costo'];
$valor=$_POST['valor'];
$id=$_POST['id'];

$id_usu=$_POST['usu'];
$nombre_usu=$_POST['Nombre'];
$correo=$_POST['correo'];
$pass=$_POST['password'];
$tipo_usu=$_POST['tipo'];

}
include('../includes/conexion.php');
if($crud == 'update'){
    $sql="UPDATE `productos` SET `Nombre`='$nombre_producto',Cantidad='$cantidad',`costo`=$costo,`valor`='$valor' WHERE id_Producto=$code ";
}elseif($crud=='delete'){
     
$code=$_GET['code']??null;

               $query=mysqli_query($ok,"SELECT * FROM elegido where id_Producto=$code");

                $row=mysqli_fetch_array($query);

if ($code==$row[0]) {
    echo  " <script>alert('el producto ya esta en circulacion,por favor editar')</script>";
    
    header('location:index.php');


}else{
    $sql = "DELETE from productos WHERE id_Producto = $code"; 

}

 }
 if($crud == 'create'){
    $sql = "INSERT INTO productos (id_Producto,Nombre, Cantidad, costo, valor) values ($id,'$nombre_producto ','$cantidad', '$costo', '$valor')";
 }
 if($crud == 'crear'){
    $sql = "INSERT INTO usuario (id_usuario,nombre, correo, pass, tipo_usu) values ($id_usu,'$nombre_usu ','$correo', '$pass', '$tipo_usu')";
 }
 if($crud=='deleteventa'){
     
    $code=$_GET['code']??null;
        $sqli = "DELETE from elegido WHERE id_elegido = $code"; 
        mysqli_query($ok,$sqli);

        header('location:venta.php');
        exit();
      
     }
     if($crud=='deletepro'){
     
        $code=$_GET['code']??null;
            $sqli1 = "   DELETE FROM `escaner` WHERE `id_Producto`=$code;
            "; 
            mysqli_query($ok,$sqli1);
    
            header('location:sumar.php');
            exit();
          
          
         }
         if($crud=='deleteentrada'){
     
            $code=$_GET['code']??null;
                $sqli2 = "   DELETE FROM `agregar_p` WHERE `id`=$code;
                "; 
                mysqli_query($ok,$sqli2);
        
                header('location:h_PRO.php');
                exit();
              
              
             }
             if($crud=='deleteusu'){
     
                $code=$_GET['code']??null;
                    $sqli2 = "   DELETE FROM `usuario` WHERE `id_usuario`=$code;
                    "; 
                    mysqli_query($ok,$sqli2);
            
                    header('location:caja.php');
                    exit();
                  
                  
                 }

   
 
   
  

mysqli_query($ok,$sql);
header('location:index.php');

?>
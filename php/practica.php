<?php
include('../includes/conexion.php');
 $items1=$_POST['id']??null;
 $items2=$_POST['cantidad']??null;
 $items3=$_POST['resultado']??null;
 $items4=$_POST['resultado-reutilizable']??null;
 $items5=$_POST['resultado-ganancia']??null;
 $items6=$_POST['nombre']??null;
 $items7=$_POST['total']??null;
 $items8=$_POST['tipo_pago']??null;
 $items9=$_POST['valor']??null;
 $items10=$_POST['usuario']??null;
 $items11=$_POST['total']??null;

 ?>

    <?php
    if( $button=$_POST['envio']??null){

    while(true){
        $item1=current($items1);
        $item2=current($items2);
        $item3=current($items3);
        $item4=current($items4);
        $item5=current($items5);
        $item6=current($items6);
        $item8=current($items8);
        $item9=current($items9);
        $item10=current($items10);
        $item11=current($items11);


       $id=(($item1 != false) ? $item1:",&nbsp;");
       $cantidad=(($item2 != false) ? $item2:",&nbsp;");
       $resultado=(($item3 != false) ? $item3:",&nbsp;");
       $resultado_reutilizable=(($item4 != false) ? $item4:",&nbsp;");
       $resultado_ganancia=(($item5 != false) ? $item5:",&nbsp;");
       $nombre=(($item6 != false) ? $item6:",&nbsp;");
       $tipo_pago=(($item8 != false) ? $item8:",&nbsp;");
       $precio=(($item9 != false) ? $item9:",&nbsp;");
       $usu=(($item10 != false) ? $item10:",&nbsp;");
       $total=(($item11 != false) ? $item11:",&nbsp;");


       $valores='('.$id.',"'.$cantidad.'","'.$resultado.'","'.$resultado_reutilizable.'","'.$resultado_ganancia.'","'.$tipo_pago.'","'.$usu.'","'.$total.'"),';
       $valoresQ=substr($valores, 0, -1);
       $sql="INSERT INTO elegido(id_Producto, cantidad_l, resultado, reutilizable, ganancia,tipo_pago,nom_usuario,total) VALUES $valoresQ";
       mysqli_query($ok,$sql);
       
       $consulta="SELECT *FROM productos where id_Producto=$id";
       $query=mysqli_query($ok,$consulta);
       $row=mysqli_fetch_array($query);
       $descontar=$row[2]-$cantidad;
       $consulta2="UPDATE productos SET Cantidad=$descontar where id_Producto=$id";
       mysqli_query($ok,$consulta2);
    
  $consulta3 = "DELETE from escaner WHERE id_Producto = $id";
  mysqli_query($ok,$consulta3);

       $item1=next($items1);
        $item2=next($items2);
        $item3=next($items3);
        $item4=next($items4);
        $item5=next($items5);
        $item6=next($items6);
        $item8=next($items8);
        $item9=next($items9);
        $item10=next($items10);
        $item11=next($items11);


       if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false && $item8 === false && $item9 === false && $item10 === false && $item11 === false )break;{
         
       
       }
       }}
     header('location:index.php');
       ?>
</body>

</html>


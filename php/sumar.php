 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../static/css/bootstrap/css/bootstrap.min.css">
        <!-- CSS personalizado --> 
        <link rel="stylesheet" href="../static/css/main.css">  
        <link rel="shortcut icon" href="../static/img/airam.jpeg" type="image/x-icon">

        <!--datables CSS básico-->
        <link rel="stylesheet" type="text/css" href="../static/css/datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->  
        <link rel="stylesheet"  type="text/css" href="../static/css/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
               
        <!--font awesome con CDN-->  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
          
 </head>
 <body>
    

 
<?php

include('../includes/seguridad.php');
 $id_usuario = $_SESSION['identificacion'];
 $nombre_usuario = $_SESSION['user'];
ComprobarSesion();


?>
<script>
                   function deletepro(cod){ /* cambiamos delete a deletedata porque delete es una palabra reservada */
                        //alert(cod);
                        //funcion para eliminar evento
                        window.location = "operaciones.php?code="+cod+"&crud=deletepro";
                    }
                    
                   function ir(){ 
                        window.location = "index.php";
                    }
                
                
    </script>
<style>
    input{
        border: none;
      
    }
    th,td{
        width: 6%;
    }
    form{
        width: 90%;
        padding: 10px;
    
    }
</style>
<?php include('../includes/conexion.php');
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

    $queri=mysqli_query($ok,"SELECT * FROM info_factura");
    $fila=mysqli_fetch_array($queri);
$fecha=date('d-m-Y H:i');
 ?>
<div class="p-3">
<div class="art  d-flex flex-column ">
<div class="d-flex justify-content-center ">
<h1 class="text-muted" onclick="ir()">Airam </a></h1>
<samp class="text-muted">Store</samp>
</div>
<div class="d-flex justify-content-between ">
    <div>fecha:<?php echo $fecha; ?></div>
<div><h6>Tel:<?php echo $fila[1] ?></h6></div>
<div><h6>Ciudad:<?php echo $fila[2] ?></h6></div>
<div><h6>Direccion:<?php echo $fila[3]  ?></h6></div>


</div>
<form method="post">
    <input name="producto" autofocus type="text" placeholder="Presionar para la lectura">
    <input type="submit" class="text-black bg-muted">
</form>

</div>
<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>
         <th>Producto</th>
        <th>Precio</th>
     
        <th>cantidad</th>
        <th>resultado de venta</th>
        <th>eliminar</th>
      
    </thead>

    <tbody>
  
<?php
include('../includes/conexion.php');


$product=$_POST['producto']??null;

if($product){
   $u="SELECT * FROM escaner ";
   $i=mysqli_query($ok,$u);
    $fila=mysqli_fetch_array($i);
    if($product==$fila[1]){
        echo"ya se registro";
    }else{
        $sql = "INSERT INTO escaner (id_Producto) values ('$product ')";
        mysqli_query($ok,$sql);
    }
}

$query=mysqli_query($ok,"SELECT e.id_Producto, p.Nombre,p.Cantidad,p.costo,p.Valor
FROM escaner AS e
LEFT JOIN productos AS p 
ON e.id_Producto = p.id_Producto 
");
while($row=mysqli_fetch_array($query)){
?>
<form action="practica.php" method="post">
        <tr>
            <td><input type="text" value="<?php echo $row[1]; ?>" name="nombre[]" readonly id=""></td>
       <input type="hidden"  name="id[]" value="<?php echo $row[0]; ?>"   >
            <td> <input  name="valor[]" value="<?php echo $row[4]; ?>" id="valor<?php echo $row[0]; ?>" readonly > </td>

         <input type="hidden" name="precio[]" value="<?php echo $row[3]; ?>" id="precio<?php echo $row[0]; ?>"  > 
          
            <td><input type="text" placeholder="ingrese cantidad" name="cantidad[]" value=""  id="canti<?php echo $row[0]; ?>"  onkeyup ="calculo(<?php echo $row[0]; ?>);" required ></td>
            <input type="hidden"  name="invent[]" value="<?php echo $row[2]; ?>"  id="invent<?php echo $row[0]; ?>" >
            
            <td><input  class="total-fila"  name="resultado[]" value="0" id="resultado<?php echo $row[0]; ?>" readonly></td>
            <input type="hidden"  name="usuario[]" value="<?php echo $nombre_usuario ?>" >

            <input type="hidden" class="total-fila-reutilizable" name="resultado-reutilizable[]" value="0" id="resultado-reutilizable<?php echo $row[0]; ?>" readonly>
           
            <input type="hidden"  class="total-fila-ganancia" name="resultado-ganancia[]" value="0" id="resultado-ganancia<?php echo $row[0]; ?>" readonly>

            <input type="hidden" class="" name="olo[]" value="" id="olo<?php echo $row[0]; ?>" readonly>
           <td> <a href="#" onclick="deletepro(<?php echo $row[0]?>);"><img src="../static/img/basura.png"  alt="delete icon" width="50px"></a></td>
        </tr>
      

<?php
}



?>
  <script>

function calculo(val){

    var cantidad = document.getElementById("canti" + val).value;



var resultadoReutilizable = document.getElementById("resultado-reutilizable" + val);
var resultadoGanancia = document.getElementById("resultado-ganancia" + val);
var resultado = document.getElementById("resultado" + val);
var precio = document.getElementById("precio" + val).value;
var valor = document.getElementById("valor" + val).value;
var invent = document.getElementById("invent" + val).value;
var totalgeneral = document.getElementById("totgen" );
var olo = document.getElementById("olo" + val);
  olo.value= invent-cantidad ;
if(cantidad < 0 ){
    alert('error');
}
else if (olo.value <0  ) {
    alert('no hay stock');
    return;

} else {
    resultado.value= cantidad *valor;
        resultadoGanancia.value= (valor - precio)* cantidad;
        resultadoReutilizable.value=precio * cantidad;
        

}

var totalesfila= document.querySelectorAll(".total-fila");
var total=0;
for (var x =0;x < totalesfila.length;  x++){
    total+= (parseInt(totalesfila[x].value)|| 0 );
}
totalgeneral.value=total;

function ensear(){
    alert('<input type="text" placeholder="ingrese cantidad" name="cambio[]" value=""  id="cabio1"  onkeyup ="calculo(1);" >')

}

}
function balance(dato){
    
    alert(dato);
    window.location = "index.php?total="+dato;
    }
</script>
<div class="  d-flex justify-content-center">
<input type="submit"  class="bg-muted text-black"  name="envio" value="enviar">
</div>
<div><h6>Forma de pago: <select name="tipo_pago[]" id="">
    <option  value="efectivo">Efectivo</option>
    <option value="tarjeta"> Tarjeta </option>
    <option value="transferencia">Transferencia</option>
</select></h6>


</div>


    </tbody>

</table>
</div>
                </div>
        </div>  
<div class=" d-flex justify-content-center text-black">
    TOTAL
    <input onkeyup="balance(value)" type="text"  name="total[]" id="totgen" readonly="true">
   
</div>

</form>
</div>
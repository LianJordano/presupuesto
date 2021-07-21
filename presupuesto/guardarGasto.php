<?php 

session_start();
require_once("config/conexion.php");

$id_usuario=$_POST["id_usuario"];
$id_presupuesto=$_POST["id_presupuesto"];
$descripcion=$_POST["descripcion"];
$valor=$_POST["valor"];
$fecha=$_POST["fecha"];

$sql = "INSERT INTO gastos (gas_descripcion,gas_valor,gas_usu_id,gas_pre_id,gas_fecha) VALUES ('$descripcion','$valor','$id_usuario','$id_presupuesto','$fecha')";

$resultado = mysqli_query($conexion,$sql);
if($resultado){
    header("location:misPresupuestos.php?id=$id_presupuesto");
}

?>
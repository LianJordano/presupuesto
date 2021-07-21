<?php 
    session_start();
    require_once("config/conexion.php");

    $presupuesto = $_POST["presupuesto"];
    $fecha = $_POST["fecha"];
    $id_usu = $_SESSION["usuario"]["usu_id"];

    $sql = "INSERT INTO presupuestos (pre_valor,pre_fecha,pre_usu_id) VALUES ($presupuesto,'$fecha', $id_usu) ";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        header("location:presupuesto.php");
    }


?>
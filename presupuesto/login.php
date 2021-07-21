<?php 
session_start();
    require_once("config/conexion.php");

    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE usu_correo='$correo' AND usu_password='$password' ";

    $resultado = mysqli_query($conexion,$sql);
    $conteo = mysqli_num_rows($resultado);
    if($conteo>0){
        $_SESSION["usuario"] = mysqli_fetch_assoc($resultado);
        header("location:presupuesto.php");
    }
  
?>
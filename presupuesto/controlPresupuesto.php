<?php 
require_once("config/conexion.php");


if(isset($_POST["presupuesto"]) && isset($_POST["editar"])){
    var_dump($_REQUEST);
    $presupuesto = $_POST["presupuesto"];
    $id = $_POST["id"];
    $sql = "UPDATE presupuestos SET pre_valor='$presupuesto' WHERE pre_id='$id'";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        header("location:presupuesto.php");
    }

}

if(isset($_GET["id"]) && $_GET["a"]=="eliminar"){
    $id =$_GET["id"];
    $sql = "DELETE FROM presupuestos WHERE pre_id='$id'";
    $resultado = mysqli_query($conexion,$sql);
    if($resultado){
        header("location:presupuesto.php");
    }
}
?>
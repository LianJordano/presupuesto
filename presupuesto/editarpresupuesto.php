<?php 
   session_start();
   require_once("config/conexion.php");
    $id=$_POST["a"];
    $sql = "SELECT pre_valor FROM presupuestos WHERE pre_id='$id'";
    $presupuesto = mysqli_query($conexion,$sql);
    $presupuesto = mysqli_fetch_assoc($presupuesto);


?>

<!-- Button trigger modal -->

<div style="background-color: #ccc;padding:10px">
    <form action="controlPresupuesto.php" method="post" autocomplete="off">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="form-group">
          <label for="" class="font-weight-bold text-center" style="display: block;">Presupuesto</label>
          <input type="text"
            class="form-control" name="presupuesto" value="<?=$presupuesto["pre_valor"]?>" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="row">
        <button type="submit" name="editar" style="width: 90%; margin-left:15px" class="d-block btn btn-success mb-2">Editar</button>
        <a href=""id="cerrarEditar" style="width: 90%; margin-left:15px" class="btn btn-info">Cerrar</a>
        </div>
    <form>
</div>
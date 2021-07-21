<?php 
require_once("template/cabecera.php");
?>



<div class="container">
<div style="position: fixed; top:-2%">
  <h3 style="color:green">Bienvenido/a, <?=$_SESSION["usuario"]["usu_nombre"]." ".$_SESSION["usuario"]["usu_apellidos"]?> </h3>
  <p><span style="color:purple;position:absolute" id="hora"></span></p>
</div>
    <div class="card p-4" style="border-radius: 25%; margin:5% auto">
        <h2 class="text-center">Mi presupuesto</h2>
        <div class="card-body">
            <form action="crearPresupuesto.php" method="post" autocomplete="off" >

            <div class="row">
                <div class="form-group col-6">
                  <label for="">Presupuesto</label>
                  <input type="number" class="form-control" name="presupuesto" id="" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group  col-6">
                  <label for="">Fecha</label>
                  <input type="date" class="form-control" name="fecha" id="" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; border-bottom-left-radius: 20px;border-bottom-right-radius: 25px;">Crear presupuesto</button>

            </form>
           
        </div>
    </div>


      <?php 
        require_once("config/conexion.php");
        $id=$_SESSION["usuario"]["usu_id"];
        $sql = "SELECT * FROM presupuestos WHERE pre_usu_id=$id";
        $presupuestos = mysqli_query($conexion,$sql);
        $conteo = mysqli_num_rows($presupuestos);
      ?>

    <table class="table" id="mytable" style="margin-top: -5%;" data-page-length='4' >
      <thead>
        <tr>
          <th>Presupuesto</th>
          <th>Fecha</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php while($presupuesto = mysqli_fetch_assoc($presupuestos)): ?>
        <tr>
          <td style="width:30%;">$ <?=number_format($presupuesto["pre_valor"],0)?></td>
          <td style="width:30%;"><?=$presupuesto["pre_fecha"]?></td>
          <td style="width:30%;">
            <a href="misPresupuestos.php?id=<?=$presupuesto["pre_id"]?>" class="btn btn-info">Ir a presupuesto</a>
            <a href="#" onclick="editar(<?=$presupuesto['pre_id']?>)" class="btn btn-warning">Editar</a>
            <a href="controlPresupuesto.php?id=<?=$presupuesto["pre_id"]?>&a=eliminar" onclick="return confirm('¿Desea eliminar el presupuesto?')" class="btn btn-danger">Eliminar</a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
      
    <?php if($conteo<1):?>
      <h2 class="text-center mt-4 text-danger">*** No hay presupuestos creados ***</h2>
      <span style="border-bottom: 1px solid red; display:block;width:100%;"></span>
    <?php endif;?>
</div>

<div id="modal-editar" style="width: 300px;height:auto;position:fixed;bottom:60%;left:40%">

</div>
<script>
  
 $(document).ready(function () {

  function dameHora(){
    let tiempo = new Date();
    let hor = tiempo.getHours();
    let min = tiempo.getMinutes();
    let sec = tiempo.getSeconds();
    if(hor<10){
      hor="0"+hor;
    }
    if(min<10){
      min="0"+min;
    }
    if(sec<10){
      sec="0"+sec;
    }
    let horaActual = hor + ":" + min +":"+ sec;
    return horaActual;
  }
  setInterval(() => {
    let hora = dameHora();
    let spanh = document.getElementById("hora");
    spanh.innerText=hora;
  }, 1000);
   
 });

function editar(a){

  $.ajax({
    type: "POST",
    url: "editarpresupuesto.php",
    data: {a},
    success: function (response) {
        $("#modal-editar").html(response)     
    }
  });
  
}

$("#cerrarEditar").click(function (e) { 
  e.preventDefault();
  $("#modal-editar").empty();
});


    $('#mytable').DataTable( {
        "pagingType": "full_numbers"
    } );


</script>


  
</head>


<script>$(document).ready(function () {
        $('#mytable').DataTable();
    });</script>

<?php
require_once("template/pie.php");
?>
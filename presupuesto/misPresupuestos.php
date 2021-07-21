<?php
require_once("template/cabecera.php");
require_once("config/conexion.php");
$usuario = $_SESSION["usuario"]["usu_id"];
$presupuesto = $_GET["id"];
$sql = "SELECT * FROM gastos WHERE gas_usu_id='$usuario' AND gas_pre_id='$presupuesto' ";
$resultado = mysqli_query($conexion,$sql);
$conteo = mysqli_num_rows($resultado);
$sql2 = "SELECT * FROM presupuestos WHERE pre_id='$presupuesto'";
$resultado2 = mysqli_query($conexion,$sql2);
$resultado2 = mysqli_fetch_assoc($resultado2);
$presupuestoActual = $resultado2["pre_valor"];
?>


<a href="presupuesto.php">Volver</a>
<div class="container">

    <div class="row">

        <div class="col-4">
            <h2 class="mb-4 text-center">Mis gastos</h2>

            <form action="guardarGasto.php" action="" method="POST">
                <div class="card p-4">
                <input type="hidden" name="id_usuario" value="<?=$_SESSION["usuario"]["usu_id"]?>">
                <input type="hidden" name="id_presupuesto" value="<?=$_GET["id"]?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Gasto</label>
                                <input type="text" class="form-control" name="descripcion" required  id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Valor</label>
                                <input type="number" class="form-control" name="valor" required id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" name="fecha" id=""  required aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-success" value="Registrar gasto" >
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-8">
            <h2 class="text-center">Mi Presupuestos</h2>
            <h3 class="text-center">$<?=$resultado2["pre_valor"]?></h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Gasto</th>
                            <th>Valor</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $restante=0; ?>
                        <?php while($gasto = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?=$gasto["gas_descripcion"]?></td>
                            <td><?=$gasto["gas_valor"]?></td>
                            <td><?=$gasto["gas_fecha"]?></td>
                            <?php 
                                $restante+=$gasto["gas_valor"];
                            ?>
                        </tr>
                        <?php 
                        ?>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <td colspan="1">
                              <b>Restante</b>
                            </td>
                            <td>
                            <?php   
                                    echo $presupuestoActual-$restante;
                                ?>
                            </td>
                        </tr>
                    </tfoot>

                </table>

                <?php if($conteo<1): ?>
                        <h2 class="text-center mt-4 text-danger">*** No hay gastos creados ***</h2>
                        <span style="border-bottom: 1px solid red; display:block;width:100%;"></span>
                    <?php endif; ?>
        </div>
    </div>


</div>



<?php
require_once("template/pie.php");
?>
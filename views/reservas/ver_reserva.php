
    <div class="row d-flex- align-items-center">
        <div class="col-12 col-sm-12 col-md-5">
            <h3 class="titulo">Realizar reservas</h3>
        </div>

        <?php if(isset($_SESSION['eliminar_asistencia'])): ?>
        <div class="col-12 col-sm-12 col-md-7">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Asistencia Eliminada</strong> :(
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
        <?php Utilidad::eliminarSeccion('eliminar_asistencia') ?>
        <?php endif; ?>
    </div>

    <div class="combo row">
        <!-- <div class="col-12 col-sm-7 col-md-6">
            <label for="filtro">Filtrar por:</label>
            <select name="filtro" id="cmb-filtro" class="form-control">
                <option value="lab">Laboratorio</option>
                <option value="hor">Hora inicio</option>
            </select>
        </div> -->
        <div class="col-12 col-sm-5 col-md-6">
            <!-- Dinamico -->
            <!-- <label for="opcion">Opciones</label>
            <select name="opcion" id="cmb-opcion" class="form-control">
                <option value="lab-1">Laboratorio 1</option>
                <option value="lab-2">Laboratorio 2</option>
            </select> -->
        </div>
    </div>
    
    <table class="table table-sm table-hover">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">Tema</th>
            <th class="tabla-ponente" scope="col">Ponente</th>
            <th scope="col">Inicio</th>
            <th scope="col">Estado</th>
            <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>

        <?php while($item = $detalles->fetch_object()): ?>

        <?php if($item->estado == 'confirmado'): ?>
        <tr>
        <?php else:?>
        <tr class="table-warning">
        <?php endif; ?>
                <!-- <th scope="row"><?=$item->id?></th> -->
                <td><?=$item->tema?></td>
                <td class="tabla-ponente"><?=$item->ponente?></td>
                    <td><?=$item->inicio?></td>
                    <td><?=$item->estado?></td>
                <td>
                    <button class="btn btn-danger delete-reserva">
                        <a href="<?=base_url?>asistencia/eliminarAsistencia?id_usu=<?=$usuario->usu_id?>&id_asis=<?=$item->id_asis?>"><i class="icon-cancel"></i></a>
                    </button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table> 
    
</div>

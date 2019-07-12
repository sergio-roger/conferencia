<?php
//var_dump($detalles->fetch_object());
//die();
?>
    <h3 class="titulo">Realizar reservas</h3>

    <div class="combo row">
        <div class="col-12 col-sm-7 col-md-6">
            <label for="filtro">Filtrar por:</label>
            <select name="filtro" id="cmb-filtro" class="form-control">
                <option value="lab">Laboratorio</option>
                <option value="hor">Hora inicio</option>
            </select>
        </div>
        <div class="col-12 col-sm-5 col-md-6">
            <!-- Dinamico -->
            <label for="opcion">Opciones</label>
            <select name="opcion" id="cmb-opcion" class="form-control">
                <option value="lab-1">Laboratorio 1</option>
                <option value="lab-2">Laboratorio 2</option>
            </select>
        </div>
    </div>
    
    <table class="table table-sm table-hover">
        <thead class="thead-dark">
            <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">Tema</th>
            <th scope="col">Ponente</th>
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
                <!-- <th scope="row">1</th> -->
                <td><?=$item->tema?></td>
                <td><?=$item->ponente?></td>
                    <td><?=$item->inicio?></td>
                    <td><?=$item->estado?></td>
                <td>
                    <button class="btn btn-danger">
                        <i class="icon-cancel"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table> 
    
</div>

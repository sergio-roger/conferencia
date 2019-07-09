
        <div class="row d-flex align-items-center">
            <div class="col-12 col-md-6">
                <h3 class="titulo">Realizar reservas</h3>
            </div>
            <!-- Dinámico -->
            <div class="col-12 col-md-6 ">
                <!-- <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Asistencia Confirmada</strong> Correcto
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
            </div>
        </div>

        <!-- <?=var_dump($conferencias);?> -->
    
        <div class="combo row">
            <div class="col-12 col-sm-7 col-md-6">
                <div class="form-group">
                    <label for="filtro">Filtrar por:</label>
                    <select name="filtro" id="cmb-filtro" class="form-control">
                        <option selected value="lab">Lugar</option>
                        <option value="hor">Hora inicio</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-5 col-md-6">
                <!-- Dinamico -->
                <div class="form-group">
                    <label for="opcion">Opciones</label>
                    <select name="opcion" id="cmb-opcion" class="form-control">
                        <option value="lab-1">Laboratorio 1</option>
                        <option value="lab-2">Laboratorio 2</option>
                    </select>
                </div>
            </div>
        </div>

        <table class="table table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tema</th>
                <th scope="col" class="tabla-cupo">Cupos</th>
                <th scope="col" class="tabla-ponente">Ponente</th>
                <th scope="col">Inicio</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>

            <?php while($conf = $conferencias->fetch_object()): ?>
                <tr>
                    <th scope="row"><?=$conf->id?></th>
                    <td><?=$conf->tema?></td>
                    <td class="tabla-cupo"><?=$conf->disponible?></td>
                    <td class="tabla-ponente"><?=$conf->ponentes?></td>
                    <td><?=$conf->hora?></td>
                    <td>
                        <button class="asistir">
                         <a href="<?=base_url?>asistencia/guardar?id=<?=$conf->id?>">
                             Asistir <i class="icon-ok"></i>
                         </a>
                            <!-- Ejecutar un método para hacer una reserva o asistencia -->
                            <?php
                                // $asistencia = new AsistenciaController();
                                // $asistencia->index();
                            ?>
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>

            </tbody>
        </table>      
    </div>

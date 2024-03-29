
        <div class="row d-flex align-items-center">
            <div class="col-12 col-md-5">
                <h3 class="titulo">Realizar reservas</h3>
            </div>
            <!-- Dinámico -->
            <div class="col-12 col-md-7 ">

                <?php if(isset($_SESSION['alerta'])): ?>
                <div class="alert <?=$_SESSION['alerta']?> alert-dismissible fade show" role="alert">
                    
                    <?php
                        switch($_SESSION['alerta']){                            
                            case 'alert-success': 
                                echo 'Asistencia confirmada <br><strong>Correcto</strong>';
                            break;

                            case 'alert-warning':
                                if(isset($_SESSION['prioridad'])){
                                    echo 'Asistencia Pendiente <strong>Prioridad '.$_SESSION['prioridad'].'</strong>';
                                    echo '<br>Si al momento de la conferencia alguien faltase, usted tendra la posibilida
                                    de ingresar según su prioridad';
                                }
                            break;

                            case 'alert-danger':
                                echo 'Asistencia fallida <br><strong>No hay cupos Disponibles</strong>';
                            break;
                        } 
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <?php 
                            Utilidad::eliminarSeccion('alerta');
                        ?>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    
        <div class="combo row">
            <div class="col-12 col-sm-7 col-md-6">
                <!-- <div class="form-group">
                    <label for="filtro">Filtrar por:</label>
                    <select name="filtro" id="cmb-filtro" class="form-control">
                        <option selected value="lab">Lugar</option>
                        <option value="hor">Hora inicio</option>
                    </select>
                </div> -->
            </div>
            <div class="col-12 col-sm-5 col-md-6">
                <!-- Dinamico -->
                <!-- <div class="form-group">
                    <label for="opcion">Opciones</label>
                    <select name="opcion" id="cmb-opcion" class="form-control">
                        <option value="lab-1">Laboratorio 1</option>
                        <option value="lab-2">Laboratorio 2</option>
                    </select>
                </div> -->
            </div>
        </div>

        <table class="table table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tema</th>
                <th scope="col" class="tabla-cupo">Cupos</th>
                <th scope="col" class="tabla-ponente">Ponente</th>
                <th scope="col">Sala</th>
                <th scope="col">Inicio</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>

            <?php for($i = 0; $i < count($lista); $i++): ?>
                    <tr>
                        <th scope="row"><?=($i+1)?></th>
                        <td><?=$lista[$i]->tema?></td>
                        <td class="tabla-cupo"><?php
                            if($lista[$i]->disponible >= 0)
                                echo $lista[$i]->disponible;
                            else {
                                echo '0';
                            }
                        ?></td>
                        <td class="tabla-ponente"><?=$lista[$i]->ponentes?></td>
                        <td><?=$lista[$i]->lugar?></td>
                        <td><?=$lista[$i]->hora?></td>
                        <td>

                        <?php if($lista[$i]->id == 0): ?>
                        <button class="asistir d-none" >
                            <a href="<?=base_url?>asistencia/guardar?id=<?=$lista[$i]->id?>" class="" 
                            id="aisitir-<?php echo 'ok' ?>">
                                Asistir <i class="icon-ok"></i>
                            </a>
                                <!-- Ejecutar un método para hacer una reserva o asistencia -->
                                <?php
                                    // $asistencia = new AsistenciaController();
                                    // $asistencia->index();
                                ?>
                            </button>
                        <?php else: ?>
                        <button class="asistir" >
                            <a href="<?=base_url?>Asistencia/guardar?id=<?=$lista[$i]->id?>" class="" 
                            id="aisitir-<?php echo 'ok' ?>">
                                Asistir <i class="icon-ok"></i>
                            </a>
                                <!-- Ejecutar un método para hacer una reserva o asistencia -->
                                <?php
                                    // $asistencia = new AsistenciaController();
                                    // $asistencia->index();
                                ?>
                            </button>
                        <?php endif; ?>
                        </td>
                    </tr>
            <?php endfor; ?>
            </tbody>
        </table>      
    </div>

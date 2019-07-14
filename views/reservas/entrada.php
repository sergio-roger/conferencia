
<!-- <?php 
        if(isset($_SESSION['nombres']))

?> -->

<?php if(isset($_SESSION['registro']) && $_SESSION['registro'] == 'completo'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registro completado</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>

<?php endif; ?>

<?php  Utilidad::eliminarSeccion('registro'); ?>


<h3 class="titulo">Bienvenido</h3>              <!---Comienzo del contenido central -->

        <?php if(isset($_SESSION['indetificado'])): ?>
                 <span>ID: <?=$_SESSION['indetificado']->usu_id?></span>
                <h5 class="usuario-nombre"><?=$_SESSION['indetificado']->usu_nombre?>   <?=$_SESSION['indetificado']->usu_apellido?></h5>
        <?php elseif(isset($_SESSION['usuario'])) : ?>
                <span>ID: <?=$_SESSION['usuario']->usu_id?></span>
                <h5 class="usuario-nombre"><?=$_SESSION['usuario']->usu_nombre?> <?=$_SESSION['usuario']->usu_apellido?></h5>
        <?php endif;?>

        <?php if(isset($asistidas)): ?>
                <p>N° Reservas: <strong class=""><?=$asistidas->num_rows?></strong></p>
        <?php else: ?>
                <p>N° Reservas: <span>0</span></p>
        <?php endif; ?>

        <hr class="separador-entrada">

        <div class="">
                <div class="ubicacion">
                        <div class="row ">
                                <div class="col-12 sm-6 col-md-6">
                                   <h3>Cronograma</h3>
                                </div>
                                <div class="col-12 sm-6 col-md-6 d-flex justify-content-md-end
                                justify-content-sm-start">
                                <a href="https://drive.google.com/file/d/1ep9ZWguzBbWMRlYZ1G6GmCOaiHHWtHp7/view?usp=sharing"
                                 target="_blank" class="ver-todas btn btn-danger color-white">Ver Cronograma de Actividades</a>
                                </div>
                        </div>
                        <h3 class="pb-2">Ubicacion</h3>
                        <img src="<?=base_url?>assets/img/img-ubicacion.png" 
                        alt="">
                </div>
        </div>
</div>



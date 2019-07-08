
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
                <h5><?=$_SESSION['indetificado']->usu_nombre?>   <?=$_SESSION['indetificado']->usu_apellido?></h5>
        <?php elseif(isset($_SESSION['nombres'])): ?>
                <h5><?=$_SESSION['nombres']?></h5>
        <?php endif;?>

        <p>N° Reservas <span>12</span></p>
</div>

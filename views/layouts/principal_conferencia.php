<?php 
    // var_dump($_POST['conferencias']);

    // while($conf =  $_POST['conferencias']->fetch_object()){
    //     echo $conf->tema.'<br>';
    // }
?>
            <div class="titulo text-center">
                <h2>Conferencias</h2>
            </div>

            <div class="contenido-conferencias">
                <div class="row">
                <?php while($conf =  $_POST['conferencias']->fetch_object()): ?>
                    <div class="col-12 col-sm-6 col-md-4 conferencia-caja dest">
                        <h3><?=$conf->tema?></h3>
                        <!-- <p>El IoT consiste en la expansión de las redes de datos, o la conectividad 
                        avanzada de casi toda clase de dispositivos, desde videoconsolas a vehículos de 
                        motor o electrodomésticos.</p> -->
                        <div class="conferencia-detalle">
                            <p><span></span><?=$conf->area?></p>
                            <p><span></span><?=$conf->ponentes?></p>
                            <p><span></span><?=$conf->lugar?></p>
                            <p><span></span><?=$conf->hora?></p>
                        </div>

                        <button class="btn btn-primary btn-reservar"> Reservar</button>
                        <button class="btn btn-dark">Mas info</button>
                    </div>   
            <?php endwhile; ?>

            </div>
        </div>
    </section>
    <!-- Seccion de conferencias -->

    <!-- banner -->
    <section class="banner">
        <div class="banner-envoltorio">
            <div class="container banner-caja d-flex align-items-center justify-content-around">
                <h3>III  Ciclo de conferencias <span>MDLC</span> <sup>2</sup></h3>
                <a href="#" class="ver-todas btn btn-danger color-white">Ver todas</a>
            </div>
        </div>
    </section>
<!-- Seccion conferencias -->
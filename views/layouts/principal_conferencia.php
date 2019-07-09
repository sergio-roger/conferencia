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
                    <div class="col-12 col-sm-6 col-md-4 conferencia-caja dest 
                    d-flex flex-column justify-content-center  align-items-center">
                    
                        <h3><?=$conf->tema?></h3>
                        <!-- <p>El IoT consiste en la expansión de las redes de datos, o la conectividad 
                        avanzada de casi toda clase de dispositivos, desde videoconsolas a vehículos de 
                        motor o electrodomésticos.</p> -->
                        <div class="conferencia-detalle">
                            <div>
                                <i class="icon-tags"></i><span><?=$conf->area?></span>
                            </div>

                            <div>
                                <i class="icon-user"></i><span><?=$conf->ponentes?></span>
                            </div>
                            
                            <div>
                                <i class="icon-home-1"></i><span><?=$conf->lugar?></span>
                            </div>

                            <div>
                                <i class="icon-wristwatch"></i><span><?=$conf->hora?></span>
                            </div>
                        </div>

                        <div>
                            <!-- <button class="btn btn-primary btn-reservar"> Reservar</button> -->
                        </div>
                    </div>   
            <?php endwhile; ?>

            </div>
        </div>
    </section>
    <!-- Seccion de conferencias -->

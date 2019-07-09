<?php 
    //  var_dump($_POST['proyectos']);

    // while($proyecto =  $_POST['proyectos']->fetch_object()){
    //     echo $proyecto->tema.'<br>';
    // }
?>
  
            <div class="titulo text-center">
                <h2>Proyectos</h2>
            </div>

            <div class="row">
            <?php while($proyecto =  $_POST['proyectos']->fetch_object()): ?>
                <div class="col-md-6 proyecto-item">
                    <h3><?=$proyecto->tema?></h3>
                    <h5><?=$proyecto->grupo?></h5>
                    <p><?=$proyecto->descripcion?> </p>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- Casa abierta -->

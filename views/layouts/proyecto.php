
</div>

<div class="columna col-lg-4">
    <div class="widget estadistica">
        <h3 class="titulo aside-titulo">Proyectos</h3>
        <div class="contenedor d-md-flex flex-lg-column">
            <!-- Dinamico -->
            <?php while($proyecto =  $_POST['proyectos']->fetch_object()): ?>
            <div class="caja">
                <h5><?=$proyecto->tema?></h5>
                <span><?=$proyecto->grupo?></span>
                <p><?=$proyecto->descripcion?> </p>                
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
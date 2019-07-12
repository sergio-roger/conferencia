   
   <!-- Formulario de Registro -->
   <section class="form-p" id="formulario">

   <?php if(isset($_SESSION['registro']) && $_SESSION['registro'] == 'fallido'): ?>
        <div class="container alerta-fallo-registro">
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Registro fallido</strong> :(
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
   <?php endif; ?>



        <div class="container formulario">
            <div class="titulo text-center">
                <h2>Formulario de Registro</h2>
            </div>
            
            <div >
                <form action="Usuario/guardar" 
                class="row" method="POST">
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="cedula">* Cedula</label>
                        <input type="text" name="cedula" placeholder="Digite cedula" 
                        maxlength="10" class="form-control" required>
        
                        <label for="nombre">* Nombre</label>
                        <input type="text" required name="nombre" placeholder="Digite nombre" 
                        maxlength="50" class="form-control">
        
                        <label for="apellido">* Apellidos</label>
                        <input type="text" required name="apellido" placeholder="Digite apellido" 
                        maxlength="100" class="form-control">
        
                        <label for="">* Tipo</label>
                        <select name="" id="" class="form-control">
                            <option value="estudiante">Estudiante</option>
                            <option value="invitado">Invitado</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <label for="sexo">* Sexo</label>
                        <select name="sexo" id="" class="form-control">
                            <option value="M">Maculino</option>
                            <option value="F">Femenino</option>
                        </select>
        
                        <label for="email">* Email</label>
                        <input type="email" name="email" id="" placeholder="Ejemplo juan@gmail.com" required
                        class="form-control">
                        
                        <label for="clave">* Contraseña</label>
                        <input type="password" name="clave" id="" placeholder="Digite contraseña" required
                        class="form-control">

                        <input type="submit" value="Registrarme ya" class="btn-registrar">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Formulario de Registro -->

    <footer>
      <div class="footer container text-center p-3">
          <p>Todo los derechos &copy; reservados</p>
          <p>Desarrollado por <a href="https://www.facebook.com/sergioroger2704" target="_blank">Sergio Roger</a></p>   
      </div> 
    </footer>

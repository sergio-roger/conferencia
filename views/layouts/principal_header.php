<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conferencias | Upse</title>

    <link rel="stylesheet" href="<?=base_url?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/fontello.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/responsive.css">
</head>
<body>
    
    <header class="header">
       <div class="envoltura">
         <!--  Menu de navegacion-->
        <nav class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <span>FACSISTEL</span>
            </div>

            <input type="checkbox" name="menu" id="btn-menu" class="check">
            <label for="btn-menu" class="icon-align-justify" class="lbl-menu" id="icono-menu"></label>

            <div class="menu d-md-flex justify-content-md-end align-items-center">
                <a href="#" class="item-menu">Inicio</a>
                <a href="#conferencias" class="item-menu">Conferencias</a>
                <a href="#proyectos" class="item-menu">Proyecto</a>
                <a href="#">Cronograma</a>
            </div>
          </nav>
        <!--  Menu de navegacion-->
        
        <div class="texto-principal container d-flex flex-column align-items-center justify-content-center"> 
              <div class="principal">
               <h1> III Ciclo de conferencias <span>MDLC</span> <sup>2</sup></h1>
              </div>  

              <div class="secundario">
                <h2>XXI Aniversario Universidad Penìnsula de Santa Elena</h2>
              </div>
          </div>
          <!-- d-flex justify-content-end align-items-center borde-2 -->
          <div class="container ">
              <div class="row detalle">
                  <div class="col-12 col-sm-6 col-md-6 d-flex justify-content-center">
                      <div class="dm">Julio 17</div>
                      <div class="dm">Upse</div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 d-flex justify-content-md-end adaptar justify-content-center">
                      <!-- <a class="dm reservar" href="#">Reservar</a> -->
                      <a class="boton registro btn btn-success" href="#formulario">Registrarme</a>
                      <a class="boton inicio"
                      data-toggle="modal" data-target="#inicio"
                      >Iniciar Sección</a>   
                  </div>         
              </div>
            </div>
       </div>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="inicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Iniciar Sección</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-12">
                        <form action="<?=base_url?>usuario/login" method="POST">
                            <label for="inicio-correo">Correo</label>
                            <input type="email" name="inicio-correo" placeholder="usuario@gmail.com"
                            required maxlength="100" class="form-control">

                            <label for="inicio-clave">Contraseña</label>
                            <input type="password" name="inicio-clave" id="" placeholder="****"
                            required maxlength="20" class="form-control">

                            <input type="submit" value="Ingresar" 
                            class="btn btn-primary form-control ingresar">
                        </form>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
    </div>
      <!-- Modal -->
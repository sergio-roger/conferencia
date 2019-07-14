<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard</title>

    <link rel="stylesheet" href="<?=base_url?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/fontello.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/panel.css">
</head>
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="barra-lateral col-12 col-sm-auto">
                    <div class="logo text-center"> 
                        <h2>Dashboard</h2>
                    </div>
    
                    <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                        <a href="<?=base_url?>Home/index"><i class="icon-home"></i><span>Inicio</span></a>
                        <a href="<?=base_url?>conferencia/reserva"><i class="icon-ticket"></i><span>Reservar</span></a>
                        <a href="<?=base_url?>conferencia/verReserva"><i class="icon-eye"></i><span>Ver reservas</span></a>
                        <!-- <a href=""><i class="icon-cog-alt"></i><span>Configuraciones</span></a> -->
                        <a href="<?=base_url?>usuario/salir"><i class="icon-logout"></i><span>Salir</span></a>
                    </nav>
                </div>
                
                <main class="main">
                    <div class="row">
                        <div class="columna col-lg-8">
                            
                            <div class="widget reservas">
                                

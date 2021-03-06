<!DOCTYPE html>
<html>
    <head>
        <?php
            $session_data = $this->session->userdata('logged_in');
            $rolusuario = $session_data['rol'];
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>presto_web</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    </head>
    
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">Presto web</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Presto web</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $session_data['usuario_nombre']?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if($session_data['usuario_imagen']!= ""){ ?>
                                        <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="img-circle" alt="User Image">
                                        <?php }else{ ?>
                                        <img src="<?php echo site_url('resources/images/usuarios/default.jpg');?>" class="img-circle" alt="User Image">
                                        <?php } ?>
                                    <p>
                                        <?php echo $session_data['usuario_nombre']?> - <?php echo $session_data['tipousuario_descripcion']?>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo site_url() ?>login/logout" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <div  style=" white-space: normal; word-wrap: break-word;"><?php echo $session_data['usuario_nombre']?></div>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU</li>
                        <li>
                            <a href="<?php echo site_url('dashboard');?>">
                                <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-registered"></i> <span>Registros</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[1-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('asesor/index');?>"><i class="fa fa-user-secret"></i> <span>Asesor</span></a>
                                </li>
                                <?php
                                }
                                if($rolusuario[4-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                   <a href="<?php echo site_url('cliente/index');?>"><i class="fa fa-users"></i> Cliente</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[11-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('garante/index');?>"><i class="fa fa-handshake-o"></i> Garante</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[12-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('garantia/index');?>"><i class="fa fa-archive"></i> Garantia</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-credit-card"></i> <span>Credito</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[6-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('credito/individual');?>"><i class="fa fa-user"></i> Individual</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[5-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('credito/grupal');?>"><i class="fa fa-users"></i> Grupal</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-list"></i> <span>Parametros</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[3-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('categoria/index');?>"><i class="fa fa-braille"></i> Categoria</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[8-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                <a href="<?php echo site_url('estado/index');?>">
                                    <i class="fa fa-desktop"></i> <span>Estado</span>
                                </a>
                                </li>
                                <?php
                                }
                                if($rolusuario[7-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('estado_civil/index');?>">
                                        <i class="fa fa-gavel"></i> <span>Estado Civil</span>
                                    </a>
                                </li>
                                <?php
                                }
                                if($rolusuario[9-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('extencion/index');?>"><i class="fa fa-chrome"></i> Extencion</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[18-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_credito/index');?>"><i class="fa fa-exchange"></i> Tipo Credito</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[19-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_integrante/index');?>"><i class="fa fa-user-circle"></i> Tipo Integrante</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[15-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('multa/index');?>"><i class="fa fa-bitcoin"></i> Multa</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-group"></i> <span>Grupo</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[13-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('grupo/index');?>"><i class="fa fa-group"></i> Grupos</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[14-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('integrante/index');?>"><i class="fa fa-address-book-o"></i> Integrante</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[16-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('reunion/index');?>"><i class="fa fa-american-sign-language-interpreting"></i> Reunion</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[2-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('asistencia/index');?>"><i class="fa fa-check-square-o"></i> Asistencia</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-lock"></i> <span>Seguridad</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[10-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('factura/index');?>"><i class="fa fa-file-text-o"></i> Factura</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[17-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li class="active">
                                    <a href="<?php echo site_url('rol');?>"><i class="fa fa-users"></i> Roles</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[20-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_usuario');?>"><i class="fa fa-users"></i> Tipos de usuarios</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[21-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('usuario/index');?>"><i class="fa fa-user"></i> Usuario</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer no-print">
                <strong>Generated By <a href="http://www.crudigniter.com/">CRUDigniter</a> 3.2</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
    </body>
</html>

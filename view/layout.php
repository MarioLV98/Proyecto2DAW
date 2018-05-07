<!doctype html>
<html>
    <head>
        <title>Labra-Cars</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="webroot/estilos.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="paginacion/jquery.simplePagination.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid" id="entrar">
                    <div class="navbar-header">

                        <div class="container">
                            <div class="col-md-4 col-sm-4 col-xs-12"></div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <strong><p style="color:white; font-size: 2em;"><?php
                                        if (isset($_SESSION['usuario'])) {
                                            if ($_SESSION['usuario']->getPerfil() == "admin") {
                                                echo "AREA ADMIN LABRA-CARS";
                                            } else {
                                                echo "AREA CLIENTE LABRA-CARS";
                                            }
                                        } else {
                                            echo "LABRA-CARS";
                                        }
                                        ?></p></strong></div></div>


                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>


                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php
                                    if (!isset($_SESSION['usuario'])) {
                                        echo '<span  class="glyphicon glyphicon-log-in"></span> Entrar<span class="caret"></span>';
                                    } else {
                                        echo '<span  class="glyphicon glyphicon-user"></span>' . $_SESSION['usuario']->getCodUsuario() . ' <span class="caret"></span>';
                                    }
                                    ?></a>
                                <ul class="dropdown-menu" style="width: 375px;margin: auto;">
                                    <div class="container-fluid">
                                    <form action="index.php?location=login" id="formulario" method="post">
                                        <?php
                                        if (!isset($_SESSION['usuario'])) {//Si hay sesion te lleva al index
                                            if (isset($_POST['enviar'])) {
                                                $usuario = Usuario::comprobarUsuario($_POST['usuario']);
                                                $contaseña = Usuario::comprobarPassword($_POST['usuario'], $_POST['contrasena']);
                                            }
                                            ?>
                                            <h4>Login</h4>

                                            <label for="usuario">Usuario:</label><br />
                                            <div class="form-group <?php
                                            if (isset($_POST['enviar'])) {
                                                if ($usuario == "") {
                                                    echo "has-success";
                                                } else {
                                                    echo "has-error";
                                                }
                                            }
                                            ?>">
                                                <input class="form-control" type="text" name="usuario" value="<?php
                                                       if (isset($_POST['enviar'])) {
                                                           echo $_POST['usuario'];
                                                       }
                                                       ?>">
                                                <p id="err"><?php
                                                    if (isset($_POST['enviar'])) {
                                                        echo $valida = Usuario::comprobarUsuario($_POST['usuario']);
                                                    }
                                                    ?></p>
                                            </div>


                                            <div class="form-group <?php
                                            if (isset($_POST['enviar'])) {
                                                if ($contaseña == "") {
                                                    echo "has-success";
                                                } else {
                                                    echo "has-error";
                                                }
                                            }
                                            ?>">
                                                <label for="contrasena">Contraseña:</label><br />
                                                <input class="form-control" type="password" name="contrasena" value="<?php
                                                       if (isset($_POST['enviar'])) {
                                                           echo $_POST['contrasena'];
                                                       }
                                                       ?>">
                                                <p id="err"><?php
                                                    if (isset($_POST['enviar'])) {
                                                        echo $valida = Usuario::comprobarPassword($_POST['usuario'], $_POST['contrasena']);
                                                    }
                                                    ?></p>
                                            </div>
                                            <br />



                                            <input class="btn btn-primary" type="submit" name="enviar" value="Iniciar sesion"/>

                                            <p class="pull-right">No tienes cuenta? <input class="btn btn-warning" type="submit" name="registro" value="Registrate"/></p>


                                            <?php
                                        } else {
                                            echo "<h4><strong>Bienvenido ", $_SESSION['usuario']->getcodUsuario(), "</strong></h4><br>";
                                            echo "<h4>Fecha ultima conexion: " . $_SESSION['usuario']->getUltimaConexion() . "</h4>";
                                            echo "<h4>Perfil: " . $_SESSION['usuario']->getPerfil() . "</h4>";
                                        }
                                        ?>

                                    </form>

                                    </div>
                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>




        </header>
        <?php
        //Intoducimos un valor en el layout
        $layout = "vInicio.php";

        //Si se ha definido algo en el $_GET se le añade la nueva ruta
        if (isset($_GET['location']) && isset($vistas[$_GET['location']])) {
            $layout = $vistas[$_GET['location']];
        }

        include $layout;
        ?>

        <footer >

            <h4>Powered by <a href="../../../../index.php">Mario Labra</a></h4>

        </footer>

    </body>

</html>

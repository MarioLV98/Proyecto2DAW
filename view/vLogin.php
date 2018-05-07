

<div id="contenido" class="container">
   

   


        <div class="col-xs-12 col-sm-8 col-md-8">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                    <li data-target="#myCarousel" data-slide-to="6"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div id="carrusel" class="carousel-inner">
                    <div class="item active">
                        <img src="webroot/cars/208gti.jpg" class="img-responsive"  style="width:100%; height: 400px;">
                    </div>

                    <div class="item">
                        <img src="webroot/cars/a7.jpg" class="img-responsive"  style="width:100%; height: 400px;">
                    </div>

                    <div class="item">
                        <img src="webroot/cars/c63.jpg" class="img-responsive"  style="width:100%;height: 400px;">
                    </div>

                    <div class="item">
                        <img src="webroot/cars/fiesta.jpg" class="img-responsive"  style="width:100%;height: 400px;">
                    </div>

                    <div class="item">
                        <img src="webroot/cars/partner.png" class="img-responsive" style="width:100%;height: 400px;">
                    </div>

                    <div class="item">
                        <img src="webroot/cars/s40.jpg" class="img-responsive"  style="width:100%;height: 400px;">
                    </div>
                    <div class="item">
                        <img src="webroot/cars/trasit.jpg" class="img-responsive"  style="width:100%; height: 400px;">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


        </div>
        <div id="info" class="col-xs-12 col-sm-4 col-md-4 well">
            <h1 class="text-success">Labra-Cars</h1>
            <h3>Te ofrecemos una gran variedad de vehiculos<br> a un precio exclusivo que no <br> encontraras en cualquier sitio <br> si tienes dudas sobre nuestros <br>servicios no dudes en mandarnos un <a href="index.php?location=contacta" >correo</a><br>responderemos lo antes que <br> podamos, gracias por visitarnos</h3>
        </div>
        
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <hr>
        
        <h3 style="text-align: center">Algunos de nuestros vehiculos</h3>
        </div>
        
           <div class="container">

        <?php
        for ($i = 0; $i < count($vehiculos); $i++) {
            if (!is_null($vehiculos[$i]->getCodUsuario())) {
                $estado = 'Alquilado';
                $color = 'danger';
            } else {
                $estado = 'Disponible';
                $color = 'success';
            }
            echo "<div class='col-md-3 col-sm-3 col-xs-12 well'>";
            echo "<h3 class='text-primary'>" . $vehiculos[$i]->getMarca() . "</h3>";
            echo "<br>";
            echo "<img style='width:135px; height:120px;' class='img-responsive pull-right' id='red'  src='data:image/jpg;base64," . base64_encode($vehiculos[$i]->getFoto()) . " '>";
            echo "<p class='text-danger'>" . $vehiculos[$i]->getTipo() . "</p>";
            echo "<p>Precio por dia: <br><strong>" . $vehiculos[$i]->getPrecio() . "€</strong></p>";
            echo "<p>Plazas: " . $vehiculos[$i]->getPlazas() . "</p>";
            echo "<p>Capacidad de maletas: " . $vehiculos[$i]->getMaletas() . "</p>";
            echo "<p class='text-$color'>Estado:  $estado </p>";
            echo "</div>";
        }
        ?>

    </div>


    

</div>



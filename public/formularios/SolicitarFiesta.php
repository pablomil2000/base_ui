<?php
session_start();
include("../codigo/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>One Page Wonder - Start Bootstrap Template</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?php
    include("header.php");
    animadores2($vec);
    ?>
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container d-flex  flex-wrap justify-content-around ">
                <h2 class="masthead-subheading mb-5 col-12 ">Alta Animador</h2>
                <form class="col-4" action="../codigo/principal.php?SoliFiesta" method="POST">
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label">Fecha</label>
                        <input name="fecha" class="form-control" id="nombre-cliente" placeholder="2020-25-04" aria-describedby="nombre-cliente">
                    </div>
                    <div class="">
                    <label for="exampleInputEmail1" class="form-label">Animador</label><br>
                    <select class='form-control '  require name="animador" id="">
                            <?php
                            
                            foreach ($vec as $key => $value) {
                                foreach ($value as $key2 => $value2) {
                                    echo "<option  value='$value2'>$value2</option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label">Duracion</label>
                        <input name="duracion" class="form-control" id="nombre-cliente" placeholder="Horas" aria-describedby="nombre-cliente">
                    </div>
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label">tipo De fiesta</label>
                        <input name="tipo" class="form-control" id="nombre-cliente" placeholder="Fiesta de ..." aria-describedby="nombre-cliente">
                    </div>
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label">Asistentes</label>
                        <input name="Asistentes" class="form-control" id="nombre-cliente" placeholder="6" aria-describedby="nombre-cliente">
                    </div>
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label">Edad media</label>
                        <input name="edad" class="form-control" id="nombre-cliente" placeholder="20" aria-describedby="nombre-cliente">
                    </div>

                    <button type="submit" class="btn btn-primary btn-xl rounded-pill mt-5">Dar de alta</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Footer-->
    <footer style="background: linear-gradient(0deg, #ff6a00 0%, #ee0979 100%)" class="py-5 bg-black ">
        <div class="container">
            <p class="m-0 text-center text-white small">Copyright &copy; G5 Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
</body>

</html>
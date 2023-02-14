<?php
    include_once ('Empleado.php');
    include_once "Contratista.php";
    include_once "Planta.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Start</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <br><br>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Empleado contratista-planta</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead"><?php  
                    
                    $username = "root";
                    $password = "";
                    $database = "empleados";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                
                    $query = "SELECT * FROM empleado WHERE id = 1";
                
                    if ($result = $mysqli->query($query)) {
                
                        while ($row = $result->fetch_assoc()) {
                            
                            $field1name = $row["id"];
                            $field2name = $row["nombre"];
                            $field3name = $row["cargo"];
                        }
                
                    /*freeresultset*/
                    $result->free();
                    }
            
                    //Datos de Entrada Empleado Contratista 
                    echo "Calcular Salario Empleado Contratista ";
                    echo "<br>";
                    $tipoEmpleado = "Contratista";
                    $identificacion = "123";
                    $nombre = "Angie Cepeda";
                    $cargo = "Secretaria";
                    $totalHorasTrabajadas = 160;
                    //Creamos el objeto
                    $objContratista = new Contratista($identificacion,$nombre,$cargo);
                    //modificamos atributos del empleado de Contrato
                    $objContratista->setvalorHora(4000);
                    $objContratista->setTotalHoras($totalHorasTrabajadas);
                    //imprimimos datos de entrada
                    echo "<br>id Empleado: " . $field1name;
                    echo "<br>Nombre Empleado: " . $field2name;
                    echo "<br>Cargo Empleado: " . $field3name;
                    echo "<br>Valor de la Hora: $" . $objContratista->getValorHora();
                    echo "<br>Total Horas Trabajas en el Mes: " . $objContratista->getTotalHoras();
                    echo "<br> <br><br> RESULTADOS <BR><BR>";
                    //calculam os el salario del empleado de Contrato
                    $objContratista->calcularSalario(4000,$totalHorasTrabajadas);
                    //Mostramos resultados
                    echo "<br>id Empleado: " . $field1name;
                    echo "<br>Nombre Empleado: " . $field2name;
                    echo "<br>Cargo Empleado: " . $field3name;
                    echo "<br>Salario Neto a recibir en el Mes: " . $objContratista->getSalario();
                    ?></p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">
                    <?php 
                        $username = "root";
                        $password = "";
                        $database = "empleados";
                        $mysqli = new mysqli("localhost", $username, $password, $database);
                    
                        $query = "SELECT * FROM empleado WHERE id = 2";                    
                        if ($result = $mysqli->query($query)) {
                    
                            while ($row = $result->fetch_assoc()) {
                                
                                $field1name = $row["id"];
                                $field2name = $row["nombre"];
                                $field3name = $row["cargo"];
                            }
                    
                        /*freeresultset*/
                        $result->free();
                        }
                        echo "Calcular Salario Empleado";
                        echo "<br>";
                        //Datos de Entrada Empleado de Planta
                        $tipoEmpleado = "Planta";
                        $identificacion="456";
                        $nombre="Faustino Asptrilla";
                        $cargo = "Gerente";
                        $SueldoBasico = 4500000;
                        $valorExtras=345000;
                        $deducciones=1098000;
                        //Creamos el objeto
                        $objPlanta = new Planta($identificacion,$nombre,$cargo);
                        //modificamos atributos del empleado de planta
                        $objPlanta->setSueldoBasico($SueldoBasico);
                        $objPlanta->setValorExtras($valorExtras);
                        $objPlanta->setDeducciones($deducciones);
                        //imprimimos datos de entrada
                        echo "<br>id Empleado: " . $field1name;
                        echo "<br>Nombre Empleado: " . $field2name;
                        echo "<br>Cargo Empleado: " . $field3name;
                        echo "<br>Sueldo Basico: $" . $objPlanta->getSueldoBasico();
                        echo "<br>Valor Extras: $" . $objPlanta->getValorExtras();
                        echo "<br>Total Deducciones: $" . $objPlanta->getDeducciones();
                        echo "<br> <br> RESULTADOS <BR><BR>";
                        //calculam os el salario del empleado de planta
                        $objPlanta->calcularSalario();
                        //Mostramos resultados
                        echo "<br>id Empleado: " . $field1name;
                        echo "<br>Nombree Empleado: " . $field2name;
                        echo "<br>Cargo Empleado: " . $field3name;
                        echo "<br>Salario Neto a Recibir: $" . $objPlanta->getSalario()
                        
                    ?>
                    </p></div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->

       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

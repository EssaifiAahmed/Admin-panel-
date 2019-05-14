<?php
    include 'Admin/database.php';
    require 'Admin/session.php';
    Session::start();
    $select = $db->query('SELECT id_prd, name_prd, descr_prd, bref_descr, img_src,etat FROM products');
    $products = $select->fetchAll();
    $first_order = 2;
    $seconde_order = 1;
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin|panel-Dashboard</title>

        <!---BOOTSTRAP 4.3-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!--Styles CSS-->
        <link rel="stylesheet" href="CSS/styles.css">
        
    </head>
    <body style="margin-top: -3rem; margin-bottom: 0rem;">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark  ">
            <a class="navbar-brand" href="#">Welcome</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact US</a>
                    </li>
                    </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-success my-2 my-sm-0 btn-login" href="login.php">Login</a>
                </form>
            </div>
        </nav>
    <main role="main">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach($products as $item):?>
                    <div class="carousel-item <?=$item['etat']; ?>">
                        <img class="second-slide" src="Images/<?=$item['img_src'];?>" style="height:512px; width:100%;">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1 style="color:black;"><?=$item['name_prd'];?>.</h1>
                                <p><?=$item['bref_descr']; ?>.</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        <div class="container marketing">
            <?php foreach($products as $item):?>
            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7 order-md-<?=$first_order; ?>">
                    <h2 class="featurette-heading"><?=$item['name_prd']; ?>. <span class="text-muted">
                    <p class="lead"><?=$item['descr_prd']; ?>.</p>
                </div>
                <div class="col-md-5 order-md-<?=$seconde_order; ?>">
                    <img class="featurette-image img-fluid mx-auto" src="Images/<?=$item['img_src']; ?>"
                        alt="Generic placeholder image">
                </div>
            </div>
            <?php 
            if($first_order == 2 && $seconde_order == 1){
                $first_order = 1;
                $seconde_order = 2;
            }else{
                $first_order = 2;
                $seconde_order = 1;
            }
            endforeach;?>
            <hr class="featurette-divider">
        </div>
    </main>


















                <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </body>
</html>
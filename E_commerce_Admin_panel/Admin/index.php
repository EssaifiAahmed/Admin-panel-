<?php
    include 'database.php';
    require 'session.php';
    Session::start();

    $select = $db->query('SELECT id_prd, name_prd, descr_prd, bref_descr, img_src FROM products');
    $products = $select->fetchAll();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Commerce</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Table CSS style-->    
    <link rel="stylesheet" href="../CSS/tables.css">


</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Admin|Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/Addproduct.php">Ajouter Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/Deleteproduct.php">Supprimer Item</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="btn btn-primary my-2 my-sm-0 mr-3" href="../index.php">Logout</a>
                </form>
            </div>
        </nav>
    </header>

    <table class="table tbls" style="margin-top: 159px; width: 80%; margin-left: 10%;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">description</th>
                <th scope="col">Bref_description</th>
                <th scope="col">images</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product):?>
            <tr >
                <td><?=$product['name_prd'];?></td>
                <td><?=$product['descr_prd'];?></td>
                <td><?=$product['bref_descr'];?></td>
                <td><img src="../Images/<?=$product['img_src'];?>" class="imgstyle"></td>
                <td><a href="update.php?id_prd=<?=$product['id_prd'];?>" class="btn btn-primary">Update</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
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
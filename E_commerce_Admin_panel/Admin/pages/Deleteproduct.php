<?php
    include '../database.php';
    include '../Delete.php';
    $select = $db->query('SELECT id_prd, name_prd, bref_descr, descr_prd, img_src FROM products');
    $products = $select->fetchAll();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delete product</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>


<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="../index.php">Admin|Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Addproduct.php">Ajouter Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Deleteproduct.php">Supprimer Item</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="btn btn-primary my-2 my-sm-0 mr-3" href="../logout.php">Logout</a>
                </form>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row" style="margin-top: 10%;">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Bref_description</th>
                <th>Description</th>
                <th>Images</th>
                <th>Supprimer</th>    
            </tr>
            </thead>
            <tbody>
            <?php foreach($products as $item):?>
            <tr id="">
                <td><?=$item['name_prd'];?></td>
                <td><?=$item['bref_descr'];?></td>
                <td><?=$item['descr_prd'];?></td>
                <td><img id="imageWorks" src="../../Images/<?=$item['img_src'];?>" alt="" style="width: 40% !important;"></td>
                <td><a href="Deleteproduct.php?id_prd=<?=$item['id_prd']; ?>" class="btn btn-primary">delete</a></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>

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
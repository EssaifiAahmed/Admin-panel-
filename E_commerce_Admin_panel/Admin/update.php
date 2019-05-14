<?php 
include 'database.php';
require 'session.php';
Session::start();
Session::set('edit',$_GET['id_prd']);
if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    /** Traitement Table Work */
        try{
            if(isset($_POST['name']) && isset($_POST['image']) && isset($_POST['desc_bre']))
            {
                $id_item = Session::get('edit');
                $name = $db->quote($_POST['name']);
                $image = $_POST['image'];
                $description = $db->quote($_POST['description']);
                $desc_bre = $db->quote($_POST['desc_bre']);
                if(empty($image)){
                    $query = "update products set name_prd=$name,descr_prd=$description,bref_descr=$desc_bre where id_prd=$id_item";
                }else{
                    $query = "update products set name_prd=$name,descr_prd=$description,bref_descr=$desc_bre,img_src='$image' where id_prd=$id_item";
                }
                $msg=$query;
                // var_dump($query);
                $select = $db->query($query);
                if(!empty($select)){
                    header('Location:index.php');                
                } else {
                    $msg="Error Work";
                }
            }
        }catch(Exception $e){
            $msg ='Exception Work';
        }
}else{
    $msg ='Erreur POST';
}
$select = $db->query('SELECT id_prd, name_prd, descr_prd, bref_descr, img_src, etat  FROM products WHERE id_prd = '.Session::get('edit'));
$products = $select->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Commerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        #imageWorks {
            width: 60% !important;
        }
        .input {
            background-color: transparent;
            border: 0px solid;
            height: 20px;
            width: 160px;
            color: #CCC;
        }
        .tdImg{
            display :grid;
            grid-template-columns: auto auto ;
            align-items: center;
                }
 
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="index.php">Admin|Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Addproduct.php">Ajouter Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Deleteproduct.php">Supprimer Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Updateproduct.php">Update Item</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="btn btn-primary my-2 my-sm-0 mr-3" href="logout.php">Logout</a>
                </form>
            </div>
        </nav>
    </header>
    <main class="main" style="margin-top:4rem;">
        <?php foreach($products as $item):?>
            <div class="container">
                    <div class="row">
                        <form method="POST" action="#">
                        <p><?php echo($msg);?></p>
                            <div class="form-group">
                                <label for="name">Nom du item</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameItem"
                                    placeholder="Entrer nom du item" value="<?=$item['name_prd']; ?>">
                                <small id="nameItem" class="form-text text-muted">We'll never share name of item with anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="bref_des">Description court</label>
                                <input type="text" class="form-control" id="bref_des" name="desc_bre" value="<?=$item['bref_descr']; ?>" aria-describedby="bref_desc"
                                    placeholder="description court">
                                <small id="bref_desc" class="form-text text-muted">We'll never share description anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="description_">Description</label>
                                <textarea type="text" class="form-control" id="description_" name="description" aria-describedby="description_c"
                                    placeholder="description court"><?=$item['descr_prd']; ?></textarea>
                                <small id="description_c" class="form-text text-muted">We'll never share description anyone
                                    else.</small>
                            </div>
                            <div class="form-group tdImg">
                                <img id="imageWorks" src="../Images/<?=$item['img_src']; ?>" alt="">
                                <input class="input" type="file" name="image" value="C:\xampp\htdocs\E_commerce_Admin_panel\Images\<?=$item['img_src']; ?>">   
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
                    <?php endforeach;?>
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

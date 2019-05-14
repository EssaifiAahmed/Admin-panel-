<?php 
    include 'database.php'; 
    require 'session.php';
    Session::start();
    /**Traitement du formulaire */


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        try{
            if(isset($_POST['uname1']) && isset($_POST['password'])){
                $username = $db->quote($_POST['uname1']);
                $password = $db->quote($_POST['password']);
                $select = $db->query("select * from login where username = $username and pass = $password");

                if($select->rowCount() > 0){
                    Session::set('auth',$select->fetch());
                    header('Location:Admin/index.php');
                    die;
                }
            }
        }catch(Exception $e){
            // echo('Exception');
        }

    }
    else{
        // echo('Erreur GET');
    }
?>
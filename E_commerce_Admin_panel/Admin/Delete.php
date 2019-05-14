<?php 
include 'database.php';
require 'session.php';
Session::start();

if($_SERVER['REQUEST_METHOD'] == "GET"){ 

    /** Traitement Table DetailProject */
    try{
        if(isset($_GET['id_prd'])){
            $id_prd = (int)($_GET['id_prd']);
            $query = "DELETE FROM products WHERE id_prd = $id_prd";
            $select = $db->query($query);
            if(!empty($select)){
                header('Location: ../index.php');
                $msg = "supp success";
            } else {
                $msg="Error delete";
            }
        }
    }catch(Exception $e){
        $msg ='Exception delete';
    }

    /***************** */

    
   
}else{
$msg ='Erreur POST';
}
?>
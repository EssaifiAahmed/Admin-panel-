<?php 
include 'database.php';
require 'session.php';
Session::start();

if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    /** Traitement Table Work */
        try{
            if(isset($_POST['Product_Name']) && isset($_POST['descr_prd']) && isset($_POST['bref_descr']) && isset($_POST['pictures'])){
                $name = $db->quote($_POST['Product_Name']);
                $description = $db->quote($_POST['descr_prd']);
                $desc_bre = $db->quote($_POST['bref_descr']);
                $image = $db->quote($_POST['pictures']);
                $query = "INSERT INTO products (name_prd, descr_prd, bref_descr, img_src) VALUES ($name,$description,$desc_bre,$image)";
                $select = $db->query($query);
                if(!empty($select)){
                    header('Location:../index.php');                
                } else {
                    $msg="Error Work";
                }
            }
        }catch(Exception $e){
            $msg ='Exception Work';
        }
        /***************** */

        
       
}else{
    $msg ='Erreur POST';
}
?>
<?php
session_start();
if(isset($_SESSION['email'])){
    $curentUser=$_SESSION['email'];
    
}
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    if($file_size > 2097152){
        $errors[]='La taille du fichier ne doit pas dépasser 2 Mo.';
    }
    
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"img/".$file_name);
        try {
            $db = new PDO('mysql:host=localhost;dbname=saam_automation;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $photosStatements = $db->prepare("UPDATE`users` SET path_photo = :path_photo WHERE e_mail =:e_mail");
        $photosStatements->execute([
            'path_photo'=>"img/".$file_name,
            'e_mail'=>$curentUser,]);
        echo "La photo de profil a été mise à jour avec succès.";
    }else{
        print_r($errors);
    }
}
else{
    echo "error";
}
?>

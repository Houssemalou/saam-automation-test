<?php 
    
    include 'connexion_db.php';
    $connectedStatements =  $db->prepare("SELECT e_mail, path_photo, profession, description FROM `users` WHERE is_connected=1");
    $connectedStatements->execute([
        'e_mail'=>$curentUser,
    ]);
    $friends=$connectedStatements->fetchAll();
?>
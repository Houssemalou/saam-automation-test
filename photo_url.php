<?php
    
    try {
         $db = new PDO('mysql:host=localhost;dbname=saam_automation;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        }
    $photoStatements = $db->prepare("SELECT path_photo FROM `users` WHERE e_mail = :e_mail");
    $photoStatements->execute([
                                'e_mail'=>$curentUser,
                            ]);
    $selectedPhoto = $photoStatements->fetchAll();
    foreach($selectedPhoto as $photo){
             echo $photo['path_photo'];

} ?>
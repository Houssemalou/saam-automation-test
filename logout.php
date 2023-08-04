<?php  
    include 'session.php';
    include 'connexion_db.php';
    $logOutStatement = $db->prepare('UPDATE `users` SET is_connected = :is_connected WHERE e_mail = :e_mail');
    $logOutStatement->execute([
        'is_connected' =>  0 ,
        'e_mail' => $curentUser,
    ]);
    session_destroy();
    header("location: index.php");
    
?>
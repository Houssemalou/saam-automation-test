<?php
include 'connexion_db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$usersStatements = $db->prepare("SELECT * FROM `users` WHERE e_mail='$email' AND password='$password'");
$usersStatements->execute();
$users = $usersStatements->fetchAll();

if (count($users) == 1) {
    // Les coordonnées sont valides, rediriger vers la page "index.php"
    session_start();
    $_SESSION['email'] = $email;
    if(isset($_SESSION['email'])){
        $currentUser = $_SESSION['email'];
        $connectionStatements =  $db->prepare("UPDATE `users` SET is_connected = :is_connected WHERE e_mail = :e_mail");
        $connectionStatements->execute([
            'is_connected'=>1,
            'e_mail'=>$currentUser,
        ]);
        foreach($users as $user){
            if($user['level']==1){
                header("location: user.php");
            }
            if($user['level']==2){
                header("location: admin.php");
            }
        }
        
        
    }else{
        header("location: index.php");
        exit();
    }
} else {
    // Les coordonnées sont invalides, afficher un message d'erreur
    echo "Identifiants invalides.";
}
?>

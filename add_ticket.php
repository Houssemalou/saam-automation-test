<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        
</body>
</html>
<?php
//verification que le formulaire soumis
if(!isset($_POST['user_email']) || !isset($_POST['priority'])
|| !isset($_POST['title']) || !isset($_POST['description'])){
        echo "il faut remplir le formulaire";
        return;
}
// Récupérer les informations du formulaire
$user=$_POST['user_email'];
$priorite = $_POST['priority'];
$titre = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];

// Se connecter à la base de données
try
{
	$db = new PDO('mysql:host=localhost;dbname=saam_automation;charset=utf8', 'root', 'root'
        );
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
// Ecriture de la requête
$sqlQuery = "INSERT INTO `tickets` ( `user_email`, `title`, `message`, `priority`, `date`, `status`) VALUES (:user_email, :title, :message, :priority, :date, :status);";

// Préparation
$insertTicket = $db->prepare($sqlQuery);?>



<?php if($insertTicket->execute([
        'user_email'=>$user,
        'title'=>$titre,
        'message'=>$description,
        'priority'=>$priorite,
        'date'=>$date,
        'status'=>'pending',])):?>
        <div class="alert alert-success text-center" role="alert">
                ticket added successfully !
        </div>
<?php else : ?>
        <div class="alert alert-danger" role="alert">
                ticket not added !
        </div>
<?php endif ;?>



        









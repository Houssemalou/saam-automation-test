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
include 'connexion_db.php';
if (!isset($_GET['del']))
{
	echo('Il faut un identifiant valide pour supprimer une recette');
    return;
}	
$deleteRecipeStatement = $db->prepare('UPDATE tickets SET status = :status WHERE ticket_id = :ticket_id');
if($deleteRecipeStatement->execute([
    'status'=>"Rejected",
    'ticket_id'=>$_GET['del'],
])):?>
    <div class="alert alert-danger text-center" role="alert">
            ticket Rejected Successfully !
    </div>
<?php endif;?>

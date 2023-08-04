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
    if ( !isset($_POST['new_msg'])) {
        echo "you should enter new message";
     
    }
    
        $new_msg=$_POST['new_msg'];
        $editStatements = $db->prepare("UPDATE tickets SET message= :message WHERE ticket_id =:ticket_id");
        if($editStatements->execute([
            'message'=>$new_msg,
            'ticket_id'=>$_POST['id'],
        ])):?>
            <div class="alert alert-success text-center" role="alert">
                Ticket Edit Successfully !
            </div>
        <?php endif; ?>


    


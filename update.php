<?php  
    $postData = $_POST;

    if (
        !isset($postData['id'])
        || !isset($postData['title']) 
        || !isset($postData['ticket'])
        )
    {
        echo 'Il manque des informations pour permettre l\'édition du formulaire.';
        return;
    }	
    
    $id = $postData['id'];
    $title = $postData['title'];
    $messageTicket = $postData['ticket'];
    
    $insertRecipeStatement = $mysqlClient->prepare('UPDATE tickets SET message = :message WHERE ticket_id = :id');
    $insertRecipeStatement->execute([
        'message' =>  $messageTicket ,
        'id' => $id,
    ]);
    











?>
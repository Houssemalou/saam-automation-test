<?php
    //pending tickets
    $ticket_cr_Statements =  $db->prepare('SELECT ticket_id, title, status FROM tickets 
    WHERE (status="Rejected" OR status="Completed") AND user_email= :user_mail ORDER BY date DESC');
    $ticket_cr_Statements->execute([
        'user_mail'=>$curentUser,
    ]);
    $cr_Tickets=$ticket_cr_Statements->fetchAll();
    foreach($cr_Tickets as $cr_ticket):?>
    <a href="<?php echo '#'.$cr_ticket['ticket_id'];?>" class="dropdown-item"> 
        <h6 class="fw-normal mb-0" ><?php echo $cr_ticket['title']; ?></h6>
        <small><?php 
            echo 'status : '.$cr_ticket['status'];
        ?></small>
    </a>
    <hr class="dropdown-divider">
    <?php endforeach; ?>                          

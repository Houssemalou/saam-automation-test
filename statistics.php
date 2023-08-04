<?php 
    include 'connexion_db.php';
    //nombre de tickets de ce jour 
    $jrTicketStatements =  $db->prepare("SELECT COUNT(*) AS nombre_tickets
    FROM tickets
    WHERE DATE(date) = CURDATE()");
    $jrTicketStatements->execute();
    $jr_Tickets=$jrTicketStatements->fetchAll();

    //nombre de tickets de cette semaine
    $weekTicketStatements =  $db->prepare("SELECT COUNT(*) AS nombre_tickets FROM tickets WHERE WEEK(date) = WEEK(CURDATE()) AND YEAR(date) = YEAR(CURDATE())
    ");
    $weekTicketStatements->execute();
    $week_Tickets=$weekTicketStatements->fetchAll();

    //nombre de tickets de cette mois
    $monthTicketStatements =  $db->prepare("SELECT COUNT(*) AS nombre_tickets FROM tickets WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
    ");
    $monthTicketStatements->execute();
    $month_Tickets=$monthTicketStatements->fetchAll();

    //nombre de tickets de cette année
    $yearTicketStatements =  $db->prepare("SELECT COUNT(*) AS nombre_tickets FROM tickets WHERE  YEAR(date) = YEAR(CURRENT_DATE())
    ");
    $yearTicketStatements->execute();
    $year_Tickets=$yearTicketStatements->fetchAll();
    //les nombre des tickets  par mois
    $month_ticket_an_Statements =  $db->prepare("SELECT MONTH(date) AS month, COUNT(*) AS nombre_tickets FROM tickets  GROUP BY  MONTH(date)
    ");
    $month_ticket_an_Statements->execute();
    $month_tickets_an=$month_ticket_an_Statements->fetchAll();

    //declaration d'un tableau months
    $months=array();
    $month_nb_tickets=array();
    
    //extraction des années , ticket complete pour chaque année, 
    foreach($month_tickets_an as $month_ticket_an){
        $months[]=$month_ticket_an['month'];
        $month_nb_tickets[]=$month_ticket_an['nombre_tickets'];
    }
    
    $per_month_Tickets=[$months,$month_nb_tickets];
    
    //convertir les données en json
    $ticketDataJSON = json_encode($per_month_Tickets, JSON_PRETTY_PRINT);
    //Enregistrer le JSON dans un fichier
    file_put_contents('data.json',$ticketDataJSON);
?>
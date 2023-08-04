        <?php
                                        
            //pending tickets
            $ticket_p_Statements =  $db->prepare('SELECT ticket_id, title, date FROM tickets 
            WHERE status="pending" ORDER BY date DESC');
            $ticket_p_Statements->execute();
            $p_Tickets=$ticket_p_Statements->fetchAll();
            foreach($p_Tickets as $p_ticket):?>
                <a href="<?php echo '#'.$p_ticket['ticket_id'];?>" class="dropdown-item">
                <h6 class="fw-normal mb-0"><?php echo $p_ticket['title']; ?></h6>
                <small><?php 
                    $curentDate=new DateTime();
                    $date=new DateTime($p_ticket['date']);
                    $intervalle =$curentDate ->diff($date);
                    if ($intervalle->y > 0 || $intervalle->m > 0 || $intervalle->days > 0) {
                    // Afficher en jours si la différence dépasse 24 heures
                        echo  $intervalle->format('%a jours').' ago';
                    } elseif ($intervalle->h > 0) {
                    // Afficher en heures si la différence dépasse 59 minutes
                        echo $intervalle->format('%h heures').' ago';
                    } elseif ($intervalle->i > 0) {
                    // Afficher en minutes si la différence dépasse 59 secondes
                        echo $intervalle->format('%i minutes').' ago';
                    } else {
                    // Afficher en secondes sinon
                        echo $intervalle->format('%s secondes').' ago';
                    }
                    ?></small>
                    </a>
                    <hr class="dropdown-divider">
                    <?php endforeach; ?>                          

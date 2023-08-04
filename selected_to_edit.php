<?php
    include 'connexion_db.php';
    if(isset($_SESSION['email'])){
        $curentUser=$_SESSION['email'];
    }
    else{
        echo "not defined";
    }
                                        
    $selectedStatements = $db->prepare("SELECT ticket_id, title, message FROM `tickets` WHERE user_email = :user_email AND status = :status");
    $selectedStatements->execute([
        'user_email'=>$curentUser,
        'status'=>"pending",
    ]);
    $optionalTicket = $selectedStatements->fetchAll();?>
    <?php foreach($optionalTicket as $option) : ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <?php echo $option['title']; ?>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="edit.php" method="post">
                        <div class="mb-3 visually-hidden">
                            <label for="id" class="form-label">Identifiant de la recette</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $option['ticket_id']; ?>">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here"
                                id="floatingTextarea1" style="height: 150px;" name="ticket">
                                <?php echo $option['message']; ?>
                            </textarea>
                            <label for="floatingTextarea1">Edit</label>
                        </div> 
                        <button class="btn btn-outline-primary w-100 m-2" type="button">Edit</button> 
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


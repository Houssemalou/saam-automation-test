<?php 
$id = $_GET['del'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Supprimer la recette ?</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    
        <h1>Delete Ticket ?</h1>
        <form action="post_delete.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">ticket_id</label>
                <input type="hidden" class="form-control"  id="id" name="identifiant" value="<?php echo $id; ?>">
            </div>
            
            <button type="submit" class="btn btn-danger">You want to delete it</button>
        </form>
        <br />
    </div>

   
</body>
</html>
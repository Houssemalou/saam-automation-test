<?php
// Récupérer les informations du formulaire
$destinataire = $_POST['destinataire'];
$expediteur = $_POST['expediteur'];
$objet = $_POST['objet'];
$message = $_POST['message'];

// En-têtes du courrier électronique
$headers = "From: $expediteur\r\n";
$headers .= "Reply-To: $expediteur\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Envoyer le courrier électronique
if (mail($destinataire, $objet, $message, $headers)) {
  echo "Le courrier électronique a été envoyé avec succès à $destinataire.";
} else {
  echo "Une erreur s'est produite lors de l'envoi du courrier électronique.";
}
?>

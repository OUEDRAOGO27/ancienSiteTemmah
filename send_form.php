<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $address = htmlspecialchars($_POST['address']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Valider les champs obligatoires (nom, email, message)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Veuillez remplir les champs obligatoires.";
        exit;
    }

    // Préparer l'email
    $to = "direction@temmahcomivoire-ci.com";  // Remplacez par votre adresse email
    $email_subject = "Nouveau message de $name : $subject";
    $email_body = "Nom: $name\nEmail: $email\nTéléphone: $tel\nAdresse: $address\n\nMessage:\n$message";

    // Headers pour l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoyer l'email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message envoyé avec succès!";
    } else {
        echo "Échec de l'envoi du message. Veuillez réessayer.";
    }
}
?>

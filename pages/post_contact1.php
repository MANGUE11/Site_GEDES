<?php
$errors = [];

if (!array_key_exists('nom', $_POST) | $_POST['nom'] == ''){
	$errors['nom'] = "Vous n'avez pas renseigner votre nom";
}
if (!array_key_exists('prenom', $_POST) | $_POST['prenom'] == ''){
	$errors['prenom'] = "Vous n'avez pas renseigner votre prenom";
}
if (!array_key_exists('email', $_POST) | $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$errors['email'] = "Vous n'avez pas renseigné un email valide";
}
if (!array_key_exists('message', $_POST) | $_POST['message'] == ''){
	$errors['message'] = "Vous n'avez pas renseigner votre message";
}
    session_start();
if (!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('location: contact1.php');
}else{
 $_SESSION['success'] = 1;
 $message = $_POST['message'];
$email = $_POST['email'];
$headers = "FROM: $email";
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$numero = $_POST['numero'];
$demande = $_POST['demande'];
$contenu = "Nom :$nom \n
Prenom :$prenom \n
Tel :$numero \n
Sujet :$demande \n
 $message";
mail('bacon@gedesinternational.com', 'Formulaire de conatact', $contenu, $headers);
 header('location: contact1.php');
}
?>
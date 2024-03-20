<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'],$_POST['username'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['type'])) {
        $id= $_POST[ 'id'] ; 
        $nom = $_POST['username'];
        $prenom = $_POST['prenom'];
        $login = $_POST['email']; 
        $passwd = $_POST['password'];
        $type = $_POST['type']; 
      
        if ($type !== "etudiant") {
            echo "Type d'utilisateur invalide";
            exit; 
        }

        $query = $connect->prepare("INSERT INTO etudiant (id_etudiant, nom_etudiant ,prenom_etudiant, login_etudiant, password_etudiant, role) VALUES (?, ?, ?, ?, ?, ?)");
        $testquery = $query->execute([$id, $nom ,$prenom, $login, $passwd, $type ]);

        if ($testquery) {
            echo "Bien inséré";
        } else {
            echo "Erreur lors de l'insertion";
        }
    } else {
        echo "Les données nécessaires ne sont pas définies";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="script1.js"></script>
    <title>Inscription</title>
</head>
<body>
    <div class="signup-page">
        <div class="form">
            <form class="signup-form" id="signup-form" action="inscription.php" method="POST">
            <input type="text" placeholder="ID" name="id" required>
            <input type="text" placeholder="Nom" name="username" required>
                <input type="text" placeholder="Prénom" name="prenom" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mot de passe" name="password" required>
                <select name="type">
                    <option value="etudiant">Étudiant</option>
                </select>
                <button type="submit" id="myButton">S'inscrire</button>
                <p class="message">Vous avez déjà un compte? <a href="index.php">Connectez-vous</a></p>
                <div id="error-message"></div> 
            </form>
        </div> 
    </div>
    <script>
    var form = document.querySelector('.signup-form'); 
    var nom = document.querySelector('input[name="username"]');
    var prenom = document.querySelector('input[name="prenom"]');
    var login = document.querySelector('input[name="email"]');
    var passwd = document.querySelector('input[name="password"]');
    var type = document.querySelector('select[name="type"]'); 
    var errorsDiv = document.getElementById('error-message'); 
    var button = document.getElementById('myButton');

    form.addEventListener('input', validateForm);

    function validateForm() {
        errorsDiv.innerHTML = '';
        var hasErrors = false;

        if (nom.value === '') {
            displayError('Veuillez saisir le nom.');
            hasErrors = true;
        }

        if (prenom.value === '') {
            displayError('Veuillez saisir le prénom.');
            hasErrors = true;
        }

        if (login.value === '') {
            displayError('Veuillez saisir le pseudo.');
            hasErrors = true;
        }

        if (passwd.value === '') {
            displayError('Veuillez saisir le mot de passe.');
            hasErrors = true;
        }

        if (type.value === '') {
            displayError('Veuillez saisir le type.');
            hasErrors = true;
        }

        button.disabled = hasErrors;
    }

    function displayError(errorMessage) {
        var errorPara = document.createElement('p');
        errorPara.classList.add('error');
        errorPara.textContent = errorMessage;
        errorsDiv.appendChild(errorPara);
    }
</script>

</body>
</html>

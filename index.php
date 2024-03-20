<?php
require_once("connexion.php");

global $connect;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"]) && isset($_POST["passwd"])) {
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];

        $sql_etudiant= "SELECT * FROM etudiant WHERE login_etudiant = ? AND password_etudiant = ?";
        $query_etudiant = $connect->prepare($sql_etudiant);

        $sql_admin = "SELECT * FROM admin WHERE login_admin = ? AND password_admin = ?";
        $query_admin = $connect->prepare($sql_admin);

        $query_etudiant->execute([$login, $passwd]);
        $query_admin->execute([$login, $passwd]);

        if ($query_etudiant->rowCount() === 1 || $query_admin->rowCount() === 1) {
            if ($query_etudiant->rowCount() === 1) {
                $user = $query_etudiant->fetch(PDO::FETCH_ASSOC);
            } else {
                $user = $query_admin->fetch(PDO::FETCH_ASSOC);
            }

            if ($user['role'] == 'admin') {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: etudiant.php");
                exit();
            }
        } else {
            $error_message = "verifier vos identifiants";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="login-page">
        <h2 class="form-title">MEMOIRE IAM DAKAR 2023</h2>
        <div class="form">
            <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" name="login" placeholder="Nom d'utilisateur"/>
                <input type="password" name="passwd" placeholder="Mot de passe"/>
                <button type="submit">Connecter</button>
                <p class="message">Avez-vous un compte? <a href="inscription.php">Créer un compte</a></p><br>
                <div id="error"></div>
            </form>
        </div>
    </div>
    <?php if(isset($error_message)): ?>
    <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <script>
           document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector(".login-form");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        var login = document.querySelector("input[name='login']").value;
        var passwd = document.querySelector("input[name='passwd']").value;
        var errorMessage = "";

        if (login.trim() === "") {
            errorMessage += "<br> Veuillez saisir votre nom d'utilisateur.";
        }
        if (passwd.trim() === "") {
            errorMessage += "<br> Veuillez saisir votre mot de passe.";
        }

        var errorElement = document.getElementById('error'); 
        errorElement.innerHTML = errorMessage; 

        if (errorMessage === "") {
            this.submit();
        }
    });
});

    </script>
</body>
</html>

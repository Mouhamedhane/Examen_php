<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./profil_admin.css" />
    <title>Document</title>
  </head>
  <body>
  <div class="logo">
        <img src="logo.png">
        <ul>
            <li><a href="admin.php">Menu</a></li>
            <li><a href="#">Paramètres</a></li>
            <li><a href="profil_admin.php">Profil</a></li>
            <li><a href="index.php" onclick="return(confirm('Vous vous déconnectez ?'));"><button type="submit"  class="disconnect" >Déconnexion</button></a></li>
        </ul>
    </div>
    <div class="wrapper">
      <div class="profile-top">
        <div class="profile-image"></div>
      </div>

      <div class="profile-bottom">
        <div class="profile-infos">
          <div class="main-infos">
            <h3 class="name">Mouhamed Hann</h3>
            <p class="age grey">20</p>
          </div>
          <p class="email">Metta4284@gmail.com</p>
          <p class="ville"><ion-icon name="location"></ion-icon>Dakar</p>
        </div>

        <div class="profile-stats">
          <div class="stat-item">
            <p class="stat">MEMOIRE</p>
            <p class="grey">2024</p>
          </div>
          <div class="stat-item">
            <p class="stat">PHP</p>
            <p class="grey">2024</p>
          </div>
          <div class="stat-item">
            <p class="stat">dev_web</p>
            <p class="grey">Galsen</p>
          </div>
        </div>
      </div>
    </div>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
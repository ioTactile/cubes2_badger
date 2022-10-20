<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./dist/output.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <title>Portail de connexion</title>
</head>

<body class="flex flex-col justify-between items-center h-screen">
  <div>
    <div class="flex flex-col items-center">
      <img class="pt-6 pb-8 w-72 " src="./assets/cesi-logo.png" alt="logo cesi">
    </div>

    <div>
      <form class="shadow-sm shadow-black bg-gray-500/5 w-96" action="includes/login.inc.php" method="POST">
        <h2 class="p-2 text-center bg-neutral-700 text-white text-xl">Portail de connexion</h2>
        <div class="p-4 flex flex-col gap-2">
          <label class="pt-2" for="email">Adresse e-mail / Nom d'utilisateur</label>
          <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" placeholder="exemple@viacesi.fr / exemple" name="uid">

          <label for="password">Mot de passe</label>
          <input class="p-2 mb-8 border border-neutral-400 text-black" type="password" placeholder="Insérer votre mot de passe" name="password">

          <button class="p-2 bg-neutral-700 text-white hover:bg-yellow-400/90 active:bg-yellow-500 hover:text-black" name="submit" type="submit">Se connecter</button>
        </div>
      </form>
    </div>
    <span class="mt-4 text-red-500 text-xl text-center">
    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Remplissez tous les champs</p>";
      } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Données incorrectes</p>";
      }
    }
    ?>
      </span>
  </div>
    <footer class="bg-yellow-400 w-full h-7">
    </footer>
</body>
</html>
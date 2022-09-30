<?php
include_once "./components/UI/header_register.php";
?>
<div class="flex flex-col justify-center items-center w-full h-full">
  <form class="w-80 shadow-sm shadow-black bg-gray-500/5 md:w-96" action="includes/login.inc.php" method="POST">
    <h2 class="p-2 text-center bg-gray-500/10 text-white text-xl">Portail de connexion</h2>
    <div class="p-4 flex flex-col gap-2">
      <label class="pt-2" for="email">Adresse e-mail / Nom d'utilisateur</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" placeholder="exemple@viacesi.fr / exemple" name="uid">

      <label for="password">Mot de passe</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="password" placeholder="Insérer votre mot de passe" name="password">

      <button class="p-2 bg-gray-500/20 text-white hover:bg-sky-500/40 active:bg-sky-500/60" name="submit" type="submit">Se connecter</button>

    </div>
  </form>
  <div class="w-80 flex flex-col shadow-sm shadow-black bg-gray-500/5 md:w-96">
    <button class="p-2 text-center bg-gray-500/20 text-white hover:bg-sky-500/40 active:bg-sky-500/60"><a href="./signup.php">S'inscrire</a></button>
  </div>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Remplissez tous les champs</p>";
    } else if ($_GET["error"] == "wronglogin") {
      echo "<p>Données incorrectes</p>";
    }
  }
  ?>
</div>
</body>

</html>
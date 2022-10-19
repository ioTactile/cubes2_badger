<?php
include_once "./components/UI/header.php";
?>



<div class="flex flex-col justify-center items-center w-full h-full">
    <form class="shadow-sm shadow-black bg-gray-500/5" action="includes/signup.inc.php" method="POST">
        <h2 class="p-2 text-center bg-neutral-700 text-white text-xl">Créer un compte</h2>
        <div class="p-4 flex flex-col gap-2 w-full">

            <div class="flex flex-row justify-between">
                <div class="flex flex-col">
                    <label class="pt-2" for="lastname">Nom</label>
                    <input class="p-2 mb-8 border border-neutral-400 text-black w-72 mr-2" type="text" name="lastname" placeholder="Nom">
                </div>
                <div class="flex flex-col">
                    <label class="pt-2 ml-2" for="firstname">Prénom</label>
                    <input class="p-2 mb-8 border border-neutral-400 text-black w-72 ml-2" type="text" name="firstname" placeholder="Prénom">
                </div>
            </div>

            <div class="flex flex-row justify-between">
                <div class="flex flex-col">
                    <label class="pt-2 " for="email">Adresse e-mail</label>
                    <input class="p-2 mb-8 border border-neutral-400 text-black w-72 mr-2" type="text" name="email" placeholder="Adresse email">
                </div>
                <div class="flex flex-col">
                    <label class="pt-2 ml-2" for="username">Nom d'utilisateur</label>
                    <input class="p-2 mb-8 border border-neutral-400 text-black w-72 ml-2" type=" text" name="uid" placeholder="Nom d'utilisateur">
                </div>
            </div>

            <div class="flex flex-row justify-between">
                <div class="flex flex-col">
                    <label class="pt-2" for="password">Mot de passe</label>
                    <input class="p-2 mb-8 border border-neutral-400 text-black w-72 mr-2" type="password" name="password" placeholder="Insérer votre mot de passe">
                </div>
                <div class="flex flex-col">
                    <label class="pt-2 ml-2" for="passwordrpt">Mot de passe</label>
                    <input class="p-2 mb-8 border border-neutral-400 text-black w-72 ml-2" type="password" name="passwordrpt" placeholder="Répéter le mot de passe">
                </div>
            </div>

            <label class="pt-2" for="role">Choississez un rôle</label>

            <select class="mb-8 p-2 border border-neutral-400 text-black w-full " name="role" id="role">
                <option value="pilot">Pilote</option>
                <option value="administration">Administration</option>
                <option value="speaker">Intervenant</option>
                <option value="admin">Admin</option>
            </select>

            <button class="p-2 bg-neutral-700 text-white hover:bg-sky-500 active:bg-sky-500" name="submit" type="submit">Créer un utilisateur</button>

        </div>
    </form>
    <div class="mt-4 text-red-500 text-2xl">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Remplissez tous les champs</p>";
            } else if ($_GET["error"] == "invaliduid") {
                echo "<p>Nom d'utilisateur non disponible</p>";
            } else if ($_GET["error"] == "invalidemail") {
                echo "<p>Votre adresse email n'est pas valide</p>";
            } else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Mots de passe non identique</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Erreur non connue, reassayer</p>";
            }

            // else if ($_GET["error"] == "none") {
            //     echo "<button><a href='./index.php'>Se connecter</a></button>";
            // }
        }
        ?>
    </div>
</div>
</body>

</html>
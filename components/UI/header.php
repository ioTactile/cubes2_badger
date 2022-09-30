<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../dist/output.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

  <title>Tableau de bord</title>
</head>

<body class="h-screen flex overflow-x-hidden">
  <header id="header" class="fixed w-full h-20 bg-white shadow-sm shadow-black z-10 flex justify-between items-center">
    <a class="h-full" href="../home.php">
      <img class="p-4 h-20" src="https://www.cesi.fr/wp-content/themes/cesi/static/logo/default.svg" alt="" />
    </a>
    <div class="flex items-center gap-6 p-4">
      <span>
        Bonjour, <?php echo $_SESSION["useruid"]; ?>
      </span>

      <svg class="cursor-pointer" width="32" height="32" viewBox="0 0 1024 1024">
        <path fill="#404040" d="M512 512a192 192 0 1 0 0-384a192 192 0 0 0 0 384zm0 64a256 256 0 1 1 0-512a256 256 0 0 1 0 512zm320 320v-96a96 96 0 0 0-96-96H288a96 96 0 0 0-96 96v96a32 32 0 1 1-64 0v-96a160 160 0 0 1 160-160h448a160 160 0 0 1 160 160v96a32 32 0 1 1-64 0z" />
      </svg>

      <div class="block">
        <?php
        if (isset($_SESSION["useruid"])) {
          echo "<a href='/includes/logout.inc.php'><svg width='32' height='32' viewBox='0 0 24 24'><path fill='currentColor' fill-rule='evenodd' d='M3 5c0-1.1.9-2 2-2h8v2H5v14h8v2H5c-1.1 0-2-.9-2-2V5Zm14.176 6L14.64 8.464l1.414-1.414l4.95 4.95l-4.95 4.95l-1.414-1.414L17.176 13H10.59v-2h6.586Z'/></svg></a>";
        }

        ?>
      </div>

      <div id="burgerMenu" class="p-4 lg:hidden">
        <svg class="cursor-pointer" width="32" height="32" viewBox="0 0 48 48">
          <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
            <path d="M7.94971 11.9497H39.9497" />
            <path d="M7.94971 23.9497H39.9497" />
            <path d="M7.94971 35.9497H39.9497" />
          </g>
        </svg>
      </div>
    </div>
  </header>

  <nav id="navBar" class="hidden fixed lg:block bg-neutral-700 w-full h-full text-white pt-12 mt-20 z-10 lg:w-[17%]">
    <ul class="h-full flex flex-col gap-y-2 text-sm">

      <li class="text-center pb-3 hover:text-sky-400">
        <a class="navLinks flex items-center justify-center" href="#emploidutemps">Emploi du temps</a>
      </li>

      <HR class="w-1/2 self-center">
      </HR>

      <li class="text-center py-3 hover:text-sky-400">
        <a class="navLinks" href="#Validationdesprésences">Validations des présences</a>
      </li>

      <HR class="w-1/2 self-center">
      </HR>

      <li class="text-center py-3 hover:text-sky-400">
        <a class="navLinks" href="/students.php">Gestion des apprenants</a>
      </li>

      <HR class="w-1/2 self-center">
      </HR>

      <li class="text-center py-3 hover:text-sky-400">
        <a class="navLinks" href="/promotions.php">Gestion des promotions</a>
      </li>
      <HR class="w-1/2 self-center">
      </HR>

      <li class="text-center py-3 hover:text-sky-400">
        <a class="navLinks" href="/sessions.php">Gestion des cours</a>
      </li>

      <HR class="w-1/2 self-center">
      </HR>

    </ul>
  </nav>

  <main class="relative h-full mt-20 ml-[17%] w-[83%]">
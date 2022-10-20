<?php
include_once "./components/UI/header.php";
?>


<div class="fixed mt-20 w-full lg:w-[83%]">
  <div class="grid grid-cols-6">
    <h2 class="col-span-4 md:text-xl text-bold bg-white py-3 px-6 text-lg flex items-center justify-center border-r border-neutral-700">Liste des promotions </h2>
    <button class="col-span-2 bg-yellow-400 text-black py-3 px-6 cursor-pointer text-sm md:text-lg"><a href=" ./addpromotion.php">Ajouter une promotion</a></button>
  </div>
  <table class="fixed w-full lg:w-[83%] ">
    <thead class="border-b border-t border-neutral-700 bg-white">
      <tr class="flex justify-between items-center">
        <th class="banner">Nom</th>
        <th class="banner">Référence</th>
        <th class="banner">Référent</th>
        <th class="banner hidden md:block">Période</th>
        <th class="banner">Action</th>
      </tr>
    </thead>
  </table>
</div>

<?php
include_once './includes/dbh.inc.php';
$result = mysqli_query($conn, "SELECT * FROM `promotions`");
?>

<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table class="w-full mt-[11.5rem]">
    <?php
    $i = 0;
    while ($promo = mysqli_fetch_array($result)) {
    ?>

      <tbody>
        <tr class="bg-white border-b text-center flex justify-between items-center">
          <td class="inBanner"><?= $promo["name"] ?></td>
          <td class="inBanner"><?= $promo["reference"] ?></td>
          <td class="inBanner"><?= $promo["referer"] ?></td>
          <td class="md:inBanner hidden md:inline-table"><?= $promo["start_at"] ?></br><?= $promo["finished_at"] ?></td>
          <td class="inBanner">
            <div class="flex items-center justify-center">
              <a href="./updatepromotion.php?id=<?php echo $promo["id"]; ?>" title="Modifier">
                <svg width="20" height="20" viewBox="0 0 24 24">
                  <path fill="#404040" d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75L3 17.25Z" />
                </svg>
              </a>
              <a href="./includes/deletepromotion.inc.php?id=<?php echo $promo["id"]; ?>" title='Supprimer'>
                <svg width="20" height="20" viewBox="0 0 24 24">
                  <path fill="#404040" d="M4 8h16v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8zm2 2v10h12V10H6zm3 2h2v6H9v-6zm4 0h2v6h-2v-6zM7 5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h5v2H2V5h5zm2-1v1h6V4H9z" />
                </svg>
              </a>
            </div>
          </td>
        </tr>
      <?php $i++;
    } ?>
      </tbody>
  </table>

<?php
} else {
  echo "No result found";
}
?>
</main>
</body>
<script src="./src/main.js"></script>

</html>
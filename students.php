<?php
include_once "./components/UI/header.php";
?>

<div class="fixed mt-20 w-full lg:w-[83%]">
  <div class="grid grid-cols-6">
    <h2 class="col-span-4 md:text-xl text-bold bg-white py-3 px-6 text-lg flex items-center justify-center">Liste des apprenants </h2>
    <button class="col-span-2 bg-emerald-700 text-white py-3 px-6 cursor-pointer text-sm md:text-lg"><a href=" ./addstudent.php">Ajouter un apprenant</a></button>
  </div>
  <table class="fixed w-full lg:w-[83%]">
    <thead class="border-b bg-neutral-700">
      <th scope="col" class="text-sm font-medium text-white px-6 py-4">Numéro</th>
      <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nom</th>
      <th scope="col" class="text-sm font-medium text-white px-6 py-4">Prénom</th>
      <th scope="col" class="text-sm font-medium text-white px-6 py-4">Email</th>
      <th scope="col" class="text-sm font-medium text-white px-6 py-4">Action</th>
    </thead>
  </table>
</div>

<?php
include_once './includes/dbh.inc.php';
$result = mysqli_query($conn, "SELECT * FROM `students`");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table class="w-full mt-[11.5rem]">
    <?php
    $i = 0;
    while ($student = mysqli_fetch_array($result)) {
    ?>
      <tbody>
        <tr class="bg-white border-b text-center flex justify-between items-center">
          <td class="inBanner"><?= $student["school_id"] ?></td>
          <td class="inBanner"><?= $student["lastname"] ?></td>
          <td class="inBanner"><?= $student["firstname"] ?></td>
          <td class="inBanner"><?= $student["email"] ?></td>
          <td class="inBanner">
            <div class="flex items-center justify-center">
              <a href="./updatestudent.php?id=<?php echo $student["id"]; ?>" title="Modifier"><svg width="20" height="20" viewBox="0 0 24 24">
                  <path fill="#404040" d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75L3 17.25Z" />
                </svg></a>
              <a href="./includes/deletestudent.inc.php?id=<?php echo $student["id"]; ?>" title='Supprimer'><svg width="20" height="20" viewBox="0 0 24 24">
                  <path fill="#404040" d="M4 8h16v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8zm2 2v10h12V10H6zm3 2h2v6H9v-6zm4 0h2v6h-2v-6zM7 5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h5v2H2V5h5zm2-1v1h6V4H9z" />
                </svg></a>
            </div>
          </td>
        </tr>
      <?php
      $i++;
    }
      ?>
      </tbody>
  </table>
<?php
} else {
  echo "No result found";
}
?>
</main>
</body>

</html>
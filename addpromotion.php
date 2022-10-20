<?php
require_once "./includes/dbh.inc.php";
if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $reference = $_POST['reference'];
  $referer = $_POST['referer'];
  $start_at = $_POST['start_at'];
  $finished_at = $_POST['finished_at'];
  $sql = "INSERT INTO `promotions` (`name`,`reference`,`referer`,`start_at`,`finished_at`) 
  VALUES ('$name','$reference','$referer','$start_at','$finished_at')";
  if (mysqli_query($conn, $sql)) {
    header("location: ./promotions.php");
    exit();
  } else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>
<?php
include_once "./components/UI/header.php";
?>


<div class="flex flex-col justify-center items-center w-full h-full">


  <form class=" w-80 shadow-sm shadow-black bg-gray-500/5 md:w-96" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h2 class="p-2 text-center bg-neutral-700 text-white text-xl">Ajouter une promotion </h2>
    <div class="p-4 flex flex-col gap-2">
      <label class="pt-2" for=name>Nom</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="name" name="name" placeholder="Développeur Info" required=""></input>
      <label for=reference>Référence</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="reference" name="reference" placeholder="REDH207C" required=""></input>
      <label for=referer>Référant</label>
      <select class="p-2 mb-8 border border-neutral-400 text-black" name="referer" id="referer" required="">
        <?php
        $sql = "SELECT * FROM staff";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['firstname'] . " " . $row['lastname'] . '</option>';
        }
        ?>
      </select>
      <label for=start_at>Début</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="start_at" name="start_at" required=""></input>
      <label for=finished_at>Fin</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="finished_at" name="finished_at" required=""></input>
    </div>
  </form>
  <div class="w-80 flex flex-col shadow-sm shadow-black bg-gray-500/5 md:w-96">
    <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./promotions.php';" />
    <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer" name="save" type="submit" value="Ajouter">
  </div>
</div>

</main>
</body>


</html>
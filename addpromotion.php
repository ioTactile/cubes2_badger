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
<section class="flex justify-center items-center">
  <form class="w-full lg:w-11/12 mt-20 lg:mt-32 border bg-white border-neutral-700" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h2 class="p-2 text-center border-b  border-neutral-700 bg-yellow-300 text-black text-xl text-bold">Ajouter une promotion </h2>
    <div class="p-4 flex flex-col gap-2">
      <label class="pt-2 lg:text-lg" for=name>Nom</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="name" name="name" placeholder="Développeur Info" required="" />
      <label class="lg:text-lg" for=reference>Référence</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="reference" name="reference" placeholder="REDH207C" required="" />
      <label class="lg:text-lg" for=referer>Référant</label>
      <select class="p-2 mb-8 border border-neutral-400 bg-white text-black" name="referer" id="referer" required="">
        <?php
        $sql = "SELECT * FROM staff";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['firstname'] . " " . $row['lastname'] . '</option>';
        }
        ?>
      </select>
      <label class="lg:text-lg" for=start_at>Début</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="start_at" name="start_at" required="" />
      <label class="lg:text-lg" for=finished_at>Fin</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="finished_at" name="finished_at" required="" />
    </div>
    <div class="w-full flex flex-col lg:flex-row-reverse lg:justify-start border-t border-neutral-700 ">
      <input class="bg-yellow-400 text-black lg:py-4 lg:px-20 py-2 cursor-pointer" name="save" type="submit" value="Ajouter">
      <input class=" hover:bg-red-500 text-black lg:py-4 lg:px-20 py-2 cursor-pointer border border-l border-r lg:border-y-0 bg-white border-neutral-700" type="button" value="Annuler" onclick="location.href='./promotions.php';" />
    </div>
  </form>
</section>
</main>
</body>
<script src="./src/main.js"></script>

</html>
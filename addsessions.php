<?php
require_once "./includes/dbh.inc.php";
if (isset($_POST['save'])) {
  $title = $_POST['title'];
  $enable_to_badge_at = $_POST['enable_to_badge_at'];
  $classroom = $_POST['classroom'];
  $referer = $_POST['referer'];
  $promotion_id = $_POST['promotion_id'];
  $start_at = $_POST['start_at'];
  $end_at = $_POST['end_at'];
  $sql = "INSERT INTO `sessions` (`title`,`enable_to_badge_at`, `classroom`, `referer`, `promotion_id`, `start_at`, `end_at`) 
  VALUES ('$title','$enable_to_badge_at', '$classroom', '$referer', '$promotion_id', '$start_at', '$end_at')";

  if (mysqli_query($conn, $sql)) {
    header("location: ./sessions.php");
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
    <h2 class="p-2 text-center border-b  border-neutral-700 bg-yellow-300 text-black text-xl text-bold">Ajouter un cours</h2>
    <div class="p-4 flex flex-col gap-2">
      <label class="pt-2 lg:text-lg" for=title>Titre</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="title" name="title" placeholder="PHP" required="" />
      <label class="lg:text-lg" for=classroom>Salle</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="classroom" name="classroom" placeholder="007" required="" />
      <label class="lg:text-lg" for=referer>Référant</label>
      <select class="p-2 mb-8 border border-neutral-400 bg-white text-black" name=" referer" id="referer" required="">
        <?php
        $sql = "SELECT * FROM `staff`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['firstname'] . " " . $row['lastname'] . '</option>';
        }
        ?>
      </select>
      <label class="lg:text-lg" for=promotion_id>Promotion</label>
      <select class="p-2 mb-8 border border-neutral-400 bg-white text-black" name=" promotion_id" id="promotion_id" required="">
        <?php
        $sql = "SELECT * FROM `promotions`";
        $result = mysqli_query($conn, $sql);
        while ($row2 = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row2['id'] . '">' . $row2['id'] . " - " . $row2['name']  . '</option>';
        }
        ?>
      </select>
      <label class="lg:text-lg" for=enable_to_badge_at>Heure d'activation badgeuse</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="datetime-local" id="enable_to_badge_at" name="enable_to_badge_at" required="" />
      <label class="lg:text-lg" for=start_at>Début</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="datetime-local" id="start_at" name="start_at" required="" />
      <label class="lg:text-lg" for=end_at>Fin</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="datetime-local" id="end_at" name="end_at" required="" />
    </div>
    <div class="w-full flex flex-col lg:flex-row-reverse lg:justify-start border-t border-neutral-700">
      <input class="bg-yellow-400 text-black lg:py-4 lg:px-20 py-2 cursor-pointer" name="save" type="submit" value="Ajouter">
      <input class=" hover:bg-red-500 text-black lg:py-4 lg:px-20 py-2 cursor-pointer border border-l border-r lg:border-y-0 bg-white border-neutral-700" type="button" value="Annuler" onclick="location.href='./sessions.php';" />
    </div>
  </form>
</section>
</main>
</body>
<script src="./src/main.js"></script>

</html>
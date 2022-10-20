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
<div class="flex flex-col justify-center items-center w-full h-full">
  <form class=" w-80 shadow-sm shadow-black bg-gray-500/5 md:w-96" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h2 class="p-2 text-center bg-neutral-700 text-white text-xl" class="text-xl text-bold">Ajouter un cours</h2>
    <div class="p-4 flex flex-col gap-2">
      <label class="pt-2" for=title>Titre</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="title" name="title" placeholder="PHP" required=""></input>
      <label for=classroom>Salle</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="classroom" name="classroom" placeholder="007" required=""></input>
      <label for=referer>Référant</label>
      <select class="p-2 mb-8 border border-neutral-400 text-black" name="referer" id="referer" required="">
        <?php
        $sql = "SELECT * FROM `staff`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['firstname'] . " " . $row['lastname'] . '</option>';
        }
        ?>
      </select>
      <label for=promotion_id>Promotion</label>
      <select class="p-2 mb-8 border border-neutral-400 text-black" name="promotion_id" id="promotion_id" required="">
        <?php
        $sql = "SELECT * FROM `promotions`";
        $result = mysqli_query($conn, $sql);
        while ($row2 = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row2['id'] . '">' . $row2['id'] . " - " . $row2['name']  . '</option>';
        }
        ?>
      </select>
      <label for=enable_to_badge_at>Heure d'activation badgeuse</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="datetime-local" id="enable_to_badge_at" name="enable_to_badge_at" required=""></input>
      <label for=start_at>Début</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="datetime-local" id="start_at" name="start_at" required=""></input>
      <label for=end_at>Fin</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="datetime-local" id="end_at" name="end_at" required=""></input>
    </div>
  </form>
  <div class="w-80 flex flex-col shadow-sm shadow-black bg-gray-500/5 md:w-96">
    <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./sessions.php';" />
    <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer" name="save" type="submit" value="Ajouter">
  </div>

  </main>
  </body>


  </html>
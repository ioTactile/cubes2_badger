<?php
include_once "./components/UI/header.php";
?>
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

<div>
  <section>
    <div class="flex items-center justify-center w-[100%] bg-neutral-200 py-4">
      <h2 class="text-xl text-bold">Ajouter un cours</h2>
    </div>

    <div class="overflow-x-auto sm:-sx-6 lg:-mx-8">
      <div class=" inline-block min-w-full sm:-px-6 lg:px-8">
        <table class="min-w-full">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <thead class="border-b bg-neutral-700">

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=title>Titre</label>
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=classroom>Salle</label>
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=referer>Référant</label>
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=promotion_id>Promotion</label>
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=enable_to_badge_at>Heure d'activation badgeuse</label>
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=start_at>Début</label>
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=end_at>Fin</label>
              </th>
            </thead class="border-b">
            <tbody>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="title" name="title" placeholder="PHP" required=""></input>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="classroom" name="classroom" placeholder="007" required=""></input>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <select name=" referer" id="referer" required="">
                  <?php
                  $sql = "SELECT * FROM `staff`";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['firstname'] . " " . $row['lastname'] . '</option>';
                  }
                  ?>
                </select>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <select name=" promotion_id" id="promotion_id" required="">
                  <?php
                  $sql = "SELECT * FROM `promotions`";
                  $result = mysqli_query($conn, $sql);
                  while ($row2 = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row2['id'] . '">' . $row2['id'] . " - " . $row2['name']  . '</option>';
                  }
                  ?>
                </select>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="datetime-local" id="enable_to_badge_at" name="enable_to_badge_at" required=""></input>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="datetime-local" id="start_at" name="start_at" required=""></input>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="datetime-local" id="end_at" name="end_at" required=""></input>
              </td>
            </tbody>
            </thead>
        </table>
        <div class="flex justify-end bg-neutral-200">
          <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./sessions.php';" />
          <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer" name="save" type="submit" value="Ajouter">
        </div>
        </form>
      </div>
    </div>
  </section>
</div>
</section>
</main>
</body>
<script src="./src/main.js"></script>

</html>
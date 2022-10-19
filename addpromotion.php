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
  <section>
    <form class="bg-red-600" action="">
    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=name>Nom</label>
    </th>

    </form>
  </section>
  <!-- <section>

    <div class="flex items-center justify-center w-[100%] bg-neutral-200 py-4">
      <h2 class="text-xl text-bold">Ajouter une promotion </h2>
    </div>

    <div class="overflow-x-auto sm:-sx-6 lg:-mx-8">
      <div class=" inline-block min-w-full sm:-px-6 lg:px-8">
        <table class="min-w-full">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <thead class="border-b bg-neutral-700">

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=name>Nom</label>
              </th>

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=reference>Référence</label>
              </th>

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=referer>Référant</label>
              </th>

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=start_at>Début</label>
              </th>

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=finished_at>Fin</label>
              </th>

            </thead class="border-b">

            <tbody>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="name" name="name" placeholder="Développeur Info" required=""></input>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="reference" name="reference" placeholder="REDH207C" required=""></input>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <select name="referer" id="referer" required="">
                  <?php
                  $sql = "SELECT * FROM staff";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['firstname'] . " " . $row['lastname'] . '</option>';
                  }
                  ?>
                </select>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="date" id="start_at" name="start_at" required=""></input>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="date" id="finished_at" name="finished_at" required=""></input>
              </td>

              </tr>
            </tbody>
        </table>

        <div class="flex justify-end bg-neutral-200">
          <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./promotions.php';" />
          <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer" name="save" type="submit" value="Ajouter">
        </div>
        </form>
      </div>
    </div>
  </section>
</div>
</section> -->
</main>
</body>
<script src="./src/main.js"></script>

</html>
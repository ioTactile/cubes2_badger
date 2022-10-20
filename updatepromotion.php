<?php
require_once './includes/dbh.inc.php';
if (count($_POST) > 0) {
  mysqli_query($conn, "UPDATE promotions set name='" . $_POST['name'] .
    "' ,reference='" . $_POST['reference'] .
    "' ,referer='" . $_POST['referer'] .
    "' ,start_at='" . $_POST['start_at'] .
    "' ,finished_at='" . $_POST['finished_at'] .
    "' WHERE id='" . $_POST['id'] . "'");
  header("location: /promotions.php");
  exit();
}
$sql = "SELECT * FROM promotions WHERE id='" . $_GET['id'] . "'";
$result = mysqli_query($conn, $sql);
$promo = mysqli_fetch_array($result);
?>

<?php
include_once "./components/UI/header.php";
?>

<section>
  <div class="flex flex-col justify-center items-center w-full h-full">
    <form class=" w-80 shadow-sm shadow-black bg-gray-500/5 md:w-96" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
      <h2 class="p-2 text-center bg-neutral-700 text-white text-xl" class="text-xl text-bold">Modifier la promotion: <?php echo $promo['name']; ?></h2>
      <div class="p-4 flex flex-col gap-2">
        <label class="pt-2" for=name>Nom</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="name" name="name" value="<?php echo $promo["name"]; ?>" required=""></input>
        <label for=reference>Référence</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="reference" name="reference" value="<?php echo $promo["reference"]; ?>" required=""></input>
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
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="start_at" name="start_at" value="<?php echo $promo["start_at"]; ?>" required=""></input>
        <label for=finished_at>Fin</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="finished_at" name="finished_at" value="<?php echo $promo["finished_at"]; ?>" required=""></input>
      </div>
    </form>
    <div class="w-80 flex flex-col shadow-sm shadow-black bg-gray-500/5 md:w-96">
      <input type="hidden" name="id" value="<?php echo $promo["id"]; ?>" />
      <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./promotions.php';" />
      <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer " type="submit" value="Modifier">
    </div>
  </div>
</section>
</main>
</body>

</html>
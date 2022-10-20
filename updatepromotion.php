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

<section class="flex justify-center items-center">
    <form class="w-full lg:w-11/12 mt-20 lg:mt-32 border bg-white border-neutral-700" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
      <h2 class="p-2 text-center border-b  border-neutral-700 bg-yellow-300 text-black text-xl text-bold">Modifier la promotion: <?php echo $promo['name']; ?></h2>
        <div class="p-4 flex flex-col gap-2">
            <label class="pt-2 lg:text-lg" for=name>Nom</label>
            <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="name" name="name" value="<?php echo $promo["name"]; ?>" required=""/>
            <label class="lg:text-lg" for=reference>Référence</label>
            <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="reference" name="reference" value="<?php echo $promo["reference"]; ?>" required=""/>
            <label class="lg:text-lg"  for=referer>Référant</label>
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
            <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="start_at" name="start_at" value="<?php echo $promo["start_at"]; ?>" required=""/>
            <label class="lg:text-lg" for=finished_at>Fin</label>
            <input class="p-2 mb-8 border border-neutral-400 text-black" type="date" id="finished_at" name="finished_at" value="<?php echo $promo["finished_at"]; ?>" required=""/>
        </div>
        <div class="w-full flex flex-col lg:flex-row-reverse lg:justify-start border-t border-neutral-700 ">
            <input type="hidden" name="id" value="<?php echo $promo["id"]; ?>" />
            <input class="bg-yellow-400 text-black lg:py-4 lg:px-20 py-2 cursor-pointer" type="submit" value="Modifier">
            <input class=" hover:bg-red-500 text-black lg:py-4 lg:px-20 py-2 cursor-pointer border border-l border-r lg:border-y-0 bg-white border-neutral-700" type="button" value="Annuler" onclick="location.href='./promotions.php';" />
        </div>
    </form>
</section>
</main>
</body>
<script src="./src/main.js"></script>
</html>
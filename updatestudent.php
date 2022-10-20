<?php
require_once './includes/dbh.inc.php';
if (count($_POST) > 0) {
  mysqli_query($conn, "UPDATE students set school_id='" . $_POST['school_id'] .
    "' ,lastname='" . $_POST['lastname'] .
    "' ,firstname='" . $_POST['firstname'] .
    "' ,emaik='" . $_POST['email'] .
    "' WHERE id='" . $_POST['id'] . "'");
  header("location: /students.php");
  exit();
}
$sql = "SELECT * FROM students WHERE id='" . $_GET['id'] . "'";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_array($result);
?>

<?php
include_once "./components/UI/header.php";
?>

<section class="flex justify-center items-center">
  <form class="w-full lg:w-11/12 mt-20 lg:mt-32 border bg-white border-neutral-700" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
    <h2 class="p-2 text-center border-b  border-neutral-700 bg-yellow-300 text-black text-xl text-bold">Modifier l'apprenant: <?php echo $student['firstname'] . " " . $student['lastname']; ?></h2>
    <div class="p-4 flex flex-col gap-2">
      <label class="pt-2 lg:text-lg" for=name>Numéro</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="school_id" name="school_id" value="<?php echo $student["school_id"]; ?>" required="" />
      <label class="lg:text-lg" for=reference>Nom</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="lastname" name="lastname" value="<?php echo $student["lastname"]; ?>" required="" />
      <label class="lg:text-lg" for=referer>Prénom</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="firstname" name="firstname" value="<?php echo $student["firstname"]; ?>" required="" />
      <label class="lg:text-lg" for=start_at>Email</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="email" id="email" name="email" value="<?php echo $student["email"]; ?>" required="" />
    </div>
    <div class="w-full flex flex-col lg:flex-row-reverse lg:justify-start border-t border-neutral-700">
      <input type="hidden" name="id" value="<?php echo $student["id"]; ?>" />
      <input class="bg-yellow-400 text-black lg:py-4 lg:px-20 py-2 cursor-pointer" type="submit" value="Modifier">
      <input class=" hover:bg-red-500 text-black lg:py-4 lg:px-20 py-2 cursor-pointer border border-l border-r lg:border-y-0 bg-white border-neutral-700" type="button" value="Annuler" onclick="location.href='./students.php';" />
    </div>
  </form>
</section>

</main>
</body>
<script src="./src/main.js"></script>

</html>
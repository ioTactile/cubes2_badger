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

<section>
  <div class="flex flex-col justify-center items-center w-full h-full pt-20">
    <form class=" w-80 shadow-sm shadow-black bg-gray-500/5 md:w-96" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
      <h2 class="p-2 text-center bg-neutral-700 text-white text-xl">Modifier l'apprenant: <?php echo $student['firstname'] . " " . $student['lastname']; ?></h2>
      <div class="p-4 flex flex-col gap-2">
        <label class="pt-2" for=name>Numéro</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="school_id" name="school_id" value="<?php echo $student["school_id"]; ?>" required=""></input>
        <label for=reference>Nom</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="lastname" name="lastname" value="<?php echo $student["lastname"]; ?>" required=""></input>
        <label for=referer>Prénom</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="firstname" name="firstname" value="<?php echo $student["firstname"]; ?>" required=""></input>
        <label for=start_at>Email</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="email" id="email" name="email" value="<?php echo $student["email"]; ?>" required=""></input>
      </div>
    </form>
    <div class="w-80 flex flex-col shadow-sm shadow-black bg-gray-500/5 md:w-96">
      <input type="hidden" name="id" value="<?php echo $student["id"]; ?>" />
      <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./students.php';" />
      <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer " type="submit" value="Modifier">
    </div>
  </div>
</section>

</main>
</body>

</html>
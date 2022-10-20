<?php
require_once "./includes/dbh.inc.php";
if (isset($_POST['save'])) {
  $school_id = $_POST['school_id'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $email = $_POST['email'];
  $sql = "INSERT INTO `students` (`school_id`,`lastname`,`firstname`,`email`) 
  VALUES ('$school_id','$lastname','$firstname','$email')";
  if (mysqli_query($conn, $sql)) {
    header("location: ./students.php");
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
  <div class="flex flex-col justify-center items-center w-full h-full pt-20">
    <form class=" w-80 shadow-sm shadow-black bg-gray-500/5 md:w-96" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <h2 class="p-2 text-center bg-neutral-700 text-white text-xl">Ajouter un apprenant</h2>
      <div class="p-4 flex flex-col gap-2">
        <label class="pt-2" for=name>Numéro</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type=" text" id="school_id" name="school_id" placeholder="2022003" required=""></input>
        <label for=reference>Nom</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="lastname" name="lastname" placeholder="Bibou" required=""></input>
        <label for=referer>Prénom</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="firstname" name="firstname" placeholder="Bernard" required=""></input>
        <label for=start_at>Email</label>
        <input class="p-2 mb-8 border border-neutral-400 text-black" type="email" id="email" name="email" placeholder="bernard.bibou@viacesi.fr" required=""></input>
      </div>
    </form>
    <div class="w-80 flex flex-col shadow-sm shadow-black bg-gray-500/5 md:w-96">
      <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./students.php';" />
      <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer" name="save" type="submit" value="Ajouter">
    </div>
  </div>
</section>
</main>
</body>


</html>
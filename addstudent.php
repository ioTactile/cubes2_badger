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
<section class="flex justify-center items-center">

  <form class="w-full lg:w-11/12 mt-20 lg:mt-32 border bg-white border-neutral-700" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h2 class="p-2 text-center border-b  border-neutral-700 bg-yellow-300 text-black text-xl text-bold">Ajouter un apprenant</h2>
    <div class="p-4 flex flex-col gap-2">
      <label class="pt-2 lg:text-lg" for=name>Numéro</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="school_id" name="school_id" placeholder="2022003" required="" />
      <label class="lg:text-lg" for=reference>Nom</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="lastname" name="lastname" placeholder="Bibou" required="" />
      <label class="lg:text-lg" for=referer>Prénom</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="text" id="firstname" name="firstname" placeholder="Bernard" required="" />
      <label class="lg:text-lg" for=start_at>Email</label>
      <input class="p-2 mb-8 border border-neutral-400 text-black" type="email" id="email" name="email" placeholder="bernard.bibou@viacesi.fr" required="" />
    </div>
    <div class="w-full flex flex-col lg:flex-row-reverse lg:justify-start border-t border-neutral-700 ">
      <input class="bg-yellow-400 text-black lg:py-4 lg:px-20 py-2 cursor-pointer" name="save" type="submit" value="Ajouter">
      <input class="hover:bg-red-500 text-black lg:py-4 lg:px-20 py-2 cursor-pointer border border-l border-r lg:border-y-0 bg-white border-neutral-700" type="button" value="Annuler" onclick="location.href='./students.php';" />
    </div>
  </form>
</section>
</main>
</body>
<script src="./src/main.js"></script>

</html>
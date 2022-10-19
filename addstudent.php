<?php
include_once "./components/UI/header.php";
?>
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

<div>
  <section>

    <div class="flex items-center justify-center w-[100%] bg-neutral-200 py-4">
      <h2 class="text-xl text-bold">Ajouter un apprenant</h2>
    </div>

    <div class="overflow-x-auto sm:-sx-6 lg:-mx-8">
      <div class=" inline-block min-w-full sm:-px-6 lg:px-8">
        <table class="min-w-full">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <thead class="border-b bg-neutral-700">

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=name>Numéro</label>
              </th>

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=reference>Nom</label>
              </th>

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=referer>Prénom</label>
              </th>

              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                <label for=start_at>Email</label>
              </th>

            </thead class="border-b">

            <tbody>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="school_id" name="school_id" placeholder="2022003" required=""></input>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="lastname" name="lastname" placeholder="Bibou" required=""></input>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="firstname" name="firstname" placeholder="Bernard" required=""></input>
              </td>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="email" id="email" name="email" placeholder="bernard.bibou@viacesi.fr" required=""></input>
              </td>

              </tr>
            </tbody>

        </table>

        <div class="flex justify-end bg-neutral-200">
          <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./students.php';" />
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
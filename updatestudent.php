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

  <div class="flex items-center justify-center w-[100%] bg-neutral-200 py-4">
    <h2 class="text-xl text-bold">Modifier l'apprenant: <?php echo $student['firstname'] . " " . $student['lastname']; ?></h2>
  </div>

  <div class="overflow-x-auto sm:-sx-6 lg:-mx-8">
    <div class=" inline-block min-w-full sm:-px-6 lg:px-8">
      <table class="min-w-full">
        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">

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

            <tr class="bg-white border-b">

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="school_id" name="school_id" value="<?php echo $student["school_id"]; ?>" required=""></input>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="lastname" name="lastname" value="<?php echo $student["lastname"]; ?>" required=""></input>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="text" id="firstname" name="firstname" value="<?php echo $student["firstname"]; ?>" required=""></input>
              </td>

              <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                <input type="email" id="email" name="email" value="<?php echo $student["email"]; ?>" required=""></input>
              </td>

            </tr>
          </tbody>

      </table>

      <div class="flex justify-end bg-neutral-200">
        <input type="hidden" name="id" value="<?php echo $student["id"]; ?>" />
        <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./students.php';" />
        <input class="bg-emerald-700 text-white py-4 px-14 cursor-pointer " type="submit" value="Modifier">
      </div>
      </form>
    </div>
  </div>
</section>

</section>
</main>
</body>
<script src="./src/main.js"></script>

</html>
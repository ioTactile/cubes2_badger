<?php
include_once "./components/UI/header.php";
?>

<div class="flex flex-col w-full">
  <div class="flex justify-between bg-neutral-200">
    <div class="flex items-center justify-center w-[65%]">
      <h2 class="text-xl text-bold">Liste des apprenants </h2>
    </div>
    <button class="w-[35%] bg-emerald-700 text-white py-3 px-6 cursor-pointer "><a href=" ./addstudent.php">Ajouter un apprenant</a></button>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-sx-6 lg:-mx-8">
      <div class=" inline-block min-w-full sm:-px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b bg-neutral-700">
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">Numéro</th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nom</th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">Prénom</th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">Email</th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">Action</th>
            </thead class="border-b">
            <?php
            include_once './includes/dbh.inc.php';
            $result = mysqli_query($conn, "SELECT * FROM `students`");
            ?>
            <?php
            if (mysqli_num_rows($result) > 0) {
            ?>
              <tbody>
                <?php
                $i = 0;
                while ($student = mysqli_fetch_array($result)) {
                ?>
                  <tr class="bg-white border-b text-center">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?= $student["school_id"] ?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?= $student["lastname"] ?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?= $student["firstname"] ?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?= $student["email"] ?></td>
                    <td class="flex px-6 py-4 justify-center">
                      <a href="./updatestudent.php?id=<?php echo $student["id"]; ?>" title="Modifier"><svg width="20" height="20" viewBox="0 0 24 24">
                          <path fill="#404040" d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75L3 17.25Z" />
                        </svg></a>
                      <a href="./includes/deletestudent.inc.php?id=<?php echo $student["id"]; ?>" title='Supprimer'><svg width="20" height="20" viewBox="0 0 24 24">
                          <path fill="#404040" d="M4 8h16v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8zm2 2v10h12V10H6zm3 2h2v6H9v-6zm4 0h2v6h-2v-6zM7 5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h5v2H2V5h5zm2-1v1h6V4H9z" />
                        </svg></a>
                    </td>
                  </tr>
                <?php
                  $i++;
                }
                ?>
              </tbody>

          </table>
        <?php
            } else {
              echo "No result found";
            }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main>
</body>
<script src="./src/main.js"></script>

</html>
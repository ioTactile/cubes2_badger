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

    <div class="flex items-center justify-center w-[100%] bg-neutral-200 py-4">
        <h2 class="text-xl text-bold">Modifier la promotion: <?php echo $promo['name']; ?></h2>
    </div>

    <div class="overflow-x-auto sm:-sx-6 lg:-mx-8">
        <div class=" inline-block min-w-full sm:-px-6 lg:px-8">
            <table class="min-w-full">
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">

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

                        <tr class="bg-white border-b">

                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="text" id="name" name="name" value="<?php echo $promo["name"]; ?>" required=""></input>
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="text" id="reference" name="reference" value="<?php echo $promo["reference"]; ?>" required=""></input>
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
                                <input type="date" id="start_at" name="start_at" value="<?php echo $promo["start_at"]; ?>" required=""></input>
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="date" id="finished_at" name="finished_at" value="<?php echo $promo["finished_at"]; ?>" required=""></input>
                            </td>

                        </tr>
                    </tbody>

            </table>

            <div class="flex justify-end bg-neutral-200">
                <input type="hidden" name="id" value="<?php echo $promo["id"]; ?>" />
                <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./promotions.php';" />
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
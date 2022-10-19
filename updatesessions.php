<?php
include_once "./components/UI/header.php";
?>

<?php
require_once './includes/dbh.inc.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE `sessions` set title='" . $_POST['title'] .
        "' ,enable_to_badge_at='" . $_POST['enable_to_badge_at'] .
        "' ,classroom='" . $_POST['classroom'] .
        "' ,referer='" . $_POST['referer'] .
        "' ,promotion_id='" . $_POST['promotion_id'] .
        "' ,start_at='" . $_POST['start_at'] .
        "' ,end_at='" . $_POST['end_at'] .
        "' WHERE id='" . $_POST['id'] . "'");
    header("location: /sessions.php");
    exit();
}
$sql = "SELECT * FROM `sessions` WHERE id='" . $_GET['id'] . "'";
$result = mysqli_query($conn, $sql);
$session = mysqli_fetch_array($result);
?>



<section>

    <div class="flex items-center justify-center w-[100%] bg-neutral-200 py-4">
        <h2 class="text-xl text-bold">Modifier le cours</h2>
    </div>

    <div class="overflow-x-auto sm:-sx-6 lg:-mx-8">
        <div class=" inline-block min-w-full sm:-px-6 lg:px-8">
            <table class="min-w-full">
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">

                    <thead class="border-b bg-neutral-700">

                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            <label for=title>Titre</label>
                        </th>

                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            <label for=classroom>Salle</label>
                        </th>

                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            <label for=referer>Référant</label>
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            <label for=promotion_id>Promotion</label>
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            <label for=enable_to_badge_at>Heure d'activation badgeuse</label>
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            <label for=start_at>Début</label>
                        </th>

                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            <label for=end_at>Fin</label>
                        </th>

                    </thead class="border-b">

                    <tbody>

                        <tr class="bg-white border-b">

                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="text" id="title" name="title" value="<?php echo $session["title"]; ?>" required=""></input>
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="text" id="classroom" name="classroom" value="<?php echo $session["classroom"]; ?>" required=""></input>
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
                                <select name="promotion_id" id="promotion_id" required="">
                                    <?php
                                    $sql = "SELECT * FROM promotions";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row2 = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row2['id'] . '">' . $row2['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="datetime-local" id="enable_to_badge_at" name="enable_to_badge_at" value="<?php echo $session["enable_to_badge_at"]; ?>" required=""></input>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="datetime-local" id="start_at" name="start_at" value="<?php echo $session["start_at"]; ?>" required=""></input>
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                <input type="datetime-local" id="end_at" name="end_at" value="<?php echo $session["end_at"]; ?>" required=""></input>
                            </td>

                        </tr>
                    </tbody>

            </table>

            <div class="flex justify-end bg-neutral-200">
                <input type="hidden" name="id" value="<?php echo $session["id"]; ?>" />
                <input class="bg-red-700 text-white py-4 px-14 cursor-pointer" type="button" value="Annuler" onclick="location.href='./sessions.php';" />
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
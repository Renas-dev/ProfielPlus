<?php
// The require statement makes a connection with the Database
require_once './includes/dbh.inc.php';

// This gets the selected id from the post method
$selectedId = $_POST['id'];

// This SELECT query is to prefill the selected education form.
$sql = "SELECT * FROM education WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($hobbies as $hobby) {
    ?>
    <link rel="stylesheet" href="../views/css/default.css">
    <link rel="stylesheet" href="../views/css/profile-edit.css">
    <h2>Edit selected education</h2>
    <form action="../functions/updateEducation.php?id=<?= $selectedId ?>" method="post" class="create">
        <input type="text" name="name" value="<?= $hobby['name'] ?>">
        <button class="button">submit</button>
    </form>
<?php } ?>


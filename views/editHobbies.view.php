<?php
// The require statement makes a connection with the Database
require_once './includes/dbh.inc.php';

// This gets the selected id from the post method
$selectedId = $_POST['id'];

// This SELECT query is to prefill the selected hobby form.
$sql = "SELECT * FROM hobbies WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($hobbies as $hobby) {
    ?>
    <h3>Edit selected work experience</h3>
    <form action="../functions/updateHobby.php?id=<?= $selectedId ?>&img=<?= $hobby['image'] ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= $hobby['name'] ?>">
        <input type="text" name="hobby_description" value="<?= $hobby['hobby_description'] ?>">
        <input type="text" name="interest" value="<?= $hobby['interest'] ?>">
        <input type="file" name="image">
        <button>submit</button>
    </form>
<?php } ?>
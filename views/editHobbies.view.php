<?php
require_once './includes/dbh.inc.php';

$selectedId = $_POST['id'];

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
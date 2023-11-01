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
    <form action="../functions/updateHobby.php?id=<?= $selectedId ?>" method="post">
        <input type="text" name="name" value="<?= $hobby['name'] ?>">
        <button>submit</button>
    </form>
<?php } ?>


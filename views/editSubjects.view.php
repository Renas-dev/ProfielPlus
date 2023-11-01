<?php
require_once './includes/dbh.inc.php';

$selectedId = $_POST['id'];

$sql = "SELECT * FROM subjects WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($subjects as $subject) {
    ?>
    <h3>Edit selected work experience</h3>
    <form action="../functions/updateSubjects.php?id=<?= $selectedId ?>" method="post">
        <input type="text" name="name" value="<?= $subject['name'] ?>">
        <input type="text" name="grade" value="<?= $subject['grade'] ?>">
        <button>submit</button>
    </form>
<?php } ?>


<?php
// The require statement makes a connection with the Database
require_once './includes/dbh.inc.php';

// This gets the selected id from the post method
$selectedId = $_POST['id'];

// This SELECT query is to prefill the selected subject form.
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


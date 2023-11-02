<?php
// The require statement makes a connection with the Database
require_once './includes/dbh.inc.php';

// This gets the selected id from the post method
$selectedId = $_POST['id'];

// This SELECT query is to prefill the selected work experience form.
$sql = "SELECT * FROM work_experience WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($experiences as $experience) {
    ?>
    <h3>Edit selected work experience</h3>
    <form action="../functions/updateExperience.php?id=<?= $selectedId ?>" method="post">
    <input type="text" name="name" value="<?= $experience['name'] ?>">
    <input type="text" name="colleagues" value="<?= $experience['colleagues'] ?>">
    <input type="text" name="functionality" value="<?= $experience['functionality'] ?>">
    <input type="date" name="startDate" value="<?= $experience['start_date'] ?>">
    <input type="date" name="endDate" value="<?= $experience['end_date'] ?>">
    <button>submit</button>
    </form>
<?php } ?>


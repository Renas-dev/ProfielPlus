<?php
require_once './includes/dbh.inc.php';

$selectedId = $_POST['id'];

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


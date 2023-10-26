<?php
require_once '../includes/dbh.inc.php';

$selectedId = $_GET['id'];

$sql = "SELECT * FROM work_experience WHERE id = $selectedId";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($experiences as $experience) {
    echo '<h3>Edit selected work experience</h3>';
    echo '<form action="../functions/updateExperience.php?id=' . $selectedId . '" method="post">';
    echo '<input type="text" name="name" value="'. $experience['name'] .'">';
    echo '<input type="text" name="colleagues" value="'. $experience['colleagues'] .'">';
    echo '<input type="text" name="functionality" value="'. $experience['functionality'] .'">';
    echo '<input type="date" name="startDate" value="'. $experience['start_date'] .'">';
    echo '<input type="date" name="endDate" value="'. $experience['end_date'] .'">';
    echo '<button>submit</button>';
    echo '</form>';
}


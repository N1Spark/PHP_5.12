<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correct_answers_page1 = ['Answer 1', 'Answer 3', 'Answer 2', 'Answer 4', 'Answer 1', 'Answer 3', 'Answer 2', 'Answer 4', 'Answer 1', 'Answer 3'];
    $score = 0;

    foreach ($correct_answers_page1 as $index => $correct_answer) {
        if (isset($_POST["quest" . ($index + 1)]) && $_POST["quest" . ($index + 1)] == $correct_answer) {
            $score++;
        }
    }
    $_SESSION['score_page1'] = $score;
    header('Location: p2.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page 1</title>
</head>
<body>
<form method="post" action="">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <p>Question <?= $i ?></p>
        <?php for ($j = 1; $j <= 4; $j++): ?>
            <input type="radio" name="quest<?= $i ?>" value="Answer<?= $j ?>" id="q<?= $i ?>a<?= $j ?>">
            <label for="q<?= $i ?>a<?= $j ?>">Answer <?= $j ?></label>
        <?php endfor; ?>
    <?php endfor; ?>
    <br>
    <button type="submit">Next</button>
</form>
</body>
</html>

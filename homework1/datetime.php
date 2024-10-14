<?php
$date1 = '';
$date2 = '';
$daysDifference = '';
$minutesDifference = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $startDate = new DateTime($date1);
    $endDate = new DateTime($date2);

    $interval = $startDate->diff($endDate);
    $daysDifference = $interval->days;
    $minutesDifference = $daysDifference * 24 * 60;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Разница между датами</title>
</head>
<body>
    <h1>Выберите две даты</h1>
    <form method="post">
        <label for="date1">Дата 1:</label>
        <input type="date" name="date1" value="<?php echo htmlspecialchars($date1); ?>" required><br><br>
        <label for="date2">Дата 2:</label>
        <input type="date" name="date2" value="<?php echo htmlspecialchars($date2); ?>" required><br><br>
        <button type="submit">Отправить</button>
    </form>

    <?php if ($daysDifference !== ''): ?>
        <h2>Результаты:</h2>
        <p>Количество дней между выбранными датами: <strong><?php echo $daysDifference; ?></strong></p>
        <p>Количество минут между выбранными датами: <strong><?php echo $minutesDifference; ?></strong></p>
    <?php endif; ?>
</body>
</html>
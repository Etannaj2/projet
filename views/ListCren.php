<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ul>
        <?php foreach ($Creneau as $Creneau): ?>
            <li>
                <?php echo htmlspecialchars($local['ID_CRENEAU']); ?> 
                <?php echo htmlspecialchars($local['ID_EMPLOI']); ?>
                <?php echo htmlspecialchars($local['JOUR']); ?>
                <?php echo htmlspecialchars($local['NUM_SEANCE']); ?>
            </li>

        <?php endforeach; ?>
    </ul>
</body>
</html>
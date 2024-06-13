<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ul>
        <?php foreach ($local as $local): ?>
            <li>
                <?php echo htmlspecialchars($local['ID_LOCAL']); ?> 
                <?php echo htmlspecialchars($local['NOM_LOCAL']); ?> 
                <?php echo htmlspecialchars($local['TYPE_LOCAL']); ?>
            </li>

        <?php endforeach; ?>
    </ul>
</body>
</html>
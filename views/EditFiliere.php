<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Filière</title>
</head>
<body>
    <h1>Modifier la Filière</h1>
    <form action="UpdateFiliere.php" method="POST">
        <input type="hidden" name="id_filiere" value="<?php echo htmlspecialchars($filiere['ID_FILIERE']); ?>">

        <table style="border: 1px solid black; border-collapse: collapse;">
            <tr>
                <td style="border: 1px solid black;">Code Filière:</td>
                <td style="border: 1px solid black;">
                    <input type="text" name="codefiliere" value="<?php echo htmlspecialchars($filiere['CODEFILIERE']); ?>">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;">Intitulé Filière:</td>
                <td style="border: 1px solid black;">
                    <input type="text" name="intitulefiliere" value="<?php echo htmlspecialchars($filiere['INTITULEFILIERE']); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid black;">
                    <input type="submit" value="Enregistrer les modifications">
                </td>
            </tr>
        </table>
    </form>
    <a href="ControllerFiliere.php">Retour à la liste des filières</a>
</body>
</html>

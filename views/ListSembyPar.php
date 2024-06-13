<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Semestres</title>
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <h1>Liste des Parcours</h1>
    <ul>
       
        
                <table style="border: 1px solid black; border-collapse: collapse;"> 
                <tr>
                    <th style="border: 1px solid black;">ID semestre></thI>
                    <th style="border: 1px solid black;">ID session </th>
                    <th style="border: 1px solid black;">ID parcours</th>
                    <th style="border: 1px solid black;">Numero semestre</th>
                </tr>
                <?php foreach ($SembyPar  as $SembyPar ): ?>
                    <tr>
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($SembyPar['ID_SEMESTRE']); ?>  </td>
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($SembyPar['ID_SESSION']); ?> </td>             
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($SembyPar['ID_PAR']); ?></td> 
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($SembyPar['NUM_SEMESTRE']); ?></td> 
                    <td style="border: 1px solid black;"><form action="SembyPar.php" method="GET" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($SembyPar['ID_PAR']); ?>">
            </form>
            <a href="SembyPar.php?id=<?= htmlspecialchars($SembyPar ['ID_PAR']); ?>">Semestre</a></td> 
            <td style="border: 1px solid black;"><i class="fa-regular fa-pen-to-square"></i></td>

            <td style="border: 1px solid black;"><i class="fa-solid fa-trash"></i></td>
                    </tr>  
                    <?php endforeach; ?>
            </table>
           
       
    </ul>

  
</body>
</html>
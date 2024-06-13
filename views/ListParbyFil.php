<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Filières</title>
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <h1>Liste des Parcours</h1>
    <ul>
       
        
                <table style="border: 1px solid black; border-collapse: collapse;"> 
                <tr>
                    <th style="border: 1px solid black;">Id Filiere</th>
                    <th style="border: 1px solid black;">Intitule Parcours</th>
                </tr>
                <?php foreach ($ParbyFil as $ParbyFil): ?>
                    <tr>
            
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($ParbyFil['ID_FILIERE']); ?> </td>             
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($ParbyFil['INTITULEPARCOURS']); ?></td> 
                    <td style="border: 1px solid black;"><form action="SembyPar.php" method="GET" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($ParbyFil['ID_FILIERE']); ?>">
            </form>
            <a href="SembyPar.php?id=<?= htmlspecialchars($ParbyFil['ID_FILIERE']); ?>">Semestre</a></td> 
            <td style="border: 1px solid black;"><i class="fa-regular fa-pen-to-square"></i></td>

            <td style="border: 1px solid black;"><i class="fa-solid fa-trash"></i></td>
                    </tr>  
                    <?php endforeach; ?>
            </table>
           
       
    </ul>

  
</body>
</html>
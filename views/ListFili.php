<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Filières</title>
   <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <h1>Liste des Filières</h1>
    <ul>
       
                <table style="border: 1px solid black; border-collapse: collapse;"> 
                <tr>
                    <th style="border: 1px solid black;">Code</th>
                    <th style="border: 1px solid black;">Intitulé</th>
                </tr>
                <?php foreach ($filieres as $filiere): ?>
                    <tr>
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($filiere['CODEFILIERE']); ?> </td>             
                    <td style="border: 1px solid black;"><?php echo htmlspecialchars($filiere['INTITULEFILIERE']); ?></td> 
                    <td style="border: 1px solid black;">
                    <form action="Parbyfil.php" method="GET" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($filiere['ID_FILIERE']); ?>">
            </form>
            <a href="Parbyfil.php?id=<?= htmlspecialchars($filiere['ID_FILIERE']); ?>">Parcours</a></td> 

            <td style="border: 1px solid black;">
    <a href="EditFil.php?id=<?php echo htmlspecialchars($filiere['ID_FILIERE']); ?>">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>
</td>

            <td style="border: 1px solid black;"><i class="fa-solid fa-trash"></i></td>
                    </tr>  
                    <?php endforeach; ?>  
            </table>
           
        
    </ul>

  
</body>
</html>
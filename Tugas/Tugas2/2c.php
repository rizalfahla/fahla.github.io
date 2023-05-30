<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2c</title>
    <style> 
     .ini {
        background-color: salmon;
        border: 1px solid black;
        color: black;
        width: 20px;
        height: 20px;
        text-align: center;
     }
    </style>
</head>
<body>

    <table cellpadding= "10" cellspacing="0">
        <?php for ($i = 10; $i >= 1; $i--) {?>
            <tr>
                <?php for ($j = 1; $j <= $i; $j++) {?>
                    <td class= ini> <?php echo "$j " ?></td>
                <?php }?>
            </tr>
        <?php }?>
    </table>
    
    
</body>
</html>
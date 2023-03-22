<!DOCTYPE html>
<html lang="en">

<?php
    $npm1 = "049";
    $nama1 = "bagas";
    $ipk1 = 4.2;

    $npm2 = "049";
    $nama2 = "bagas";
    $ipk2 = 1.5;

    

    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .red {
            background-color: red;
        }
        .green{
            background-color: greenyellow;
        }
    </style>
</head>

<body>

    
    <table border="1">
        <thead>
            <tr>
                <td>Npm</td>
                <td>Nama</td>
                <td>IPK</td>
            </tr>
        </thead>
        <tbody>
        <tr class="<?php echo $ipk1 <= 2 ? "red" : "green";?>" >
            <td><?php echo $npm1 ?></td>
            <td><?php echo $nama1 ?></td>
            <td><?php echo $ipk1 > 4 ? "tidak valid" : $ipk1;?></td>
        </tr>
        <tr class="<?php echo $ipk2 <= 2 ? "red" : "green";?>">
            <td><?php echo $npm2 ?></td>
            <td><?php echo $nama2 ?></td>
            <td><?php echo $ipk2 ?></td>
        </tr>
        </tbody>
    </table>
</body>

</html>
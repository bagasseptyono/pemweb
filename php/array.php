<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .red {
            background-color: red;
        }

        .green {
            background-color: greenyellow;
        }
    </style>
</head>

<body>

    <?php
    $npm1 = "049";
    $nama1 = "bagas";
    $ipk1 = 4.2;

    $npm2 = "049";
    $nama2 = "bagas";
    $ipk2 = 1.5;


    $data = array(
        array("npm" => "049","nama" => "bagas","ipk" => 3.2), 
        array("npm" => "078","nama" => "budi","ipk" => 2.2),
        array("npm" => "059","nama" => "bagas","ipk" => 1.2), 
        array("npm" => "098","nama" => "budi","ipk" => 1.62)
    )
    ?>

    <table border="1">
        <thead>
            <tr>
                <td>Npm</td>
                <td>Nama</td>
                <td>IPK</td>
            </tr>
        </thead>
        <?php foreach ($data as $temp) :?>
        <tbody>
            <tr class="<?php echo $temp["ipk"] <= 2 ? "red" : "green"; ?>">
                <td><?php echo $temp["npm"]; ?></td>
                <td><?php echo $temp["nama"] ?></td>
                <td><?php echo $temp["ipk"] > 4 ? "tidak valid" : $temp["ipk"]; ?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>

</html>
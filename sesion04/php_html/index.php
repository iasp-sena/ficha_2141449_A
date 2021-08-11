<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP y HTML</title>
</head>
<body>
    <h2>PHP y HTML</h2>

    <?php
    $usuarios = [
        "Andrés",
        "Julián",
        "David",
        "Asceneth",
        "Fabio"
    ];
    ?>
    <table>
        <thead>
            <tr>
                <th>NOMBRES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
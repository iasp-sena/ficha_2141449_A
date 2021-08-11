<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="calculadora.php" method="post">
        <div>
            <label for="numero1">Numero1</label>
            <input type="text" id="num1" name="numero1"/>
        </div>
        <div>
            <label for="numero2">Numero2</label>
            <input type="text" id="num2" name="numero2"/>
        </div>
        <div>
            <label for="operacion">Operación</label>
            <select name="operacion" id="ope">
                <option value="sumar">Suma</option>
                <option value="restar">Resta</option>
                <option value="dividir">División</option>
                <option value="multiplicar">Multiplicación</option>
            </select>
        </div>
        <div>
            <button type="submit">Calcular</button>
        </div>
    </form>

</body>
</html>
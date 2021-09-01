<?php
if (!is_null($data["equipo"])) {
    $equipo = $data["equipo"];
    ?>
    <h4>Jugadores</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">TD</th>
            <th scope="col">NUM DOC</th>
            <th scope="col">NOMBRES</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">NUMERO</th>
            <th scope="col">POSICION</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($equipo->getJugadores() as $jugador) {
            ?>
            <tr>
                <td><?= $jugador->getTipoDocumento() ?></td>
                <td><?= $jugador->getNumeroDocumento() ?></td>
                <td><?= $jugador->getNombres() ?></td>
                <td><?= $jugador->getApellidos() ?></td>
                <td><?= $jugador->getNumero() ?></td>
                <td><?= $jugador->getPosicion() ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td></td>
        </tr>
        </tbody>
    </table>
    <hr/>
    <h4>Entrenador</h4>
    <?php
    if (!is_null($equipo->getEntrenador())) {
        echo $equipo->getEntrenador()->getNombres();
    } else {
        echo "No se ha asociado un entrenador";
    }
    ?>
    <hr/>
    <h4>Médico</h4>
    <?php
    if (!is_null($equipo->getMedico())) {
        echo $equipo->getMedico()->getNombres();
    } else {
        echo "No se ha asociado un médico";
    }
    ?>

    <?php
} else {
    ?>
    <p>No se ha creado ningún equipo actualmente</p>
    <?php
}
?>
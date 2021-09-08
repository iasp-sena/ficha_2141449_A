<form action="<?= CONTEXT_PATH ?>/Persona/registrarPersona" method="post">
    <div class="form-group">
        <label for="equipo">Equipo</label>
        <select id="equipo" name="equipo" class="form-control">
            <?php
            if (isset($data["equipos"])) {
                foreach ($data["equipos"] as $equipo) {
                    echo "<option value='" . $equipo->getId() . "'>" . $equipo->getNombre() . "</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tipoDocumento">Tipo documento</label>
        <select id="tipoDocumento" name="tipoDocumento" class="form-control">
            <?php
            if (isset($data["tiposDocumentos"])) {
                foreach ($data["tiposDocumentos"] as $tipoDocumento) {
                    echo "<option value='" . $tipoDocumento->getId() . "'>" . $tipoDocumento->getSigla() . " - " . $tipoDocumento->getTipo() . "</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="numeroDocumento">Numero documento</label>
        <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento"
               placeholder="123456789"/>
    </div>
    <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Carlos Iván"/>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Rodriguez"/>
    </div>
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="text" class="form-control" id="correo" name="correo" placeholder="Rodriguez"/>
    </div>
    <div class="form-group">
        <label for="username">Nombre usuario</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Rodriguez"/>
    </div>
    <div class="form-group">
        <label for="clave">Clave</label>
        <input type="text" class="form-control" id="clave" name="clave" placeholder="Rodriguez"/>
    </div>

    <div class="form-group">
        <label for="tipoPersona">Tipo de persona</label>
        <select id="tipoPersona" name="tipoPersona" onchange="carcarCamposParticulares(this.value)">
            <option value="">Seleccione un tipo de persona...</option>
            <option value="1">Jugador</option>
            <option value="2">Entrenador</option>
            <option value="3">Medico</option>
        </select>
    </div>

    <div id="datosJugador">
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="number" class="form-control" id="numero" name="numero" placeholder="10"/>
        </div>
        <div class="form-group">
            <label for="posicion">Posicion</label>
            <select id="posicion" name="posicion" class="form-control">
                <?php
                if (isset($data["posicionesJugador"])) {
                    foreach ($data["posicionesJugador"] as $posicion) {
                        echo "<option value='" . $posicion->getId() . "'>" . $posicion->getNombre() . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div id="datosEntrenador">
        <div class="form-group">
            <label for="categorias">Categorias</label>
            <input type="text" class="form-control" id="categorias" name="categorias" placeholder="Infantil, Mayores"/>
        </div>
    </div>

    <div id="datosMedico">
        <div class="form-group">
            <label for="especialidad">Especialidad</label>
            <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Nutricionista"/>
        </div>
    </div>
    <hr/>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="btnRegistroPersona" value="registrar">
            Guardar
        </button>
    </div>
</form>
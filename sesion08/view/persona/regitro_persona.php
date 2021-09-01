<form action="<?= CONTEXT_PATH ?>/Persona/registrarPersona" method="post">
    <div class="form-group">
        <label for="tipoDocumento">Tipo documento</label>
        <input type="text" class="form-control" id="tipoDocumento" name="tipoDocumento" placeholder="CC"/>
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
        <label for="tipoPersona">Tipo de persona</label>
        <select id="tipoPersona" name="tipoPersona" onchange="carcarCamposParticulares(this.value)">
            <option value="">Seleccione un tipo de persona...</option>
            <option value="1">Jugador</option>
            <option value="2">Entrenador</option>
            <option value="3">Medico</option>
        </select>
    </div>

    <div id="camposParticulares"></div>

    <hr/>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="btnRegistroPersona" value="registrar">
            Guardar
        </button>
    </div>
</form>
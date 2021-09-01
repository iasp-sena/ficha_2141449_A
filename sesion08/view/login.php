            <h3>Login</h3>
            <hr/>
            <?php
            if(isset($_SESSION["mensaje"])){
                ?>
                <div class="alert alert-primary" role="alert">
                    <?php
                    echo $_SESSION["mensaje"];
                    $_SESSION["mensaje"] = null;
                    ?>
                </div>
                <?php
            }
            ?>
            <form action="<?= CONTEXT_PATH ?>/Session/iniciarSesion" method="post">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="pperez"/>
                </div>
                <div class="form-group">
                    <label for="clave">Usuario</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su clave"/>
                </div>
                <hr/>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnIngreso" value="ingresar">
                        Ingresar
                    </button>
                </div>
            </form>
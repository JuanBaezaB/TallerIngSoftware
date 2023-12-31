<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Inicia Sesión</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post" name="login" id="login-form">
                        <div class="form-group mb-3">
                            <label for="username">Usuario</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Ingresa tu usuario" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required />
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                    </form>
                    <p class="text-center">¿No estás registrado aún? <a href='index.php?p=auth/register'>Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

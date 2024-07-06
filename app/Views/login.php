<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4"> 
            <div class="card border-gray shadow mb-3" style="border-radius:15px;">
                <div class="card-header bg-primary text-white border-gray" style="font-weight: bold;font-size:1.5rem;border-top-left-radius:15px;border-top-right-radius:15px;" align="center"> INICIAR SESION</div>
                <div class="card-body">
                    
                    <form action="../php/login.php" method="post">
                        <div class="form-floating mb-3 mt-4">
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu correo electronico">
                            <label for="floatingInput">Ingresa tu usuario</label>
                        </div>
                        <div class="form-floating mb-3 mt-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña">
                            <label for="floatingInput">Ingresa tu contraseña</label>
                        </div>
                        <div class="row text-center mt-5">
                            <div class="col">
                                <a href="" class="btn btn-info w-100">Registrarse</a>
                            </div>
                            <div class="col">
                                <button id="login" class="btn btn-primary w-100" type="submit">Iniciar sesión</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/') ?>">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('libros') ?>">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('prestamos') ?>">Prestamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('ejemplares') ?>">Ejemplares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('categorias') ?>">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('autores') ?>">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('editorial') ?>">Editoriales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('idiomas') ?>">Idiomas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('usuarios') ?>">Usuarios</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

</head>
<body>
    
<div class="container-fluid" style="margin-bottom: 10%;">
    <div class="card mb-3" style="max-width: 90rem; margin:auto; margin-top:30px; ">
        <div class="card-header text-center bg-primary">
            <h4 class="text-white">Usuarios</h4>
        </div>
        <div class="card-body">
            <!-- Creacion de encabezado de la tabla -->
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col" style="width: 5%;">No.</th>
                    <th scope="col" style="width: 10%;">User</th>
                    <th scope="col" style="width: 10%;">Contraseña</th>
                    <th scope="col" style="width: 15%;">Nombre</th>
                    <th scope="col" style="width: 10%;">A. paterno</th>
                    <th scope="col" style="width: 10%;">A. materno</th>
                    <th scope="col" style="width: 10%;">Telefono</th>
                    <th scope="col" style="width: 10%;">Email</th>
                    <th scope="col" style="width: 10%;">Direccion</th>
                    <th scope="col" style="width: 10%;">Opciones</th>
                    </tr>
                </thead>

                <!-- llenado de tabla -->
                <?php foreach ($usuarios as $usuario): ?> 
                    <tr>
                        <td><?= $usuario['us_id']; ?></td>
                        <td><?= $usuario['us_user']; ?></td>
                        <td><?= $usuario['us_password']; ?></td>
                        <td><?= $usuario['us_nombre']; ?></td>
                        <td><?= $usuario['us_apaterno']; ?></td>
                        <td><?= $usuario['us_amaterno']; ?></td>
                        <td><?= $usuario['us_telefono']; ?></td>
                        <td><?= $usuario['us_email']; ?></td>
                        <td><?= $usuario['us_direccion']; ?></td>
                        <td>
                            <a href="<?= base_url('usuarios/'.$usuario['us_id'].'/edit'); ?>" class="btn btn-warning" style="width: 5rem">Editar</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?= base_url('usuarios/'.$usuario['us_id']); ?>" style="width: 5rem">Borrar</button>
                        </td>

                    </tr>
                <?php endforeach;?> 
            </table>

            <!-- Botones -->
            <div class="container text-center mt-4">
                <a href="<?= base_url('usuarios/new') ?>" class="btn btn-primary">Nuevo</a>
            </div>
        </div>
    </div>
</div>

    <!-- Modal para eliminar registro -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-elimina" action="" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const eliminaModal = document.getElementById('eliminaModal')
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const url = button.getAttribute('data-bs-url')

                // Update the modal's content.
                const form = eliminaModal.querySelector('#form-elimina')
                form.setAttribute('action', url)
            })
        }
    </script>

</body>
</html>
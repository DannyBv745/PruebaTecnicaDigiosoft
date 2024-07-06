<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar prestamo</title>
        <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
<body>

<?php if(session() -> getFlashdata('error') !== null) { ?>
        <div class="alert alert-danger">
            <?= session() -> getFlashdata('error'); ?>
        </div>
    <?php }; ?>
        
    <form action="<?= base_url('prestamos/'.$prestamos['pr_id']); ?>" class="row g-3" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="prestamo_id" value="<?= $prestamos['pr_id']; ?>">
        
        <div class="container-fluid" style="margin-bottom: 10%;">
            <div class="card mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; ">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-white">Editar prestamo</h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <input class="form-control" type="date" name="pr_prestamo" placeholder="Prestamo" id="date-input" value="<?= $prestamos['pr_prestamo']; ?>">
                            <label for="floatingInput" style="margin-left: 1rem;">Prestamo</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col" style="height: 4rem;">
                            <input class="form-control" type="date" name="pr_devolucion" placeholder="Devolucion" value="<?= $prestamos['pr_devolucion']; ?>">
                            <label class="form_label" style="margin-left: 1rem;">Devolucion</label>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <select class="form-select" name="pr_usuario" id="pr_usuario">
                                <option value="">Seleccionar</option>
                                <?php foreach ($usuarios as $usuario) : ?>
                                    <option value="<?= $usuario['us_id']; ?>" <?php echo ($usuario['us_id'] == $prestamos['pr_usuario']) ? 'selected' : ''; ?>><?= $usuario['us_user']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingInput" style="margin-left: 1rem;">Usuario</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col">
                            <select class="form-select" name="pr_ejemplar" id="pr_ejemplar">
                                <option value="">Seleccionar</option>
                                <?php foreach ($ejemplares as $ejemplar) : ?>
                                    <option value="<?= $ejemplar['ej_id']; ?>" <?php echo ($ejemplar['ej_id'] == $prestamos['pr_ejemplar']) ? 'selected' : ''; ?>><?= $ejemplar['ej_libro'] . ', ' . $ejemplar['ej_numejemplar']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingInput" style="margin-left: 1rem;">Ejemplar</label>
                        </div>
                    </div>
                    <!-- Botones -->
                    <a href="<?= base_url('prestamos') ?>" class="btn btn-danger" style="width: 6rem;">Regresar</a>
                    <button type="submit" class="btn btn-primary" style="width: 6rem;">Guardar</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // codigo javascript para establecer la fecha del input prestamo como la fecha actual del dispositivo
        document.addEventListener('DOMContentLoaded', (event) => {
            const dateInput = document.getElementById('date-input');
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;
            dateInput.value = formattedDate;
        });
    </script>
</body>
</html>
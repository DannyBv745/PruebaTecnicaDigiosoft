<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo ejemplar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
<body>

<?php if(session() -> getFlashdata('error') !== null) { ?>
        <div class="alert alert-danger">
            <?= session() -> getFlashdata('error'); ?>
        </div>
    <?php }; ?>
        
    <form action="<?= base_url('ejemplares') ?>" class="row g-3" method="post" autocomplete="off">
        
        <div class="container-fluid" style="margin-bottom: 10%;">
            <div class="card mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; ">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-white">Agregar nuevo ejemplar</h4>
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3 mt-4">
                        <select class="form-select" name="ej_libro" id="ej_libro">
                                <option value="">Seleccionar</option>
                                <?php foreach ($libros as $libro) : ?>
                                    <option value="<?= $libro['li_id']; ?>"><?= $libro['li_titulo']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <label for="floatingInput">Libro</label>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="ej_numejemplar" placeholder="Ejemplar">
                        <label for="floatingInput">Ejemplar</label>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <select class="form-select" name="ej_estatus" id="ej_estatus">
                                <option value="">Seleccionar</option>
                                <option value="1">Disponible</option>
                                <option value="0">Prestado</option>
                            </select>
                        <label for="floatingInput">Estatus</label>
                    </div>

                    <!-- Botones -->
                    <a href="<?= base_url('ejemplares') ?>" class="btn btn-danger" style="width: 6rem;">Regresar</a>
                    <button type="submit" class="btn btn-primary" style="width: 6rem;">Guardar</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
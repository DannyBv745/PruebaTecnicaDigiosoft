<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar libro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
<body>

<?php if(session() -> getFlashdata('error') !== null) { ?>
        <div class="alert alert-danger">
            <?= session() -> getFlashdata('error'); ?>
        </div>
    <?php }; ?>
        
    <form action="<?= base_url('libros/'.$libros['li_id']); ?>" class="row g-3" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="libro_id" value="<?= $libros['li_id']; ?>">

        <div class="container-fluid" style="margin-bottom: 10%;">
            <div class="card mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; ">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-white">Editar libro</h4>
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="li_titulo" placeholder="Titulo" value="<?= $libros['li_titulo']; ?>">
                        <label for="floatingInput">Titulo</label>
                    </div>
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <input class="form-control" type="text" name="li_isbn" placeholder="ISBN" value="<?= $libros['li_isbn']; ?>">
                            <label for="floatingInput" style="margin-left: 1rem;">ISBN</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col" style="height: 4rem;">
                            <select class="form-select" name="li_autor" id="li_autor">
                                <option value="">Seleccionar</option>
                                <?php foreach ($autores as $autor) : ?>
                                    <option value="<?= $autor['au_id']; ?>" <?php echo ($autor['au_id'] == $libros['li_autor']) ? 'selected' : ''; ?>><?= $autor['au_nombre'] . ' ' . $autor['au_apaterno'] . ' ' . $autor['au_amaterno']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="form_label" style="margin-left: 1rem;">Autor</label>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <select class="form-select" name="li_editorial" id="li_editorial">
                                <option value="">Seleccionar</option>
                                <?php foreach ($editorial as $editorial) : ?>
                                    <option value="<?= $editorial['ed_id']; ?>" <?php echo ($editorial['ed_id'] == $libros['li_editorial']) ? 'selected' : ''; ?>><?= $editorial['ed_nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingInput" style="margin-left: 1rem;">Editorial</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col">
                            <select class="form-select" name="li_categoria" id="li_categoria">
                                <option value="">Seleccionar</option>
                                <?php foreach ($categorias as $categoria) : ?>
                                    <option value="<?= $categoria['cat_id']; ?>" <?php echo ($categoria['cat_id'] == $libros['li_categoria']) ? 'selected' : ''; ?>><?= $categoria['cat_nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingInput" style="margin-left: 1rem;">Categoria</label>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <select class="form-select" name="li_idioma" id="li_idioma">
                                <option value="">Seleccionar</option>
                                <?php foreach ($idiomas as $idioma) : ?>
                                    <option value="<?= $idioma['idi_id']; ?>" <?php echo ($idioma['idi_id'] == $libros['li_idioma']) ? 'selected' : ''; ?>><?= $idioma['idi_nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingInput" style="margin-left: 1rem;">Idioma</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col">
                        <input class="form-control" type="text" name="li_numejemplares" placeholder="Ejemplares" value="<?= $libros['li_numejemplares']; ?>">
                            <label for="floatingInput" style="margin-left: 1rem;">No. de ejemplares</label>
                        </div>
                    </div>
                    <!-- Botones -->
                    <a href="<?= base_url('libros') ?>" class="btn btn-danger" style="width: 6rem;">Regresar</a>
                    <button type="submit" class="btn btn-primary" style="width: 6rem;">Guardar</button>
                </div>
            </div>
        </div>


    </form>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
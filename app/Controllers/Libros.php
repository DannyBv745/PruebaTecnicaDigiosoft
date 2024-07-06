<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LibrosModel;
use App\Models\AutoresModel;
use App\Models\EditorialModel;
use App\Models\CategoriasModel;
use App\Models\IdiomasModel;

class Libros extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $LibrosModel = new LibrosModel();
        $data['libros'] = $LibrosModel -> findAll();

        return view('libros/libros', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {

        $AutoresModel = new AutoresModel();
        $data['autores'] = $AutoresModel -> findAll();

        $EditorialModel = new EditorialModel();
        $data['editorial'] = $EditorialModel -> findAll();

        $CategoriasModel = new CategoriasModel();
        $data['categorias'] = $CategoriasModel -> findAll();

        $IdiomasModel = new IdiomasModel();
        $data['idiomas'] = $IdiomasModel -> findAll();

        return view('libros/nuevoLibro', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'li_titulo' => 'required',
            'li_isbn' => 'required',
            'li_autor' => 'required',
            'li_editorial' => 'required',
            'li_idioma' => 'required',
            'li_categoria' => 'required',
            'li_numejemplares' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['li_titulo', 'li_isbn', 'li_autor', 'li_editorial', 'li_idioma', 'li_categoria', 'li_numejemplares']);

        $LibrosModel = new LibrosModel();
        $LibrosModel -> insert([
            'li_titulo' => trim($post['li_titulo']),
            'li_isbn' => trim($post['li_isbn']),
            'li_autor' => trim($post['li_autor']),
            'li_editorial' => trim($post['li_editorial']),
            'li_idioma' => trim($post['li_idioma']),
            'li_categoria' => trim($post['li_categoria']),
            'li_numejemplares' => trim($post['li_numejemplares']),
        ]);

        return redirect() -> to('libros');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        if ($id == null) {
            return redirect() -> route('libros');
        }

        $LibrosModel = new LibrosModel();
        $data['libros'] = $LibrosModel -> find($id);

        $AutoresModel = new AutoresModel();
        $data['autores'] = $AutoresModel -> findAll();

        $EditorialModel = new EditorialModel();
        $data['editorial'] = $EditorialModel -> findAll();

        $CategoriasModel = new CategoriasModel();
        $data['categorias'] = $CategoriasModel -> findAll();

        $IdiomasModel = new IdiomasModel();
        $data['idiomas'] = $IdiomasModel -> findAll();


        return view('libros/editarLibro', $data);    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $reglas = [
            'li_titulo' => 'required',
            'li_isbn' => 'required',
            'li_autor' => 'required',
            'li_editorial' => 'required',
            'li_idioma' => 'required',
            'li_categoria' => 'required',
            'li_numejemplares' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['li_titulo', 'li_isbn', 'li_autor', 'li_editorial', 'li_idioma', 'li_categoria', 'li_numejemplares']);

        $LibrosModel = new LibrosModel();
        $LibrosModel -> update($id, [
            'li_titulo' => trim($post['li_titulo']),
            'li_isbn' => trim($post['li_isbn']),
            'li_autor' => trim($post['li_autor']),
            'li_editorial' => trim($post['li_editorial']),
            'li_idioma' => trim($post['li_idioma']),
            'li_categoria' => trim($post['li_categoria']),
            'li_numejemplares' => trim($post['li_numejemplares']),
        ]);

        return redirect() -> to('libros');    
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if ($id == null) {
            return redirect() -> route('idiomas');
        }

        $LibrosModel = new LibrosModel();
        $LibrosModel -> delete($id);

        return redirect() -> to('libros');    }
}

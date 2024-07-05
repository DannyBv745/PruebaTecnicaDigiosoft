<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;

class Categorias extends BaseController
{

    protected $helpers = ['form'];

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $categoriasModel = new CategoriasModel();
        $data['categorias'] = $categoriasModel -> findAll();

        return view('categorias/categorias', $data);
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
        return view('categorias/nuevaCategoria');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'cat_nombre' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['cat_nombre']);

        $categoriasModel = new CategoriasModel();
        $categoriasModel -> insert([
            'cat_nombre' => trim($post['cat_nombre']),
        ]);

        return redirect() -> to('categorias');
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
            return redirect() -> route('categorias');
        }

        $categoriasModel = new CategoriasModel();
        $data['categorias'] = $categoriasModel -> find($id);

        return view('categorias/editarCategoria', $data);
    }

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
            'cat_nombre' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['cat_nombre']);

        $categoriasModel = new CategoriasModel();
        $categoriasModel -> update($id, [
            'cat_nombre' => trim($post['cat_nombre']),
        ]);

        return redirect() -> to('categorias');    }

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
            return redirect() -> route('categorias');
        }

        $categoriasModel = new CategoriasModel();
        $categoriasModel -> delete($id);

        return redirect() -> to('categorias');
    }
}

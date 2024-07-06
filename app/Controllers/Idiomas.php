<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IdiomasModel;

class Idiomas extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $IdiomasModel = new IdiomasModel();
        $data['idiomas'] = $IdiomasModel -> findAll();

        return view('idiomas/idiomas', $data);
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
        return view('idiomas/nuevoIdioma');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'idi_nombre' => 'required',
            'idi_abreviacion' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['idi_nombre', 'idi_abreviacion']);

        $IdiomasModel = new IdiomasModel();
        $IdiomasModel -> insert([
            'idi_nombre' => trim($post['idi_nombre']),
            'idi_abreviacion' => trim($post['idi_abreviacion']),
        ]);

        return redirect() -> to('idiomas');
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
            return redirect() -> route('idiomas');
        }

        $IdiomasModel = new IdiomasModel();
        $data['idiomas'] = $IdiomasModel -> find($id);

        return view('idiomas/editarIdioma', $data);
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
            'idi_nombre' => 'required',
            'idi_abreviacion' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['idi_nombre', 'idi_abreviacion']);

        $IdiomasModel = new IdiomasModel();
        $IdiomasModel -> update($id, [
            'idi_nombre' => trim($post['idi_nombre']),
            'idi_abreviacion' => trim($post['idi_abreviacion']),
        ]);

        return redirect() -> to('idiomas');    
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

        $IdiomasModel = new IdiomasModel();
        $IdiomasModel -> delete($id);

        return redirect() -> to('idiomas');
    }
}

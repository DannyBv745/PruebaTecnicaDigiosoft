<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AutoresModel;

class Autores extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $AutoresModel = new AutoresModel();
        $data['autores'] = $AutoresModel -> findAll();

        return view('autores/autores', $data);
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
        return view('autores/nuevoAutor');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'au_nombre' => 'required',
            'au_apaterno' => 'required',
            'au_amaterno' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['au_nombre', 'au_apaterno', 'au_amaterno']);

        $AutoresModel = new AutoresModel();
        $AutoresModel -> insert([
            'au_nombre' => trim($post['au_nombre']),
            'au_apaterno' => trim($post['au_apaterno']),
            'au_amaterno' => trim($post['au_amaterno']),
        ]);

        return redirect() -> to('autores');    }

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
            return redirect() -> route('autores');
        }

        $AutoresModel = new AutoresModel();
        $data['autores'] = $AutoresModel -> find($id);

        return view('autores/editarAutor', $data);    }

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
            'au_nombre' => 'required',
            'au_apaterno' => 'required',
            'au_amaterno' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['au_nombre', 'au_apaterno', 'au_amaterno']);

        $AutoresModel = new AutoresModel();
        $AutoresModel -> update($id, [
            'au_nombre' => trim($post['au_nombre']),
            'au_apaterno' => trim($post['au_apaterno']),
            'au_amaterno' => trim($post['au_amaterno']),
        ]);

        return redirect() -> to('autores');    
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
            return redirect() -> route('autores');
        }

        $AutoresModel = new AutoresModel();
        $AutoresModel -> delete($id);

        return redirect() -> to('autores');
    }
}

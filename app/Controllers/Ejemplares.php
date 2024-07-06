<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EjemplaresModel;

class Ejemplares extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $EjemplaresModel = new EjemplaresModel();
        $data['ejemplares'] = $EjemplaresModel -> findAll();

        return view('ejemplares/ejemplares', $data);
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
        return view('ejemplares/nuevoEjemplar');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'ej_libro' => 'required',
            'ej_numejemplar' => 'required',
            'ej_estatus' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['ej_libro', 'ej_numejemplar', 'ej_estatus']);

        $EjemplaresModel = new EjemplaresModel();
        $EjemplaresModel -> insert([
            'ej_libro' => trim($post['ej_libro']),
            'ej_numejemplar' => trim($post['ej_numejemplar']),
            'ej_estatus' => trim($post['ej_estatus']),
        ]);

        return redirect() -> to('ejemplares');
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
            return redirect() -> route('ejemplares');
        }

        $EjemplaresModel = new EjemplaresModel();
        $data['ejemplares'] = $EjemplaresModel -> find($id);

        return view('ejemplares/editarEjemplar', $data);
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
            'ej_libro' => 'required',
            'ej_numejemplar' => 'required',
            'ej_estatus' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['ej_libro', 'ej_numejemplar', 'ej_estatus']);

        $EjemplaresModel = new EjemplaresModel();
        $EjemplaresModel -> update($id, [
            'ej_libro' => trim($post['ej_libro']),
            'ej_numejemplar' => trim($post['ej_numejemplar']),
            'ej_estatus' => trim($post['ej_estatus']),
        ]);

        return redirect() -> to('ejemplares');
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
            return redirect() -> route('ejemplares');
        }

        $EjemplaresModel = new EjemplaresModel();
        $EjemplaresModel -> delete($id);

        return redirect() -> to('ejemplares');
    }
}

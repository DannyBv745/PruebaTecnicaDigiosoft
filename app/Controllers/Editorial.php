<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EditorialModel;

class Editorial extends BaseController
{
    
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $EditorialModel = new EditorialModel();
        $data['editorial'] = $EditorialModel -> findAll();

        return view('editorial/editorial', $data);    }

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
        return view('editorial/nuevaEditorial');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'ed_nombre' => 'required',
            'ed_ubicacion' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['ed_nombre', 'ed_ubicacion']);

        $EditorialModel = new EditorialModel();
        $EditorialModel -> insert([
            'ed_nombre' => trim($post['ed_nombre']),
            'ed_ubicacion' => trim($post['ed_ubicacion']),
        ]);

        return redirect() -> to('editorial');
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
            return redirect() -> route('editorial');
        }

        $EditorialModel = new EditorialModel();
        $data['editorial'] = $EditorialModel -> find($id);

        return view('editorial/editarEditorial', $data);    }

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
            'ed_nombre' => 'required',
            'ed_ubicacion' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['ed_nombre', 'ed_ubicacion']);

        $EditorialModel = new EditorialModel();
        $EditorialModel -> update($id, [
            'ed_nombre' => trim($post['ed_nombre']),
            'ed_ubicacion' => trim($post['ed_ubicacion']),
        ]);

        return redirect() -> to('editorial');    
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
            return redirect() -> route('editorial');
        }

        $EditorialModel = new EditorialModel();
        $EditorialModel -> delete($id);

        return redirect() -> to('editorial');
        }
}

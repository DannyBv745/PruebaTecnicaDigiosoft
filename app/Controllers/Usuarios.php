<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $UsuariosModel = new UsuariosModel();
        $data['usuarios'] = $UsuariosModel -> findAll();

        return view('usuarios/usuarios', $data);
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
        return view('usuarios/nuevoUsuario');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'us_user' => 'required',
            'us_password' => 'required',
            'us_nombre' => 'required',
            'us_apaterno' => 'required',
            'us_amaterno' => 'required',
            'us_telefono' => 'required',
            'us_email' => 'required',
            'us_direccion' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['us_user', 'us_password', 'us_nombre', 'us_apaterno', 'us_amaterno', 'us_telefonor', 'us_email', 'us_direccion']);

        $UsuariosModel = new UsuariosModel();
        $UsuariosModel -> insert([
            'us_user' => trim($post['us_user']),
            'us_password' => trim($post['us_password']),
            'us_nombre' => trim($post['us_nombre']),
            'us_apaterno' => trim($post['us_apaterno']),
            'us_amaterno' => trim($post['us_amaterno']),
            'us_telefono' => trim($post['us_telefonor']),
            'us_email' => trim($post['us_email']),
            'us_direccion' => trim($post['us_direccion']),
        ]);

        return redirect() -> to('usuarios');
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

        $UsuariosModel = new UsuariosModel();
        $data['usuarios'] = $UsuariosModel -> find($id);

        return view('usuarios/editarUsuario', $data);
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
            'us_user' => 'required',
            'us_password' => 'required',
            'us_nombre' => 'required',
            'us_apaterno' => 'required',
            'us_amaterno' => 'required',
            'us_telefono' => 'required',
            'us_email' => 'required',
            'us_direccion' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['us_user', 'us_password', 'us_nombre', 'us_apaterno', 'us_amaterno', 'us_telefono', 'us_email', 'us_direccion']);

        $UsuariosModel = new UsuariosModel();
        $UsuariosModel -> update($id, [
            'us_user' => trim($post['us_user']),
            'us_password' => trim($post['us_password']),
            'us_nombre' => trim($post['us_nombre']),
            'us_apaterno' => trim($post['us_apaterno']),
            'us_amaterno' => trim($post['us_amaterno']),
            'us_telefono' => trim($post['us_telefono']),
            'us_email' => trim($post['us_email']),
            'us_direccion' => trim($post['us_direccion']),
        ]);

        return redirect() -> to('usuarios');
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
            return redirect() -> route('usuarios');
        }

        $UsuariosModel = new UsuariosModel();
        $UsuariosModel -> delete($id);

        return redirect() -> to('usuarios');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PrestamosModel;

class Prestamos extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $PrestamosModel = new PrestamosModel();
        $data['prestamos'] = $PrestamosModel -> findAll();

        return view('prestamos/prestamos', $data);
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

        $UsuariosModel = new UsuariosModel();
        $data['usuarios'] = $UsuariosModel -> findAll();

        $EjemplaresModel = new EjemplaresModel();
        $data['ejemplares'] = $EjemplaresModel -> findAll();

        return view('prestamos/nuevoPrestamo');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas = [
            'pr_prestamo' => 'required',
            'pr_devolucion' => 'required',
            'pr_usuario' => 'required',
            'pr_ejemplar' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['pr_prestamo', 'pr_devolucion', 'pr_usuario', 'pr_ejemplar']);

        $PrestamosModel = new PrestamosModel();
        $PrestamosModel -> insert([
            'pr_prestamo' => trim($post['pr_prestamo']),
            'pr_devolucion' => trim($post['pr_devolucion']),
            'pr_usuario' => trim($post['pr_usuario']),
            'pr_ejemplar' => trim($post['pr_ejemplar']),
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
            return redirect() -> route('prestamos');
        }

        $UsuariosModel = new UsuariosModel();
        $data['usuarios'] = $UsuariosModel -> findAll();

        $EjemplaresModel = new EjemplaresModel();
        $data['ejemplares'] = $EjemplaresModel -> findAll();


        return view('prestamos/editarPrestamo', $data);
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
            'pr_prestamo' => 'required',
            'pr_devolucion' => 'required',
            'pr_usuario' => 'required',
            'pr_ejemplar' => 'required',
        ];

        if (!$this -> validate($reglas)) {
            return redirect() -> back() ->withInput() -> with('error', $this -> validator -> listErrors());
        }

        $post = $this -> request -> getPost(['pr_prestamo', 'pr_devolucion', 'pr_usuario', 'pr_ejemplar']);

        $PrestamosModel = new PrestamosModel();
        $PrestamosModel -> update($id, [
            'pr_prestamo' => trim($post['pr_prestamo']),
            'pr_devolucion' => trim($post['pr_devolucion']),
            'pr_usuario' => trim($post['pr_usuario']),
            'pr_ejemplar' => trim($post['pr_ejemplar']),
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
            return redirect() -> route('prestamos');
        }

        $PrestamosModel = new PrestamosModel();
        $PrestamosModel -> delete($id);

        return redirect() -> to('prestamos');
    }
}

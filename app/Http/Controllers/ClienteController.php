<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nos trae todos los registros de la tabla cliente
        $clientes = Cliente::all();
       
        return view('viewsCrud.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //va a al formulario insertar
    public function create()
    {
        return view('viewsCrud.insertar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // va a enviar lo que hay en el formulario insertar
    public function store(Request $request)
    {
        $cliente  = new Cliente();
        $cliente->nombre = $request->get('nombre');
        $cliente->imagen = $request->get('imagen');
        $cliente->cedula = $request->get('cedula');
        $cliente->correo = $request->get('correo');
        $cliente->telefono = $request->get('telefono');
        $cliente->observaciones = $request->get('observaciones');
        
        if($imagen = $request->file('imagen')){
            $rutaGuardarImagen = 'public/imagen/';
            $imagenCliente = date('ymdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenCliente);
            $cliente['imagen'] = "$imagenCliente";
        }
        //metodo articulos

        $cliente->save();

        return redirect('/cliente');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // este metodo se le asigna a la vista editar
    public function edit($id)
    {
        //traemos solo el campo id
        $cliente = Cliente::find($id);
        return view('viewsCrud.editar')->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // actualizamos la vista editar
    public function update(Request $request, $id)
    {
        $cliente  =  Cliente::find($id);
        
        // capturamos los datos
        $cliente->nombre = $request->get('nombre');
        $cliente->imagen = $request->get('imagen');
        $cliente->cedula = $request->get('cedula');
        $cliente->correo = $request->get('correo');
        $cliente->telefono = $request->get('telefono');
        $cliente->observaciones = $request->get('observaciones');
        

        //metodo articulos

        $cliente->save();

        return redirect('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        $cliente->delete();
        return redirect('/cliente');
    }
}

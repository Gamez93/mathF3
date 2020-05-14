<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$materias = Materia::orderBy('id','DESC');
        /*$materias = DB::table('materia')->get();

        return view('Materia.index',compact('materias'));*/

        $materias = DB::table('materia')->get();

        return view('Materia.index', ['materias' => $materias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Materia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[  'codigo_materia'  =>'required',
                                    'nombre'          =>'required',
                                    'descripcion'     =>'required',
                                    'objetivo_general'=>'required']);

        Materia::find($id)->update($request->all());
        return redirect()->route('Materia.index')->with('success','Registro actualizado satisfactoriamente');

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
        $materias=Materia::find($id);
        return  view('Materia.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materias=Materia::find($id);
        return view('Materia.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[  'codigo_materia'  =>'required',
                                    'nombre'          =>'required',
                                    'descripcion'     =>'required',
                                    'objetivo_general'=>'required']);

        Materia::find($id)->update($request->all());
        return redirect()->route('Materia.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Materia::find($id)->delete();
        return redirect()->route('Materia.index')->with('success','Registro eliminado satisfactoriamente');

    }

    public function updateFromRB(Request $request)
    {
        //
        //$this->validate($request,[  'seleccion'  =>'required']);
        //Materia::find($id)->update($request->all());
        //$data = Input::all();
        consol.log($request);
        $id = $request->id;
        if($id > 0){
          $materia = Materia::find($id);
          $materia->seleccion = $request->seleccion;
          //$materia->fill($request->all());
          $materia->save();
        }


        return //Input::all();
      response()->json([
         "mensaje" => "Materia Seleccionada."
        ]);
    }


}

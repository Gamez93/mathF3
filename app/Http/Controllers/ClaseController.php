<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase;

class ClaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = auth()->user()->id;
        //dd($idUser);
        $anotaciones = Clase::where('users_id',$idUser)->get();

        if (!($anotaciones->count() >= 1)) {
            $anotaciones = Clase::create([
                'users_id' => $idUser,
                'tema'       => 'Nueva Clase',
                'contenido'  => 'Hoja de estudio',
              ]);
        }

        $anotaciones = Clase::where('users_id',$idUser)->get();
        //session()->put('idClase', $anotaciones[0]->id);
        //Retorno de la vista
        $clase = $anotaciones[0];
        return view('Clase.index',compact('anotaciones','clase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        $idUser = auth()->user()->id;

        Clase::create([
          'tema' =>$request->tema,
          'users_id'=>$idUser,
          'contenido'=>'Universidad Centroamericana "José Simeón Cañas"',
        ]);

        //Retorno de vista
        return redirect()->route('clase')->with('success','Clase creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $idUser = auth()->user()->id;
      //dd($idUser);
      $anotaciones = Clase::where('users_id',$idUser)->get();

      $clase = Clase::Findorfail($id);

      return view('Clase.index',compact('anotaciones','clase'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //Buscamos Materia por ID
      $clase = Clase::Findorfail($id);

      //delete
      $clase->delete();

      //Retorno de vista
      return redirect()->route('clase')->with('success','Clase eliminada satisfactoriamente');
    }
}

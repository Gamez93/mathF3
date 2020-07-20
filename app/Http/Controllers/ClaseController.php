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

        //$anotaciones = Clase::where('users_id',$idUser)->get();
        $anotaciones = Clase::where('users_id',$idUser)->orderBy('id', 'desc')->get();
        //session()->put('idClase', $anotaciones[0]->id);
        //Retorno de la vista
        $clase = $anotaciones[0];

        //Guardamos el id de clase inicial en la sesion
        session()->put('idClaseActual', $clase->id);

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

        $anotaciones = Clase::where('users_id',$idUser)->orderBy('id', 'desc')->get();
        $clase = $anotaciones[0];
        //dd($clase);
        //Guardamos el id de clase inicial en la sesion
        session()->put('idClaseActual', $clase->id);

        //Retorno de vista
        return redirect()->route('clase')->with('success','Clase creada satisfactoriamente');
    }

    public function uploadFile(Request $request)
    {   //dd($request->file('file')->getClientOriginalName());
      $idUser = auth()->user()->id;
      //dd($request->file('file')->get('filename'));
      $content = $request->file('file')->get('filename');//File::get($filename);
      //dd($content);
      //$request->file('file')->store('public');
      $clase = Clase::create([
          'users_id' => $idUser,
          'tema'       => $request->file('file')->getClientOriginalName(),
          'contenido'  => $content,
        ]);

        $anotaciones = Clase::where('users_id',$idUser)->orderBy('id', 'desc')->get();
        //$anotaciones = Clase::where('users_id',$idUser)->get();
        //session()->put('idClase', $anotaciones[0]->id);
        //Retorno de la vista
        //$clase = $anotaciones[0];
        //echo $content;
        //Retorno de vista
        return view('Clase.index',compact('anotaciones','clase','content'));
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
      //$anotaciones = Clase::where('users_id',$idUser)->get();
      $anotaciones = Clase::where('users_id',$idUser)->orderBy('id', 'desc')->get();

      $clase = Clase::Findorfail($id);

      echo $clase->contenido;
      //return view('Clase.index',compact('anotaciones','clase'));
    }

    public function show2(Request $request){
      $id = $request->id;

      $idUser = auth()->user()->id;
      //dd($idUser);
      //$anotaciones = Clase::where('users_id',$idUser)->get();
      $anotaciones = Clase::where('users_id',$idUser)->orderBy('id', 'desc')->get();

      $clase = Clase::Findorfail($id);

      //Guardamos el id de clase inicial en la sesion
      session()->put('idClaseActual', $id);

      echo $clase->contenido;
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
    {   $idUser = auth()->user()->id;

        //dd($request->idclase);

        $clase = Clase::Findorfail($request->idclase);
        $clase->fill($request->only(['contenido']));
        $clase->save();

        //$anotaciones = Clase::where('users_id',$idUser)->get();
        $anotaciones = Clase::where('users_id',$idUser)->orderBy('id', 'desc')->get();
        //session()->put('idClase', $anotaciones[0]->id);
        //Retorno de la vista
        //$clase = $anotaciones[0];
        return view('Clase.index',compact('anotaciones','clase'));
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

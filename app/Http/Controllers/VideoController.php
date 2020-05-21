<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Unidad;

class VideoController extends Controller
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
      //titulo
      $title = 'Videos disponibles por Unidad';

      //id materia seleccionada
      $id = session()->get('idMateria');

      $unidades = Unidad::with('videos')->where('materia_id',$id)->get();

      //Retorno de la vista
      return view('Video.index',compact('title','unidades'));
    }

    public function indexvideo($id)
    {
      //titulo
      $title = 'Lista de Videos';

      //id materia seleccionada
      $id2 = session()->get('idMateria');

      //Guardamos en sesion el Id de la materia que se esta editando
      session()->put('idUnidad', $id);

      $videos = Video::with('unidad')->where('unidad_id',$id)->simplePaginate(8);

      //titulo
      $title = $videos[0]->unidad->nombre . ' - ' . $videos[0]->unidad->descripcion;

      $btn_add = 'Agregar nuevo video';

      //Retorno de la vista
      return view('Video.indexvideo',compact('title','videos','btn_add'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //id Unidad seleccionada
          $idUnidad = session()->get('idUnidad');
          //titulo de la pagina
          $title = 'Nuevo Video';

          //titulo del boton
          $btn_store = 'Guardar';

          //titulo del boton
          $btn_cancel = 'Cancelar';

          //materias
          $unidad = Unidad::with('materia')->Findorfail($idUnidad);

          //return de vista
          return view('video.create',compact('title','btn_store','btn_cancel','unidad'));
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
        //
    }
}

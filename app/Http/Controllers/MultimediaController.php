<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Materia;
use App\Unidad;
use App\Video;
use App\Bibliografia;

class MultimediaController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showprograma($id)
    {
        //Select de la materia
        $materia = Materia::Findorfail($id);

        //titulo de la pagina
        $title = 'Programa de ' . ' "' . $materia->nombre . '"';

        //titulo del boton
        $btn_cancel = 'Regresar';

        //return de vista + parametros
        return view('Multimedia.show_materia',compact('title','btn_cancel','materia'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showvideo($id)
    {
        //titulo de la pagina
        $materia = Materia::Findorfail($id);

        $title = 'Videos de ' . $materia->nombre;

        $unidades = Unidad::with('videos')->where('materia_id',$id)->get();


        //return de vista + parametros
        return view('Multimedia.show_video',compact('title','unidades'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbiblio($id)
    {
        //titulo de la pagina
        $materia = Materia::Findorfail($id);

        $title = 'Bibliografia de ' . $materia->nombre;

        $bibliografias = Bibliografia::with('materia')->where('materia_id',$id)->get();


        //return de vista + parametros
        return view('Multimedia.show_biblio',compact('title','bibliografias'));
    }

    public function showlist(){
        //titulo de la pagina
        $title = 'Contenido de Materias';

        //listado de materias activas
        $materias = Materia::with('bibliografias')->with('unidades')->where('estado','1')->get();

        //Retorno de la vista
        return view('Multimedia.show_list',compact('materias','title'));
    }
}

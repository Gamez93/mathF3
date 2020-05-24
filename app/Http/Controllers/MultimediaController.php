<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Materia;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    {
        //
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
        $btn_store = 'Guardar';

        //titulo del boton
        $btn_cancel = 'Regresar';

        //titulo del contenido
        $title_c = 'Administrar Contenido de' . ' "' . $materia->nombre . '"';

        //Guardamos en sesion el Id de la materia que se esta editando
        //session()->put('idMateria', $materia->id);

        //return de vista + parametros
        return view('Multimedia.showmateria',compact('title','btn_store','btn_cancel','materia'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showvideo($id)
    {
        //Select de la materia
        $materia = Materia::Findorfail($id);

        //titulo de la pagina
        $title = 'Programa de ' . ' "' . $materia->nombre . '"';

        //titulo del boton
        $btn_store = 'Guardar';

        //titulo del boton
        $btn_cancel = 'Regresar';

        //titulo del contenido
        $title_c = 'Administrar Contenido de' . ' "' . $materia->nombre . '"';

        //Guardamos en sesion el Id de la materia que se esta editando
        //session()->put('idMateria', $materia->id);

        //return de vista + parametros
        return view('Multimedia.showmateria',compact('title','btn_store','btn_cancel','materia','title_c'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbiblio($id)
    {
        //Select de la materia
        $materia = Materia::Findorfail($id);

        //titulo de la pagina
        $title = 'Programa de ' . ' "' . $materia->nombre . '"';

        //titulo del boton
        $btn_store = 'Guardar';

        //titulo del boton
        $btn_cancel = 'Regresar';

        //titulo del contenido
        $title_c = 'Administrar Contenido de' . ' "' . $materia->nombre . '"';

        //Guardamos en sesion el Id de la materia que se esta editando
        //session()->put('idMateria', $materia->id);

        //return de vista + parametros
        return view('Multimedia.showmateria',compact('title','btn_store','btn_cancel','materia','title_c'));
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

    public function showlist(){
        //titulo de la pagina
            $title = 'Contenido de Materias';
  
            //listado de materias activas
            $materias = Materia::with('bibliografias')->with('unidades')->where('estado','1')->get();
  
            //Retorno de la vista
            return view('Multimedia.showlist',compact('materias','title'));
      }
}

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
    {   //titulo de la pagina
        $title = 'Listado de Materias';
        //texto del boton Add
        $btn_add = 'Crear nueva Materia';

        //listado de materias activas
        $materias = Materia::where('estado','1')->simplePaginate(8);

        //Retorno de la vista
        return view('Materia.index',compact('materias','title','btn_add'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
      {   //titulo de la pagina
          $title = 'Nueva Materia';

          //titulo del boton
          $btn_store = 'Guardar';

          //titulo del boton
          $btn_cancel = 'Cancelar';

          //return de vista
          return view('materia.create',compact('title','btn_store','btn_cancel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //Validacion de campos ingresados
        $this->validate($request,[  'codigo_materia'          =>'required|alpha_num|max:10',
                                    'nombre'                  =>'required|max:255',
                                    'descripcion'             =>'required',
                                    'objetivo_general'        =>'required',
                                    'prerrequisito'           =>'required|max:20',
                                    'horasPorCiclo'           =>'required|numeric',
                                    'horasTeoricasSemanales'  =>'required|numeric',
                                    'horasPracticasSemanales' =>'required|numeric',
                                    'cicloEnSemanas'          =>'required|numeric',
                                    'horaClase'               =>'required|numeric',
                                    'unidadesValorativas'     =>'required|numeric',
                                    'identificacionCiclo'     =>'required',
                                    'numeroDeOrden'           =>'required|numeric',]);

        //Create de nueva Materia
        Materia::create([
          'codigo_materia'          =>$request->codigo_materia,
          'nombre'                  =>$request->nombre,
          'descripcion'             =>$request->descripcion,
          'objetivo_general'        =>$request->objetivo_general,
          'prerrequisito'           =>$request->prerrequisito,
          'horasPorCiclo'           =>$request->horasPorCiclo,
          'horasTeoricasSemanales'  =>$request->horasTeoricasSemanales,
          'horasPracticasSemanales' =>$request->horasPracticasSemanales,
          'cicloEnSemanas'          =>$request->cicloEnSemanas,
          'horaClase'               =>$request->horaClase,
          'unidadesValorativas'     =>$request->unidadesValorativas,
          'identificacionCiclo'     =>$request->identificacionCiclo,
          'numeroDeOrden'           =>$request->numeroDeOrden,
        ]);

        //Retunr de vista y mensaje
        return redirect()->route('materia')->with('message', 'Materia Creada Correctamente.');
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
    public function edit(Materia $materia)
    {   //titulo de la pagina
        $title = 'Editar Materia' . ' "' . $materia->nombre . '"';

        //titulo del boton
        $btn_store = 'Guardar';

        //titulo del boton
        $btn_cancel = 'Cancelar';

        //return de vista + parametros
        return view('Materia.editar',compact('title','btn_store','btn_cancel','materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { //Validacion de campos ingresados
        $this->validate($request,[  'codigo_materia'          =>'required|alpha_num|max:10',
                                    'nombre'                  =>'required|max:255',
                                    'descripcion'             =>'required',
                                    'objetivo_general'        =>'required',
                                    'prerrequisito'           =>'required|max:20',
                                    'horasPorCiclo'           =>'required|numeric',
                                    'horasTeoricasSemanales'  =>'required|numeric',
                                    'horasPracticasSemanales' =>'required|numeric',
                                    'cicloEnSemanas'          =>'required|numeric',
                                    'horaClase'               =>'required|numeric',
                                    'unidadesValorativas'     =>'required|numeric',
                                    'identificacionCiclo'     =>'required',
                                    'numeroDeOrden'           =>'required|numeric',]);

        Materia::find($id)->update($request->all());

        return redirect()->route('materia')->with('message', 'Materia Editada Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = Materia::Findorfail($id);

        $materia->delete();

        return redirect()->route('materia')->with('success','Materia eliminada satisfactoriamente');
    }

}

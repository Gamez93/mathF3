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

          //materias
          //$materias = Materia::where('estado','1')->get();

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
        $this->validate($request,[  'codigo_materia'          =>'required',
                                    'nombre'                  =>'required',
                                    'descripcion'             =>'required',
                                    'objetivo_general'        =>'required',
                                    'prerrequisito'           =>'required',
                                    'horasPorCiclo'           =>'required',
                                    'horasTeoricasSemanales'  =>'required',
                                    'horasPracticasSemanales' =>'required',
                                    'cicloEnSemanas'          =>'required',
                                    'horaClase'               =>'required',
                                    'unidadesValorativas'     =>'required',
                                    'identificacionCiclo'     =>'required',
                                    'numeroDeOrden'           =>'required',]);

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
    {
        //
        //$materias=Materia::find($id);
        return view('Materia.editar');
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

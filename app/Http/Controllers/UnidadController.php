<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;

class UnidadController extends Controller
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
          //texto del boton Add
          $btn_add = 'Crear nueva Unidad';

          //Listado de bibliografias y su Materia correspondiente
          //$bibliografias = DB::table('bibliografia')->get();
          $id2 = session()->get('idMateria');
          //dd($id2);
          $unidades = Unidad::with('materia')->where('materia_id',$id2)->simplePaginate(8);

          //titulo de la pagina
          $title = 'Listado de Unidades ';// . $unidades[1]->materia->nombre;

          //Retorno de la vista
          return view('Unidad.index',compact('unidades','title','btn_add'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //titulo de la pagina
          $title = 'Nueva Unidad';

          //titulo del boton
          $btn_store = 'Guardar';

          //titulo del boton
          $btn_cancel = 'Cancelar';

          //materias
          $unidades = Unidad::get();

          //return de vista
          return view('unidad.create',compact('title','btn_store','btn_cancel','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $data = request()->validate([
          'nombre'      => 'required|max:20',
          'descripcion' => 'required',
          'objetivo'    => 'required'
        ]);
        //dd($request);
        $id2 = session()->get('idMateria');

        Unidad::create([
          'nombre'      => $request->nombre,
          'descripcion' => $request->descripcion,
          'objetivo'    => $request->objetivo,
          'materia_id'  => $id2
        ]);

        return redirect()->action('UnidadController@index')->with('message', 'Unidad Creada Correctamente.');
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
    public function edit(Unidad $unidad)
    {
          //titulo de la pagina
          $title = 'Editar ' . $unidad->nombre;

          //titulo del boton
          $btn_store = 'Guardar';

          //titulo del boton
          $btn_cancel = 'Cancelar';

          //return de vista + parametros
          return view('unidad.editar',compact('title','btn_store','btn_cancel','unidad'));
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
        $data = request()->validate([
          'nombre'      => 'required|max:20',
          'descripcion' => 'required',
          'objetivo'    => 'required'
        ]);

        $unidad = Unidad::Findorfail($id);
        $unidad->fill($request->only(['nombre','descripcion','objetivo']));
        $unidad->save();

        return redirect()->action('UnidadController@index')->with('message', 'Unidad editada Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $unidad = Unidad::Findorfail($id);
          //dd($bibliografia->id);
          //$bibliografia = Bibliografia::Findorfail($id);
          $unidad->delete();
          return redirect()->action('UnidadController@index')->with('message', 'Unidad eliminada Correctamente.');
    }
}

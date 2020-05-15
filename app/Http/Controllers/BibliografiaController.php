<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Bibliografia;
use App\Materia;

use Illuminate\Http\Request;

class BibliografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //titulo de la pagina
        $title = 'Listado de Bibliografias';
        //texto del boton Add
        $btn_add = 'Crear nueva Bibliografia';

        //Listado de bibliografias y su Materia correspondiente
        //$bibliografias = DB::table('bibliografia')->get();
        $bibliografias = Bibliografia::with('materia')->where('estado','1')->simplePaginate(8);
        //dd($bibliografias);

        //Retorno de la vista
        return view('Bibliografia.index',compact('bibliografias','title','btn_add'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //titulo de la pagina
        $title = 'Nueva Bibliografia';

        //titulo del boton
        $btn_store = 'Guardar';

        //titulo del boton
        $btn_cancel = 'Cancelar';

        //materias
        $materias = Materia::where('estado','1')->get();

        //return de vista
        return view('bibliografia.create',compact('title','btn_store','btn_cancel','materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        Bibliografia::create([
          'descripcion' => $request->descripcion,
          'URL' => $request->URL,
          'materia_id' => $request->materia_id
        ]);

        return redirect()->route('bibliografia')->with('message', 'Bibliografia Creada Correctamente.');
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
    public function edit(Bibliografia $bibliografia)
    {   //titulo de la pagina
        $title = 'Editar Bibliografia';

        //titulo del boton
        $btn_store = 'Guardar';

        //titulo del boton
        $btn_cancel = 'Cancelar';

        //materias
        $materias = Materia::where('estado','1')->get();

        //return de vista + parametros
        return view('bibliografia.editar',compact('title','btn_store','btn_cancel','materias','bibliografia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //dd('entra');
        $data = request()->validate([
          'materia_id' => 'required',
          'descripcion' => 'required',
          'URL' => 'required'
        ]);

        $bibliografia = Bibliografia::Findorfail($id);
        $bibliografia->fill($request->only(['materia_id','descripcion','URL']));
        $bibliografia['estado'] = 1;
        $bibliografia->save();

        return redirect()->route('bibliografia')->with('message', 'Bibliografia Editada Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('Bibliografia.index');
    }
}

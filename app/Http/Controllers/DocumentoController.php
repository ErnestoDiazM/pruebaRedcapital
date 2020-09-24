<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use DB;
use App\User;

class DocumentoController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    
    public function index()
    {
        
        $docs = DB::table('users as u')
            ->join('documentos as doc', 'u.id', '=', 'doc.usuarioasignado')
             ->select('doc.*', 'u.nombre as username', 'u.apellido')
            ->get();
           
        return view('documentos.listadocumentos',compact('docs'));

    }

    
    public function createView() {
        $data = DB::table("users")->get();
        
       
        return view('documentos.create',compact('data'));

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:250',
            'tipo' => 'required|max:250',
            'usuario' => 'required',
          
        ]);
        $doc = new Documento();

        $nombre2 = strtoupper($request->nombre);
       
        $doc->nombre = $nombre2;
        $doc->tipo = $request->tipo;
        $doc->usuarioasignado = $request->usuario;
        
        $doc->save();

        return redirect('documentos')->with('state_messaje', 'Documento creado');


    }

    /**
     * DELETE USERS
     * @param type $id
     */
    public function delete($id) {
        $data = array();
        $mensaje = "";

       
            Documento::destroy($id);
            $mensaje = "Documento Eliminado";
    


        return redirect('documentos')->with('state_messaje', $mensaje);
    }

    /**
     * SHOE FATA FOR UPDATE USERS
     * @param type $id
     */
    public function updateView($id) {
        $data = array();

        $data = DB::table('users as u')
        ->join('documentos as doc', 'u.id', '=', 'doc.usuarioasignado')
         ->select('doc.*', 'u.id as userid' ,'u.nombre as username', 'u.apellido')
        ->first();
        $usuario= DB::table('users')->get();

        
       
               
                return view('documentos.update' , compact('data','usuario'));

    }

    /**
     * UPDATE SAVE USERS
     * @param Request $request
     */
    public function postUpdate(Request $request) 
    
    {
        
        $this->validate($request, [
        'nombre' => 'required|max:250',
        'tipo' => 'required|max:250',
        'usuario' => 'required'
        
    ]);

    $doc = Documento::find($request->id);
    $doc->nombre = $request->nombre;
    $doc->tipo = $request->tipo;
    $doc->usuarioasignado = $request->usuario;
    
    $doc->save();

    return redirect('documentos')->with('state_messaje', 'Documento Actualizado');
    }
}

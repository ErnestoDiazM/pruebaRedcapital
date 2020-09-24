<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use DB;

class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $data['listausuarios'] = User::OrderBy('id', 'asc')->get();
        return view('usuarios.listausuarios',$data);

    }

    /**
     * CREATE NEW USERS VIEW
     * @return type
     */
    public function createView() {
        $data = array();

        return view('usuarios.create');

    }


    /**
     * CREATE SAVE USERS
     * @param \App\Http\Controllers\Request $request
     */

    public function create(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required|max:250',
            'apellido' => 'required|max:250',
            'email' => 'required|max:250|email|unique:users',
            'password' => 'required|min:4',
            'privilegio' => 'required|max:250',
          
            
        ]);
        $user = new User();

        $nombre2 = strtoupper($request->nombre);
        $apellido2 = strtoupper($request->apellido);
        $email2 = strtoupper($request->email);
        $password2 = (bcrypt($request->password));
        $privilegio2 = strtoupper($request->privilegio);
        

        $user->nombre = $nombre2;
        $user->apellido = $apellido2;
        $user->email = $email2;
        $user->password = $password2;
        $user->privilegio = $privilegio2;
        $user->remember_token =Str::random(10);
        $user->save();

        return redirect('usuarios')->with('state_messaje', 'Usuario creado');


    }

    /**
     * DELETE USERS
     * @param type $id
     */
    public function delete($id) {
        $data = array();
        $mensaje = "";
        $users = DB::table('users')->count();

        if ($users > 1) {
            User::destroy($id);
            $mensaje = "Usuario Eliminado";
        } else {
            $mensaje = "Debe quedar al menos 1 usuario en el sistema";
        }


        return redirect('usuarios')->with('state_messaje', $mensaje);
    }

    /**
     * SHOE FATA FOR UPDATE USERS
     * @param type $id
     */
    public function updateView($id) {
        $data = array();

        $data['user'] = User::where('id', '=', $id)
                ->select('id', 'nombre', 'apellido' ,'email','password','privilegio')
                ->first();

               
                return view('usuarios.update' , $data);

    }

    /**
     * UPDATE SAVE USERS
     * @param Request $request
     */
    public function postUpdate(Request $request) {$this->validate($request, [
        'nombre' => 'required|max:250',
        'apellido' => 'required|max:250',
        'email' => 'required|max:250|email',
        'password' => 'required|min:4',
        'privilegio' => 'required|max:250'
    ]);

    $user = User::find($request->id);
    $user->nombre = strtoupper($request->nombre);
    $user->apellido = strtoupper($request->apellido);
    $user->email = strtoupper($request->email);
    $user->privilegio = strtoupper($request->privilegio);
    if (strlen($request->password >= 4)) {
        $user->password = (bcrypt($request->password));
    }
    $user->save();

    return redirect('usuarios')->with('state_messaje', 'Usuario Actualizado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Role;
use App\Models\User;
use Validator;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
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
        $usuarios = User::all();

        return view('user.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|string|email|max:255|unique:users,email',
            'password'  => 'required|min:6'
        ]);

        $role_user  = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_apto  = Role::where('name', 'representante')->first();

        $user = new User;
        $user->name             = $request->name;
        $user->username         = $request->username;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);

        try {
            $user->save();

            if ($request->rol == 'admin') $user->roles()->attach($role_admin);
            if ($request->rol == 'usuario') $user->roles()->attach($role_user);
            if ($request->rol == 'representante') $user->roles()->attach($role_apto);

        } catch (\Exception $e) {
            return redirect('/user/create')->with(['status','El nombre de usuario o correo electronico en uso.']);
        }

        return redirect('/user');
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
        $user = User::find($id);
        $rol  = '';

        if ($user->roles) {
            $rol = $user->roles()->first()->name;
        }

        return view('user.edit', compact('user', 'rol'));
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
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|string|email|max:255|unique:users,email,'.$id.',id',
        ]);

        $role_user  = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_apto  = Role::where('name', 'representante')->first();

        $user = User::find($id);
        $user->name             = $request->name;
        $user->username         = $request->username;
        $user->email            = $request->email;

        if ($request->rol != $user->roles[0]->name) {
            $user->roles()->detach();
            if ($request->rol == 'admin') $user->roles()->attach($role_admin);
            if ($request->rol == 'usuario') $user->roles()->attach($role_user);
            if ($request->rol == 'representante') $user->roles()->attach($role_apto);
        }

        if ($request->password) {
            $user->password     = Hash::make($request->password);
        }

        $user->save();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $usuarios = User::with(['roles'])->orderBy('id', 'desc')->get();

        return Datatables::of($usuarios)
                ->addColumn('action', function ($user)
                {
                    if ($user->hasRole('superadmin')) return '';

                    $html  = "<form class='delete-form text-right' action='/user/{$user->id}' method='post'>" . csrf_field() . method_field('DELETE');
                    $html .= "<a href='/user/{$user->id}/edit' class='btn btn-xs btn-primary actions'>
                                <i class='glyphicon glyphicon-edit'></i> Editar
                              </a>";
                    $html .= "<button class='btn btn-xs btn-danger actions' type='button'><i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";

                    return $html;
                })
                ->editColumn('rol', function ($row) {
                    return $this->rolString($row->roles[0]->name);
                })
                ->editColumn('name', function ($user) {
                    return '<a href="/user/'.$user->id.'/edit">'.$user->name.'</a>';
                })
                ->rawColumns(['name', 'action'])
                ->make(true);
    }

    public function rolesList()
    {
        return array(
            'user'          => 'Usuario',
            'admin'         => 'Administrador',
            'superadmin'    => 'Super Admin'
        );
    }

    public function rolString($rol)
    {
        $roles = $this->rolesList();
        return $roles[$rol];
    }
}

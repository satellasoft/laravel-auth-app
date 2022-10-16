<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|min:5',
            'email'      => 'required|email',
            'password'   => 'required|min:7',
            'active'     => 'required',
            'permission' => 'required'
        ]);

        $user = new User();

        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->password   = Hash::make($request->password);
        $user->active     = $request->active;
        $user->permission = $request->permission;

        if (!$user->save())
            return redirect()->route('user.create')->withErrors(['Houve um erro ao tentar inserir um novo usuário']);

        return redirect()->route('user.edit', ['id' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user || $user == null)
            return response('Usuário não encontrado');

        return view('admin.user.show', [
            'user' => $user
        ]);
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

        if (!$user || $user == null)
            return response('Usuário não encontrado');

        return view('admin.user.edit', [
            'user' => $user
        ]);
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
        $user = User::find($id);

        if (!$user || $user == null)
            return response('Usuário não encontrado');

        $request->validate([
            'name'       => 'required|min:5',
            'email'      => 'required|email',
            'active'     => 'required',
            'permission' => 'required'
        ]);

        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->active     = $request->active;
        $user->permission = $request->permission;

        if (!$user->save())
            return redirect()->route('user.edit', ['id' => $user->id])->withErrors(['Houve um erro ao tentar inserir um novo usuário']);

        return redirect()->route('user.edit', ['id' => $user->id]);
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

        if (!$user || $user == null)
            return response('Usuário não encontrado');

        $user->delete();

        return redirect()->route('user.index');
    }

    public function password($id)
    {
        $user = User::find($id);

        if (!$user || $user == null)
            return response('Usuário não encontrado');

        return view('admin.user.password', [
            'user' => $user
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user || $user == null)
            return response('Usuário não encontrado');

        $user->password = Hash::make($request->password);

        if (!$user->save())
            return redirect()->route('user.password', ['id' => $user->id]);

        return redirect()->route('user.show', ['id' => $user->id]);
    }
}

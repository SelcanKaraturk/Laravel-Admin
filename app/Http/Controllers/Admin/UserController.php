<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->load('roles');
        /* foreach ($users as $user){
             foreach ($user->roles as $role){
                 return $role->name;
             }
         }*/
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       /* $dil = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
        dd($dil);*/

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);


        if ($user) {
            $role = Role::findById($request->role);
            $user->assignRole($role);
            return back()->with([
                'message' => 'Kayıt Başarılı',
                'icon' => 'success'
            ]);
        }
        return back()->withErrors('Bir Hata Oluştu');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id)->load('roles');
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $update = $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if ($update) {
            $role = Role::find($request->role);
            $user->assignRole($role);
            return redirect()->route('admin.users.index')->with([
                'message' => 'Güncelleme Başarılı',
                'type' => 'success'
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) //Bu şekilde model ile kullanarak veritabanından veri çekmeyi azaltabiliriz
    {
        $user->delete();
        return back()->with([
            'message' => 'Kayıt Başarıyla Silindi',
            'type' => 'success',
        ]);

    }
}

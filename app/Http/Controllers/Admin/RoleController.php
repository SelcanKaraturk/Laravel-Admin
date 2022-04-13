<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = slugify($request->name);
        $request->merge(['name' => $role]);
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
            'is_see_admin' => 'required',
        ]);
        if ($validated) {
            Role::create([
                'name' => $request->name,
                'is_see_admin' => $request->is_see_admin,
            ]);
            return back()->with([
                'message' => 'Kayıt Başarılı',
                'type' => 'success'
            ]);
        }
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
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
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
        $role = slugify($request->name);
        $request->merge(['name' => $role]);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_see_admin' => 'required',
        ]);

        $role = Role::findById($id);

        $roleName = Role::where('name', $request->name)->first();
        if ($roleName && $roleName->id !== $role->id) {
            return back()->with([
                'message' => 'böyle bir kayıt daha önce oluşturulmuş',
                'type' => 'danger'
            ]);
        } elseif ($validated) {
            $role->update([
                'name' => $request->name,
                'is_see_admin' => $request->is_see_admin,
            ]);

            return redirect()->route('admin.roles.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role->is_main !== 1)
            $role->delete();
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function menage_permissions($id)
    {
        $permissions = Permission::all();
        $role = Role::findById($id)->load('permissions');
        return view('admin.partials.manage-permissions', compact('permissions', 'role'));
    }

    public function menage_permissions_role(Request $request)
    {
        $role = Role::findById($request->id);
        $rolePerm = $request->permissions;
        $permissions = Permission::all();
        foreach ($permissions as $perm) {
            $perm->removeRole($role);
        }
        foreach ($rolePerm as $key => $item){
            $perm= Permission::findById($key);
            $role->givePermissionTo($perm);
        }
        return back();
    }
}

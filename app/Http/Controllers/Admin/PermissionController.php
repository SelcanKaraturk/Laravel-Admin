<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$name = Str::of($request->name)->trim();
        $name = Str::slug($name);*/
        /*$this->validate($request, [
            'name' => 'required|unique:permissions|string',
            'slug' => 'required|string'
        ]);*/
        $name = slugify($request->name);
        $request->merge(['name' => $name]);
        $validated = $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'is_main' => 'required',
        ]);

        if ($validated) {
            $perms = Permission::create([
                'name' => $request->name,
                'is_main' => $request->is_main
            ]);
        }
        return back()->with([
            'message' => 'Kayıt Başarılı',
            'type' => 'success'
        ]);
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
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
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

        $newPer = slugify($request->name);
        $request->merge(['name' => $newPer]);
        $permissions = Permission::all();

        $validated = $request->validate([
            'name' => 'required|max:255',
            'is_main' => 'required',
        ]);
        $findPer = Permission::findById($id);
        if ($validated) {
            $findPer->update([
                'name' => $request->name,
                'is_main' => $request->is_main
            ]);
            return back()->with([
                'message' => 'Kayıt Güncellendi',
                'type' => 'success'
            ]);
        } else {
            return back()->with([
                'message' => 'Kayıt Güncellenirken bir hata oluştu',
                'type' => 'success'
            ]);
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
        $perm = Permission::find($id);
        if ($perm->is_main !== 1)
            $perm->delete();
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }
}

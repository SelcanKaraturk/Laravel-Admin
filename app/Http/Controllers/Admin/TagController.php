<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'name' => 'required|string|unique:tags',
        ]);
        $tag = $request->except('_token');
        $tag = Tag::create($tag);
        return redirect()->route('admin.tag.index')->with([
            'message' => 'Kayıt Başarılı',
            'icon' => 'success'
        ]);
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
        $tag = Tag::find($id);
        return view('admin.tag.edit' ,compact('tag'));
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
        $tag = Tag::find($id);
        $searchTag = Tag::where('name',$request->name)->first();

        if ($searchTag && $searchTag->id !== $tag->id){
            return redirect()->route('admin.tag.index')->with([
                'message' => 'Bu kategori sistemde mevcuttur',
                'icon' => 'error',
            ]);
        }
        else{
            $tag->update([
                'name' => $request->name,
            ]);
            return redirect()->route('admin.tag.index')->with([
                'message' => 'Kayıt Güncellendi',
                'icon' => 'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('admin.tag.index')->with([
            'message' => 'Kayıt Başarıyla Silindi',
            'icon' => 'success'
        ]);
    }
}

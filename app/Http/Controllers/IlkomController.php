<?php

namespace App\Http\Controllers;

use App\Models\Ilkom;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class IlkomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.crud.index',[
            'ilkoms'=>Ilkom::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|max:255|unique:ilkoms',
            'nama' => 'required|max:255',
            'slug' => 'required|unique:ilkoms',
            'angkatan' => 'required',
        
        ]);
        Ilkom::create($validatedData);

        return redirect('/dashboard/crud')->with('success', ' New Post Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ilkom  $ilkom
     * @return \Illuminate\Http\Response
     */
    public function show(Ilkom $ilkom)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ilkom  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(Ilkom $crud)
    {
        return view('dashboard.crud.edit',[
            'crud' => $crud
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ilkom  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ilkom $crud)
    {
        $rules = [
            'nama' => 'required|max:255',
        ];
       

        if($request->slug != $crud->slug){
            $rules['slug'] = 'required|unique:ilkoms';
        }

        $validatedData = $request->validate($rules);

        Ilkom::where('id', $crud->id)->update($validatedData);

        return redirect('/dashboard/crud')->with('success', ' Post Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ilkom  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ilkom $crud)
    {
        Ilkom::destroy($crud->id);

        return redirect('/dashboard/crud')->with('success', ' Student Has Been Deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Ilkom::class, 'slug', $request->nama);
        return response()->json(['slug'=> $slug]);
    }
}

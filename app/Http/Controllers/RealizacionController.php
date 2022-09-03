<?php

namespace App\Http\Controllers;

use App\Models\Realizacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RealizacionController extends Controller
{
    public function adminpanel()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.adminhome');
        } else{
            abort(404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realizaciones = Realizacion::all();
        return view('admin.realizaciones.index',compact('realizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $realizaciones = new Realizacion();
        return view('admin.realizaciones.create',compact('realizaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requeste
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $realización = new Realizacion($input);
        $realización->save();

        return redirect()->route('realizaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realizacion  $realización
     * @return \Illuminate\Http\Response
     */
    public function show(Realizacion $realización)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realizacion  $realización
     * @return \Illuminate\Http\Response
     */
    public function edit(Realizacion $realización)
    {
        return view('admin.realizaciones.edit', compact('realización'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realizacion  $realización
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Realizacion $realización)
    {
        $realización->nombre = $request->nombre;
        $realización->save();
        return redirect()->route('realizaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realizacion  $realización
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realizacion $realización)
    {
        $realización->delete();
        return redirect()->route('realizaciones.index');
    }
}

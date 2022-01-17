<?php

namespace App\Http\Controllers;

use App\Models\Labo;
use Illuminate\Http\Request;

class LaboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $labo = Labo::findOrFail(1);
        return view('about', ['labo' => $labo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Labo  $labo
     * @return \Illuminate\Http\Response
     */
    public function show(Labo $labo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Labo  $labo
     * @return \Illuminate\Http\Response
     */
    public function edit(Labo $labo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes = $request->validate([
            'header' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:100'],
            'address' => ['max:255'],
            'indication' => ['max:255'],
            'phone' => ['max:20'],
            'mobile' => ['max:20'],
            'email' => ['max:100']
        ]);

        $labo = Labo::findOrFail(1);
        $labo->update($attributes);

        return redirect()->route('about')->with('success', 'Mise à jour effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Labo  $labo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labo $labo)
    {
        //
    }
}

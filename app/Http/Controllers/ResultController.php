<?php

namespace App\Http\Controllers;

use App\Models\Labo;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
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
        return view('home', ['labo' => $labo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    

    public function get(Request $request)
    {
        return redirect()->route('result', ['code' => $request->code]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $code = $request->code.'.pdf';
        $result = Result::where('code', $code)->first();
        $message = '';
        if($result) 
            if(strtotime($result->expired) < strtotime('today')){
                $message = 'Résultat '.$request->code.' expiré !';
                $session = 'warning';
            } else {
                $result->views++;
                $result->save();
                return view('result', ['result' => $result]);
            }
                
        else {
            $message = 'Aucun résultat trouvé !';
            $session = 'fail';
        } 
        return redirect()->route('home')->with($session, $message);
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}

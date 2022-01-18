<?php

namespace App\Http\Controllers;

use App\Models\Labo;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if($request->hasFile('file')){
            $file = $request->file('file');
            $completeFileName = $file->getClientOriginalName();
            $path = $file->storeAs('public/pdf', $completeFileName);
            
            $result = new Result();
            $result->code = $completeFileName;
            $today = date('Y-m-d');
            $result->expired = date('Y-m-d', strtotime("+3 months", strtotime($today)));
            $result->save();
            return $result;
        }


    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $results = Result::all();
        return view('dashboard', ['results' => $results]);
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

    public function updateExpired(Request $request)
    {
        $attributes = $request->validate([
            'expired' => ['date']
        ]);

        $result = Result::findOrFail($request->id);

        $result->expired = $request->expired;
        $result->update();

        return redirect()->route('dashboard')->with('success', 'Mise à jour effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $path = 'public/pdf/'.$request->code;
        if(Storage::exists($path)){
            Storage::delete([$path]);
            $result = Result::findOrFail($request->id);
            $result->delete();
            return redirect()->route('dashboard')->with('success', 'Suppression effectuée avec succès !');
        }

        return redirect()->route('dashboard')->with('fail', 'Suppression echouée !');
    }

    public function destroyAll(Request $request)
    {
        $files =  Storage::allFiles('public');
        Storage::delete($files);
        Result::truncate();
        return redirect()->route('dashboard')->with('success', 'Suppression effectuée avec succès !');
    }

    public function destroyExpired(Request $request)
    {
        $path = 'public/pdf/';
        $expired = Result::where('expired', '<', date('Y-m-d'));
        $resuls = $expired->get('code');
        $files = [];
        foreach ($expired as $result) {
            $files[] = $path.$result->code;
        }        
        Storage::delete($files);
        $expired->delete();
        return redirect()->route('dashboard')->with('success', 'Suppression effectuée avec succès !');
    }
}

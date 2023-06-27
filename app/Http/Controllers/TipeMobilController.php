<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeMobil;

class TipeMobilController extends Controller
{
    //
    function index()
    {
        $tipeMobilData = TipeMobil::get();
        return view('pages.tipemobil.index', compact('tipeMobilData'));
    }


    function store(Request $request)
    {
        //menampilkan data
        $tipeMobilData = $request->validate([
            'tipe' => 'required'
        ]);

        TipeMobil::create($tipeMobilData);
        return redirect()->to('/tipemobil');
    }

    function create()
    {
        return view('pages.tipemobil.create');
    }

    function update($id, Request $request)
    {
        $validasiTipeMobil = $request->validate([
            'tipe' => 'required'
        ]);
        TipeMobil::find($id)->update($validasiTipeMobil);
        //redirect
        return redirect()->to('/tipemobil');
    }

    function edit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages.tipemobil.edit', compact('tipeMobilData'));
    }

    function delete($id)
    {
        TipeMobil::find($id)->delete();

        return redirect()->to('/tipemobil');
    }
}
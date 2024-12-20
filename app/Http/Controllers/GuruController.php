<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        return view('users.guru', ['guru' => $guru]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $jurusan = Auth::user()->jurusan;
        $query = $request->get('query');

        if (!$query) {
            return Guru::all();
        }

        return Guru::where('name', 'like', "%{$query}%")->get();
    }

    public function create(Guru $guru)
    {
        return view('users.form', compact('guru'));
    }

    public function store(StoreGuruRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuruRequest $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeOfServices;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TypeOfServices::orderBy('id','desc')->get();
        $title = "Data Service";
        return view('service.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Service";
        return view('service.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TypeOfServices::create($request->all());
        

        return redirect()->to('service')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = TypeOfServices::find($id); //output blank jika tidak ditemukan id
        $title = "Edit Service";
        // $level = Levels::findOrFail($id); //output 404
        // $level = Levels::where('id', $id)->first(); //untuk memanggil id foreign key
        return view('service.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = TypeOfServices::find($id);
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();
        return redirect()->to('service')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = TypeOfServices::find($id);
        $service->delete();
        return redirect()->to('service')->with('success', 'Data berhasil didelete');

    }
}

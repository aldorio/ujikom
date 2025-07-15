<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Customers::orderBy('id','desc')->get();
        $title = "Data Customer";
        return view('customer.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Customer";
        return view('customer.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customers::create($request->all());
        

        return redirect()->to('customer')->with('success', 'Data berhasil ditambah');
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
        $edit = Customers::find($id); //output blank jika tidak ditemukan id
        $title = "Edit Service";
        // $level = Levels::findOrFail($id); //output 404
        // $level = Levels::where('id', $id)->first(); //untuk memanggil id foreign key
        return view('customer.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customers::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->addres = $request->addres;
        $customer->save();
        return redirect()->to('customer')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Customers::find($id);
        $service->delete();
        return redirect()->to('customer')->with('success', 'Data berhasil didelete');

    }
}

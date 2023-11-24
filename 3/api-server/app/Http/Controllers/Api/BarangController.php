<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();

        return response()->json([
            'status' => true,
            'barangs' => $barangs
        ], 200);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'harga' => 'required|numeric|gt:0',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Bad Request",
            ], 400);
        }

        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;

        if ($barang->save()) {
            return response()->json([
                'status' => true,
                'message' => "Berhasil menambahkan barang!",
                'barang' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Server Error"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            return response()->json([
                'status' => true,
                'barang' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Barang tidak ditemukan!",
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|max:100',
                'harga' => 'required|numeric|gt:0',
                'deskripsi' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => "Bad Request",
                ], 400);
            }

            $barang->nama = $request->nama;
            $barang->harga = $request->harga;
            $barang->deskripsi = $request->deskripsi;

            if ($barang->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Berhasil mengubah data barang!",
                    'barang' => $barang
                ], 201);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Server Error"
                ], 500);
            }

            return response()->json([
                'status' => true
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            if ($barang->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => "Berhasil menghapus barang!",
                ], 200);
            } else {
                return response()->json([
                    'status' => false
                ], 500);
            }
        } else {
            return response()->json([
                'status' => false
            ], 404);
        }
    }
}

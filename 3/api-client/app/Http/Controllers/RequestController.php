<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RequestController extends Controller
{
    public function getBarangs()
    {
        $barangs = Http::get('localhost:8000/api/GetAll')['barangs'];
        return view('welcome')->with('barangs', $barangs);
    }

    public function getBarang($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/api/GetOne/' . $id);
        $response = json_decode($request->getBody(), true);
        return view('detail')->with('barang', $response['barang']);
    }

    public function editBarang($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/api/GetOne/' . $id);
        $response = json_decode($request->getBody(), true);
        return view('edit')->with('barang', $response['barang']);
    }

    public function createBarang(Request $request)
    {
        $response = Http::post('localhost:8000/api/Create', [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ])['message'];
        return response()->json(array('success' => true));
    }

    public function updateBarang(Request $request)
    {
        $url = 'localhost:8000/api/Update/' . $request->id;
        $response = Http::put($url, [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ])['message'];

        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('PUT', $url, [
        //     'form_params' => [
        //         'nama' => $request->nama,
        //         'harga' => $request->harga,
        //         'deskripsi' => $request->deskripsi
        //     ]
        // ]);
        return redirect('/edit/' . $request->id);
    }

    public function deleteBarang(Request $request)
    {
        $url = 'localhost:8000/api/Delete/' . $request->id;
        $response = Http::delete($url);
        return redirect('/');
    }
}

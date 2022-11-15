<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = Tiket::all();
        return $tiket;
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
        $tiket = new Tiket();
        $tiket->judul = $request->input('judul');
        $tiket->tanggal = $request->input('tanggal');
        $tiket->deskripsi = $request->input('deskripsi');
        $tiket->pengisi = $request->input('pengisi');
        $tiket->lokasi = $request->input('lokasi');
        $tiket->harga = $request->input('harga');
        $tiket->save();

        return response()->json([
            'success' => 201,
            'data' => $tiket
        ], 201);

        /*$table = Tiket::create([
            "judul" => $request->judul,
            "tanggal" => $request->tanggal,
            "deskripsi" => $request->deskripsi,
            "pengisi" => $request->pengisi,
            "harga" => $request->harga

        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ], 201);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiket = tiket::find($id);
        if ($tiket) {
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id atas '. $id . ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tiket = tiket::find($id);
        if($tiket){
            $tiket->judul = $request->judul ? $request->judul : $tiket->judul;
            $tiket->tanggal = $request->tanggal ? $request->tanggal : $tiket->tanggal;
            $tiket->deskripsi = $request->deskripsi ? $request->deskripsi : $tiket->deskripsi;
            $tiket->pengisi = $request->pengisi ? $request->pengisi : $tiket->pengisi;
            $tiket->lokasi = $request->lokasi ? $request->lokasi : $tiket->lokasi;
            $tiket->harga = $request->harga ? $request->harga : $tiket->harga;
            $tiket->save();
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = tiket::where('id', $id)->first();
        if($tiket){
            $tiket->delete();
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ], 404);
        }
    }
}

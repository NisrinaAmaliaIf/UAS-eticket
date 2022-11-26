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
        $tiket->nama_konser = $request->input('nama_konser');
        $tiket->tgl_konser = $request->input('tgl_konser');
        $tiket->deskripsi = $request->input('deskripsi');
        $tiket->guesstar = $request->input('guesstar');
        $tiket->lokasi = $request->input('lokasi');
        $tiket->harga = $request->input('harga');
        $tiket->stok = $request->input('stok');
        $tiket->save();

        return response()->json([
            'success' => 201,
            'data' => $tiket
        ], 201);

        /*$table = Tiket::create([
            "nama_konser" => $request->nama_konser,
            "tgl_konser" => $request->tgl_konser,
            "deskripsi" => $request->deskripsi,
            "guesstar" => $request->guesstar,
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
            $tiket->nama_konser = $request->nama_konser ? $request->nama_konser : $tiket->nama_konser;
            $tiket->tgl_konser = $request->tgl_konser ? $request->tgl_konser : $tiket->tgl_konser;
            $tiket->deskripsi = $request->deskripsi ? $request->deskripsi : $tiket->deskripsi;
            $tiket->guesstar = $request->guesstar ? $request->guesstar : $tiket->guesstar;
            $tiket->lokasi = $request->lokasi ? $request->lokasi : $tiket->lokasi;
            $tiket->harga = $request->harga ? $request->harga : $tiket->harga;
            $tiket->stok = $request->stok ? $request->stok : $tiket->stok;
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

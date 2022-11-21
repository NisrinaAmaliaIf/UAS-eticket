<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return $transaksi;
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
        $transaksi = new Transaksi();
        $transaksi->nama_cust = $request->input('nama_cust');
        $transaksi->email_cust = $request->input('email_cust');
        $transaksi->tgl_pesan = $request->input('tgl_pesan');
        $transaksi->tgl_bayar = $request->input('tgl_bayar');
        $transaksi->total_bayar = $request->input('total_bayar');
        $transaksi->kode_tiket = $request->input('kode_tiket');
        $transaksi->save();

        return response()->json([
            'success' => 201,
            'data' => $transaksi
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = transaksi::find($id);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi = transaksi::find($id);
        if($transaksi){
            $transaksi->nama_cust = $request->nama_cust ? $request->nama_cust : $transaksi->nama_cust;
            $transaksi->email_cust = $request->email_cust ? $request->email_cust : $transaksi->email_cust;
            $transaksi->tgl_pesan = $request->tgl_pesan ? $request->tgl_pesan : $transaksi->tgl_pesan;
            $transaksi->tgl_bayar = $request->tgl_bayar ? $request->tgl_bayar : $transaksi->tgl_bayar;
            $transaksi->total_bayar = $request->total_bayar ? $request->total_bayar : $transaksi->total_bayar;
            $transaksi->kode_tiket = $request->kode_tiket ? $request->kode_tiket : $transaksi->kode_tiket;
            $transaksi->save();
            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi = Transaksi::where('id', $id)->first();
        if($transaksi){
            $transaksi->delete();
            return response()->json([
                'status' => 200,
                'data' => $transaksi
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ], 404);
        }
    }
}

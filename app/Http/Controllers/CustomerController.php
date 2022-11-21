<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::all();
        return $data;
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
        $customer = new Customer();
        $customer->nama_cust = $request->input('nama_cust');
        $customer->email_cust = $request->input('email_cust');
        $customer->jenis_kelamin = $request->input('jenis_kelamin');
        $customer->alamat = $request->input('alamat');
        $customer->pekerjaan = $request->input('pekerjaan');
        $customer->save();

        return response()->json([
            'success' => 201,
            'data' => $customer
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
        $customer = customer::find($id);
        if ($customer) {
            return response()->json([
                'status' => 200,
                'data' => $customer
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . ' tidak ditemukan'
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
        $customer = customer::find($id);
        if($customer){
            $customer->nama_cust = $request->nama_cust ? $request->nama_cust : $customer->nama_cust;
            $customer->email_cust = $request->email_cust ? $request->email_cust : $customer->email_cust;
            $customer->jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : $customer->jenis_kelamin;
            $customer->alamat = $request->alamat ? $request->alamat : $customer->alamat;
            $customer->pekerjaan = $request->pekerjaan ? $request->pekerjaan : $customer->pekerjaan;
            $customer->save();
            return response()->json([
                'status' => 200,
                'data' => $customer
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
        $customer = customer::where('id', $id)->first();
        if($customer){
            $customer->delete();
            return response()->json([
                'status' => 200,
                'data' => $customer
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ], 404);
        }
    }
}

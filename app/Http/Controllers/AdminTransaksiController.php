<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'title'   => 'Manajemen Transaksi',
            'transaksi'  => Transaksi::paginate(3),
            'content' => 'admin/transaksi/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'user_id' => auth()->user()->id,
            'kasir_name' => auth()->user()->name,
            'total' => 0
        ];
        Transaksi::create($data);
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $produk = Produk::get();

        $produk_id = request('produk_id');
        $p_detail = Produk::find($produk_id);   
        
        $act = request('act');
        $qty = request('qty');
        if ($act == 'min') {
            if($qty <-1){
                $qty = $qty - 1;
            } else {
                $qty =1;
            }
            
        } else {
            $qty = $qty + 1;
        }

        $subtotal =0;
        if($p_detail){
            $subtotal = $qty * $p_detail->harga;
        }

        $data = [
            'title'   => 'Tambah Transaksi',
            'produk'  => $produk,
            'p_detail'=> $p_detail,
            'qty'     => $qty,
            'subtotal'=> $subtotal,
            'content' => 'admin/transaksi/create'
        ];
        return view('admin.layouts.wrapper', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

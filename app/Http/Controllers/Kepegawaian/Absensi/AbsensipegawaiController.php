<?php

namespace App\Http\Controllers\Kepegawaian\Absensi;

use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Absensi;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Http\Request;

class AbsensipegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::with([
            'Pegawai',
        ])->get();
        $blt = date('d/m/Y');

        $pegawai = Pegawai::all();

        return view('pages.kepegawaian.absensi.absensi', compact('absensi','pegawai','blt'));
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
        $absensi = new Absensi;
        $absensi->id_pegawai = $request->id_pegawai;
        $absensi->tanggal_absensi = $request->tanggal_absensi;
        $absensi->absensi = $request->absensi;
        $absensi->keterangan = $request->keterangan;

        $absensi->save();
        $absensi->sync($request->pegawai);
        
        // return $request;
        return response()->json($request);
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

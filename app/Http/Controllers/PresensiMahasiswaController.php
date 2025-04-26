<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PresensiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwal = Presensi::with('mahasiswa', 'mata_kuliah')->orderBy('created_at', 'desc')->get();
        $golongan = Mahasiswa::all();
        $matakuliah = MataKuliah::all();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($jadwal as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->hari,
                    'hari' => $row->hari,
                    'kode_mk' => $row->kode_mk,
                    'id_ruang' => $row->ruang->nama_ruang,
                    'id_gol' => $row->golongan->nama_gol,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.presensi.index', ['jadwal' => $jadwal, 'golongan' => $golongan, 'matakuliah' => $matakuliah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

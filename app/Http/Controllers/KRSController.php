<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwal = KRS::with('mahasiswa', 'mata_kuliah')->orderBy('created_at', 'desc')->get();
        $dosen = Mahasiswa::all();
        $matakuliah = MataKuliah::all();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($jadwal as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->hari,
                    'kode_mk' => $row->kode_mk,
                    'nip' => $row->dosen->nip,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.krs.index', ['jadwal' => $jadwal, 'dosen' => $dosen,  'matakuliah' => $matakuliah]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Pengampu;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengampuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwal = Pengampu::with('dosen', 'mata_kuliah')->orderBy('created_at', 'desc')->get();
        $dosen = Dosen::all();
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

        return view('pages.admin.pengampu.index', ['jadwal' => $jadwal, 'dosen' => $dosen,  'matakuliah' => $matakuliah]);
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
        try {
            $jadwal = new Pengampu();
            $jadwal->kode_mk = $request->matkul;
            $jadwal->nip = $request->nip;
            $jadwal->save();

            return redirect()->route('pengampu')->with('success', 'Jadwal berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data'])->withInput();
        }
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

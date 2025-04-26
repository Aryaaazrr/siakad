<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Ruangan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwal = Jadwal::with('golongan', 'ruang', 'mata_kuliah')->orderBy('created_at', 'desc')->get();
        $golongan = Golongan::all();
        $ruangan = Ruangan::all();
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

        return view('pages.admin.jadwal.index', ['jadwal' => $jadwal, 'golongan' => $golongan, 'ruangan' => $ruangan, 'matakuliah' => $matakuliah]);
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
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'nip' => 'required|string|max:255',
        //     'nama' => 'required|string',
        //     'alamat' => 'nullable|string',
        //     'no_hp' => 'nullable',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        try {
            $jadwal = new Jadwal();
            $jadwal->hari = $request->hari;
            $jadwal->kode_mk = $request->matkul;
            $jadwal->id_ruang = $request->ruang;
            $jadwal->id_gol = $request->gol;
            $jadwal->save();

            return redirect()->route('jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
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

        $id = $request->hari;
        $dosen = Jadwal::find($id);

        if (!$dosen) {
            return back()->withErrors(['error' => 'Dosen tidak ditemukan. Silahkan coba kembali']);
        }

        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|max:255|unique:dosen,nip,' . $id . ',nip',
            'nama' => 'required|string',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $dosen->nip = $request->nip;
            $dosen->nama = $request->nama;
            $dosen->alamat = $request->alamat;
            $dosen->no_hp = $request->no_hp;
            $dosen->save();

            return redirect()->route('dosen')->with('success', 'Dosen berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

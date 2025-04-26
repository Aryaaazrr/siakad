<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jadwal = Mahasiswa::with('golongan')->orderBy('created_at', 'desc')->get();
        $golongan = Golongan::all();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($jadwal as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->nim,
                    'nim' => $row->nim,
                    'nama' => $row->nama,
                    'alamat' => $row->alamat,
                    'no_hp' => $row->no_hp,
                    'semester' => $row->semester,
                    'golongan' => $row->golongan->id_gol,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.mahasiswa.index', ['jadwal' => $jadwal, 'golongan' => $golongan,]);
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
            $mahasiswa = new Mahasiswa();
            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->no_hp = $request->no_hp;
            $mahasiswa->semester = $request->semester;
            $mahasiswa->id_gol = $request->id_gol;
            $mahasiswa->save();

            return redirect()->route('mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
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
        $id = $request->nip;
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return back()->withErrors(['error' => 'Dosen tidak ditemukan. Silahkan coba kembali']);
        }

        try {
            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->no_hp = $request->no_hp;
            $mahasiswa->semester = $request->semester;
            $mahasiswa->id_gol = $request->id_gol;
            $mahasiswa->save();

            return redirect()->route('mahasiswa')->with('success', 'Dosen berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $dosen = Mahasiswa::where('nim', $id)->first();
            $dosen->delete();
            return response()->json(['message' => 'Data dosen berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mata_kuliah = MataKuliah::orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($mata_kuliah as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->kode_mk,
                    'kode_mk' => $row->kode_mk,
                    'nama_mk' => $row->nama_mk,
                    'sks' => $row->sks,
                    'semester' => $row->semester,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.matakuliah.index', ['mata_kuliah' => $mata_kuliah]);
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
        $validator = Validator::make($request->all(), [
            // 'kode_mk' => 'required|string|max:255',
            'nama_mk' => 'required|string',
            'sks' => 'nullable|numeric',
            'semester' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $matakuliah = new MataKuliah();
            $matakuliah->kode_mk = $this->generateMemberNumber();
            $matakuliah->nama_mk = $request->nama_mk;
            $matakuliah->sks = $request->sks;
            $matakuliah->semester = $request->semester;
            $matakuliah->save();

            return redirect()->route('mata-kuliah')->with('success', 'Mata Kuliah berhasil ditambahkan.');
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
        $id = $request->kode_mk;
        $matakuliah = MataKuliah::find($id);

        if (!$matakuliah) {
            return back()->withErrors(['error' => 'Dosen tidak ditemukan. Silahkan coba kembali']);
        }

        $validator = Validator::make($request->all(), [
            'nama_mk' => 'required|string',
            'sks' => 'nullable|numeric',
            'semester' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $matakuliah->nama_mk = $request->nama_mk;
            $matakuliah->sks = $request->sks;
            $matakuliah->semester = $request->semester;
            $matakuliah->save();

            return redirect()->route('mata-kuliah')->with('success', 'Dosen berhasil diperbarui.');
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
            $dosen = MataKuliah::where('kode_mk', $id)->first();
            $dosen->delete();
            return response()->json(['message' => 'Data dosen berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }

    private function generateMemberNumber()
    {
        $currentDate = now();
        $dateString = $currentDate->format('dmY');

        $randomNumber = '';
        for ($i = 0; $i < 6; $i++) {
            $randomNumber .= mt_rand(0, 9);
        }

        $memberNumber = 'MK_' . $dateString . $randomNumber;

        return $memberNumber;
    }
}

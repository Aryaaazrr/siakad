<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $golongan = Golongan::orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($golongan as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->kode_mk,
                    'id_gol' => $row->id_gol,
                    'nama_gol' => $row->nama_gol,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.golongan.index', ['golongan' => $golongan]);
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
            'nama_gol' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $golongan = new Golongan();
            $golongan->nama_gol = $request->nama_gol;
            $golongan->save();

            return redirect()->route('golongan')->with('success', 'Ruangan berhasil ditambahkan.');
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
        $id = $request->id_gol;
        $golongan = Golongan::find($id);

        if (!$golongan) {
            return back()->withErrors(['error' => 'golongan tidak ditemukan. Silahkan coba kembali']);
        }

        $validator = Validator::make($request->all(), [
            'nama_gol' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $golongan->nama_gol = $request->nama_gol;
            $golongan->save();

            return redirect()->route('golongan')->with('success', 'golongan berhasil diperbarui.');
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
            $dosen = Golongan::where('id_gol', $id)->first();
            $dosen->delete();
            return response()->json(['message' => 'Data dosen berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}

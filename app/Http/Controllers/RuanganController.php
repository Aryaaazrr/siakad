<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ruangan = Ruangan::orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($ruangan as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->id_ruang,
                    'id_ruang' => $row->id_ruang,
                    'nama_ruang' => $row->nama_ruang,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.ruangan.index', ['ruangan' => $ruangan]);
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
            'nama_ruang' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $ruangan = new Ruangan();
            $ruangan->nama_ruang = $request->nama_ruang;
            $ruangan->save();

            return redirect()->route('ruangan')->with('success', 'Ruangan berhasil ditambahkan.');
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
        $id = $request->id_ruang;
        $ruangan = Ruangan::find($id);

        if (!$ruangan) {
            return back()->withErrors(['error' => 'Ruangan tidak ditemukan. Silahkan coba kembali']);
        }

        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $ruangan->nama_ruang = $request->nama_ruang;
            $ruangan->save();

            return redirect()->route('ruangan')->with('success', 'Ruangan berhasil diperbarui.');
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
            $dosen = Ruangan::where('kode_mk', $id)->first();
            $dosen->delete();
            return response()->json(['message' => 'Data ruangan berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}

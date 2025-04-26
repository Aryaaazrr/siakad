<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dosen = Dosen::orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($dosen as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->nip,
                    'nip' => $row->nip,
                    'nama' => $row->nama,
                    'alamat' => $row->alamat,
                    'no_hp' => $row->no_hp,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.dosen.index', ['dosen' => $dosen]);
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
            'nip' => 'required|string|max:255',
            'nama' => 'required|string',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $portofolio = new Dosen();
            $portofolio->nip = $request->nip;
            $portofolio->nama = $request->nama;
            $portofolio->alamat = $request->alamat;
            $portofolio->no_hp = $request->no_hp;
            $portofolio->save();

            return redirect()->route('dosen')->with('success', 'Dosen berhasil ditambahkan.');
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
        $dosen = Dosen::find($id);

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
        try {
            $dosen = Dosen::where('nip', $id)->first();
            $dosen->delete();
            return response()->json(['message' => 'Data dosen berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}

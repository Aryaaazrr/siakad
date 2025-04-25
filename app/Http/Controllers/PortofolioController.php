<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $portofolio = Portofolio::orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($portofolio as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->id_portofolio,
                    'id_portofolio' => $row->id_portofolio,
                    'judul' => $row->judul_portofolio,
                    'deskripsi' => $row->deskripsi,
                    'cover' => $row->cover,
                    'link' => $row->link,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.portofolio.index');
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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|url',
            'cover' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $filename = null;
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('cover'), $filename);
            }

            $portofolio = new Portofolio();
            $portofolio->judul_portofolio = $request->judul;
            $portofolio->deskripsi = $request->deskripsi;
            $portofolio->cover = $filename;
            $portofolio->link = $request->link;
            $portofolio->save();

            return redirect()->route('portofolio')->with('success', 'Portofolio berhasil ditambahkan.');
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
    public function update(Request $request)
    {
        $id = $request->id_portofolio;
        $portofolio = Portofolio::find($id);

        if (!$portofolio) {
            return back()->withErrors(['error' => 'Portofolio tidak ditemukan. Silahkan coba kembali']);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|url',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $filename = $portofolio->cover;
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('cover'), $filename);
            }

            $portofolio->judul_portofolio = $request->judul;
            $portofolio->deskripsi = $request->deskripsi;
            $portofolio->cover = $filename;
            $portofolio->link = $request->link;
            $portofolio->save();

            return redirect()->route('portofolio')->with('success', 'Portofolio berhasil diperbarui.');
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
            $portofolio = Portofolio::where('id_portofolio', $id)->first();
            $portofolio->delete();
            return response()->json(['message' => 'Data portofolio berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }

    public function apiPortofolio(Request $request)
    {
        $query = Portofolio::query();

        if ($request->has('name')) {
            $query->where('judul_portofolio', 'like', '%' . $request->name . '%');
        }

        $portofolio = $query->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $portofolio->items(),
            'pagination' => [
                'total' => $portofolio->total(),
                'per_page' => $portofolio->perPage(),
                'current_page' => $portofolio->currentPage(),
                'last_page' => $portofolio->lastPage(),
            ],
        ]);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'judul_portofolio' => 'required|string',
            'deskripsi' => 'required|string',
            'cover' => 'required|string',
            'link' => 'nullable|string',
        ]);

        $portofolio = Portofolio::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Portofolio created successfully',
            'data' => $portofolio
        ]);
    }

    public function apiUpdate(Request $request, $id)
    {
        $portofolio = Portofolio::find($id);

        if (!$portofolio) {
            return response()->json([
                'status' => 'error',
                'message' => 'Portofolio not found'
            ], 404);
        }

        $request->validate([
            'judul_portofolio' => 'required|string',
            'deskripsi' => 'required|string',
            'cover' => 'required|string',
            'link' => 'nullable|string',
        ]);

        $portofolio->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Portofolio updated successfully',
            'data' => $portofolio
        ]);
    }

    public function apiDelete($id)
    {
        $portofolio = Portofolio::find($id);

        if (!$portofolio) {
            return response()->json([
                'status' => 'error',
                'message' => 'Portofolio not found'
            ], 404);
        }

        $portofolio->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Portofolio deleted successfully'
        ]);
    }
}
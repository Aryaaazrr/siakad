<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blog = Blog::all();

        if ($request->ajax()) {
            $rowData = [];

            foreach ($blog as $row) {

                $rowData[] = [
                    'DT_RowIndex' => $row->id_blog,
                    'id_blog' => $row->id_blog,
                    'judul_blog' => $row->judul_blog,
                    'deskripsi' => $row->deskripsi,
                    'cover' => $row->cover,
                ];
            }
            return DataTables::of($rowData)->toJson();
        }

        return view('pages.admin.blog.index');
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

            $blog = new Blog();
            $blog->judul_blog = $request->judul;
            $blog->deskripsi = $request->deskripsi;
            $blog->cover = $filename;
            $blog->save();

            return redirect()->route('blog')->with('success', 'Blog berhasil ditambahkan.');
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
        $id = $request->id_blog;
        $blog = Blog::find($id);

        if (!$blog) {
            return back()->withErrors(['error' => 'Blog tidak ditemukan. Silahkan coba kembali']);
        }


        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $filename = $blog->cover;
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('cover'), $filename);
            }

            $blog->judul_blog = $request->judul;
            $blog->deskripsi = $request->deskripsi;
            $blog->cover = $filename;
            $blog->save();

            return redirect()->route('blog')->with('success', 'Blog berhasil diperbarui.');
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
            $blog = Blog::where('id_blog', $id)->first();
            $blog->delete();
            return response()->json(['message' => 'Data blog berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
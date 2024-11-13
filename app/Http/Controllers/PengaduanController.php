<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $pengaduans = Pengaduan::latest()->paginate(5);

        //render view with posts
        return view('crud.pengaduan.index', compact('pengaduans'));
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('crud.pengaduan.show',compact('pengaduan'));
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('crud.pengaduan.edit', compact('pengaduan'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('crud.pengaduan.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'       => 'required|string|min:2|max:100',
            'nik'       => 'required|min:2|max:100',
            'tgl'       => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/pengaduans', $image->hashName());

        //create
        Pengaduan::create([
            'name'   => $request->name,
            'nik'   => $request->nik,
            'tgl'   => $request->tgl,
            'image'     => $image->hashName(),
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('pengaduans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //validate form
        $this->validate($request, [
            'name'       => 'required|string|min:2|max:100',
            'nik'       => 'required|string|min:2|max:100',
            'tgl'       => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/pengaduans', $image->hashName());

            //delete old image
            Storage::delete('public/pengaduans/'.$pengaduan->image);

            //update post with new image
            $pengaduan->update([
                'image'     => $image->hashName(),
                'content'   => $request->content,
                'name'   => $request->name,
                'nik'   => $request->nik,
                'tgl'   => $request->tgl
            ]);

        } else {

            //update post without image
            $pengaduan->update([
                'content'   => $request->content,
                'name'   => $request->name,
                'nik'   => $request->nik,
                'tgl'   => $request->tgl
            ]);
        }


        //redirect to index
        return redirect()->route('homes.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //delete image
        Storage::delete('public/pengaduans/'. $pengaduan->image);

        //delete post
        $pengaduan->delete();

        //redirect to index
        return redirect()->route('pengaduans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

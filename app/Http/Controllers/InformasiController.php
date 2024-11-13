<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $informasis = Informasi::latest()->paginate(5);

        //render view with posts
        return view('crud.informasi.index', compact('informasis'));
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Informasi $informasi)
    {
        return view('crud.informasi.edit', compact('informasi'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('crud.informasi.create');
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
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'tgl'       => 'required',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/informasis', $image->hashName());

        //create
        Informasi::create([
            'image'     => $image->hashName(),
            'judul'     => $request->judul,
            'tgl'     => $request->tgl,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('informasis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Informasi $informasi)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'     => 'required|min:5',
            'tgl'       => 'required',
            'content'   => 'required|min:10',
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/informasis', $image->hashName());

            //delete old image
            Storage::delete('public/informasis/'.$home->image);

            //update post with new image
            $informasi->update([
                'image'     => $image->hashName(),
                'judul'     => $request->judul,
                'tgl'     => $request->tgl,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $informasi->update([
                'judul'     => $request->judul,
                'tgl'     => $request->tgl,
                'content'   => $request->content
            ]);
        }


        //redirect to index
        return redirect()->route('informasis.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}

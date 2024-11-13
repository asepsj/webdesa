<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepdesController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $images = Image::latest()->paginate(5);

        //render view with posts
        return view('crud.kepdes.index', compact('images'));
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Image $image)
    {
        return view('crud.kepdes.edit', compact('image'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Image $image)
    {
        //validate form
        $this->validate($request, [
            'foto'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'     => 'required|min:2',
        ]);

        //check if logo is uploaded
        if ($request->hasFile('foto')) {

            //upload new foto
            $foto = $request->file('foto');
            $foto->storeAs('public/images', $foto->hashName());

            //delete old foto
            Storage::delete('public/images/'.$image->foto);

            //update post with new logo
            $image->update([
                'foto'     => $foto->hashName(),
                'name'     => $request->name
            ]);

        } else {

            //update post without image
            $image->update([
                'name'     => $request->name
            ]);
        }

        //redirect to index
        return redirect()->route('images.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

}

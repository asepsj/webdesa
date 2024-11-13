<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TampilanhomeController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $homes = Home::latest()->paginate(5);

        //render view with posts
        return view('crud.home.index', compact('homes'));
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Home $home)
    {
        return view('crud.home.edit', compact('home'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Home $home)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10',
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/homes', $image->hashName());

            //delete old image
            Storage::delete('public/homes/'.$home->image);

            //update post with new image
            $home->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $home->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }


        //redirect to index
        return redirect()->route('homes.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}

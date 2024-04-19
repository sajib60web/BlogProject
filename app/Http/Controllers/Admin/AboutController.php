<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:about-view', ['only' => ['index']]);
        $this->middleware('permission:about-update', ['only' => ['update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_name'] = 'About Us';
        $data['about'] = About::find(1);
        return view('admin.about.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'required',
        ]);

        $about = About::find(1);
        $input = $request->all();
        $about->update($input);
        $notification = array(
            'message' => 'About Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('about.index')->with($notification);
    }
}

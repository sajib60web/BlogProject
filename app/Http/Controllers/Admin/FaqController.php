<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:faq-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_name'] = 'Faq List';
        $data['faqs'] = Faq::all();
        return view('admin.faqs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_name'] = 'Create Faq';
        return view('admin.faqs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'required',
        ]);

        $input = $request->all();
        Faq::create($input);
        $notification = array(
            'message' => 'Faq Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('faqs.index')->with($notification);
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
        $data['page_name'] = 'Faq Edit';
        $data['faq'] = Faq::find($id);
        return view('admin.faqs.edit', $data);
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

        $category = Faq::find($id);
        $input = $request->all();
        $category->update($input);
        $notification = array(
            'message' => 'Faq Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('faqs.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Faq::find($id)->delete();
        $notification = array(
            'message' => 'Faq Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('faqs.index')->with($notification);
    }
}

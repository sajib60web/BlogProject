<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_name'] = 'Category List';
        $data['categories'] = Category::all();
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_name'] = 'Create Category';
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'download_status' => 'required',
        ]);

        $input = $request->all();
        $input['slug']  = Str::slug($request->name);
        Category::create($input);
        $notification = array(
            'message' => 'Category Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
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
        $data['page_name'] = 'Category Edit';
        $data['category'] = Category::find($id);
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:191',
            'download_status' => 'required',
        ]);

        $category = Category::find($id);
        $input = $request->all();
        $input['slug']  = Str::slug($request->name);
        $category->update($input);
        $notification = array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        Post::where('category_id', $id)->delete();
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
    }
}

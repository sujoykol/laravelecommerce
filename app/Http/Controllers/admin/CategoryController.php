<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->paginate(5);
        return view('admin.category.list',['categories'=>$category])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        Category::create($data);
        return redirect()->route('category.index')
                        ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.category.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data =$request->validate([
            'name' => 'required|string',
        ]);
        $category->update($data);
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
         $category->delete();
         return redirect()->route('category.index')
         ->with('success','Category deleted successfully.');
    }

    public function toggleStatus(Request $request)
{
    $category = Category::find($request->id);

    if ($category) {
        $category->status = $category->status == 0 ? 1 : 0;
        $category->save();

        return response()->json([
            'success' => true,
            'status' => $category->status,
            'message' => $category->status == 0 ? 'Activated' : 'Deactivated'
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
}
public function changeStatus(Request $request)
    {
        $cat = Category::find($request->id);
        $cat->status = $request->status;
        $cat->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}

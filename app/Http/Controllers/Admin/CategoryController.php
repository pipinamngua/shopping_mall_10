<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $categories = Category::paginate(config('custom.pagination.category_table'));
        $parents = Category::where('parent_id', 0)->pluck('name', 'id');
        if(empty($request->del_error)){
            return view('admin.category.list', compact('categories', 'parents'));
        }
        Session::flash('unsuccess', trans('custom.delete.content', ['field' => $request->del_error));

        return view('admin.category.list', compact('categories', 'parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::where('parent_id', 0)->pluck('name', 'id');

        return view('admin.category.add', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        Session::flash('success', trans('custom.category.create_success'));

        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $parents = Category::where('parent_id', 0)->pluck('name', 'id');

        return view('admin.category.show', compact('category', 'parents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        Category::findOrFail($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        Session::flash('success', trans('custom.category.edit_success') . ' ' .  $id);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            if($category->parent_id == 0){
                $categories = Category::where('parent_id', $id);
                if($categories->count() != 0) {
                    $del_error = $category->name;

                    return redirect()->route('category.index', ['del_error' => $del_error]);
                }
            }

            $products = $category->products;
            if(!empty($products) && isset($products)){
                foreach ($products as $item) {
                    if ($item->quantity != 0) {
                        $del_error = $category->name;

                        return redirect()->route('category.index', ['del_error' => $del_error]);
                    }
                }
            }

            $category->delete();
            Session::flash('success', trans('custom.category.delete_success') . ' ' . $id);

            return redirect()->route('category.index');
            
        } catch (Exception $e) {
            return redirect()->route('category.index', ['del_error' => $e->getMessage()]);
        }
    }
}

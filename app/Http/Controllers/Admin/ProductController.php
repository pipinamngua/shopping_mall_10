<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Image;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(config('custom.pagination.product_table'));

        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $id = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'price_in' => $request->price_in,
            'price_out' => $request->price_out,
            'description' => $request->description,
            'status' => $request->status,
            'quantity' => $request->quantity,
        ])->id;

        try {
           if ($request->hasFile('images')) {
                $files = $request->file('images');
                if($this->addImages($files, $id)){
                    $main = Image::where('product_id', $id)->first();
                    if(!empty($main) && isset($main) && $main->url != config('custom.product.img')) {
                        $main->update([
                            'main_image' => 1,
                        ]);
                    }
                    Session::flash('success', trans('custom.product.create_success'));
                } else {
                    Session::flash('unsuccess', trans('custom.product.create_unsuccess'));
                }
            } else {
                Image::create([
                        'product_id' => $id,
                        'url' => config('custom.product.img'),
                        'main_image' => 1,
                ]);
                Session::flash('success', trans('custom.product.create_success'));
            }
            
        } catch (Exception $e) {
            Session::flash('unsuccess', $e->getMessage());   
        }

        return redirect()->route('product.show', ['id' => $id]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = $product->images->sortByDesc('id');

        if($images->count() >= 3) {
            $images = $images->take(3);
        } else {
            $images = $images->take($images->count());
        }

        return view('admin.product.show', compact('product', 'images'));
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
    public function update(ProductRequest $request, $id)
    {
        Product::findOrFail($id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'price_in' => $request->price_in,
            'price_out' => $request->price_out,
            'description' => $request->description,
            'status' => $request->status,
            'quantity' => $request->quantity,
        ]);
        try {
            if ($request->hasFile('images')) {
                $files = $request->file('images');
                if($this->addImages($files, $id)){
                    $main = Image::where('product_id', $id)->first();
                    if(!empty($main) && isset($main) && $main->url != config('custom.product.img')) {
                        $main->update([
                            'main_image' => 1,
                        ]);
                    }
                    Session::flash('success', trans('custom.product.edit_success'));
                } else {
                    Session::flash('unsuccess', trans('custom.product.edit_unsuccess'));
                }
            } else {
                Session::flash('success', trans('custom.product.edit_success'));
            }
        } catch (Exception $e) {
            Session::flash('unsuccess', $e->getMessage());
        }
        
        return redirect()->route('product.show', ['id' => $id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        Image::where('product_id', $id)->delete();
        Session::flash('success', trans('custom.product.delete_success') . ' ' . $id);

        return redirect()->route('product.index');
    }

    public function addImages($files, $id)
    {
        $result = false;
        for ($i = 0; $i < count($files); $i++) {
            $fileName = $files[$i]->getClientOriginalName().date('Y-m-d H:i:s');
            $fileName = md5($fileName) . '.' . $files[$i]->getClientOriginalExtension();
            if (str_contains($fileName, ['.jpg', '.png', '.bmp', '.jpeg'])) {
                if(Image::create([
                    'product_id' => $id,
                    'url' => $fileName,
                    'main_image' => 0,
                ])) {
                    $files[$i]->move(config('custom.image.path_product_img'), $fileName);
                    $result = true;
                } 
            }
        }
        
        return $result;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::paginate(config('custom.pagination.supplier_table'));
        if(empty($request->del_error)){
            return view('admin.supplier.list', compact('suppliers'));
        }
        Session::flash('unsuccess', trans('custom.delete.content', ['field' => $request->del_error]));

        return view('admin.supplier.list', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        Supplier::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        Session::flash('success', trans('custom.supplier.create_success'));

        return redirect()->route('supplier.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('admin.supplier.show', compact('supplier'));
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
    public function update(SupplierRequest $request, $id)
    {
        Supplier::findOrFail($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        Session::flash('success', trans('custom.supplier.edit_success') . ' ' .  $id);

        return redirect()->route('supplier.index');
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
            $supplier = Supplier::findOrFail($id);
            $products = $supplier->products;
            if(!empty($products) && isset($products)){
                foreach ($products as $item) {
                    if ($item->quantity != 0) {
                        $del_error = $category->name;

                        return redirect()->route('supplier.index', ['del_error' => $del_error]);
                    }
                }
            }
            $supplier->delete();
            Session::flash('success', trans('custom.supplier.delete_success') . ' ' . $id);

            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            return redirect()->route('supplier.index', ['del_error' => $e->getMessage()]);
        }
    }
}

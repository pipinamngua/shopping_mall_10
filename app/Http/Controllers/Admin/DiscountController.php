<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountRequest;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\DiscountDetail;
use Session;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::paginate(config('custom.pagination.user_table'));

        return view('admin.discount.list', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        Discount::create([
            'name' => $request->name,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        Session::flash('success', trans('custom.discountAdmin.create'));

        return redirect()->route('discount.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);

        return view('admin.discount.show', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, $id)
    {
        Discount::find($id)->update([
            'name' => $request->name,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        Session::flash('success', trans('custom.discountAdmin.edit') . ' ' .  $id);

        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discount::find($id)->delete();
        Session::flash('success', trans('custom.discountAdmin.delete') . ' ' . $id);

        return redirect()->route('discount.index');
    }
}

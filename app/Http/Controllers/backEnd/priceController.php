<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Price\StorePostRequest;
use App\Models\RoomPrice;
use Illuminate\Http\Request;
use App\Http\Requests\Price\UpdatePostRequest;

class priceController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try {
        $validated = $request->validated();
        $rs = RoomPrice::create($validated);
        if ($rs) {
            return back()->with('success','Thêm Thành Công');
        }
        else
        {
            return back()->with('error','khong thanh cong');
        }

    } catch (Exception $e) {
        abort(500);
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

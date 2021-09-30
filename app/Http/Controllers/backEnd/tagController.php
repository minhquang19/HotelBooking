<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Tag\UpdatePostRequest;
use App\Http\Requests\Tag\StorePostRequest;
use Illuminate\Http\Request;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Tag::all();
            return view('backEnd.tag', compact('data'));
        }catch (\Exception $e){
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            $rs = Tag::create($validated);
            return $this->Redirect($rs,'Tag đã được tạo thành công !!!');

        }catch (\Exception $e){
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
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $rs = Tag::find($id)->update($validated);
            return $this->Redirect($rs,'Tag đã được cập nhật !!!');
        }catch (\Exception $e){
            abort(500);
        }
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
            $rs = Tag::find($id)->delete();

        }catch (\Exception $e){
            abort(500);
        }
    }
    public function Redirect($rs,$mess){
        if($rs){
            return back()->with('success',$mess);
        }
        else{
            return back()->with('error','Opp!!! Có lỗi xảy ra');
        }
    }
}

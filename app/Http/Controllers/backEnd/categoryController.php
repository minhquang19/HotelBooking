<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Category\StorePostRequest;
use App\Http\Requests\Category\UpdatePostRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Category::all();
            return view('backEnd.category', compact('data'));
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
            Category::create($validated);
            return back()->with('success','Thêm loại phòng thành Công');
        }catch (\Exception $e){
            dd($e);
            return back()->with('success','Thêm loại phòng thành Công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            Category::find($id)->update($validated);
            return back()->with('success','Sửa loại phòng thành Công');
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
            if (Room::where('category_id',$id)->count() > 0){
                return back()->with('error','Không thể xóa loại phòng đang chứa phòng');
            }
            Category::find($id)->delete();
            return back()->with('success','Xóa loại phòng thành Công');;
        }catch (\Exception $e){
            abort(500);
        }
    }
}

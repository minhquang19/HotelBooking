<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\StorePostRequest;
 use App\Http\Requests\Blog\UpdatePostRequest;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        return view('backEnd.blog.index',compact('data'));
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
            $file = $request->coverImage;
            $original_name = strtolower(trim($file->getClientOriginalName()));
            $file_name = time().rand(100,999).$original_name;
            $image_resize = Image::make($file->getRealPath());
//            $image_resize->resize(370,250);
            $image_resize->save('upload/blog/'.$file_name);
            $validated['coverImage'] = $file_name;
            $rs = Blog::create($validated);
            if ($rs){
                return back()->with('success','Thêm mới Blog thành công');
            }else{
                return back()->with('error','Thêm không phòng thành công');
            }
        }catch (\Exception $e){
            dd($e);
            abort(500);
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
            if ($request->coverImage == null){
                $validated['coverImage'] = Blog::find($id)->coverImage;
            }else{
                $file = $request->coverImage;
                $original_name = strtolower(trim($file->getClientOriginalName()));
                $file_name = time().rand(100,999).$original_name;
                $image_resize = Image::make($file->getRealPath());
//                $image_resize->resize(370,250);
                $image_resize->save('upload/blog/'.$file_name);
                $validated['coverImage'] = $file_name;
            }
            $rs = Blog::find($id)->update($validated);
            if($rs)
            {
                return back()->with('success','Chỉnh sửa Blog thành công');
            }else{
                return back()->with('error','Chỉnh sửa Blog khong thành công');
            }

        }catch (\Exception $e){
            dd($e);
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
            $rs = Blog::find($id)->delete();
            if($rs)
            {
                return back()->with('success','Xoa Blog thành công');
            }else{
                return back()->with('error','Chỉnh sửa Blog khong thành công');
            }
        }catch (\Exception $e){
            dd($e);
            abort(500);
        }
    }
}

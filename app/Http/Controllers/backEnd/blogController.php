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
        return view('backEnd.blog',compact('data'));
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
            $filename = 'blogCover'.time();
            if ($request->hasFile('avatar')) {
                $result = $request->file('avatar')->storeOnCloudinaryAs('Blog',$filename);
            }
            $validated['coverImage'] = $result->getSecurePath();
            $rs = Blog::create($validated);
            return $this->Redirect($rs,'Bài viết đã được tạo thành công !!!');
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
            $filename = 'blogCover'.time();
            if ($request->coverImage == null){
                $validated['coverImage'] = Blog::find($id)->coverImage;
            }else{
                if ($request->hasFile('coverImage')) {
                    $result = $request->file('coverImage')->storeOnCloudinaryAs('Blog',$filename);
                }
                $validated['coverImage'] = $result->getSecurePath();
            }
            $rs = Blog::find($id)->update($validated);

            return $this->Redirect($rs,'Bài viết được cập nhật thành công !!!');

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
            $rs = Blog::find($id)->delete();
            if($rs)
            {
                return back()->with('success','Xoa Blog thành công');
            }else{
                return back()->with('error','Chỉnh sửa Blog khong thành công');
            }
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

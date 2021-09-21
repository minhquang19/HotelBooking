<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests\Service\StorePostRequest;
use App\Http\Requests\Service\UpdatePostRequest;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::all();
        return view('backEnd.service',compact('data'));
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
            $file = $request->image;
            $original_name = strtolower(trim($file->getClientOriginalName()));
            $file_name = time().rand(100,999).$original_name;
            $image_resize = Image::make($file->getRealPath());
//            $image_resize->resize(370,250);
            $image_resize->save('upload/service/'.$file_name);
            $validated['image'] = $file_name;
            $rs = Service::create($validated);

            if ($rs){
                return back()->with('success','Thêm mới Service thành công');
            }else{
                dd($rs);
                return back()->with('error','Thêm Service không  thành công');
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
            if ($request->image == null){
                $validated['image'] = Service::find($id)->image;
            }else{
                $file = $request->image;
                $original_name = strtolower(trim($file->getClientOriginalName()));
                $file_name = time().rand(100,999).$original_name;
                $image_resize = Image::make($file->getRealPath());
//                $image_resize->resize(370,250);
                $image_resize->save('upload/service/'.$file_name);
                $validated['image'] = $file_name;
            }
            $rs = Service::find($id)->update($validated);
            if($rs)
            {
                return back()->with('success','Chỉnh sửa Service thành công');
            }else{
                return back()->with('error','Chỉnh sửa Service khong thành công');
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
            $rs = Service::find($id)->delete();
            if($rs)
            {
                return back()->with('success','Xoa Service thành công');
            }else{
                return back()->with('error','Xoa Service khong thành công');
            }
        }catch (\Exception $e)
        {
            dd($e);
        }
    }
}

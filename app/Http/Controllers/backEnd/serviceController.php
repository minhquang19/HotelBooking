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
            $file_name = 'service'.'_'.time();
            if ($request->hasFile('image')) {
                $result = $request->file('image')->storeOnCloudinaryAs('Service',$file_name);}
            $validated['image'] = $result->getSecurePath();
            $rs = Service::create($validated);
            return $this->Redirect($rs,'Thêm mới dịch vụ thành công !!!');
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
            if ($request->image == null){
                $validated['image'] = Service::find($id)->image;
            }else{
                $file_name = 'service'.'_'.time();
                if ($request->hasFile('image')) {
                    $result = $request->file('image')->storeOnCloudinaryAs('Service',$file_name);}
                $validated['image'] = $result->getSecurePath();
            }
            $rs = Service::find($id)->update($validated);
            return $this->Redirect($rs,'Cập nhật dịch vụ thành công !!!');

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
            $rs = Service::find($id)->delete();
            return $this->Redirect($rs,'Xóa dịch vụ thành công !!!');
        }catch (\Exception $e)
        {
            dd($e);
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

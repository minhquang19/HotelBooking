<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Admins\Service\ServiceRepo;
use App\Http\Requests\Service\StorePostRequest;
use App\Http\Requests\Service\UpdatePostRequest;

class ServiceController extends Controller
{
    protected $serviceRepo;
    public function __construct(ServiceRepo $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo;
    }

    public function index()
    {
        $data   = $this->serviceRepo->getAll();
        return  view('backEnd.service',compact('data'));
    }

    public function store(StorePostRequest $request)
    {
        try {
            $validated          = $request->validated();
            $file_name          = 'service'.'_'.time();
            $uploadImage        = $this->serviceRepo->uploadImageOnCloudinary($request->file('image'),$file_name,'Service');
            $validated['image'] = $uploadImage->getSecurePath();
            $rs                 = $this->serviceRepo->create($validated);
            return $this->serviceRepo->redirect($rs,'Dịch vụ đã được tạo !');
        } catch (\Exception $e) {
            abort(500);
        }
    }
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $file_name = 'service'.'_'.time();
            if ($request->image == null)
            {
                $validated['image'] =$this->serviceRepo->find($id)->image;
            }else
            {
                $uploadImage = $this->serviceRepo->uploadImageOnCloudinary($request->file('image'),$file_name,'Service');
                $validated['image'] = $uploadImage->getSecurePath();
            }
            $rs     = $this->serviceRepo->update($id,$validated);
            return  $this->serviceRepo->redirect($rs,'Dịch vụ đã được cập nhật !');

        } catch (\Exception $e)
        {
            abort(500);
        }
    }
    public function destroy($id)
    {
        try {
           $rs      = $this->serviceRepo->delete($id);
           return   $this->serviceRepo->redirect($rs,'Dịch vụ đã được xóa !');
        }catch (\Exception $e) {
            abort(500);
        }
    }
}

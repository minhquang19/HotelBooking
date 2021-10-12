<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StorePostRequest;
use App\Http\Requests\Category\UpdatePostRequest;
use App\Repositories\Admins\Category\CategoryRepo;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        try
        {
            $data   = $this->categoryRepo->getAll();
            return  view('backEnd.category', compact('data'));
        }
        catch (\Exception $e){
            abort(500);
        }
    }

    public function store(StorePostRequest $request)
    {
        try
        {
            $validated  = $request->validated();
            $result     = $this->categoryRepo->create($validated);
            return      $this->categoryRepo->redirect($result,'Loại phòng đã được tạo mới !');
        }
        catch (\Exception $e){
            abort(500);
        }
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $validated  = $request->validated();
            $result     = $this->categoryRepo->update($id,$validated);
            return      $this->categoryRepo->redirect($result,'Loại phòng đã được cập nhật !');
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function destroy($id)
    {
        try
        {
            if ($this->categoryRepo->checkForeignKey($id))
            {
                return back()->with('error','Không thể xóa loại phòng đang có phòng');
            }
            $result     = $this->categoryRepo->delete($id);
            return      $this->categoryRepo->redirect($result,'Loại phòng đã được xóa !');
        }catch (\Exception $e){
            abort(500);
        }
    }

}

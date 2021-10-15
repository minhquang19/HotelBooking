<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admins\Blog\BlogRepo;
use App\Http\Requests\Blog\StorePostRequest;
 use App\Http\Requests\Blog\UpdatePostRequest;

class BlogController extends Controller
{
    protected $blogRepo;
    public function __construct(BlogRepo $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }
    public  $folder     = 'Blog';
    public function index()
    {
        $data   = $this->blogRepo->getAll();
        return  view('backEnd.blog',compact('data'));
    }

    public function store(StorePostRequest $request)
    {
        try
        {
            $validated                = $request->validated();
            $filename                 = 'blogCover'.time();
            $result                   = $this->blogRepo->uploadImageOnCloudinary($request->file('coverImage'),$filename,$this->folder);
            $validated['coverImage']  = $result->getSecurePath();
            $rs                       = $this->blogRepo->create($validated);
            return $this->blogRepo->redirect($rs,'Bài viết vừa được tạo mới !');
        }
        catch (\Exception $e)
        {
            abort(500);
        }
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try
        {
            $validated      = $request->validated();
            $filename       = 'blogCover'.time();
            if ($request->coverImage == null) {
                $validated['coverImage'] = Blog::find($id)->coverImage;
            }
            else {
                $result      = $this->blogRepo->uploadImageOnCloudinary($request->file('coverImage'),$filename,$this->folder);
                $validated['coverImage'] = $result->getSecurePath();
            }
            $rs     = $this->blogRepo->update($id,$validated);
            return  $this->blogRepo->redirect($rs,'Bài viết đã được cập nhật !');

        }
        catch (\Exception $e){
            abort(500);
        }
    }

    public function destroy($id)
    {
        try
        {
            $rs     = $this->blogRepo->delete($id);
            return  $this->blogRepo->redirect($rs,'Bài viết đã bị xóa !');
        }
        catch (\Exception $e){
            abort(500);
        }
    }
}

<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Tag\UpdatePostRequest;
use App\Http\Requests\Tag\StorePostRequest;
use App\Repositories\Admins\Tag\TagRepo;
use Illuminate\Http\Request;

class tagController extends Controller
{
    protected $tagRepo;
    public function __construct(TagRepo $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    public function index()
    {
        try {
            $data   = $this->tagRepo->getAll();
            return view('backEnd.tag', compact('data'));
        }catch (\Exception $e){
            abort(500);
        }
    }


    public function store(StorePostRequest $request)
    {
        try {
            $validated = $request->validated();
            $rs        = $this->tagRepo->create($validated);
            return $this->tagRepo->redirect($rs,'Tag đã được tạo !');
        }catch (\Exception $e){
            abort(500);
        }
    }
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $validated  = $request->validated();
            $rs         = $this->tagRepo->update($id,$validated);
            return $this->tagRepo->redirect($rs,'Tag đã được cập nhật !');
        }catch (\Exception $e){
            abort(500);
        }
    }
    public function destroy($id)
    {
        try {
            $rs = $this->tagRepo->delete($id);
            return $this->tagRepo->redirect($rs,'Tag đã được xóa !');
        }catch (\Exception $e){
            abort(500);
        }
    }
}

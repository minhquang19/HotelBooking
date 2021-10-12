<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Price\StorePostRequest;
use App\Repositories\Admins\RoomPrice\RoomPriceRepo;
use App\Http\Requests\Price\UpdatePostRequest;

class PriceController extends Controller
{
    protected $priceRepo;
    public function __construct(RoomPriceRepo $priceRepo)
    {
        $this->priceRepo = $priceRepo;
    }

    public function store(StorePostRequest $request)
    {
        try {
            $validated  = $request->validated();
            $rs         = $this->priceRepo->create($validated);
            return      $this->priceRepo->redirect($rs,'Giá phòng đã được tạo!');

        }
        catch (Exception $e)
        {
            abort(500);
        }
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try
        {
            $validated  = $request->validated();
            $rs         = $this->priceRepo->update($validated);
            return $this->priceRepo->redirect($rs,'Giá phòng đã được cập nhật !');
        }
        catch (Exception $e)
        {
            abort(500);
        }
    }

    public function destroy($id)
    {
        try
        {
            $rs         = $this->priceRepo->delete($id);
            return $this->priceRepo->redirect($rs,'Giá phòng đã được xóa !');
        }
        catch (Exception $e)
        {
            abort(500);
        }
    }
}

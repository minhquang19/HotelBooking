<?php
namespace App\Repositories\Admins;
abstract class BaseAdminRepo implements RepoAdminInterface
{

    protected $model;
    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model =app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);
        return    $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if($result)
        {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if($result)
        {
            $result->delete();
            return true;
        }
        return false;
    }

    public function redirect($rs,$mess)
    {
        if($rs)
        {
            return back()->with('success',$mess);
        }
        else
        {
            return back()->with('error','Opp!!! Có lỗi xảy ra');
        }
    }
    public function uploadImageOnCloudinary($image,$filename,$folder)
    {
        if($image)
        {
            return $image->storeOnCloudinaryAs($folder,$filename);
        }
        else{
            return false;
        }
    }
}

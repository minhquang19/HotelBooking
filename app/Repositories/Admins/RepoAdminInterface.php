<?php
namespace App\Repositories\Admins;
interface RepoAdminInterface
{
    public function getAll();
    public function find($id);
    public function create($attributes = []);
    public function update($id, $attributes = []);
    public function delete($id);
    public function redirect($rs,$mess);
    public function uploadImageOnCloudinary($image,$filename,$folder);
}

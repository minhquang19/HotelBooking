<?php

namespace App\Repositories\FrontEnd;

interface RepoFrontInterface
{
    public function getAllRoom();
    public function getAllCategory();
    public function getAllBlog();
    public function getAllService();
    public function getAllTag();
}

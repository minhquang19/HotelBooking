<?php

namespace App\Repositories\Front;

interface RepoFrontInterface
{
    public function getAllRoom();
    public function getAllCategory();
    public function getAllBlog();
    public function getAllService();
    public function getAllTag();
    public function getLimitBlog();
    public function getLimitService();
}

<?php

namespace App\Repositories\Post;
interface PostInterface{
    public function get();
    public function getFind($id);
    public function store($request);
    public function update($request);
    public function delete($id);
}

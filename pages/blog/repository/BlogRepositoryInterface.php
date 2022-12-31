<?php
namespace pages\blog\repository;

interface BlogRepositoryInterface
{
    public function getAllData();
    public function find($id);
    public function save(Blogdata $blogdata);
    public function remove($id);
    public function getInfoDetails();
}
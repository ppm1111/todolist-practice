<?php
namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface BaseRepository
{
    public function getAll() : Collection;

    public function getById($id) : ?Model;

    public function create($data) : Model;

    public function update($data) : int;

    public function delete(int $id) : ?int;

}

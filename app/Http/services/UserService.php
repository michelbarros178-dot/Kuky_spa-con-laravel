<?php

namespace App\Http\Services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = User::latest();
        return $query ->paginate(User::PAGINATE);
    }

    public function find(int $id): User
    {
        return User::findOrFail($id);
    }

    public function createUser(array $data): User
    {
        return User::create($data);
    }

    public function updateUser(int $id, array $data): bool
    {
        return User::where('id', $id)->update($data);
    }

    public function deleteUser(int $id): bool
    {
        return User::where('id', $id)->delete();
    }
       
}
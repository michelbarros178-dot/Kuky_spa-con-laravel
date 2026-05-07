<?php
namespace App\Http\services; // La 's' de services debe ser minúscula como en tu carpeta
use App\Models\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminService
{
    public function getAll(): LengthAwarePaginator
    {
        $query = admin::latest();
        return DB::table('admins')->paginate(10);
    }

    public function find(int $id): admin
    {
        return admin::findOrFail($id);
    }

    public function createAdmin(array $data): admin
    {
        return admin::create($data);
    }

    public function updateAdmin(int $id, array $data): bool
    {
        return admin::where('id', $id)->update($data);
    }

    public function deleteAdmin(int $id): bool
    {
        return admin::where('id', $id)->delete();
    }
       
}
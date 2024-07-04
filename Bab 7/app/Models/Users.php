<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'id', 'email', 'fullname', 'address', 'birthdate', 'gender', 'phone'
    ];

    public function storedData($data)
    {
        $results = Users::create($data);
        return $results;
    }

    public function getByCondition($condition)
    {
        $results = DB::table($this->table)->where($condition);
        return $results;
    }

    public function updatedData($data)
    {
        $isExist = $this->getByCondition(array('id' => $data['id']))->first();
        if (!empty($isExist)) {
            unset($data['_token']);
            $results = DB::table($this->table)->where(array('id' => $data['id']))->update($data);
            return $results;
        } else {
            return null;
        }
    }

    public function removeByCondition($condition)
    {
        $results = Users::where($condition)->delete();
        return $results;
    }
}
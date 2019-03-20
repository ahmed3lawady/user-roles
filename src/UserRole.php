<?php

namespace Ahmed3lawady\UserRole;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = ['id'];

    public function setRolesAttribute($val)
    {
        $this->attributes['roles'] = json_encode($val);
    }

    public function getRolesAttribute($val)
    {
        return json_decode($val);
    }
}

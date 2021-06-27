<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function getRoles()
    {
        return Role::getRolesNames()->map(function (Role $role) {
            return ['id'=> $role->id, 'name' => $role->name];
        });
    }
}

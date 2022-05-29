<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    protected $roles = [
        'admin' => [
            "show roles",
            "add roles",
            "edit roles",
            "delete roles",
            "show permission",
            "add permission",
            "edit permission",
            "delete permission",
            "show cities",
            "add cities",
            "edit cities",
            "delete cities",
            "show universities",
            "add universities",
            "edit universities",
            "delete universities",
        ],
        'university' => [
            "show department",
            "add department",
            "edit department",
            "delete department",
            "show college",
            "add college",
            "edit college",
            "delete college",
        ],
        'headDepartment' => [
            "show course",
            "add course",
            "edit course",
            "delete course",
            "show users",
            "add users",
            "edit users",
            "delete users",
            "import course",
            "import student",
            "show department",
            "show details complaints",
            "add details complaints",
            "edit details complaints",
            "delete details complaints",
        ],
        'deanDepartment' => [
            "show college",
            "show details complaints",
            "add details complaints",
            "edit details complaints",
            "delete details complaints",
        ],
        'student' => [
            "show form complaints",
            "add form complaints",
            "edit form complaints",
            "delete form complaints",
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role=>$permissions) {
            $role = Role::create(['name' => $role]);
            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        };
    }
}

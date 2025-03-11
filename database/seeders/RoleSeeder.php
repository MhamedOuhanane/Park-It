<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admine = Role::firstOrCreate(['id' => 1, 'name' => 'admin', 'guard_name' => 'admin']);
        $Touriste = Role::firstOrCreate(['id' => 2, 'name' => 'utilisateur', 'guard_name' => 'web']);
    }
}

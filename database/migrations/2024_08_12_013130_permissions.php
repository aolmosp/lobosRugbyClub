<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    protected $permissions;

    public function __construct()
    {
        $this->permissions = [
            'create-users',
            'edit-users',
            'ver-cartola',
            'crear-pagos',
            'eliminar-pagos',
        ];
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->permissions as $value) {
            $permission = Permission::firstOrCreate([
                'name' => $value,
            ]);
        }

        $user = User::where('email', 'angel.olmos@lobosrugby.club')->first();
        $user->givePermissionTo($this->permissions);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Permission::whereIn('name', $this->permissions)->delete();
    }
};

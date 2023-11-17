<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BalajiDharma\LaravelMenu\Models\Menu;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Vehicle;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete',
            'menu list',
            'menu create',
            'menu edit',
            'menu delete',
            'menu.item list',
            'menu.item create',
            'menu.item edit',
            'menu.item delete',
            'order list',
            'order create',
            'order edit',
            'order delete',
            'vehicle list',
            'vehicle create',
            'vehicle edit',
            'vehicle delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role1 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $role2 = Role::create(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $role2->givePermissionTo($permission);
        }

        // create roles and assign existing permissions
        $role3 = Role::create(['name' => 'approver']);
        $role3->givePermissionTo('permission list');
        $role3->givePermissionTo('role list');
        $role3->givePermissionTo('user list');
        $role3->givePermissionTo('menu list');
        $role3->givePermissionTo('menu.item list');
        $role3->givePermissionTo('order list');
        $role3->givePermissionTo('order edit');
        $role3->givePermissionTo('vehicle list');

        // create roles and assign existing permissions
        $role4 = Role::create(['name' => 'driver']);
        $role3->givePermissionTo('permission list');
        $role3->givePermissionTo('role list');
        $role3->givePermissionTo('user list');
        $role3->givePermissionTo('menu list');
        $role3->givePermissionTo('menu.item list');
        $role3->givePermissionTo('order list');
        $role3->givePermissionTo('vehicle list');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Approver 1',
            'email' => 'approver1@example.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Approver 2',
            'email' => 'approver2@example.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Approver 3',
            'email' => 'approver3@example.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Driver 1',
            'email' => 'driver1@example.com',
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => 'Driver 2',
            'email' => 'driver2@example.com',
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => 'Driver 3',
            'email' => 'driver3@example.com',
        ]);
        $user->assignRole($role4);

        // create menu
        $menu = Menu::create([
            'name' => 'Admin',
            'machine_name' => 'admin',
            'description' => 'Admin Menu',
        ]);

        $menu_items = [
            [
                'name'      => 'Dashboard',
                'uri'       => '/dashboard',
                'enabled'   => 1,
                'weight'    => 0,
            ],
            [
                'name'      => 'Permissions',
                'uri'       => '/<admin>/permission',
                'enabled'   => 1,
                'weight'    => 1,
            ],
            [
                'name'      => 'Roles',
                'uri'       => '/<admin>/role',
                'enabled'   => 1,
                'weight'    => 2,
            ],
            [
                'name'      => 'Users',
                'uri'       => '/<admin>/user',
                'enabled'   => 1,
                'weight'    => 3,
            ],
            [
                'name'      => 'Menus',
                'uri'       => '/<admin>/menu',
                'enabled'   => 1,
                'weight'    => 4,
            ],
            [
                'name'      => 'Vehicle',
                'uri'       => '/<admin>/vehicle',
                'enabled'   => 1,
                'weight'    => 4,
            ],
            [
                'name'      => 'Order',
                'uri'       => '/<admin>/order',
                'enabled'   => 1,
                'weight'    => 4,
            ]
        ];

        $menu->menuItems()->createMany($menu_items);

        // create category type
        Vehicle::create([
            'name' => 'Mitsubishi 2016',
            'consumption' => 0.5,
            'condition' => 'Good',
        ]);
        Vehicle::create([
            'name' => 'Mitsubishi 2017',
            'consumption' => 0.5,
            'condition' => 'Good',
        ]);
        Vehicle::create([
            'name' => 'Mitsubishi 2018',
            'consumption' => 0.5,
            'condition' => 'Good',
        ]);

        Order::create([
            'invoice' => 'TRX1234',
            'address' => 'Jl. Pesanggrahan, Jawa Tengah',
            'approved' => 0,
            'creator_id' => 1,
            'approver_id' => 3,
            'driver_id' => 6,
            'vehicle_id' => 1,
            'distance' => 30,
            'cost' => 200000,
            'details' => 'Mengantarkan Nikel 10 Ton',
        ]);
        Order::create([
            'invoice' => 'TRX456',
            'address' => 'Jl. Jayawangsa, Jawa Tengah',
            'approved' => 0,
            'creator_id' => 1,
            'approver_id' => 4,
            'driver_id' => 7,
            'vehicle_id' => 2,
            'distance' => 40,
            'cost' => 300000,
            'details' => 'Mengantarkan Tembaga 10 Ton',
        ]);
        Order::create([
            'invoice' => 'TRX789',
            'address' => 'Jl. Mojoagung, Jawa Timur',
            'approved' => 0,
            'creator_id' => 1,
            'approver_id' => 3,
            'driver_id' => 8,
            'vehicle_id' => 3,
            'distance' => 100,
            'cost' => 400000,
            'details' => 'Mengantarkan Bauksit 10 Ton',
        ]);
    }
}

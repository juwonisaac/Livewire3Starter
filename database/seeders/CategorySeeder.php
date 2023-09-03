<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'id' => 1,
                'name' => 'Réduction des gaspillages',
            ],
            [
                'id' => 2,
                'name' => 'Equiibrage des lignes de production',
            ],
            [
                'id' => 3,
                'name' => 'Pull',
            ],
            [
                'id' => 4,
                'name' => 'Flow',
            ],
            [
                'id' => 5,
                'name' => 'Setup',
            ],
            [
                'id' => 6,
                'name' => 'SPC',
            ],
            [
                'id' => 7,
                'name' => 'Total Preventive Maintenance',
            ],
            [
                'id' => 8,
                'name' => 'Employee involvement',
            ],
            [
                'id' => 9,
                'name' => 'Supplier involvement',
            ],
            [
                'id' => 10,
                'name' => 'Customer involvement',
            ],
            [
                'id' => 11,
                'name' => 'Fournisseurs',
            ],
            [
                'id' => 12,
                'name' => 'Process',
            ],
            [
                'id' => 13,
                'name' => 'Clients',
            ],
            [
                'id' => 14,
                'name' => 'Flexibilité',
            ],
            [
                'id' => 15,
                'name' => 'Réactivité',
            ],
            [
                'id' => 16,
                'name' => 'Vitesse',
            ],
            [
                'id' => 17,
                'name' => 'Compétence',
            ],
        ]);

    }
}

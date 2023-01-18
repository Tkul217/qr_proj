<?php

namespace Database\Seeders;

use App\Models\Consumers;
use Illuminate\Database\Seeder;

class ConsumerSeeder extends Seeder
{
    public function run()
    {
        Consumers::create([
            'name' => 'Иван Поло',
        ]);
    }
}

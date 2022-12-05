<?php

namespace Database\Seeders;

use App\Models\ReplySupport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplySupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReplySupport::factory(10)->create();
    }
}

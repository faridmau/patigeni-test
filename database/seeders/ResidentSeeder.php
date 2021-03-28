<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Models\Resident;
class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 40000; $i++) { 
            Resident::create([
                'nik' => $faker->nik(),
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'DOB' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'telepon' => '+62',
                'pekerjaan' => $faker->jobTitle,
                'gender'=> 'l',
                'agama' => 'islam',
                'status' => 'kawin'
            ]);
        }
        
    }
}

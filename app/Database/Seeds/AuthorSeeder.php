<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'name' => 'Nur Aziilah',
        //         'address' => 'Cyber Square, Lot 13, Kepayan',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'name' => 'John Doe',
        //         'address' => 'Aerospace, Lot 99, Penampang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'name' => 'Jane Doe',
        //         'address' => 'Jesselton Point',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],

        // ];

        $faker = \Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 10; $i++) {

            $data = [
                'name' => $faker->name,
                'address' => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];

            $this->db->table('author')->insert($data);
        }

        // Simple Queries
        // $this->db->query('INSERT INTO author (name, address, created_at, updated_at) VALUES(:name:, :address:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        // $this->db->table('author')->insertBatch($data);
    }
}

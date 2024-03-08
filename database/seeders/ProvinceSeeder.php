<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 1;
        if (($handle = fopen(public_path() . '/provinces.csv', 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                if ($row == 1) {
                    $row++;
                    continue;
                }
                $province = new Province();
                $province->id = $data[0];
                $province->name = $data[1];
                $province->save();
            }
            fclose($handle);
        }
    }
}

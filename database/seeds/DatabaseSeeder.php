<?php

use App\VendorSoftware;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        ini_set('memory_limit','128M');
        for($vendor=1; $vendor<=793; $vendor++){
            $vendor_software = [];
            for($software=1; $software<=181; $software++){
                $vendor_software[] = [
                    'vendor_id' => $vendor,
                    'software_id' => $software
                ];
            }
            VendorSoftware::insert($vendor_software);
        }



    }
}

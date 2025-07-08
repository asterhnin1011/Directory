<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poi;

class PoiSeeder extends Seeder
{
    public function run(): void
    {
        Poi::create([
            'user_id'      => 1,
            'fid'          => 'POI001',
            'shape'        => 'Point',
            'dps_id'       => 'DPS123',
            'source_id'    => 'SRC456',
            'source'       => 'Manual',
            'uid'          => 'U0001',
            'poi_n_eng'    => 'Myint Mo',
            'poi_n_win'    => null,
            'poi_n_zaw'    => 'မြင်းမိုရ် ဟိုတယ်',
            'poi_n_myn3'   => null,
            'type'         => 'Hotel',
            'dps_tsp'      => 'Myeik',
            'type_code'    => 'HOT01',
            'sub_type_c'   => null,
            'postal_cod'   => '14051',
            'st_n_eng'     => 'Bandula Street',
            'st_n_myn'     => null,
            'ward_n_eng'   => 'Upper Yaypone Qtr',
            'ward_n_myn'   => null,
            'tsp_n_eng'    => 'Myeik',
            'tsp_n_myn'    => null,
            'dist_n_eng'   => 'Tanintharyi',
            'dist_n_myn'   => null,
            's_r_n_eng'    => 'Tanintharyi Region',
            's_r_n_myn'    => null,
            'hn_eng'       => 'No(222)',
            'hn_myn'       => null,
            'address'      => 'No(222), Bandula street, Upper Yaypone Qtr Myeik, 14051',
            'phone'        => '9765005641',
            'longitude'    => 98.6138328,
            'latitude'     => 12.45633875,
            'remark'       => 'Imported from screenshot',
            'verify_dat'   => now(),
            'poi_pictur'   => null,
            'project'      => 'Tourism Mapping 2025',
        ]);
    }
}
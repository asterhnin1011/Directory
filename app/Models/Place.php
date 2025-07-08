<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'poi';
      protected $fillable = [
        'user_id', 'fid', 'shape', 'dps_id', 'source_id', 'source', 'uid',
        'poi_n_eng', 'poi_n_win', 'poi_n_zaw', 'poi_n_myn3', 'type', 'dps_tsp',
        'type_code', 'sub_type_c', 'postal_cod', 'st_n_eng', 'st_n_myn',
        'ward_n_eng', 'ward_n_myn', 'tsp_n_eng', 'tsp_n_myn', 'dist_n_eng',
        'dist_n_myn', 's_r_n_eng', 's_r_n_myn', 'hn_eng', 'hn_myn', 'address',
        'phone', 'longitude', 'latitude', 'remark', 'verify_dat', 'poi_pictur',
        'project'
    ];
}
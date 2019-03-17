<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeometryModel extends Model
{
    protected $table = 'geometries';
    protected $fillable = ['position','created_at','updated_at'];
    public function getDataBy($field,$id)
    {
        

    }
    public function insertGeom($data)
    {
        $conn = DB::connection()->getPdo();
        $sth = $conn->prepare('INSERT INTO geometries (`position`) VALUES (POINT(?, ?))');
        $sth->execute([
                $data['position'][0],
                $data['position'][1]]
        );
        return $sth;
    }
    public function insertGeomDir($data)
    {
        $date = \Carbon\Carbon::now();
        $lat = $data['position'][0];
        $long = $data['position'][1];
        $dt = DB::raw("POINT($lat, $long)");
        $this::create(['position' => $dt,'created_at'=>$date,'updated_at'=>$date]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeometryModel as Geom;

class Geometry extends Controller
{
    public function test(Request $req)
    {
        $res = $req->input();
        print_r($res);
        $data = ['position'=>[$res['lat'],$res['long']]];
        $geo = new Geom;
        $geo->insertGeomDir($data);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class geometry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'position' => [0, 0],
            ],
            [
                'position' => [0, 0],
            ],
            [
                'position' => [0, 0],
            ],
            [
                'position' => [0, 0],
            ],
        ];

        $conn = DB::connection()->getPdo();

        foreach($data as $key => $val)
        {
            $sth = $conn->prepare('INSERT INTO geometries (`position`) VALUES (POINT(?, ?))');
            $sth->execute([
                $val['position'][0],
                $val['position'][1]]
            );
        }
    }
}

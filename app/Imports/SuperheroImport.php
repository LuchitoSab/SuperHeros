<?php

namespace App\Imports;

use App\Models\Superheros;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SuperheroImport implements ToModel, WithHeadingRow
{

    protected $columnMap = [
        'id' => 'id',
        'name' => 'name',
        'fullName' => 'fullname',
        'strength' => 'strength',
        'speed' => 'speed',
        'durability' => 'durability',
        'power' => 'power',
        'combat' => 'combat',
        'race' => 'race',
        'heightM' => 'height_0',
        'heightCm' => 'height_1',
        'weightLb' => 'weight_0',
        'weightKg' => 'weight_1',
        'eyeColor' => 'eyecolor',
        'hairColor' => 'haircolor',
        'publisher' => 'publisher',
    ];

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $data = [];
        foreach ($this->columnMap as $attribute => $columnName) {
            $data[$attribute] = isset($row[$columnName]) ? $row[$columnName] : "desconocido";
        }
        
        $data['created_at'] = now();
        $data['updated_at'] = now();

        return new Superheros($data);
    }
}

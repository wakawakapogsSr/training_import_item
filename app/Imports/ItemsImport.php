<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\Item;

class ItemsImport implements ToModel, WithHeadingRow, WithChunkReading
{
  public function model(array $row)
  {
    return new Item([
      'code_name' => $row['partnumber'],
      'name' => $row['description']
    ]);
  }

  public function chunkSize(): int
  {
    return 5000;
  }

}

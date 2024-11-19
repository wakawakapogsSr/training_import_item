<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\{Cost,Item,Location};

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use Carbon\Carbon;

class ItemsImport implements ToCollection, WithHeadingRow, WithChunkReading
{
  // public function collection(Collection $rows) {

  //   $items_data = [];
  //   $costs_data = [];
  //   $locations_data = [];

  //   foreach ($rows as $row) {
  //     $items_data[] = [
  //       'code_name' => $row['partnumber'],
  //       'name' => $row['description'],
  //     ];
  //   }

  //   DB::table('items')->insert($items_data);

  //   $insertedItems = Item::whereIn('code_name', array_column($items_data, 'code_name'))->get();

  //   foreach ($insertedItems as $index => $item) {
  //     $row = $rows[$index];

  //     // preparing cost
  //     $costs_data[] = [
  //       'amount' => $row['cost'] * 1000,
  //       'item_id' => $item->id,
  //     ];

  //     // preparing locations
  //     $costs_data[] = [
  //       'amount' => $row['cost'] * 1000,
  //       'item_id' => $item->id,
  //     ];
  //   }

  //   DB::table('costs')->insert($costs_data);

  // }

  protected $branch_id;

  protected $itemsData = [];
  protected $costsData = [];
  protected $locationsData = [];
  protected $pivotData = [];
  protected $locationCache = [];

  public function __construct($branch_id = null)
  {
      $this->branch_id = $branch_id;
  }

  public function collection(Collection $rows)
  {
    // Fetch all existing locations once to reduce queries
    $existingLocations = Location::pluck('id', 'name')->toArray();
    $now = Carbon::now();

    foreach ($rows as $row) {
      $item_quantity = $row['quantity'];

      // Handle Location: Check if location already exists in cache or DB
      $locationCode = $row['location'];
      if (!empty($locationCode) && $locationCode !== '0') {
        if (isset($existingLocations[$locationCode])) {
          // Use existing location from the database
          $locationId = $existingLocations[$locationCode];
        } else {
          // Add new location to insert later
          $locationId = count($this->locationsData) + 1; // Temporary ID for new locations
          $this->locationsData[] = [
            'name' => $locationCode,
            'created_at' => $now,
            'updated_at' => $now,
          ];
        }
        // Cache the location ID for quick access
        $this->locationCache[$locationCode] = $locationId;
      } else {
        // Handle null or 0 location: skip or assign a default value if needed
        $locationId = null; // Optionally assign a default location ID
      }

      // Prepare the item data
      $this->itemsData[] = [
        'code_name' => $row['partnumber'],
        'name' => $row['description'],
        'created_at' => $now,
        'updated_at' => $now,
      ];

      // Prepare costs data with item_id temporarily set (to be updated after bulk insert)
      
      $this->costsData[] = [
        'quantity' => ((!is_null($item_quantity) && $item_quantity !== 0 && $item_quantity > 0 && ctype_digit(strval($item_quantity))) ? $item_quantity:0) * 1000,
        'amount' => $row['cost'] * 1000,
        'created_at' => $now,
        'updated_at' => $now,
      ];

      // Prepare pivot data (item-location relation) with temporary item_id (will update later)
      // Only prepare pivot data if the location is valid (not null or 0)
      if ($locationId) {
        $this->pivotData[] = [
          'location_id' => $locationId,
          'created_at' => now(),
          'updated_at' => now(),
        ];
      }
    }

    // Bulk insert items and get their IDs
    DB::table('items')->insert($this->itemsData);
    $insertedItems = Item::whereIn('code_name', array_column($this->itemsData, 'code_name'))->get();

    foreach ($insertedItems as $index => $item) {
      // Set the correct item_id in costs and pivot data
      if (isset($this->pivotData[$index])) $this->pivotData[$index]['item_id'] = $item->id;

      // if (!is_null($item_quantity) && $item_quantity !== 0 && $item_quantity > 0 && ctype_digit(strval($item_quantity))) {
        $this->costsData[$index]['item_id'] = $item->id;
      // }
    }

    // Bulk insert costs
    if (!empty(array_filter($this->costsData))) {
      DB::table('costs')->insert(array_filter($this->costsData));  // Filter out nulls
    }

    // Bulk insert new locations
    if (count($this->locationsData) > 0) {
      DB::table('locations')->insert($this->locationsData);
    }

    // Bulk insert item-location relationships (pivot table)
    DB::table('item_location')->insert($this->pivotData);

    // Clear the arrays for the next chunk
    $this->itemsData = [];
    $this->costsData = [];
    $this->pivotData = [];
    $this->locationsData = [];
  }

  public function chunkSize(): int
  {
    return 10000;
  }
}


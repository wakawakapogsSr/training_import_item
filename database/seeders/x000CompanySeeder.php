<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{
  Company,
  Branch
};

class x000CompanySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $branches_data = [
      [
        'code_name' => 'LMPB',
        'name' => 'BAYUGAN',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MCD',
        'name' => 'CALINAN',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'CRVN',
        'name' => 'CARAVN',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'LMPC',
        'name' => 'COMPOSTELA',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'LMPD',
        'name' => 'DIGOS',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MRT',
        'name' => 'GANTE',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MG',
        'name' => 'LAGAO',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MLA',
        'name' => 'LAPU-LAPU',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MWH',
        'name' => 'MAIN WAREHOUSE',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MMK',
        'name' => 'MONKAYO',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MP',
        'name' => 'PANABO',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'LMSF',
        'name' => 'SAN FRANCISCO',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'GTSH',
        'name' => 'SHOPEE (GANTE)',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MST',
        'name' => 'SOBRECARY',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MUD',
        'name' => 'ULAS',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MV4',
        'name' => 'VAN73 [ZF 9619]',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MWS',
        'name' => 'WHOLESALE',
        'bussiness_name' => "LYR MOTORPARTS CORP",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MCPR',
        'name' => 'MC PARTS DEPOT RIZAL',
        'bussiness_name' => "MC PARTS DEPOT",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail'
      ],
      [
        'code_name' => 'MPT',
        'name' => 'MC PARTS DEPOT TORIL',
        'bussiness_name' => "MC PARTS DEPOT",
        'address' => 'address_here',
        'contact_number' => '09xxxx',
        'tin_number' => 'tin-xxxx',
        'type' => 'retail
        ']
    ];


    $company = Company::create([
      'name' => 'LYR MOTORPARTS CORPORATION',
      'code_name' => 'NONE',
      'description' => 'MOTORPARTS',
      'bussiness_type' => 'corporation'
    ]);

    foreach($branches_data as $branch) {
      $branch = Branch::create($branch);
      $branch->company_id = $company->id;
      $branch->save();
    }
  }
}

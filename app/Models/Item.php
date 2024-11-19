<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{HasMany,BelongsToMany};

use App\Models\{
  ItemMovement,
  Location,
  Cost
};

class Item extends Model
{
  use HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'items';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'code_name'
  ];

  /**
   * The Cost model.
   *
   * @var string
   */
  protected static $costModel = Cost::class;

  /**
   * The Location model.
   *
   * @var string
   */
  protected static $itemMovementModel = ItemMovement::class;

  /**
   * The Location model.
   *
   * @var string
   */
  protected static $locationModel = Location::class;

  /**
   * Returns Cost relationship.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function costs(): HasMany
  {
    return $this->HasMany(static::$costModel, 'item_id');
  }

  /**
   * Returns Movement relationship.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function movements(): HasMany
  {
    return $this->HasMany(static::$itemMovementModel, 'item_id');
  }

  /**
   * Returns the items relationship.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function locations(): BelongsToMany
  {
    return $this->belongsToMany(static::$locationModel, 'item_location', 'item_id', 'location_id');
  }

}

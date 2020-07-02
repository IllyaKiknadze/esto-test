<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TransactionTypes
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionTypes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionTypes query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionTypes whereTitle($value)
 */
class TransactionTypes extends Model
{
    protected $table = 'transaction_types';

    public $timestamps = false;
}

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
 */
class TransactionTypes extends Model
{
    protected $table = 'transaction_types';

    public $timestamps = false;
}

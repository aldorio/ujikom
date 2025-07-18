<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransOrders extends Model
{
    protected $fillable = [
        'id_customer',
     'order_end_date',
      'order_status',
       'order_code',
        'order_pay',
         'order_change',
          'total',
        'note',];

    // relalation

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'id_customer', 'id');
    }

    public function details ()
    {
        return $this->hasMany(TransDetails::class, 'id_trans');
    }

    public function getStatusTextAttribute()
    {
        switch ($this->order_status) {
            case '1':
                return "Sudah Bayar";
                break;

            default:
                return "Baru";
                break;
        }
    }
}

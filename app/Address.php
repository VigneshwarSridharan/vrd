<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Address extends Model
{
    //
    public function getAddress() {
        $address = '';
        $address .= $this->address . ', ';
        $address .= $this->city . ', ';
        $address .= 'Pin Code ' . $this->pin_code . ', ';
        $address .= $this->state . ', ';
        $address .= $this->country . '.';
        return $address;
    }
}

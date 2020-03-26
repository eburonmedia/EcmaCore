<?php

namespace EburonMedia\EcmaCore\Models;

use Illuminate\Database\Eloquent\Model;

class EcmaSetting extends Model
{
    public function scopeDefault($query)
    {
        return $query->where('id', 1)->first();
    }
}

<?php

namespace EburonMedia\EcmaCore\Traits;

trait EcmaUsersTrait
{
    public function getFullNameAttribute()
    {
        if (isset($this->last_name)) {
            return ucfirst(trim($this->first_name)) .' '. ucfirst(trim($this->last_name));
        } else {
            return ucwords($this->name);
        }
    }

    public function getIsAdminAttribute()
    {
        if (isset($this->admin_role)) {
            if ($this->admin_role != 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getIsDeveloperAttribute()
    {
        if (isset($this->developer)) {
            if ($this->developer == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

<?php

namespace App\Domain;

use Illuminate\Support\Str;

class DTO
{
    public function __construct($payload = null)
    {
        if (null === $payload) {
            return;
        }
        $attributes = array_keys(get_object_vars($this));

        foreach ($payload as $key => $value) {
            $attributeName = Str::camel($key);
            if (! in_array($attributeName, $attributes)) {
                continue;
            }
            $this->{$attributeName} = $value;
        }
    }

    public function toArray(): array
    {
        $tmp = [];

        foreach (get_object_vars($this) as $key => $value) {
            $tmp[Str::snake($key)] = $value;
        }

        return $tmp;
    }
}

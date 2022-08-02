<?php

namespace App;

use Ramsey\Uuid\Uuid;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = Uuid::uuid4()->toString();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}

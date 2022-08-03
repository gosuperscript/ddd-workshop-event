<?php

namespace App\Models;

use App\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope('owned_by_organization', function (Builder $builder) {
            $builder->when(auth()->user() !== null, function (Builder $builder){
                $builder->where('organization_id', auth()->user()->organization_id);
            });
        });
        parent::booted();
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }
}

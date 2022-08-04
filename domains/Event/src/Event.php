<?php

namespace Domains\Event;

use App\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function auth;

class Event extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }

    public function scopeUpcoming(Builder $builder)
    {
        $builder->where('date', '>=', now());
    }
}

<?php

namespace App\Models;

use App\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        "name_event",
        "slug_event",
        "image_banner_event",
        "link_event",
        "description_event",
        "event_date",
        "event_place",
        "event_contact",
        "is_visible",
    ];
}

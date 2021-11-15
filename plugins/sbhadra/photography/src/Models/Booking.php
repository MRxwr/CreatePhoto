<?php

namespace Sbhadra\Photography\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Spatie\Translatable\HasTranslations;

class Booking extends Model
{
    use PostTypeModel;
    use HasTranslations;

   // protected $postType = 'sliders';
    protected $table = 'bookings';
    protected $fillable = [];
}

<?php

namespace Sbhadra\Photography\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Timeslot;
use Spatie\Translatable\HasTranslations;

class Booking extends Model
{
    use PostTypeModel;
    use HasTranslations;

   // protected $postType = 'sliders';
    protected $table = 'bookings';
    protected $fillable = [];
    public function services(){
        return $this->BelongsToMany(Service::class, 'booking_service')->withTimestamps();
    }
    public function package(){
        return $this->belongsTo(Package::class);
    }
    public function timeslot(){
        return $this->belongsTo(Timeslot::class);
    }  
}

<?php

namespace Sbhadra\Photography\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Juzaweb\Traits\ResourceModel;
use Spatie\Translatable\HasTranslations;

class Timeslot extends Model
{
    use PostTypeModel;
    use HasTranslations;
    protected $table = 'timeslots';
    protected $fillable = [
        'starttime',
        'endtime',
        'status',
    ];
}

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
    protected $postType = 'timeslots';
    protected $fillable = [
        'title',
        'slug',
        'starttime',
        'endtime',
        'status',
    ];
   
    public function packages()
    {
        return $this->belongsToMany('Sbhadra\Photography\Models\Package');
    }
}

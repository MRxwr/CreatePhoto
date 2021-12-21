<?php

namespace Sbhadra\Photography\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Spatie\Translatable\HasTranslations;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Timeslot;


class Package extends Model
{
    use PostTypeModel;
    use HasTranslations;
    protected $table = 'packages';
    public $translatable = ['title','content'];
    protected $postType = 'packages';
    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'slug',
        'is_extra',
        'price',
        'currency',
        'status',
        'views',
    ];
    public function services()
    {
        return $this->BelongsToMany(Service::class, 'package_service')->withTimestamps();
    }
    public function slots()
    {
        return $this->BelongsToMany(Timeslot::class, 'package_slots')->withTimestamps();
    }
}

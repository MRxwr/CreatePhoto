<?php

namespace Sbhadra\Photography\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Spatie\Translatable\HasTranslations;

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
        'time',
        'price',
        'currency',
        'status',
        'views',
    ];
}

<?php

namespace Sbhadra\Photography\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Spatie\Translatable\HasTranslations;


class Service extends Model
{
    use PostTypeModel;
    use HasTranslations;
    protected $table = 'services';
    public $translatable = ['title','description','content'];
    protected $postType = 'services';
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'price',
        'status',
    ];
}
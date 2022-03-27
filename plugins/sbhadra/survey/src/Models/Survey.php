<?php

namespace Sbhadra\Survey\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Spatie\Translatable\HasTranslations;

class survey extends Model
{
    use PostTypeModel;
    use HasTranslations;
    protected $table = 'surveys';
    public $translatable = ['title','description'];
    protected $postType = 'survey';
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        // 'price',
        'status',
    ];
   
}

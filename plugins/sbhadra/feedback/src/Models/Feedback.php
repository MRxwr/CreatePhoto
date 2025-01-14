<?php

namespace Sbhadra\Feedback\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Sbhadra\Photography\Models\Package;
use Spatie\Translatable\HasTranslations;

class feedback extends Model{
    use PostTypeModel;
    use HasTranslations;
    protected $table = 'feedback';
    public $translatable = [];
    protected $postType = 'feedbacks';
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'package_id',
        'content',
        'status',
    ];
    public function package(){
        return $this->belongsTo(Package::class);
    }
}

<?php

namespace Sbhadra\Survey\Models;

use Juzaweb\Models\Model;

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
    public function packages()
    {
        return $this->belongsToMany('Sbhadra\Photography\Models\Package');
    }
}

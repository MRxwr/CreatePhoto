<?php

namespace Sbhadra\Feedback\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Spatie\Translatable\HasTranslations;

class FeedbackPage extends Model
{
    use PostTypeModel;
    use HasTranslations;
    protected $table = 'feedback_page';
    public $translatable = [];
    protected $postType = 'feedback-pages';
    protected $fillable = [
        'title',
        'slug',
        'status',
    ];
}

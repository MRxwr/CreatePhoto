<?php

namespace Sbhadra\Packagethemes\Models;

use Juzaweb\Models\Model;
use Juzaweb\Traits\PostTypeModel;
use Spatie\Translatable\HasTranslations;


class theme extends Model
{
    
    use PostTypeModel;
    use HasTranslations;
    protected $table = 'package_themes';
    public $translatable = ['title','description'];
    protected $postType = 'package-themes';
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'status',
    ];
    // public function packages()
    // {
    //     return $this->belongsToMany('Sbhadra\Photography\Models\Package');
    // }
    public function getThumb60pxAttribute()
    {
        // Set the path to the timthumb.php script
        $timthumb_path =asset('storage/timthumb.php');
        // Set the path to the original image
        $original_image_path = $this->getThumbnail();
        // Set the desired thumbnail width and height
        $thumbnail_width = 60;
        $thumbnail_height = 60;
        // Build the URL for the thumbnail
         return $thumbnail_url = "{$timthumb_path}?src={$original_image_path}&w={$thumbnail_width}&h={$thumbnail_height}";
        //$them->getThumbnail()
        //return $this->getThumbnail();  
    }
}

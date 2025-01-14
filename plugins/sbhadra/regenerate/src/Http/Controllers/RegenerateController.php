<?php

namespace Sbhadra\Regenerate\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Juzaweb\Models\MediaFile;
use Juzaweb\Models\MediaFolder;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Packagethemes\Models\Theme;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RegenerateController extends BackendController
{
    public function index()
    {
        return view('sbre::index', [
            'title' => 'Title Page',
        ]);
    }
     public function getMedias()
    {   
         $this->addBreadcrumb([
                'title' => 'Re-generate Thumble Api',
                'url' => route('admin.media.index'),
         ]);
        $models = MediaFile::where('status',1)->get();   
        return view('sbre::backend.media.index', [
            'title' => 'Re-generate Thumble Api',
            'models'=>$models,
        ]);
    }
    
    public function reGenerateThumble(Request $request)
    {
        //dd($request->all());
        try {
           $num=10;
          if(isset($request->number_of_img)) {$num=$request->number_of_img;}
           $models = MediaFile::whereNull('imgId')->limit($num)->get();
            
            if($models){
                foreach($models as $model){
                    
                    $id = $model->id;
                    //$cfile =   curl_file_create($_FILES['upload']['tmp_name'],$_FILES['upload']['type'],$_FILES['upload']['name']);
                    // Create a cURLFile object
                    $oldFilePath = $model->path;
                    $filePath = storage_path('app/public/'.$model->path);
                   
                    if (file_exists($filePath)) {
                       
                     $cfile =    curl_file_create($filePath, mime_content_type($filePath), basename($filePath));
                    if(isset($request->ext)){
                        if($request->ext==""){
                            $postRequest = array(
                            'api_key' => 'img64626294050361684169364k',
                            'endpoint' => 'ImageUpload',
                            'image'=>$cfile,
                            'title' => $model->name
                           ); 
                        }else{
                             $postRequest = array(
                            'api_key' => 'img64626294050361684169364k',
                            'endpoint' => 'ImageUpload',
                            'image'=>$cfile,
                            'title' => $model->name,
                            'ext'=>$request->ext,
                        );
                        }
                        
                    }else{
                         $postRequest = array(
                            'api_key' => 'img64626294050361684169364k',
                            'endpoint' => 'ImageUpload',
                            'image'=>$cfile,
                            'title' => $model->name
                        );   
                    }
                    
                    
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://img.createapi.link/',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $postRequest,
                    ));
    
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $res = json_decode($response,true);
                            if($res["status"]=="success"){
                                $newFilePath =$res["data"]["imgs"]["small"];
                                $media = MediaFile::where('id', $id)->update([
                                        'imgId' => $res["data"]["imgId"],
                                        'path' => $res["data"]["imgs"]["small"],
                                        'imgs' => json_encode($res["data"]["imgs"]),
                                        'size' => $res["data"]["size"],
                                    ]);
                                $updated = DB::table('packages')->where('thumbnail', $oldFilePath)->update(['thumbnail' => $newFilePath]); 
                                $updated = DB::table('package_themes')->where('thumbnail', $oldFilePath)->update(['thumbnail' => $newFilePath]); 
                         }
                     }else{
                         
                     }
                }
            }
            
            return $this->success([
            'message' => trans('File Gnenerate Successfully'),
            'redirect' => route('admin.media.list'),
            ]);
        } catch (\Exception $e) {
           
            dd($e);
        }
        
       
    }
    
    public function PackageImageCompress(){
        
        $packages= Package::all();
        if($packages){
            foreach($packages as $package){
                $imagePath = storage_path('app/public/'.$package->thumbnail);
                $images= $this->compressAndSaveImageWithPrefixes($imagePath);
                
               if(!empty($images)){
                   $filePath=$package->thumbnail;
                   // Get the directory and the file name using pathinfo
                    $directory = dirname($filePath); // "2022/07/13"
                    $fileName = basename($filePath); // "logo-6t7U8fnp6x215ok.png"
                    // Rebuild the full file path with the new file name
                    
                    
                    //  // Extract the file name and extension
                    // $extension = pathinfo($fileName, PATHINFO_EXTENSION); // "png"
                    // $baseName = pathinfo($fileName, PATHINFO_FILENAME);   // "logo-6t7U8fnp6x215ok"
                    
                    // // Add the 'small_' prefix before the base name
                    // $newFileName = 'small_' . $baseName . '.' . $extension; // "small_logo-6t7U8fnp6x215ok.png"
                    
                    // // Rebuild the full file path with the new file name
                    // $newFilePath = $directory . '/' . $newFileName; // "2022/07/13/small_logo-6t7U8fnp6x215ok.png"
                    
                    $newFilePath = $directory . '/' .  $images['small'];
                    $th = Package::find($package->id);
                    $th->thumbnail = $newFilePath;
                    $th->save();
               }
            }
        }
        return $this->success([
            'message' => trans('File Gnenerate Successfully'),
            'redirect' => url('admin/packages'),
            ]);
        
    }
    public function ThemeImageCompress(){
        $themes= Theme::all();
        if($themes){
            foreach($themes as $theme){
                $imagePath = storage_path('app/public/'.$theme->thumbnail);
               $images= $this->compressAndSaveImageWithPrefixes($imagePath);
                if(!empty($images)){
                    $filePath=$theme->thumbnail;
                   // Get the directory and the file name using pathinfo
                    $directory = dirname($filePath); // "2022/07/13"
                    $fileName = basename($filePath); // "logo-6t7U8fnp6x215ok.png"
                    // Rebuild the full file path with the new file name
                    $newFilePath = $directory . '/' .  $images['small'];
                    
                    
                    $th = Theme::find($package->id);
                    $th->thumbnail = $newFilePath;
                    $th->save();
               }
            }
        }
         return $this->success([
            'message' => trans('File Gnenerate Successfully'),
            'redirect' => url('admin/package-themes'),
            ]);
    }
    
    static function compressAndSaveImageWithPrefixes($imagePath){
                    // Ensure the file exists
            if (!file_exists($imagePath)) {
                return response()->json(['error' => 'File not found'], 404);
            }
        
            // Get the directory and the file name
            $directory = dirname($imagePath);
            $fileName = basename($imagePath); // Get the file name like "logo-6t7U8fnp6x215ok.png"
            
            // Extract the file extension and base name
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $baseName = pathinfo($fileName, PATHINFO_FILENAME);
        
            // Define the small and medium prefixes
            $smallPrefix = 'small_';
            $mediumPrefix = 'medium_';
        
            // Create file names for small and medium versions
            $smallFileName = $smallPrefix . Str::slug($baseName) . '.' . $extension;
            $mediumFileName = $mediumPrefix . Str::slug($baseName) . '.' . $extension;
        
            // Define the save paths
            $smallSavePath = $directory . '/' . $smallFileName;
            $mediumSavePath = $directory . '/' . $mediumFileName;
        
            // Load the original image
            $image = Image::make($imagePath);
        
            // Resize, compress, and save the small version
            $image->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize(); // Prevent upsizing the image
            })->save($smallSavePath, 80); // Save with 80% quality
        
            // Resize, compress, and save the medium version
            $image->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize(); // Prevent upsizing the image
            })->save($mediumSavePath, 90); // Save with 90% quality
        
            return [
                'small' => $smallFileName,
                'medium' => $mediumFileName,
            ];
    }
    
    public function deleteFile(Request $request,$id){
       // MediaFile::findOrFail($id)->delete();
           $file = MediaFile::findOrFail($id);
           $file->status = 0;
           $file->save();
        return $this->success('File Successfully deleted');
    }
    
}

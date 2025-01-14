<?php

namespace Sbhadra\Themeoptions\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Juzaweb\Facades\Theme;
use Juzaweb\Facades\ThemeConfig;
use Juzaweb\Models\Menu;
use Juzaweb\Support\Theme\MenuBuilder;
use Illuminate\Http\Request;


class ThemeoptionsController extends BackendController
{
    public function index()
    {
        return view('sbth::backend.index', [
            'title' => 'Theme options',
        ]);
    }
    public function doSave(Request $request)
    {
          $data = $request->except('_token');
          if($request->post()){
              foreach($data as $key=>$post){
                  ThemeConfig::setConfig($key, $post);
              }
            $res['status']=true;
            $res['data'] = array(
                'message'=>'This Thmme option successfully updated',
                'redirect'=>route('admin.theme-option.get'),
            );
            echo json_encode($res);
            die();
   
          }
        
    } 
}

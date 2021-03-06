<?php

namespace Juzaweb\Http\Controllers\Backend\Setting;

use Illuminate\Http\Request;
use Juzaweb\Facades\GlobalData;
use Juzaweb\Http\Controllers\BackendController;

class SystemSettingController extends BackendController
{
    public function index($form = 'general')
    {
        $forms = $this->getForms();

        return view('juzaweb::backend.setting.system.index', [
            'title' => trans('juzaweb::app.system_setting'),
            'component' => $form,
            'forms' => $forms,
        ]);
    }

    public function save(Request $request)
    {
        $configs = $request->all();
        foreach ($configs as $key => $config) {
            if ($request->has($key)) {
                set_config($key, $config);
            }
        }

        $form = $request->post('form');
        if (empty($form)) {
            $form = 'general';
        }

        return $this->success([
            'message' => trans('juzaweb::app.saved_successfully'),
            'redirect' => route('admin.setting.form', [$form]),
        ]);
    }

    protected function getForms()
    {
        return collect(GlobalData::get('setting_forms'))->sortBy('priority');
    }
}

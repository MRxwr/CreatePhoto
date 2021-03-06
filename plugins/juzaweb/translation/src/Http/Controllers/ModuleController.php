<?php
/**
 * CODEPRESS CMS - The Best CMS for Laravel Project
 *
 * @package sanjoo83/laravel-cms
 * @author  The Anh Dang <sbhadra0@gmail.com>
 * @link https://hatcodes.com/cms
 * @license MIT
 */

namespace Juzaweb\Translation\Http\Controllers;

use Illuminate\Http\Request;
use Juzaweb\Support\ArrayPagination;
use Juzaweb\Translation\Facades\Locale;
use Juzaweb\Http\Controllers\BackendController;

class ModuleController extends BackendController
{
    public function index($type)
    {
        
        $this->addBreadcrumb([
            'title' => trans('juzaweb::app.translations'),
            'url' => route('admin.translations.index')
        ]);
        
      
        $data = Locale::getByKey($type);
       $locales = config('locales');
        
        return view('jutr::translation.module', [
            'title' => $data->get('title'),
            'type' => $type,
            'locales' => $locales
        ]);
    }

    public function add(Request $request, $type)
    {
        $locale = $request->post('locale');
        $publishPath = Locale::publishPath($type, $locale);

        if (is_dir($publishPath)) {
            return $this->error([
                'message' => trans('juzaweb::app.language_already_exist')
            ]);
        }

        try {
            mkdir($publishPath);
        } catch (\Throwable $e) {
            return $this->error([
                'message' => $e->getMessage()
            ]);
        }

        return $this->success([
            'message' => trans('juzaweb::app.add_language_successfull')
        ]);
    }

    public function getDataTable(Request $request, $type)
    {
        $search = $request->get('search');
        $offset = $request->get('offset', 0);
        $limit = $request->get('limit', 10);
        $page = $offset <= 0 ? 1 : (round($offset / $limit)) + 1;

        $result = Locale::allLanguage($type);

        if ($search) {
            $result = collect($result)->filter(function ($item) use ($search) {
                return (
                    strpos($item['name'], $search) !== false ||
                    strpos($item['code'], $search) !== false
                );
            });
        }

        $total = count($result);
        $items = ArrayPagination::make($result)->paginate($limit, $page)->values();

        return response()->json([
            'total' => $total,
            'rows' => $items
        ]);
    }
}
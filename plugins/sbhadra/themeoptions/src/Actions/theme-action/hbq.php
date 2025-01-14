<?php
namespace Sbhadra\Themeoptions\Actions;
use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Packagethemes\Models\Theme;
use Juzaweb\Models\Taxonomy;
use Juzaweb\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainAction extends Action
{
    /**
     * Execute the actions.addBodyClass
     *
     * @return void
     */
    public function handle()
    {
        //  $this->includeDynamicFile('hbq'); // Pass the dynamic filename (without .php)
        //  $this = new ThemeActionHelper();
         
        //$this->addAction(self::BACKEND_CALL_ACTION, [$this, 'packageThemeField']);
        // $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'updatepackagefield']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addBodyClass']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addFrontCategories']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addThemeExtraFields']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'doProcessPackageThemes']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getHomeAboutContent']);
        // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getTermsAndConditionContent']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getThemeOption']);
        
        // Call the method to include the dynamic file
       
       //$this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'myPublicFunction']);
    }

    /**
     * Dynamically include a file from the theme-action folder.
     *
     * @param string $fileName The file name without the .php extension.
     * @return void
     */
     
     public function getThemeOption(){
         dd("The file php does not exist in theme-action folder.");
     }
  
}

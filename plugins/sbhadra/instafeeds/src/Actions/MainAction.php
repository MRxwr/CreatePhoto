<?php

namespace Sbhadra\Instafeeds\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addInstaFeedsHomepage']);
       
    }

  
    public function addInstaFeedsHomepage()
    {
        add_filters('theme.instafeed.home', function(){
            return '<section class="pb-0">
            <div class="container" style="max-width: 1340px;">
              <div class="row">
                <div class="col-12">
                  <h2 class="shoots-Head">'.lang('theme::app.follow_us_on_instagram').'</h2>
                </div>
              </div>
            </div>
          </section>
            <iframe name="frame" style="width:100%; min-height:350px;" id="frame" src="pages/insta.html" allowtransparency="true" frameborder="0"></iframe>';
       }, 10, 1);

    }
   

}

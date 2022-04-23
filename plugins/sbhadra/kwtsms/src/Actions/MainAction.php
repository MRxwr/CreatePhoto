<?php
namespace Sbhadra\kwtsms\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Setting;

use Illuminate\Support\Facades\DB;
class MainAction extends Action
{
    public function handle()
    {
        
       // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addDoKwtSMSAction']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'addDoKwtSMSAction']);

    }

    public function addDoKwtSMSAction(){
        $this->addAction('booking.sms.index', function ($data) {
            $arabic = ['١','٢','٣','٤','٥','٦','٧','٨','٩','٠'];
            $english = [ 1 ,  2 ,  3 ,  4 ,  5 ,  6 ,  7 ,  8 ,  9 , 0];
	        $phone = str_replace($arabic, $english, $data['mobile']);
	        $mobile = $phone;
            $message=$data['message'];
            $code=$data['code'];
           $this->sendkwtsms($mobile,$message,$code); 
            
        });  
    }

    static function sendkwtsms($mobile,$message,$code){
        $setting=Setting::where('field_key','api_key')->first();
        $username = $setting->sms_username;
        $passwaord = $setting->sms_password;
        $senderid = $setting->sms_sender;
		$message = str_replace(' ','+',$message);
		    $url = 'http://www.kwtsms.com/API/send/?username='.$username.'&password='.$passwaord.'&sender='.$senderid.'&mobile='.$code.$mobile.'&lang=1&message='.$message;
		       $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_CUSTOMREQUEST => "GET",
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
				curl_close($curl);
				if ($err){
					return $err;
				}else{
					return $response;	
				}
	}

}
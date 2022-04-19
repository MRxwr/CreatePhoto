<?php
namespace Sbhadra\kwtsms\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;

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
           $rsp = $this->sendkwtsms($mobile,$message,$code); 
            //dd($rsp);
        });  
    }

    static function sendkwtsms($mobile,$message,$code){
		$message = str_replace(' ','+',$message);
		    $url = 'http://www.kwtsms.com/API/send/?username=badertov&password=471990Bader&sender=HBQ+Studio&mobile='.$code.$mobile.'&lang=1&message='.$message;
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
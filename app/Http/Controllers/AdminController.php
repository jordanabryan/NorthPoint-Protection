<?php

//
namespace App\Http\Controllers;

//
use Validator;
use App\Requests;
use App\Services;
use App\Settings;
use App\Mail\Email;
use App\Mail\AdminEmail;
use App\Mail\ReplyEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller{

	private $senderEmail = 'northpointprotection@lime-house-studio.co.uk';
	private $senderName = 'NorthPoint Protection';

	public function getAdminServicesPage(){

		$services = Services::get();

		return view('admin.services', ['services' => $services]);

	}

	public function getAdminServicePage($id){

		$service = Services::where('id', $id)->first();

		if(!empty($service->whats_covered)) {
			$service->whats_covered = json_decode($service->whats_covered);
		
			if(!empty($service->whats_covered)) {
				foreach ($service->whats_covered as $coveredkey => $covered) {
					$covered->id = $coveredkey;
				}
			}
		}

		if(!empty($service->common_questions)) {
			$service->common_questions = json_decode($service->common_questions);

			if(!empty($service->common_questions)) {
				foreach ($service->common_questions as $questionskey => $questions) {
					$questions->id = $questionskey;
				}	
			}

		}

		return view('admin.service', ['service' => $service]);

	}

	public function getAdminMessagePage(){

		$opened = Requests::where('opened', 1)->get();
		$new = Requests::whereNull('opened')->paginate(10);

		foreach ($opened as $key => $open) {
			$open->services = $this->getMessageType($open->services);
		}

		foreach ($new as $key => $unopened) {
			$unopened->services = $this->getMessageType($unopened->services);
		}

		return view('admin.messages', [
			'opened' => $opened,
			'new' => $new
		]);

	}

	public function getAdminSingleMessagePage($id){

		$message = Requests::where('id', $id)->firstOrFail();

		$message->services = $this->getMessageType($message->services);

		return view('admin.message', [
			'message' => $message,
		]);

	}

	public function postMessageSend(Request $request){

		$validator = Validator::make($request->all(), [
            'reciever' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
    	    'message' => 'required|string',
        ]);

    	if ($validator->fails()) {
            return redirect()
	            ->back()
				->withErrors($validator)
				->withInput()
				->with(['error_message' => 'message not sent']);
        }

        $messageObject = new \stdClass();
		$messageObject->receiver = $request['reciever'];
		$messageObject->email = $request['email'];
	    $messageObject->subject = $request['subject'];
	    $messageObject->message = $request['message'];
		$messageObject->senderEmail = $this->senderEmail;
		$messageObject->senderName = $this->senderName;
		$messageObject->view = 'mails/sendmessage';
		$messageObject->text = 'mails/sendmessage_plain';

		Mail::to($request['email'])->send(new Email($messageObject));

		unset($messageObject);

		if(Mail::failures()){
			$with = ['error_message' => 'message not sent'];
		} else {
			$with = ['success_message' => 'message successfully sent'];
		}

		return redirect()->back()->with($with);

	}

	public function postServiceUpdate(Request $request){

    	$validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
    	    'icon' => 'required|string',
    	    'excerpt' => 'required|string|max:255',
    	    'body' => 'required|string',
    	    'bg_image' => 'image',
    	    'whats_covered' => 'array',
    	    'common_questions' => 'array',
        ]);

    	if ($validator->fails()) {
            return redirect()
	            ->back()
				->withErrors($validator)
				->withInput()
				->with([
					'error_message' => 'service not successfully updated',
					'display' => true
				]);
        }

        $whats_covered = $common_questions = [];

        foreach ($request['whats_covered'] as $key => $value) {
        	if($value['title'] !== null && $value['body'] !== null){
        		array_push($whats_covered, $value);
        	}
        }

        foreach ($request['common_questions'] as $key => $value) {
        	if($value['title'] !== null && $value['body'] !== null){
        		array_push($common_questions, $value);
        	}
        }

		$file = $request->file('file');
        if($file) $extension = $file->extension();

        $service = Services::find(intval($request['id']));

		$service->title = $request['title'];
		$service->icon = str_replace('fa-', '', $request['icon']);
		$service->excerpt = $request['excerpt'];
		$service->body = $request['body'];
		$service->bg_image = ($file ? 'images/' . str_replace(' ', '-', strtolower($request['title'])) . '.' . $extension : 'images/background.jpg');
		$service->whats_covered = json_encode($whats_covered);
		$service->common_questions = json_encode($common_questions);

		$updated = $service->update();

		if($file) Storage::disk('local')->put(str_replace(' ', '-', strtolower($request['title'])) . '.' . $extension, File::get($file));

		if($updated){
			$with = [
				'success_message' => 'successfully updated service',
				'display' => true
			];
		} else {
			$with = [
				'error_message' => 'service not successfully updated',
				'display' => true
			];
		}

		return redirect()->back()->with($with);

	}

	public function postServiceAdd(Request $request){

    	$validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
    	    'icon' => 'required|string',
    	    'excerpt' => 'required|string|max:255',
    	    'body' => 'required|string',
    	    'bg_image' => 'image',
    	    'whats_covered' => 'array',
    	    'common_questions' => 'array',
        ]);

    	if ($validator->fails()) {
            return redirect()
	            ->back()
				->withErrors($validator)
				->withInput()
				->with([
					'error_message' => 'service not successfully added',
					'display' => true
				]);
        }

        
        $whats_covered = $common_questions = [];


        if($request['whats_covered']){

        	$whats_covered = [];
        	
        	foreach ($request['whats_covered'] as $key => $value) {
        		if($value['title'] !== null && $value['body'] !== null){
        			array_push($whats_covered, $value);
        		}
        	}
        }

        if($request['common_questions']){
        	
        	$common_questions = [];
        	
        	foreach ($request['common_questions'] as $key => $value) {
        		if($value['title'] !== null && $value['body'] !== null){
        			array_push($common_questions, $value);
        		}
        	}
        }


		$file = $request->file('file');
        if($file) $extension = $file->extension();

		$service = new Services();

		$service->title = $request['title'];
		$service->slug = str_replace(' ', '-', strtolower($request['title']));
		$service->icon = str_replace('fa-', '', $request['icon']);
		$service->excerpt = $request['excerpt'];
		$service->body = $request['body'];
		$service->bg_image = ($file ? 'images/' . str_replace(' ', '-', strtolower($request['title'])) . '.' . $extension : 'images/background.jpg');
		$service->whats_covered = json_encode($whats_covered);;
		$service->common_questions = json_encode($common_questions);

		$add = $service->save();

        if($file) Storage::disk('local')->put(str_replace(' ', '-', strtolower($request['title'])) . '.' . $extension, File::get($file));

		if($add){
			$with = [
				'success_message' => 'successfully added service',
				'display' => true
			];
		} else {
			$with = [
				'error_message' => 'service not successfully added',
				'display' => true
			];
		}

		return redirect()->back()->with($with);

	}


	public function getAdminIndexPage(){

		$settings = Settings::firstOrFail();

		return view('admin.index', [
			"phone" => $settings->phone,
			"mobile" => $settings->mobile,
			"email" => $settings->email,
			"facebook" => $settings->facebook,
			"twitter" => $settings->twitter,
			"linkedin" => $settings->linkedin
		]);

	}

	public function postSettingsUpdate(Request $request){

		$settings = Settings::firstOrFail();

		$settings->phone = $request['phone'];
		$settings->mobile = $request['mobile'];
		$settings->email = $request['email'];
		$settings->facebook = $request['facebook'];
		$settings->twitter = $request['twitter'];
		$settings->linkedin = $request['linkedin'];

		$updated = $settings->update();

		if($updated){
			$with = ['success_message' => 'successfully updated settings'];
		} else {
			$with = ['error_message' => 'settings not successfully updated',];
		}

		return redirect()->back()->with($with);

	}

	public function getAdminLayoutPage(){
		return view('admin.layout');
	}

	public function getLogin(){
		return view('admin.login');
	}

	public function postLogin(Request $request){
		
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);

		if(Auth::attempt([ 'email' => $request['email'], 'password' => $request['password'] ])){
			if (Auth::check()){
				return redirect()->intended('admin');
			} else {
				return redirect()->back()->with(['error_message' => 'error loggin in, please try again']);
			}
		} else {
			return redirect()->back()->with(['error_message' => 'error loggin in, please try again']);
		}
	}

	public function getLogout(){
		Auth::logout();

		return redirect()->route('login');
	}


	private function getMessageType($type){

		switch($type){
			case 1: 
				return 'Life Insurance';
				break;
			case 2: 
				return 'Illness cover';
				break;
			case 3: 
				return "Over 50's Cover";
				break;
			case 4: 
				return 'Family Income Cover';
				break;
			case 5: 
				return 'Income Protection';
				break;
			case 6: 
				return 'Mortgage Protection';
				break;
			case 0: 
				return 'No message type set';
				break;

		}

	}

}


?>
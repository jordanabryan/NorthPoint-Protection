<?php

//
namespace App\Http\Controllers;

//
use App\Requests;
use App\Services;
use App\Mail\AdminEmail;
use App\Mail\ReplyEmail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ServiceController extends Controller{

	private $senderEmail = 'northpointprotection@lime-house-studio.co.uk';
	private $senderName = 'NorthPoint Protection';

	public function getServicesPage(){

		$services = Services::get();

		return view('services', ['services' => $services]);

	}

	public function getServicePage($slug){

		$service = Services::where('slug', $slug)->firstOrFail();

		$service->whats_covered = json_decode($service->whats_covered);
		$service->common_questions = json_decode($service->common_questions);

		return view('service', ['service' => $service]);

	}

	public function servicePageSubmit(Request $request){

		$insert = false;

		$full_name = $request['full_name'];
		$email = $request['email'];
		$phone = $request['phone'];
		$service = $request['service'];
		$message = $request['message'];

		$requests = new Requests;

		if(!empty($full_name) && !empty($email) && !empty($phone)){

		    $requests->full_name = $full_name;
		    $requests->email = $email;
		    $requests->phone = $phone;
		    $requests->services = $service;
		    $requests->message = $message;
		    $request->form = 'service';
		    
		    $insert = $requests->save();

		}

	    if($insert){

			$messageReplyObj = new \stdClass();
			$messageReplyObj->receiver = $full_name;
			$messageReplyObj->email = $email;
			$messageReplyObj->services = $this->getMessageType($service);
		    $messageReplyObj->subject = $this->senderName . ' - ' . $this->getMessageType($service) . ' message';
		    $messageReplyObj->form = 'Contact form';
			$messageReplyObj->senderEmail = $this->senderEmail;
			$messageReplyObj->senderName = $this->senderName;

			$messageReplyObj->message = 'Bacon ipsum dolor amet pig corned beef turkey, turducken picanha short ribs shank fatback. Cow flank ball tip prosciutto pork ham hock drumstick beef beef ribs short loin doner spare ribs kielbasa. Beef leberkas tenderloin ribeye hamburger pork. Swine sirloin pork ham landjaeger ribeye. Tri-tip jowl leberkas sirloin drumstick, landjaeger beef pastrami capicola shank pork belly. Kevin drumstick andouille, salami jowl ground round turducken shankle cupim tri-tip..';

			$serviceInfo = Services::select('id', 'title', 'excerpt', 'bg_image')->where('id', $service)->firstOrFail();

			$messageReplyObj->service['title'] = 'A little more about our ' . $serviceInfo->title;
			$messageReplyObj->service['content'] = $serviceInfo->excerpt;
			$messageReplyObj->service['image'] = $serviceInfo->bg_image;

			Mail::to($email)->send(new ReplyEmail($messageReplyObj));

			unset($messageReplyObj);

			//admin email

			$adminMail = new \stdClass();
			$adminMail->receiver = $this->senderName;
			$adminMail->email = $this->senderEmail;
			$adminMail->services = $this->getMessageType($service);
		    $adminMail->subject = $this->senderName . ' - ' . $this->getMessageType($service) . ' message';
		    $adminMail->form = 'Contact form';
		    $adminMail->senderEmail = $this->senderEmail;
			$adminMail->senderName = $this->senderName;
	 
			Mail::to($this->senderEmail)->send(new AdminEmail($adminMail));

			unset($adminMail);


		    $with = ['success_message' => 'More information successfully requested!'];
		} else {
			$with = ['error_message' => 'Error requesting more information'];
		}

		return Redirect::to(URL::previous() . "#more-info")->with($with);

	}

	public function contactPageSubmit(Request $request){

		$insert = false;

		$full_name = $request['full_name'];
		$email = $request['email'];
		$phone = $request['phone'];
		$service = $request['service'];
		$subject = $request['subject'];
		$message = $request['message'];

		$requests = new Requests;

		if(!empty($full_name) && !empty($email) && !empty($phone)){

		    $requests->full_name = $full_name;
		    $requests->email = $email;
		    $requests->phone = $phone;
		    $requests->services = $service;
		    $requests->subject = $subject;
		    $requests->message = $message;
		    $request->form = 'contact';
		    
		    $insert = $requests->save();

		}

	    if($insert){

			//customer email

	    	$messageReplyObj = new \stdClass();
			$messageReplyObj->receiver = $full_name;
			$messageReplyObj->email = $email;
			$messageReplyObj->services = $this->getMessageType($service);
		    $messageReplyObj->subject = $this->senderName . ' - ' . $this->getMessageType($service) . ' message';
		    $messageReplyObj->form = 'Contact form';
			$messageReplyObj->senderEmail = $this->senderEmail;
			$messageReplyObj->senderName = $this->senderName;

			$messageReplyObj->message = 'Bacon ipsum dolor amet pig corned beef turkey, turducken picanha short ribs shank fatback. Cow flank ball tip prosciutto pork ham hock drumstick beef beef ribs short loin doner spare ribs kielbasa. Beef leberkas tenderloin ribeye hamburger pork. Swine sirloin pork ham landjaeger ribeye. Tri-tip jowl leberkas sirloin drumstick, landjaeger beef pastrami capicola shank pork belly. Kevin drumstick andouille, salami jowl ground round turducken shankle cupim tri-tip..';

			$serviceInfo = Services::select('id', 'title', 'excerpt', 'bg_image')->where('id', $service)->firstOrFail();

			$messageReplyObj->service['title'] = 'A little more about our ' . $serviceInfo->title;
			$messageReplyObj->service['content'] = $serviceInfo->excerpt;
			$messageReplyObj->service['image'] = $serviceInfo->bg_image;
	 
			Mail::to($email)->send(new ReplyEmail($messageReplyObj));

			unset($messageReplyObj);

			//admin email

			$adminMail = new \stdClass();
			$adminMail->receiver = $this->senderName;
			$adminMail->email = $this->senderEmail;
			$adminMail->services = $this->getMessageType($service);
		    $adminMail->subject = $this->senderName . ' - ' . $this->getMessageType($service) . ' message';
		    $adminMail->form = 'Contact form';
		    $adminMail->senderEmail = $this->senderEmail;
			$adminMail->senderName = $this->senderName;
	 
			Mail::to($this->senderEmail)->send(new AdminEmail($adminMail));

			unset($adminMail);


		    $with = ['success_message' => 'Message sucessfully sent!'];
		} else {
			$with = ['error_message' => 'Error sending message!'];
		}

		return redirect()->back()->with($with)->withInput($request->input());

	}

	public function quickContactSubmit(Request $request){

		$insert = false;

		$full_name = $request['full_name'];
		$email = $request['email'];
		$phone = $request['phone'];
		
		$requests = new Requests;

		if(!empty($full_name) && !empty($email) && !empty($phone)){

		    $requests->full_name = $full_name;
		    $requests->email = $email;
		    $requests->phone = $phone;
		    $requests->services = 0;
		    $requests->message = 'footer quick contact';
		    $request->form = 'footer';
		    
		    $insert = $requests->save();

		}

	    if($insert){

	    	//customer email

	    	$messageReplyObj = new \stdClass();
			$messageReplyObj->receiver = $full_name;
			$messageReplyObj->email = $email;
			$messageReplyObj->services = 'none';
		    $messageReplyObj->subject = $this->senderName . ' - quick contact';
		    $messageReplyObj->form = 'footer';
			$messageReplyObj->senderEmail = $this->senderEmail;
			$messageReplyObj->senderName = $this->senderName;

			$messageReplyObj->message = 'Bacon ipsum dolor amet pig corned beef turkey, turducken picanha short ribs shank fatback. Cow flank ball tip prosciutto pork ham hock drumstick beef beef ribs short loin doner spare ribs kielbasa. Beef leberkas tenderloin ribeye hamburger pork. Swine sirloin pork ham landjaeger ribeye. Tri-tip jowl leberkas sirloin drumstick, landjaeger beef pastrami capicola shank pork belly. Kevin drumstick andouille, salami jowl ground round turducken shankle cupim tri-tip..';
	 
			Mail::to($email)->send(new ReplyEmail($messageReplyObj));

			unset($messageReplyObj);

			//admin email

			$adminMail = new \stdClass();
			$adminMail->receiver = $this->senderName;
			$adminMail->email = $this->senderEmail;
			$adminMail->services = 'none';
		    $adminMail->subject = $this->senderName . ' - quick contact';
		    $adminMail->form = 'footer';
		    $adminMail->senderEmail = $this->senderEmail;
			$adminMail->senderName = $this->senderName;
	 
			Mail::to($this->senderEmail)->send(new AdminEmail($adminMail));

			unset($adminMail);

		    $with = ['footer_success_message' => 'Message sucessfully sent!'];
		} else {
			$with = ['footer_error_message' => 'Error sending message!'];
		}

		return redirect()->back()->with($with)->withInput($request->input());

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
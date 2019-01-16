<?php

//
namespace App\Http\Controllers;

//
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LayoutController extends Controller{

	public function getHomePage(){

		$services = Services::get();

		return view('index', ['services' => $services]);

	}

}

?>
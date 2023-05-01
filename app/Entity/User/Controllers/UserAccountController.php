<?php

namespace app\Entity\User\Controllers;

use app\Framework\Modules\Route\Services\Request\GetReq as Request;
use app\Framework\Modules\Route\Services\Response\GetRes as Response;

use app\Entity\User\Services\RegisterService;
use app\Entity\User\Services\LoginService;
use app\Utils\RenderView;

class UserAccountController
{

	public static function login(Request $req, Response $res){
		
		$token = LoginService::execute($req->body);
		
		$res->status(200)->sendJson([
			"success" => true,
			"data" => ["token"=> $token]
		]);
	}

	public static function register(Request $req, Response $res){

		RegisterService::execute($req->body);
		
		$res->status(200)->sendJson([
			"success" => true
		]);
	}

	public static function loginView(Request $req, Response $res){
		
		RenderView::view("Templates/userAccount/login");
	}

	public static function registerView(Request $req, Response $res){

		RenderView::view("Templates/userAccount/register");
	}

}
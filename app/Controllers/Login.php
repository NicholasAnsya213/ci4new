<?php

namespace App\Controllers;
use Codeigniter\Controller;
use App\Models\UserModel;
use Google_Client;

class Login extends BaseController
{
    private $googleClient;
    function __construct()
    {
        $this->googleClient= new Google_Client();
        $this->googleClient->setClientId("448688978358-02mui3dr2a3eb79ea8f7gn48f4knl2oc.apps.googleusercontent.com");
        $this->googleClient->setClientSecret("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");
        $this->googleClient->setRedirectUri("http://localhost:8080/Login/loginWithGoogle");
        $this->googleClient->addScope("email");
        $this->googleClient->addScope("profile");
    }

    public function index()
    {
        $data['link']=$this->googleClient->createAuthUrl();
        return view('login/index', $data);
    }
    public function home()
    {
        return view('dashboard_view');
    }
    public function loginWithGoogle()
    {
        $token=$this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        var_dump($token);

    }

}

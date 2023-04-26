<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController{

	use ResponseTrait;
    public function index()
    {
        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\userView\sidebar')
            .view('sharedMail\userView\unassign')
            .view('sharedMail\footer');
    }

    public function userdetailMail(){
        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\userView\sidebar')
            .view('sharedMail\userView\mailbox')
            .view('sharedMail\footer');
    }
    public function usercompose(){
        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\userView\sidebar')
            .view('sharedMail\compose')
            .view('sharedMail\footer');
    }
    public function userassigned(){
        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\userView\sidebar')
            .view('sharedMail\userView\assigned')
            .view('sharedMail\footer');
    }
    public function userassignDetailMailView(){
        return view('sharedMail\head') 
            .view('sharedMail\top_header')
            .view('sharedMail\userView\sidebar')
            .view('sharedMail\userView\assignDetailMail')
            .view('sharedMail\footer');
    }
}

?>
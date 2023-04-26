<?php 

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class documentController extends BaseController{

        public function apiDocument(){
            return view('documentation\head') 
            .view('documentation\top_header')
            .view('documentation\sidebar')
            .view('documentation\api_doc')
            .view('documentation\footer');
        }

        public function documentation(){
            return view('documentation\head') 
            .view('documentation\top_header')
            .view('documentation\sidebar')
            .view('documentation\txtdoc')
            .view('documentation\footer');
        }



}
?>
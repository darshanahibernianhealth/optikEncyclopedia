<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    public function genericMethod($status){
         $genericResponse = array(
            "400" => array(
                                "status" => 400,
                                "error" => "1",
                                "messages" => "Email is required !",
                            ),
            "401" => array(
                                "status" => 401,
                                "error" => "1",
                                "messages" => "Email or Password is wrong!",
                            ),
            "402" => array(
                            "status" => 402,
                            "error" => "1",
                            "messages" => "Email and Password feild required !",
                            ),
            "403" => array(
                            "status" => 403,
                            "error" => "1",
                            "messages" => "Invalid Email Id !",
                            ),
            "404" => array(
                            "status" => 404,
                            "error" => "1",
                            "messages" => "Email or Password is wrong!",
                            ),
            "405" => array(
                            "status" => 405,
                            "error" => "1",
                            "messages" => "Password is required !",
                            ),
            "406" => array(
                            "status" => 406,
                            "error" => "1",
                            "messages" => "Password length must be minimum 6 !",
                            ),
            "407" => array(
                            "status" => 407,
                            "error" => "1",
                            "messages" => "User not exist!",
                            ),
            "501" => array(
                            "status" => 501,
                            "error" => "1",
                            "messages" => "Drug name is required !",
                            ),
            "502" => array(
                            "status" => 502,
                            "error" => "1",
                            "messages" => "Tag is required !",  
                            ),
             "503" => array(
                            "status" => 503,
                            "error" => "1",
                            "messages" => "Actionby is required !",  
                            ),
             "504" => array(
                            "status" => 504,
                            "error" => "1",
                            "messages" => "Action is required !",  
                            ),
             "505" => array(
                            "status" => 505,
                            "error" => "1",
                            "messages" => "isActive is required !",  
                            ),
             "506" => array(
                            "status" => 506,
                            "error" => "1",
                            "messages" => "Drug id is required !", 
                            ),
             "601" => array(
                            "status" => 601,
                            "error" => "1",
                            "messages" => "No Data Found !", 
                            ),

        );

         $response = $genericResponse[$status];
         return $response;
    }

    public function valid_email($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = 'true';
        } else{
                $response = 'false';
            }
        return $response;
        }
}

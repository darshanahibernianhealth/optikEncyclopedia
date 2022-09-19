<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\adminModel;
use App\Controllers\ServiceController;
use CodeIgniter\HTTP\Response;
use App\Libraries\genericRespMsg;

class AdminController extends BaseController{

	 use ResponseTrait;
     protected $session;

	 public function index(){
        //this controller is load login page

		 return view('admin/header')
		.view('admin/login')
		.view('admin/footer');
	}

    public function login(){
        //when click on submit button of login then this controller will call to login

        //here we check flag , we get this value after submit login page. in flag we page user browser as output(eg : window, android).
        $flag = $this->request->getVar('flag');

        helper(['form']);

        $email = $this->request->getVar('email');
        $admin_password = $this->request->getVar('password');
        // echo '$admin_password=='.$admin_password;
        $password = md5($admin_password);  // convert password in md5 format.

        $model = new UserModel();
        $user = $model->where("email", $this->request->getVar('email'))->first();

        $checkEmail = $this->valid_email($email);
        // echo '$checkEmail=='.$checkEmail;
            // echo 'length=='.strlen($admin_password);
        if (($email == '' || $email == '') && ($admin_password == '' || $admin_password == NULL)) {

            $response = $this->genericMethod(402);
          if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 

        } elseif($email == '' || $email == ''){

            $response = $this->genericMethod(400);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 

        } elseif($checkEmail == 'false'){
                // echo 'false';
            $response = $this->genericMethod(403);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 
        } elseif(! $user){
            $response = $this->genericMethod(404);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 
        } elseif($admin_password == '' || $admin_password == NULL){

            $response = $this->genericMethod(405);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 

        } elseif(strlen($admin_password) < 6){
            // echo 'length=='.strlen($admin_password);
              $response = $this->genericMethod(406);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             }   

        }elseif($password != $user['password']){

            $response = $this->genericMethod(401);

             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             }    
        } else{
             $response = [
                            'status' => 200,
                            'error' => null, 
                            'messages' => 'User login successfully !'
                        ];
        }


        //  $key = getenv('TOKEN_SECRET');
        //  $iat = time();

        //  $nbf = $iat + 10;

        // $exp = $iat + 1000;
        // $payload = array(
        //                     "iat" => $iat,
        //                     "nbf" => $nbf,
        //                     "exp" => $exp,
        //                     "uid" => $user['id'],
        //                     "email" => $user['email']
        //                 );


        // $token = JWT::encode($payload, $key);
       

         if($response['status'] == 200){
            
            //check flag condition and return response accordingly.
            if($flag == 'windows'){
 
                    $newdata = [
                    'username'  => $user['user_name'],
                    'email'     => $user['email'],
                    'logged_in' => TRUE
                    ];
                   session()->set('LoginData',$newdata);

                    return redirect()->to(base_url("getDashboard"));
            } else{

              return $this->respond($response);  
            }
        }
    }

	public function showDrugList(){
        // this controller show all active drugs. 

        // try{
            // $serviceController = new ServiceController();
            // $result = $serviceController->getAllDrug();
            $flag = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);

            $model = new adminModel();
            $result = $model->showAllDrugs();
            $data['showalldrug'] = json_encode($result);

            // $data =  $result['data'];

            if($result){

                if($flag == 'windows'){
                    //if flag is windoe then it return view
                    return view('admin/mainHeader')
                            .view('admin/sidebar')
                            .view('admin/allDrugData',$data)
                            .view('admin/allDrugFooter');  

                } else{
                    //and if flag is not present then response will return
                     $response = [
                                    'status' => 200,
                                    'error' =>null,
                                    'messages' => $data
                                ];   
                    return $this->respond($response);
                }

            } else{
                $response = $this->genericMethod(601);
                return $this->respond($response);
             }

        // } catch(\Throwable $th){
        //     return $this->fail('Invalid Data');
        // }
		
	}

	public function showAllTag(){
        //by using this controller it load all tag form db.

		$model = new adminModel();
        $tagQuery = $_GET['query'];
        $result['showAllTagData'] = $model->allTag($tagQuery);

        // print_r($result);
        // die();
        $Tag = array();
        foreach($model->allTag($tagQuery) as $row){
            $Tag[] = $row['tag'];
        }
        echo json_encode($Tag);
       
	}
	
    public function CreateDrugAdmin(){
        // try{
        //this will return  add drug form
            $model = new adminModel();
            return view('admin/mainHeader')
                .view('admin/sidebar')
                .view('admin/dashboard')
                .view('admin/mainFooter');
    }
    public function createDrug(){
        // try{
        // by using this controller it will add drug into database.

            //getting all values from form. 
            $flag = $this->request->getVar('flag');

            $tagName = $this->request->getVar('tag_name');
            $drug_name = $this->request->getVar('drug_name');
            $sideeffects = htmlentities($this->request->getVar('drug_side_effects'));
            $UserName = $this->request->getVar('actionBy');
            $action = $this->request->getVar('action');
            $isActive = $this->request->getVar('isActive');

            //  $rules = [
            //             'drug_name' => 'required',
            //             'tag_name' => 'required',
            //             'actionBy' => 'required',
            //             'isActive' => 'required',
            //             'action' => 'required'
            //         ];
            // if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());

            if($drug_name == '' || $drug_name == NULL){
                $response = $this->genericMethod(501);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif ($tagName == '' || $tagName == NULL) {
                $response = $this->genericMethod(502);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($UserName == '' || $UserName == NULL){
                 $response = $this->genericMethod(503);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($action == '' || $action == NULL){
                 $response = $this->genericMethod(504);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($isActive == '' || $isActive == NULL){

                $response = $this->genericMethod(505);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } else{
                //here we explode tag name. tagname is in array format.
                $tag_nm = explode(',',$tagName);
                // print_r( $tag_nm);
                $sizeId = sizeof($tag_nm);
                $tagArr = array();

                 for($i=0; $i < $sizeId; $i++){
                    $tag_nm_new = trim($tag_nm[$i]);
                    // echo '$tag_nm=='.$tag_nm_new;
                    $model = new adminModel();
                    $result = $model->getTagDataByName($tag_nm_new); // checking tag name is present or not in data

                    if($result == '' || $result == NULL){
                        // if tag name entry is not presnt in db then it will add in db and get id of this tag and push in array.
                            $date = date('d-m-y h:i:s');
                            $data = array(
                                'tag' => $tag_nm_new,
                                'isActive' => 'Y',
                                'createdAt' => $date
                            );

                            $model = new adminModel();
                            $result = $model->saveTag($data);

                            $model = new adminModel();
                            $result = $model->getTagDataByName($tag_nm_new);

                            array_push($tagArr, $result['tag_id']);
                    } else{
                        // if tag name is present then , it get tag id of this tag and push in array
                        array_push($tagArr, $result['tag_id']);
                    }
                 }

                // $sideffect 
                $tagArr = implode(',',$tagArr);
                $actionTime = date("m/d/Y h:i:s a", time());

                //generate request array
                 $data = array(
                    'drug_name' => $drug_name,
                    'drug_side_effects' => $sideeffects,
                    'tag_id' =>  $tagArr,
                    'tag_name' => $tagName,
                    'isActive' => $isActive ,
                    'action' => $action,
                    'actionBy' => $UserName
                 );
                 $data['actionTime'] = array(
                    'actionTime' => $actionTime
                 );
                 $data['createdAt'] = array(
                    'createdAt' => $actionTime 
                 );

                 // print_r($data);


                 // pass whole data in model for inserting in db.
                $model = new adminModel();
                 // by using this function, it insert all drug data in db.
                $result = $model->saveDrug($data);

                // print_r($result);

                // die();

                if($result){
                    if($flag == 'windows'){
                        session()->setFlashData('drug_create', 'Drug Created Sucessfully !');
                        return redirect()->to(base_url('CreateDrugAdmin'));
                    } else{
                       $response = [
                              'status'   => 200,
                              'error'    => null,
                              'messages' => 'Drug Created Successfully !'
                            ]; 
                         return $this->respond($response); 
                     }
                        
                } else{
                    return $response = [
                              'status'   => 401,
                              'error'    => 1,
                              'messages' => 'Drug Not Created !'
                            ];
                }  
        }

    }

    public function modifyDrugDetail(){

        // try{

            $id = ($this->request->uri->getSegments()) ;
            $id = $id[1];

            $model = new adminModel();
            // passing id to this function and get all data of this particular id.
            $data['drugData'] = json_encode($model->getDrugDataById($id));

            if($data){
                // pass all result data to view
                 return view('admin/mainHeader')
                        .view('admin/sidebar')
                        .view('admin/modifyDrug',$data)
                        .view('admin/mainFooter'); 
            } else{
                return $response = [
                              'status'   => 401,
                              'error'    => 1,
                              'messages' => [
                                            'fail' => 'Invalid Data'
                                            ]
                            ];
            }
        // } catch(\Throwable $th){
        //     return $this->fail('Invalid Data');
        // }
    }

    public function modifyDrug(){
        // by using this method , it can update drug data.

            $flag = $this->request->getVar('flag');

            $drug_id = $this->request->getVar('drug_id');
            $tagName = $this->request->getVar('tag_name');
            $drug_name = $this->request->getVar('drug_name');
            $sideeffects = htmlentities($this->request->getVar('drug_side_effects'));
            $action = $this->request->getVar('action');
            $isActive = $this->request->getVar('isActive');
            $UserName =  $this->request->getVar('actionBy');

            if($drug_id == '' ||  $drug_id == NULL) {

               $response = $this->genericMethod(506);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 } 

            } elseif($drug_name == '' || $drug_name == NULL){
                $response = $this->genericMethod(501);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif ($tagName == '' || $tagName == NULL) {
                $response = $this->genericMethod(502);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($UserName == '' || $UserName == NULL){
                 $response = $this->genericMethod(503);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($action == '' || $action == NULL){
                 $response = $this->genericMethod(504);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($isActive == '' || $isActive == NULL){

                $response = $this->genericMethod(505);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } else{

            $tag_nm = explode(',',$tagName);
            // print_r( $tag_nm);
            $sizeId = sizeof($tag_nm);
            $tagArr = array();

              for($i=0; $i < $sizeId; $i++){
                $tag_nm_new = trim($tag_nm[$i]);
                // echo '$tag_nm=='.$tag_nm_new;
                $model = new adminModel();
                $result = $model->getTagDataByName($tag_nm_new);

                if($result == '' || $result == NULL){
                        $date = date('d-m-y h:i:s');
                        $data = array(
                            'tag' => $tag_nm_new,
                            'isActive' => 'Y',
                            'createdAt' => $date
                        );

                        $model = new adminModel();
                        $result = $model->saveTag($data);

                        $model = new adminModel();
                        $result = $model->getTagDataByName($tag_nm_new);

                        array_push($tagArr, $result['tag_id']);
                } else{
                    array_push($tagArr, $result['tag_id']);
                }
             }

            // $sideffect 
            $tagArr = implode(',',$tagArr);

            $actionTime = date("m/d/Y h:i:s a", time());            

             $drugData = array(
                'drug_name' => $drug_name,
                'drug_side_effects' => $sideeffects,
                'tag_id' => $tagArr,
                'tag_name' => $tagName,
                'isActive' => $isActive,
                'action' => $action,
                'actionBy' => $UserName
             );

             $data['actionTime'] = array(
                'actionTime' => $actionTime
             );

            $model = new adminModel();
            // echo '$drug_id=='.$drug_id;
            $result['updatedValues'] = json_encode($model->modifyDrugById($drug_id, $drugData));

            if($result){
                if($flag == 'windows'){
                    session()->setFlashData('drug_update', 'Drug Updated Sucessfully !');
                    return redirect()->to(base_url('showDrugList'));
                } else{
                      $response = [
                              'status'   => 200,
                              'error'    => null,
                              'messages' => 'Drug Edited successfully !'
                            ];  

                        return $this->respond($response);  
                    }
                        
                } else{
                    return $response = [
                                            'status'   => 200,
                                            'error'    => null,
                                            'messages' => 'Drug Not modified !'
                                        ];
                }
        }
    }

    public function deleteDrugDetail(){

            $drugId = $this->request->getVar('drug_id');
            $flag = $this->request->getVar('flag');
            $UserName = $this->request->getVar('actionBy');
            $actionTime = date("m/d/Y h:i:s a", time());
            $action = $this->request->getVar('action');
            $isActive = $this->request->getVar('isActive');

            if($drugId == '' || $drugId == NULL){
                $response = $this->genericMethod(506);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 } 
            } elseif($UserName == '' || $UserName == NULL){
                 $response = $this->genericMethod(503);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($action == '' || $action == NULL){
                 $response = $this->genericMethod(504);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($isActive == '' || $isActive == NULL){

                $response = $this->genericMethod(505);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } else{

                $data = array(
                'isActive' =>  $isActive,
                'action' => $action,
                'actionBy' => $UserName
                );
                $data['actionTime'] = array(
                    'actionTime' => $actionTime
                 );
                // $drugId = $this->request->getVar('drug_id');
                // echo 'drug_id=='.$drugId;
                $model = new adminModel();
                $result = json_encode($model->deleteDrug($drugId,$data));
                    // print_r($result);
                if($result){
                    if($flag == 'windows'){
                        $result = 'Drug Deleted Sucessfully !';
                        echo json_encode($result);

                    } else{
                          $response = [
                                            'status'   => 200,
                                            'error'    => null,
                                            'messages' => 'Drug Deleted Sucessfully !'
                                     ];
                        return $this->respond($response);
                    }
                   
                } else{

                     return $response = [
                                  'status'   => 401,
                                  'error'    => 1,
                                  'messages' => 'Drug Not Deleted Sucessfully !'
                                ];
                }
            } 

    }

    public function showAllDeletedDrugData(){
        try{

            // $serviceController = new ServiceController();
            // $result = $serviceController->deletedDrugList();
            $flag = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);

            $model = new adminModel();
            $result = $model->deletedDrugList();
            // print_r($result);
            // if( $result){
            $data['deletdDrugData'] = json_encode($result);
            if($result != '' && $result != NULL){
               if($flag == 'windows'){

                    return view('admin/mainHeader')
                            .view('admin/sidebar')
                            .view('admin/deletedDrugList',$data)
                            .view('admin/deletedDrugListFooter');
               } else{
                    $response = [
                                    'status' => 200,
                                    'error' =>null,
                                    'messages' => $data
                                ];
                    return $this->respond($response);
               }    
            } else{
                if ($flag == 'windows') {
                     return view('admin/mainHeader')
                            .view('admin/sidebar')
                            .view('admin/deletedDrugList',$data)
                            .view('admin/deletedDrugListFooter'); 
                } else{
                    $response = $this->genericMethod(601);
                    return $this->respond($response);
                }
            }
        }catch(\Throwable $th){
            return $this->fail('Invalid Data');
        }
    } 

   public function reactiveDrugById(){

        try{

            $drugId = $this->request->getVar('drug_id');
            $flag = $this->request->getVar('flag');
            $UserName = $this->request->getVar('actionBy');
            $actionTime = date("m/d/Y h:i:s a", time());
            $action = $this->request->getVar('action');
            $isActive = $this->request->getVar('isActive');
           
            if($drugId == '' || $drugId == NULL){
                $response = $this->genericMethod(506);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 } 
            } elseif($UserName == '' || $UserName == NULL){
                 $response = $this->genericMethod(503);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($action == '' || $action == NULL){
                 $response = $this->genericMethod(504);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } elseif($isActive == '' || $isActive == NULL){

                $response = $this->genericMethod(505);

                 if($flag == 'windows'){
                     session()->setFlashData('add_drug_error', $response['messages']);
                    return redirect()->to(base_url("CreateDrugAdmin"));
                 } else{
                    return $this->respond($response);
                 }
            } else{

                 $data = array(
                    'isActive' => $isActive,
                    'action' => $action,
                    'actionBy' => $UserName
                );
                 $data['actionTime'] = array(
                    'actionTime' => $actionTime
                 );
                $model = new adminModel();
                $result = json_encode($model->deleteDrug($drugId,$data));

                    // print_r($result);

                if($result != '' && $result != NULL){
                    if($flag == 'windows'){
                         $result = 'Drug Re-Activate Sucessfully !';

                        echo json_encode($result);
                    } else{
                        $response = [
                              'status'   => 200,
                              'error'    => null,
                              'messages' => 'Drug Re-Activate Sucessfully !'
                            ]; 

                            return $this->respond($response);
                    }
                   
                } else{

                   return $response = [
                                      'status'   => 401,
                                      'error'    => 1,
                                      'messages' => 'Drug Not Re-Activate Sucessfully !'
                                    ];  
                }
            }

        } catch(\Throwable $th){
             return $this->fail('Invalid Data');
        }
        
    }

    public function getDashboard(){

        $model = new adminModel();
        $result['totalDrugCount'] = json_encode($model->getTotalCountOfDrug());
        $result['totalTagCount'] = json_encode($model->getTotalCountOfTag());
        // $result['totalManufacturCount'] = json_encode($model->getTotalManuOfDrug());
        $result['totalDeletedDrugCount'] = json_encode($model->getTotalDeletedDrugOfDrug());

        // print_r($result);

        return view('admin/mainHeader')
        .view('admin/sidebar')
        .view('admin/adminDashboard',$result)
        .view('admin/mainFooter');
    }

    public function forgotPassView(){
         return view('admin/header')
        .view('admin/forgotpassword')
        .view('admin/footer');
    }

    public function forgotpassword(){
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $confirmpassword = $this->request->getVar('confirmpassword');
        $checkParameter = $this->request->getVar('paramenter');
        // $username = $this->request->getVar('username');
        $flag = $this->request->getVar('flag');
        $checkEmail = $this->valid_email($email);

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (($email == '' || $email == '') && ($password == '' || $password == NULL)) {

            $response = $this->genericMethod(402);
          if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 

        } elseif($email == '' || $email == ''){

            $response = $this->genericMethod(400);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 

        } elseif($checkEmail == 'false'){
                // echo 'false';
            $response = $this->genericMethod(403);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 
        } elseif(! $user){
            $response = $this->genericMethod(404);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 
        } elseif($password == '' || $password == NULL){

            $response = $this->genericMethod(405);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 

        } elseif(strlen($password) < 6){
            // echo 'length=='.strlen($admin_password);
              $response = $this->genericMethod(406);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             }   

        } else{

        $password = md5($password);
        $actionTime = date("m/d/Y h:i:s a", time());

        $data = array(
            'password' => $password,
            'updated_at' => $actionTime
        );
        $data['updated_at'] = array(
            'updated_at' =>  $actionTime
        );

        $userModel = new UserModel();
        $result = $userModel->updatePassword($email,$data);  
           
        if($checkParameter == 'insideAdminPanel'){
            if($result){
                if($flag == 'windows'){
                     session()->setFlashData('password_sucess','Password Updated Sucessfully !');
                    return redirect()->to(base_url("changePassword"));
                } else{
                    $response = [
                                    'status'   => 200,
                                    'error'    => null,
                                    'messages'  => 'Password Updated Sucessfully !'
                                ];

                      return $this->respond($response);          
                }
            }   
           
        } else{
            if($result){
                if($flag == 'windows'){
                     session()->setFlashData('password_sucess','Password Updated Sucessfully !');
                    return redirect()->to(base_url("/"));
                } else{
                    $response = [
                                    'status'   => 200,
                                    'error'    => null,
                                    'messages'  => 'Password Updated Sucessfully !'
                                ];

                      return $this->respond($response);          
                }
            }  
        } 

    }

    }

    public function changePassword(){

        $user = session()->get('LoginData');
       // echo  $user['username'];
        $UserName =  $user['username'];
        // echo 'Uer==='.$UserName;
        $userModel = new UserModel();
        $user = $userModel->where('user_name', $UserName)->first();

        if(is_null($user)) {
            // return failNotFound('');
            return $errorReturn = [
                            'error' => 'Invalid User Name.',
                            'status' => 400
                         ];
        } else{
            $data['adminData'] = array(
                'username' => $user['user_name'],
                'email' => $user['email']
            );
        }

        return view('admin/mainHeader')
        .view('admin/sidebar')
        .view('admin/changePassword',$data)
        .view('admin/allDrugFooter');
    }
    public function changeEmail(){

         $user = session()->get('LoginData');
       // echo  $user['username'];
        $UserName =  $user['username'];
        $userModel = new UserModel();
        $user = $userModel->where('user_name', $UserName)->first();

        if(is_null($user)) {
            // return failNotFound('');
            return $errorReturn = [
                            'error' => 'Invalid User Name.',
                            'status' => 400
                         ];
        } else{
            $data['adminData'] = array(
                'username' => $user['user_name'],
                'email' => $user['email']
            );
        }

         return view('admin/mainHeader')
        .view('admin/sidebar')
        .view('admin/changeEmail',$data)
        .view('admin/allDrugFooter');

    }
    public function ChangeEmailId(){
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('ex_email');
        $newemail = $this->request->getVar('email');
        $flag = $this->request->getVar('flag');

        $checkEmail = $this->valid_email($newemail);

        $model = new UserModel();
        $user = $model->where("user_name", $this->request->getVar('username'))->first();

        if($newemail == '' || $newemail == ''){

            $response = $this->genericMethod(400);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 

        } elseif($checkEmail == 'false'){
                // echo 'false';
            $response = $this->genericMethod(403);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 
        } elseif(! $user){
            $response = $this->genericMethod(407);
             if($flag == 'windows'){
                 session()->setFlashData('login_error', $response['messages']);
                return redirect()->to(base_url("/"));
             } else{
                return $this->respond($response);
             } 
        } else{

            $date = date("m/d/Y h:i:s a", time());
            $data = array(
                    'email' => $newemail
                );
            $data['updated_at'] = array(
                    'updated_at' => $date 
                );

            // $model = new UserModel();
            $result = $model->updateEmailId($username, $data);

            if($result){
                if($flag == 'windows'){
                   session()->setFlashData('emailupdated', 'Email Updated Sucessfully !');
                    return redirect()->to(base_url("changeEmail"));  
                } else{
                    $response = [
                                  'status'   => 200,
                                  'error'    => null,
                                  'messages' => 'Email Updated Sucessfully !'
                                ];  
                     return $this->respond($response);              
                }
               
            } 

        }
    }

    public function logout(){
        
        $session = session(); 
        $session->destroy();
        return redirect()->to(base_url('/'));
        exit();
    }
    public function api_documentation(){
         return view('documentation/mainHeader')
        .view('documentation/sidebar')
        .view('documentation/api_doc')
        .view('documentation/mainFooter');
    }
     public function documentation(){
         return view('documentation/mainHeader')
        .view('documentation/sidebar')
        .view('documentation/documentation')
        .view('documentation/mainFooter');
    }
    public function callback(){
         return view('callback');
    }
}
?>

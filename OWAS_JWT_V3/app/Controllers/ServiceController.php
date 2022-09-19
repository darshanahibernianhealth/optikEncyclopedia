<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\adminModel;
use App\Models\DrugDetailsModel;
use App\Controllers\AdminController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class ServiceController extends BaseController{
//
	use ResponseTrait;
    
    public function index()
    {
        return view('welcome_message');
    }

    public function hello(){
        // print_r($request);
    // $requestBody = json_decode($this->request->getBody());
      echo "<br>This is what I have recieved from the AdminController:login function<pre>";
      // print_r($requestBody);
      echo "</pre>";
      return $requestBody;
      // exit;
      //$arr_data = $this->ServiceController->hello($request,false);
      //  return response()->json($arr_data);  
    }

    public function serviceLogin()
    {

        helper(['form']);

          // $header = ($this->request->uri->getSegments());
          // $email = $header[1];
          // $password = $header[2];
       $mail = $this->request->getVar('email');

         $rules = [
         'email' => 'required|valid_email',
         'password' => 'required|min_length[6]'
         ];

        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());

         $model = new UserModel();
         $user = $model->where("email", $this->request->getVar('email'))->first();
        if(!$user) return $this->failNotFound('Email Not Found');

        $password = md5($this->request->getVar('password'));
        // echo '<br>'.$user['password'];

     
        if($password != $user['password']) {
           return $errorReturn = [
                         'error' => 'Invalid Password.',
                         'status' => 400
                      ];
        }

         $key = getenv('TOKEN_SECRET');
         $iat = time();

         $nbf = $iat + 10;

        $exp = $iat + 1000;
        $payload = array(
                            "iat" => $iat,
                            "nbf" => $nbf,
                            "exp" => $exp,
                            "uid" => $user['id'],
                            "email" => $user['email']
                        );


        $token = JWT::encode($payload, $key);
      // $token = JWT::encode($payload, $key, 'HS256');
        $response = [
            'status' => 200,
            'error' => null, 
            'messages' => [
            'success' => 'User login successfully',
            'token' => $token
             ]
         ];

        return $this->respond($response);
            //return $this->respond($token);
     }

	public function addDrug(){
        //$tagName, $drug_name, $sideeffects

	 	$key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try{

        	$decoded = JWT::decode($token, new Key($key, 'HS256'));

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
            // $tagId = implode(',',$_POST['tag_id']);

            $UserName =  session()->get('username');
            $actionTime = date("m/d/Y h:i:s a", time());

             $data = array(
                'drug_name' => $drug_name,
                'drug_side_effects' => $sideeffects,
                'tag_id' =>  $tagArr,
                'tag_name' => $tagName,
                'isActive' => 'Y',
                'action' => 'C',
                'actionBy' => $UserName,
                'actionTime' => $actionTime,
                'createdAt' => $actionTime
             );

            $model = new adminModel();
            $result = $model->saveDrug($data);

        		// print_r($result);
    			if($result){
    					$response = [
                          'status'   => 200,
                          'error'    => null,
                          'messages' => [
                                        'success' => 'Tag created successfully'
                                        ]
                        ];	
    			}
        		
            return $response;

            // print_r($response);
            // die();

        } catch(\Throwable $th){
        	return $errorReturn = [ 'error' => 'Invalid Token.' ];
        }

	 }

     public function getAllDrug(){

        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {

            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $model = new adminModel();
            $result = $model->showAllDrugs();
            $data['showalldrug'] = json_encode($result);

            if($data){
                $response = [
                    'status' => 200,
                    'data' => $data
                ];
            } else{
              $response = [
                'status' => 400,
                'data' => 'No data found !'
              ]; 
            }
            // print_r($response);
            return $response;

        }catch(\Throwable $th){
              return $this->fail('Invalid Token');
        }
     }
     public function modifyDrugData(){
        //$drug_id, $tagName, $drug_name,$sideeffects

        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try{
           
           $decoded = JWT::decode($token, new Key($key, 'HS256'));

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

            $UserName =  session()->get('username');
            $actionTime = date("m/d/Y h:i:s a", time());            

             $drugData = array(
                'drug_name' => $_POST['drug_name'],
                'drug_side_effects' => $sideeffects,
                'tag_id' => $tagArr,
                'tag_name' => $tagName,
                'isActive' => 'Y',
                'action' => 'E',
                'actionBy' => $UserName,
                'actionTime' => $actionTime
             );


            $model = new adminModel();
            $result['updatedValues'] = json_encode($model->modifyDrugById($drug_id, $drugData));

            if($result){
                        $response = [
                          'status'   => 200,
                          'error'    => null,
                          'messages' => [
                                        'success' => 'Drug Edited successfully !'
                                        ]
                        ];  
                }else{
                    $response = [
                    'status' => 400,
                    'data' => 'No data found ss!'
              ];
            }

            return $response;

        } catch(\Throwable $th){
            return $errorReturn = [ 'error' => 'Invalid Data.' ];
        }
     }

     public function deleteDrugData() {

     $key = getenv('TOKEN_SECRET');

     $header = $this->request->getServer('HTTP_AUTHORIZATION');

     if(!$header) return $this->failUnauthorized('Token Required');

     $token = explode(' ', $header)[1];


     try {

        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        $UserName =  session()->get('username');
        $actionTime = date("m/d/Y h:i:s a", time());

        $data = array(
            'isActive' => 'N',
            'action' => 'D',
            'actionBy' => $UserName,
            'actionTime' => $actionTime
        );
        $drugId = $this->request->getVar('drug_id');
        // echo 'drug_id=='.$drugId;
        $model = new adminModel();
        $result = json_encode($model->deleteDrug($drugId,$data));

        // print_r($result);
        if($result == true){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                                'success' => 'Drug Deleted Sucessfully !'
                            ]
         ];
        } else{
             $response = [
                        'status' => 400,
                        'data' => 'No data found ss!'];
        }
        
        return $this->respond($response);
         }catch (\Throwable $th) {

        return $this->fail('Invalid Token');

     }
 }


     public function deletedDrugList(){

        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {

            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $model = new adminModel();
            $result = $model->deletedDrugList();

            // if( $result){
            $data['deletdDrugData'] = json_encode($result);

             if($data){
                $response = [
                    'status' => 200,
                    'data' => $data
                ];
            } else{
              $response = [
                'status' => 400,
                'data' => 'No data found !'
              ]; 
            }
            // print_r($response);
            return $response;

        }catch(\Throwable $th){
            return $errorReturn = [ 'error' => 'Invalid Data.' ];
        }
     }

     public function reactiveDrug(){
        //$drugId

        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {

            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $UserName =  session()->get('username');
            $actionTime = date("m/d/Y h:i:s a", time());

            $data = array(
                'isActive' => 'Y',
                'action' => 'Re-active',
                'actionBy' => $UserName,
                'actionTime' => $actionTime
            );
            $model = new adminModel();
            $result = $model->deleteDrug($drugId,$data);

            if($result){
                        $response = [
                          'status'   => 200,
                          'error'    => null,
                          'messages' => [
                                        'success' => 'Drug Deleted Sucessfully !'
                                        ]
                        ];  
                }else{
                    $response = [
                    'status' => 400,
                    'data' => 'No data found ss!'
              ];
            }

            return $response;

        }catch(\Throwable $th){
             return $errorReturn = [ 'error' => 'Invalid Data.' ];
        }
     }

     public function updatePassword(){
        //$email,$password,$confirmpassword

        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {

            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();
       
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|regex_match[/^[a-z0-9]+$/]|regex_match[!@#$%^&*()\-_=+{};:,<.>ยง~]',
                'confirmpassword' => 'required|matches[password]'
            ];
           
            if(is_null($user)) {
                // return failNotFound('');
                $response = [
                                'error' => 'Invalid Email.',
                                'status' => 400
                             ];
            }  

            $password = md5($password);

            $data = array(
                'password' => $password
            );
            $userModel = new UserModel();
            $result = $userModel->updatePassword($email,$data);  

            if($result){
                        $response = [
                          'status'   => 200,
                          'error'    => null,
                          'messages' => [
                                        'success' => 'Password Updated Sucessfully !'
                                        ]
                        ];  
                }else{
                    $response = [
                    'status' => 400,
                    'data' => 'No data found ss!'
                  ];
                }

            return $response;

        }catch(\Throwable $th){
             return $errorReturn = [ 'error' => 'Invalid Data.' ];
        }
     }

     public function updateEmail(){
        //$username,$email,$newemail

        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {
            
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $data = date("m/d/Y h:i:s a", time());

            $data = array(
                'email' => $newemail,
                'updated_at' => $data 
            );

            $model = new UserModel();
            $result = $model->updateEmailId($username, $data);

            if($result){
                        $response = [
                          'status'   => 200,
                          'error'    => null,
                          'messages' => [
                                        'success' => 'Email Updated Sucessfully !'
                                        ]
                        ];  
            }else{
                    $response = [
                    'status' => 400,
                    'data' => 'No data found ss!'
                  ];
            }

            return $response;

        }catch(\Throwable $th){
             return $errorReturn = [ 'error' => 'Invalid Data.' ];
        }
     }

     //*************************************************************************************
     //START OPTICK ENCYCLOPEDIA SITE API
     //*************************************************************************************
     public function drugSearch($search){

        try{

            $model = new DrugDetailsModel();
            $data['tagSearchData'] = $model->getTagData($search);
            $data['drugSearchData'] = $model->getSearchDrugData($search);

            if($data){
                $response = [
                    'status' => 200,
                    'data' => $data
                ];
            } else{
              $response = [
                'status' => 400,
                'data' => 'No data found !'
              ]; 
            }
            // print_r($response);
            return $response;

        }catch(\Throwable $th){
            return $errorReturn = [ 'error' => 'Invalid Data.' ];
        }
     }

     public function drugByName($id){
        try{

            $model = new DrugDetailsModel();
            $data['drugDetailById'] = json_encode($model->getDetailsById($id));

            foreach($model->getDetailsById($id) as $row){
                $tagName = $row['tag_name'];
                $tag_nm = explode(',',$tagName);
                $tagCount = sizeof($tag_nm);
                for($i=0; $i<$tagCount; $i++){
                    // echo 'tag name ='.$tag_nm[$i];
                     $data['tag_drug_list'] = json_encode($model->getDataByTagName($tag_nm[$i]));
                     // return view('drugInfo/drug_detail_view',$data);

                     if($data){
                        $response = [
                            'status' => 200,
                            'data' => $data
                        ];
                     } else{
                        $response = [
                            'status' => 400,
                            'data' => 'No data found !'
                        ];
                     }

                     return $response;
                }
            }

        }catch(\Throwable $th){
            return $errorReturn = [ 'error' => 'Invalid Data.' ];
        }
     }

     public function databyAlpha($Alphabet){

        try{

            $model = new DrugDetailsModel();
            $data['DrugInfoByAlphabet'] = $model->drugInfoByAlpha($Alphabet);

            if($data){
                $response = [
                            'status' => 200,
                            'data' => $data
                        ];
            } else{
                $response = [
                            'status' => 400,
                            'data' => 'No data found !'
                        ];
            }

            return $response;

        } catch(\Throwable $th){
           return $errorReturn = [ 'error' => 'Invalid Data.' ]; 
        }
     }

     public function drugByTag($tagName){
        try{

            $model = new DrugDetailsModel();
            $data['tag_drug_list'] = json_encode($model->getDataByTagName($tagName));
            // print_r($data);

            $data['tagName'] = json_encode($tagName);

            if($data){
               $response = [
                            'status' => 200,
                            'data' => $data
                        ]; 
            } else{
                        $response = [
                            'status' => 400,
                            'data' => 'No data found !'
                        ];
            }

            return $response;

        } catch(\Throwable $th){
            return $errorReturn = [ 'error' => 'Invalid Data.' ]; 
        }
     }

 //     public function me() {

 //     $key = getenv('TOKEN_SECRET');

 //     $header = $this->request->getServer('HTTP_AUTHORIZATION');

 //     if(!$header) return $this->failUnauthorized('Token Required');

 //     $token = explode(' ', $header)[1];


 //     try {

 //        $decoded = JWT::decode($token, new Key($key, 'HS256'));

 //        $response = [

 //         'id' => $decoded->uid,
 //         'email' => $decoded->email
 //         ];
 //        return $this->respond($response);
 //         }catch (\Throwable $th) {

 //        return $this->fail('Invalid Token');

 //     }
 // }

}
?>
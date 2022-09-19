<?php

namespace App\Controllers;
use App\Models\DrugDetailsModel;
use App\Controllers\ServiceController;
use CodeIgniter\HTTP\Response;

use CodeIgniter\API\ResponseTrait;

class DrugController extends BaseController
{   

     use ResponseTrait;
     protected $session;

    public function index()
    {
        $model = new DrugDetailsModel();

        $data['drugDetailsOfA'] = json_encode($model->getDrugDetailOfA());
        $data['drugDetailsOfB'] = json_encode($model->getDrugDetailOfB());
        $data['drugDetailsOfC'] = json_encode($model->getDrugDetailOfC());
        $data['drugDetailsOfD'] = json_encode($model->getDrugDetailOfD());
        $data['drugDetailsOfE'] = json_encode($model->getDrugDetailOfE());
        $data['drugDetailsOfF'] = json_encode($model->getDrugDetailOfF());
        $data['drugDetailsOfG'] = json_encode($model->getDrugDetailOfG());
        $data['drugDetailsOfH'] = json_encode($model->getDrugDetailOfH());
        $data['drugDetailsOfI'] = json_encode($model->getDrugDetailOfI());
        $data['drugDetailsOfJ'] = json_encode($model->getDrugDetailOfJ());
        $data['drugDetailsOfK'] = json_encode($model->getDrugDetailOfK());
        $data['drugDetailsOfL'] = json_encode($model->getDrugDetailOfL());
        $data['drugDetailsOfM'] = json_encode($model->getDrugDetailOfM());
        $data['drugDetailsOfN'] = json_encode($model->getDrugDetailOfN());
        $data['drugDetailsOfO'] = json_encode($model->getDrugDetailOfO());
        $data['drugDetailsOfP'] = json_encode($model->getDrugDetailOfP());
        $data['drugDetailsOfQ'] = json_encode($model->getDrugDetailOfQ());
        $data['drugDetailsOfR'] = json_encode($model->getDrugDetailOfR());
        $data['drugDetailsOfS'] = json_encode($model->getDrugDetailOfS());
        $data['drugDetailsOfT'] = json_encode($model->getDrugDetailOfT());
        $data['drugDetailsOfU'] = json_encode($model->getDrugDetailOfU());
        $data['drugDetailsOfV'] = json_encode($model->getDrugDetailOfV());
        $data['drugDetailsOfW'] = json_encode($model->getDrugDetailOfW());
        $data['drugDetailsOfX'] = json_encode($model->getDrugDetailOfX());
        $data['drugDetailsOfY'] = json_encode($model->getDrugDetailOfY());
        $data['drugDetailsOfZ'] = json_encode($model->getDrugDetailOfZ());


        return view('drugInfo/drugHome',$data);
    }

    public function searchfunction()
    {  
        $flag = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);
        $search = $this->request->getVar('query') ;
        // print_r($this->request->uri->getSegments());
        // $search = $this->input->post('query');
        // $serviceController = new ServiceController();
        // $response = $serviceController->drugSearch($search);

        $model = new DrugDetailsModel();
        $data['tagSearchData'] = $model->getTagData($search);
        $data['drugSearchData'] = $model->getSearchDrugData($search);

        // $data = $response['data'];
        // print_r($data);
        if(($data['tagSearchData'] != '' || $data['drugSearchData'] != '') && ($data['tagSearchData'] != NULL || $data['drugSearchData'] != NULL)){

            if($flag == 'windows'){
                echo json_encode($data); 
            } else{
                $response = [
                        'status' => 200,
                        'error' =>null,
                        'messages' => $data
                    ];

                    // print_r($response);

                 return $this->respond($response); 
            }
        }else{

             $data = 'No Data Found !';
            if($flag == 'windows'){
                echo json_encode($data); 
            } else{
               $response = $this->genericMethod(601);
                return $this->respond($response); 
            }
        }   
        // return view('welcome_message',$data);
    }

    public function getDrugDataByName(){
        try{
            $flag = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);

            $id = ($this->request->uri->getSegments());
            $id = base64_decode($id[1]);

            // die();

            // $serviceController = new ServiceController();
            // $response = $serviceController->drugByName($id);


            $model = new DrugDetailsModel();
            $data['drugDetailById'] = json_encode($model->getDetailsById($id));
            $result = $model->getDetailsById($id);
            // print_r($data);
            // die();
            if($result != '' && $result != NULL){
            foreach($model->getDetailsById($id) as $row){
                $tagName = $row['tag_name'];
                $tag_nm = explode(',',$tagName);
                $tagCount = sizeof($tag_nm);
                for($i=0; $i<$tagCount; $i++){
                    // echo 'tag name ='.$tag_nm[$i];
                     $data['tag_drug_list'] = json_encode($model->getDataByTagName($tag_nm[$i]));
                     // return view('drugInfo/drug_detail_view',$data);

                     if(($data['tag_drug_list'] != '' && $data['tag_drug_list'] != NULL)){

                        if($flag == 'windows'){
                            return view('drugInfo/drug_detail_view',$data);
                        } else{
                           $response = [
                                            'status' => 200,
                                            'error' => null,
                                            'messages' => $data
                                        ]; 

                            return $this->respond($response);
                        }
                        
                     } else{
                         if($flag == 'windows'){

                         } else{
                             $response = $this->genericMethod(601);
                    return $this->respond($response); 
                         }
                     }

                }
            }
            }else{
               if($flag == 'windows'){

             } else{
                $response = $this->genericMethod(601);
                return $this->respond($response); 
             } 
            }
            // $data = $response['data'];
            // if($data){
            //     return view('drugInfo/drug_detail_view',$data);
            // } else{
            //     return $this->fail('Invalid Data');
            // }
            
        } catch(\Throwable $th){
            return $this->fail('Invalid Data');
        }
        
    }

    public function getSearchResult(){
        // echo 'kkkkk';
        return view('drug_search_result');
        // $this->load->views('drug_search_result');
    }
    public function showAllDrugByAlpha(){
        // $Alphabet = ($this->request->uri->getSegments()) ;
        try{
            $flag = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);

            $Alphabet = $this->request->getVar('alphabet');

            // $serviceController = new ServiceController();
            // $response = $serviceController->databyAlpha($Alphabet);

            $model = new DrugDetailsModel();
            $data['DrugInfoByAlphabet'] = $model->drugInfoByAlpha($Alphabet);

            if($data['DrugInfoByAlphabet'] != '' && $data['DrugInfoByAlphabet'] != NULL){
                if($flag == 'windows'){
                    echo json_encode($data);
                } else{
                    $response = [
                            'status' => 200,
                            'error' =>null,
                            'messages' => $data
                        ];

                    return $this->respond($response);
                }
            } else{
                if($flag == 'windows'){
                    $data = 'No Data Found !';
                    echo json_encode($data);
                } else{
                    $response = $this->genericMethod(601);
                    return $this->respond($response); 
                }
            }
            
        }catch(\Throwable $th){
            return $this->fail('Invalid Data');
        }
        
    }
    public function getDrugByTag(){
        // try{
            $flag = substr(strtolower($_SERVER["HTTP_USER_AGENT"]),13,7);

            $tagName = ($this->request->uri->getSegments()) ;
            $tagName = urldecode(base64_decode($tagName[1]));

            // echo ' $tagName=='. $tagName;

            // $serviceController = new ServiceController();
            // $response = $serviceController->drugByTag($tagName);
            $model = new DrugDetailsModel();
            $data['tag_drug_list'] = json_encode($model->getDataByTagName($tagName));
            $data['tagName'] = json_encode($tagName);
            $result = $model->getDataByTagName($tagName);
            // print_r($data);

            if ($result != '' && $result != NULL) {
                if($flag == 'windows'){
                    return view('drugInfo/tag_detail_view',$data);
                } else{
                    $response = [
                            'status' => 200,
                            'error' => null,
                            'messages' => $data
                        ];

                    return $this->respond($response); 
                }
            } else{
               if($flag == 'windows'){
                    // return view('drugInfo/tag_detail_view',$data);
                } else{
                    $response = $this->genericMethod(601);
                    return $this->respond($response); 
                } 
            }

            // if($data){
            //      return view('drugInfo/tag_detail_view',$data);
            // } else{
            //     return $this->fail('Invalid Data');
            // }

        // }catch(\Throwable $th){
        //     return $this->fail('Invalid Data');
        // }
        
    }

}

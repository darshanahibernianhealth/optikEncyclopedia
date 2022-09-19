<?php 
namespace App\Models;

use CodeIgniter\Model;

class DrugDetailsModel extends Model{
	protected $table      = 'drug';

	protected $primaryKey = 'drug_id';

	protected $returnType = 'array';

	protected $allowedFields = ['drug_id', 'drug_name'];

	public function getDrugDetailOfA() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'a%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfB() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'b%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfC() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'c%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfD() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'd%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfE() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'e%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfF() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'f%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfG() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'g%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfH() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'h%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfI() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'i%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfJ() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'j%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfK() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'k%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfL() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'l%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfM() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'm%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfN() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'n%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfO() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'o%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfP() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'p%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfQ() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'q%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfR() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'r%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfS() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 's%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfT() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 't%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfU() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'u%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfV() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'v%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfW() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'w%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfX() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'x%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfY() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'y%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    public function getDrugDetailOfZ() {
        $db = db_connect();
        $query = $db->query("select * from drug where isActive='Y' AND drug_name like 'z%' order by drug_name ASC LIMIT 0,3");
        $result = $query->getResultArray();

        return $result;    
      
    }
    //
    public function getDetailsById($drug_id){
    	$db = db_connect();
        $query = $db->query("select drug_name,drug_side_effects,tag_id,tag_name from drug as d where drug_id=$drug_id");

       $result = $query->getResultArray();

        return $result;
    }

    public function getDrugByManufacturer($manufacturer_Name){
    	
    	$db = db_connect();
        $query = $db->query("select drug_name as drug_link ,drug_id as drug_link_id from drug  
        					where manufacturer_name='$manufacturer_Name'");

        $result = $query->getResultArray();

        return $result;

        // print_r($result);
        // die();
    }
//
    public function getTagData($search_data){
    	$db = db_connect();
        $query = $db->query("select DISTINCT tag_id as id, tag as name from tag where isActive='Y' AND tag like '%$search_data%' order by tag ASC");
        $result = $query->getResultArray();

        return $result; 
        
    }
    public function getSearchDrugData($search_data){
        $db = db_connect();
        $query = $db->query("select drug_id as id, drug_name as name from drug where isActive='Y' AND drug_name like '%$search_data%' order by drug_name ASC");
        $result = $query->getResultArray();

        return $result; 
        
    }
    public function getManufacturerDetailsById($manufacturereName){
        $db = db_connect();
        $query = $db->query("select d.drug_id, d.drug_name,d.manufacturer_name,m.manufacturer_info from drug as d
                    inner join manufacturers as m ON d.manufacturer_name = m.manufacturer_Name
            where d.isActive='Y' AND d.manufacturer_name='$manufacturereName'");
        $result = $query->getResultArray();

        return $result; 
    }
    public function drugInfoByAlpha($alphabet){

        $db = db_connect();
        $query = $db->query("select drug_id as id, drug_name as name from drug where isActive='Y' AND drug_name like '$alphabet%' order by drug_name ASC");
        $result = $query->getResultArray();

        return $result;  
    }
    public function getDataByTagName($tagName){
        $db = db_connect();
        $query = $db->query("select drug_id, drug_name from drug where isActive='Y' AND tag_name like '%$tagName%' order by tag_name ASC");
        $result = $query->getResultArray();

        return $result; 
    }
}

?>
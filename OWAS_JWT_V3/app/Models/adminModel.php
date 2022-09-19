<?php
namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model{
	
	public function saveDrug($data){

		$result = $this->db
                    ->table('drug')
                    ->insert($data);

        return $result;

        // return $this->db->insert('drug',$data);
	} 
	public function saveTag($data){
		return $this->db
                    ->table('tag')
                    ->insert($data);
	}	
	//
	public function showAllDrugs(){
		$db = db_connect();
		$query = $db->query("select drug_id, drug_name,drug_side_effects ,tag_name, actionBy, actionTime,action from drug 
		 where isActive='Y' order by drug_id DESC");

		$result = $query->getResultArray();

        return $result;
	}
	public function deleteDrug($drugId,$data){
		$result1 = $this->db
                    ->table('drug')
                    ->where('drug_id', $drugId)
                    ->update($data);

        return $result1;          
	}
	public function getDrugDataById($id){
		$db = db_connect();
		$query = $db->query("select * from drug where drug_id=$id");

		$result = $query->getResultArray();

        return $result;
	}
	public function modifyDrugById($drugId,$drugData){
		$result1 = $this->db
                    ->table('drug')
                    ->where('drug_id', $drugId)
                    ->update($drugData);

        return $result1;
	}
	public function allTag($search_data){
		$db = db_connect();
		$query = $db->query("select * from tag where isActive='Y' and tag like '%$search_data%' order by tag ASC");
		// $query = $db->query("select tag_name from drug where isActive='Y' and tag_name like '%$search_data%' order by tag_name ASC");

		$result = $query->getResultArray();

        return $result;
	}
	public function getallTag(){
		$db = db_connect();
		$query = $db->query("select * from tag where isActive='Y'");

		$result = $query->getResultArray();

        return $result;
	}

	public function getTagDataByName($tagName){
		$db = db_connect();
		$query = $db->query("select * from tag where tag='$tagName'");

		$result = $query->getRowArray();

        return $result;
	}
	public function modifyTagById($id, $tag){

		 $result = $this->db
                    ->table('tag')
                    ->where('tag_id', $id)
                    ->update($tag);

		return $result;
	}
	public function deletedDrugList(){
		$db = db_connect();
		$query = $db->query("select * from drug where isActive IN('N') AND isActive NOT IN('Y') order by drug_id DESC");

		$result = $query->getResultArray();

		return $result;
	}
	public function deleteTagData($tagId,$data){
		$result1 = $this->db
                    ->table('tag')
                    ->where('tag_id', $tagId)
                    ->update($data);


        return $result1;          
	}

	public function getTotalCountOfDrug(){
		$db = db_connect();

		$drugQuery = $db->query("SELECT COUNT(*) as drugCount FROM drug WHERE isActive='Y'");
		$result1 = $drugQuery->getResultArray();

		return $result1;	
	}
	public function getTotalCountOfTag(){
		$db = db_connect();

		$tagQuery = $db->query("SELECT COUNT(*) as tagCount FROM tag WHERE isActive='Y'");
		$result2 = $tagQuery->getResultArray();

		return $result2;
	}
	public function getTotalManuOfDrug(){
		$db = db_connect();

		$manuQuery = $db->query("SELECT COUNT(*) as manufacturerCount FROM manufacturers WHERE isActive='Y'");
		$result3 = $manuQuery->getResultArray();

		return $result3;
	}
	public function getTotalDeletedDrugOfDrug(){
		$db = db_connect();

		$deletedQuery = $db->query("SELECT COUNT(*) as deleteDrugCount FROM drug WHERE isActive='N'");
		$result4 = $deletedQuery->getResultArray();

		return $result4;
	}

}
?>
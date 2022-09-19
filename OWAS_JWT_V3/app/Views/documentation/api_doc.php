<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Api Documentation</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Api Doc</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
      	<div class="card">
      		<div class="card-body">
			    <div class="all_api_list">
			    	<p>All this api's are responsible for send request and get responses from controllers by passing parameters.</p>
			    </div>
			    <section class="login">
			    <div class="login_api mt-2">
			    	<h5><strong>1) Login Api : </strong></h5>
			    </div>
			    <div class="login_api_descri">
			    	<blockquote>By using login api user can login and enter into admin panel. Following are some mandatory parameter for login api</blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>email (Required)</td>
			    				<td>string</td>
			    				<td>Enter admin valid email id, which is present in database.</td>
			    			</tr>
			    			<tr>
			    				<td>password (Required)</td>
			    				<td>string</td>
			    				<td>Enter admin valid password , do not enter invalid database.</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/login</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>
			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>
			    	<div>
			    		If email and password both are not present, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"",
	    "password":""
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 402,
    "error": "1",
    "messages": "Email and Password feild required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If email are not present, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"",
	    "password":"123456"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 400,
    "error": "1",
    "messages": "Email is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If email is not in proper format, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"John",
	    "password":"123456"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 403,
    "error": "1",
    "messages": "Invalid Email Id !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If password not enter, then following kind will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"John@gmail.com",
	    "password":""
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 405,
    "error": "1",
    "messages": "Password is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		Password length must be minimum 6 and if it is not minimum 6, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"John@gmail.com",
	    "password":"1234"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 406,
    "error": "1",
    "messages": "Password length must be minimum 6 !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If password is wrong , then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"John@gmail.com",
	    "password":"1234"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 401,
    "error": "1",
    "messages": "Invalid Password !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>
			    	<div>
			    		When all field is in correct format then user will login sucessful. 
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"john12@gmail.com",
	    "password":"1234567"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": "User login successfully !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			    </section>
			    <hr>
			   	<section class="add_drug">
			   		<div class="add_drug_title">
			   			<h5><strong>2) Add drug Api : </strong></h5>
			   		</div>
			   		<div class="add_drug_api_descri">
			    	<blockquote>By using this api can store drug/optik details in database. We store drug with there drug name, tag and side effects of this drug, and at the time of add drug we store tag automatically it check tag present in database or not if it is not present then it store or if it is already present then it will get id of particular tag. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>drug_name (Required)</td>
			    				<td>string</td>
			    				<td>Enter drug/optik name</td>
			    			</tr>
			    			<tr>
			    				<td>tag (Required)</td>
			    				<td>string</td>
			    				<td>Enter tag, can select multiple tag</td>
			    			</tr>
			    			<tr>
			    				<td>drug_side_effects (Required)</td>
			    				<td>string</td>
			    				<td>Enter drug/optik side effects.</td>
			    			</tr>
			    			<tr>
			    				<td>isActive (Required)</td>
			    				<td>string</td>
			    				<td>Enter Y it means this drug is active.</td>
			    			</tr>
			    			<tr>
			    				<td>action (Required)</td>
			    				<td>string</td>
			    				<td>Enter C it means this drug is created.</td>
			    			</tr>
			    			<tr>
			    				<td>actionBy (Required)</td>
			    				<td>string</td>
			    				<td>Enter user name.</td>
			    			</tr>
			    			<tr>
			    				<td>actionTime</td>
			    				<td>data time</td>
			    				<td>Enter current data and time, if you can not enter any date still it will take current data so no need to pass any value.</td>
			    			</tr>
			    			<tr>
			    				<td>createdAt</td>
			    				<td>data time</td>
			    				<td>Enter current data and time, if you can not enter any date still it will take current data so no need to pass any value. it showes on which data and time it created</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/createDrug</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>

			    	<div>
			    		If drug name is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_name": "",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"5213",
    "tag_name": "Amlodipine",
    "isActive": "Y",
    "action" : "C",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 501,
    "error": "1",
    "messages": "Drug name is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If tag is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_name": "amoxilin",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"5213",
    "tag_name": "",
    "isActive": "Y",
    "action" : "C",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 502,
    "error": "1",
    "messages": "Tag is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If isActive is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_name": "amoxilin",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"5213",
    "tag_name": "Amlodipine",
    "isActive": "",
    "action" : "C",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 505,
    "error": "1",
    "messages": "isActive is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    		<div>
			    		If action is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_name": "amoxilin",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"5213",
    "tag_name": "Amlodipine",
    "isActive": "Y",
    "action" : "",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 504,
    "error": "1",
    "messages": "Action is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	 <div>
			    		If actionBy is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_name": "amoxilin",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"5213",
    "tag_name": "Amlodipine",
    "isActive": "Y",
    "action" : "C",
    "actionBy":""
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 503,
    "error": "1",
    "messages": "Actionby is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>


			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>
			    	<div>
			    		If all required fields are present in proper format then will get sucess response.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_name": "test_abc2",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"5213",
    "tag_name": "Amlodipine",
    "isActive": "Y",
    "action" : "C",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": "Drug created successfully !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			   	</section>
			   	<hr>
			   	<section class="edit_drug">
			   		<div class="edit_drug_title">
			   			<h5><strong>3) edit drug Api : </strong></h5>
			   		</div>
			   		<div class="add_drug_api_descri">
			    	<blockquote>By using this api can edit drug/optik details in database. We edit drug by drug id, and we can edit drug/optik name , tag and side effects of this drug, and at the time of edit drug we store tag automatically it check tag present in database or not if it is not present then it store or if it is already present then it will get id of particular tag. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>drug_id (Required)</td>
			    				<td>int</td>
			    				<td>Enter drug/optik id</td>
			    			</tr>
			    			<tr>
			    				<td>drug_name (Required)</td>
			    				<td>string</td>
			    				<td>Enter drug/optik name</td>
			    			</tr>
			    			<tr>
			    				<td>tag (Required)</td>
			    				<td>string</td>
			    				<td>Enter tag, can select multiple tag</td>
			    			</tr>
			    			<tr>
			    				<td>drug_side_effects (Required)</td>
			    				<td>string</td>
			    				<td>Enter drug/optik side effects.</td>
			    			</tr>
			    			<tr>
			    				<td>isActive (Required)</td>
			    				<td>string</td>
			    				<td>Enter Y it means this drug is active.</td>
			    			</tr>
			    			<tr>
			    				<td>action (Required)</td>
			    				<td>string</td>
			    				<td>Enter E it means this drug is edited.</td>
			    			</tr>
			    			<tr>
			    				<td>actionBy (Required)</td>
			    				<td>string</td>
			    				<td>Enter user name.</td>
			    			</tr>
			    			<tr>
			    				<td>actionTime</td>
			    				<td>data time</td>
			    				<td>Enter current data and time, if you can not enter any date still it will take current data so no need to pass any value.</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/modifyDrug</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>

			    	<div>
			    		If drug id is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"",
    "drug_name": "candid lotion",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"",
    "tag_name": "candid",
    "isActive": "Y",
    "action" : "E",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 506,
    "error": "1",
    "messages": "Drug id is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>


			    	<div>
			    		If drug name is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"108",
    "drug_name": "",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"",
    "tag_name": "candid",
    "isActive": "Y",
    "action" : "E",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 501,
    "error": "1",
    "messages": "Drug name is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If tag is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"108",
    "drug_name": "candid lotion",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"",
    "tag_name": "",
    "isActive": "Y",
    "action" : "E",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 502,
    "error": "1",
    "messages": "Tag is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If isActive is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"108",
    "drug_name": "candid lotion",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"",
    "tag_name": "candid",
    "isActive": "",
    "action" : "E",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 505,
    "error": "1",
    "messages": "isActive is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If action is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"108",
    "drug_name": "candid lotion",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"",
    "tag_name": "",
    "isActive": "Y",
    "action" : "",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 504,
    "error": "1",
    "messages": "Action is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	 <div>
			    		If actionBy is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"108",
    "drug_name": "candid lotion",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"",
    "tag_name": "",
    "isActive": "Y",
    "action" : "E",
    "actionBy":""
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 503,
    "error": "1",
    "messages": "Actionby is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>



			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>


			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"108",
    "drug_name": "candid lotion",
    "drug_side_effects": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "tag_id":"",
    "tag_name": "candid",
    "isActive": "Y",
    "action" : "E",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": "Drug Edited successfully !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			   	</section>
			   	<hr>
			   	<section class="show_drug">
			   		<div class="show_drug_title">
			   			<h5><strong>4) show all drug Api : </strong></h5>
			   		</div>
			   		<div class="add_drug_api_descri">
			    	<blockquote>By using this api will get all drug/optik which is present in database and who's drug active status is Y this drug get in response. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : GET</li>
				    		<li>Parameters : No need to pass any parameter for this</li>
				    	</ul>
			    	</div>
			    	
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/showDrugList</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>
			    		<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>

			    	<div>
			    		If data is not available for this api, then it will generate following response.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					<br>
			    					No need to pass any request for this, just pass api and click on send button will get response. 
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 601,
    "error": "1",
    "messages": "No Data Found !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>

			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					<br>
			    					No need to pass any request for this, just pass api and click on send button will get response. 
			    				</div>
			    			</div>
			    		</div>
			    	
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": {
        "showalldrug": "[{\"drug_id\":\"101\",\"drug_name\":\"test_abc2\",\"drug_side_effects\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"tag_name\":\"Amlodipine\",\"actionBy\":\"john\",\"actionTime\":\"09\/05\/2022 08:47:25 am\",\"action\":\"C\"}]"
    }
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			   	</section>
			   	<hr>
			   	<section class="delete_api">
				  	<div class="delete_drug_title">
						<h5><strong>5) delete drug Api : </strong></h5>
					</div>
					 		<div class="add_drug_api_descri">
			    	<blockquote>By using this api can delete drug/optik this a soft delete, it means when you want to delete any drug then isActive status will change from Y to N.</blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>drug_id (Required)</td>
			    				<td>int</td>
			    				<td>Enter drug/optik id</td>
			    			</tr>
			    			<tr>
			    				<td>isActive (Required)</td>
			    				<td>string</td>
			    				<td>Enter N it means this drug is deleted. it's soft delete</td>
			    			</tr>
			    			<tr>
			    				<td>action (Required)</td>
			    				<td>string</td>
			    				<td>Enter D it means this drug is deleted.</td>
			    			</tr>
			    			<tr>
			    				<td>actionBy (Required)</td>
			    				<td>string</td>
			    				<td>Enter user name.</td>
			    			</tr>
			    			<tr>
			    				<td>actionTime</td>
			    				<td>data time</td>
			    				<td>Enter current data and time, if you can not enter any date still it will take current data so no need to pass any value.</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/deleteDrug</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>

			    	<div>
			    		If drug id is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"",
    "isActive":"N",
    "action":"D",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 506,
    "error": "1",
    "messages": "Drug id is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>


			    	<div>
			    		If isActive is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"99",
    "isActive":"",
    "action":"D",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 505,
    "error": "1",
    "messages": "isActive is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If action is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
   "drug_id":"99",
    "isActive":"N",
    "action":"",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 504,
    "error": "1",
    "messages": "Action is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	 <div>
			    		If actionBy is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
   "drug_id":"99",
    "isActive":"N",
    "action":"D",
    "actionBy":""
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 503,
    "error": "1",
    "messages": "Actionby is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>


			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
   "drug_id":"99",
    "isActive":"N",
    "action":"D",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": "Drug Deleted successfully !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				 <hr>
				 <section class="deleted_drug_list_api">
				 	<div class="delete_drug_title">
						<h5><strong>6) deleted drug list Api : </strong></h5>
					</div>
					<div class="delete_drug_list_api_descri">
			    	<blockquote>By using this api will get all deleted drug/optik which is present in database and who's drug active status is N this drug get in response. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : GET</li>
				    		<li>Parameters : No need to pass any parameter for this</li>
				    	</ul>
			    	</div>
			    	
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/showAllDeletedDrugData</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>
			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>

			    	<div>
			    		If data is not available for this api, then it will generate following response.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					<br>
			    					No need to pass any request for this, just pass api and click on send button will get response. 
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 601,
    "error": "1",
    "messages": "No Data Found !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>

			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					<br>
			    					No need to pass any request for this, just pass api and click on send button will get response. 
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": {
        "deletdDrugData": "[{\"drug_id\":\"101\",\"drug_name\":\"test_abc2\",\"drug_side_effects\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"isActive\":\"N\",\"tag_id\":\"5213\",\"tag_name\":\"Amlodipine\",\"action\":\"D\",\"actionBy\":\"john\",\"actionTime\":\"09\/05\/2022 09:58:38 am\",\"createdAt\":\"09\/05\/2022 08:47:25 am\"}]"
    }
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				 <hr>
				 <section class="reactive_drug">
				 	<div class="reactive_drug_title">
						<h5><strong>7) reactive drug Api : </strong></h5>
					</div>
						 		<div class="add_drug_api_descri">
			    	<blockquote>By using this api can delete drug/optik this a soft delete, it means when you want to delete any drug then isActive status will change from Y to N.</blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>drug_id (Required)</td>
			    				<td>int</td>
			    				<td>Enter drug/optik id</td>
			    			</tr>
			    			<tr>
			    				<td>isActive (Required)</td>
			    				<td>string</td>
			    				<td>Update value of isActive N to Y means it re-activate drug which is deleted</td>
			    			</tr>
			    			<tr>
			    				<td>action (Required)</td>
			    				<td>string</td>
			    				<td>Enter Re-active it means this drug is re-activated.</td>
			    			</tr>
			    			<tr>
			    				<td>actionBy (Required)</td>
			    				<td>string</td>
			    				<td>Enter user name.</td>
			    			</tr>
			    			<tr>
			    				<td>actionTime</td>
			    				<td>data time</td>
			    				<td>Enter current data and time, if you can not enter any date still it will take current data so no need to pass any value.</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/reactiveDrugById</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>

			    	<div>
			    		If drug id is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"",
    "isActive":"Y",
    "action":"Re-active",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 506,
    "error": "1",
    "messages": "Drug id is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>


			    	<div>
			    		If isActive is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"101",
    "isActive":"",
    "action":"Re-active",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 505,
    "error": "1",
    "messages": "isActive is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div>
			    		If action is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"101",
    "isActive":"Y",
    "action":"",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 504,
    "error": "1",
    "messages": "Action is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	 <div>
			    		If actionBy is not present then, following error will generated.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"101",
    "isActive":"Y",
    "action":"Re-active",
    "actionBy":""
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 503,
    "error": "1",
    "messages": "Actionby is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>


			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>


			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "drug_id":"101",
    "isActive":"Y",
    "action":"Re-active",
    "actionBy":"john"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": "Drug Re-Activate Sucessfully !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				 <hr>
				 <section class="searchFunctionApi">
				 	<div class="search_drug_title">
						<h5><strong>8) search drug Api : </strong></h5>
					</div>
					<div class="add_drug_api_descri">
			    	<blockquote>By using this api can search drug/optik by search box. we can search by tag also.</blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>query (Required)</td>
			    				<td>string</td>
			    				<td>Enter drug/optik name or tag</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/searchfunction</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>
			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>
			    	<div>
			    		If do not have any data for particular search query, then following response will generate
			    	</div>

			    	    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "query" : "qw"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 601,
    "error": "1",
    "messages": "No Data Found !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			
			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "query" : "a"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
     "status": 200,
    "error": null,
    "messages": {
        "tagSearchData": [
            {
                "id": "5172",
                "name": "A"
            },
            {
                "id": "5213",
                "name": "Amlodipine"
            },
            {
                "id": "5205",
                "name": "amoxilin"
            },
            {
                "id": "5208",
                "name": "dvitamin"
            },
            {
                "id": "5161",
                "name": "paracetemol"
            },
            {
                "id": "5210",
                "name": "tabst"
            },
            {
                "id": "5198",
                "name": "tag"
            },
            {
                "id": "5164",
                "name": "tag1"
            },
            {
                "id": "5203",
                "name": "tag3"
            },
            {
                "id": "5211",
                "name": "tga"
            },
            {
                "id": "5207",
                "name": "vitamin"
            }
        ],
        "drugSearchData": [
            {
                "id": "86",
                "name": "amoxilin 100mg"
            },
            {
                "id": "54",
                "name": "amoxilin 500mg"
            },
            {
                "id": "65",
                "name": "Becosules Capsule 20's"
            },
            {
                "id": "52",
                "name": "Limcee Vitamin Cba"
            },
            {
                "id": "82",
                "name": "Limcee Vitamin Cba"
            },
            {
                "id": "66",
                "name": "Maxtra"
            },
            {
                "id": "55",
                "name": "Omi D 10mg/20mg Tablet"
            },
            {
                "id": "70",
                "name": "PAN 40 Tablet"
            },
            {
                "id": "90",
                "name": "stamlo"
            },
            {
                "id": "101",
                "name": "test_abc2"
            },
            {
                "id": "88",
                "name": "vitamin c"
            },
            {
                "id": "89",
                "name": "vitamin d"
            }
        ]
    }
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				 <hr>
				 <section class="show_drug_by_alpha_api">
				 	<div class="show_drug_by_alpha_title">
						<h5><strong>9) show all drug by alphabet Api : </strong></h5>
					</div>
							<div class="add_drug_api_descri">
			    	<blockquote>By using this api can get all drug/optik which is start with particular alphabet. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>alphabet (Required)</td>
			    				<td>string</td>
			    				<td>Enter drug/optik alphabet</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/showAllDrugByAlpha</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>
			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>
			    	<div>
			    		If do not have any data for particular search query, then following response will generate
			    	</div>

			    	    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "query" : "z"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 601,
    "error": "1",
    "messages": "No Data Found !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			
			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>
	
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "alphabet" : "b"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": {
        "DrugInfoByAlphabet": [
            {
                "id": "65",
                "name": "Becosules Capsule 20's"
            }
        ]
    }
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				 <hr>
				 <section class="drug_by_name_api">
				 	<div class="show_drug_by_alpha_title">
						<h5><strong>10) show drug by name Api : </strong></h5>
					</div>
					<div class="add_drug_api_descri">
			    	<blockquote>By using this api can get drug/optik by its name. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : GET</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/drugdatabyname/bm5u</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>
			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>
			    	<div>
			    		If do not have any data for particular request , then following response will generate
			    	</div>

			    	    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					no need to pass any value by JSON becuase we pass id from header,
			    					we have to pass id in encrypted format
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 601,
    "error": "1",
    "messages": "No Data Found !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			
			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>
	
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					no need to pass any value by JSON becuase we pass id from header,
			    					we have to pass id in encrypted format
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": {
        "drugDetailById": "[{\"drug_name\":\"amoxilin 500mg\",\"drug_side_effects\":\"ASDFGHJQASDFGHJK#s#Lorem ipsum dolor sit amet, con...\",\"tag_id\":\"30\",\"tag_name\":\"amoxilin\"}]",
        "tag_drug_list": "[{\"drug_id\":\"52\",\"drug_name\":\"Limcee Vitamin Cba\"},{\"drug_id\":\"54\",\"drug_name\":\"amoxilin 500mg\"},{\"drug_id\":\"70\",\"drug_name\":\"PAN 40 Tablet\"},{\"drug_id\":\"86\",\"drug_name\":\"amoxilin 100mg\"},{\"drug_id\":\"87\",\"drug_name\":\"dolo\"},{\"drug_id\":\"90\",\"drug_name\":\"stamlo\"},{\"drug_id\":\"53\",\"drug_name\":\"wikoril 1\"},{\"drug_id\":\"89\",\"drug_name\":\"vitamin d\"}]"
    }
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				 <hr>
				 <section class="drugs_by_tag_api">
				 	<div class="show_drug_by_tag_title">
						<h5><strong>11) show drug by tag Api : </strong></h5>
					</div>
							<div class="add_drug_api_descri">
			    	<blockquote>By using this api can get drug/optik by its name. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : GET</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/getDrugByTag/NTI=</li>
			    			pass this link in postman so can check api properly , tag is a parameter pass by header
			    		</ul>
			    	</div>
			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>
			    	<div>
			    		If do not have any data for particular request , then following response will generate
			    	</div>

			    	    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					no need to pass any value by JSON becuase we pass tag from header,
			    					we have to pass tag in encrypted format
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 601,
    "error": "1",
    "messages": "No Data Found !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			
			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>
	
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
			    					no need to pass any value by JSON becuase we pass tag from header
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": {
        "tag_drug_list": "[{\"drug_id\":\"87\",\"drug_name\":\"dolo\"},{\"drug_id\":\"82\",\"drug_name\":\"Limcee Vitamin Cba\"}]",
        "tagName": "\"tag\""
    }
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				 <hr>
				 <section class="forgotpassword_api">
				 	<div class="show_drug_by_tag_title">
						<h5><strong>12) forgot password Api : </strong></h5>
					</div>
							<div class="add_drug_api_descri">
			    	<blockquote>By using this api can change user password. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>email (Required)</td>
			    				<td>string</td>
			    				<td>Enter user email id</td>
			    			</tr>
			    			<tr>
			    				<td>password (Required)</td>
			    				<td>string</td>
			    				<td>Enter password</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/forgotpassword</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>
			    	<div>
			    		If email and password both are not present, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"",
	    "password":""
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 402,
    "error": "1",
    "messages": "Email and Password feild required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If email are not present, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"",
	    "password":"123456"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 400,
    "error": "1",
    "messages": "Email is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If email is not in proper format, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"John",
	    "password":"123456"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 403,
    "error": "1",
    "messages": "Invalid Email Id !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If password not enter, then following kind will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"John@gmail.com",
	    "password":""
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 405,
    "error": "1",
    "messages": "Password is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		Password length must be minimum 6 and if it is not minimum 6, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
	{
	    "email":"John@gmail.com",
	    "password":"1234"
	}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 406,
    "error": "1",
    "messages": "Password length must be minimum 6 !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>

			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "email":"john96@gmail.com",
    "password":"12345678"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": "Password Updated Sucessfully !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
				  <hr>
				 <section class="forgotpassword_api">
				 	<div class="show_drug_by_tag_title">
						<h5><strong>13) change email Api : </strong></h5>
					</div>
							<div class="add_drug_api_descri">
			    	<blockquote>By using this api can change user email id. </blockquote>
			    	<div>
				    	<ul>
				    		<li>Method : POST</li>
				    		<li>Parameters :</li>
				    	</ul>
			    	</div>
			    	<div class="table">
			    		<table width="100%" cellpadding="0" cellspacing="0">
			    			<tr>
			    				<th>Field</th>
			    				<th>Type</th>
			    				<th>Description</th>
			    			</tr>
			    			<tr>
			    				<td>username (Required)</td>
			    				<td>string</td>
			    				<td>Enter password</td>
			    			</tr>
			    			<tr>
			    				<td>email (Required)</td>
			    				<td>string</td>
			    				<td>Enter user email id</td>
			    			</tr>
			    		</table>
			    	</div>
			    	<div>
			    		<ul>
			    			<li>URL : <?php echo base_url();?>/ChangeEmailId</li>
			    			pass this link in postman so can check api properly
			    		</ul>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-red" style="vertical-align: middle;">
			    			<p>Error Responses</p>
			    		</div>
			    	</div>
			    	<div>
			    		If user name is wrong, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "username":"joh12",
    "email":"john9496@gmail.com"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 407,
    "error": "1",
    "messages": "User not exist!"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If email are not present, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "username":"john",
    "email":""
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 400,
    "error": "1",
    "messages": "Email is required !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div>
			    		If email is not in proper format, then following error will generate.
			    	</div>
			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "username":"john",
    "email":"john9496"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 403,
    "error": "1",
    "messages": "Invalid Email Id !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>

			    	<div class="row mb-2">
			    		<div class="col-12 bg-green" style="vertical-align: middle;">
			    			<p>Sucess Response</p>
			    		</div>
			    	</div>

			    	<div class="row">
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of request 
<pre>
{
    "username":"john",
    "email":"john9496@gmail.com"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-6 overflow-auto">
			    			<div class="card overflow-auto" style="height: 190px;">
			    				<div class="card-body">
			    					This is JSON format of response 
<pre>
{
    "status": 200,
    "error": null,
    "messages": "Email Updated Sucessfully !"
}
</pre>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
				 </section>
	    	</div>
      	</div>
      </div>
  </section>
  <hr>
  
</div>
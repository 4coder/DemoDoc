<?php
include_once "class.smtp.php";
include_once "class.phpmailer.php";
class mysqldb{

	function __construct(){
		//if db connection not exist, it will create aq new connection "con" 
		if (!$this->db){
		$this->db = new ezSQL_mysql(dbusername,dbpassword,dbname,host);
	 }
	
	}
	function AppoinmentCount($doctor_id){
     try
     {
      
      $sql = "SELECT doctor_id, count(doctor_id) from `" . DB_PREFIX . "doctor_appointments` WHERE `doctor_id`='".$doctor_id."'GROUP BY doctor_id";   
        return $this->db->get_results($sql,ARRAY_A);
  }
  catch(Exception $e)
  {
   echo $e->getMessage();
  }
 }
	function getDownload($userid){
  try 
  {
   $sql = "SELECT * FROM `" . DB_PREFIX . "checkin` WHERE `apnt_id`='".$userid."'"; 
   return $this->db->get_row($sql,ARRAY_A);
  }
  catch(Exception $e)
  {
   echo $e->getMessage();
  }
 }
	function listbox($table,$key,$val,$condition=NULL,$order=NULL,$selected=NULL)
	{
		try 
		{
			$condition = ($condition<>"" ) ?  "AND $condition " : "";
			$order = ($order<>"" ) ?  "ORDER BY  $order " : "";
		    $sql ="SELECT $key,$val FROM `" . DB_PREFIX . "$table` WHERE 1 $condition $order";
			$res = $this->db->get_results($sql,ARRAY_A);
			foreach($res as $keys=>$value)
			{
				//echo $selected == $keys;
				$select = ($selected == $value[$key]) ? "selected='selected'" : "" ;
				$values.= "<option value='".$value[$key]."' $select>$value[$val]</value><br>";
			}
			echo $values;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function userExistancy($email){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE `email`='".$email."'";			
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function userDeatails($email,$password){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE `email`='".$email."' AND `password`='".md5($password)."'";			
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getUserDetails($userID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE `id`='".$userID."'";			
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
function getAlpha($userID){
		try 
		{
			$sql = "SELECT id,firstname,lastname,address FROM `" . DB_PREFIX . "users` WHERE `usertype`='1' and firstname like '".$userID."%'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	
function getAlpha1($userID,$start,$end){
		try 
		{
			$sql = "SELECT id,firstname,lastname,address FROM `" . DB_PREFIX . "users` WHERE `usertype`='1' and firstname like '".$userID."%' LIMIT ".$start." , ".$end."";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	
	function getSpecl($userID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "reasonforvisit` WHERE  name like '".$userID."%'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	
function getSpecl1($userID,$start,$end){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "reasonforvisit` WHERE  name like '".$userID."%' LIMIT ".$start." , ".$end."";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getLang($userID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "languages` WHERE  name like '".$userID."%'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	
function getLang1($userID,$start,$end){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "languages` WHERE  name like '".$userID."%' LIMIT ".$start." , ".$end."";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	
	
	
	
	function getInsura($userID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "insurance` WHERE  name like '".$userID."%'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	
function getInsura1($userID,$start,$end){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "insurance` WHERE  name like '".$userID."%' LIMIT ".$start." , ".$end."";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	
	function getloca($userID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "location` WHERE  name_location like '".$userID."%'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	
function getloca1($userID,$start,$end){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "location` WHERE  name_location like '%".$userID."%' LIMIT ".$start." , ".$end."";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	
	function getDocid(){
		try 
		{
			//$sql = "SELECT * FROM `" . DB_PREFIX . "languages` WHERE  name like '".$userID."%'";	
			$sql = "SELECT A.`doctor_id` as doc_id,B.id FROM `" . DB_PREFIX . "ratings` A,`" . DB_PREFIX . "users` B WHERE A.`date` BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() AND A.`doctor_id`=B.`id` group by B.`id`";		
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getDocidLimit($start,$end){
		try 
		{
			//$sql = "SELECT * FROM `" . DB_PREFIX . "languages` WHERE  name like '".$userID."%'";	
			$sql = "SELECT A.`doctor_id` as doc_id,B.id FROM `" . DB_PREFIX . "ratings` A,`" . DB_PREFIX . "users` B WHERE A.`date` BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() AND A.`doctor_id`=B.`id` group by B.`id` LIMIT ".$start." , ".$end."";		
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getRatingCount($userID){
		try 
		{
			$sql = "SELECT count(doctor_id) as reviewCount FROM `" . DB_PREFIX . "ratings` WHERE `doctor_id`='".$userID."'";			
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getAppointmentDetails($userID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "doctor_appointments` WHERE `doctor_id`='".$userID."'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getApntDetails($userID,$date,$time,$pant_id){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "doctor_appointments` WHERE `doctor_id`='".$userID."' and `apnt_date`='".$date."' and `apnt_starttime`='".$time."' and `patient_id`='".$pant_id."'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	function searchDoctor($speciality=NULL,$zip=NULL,$insuracePlan=NULL,$subInsurance=NULL,$srchReason=NULL,$language=NULL,$gender=NULL){
		try 
		{
			//echo $gender;
			//echo $speciality."--".$zip."--".$insuracePlan."--".$subInsurance."--".$language."--".$gender;
			$cond = "";
			$sql = "";
			if($speciality){
				/*$cond .= "       AND SPL.`id` = DSPL.`speciality_id` ";
				$cond .= "       AND USR.`id` = DSPL.`doctor_id` ";	*/	
				$cond .= "       AND SPL.`id` = '".$speciality."' ";
			}
			if($zip){
		$zipstart=$zip;
		$zipend=$zip+200;
				$cond .= "       AND USR.`zipcode` BETWEEN ".$zipstart." and ".$zipend."";
			}
			else{
				$zip=33324;
				$zipstart=$zip;
		$zipend=$zip+200;
				$cond .= "       AND USR.`zipcode` BETWEEN ".$zipstart." and ".$zipend."";
				}
			if($insuracePlan){				
				$cond .= "       AND DINS.`insurance_id` = '".$insuracePlan."'";
				$cond .= "       AND DINS.`sub_insurance_id` = '".$subInsurance."'";
			}
			if($language){
				$cond .= "       AND USR.`id` = (SELECT `doctor_id`       FROM   `" . DB_PREFIX . "doctor_languages`         WHERE  `language_id` = '$language'           ) ";
			}
			if($gender == 1 || $gender == 2){
				$cond .= "       AND USR.`gender` = '".$gender."' ";
			}
			if($srchReason){
				$cond .= "       AND USR.`id` = (SELECT `doctor_id`       FROM   `" . DB_PREFIX . "doctor_speciality`         WHERE  `speciality_id` = '$srchReason'           ) ";
			}
			$sql .= "SELECT USR.`id` AS doctorID, ";
			$sql .= "       USR.`firstname`, ";
			$sql .= "       USR.`lastname`, ";
			$sql .= "       USR.`address`, ";
			$sql .= "       USR.`zipcode`, ";
			$sql .= "       USR.`description`, ";
			$sql .= "       SPL.`id`                         AS specilaityID, ";
			$sql .= "       SPL.`name`                       AS specilaityName, ";
			//$sql .= "       DSPL.`speciality_id`             AS doctor_specilaityID, ";
			$sql .= "       (SELECT `name` ";
			$sql .= "        FROM   `" . DB_PREFIX . "userimages` ";
			$sql .= "        WHERE  `user_id` = USR.`id` ";
			$sql .= "               AND `set_profile` = '1') AS imageName, ";
			$sql .= "       DINS.`insurance_id`              AS insuranceID, ";
			$sql .= "       DINS.`sub_insurance_id`          AS subInsuranceID ";
			$sql .= "FROM   `" . DB_PREFIX . "users` USR, ";
			$sql .= "       `" . DB_PREFIX . "speciality` SPL, ";
			//$sql .= "       `" . DB_PREFIX . "doctor_speciality` DSPL, ";
			$sql .= "       `" . DB_PREFIX . "doctor_insurance` DINS ";
			$sql .= "WHERE  USR.`usertype` = 1 ";
			$cond .= "       AND SPL.`id` = USR.`speciality` ";
			$sql .= $cond;
			$sql .= " GROUP  BY USR.`id` " ;	
			//echo $sql;exit;
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}	
	}
	function userCount(){
			try 
		{
			$sql = "SELECT Count(*) * FROM `" . DB_PREFIX . "users` WHERE `usertype`='1'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		}
		
		function getUpcomingEvents($id,$date){
			try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "doctor_appointments` WHERE `status`='1' and patient_id=".$id." and apnt_date >='".$date."'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		}
		
	function searchDoctorLimit($speciality=NULL,$zip=NULL,$insuracePlan=NULL,$subInsurance=NULL,$srchReason=NULL,$language=NULL,$gender=NULL,$start,$perpage){
		try 
		{
			//echo $speciality."--".$zip."--".$insuracePlan."--".$subInsurance."--".$language."--".$gender;
			$cond = "";
			$sql = "";
			if($speciality){
				/*$cond .= "       AND SPL.`id` = DSPL.`speciality_id` ";
				$cond .= "       AND USR.`id` = DSPL.`doctor_id` ";	*/	
				$cond .= "       AND SPL.`id` = '".$speciality."' ";
			}
			if($zip){
		$zipstart=$zip;
		$zipend=$zip+200;
				$cond .= "       AND USR.`zipcode` BETWEEN ".$zipstart." and ".$zipend."";
			}
			else{
				$zip=33324;
				$zipstart=$zip;
		$zipend=$zip+200;
				$cond .= "       AND USR.`zipcode` BETWEEN ".$zipstart." and ".$zipend."";
				}
			if($insuracePlan){				
				$cond .= "       AND DINS.`insurance_id` = '".$insuracePlan."'";
				$cond .= "       AND DINS.`sub_insurance_id` = '".$subInsurance."'";
			}
			if($language){
				$cond .= "       AND USR.`id` in (SELECT `doctor_id`       FROM   `" . DB_PREFIX . "doctor_languages`         WHERE  `language_id` = '$language'             ) ";
			}
			/*if($srchReason){
				$cond .= "       AND USR.`id` = (SELECT `speciality_id`       FROM   `" . DB_PREFIX . "speciality_id`         WHERE  `id` = '$srchReason'           ) ";
			}*/
			if($gender){
				$cond .= "       AND USR.`gender` = '".$gender."' ";
			}
			$sql .= "SELECT USR.`id` AS doctorID, ";
			$sql .= "       USR.`firstname`, ";
			$sql .= "       USR.`lastname`, ";
			$sql .= "       USR.`address`, ";
			$sql .= "       USR.`zipcode`, ";
			$sql .= "       USR.`description`, ";
			$sql .= "       SPL.`id`                         AS specilaityID, ";
			$sql .= "       SPL.`name`                       AS specilaityName, ";
			//$sql .= "       DSPL.`speciality_id`             AS doctor_specilaityID, ";
			$sql .= "       (SELECT `name` ";
			$sql .= "        FROM   `" . DB_PREFIX . "userimages` ";
			$sql .= "        WHERE  `user_id` = USR.`id` ";
			$sql .= "               AND `set_profile` = '1') AS imageName, ";
			$sql .= "       DINS.`insurance_id`              AS insuranceID, ";
			$sql .= "       DINS.`sub_insurance_id`          AS subInsuranceID ";
			$sql .= "FROM   `" . DB_PREFIX . "users` USR, ";
			$sql .= "       `" . DB_PREFIX . "speciality` SPL, ";
			//$sql .= "       `" . DB_PREFIX . "doctor_speciality` DSPL, ";
			$sql .= "       `" . DB_PREFIX . "doctor_insurance` DINS ";
			$sql .= "WHERE  USR.`usertype` = 1 ";
			$cond .= "       AND SPL.`id` = USR.`speciality` ";
			$sql .= $cond;
			$sql .= " GROUP  BY USR.`id` ORDER BY `USR`.`id` ASC  LIMIT ".$start." , ".$perpage."" ;	
			//echo $sql;exit;
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}	
	}
	function getSpeciality($specilaityID){
		try 
		{
			$sql = "SELECT `name` FROM `" . DB_PREFIX . "speciality` WHERE `id`='".$specilaityID."'";			
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	
	function getDocProImg($specilaityID){
		try 
		{
			$sql = "SELECT `name` FROM `" . DB_PREFIX . "userimages` WHERE `user_id`='".$specilaityID."' and `set_profile`=1";		
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getImages($doctorID){
		try 
		{
			$sql = "SELECT `id`,`name`,`type`,`set_profile` FROM `" . DB_PREFIX . "userimages` WHERE `user_id`='".$doctorID."' ORDER BY `set_profile` DESC";	
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getDoctorEvents($doctorID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "doctor_appointments` WHERE `doctor_id`='".$doctorID."'";	
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	

	function getratingDetails($useridf){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "ratings` WHERE `doctor_id`='".$useridf."'";	
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getDoctorMarker($doctorID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE `usertype`='".$doctorID."'";	
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getDisplayEvents($apntID,$doctorID,$patientID){
	
	try 
	{
		$sql = "SELECT APNT.id AS apntID,APNT.apnt_note AS notes,APNT.status,APNT.apnt_starttime AS apntStart,APNT.apnt_endtime AS apntEnd,APNT.apnt_date AS apntDate,USR.firstname AS patFname,USR.lastname AS patLname,USR.email AS Email,USR.phone AS phone
FROM `scad_doctor_appointments` APNT,`scad_users` USR WHERE APNT.`patient_id`=USR.`id` AND APNT.id='".$apntID."' AND APNT.`doctor_id`='".$doctorID."' AND APNT.`patient_id` = '".$patientID."'";	
		return $this->db->get_row($sql,ARRAY_A);
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
	
	
	}
	function mailSending($toMail,$toName,$subject,$mailTemplate){
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->Host = 'mail.techware.co.in';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = MAIL_USERNAME;
		$mail->Password = MAIL_PASSWORD;
		$mail->setFrom(FROM_ADDRESS, FROM_NAME);
		//$mail->addReplyTo('aneesh@techware.co.in', 'Test NameReply');
		$mail->addAddress($toMail,$toName);
		$mail->Subject = $subject;
		$mail->msgHTML($mailTemplate);
		//$mail->AltBody = 'This is a plain-text message body';
		echo $mail->send();	
	}
	//arun code begin
		function getDoctorImages($tbname,$where)
	{
		try
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "$tbname` WHERE $where";
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function checkProfileImageExist($tbname,$where)
	{
		try
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "$tbname` WHERE $where";
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	//code end
	
	function listbox_data($table,$key,$val,$condition=NULL,$order=NULL,$selected=NULL)
	{
		try 
		{	
			$condition = ($condition<>"" ) ?  "AND $condition " : "";
			$order = ($order<>"" ) ?  "ORDER BY  $order " : "";
			$sql ="SELECT $key,$val FROM $table WHERE 1 $condition ";
			$res = $this->db->get_results($sql,ARRAY_A);
			foreach($res as $keys=>$value){
				$values[]= array('id'=>$value[$val],'name'=>$value[$key]);					
			}
			return $values;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function escape($string){ 
		/* if(get_magic_quotes_runtime()) $string = stripslashes($string); 
		return @mysql_real_escape_string($string);  */
		return $string;
	}
	
	function multiListbox($table,$key,$val,$condition=NULL,$order=NULL,$selected_array=NULL)
	{

		try
		{
			//multiListbox
			$condition = ($condition<>"" ) ?  "AND $condition " : "";
			$order = ($order<>"" ) ?  "ORDER BY  $order " : "";
			$sql ="SELECT $key,$val FROM $table WHERE 1 $condition ";
			$res = $this->db->get_results($sql,ARRAY_A);
			if($res)
			{
				foreach($res as $keys=>$value)
				{
					$select = (in_array($value[$val],$selected_array)) ? "selected='selected'" : "" ;
					$values.= "<option value='".$value[$val]."' $select>$value[$key]</value><br>";
					//$values .= $value[$val].$value[$key]."<br>";
				}
			}
			echo $values;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function selectsinglerow($param)
	{
		try
		{
			$sql = "SELECT party_id FROM party WHERE party_email = '".$param."'";
			return $this->db->get_row($sql);	
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getPartyDetails($party_id)
	{
		try
		{
			$sql = "SELECT pty.party_id, usr.username AS party_email, party_name, prsn.person_type  FROM  user usr  LEFT JOIN  party pty ON(usr.party_id=pty.party_id)  LEFT JOIN person prsn  ON(pty.party_id=prsn.party_id)  WHERE pty.party_id = '".$party_id."'  AND pty.party_type_id ='1'";
			return $this->db->get_row($sql);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	
	}
	
	function getDocSpeciality($party_id)
	{
		try
		{
			/*$sql = "SELECT pty.party_id, usr.username AS party_email, party_name, prsn.person_type  FROM  user usr  LEFT JOIN  party pty ON(usr.party_id=pty.party_id)  LEFT JOIN person prsn  ON(pty.party_id=prsn.party_id)  WHERE pty.party_id = '".$party_id."'  AND pty.party_type_id ='1'";*/
			  $sql = "SELECT spc.name,spc.id FROM " . DB_PREFIX . "speciality spc LEFT JOIN " . DB_PREFIX . "doctor_speciality docspc ON(docspc.speciality_id=spc.id) WHERE docspc.doctor_id = '".$party_id."'";
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	
	}
	
	function getDocLang($party_id)
	{
		try
		{
			/*$sql = "SELECT pty.party_id, usr.username AS party_email, party_name, prsn.person_type  FROM  user usr  LEFT JOIN  party pty ON(usr.party_id=pty.party_id)  LEFT JOIN person prsn  ON(pty.party_id=prsn.party_id)  WHERE pty.party_id = '".$party_id."'  AND pty.party_type_id ='1'";*/
			$sql = "SELECT spc.name,spc.id FROM " . DB_PREFIX . "languages spc LEFT JOIN " . DB_PREFIX . "doctor_languages docspc ON(docspc.language_id=spc.id) WHERE docspc.doctor_id = '".$party_id."'";
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	
	}
	
	
	function getDocInsu($party_id)
	{
		try
		{
			/*$sql = "SELECT pty.party_id, usr.username AS party_email, party_name, prsn.person_type  FROM  user usr  LEFT JOIN  party pty ON(usr.party_id=pty.party_id)  LEFT JOIN person prsn  ON(pty.party_id=prsn.party_id)  WHERE pty.party_id = '".$party_id."'  AND pty.party_type_id ='1'";*/
			$sql = "SELECT spc.name,spc.id FROM " . DB_PREFIX . "insurance spc LEFT JOIN " . DB_PREFIX . "doctor_insurance docspc ON(docspc.insurance_id=spc.id) WHERE docspc.doctor_id = '".$party_id."'";
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	
	}
	
	function getAllDetails($param) 
	{
		
		try
		{
			$sql="select * from party_person_vw where PartyID  = '".$param."'";
			return $this->db->get_row($sql);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getEducationdatas($person_Id)
	{
		try
		{
			$sql = "SELECT GROUP_CONCAT(er.education_id),GROUP_CONCAT(e.education_name) as Education FROM education_relation er LEFT JOIN education e ON (e.education_id = er.education_id) WHERE er.person_id='".$person_Id."'";
			return $this->db->get_row($sql);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	
	}
	
	function getloginCredentials($userid,$pass)
	{
		try
		{
			$sql="SELECT party_id,passcode,party_name,party_email FROM party WHERE party_email = '".$userid."' AND passcode = '".$pass."'";
			return $this->db->get_row($sql);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getEducationData($person_id)
	{
		try
		{
			$sql ="SELECT education_id FROM education_relation WHERE person_id='".$person_id."'";
			$res = $this->db->get_results($sql,ARRAY_A);
			foreach($res as $value){
				$array_education[] =	$value;		
			}
			return $array_education;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getLanguageData($person_id)
	{
		try
		{
			$sql ="SELECT language_id FROM langugae_relation WHERE person_id='".$person_id."'";
			$res = $this->db->get_results($sql,ARRAY_A);
			foreach($res as $value){
				$array_language[] =	$value;		
			}
			return $array_language;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function update($table, $data, $where='1')
	{ 
		try
		{
			$q="UPDATE `" . DB_PREFIX . "$table`  SET ";
			foreach($data as $key=>$val)
			{ 
				if(strtolower($val)=='null') $q.= "`$key` = NULL, "; 
				elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), "; 
				elseif(preg_match("/^increment\((\-?\d+)\)$/i",$val,$m)) $q.= "`$key` = `$key` + $m[1], ";  
				else $q.= "`$key`='".$val."', "; 
			} 
		 $q = rtrim($q, ', ') . ' WHERE '.$where.';'; 
		   $this->db->query($q); 
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	function delete($table,$where='')
	{
		try
		{
			$sql = "DELETE FROM `" . DB_PREFIX . "$table` WHERE $where";
			$this->db->query($sql); 
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}	
	function getPhysicianDetails()
	{
		try
		{
			$sql = "SELECT pty.party_id,pty.party_name,	usr.username AS party_email, rcp.recipient_printer,rcp.recipient_printer_url,	rcp.recipient_draft FROM party pty 	LEFT JOIN user usr ON(usr.party_id=pty.party_id) LEFT JOIN person prsn ON(pty.party_id=prsn.party_id) LEFT JOIN recipient rcp ON(pty.party_id = rcp.party_id) WHERE prsn.person_type='3' AND pty.party_type_id='1'";
		return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getDoctorDetails($doctor_id)
	{
		try
		{
			$sql = "SELECT pty.party_id,person_id,person_fname,person_lname,usr.username AS party_email,rcp.recipient_printer,rcp.recipient_printer_url,rcp.recipient_draft FROM party pty 	LEFT JOIN user usr ON(usr.party_id=pty.party_id) LEFT JOIN person prsn ON (pty.party_id=prsn.party_id) left join recipient rcp on (pty.party_id = rcp.party_id)  WHERE person_type='3' and pty.party_id='".$doctor_id."'";
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function selectsingledata()
	{
		try
		{
			$sql="SELECT pty.party_id, party_name,party_email,rcp.recipient_printer,rcp.recipient_printer_url,rcp.recipient_draft FROM party pty LEFT JOIN person prsn ON(pty.party_id=prsn.party_id) left join recipient rcp on (pty.party_id = rcp.party_id) WHERE prsn.person_type='3' AND pty.party_type='1'";
			return $this->db->get_row($sql);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function insert($table, $data)
	{ 
		try
		{
			$q="INSERT INTO `" . DB_PREFIX . "$table` "; 
			$v=''; $n='';
			
			foreach($data as $key=>$val)
			{ 
				$n.="`$key`, "; 
				if(strtolower($val)=='null') $v.="NULL, "; 
				elseif(strtolower($val)=='now()') $v.="NOW(), "; 
				else $v.= "'".$this->escape($val)."', "; 
			} 
			$q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");"; 			
			if($this->db->query($q))
			{ 
				return $this->db->insert_id; 
			} 
			else 
			{
				return false; 
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getAllTableData($tbname,$where)
	{
		try
		{
			$sql = "SELECT * FROM $tbname WHERE $where";
			return $this->db->get_row($sql);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getAllData($tbname)
	{
		try
		{
			$sql = "SELECT * FROM " . DB_PREFIX . "$tbname ";
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	function getUserExist($username,$password)
	{
		try
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "user` WHERE username='".$username."' AND password='".md5($password)."'";
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function setUserserSsion($userID)
	{
		try
		{
			$sql = "INSERT INTO `" . DB_PREFIX . "usersession` (`user_id`, `usersession_id`) VALUES ('".$userID."', FLOOR(10000 + RAND() * 89999))";
			$this->db->query($sql);
			$this->db->insert_id;
			$query = "SELECT * FROM `" . DB_PREFIX . "usersession` WHERE id='".$this->db->insert_id."'";
			return $this->db->get_row($query,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
function getUsers()
	{
		try
		{
			echo $sql = "SELECT * FROM `" . DB_PREFIX . "user`";
			return $this->db->get_results($sql);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
function getLnt($zip){
	$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
	".urlencode($zip)."&sensor=false";
	$result_string = file_get_contents($url);
	$result = json_decode($result_string, true);
	//print_r($result);exit;
	return $result['results'][0]['geometry']['location'];
}
function getDetails($useridf){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "doctor_appointments` WHERE `patient_id`='".$useridf."' GROUP BY doctor_id";	
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getDetails1($useridf,$date){
		try 
		{
			 $sql = "SELECT * FROM `" . DB_PREFIX . "doctor_appointments` WHERE `patient_id`='".$useridf."' and `apnt_date`<='".$date."' ORDER BY id DESC ";	
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function getDocDetails($userID){
		try 
		{
			$sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE `id`='".$userID."' ";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function userting($doctor_id,$user_id){
    	try
    	{
    		
    	$sql = "SELECT * FROM `" . DB_PREFIX . "ratings` WHERE `doctor_id`='".$doctor_id."' and `userid`='".$user_id."'";			
			return $this->db->get_row($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	
	function getrting($doctor_id){
    	try
    	{
    		
    	$sql = "SELECT * FROM `" . DB_PREFIX . "ratings` WHERE `doctor_id`='".$doctor_id."'";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	function ratinglimit($doctor_id,$start,$end){
    	try
    	{
    		
       $sql = "SELECT * FROM `" . DB_PREFIX . "ratings` WHERE `doctor_id`='".$doctor_id."' ORDER by date DESC  LIMIT ".$start." , ".$end."";			
			return $this->db->get_results($sql,ARRAY_A);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
}
?>
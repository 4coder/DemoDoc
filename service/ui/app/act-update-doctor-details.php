<?php
include("./conf/config.inc.php");
$patientData = $_POST;
 if(!empty($patientData)){
		$Data1['speciality'] = $patientData['docSpeciality'];
		$Data['Education'] = $patientData['Education'];
		$Data['HospitalAffiliations'] = $patientData['Hospital'];
		//$Data['id'] = $patientData['doc-id'];
		$Da = $patientData['doc-id'];
		$Data1['Languages'] = $patientData['Languages'];
		$Data['BoardCertifications'] = $patientData['Board'];
		$Data['Awards'] = $patientData['Awards'];
		$Data['ProfessionalMemberships'] = $patientData['Memberships'];
		$Data1['Insurances'] = $patientData['insuranceSelect'];
		foreach($Data1['Insurances'] as $value){
			$di['insurance_id']=$value;
			$di['doctor_id']=$Da;
				//$userID =  $scad->insert('doctor_insurance',$di);
			}
			foreach($Data1['speciality'] as $value){
				$ds['speciality_id']=$value;
			$ds['doctor_id']=$Da;
				//$userID =  $scad->insert('doctor_speciality',$ds);
			}
			foreach($Data1['Languages'] as $value){
				$dl['language_id']=$value;
			$dl['doctor_id']=$Da;
				//$userID =  $scad->insert('doctor_languages',$dl);
			}
		$condition="id=".$Da;
	echo	$userID =  $scad->update('users',$Data,$condition);
//		ech$userID;
} else{
echo $errorflag = 0;
}
?>
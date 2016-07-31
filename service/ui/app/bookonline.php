<?php
include("./conf/config.inc.php");
$result = $scad->getUserDetails($doctorID);
$res = $scad->getSpeciality($result['speciality']);
$resImage = $scad->getImages($doctorID);
$speciality = $res['name'];
$imageName = 'no_image.jpg';
if(!empty($resImage)){
	foreach($resImage as $keys=>$value){
		if($value['set_profile']==1){
			$profileImage = $value['name'];
		}else{ 
			$imageName = 'no_image.jpg';
		} 
	}
}

$encodedArray = array_map(utf8_encode, $result);

if(!empty($profileImage)){
	$encodedArray['imageName'] = $profileImage;
}else{
	$encodedArray['imageName'] = $imageName;
}
$latlong = $scad->getLnt($result['zipcode']);

$encodedArray['latitude'] = $latlong['lat'];
$encodedArray['longitude'] = $latlong['lng'];

$encodedArray['speciality'] = $speciality;
echo json_encode($encodedArray);
?>
<?php 
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$city_id = (int) $_POST['city_id'];
$stateArr = $model->getListStateByCity($city_id);
if(!empty($stateArr)){
	foreach ($stateArr as $value) {
		echo "<option value='".$value['id']."'>".$value['state_name']."</option>";
	}
}
?>
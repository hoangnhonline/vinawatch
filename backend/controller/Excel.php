<meta charset="UTF-8">
<?php
$url = "../index.php?mod=customer&act=list";
$arrColumn = array(
	'product_code',
	'product_name',
	'cate_type_id',
	'cate_id',
	'trangthai',
	'price',
	'price_saleoff',
	'deal_amount',
	'start_date',
	'end_date',
	'da_ban',
	'meta_title',
	'meta_description',
	'meta_keyword'
);
require_once "../model/Backend.php";
require_once 'ExcelReader.php';
$model = new Backend;

$dataArr = array();

if( $_FILES['file']['tmp_name'])
{
 	$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name'],true,"UTF-8");
 	
 	$numCol = $data->colcount();
	$rowCol = $data->rowcount();

	for($j = 1; $j <= $numCol; $j ++){
		for ($i=2; $i < $rowCol; $i++) { 			
			$dataArr[$arrColumn[$j-1]][] = $data->val($i,$j);
		}	
	}
}

if(!empty($dataArr)){	
	$count = count($dataArr['product_code']);
	for($k = 0; $k <= $count; $k ++){
		foreach ($arrColumn as $value) {

			$dataInsert[$value] = $dataArr[$value][$k];
			$dataInsert['name_en'] = $model->stripUnicode($dataArr['product_name'][$k]);
			$dataInsert['product_alias'] = $model->changeTitle($dataArr['product_name'][$k]);

			$id = $model->getProductIdByCode($dataArr['product_code'][$k]);
			if($id > 0){
				$dataInsert['id'] = $id;
			}
			
		}		
		if($dataInsert['product_code'] != '' && $dataInsert['product_name'] != '' && $dataInsert['cate_type_id'] != '' && $dataInsert['cate_id'] != ''){
			if($dataInsert['id'] > 0){
				$model->update('product', $dataInsert);
				echo "Cập nhật thành công sản phẩm '".$dataInsert['product_name']."'"."<br />";
			}else{
				$model->insert('product', $dataInsert);
				echo "Thêm mới thành công sản phẩm '".$dataInsert['product_name']."'"."<br />";
			}
		}
	}
}

?>
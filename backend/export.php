<?php
ini_set('display_errors',0);
date_default_timezone_set('Asia/Saigon');
require_once "model/Backend.php";
$model = new Backend;

$limit = 20;
$page_show = 20;
if (isset($_GET['product_code']) && $_GET['product_code'] != '') {
    $product_code = $_GET['product_code'];      
    $link.="&product_code=$product_code";
    $link_form .="&product_code=$product_code";
} else {
    $product_code = '';
}
if (isset($_GET['product_name']) && $_GET['product_name'] != '') {
    $product_name = $_GET['product_name'];      
    $link.="&product_name=$product_name";
    $link_form.="&product_name=$product_name";
} else {
    $product_name = '';
}
if (isset($_GET['is_hot']) && $_GET['is_hot'] > -1) {
    $is_hot = (int) $_GET['is_hot'];      
    $link_form.="&is_hot=$is_hot";
    $link.="&is_hot=$is_hot";
} else {
    $is_hot = -1;
}
if (isset($_GET['is_saleoff']) && $_GET['is_saleoff'] > -1) {
    $is_saleoff = (int) $_GET['is_saleoff'];      
    $link.="&is_saleoff=$is_saleoff";
    $link_form.="&is_saleoff=$is_saleoff";
} else {
    $is_saleoff = -1;
}

if (isset($_GET['is_new']) && $_GET['is_new'] > -1) {
    $is_new = (int) $_GET['is_new'];      
    $link.="&is_new=$is_new";
    $link_form.="&is_new=$is_new";
} else {
    $is_new = -1;
}
if (isset($_GET['trangthai']) && $_GET['trangthai'] > -1) {
    $trangthai = (int) $_GET['trangthai'];      
    $link.="&trangthai=$trangthai";
    $link_form.="&trangthai=$trangthai";
} else {
    $trangthai = -1;
}
if (isset($_GET['cate_type_id']) && $_GET['cate_type_id'] > 0) {
    $cate_type_id = (int) $_GET['cate_type_id'];      
    $link.="&cate_type_id=$cate_type_id";
    $link_form.="&cate_type_id=$cate_type_id";
} else {
    $cate_type_id = -1;
}

if (isset($_GET['cate_id']) && $_GET['cate_id'] > 0) {
    $cate_id = (int) $_GET['cate_id'];      
    $link.="&cate_id=$cate_id";
    $link_form.="&cate_id=$cate_id";
} else {
    $cate_id = -1;
}
if (isset($_GET['parent_id']) && $_GET['parent_id'] > 0) {
    $parent_id = (int) $_GET['parent_id'];      
    $link.="&parent_id=$parent_id";
    $link_form.="&parent_id=$parent_id";
    if($cate_id == $parent_id) $cate_id = -1;
} else {
    $parent_id = -1;
}
if (isset($_GET['manu_id']) && $_GET['manu_id'] > 0) {
    $manu_id = (int) $_GET['manu_id'];      
    $link.="&manu_id=$manu_id";
    $link_form.="&manu_id=$manu_id";
} else {
    $manu_id = -1;
}

$arrTotal = $model->getListProduct($product_code,$product_name,$cate_type_id,$parent_id,$cate_id,$manu_id,$is_new,$is_saleoff,$is_hot,$trangthai, -1, -1);

require_once 'PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("HoangNH")
                             ->setLastModifiedBy("HoangNH")
                             ->setTitle("Office 2007 XLSX vinawatch.com")
                             ->setSubject("Office 2007 XLSX vinawatch.com")
                             ->setDescription("")
                             ->setKeywords("")
                             ->setCategory("");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Mã sản phẩm')
            ->setCellValue('B1', 'Tên sản phẩm')
            ->setCellValue('C1', 'Menu danh mục')
            ->setCellValue('D1', 'Danh mục')
            ->setCellValue('E1', 'Trạng thái')
            ->setCellValue('F1', 'Giá sản phẩm')
            ->setCellValue('G1', 'Giá đã giảm')
            ->setCellValue('H1', 'Số lượng deal')
            ->setCellValue('I1', 'Ngày bắt đầu')
            ->setCellValue('J1', 'Ngày kết thúc')
            ->setCellValue('K1', 'Số lượng đã bán')
            ->setCellValue('L1', 'Seo Title')
            ->setCellValue('M1', 'Meta description')
            ->setCellValue('N1', 'Meta Keyword');            

$i = 1;
if(!empty($arrTotal['data'])){
    foreach ($arrTotal['data'] as $value) {
        $i ++;
        $start_date = ($value['start_date'] > 0 ) ? date('d-m-Y',$value['start_date']) : "";
        $end_date = ($value['end_date'] > 0 ) ? date('d-m-Y',$value['end_date']) : "";
        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $value['product_code'])
                ->setCellValue('B'.$i, $value['product_name'])
                ->setCellValue('C'.$i, $value['cate_type_id'])
                ->setCellValue('D'.$i, $value['cate_id'])
                ->setCellValue('E'.$i, $value['trangthai'])
                ->setCellValue('F'.$i, $value['price'])
                ->setCellValue('G'.$i, $value['price_saleoff'])
                ->setCellValue('H'.$i, $value['deal_amount'])
                ->setCellValue('I'.$i, $start_date)
                ->setCellValue('J'.$i, $end_date)
                ->setCellValue('K'.$i, $value['daban'])            
                ->setCellValue('L'.$i, $value['meta_title'])
                ->setCellValue('M'.$i, $value['meta_description'])
                ->setCellValue('N'.$i, $value['meta_keyword']);   
    }
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(300);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(300);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(300);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(300);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

// Redirect output to a client’s web browser (Excel5)
$fname = "-".date('Y')."-".date('m')."-".date('d')."-".date('h')."-".date('i');
header('Content-Type: application/xls');
header('Content-Disposition: attachment;filename="product'.$fname.'.xls"');
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

?>

<?php 
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$arrMod = array("coupon");
$detailC = $model->getDetail('coupon', 1);
$mod = isset($_POST['mod']) ? $model->processData($_POST['mod']) : "";

if(in_array($mod,$arrMod)){
	if($mod=="coupon"){
		$arrData['name'] = $hoten = isset($_POST['snp_name']) ? $model->processData($_POST['snp_name']) : "";
		$arrData['email'] = $email = isset($_POST['snp_email']) ? $model->processData($_POST['snp_email']) : "";
		$arrData['phone'] = $dienthoai = isset($_POST['snp_dienthoai']) ? $model->processData($_POST['snp_dienthoai']) : "";
		$arrData['code'] = $detailC['code'];
		$arrData['created_at'] = time();
		$model->insert('coupon_data', $arrData);
		setcookie('snp_snppopup', 1, time() + (86400 * 30), "/");
		if($hoten != '' && $email !='' && $dienthoai !=''){
			$tieudethu="Vinawatch.vn :: mã giảm giá";
			$noidungthu = 'Vinawatch cảm ơn quý khách đã quan tâm tới chương trình khuyến mãi của chúng tôi.<br><br>';
            $noidungthu .= 'Vinawatch xin gửi đến quý khách mã giảm giá : '.$detailC['code'].'<br>';
                    
	        $model->smtpmailer($email, 'vinawatchvn@gmail.com', 'vinawatch.vn',$tieudethu,$noidungthu);
	        echo "success";
		}
	}	

}else{
	echo "Stop here!";
	exit();
}	
?>
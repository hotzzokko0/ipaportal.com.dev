<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
// 자신만의 코드를 넣어주세요.
include (G5_SKIN_PATH.'/multi_category/lib.php');//멀티 카테고리
include "config.point.php"; // 옵션사용시 포인트 차감

$str = join(MC::getNowCategories($ca_name));
$wr_8 = substr($str, 0,16);
$sql8 = "update $write_table set wr_8 = '$wr_8' where wr_id = '$wr_id' ";
sql_query($sql8);

$wr_1 = "$ext1_00|$ext1_01|$ext1_02|$ext1_03|$ext1_04|$ext1_05|$ext1_06|$ext1_07|$ext1_08|$ext1_09|$ext1_10|$ext1_11|$ext1_12|$ext1_13|$ext1_14|$ext1_15|$ext1_16|$ext1_17|$ext1_18|$ext1_19|$ext1_20|$ext1_21|$ext1_22|$ext1_23|$ext1_24|$ext1_25|$ext1_26|$ext1_27|$ext1_28|$ext1_29|$ext1_30|$ext1_31|$ext1_32|$ext1_33|$ext1_34|$ext1_35|$ext1_36|$ext1_37|$ext1_38|$ext1_39|$ext1_40|$ext1_41|$ext1_42|$ext1_43|$ext1_44|$ext1_45|$ext1_46|$ext1_47";
$sql1 = " update $write_table set wr_1 = '$wr_1' where wr_id = '$wr_id' ";
sql_query($sql1);

$wr_2 = "$ext2_00|$ext2_01|$ext2_02|$ext2_03|$ext2_04|$ext2_05|$ext2_06|$ext2_07|$ext2_08|$ext2_09|$ext2_10|$ext2_11|$ext2_12|$ext2_13|$ext2_14|$ext2_15|$ext2_16|$ext2_17|$ext2_18|$ext2_19|$ext2_20";
$sql2 = " update $write_table set wr_2 = '$wr_2' where wr_id = '$wr_id' ";
sql_query($sql2);

// 주소정보 업데이트 여유 필드 wr_3 적용
if ($ext3_00) {
// $wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03|$ext3_04|$ext3_05|$ext3_06|$ext3_07|$ext3_08|$ext3_09";
$wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03";
$sql3 = " update $write_table set wr_3 = '$wr_3' where wr_id = '$wr_id' ";
sql_query($sql3);
}

//wr_6에서 받은 날짜더함
if($w != "u"){
$date = date('Ymd', strtotime("now"));
$dayadd =$wr_6/1000;
//$cdate = date("Ymd", strtotime("$dayadd day"));
$cdate = date("Ymd", strtotime("$dayadd day", strtotime($date)));
$wr_7 = $cdate;
}
$sql7 = " update $write_table set wr_7 = '$wr_7' where wr_id = '$wr_id' ";
sql_query($sql7);

//wr_4에서 받은 날짜더함
if($w != "u"){
$date2 = date('Ymd', strtotime("now"));
$dayadd2 =$wr_4/100;
//$cdate = date("Ymd", strtotime("$dayadd day"));
$cdate2 = date("Ymd", strtotime("$dayadd2 day", strtotime($date2)));
$wr_9 = $cdate2;
}
$sql9 = " update $write_table set wr_9 = '$wr_9' where wr_id = '$wr_id' ";
sql_query($sql9);


if($w != "u") {  // 스페셜등록 포인트 차감

	if($wr_6 == $point_w1 && $wr_4 <0) {  
	$point_del = -$point_w1;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w2 && $wr_4 <0) { 
	$point_del = -$point_w2;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w3 && $wr_4 <0) { 
	$point_del = -$point_w3;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_4 == $point_w11 && $wr_6 <0) {  
	$point_del = -$point_w11;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_4 == $point_w22 && $wr_6 <0) { 
	$point_del = -$point_w22;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_4 == $point_w33 && $wr_6 <0) { 
	$point_del = -$point_w33;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}
	
	if($wr_6 == $point_w1 && $wr_4 == $point_w11) {  
	$point_del = -$point_w111;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w1 && $wr_4 == $point_w22) {  
	$point_del = -$point_w122;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w1 && $wr_4 == $point_w33) {  
	$point_del = -$point_w133;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w2 && $wr_4 == $point_w11) {  
	$point_del = -$point_w211;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w2 && $wr_4 == $point_w22) {  
	$point_del = -$point_w222;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w2 && $wr_4 == $point_w33) {  
	$point_del = -$point_w233;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w3 && $wr_4 == $point_w11) {  
	$point_del = -$point_w311;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w3 && $wr_4 == $point_w22) {  
	$point_del = -$point_w322;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

	if($wr_6 == $point_w3 && $wr_4 == $point_w33) {  
	$point_del = -$point_w333;
    insert_point($member[mb_id], $point_del, "$board[bo_subject] $wr_id 등록", $bo_table, $wr_id, '등록');
	}

}

?>

<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
// 자신만의 코드를 넣어주세요.
for ($i = 0;  $i < count($wr_body_1); $i++)
{
	$wr_1 = $wr_1."|".$wr_body_1[$i];
	$wr_2 = $wr_2."|".$wr_body_2[$i];
}
$update_sql	 = " update $write_table 
				 set wr_1  = '$wr_1',
					 wr_2  = '$wr_2'					 
				where wr_id = '$wr_id' ";
sql_query($update_sql);


$wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03";
$sql3 = " update $write_table set wr_3 = '$wr_3' where wr_id = '$wr_id' ";
sql_query($sql3);

$wr_4 = "$ext4_00|$ext4_01|$ext4_02|$ext4_03|$ext4_04|$ext4_05|$ext4_06|$ext4_07|$ext4_08|$ext4_09|$ext4_10|$ext4_11|$ext4_12|$ext4_13|$ext4_14|$ext4_15|$ext4_16|$ext4_17|$ext4_18|$ext4_19|$ext4_20";
$sql4 = " update $write_table set wr_4 = '$wr_4' where wr_id = '$wr_id' ";
sql_query($sql4);

//순서변경
if($wr_5 && $wr_5 >0) {
$wr_5--;
     $sql2 = " select wr_num, wr_datetime from $write_table where wr_is_comment = 0 order by wr_num DESC limit $wr_5, 1 ";
	 $result2 = sql_query($sql2);
	 $row2 = sql_fetch_array($result2);
   $move_wr_num= $row2[wr_num];
   $move_wr_datetime= date("Y-m-d H:i:s", strtotime($row2[wr_datetime]."+17 seconds"));

   if($w =='') $pre_wr_num= $wr_num;
   else {
     $sql3 = " select wr_num from $write_table where wr_id= '$wr_id' ";
	 $result3 = sql_query($sql3);
	 $row3 = sql_fetch_array($result3);
     $pre_wr_num= $row3[wr_num];
   }
//    echo "<br>////////////////1.m_wr_num= $move_wr_num ///pre_wr_num= $pre_wr_num";
//	exit;

   if( $move_wr_num )
	   sql_query("update $write_table set wr_num = (wr_num - 1) where wr_num<= $move_wr_num " );
   else $move_wr_num = get_next_num($write_table);

   if($move_wr_num> $pre_wr_num) $pre_wr_num--;

   sql_query("update $write_table set wr_num = $move_wr_num, wr_datetime = '$move_wr_datetime' where wr_num= '$pre_wr_num' " );

}

//goto_url(G5_BBS_URL."/board.php?bo_table=$bo_table$qstr");
?>
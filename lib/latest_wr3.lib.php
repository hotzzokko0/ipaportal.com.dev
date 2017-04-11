<?
if (!defined('_GNUBOARD_')) exit;

// 최신글 추출
function latest_wr($skin_dir="", $bo_table, $rows=10, $subject_len=40, $wr="")
{
    global $config;
    global $g5;

    if ($skin_dir)
        $latest_skin_path =  G5_SKIN_PATH.'/latest/'.$skin_dir;
    else
        $latest_skin_path = G5_SKIN_PATH.'/latest/$config[cf_latest_skin]';
	    $latest_skin_url  = G5_SKIN_URL.'/latest/'.$skin_dir;

    $list = array();

    $sql = " select * from {$g5[board_table]} where bo_table = '$bo_table'";
	
    $board = sql_fetch($sql);

    $tmp_write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름

	$ymd = date("Ymd", mktime(0,0,0,date("m"),date("d"), date("Y"))); 

	
	// wr 로 랜덤정렬
	//$sql = "select * from $g4[write_prefix]$bo_table where wr_subject='$wr' order by rand() limit 0, $rows ";
	//$sql = "select * from $g4[write_prefix]$bo_table where wr_subject='$wr' order by rand() limit 0, $rows ";
	// wr 로 랜덤정렬
	if ($wr == "6"){
        $sql = " select * from $tmp_write_table where wr_6 > 0 && wr_7 >= $ymd order by rand() limit 0, $rows ";
	} 
	else if ($wr == "4"){
       $sql = " select * from $tmp_write_table where wr_4 > 0 && wr_9 >= $ymd order by rand() limit 0, $rows ";
	}
	else {
		$sql = " select * from $tmp_write_table where wr_is_comment = 0 order by wr_num limit 0, $rows ";
	}

    //explain($sql);
    $result = sql_query($sql);
    for ($i=0; $row = sql_fetch_array($result); $i++) 
        $list[$i] = get_list($row, $board, $latest_skin_path, $subject_len);
    
    ob_start();
    include "$latest_skin_path/latest.skin.php";
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
} 
?>
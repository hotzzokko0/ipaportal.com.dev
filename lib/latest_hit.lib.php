<?php
if (!defined('_GNUBOARD_')) exit;

// 최신글 추출
function latest_hit($skin_dir="", $bo_table, $rows=10, $subject_len=40, $options="") 
{ 
    global $g5;

    if ($skin_dir) 
        $latest_skin_path = G5_SKIN_PATH.'/latest/'.$skin_dir; 
    else 
        $latest_skin_path = G5_SKIN_URL.'/latest/basic'; 

    $list = array(); 

    $sql = " select * from {$g5['board_table']} where bo_table = '$bo_table'"; 
    $board = sql_fetch($sql); 

    $tmp_write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름 
    //$sql = " select * from $tmp_write_table where wr_is_comment = 0 order by wr_id desc limit 0, $rows "; 
    // 위의 코드 보다 속도가 빠름 
    $sql = " select * from $tmp_write_table where wr_is_comment = 0 order by wr_hit desc limit 0, $rows "; 
    //explain($sql); 
    $result = sql_query($sql); 
    for ($i=0; $row = sql_fetch_array($result); $i++) 
        $list[$i] = get_list($row, $board, $latest_skin_path, $subject_len); 

    ob_start();
    include $latest_skin_path.'/latest.skin.php';
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
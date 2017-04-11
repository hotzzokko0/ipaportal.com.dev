<?
include_once("./_common.php");
include (G5_SKIN_PATH.'/multi_category/lib.php');
// wr_id 값이 있으면 글읽기 
if ($wr_id) 
{
    // 글이 없을 경우 해당 게시판 목록으로 이동
    if (!$write[wr_id]) 
		alert_close("글이 존재하지 않습니다.\\n\\n글이 삭제되었거나 이동된 경우입니다.");

    // 그룹접근 사용
    if ($group[gr_use_access]) 
    {
        if (!$member[mb_id])
	        alert_close("비회원은 이 게시판에 접근할 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.");

		// 그룹관리자 이상이라면 통과 
        if ($is_admin == "super" || $is_admin == "group") 
            ; 
        else 
        {
            // 그룹접근
            $sql = " select count(*) as cnt 
                       from $g4[group_member_table] 
                      where gr_id = '$board[gr_id]' and mb_id = '$member[mb_id]' ";
            $row = sql_fetch($sql);
            if (!$row[cnt])
				alert_close("접근 권한이 없으므로 글읽기가 불가합니다.\\n\\n궁금하신 사항은 관리자에게 문의 바랍니다.");
        }
    }

    // 로그인된 회원의 권한이 설정된 읽기 권한보다 작다면
    if ($member[mb_level] < $board[bo_read_level]) 
    {
        if ($member[mb_id])
			alert_close("글을 읽을 권한이 없습니다.");
        else 
			alert_close("글을 읽을 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.");
    }

    // 자신의 글이거나 관리자라면 통과
    if (($write[mb_id] && $write[mb_id] == $member[mb_id]) || $is_admin)
        ;
    else 
    {
        // 비밀글이라면
        if (strstr($write[wr_option], "secret")) {
            $ss_name = "ss_secret_{$bo_table}_$write[wr_num]";
            //$ss_name = "ss_secret_{$bo_table}_{$wr_id}";
            // 한번 읽은 게시물의 번호는 세션에 저장되어 있고 같은 게시물을 읽을 경우는 다시 패스워드를 묻지 않습니다.
            // 이 게시물이 저장된 게시물이 아니면서 관리자가 아니라면
            //if ("$bo_table|$write[wr_num]" != get_session("ss_secret")) 
            if (!get_session($ss_name)) 
				alert_close("글을 읽을 권한이 없습니다.\\n\\n궁금하신 사항은 관리자에게 문의 바랍니다.");
			set_session($ss_name, TRUE);
        }
    }

    // 한번 읽은글은 브라우저를 닫기전까지는 카운트를 증가시키지 않음
    $ss_name = "ss_view_{$bo_table}_{$wr_id}";
    if (!get_session($ss_name)) 
    {
        sql_query(" update $write_table set wr_hit = wr_hit + 1 where wr_id = '$wr_id' ");

        // 자신의 글이면 통과
        if ($write[mb_id] && $write[mb_id] == $member[mb_id])
            ;
        else 
        {
            // 회원이상 글읽기가 가능하다면
            if ($board[bo_read_level] > 1) {
                if ($member[mb_point] + $board[bo_read_point] < 0)
                    alert_close("보유하신 포인트(".number_format($member[mb_point]).")가 없거나 모자라서 글읽기(".number_format($board[bo_read_point]).")가 불가합니다.\\n\\n포인트를 모으신 후 다시 글읽기 해 주십시오.");

                insert_point($member[mb_id], $board[bo_read_point], "$board[bo_subject] $wr_id 글읽기", $bo_table, $wr_id, '읽기');
            }
        }

        set_session($ss_name, TRUE);
    }

    $g4[title] = "$board[bo_subject] ☞ " . strip_tags(conv_subject($write[wr_subject], 255));
} 
else 
{
    if ($member[mb_level] < $board[bo_list_level]) 
    {
        if ($member[mb_id]) 
            alert_close("목록을 볼 권한이 없습니다.");
        else 
            alert_close("목록을 볼 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오.");
    }

    $g4[title] = "$board[bo_subject] $page 페이지";
}

include_once(G5_PATH.'/head.sub.php');

$view = get_view($write, $board, $board_skin_path);
$html = 0;
if (strstr($view[wr_option], "html1"))
    $html = 1;
else if (strstr($view[wr_option], "html2"))
    $html = 2;

$view[content] = conv_content($view[wr_content], $html);
if (strstr($sfl, "content"))
    $view[content] = search_font($stx, $view[content]);
$view[content] = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 name='target_resize_image[]' onclick='image_window(this)' style='cursor:pointer;' \\2 \\3", $view[content]);

$width = 620;
?>

<?
$ex1_filed = explode("|",$view[wr_1]); 
$ext1_00  = $ex1_filed[0];
$ext1_01  = $ex1_filed[1];
$ext1_02  = $ex1_filed[2];
$ext1_03  = $ex1_filed[3];
$ext1_04  = $ex1_filed[4];
$ext1_05  = $ex1_filed[5];
$ext1_06  = $ex1_filed[6];
$ext1_07  = $ex1_filed[7];
$ext1_08  = $ex1_filed[8];
$ext1_09  = $ex1_filed[9];
$ext1_10  = $ex1_filed[10];
$ext1_11  = $ex1_filed[11];
$ext1_12  = $ex1_filed[12];
$ext1_13  = $ex1_filed[13];
$ext1_14  = $ex1_filed[14];
$ext1_15  = $ex1_filed[15];
$ext1_16  = $ex1_filed[16];
$ext1_17  = $ex1_filed[17];
$ext1_18  = $ex1_filed[18];
$ext1_19  = $ex1_filed[19];
$ext1_20  = $ex1_filed[20];
$ext1_21  = $ex1_filed[21];
$ext1_22  = $ex1_filed[22];
$ext1_23  = $ex1_filed[23];
$ext1_24  = $ex1_filed[24];
$ext1_25  = $ex1_filed[25];
$ext1_26  = $ex1_filed[26];
$ext1_27  = $ex1_filed[27];
$ext1_28  = $ex1_filed[28];
$ext1_29  = $ex1_filed[29];
$ext1_30  = $ex1_filed[30];
$ext1_31  = $ex1_filed[31];
$ext1_32  = $ex1_filed[32];
$ext1_33  = $ex1_filed[33];
$ext1_34  = $ex1_filed[34];
$ext1_35  = $ex1_filed[35];
$ext1_36  = $ex1_filed[36];
$ext1_37  = $ex1_filed[37];
$ext1_38  = $ex1_filed[38];
$ext1_39  = $ex1_filed[39];
$ext1_40  = $ex1_filed[40];
$ext1_39  = $ex1_filed[39];
$ext1_40  = $ex1_filed[40];
$ext1_41  = $ex1_filed[41];
$ext1_42  = $ex1_filed[42];
$ext1_43  = $ex1_filed[43];
$ext1_44  = $ex1_filed[44];
$ext1_45  = $ex1_filed[45];
$ext1_46  = $ex1_filed[46];
$ext1_47  = $ex1_filed[47];

$ex2_filed = explode("|",$view[wr_2]); 
$ext2_00  = $ex2_filed[0];
$ext2_01  = $ex2_filed[1];
$ext2_02  = $ex2_filed[2];
$ext2_03  = $ex2_filed[3];
$ext2_04  = $ex2_filed[4];
$ext2_05  = $ex2_filed[5];
$ext2_06  = $ex2_filed[6];
$ext2_07  = $ex2_filed[7];
$ext2_08  = $ex2_filed[8];
$ext2_09  = $ex2_filed[9];
$ext2_10  = $ex2_filed[10];
$ext2_11  = $ex2_filed[11];
$ext2_12  = $ex2_filed[12];
$ext2_13  = $ex2_filed[13];
$ext2_14  = $ex2_filed[14];
$ext2_15  = $ex2_filed[15];
$ext2_16  = $ex2_filed[16];
$ext2_17  = $ex2_filed[17];
$ext2_18  = $ex2_filed[18];
$ext2_19  = $ex2_filed[19];
$ext2_20  = $ex2_filed[20];

$ex3_filed = explode("|",$view[wr_3]); 
$ext3_00  = $ex3_filed[0];
$ext3_01  = $ex3_filed[1];
$ext3_02  = $ex3_filed[2]; 
$ext3_03  = $ex3_filed[3]; 
$ext3_04  = $ex3_filed[4];
$ext3_05  = $ex3_filed[5];
$ext3_06  = $ex3_filed[6];
$ext3_07  = $ex3_filed[7];
$ext3_08  = $ex3_filed[8];
$ext3_09  = $ex3_filed[9];
?>
<!-- [참고] 옵션필드 --끝-->
<style type="text/css">
.write_head {height:30px; text-align:center; color:#8492A0;}
.field { border:1px solid #ccc; }
.write_fl {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding-left:10px;text-align:left;height:30px;}
.write_flb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:left;font-weight:bold;}
.write_r {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;}
.write_rb {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;font-weight:bold;}
.write_fc {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;height:30px;}
.write_fcb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;font-weight:bold;}
.write_c {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;}
.write_cb {background-color:#F3F3F3; font-size:12px; font-family:돋움;;text-align:center;font-weight:bold;height:30px;}
</style>

<div style="height:12px; line-height:1px; font-size:1px;">&nbsp;</div>

<!-- 게시글 보기 시작 -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>


<div style="clear:both; height:30px;">
    <div style="float:left; margin-top:6px;">
    <img src="<?=$board_skin_url?>/img/icon_date.gif" align=absmiddle border='0'>
    <span style="color:#888888;">작성일 : <?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
    </div>

    <!-- 링크 버튼 -->
    
</div>

<div style="border:1px solid #ddd; clear:both; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
    <table border=0 cellpadding=0 cellspacing=0 width=100%>
    <tr>
        <td style="padding:8px 0 0 10px;">
            <div style="color:#505050; font-size:13px; font-weight:bold; word-break:break-all;">
                <?=cut_hangul_last(get_text($view[wr_subject]))?>
            </div>
        </td>
        <td align="right" style="padding:6px 6px 0 0;" width=220>
         <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_url/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?> 
		<!--인쇄-->
          <a href='#' title='인쇄' onclick="window.open('./print.html','print_win','width=780,height=720,left=100,status=no,toolbar=no,resizable=no,scrollbars=yes')"><img src='<?=$board_skin_url?>/img/btn_print.gif' align="absmiddle" border='0' /></a>&nbsp;
          <!--인쇄-->

            <? if ($trackback_url) { ?><a href="javascript:trackback_send_server('<?=$trackback_url?>');" style="letter-spacing:0;" title='주소 복사'><img src="<?=$board_skin_url?>/img/btn_trackback.gif" border='0' align="absmiddle"></a><?}?>
        </td>
    </tr>
    </table>
</div>
<div style="height:3px; background:url(<?=$board_skin_url?>/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>

<!--인쇄시작-->
<div id='print_table'>

<table border=0 cellpadding=0 cellspacing=0 width=<?=$width?>>
<!--
<tr>
    <td height=30 background="<?=$board_skin_path?>/img/view_dot.gif" style="color:#888;">
        <div style="float:left;">
        &nbsp;글쓴이 : 
        <?//=$view[name]?><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>
        </div>
        <div style="float:right;">
        <img src="<?=$board_skin_path?>/img/icon_view.gif" border='0' align=absmiddle> 조회 : <?=number_format($view[wr_hit])?>
        <?// if ($is_good) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align=absmiddle> 추천 : <?//=number_format($view[wr_good])?><?// } ?>
        <?// if ($is_nogood) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align=absmiddle> 비추천 : <?=number_format($view[wr_nogood])?><?// } ?>
        &nbsp;
        </div>
    </td>
</tr>
-->
<?
// 가변 파일
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view]) {
        $cnt++;
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle border='0'>";
        echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '".urlencode($view[file][$i][source])."');\" title='{$view[file][$i][content]}'>";
        echo "&nbsp;<span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
        echo "</a></td></tr>";
    }
}

// 링크
/*
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 20);
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle border='0'>";
        echo "<a href='{$view[link_href][$i]}' target=_blank>";
        echo "&nbsp;<span style=\"color:#888;\">{$link}</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
        echo "</a></td></tr>";
    }
}
*/
?>
<tr><td>
<br> *** 학원정보
<table width=100% cellpadding=0 cellspacing=0 border=0 bordercolor=#2080D0>
<tr><td width="28%"  style="border:1px solid CCC;" align=center>
<? 
			if($view[file][0][file]){ 
			$image = $view[file][0][file];
			$file1_v= "<img src='$g5[path]/data/file/$board[bo_table]/$image' width='120' height=50 align='center' border=0  onclick=\"view('$g5[path]/data/file/$bo_table/$image')\">";}
			else{echo "<center><img src='$board_skin_url/img/no_img.gif' width='120' height=50 align='absmiddle' border=0></center>";}
			for ($i=0; $i<=count; $i++){
			if ($view[file][$i]){
			echo "$file1_v";}
			}
			?>
	
  </td>
  <td width="2%"></td>
  <td width="70%">
	 <table width="100%" cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	 <tr><td>
		<table width=100% cellpadding=0 cellspacing=1>
		<tr><td width="20%" class=write_cb> 학원명</td><td colspan="3" class=write_fl><b><?=$ext2_18?></b> &nbsp;
		<? echo "<font color=#797979>";
						echo	join('>', MC::getNowCategories($view['ca_name']));
						echo "</font>";
				?></td></tr>
		<tr><td class=write_cb> 주소</td><td class=write_fl colspan="3"><?=$ext3_02?>&nbsp;&nbsp;<?=$ext3_03?></td></tr>
		<tr><td class=write_cb>전화번호</td>
			<td class=write_fl colspan="3">
								<? if ($member['mb_id']){ 
										echo $ext1_05."-".$ext1_06."-".$ext1_07;
								}  else {echo  "<font color=#FF4040>";
										echo "LOGIN 후 확인";
										echo "</font>";} ?></td>
			 </tr>
	 </table>
 </td></tr></table>

</td></tr></table>

</td></tr>

<tr><td>
<br>
***모집요강(1)
			
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td bgcolor=#CCCCCC>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=11% class=write_cb>과목</td>
	  <td width=11% class=write_cb>근무형태</td>
	  <td width=11% class=write_cb>나이</td>
	  <td width=11% class=write_cb>성별</td>
	  <td width=11% class=write_cb>학력</td>
	  <td width=11% class=write_cb>경력</td>
	  <td width=11% class=write_cb>수강대상</td>
	  <td width=11% class=write_cb>수업일수</td>
	  <td width=11% class=write_cb>모집인원</td>
</tr>

<tr><td class=write_fc><?=$ext2_00?></td>
	  <td class=write_fc><?=$ext2_01?></td>
      <td class=write_fc><?=$ext1_13?></td>
      <td class=write_fc><?=$ext2_02?></td>
      <td class=write_fc><?=$ext1_12?></td>
	  <td class=write_fc><?=$ext1_11?></td>
	  <td class=write_fc><?=$ext1_09?></td>
      <td class=write_fc><?=$ext2_15?></td>
      <td class=write_fc><?=$ext1_10?>&nbsp;명</td>
</tr>

<? if($ext2_03){?>
<tr><td class=write_fc><?=$ext2_03?></td>
	  <td class=write_fc><?=$ext2_10?></td>
      <td class=write_fc><?=$ext2_11?></td>
      <td class=write_fc><?=$ext2_12?></td>
      <td class=write_fc><?=$ext2_13?></td>
	  <td class=write_fc><?=$ext2_14?></td>
	  <td class=write_fc><?=$ext2_16?></td>
      <td class=write_fc><?=$ext2_19?></td>
      <td class=write_fc><?=$ext2_20?>&nbsp;명</td>
</tr>
<?}?>

<? if($ext1_21){?>
<tr><td class=write_fc><?=$ext1_21?></td>
	  <td class=write_fc><?=$ext1_22?></td>
      <td class=write_fc><?=$ext1_23?></td>
      <td class=write_fc><?=$ext1_24?></td>
      <td class=write_fc><?=$ext1_25?></td>
	  <td class=write_fc><?=$ext1_26?></td>
	  <td class=write_fc><?=$ext1_27?></td>
      <td class=write_fc><?=$ext1_28?></td>
      <td class=write_fc><?=$ext1_29?>&nbsp;명</td>
</tr>
<?}?>

<? if($ext1_38){?>
<tr><td class=write_fc><?=$ext1_38?></td>
	  <td class=write_fc><?=$ext1_30?></td>
      <td class=write_fc><?=$ext1_31?></td>
      <td class=write_fc><?=$ext1_32?></td>
      <td class=write_fc><?=$ext1_33?></td>
	  <td class=write_fc><?=$ext1_34?></td>
	  <td class=write_fc><?=$ext1_35?></td>
      <td class=write_fc><?=$ext1_36?></td>
      <td class=write_fc><?=$ext1_37?>&nbsp;명</td>
</tr>
<?}?>

<? if($ext1_39){?>
<tr><td class=write_fc><?=$ext1_39?></td>
	  <td class=write_fc><?=$ext1_40?></td>
      <td class=write_fc><?=$ext1_41?></td>
      <td class=write_fc><?=$ext1_42?></td>
      <td class=write_fc><?=$ext1_43?></td>
	  <td class=write_fc><?=$ext1_44?></td>
	  <td class=write_fc><?=$ext1_45?></td>
      <td class=write_fc><?=$ext1_46?></td>
      <td class=write_fc><?=$ext1_47?>&nbsp;명</td>
</tr>
<?}?>
</table>
</td></tr></table>

<br>

***제출서류/전형방법/급여사항
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td bgcolor=#CCCCCC>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=20% class=write_cb>제출서류</td>
	  <td width="80%" class=write_fl><?=$ext1_03?></td>
</tr>

<tr><td width=20% class=write_cb>급여</td>
	  <td width="80%" class=write_fl>최저 : <?=$ext1_14?>&nbsp;만원 :::: 최고 : <?=$ext1_15?>&nbsp;만원&nbsp;&nbsp;&nbsp; <font color=#FF0000><?=$ext1_08?></font></td>
</tr>
</table>
</td></tr></table>

<br>

***접수방법
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td bgcolor=#CCCCCC>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=20% class=write_cb>접수방법</td>
	  <td width="80%" class=write_fl>
	   <? if($ext1_17){
		  echo $ext1_17;
		  echo "&nbsp;/&nbsp;";
			}
			if($ext1_18){
		  echo $ext1_18;
		  echo "&nbsp;/&nbsp;";
			}
			if($ext1_19){
		  echo $ext1_19;
		  echo "&nbsp;/&nbsp;";
			}
			if($ext1_20){
		  echo $ext1_20;
		  echo "&nbsp;/&nbsp;";
			}
		  if($ext2_09){
		  echo $ext2_09;
		  echo "&nbsp;/&nbsp;";
			}
		?>  
	  </td>
</tr>
<tr><td width=20% class=write_cb>담당자</td>
	  <td width="80%" class=write_fl><?=$ext2_04?></td>
</tr>
<tr><td width=20% class=write_cb>연락처</td>
	  <td width="80%" class=write_fl>
									<? if ($member['mb_id']){ 
										echo $ext2_05."-".$ext2_06."-".$ext2_07;
								} else {echo  "<font color=#FF4040>";
										echo "LOGIN 후 확인";
										echo "</font>";} ?></td>
</tr>
<tr><td width=20% class=write_cb>이메일</td>
	  <td width="80%" class=write_fl>
									<? if ($member['mb_id']){ 
										echo $ext2_08;
								} else {echo  "<font color=#FF4040>";
										echo "LOGIN 후 확인";
										echo "</font>";} ?></td>
</tr>
</table>
</td></tr></table>
<br><br>
</td></tr>




<? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // 서명 출력 ?>
</table>
<!--인쇄끝-->
</div>

<br>
<table width=100% cellpadding=0 cellspacing=0 bordr=0>
<tr>									
		<td align=left height=30><b>www.educt.co.kr</b></td>
		<td align=right><a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>' target=_blank><img src="./img/goto.gif" border="0"></a>
						<a href=javascript:self.close()><img src="./img/notice_close.gif" border="0"></td>
	</tr>

	
</table>


</td></tr></table><br>

<script type="text/javascript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+decodeURIComponent(file)+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}
</script>
<script language="JavaScript">
function resize_image()
{
    var target = document.getElementsByName('target_resize_image[]');
    var image_width = parseInt('<?=$board[bo_image_width]?>');
    var image_height = 0;

    for(i=0; i<target.length; i++) { 
        // 원래 사이즈를 저장해 놓는다
        target[i].tmp_width  = target[i].width;
        target[i].tmp_height = target[i].height;
        // 이미지 폭이 테이블 폭보다 크다면 테이블폭에 맞춘다
        if(target[i].width > image_width) {
            image_height = parseFloat(target[i].width / target[i].height)
            target[i].width = image_width;
            target[i].height = parseInt(image_width / image_height);
        }
    }
}

window.onload = resize_image;

</script>
<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}

</script>
<!-- 게시글 보기 끝 -->

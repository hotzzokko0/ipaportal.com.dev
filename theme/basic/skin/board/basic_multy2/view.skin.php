<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include (G5_SKIN_PATH.'/multi_category/lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
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
.write_fl {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding-left:10px;;text-align:left;}
.write_flb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:left;font-weight:bold;}
.write_r {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;}
.write_rb {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;font-weight:bold;}
.write_fc {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;height:30px;}
.write_fcb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;font-weight:bold;}
.write_c {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;}
.write_cb {background-color:#FBFBFB; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;font-weight:bold;height:30px;}
</style>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->
<section id="bo_v_info">
        <h2>페이지 정보</h2>
        작성자 :<strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <span class="sound_only">작성일 :</span><strong><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?>&nbsp;&nbsp;</strong>
         조회 :<strong><?php echo number_format($view['wr_hit']) ?>회</strong>
         댓글 :<strong><?php echo number_format($view['wr_comment']) ?>건</strong>
    </section>

<article id="bo_v" class="wanted" style="width:<?php echo $width; ?>">
    <header>
        <h1 id="bo_v_title">
            <?php
            //if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?>
        </h1>
    </header>    

    <?php
    if ($view['file']['count']) {
        $cnt = 0;
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
    <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                    <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                </a>
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span>
                <span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 첨부파일 끝 -->
    <?php } ?>

   

    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top">
        <?php
        ob_start();
         ?>
        <?php if ($prev_href || $next_href) { ?>
        <ul class="bo_v_nb">
            <?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn_b01"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li><?php } ?>
            <?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn_b01"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li><?php } ?>
        </ul>
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;수정</a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;삭제</a></li><?php } ?>
            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;"><i class="fa fa-fw fa-copy"></i>&nbsp;복사</a></li><?php } ?>
            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;"><i class="fa fa-fw fa-share-square-o"></i>&nbsp;이동</a></li><?php } ?>
            <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></li><?php } ?>
            <li><a href="<?php echo $list_href ?>" class="btn_b01"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;목록</a></li>
            <?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01"><i class="fa fa-commenting" aria-hidden="true">&nbsp;답글</i></a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->


<div class="title_top">회사정보</div>
<table width=100% cellpadding=0 cellspacing=0 border=0 bordercolor=#2080D0>
<tr><td width="30%">
	
	<table width=100% cellpadding=0 cellspacing=0>
		<tr><td align=center>
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
		</td></tr>
				<tr><td height="30" align="center"><b> <?=$ext2_18?></b></td></tr>

	 </table>

  </td>
  <td width="2%"></td>
  <td width="70%">


	 <table class="table table-responsive" width="100%" cellpadding="0" cellspacing="0">
	 <tr><td>
		<table width=100% cellpadding=0 cellspacing=1>
		<tr><td width="20%" class=write_cb> 회사명</td>
			<td colspan="3" class=write_fl>
				<b><?=$ext2_18?></b>
				
				 <? echo "<font color=#797979>";
						echo	join('>', MC::getNowCategories($view['ca_name']));
						echo "</font>";
				?>
				
				</td></tr>
		<tr><td width="20%" class=write_cb> 설립일</td><td colspan="3" class=write_fl><?=$ext1_00?>&nbsp;년</td></tr>
		<tr><td class=write_cb width="20%"> 직원수</td><td class=write_fl width="30%"><?=$ext1_01?></td>
			  <?php /*?><td class=write_cb width="20%"> 학생수</td><td class=write_fl width="30%"><?=$ext1_02?></td></tr><?php */?>
		<tr><td class=write_cb> 주소</td><td class=write_fl colspan="3"><?=$ext3_02?>&nbsp;&nbsp;<?=$ext3_03?></td></tr>
		<tr><td class=write_cb>전화번호</td>
			<td class=write_fl>
								<? if ($member['mb_id']){ 
										echo $ext1_05."-".$ext1_06."-".$ext1_07;
								}  else {echo  "<font color=#FF4040>";
										echo "LOGIN 후 확인";
										echo "</font>";} ?></td>
			  <td class=write_cb> 홈페이지</td><td class=write_fl>
			   <?
					 $link = cut_str($view['link'][1], 20);
			   ?>
                <a href="<?php echo $view['link_href'][1] ?>" target="_blank"><?php echo $link ?></a>
                
               
			  </td></tr>
	 </table>
 </td></tr></table>

</td></tr></table>

<div class="title_top">모집요강</div>
			
<table class="table table-responsive" width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=14.2% class=write_cb>직종</td>
	  <td width=14.2% class=write_cb>근무형태</td>
	  <td width=14.2% class=write_cb>나이</td>
	  <td width=14.2% class=write_cb>성별</td>
	  <td width=14.2% class=write_cb>학력</td>
	  <td width=14.2% class=write_cb>경력</td>
	  <!--<td width=11% class=write_cb>수강대상</td>
	  <td width=11% class=write_cb>수업일수</td>-->
	  <td width=14.2% class=write_cb>모집인원</td>
</tr>

<tr><td width=14.2% class=write_fc><?=$ext2_00?></td>
	  <td width=14.2% class=write_fc><?=$ext2_01?></td>
      <td width=14.2% class=write_fc><?=$ext1_13?></td>
      <td width=14.2% class=write_fc><?=$ext2_02?></td>
      <td width=14.2% class=write_fc><?=$ext1_12?></td>
	  <td width=14.2% class=write_fc><?=$ext1_11?></td>
	  <?php /*?><td class=write_fc><?=$ext1_09?></td>
      <td class=write_fc><?=$ext2_15?></td><?php */?>
      <td class=write_fc><?=$ext1_10?>&nbsp;명</td>
</tr>

<? if($ext2_03){?>
<tr><td width=14.2% class=write_fc><?=$ext2_03?></td>
	  <td width=14.2% class=write_fc><?=$ext2_10?></td>
      <td width=14.2% class=write_fc><?=$ext2_11?></td>
      <td width=14.2% class=write_fc><?=$ext2_12?></td>
      <td width=14.2% class=write_fc><?=$ext2_13?></td>
	  <td width=14.2% class=write_fc><?=$ext2_14?></td>
	  <?php /*?><td width=14.2% class=write_fc><?=$ext2_16?></td>
      <td width=14.2% class=write_fc><?=$ext2_19?></td><?php */?>
      <td width=14.2% class=write_fc><?=$ext2_20?>&nbsp;명</td>
</tr>
<?}?>

<? if($ext1_21){?>
<tr><td width=14.2% class=write_fc><?=$ext1_21?></td>
	  <td width=14.2% class=write_fc><?=$ext1_22?></td>
      <td width=14.2% class=write_fc><?=$ext1_23?></td>
      <td width=14.2% class=write_fc><?=$ext1_24?></td>
      <td width=14.2% class=write_fc><?=$ext1_25?></td>
	  <tdwidth=14.2%  class=write_fc><?=$ext1_26?></td>
	  <?php /*?><td class=write_fc><?=$ext1_27?></td>
      <td class=write_fc><?=$ext1_28?></td><?php */?>
      <td width=14.2% class=write_fc><?=$ext1_29?>&nbsp;명</td>
</tr>
<?}?>

<? if($ext1_38){?>
<tr><td width=14.2% class=write_fc><?=$ext1_38?></td>
	  <td width=14.2% class=write_fc><?=$ext1_30?></td>
      <td width=14.2% class=write_fc><?=$ext1_31?></td>
      <td width=14.2% class=write_fc><?=$ext1_32?></td>
      <td width=14.2% class=write_fc><?=$ext1_33?></td>
	  <td width=14.2% class=write_fc><?=$ext1_34?></td>
	  <td width=14.2% class=write_fc><?=$ext1_35?></td>
      <td width=14.2% class=write_fc><?=$ext1_36?></td>
      <td width=14.2% class=write_fc><?=$ext1_37?>&nbsp;명</td>
</tr>
<?}?>

<? if($ext1_39){?>
<tr><td width=14.2% class=write_fc><?=$ext1_39?></td>
	  <td width=14.2% class=write_fc><?=$ext1_40?></td>
      <td width=14.2% class=write_fc><?=$ext1_41?></td>
      <td width=14.2% class=write_fc><?=$ext1_42?></td>
      <td width=14.2% class=write_fc><?=$ext1_43?></td>
	  <td width=14.2% class=write_fc><?=$ext1_44?></td>
	  <td width=14.2% class=write_fc><?=$ext1_45?></td>
      <td width=14.2% class=write_fc><?=$ext1_46?></td>
      <td width=14.2% class=write_fc><?=$ext1_47?>&nbsp;명</td>
</tr>
<?}?>
</table>
</td></tr></table>

<div class="title_top">전형방법/급여사항</div>


<table class="table table-responsive" width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td>
<table width=100% cellpadding=0 cellspacing=1 border=0>
<tr><td width=20% class=write_cb>제출서류</td>
	  <td width="80%" class=write_fl><?=$ext1_03?></td>
</tr>
<?php /*?><tr><td width=20% class=write_cb>시강유무</td>
	  <td width="80%" class=write_fl><?=$ext1_04?></td>
</tr><?php */?>
<tr><td width=20% class=write_cb>급여</td>
	  <td width="80%" class=write_fl> 
				<? if($ext1_14){
						echo "최저 :".$ext1_14."&nbsp;만원 ::";
						}
					if($ext1_15){
						echo ":: 최고 : ".$ext1_15."&nbsp;만원";
					}
						?>
						<font color=#FF0000><?=$ext1_08?></font></td>
</tr>
<tr><td width=20% class=write_cb>퇴직금</td>
	  <td width="80%" class=write_fl><?=$ext1_16?></td>
</tr>
<tr><td width=20% class=write_cb>마감일</td>
	  <td width="80%" class=write_fl><?=$view[wr_5]?></td>
</tr>

</table>
</td></tr></table>

<div class="title_top">접수방법</div>
<table class="table table-responsive" width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td>
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
<tr><td width=20% class=write_cb>인근교통</td>
	  <td width="80%" class=write_fl><?=$ext2_17?></td>
</tr>

</table>
</td></tr></table>

<?php /*?>지도보기
<table class="table table-responsive" width=100% cellpadding=10 cellspacing=0 border=0;>
<tr><td bgcolor=#F1F1F1>
<table class="table table-responsive" width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td>
<? if ($view[wr_3]) { // 임시필드인 wr_3에 주소가 있다면 네이버 api 지도를 출력 ?>

        <div align='center' style="padding:10px 0 0 0;">
		<?
		// 지도 표시 
		include_once "$board_skin_path/map.php"; 
		?>
		</div>
		<? } ?>
<? if (!$view[wr_3]) {
			echo "지도 준비중입니다.";
		}
?>
</td></tr></table>
</td></tr></table><?php */?>

<div class="title_top">추가내용</div>
    <section id="bo_vc">
        <h2 id="bo_v_atc_title">본문</h2>

        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            for ($i=1; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }

            echo "</div>\n";
        }
         ?>

        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
        <?php//echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

</section>
<section id="bo_v_atc">

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

        <!-- 스크랩 추천 비추천 시작 { -->
        <?php if ($scrap_href || $good_href || $nogood_href) { ?>
        <div id="bo_v_act">
            <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn_b01" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?>
            <?php if ($good_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="btn_b01">추천 <strong><?php echo number_format($view['wr_good']) ?></strong></a>
                <b id="bo_v_act_good"></b>
            </span>
            <?php } ?>
            <?php if ($nogood_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="btn_b01">비추천  <strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
                <b id="bo_v_act_nogood"></b>
            </span>
            <?php } ?>
        </div>
        <?php } else {
            if($board['bo_use_good'] || $board['bo_use_nogood']) {
        ?>
        <div id="bo_v_act">
            <?php if($board['bo_use_good']) { ?><span>추천 <strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
            <?php if($board['bo_use_nogood']) { ?><span>비추천 <strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
        </div>
        <?php
            }
        }
        ?>
        <!-- } 스크랩 추천 비추천 끝 -->
    </section>

    <?php
    include_once(G5_SNS_PATH."/view.sns.skin.php");
    ?>

    <?php
    // 코멘트 입출력
    include_once('./view_comment.php');
     ?>

    <!-- 링크 버튼 시작 { -->
    <div id="bo_v_bot">
        <?php echo $link_buttons ?>
    </div>
    <!-- } 링크 버튼 끝 -->

</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->
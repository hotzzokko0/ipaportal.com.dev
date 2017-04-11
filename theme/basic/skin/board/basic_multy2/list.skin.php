<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include (G5_SKIN_PATH.'/multi_category/lib.php');


// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

	//색상설정
	$title_bg = "#B5BEAD";		 // 타이틀 배경색
	$notice_bg = "#F3F7EB";		//공지사항 배경
	//$new_bg = "#FFFFF6";		//새글 배경


?>

 <!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
	<div style="clear:both;">
        <div>
            <?php echo MC::category_search_form($sca);?>
        </div>
    </div>

<div style="height:10px;"></div>
<!-- 게시판 검색 시작 { -->
<fieldset id="bo_sch" class="pull-right">
    <!--<legend>게시물 검색</legend>-->

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input required" size="15" maxlength="20">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>
<!-- } 게시판 검색 끝 -->
<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>
<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

    <!-- 게시판 카테고리 시작 { 
    <?//php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?//php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?//php echo $category_option ?>
        </ul>
    </nav>
    <?//php } ?>
     } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>총 <strong><?php echo number_format($total_count) ?></strong>개 /</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
            <?php /*?><?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?><?php */?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">제목</th>
            
            <th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
            <th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></th>
			<th scope="col">모집상황</th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0, $iMax = count($list); $i<$iMax; $i++) {
            $onMouseOutBackgroundColor = $list[$i]['icon_new'] ?: $new_bg;
            $onMouseOutBackgroundColor = $list[$i]['is_notice'] ?: $notice_bg;
            $onMouseOutBackgroundColor = $onMouseOutBackgroundColor ? $onMouseOutBackgroundColor : '#FFFFFF';
            ?>
            <tr onMouseOver="this.style.backgroundColor='#F7F7F7';"
                onMouseOut="this.style.backgroundColor='<?php echo $onMouseOutBackgroundColor ?>'" bgcolor="<?php echo $onMouseOutBackgroundColor ?>">
            <td class="td_num">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['num'];
             ?>
            </td>
            <?php if ($is_checkbox) { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
            <td class="td_subject">
			<?
			$ex1_filed = explode("|",$list[$i][wr_1]); 
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
			$ext1_21  = $ex1_filed[21];//과목2
			$ext1_22  = $ex1_filed[22];//근무형태3
			$ext1_23  = $ex1_filed[23];//나이3
			$ext1_24  = $ex1_filed[24];//성별3
			$ext1_25  = $ex1_filed[25];//학력3
			$ext1_26  = $ex1_filed[26];//경력3
			$ext1_27  = $ex1_filed[27];//수강대상3
			$ext1_28  = $ex1_filed[28];//수업일수3
			$ext1_29  = $ex1_filed[29];//모집인원3
			$ext1_30  = $ex1_filed[30];//근무형태4
			$ext1_31  = $ex1_filed[31];//나이4
			$ext1_32  = $ex1_filed[32];//성별4
			$ext1_33  = $ex1_filed[33];//학력4
			$ext1_34  = $ex1_filed[34];//경력4
			$ext1_35  = $ex1_filed[35];//수강대상4
			$ext1_36  = $ex1_filed[36];//수업일수4
			$ext1_37  = $ex1_filed[37];//모집인원4
			$ext1_38  = $ex1_filed[38];//과목4
			$ext1_39  = $ex1_filed[39];
			$ext1_40  = $ex1_filed[40];
			$ext1_41  = $ex1_filed[41];
			$ext1_42  = $ex1_filed[42];
			$ext1_43  = $ex1_filed[43];
			$ext1_44  = $ex1_filed[44];
			$ext1_45  = $ex1_filed[45];
			$ext1_46  = $ex1_filed[46];
			$ext1_47  = $ex1_filed[47];

			$ex2_filed = explode("|",$list[$i][wr_2]); 
			$ext2_00  = $ex2_filed[0]; //비었음
			$ext2_01  = $ex2_filed[1]; //비었음
			$ext2_02  = $ex2_filed[2]; //비었음
			$ext2_03  = $ex2_filed[3]; //비었음
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
			$ext2_19  = $ex2_filed[19]; //비었음
			$ext2_20  = $ex2_filed[20];//모집인원2
		?>
                <?php
                echo $list[$i]['icon_reply'];
                 ?>
                

                <a href="<?php echo $list[$i]['href'] ?>">
                    <?php echo $list[$i]['subject'] ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
                </a>
				<? echo "<font color=#797979>";
						echo	join('>', MC::getNowCategories($list[$i]['ca_name']));
						echo "</font>";
						//echo "<br>";
						//echo "<font color=#454545>";
						echo "[".$ext2_00."]";
				if($ext2_03){
						echo "[".$ext2_03."]";
						}
				if($ext1_21){
						echo "[".$ext1_21."]";
						}
				if($ext1_38){
						echo "[".$ext1_38."]";
						}
				if($ext1_39){
						echo "[".$ext1_39."]";
						}
						echo "</font>";
						?>
            <!--ONVISUAL MR.KIM DELETE-->
			<?php /*?><a href='#' onclick="javascript:window.open('<?=$board_skin_url?>/new_1.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>', '', 'left=200, top=100, width=780, height=650, scrollbars=1');"><img src="<?=$board_skin_url?>/img/simple.gif" border=0 align=absmiddle></a><?php */?>


                <?php
                // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

               // if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
               // if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
               // if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
               // if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
               // if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

                 ?>
            </td>
           
            <td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
            <td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
			 <td class="td_name sv_use" align="center">
			<? 
				if ($list[$i][wr_5]){ // 기간설정 
					// 현재시간
					$current_time = date("Y-m-d",time()); //오늘날짜출력 
					$notice_time  = $list[$i][wr_5];
					
					$last_time =  intval((strtotime($notice_time)-strtotime($current_time)) / 86400); // 나머지 날짜값
					
					}
					//남은 날이 -  이면, 마감표시
					if($last_time >= 0){ 
						echo "<img src='{$board_skin_url}/img/icon_ing.gif' border=0>";
                    }
                    else if($last_time < 0){
                        echo "<img src='{$board_skin_url}/img/icon_end.gif' border=0>";
                    }
			?>
			</td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>


<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->

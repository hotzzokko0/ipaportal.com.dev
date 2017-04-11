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
?>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
	<div class="board_top">
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
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">        	
        <div id="bo_list_total">
            <span>총 <strong><?php echo number_format($total_count) ?></strong>명 /</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
		<? if($member[mb_id]){?><li><a href="<?=G5_BBS_URL?>/board.php?bo_table=test_03&sca=&sfl=mb_id,1&stx=<?=$member[mb_id]?>" class="btn_b01">내 이력서 찾기</a></li><? } ?>
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
            <?php /*?><?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?><?php */?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="../../p_form/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
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
           <!-- <th scope="col">글쓴이</th>-->
            <th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
            <th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
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
			$ex3_filed = explode("|",$list[$i][wr_3]); 
			$ext3_00  = $ex3_filed[0];
			$ext3_01  = $ex3_filed[1];
			$ext3_02  = $ex3_filed[2];
			$ext3_03  = $ex3_filed[3];

			$ex4_filed = explode("|",$list[$i][wr_4]); 
			$ext4_00  = $ex4_filed[0];
			$ext4_01  = $ex4_filed[1];
			$ext4_02  = $ex4_filed[2];
			$ext4_03  = $ex4_filed[3];
			$ext4_04  = $ex4_filed[4];
			$ext4_05  = $ex4_filed[5];
			$ext4_06  = $ex4_filed[6];
			$ext4_07  = $ex4_filed[7];
			$ext4_08  = $ex4_filed[8];
			$ext4_09  = $ex4_filed[9];
			$ext4_10  = $ex4_filed[10];
			$ext4_11  = $ex4_filed[11];
			$ext4_12  = $ex4_filed[12];
			$ext4_13  = $ex4_filed[13];
			$ext4_14  = $ex4_filed[14];
			$ext4_15  = $ex4_filed[15];
			$ext4_16  = $ex4_filed[16];
			$ext4_17  = $ex4_filed[17];
			$ext4_18  = $ex4_filed[18];
			$ext4_19  = $ex4_filed[19];
			$ext4_20  = $ex4_filed[20];

			 $date = date('Y', strtotime("now"));
			  $age = $date -  $ext4_01;
			 
            echo $nobr_begin;
            //echo $list[$i][reply];
            //echo $list[$i][icon_reply];
                       
			if(!$is_admin && $list[$i][mb_id] != $member[mb_id] && $list[$i][wr_5]==1){
				echo "<font color=#797979>{$list[$i][subject]}</font><br>";
				echo "[구직완료]&nbsp;";
				echo "<font color=#797979>[".$age."세]&nbsp;".$ext4_10."&nbsp;".$ext4_11."&nbsp;".$ext4_09."&nbsp;".$ext4_12."&nbsp;(희망지역)&nbsp;".$ext4_13."&nbsp;(경력)&nbsp;".$ext4_14."</font>";
				}
			else {
                echo "<a href='{$list[$i][href]}'>{$list[$i][subject]}</a>";
				//echo " " . $list[$i][icon_new];
				// echo " " . $list[$i][icon_file];
				// echo " " . $list[$i][icon_link];
				echo " " . $list[$i][icon_hot];
				echo " " . $list[$i][icon_secret];
				//echo "<br>";
				echo "[".$age."세]&nbsp;".$ext4_10."&nbsp;<font color=#FF0000>".$ext4_11."</font>&nbsp;".$ext4_09."&nbsp;".$ext4_12."&nbsp;<span class='list_view'>(희망지역)</span>&nbsp;".$ext4_13."&nbsp;<span class='list_view'>(경력)</span>&nbsp;".$ext4_14;
			}

            if ($list[$i][comment_cnt]) 
                echo " <a href=\"{$list[$i][comment_href]}\"><span class='comment'>{$list[$i][comment_cnt]}</span></a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

           
            echo $nobr_end;
            ?>
			 
            </td>
            <!--<td class="td_name sv_use"><?//php echo $list[$i]['name'] ?></td>-->
            <td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
            <td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
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

<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<link rel="stylesheet" href="<?=$board_skin_url?>/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.onepageawards.com/wp-content/themes/opa/style.css">
<script type="text/javascript" src="<?=$board_skin_url?>/bootstrap.min.js"></script>

	<div class="container block">
		<div class="row">
        
        <!-- 게시물 검색 시작 { -->
        <fieldset id="bo_sch" class="pull-right m-t-5">
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
        <!-- } 게시물 검색 끝 -->

        <h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>
        <!--2017-02-28 Onvisual MR.KIM Add-->
        <!-- 게시판 페이지 정보 및 버튼 시작 { -->
        <div class="bo_fx">
            <div id="bo_list_total">
                <span>총 <strong><?php echo number_format($total_count) ?></strong>개 /</span>
                <?php echo $page ?> 페이지
            </div>
    
            <?php if ($rss_href || $write_href) { ?>
                <ul class="btn_bo_user">
                    <?php if ($rss_href) { ?>
                        <li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
                    <?php /*?><?php if ($admin_href) { ?>
                        <li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
                    <?php if ($write_href) { ?>
                        <li><a href="<?php echo $write_href ?>" class="btn btn-default">글쓰기</a></li><?php } ?><?php */?>
                </ul>
            <?php } ?>
        </div>
        <!-- } 게시판 페이지 정보 및 버튼 끝 -->
        
		 <? for ($i=0; $i<count($list); $i++) {
					if($i>0 && ($i % $bo_gallery_cols == 0))
						$style = 'clear:both;';
					else
						$style = '';
					if ($i == 0) $k = 0;
					$k += 1;
					if ($k % $bo_gallery_cols == 0) $style .= "margin:0 !important;";
				 ?>
			<?
			if ($list[$i]['is_notice']) { // 공지사항  ?>
				<strong style="width:<?php echo $board['bo_gallery_width'] ?>px;height:<?php echo $board['bo_gallery_height'] ?>px">공지</strong>
			<? } else {
				$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);

				if($thumb['src']) {
					$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'" class="img-responsive">';
				} else {
					$img_content = '<span style="width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px">no image</span>';
				}

			}
			 ?>													
			<div class="site col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<? if ($is_checkbox) { ?>
					<label for="chk_wr_id_<? echo $i ?>" class="sound_only"><? echo $list[$i]['subject'] ?></label>
					<input type="checkbox" name="chk_wr_id[]" value="<? echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<? echo $i ?>">
			    <? } ?>
					<div class="site-thumb">
						<a href="<?php echo $list[$i]['href'] ?>" ng-click="view(2527)"><?=$img_content?></a>
					</div>
					<div class="site-details">
						<div class="site-meta">
							<p class="title"><a href="<?php echo $list[$i]['href'] ?>"><?=$list[$i]["wr_subject"]?></a></p>
							<!--2017-02-28 ONVISUAL MR.KIM  DELETE-->
							<?php /*?><p>by <?=$list[$i]["name"]?></p><?php */?>
						</div>
						<div class="site-links">
							<ul class="list-inline pull-left">
								<li><i class="fa fa-thumbs-up"></i>&nbsp;<small><strong><?=$list[$i]['num'];?></strong></small></li>
								<?php if ($is_good) { ?><li><span class="gall_subject">추천 </span><strong><?php echo $list[$i]['wr_good'] ?></strong></li><?php } ?>
                <?php if ($is_nogood) { ?><li><span class="gall_subject">비추천 </span><strong><?php echo $list[$i]['wr_nogood'] ?></strong></li><?php } ?>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<?}?>	
		</div>
		<? if ($list_href || $is_checkbox || $write_href) { ?>
		<div class="bo_fx">
		<? if ($is_checkbox) { ?>
			<ul class="btn_bo_adm">
				<li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
				<li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
				<li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
			</ul>
		<? } ?>

        <? if ($list_href || $write_href) { ?>
			<ul class="btn_bo_user">
				<?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><? } ?>
                <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
				<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><? } ?>
			</ul>
        <? } ?>
		</div>
	    <? } ?>        
	</div>


	
	

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>

<?php /*?><!-- 게시물 검색 시작 { -->
<fieldset id="bo_sch">
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
<!-- } 게시물 검색 끝 --><?php */?>

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

    if (sw == 'copy')
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

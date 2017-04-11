<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include (G5_SKIN_PATH.'/multi_category/lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<?
$ex3_filed = explode("|",$view[wr_3]); 
$ext3_00  = $ex3_filed[0];
$ext3_01  = $ex3_filed[1];
$ext3_02  = $ex3_filed[2];
$ext3_03  = $ex3_filed[3];

$ex4_filed = explode("|",$view[wr_4]); 
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
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->
<?php /*?><div id="bo_v_table"><?php echo $board['bo_subject']; ?></div><?php */?>

<section id="bo_v_info">
        <h2>페이지 정보</h2>
        작성자 :<strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <span class="sound_only">작성일</span><strong><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>
        조회 :<strong><?php echo number_format($view['wr_hit']) ?>회</strong>
        댓글 :<strong><?php echo number_format($view['wr_comment']) ?>건</strong>
</section>
    
<article id="bo_v" style="width:<?php echo $width; ?>">
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
                <a href="<?php echo $view['../../p_form/file'][$i]['href'];  ?>" class="view_file_download">
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

    <?php
    if (implode('', $view['link'])) {
     ?>
     <!-- 관련링크 시작 { -->
    <section id="bo_v_link">
        <h2>관련링크</h2>
        <ul>
        <?php
        // 링크
        $cnt = 0;
        for ($i=1; $i<=count($view['link']); $i++) {
            if ($view['link'][$i]) {
                $cnt++;
                $link = cut_str($view['link'][$i], 70);
         ?>
            <li>
                <a href="<?php echo $view['../../p_form/link_href'][$i] ?>" target="_blank">
                    <img src="<?php echo $board_skin_url ?>/img/icon_link.gif" alt="관련링크">
                    <strong><?php echo $link ?></strong>
                </a>
                <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 관련링크 끝 -->
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
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;"><i class="fa fa-trash" aria-hidden="true">&nbsp;삭제</i></a></li><?php } ?>
            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;"><i class="fa fa-fw fa-copy"></i>&nbsp;복사</i></a></li><?php } ?>
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

<div class="title_top">기본정보</div>
<div style="height:10px;"></div>

<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td width="140" align="center" class="photo">

			<? 
        // 파일 출력
            if ($view[file][0][view]) {
                $image = $view[file][0][file];
				$file1_v= "<img src='$g5[path]/data/file/$board[bo_table]/$image' width='140' height=157 align='center' border=0>";
				echo get_view_thumbnail($file1_v);
				// echo get_view_thumbnail($view['file'][$i]['view']);
				}
			else if (!$view[file][0][view]){
				echo "<img src='$board_skin_url/img/no_img.gif' width='140' height=157 align='absmiddle' border=0>";
			}
			
			 ?>


  </td>
    <td width="10"></td>
 
  <td width="">
	 <table width="100%" height=100 cellpadding="0" cellspacing="0" bgcolor=#CCCCCC>
	 <tr><td>
		<table width=100% cellpadding=0 cellspacing=1>
		<tr><td width="20%" class=write_cb> 이름</td><td width="30%" class=write_fl><b> <?=$ext4_00?></b></td>
			  <td  width="20%" class=write_cb> 나이</td><td width="30%" class=write_fl><?=$ext4_01?>&nbsp;년생&nbsp;&nbsp;
			  <?
			  $date = date('Y', strtotime("now"));
			  $age = $date -  $ext4_01;
			  echo "(".$age."세)";
			  ?>
			  
			  
			  </td>
			  </tr>
		<tr><?php /*?><td class=write_cb> 지원과목</td><td class=write_fl><b><?=$ext4_11?></b></td><?php */?>
			  <td class=write_cb> 성별</td><td class=write_fl><b><?=$ext4_10?></b></td>
              <td class=write_cb> 근무형태</td><td class=write_fl><b><?=$ext4_12?></b></td></tr>

		<tr><td class=write_cb> 희망근무지역</td><td class=write_fl><b><?=$ext4_13?></b></td></td>
			  <td class=write_cb> 경력</td><td class=write_fl><b><?=$ext4_14?></b></td></tr>
		
		<tr><td class=write_cb> 희망보수</td><td class=write_fl>
								<? if($ext4_15){
									echo "<b>월&nbsp;".$ext4_15."&nbsp;만원";
									}
								?>
								<b><?=$ext4_08?></b></td>
            <td class=write_cb> 전화번호</td><td class=write_fl>
				<? if ($member[mb_id]) {
					echo "<b>";
				echo $ext4_02."-".$ext4_03."-".$ext4_04;
				echo "</b>";
				}
				else {
					echo "<font color=#FF0000>";
					echo "로그인후 확인";
					echo "</font>";
				}
				?>
			</td></tr>
			
		<!--
		<tr><td class=write_cb> 지원</td><td class=write_fl colspan="3">
				<?
				/*
				  echo "<font color=#797979>";
						echo	join('>', MC::getNowCategories($view['ca_name']));
						echo "</font>";
				*/
				?>
		</td></tr>
	-->
	 </table>
		
 </td></tr></table>

</td></tr></table>
<br><br>

<div class="title_top">학력/경력/자격증</div>
<div style="height:10px;"></div>
<!-- 학력사항-->
<table width="100%" cellspacing=1 cellpadding=3 bgcolor="#CCCCCC">
		<col bgcolor="#FFFFFF" width="30%"></col>
		<col bgcolor="#FFFFFF" width="70%"></col>
		<tr height="30">
			<td class="write_cb"><b>기 간</b></td>
			<td class="write_cb"><b>학력 / 경력</b></td>
		</tr>
        <div class="write_fl">
		<?
			$wr_body_1 = explode("|",substr($view[wr_1], 1));
			$wr_body_2 = explode("|",substr($view[wr_2], 1));			
			for ($i = 0;  $i < count($wr_body_1); $i++) {
				echo
					"
					<tr onmouseover=\"this.style.backgroundColor='#F1F1F1';return true;\" onMouseOut=\"this.style.backgroundColor='';return true;\">
						<td height=28 style='padding-left:10px;'>$wr_body_1[$i]</td>
						<td style='padding-left:10px;'>$wr_body_2[$i]</td>
					</tr>
					";
			}
		?>
		</div>
		</table>

<!-- 학력 끝-->

<br><br>

<div class="title_top">기타소개</div>
<div style="height:10px;"></div>

   <!--<section id="bo_v_atc">-->
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

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>
		</section>
		<section>
        <!-- 스크랩 추천 비추천 시작 { -->
        <?php if ($scrap_href || $good_href || $nogood_href) { ?>
        <div id="bo_v_act">
            <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn_b01" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?>
            <?php if ($good_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $good_href.'../../p_form/&amp;'.$qstr ?>" id="good_button"><img src="<?=$board_skin_url?>/img/icon_good.gif" border=0 alt="추천"> <strong><?php echo number_format($view['wr_good']) ?></strong></a>
                <b id="bo_v_act_good"></b>
            </span>
            <?php } ?>
            <?php if ($nogood_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $nogood_href.'../../p_form/&amp;'.$qstr ?>" id="nogood_button"><img src="<?=$board_skin_url?>/img/icon_nogood.gif" border=0 alt="비추천"><strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
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
    include_once('../../p_form/view_comment.php');
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
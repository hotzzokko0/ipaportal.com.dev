<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
//include_once($g4['path'].'/navermap.php');
?>
<script type="text/javascript">
$(function(){
	$("#imgList li>img").hover(function(){
		$("#mainImg img").attr('src', $(this).attr('src'));
	});

});
</script>
<br/>
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>
<div style="clear:both; height:30px;">
    <!-- 링크 버튼 -->
    <div style="float:right;">
    <?
    ob_start();
    ?>
    <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_url/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_url/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>

    <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_url/img/btn_list_search.gif' border='0' align='absmiddle'></a> "; } ?>
    <? echo "<a href=\"$list_href\"><img src='$board_skin_url/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>
    <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_url/img/btn_modify.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_url/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_url/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_url/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
    <?
    $link_buttons = ob_get_contents();
    ob_end_flush();
    ?>
    </div>
</div>

<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>

<?
	// 파일 출력
	$sql = "select * from $g4[board_file_table] where `bo_table`='$bo_table' and `wr_id`='$wr_id'";
	$result=sql_query($sql);

	for($i=0 ; $row = sql_fetch_array($result) ; $i++){
		//echo "<img src =$g4[path]/data/file/$bo_table/$row[bf_file] width=350 height=250 border=0 $style>";
		$thumimg2[$i]="<img src =$g4[path]/data/file/$bo_table/$row[bf_file] width=350 height=250 border=0>";
		$thumimg[$i]="<img src =$g4[path]/data/file/$bo_table/$row[bf_file] width=140 height=140 border=0>";
	}
?>
<style>

	.viewTable{border-collapse:collapse; width:100%; margin-top:10px;padding:0;}
	#mainImg{text-align:center;padding-top:5px;}
	#mainImg img{width:300px;height:200px;}
	#imgList{list-style:none; padding:0;*zoom:1;margin:8px 5px 5px;}
	#imgList:after{content:""; display:block; clear:both;}
	#imgList li{float:left;padding:0px;margin:0px;}
	#imgList li img{width:60px;height:40px;}

	.viewInfo{border-collapse:collapse; border-top:1px solid #ddd;border-bottom:1px solid #ddd;width:100%;}
	.viewInfo th, .viewInfo td{font-size:12px;padding:11px 8px 10px 18px;text-align:left;border-bottom:1px solid #ededed;}
	/*.viewInfo th{background:url("*/<?//=$board_skin_url?>/*/img/map_icon.gif") 4px 12px no-repeat;}*/
</style>
<table class="viewTable">
	<colgroup>
		<col width='250px' />
		<col width='10px' />
		<col />
	</colgroup>
	<tr>
		<td style='border:1px solid #ddd;'>
			<div id="mainImg">
                <?php
                $imgFilePath = $board_skin_url . '/img/no_img.png';
                if ($view['file'][0]['path']) {
                    $imgFilePath = $view['file'][0]['path'].'/'.$view['file'][0]['file'];
                }
                ?>
                <img src='<?= $imgFilePath ?>' />
            </div>
		</td>
		<td></td>
		<td valign='top'>
			<table class='viewInfo'>
				<tr>
					<th colspan="2"><h2><?=$view['wr_subject']?></h2></th>
				</tr>
                <tr>
                    <th width='20%;'>지역</th>
                    <td width='80%;'><?=$view['ca_name']?></td>
                </tr>
                <tr>
                    <th width='20%;'>타입</th>
                    <td width='80%;'><?=getTypeText($view['wr_type'])?></td>
                </tr>
                <tr>
                    <th>이메일</th>
                    <td>
                        <?php
                        if ($view['wr_email']) {
                        ?>
                            <a href="mailto:<?= $view['wr_email'] ?>"><?= $view['wr_email'] ?></a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>홈페이지주소</th>
                    <td>
                        <?php
                        if ($view['wr_homepage']) {
                        ?>
                            <a target="_blank" href="<?= $view['wr_homepage'] ?>"><?=$view['wr_homepage']?></a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
				<tr>
					<th>(주소)호수</th>
					<td><?=$view['wr_1']?></td>
				</tr>
                <tr>
                    <th>대표자</th>
                    <td><?=$view['wr_2']?></td>
                </tr>
				<tr>
					<th>사업자등록번호</th>
					<td><?=$view['wr_3']?></td>
				</tr>
				<tr>
					<th>대표전화번호</th>
					<td>
                        <?php
                        if ($view['wr_4']) {
                            ?>
                            <a href="tel:<?=$view['wr_4']?>"><?= $view['wr_4'] ?></a>
                            <?php
                        }
                        ?>
                    </td>
				</tr>
				<tr>
					<th>팩스번호</th>
					<td><a <?php echo $view['wr_5'] ? 'href=fax:' . $view['wr_5'] : ''; ?>><?=$view['wr_5']?></a></td>
				</tr>
				<tr>
					<th>특허출원</th>
					<td><?=$view['wr_6']?>원</td>
				</tr>
                <tr>
                    <th>상표출원</th>
                    <td><?=$view['wr_7']?>원</td>
                </tr>
                <tr>
                    <th>전문가수</th>
                    <td><?=$view['wr_8']?></td>
                </tr>
                <tr>
                    <th>전문분야</th>
                    <td><?=$view['wr_9']?></td>
                </tr>
                <tr>
                    <th>주요경험</th>
                    <td><?=$view['wr_10']?></td>
                </tr>
                <tr>
                    <th>주요고객</th>
                    <td><?=$view['wr_11']?></td>
                </tr>
			</table>
		</td>
	</tr>
</table>

<div style='border-bottom:1px solid #ddd;padding:20px 10px;'>
<?=$view[content];?>
</div>
<?
// 코멘트 입출력
include_once("view_comment.skin.php");
?>
<div style="float:right; margin-top:10px;">
<?=$link_buttons?>
</div>
</td></tr></table>


<script language="JavaScript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}
</script>

<?php
if ($view['file'][0]['file']) {
?>
<script language="JavaScript" src="<?= G5_JS_URL ?>/board.js"></script>
<script language="JavaScript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>
<?php
}
?>
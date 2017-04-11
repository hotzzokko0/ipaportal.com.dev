<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

						<dl id="latest">
                        	<!--ONVISUAL MR.KIM DELETE-->
							<?php /*?><dt class="latestblue"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?><!-- <img src="<?=$latest_skin_url?>/title.gif" alt="">--></a></dt><?php */?>
<? for ($i=0; $i<count($list); $i++) { ?>
<dd>
            <?

            echo "<a href='{$list[$i]['href']}'>";

             echo "{$list[$i]['subject']}";
            echo "</a>";


            ?>
</dd>

<? } ?>

<? if (count($list) == 0) { ?><dd>게시물이 없습니다.</dd><? } ?>
						</dl>
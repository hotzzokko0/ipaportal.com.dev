<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
if (isset($latest_skin_url)) {
    add_stylesheet('<link rel="stylesheet" href="' . $latest_skin_url . '/style.css">', 0);
}
?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->


	<div class="order_best">
			<!--<strong class="tit">오늘의 핫클릭</strong>-->
			<ul>
			    <?php for ($i=0; $i<count($list); $i++) { 
				$a= $i+1;
				?>

				<li>
				<?
				echo "<a href=\"".$list[$i]['href']."\"><strong class=\"order_num\" style=\"margin-right: 5px;\">".$a."</strong> <span class=\"order_tit\">".$list[$i]['subject']."</span></a>";
				?>
				</li>
				<?}?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
			</ul>
		</div>





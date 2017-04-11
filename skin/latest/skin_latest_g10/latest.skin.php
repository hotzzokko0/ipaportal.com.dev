<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width = 290;
$thumb_height = 220;


/*
프로젝트명 : 시즌10' CREATE GNUBOARD SKIN
스킨튜닝개발자 : 흑횽TM 
개발자사이트주소 : http://shoponex.com/?theme=skin
라이선스 : 오픈소스 플러그인 라이선스 참고. 
기타 라이선스 : 그누보드 사이트 (sir.kr)를 제외한 타 사이트에서 재배포 금지.
*/


?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">



<div class="category_section">
<div class="bx_slider1">

<?php
for ($i=0; $i<count($list); $i++) {	
	$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height);

	if($thumb['src']) {
		$thumb_url = $thumb['src'];
	} else {
		$thumb_url = $latest_skin_url."/img/no-image.gif";
	}
?>
	<div class="slide">
	<div class="inner_slide">
	  <a href="<?php echo $list[$i]['href']?>"><img src="<?php echo $thumb['src']?>" alt="" /></a>
	  <ul>
		<li><?php echo $list[$i]['subject']; ?></li>
	  </ul>
	</div>
  </div>
		
	
<?php	}	?>		
</div>
</div>

<div style="clear:both"></div>

<?php /*?><script src="<?=$latest_skin_url?>/js/jquery.bxslider.js"></script><?php */?>
<script type="text/javascript" src="<?php echo $latest_skin_url ?>/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?php echo $latest_skin_url ?>/js/jquery.bxslider.min.js"></script>
<script>
    $(function() {    


	$('.bx_slider1').bxSlider({
		//slideWidth: 200,
		slideWidth: 270,
		minSlides: 1,
		maxSlides: 3,
		moveSlides: 1,
		slideMargin: 5,
		auto: true,
		autoControls: true,
		autoHover: true
	  });


    });
  </script>






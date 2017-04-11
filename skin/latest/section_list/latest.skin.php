<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width=100;
$thumb_height=100;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
//add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<script type="text/javascript" src="<?php echo $latest_skin_url ?>/jquery.totemticker.js"></script>

<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'auto',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
			});
		});
	</script>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="section_list bdwrap">
	<div class="section-title">
        <h3 class="stitle"><i class="fa fa-bell-o"></i>&nbsp;<?php echo $bo_subject;?></h3>
    </div>
    <ul id="vertical-ticker">
    <?php
        for ($i=0; $i<count($list); $i++) {
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height);
            if($thumb['src']) {
                $img = '<img src="'.$thumb['src'].'" alt="'.$list[$i]['subject'].'" width="'.$thumb_width.'" height="'.$thumb_height.'">';
            } else {
                $img = "NO IMAGE";
            }?>
        <li>
            <div class="img"><a href="<?php echo $list[$i]['href'];?>"><span class="roll sports"></span><?php echo $img;?></a></div>
            <div class="inner">
				<p class="tit"><a href="<?php echo $list[$i]['href'];?>"><?php echo $list[$i]['subject'];?></a></p>
                <p class="desc"><?php echo cut_str(strip_tags($list[$i]['wr_content']),50);?></p>
                <p class="txt"><?php echo $list[$i]['datetime'];?></p>
            </div>
        </li>
    <?php }?>
    </ul>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
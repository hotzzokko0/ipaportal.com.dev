<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width=80;
$thumb_height=80;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/bootstrap.min.css">', 0);
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="section_basic">
	<?php /*?><h3>
	    <?php echo $bo_subject;?>
	</h3><?php */?>	    
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <div class="inner">
	        
		    <a cless="tit" href="<?php echo $list[$i]['../../../section_basic/href'];?>"><?php echo $list[$i]['subject'];?></a>
		    <?php
                        if ($list[$i]['comment_cnt'])
                            echo $list[$i]['comment_cnt'];

                        echo "</a>";

                        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
                        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

                        if (isset($list[$i]['icon_new'])) echo " " . $list[$i]['icon_new'];
                        if (isset($list[$i]['icon_hot'])) echo " " . $list[$i]['icon_hot'];
                        if (isset($list[$i]['icon_secret'])) echo " " . $list[$i]['icon_secret'];
                    ?>
		
		<span class="txt pull-right text-muted"><?php echo $list[$i]['datetime'];?></span>
            </div>
        </li>
    <?php }?>
    </ul>
    <?php /*?><div class="lt_more text-center"><button><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">자세히 보기</a></button></div><?php */?>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
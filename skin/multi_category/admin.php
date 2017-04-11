<?php
/**
 * Hierarchical category for GNUBOARD
 * Ajax execute
 * @author eyesonlyz{at}nate.com
 * @created 2011-08-11
 * @modified 2011-08-12
 */
require_once "./_common.php";
if(!$board){
	echo "<script>alert('존재하지 않는 게시판 입니다');history.back();</script>";
	exit;
}
if($board['bo_use_category']!=1){
	echo "<script>alert('게시판 카테고리사용을 체크하시기 바랍니다');history.back();</script>";
	exit;
}
if (!$is_admin){
	if($is_member){
		echo "<script>alert('관리자만 접속가능합니다');history.back();</script>";
	}else{
		echo "<script>location.href='G5_BBS_URL/login.php?url={$_SERVER['REQUEST_URI']}';</script>";
	}
	exit;
}else if($is_admin!='super' && $is_admin!='board'){
	echo "<script>alert('관리자만 접속가능합니다');history.back();</script>";
	exit;
}

if(!$__mc){
	$__mc = new MC($bo_table);
}
if(!$__mc->isInstalled()){
	if(empty($g5)){
		die("그누보드 없음");
	}

	if($__mc->install()){
		echo '<script>location.reload();</script>';
	}
	//return;
}	

$current = NULL;
$parents = array();
$parents_pks = array();
$path_admin = G5_URL.'/skin/multi_category/admin.php';
$path_ajax = G5_URL.'/skin/multi_category/ajax.php';
if(!empty($_GET['mc'])){
	$categories = $__mc->getChilds($_GET['mc'],'*');
	$current = $__mc->get($_GET['mc']);
	$parents = $__mc->getParents($current);
	foreach($parents as $row){
		$parents_pks[$row->mc] = $row->mc;
	}
}else{
	$categories = $__mc->getChilds(NULL,-1);
}
$total = $__mc->getTotal();
$max_depth = $__mc->getMaxDepth();
if(!empty($mode) && $mode=='download'){//다운
	header("Pragma: public"); 
    header("Expires: 0"); 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",FALSE);
	if(strstr($_SERVER["HTTP_USER_AGENT"],"MSIE")==FALSE) { 
		header("Content-Type: application/force-download"); 
		header('Content-Description: File Transfer'); 
	}
	header("Content-Disposition: attachment; filename=\"category.txt\";" ); 
	foreach($categories as $row){
		echo str_repeat("\t",$row->depth).stripslashes($row->title)."\r\n";
	}
	exit;
}
require "head.php";
?>
		<script type="text/javascript">
			var _mc_modify = 0;
			function opt_ajax(v,mode)
			{
				if(mode=='modify'){					
					if(_mc_modify && _mc_modify!=v){
						document.getElementById('btn-mc-add-'+_mc_modify).innerText = '추가';
						document.getElementById('mc_txt_'+_mc_modify).value = '';
					}
					var el = document.getElementById('mc_txt_'+v);
					el.value = document.getElementById('oct-'+v).innerText;
					_mc_modify = v;
					document.getElementById('btn-mc-add-'+v).innerText = '수정';
					return;					
				}else{
					//_mc_modify = null;
				}
				if(mode=='remove'){
					if(!confirm("삭제하시겠습니까?")){
						return;
					}
				}
				var obj = document.getElementById('opt-category-js');
				var src = '<?php echo $path_ajax;?>?bo_table=<?php echo $bo_table;?>&mode='+mode+'&mc='+v+'&dummy='+(new Date().getTime() / 1000);
				if(mode=='add'){
					var el = document.getElementById('mc_txt_'+v);
					if(!el.value){
						alert("카테고리명을 입력해 주세요");
						el.focus();
						return;
					}
					src +='&title='+el.value;
					if(_mc_modify){
						src +='&mode=modify';
					}
				}
				obj.src=src;
			}
		</script>
		<?php if($total === 0):?>
		<table>
			<tr>
				<td><input type="text" id="mc_txt_"><button onclick="opt_ajax('','add')">추가</button></td>
			</tr>
			<tr>
				<td>
					<form method="post" enctype="multipart/form-data" action="<?php echo $path_ajax;?>">
						<input type="hidden" name="bo_table" value="<?=$bo_table;?>" />
						<input type="hidden" name="mode" value="upload" />
						<input type="file" name="ufile"/><button type="submit">확인</button>
					</form>
				</td>
			</tr>
		</table>
		<?php endif;?>
		<div id="tbar">
		<!--아 몰라~ 없애버려~	
		<a href="index.php">게시판목록</a>&gt;
		 -->
		<?php echo $board['bo_subject'];?> 멀티카테고리 
		</div>
		<div style="padding:4px;border-bottom:2px #bbb solid;margin-bottom:4px;background-color:#efefef">
		<strong>"<span style="color:red"><?php echo $board['bo_subject'];?></span>" 카테고리 </strong> | 
		<strong><a href="<?php echo G5_URL ?>/bbs/board.php?bo_table=<?php echo $bo_table;?>">게시판 바로가기</a></strong> | 
		<strong><a href="<?php echo $path_admin;?>?mode=download&bo_table=<?php echo $bo_table;?>">카테고리 다운로드</a></strong>
		</div>
		<table border="0" cellspacing="0" cellpadding="0" class="list" width="800">
			<?php echo str_repeat('<col width="12"/>',$max_depth+1);?>
			<col width="150" />
			<tbody>
			<?php foreach($categories as $row):?>
			<?php
				$pk = $row->mc;
				$colspan = $max_depth - $row->depth + 1;
				$href_move_up = "javascript:opt_ajax($pk,'move_up')";
				$href_move_down = "javascript:opt_ajax($pk,'move_down')";
				$href_modify = "javascript:opt_ajax($pk,'modify')";
				$href_remove = "javascript:opt_ajax($pk,'remove')";
				$href_add = "javascript:opt_ajax($pk,'add')";
				if($row->depth==0){
					$href_move_up = '#';
					$href_move_down = '#';
				}
			?>
			<tr onmouseover="this.style.backgroundColor='#efefef';" onmouseout="this.style.backgroundColor='#ffffff';">
				<td></td>
				<?php echo ($row->depth>0)? str_repeat('<td>-</td>',$row->depth).'<td colspan="'.$colspan.'">':'<td colspan="'.$colspan.'">';?>
				<span id="oct-<?php echo $row->mc?>"><?php echo stripslashes($row->title);?></span>
				</td>
				<td>
					<a href="<?php echo $href_move_up;?>">위로</a> | 
					<a href="<?php echo $href_move_down;?>">아래로</a> | 
					<a href="<?php echo $href_modify;?>">수정</a> | 
					<a href="<?php echo $href_remove;?>">삭제</a> 
					<input type="text" id="mc_txt_<?php echo $row->mc?>" size="32" maxlength="62">
					<a href="<?php echo $href_add;?>" id="btn-mc-add-<?php echo $row->mc?>">추가</a>
				</td>
				<td><?php echo $row->ca_text?>&nbsp;</td>
			</tr>
			<?php endforeach;?>
			</tbody>
		</table>
<?php
require_once dirname(__FILE__) . '/tail.php';
?>
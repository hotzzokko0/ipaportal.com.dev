<?php
/**
 * Hierarchical category for GNUBOARD
 * Ajax execute
 * @author eyesonlyz{at}nate.com
 * @created 2011-08-11
 * @modified 2011-08-12
 */
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
require "./_common.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($is_admin != 'super' && $is_admin!='board') {
		echo "alert('권한이 없습니다');";
		return;
	}
	
	if(empty($_POST['mode'])){	
	}else if($_POST['mode']=='upload'){
		$bo_table = $_POST['bo_table'];
		if (!empty($_FILES['ufile'])) {
			if ($_FILES['ufile']['error'] == 0 && $_FILES['ufile']['size'] > 0) {
				$cate = new MC($bo_table);
				$file = $_FILES['ufile']['tmp_name'];
				if(is_uploaded_file($file)){
					$cate->insert_from_file($file);
				}
			}
		}
		echo "<script>location.href='admin.php?bo_table=$bo_table';</script>";
	}else if($_POST['mode']=='use_multi_category'){
		$use_multi_category = !empty($_POST['value']);
		
		$bo_use_category = $use_multi_category? 1:0;
		$bo_category_list = $use_multi_category? 'multi_category':'';
		//$sql = "UPDATE {$g5 ['table_prefix']}board SET bo_use_category='$bo_use_category',bo_category_list='$bo_category_list' WHERE bo_table='$bo_table'";
		$sql = "UPDATE g5_board SET bo_use_category='$bo_use_category',bo_category_list='$bo_category_list' WHERE bo_table='$bo_table'";
		if(sql_query($sql)){
			if($bo_use_category){
				echo '멀티카테고리모드를 사용하도록 설정 하였습니다';
			}else{
				echo '멀티카테고리모드를 사용하지 않도록 설정 하였습니다';
			}
		}else{
			
		}
	}else if($_POST['mode']=='skin'){
		$bo_skin = mysql_escape_string($_POST['value']);
		//$sql = "UPDATE {$g5 ['table_prefix']}board SET bo_skin='$bo_skin' WHERE bo_table='$bo_table'";
		$sql = "UPDATE g5_board SET bo_skin='$bo_skin' WHERE bo_table='$bo_table'";
		if(sql_query($sql)){
			echo '스킨을 변경하였습니다';
		}else{
		
		}	
	}
	return;
} else {
	header("Content-Type: text/javascript");
	$mode = $_GET['mode'];
	$mc = (int)$_GET['mc'];
	$bo_table = $_GET['bo_table'];
	$cate = new MC($bo_table);
	if ($mode == 'list') {
		$ca_name = $_GET['ca_name'];
		$row = $cate->get($ca_name, 'ca_text');
		if ($row) {
			$rows = $cate->getChilds($row, 0);
			if (!empty($rows)) {
				echo "next_mc_obj.disabled=false;\n";
				foreach ($rows as $row) {
					echo "next_mc_obj.options.length += 1;\n";
					echo "next_mc_obj.options[next_mc_obj.options.length-1].value = '" . $row->ca_text . "';\n";
					echo "next_mc_obj.options[next_mc_obj.options.length-1].text = '" . $row->title . "';\n";
				}
			} else {
				echo "next_mc_obj.disabled='disabled';\n";
				echo "next_mc_obj.options.length = 1;\n";
			}
		}
		exit();
	}
	if ($is_admin != 'super' && $is_admin!='board') {
		echo "alert('권한이 없습니다');";
		return;
	}
	if ($mode == 'move_up') {
		$row = $cate->get($mc);
		$prev = $cate->prev($row);
		if (!$prev) {
			echo "alert('처음카테고리입니다');";
			exit;
		} else {
			if ($cate->moveUp($row)) {
				echo "alert('이동하였습니다');";
			}
		}
	} else if ($mode == 'move_down') {
		$row = $cate->get($mc);
		$next = $cate->next($row);
		if (!$next) {
			echo "alert('마지막카테고리입니다');";
			exit;
		} else {
			if ($cate->moveDown($row)) {
				echo "alert('이동하였습니다');";
			}
		}
	} else if ($mode == 'add') {
		if (!empty($mc)) {
			$row = $cate->get($mc);
			if ($row) {
				$cate->add($_GET['title'], $row);
			} else {
				echo "alert('존재하지 않는 카테고리 입니다');";
			}
		} else {
			$cate->add($_GET['title']);
		}
	} else if ($mode == 'modify') {
		$title = sql_real_escape_string($title);
		$sql = "UPDATE {$cate->table} SET title='$title' WHERE mc='$mc';";
		sql_query($sql);
	} else if ($mode == 'remove') {
		$row = $cate->get($mc);
		if ($row) {
			$cate->remove($row);
		} else {
			echo "alert('존재하지 않는 카테고리 입니다');";
		}
	}
}
?>
location.reload();
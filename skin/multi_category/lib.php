<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
define('MC', 1);
define('MC_VERSION', '0.1.0');

/**
 * 단순 배열셋만 제출함 
 * @param string $bo_table 테이블
 * @param string $category 카테고리키값 (구분은 , 로 처리)
 * @param int $count 
 * @return array
 */
function m_latest($bo_table,$category = null,$count = 10){
	
	global $g5;
	//$sql = "SELECT * FROM ".$g5['table_prefix'].'write_'. $bo_table;
	$sql = "SELECT * FROM ".g5_board.'write_'. $bo_table;
	$sql .= " WHERE wr_is_comment=0 AND ";
	if($category){
		$where = array();
		foreach(explode(',',$category) as $c){
			$c = mysql_real_escape_string($c);
			$where[] = " ca_name LIKE '$c%'";
		}
		if($where){
			$sql .="(".join( " OR ",$where).' )';
		}
	}
	$sql .=" ORDER BY wr_num  LIMIT 0,". (int) $count;
	$result = sql_query($sql);
	$rows = array();
	while($row=sql_fetch_assoc($result)){
		$rows[] = $row;
	}
	print_r(mysql_error());
	return $rows;
}

/**
 * Hierarchical category for GNUBOARD
 * MC Class
 * @author eyesonlyz{at}nate.com
 * @created 2011-08-11
 * @modified 2011-08-12
 */
class MC
{
	/**
	 * 카테고리 테이블
	 * @var string
	 */
	var $table = 'mc';

	/**
	 * 테이블명
	 * @var string
	 */
	var $bo_table;

	/**
	 * 테이블락 사용
	 * @var bool
	 */
	var $table_locking = FALSE;


	/**
	 * 디버그용
	 */
	var $mysql_error_show = TRUE;

	/**
	 * Constructor
	 */
	function MC($bo_table)
	{
		global $g5;
		$this->table = $g5['table_prefix']. $this->table;
		$this->bo_table = $bo_table;
	}

	function isInstalled()
	{
		global $mysql_db;

		$sql = "SHOW TABLES";
		$result = @sql_query($sql);
		$k = "Tables_in_{$mysql_db}";
		if($result){
			while($row = mysql_fetch_assoc($result)){
				if($row[$k]==$this->table){
					return TRUE;
				}
			}
		}
		return FALSE;
	}

	function install()
	{
		if(!$this->isInstalled()){
			$sql = "
			CREATE TABLE `$this->table` (
			  `mc` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `bo_table` varchar(32) NOT NULL,
			  `lft` int(11) NOT NULL,
			  `rgt` int(11) NOT NULL,
			  `depth` int(11) NOT NULL,
			  `title` varchar(120) NOT NULL,
			  `ca_text` varchar(120) DEFAULT NULL,
			  PRIMARY KEY (`mc`),
			  KEY `depth` (`depth`),
			  KEY `bo_table` (`bo_table`),
			  KEY `opt_category` (`lft`),
			  KEY `rgt` (`rgt`),
			  KEY `ca_text` (`ca_text`)
			)DEFAULT CHARSET=utf8;";
			return sql_query($sql);
		}
	}

	/**
	 * 전체 카테고리 갯수 제출
	 * @return int
	 */
	function getTotal()
	{
		$sql = "SELECT COUNT(0) AS total FROM $this->table WHERE bo_table='$this->bo_table'";
		if ($result = $this->query($sql)) {
			$total = (int)mysql_result($result, 0);
			return $total;
		} else {
			$this->printSQLError();
		}
	}

	function query($sql)
	{
		//echo '<li>'.$sql;
		return sql_query($sql);
	}

	function printSQLError()
	{
		if ($this->mysql_error_show) {
			print_R(mysql_error());
		}
	}

	/**
	 * 게시판 시작 카테고리
	 */
	function root()
	{
		$sql = "SELECT * FROM $this->table WHERE bo_table='$this->bo_table' AND depth=0";
		if ($result = $this->query($sql)) {
			return mysql_fetch_object($result);
		} else {
			$this->printSQLError();
		}
	}

	function getGroups()
	{
		$sql = "SELECT * FROM $this->table WHERE bo_table='$this->bo_table' AND depth=0 GROUP BY bo_table";
		$rows = array();
		if ($result = $this->query($sql)) {
			while ($row = mysql_fetch_object($result)) {
				$rows[] = $row;
			}
		} else {
			$this->printSQLError();
		}
		return $rows;
	}

	function get($row, $field = NULL)
	{
		if (is_object($row)) {
			$mc = (int)$row->mc;
		} else {
			$mc = (int)$row;
		}
		$sql = "SELECT * FROM $this->table WHERE bo_table='$this->bo_table' ";
		if (!$field) {
			$sql .= " AND mc='$mc'";
		} else {
			$sql .= " AND $field='$row'";
		}
		if ($result = $this->query($sql)) {
			return mysql_fetch_object($result);
		} else {
			$this->printSQLError();
			return FALSE;
		}
	}

	function parent($row)
	{
		$row = $this->get($row);
		$depth = (int)($row->depth - 1);
		$sql = "SELECT B.* FROM $this->table AS A, $this->table AS B 
		WHERE A.bo_table='$this->bo_table' AND A.lft BETWEEN B.lft AND B.rgt AND A.mc={$row->mc}
		AND B.depth=$depth";
		if ($result = $this->query($sql)) {
			return mysql_fetch_object($result);
		} else {
			$this->printSQLError();
			return FALSE;
		}
	}


	function prev($row)
	{
		$row = $this->get($row);
		$parent = $this->parent($row);
		$sql = "SELECT * FROM $this->table WHERE bo_table='{$row->bo_table}' AND lft BETWEEN {$parent->lft} AND " . ($row->lft - 1) . " ";
		$sql .= " AND depth={$row->depth} ";
		$sql .= " ORDER BY lft DESC LIMIT 1";
		$result = $this->query($sql);
		if ($result) {
			return mysql_fetch_object($result);
		} else {
			$this->printSQLError();
		}
	}

	function next($row)
	{
		$row = $this->get($row);
		$parent = $this->parent($row);
		$sql = "SELECT * FROM $this->table WHERE bo_table='{$row->bo_table}' AND lft BETWEEN " . ($row->lft + 1) . " AND " . ($parent->rgt) . " ";
		$sql .= " AND depth={$row->depth} ";
		$sql .= " ORDER BY lft ASC LIMIT 1";
		$result = $this->query($sql);
		if ($result) {
			return mysql_fetch_object($result);
		} else {
			$this->printSQLError();
		}
	}

	function lockTable()
	{
		if ($this->table_locking) {
			sql_query("LOCK $this->table write;");
		}
	}

	function unlockTable()
	{
		if ($this->table_locking) {
			sql_query("UNLOCK tables;");
		}
	}

	function moveDown($row)
	{
		$row = $this->get($row);
		$next = $this->next($row);
		if ($next) {
			$row_childs = $this->getChilds($row, '*');
			$lft = $next->rgt - $next->lft + 1;
			$rgt = $lft;
			$sql = "UPDATE $this->table SET lft=lft+$lft,rgt=rgt+$rgt WHERE bo_table='$this->bo_table' AND lft >= {$row->lft} AND lft <= {$row->rgt}";
			$this->lockTable();
			if ($this->query($sql)) {
				if (mysql_affected_rows() > 0) {
					$n = array($row->mc);
					foreach ($row_childs as $v) {
						$n[] = $v->mc;
					}
					$lft = $next->lft - $row->lft;
					$rgt = $lft;
					$sql = "UPDATE $this->table SET lft=lft-$lft,rgt=rgt-$rgt WHERE bo_table='$this->bo_table' AND lft >= {$next->lft} AND lft <= {$next->rgt}";
					if (!empty($n)) {
						$sql .= " AND mc NOT IN ('" . join("','", $n) . "')";
					}
					if (!$this->query($sql)) {
						$this->printSQLError();
					}
				}
			} else {
				$this->printSQLError();
			}
			$this->unlockTable();
		}

	}

	function moveUp($row)
	{
		$row = $this->get($row);
		$prev = $this->prev($row);
		if ($prev) {
			$row_childs = $this->getChilds($row, '*');
			$lft = $row->lft - $prev->lft;
			$rgt = $lft;

			$sql = "
			UPDATE $this->table SET lft=lft-$lft,rgt=rgt-$rgt 
			WHERE bo_table='$this->bo_table' AND lft >= {$row->lft} AND lft <= {$row->rgt}";
			$this->lockTable();
			if ($this->query($sql)) {
				$rows = mysql_affected_rows();
				if ($rows > 0) {
					$n = array($row->mc);
					foreach ($row_childs as $v) {
						$n[] = $v->mc;
					}
					$lft = $row->rgt - $row->lft + 1;
					$rgt = $lft;
					$sql = "UPDATE $this->table SET lft=lft+$lft,rgt=rgt+$rgt WHERE bo_table='$this->bo_table' AND lft >= {$prev->lft} AND lft <= {$prev->rgt}";
					if (!empty($n)) {
						$sql .= " AND mc NOT IN ('" . join("','", $n) . "')";
					}
					if (!$this->query($sql)) {
						$this->printSQLError();
					}
				}
			} else {
				$this->printSQLError();
			}
			$this->unlockTable();
		}

	}


	function remove($row)
	{
		$row = $this->get($row);
		if ($row) {
			$lft = $row->lft;
			$rgt = $row->rgt;
			$depth = $rgt - $lft + 1;

			$sql = "DELETE FROM $this->table WHERE bo_table='$this->bo_table' AND lft BETWEEN {$lft} AND {$rgt}";
			$this->lockTable();
			if ($this->query($sql)) {
				$sql = "UPDATE $this->table SET rgt=rgt-$depth WHERE rgt > {$rgt} AND bo_table='{$row->bo_table}'";
				if (!$this->query($sql)) {
					$this->printSQLError();
				}

				$sql = "UPDATE $this->table SET lft=lft-$depth WHERE lft > {$rgt} AND bo_table='{$row->bo_table}'";
				if (!$this->query($sql)) {
					$this->printSQLError();
				}
			} else {
				$this->printSQLError();
			}
			$this->unlockTable();
		}
	}

	function insert_from_file($file)
	{
		$sql = "SELECT COUNT(0) FROM $this->table";
		if(mysql_result(sql_query($sql),0) === 0){///전체 테이블이 빈경우 리쎗
			sql_query("TRUNCATE TABLE $this->table");
		}

		$lft = 1;
		$rgt = 2;
		$depth = 0;
		$ck = array();
		$last_depth = 0;
		$rows = explode("\n", file_get_contents($file));
		if(!$rows){
			return FALSE;
		}
		$row = array_shift($rows);
		$title = mysql_real_escape_string(trim($row));
		
		$ca_text = '1';
		$ca_text = '';//

		$sql = "INSERT INTO $this->table (mc,lft,rgt,depth,title,bo_table,ca_text) VALUES(NULL,$lft,$rgt,$depth,'$title','{$this->bo_table}','$ca_text')";
		if ($this->query($sql)) {
			$ck[0] = mysql_insert_id();
		} else {
			$this->printSQLError();
		}
		foreach ($rows as $row) {
			if (!empty($row)) {
				$depth = strspn($row, "\t");
				$title = trim($row);
				if(!empty($title)){
					if ($last_depth > $depth) {
						for ($i = $depth + 1; $i <= $last_depth; $i++) {
							unset($ck[$i]);
						}
					}
					$_row = $this->get($ck[$depth - 1]);
					$last = $this->add($title, $_row);
					$id = $last->mc;
					$ck[$depth] = $id;
					$last_depth = $depth;
				}
			}
		}
		return TRUE;
	}

	function getChilds($row, $offset = 0)
	{
		if (!is_array($row)) {
			$row = $this->get($row);
			if (!$row) {
				$row = $this->root();
			}
		} else {
			$row = $this->get($row->mc);
		}
		$mc = (int) $row->mc;

		$sql = "SELECT A.* FROM $this->table AS A
		WHERE A.bo_table='$this->bo_table' ";
		if ($offset !== -1) {
			$sql .= " AND A.lft BETWEEN {$row->lft} AND {$row->rgt}";
			if ($offset === 0) {
				$depth = $row->depth + 1;
				$sql .= " AND A.depth='$depth'";
			} else if ($offset == '*') {
				//$sql .= " AND A.depth>{$row->depth}";
			} else {
				$depth = $row->depth + $offset + 1;
				$sql .= " AND A.depth='$depth'";
			}
		}
		$sql .= " ORDER BY A.lft ASC";

		if ($offset == '*') {
			//echo '<li>'.$sql;
		}


		$result = $this->query($sql);
		$rows = array();
		if ($result) {
			while ($row = mysql_fetch_object($result)) {
				$rows[] = $row;
			}
		} else {
			$this->printSQLError();
		}
		return $rows;
	}

	function boardExists($bo_table)
	{

	}

	function add($title, $parent = -1, $first = -1)
	{
		$total = $this->getTotal();
		$title = mysql_real_escape_string($title);
		if ($total == 0) {
			$lft = 1;
			$rgt = 2;
			$depth = 0;
			$ca_text = 1;
			$ca_text = '';
			$sql = "INSERT INTO $this->table (`mc`,bo_table,`lft`,`rgt`,`depth`,`title`,`ca_text`) VALUES(NULL,'$this->bo_table','$lft','$rgt','$depth','$title','$ca_text')";
			if (!$this->query($sql)) {
				$this->printSQLError();
			} else {
				$id = mysql_insert_id();
				$ca_text = $id;
				$sql = "UPDATE $this->table SET ca_text='$ca_text' WHERE mc='$id'";
				sql_query($sql);

			}
		} else {
			if ($parent == -1) {
				$parent = $this->root();
			} else {
				$parent = $this->get($parent);
			}
			$parent = $this->get($parent->mc);
			$depth = (int)$parent->depth + 1;
			$childs = $this->getChilds($parent, 0);

			if (count($childs) == 0) {
				//echo '<li>add '. $parent['lft'].' '.$parent['rgt'];
				$key = (int)$parent->lft;
			} else {
				$last = array_pop($childs);
				$key = (int)$last->rgt;
			} ///뒷쪽에 추가
			$lft = $key + 1;
			$rgt = $key + 2;

			$this->lockTable();
			$sql = "UPDATE $this->table SET rgt=rgt+2 WHERE rgt > $key AND bo_table='$this->bo_table'";
			if (!$this->query($sql)) {
				$this->printSQLError();
			}

			$sql = "UPDATE $this->table SET lft=lft+2 WHERE lft > $key AND bo_table='$this->bo_table'";
			if (!$this->query($sql)) {
				$this->printSQLError();
			}
			$sql = "INSERT INTO $this->table (`mc`,bo_table,`lft`,`rgt`,`depth`,`title`) VALUES(NULL,'$this->bo_table','$lft','$rgt','$depth','$title')";
			$obj = FALSE;
			if ($this->query($sql)) {
				$id = mysql_insert_id();
				$parents = $this->getParents($id);
				$ca_text = array();
				foreach ($parents as $k => $row) {
					$ca_text[] = $row->mc;
				}
				sort($ca_text);
				$ca_text = join('-', $ca_text);
				$sql = "UPDATE $this->table SET ca_text='$ca_text' WHERE mc='$id'";
				sql_query($sql);

				$obj = $this->get($id);
			} else {
				$this->printSQLError();
			}
			$this->unlockTable();
			return $obj;
		}
	}

	function getMaxDepth()
	{
		$sql = "SELECT MAX(depth) FROM $this->table WHERE bo_table='$this->bo_table'";
		$result = $this->query($sql);
		$max = 0;
		if ($result) {
			$max = mysql_result($result, 0);
		}
		return $max;
	}

	function getParents($row)
	{
		$row = $this->get($row);
		$sql = "
		SELECT B.* FROM $this->table AS A,$this->table AS B 
		WHERE A.bo_table='$this->bo_table' AND B.bo_table='$this->bo_table' AND A.lft BETWEEN B.lft AND B.rgt AND A.mc='$row->mc' 
		ORDER BY A.lft ASC";
		$rows = array();
		$result = $this->query($sql);
		if ($result) {
			while ($row = mysql_fetch_object($result)) {
				$rows[] = $row;
			}
		} else {
			$this->printSQLError();
		}
		return $rows;
	}
	
	/**
	 * view.skin.php
	 * @static
	 */
	function getNowCategories($ca_text)
	{
		global $bo_table, $__mc,$view;

		if(is_object($__mc) && $__mc->bo_table==$bo_table){
		}else{			
			return array($view['ca_name']);
		}
		$sql = "
		SELECT B.* FROM $__mc->table AS A,$__mc->table AS B 
		WHERE A.bo_table='$__mc->bo_table' AND B.bo_table='$__mc->bo_table' AND A.lft BETWEEN B.lft AND B.rgt AND A.ca_text='$ca_text' 
		AND B.depth > 0
		ORDER BY B.lft ASC";
		$rows = array();
		$result = $__mc->query($sql);
		if ($result) {
			while ($row = mysql_fetch_object($result)) {
				$rows[$row->ca_text] = stripslashes($row->title);
			}
		} else {
			$__mc->printSQLError();
		}
		return $rows;
	}

	function write_input_select($ca_text)
	{
		global $bo_table,$__mc,$category_option;

		if(is_object($__mc) && $__mc->bo_table==$bo_table){
		}else{		
			echo '<select name=ca_name required itemname="분류"><option value="">선택하세요'.$category_option.'</select>';
			return;
		}
		$max = $__mc->getMaxDepth();
		echo '
		<script type="text/javascript">
			var next_mc_obj = null;
			var mc_select = function(obj,i)
			{
				var ajax = document.getElementById("opt-category-ajax");
				var el = document.getElementById("ca-text");
				var old_el_value = el.value;
				var old_el_arr = (old_el_value || "").split(/-/);
				var new_el_value = obj.value;
				var new_el_arr = (new_el_value || "").split(/-/);
				if(old_el_arr.length>new_el_arr.length){
					var _el;
					for(var j=i;j<' . ($max + 1) . ';j++)
					{
						_el  = document.getElementById("mc_obj_"+(j+1));
						if(_el){
							_el.length=1;
							_el.disabled="disabled";
						}
					}
				}

				if(obj.value=="" && old_el_value){
					if(i>2) {
						el.value = (old_el_value.split(/-/).slice(0,i-1).join("-"));
					}else{
						el.value = "";
					}
				}else{
					el.value = obj.value;
				}			
				if(obj.value==""){
					return;
				}
				next_mc_obj = document.getElementById("mc_obj_"+(i+1));
				if(next_mc_obj){
					next_mc_obj.length=1;
					if(document.getElementById("__opt__tmp__ajax")){
						document.getElementsByTagName("head")[0].removeChild(document.getElementById("__opt__tmp__ajax"));
					}
					var _ajax = document.createElement("script");
					_ajax.id="__opt__tmp__ajax";
					_ajax.type = "text/javascript";
					document.getElementsByTagName("head")[0].appendChild(_ajax);					
					_ajax.src = "../skin/multi_category/ajax.php?mode=list&bo_table=' . $bo_table . '&ca_name="+el.value+"&dummy="+(new Date().getTime() / 1000);
				}else{
					next_mc_obj = null;
				}
			}
		</script>
		<script id="opt-category-ajax" type="text/javascript"></script>
		<input type="hidden" name="ca_name" id="ca-text" value="' . $ca_text . '"/>
		';
		$arr = explode('-', $ca_text);
		$depth = count($arr);
		for ($i = 2; $i <= $max + 1; $i++) {
			$rows = array();
			$disabled = '';
			if ($i <= $depth + 1) {
				$row = $__mc->get(join('-', array_slice($arr, 0, $i - 1)), 'ca_text');
				$rows = $__mc->getChilds($row);
			}
			if (empty($rows)) {
				$disabled = ' disabled="disabled"';
			}
			$check_txt = join('-', array_slice($arr, 0, $i));
			echo '<select onchange="mc_select(this,' . $i . ');"' . $disabled . ' id="mc_obj_' . $i . '">';
			echo '<option value="">선택해 주세요</option>';
			foreach ($rows as $row) {
				$selected = $row->ca_text == $check_txt ? ' selected="selected"' : '';
				echo '<option value="' . $row->ca_text . '"' . $selected . '>' . stripslashes($row->title) . '</option>';
			}
			echo '</select>';
		}
	}

	/**
	 * list.skin.php 에서 카테고리 선택 셀텍트박스 출력
	 * @static
	 * @param $ca_text 카테고리 키값
	 * @return void
	 */
	function category_search_form($ca_text)
	{
		global $__mc, $board, $category_location,$g5,$is_category,$category_option,$bo_table,$is_admin;
		
		if(is_object($__mc) && $__mc->bo_table==$bo_table){

		}else{
			///사용하지 않는경우 기본 카테고리출력
			?>
			<form name="fcategory" method="get" style="margin:0px;">
            <? if ($is_category) { ?>
            <select name=sca onchange="location='<?=$category_location?>'+<?=strtolower($g5[charset])=='utf-8' ? "encodeURIComponent(this.value)" : "this.value"?>;">
            <option value=''>전체</option>
            <?=$category_option?>
            </select>
            <? } ?>
            </form>
			<?php
			return;
		}
		$max = $__mc->getMaxDepth();
		echo '
		<script type="text/javascript">
			var mc_select = function(obj,i)
			{
				var f = document.getElementById("opt-categoryF");
				var el = document.getElementById("ca-text");
				var old_el_value = el.value;
				if(obj.value=="" && old_el_value){
					if(i>2) {
						el.value = (old_el_value.split(/-/).slice(0,i-1).join("-"));
					}else{
						el.value = "";
					}
				}else{
					el.value = obj.value;
				}
				try{
					var searchf = document.fsearch;
					searchf.sca.value=el.value;
					searchf.submit();
				}catch(e){
					f.submit();
				}
			}
		</script>
		<form id="opt-categoryF" name="fcategory">
		<input type="hidden" name="sca" id="ca-text" value="' . $ca_text . '"/>
		<input type="hidden" name="bo_table" value="' . $__mc->bo_table . '"/>
		';
		$arr = explode('-', $ca_text);
		$depth = count($arr);
		for ($i = 2; $i <= $max + 1; $i++) {
			$opts = array('', '선택해주세요');
			$rows = array();
			$disabled = '';
			if ($i <= $depth + 1) {
				$row = $__mc->get(join('-', array_slice($arr, 0, $i - 1)), 'ca_text');
				$rows = $__mc->getChilds($row);
			}
			if (empty($rows)) {
				$disabled = ' disabled="disabled"';
			}
			$check_txt = join('-', array_slice($arr, 0, $i));
			echo '<select onchange="mc_select(this,' . $i . ');"' . $disabled . '>';
			echo '<option value="">선택해 주세요</option>';
			foreach ($rows as $row) {
				$selected = $row->ca_text == $check_txt ? ' selected="selected"' : '';
				echo '<option value="' . $row->ca_text . '"' . $selected . '>' . stripslashes($row->title) . '</option>';
			}
			echo '</select>';
		}
		if($is_admin=='super' || $is_admin=='board'){
			echo ' <a href="../skin/multi_category/admin.php?bo_table=' . $__mc->bo_table . '">카테고리관리</a>';
		}
		echo '</form>';
	}
}
/**
 * 그누 관리자에서 멀티카테고리 설정이 된경우
 *
 */
$__mc = NULL;
if (!empty($bo_table) && $board['bo_category_list']=='multi_category'
 && $board['bo_use_category']==1
) {
	$__mc = new MC($bo_table);
}
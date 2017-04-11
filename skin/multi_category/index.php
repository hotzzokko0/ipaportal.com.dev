<?php
/**
 * Hierarchical category for GNUBOARD
 * Ajax execute
 * @author eyesonlyz{at}nate.com
 * @created 2011-09-21
 */
require_once "./_common.php";

if ($is_admin != 'super') {
	echo "관리자로 로그인후 접속해주세요";
	exit();
}
require_once dirname(__FILE__) . '/head.php';


// 스킨디렉토리
$skin_options = "";

$dirs= glob(realpath($g5['path']).'/skin/board/*',GLOB_ONLYDIR);

function skin_select($skin){
	global $dirs;
	$skin_options = '';
	foreach($dirs as $v){
		if(is_dir($v)){
			$is_multi_category_skin = file_exists($v.'/multi_category_skin.txt');
			$name = basename($v);
			$selected = $skin==$name?' selected="selected"':'';
			$skin_options .= '<option value="'.$name.'"'.$selected.'>'.$name.($is_multi_category_skin? ' (멀티카테고리)':'').'</option>';
		}	
	}
	return $skin_options;
}

//$sql = "SELECT * FROM {$g5['table_prefix']}board";
$sql = "select * from g5_board";
$result = sql_query($sql);

?>
<script>
function admin_ajax(mode,obj,bo_table,is_ori_cate){
	if(is_ori_cate){
		if(!confirm('기존에 사용자 카테고리가 존재합니다,삭제하시고 진행하시겠습니까?')){
			obj.checked =false;
			return;
		}
	}
	var el = $(obj);	

	var value;
	switch(mode){
		case 'use_multi_category':
			value = el.get(0).checked? 1:0;
		break;
		case 'skin':
			value = el.val();
		break;
	}
	
	var options = {
		type:'POST',
		url:'ajax.php',
		data:{mode:mode,value:value,bo_table:bo_table},
		success:function(data){
			if(data==1){
				alert('멀티카테고리모드로 변경되었습니다');
				location.reload();
			}else{
				alert(data);
			}
		}
	}
	$.ajax(options);
}
</script>
<div id="tbar">
	<a href="index.php">게시판 목록</a>
</div>
<p class="description">
변경과동시에 데이타가 적용됩니다 <br/>
멀티카테고리스킨표시는 스킨폴더안에 multi_category_skin.txt 파일 존재유무입니다
</p>
<div style="width:700px">
<table class="rows" cellpadding="0" cellspacing="1">
<col/>
<col/>
<col/>
<col/>
<col width="120"/>
<col width="120"/>
	<thead>
		<tr>
			<th>게시판명</th>
			<th>bo_table</th>
			<th>계층카테고리 사용</th>
			<th>스킨</th>
			<th>카테고리 설정</th>
			<th>bo_category_list</th>
		</tr>
	</thead>
	<tbody>

	<?php while ($row = sql_fetch_object($result)) : $bo_10 = unserialize($row->bo_10);
	$is_multi = $row->bo_category_list == 'multi_category';
	$is_ori_cate = !empty($row->bo_category_list) && !$is_multi;
	?>
		<tr>
			<td><?php echo $row->bo_subject;?></td>
			<td><?php echo $row->bo_table;?></td>
			<td><input type="checkbox" name="multi_category" value="1" <?php echo $is_multi? 'checked="checked"':'';?> onclick="admin_ajax('use_multi_category',this,'<?php echo $row->bo_table;?>','<?php echo $is_ori_cate;?>')"/>
			</td>
			<td><select onchange="admin_ajax('skin',this,'<?php echo $row->bo_table;?>')"><?php echo skin_select($row->bo_skin);?></select></td>
			<td align="center"><a href="admin.php?bo_table=<?php echo $row->bo_table;?>">카테고리설정</a></td>
			<td><?php echo $row->bo_category_list;?></td>
		</tr>
	<?php endwhile;?>
	</tbody>
</table>

</div>
<?php
require_once dirname(__FILE__) . '/tail.php';
?>
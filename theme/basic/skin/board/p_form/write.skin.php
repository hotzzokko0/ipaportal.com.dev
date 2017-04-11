<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include (G5_SKIN_PATH.'/multi_category/lib.php');

if ($w == "u") {
	$wr_body_1 = explode("|",substr($write[wr_1], 1));
	$wr_body_2 = explode("|",substr($write[wr_2], 1));
	}
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<?
$ex3_filed = explode("|",$write[wr_3]); 
$ext3_00  = $ex3_filed[0];
$ext3_01  = $ex3_filed[1];
$ext3_02  = $ex3_filed[2];
$ext3_03  = $ex3_filed[3];

$ex4_filed = explode("|",$write[wr_4]); 
$ext4_00  = $ex4_filed[0];
$ext4_01  = $ex4_filed[1];
$ext4_02  = $ex4_filed[2];
$ext4_03  = $ex4_filed[3];
$ext4_04  = $ex4_filed[4];
$ext4_05  = $ex4_filed[5];
$ext4_06  = $ex4_filed[6];
$ext4_07  = $ex4_filed[7];
$ext4_08  = $ex4_filed[8];
$ext4_09  = $ex4_filed[9];
$ext4_10  = $ex4_filed[10];
$ext4_11  = $ex4_filed[11];
$ext4_12  = $ex4_filed[12];
$ext4_13  = $ex4_filed[13];
$ext4_14  = $ex4_filed[14];
$ext4_15  = $ex4_filed[15];
$ext4_16  = $ex4_filed[16];
$ext4_17  = $ex4_filed[17];
$ext4_18  = $ex4_filed[18];
$ext4_19  = $ex4_filed[19];
$ext4_20  = $ex4_filed[20];
?>
<script>
function addRow() {
	var oRow = dyntbl1.insertRow();
		oRow.onmouseover=function(){dyntbl1.clickedRowIndex=this.rowIndex};
		if(navigator.userAgent.indexOf("MSIE")){
		var oCell1 = oRow.insertCell();
		var oCell2 = oRow.insertCell();
		var oCell6 = oRow.insertCell();
		oCell1.innerHTML = "<input class='frm_input_a' required name=wr_body_1[] itemname='기간' maxlength='60'>";
		oCell2.innerHTML = "<input class='frm_input_b' name=wr_body_2[] itemname='경력' maxlength='160'>";
		oCell6.innerHTML = "<input type=button style='width:60px;height:24px;' value=\" 삭제 \" onClick=\"delRow()\">";
		document.recalc();
		}
		else if(navigator.userAgent.indexOf("Chrome")){
			var oCell1 = oRow.insertCell();
			var oCell2 = oRow.insertCell();
			var oCell6 = oRow.insertCell();
			oCell1.innerHTML = "<input class='frm_input_a' required name=wr_body_1[] itemname='기간' maxlength='60'>";
			oCell2.innerHTML = "<input class='frm_input_b' name=wr_body_2[] itemname='경력' maxlength='160'>";
			oCell6.innerHTML = "<input type=button style='width:60px;height:24px;' value=\" 삭제 \" onClick=\"delRow()\">";
			}
	else if(navigator.userAgent.indexOf("Safari")){
			var oCell6 = oRow.insertCell();
			var oCell2 = oRow.insertCell();
			var oCell1 = oRow.insertCell();
			oCell6.innerHTML = "<input type=button style='width:60px;height:24px;' value=\" 삭제 \" onClick=\"delRow()\">";
			oCell2.innerHTML = "<input class='frm_input_b' name=wr_body_2[] itemname='경력' maxlength='160'>";
			oCell1.innerHTML = "<input class='frm_input_a' required name=wr_body_1[] itemname='기간' maxlength='60'>";
		}
		else if(navigator.userAgent.indexOf("Firefox")){
			var oCell6 = oRow.insertCell();
			var oCell2 = oRow.insertCell();
			var oCell1 = oRow.insertCell();
			oCell6.innerHTML = "<input type=button style='width:60px;height:24px;' value=\" 삭제 \" onClick=\"delRow()\">";
			oCell2.innerHTML = "<input class='frm_input_b' name=wr_body_2[] itemname='경력' maxlength='160'>";
			oCell1.innerHTML = "<input class='frm_input_a' required name=wr_body_1[] itemname='기간' maxlength='60'>";
		}
}
function delRow() {
	dyntbl1.deleteRow(dyntbl1.clickedRowIndex);
}

function delRow_php(r)
{
var i=r.parentNode.parentNode.rowIndex;
document.getElementById('dyntbl2').deleteRow(i);
}

function fixscreen() {
	var buffer = document.all.item(0).outerHTML;
	document.open("text/html", "replace");
	document.write(buffer);
	document.close();
}

function addCol() {
	var vCell,tmp;
		for (var i=0; i<dyntbl1.rows.length; i++) {
		tmp=dyntbl1.rows[i].cells[dyntbl1.rows[i].cells.length-1].cloneNode(true);
		dyntbl1.rows[i].deleteCell();
		vCell=dyntbl1.rows[i].insertCell();
		vCell.innerHTML=i==0?"<input type=button value=' X ' onclick='delCol(parentNode.cellIndex)'>":"&nbsp;";
		vCell=dyntbl1.rows[i].insertCell();
		vCell.innerHTML=tmp.innerHTML;
		}
}
function delCol(idx) {
	for (var i=0; i<=dyntbl1.rows.length; i++) {
	dyntbl1.rows[i].cells[idx].removeNode();
	}
}
</script>

<section id="bo_w">
    <h2 id="container_title"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <tbody>
        <?php if ($is_name) { ?>
        <tr>
            <th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input required" size="10" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_password) { ?>
        <tr>
            <th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
            <td><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_email) { ?>
        <tr>
            <th scope="row"><label for="wr_email">이메일</label></th>
            <td><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email" size="50" maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <tr>
            <th scope="row"><label for="wr_homepage">홈페이지</label></th>
            <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input" size="50"></td>
        </tr>
        <?php } ?>

        <?php if ($option) { ?>
        <tr>
            <th scope="row">옵션</th>
            <td><?php echo $option ?></td>
        </tr>
        <?php } ?>

        <?php if ($is_category) { ?>
        <tr>
            <th scope="row"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
            <td>
               <?php echo MC::write_input_select($write['ca_name']);?>
				
            </td>
        </tr>
        <?php } ?>

		<? if ($w == "u") {?>
		<tr>
			<th scope="row">이력서 공개</th>
			<td><input type="radio" class="ed" size=5 name=wr_5 value='10000' <? if ($wr_5 == "10000") echo'checked';?>>공개 <INPUT type="radio" name=wr_5 VALUE="1" <? if ($wr_5 == "1") echo'checked';?>>비공개</td></tr>
		<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
		<?}?>

        <tr>
            <th scope="row"><label for="wr_subject">제목<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input required" size="50" maxlength="255">
                    <?php if ($is_member) { // 임시 저장된 글 기능 ?>
                    <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
                    <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
                    <div id="autosave_pop">
                        <strong>임시 저장된 글 목록</strong>
                        <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                        <ul></ul>
                        <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                    </div>
                    <?php } ?>
                </div>
            </td>
        </tr>

        </tbody>
        </table>
<div style="height:20px;"></div>


<table width="100%" cellpadding="0" cellspacing="0" bgcolor=#F3F3F3>
	<tr><td width="30%"> 


		<table width="100%" cellpadding=0 cellspacing=1>
		<tr><td class=write_fc height=185><img src="<?=$board_skin_url?>/img/image.gif"></td></tr>
		<tr>
			<td class=write_fl height=30>
				
						사진첨부 (100x120 크기)
						</td>
				</tr>
		<tr>    <td class=write_fc>
			<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
				<tr>
					<td>
						<input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
						<?php if($w == 'u' && $file[$i]['file']) { ?>
						<input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>


		</td>
		</tr></table>

</td>

	<td width="2%" bgcolor=#FFFFFF></td>

	<td width="68%">

		 <table width="100%" cellpadding="0" cellspacing="1"`>
		<tr><td width="20%" class=write_cb>이름</td>
			 <td width="80%" class=write_fl colspan=3><INPUT class="frm_input required" style="width:120;" name='ext4_00' id='ext4_00' value="<?=$ext4_00?>" maxlength='70'  itemname="이름" required></td>
		</tr>
		<tr><td class=write_cb>생년</td>
			 <td class=write_fl>
				<select name="ext4_01" required itemname='생년' class="frm_input" >
					<option value="">선택하세요</option>
					<?
						 for ($i=1940; $i<2001; $i++) {
							echo("<option value={$i}>" .$i."년"); 
							echo "</option>";
							$ext4_01 = $i;
						}
					?>
			 </select>
			 </td>
			 <td class=write_cb>경력</td>
			 <td class=write_fl><select name="ext4_14" required itemname='경력' class="frm_input">
								<option value="">선택하세요</option>
								<option value="신입" <? if($ext4_14 == "신입")	 echo "selected"; ?>>신입</option>
								<option value="1년이하" <? if($ext4_14 == "1년이하")	 echo "selected"; ?>>1년이하</option>
								<option value="2년이하" <? if($ext4_14 == "2년이하")	 echo "selected"; ?>>2년이하</option>
								<option value="3년이하" <? if($ext4_14 == "3년이하")	 echo "selected"; ?>>3년이하</option>
								<option value="4년이하" <? if($ext4_14 == "4년이하")	 echo "selected"; ?>>4년이하</option>
								<option value="5년이하" <? if($ext4_14 == "5년이하")	 echo "selected"; ?>>5년이하</option>
								<option value="6년이하" <? if($ext4_14 == "6년이하")	 echo "selected"; ?>>6년이하</option>
								<option value="7년이하" <? if($ext4_14 == "7년이하")	 echo "selected"; ?>>7년이하</option>
								<option value="8년이하" <? if($ext4_14 == "8년이하")	 echo "selected"; ?>>8년이하</option>
								<option value="9년이하" <? if($ext4_14 == "9년이하")	 echo "selected"; ?>>9년이하</option>
								<option value="10년이하" <? if($ext4_14 == "10년이하")	 echo "selected"; ?>>10년이하</option>
								<option value="10년이상" <? if($ext4_14 == "10년이상")	 echo "selected"; ?>>10년이상</option>
			 			 </td>
		</tr>
		<tr><td width=20% class=write_cb>성별</td>
			      <td width=30% class=write_fl> <INPUT type=radio name='ext4_10' required VALUE="남자" <? if ($ext4_10 == "남자") echo'checked';?>>남자
									  <INPUT type=radio name='ext4_10' required VALUE="여자" <? if ($ext4_10 == "여자") echo'checked';?>>여자</td>
				<td width=20% class=write_cb>직종</td>
			      <td width=30% class=write_fl><INPUT class="frm_input required" name='ext4_11' id='ext4_11' value="<?=$ext4_11?>" maxlength='70'  itemname="subj" required></td></tr>
				  
			<?php /*?><tr><td class=write_cb>희망학년</td>
			      <td class=write_fl>
									<select name="ext4_09" required itemname='수강대상' class="frm_input required">
					<option value="">선택하세요</option>
					<option value="무관" <? if($ext4_09 == "무관")	 echo "selected"; ?>>무관</option>
					<option value="초등부" <? if($ext4_09 == "초등부")	 echo "selected"; ?>>초등부</option>
					<option value="중등부" <? if($ext4_09 == "중등부")	 echo "selected"; ?>>중등부</option>
					<option value="고등부" <? if($ext4_09 == "고등부")	 echo "selected"; ?>>고등부</option>
					<option value="초중등부" <? if($ext4_09 == "초중등부")	 echo "selected"; ?>>초중등부</option>
					<option value="중고등부" <? if($ext4_09 == "중고등부")	 echo "selected"; ?>>중고등부</option>
					<option value="초중고" <? if($ext4_09 == "초중고")	 echo "selected"; ?>>초중고</option>
					<option value="성인반" <? if($ext4_09 == "성인반")	 echo "selected"; ?>>성인반</option>
					<option value="기타" <? if($ext4_09 == "기타")	 echo "selected"; ?>>기타</option>
			   </select>	
			   </td><?php */?>
			   <td class=write_cb>근무형태</td>
			      <td class=write_fl>
					<select name="ext4_12" required itemname='형태' class="frm_input required">
					<option value="">선택하세요</option>
					<option value="정규직" <? if($ext4_12 == "무관")	 echo "selected"; ?>>무관</option>
					<option value="정규직" <? if($ext4_12 == "정규직")	 echo "selected"; ?>>정규직</option>
					<option value="파트" <? if($ext4_12 == "파트")	 echo "selected"; ?>>파트</option>
					<option value="단기" <? if($ext4_12 == "단기")	 echo "selected"; ?>>단기</option>
				  </td>
			   
			   </tr>

			  <tr><td class=write_cb>희망지역</td>
			      <td class=write_fl colspan=3><INPUT class="frm_input required" name='ext4_13' id='ext4_13' value="<?=$ext4_13?>" maxlength='70'  itemname="지역" required></td>
			  </tr>
				 
		<tr><td class=write_cb>연락처</td>
				  <td class=write_fl colspan=3>
				  <SELECT name='ext4_02' class="frm_input required" required itemname='핸폰'>
		<option value=''>선택</option>
        <option value='010' <? if($ext4_02 == "010") echo "selected"; ?>>010</option>
        <option value='011' <? if($ext4_02 == "011") echo "selected"; ?>>011</option>
        <option value='016' <? if($ext4_02 == "016") echo "selected"; ?>>016</option>
		<option value='017' <? if($ext4_02 == "017") echo "selected"; ?>>017</option>
        <option value='019' <? if($ext4_02 == "019") echo "selected"; ?>>019</option>
      </select> - 
      <input name='ext4_03' class="frm_input required" value='<?=$ext4_03?>' required type='text' size='8' maxlength='4' onkeydown='onlyNumber(this);' itemname='일반전화 두번째자리' class=input>  - 
      <input name='ext4_04' class="frm_input required" value='<?=$ext4_04?>' required type='text' size='8' maxlength='4' onkeydown='onlyNumber(this);' itemname='일반전화 세번째자리' class=input>
	  </td></tr>

	  <?php /*?><tr><td class=write_cb>연락처</td>
				 <td class=write_fl colspan=3>
				 <SELECT name='ext4_05' class="frm_input" itemname='전화번호'>
						<option value=''>선택</option>
						<option value='02' <? if($ext4_05 == "02") echo "selected"; ?>>02</option>
						<option value='031' <? if($ext4_05 == "031") echo "selected"; ?>>031</option>
						<option value='032' <? if($ext4_05 == "032") echo "selected"; ?>>032</option>
						<option value='033' <? if($ext4_05 == "033") echo "selected"; ?>>033</option>
						<option value='041' <? if($ext4_05 == "041") echo "selected"; ?>>041</option>
						<option value='042' <? if($ext4_05 == "042") echo "selected"; ?>>042</option>
						<option value='043' <? if($ext4_05 == "043") echo "selected"; ?>>043</option>
						<option value='051' <? if($ext4_05 == "051") echo "selected"; ?>>051</option>
						<option value='052' <? if($ext4_05 == "052") echo "selected"; ?>>052</option>
						<option value='053' <? if($ext4_05 == "053") echo "selected"; ?>>053</option>
						<option value='054' <? if($ext4_05 == "054") echo "selected"; ?>>054</option>
						<option value='055' <? if($ext4_05 == "055") echo "selected"; ?>>055</option>
						<option value='061' <? if($ext4_05 == "061") echo "selected"; ?>>061</option>
						<option value='062' <? if($ext4_05 == "062") echo "selected"; ?>>062</option>
						<option value='063' <? if($ext4_05 == "063") echo "selected"; ?>>063</option>
						<option value='064' <? if($ext4_05 == "064") echo "selected"; ?>>064</option>
						<option value='070' <? if($ext4_05 == "070") echo "selected"; ?>>070</option>
					  </select> - 
					  <input name='ext4_06' class="frm_input" value='<?=$ext4_06?>' type='text' size='8' maxlength='4' onkeydown='onlyNumber(this);' itemname='일반전화 두번째자리' class=input>  - 
					  <input name='ext4_07' class="frm_input" value='<?=$ext4_07?>' type='text' size='8' maxlength='4' onkeydown='onlyNumber(this);' itemname='일반전화 세번째자리' class=input>
				 </td></tr><?php */?>
			<tr><td class=write_cb>희망보수</td>
				  <td class=write_fl colspan=3> <INPUT type=radio name='ext4_08' VALUE="" <? if($ext4_08 == "")  echo "checked"; ?>>월&nbsp;<INPUT class="frm_input" name='ext4_15' id='ext4_15' value="<?=$ext4_15?>" maxlength='4' onkeydown='onlyNumber(this);'  itemname="급여"> &nbsp;만원&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<INPUT type=radio name='ext4_08' VALUE="협의후결정" <? if($ext4_08 == "협의후결정")  echo "checked"; ?>>협의후결정
				  </td>
			</tr>


		</table>
	</td></tr></table>

<div style="height:20px;"></div>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan=2 height=40 align=center><b>학력 및 경력</b> &nbsp;<font color=red>(오른쪽 버튼을 눌러 한 행씩 추가하십시오.)</font>&nbsp;<input type=button style='width:90px;height:24px;' value="1행 추가 +" onClick="addRow()"></td></tr>
<tr>
	<td colspan="2">

	<table width="100%" cellspacing=1 cellpadding=3 bgcolor="#CCCCCC">
	<col width="30%"></col>
	<col width="60%"></col>
	<col width="10%"></col>
	<tr height="30">
		<td class=write_cb><b>기간</b></td>
		<td class=write_cb><b>학력/경력/자격증</b></td>
		<td class=write_cb><b>삭제</b></td>
	</tr>
	</table>
<?	if ($w == "u") { ?>
	<table id=dyntbl2 width="100%" cellspacing=1 cellpadding=3 bgcolor="#CCCCCC">
	<col bgcolor="#FFFFFF" align="center" width="30%"></col>
	<col bgcolor="#FFFFFF" align="center" width="60%"></col>
	<col bgcolor="#FFFFFF" align="center" width="10%"></col>
<div>
<? for ($i = 0;  $i < count($wr_body_1); $i++) { ?>
	<tr height="30" id=v_<?=$i?>>
		<td><input class='frm_input_a' required name=wr_body_1[] itemname='기간' value='<?=$wr_body_1[$i]?>' maxlength='40'></td>
		<td>
				<input class='frm_input_b' name=wr_body_2[] itemname='경력' value='<?=$wr_body_2[$i]?>' maxlength='160'>
		</td>
		<td><input type=button value=" 삭제 " onClick="delRow_php(this)"></td>
	</tr>
<? } ?>
</div>
	</table>
<?	} ?>
<table id=dyntbl1 width="100%" cellspacing=1 cellpadding=3 bgcolor="#EEEEEE">
	<col bgcolor="#FFFFFF" align="center" width="30%"></col>
	<col bgcolor="#FFFFFF" align="center" width="60%"></col>
	<col bgcolor="#FFFFFF" align="center" width="10%"></col>
	</table>
	</td>
</tr></table>


<div style="height:20px;"></div>

<table>

        <tr>
            <th scope="row"><label for="wr_content">내용<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php } ?>
            </td>
        </tr>

        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
        <tr>
            <th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
            <td><input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input" size="50"></td>
        </tr>
        <?php } ?>

        

        <?php if ($is_guest) { //자동등록방지  ?>
        <tr>
            <th scope="row">자동등록방지</th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>


</table>



    </div>

    <div class="btn_confirm">
        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
        <a href="../../p_form/board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
    </div>
    </form>













    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->
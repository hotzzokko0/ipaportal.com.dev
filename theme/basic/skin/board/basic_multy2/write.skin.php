<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include (G5_SKIN_PATH.'/multi_category/lib.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');
include "config.point.php"; // 옵션사용시 포인트 차감
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/bootstrap.min.css">', 0);
//add_javascript(G5_POSTCODE_JS, 0);
add_javascript(G5_POSTCODE_JS, 0);
?>

<?
$ex1_filed = explode("|",$write[wr_1]); 
$ext1_00  = $ex1_filed[0];//설립연도
$ext1_01  = $ex1_filed[1];//직원수
$ext1_02  = $ex1_filed[2];//원생수
$ext1_03  = $ex1_filed[3];//제출서류
$ext1_04  = $ex1_filed[4];//시강
$ext1_05  = $ex1_filed[5];//전화1
$ext1_06  = $ex1_filed[6];//전화2
$ext1_07  = $ex1_filed[7];//전화3
$ext1_08  = $ex1_filed[8];//급여(협의)
$ext1_09  = $ex1_filed[9];//수강대상1
$ext1_10  = $ex1_filed[10];//모집인원1
$ext1_11  = $ex1_filed[11];//경력1
$ext1_12  = $ex1_filed[12];//학력1
$ext1_13  = $ex1_filed[13];//나이1
$ext1_14  = $ex1_filed[14];//급여최소
$ext1_15  = $ex1_filed[15];//급여최대
$ext1_16  = $ex1_filed[16];//퇴직금
$ext1_17  = $ex1_filed[17];//온라인지원
$ext1_18  = $ex1_filed[18];//이메일지원
$ext1_19  = $ex1_filed[19];//방문지원
$ext1_20  = $ex1_filed[20];//전화문의
$ext1_21  = $ex1_filed[21];//직종2
$ext1_22  = $ex1_filed[22];//근무형태3
$ext1_23  = $ex1_filed[23];//나이3
$ext1_24  = $ex1_filed[24];//성별3
$ext1_25  = $ex1_filed[25];//학력3
$ext1_26  = $ex1_filed[26];//경력3
$ext1_27  = $ex1_filed[27];//수강대상3
$ext1_28  = $ex1_filed[28];//수업일수3
$ext1_29  = $ex1_filed[29];//모집인원3
$ext1_30  = $ex1_filed[30];//근무형태4
$ext1_31  = $ex1_filed[31];//나이4
$ext1_32  = $ex1_filed[32];//성별4
$ext1_33  = $ex1_filed[33];//학력4
$ext1_34  = $ex1_filed[34];//경력4
$ext1_35  = $ex1_filed[35];//수강대상4
$ext1_36  = $ex1_filed[36];//수업일수4
$ext1_37  = $ex1_filed[37];//모집인원4
$ext1_38  = $ex1_filed[38];//직종4
$ext1_39  = $ex1_filed[39];
$ext1_40  = $ex1_filed[40];
$ext1_41  = $ex1_filed[41];
$ext1_42  = $ex1_filed[42];
$ext1_43  = $ex1_filed[43];
$ext1_44  = $ex1_filed[44];
$ext1_45  = $ex1_filed[45];
$ext1_46  = $ex1_filed[46];
$ext1_47  = $ex1_filed[47];

$ex2_filed = explode("|",$write[wr_2]); 
$ext2_00  = $ex2_filed[0]; //직종1
$ext2_01  = $ex2_filed[1]; //정규직계약직1
$ext2_02  = $ex2_filed[2]; //성별1
$ext2_03  = $ex2_filed[3]; //직종2
$ext2_04  = $ex2_filed[4];//담당자
$ext2_05  = $ex2_filed[5];//휴대폰1
$ext2_06  = $ex2_filed[6];//휴대폰2
$ext2_07  = $ex2_filed[7];//휴대폰3
$ext2_08  = $ex2_filed[8];//이메일
$ext2_09  = $ex2_filed[9];//지원방법 기타
$ext2_10  = $ex2_filed[10];//비었음(근무형태2)
$ext2_11  = $ex2_filed[11];//비었음(나이2)
$ext2_12  = $ex2_filed[12];//비었음(성별2)
$ext2_13  = $ex2_filed[13];//비었음(학력2)
$ext2_14  = $ex2_filed[14];//비었음(경력2)
$ext2_15  = $ex2_filed[15];//수업일수1
$ext2_16  = $ex2_filed[16];//비었음(수강대상2)
$ext2_17  = $ex2_filed[17];//인근교통
$ext2_18  = $ex2_filed[18];//회사명
$ext2_19  = $ex2_filed[19]; //비었음(수업일수2)
$ext2_20  = $ex2_filed[20];//모집인원2

$ex3_filed = explode("|",$write[wr_3]); 
$ext3_00  = $ex3_filed[0];//주소
$ext3_01  = $ex3_filed[1];//주소
$ext3_02  = $ex3_filed[2];//주호
$ext3_03  = $ex3_filed[3];//주소 

//wr_3  지도
//wr_4  프리미엄 등록기간
//wr_5  모집 마감일
//wr_6  스페셜 등록기간
//wr_7  lib에서 wr_6
//wr_8  최신글에 멀티카테고리 표시하기
//wr_9  lib에서 wr_4
//wr_10
?>
<!-- [참고] 옵션필드 --//-->
<script> 
  $(function(){  
      $("#wr_5").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+1000d" }); 
  }); 
</script> 
<!--
<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
-->
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(document).on("change", "input[type='radio']", function(e) {
    var mb_point = "<?php echo $member['mb_point']; ?>"; /*회원포인트 */
    var need_point    = 0;
    var check_val     = jQuery.trim( $(this).val() );
    
    if( $(this).prop("checked") == false ) return false;
    if(typeof check_val == "undefined" || check_val == "" || check_val == 0 || check_val == "NaN" ) {
        check_val = 0;
        alert("체크박스에 체크하세요");
        return false;
    };
    if( parseInt(check_val) > parseInt(mb_point) ) {
          need_point = parseInt(check_val) - parseInt(mb_point);
          alert( check_val + "가 필요합니다. 현재 회원님의 포인트는 " + mb_point + "포인트로 " + need_point + "  포인트가 추가로 필요합니다." );
          $(this).prop({"checked" : false});
          return false;
    };
});
});//]]>  
</script>

<script>
function onlyNumber(objtext1){
var inText = objtext1.value;
var ret;

for (var i = 0; i < inText.length; i++) {
ret = inText.charCodeAt(i);
if (!((ret > 47) && (ret < 58))) {
alert("숫자만을 입력하세요");
objtext1.value = "";
objtext1.focus();
return false;
}
}
if (objtext1.value.length==6) {
document.form1.RNI_idnum2.focus() ;
}
return true;
}
</script>




<?php /*?><style type="text/css">
.write_head {height:30px; text-align:center; color:#8492A0;}
.field { border:1px solid #ccc; }
.write_fl {background-color:#FFFFFF; font-size:12px; font-family:돋움;color:#000000;padding-left:10px;text-align:left;line-height:180%;}
.write_flb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:left;font-weight:bold;}
.write_r {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;}
.write_rb {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:right;font-weight:bold;}
.write_fc {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 0 5 0;text-align:center;height:32px;}
.write_fcb {background-color:#FFFFFF; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;font-weight:bold;}
.write_c {background-color:#F3F3F3; font-size:12px; font-family:돋움;padding:5 5 5 5;text-align:center;}
.write_cb {background-color:#F3F3F3; font-size:12px; font-family:돋움;color:#000000;padding:5 5 5 5;text-align:center;font-weight:bold;height:30px;}
select {height:25px;background-color:#F3F3F3;}
.ed { border:1px solid #CCCCCC;height:24px; } 
</style><?php */?>

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
				<!--
				<select name="ca_name" id="ca_name" required class="required" >
                    <option value="">선택하세요</option>
                    <?//php echo $category_option ?>
                </select>
				-->
            </td>
        </tr>
        <?php } ?>

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

</div>

<br>
<div class="title_top">구인정보</div>
<table width="100%" cellpadding="0" cellspacing="1" bgcolor=#CCCCCC; class="table table-responsive">
		   
		 <tr><td width="14.2%" class=write_cb>직종</td>
			<td width="14.2%" class=write_cb>근무형태</td>
			<td width="14.2%" class=write_cb>나이</td>
			<td width="14.2%" class=write_cb>성별</td>
			<td width="14.2%" class=write_cb>학력</td>
			<td width="14.2%" class=write_cb>경력</td>
			<!--<td width="11%" class=write_cb>수강대상</td>
			<td width="11%" class=write_cb>수업일수</td>-->
			<td width="14.2%" class=write_cb>모집인원</td></tr>
		<!--1 ---------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
		<tr><td class=write_fc><INPUT class="frm_input required" name='ext2_00' id='ext2_00' value="<?=$ext2_00?>" maxlength='70'  itemname="직종1" required></td>
			<td class=write_fc> <select name="ext2_01" required itemname='근무형태'>
							<option value="">선택</option>
							<option value="정규직" <? if($ext2_01 == "정규직")	 echo "selected"; ?>>정규직</option>
							<option value="계약직" <? if($ext2_01 == "계약직")	 echo "selected"; ?>>계약직</option>
							<option value="시간제" <? if($ext2_01 == "시간제")	 echo "selected"; ?>>시간제</option>
							<?php /*?><option value="보조강사" <? if($ext2_01 == "보조강사")	 echo "selected"; ?>>보조강사</option><?php */?>
							<option value="무관" <? if($ext2_01 == "무관")	 echo "selected"; ?>>무관</option>
							<option value="기타" <? if($ext2_01 == "기타")	 echo "selected"; ?>>기타</option>
							</select></td>
			<td class=write_fc>
				<SELECT name='ext1_13' class='ed' required itemname='나이'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='무관' <? if($ext1_13 == "무관") echo "selected"; ?>>무관</option>
						<option value='23세 이하' <? if($ext1_13 == "23세 이하") echo "selected"; ?>>23세 이하</option>
						<option value='24세 이하' <? if($ext1_13 == "24세 이하") echo "selected"; ?>>24세 이하</option>
						<option value='25세 이하' <? if($ext1_13 == "25세 이하") echo "selected"; ?>>25세 이하</option>
						<option value='26세 이하' <? if($ext1_13 == "26세 이하") echo "selected"; ?>>26세 이하</option>
						<option value='27세 이하' <? if($ext1_13 == "27세 이하") echo "selected"; ?>>27세 이하</option>
						<option value='28세 이하' <? if($ext1_13 == "28세 이하") echo "selected"; ?>>28세 이하</option>
						<option value='29세 이하' <? if($ext1_13 == "29세 이하") echo "selected"; ?>>29세 이하</option>
						<option value='30세 이하' <? if($ext1_13 == "30세 이하") echo "selected"; ?>>30세 이하</option>
						<option value='31세 이하' <? if($ext1_13 == "31세 이하") echo "selected"; ?>>31세 이하</option>
						<option value='32세 이하' <? if($ext1_13 == "32세 이하") echo "selected"; ?>>32세 이하</option>
						<option value='33세 이하' <? if($ext1_13 == "33세 이하") echo "selected"; ?>>33세 이하</option>
						<option value='34세 이하' <? if($ext1_13 == "34세 이하") echo "selected"; ?>>34세 이하</option>
						<option value='35세 이하' <? if($ext1_13 == "35세 이하") echo "selected"; ?>>35세 이하</option>
						<option value='36세 이하' <? if($ext1_13 == "36세 이하") echo "selected"; ?>>36세 이하</option>
						<option value='37세 이하' <? if($ext1_13 == "37세 이하") echo "selected"; ?>>37세 이하</option>
						<option value='38세 이하' <? if($ext1_13 == "38세 이하") echo "selected"; ?>>38세 이하</option>
						<option value='39세 이하' <? if($ext1_13 == "39세 이하") echo "selected"; ?>>39세 이하</option>
						<option value='40세 이하' <? if($ext1_13 == "40세 이하") echo "selected"; ?>>40세 이하</option>
						<option value='41세 이하' <? if($ext1_13 == "41세 이하") echo "selected"; ?>>41세 이하</option>
						<option value='42세 이하' <? if($ext1_13 == "42세 이하") echo "selected"; ?>>42세 이하</option>
						<option value='43세 이하' <? if($ext1_13 == "43세 이하") echo "selected"; ?>>43세 이하</option>
						<option value='44세 이하' <? if($ext1_13 == "44세 이하") echo "selected"; ?>>44세 이하</option>
						<option value='45세 이하' <? if($ext1_13 == "45세 이하") echo "selected"; ?>>45세 이하</option>
						<option value='46세 이하' <? if($ext1_13 == "46세 이하") echo "selected"; ?>>46세 이하</option>
						<option value='47세 이하' <? if($ext1_13 == "47세 이하") echo "selected"; ?>>47세 이하</option>
						<option value='48세 이하' <? if($ext1_13 == "48세 이하") echo "selected"; ?>>48세 이하</option>
						<option value='49세 이하' <? if($ext1_13 == "49세 이하") echo "selected"; ?>>49세 이하</option>
						<option value='50세 이하' <? if($ext1_13 == "50세 이하") echo "selected"; ?>>50세 이하</option>
						<option value='51세 이하' <? if($ext1_13 == "51세 이하") echo "selected"; ?>>51세 이하</option>
						<option value='52세 이하' <? if($ext1_13 == "52세 이하") echo "selected"; ?>>52세 이하</option>
						<option value='53세 이하' <? if($ext1_13 == "53세 이하") echo "selected"; ?>>53세 이하</option>
						<option value='54세 이하' <? if($ext1_13 == "54세 이하") echo "selected"; ?>>54세 이하</option>
						<option value='55세 이하' <? if($ext1_13 == "55세 이하") echo "selected"; ?>>55세 이하</option>
					 </SELECT></td>
			<td class=write_fc>
					 <select name="ext2_02" required itemname='성별'>
							<option value="">선택</option>
							<option value="남자" <? if($ext2_02 == "남자")	 echo "selected"; ?>>남자</option>
							<option value="여자" <? if($ext2_02 == "여자")	 echo "selected"; ?>>여자</option>
							<option value="무관" <? if($ext2_02 == "무관")	 echo "selected"; ?>>무관</option>
						</select></td>
			<td class=write_fc>
					<select name="ext1_12" required itemname='학력'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_12 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="전문대졸" <? if($ext1_12 == "전문대졸")	 echo "selected"; ?>>전문대졸</option>
						<option value="대졸" <? if($ext1_12 == "대졸")	 echo "selected"; ?>>대졸</option>
						<option value="대학원졸" <? if($ext1_12 == "대학원졸")	 echo "selected"; ?>>대학원졸</option>
					</select></td>
			<td class=write_fc>
					<select name="ext1_11" required itemname='경력'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_11 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="1년이상" <? if($ext1_11 == "1년이상") echo "selected"; ?>>1년이상</option>
						<option value="2년이상" <? if($ext1_11 == "2년이상") echo "selected"; ?>>2년이상</option>
						<option value="3년이상" <? if($ext1_11 == "3년이상") echo "selected"; ?>>3년이상</option>
						<option value="4년이상" <? if($ext1_11 == "4년이상") echo "selected"; ?>>4년이상</option>
						<option value="5년이상" <? if($ext1_11 == "5년이상") echo "selected"; ?>>5년이상</option>
						<option value="6년이상" <? if($ext1_11 == "6년이상") echo "selected"; ?>>6년이상</option>
						<option value="7년이상" <? if($ext1_11 == "7년이상") echo "selected"; ?>>7년이상</option>
						<option value="8년이상" <? if($ext1_11 == "8년이상") echo "selected"; ?>>8년이상</option>
						<option value="9년이상" <? if($ext1_11 == "9년이상") echo "selected"; ?>>9년이상</option>
						<!--<option value="10년이상" <? if($ext1_11 == "10년이상") echo "selected"; ?>>10년이상</option>-->
						</select></td>
			<?php /*?><td class=write_fc>
					<select name="ext1_09" required itemname='수강대상'>
					<option value="">선택</option>
					<option value="유아" <? if($ext1_09 == "유아")	 echo "selected"; ?>>유아</option>
					<option value="유초등부" <? if($ext1_09 == "유초등부")	 echo "selected"; ?>>유초등부</option>
					<option value="초등부" <? if($ext1_09 == "초등부")	 echo "selected"; ?>>초등부</option>
					<option value="중등부" <? if($ext1_09 == "중등부")	 echo "selected"; ?>>중등부</option>
					<option value="고등부" <? if($ext1_09 == "고등부")	 echo "selected"; ?>>고등부</option>
					<option value="초중등부" <? if($ext1_09 == "초중등부")	 echo "selected"; ?>>초중등부</option>
					<option value="중고등부" <? if($ext1_09 == "중고등부")	 echo "selected"; ?>>중고등부</option>
					<option value="초중고" <? if($ext1_09 == "초중고")	 echo "selected"; ?>>초중고</option>
					<option value="성인반" <? if($ext1_09 == "성인반")	 echo "selected"; ?>>성인반</option>
					<option value="기타" <? if($ext1_09 == "기타")	 echo "selected"; ?>>기타</option>
			   </select></td><?php */?>
			<?php /*?><td class=write_fc>
					<SELECT name='ext2_15' class='ed' required itemname='수업일수'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='주 1일' <? if($ext2_15 == "주 1일") echo "selected"; ?>>주 1일</option>
						<option value='주 2일' <? if($ext2_15 == "주 2일") echo "selected"; ?>>주 2일</option>
						<option value='주 3일' <? if($ext2_15 == "주 3일") echo "selected"; ?>>주 3일</option>
						<option value='주 4일' <? if($ext2_15 == "주 4일") echo "selected"; ?>>주 4일</option>
						<option value='주 5일' <? if($ext2_15 == "주 5일") echo "selected"; ?>>주 5일</option>
						<option value='주 6일' <? if($ext2_15 == "주 6일") echo "selected"; ?>>주 6일</option>
						<option value='주 7일' <? if($ext2_15 == "주 7일") echo "selected"; ?>>주 7일</option>
					</SELECT></td><?php */?>
			<td class=write_fc>
					<input name='ext1_10' class="frm_input required" style="width:60px;" value='<?=$ext1_10?>' type='text' maxlength='3' onKeyDown='onlyNumber(this);' required itemname='모집인원'>&nbsp;명</td></tr>


		<!--2  -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
		<tr><td class=write_fc><INPUT class="frm_input" name='ext2_03' id='ext2_03' value="<?=$ext2_03?>" maxlength='70'  itemname="직종2"></td>
			<td class=write_fc> <select name="ext2_10" itemname='근무형태2'>
							<option value="">선택</option>
							<option value="정규직" <? if($ext2_10 == "정규직")	 echo "selected"; ?>>정규직</option>
							<option value="계약직" <? if($ext2_10 == "계약직")	 echo "selected"; ?>>계약직</option>
							<option value="시간제" <? if($ext2_10 == "시간제")	 echo "selected"; ?>>시간제</option>
							<option value="보조강사" <? if($ext2_10 == "보조강사")	 echo "selected"; ?>>보조강사</option>
							<option value="무관" <? if($ext2_10 == "무관")	 echo "selected"; ?>>무관</option>
							<option value="기타" <? if($ext2_10 == "기타")	 echo "selected"; ?>>기타</option>
							</select></td>
			<td class=write_fc>
				<SELECT name='ext2_11' class='ed' itemname='나이2'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='무관' <? if($ext2_11 == "무관") echo "selected"; ?>>무관</option>
						<option value='23세 이하' <? if($ext2_11 == "23세 이하") echo "selected"; ?>>23세 이하</option>
						<option value='24세 이하' <? if($ext2_11 == "24세 이하") echo "selected"; ?>>24세 이하</option>
						<option value='25세 이하' <? if($ext2_11 == "25세 이하") echo "selected"; ?>>25세 이하</option>
						<option value='26세 이하' <? if($ext2_11 == "26세 이하") echo "selected"; ?>>26세 이하</option>
						<option value='27세 이하' <? if($ext2_11 == "27세 이하") echo "selected"; ?>>27세 이하</option>
						<option value='28세 이하' <? if($ext2_11 == "28세 이하") echo "selected"; ?>>28세 이하</option>
						<option value='29세 이하' <? if($ext2_11 == "29세 이하") echo "selected"; ?>>29세 이하</option>
						<option value='30세 이하' <? if($ext2_11 == "30세 이하") echo "selected"; ?>>30세 이하</option>
						<option value='31세 이하' <? if($ext2_11 == "31세 이하") echo "selected"; ?>>31세 이하</option>
						<option value='32세 이하' <? if($ext2_11 == "32세 이하") echo "selected"; ?>>32세 이하</option>
						<option value='33세 이하' <? if($ext2_11 == "33세 이하") echo "selected"; ?>>33세 이하</option>
						<option value='34세 이하' <? if($ext2_11 == "34세 이하") echo "selected"; ?>>34세 이하</option>
						<option value='35세 이하' <? if($ext2_11 == "35세 이하") echo "selected"; ?>>35세 이하</option>
						<option value='36세 이하' <? if($ext2_11 == "36세 이하") echo "selected"; ?>>36세 이하</option>
						<option value='37세 이하' <? if($ext2_11 == "37세 이하") echo "selected"; ?>>37세 이하</option>
						<option value='38세 이하' <? if($ext2_11 == "38세 이하") echo "selected"; ?>>38세 이하</option>
						<option value='39세 이하' <? if($ext2_11 == "39세 이하") echo "selected"; ?>>39세 이하</option>
						<option value='40세 이하' <? if($ext2_11 == "40세 이하") echo "selected"; ?>>40세 이하</option>
						<option value='41세 이하' <? if($ext2_11 == "41세 이하") echo "selected"; ?>>41세 이하</option>
						<option value='42세 이하' <? if($ext2_11 == "42세 이하") echo "selected"; ?>>42세 이하</option>
						<option value='43세 이하' <? if($ext2_11 == "43세 이하") echo "selected"; ?>>43세 이하</option>
						<option value='44세 이하' <? if($ext2_11 == "44세 이하") echo "selected"; ?>>44세 이하</option>
						<option value='45세 이하' <? if($ext2_11 == "45세 이하") echo "selected"; ?>>45세 이하</option>
						<option value='46세 이하' <? if($ext2_11 == "46세 이하") echo "selected"; ?>>46세 이하</option>
						<option value='47세 이하' <? if($ext2_11 == "47세 이하") echo "selected"; ?>>47세 이하</option>
						<option value='48세 이하' <? if($ext2_11 == "48세 이하") echo "selected"; ?>>48세 이하</option>
						<option value='49세 이하' <? if($ext2_11 == "49세 이하") echo "selected"; ?>>49세 이하</option>
						<option value='50세 이하' <? if($ext2_11 == "50세 이하") echo "selected"; ?>>50세 이하</option>
						<option value='51세 이하' <? if($ext2_11 == "51세 이하") echo "selected"; ?>>51세 이하</option>
						<option value='52세 이하' <? if($ext2_11 == "52세 이하") echo "selected"; ?>>52세 이하</option>
						<option value='53세 이하' <? if($ext2_11 == "53세 이하") echo "selected"; ?>>53세 이하</option>
						<option value='54세 이하' <? if($ext2_11 == "54세 이하") echo "selected"; ?>>54세 이하</option>
						<option value='55세 이하' <? if($ext2_11 == "55세 이하") echo "selected"; ?>>55세 이하</option>
					 </SELECT></td>
			<td class=write_fc>
					 <select name="ext2_12" itemname='성별2'>
							<option value="">선택</option>
							<option value="남자" <? if($ext2_12 == "남자")	 echo "selected"; ?>>남자</option>
							<option value="여자" <? if($ext2_12 == "여자")	 echo "selected"; ?>>여자</option>
							<option value="무관" <? if($ext2_12 == "무관")	 echo "selected"; ?>>무관</option>
						</select></td>
			<td class=write_fc>
					<select name="ext2_13" itemname='학력2'>
						<option value="">선택</option>
						<option value="무관" <? if($ext2_13 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="전문대졸" <? if($ext2_13 == "전문대졸")	 echo "selected"; ?>>전문대졸</option>
						<option value="대졸" <? if($ext2_13 == "대졸")	 echo "selected"; ?>>대졸</option>
						<option value="대학원졸" <? if($ext2_13 == "대학원졸")	 echo "selected"; ?>>대학원졸</option>
					</select></td>
			<td class=write_fc>
					<select name="ext2_14" itemname='경력2'>
						<option value="">선택</option>
						<option value="무관" <? if($ext2_14 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="1년이상" <? if($ext2_14 == "1년이상") echo "selected"; ?>>1년이상</option>
						<option value="2년이상" <? if($ext2_14 == "2년이상") echo "selected"; ?>>2년이상</option>
						<option value="3년이상" <? if($ext2_14 == "3년이상") echo "selected"; ?>>3년이상</option>
						<option value="4년이상" <? if($ext2_14 == "4년이상") echo "selected"; ?>>4년이상</option>
						<option value="5년이상" <? if($ext2_14 == "5년이상") echo "selected"; ?>>5년이상</option>
						<option value="6년이상" <? if($ext2_14 == "6년이상") echo "selected"; ?>>6년이상</option>
						<option value="7년이상" <? if($ext2_14 == "7년이상") echo "selected"; ?>>7년이상</option>
						<option value="8년이상" <? if($ext2_14 == "8년이상") echo "selected"; ?>>8년이상</option>
						<option value="9년이상" <? if($ext2_14 == "9년이상") echo "selected"; ?>>9년이상</option>
						<!--<option value="10년이상" <? if($ext2_14 == "10년이상") echo "selected"; ?>>10년이상</option>-->
						</select></td>
			<?php /*?><td class=write_fc>
					<select name="ext2_16" itemname='수강대상2'>
					<option value="">선택</option>
					<option value="유아" <? if($ext2_16 == "유아")	 echo "selected"; ?>>유아</option>
					<option value="유초등부" <? if($ext2_16 == "유초등부")	 echo "selected"; ?>>유초등부</option>
					<option value="초등부" <? if($ext2_16 == "초등부")	 echo "selected"; ?>>초등부</option>
					<option value="중등부" <? if($ext2_16 == "중등부")	 echo "selected"; ?>>중등부</option>
					<option value="고등부" <? if($ext2_16 == "고등부")	 echo "selected"; ?>>고등부</option>
					<option value="초중등부" <? if($ext2_16 == "초중등부")	 echo "selected"; ?>>초중등부</option>
					<option value="중고등부" <? if($ext2_16 == "중고등부")	 echo "selected"; ?>>중고등부</option>
					<option value="초중고" <? if($ext2_16 == "초중고")	 echo "selected"; ?>>초중고</option>
					<option value="성인반" <? if($ext2_16 == "성인반")	 echo "selected"; ?>>성인반</option>
					<option value="기타" <? if($ext2_16 == "기타")	 echo "selected"; ?>>기타</option>
			   </select></td>
			<td class=write_fc>
					<SELECT name='ext2_19' class='ed' itemname='수업일수2'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='주 1일' <? if($ext2_19 == "주 1일") echo "selected"; ?>>주 1일</option>
						<option value='주 2일' <? if($ext2_19 == "주 2일") echo "selected"; ?>>주 2일</option>
						<option value='주 3일' <? if($ext2_19 == "주 3일") echo "selected"; ?>>주 3일</option>
						<option value='주 4일' <? if($ext2_19 == "주 4일") echo "selected"; ?>>주 4일</option>
						<option value='주 5일' <? if($ext2_19 == "주 5일") echo "selected"; ?>>주 5일</option>
						<option value='주 6일' <? if($ext2_19 == "주 6일") echo "selected"; ?>>주 6일</option>
						<option value='주 7일' <? if($ext2_19 == "주 7일") echo "selected"; ?>>주 7일</option>
					</SELECT></td><?php */?>
			<td class=write_fc>
					<input name='ext2_20' class="frm_input" style="width:60px;" value='<?=$ext2_20?>' type='text' maxlength='3' onKeyDown='onlyNumber(this);' itemname='모집인원'>&nbsp;명</td></tr>
	
<!--3  -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

			<tr><td class=write_fc><INPUT class="frm_input"  name='ext1_21' id='ext1_21' value="<?=$ext1_21?>" maxlength='70'  itemname="직종3"></td>
			<td class=write_fc> <select name="ext1_22" itemname='근무형태3'>
							<option value="">선택</option>
							<option value="정규직" <? if($ext1_22 == "정규직")	 echo "selected"; ?>>정규직</option>
							<option value="계약직" <? if($ext1_22 == "계약직")	 echo "selected"; ?>>계약직</option>
							<option value="시간제" <? if($ext1_22 == "시간제")	 echo "selected"; ?>>시간제</option>
							<option value="보조강사" <? if($ext1_22 == "보조강사")	 echo "selected"; ?>>보조강사</option>
							<option value="무관" <? if($ext1_22 == "무관")	 echo "selected"; ?>>무관</option>
							<option value="기타" <? if($ext1_22 == "기타")	 echo "selected"; ?>>기타</option>
							</select></td>
			<td class=write_fc>
				<SELECT name='ext1_23' class='ed' itemname='나이2'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='무관' <? if($ext1_23 == "무관") echo "selected"; ?>>무관</option>
						<option value='23세 이하' <? if($ext1_23 == "23세 이하") echo "selected"; ?>>23세 이하</option>
						<option value='24세 이하' <? if($ext1_23 == "24세 이하") echo "selected"; ?>>24세 이하</option>
						<option value='25세 이하' <? if($ext1_23 == "25세 이하") echo "selected"; ?>>25세 이하</option>
						<option value='26세 이하' <? if($ext1_23 == "26세 이하") echo "selected"; ?>>26세 이하</option>
						<option value='27세 이하' <? if($ext1_23 == "27세 이하") echo "selected"; ?>>27세 이하</option>
						<option value='28세 이하' <? if($ext1_23 == "28세 이하") echo "selected"; ?>>28세 이하</option>
						<option value='29세 이하' <? if($ext1_23 == "29세 이하") echo "selected"; ?>>29세 이하</option>
						<option value='30세 이하' <? if($ext1_23 == "30세 이하") echo "selected"; ?>>30세 이하</option>
						<option value='31세 이하' <? if($ext1_23 == "31세 이하") echo "selected"; ?>>31세 이하</option>
						<option value='32세 이하' <? if($ext1_23 == "32세 이하") echo "selected"; ?>>32세 이하</option>
						<option value='33세 이하' <? if($ext1_23 == "33세 이하") echo "selected"; ?>>33세 이하</option>
						<option value='34세 이하' <? if($ext1_23 == "34세 이하") echo "selected"; ?>>34세 이하</option>
						<option value='35세 이하' <? if($ext1_23 == "35세 이하") echo "selected"; ?>>35세 이하</option>
						<option value='36세 이하' <? if($ext1_23 == "36세 이하") echo "selected"; ?>>36세 이하</option>
						<option value='37세 이하' <? if($ext1_23 == "37세 이하") echo "selected"; ?>>37세 이하</option>
						<option value='38세 이하' <? if($ext1_23 == "38세 이하") echo "selected"; ?>>38세 이하</option>
						<option value='39세 이하' <? if($ext1_23 == "39세 이하") echo "selected"; ?>>39세 이하</option>
						<option value='40세 이하' <? if($ext1_23 == "40세 이하") echo "selected"; ?>>40세 이하</option>
						<option value='41세 이하' <? if($ext1_23 == "41세 이하") echo "selected"; ?>>41세 이하</option>
						<option value='42세 이하' <? if($ext1_23 == "42세 이하") echo "selected"; ?>>42세 이하</option>
						<option value='43세 이하' <? if($ext1_23 == "43세 이하") echo "selected"; ?>>43세 이하</option>
						<option value='44세 이하' <? if($ext1_23 == "44세 이하") echo "selected"; ?>>44세 이하</option>
						<option value='45세 이하' <? if($ext1_23 == "45세 이하") echo "selected"; ?>>45세 이하</option>
						<option value='46세 이하' <? if($ext1_23 == "46세 이하") echo "selected"; ?>>46세 이하</option>
						<option value='47세 이하' <? if($ext1_23 == "47세 이하") echo "selected"; ?>>47세 이하</option>
						<option value='48세 이하' <? if($ext1_23 == "48세 이하") echo "selected"; ?>>48세 이하</option>
						<option value='49세 이하' <? if($ext1_23 == "49세 이하") echo "selected"; ?>>49세 이하</option>
						<option value='50세 이하' <? if($ext1_23 == "50세 이하") echo "selected"; ?>>50세 이하</option>
						<option value='51세 이하' <? if($ext1_23 == "51세 이하") echo "selected"; ?>>51세 이하</option>
						<option value='52세 이하' <? if($ext1_23 == "52세 이하") echo "selected"; ?>>52세 이하</option>
						<option value='53세 이하' <? if($ext1_23 == "53세 이하") echo "selected"; ?>>53세 이하</option>
						<option value='54세 이하' <? if($ext1_23 == "54세 이하") echo "selected"; ?>>54세 이하</option>
						<option value='55세 이하' <? if($ext1_23 == "55세 이하") echo "selected"; ?>>55세 이하</option>
					 </SELECT></td>
			<td class=write_fc>
					 <select name="ext1_24" itemname='성별3'>
							<option value="">선택</option>
							<option value="남자" <? if($ext1_24 == "남자")	 echo "selected"; ?>>남자</option>
							<option value="여자" <? if($ext1_24 == "여자")	 echo "selected"; ?>>여자</option>
							<option value="무관" <? if($ext1_24 == "무관")	 echo "selected"; ?>>무관</option>
						</select></td>
			<td class=write_fc>
					<select name="ext1_25" itemname='학력3'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_25 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="전문대졸" <? if($ext1_25 == "전문대졸")	 echo "selected"; ?>>전문대졸</option>
						<option value="대졸" <? if($ext1_25 == "대졸")	 echo "selected"; ?>>대졸</option>
						<option value="대학원졸" <? if($ext1_25 == "대학원졸")	 echo "selected"; ?>>대학원졸</option>
					</select></td>
			<td class=write_fc>
					<select name="ext1_26" itemname='경력3'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_26 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="1년이상" <? if($ext1_26 == "1년이상") echo "selected"; ?>>1년이상</option>
						<option value="2년이상" <? if($ext1_26 == "2년이상") echo "selected"; ?>>2년이상</option>
						<option value="3년이상" <? if($ext1_26 == "3년이상") echo "selected"; ?>>3년이상</option>
						<option value="4년이상" <? if($ext1_26 == "4년이상") echo "selected"; ?>>4년이상</option>
						<option value="5년이상" <? if($ext1_26 == "5년이상") echo "selected"; ?>>5년이상</option>
						<option value="6년이상" <? if($ext1_26 == "6년이상") echo "selected"; ?>>6년이상</option>
						<option value="7년이상" <? if($ext1_26 == "7년이상") echo "selected"; ?>>7년이상</option>
						<option value="8년이상" <? if($ext1_26 == "8년이상") echo "selected"; ?>>8년이상</option>
						<option value="9년이상" <? if($ext1_26 == "9년이상") echo "selected"; ?>>9년이상</option>
						<!--<option value="10년이상" <? if($ext1_26 == "10년이상") echo "selected"; ?>>10년이상</option>-->
						</select></td>
			<?php /*?><td class=write_fc>
					<select name="ext1_27" itemname='수강대상3'>
					<option value="">선택</option>
					<option value="유아" <? if($ext1_27 == "유아")	 echo "selected"; ?>>유아</option>
					<option value="유초등부" <? if($ext1_27 == "유초등부")	 echo "selected"; ?>>유초등부</option>
					<option value="초등부" <? if($ext1_27 == "초등부")	 echo "selected"; ?>>초등부</option>
					<option value="중등부" <? if($ext1_27 == "중등부")	 echo "selected"; ?>>중등부</option>
					<option value="고등부" <? if($ext1_27 == "고등부")	 echo "selected"; ?>>고등부</option>
					<option value="초중등부" <? if($ext1_27 == "초중등부")	 echo "selected"; ?>>초중등부</option>
					<option value="중고등부" <? if($ext1_27 == "중고등부")	 echo "selected"; ?>>중고등부</option>
					<option value="초중고" <? if($ext1_27 == "초중고")	 echo "selected"; ?>>초중고</option>
					<option value="성인반" <? if($ext1_27 == "성인반")	 echo "selected"; ?>>성인반</option>
					<option value="기타" <? if($ext1_27 == "기타")	 echo "selected"; ?>>기타</option>
			   </select></td>
			<td class=write_fc>
					<SELECT name='ext1_28' class='ed' itemname='수업일수3'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='주 1일' <? if($ext1_28 == "주 1일") echo "selected"; ?>>주 1일</option>
						<option value='주 2일' <? if($ext1_28 == "주 2일") echo "selected"; ?>>주 2일</option>
						<option value='주 3일' <? if($ext1_28 == "주 3일") echo "selected"; ?>>주 3일</option>
						<option value='주 4일' <? if($ext1_28 == "주 4일") echo "selected"; ?>>주 4일</option>
						<option value='주 5일' <? if($ext1_28 == "주 5일") echo "selected"; ?>>주 5일</option>
						<option value='주 6일' <? if($ext1_28 == "주 6일") echo "selected"; ?>>주 6일</option>
						<option value='주 7일' <? if($ext1_28 == "주 7일") echo "selected"; ?>>주 7일</option>
					</SELECT></td><?php */?>
			<td class=write_fc>
					<input name='ext1_29' class="frm_input" style="width:60px;" value='<?=$ext1_29?>' type='text' maxlength='3' onKeyDown='onlyNumber(this);' itemname='모집인원3'>&nbsp;명</td></tr>

	<!-- 4 -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

	<tr><td class=write_fc><INPUT class="frm_input"  name='ext1_38' id='ext1_38' value="<?=$ext1_38?>" maxlength='70'  itemname="직종4"></td>
			<td class=write_fc> <select name="ext1_30" itemname='근무형태4'>
							<option value="">선택</option>
							<option value="정규직" <? if($ext1_30 == "정규직")	 echo "selected"; ?>>정규직</option>
							<option value="계약직" <? if($ext1_30 == "계약직")	 echo "selected"; ?>>계약직</option>
							<option value="시간제" <? if($ext1_30 == "시간제")	 echo "selected"; ?>>시간제</option>
							<option value="보조강사" <? if($ext1_30 == "보조강사")	 echo "selected"; ?>>보조강사</option>
							<option value="무관" <? if($ext1_30 == "무관")	 echo "selected"; ?>>무관</option>
							<option value="기타" <? if($ext1_30 == "기타")	 echo "selected"; ?>>기타</option>
							</select></td>
			<td class=write_fc>
				<SELECT name='ext1_31' class='ed' itemname='나이4'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='무관' <? if($ext1_31 == "무관") echo "selected"; ?>>무관</option>
						<option value='23세 이하' <? if($ext1_31 == "23세 이하") echo "selected"; ?>>23세 이하</option>
						<option value='24세 이하' <? if($ext1_31 == "24세 이하") echo "selected"; ?>>24세 이하</option>
						<option value='25세 이하' <? if($ext1_31 == "25세 이하") echo "selected"; ?>>25세 이하</option>
						<option value='26세 이하' <? if($ext1_31 == "26세 이하") echo "selected"; ?>>26세 이하</option>
						<option value='27세 이하' <? if($ext1_31 == "27세 이하") echo "selected"; ?>>27세 이하</option>
						<option value='28세 이하' <? if($ext1_31 == "28세 이하") echo "selected"; ?>>28세 이하</option>
						<option value='29세 이하' <? if($ext1_31 == "29세 이하") echo "selected"; ?>>29세 이하</option>
						<option value='30세 이하' <? if($ext1_31 == "30세 이하") echo "selected"; ?>>30세 이하</option>
						<option value='31세 이하' <? if($ext1_31 == "31세 이하") echo "selected"; ?>>31세 이하</option>
						<option value='32세 이하' <? if($ext1_31 == "32세 이하") echo "selected"; ?>>32세 이하</option>
						<option value='33세 이하' <? if($ext1_31 == "33세 이하") echo "selected"; ?>>33세 이하</option>
						<option value='34세 이하' <? if($ext1_31 == "34세 이하") echo "selected"; ?>>34세 이하</option>
						<option value='35세 이하' <? if($ext1_31 == "35세 이하") echo "selected"; ?>>35세 이하</option>
						<option value='36세 이하' <? if($ext1_31 == "36세 이하") echo "selected"; ?>>36세 이하</option>
						<option value='37세 이하' <? if($ext1_31 == "37세 이하") echo "selected"; ?>>37세 이하</option>
						<option value='38세 이하' <? if($ext1_31 == "38세 이하") echo "selected"; ?>>38세 이하</option>
						<option value='39세 이하' <? if($ext1_31 == "39세 이하") echo "selected"; ?>>39세 이하</option>
						<option value='40세 이하' <? if($ext1_31 == "40세 이하") echo "selected"; ?>>40세 이하</option>
						<option value='41세 이하' <? if($ext1_31 == "41세 이하") echo "selected"; ?>>41세 이하</option>
						<option value='42세 이하' <? if($ext1_31 == "42세 이하") echo "selected"; ?>>42세 이하</option>
						<option value='43세 이하' <? if($ext1_31 == "43세 이하") echo "selected"; ?>>43세 이하</option>
						<option value='44세 이하' <? if($ext1_31 == "44세 이하") echo "selected"; ?>>44세 이하</option>
						<option value='45세 이하' <? if($ext1_31 == "45세 이하") echo "selected"; ?>>45세 이하</option>
						<option value='46세 이하' <? if($ext1_31 == "46세 이하") echo "selected"; ?>>46세 이하</option>
						<option value='47세 이하' <? if($ext1_31 == "47세 이하") echo "selected"; ?>>47세 이하</option>
						<option value='48세 이하' <? if($ext1_31 == "48세 이하") echo "selected"; ?>>48세 이하</option>
						<option value='49세 이하' <? if($ext1_31 == "49세 이하") echo "selected"; ?>>49세 이하</option>
						<option value='50세 이하' <? if($ext1_31 == "50세 이하") echo "selected"; ?>>50세 이하</option>
						<option value='51세 이하' <? if($ext1_31 == "51세 이하") echo "selected"; ?>>51세 이하</option>
						<option value='52세 이하' <? if($ext1_31 == "52세 이하") echo "selected"; ?>>52세 이하</option>
						<option value='53세 이하' <? if($ext1_31 == "53세 이하") echo "selected"; ?>>53세 이하</option>
						<option value='54세 이하' <? if($ext1_31 == "54세 이하") echo "selected"; ?>>54세 이하</option>
						<option value='55세 이하' <? if($ext1_31 == "55세 이하") echo "selected"; ?>>55세 이하</option>
					 </SELECT></td>
			<td class=write_fc>
					 <select name="ext1_32" itemname='성별4'>
							<option value="">선택</option>
							<option value="남자" <? if($ext1_32 == "남자")	 echo "selected"; ?>>남자</option>
							<option value="여자" <? if($ext1_32 == "여자")	 echo "selected"; ?>>여자</option>
							<option value="무관" <? if($ext1_32 == "무관")	 echo "selected"; ?>>무관</option>
						</select></td>
			<td class=write_fc>
					<select name="ext1_33" itemname='학력4'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_33 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="전문대졸" <? if($ext1_33 == "전문대졸")	 echo "selected"; ?>>전문대졸</option>
						<option value="대졸" <? if($ext1_33 == "대졸")	 echo "selected"; ?>>대졸</option>
						<option value="대학원졸" <? if($ext1_33 == "대학원졸")	 echo "selected"; ?>>대학원졸</option>
					</select></td>
			<td class=write_fc>
					<select name="ext1_34" itemname='경력4'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_34 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="1년이상" <? if($ext1_34 == "1년이상") echo "selected"; ?>>1년이상</option>
						<option value="2년이상" <? if($ext1_34 == "2년이상") echo "selected"; ?>>2년이상</option>
						<option value="3년이상" <? if($ext1_34 == "3년이상") echo "selected"; ?>>3년이상</option>
						<option value="4년이상" <? if($ext1_34 == "4년이상") echo "selected"; ?>>4년이상</option>
						<option value="5년이상" <? if($ext1_34 == "5년이상") echo "selected"; ?>>5년이상</option>
						<option value="6년이상" <? if($ext1_34 == "6년이상") echo "selected"; ?>>6년이상</option>
						<option value="7년이상" <? if($ext1_34 == "7년이상") echo "selected"; ?>>7년이상</option>
						<option value="8년이상" <? if($ext1_34 == "8년이상") echo "selected"; ?>>8년이상</option>
						<option value="9년이상" <? if($ext1_34 == "9년이상") echo "selected"; ?>>9년이상</option>
						<!--<option value="10년이상" <? if($ext1_34 == "10년이상") echo "selected"; ?>>10년이상</option>-->
						</select></td>
			<?php /*?><td class=write_fc>
					<select name="ext1_35" itemname='수강대상4'>
					<option value="">선택</option>
					<option value="유아" <? if($ext1_35 == "유아")	 echo "selected"; ?>>유아</option>
					<option value="유초등부" <? if($ext1_35 == "유초등부")	 echo "selected"; ?>>유초등부</option>
					<option value="초등부" <? if($ext1_35 == "초등부")	 echo "selected"; ?>>초등부</option>
					<option value="중등부" <? if($ext1_35 == "중등부")	 echo "selected"; ?>>중등부</option>
					<option value="고등부" <? if($ext1_35 == "고등부")	 echo "selected"; ?>>고등부</option>
					<option value="초중등부" <? if($ext1_35 == "초중등부")	 echo "selected"; ?>>초중등부</option>
					<option value="중고등부" <? if($ext1_35 == "중고등부")	 echo "selected"; ?>>중고등부</option>
					<option value="초중고" <? if($ext1_35 == "초중고")	 echo "selected"; ?>>초중고</option>
					<option value="성인반" <? if($ext1_35 == "성인반")	 echo "selected"; ?>>성인반</option>
					<option value="기타" <? if($ext1_35 == "기타")	 echo "selected"; ?>>기타</option>
			   </select></td>
			<td class=write_fc>
					<SELECT name='ext1_36' class='ed' itemname='수업일수4'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='주 1일' <? if($ext1_36 == "주 1일") echo "selected"; ?>>주 1일</option>
						<option value='주 2일' <? if($ext1_36 == "주 2일") echo "selected"; ?>>주 2일</option>
						<option value='주 3일' <? if($ext1_36 == "주 3일") echo "selected"; ?>>주 3일</option>
						<option value='주 4일' <? if($ext1_36 == "주 4일") echo "selected"; ?>>주 4일</option>
						<option value='주 5일' <? if($ext1_36 == "주 5일") echo "selected"; ?>>주 5일</option>
						<option value='주 6일' <? if($ext1_36 == "주 6일") echo "selected"; ?>>주 6일</option>
						<option value='주 7일' <? if($ext1_36 == "주 7일") echo "selected"; ?>>주 7일</option>
					</SELECT></td><?php */?>
			<td class=write_fc>
					<input name='ext1_37' class="frm_input" style="width:60px;" value='<?=$ext1_37?>' type='text' maxlength='3' onKeyDown='onlyNumber(this);' itemname='모집인원4'>&nbsp;명</td></tr>

	<!--  -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

	<tr><td class=write_fc><INPUT class="frm_input"  name='ext1_39' id='ext1_39' value="<?=$ext1_39?>" maxlength='70'  itemname="직종5"></td>
			<td class=write_fc> <select name="ext1_40" itemname='근무형태5'>
							<option value="">선택</option>
							<option value="정규직" <? if($ext1_40 == "정규직")	 echo "selected"; ?>>정규직</option>
							<option value="계약직" <? if($ext1_40 == "계약직")	 echo "selected"; ?>>계약직</option>
							<option value="시간제" <? if($ext1_40 == "시간제")	 echo "selected"; ?>>시간제</option>
							<option value="보조강사" <? if($ext1_40 == "보조강사")	 echo "selected"; ?>>보조강사</option>
							<option value="무관" <? if($ext1_40 == "무관")	 echo "selected"; ?>>무관</option>
							<option value="기타" <? if($ext1_40 == "기타")	 echo "selected"; ?>>기타</option>
							</select></td>
			<td class=write_fc>
				<SELECT name='ext1_41' class='ed' itemname='나이5'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='무관' <? if($ext1_41 == "무관") echo "selected"; ?>>무관</option>
						<option value='23세 이하' <? if($ext1_41 == "23세 이하") echo "selected"; ?>>23세 이하</option>
						<option value='24세 이하' <? if($ext1_41 == "24세 이하") echo "selected"; ?>>24세 이하</option>
						<option value='25세 이하' <? if($ext1_41 == "25세 이하") echo "selected"; ?>>25세 이하</option>
						<option value='26세 이하' <? if($ext1_41 == "26세 이하") echo "selected"; ?>>26세 이하</option>
						<option value='27세 이하' <? if($ext1_41 == "27세 이하") echo "selected"; ?>>27세 이하</option>
						<option value='28세 이하' <? if($ext1_41 == "28세 이하") echo "selected"; ?>>28세 이하</option>
						<option value='29세 이하' <? if($ext1_41 == "29세 이하") echo "selected"; ?>>29세 이하</option>
						<option value='30세 이하' <? if($ext1_41 == "30세 이하") echo "selected"; ?>>30세 이하</option>
						<option value='31세 이하' <? if($ext1_41 == "31세 이하") echo "selected"; ?>>31세 이하</option>
						<option value='32세 이하' <? if($ext1_41 == "32세 이하") echo "selected"; ?>>32세 이하</option>
						<option value='33세 이하' <? if($ext1_41 == "33세 이하") echo "selected"; ?>>33세 이하</option>
						<option value='34세 이하' <? if($ext1_41 == "34세 이하") echo "selected"; ?>>34세 이하</option>
						<option value='35세 이하' <? if($ext1_41 == "35세 이하") echo "selected"; ?>>35세 이하</option>
						<option value='36세 이하' <? if($ext1_41 == "36세 이하") echo "selected"; ?>>36세 이하</option>
						<option value='37세 이하' <? if($ext1_41 == "37세 이하") echo "selected"; ?>>37세 이하</option>
						<option value='38세 이하' <? if($ext1_41 == "38세 이하") echo "selected"; ?>>38세 이하</option>
						<option value='39세 이하' <? if($ext1_41 == "39세 이하") echo "selected"; ?>>39세 이하</option>
						<option value='40세 이하' <? if($ext1_41 == "40세 이하") echo "selected"; ?>>40세 이하</option>
						<option value='41세 이하' <? if($ext1_41 == "41세 이하") echo "selected"; ?>>41세 이하</option>
						<option value='42세 이하' <? if($ext1_41 == "42세 이하") echo "selected"; ?>>42세 이하</option>
						<option value='43세 이하' <? if($ext1_41 == "43세 이하") echo "selected"; ?>>43세 이하</option>
						<option value='44세 이하' <? if($ext1_41 == "44세 이하") echo "selected"; ?>>44세 이하</option>
						<option value='45세 이하' <? if($ext1_41 == "45세 이하") echo "selected"; ?>>45세 이하</option>
						<option value='46세 이하' <? if($ext1_41 == "46세 이하") echo "selected"; ?>>46세 이하</option>
						<option value='47세 이하' <? if($ext1_41 == "47세 이하") echo "selected"; ?>>47세 이하</option>
						<option value='48세 이하' <? if($ext1_41 == "48세 이하") echo "selected"; ?>>48세 이하</option>
						<option value='49세 이하' <? if($ext1_41 == "49세 이하") echo "selected"; ?>>49세 이하</option>
						<option value='50세 이하' <? if($ext1_41 == "50세 이하") echo "selected"; ?>>50세 이하</option>
						<option value='51세 이하' <? if($ext1_41 == "51세 이하") echo "selected"; ?>>51세 이하</option>
						<option value='52세 이하' <? if($ext1_41 == "52세 이하") echo "selected"; ?>>52세 이하</option>
						<option value='53세 이하' <? if($ext1_41 == "53세 이하") echo "selected"; ?>>53세 이하</option>
						<option value='54세 이하' <? if($ext1_41 == "54세 이하") echo "selected"; ?>>54세 이하</option>
						<option value='55세 이하' <? if($ext1_41 == "55세 이하") echo "selected"; ?>>55세 이하</option>
					 </SELECT></td>
			<td class=write_fc>
					 <select name="ext1_42" itemname='성별5'>
							<option value="">선택</option>
							<option value="남자" <? if($ext1_42 == "남자")	 echo "selected"; ?>>남자</option>
							<option value="여자" <? if($ext1_42 == "여자")	 echo "selected"; ?>>여자</option>
							<option value="무관" <? if($ext1_42 == "무관")	 echo "selected"; ?>>무관</option>
						</select></td>
			<td class=write_fc>
					<select name="ext1_43" itemname='학력5'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_43 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="전문대졸" <? if($ext1_43 == "전문대졸")	 echo "selected"; ?>>전문대졸</option>
						<option value="대졸" <? if($ext1_43 == "대졸")	 echo "selected"; ?>>대졸</option>
						<option value="대학원졸" <? if($ext1_43 == "대학원졸")	 echo "selected"; ?>>대학원졸</option>
					</select></td>
			<td class=write_fc>
					<select name="ext1_44" itemname='경력5'>
						<option value="">선택</option>
						<option value="무관" <? if($ext1_44 == "무관")	 echo "selected"; ?>>무관</option>
						<option value="1년이상" <? if($ext1_44 == "1년이상") echo "selected"; ?>>1년이상</option>
						<option value="2년이상" <? if($ext1_44 == "2년이상") echo "selected"; ?>>2년이상</option>
						<option value="3년이상" <? if($ext1_44 == "3년이상") echo "selected"; ?>>3년이상</option>
						<option value="4년이상" <? if($ext1_44 == "4년이상") echo "selected"; ?>>4년이상</option>
						<option value="5년이상" <? if($ext1_44 == "5년이상") echo "selected"; ?>>5년이상</option>
						<option value="6년이상" <? if($ext1_44 == "6년이상") echo "selected"; ?>>6년이상</option>
						<option value="7년이상" <? if($ext1_44 == "7년이상") echo "selected"; ?>>7년이상</option>
						<option value="8년이상" <? if($ext1_44 == "8년이상") echo "selected"; ?>>8년이상</option>
						<option value="9년이상" <? if($ext1_44 == "9년이상") echo "selected"; ?>>9년이상</option>
						<!--<option value="10년이상" <? if($ext1_44 == "10년이상") echo "selected"; ?>>10년이상</option>-->
						</select></td>
			<?php /*?><td class=write_fc>
					<select name="ext1_45" itemname='수강대상5'>
					<option value="">선택</option>
					<option value="유아" <? if($ext1_45 == "유아")	 echo "selected"; ?>>유아</option>
					<option value="유초등부" <? if($ext1_45 == "유초등부")	 echo "selected"; ?>>유초등부</option>
					<option value="초등부" <? if($ext1_45 == "초등부")	 echo "selected"; ?>>초등부</option>
					<option value="중등부" <? if($ext1_45 == "중등부")	 echo "selected"; ?>>중등부</option>
					<option value="고등부" <? if($ext1_45 == "고등부")	 echo "selected"; ?>>고등부</option>
					<option value="초중등부" <? if($ext1_45 == "초중등부")	 echo "selected"; ?>>초중등부</option>
					<option value="중고등부" <? if($ext1_45 == "중고등부")	 echo "selected"; ?>>중고등부</option>
					<option value="초중고" <? if($ext1_45 == "초중고")	 echo "selected"; ?>>초중고</option>
					<option value="성인반" <? if($ext1_45 == "성인반")	 echo "selected"; ?>>성인반</option>
					<option value="기타" <? if($ext1_45 == "기타")	 echo "selected"; ?>>기타</option>
			   </select></td>
			<td class=write_fc>
					<SELECT name='ext1_46' class='ed' itemname='수업일수5'>
						 <OPTION value="" ?>선택</OPTION>
						<option value='주 1일' <? if($ext1_46 == "주 1일") echo "selected"; ?>>주 1일</option>
						<option value='주 2일' <? if($ext1_46 == "주 2일") echo "selected"; ?>>주 2일</option>
						<option value='주 3일' <? if($ext1_46 == "주 3일") echo "selected"; ?>>주 3일</option>
						<option value='주 4일' <? if($ext1_46 == "주 4일") echo "selected"; ?>>주 4일</option>
						<option value='주 5일' <? if($ext1_46 == "주 5일") echo "selected"; ?>>주 5일</option>
						<option value='주 6일' <? if($ext1_46 == "주 6일") echo "selected"; ?>>주 6일</option>
						<option value='주 7일' <? if($ext1_46 == "주 7일") echo "selected"; ?>>주 7일</option>
					</SELECT></td><?php */?>
			<td class=write_fc>
					<input name='ext1_47' class="frm_input" style="width:60px;" value='<?=$ext1_47?>' type='text' maxlength='3' onKeyDown='onlyNumber(this);' itemname='모집인원5'>&nbsp;명</td></tr>

	<!--  -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->	
</table>

<br><br>

<div class="title_top">회사정보</div>

		
		<table width="100%" cellpadding="0" cellspacing="1" bgcolor=#CCCCCC>
		    <tr>
            	<td width="20%" class=write_cb>회사명</td>
				  <td colspan="3" class=write_fl><INPUT class="frm_input" style="width:220;" name='ext2_18' id='ext2_18' value="<?=$ext2_18?>" maxlength='70'  itemname="회사명" required></td>
                  
            </tr>
			<tr><td width="20%" class=write_cb>설립일 </td>
				  <td width="30%" class=write_fl><INPUT class="frm_input" style="width:150;" name='ext1_00' id='ext1_00' value="<?=$ext1_00?>" onkeydown='onlyNumber(this);' maxlength='70'  itemname="설립연도" > &nbsp;년</td>
			     <td width="20%" class=write_cb>전화번호</td>
				 <td width="30%" class=write_fl>
				 <SELECT name='ext1_05' class='ed' itemname='전화번호'>
						<option value='02' <? if($ext1_05 == "02") echo "selected"; ?>>02</option>
						<option value='031' <? if($ext1_05 == "031") echo "selected"; ?>>031</option>
						<option value='032' <? if($ext1_05 == "032") echo "selected"; ?>>032</option>
						<option value='033' <? if($ext1_05 == "033") echo "selected"; ?>>033</option>
						<option value='041' <? if($ext1_05 == "041") echo "selected"; ?>>041</option>
						<option value='042' <? if($ext1_05 == "042") echo "selected"; ?>>042</option>
						<option value='043' <? if($ext1_05 == "043") echo "selected"; ?>>043</option>
						<option value='051' <? if($ext1_05 == "051") echo "selected"; ?>>051</option>
						<option value='052' <? if($ext1_05 == "052") echo "selected"; ?>>052</option>
						<option value='053' <? if($ext1_05 == "053") echo "selected"; ?>>053</option>
						<option value='054' <? if($ext1_05 == "054") echo "selected"; ?>>054</option>
						<option value='055' <? if($ext1_05 == "055") echo "selected"; ?>>055</option>
						<option value='061' <? if($ext1_05 == "061") echo "selected"; ?>>061</option>
						<option value='062' <? if($ext1_05 == "062") echo "selected"; ?>>062</option>
						<option value='063' <? if($ext1_05 == "063") echo "selected"; ?>>063</option>
						<option value='064' <? if($ext1_05 == "064") echo "selected"; ?>>064</option>
						<option value='070' <? if($ext1_05 == "070") echo "selected"; ?>>070</option>
					  </select> - 
					  <input name='ext1_06' class="frm_input" value='<?=$ext1_06?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 두번째자리' class=input>  - 
					  <input name='ext1_07' class="frm_input" value='<?=$ext1_07?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 세번째자리' class=input>
				 </td></tr>
			<tr><td class=write_cb>직원수</td>
			      <td class=write_fl>
				  <select class=box name='ext1_01' itemname='직원수'>
					  <option value='***' <? if($ext1_01 == "선택안함")	echo "selected"; ?>>선택안함</option>
                      <option value='5명이하' <? if($ext1_01 == "5명이하")	echo "selected"; ?>>5명이하</option>
					  <option value='6-10명이하' <? if($ext1_01 == "6-10명이하")	echo "selected"; ?>>6-10명이하</option>
					  <option value='11-15명이하' <? if($ext1_01 == "11-15명이하")	echo "selected"; ?>>11-15명이하</option>
					  <option value='16-20명이하' <? if($ext1_01 == "16-20명이하")	echo "selected"; ?>>16-20명이하</option>
					  <option value='21-25명이하' <? if($ext1_01 == "21-25명이하")	echo "selected"; ?>>21-25명이하</option>
					  <option value='26-30명이하' <? if($ext1_01 == "26-30명이하")	echo "selected"; ?>>26-30명이하</option>
					  <option value='31명이상' <? if($ext1_01 == "31명이상")	echo "selected"; ?>>31명이상</option>
			</select>
				  </td>
			      <!--<td class=write_cb>원생수</td>-->
				  <?php /*?><td class=write_fl>
				  <select class=box name='ext1_02'  required itemname='원생수'>
					  <option value='***' <? if($ext1_02 == "선택안함")	echo "selected"; ?>>선택안함</option>
                      <option value='40명이하' <? if($ext1_02 == "40명이하")	echo "selected"; ?>>40명이하</option>
					  <option value='41-80명이하' <? if($ext1_02 == "41-80명이하")	echo "selected"; ?>>41-80명이하</option>
					  <option value='81-120명이하' <? if($ext1_02 == "81-120명이하")	echo "selected"; ?>>81-120명이하</option>
					  <option value='121-150명이하' <? if($ext1_02 == "121-150명이하")	echo "selected"; ?>>121-150명이하</option>
					  <option value='151-180명이하' <? if($ext1_02 == "151-180명이하")	echo "selected"; ?>>151-180명이하</option>
					  <option value='181-200명이하' <? if($ext1_02 == "181-200명이하")	echo "selected"; ?>>181-200명이하</option>
					  <option value='201명이상' <? if($ext1_02 == "201명이상")	echo "selected"; ?>>201명이상</option>
			</select>
				  </td><?php */?></tr>
		
			<tr><td class=write_cb>주소</td>
			      <td class=write_fl colspan="3">

					   <input class=ed type=text name='ext3_00' value='<?=$ext3_00?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 앞자리'>
					  - 
					  <input class=ed type=text name='ext3_01' value='<?=$ext3_01?>' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 뒷자리'>
					  &nbsp;
					  <button type="button" class="btn_frmline" onclick="win_zip('fwrite', 'ext3_00', 'ext3_01', 'ext3_02', 'ext3_03');">주소 검색</button>
						<br>
					  <input class=ed type=text name='ext3_02' value='<?=$ext3_02?>' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='주소'>

					  <input class=ed  type=text name='ext3_03'  value='<?=$ext3_03?>' size=30 <?=$config[cf_req_addr]?'required':'';?> itemname='상세주소'>
						&nbsp;<font color=#999999>(상세주소)</font>
				  
			 </td></tr>
			
			<!--
			<tr><td class=write_cb>주소</td>
			      <td class=write_fl style="padding-top:5px;" colspan="3">

					   <input class=ed type=text name='ext3_00' value='<?=$ext3_00?>' size=4 maxlength=3 readonly <?=$config[frm_zip1]?'required':'';?> itemname='우편번호 앞자리'>
					  - 
					  <input class=ed type=text name='ext3_01' value='<?=$ext3_01?>' size=4 maxlength=3 readonly <?=$config[frm_zip2]?'required':'';?> itemname='우편번호 뒷자리'>
					  &nbsp;
					  <button type="button" class="btn_frmline" onclick="win_zip('fwrite', 'ext3_00', 'ext3_01', 'ext3_02', 'ext3_03');">주소 검색</button>
						<br>
					  <input class=ed type=text name='ext3_02' value='<?=$ext3_02?>' size=60 readonly <?=$config[frm_addr1]?'required':'';?> itemname='주소'>

					  <input class=ed  type=text name='ext3_03'  value='<?=$ext3_03?>' size=30 <?=$config[frm_addr3]?'required':'';?> itemname='상세주소'>
						&nbsp;<font color=#999999>(상세주소)</font>
		  </td></tr>
		  -->
		</table>

<br><br>






<div class="title_top">전형방법/급여사항</div>
		<table width="100%" cellpadding="0" cellspacing="1" bgcolor=#CCCCCC>
			<tr><td width="20%" class=write_cb>제출서류</td>
				  <td width="80%" class=write_fl>
				  <INPUT class="frm_input required" style="width:98%;" name='ext1_03' id='ext1_03' value="<?=$ext1_03?>" maxlength='70'  itemname="제출서류" required></td></tr>
			<?php /*?><tr><td class=write_cb>시강유무</td>
				  <td class=write_fl>
				  
		  <INPUT type=radio name='ext1_04' required VALUE="시강있음" <? if($ext1_04 == "시강 있음")  echo "checked"; ?> checked>&nbsp;시강 있음 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <INPUT type=radio name='ext1_04' required VALUE="시강없음" <? if($ext1_04 == "시강 없음")  echo "checked"; ?> >&nbsp;시강 없음
				  </td></tr><?php */?>
		  <tr><td class=write_cb>급여사항</td>
				  <td class=write_fl>
				  최소 &nbsp;<INPUT class="frm_input" style="width:80;text-align:right;" name='ext1_14' id='ext1_14' value="<?=$ext1_14?>" maxlength='70' onkeydown='onlyNumber(this);'  itemname="최소급여"> &nbsp;만원 &nbsp;&nbsp;&nbsp;&nbsp;
						  최대 &nbsp;<INPUT class="frm_input" style="width:80;text-align:right;" name='ext1_15' id='ext1_15' value="<?=$ext1_15?>" maxlength='70' onkeydown='onlyNumber(this);'  itemname="최대급여">&nbsp;만원&nbsp;&nbsp;&nbsp;&nbsp;
			    <INPUT type=radio name='ext1_08' VALUE="협의후결정" <? if($ext1_08 == "협의후결정")  echo "checked"; ?>>협의후결정
				  </td></tr>
		<tr><td class=write_cb>퇴직금</td>
				  <td class=write_fl>
				  <INPUT type=radio name='ext1_16' required  VALUE="유" <? if($ext1_16 == "유")  echo "checked"; ?> checked >유 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <INPUT type=radio name='ext1_16' required  VALUE="무" <? if($ext1_16 == "무")  echo "checked"; ?> >무
				  </td></tr>
        <tr><td class=write_cb>마감일</td>
				  <td class=write_fl>
				  <input type="text" name="wr_5" value="<?php echo $write['wr_5'] ?>" id="wr_5" class="frm_input required" size="20">
				  </td></tr>
	  </table>


<br><br>
<div class="title_top">접수방법</div>
		<table width="100%" cellpadding="0" cellspacing="1" bgcolor=#CCCCCC>
			<tr><td width="20%" class=write_cb>접수방법</td>
				  <td width="80%" class=write_fl style="padding-top:10px;">
				    <input type=checkbox name="ext1_17" value="온라인 지원" <? if($ext1_17 == "온라인 지원")	 echo "checked"; ?>> 온라인 지원
				    <input type=checkbox name="ext1_18" value="이메일 지원" <? if($ext1_18 == "이메일 지원")	 echo "checked"; ?>> 이메일 지원
				    <input type=checkbox name="ext1_19" value="직접방문" <? if($ext1_19 == "직접방문")	 echo "checked"; ?>> 직접방문
				    <input type=checkbox name="ext1_20" value="전화문의" <? if($ext1_20 == "전화문의")	 echo "checked"; ?>> 전화문의 &nbsp;&nbsp;&nbsp;&nbsp;
	                 기타&nbsp;:&nbsp;<INPUT class="frm_input" style="width:400;text-align:right;" name='ext2_09' value="<?=$ext2_09?>" maxlength='40'  itemname="기타지원방법"><br>
	<FONT color=#FF4040>※ 온라인 지원선택시 지원사이트, 이메일지원시 담당자 이메일을 필히 써 주십시오.</font>
				  </td></tr>
			<tr><td class=write_cb>담당자</td>
				  <td class=write_fl>
				  <INPUT class=ed style="padding:5px 0" name='ext2_04' id='ext2_04' value="<?=$ext2_04?>" maxlength='70' itemname="담당자" required>
				  </td></tr>
			<tr><td class=write_cb>연락처</td>
				  <td class=write_fl>
				  <SELECT name='ext2_05' class="frm_input required" required itemname='핸폰'>
		<option value=''>선택</option>
        <option value='010' <? if($ext2_05 == "010") echo "selected"; ?>>010</option>
        <option value='011' <? if($ext2_05 == "011") echo "selected"; ?>>011</option>
        <option value='016' <? if($ext2_05 == "016") echo "selected"; ?>>016</option>
        <option value='019' <? if($ext2_05 == "019") echo "selected"; ?>>019</option>
      </select> - 
      <input name='ext2_06' class="frm_input required" value='<?=$ext2_06?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 두번째자리' class=input>  - 
      <input name='ext2_07' class="frm_input required" value='<?=$ext2_07?>' type='text' size='4' maxlength='4' onkeydown='onlyNumber(this);' required itemname='일반전화 세번째자리' class=input>
	  </td></tr>
	  <tr><td class=write_cb>담당자 이메일</td>
	 <td class=write_fl><input class="frm_input" maxlength=100 size=50 name=ext2_08 itemname="메일" value="<?=$ext2_08?>"></td>
	 </tr>
			<tr><td class=write_cb>인근교통</td>
				  <td class=write_fl><INPUT class="frm_input" style="width:98%;" name='ext2_17' id='ext2_17' value="<?=$ext2_17?>" maxlength='100'  itemname="인근교통"></td></tr>
		</table>

<br><br>


<? if($w != "u") {?>
<!--광고-->
<div class="title_top">광고노출</div>(수정이 안되므로 신중히 선택하십시오.)&nbsp;*현재 <?=$member[mb_id]?>님의 포인트는  <font color=#FF0000><?=$member[mb_point]?></font>점입니다.
<br>
		
		<table width="100%" cellpadding="0" cellspacing="1" bgcolor=#CCCCCC>
			<tr><td width="20%" class=write_cb>스페셜등록</td>
				  <td width="30%" bgcolor=#FFFFFF class=write_fl>
				   <INPUT type=radio name='wr_6' required VALUE="-10" <? if ($write[wr_6] == "-10") echo'checked';?>checked>등록안함<br>
				   <INPUT type=radio name='wr_6' required VALUE="<?=$point_w1?>" <? if ($write[wr_6] == "<?=$point_w1?>") echo'checked';?>>1일&nbsp;(<?=$point_w1?>포인트 차감)<br>
				   <INPUT type=radio name='wr_6' required VALUE="<?=$point_w2?>" <? if ($write[wr_6] == "<?=$point_w2?>") echo'checked';?>>2일&nbsp;(<?=$point_w2?>포인트 차감)<br>
				   <INPUT type=radio name='wr_6' required VALUE="<?=$point_w3?>" <? if ($write[wr_6] == "<?=$point_w3?>") echo'checked';?>>3일&nbsp;(<?=$point_w3?>포인트 차감)
				  

				  </td>
				  <td width="50%" class=write_fc><img src="<?=$board_skin_url?>/img/sample_1.jpg"><br> 메인페이지 상단에 노출됩니다.</td>
			</tr>
	<!-- 프리미엄 등록 보류 -->
			<tr><td width="20%" class=write_cb>프리미엄등록</td>
				  <td width="30%" class=write_fl>
				  <INPUT type=radio name='wr_4' required VALUE="-1" <? if ($write[wr_4] == "-1") echo'checked';?>checked>등록안함<br>
				  <INPUT type=radio name='wr_4' required VALUE="<?=$point_w11?>" <? if ($write[wr_4] == "$point_w11") echo'checked';?>>1일&nbsp;(<?=$point_w11?>포인트 차감)<br>
				  <INPUT type=radio name='wr_4' required VALUE="<?=$point_w22?>" <? if ($write[wr_4] == "$point_w22") echo'checked';?>>2일&nbsp;(<?=$point_w22?>포인트 차감)<br>
				  <INPUT type=radio name='wr_4' required VALUE="<?=$point_w33?>" <? if ($write[wr_4] == "$point_w33") echo'checked';?>>3일&nbsp;(<?=$point_w33?>포인트 차감)
				 
				  </td>
				  <td width="50%" class=write_fc><img src="<?=$board_skin_url?>/img/sample_2.jpg"><br> 메인페이지 하단에 노출됩니다.</td>
			</tr>

			</table>
<br>
<!--광고 끝-->
<?}?>

<?php if ($w == 'u'){?> 
<input type="hidden" name="wr_6"  value="<?php echo $write['wr_6']?>">
<input type="hidden" name="wr_7"  value="<?php echo $write['wr_7']?>">
<input type="hidden" name="wr_4"  value="<?php echo $write['wr_4']?>">
<input type="hidden" name="wr_9"  value="<?php echo $write['wr_9']?>">
<?php }?> 


<br><br>

<div class="tbl_frm01 tbl_wrap">
<table>
        <tbody>



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

       

        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row">파일 #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" size="50">
                <?php } ?>
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                <?php } ?>
            </td>
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

        </tbody>
        </table>
    </div>

    <div class="btn_confirm">
        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
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
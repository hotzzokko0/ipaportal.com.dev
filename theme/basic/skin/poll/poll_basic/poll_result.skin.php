<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 회원 레이어
function get_sideview_overriding($mb_id, $name='', $email='', $homepage='')
{
    global $config;
    global $g5;
    global $bo_table, $sca, $is_admin, $member;

    $email_enc = new str_encrypt();
    $email = $email_enc->encrypt($email);
    $homepage = set_http(clean_xss_tags($homepage));

    $name     = get_text($name, 0, true);
    $email    = get_text($email);
    $homepage = get_text($homepage);

    $tmp_name = "";
    if ($mb_id) {
        //$tmp_name = "<a href=\"".G5_BBS_URL."/profile.php?mb_id=".$mb_id."\" class=\"sv_member\" title=\"$name 자기소개\" target=\"_blank\" onclick=\"return false;\">$name</a>";
        $tmp_name = '<a href="'.G5_BBS_URL.'/profile.php?mb_id='.$mb_id.'" class="sv_member" title="'.$name.' 자기소개" target="_blank" onclick="return false;" data-toggle="dropdown">';

        if ($config['cf_use_member_icon']) {
            $mb_dir = substr($mb_id,0,2);
            $icon_file = G5_DATA_PATH.'/member/'.$mb_dir.'/'.$mb_id.'.gif';

            if (file_exists($icon_file)) {
                $width = $config['cf_member_icon_width'];
                $height = $config['cf_member_icon_height'];
                $icon_file_url = G5_DATA_URL.'/member/'.$mb_dir.'/'.$mb_id.'.gif';
                $tmp_name .= '<img src="'.$icon_file_url.'" width="'.$width.'" height="'.$height.'" alt="">';

                if ($config['cf_use_member_icon'] == 2) // 회원아이콘+이름
                    $tmp_name = $tmp_name.' '.$name;
            } else {
                  $tmp_name = $tmp_name." ".$name;
            }
        } else {
            $tmp_name = $tmp_name.' '.$name;
        }
        $tmp_name .= ' <span class="fa fa-caret-down"></span></a>';

        $title_mb_id = '['.$mb_id.']';
    } else {
        if(!$bo_table)
            return $name;

        $tmp_name = '<a href="'.G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;sca='.$sca.'&amp;sfl=wr_name,1&amp;stx='.$name.'" title="'.$name.' 이름으로 검색" class="sv_guest" onclick="return false;" data-toggle="dropdown">'.$name.' <span class="fa fa-caret-down"></span></a>';
        $title_mb_id = '[비회원]';
    }

    $str = "<span class=\"dropdown\">\n";
    $str .= $tmp_name."\n";

    $str2 = "<ul class=\"dropdown-menu\" role=\"menu\">\n";
    if($mb_id)
        $str2 .= "<li><a href=\"".G5_BBS_URL."/memo_form.php?me_recv_mb_id=".$mb_id."\" onclick=\"win_memo(this.href); return false;\">쪽지보내기</a></li>\n";
    if($email)
        $str2 .= "<li><a href=\"".G5_BBS_URL."/formmail.php?mb_id=".$mb_id."&amp;name=".urlencode($name)."&amp;email=".$email."\" onclick=\"win_email(this.href); return false;\">메일보내기</a></li>\n";
    if($homepage)
        $str2 .= "<li><a href=\"".$homepage."\" target=\"_blank\">홈페이지</a></li>\n";
    if($mb_id)
        $str2 .= "<li><a href=\"".G5_BBS_URL."/profile.php?mb_id=".$mb_id."\" onclick=\"win_profile(this.href); return false;\">자기소개</a></li>\n";
    if($bo_table) {
        if($mb_id)
            $str2 .= "<li><a href=\"".G5_BBS_URL."/board.php?bo_table=".$bo_table."&amp;sca=".$sca."&amp;sfl=mb_id,1&amp;stx=".$mb_id."\">아이디로 검색</a></li>\n";
        else
            $str2 .= "<li><a href=\"".G5_BBS_URL."/board.php?bo_table=".$bo_table."&amp;sca=".$sca."&amp;sfl=wr_name,1&amp;stx=".$name."\">이름으로 검색</a></li>\n";
    }
    if($mb_id)
        $str2 .= "<li><a href=\"".G5_BBS_URL."/new.php?mb_id=".$mb_id."\">전체게시물</a></li>\n";
    if($is_admin == "super" && $mb_id) {
        $str2 .= "<li><a href=\"".G5_ADMIN_URL."/member_form.php?w=u&amp;mb_id=".$mb_id."\" target=\"_blank\">회원정보변경</a></li>\n";
        $str2 .= "<li><a href=\"".G5_ADMIN_URL."/point_list.php?sfl=mb_id&amp;stx=".$mb_id."\" target=\"_blank\">포인트내역</a></li>\n";
    }
    $str2 .= "</ul>\n";
    $str .= $str2;
    $str .= "\n<noscript class=\"sv_nojs\">".$str2."</noscript>";

    $str .= "</span>";

    return $str;
}

// 캡챠 HTML 코드 출력
function captcha_html_overriding($class="captcha")
{
    if(is_mobile())
        $class .= ' m_captcha';

    $html .= "\n".'<script>var g5_captcha_url  = "'.G5_CAPTCHA_URL.'";</script>';
    //$html .= "\n".'<script>var g5_captcha_path = "'.G5_CAPTCHA_PATH.'";</script>';
    $html .= "\n".'<script src="'.G5_CAPTCHA_URL.'/kcaptcha.js"></script>';
    //$html .= "\n".'<fieldset id="captcha" class="'.$class.'">';
    $html .= "\n".'<legend class="sr-only"><label for="captcha_key">자동등록방지</label></legend>';
    if (is_mobile()) $html .= '<audio src="#" id="captcha_audio" controls style="width:50px;"></audio>';

    //$html .= "\n".'<img src="#" alt="" id="captcha_img">';
    $html .= "\n".'<p><img src="javascript:void(0);" alt="" id="captcha_img"></p>';

    //if (!is_mobile()) $html .= "\n".'<button type="button" id="captcha_mp3"><span></span>숫자음성듣기</button>';
    //$html .= "\n".'<button type="button" id="captcha_reload"><span></span>새로고침</button>';
	
    $html .= '<div class="col-sm-7 col-lg-5 zero-padding">';
	$html .= '<div class="input-group">';
	$html .= '<input type="text" name="captcha_key" id="captcha_key" required class="captcha_box required form-control" size="6" maxlength="6">';
	$html .= '<div class="input-group-btn">';
	if (!is_mobile()) $html .= "\n".'<button type="button" id="captcha_mp3" class="btn btn-default"><span></span><i class="fa fa-fw fa-volume-up"></i><span class="sr-only">숫자음성듣기</span></button>';
    $html .= "\n".'<button type="button" id="captcha_reload" class="btn btn-default"><span></span><i class="fa fa-fw fa-refresh"></i><span class="sr-only">새로고침</span></button>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	$html .= '<div class="clearfix"></div>';

	$html .= '<div class="col-sm-12 zero-padding">';
    $html .= "\n".'<p id="captcha_info" class="helper-block">자동등록방지 숫자를 순서대로 입력하세요.</p>';
	$html .= '</div>';
    //$html .= "\n".'</fieldset>';
    return $html;
}

$list2 = array();

// 기타의견 리스트
$sql = " select a.*, b.mb_open
           from {$g5['poll_etc_table']} a
           left join {$g5['member_table']} b on (a.mb_id = b.mb_id)
          where po_id = '{$po_id}' order by pc_id desc ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $list2[$i]['pc_name']  = get_text($row['pc_name']);
    $list2[$i]['name']     = get_sideview_overriding($row['mb_id'], get_text(cut_str($row['pc_name'],10)), '', '', $row['mb_open']);
    $list2[$i]['idea']     = get_text(cut_str($row['pc_idea'], 255));
    $list2[$i]['datetime'] = $row['pc_datetime'];

    $list2[$i]['del'] = '';
    if ($is_admin == 'super' || ($row['mb_id'] == $member['mb_id'] && $row['mb_id']))
        $list2[$i]['del'] = '<a href="'.G5_BBS_URL.'/poll_etc_update.php?w=d&amp;pc_id='.$row['pc_id'].'&amp;po_id='.$po_id.'&amp;skin_dir='.$skin_dir.'" class="poll_delete">';
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$poll_skin_url.'/style.css">', 0);
?>
<style type="text/css">
	body { padding-top:0px !important; }
</style>

<!-- 설문조사 결과 시작 { -->
<div class="section">
<div class="container">
<div class="row">

	<div class="col-xs-12">

    <h1 class="h3" style="line-height:200%; border-bottom:1px solid #ddd;"><?php echo $g5['title'] ?></h1>

    <!-- 설문조사 결과 그래프 시작 { -->
    <div class="panel panel-default">

		<div class="panel-body">

        <h2 class="h4 text-center"><?php echo $po_subject ?> 결과</h2>

        <dl>
            <dt class="text-right text-danger"><p>전체 <?php echo $nf_total_po_cnt ?>표</p></dt>
            <dd>
                <ol>
                <?php for ($i=1; $i<=count($list); $i++) {  ?>
                    <li>
                        <p>
                            <?php echo $list[$i]['content'] ?>
							<span class="pull-right">
                            <b><?php echo $list[$i]['cnt'] ?> 표</b>
                            <span class="text-success" style="margin-left:20px;"><?php echo number_format($list[$i]['rate'], 1) ?> 퍼센트</span>
							</span>
                        </p>
                        <div class="progress">
                            <span class="progress-bar" role="progressbar" style="width:<?php echo number_format($list[$i]['rate'], 1) ?>%"> <?php echo number_format($list[$i]['rate'], 1) ?>% </span>
                        </div>
                    </li>
                <?php }  ?>
                </ol>
            </dd>
        </dl>

		</div><!-- end panel-body -->
	</div><!-- end panel -->
    <!-- } 설문조사 결과 그래프 끝 -->

	</div><!-- end col -->

    <!-- 설문조사 기타의견 시작 { -->
    <?php if ($is_etc) {  ?>
	<div class="col-xs-12">
    <div class="panel panel-default">

		<div class="panel-body">

        <h2 class="h4 text-center">이 설문에 대한 기타의견</h2>

        <?php for ($i=0; $i<count($list2); $i++) { ?>
        <div style="border-bottom:1px solid #ddd;">
            <p>
                <h1 class="sr-only"><?php echo $list2[$i]['pc_name'] ?><span class="sound_only">님의 의견</span></h1>
                <i class="fa fa-fw fa-user"></i><?php echo $list2[$i]['name'] ?>
                <span style="margin-left:20px;"><i class="fa fa-fw fa-calendar"></i><?php echo $list2[$i]['datetime'] ?></span>
            </p>
            <p>
                <?php echo $list2[$i]['idea'] ?>
            </p>
            <p class="text-right">
                <span><?php if ($list2[$i]['del']) { echo $list2[$i]['del']."삭제</a>"; }  ?></span>
            </p>
        </div>
        <?php }  ?>

        <?php if ($member['mb_level'] >= $po['po_level']) {  ?>		
        <form name="fpollresult" action="./poll_etc_update.php" onsubmit="return fpollresult_submit(this);" method="post" autocomplete="off" role="form">
        <input type="hidden" name="po_id" value="<?php echo $po_id ?>">
        <input type="hidden" name="w" value="">
        <input type="hidden" name="skin_dir" value="<?php echo urlencode($skin_dir); ?>">
        <?php if ($is_member) {  ?><input type="hidden" name="pc_name" value="<?php echo get_text(cut_str($member['mb_nick'],255)) ?>"><?php }  ?>
        <h3 class="h5"><?php echo $po_etc ?></h3>

        <div class="panel panel-default">
		<div class="panel-body">
            <table class="table">
            <tbody>
            <?php if ($is_guest) {  ?>
            <tr>
                <th scope="row" class="w120 hidden-xs"><label for="pc_name">이름<strong class="sound_only">필수</strong></label></th>
                <td><p class="hidden visible-xs"><label for="pc_name" class="control-label">이름<b class="sr-only sound_only">필수</b></label></p><div class="col-sm-3 zero-padding"><input type="text" name="pc_name" id="pc_name" required class="frm_input required form-control" size="10"></div></td>
            </tr>
            <?php }  ?>
            <tr>
                <th scope="row" class="w120 hidden-xs"><label for="pc_idea">의견<strong class="sound_only">필수</strong></label></th>
                <td><p class="hidden visible-xs"><label for="pc_idea" class="control-label">의견<b class="sr-only sound_only">필수</b></label></p><div class="col-xs-12 zero-padding"><input type="text" id="pc_idea" name="pc_idea" required class="frm_input required form-control" size="47" maxlength="100"></div></td>
            </tr>
            <?php if ($is_guest) {  ?>
            <tr>
                <th scope="row" class="w120 hidden-xs">자동등록방지</th>
                <td><p class="hidden visible-xs"><label for="captcha_key" class="control-label">자동등록방지</label></p><?php echo captcha_html_overriding(); ?></td>
            </tr>
            <?php }  ?>
            </tbody>
            </table>
        </div>

        <div class="panel-footer text-center">
            <input type="submit" class="btn btn-danger" value="의견남기기">
        </div>
		</div><!-- end panle -->
        </form>
        <?php }  ?>

		</div><!-- end panel-body -->

    </div><!-- end panel -->
	</div><!-- end col -->
    <?php }  ?>
    <!-- } 설문조사 기타의견 끝 -->

    <!-- 설문조사 다른 결과 보기 시작 { -->
    <div class="col-xs-12">
        <h2 class="h4">다른 투표 결과 보기</h2>
        <ul class="list-unstyled" style="line-height:200%;">
            <?php for ($i=0; $i<count($list3); $i++) {  ?>
            <li style="border-bottom:1px solid #ddd;"><a href="./poll_result.php?po_id=<?php echo $list3[$i]['po_id'] ?>&amp;skin_dir=<?php echo urlencode($skin_dir); ?>">[<?php echo $list3[$i]['date'] ?>] <?php echo $list3[$i]['subject'] ?></a></li>
            <?php }  ?>
        </ul>
    </div>
    <!-- } 설문조사 다른 결과 보기 끝 -->

    <div class="col-xs-12 text-center h1">
        <button type="button" onclick="window.close();" class="btn btn-primary">창닫기</button>
    </div>
</div><!-- end row -->
</div><!-- end container -->
</div><!-- end section -->

<script>
$(function() {
    $(".poll_delete").click(function() {
        if(!confirm("해당 기타의견을 삭제하시겠습니까?"))
            return false;
    });
});

function fpollresult_submit(f)
{
    <?php if ($is_guest) { echo chk_captcha_js(); }  ?>

    return true;
}
</script>
<!-- } 설문조사 결과 끝 -->
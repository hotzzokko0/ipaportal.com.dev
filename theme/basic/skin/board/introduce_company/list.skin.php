<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) {
    $colspan++;
}
if ($is_good) {
    $colspan++;
}
if ($is_nogood) {
    $colspan++;
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . $board_skin_url . '/style.css">', 0);
add_javascript('<script src="' . $board_skin_url . '/js/layer.js"></script>', 0);
?>
<!-- rsync test -->
<!-- 게시판 검색 시작 { -->
<div class="pull-right">
    <fieldset id="bo_sch">
        <!--<legend>게시물 검색</legend>-->

        <form name="fsearch" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <input type="hidden" name="sop" value="and">
            <label for="sfl" class="sound_only">검색대상</label>
            <?php /*?><select name="sfl" id="sfl">
            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>상호명검색</option>
            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
            <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
            <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
            <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
        </select><?php */ ?>
            <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx"
                   class="frm_input required" size="40" maxlength="20">
            <input type="submit" value="검색" class="btn_submit">
        </form>
    </fieldset>
</div>
<!-- } 게시판 검색 끝 -->

<br>

<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only">목록</span></h2>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
        <nav id="bo_cate">
            <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
            <ul id="bo_cate_ul">
                <?php echo $category_option ?>
            </ul>
        </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <!--
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>총 <strong><?php echo number_format($total_count) ?></strong>개 /</span>
            <?php echo $page ?> 페이지
        </div>
        <?php if ($rss_href || $write_href) { ?>
            <ul class="btn_bo_user">
                <?php if ($rss_href) { ?>
                    <li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
    -->
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="../../introduce_company/board_list_update.php"
          onsubmit="return fboardlist_submit(this);" method="post">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
        <input type="hidden" name="stx" value="<?php echo $stx ?>">
        <input type="hidden" name="spt" value="<?php echo $spt ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sst" value="<?php echo $sst ?>">
        <input type="hidden" name="sod" value="<?php echo $sod ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <input type="hidden" name="sw" value="">

        <div class="tbl_head01 tbl_wrap">
            <table>
                <caption><?php echo $board['bo_subject'] ?> 목록</caption>
                <?php if ($is_checkbox) { ?>
                    <thead>
                    <tr>
                        <th scope="col">
                            <input type="checkbox" id="chkall"
                                   onclick="if (this.checked) all_checked(true); else all_checked(false);"/> <label
                                    for="chkall"></label>
                        </th>
                        <th scope="col">내 용</th>
                    </tr>
                    </thead>
                <?php } ?>
                <tbody class="bo_tr">
                <?php
                for ($i = 0, $iMax = count($list); $i < $iMax; $i++) {
                    //썸네일 이미지 가져오기
                    $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);

                    ?>
                    <tr>
                        <?php if ($is_checkbox) { ?>
                            <td class="td_chk">
                                <label for="chk_wr_id_<?php echo $i ?>"
                                       class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>"
                                       id="chk_wr_id_<?php echo $i ?>">
                            </td>
                        <?php } ?>
                        <td>
                            <div class="img_area col-md-2 text-center row-centered">
                                <?php
                                $view_href = '';
                                if ($is_admin) {
                                    $view_href = "href='{$list[$i]['href']}'";
                                }
                                if ($thumb['src'] && $list[$i]['wr_type'] !== 'F') {
                                    ?>
                                    <a <?= $view_href ?>><img src="<?php echo $thumb['src'] ?>"
                                                              alt="<?php echo $thumb['alt'] ?>"
                                                              width="<?php echo $board['bo_gallery_width'] ?>"
                                                              height="<?php echo $board['bo_gallery_height'] ?>"
                                                              class="img_style"/></a>
                                    <?php
                                } else {
                                    ?>
                                    <p class="js_tit" style="font-size: 12pt;">
                                        <?php
                                        if ($is_admin) {
                                        ?>
                                        <a <?= $view_href ?> style="color=block">
                                        <?php } ?>
                                            <?= $list[$i]['wr_subject'] ?>
                                        <?php
                                        if ($is_admin) {
                                        ?>
                                        </a>
                                        <?php } ?>
                                    </p>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="text_area col-md-6">
                                <ul>
                                    <li class="js_tit">
                                        <?php if ($list[$i]['wr_type'] !== 'F') { ?>
                                        <?php if ($is_admin) { ?>
                                        <a href="<?= $list[$i]['href'] ?>">
                                        <?php } ?>
                                            <?= $list[$i]['wr_subject']; ?>
                                        <?php if ($is_admin) { ?>
                                        </a>
                                        <?php } ?>
                                        <?php } ?>
                                    </li>
                                    <li class="js_info">
                                        <?php
                                        $textLength = 64;
                                        switch ($list[$i]['wr_type']) {
                                            case 'A' :
                                                $textLength = 156;
                                                break;
                                            case 'B' :
                                                $textLength = 124;
                                                break;
                                            default:
                                                break;
                                        }
                                        echo cut_str(str_replace("&nbsp;", "", trim(strip_tags($list[$i]['wr_content']))), $textLength);
                                        ?>
                                    </li>
                                    <br/>
                                    <ul>
                                        <?php if ($list[$i]['wr_homepage']) { ?>
                                            <li class="btn btn-default"><a <?php
                                                                           if ($is_member) {
                                                                               echo 'target="_blank" href="' . $list[$i]['wr_homepage'] . '"';
                                                                           } else {
                                                                               echo 'href="#" onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                                                           }
                                                                           ?>">웹사이트</a>
                                            </li>
                                        <?php } ?>
                                        <?php if ($list[$i]['wr_type'] !== 'F') { ?>
                                        <li class="btn btn-default"><a href="#" <?php
                                                                        if ($is_member) {
                                                                            $objId = $bo_table . $list[$i]['wr_id'];
                                                                            echo 'onclick="openLayer(\'s\', \'' . $objId . '\'); return false;"';
                                                                        } else {
                                                                            echo 'onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                                                        }
                                                                        ?>>전문가정보</a>
                                        </li>
<<<<<<< .mine
                                        <?php } ?>
                                    </ul>
=======
                                        <?php } ?>
                                    </ul>
                                </ul>
                            </div>
                            <div class="text_area col-md-2">
                                <ul>
                                    <?php if ($list[$i]['wr_6']) { ?>
                                        <li>특허출원: <?= $list[$i]['wr_6'] ?>원</li>
                                    <?php } ?>
                                    <?php if ($list[$i]['wr_7']) { ?>
                                        <li>상표출원: <?= $list[$i]['wr_7'] ?>원</li>
                                    <?php } ?>
                                </ul>
                                <br/>
                                <?php if ($list[$i]['wr_type'] !== 'F') { ?>
                                <ul>
                                    <li class="btn btn-default"><a href="#" <?php
                                                                    if ($is_member) {
                                                                        $objId = $bo_table . $list[$i]['wr_id'];
                                                                        echo 'onclick="openLayer(\'n\', \'' . $objId . '\'); return false;"';
                                                                    } else {
                                                                        echo 'onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                                                    }
                                                                   ?>>상세정보보기</a>
                                    </li>
>>>>>>> .r55
                                </ul>
<<<<<<< .mine
                            </div>
                            <div class="text_area col-md-2">
                                <ul>
                                    <?php if ($list[$i]['wr_6']) { ?>
                                        <li>특허출원: <?= $list[$i]['wr_6'] ?>원</li>
                                    <?php } ?>
                                    <?php if ($list[$i]['wr_7']) { ?>
                                        <li>상표출원: <?= $list[$i]['wr_7'] ?>원</li>
                                    <?php } ?>
                                </ul>
                                <br/>
                                <?php if ($list[$i]['wr_type'] !== 'F') { ?>
                                <ul>
                                    <li class="btn btn-default"><a href="#" <?php
                                                                    if ($is_member) {
                                                                        $objId = $bo_table . $list[$i]['wr_id'];
                                                                        echo 'onclick="openLayer(\'n\', \'' . $objId . '\'); return false;"';
                                                                    } else {
                                                                        echo 'onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                                                    }
                                                                   ?>>상세정보보기</a>
                                    </li>
                                </ul>
                                <?php } ?>
                            </div>
                            <div class="text_area col-md-2">
                                <ul>
                                    <?php if ($tel = $list[$i]['wr_4']) {
                                        $strTel  = '전화걸기';
                                        $hrefTel = "href='#'";
                                        $onClick = 'onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                        if ($is_member || $is_admin) {
                                            $strTel  = $tel;
                                            $hrefTel = "href='tel:{$tel}'";
                                            $onClick = '';
                                        }
                                        ?>
                                        <li class="btn btn-default"><a <?= $hrefTel ?> <?= $onClick ?>><?= $strTel ?></a></li>
                                    <?php } ?>
                                    <?php if ($email = $list[$i]['wr_email']) {
                                        $strEmail  = '이메일보내기';
                                        $hrefEmail = "href='{$login_url}'";
                                        $onClick = 'onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                        if ($is_member || $is_admin) {
                                            $strEmail  = $email;
                                            $hrefEmail = "href='mailto:{$email}'";
                                            $onClick = '';
                                        }
                                        ?>
                                        <li class="btn btn-default"><a <?= $hrefEmail ?> <?= $onClick ?>><?= $strEmail ?></a></li>
                                    <?php } ?>
                                </ul>
=======
                                <?php } ?>
                            </div>
                            <div class="text_area col-md-2">
                                <ul>
                                    <?php if ($tel = $list[$i]['wr_4']) {
                                        $strTel  = '전화걸기';
                                        $hrefTel = "href='#'";
                                        $onClick = 'onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                        if ($is_member || $is_admin) {
                                            $strTel  = $tel;
                                            $hrefTel = "href='tel:{$tel}'";
                                            $onClick = '';
                                        }
                                        ?>
                                        <li class="btn btn-default"><a <?= $hrefTel ?> <?= $onClick ?>><?= $strTel ?></a></li>
                                    <?php } ?>
                                    <?php if ($email = $list[$i]['wr_email']) {
                                        $strEmail  = '이메일보내기';
                                        $hrefEmail = "href='{$login_url}'";
                                        $onClick = 'onclick="openLayer(\'l\', \'outlogin\'); return false;"';
                                        if ($is_member || $is_admin) {
                                            $strEmail  = $email;
                                            $hrefEmail = "href='mailto:{$email}'";
                                            $onClick = '';
                                        }
                                        ?>
                                        <li class="btn btn-default"><a <?= $hrefEmail ?> <?= $onClick ?>><?= $strEmail ?></a></li>
                                    <?php } ?>
                                </ul>
>>>>>>> .r55
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- 페이지 -->
        <?php echo $write_pages; ?>

        <?php if ($list_href || $is_checkbox || $write_href) { ?>
            <div class="bo_fx">
                <?php if ($is_checkbox) { ?>
                    <ul class="btn_bo_adm">
                        <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">
                        </li>
                        <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value">
                        </li>
                        <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value">
                        </li>
                    </ul>
                <?php } ?>

                <?php if ($list_href || $write_href) { ?>
                    <ul class="btn_bo_user">
                        <?php if ($list_href) { ?>
                            <li><a href="<?php echo $list_href ?>" class="btn btn-default">목록</a></li><?php } ?>
                        <?php if ($admin_href) { ?>
                            <li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
                        <?php if ($write_href) { ?>
                            <li><a href="<?php echo $write_href ?>" class="btn btn-default">글쓰기</a></li><?php } ?>
                    </ul>
                <?php } ?>
            </div>
        <?php } ?>
    </form>
</div>


<!-- 전문가 정보 팝업레이어 시작 -->
<?php
if ($is_member || $is_admin) {
    for ($i = 0, $iMax = count($list); $i < $iMax; $i++) {
        ?>
        <div id="<?= $bo_table ?><?= $list[$i]['wr_id'] ?>" class="layer-popup">
            <h2>
                <?= $list[$i]['subject'] ?>
                <button class="close">닫기</button>
                <br/>
                <br/>
            </h2>
            <div id="n-detail" class="n-detail">
                <strong>지역</strong><br/>
                <span><?= $list[$i]['ca_name'] ?></span><br/><br/>
                <strong>이메일</strong><br/>
                <span><a href="mailto:<?= $list[$i]['wr_email'] ?>"><?= $list[$i]['wr_email'] ?></a></span><br/><br/>
                <strong>홈페이지주소</strong><br/>
                <span><a target="_blank"
                         href="<?= $list[$i]['wr_homepage'] ?>"><?= $list[$i]['wr_homepage'] ?></a></span><br/><br/>
                <strong>주소</strong><br/>
                <span><?= $list[$i]['wr_1'] ?></span><br/><br/>
                <strong>대표자</strong><br/>
                <span><?= $list[$i]['wr_2'] ?></span><br/><br/>
                <strong>사업자등록번호</strong><br/>
                <span><?= $list[$i]['wr_3'] ?></span><br/><br/>
                <strong>대표전화번호</strong><br/>
                <span><a href="tel:<?= $list[$i]['wr_4'] ?>"><?= $list[$i]['wr_4'] ?></a></span><br/><br/>
                <strong>팩스번호</strong><br/>
                <span><a href="fax:<?= $list[$i]['wr_5'] ?>"><?= $list[$i]['wr_5'] ?></a></span><br/><br/>
                <strong>특허출원</strong><br/>
                <span><?= $list[$i]['wr_6'] ?>원</span><br/><br/>
                <strong>상표출원</strong><br/>
                <span><?= $list[$i]['wr_7'] ?>원</span><br/><br/>
                <strong>소개글</strong><br/>
                <span><?= $list[$i]['wr_content'] ?></span><br/><br/>
            </div>
            <div id="s-detail" class="s-detail">
                <strong>전문가수</strong><br/>
                <?php
                $listSpecialist = explode("\n", $list[$i]['wr_8'] ?: '');
                ?>
                <?php foreach ((array)$listSpecialist as $specialist) : ?>
                    <span><?= $specialist ?></span><br/>
                <?php endforeach; ?><br/>
                <strong>전문분야</strong><br/>
                <?php
                $listSpecialField = explode("\n", $list[$i]['wr_9'] ?: '');
                ?>
                <?php foreach ((array)$listSpecialField as $specialField) : ?>
                    <span><?= $specialField ?></span><br/>
                <?php endforeach; ?><br/>
                <strong>주요경험</strong><br/>
                <?php
                $listExperience = explode("\n", $list[$i]['wr_10'] ?: '');
                ?>
                <?php foreach ((array)$listExperience as $experience) : ?>
                    <span><?= $experience ?></span><br/>
                <?php endforeach; ?><br/>
                <strong>주요고객</strong><br/>
                <?php
                $listCustomer = explode("\n", $list[$i]['wr_11'] ?: '');
                ?>
                <?php foreach ((array)$listCustomer as $customer) : ?>
                    <span><?= $customer ?></span><br/>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
?>
<script>
    /* 마우스 다운 이벤트 시에
     * 사이트에서 뛰워놓은 팝업을 닫는다.
     */
	$(document).ready(function () {
		$(document).mousedown(function (e) {
			$('.layer-popup').each(function () {
				if ($(this).css('display') === 'block') {
					var l_position = $(this).offset();
					l_position.right = parseInt(l_position.left) + ($(this).width());
					l_position.bottom = parseInt(l_position.top) + parseInt($(this).height());

					if (( l_position.left <= e.pageX && e.pageX <= l_position.right )
						&& ( l_position.top <= e.pageY && e.pageY <= l_position.bottom )) {
					}
					else {
						$(this).fadeOut();
					}
				}
			});
		});
	});
</script>
<!-- 팝업레이어 끝 -->

<?php if ($is_checkbox) { ?>
    <noscript>
        <p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
    </noscript>
<?php } ?>


<!-- 게시판 검색 시작 { -->
<?php /*?><fieldset id="bo_sch">
    <!--<legend>게시물 검색</legend>-->

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>상호명</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input required" size="15" maxlength="20">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset><?php */ ?>
<!-- } 게시판 검색 끝 -->

<?php if ($is_checkbox) { ?>
    <script>
		function all_checked(sw) {
			var f = document.fboardlist;

			for (var i = 0; i < f.length; i++) {
				if (f.elements[i].name == "chk_wr_id[]") {
					f.elements[i].checked = sw;
				}
			}
		}

		function fboardlist_submit(f) {
			var chk_count = 0;

			for (var i = 0; i < f.length; i++) {
				if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked) {
					chk_count++;
				}
			}

			if (!chk_count) {
				alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
				return false;
			}

			if (document.pressed == "선택복사") {
				select_copy("copy");
				return;
			}

			if (document.pressed == "선택이동") {
				select_copy("move");
				return;
			}

			if (document.pressed == "선택삭제") {
				if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다.")) {
					return false;
				}

				f.removeAttribute("target");
				f.action = "./board_list_update.php";
			}

			return true;
		}

		// 선택한 게시물 복사 및 이동
		function select_copy(sw) {
			var f = document.fboardlist;

			if (sw == "copy") {
				str = "복사";
			} else {
				str = "이동";
			}

			var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

			f.sw.value = sw;
			f.target = "move";
			f.action = "./move.php";
			f.submit();
		}
    </script>
<?php } ?>
<!-- } 게시판 목록 끝 -->

<div id="outlogin" class="layer-popup">
    <?php echo outlogin('basic'); // 외부 로그인 ?>
</div>

게시판 계층적 카테고리 플러그인 (그누보드용)

* 코어파일 최소수정을 위해 카테고리 필드를 활용하여 트리형 멀티카테고리를 구현한것입니다
* 카테고리의 깊이의 제한은 없습니다
* 같은 깊이내에 위치 변경이 가능합니다
* 카테고리문서를 통하여 일괄 입력하실 수 있습니다
* 카테고리관리자에서의 작업은 게시판 테이블 데이타에 영향을 주지 않습니다


테스트 버전 : 그누보드 5.0.35 utf8
예약 테이블 : mc
예약 변수 : $__mc;
예약 테이블 필드 : 게시판 데이타 테이블 ca_name 필드 사용



설치

1. opt_category 폴더를 skin 디렉토리에 업로드 한다 (skin/multi_category)


코어파일 수정

1. lib/common.lib.php 파일에서 get_sql_search() 함수내에 카테고리 검색부분인
if ($search_ca_name) 
	$str = " ca_name = '$search_ca_name' "; 
을 
if ($search_ca_name){ 
	if($GLOBALS['board']['bo_category_list']=='multi_category' && $GLOBALS['board']['bo_use_category']==1){ 
		$str = " ca_name LIKE '$search_ca_name%' "; 
	}else{ 
		$str = " ca_name='$search_ca_name' "; 
	} 
}


스킨 파일 적용

1. 스킨파일 list.skin.php,write.skin.php,view.skin.php 파일 상단에 
if (!defined("_GNUBOARD_")) exit; 다음에 
include (G5_SKIN_PATH.'/multi_category/lib.php');
를 삽입한다


스킨 출력 설정

목록보기(list.skin.php) : 

1. 카테고리 출력(셀렉트박스) 부분인 
  <form name="fcategory" method="get" style="margin:0px;">
            <? if ($is_category) { ?>
            <select name=sca onchange="location='<?=$category_location?>'+<?=strtolower($g4[charset])=='utf-8' ? "encodeURIComponent(this.value)" : "this.value"?>;">
            <option value=''>전체</option>
            <?=$category_option?>
            </select>
            <? } ?>
            </form>
	  을 
<?php echo MC::category_search_form($sca);?>
로 교체한다

2. 카테고리명 출력 부분인
echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> "; 를
//echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> "; 로
주석처리 한다

글작성 (write.skin.php) :

1. 카테고리 선택 박스 부분인 
<select name=ca_name required itemname="분류"><option value="">선택하세요<?=$category_option?></select>
를 
<?php echo MC::write_input_select($write['ca_name']);?>
로 교체한다

내용보기(view.skin.php) :

1. 카테고리명 출력 부분인
<? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
를 제거한다






사용방법 : 
1. 게시판 관리자모드에서 기존 카테고리 설정을 하는 분류 에 multi_category 를 입력하고 사용을 체크한후 저장한다
2. 관리자 로그인후 계층형 카테고리가 적용된 스킨의 목록보기를 보면 카테고리관리 메뉴가 출력된다
3. 카테고리 관리페이지로 가면 최초 접속시 자동으로 테이블이 설치가 된다
4. 카테고리 데이타가 입력되지 않은경우 파일 업로드 양식과 카테고리 제목입력 양식이 있는데
파일로 입력하기 
	- 파일은 규격화된 양식을 따르는 파일을 업로드 하면 일괄적으로 입력할 수 있다.
	- 카테고리 데이타가 없는상태에서만 일괄입력이 가능함을 주의 하자
제목으로 입력하기
	- 제목을 입력하고 확인을 누르면 root 카테고리가 생성된다
	- 실질적으로 root 카테고리는 출력에 사용되지 않으므로 "카테고리" 등의 명칭으로 생성한다


삭제방법:
설치 및 수정의 역순 ㅡㅡ;;
mc 테이블은 직접 삭제하셔야 합니다~
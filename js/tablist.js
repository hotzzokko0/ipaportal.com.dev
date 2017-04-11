/* content tab jquery*/ 
 $(document).ready(function () {
	var activeTab;
	var allTab = $('.tabs_list li');
	var allContents = $('div[id*=tabs-]');
	$('.tabs_list li:last').css('border-right', '0px solid #c2c3c6');  // 탭메뉴 마지막 오른쪽 보더값

	$('.tabs_list li a').click(function () { // 클릭이벤트
		allContents.hide();
		allTab.removeClass('active');
		$(this).parent().addClass('active');
		aa_activeTab = $(this).attr('href');
		$(aa_activeTab).slideDown(-200);
		return false;
	}); $('.tabs_list li a:first').click(); // 페이지가 로딩되면 첫번째 탭 자동 클릭
});

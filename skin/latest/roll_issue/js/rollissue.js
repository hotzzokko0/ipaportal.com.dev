var global_roll_issue_top = 0;
var global_roll_auto_lock = false;
$(document).ready(function(){
roll_issue_change("roll_issue_right_nav01",global_roll_issue_top);
setInterval(function(){
 if(global_roll_auto_lock == false){
 global_roll_issue_top = global_roll_issue_top - 300;
 if(global_roll_issue_top < -1500) global_roll_issue_top = 0;
 var o_code = '01';
 if(global_roll_issue_top == 0) o_code = '01';
 if(global_roll_issue_top == -300) o_code = '02';
 if(global_roll_issue_top == -600) o_code = '03';
 if(global_roll_issue_top == -900) o_code = '04';
 if(global_roll_issue_top == -1200) o_code = '05';
 if(global_roll_issue_top == -1500) o_code = '06';
 roll_issue_change("roll_issue_right_nav"+o_code,global_roll_issue_top);
 }
},3000);
});
function roll_issue_change(o_this,object){
 var img_width = $(".roll_issue_left_img").css('width');
 $(".roll_resizeimg").css('width',img_width);
 $(".roll_resizeimg").css('min-height','300');
  $(".roll_resizeimg").animate({opacity : 0.2 },200);
 $(".roll_resizeimg").animate({opacity : 1 },200);
 //$(".roll_issue_right_nav").css('background','#555555');
 //$("."+o_this).css('background','#888888');
 //$(".roll_issue_right_nav").animate({opacity : 0.8 },100);
 $(".roll_issue_left_img_bottom").animate({opacity : 0.7 },200);
 $("."+o_this).animate({opacity : 1 },200);
  $(".roll_tc").animate({top : object},300);
  global_roll_issue_top = object;
  global_roll_auto_lock = true;
  setTimeout(function(){
    global_roll_auto_lock = false;
  },10000);
}

function rgb2hex(orig) {
	var rgb = orig.replace(/\s/g,'').match(/^rgba?\((\d+),(\d+),(\d+)/i);
	return (rgb && rgb.length === 4) ? "#" +
		("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
		("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
		("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : orig;
}
function hex2rgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16),
    } : null;
}

var isRotate = 0;
var my_banners = [];

var selectedLayer = null;
var slides = [['3']];
var slide_transition = [];
var slide_num = 0;
var banner_id = 0;
var sort_num = 1;
var banner_title = '';
var banner_background = '';
var banner_width = 300;
var banner_height = 250;
var banner_anchor = '_self';
var banner_url = '';
var banner_loop = 1;

var layer_hover_activated = false;
var banner_cash_undo = [];
var banner_cash_redo = [];

var time = 0;
var slide_time = 0;
var layers = [];
var interval;
var slide_interval;
var urls = [];
var video = new Whammy.Video(25, 1);

$(document).ready(function() {

$('.menu-item.item_create_new').click(function() { initialize_create_new() })
$('.menu-item.item_my_banners').click(function() { initialize_my_banners() })
configure_app();
left_tool_activator();

initialize_my_banners();

function initialize_create_new() {
	$("#bo_container").removeAttr('class');
	$("#bo_container").attr('class', '');
	$('#bo_container')[0].className = '';
	$('#bo_container').addClass('create_new');
	var create_new_panel = "<span><div class='ChooseEditorMode__chooseEditorMode'><div class='ChooseEditorMode__title'>Create New</div><div class='ChooseEditorMode__editorModes'><div class='ChooseBannerCard__chooseBannerCard whiteBlue' id='create_single_banner'><div class='singleBanner'><svg width='160px' height='160px' viewBox='0 0 160 160'><defs></defs><g id='Single-Banner---blue' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M32,117 L130,117 L130,43 L32,43 L32,117 Z M29,41.9974983 C29,40.8943104 29.899086,40 31.0076774,40 L130.992323,40 C132.101132,40 133,40.8984375 133,41.9974983 L133,118.002502 C133,119.10569 132.100914,120 130.992323,120 L31.0076774,120 C29.8988678,120 29,119.101562 29,118.002502 L29,41.9974983 Z' id='Rectangle'></path><rect id='Rectangle-10-Copy-2' x='59' y='49' width='65' height='3'></rect><rect id='Rectangle-10-Copy-2' x='59' y='58' width='65' height='3'></rect><rect id='Rectangle-10-Copy-4' x='87' y='67' width='37' height='3'></rect><path d='M38,49 L53,49 L53,52 L38,52 L38,49 Z M47.1034483,52 L47.1034483,64 L44,64 L44,52 L47.1034483,52 Z' id='Combined-Shape'></path></g></svg><div class='singleBanner2'><svg width='160px' height='160px' viewBox='0 0 160 160'><defs></defs><g id='Single-Banner---blue40' stroke='none' stroke-width='1' fill-rule='evenodd' fill-opacity='0.4'><path d='M38,73.9968754 C38,73.4463163 38.4538156,73 38.9996105,73 L80.0003895,73 C80.5524591,73 81,73.4532303 81,73.9968754 L81,110.003125 C81,110.553684 80.5461844,111 80.0003895,111 L38.9996105,111 C38.4475409,111 38,110.54677 38,110.003125 L38,73.9968754 Z M51.5,95.6 L57.8333333,103.4 L67.3333333,93 L78,106 L42,106 L51.5,95.6 Z M67,88 C69.209139,88 71,86.209139 71,84 C71,81.790861 69.209139,80 67,80 C64.790861,80 63,81.790861 63,84 C63,86.209139 64.790861,88 67,88 Z' id='Combined-Shape'></path><rect id='Rectangle-15-Copy-2' x='87' y='101' width='37' height='10' rx='1'></rect></g></svg></div></div><div class='ChooseBannerCard__title'>Single banner</div><div class='ChooseBannerCard__description'>Design a single static or animated banner</div><div class='BaseButton__defaultBaseButton BaseButton__medium BaseButton__blue' style='height: 42px; width: auto; line-height: 42px; font-weight: 500;'><span>Make a banner</span></div></div><div class='ChooseBannerCard__chooseBannerCard whiteBlue'><div class='bannerSet'><svg width='160px' height='160px' viewBox='0 0 160 160'><defs></defs><g id='Banner-Set---blue' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M7,106 L41,106 L41,8 L7,8 L7,106 Z M4,7.00767737 C4,5.89886777 4.89153983,5 5.99729162,5 L42.0027084,5 C43.1057821,5 44,5.899086 44,7.00767737 L44,106.992323 C44,108.101132 43.1084602,109 42.0027084,109 L5.99729162,109 C4.89421792,109 4,108.100914 4,106.992323 L4,7.00767737 Z' id='Rectangle'></path><path d='M6,149 L40,149 L40,121 L6,121 L6,149 Z M3,119.99992 C3,118.895395 3.89153983,118 4.99729162,118 L41.0027084,118 C42.1057821,118 43,118.891941 43,119.99992 L43,150.00008 C43,151.104605 42.1084602,152 41.0027084,152 L4.99729162,152 C3.89421792,152 3,151.108059 3,150.00008 L3,119.99992 Z' id='Rectangle'></path><path d='M57,54 L91,54 L91,8 L57,8 L57,54 Z M54,7.00659927 C54,5.89838509 54.8915398,5 55.9972916,5 L92.0027084,5 C93.1057821,5 94,5.90255737 94,7.00659927 L94,54.9934007 C94,56.1016149 93.1084602,57 92.0027084,57 L55.9972916,57 C54.8942179,57 54,56.0974426 54,54.9934007 L54,7.00659927 Z' id='Rectangle'></path><path d='M107,53 L153,53 L153,7 L107,7 L107,53 Z M104,6.00659927 C104,4.89838509 104.902557,4 106.006599,4 L153.993401,4 C155.101615,4 156,4.90255737 156,6.00659927 L156,53.9934007 C156,55.1016149 155.097443,56 153.993401,56 L106.006599,56 C104.898385,56 104,55.0974426 104,53.9934007 L104,6.00659927 Z' id='Rectangle'></path><path d='M56,114 L154,114 L154,70 L56,70 L56,114 Z M53,68.9909141 C53,67.8913626 53.899086,67 55.0076774,67 L154.992323,67 C156.101132,67 157,67.8890643 157,68.9909141 L157,115.009086 C157,116.108637 156.100914,117 154.992323,117 L55.0076774,117 C53.8988678,117 53,116.110936 53,115.009086 L53,68.9909141 Z' id='Rectangle'></path><path d='M56,148 L154,148 L154,130 L56,130 L56,148 Z M53,129.004947 C53,127.897645 53.899086,127 55.0076774,127 L154.992323,127 C156.101132,127 157,127.897026 157,129.004947 L157,148.995053 C157,150.102355 156.100914,151 154.992323,151 L55.0076774,151 C53.8988678,151 53,150.102974 53,148.995053 L53,129.004947 Z' id='Rectangle'></path><rect id='Rectangle-10-Copy-2' x='102' y='74' width='48' height='3'></rect><rect id='Rectangle-10-Copy-6' x='112' y='18' width='15' height='3'></rect><rect id='Rectangle-10-Copy-9' x='61' y='19' width='19' height='3'></rect><rect id='Rectangle-10-Copy-5' x='112' y='11' width='36' height='3'></rect><rect id='Rectangle-10-Copy-6' x='11' y='29' width='16' height='3'></rect><rect id='Rectangle-10-Copy-5' x='11' y='13' width='26' height='3'></rect><rect id='Rectangle-10-Copy-5' x='11' y='21' width='26' height='3'></rect><rect id='Rectangle-10-Copy-8' x='61' y='12' width='26' height='3'></rect><rect id='Rectangle-10-Copy-4' x='130' y='81' width='20' height='3'></rect><rect id='Rectangle-10-Copy-7' x='60' y='134' width='30' height='3'></rect><rect id='Rectangle-10-Copy-7' x='60' y='141' width='30' height='3'></rect><path d='M17,128 L30,128 L30,131 L17,131 L17,128 Z M25,131 L25,142 L22,142 L22,131 L25,131 Z' id='Combined-Shape'></path></g></svg><div class='bannerSet2'><svg width='160px' height='160px' viewBox='0 0 160 160'><defs></defs><g id='Banner-Set---blue40' fill='' stroke='none' stroke-width='1' fill-rule='evenodd' fill-opacity='0.4'><polygon id='Fill-3' points='120.5 38.6 126.833333 46.4 136.333333 36 149 49 111 49'></polygon><rect id='Rectangle-15' x='60' y='74' width='35' height='36' rx='1'></rect><rect id='Rectangle-15-Copy-3' x='11' y='59' width='26' height='43' rx='1'></rect><rect id='Rectangle-15-Copy' x='61' y='30' width='26' height='20' rx='1'></rect><rect id='Rectangle-15-Copy-2' x='117' y='134' width='34' height='10' rx='1'></rect><circle id='Oval-2' cx='137' cy='27' r='4'></circle></g></svg></div></div><div class='ChooseBannerCard__title'>Banner set</div><div class='ChooseBannerCard__description'>Create and edit multiple banners, in different sizes, at once</div><div class='BaseButton__defaultBaseButton BaseButton__medium BaseButton__blue' style='height: 42px; width: auto; line-height: 42px; font-weight: 500;'><span>Generate banner set</span></div></div></div></div></span>";
	$('#create_container').html(create_new_panel);
	$('#create_single_banner').click(function() {
		var create_single = "<div class='ChooseSizeApp__chooseSizeApp'><div style='position: relative; overflow: hidden; width: 100%; height: 100%; min-height: 100%;'><div style='position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: scroll; margin-right: -17px; margin-bottom: -17px;'><div class='ChooseSizeApp__chooseSizeAppHeader'><span class='BaseLabel__baseLabel BaseLabel__mlarge BaseLabel__blue'>Make a banner</span><div class='ChooseSizeCategoryMenu__categoryMenu'><div class='ChooseSizeCategoryMenu__centeredContainer'><div class='LabelButton__labelButton LabelButton__transparentWhite LabelButton__small LabelButton__selected' style='font-weight: 500; text-transform: uppercase;'>Most popular<div class='LabelButton__selectedBorder'></div></div><div class='LabelButton__labelButton LabelButton__transparentWhite LabelButton__small' style='font-weight: 500; text-transform: uppercase;'>Display<div class='LabelButton__selectedBorder'></div></div><div class='LabelButton__labelButton LabelButton__transparentWhite LabelButton__small' style='font-weight: 500; text-transform: uppercase;'>Social media<div class='LabelButton__selectedBorder'></div></div></div></div></div><div class='ChooseSizeApp__chooseSizeAppCategory'><div><div class='SizePresetList__sizePresetList'><div class='SizePresetList__centeredContainer'><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='AddCustomSize__container AddCustomSize__editor'><div class='AddCustomSize__content'><div class='AddCustomSize__front'><div class='AddCustomSize__plusSign'><svg width='40px' height='40px' viewBox='0 0 40 40'><g stroke='none' stroke-width='1' fill-rule='evenodd' fill-opacity='0.8'><g transform='translate(-310.000000, -260.000000)'><g transform='translate(-481.000000, 57.000000)'><g transform='translate(741.000000, 163.000000)'><g><g><path d='M71,58 L71,40 L68,40 L68,58 L50,58 L50,61 L68,61 L68,80 L71,80 L71,61 L90,61L90,58 L71,58 Z'></path></g></g></g></g></g></g></svg></div></div><div class='AddCustomSize__back'><div class='AddCustomSize__inputs'><input class='Input__input Input__whiteBorder Input__normal Input__centerInputText Input__noPadding' type='text' placeholder='Width' maxlength='4' value='' style='width: 48px; height: 36px;'><span class='AddCustomSize__x'>x</span><input class='Input__input Input__whiteBorder Input__normal Input__centerInputText Input__noPadding' type='text' placeholder='Height' maxlength='4' value='' style='width: 48px; height: 36px;'></div><button class='Button__defaultButton Button__smedium Button__whiteTransparent Button__disabled' style='min-width: 108px; height: 36px;'><span class='AddCustomSize__buttonLabel'>Create</span></button></div></div><div class='AddCustomSize__label'>Custom size</div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 84px; height: 70px; margin-left: -42px; margin-top: -35px; border-radius: 1px; background-color: white;'><div><svg width='84px' height='70px' viewBox='0 0 84 70'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='84' height='70' rx='1' style='fill: rgb(255, 255, 255); fill-opacity: 0.6;'></rect><polygon points='6 12 78 12 78 6 6 6' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='6 24 54 24 54 18 6 18' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='6 46 78 46 78 30 6 30' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='6 64 78 64 78 52 6 52' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Large Rectangle</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>336 x 280</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 70px; height: 60px; margin-left: -35px; margin-top: -30px; border-radius: 1px; background-color: white;'><div><svg width='70px' height='60px' viewBox='0 0 70 60'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><g><use filter='url(#filter-2)' style='fill: black; fill-opacity: 1;'></use><use style='fill: white; fill-rule: evenodd;'></use></g><polygon points='5 11 65 11 65 5 5 5' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='5 22 46 22 46 16 5 16' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='5 40 65 40 65 27 5 27' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='5 55 65 55 65 45 5 45' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Medium Rectangle</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>300 x 250</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 120px; height: 20px; margin-left: -60px; margin-top: -10px; border-radius: 1px; background-color: white;'><div><svg width='120px' height='20px' viewBox='0 0 120 20'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='120' height='20' rx='1' style='fill: rgb(255, 255, 255);'></rect><polygon points='44 8 100 8 100 4 44 4' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='4 16 40 16 40 4 4 4' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='44 16 82 16 82 12 44 12' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='104 16 116 16 116 4 104 4' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Leaderboard</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>728 x 90</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 76px; height: 24px; margin-left: -38px; margin-top: -12px; border-radius: 1px; background-color: white;'><div><svg width='76px' height='24px' viewBox='0 0 76 24'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='76' height='24' rx='1' style='fill: rgb(255, 255, 255);'></rect><polygon points='4 10 52 10 52 4 4 4' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='4 20 52 20 52 14 4 14' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='56 20 72 20 72 4 56 4' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Large Mobile</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>320 x 100</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 85px; height: 16px; margin-left: -42.5px; margin-top: -8px; border-radius: 1px; background-color: white;'><div><svg width='85px' height='16px' viewBox='0 0 85 16'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='85' height='16' rx='1' style='fill: rgb(255, 255, 255);'></rect><polygon points='4 12 58 12 58 4 4 4' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='63 12 81 12 81 4 63 4' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Main Banner</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>468 x 60</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 50px; height: 100px; margin-left: -25px; margin-top: -50px; border-radius: 1px; background-color: white;'><div><svg width='50px' height='100px' viewBox='0 0 50 100'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='50' height='100' rx='1' style='fill: rgb(255, 255, 255);'></rect><polygon points='5 11 45 11 45 5 5 5' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='5 22 45 22 45 16 5 16' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='5 76 45 76 45 38 5 38' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='5 33 33 33 33 27 5 27' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='5 95 45 95 45 81 5 81' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Half Page</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>300 x 600</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 60px; height: 60px; margin-left: -30px; margin-top: -30px; border-radius: 1px; background-color: white;'><div><svg width='60px' height='60px' viewBox='0 0 60 60'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='60' height='60' rx='1' style='fill: rgb(255, 255, 255);'></rect><polygon points='6 12 54 12 54 6 6 6' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='6 24 54 24 54 18 6 18' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='6 36 37 36 37 30 6 30' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='6 54 54 54 54 42 6 42' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Square</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>250 x 250</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 32px; height: 100px; margin-left: -16px; margin-top: -50px; border-radius: 1px; background-color: white;'><div><svg width='32px' height='100px' viewBox='0 0 32 100'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='32' height='100' rx='1' style='fill: rgb(255, 255, 255);'></rect><polygon points='4 9 28 9 28 4 4 4' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='4 18 28 18 28 13 4 13' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='4 27 28 27 28 22 4 22' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='4 96 28 96 28 54 4 54' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='4 36 21 36 21 31 4 31' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='4 50 28 50 28 40 4 40' style='fill: rgb(82, 110, 222);'></polygon></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Wide Skyscraper</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>160 x 600</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 110px; height: 75px; margin-left: -55px; margin-top: -37.5px; border-radius: 1px; background-color: white;'><div><svg width='110px' height='75px' viewBox='0 0 110 75'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><g><polygon points='64 75 110 75 110 0 64 0' style='fill: rgb(52, 60, 164);'></polygon></g><polygon points='7 14 57 14 57 7 7 7' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='7 27 57 27 57 20 7 20' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='7 68 57 68 57 34 7 34' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><path d='M85.06,48 L85.06,38.92 L82,38.92 L82,35.213 L85.06,35.213 L85.06,32.1 C85.06,29.835 86.895, 28 89.159,28 L92.359,28 L92.359,31.333 L90.07,31.333 C89.35,31.333 88.767,31.917 88.767,32.636 L88.767,35.213 L92.301,35.213 L91.813,38.92 L88.767,38.92 L88.767,48' style='fill: rgb(255, 255, 255);'></path></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Facebook Post</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>1200 x 900</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 105px; height: 46px; margin-left: -52.5px; margin-top: -23px; border-radius: 1px; background-color: white;'><div><svg width='105px' height='46px' viewBox='0 0 105 46'><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><g><polygon points='59 46 105 46 105 0 59 0' style='fill: rgb(52, 60, 164);'></polygon></g><polygon points='7 14 52 14 52 7 7 7' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='7 27 39 27 39 20 7 20' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><path d='M80.06,33 L80.06,23.92 L77,23.92 L77,20.213 L80.06,20.213 L80.06,17.1 C80.06,14.835 81.895, 13 84.159,13 L87.359,13 L87.359,16.333 L85.07,16.333 C84.35,16.333 83.767,16.917 83.767,17.636 L83.767,20.213 L87.301,20.213 L86.813,23.92 L83.767,23.92 L83.767,33' style='fill: rgb(255, 255, 255);'></path></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>Facebook Cover</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>851 x 315</span></div></div></div><div class='SizePresetList__preset' style='margin-top: 15px; opacity: 1;'><div class='SizePreset__sizePreset'><div class='SizePreset__thumbnailContainer SizePreset__transparentWhite'><div class='SizePreset__thumbnail' style='width: 120px; height: 50px; margin-left: -60px; margin-top: -25px; border-radius: 1px; background-color: white;'><div><svg width='120px' height='50px' viewBox='0 0 120 50'><defs><polygon id='path-1' points='0.1835 21 29.395 21 29.395 0.6583 0.1835 0.6583 0.1835 21'></polygon></defs><g style='fill: none; fill-rule: evenodd; stroke: none; stroke-width: 1;'><g><rect x='0' y='0' width='120' height='50' rx='1' style='fill: rgb(255, 255, 255);'></rect><polygon points='0 32 29 32 29 19 0 19' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><polygon points='91 32 120 32 120 19 91 19' style='fill: rgb(223, 224, 230); fill-opacity: 0.6;'></polygon><g transform='translate(35.000000, 14.000000)'><g transform='translate(20.000000, 0.341800)'><path d='M27.2075,12.6033 L23.6785,12.6033 L23.6785,14.3173 C23.6785,15.2243 23.9815, 15.6783 24.5855,15.6783 C25.0185,15.6783 25.2825,15.4423 25.3745,14.9683 C25.4005, 14.8373 25.4135,14.4353 25.4135,13.7653 L27.2075,13.7653 L27.2075,14.0223 C27.2075, 14.6653 27.1935,15.0463 27.1675,15.1653 C27.1285,15.5203 26.9905,15.8753 26.7535, 16.2293 C26.2805,16.9253 25.5705,17.2743 24.6255,17.2743 C23.7175,17.2743 23.0085, 16.9383 22.4955,16.2683 C22.1145,15.7833 21.9255,15.0213 21.9255,13.9833 L21.9255, 10.5723 C21.9255,9.5343 22.1075,8.7723 22.4765,8.2863 C22.9895,7.6163 23.6915, 7.2813 24.5855,7.2813 C25.4665,7.2813 26.1635,7.6163 26.6745,8.2863 C27.0305, 8.7723 27.2075,9.5343 27.2075,10.5723 L27.2075,12.6033 Z M20.5455,14.2193 C20.5455, 15.1783 20.4865,15.8353 20.3675,16.1903 C20.1445,16.9123 19.6785,17.2743 18.9685, 17.2743 C18.3375,17.2743 17.7265,16.9123 17.1345,16.1903 L17.1345,17.1373 L15.3815, 17.1373 L15.3815,4.0683 L17.1345,4.0683 L17.1345,8.3463 C17.7005,7.6363 18.3115, 7.2813 18.9685,7.2813 C19.6785,7.2813 20.1445,7.6503 20.3675,8.3853 C20.4865, 8.7273 20.5455,9.3773 20.5455,10.3363 L20.5455,14.2193 Z M13.8435,17.1363 L12.0895, 17.1363 L12.0895,16.0713 C11.3795,16.8733 10.7085,17.2743 10.0795,17.2743 C9.4745, 17.2743 9.0925,17.0313 8.9355,16.5453 C8.8305,16.2293 8.7775,15.7503 8.7775, 15.1063 L8.7775,7.3993 L10.5315,7.3993 L10.5315,14.5743 C10.5315,14.9943 10.5385, 15.2243 10.5515,15.2633 C10.5905,15.5403 10.7285,15.6783 10.9665,15.6783 C11.3205, 15.6783 11.6945,15.4013 12.0895,14.8503 L12.0895,7.3993 L13.8435,7.3993 L13.8435, 17.1363 Z M8.5215,5.9203 L6.4125,5.9203 L6.4125,17.1363 L4.4415,17.1363 L4.4415, 5.9203 L2.3725,5.9203 L2.3725,4.0683 L8.5215,4.0683 L8.5215,5.9203 Z M28.8825, 3.9303 C28.7125,3.1543 28.3345,2.5043 27.7495,1.9783 C27.1655,1.4533 26.4905, 1.1453 25.7285,1.0533 C23.3105,0.7893 19.6655,0.6583 14.7885,0.6583 C9.9135, 0.6583 6.2745,0.7893 3.8695,1.0533 C3.0945,1.1453 2.4175,1.4533 1.8395,1.9783 C1.2605, 2.5043 0.8805,3.1553 0.6955,3.9303 C0.3545,5.4543 0.1835,7.7543 0.1835,10.8293 C0.1835, 13.9563 0.3545,16.2553 0.6955,17.7273 C0.8675,18.5023 1.2445,19.1533 1.8285, 19.6793 C2.4135,20.2053 3.0875,20.5073 3.8505,20.5853 C6.2685,20.8613 9.9145, 21.0003 14.7905,21.0003 C19.6635,21.0003 23.3115,20.8613 25.7285,20.5853 C26.4905, 20.5073 27.1605,20.2053 27.7395,19.6793 C28.3175,19.1533 28.6985,18.5023 28.8825, 17.7273 C29.2235,16.2033 29.3955,13.9043 29.3955,10.8293 C29.3955,7.7023 29.2235, 5.4023 28.8825,3.9303 L28.8825,3.9303 Z' style='fill: rgb(208, 2, 27);'></path></g><path d='M38.0218,9.2194 C37.7198,9.2194 37.4238,9.3644 37.1348,9.6544 L37.1348,15.5864 C37.4238, 15.8744 37.7198,16.0204 38.0218,16.0204 C38.5338,16.0204 38.7908,15.5794 38.7908, 14.6994 L38.7908,10.5404 C38.7908,9.6604 38.5348,9.2194 38.0218,9.2194' style='fill: rgb(208, 2, 27);'></path><path d='M44.5663,9.2194 C43.9743,9.2194 43.6793,9.6674 43.6793,10.5604 L43.6793,11.4664 L45.4533, 11.4664 L45.4533,10.5604 C45.4533,9.6654 45.1573,9.2194 44.5663,9.2194' style='fill: rgb(208, 2, 27);'></path><path d='M2.4831,12.4325 L2.4831,17.7745 L4.4541,17.7745 L4.4541,12.4325 L6.8381,4.5675 L4.8281, 4.5675 L3.4881,9.7515 L2.0881,4.5675 L0.0001,4.5675 C0.3671,5.6715 0.7951,6.8995 1.2801, 8.2525 C1.8981,10.0665 2.2991,11.4605 2.4831,12.4325' style='fill: rgb(0, 0, 0);'></path><path d='M8.6329,10.7762 C8.6329,9.8692 8.9149,9.4162 9.4799,9.4162 C10.0459,9.4162 10.3279, 9.8692 10.3279,10.7762 L10.3279,14.9152 C10.3279,15.8362 10.0459,16.2952 9.4799, 16.2952 C8.9149,16.2952 8.6329,15.8362 8.6329,14.9152 L8.6329,10.7762 Z M9.4799, 17.9112 C10.3869,17.9112 11.0829,17.5772 11.5699,16.9062 C11.9369,16.4202 12.1209, 15.6442 12.1209,14.5802 L12.1209,11.1302 C12.1209,10.0802 11.9369,9.3112 11.5699, 8.8252 C11.0829,8.1552 10.3869,7.8192 9.4799,7.8192 C8.5999,7.8192 7.9099, 8.1552 7.4099,8.8252 C7.0429,9.3112 6.8589,10.0802 6.8589,11.1302 L6.8589,14.5802 C6.8589, 15.6312 7.0429,16.4072 7.4099,16.9062 C7.9099,17.5772 8.5999,17.9112 9.4799, 17.9112 L9.4799,17.9112 Z' style='fill: rgb(0, 0, 0);'></path><path d='M14.9006,17.9113 C15.5576,17.9113 16.2346,17.5033 16.9296,16.6903 L16.9296, 17.7733 L18.7246,17.7733 L18.7246,7.9383 L16.9296,7.9383 L16.9296,15.4473 C16.5366, 16.0133 16.1626,16.2953 15.8066,16.2953 C15.5706,16.2953 15.4326,16.1513 15.3936, 15.8623 C15.3796,15.8363 15.3736,15.6053 15.3736,15.1713 L15.3736,7.9383 L13.5796, 7.9383 L13.5796,15.7043 C13.5796,16.3743 13.6316,16.8673 13.7376,17.1823 C13.9086, 17.6693 14.2956,17.9113 14.9006,17.9113' style='fill: rgb(0, 0, 0);'></path></g></g></g></svg></div></div></div><div class='SizePreset__nameLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__blue'>YouTube Channel Cover</span></div><div class='SizePreset__smallLabel SizePreset__transparentWhite'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue'>2560 x 1440</span></div></div></div><div class='clearfix'></div></div></div></div></div></div><div class='ScrollArea__track ScrollArea__trackHorizontal normal ScrollArea__transparentGrey' style='position: absolute; height: 6px; transition: opacity 600ms; opacity: 0;'><div class='ScrollArea__thumb ScrollArea__transparentGrey' style='position: relative; display: block; height: 100%; width: 0px;'></div></div><div class='ScrollArea__track ScrollArea__trackVertical normal ScrollArea__transparentGrey' style='position: absolute; width: 6px; transition: opacity 600ms; opacity: 0;'><div class='ScrollArea__thumb ScrollArea__transparentGrey' style='position: relative; display: block; width: 100%; height: 0px;'></div></div></div></div>";
		$('#create_container').html(create_single);
		//create single banner
		$('.SizePreset__sizePreset .SizePreset__thumbnailContainer').click(function() {
			var banner_size = $(this).siblings('.SizePreset__smallLabel').children().text().split(' x ');
			banner_id = 0;
			slides = [['3']];
			slide_transition = [];
			slide_num = 0;
			sort_num = 1;
			banner_background = '';
			banner_title = '';
			banner_width = banner_size[0];
			banner_height = banner_size[1];
			initialize_editor();
		})
	})
}
function initialize_my_banners() {
	$("#bo_container").removeAttr('class');
	$("#bo_container").attr('class', '');
	$('#bo_container')[0].className = '';
	$('#bo_container').addClass('my_banners');

	$.get('editor/get_my_banners', function(data) {
		data = JSON.parse(data);
		my_banners = data;
		if (data.length > 0) {
			$('#my_banner_container').html("<div class='BannerList__bannerListContent' style='height:100%'><div class='BannerList__bannerList'><div style='position: relative; overflow: hidden; width: 100%; height: 100%;'><div style='position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: scroll; margin-right: -17px; margin-bottom: -17px;'><div class='BannerList__containerBanners'><div class='SelectionArea__selectionArea'><div class='BannerList__content'><div class='BannerList__contentBannersAndFolders'><div class='BannersGrid__bannersGrid'><div class='BannersGrid__banners'></div></div></div></div></div></div></div><div style='position: absolute; height: 6px; transition: opacity 600ms; opacity: 0;'><div class='ScrollArea__thumb ScrollArea__stageGrey' style='position: relative; display: block; height: 100%; width: 0px;'></div></div><div class='ScrollArea__track ScrollArea__trackVertical normal ScrollArea__stageGrey' style='position: absolute; width: 6px; transition: opacity 600ms; opacity: 0;'><div class='ScrollArea__thumb ScrollArea__stageGrey' style='position: relative; display: block; width: 100%; height: 596px; transform: translateY(61px);'></div></div></div></div></div>");
			var banner_area = [];
			for (var i = 0; i < data.length; i++) {
				var banner_content = JSON.parse(data[i]['banner_content']);
				var banner_area_i = $("<div class='banner_area' style='width:"+data[i]['banner_width']+"px; height:"+data[i]['banner_height']+"px;'><div class='banner_background' style='background:"+data[i]['banner_background']+"'></div></div>");
				for (var j = 1; j < banner_content[0].length; j++) {
					banner_area_i.append(banner_content[0][j]);
				}
				banner_area[data[i]['id']] = banner_area_i;
				$('.BannersGrid__banners').append("<div class='BannersGrid__column' style='width: 265px;'><div data-item='true' data-item-type='banner' data-id='38437254' data-selected='false' class='BannerItem__bannerItem' style='width: 237px; opacity: 1;'><div class='Cardboard__cardboard Cardboard__whiteBlock Cardboard__boxShadow'><div class='DraggableItem__draggableItem bannerGrid'><div class='BannerItem__bannerPreviewContainer'><img alt='banner' src='"+data[i]['preview_image']+"' style='display: block;'><span><span><div class='BannerItemOverlay__bannerItemOverlay' data-selectable='true' data-draggable='true' style='width: 100%;'><span><div><div class='BannerItemOverlay__mainContainer' data-selectable='true' data-draggable='true'><div class='BannerItemOverlay__buttonsContainer'><div class='ButtonsGroup__buttonsGroup' banner_order='"+i+"' banner_id='"+data[i]['id']+"'><div class='BannerItemOverlay__btn BannerItemOverlay__transparent view_banner' style='min-width: 50%;'><div class='IconLabelButton__iconLabelButton IconLabelButton__smedium IconLabelButton__transparentWhite center'><span class='IconLabelButton__icon'><div class='Icon__iconComponent Icon__large Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='24px-View' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M2,12 C3.56109227,7.90264314 7.44984334,5 12,5 C16.5501567,5 20.4389077,7.90264314 22,12 C20.4389077,16.0973569 16.5501567,19 12,19 C7.44984334,19 3.56109227,16.0973569 2,12 Z M12,17 C14.76,17 17,14.76 17,12 C17,9.24 14.76,7 12,7 C9.24,7 7,9.24 7,12 C7,14.76 9.24,17 12,17 Z M12,9 C13.66,9 15,10.34 15,12 C15,13.66 13.66,15 12,15 C10.34,15 9,13.66 9,12 C9,10.34 10.34,9 12,9 Z' id='Combined-Shape'></path></g></svg></div></span><span class='IconLabelButton__label'>View</span></div></div><div class='BannerItemOverlay__btn BannerItemOverlay__transparent edit_banner' style='min-width: 50%;'><div class='IconLabelButton__iconLabelButton IconLabelButton__smedium IconLabelButton__transparentWhite center'><span class='IconLabelButton__icon'><div class='Icon__iconComponent Icon__large Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='24px-Edit' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M7.42814815,20 L4,20 L4,16.5718519 L13.5718519,7 L17,10.4281481 L7.42814815,20 Z M15,5.34705753 L17.3470575,3 L20.8021833,6.45512576 L18.4551258,8.80218329 L15,5.34705753 Z' id='Combined-Shape'></path></g></svg></div></span><span class='IconLabelButton__label'>Edit</span></div></div></div></div></div><div class='BannerItemOverlay__topContainer' data-selectable='true' data-draggable='true'><div class='MoreOptions__moreOptions'><div class='MoreOptions__icon'><div tabindex='-1' class='DownloadBannerOption__downloadBannerOptionsPopover'><div class='Popover__popoverContainer'><div class='IconButton__iconButton IconButton__whiteGrey IconButton__large' data-original-title='' title=''><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='24px-Download banner' stroke='none' stroke-width='1' fill-rule='evenodd'><g fill-rule='nonzero'><path d='M16.4704221,11.2746482 C17.3151847,10.5706795 17.1122704,10 16,10 L14,10 L14,5 L10,5 L10,10 L8,10 C6.8954305,10 6.68827629,10.5735636 7.52957788,11.2746482 L11.2278881,14.3565734 C11.6543137,14.7119281 12.3397772,14.7168523 12.7721119,14.3565734 L16.4704221,11.2746482 Z M7,17 L7,19 L17,19 L17,17 L7,17 Z' id='Shape-Copy-2'></path></g></g></svg></div></div></div></div><div class='export_tool_panel' banner_order='"+i+"' banner_id='"+data[i]['id']+"' animation_duration='"+banner_content[0][0]+"'><li>JPG</li><li>PNG</li><li>GIF</li><li>HTML5</li><li>MP4</li><li>ANIMATED GIF</li></div></div></div><div class='MoreOptions__icon'><div><div class='MoreBannerOptions__moreBannerOptions'><div class='MoreOptionsPopover__moreOptionsPopover'><div class='Popover__popoverContainer'><div class='IconButton__iconButton IconButton__whiteGrey IconButton__large' data-original-title='' title=''><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='moreSmall-svg' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M6,11 L8,11 L8,13 L6,13 L6,11 Z M11,11 L13,11 L13,13 L11,13 L11,11 Z M16,11 L18,11 L18,13 L16,13 L16,11 Z' id='Combined-Shape'></path></g></svg></div></div></div></div></div><div class='more_tool_panel' banner_order='"+i+"' banner_id='"+data[i]['id']+"' animation_duration='"+banner_content[0][0]+"'><li>View</li><li>Edit as new</li><li>Embed</li><li>Rename</li><li>Duplicate</li><li>Delete</li></div></div></div></div></div></div><div class='BannerItemOverlay__bottomContainer'><span class='BannerItemOverlay__bannerSize'><span class='BaseLabel__baseLabel BaseLabel__small BaseLabel__blue'>"+data[i]['banner_width']+" x "+data[i]['banner_height']+" ~  22.35 KB</span></span><div class='BannerItemOverlay__floatRight'><div class='Badge__badge Badge__html Badge__xsmall'>HTML5</div></div></div></div></span><div class='BannerItemOverlay__checkBoxContainer'><div class='Checkbox__checkbox Checkbox__blueWhite' data-original-title='' title=''><label for='checkbox'><input type='checkbox' name='checkbox' class='Checkbox__checkboxInput'><div class='Checkbox__checkboxBackground Checkbox__blueWhite Checkbox__roundedRectangle'><div class='Checkbox__checkmark Checkbox__blueWhite Checkbox__roundedRectangle'></div></div></label></div></div></div></span></span></div><div class='BannerItem__bannerTitleContainer' data-selectable='true' data-draggable='true'><p class='BannerItem__bannerTitle' data-selectable='true' data-draggable='true'>"+data[i]['banner_title']+"</p></div></div></div></div></div>");
			}
			//click edit_banner button
			$('.BannerItemOverlay__btn.BannerItemOverlay__transparent.edit_banner').click(function() {
				banner_id = $(this).parent().attr('banner_id');
				initialize_editor();
			})
			$('.BannerItemOverlay__btn.BannerItemOverlay__transparent.view_banner').click(function() {
				slides = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['banner_content']);
				if (my_banners[$(this).parent().attr('banner_order')]['slide_transition'] == '') {
					slide_transition = [];
				} else {
					slide_transition = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['slide_transition']);
				}
				slide_num = 0;
				sort_num = my_banners[$(this).parent().attr('banner_order')]['sort_num'];
				banner_background = my_banners[$(this).parent().attr('banner_order')]['banner_background'];
				banner_title = my_banners[$(this).parent().attr('banner_order')]['banner_title'];
				banner_width = my_banners[$(this).parent().attr('banner_order')]['banner_width'];
				banner_height = my_banners[$(this).parent().attr('banner_order')]['banner_height'];
				banner_anchor = my_banners[$(this).parent().attr('banner_order')]['banner_anchor'];
				banner_url = my_banners[$(this).parent().attr('banner_order')]['banner_url'];
				banner_loop = my_banners[$(this).parent().attr('banner_order')]['banner_loop'];
				$('#preview_container').html("<div class='banner_area' style='width:"+banner_width+"px; height:"+banner_height+"px;'><div class='banner_background'></div></div>");
				$('#preview_container .banner_background').css('background', banner_background);
				$('#preview_banner').modal();
				preview_banner(0);
			})
			$('.more_tool_panel >li').click(function() {
				switch ($(this).text()) {
					case 'View':
						slides = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['banner_content']);
						if (my_banners[$(this).parent().attr('banner_order')]['slide_transition'] == '') {
							slide_transition = [];
						} else {
							slide_transition = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['slide_transition']);
						}
						slide_num = 0;
						sort_num = my_banners[$(this).parent().attr('banner_order')]['sort_num'];
						banner_background = my_banners[$(this).parent().attr('banner_order')]['banner_background'];
						banner_title = my_banners[$(this).parent().attr('banner_order')]['banner_title'];
						banner_width = my_banners[$(this).parent().attr('banner_order')]['banner_width'];
						banner_height = my_banners[$(this).parent().attr('banner_order')]['banner_height'];
						banner_anchor = my_banners[$(this).parent().attr('banner_order')]['banner_anchor'];
						banner_url = my_banners[$(this).parent().attr('banner_order')]['banner_url'];
						banner_loop = my_banners[$(this).parent().attr('banner_order')]['banner_loop'];
						$('#preview_container').html("<div class='banner_area' style='width:"+banner_width+"px; height:"+banner_height+"px;'><div class='banner_background'></div></div>");
						$('#preview_container .banner_background').css('background', banner_background);
						$('#preview_banner').modal();
						preview_banner(0);
						break;
					case 'Edit as new':
						banner_id = 0;
						slides = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['banner_content']);
						if (my_banners[$(this).parent().attr('banner_order')]['slide_transition'] == '') {
							slide_transition = [];
						} else {
							slide_transition = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['slide_transition']);
						}
						slide_num = 0;
						sort_num = my_banners[$(this).parent().attr('banner_order')]['sort_num'];
						banner_background = my_banners[$(this).parent().attr('banner_order')]['banner_background'];
						banner_title = 'Copy ' + my_banners[$(this).parent().attr('banner_order')]['banner_title'];
						banner_width = my_banners[$(this).parent().attr('banner_order')]['banner_width'];
						banner_height = my_banners[$(this).parent().attr('banner_order')]['banner_height'];
						banner_anchor = my_banners[$(this).parent().attr('banner_order')]['banner_anchor'];
						banner_url = my_banners[$(this).parent().attr('banner_order')]['banner_url'];
						banner_loop = my_banners[$(this).parent().attr('banner_order')]['banner_loop'];
						banner_cash_redo = [];
						banner_cash_undo = [];
						$('#btn_undo').addClass('IconButton__disabled');
						$('#btn_redo').addClass('IconButton__disabled');
						$('.input_banner_loop').val(banner_loop);
						populate_editor();
						setTimeout(function() {
							$('#canvas_area').scrollTop((Number(banner_height) + 700 - $('#canvas_area').height()) / 2);
							$('#canvas_area').scrollLeft(Math.abs(Number(banner_width) + 700 - $('#canvas_area').width()) / 2);
						}, 0)
						break;
					case 'Embed':
						var script = "<script type='text/javascript'>var banner_embed={'width':'300','height':'250','banner_id':'"+$(this).parent().attr('banner_id')+"','user_id':"+user_id+",'url':'"+base_url+"'};</script>\n<script type='text/javascript' src='"+base_url+"src/embed.js'></script>";
						$('#embed_modal textarea').text(script);
						$('#embed_modal').modal();
						break;
					case 'Rename':
						$('.input_banner_id').val($(this).parent().attr('banner_id'));
						$('.input_banner_title').val(my_banners[$(this).parent().attr('banner_order')]['banner_title']);
						$('#rename_modal').modal();
						break;
					case 'Duplicate':
						$.post('editor/save_banner', {
							'banner_content':my_banners[$(this).parent().attr('banner_order')]['banner_content'],
							'slide_transition':my_banners[$(this).parent().attr('banner_order')]['slide_transition'],
							'banner_id':0,
							'sort_num':my_banners[$(this).parent().attr('banner_order')]['sort_num'],
							'banner_title':'Copy ' + my_banners[$(this).parent().attr('banner_order')]['banner_title'],
							'banner_url':my_banners[$(this).parent().attr('banner_order')]['banner_url'],
							'banner_anchor':my_banners[$(this).parent().attr('banner_order')]['banner_anchor'],
							'banner_background':my_banners[$(this).parent().attr('banner_order')]['banner_background'],
							'preview_image':my_banners[$(this).parent().attr('banner_order')]['preview_image'],
							'banner_width':my_banners[$(this).parent().attr('banner_order')]['banner_width'],
							'banner_height':my_banners[$(this).parent().attr('banner_order')]['banner_height'],
							'banner_loop':my_banners[$(this).parent().attr('banner_order')]['banner_loop']
						}, function(data) {
							if (data == 'success') {
								initialize_my_banners();
							} else {
								console.log(data)
							}
						})
						break;
					case 'Delete':
						$('#delete_banner_btn').attr('banner_id', $(this).parent().attr('banner_id'));
						$('#delete_modal').modal();
						break;
				}
			})
			$('.export_tool_panel >li').click(function() {
				var animation_duration = $(this).parent().attr('animation_duration');
				switch ($(this).text()) {
					case 'JPG':
						$('#export_banner_process').html(banner_area[$(this).parent().attr('banner_id')]);
						html2canvas(document.querySelector('#export_banner_process .banner_area')).then(function(canvas) {
							document.getElementById('export_download').href = canvas.toDataURL('image/jpg');
							document.getElementById('export_download').download = 'download.jpg';
							document.getElementById('export_download').click();
							$('#export_banner_process').empty();
						})
						break;
					case 'PNG':
						$('#export_banner_process').html(banner_area[$(this).parent().attr('banner_id')]);
						html2canvas(document.querySelector('#export_banner_process .banner_area')).then(function(canvas) {
							document.getElementById('export_download').href = canvas.toDataURL('image/png');
							document.getElementById('export_download').download = 'download.png';
							document.getElementById('export_download').click();
							$('#export_banner_process').empty();
						})
						break;
					case 'GIF':
						$('#export_banner_process').html(banner_area[$(this).parent().attr('banner_id')]);
						html2canvas(document.querySelector('#export_banner_process .banner_area')).then(function(canvas) {
							document.getElementById('export_download').href = canvas.toDataURL('image/gif');
							document.getElementById('export_download').download = 'download.gif';
							document.getElementById('export_download').click();
							$('#export_banner_process').empty();
						})
						break;
					case 'HTML5':
						slides = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['banner_content']);
						slide_num = 0;
						if (my_banners[$(this).parent().attr('banner_order')]['slide_transition'] == '') {
							slide_transition = [];
						} else {
							slide_transition = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['slide_transition']);
						}
						sort_num = my_banners[$(this).parent().attr('banner_order')]['sort_num'];
						banner_background = my_banners[$(this).parent().attr('banner_order')]['banner_background'];
						banner_title = my_banners[$(this).parent().attr('banner_order')]['banner_title'];
						banner_width = my_banners[$(this).parent().attr('banner_order')]['banner_width'];
						banner_height = my_banners[$(this).parent().attr('banner_order')]['banner_height'];
						banner_anchor = my_banners[$(this).parent().attr('banner_order')]['banner_anchor'];
						banner_url = my_banners[$(this).parent().attr('banner_order')]['banner_url'];
						banner_loop = my_banners[$(this).parent().attr('banner_order')]['banner_loop'];
						var html = $("<html></html>");
						html.append("<head><meta name='ad.size' content='width="+banner_width+",height="+banner_height+"'></head>");
						if (banner_url != '') {
							console.log(banner_url);
							html.append("<a href='"+banner_url+"'></a>");
							html.find('a').append(banner_area[$(this).parent().attr('banner_id')]);
						} else {
							html.append(banner_area[$(this).parent().attr('banner_id')]);
						}
						html.append("<style>.banner_background {background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M0FFNTQzRTU5ODRGMTFFMjhBRDVEODk3RjlCOUZGREIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6M0FFNTQzRTY5ODRGMTFFMjhBRDVEODk3RjlCOUZGREIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozQUU1NDNFMzk4NEYxMUUyOEFENUQ4OTdGOUI5RkZEQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDozQUU1NDNFNDk4NEYxMUUyOEFENUQ4OTdGOUI5RkZEQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PnjjAFIAAAAmSURBVHjaYvz//z8DEjh79iwyl4kBL6CpNAuaW4yNjQeL0wACDAApUAh6jNqwUwAAAABJRU5ErkJggg==);width:100%;height:100%;overflow: hidden;}html,body{margin:0;width:100%;height:100%;font-family:Roboto,Helvetica,Arial,sans-serif;font-weight:400;font-size:14px;color:#333;background-color:#f0f1f5;overflow:hidden;}.banner_area{width:300px;height:250px;position:relative;overflow:hidden;}.layer{position:absolute;top:0;left:0;width:100%;height:100%;transition:all.1scubic-bezier(.165,.84,.44,1),transform.15scubic-bezier(.165,.84,.44,1);transform:matrix(1,0,0,1,0,0);background-size:cover;background-repeat:no-repeat;background-position:50%50%;opacity:1;text-align:center;color:black;padding:5px;white-space:pre-wrap;word-wrap:break-word;line-height:1;letter-spacing:0px;font-family:ABeeZee;animation-fill-mode:forwards;animation-duration:1s;animation-delay:0s;animation-name:none;animation-timing-function:ease-out;}.layersvg{width:100%;height:100%;}@keyframes firstNone{0%{opacity:1}100%{opacity:1}}@keyframes firstFade{0%{opacity:0;}100%{opacity:1;}}@keyframes firstBasic{0%{opacity:0;}100%{opacity:1;}}@keyframes firstSlideright{0%{opacity:0;transform:translate(-30px,0px);}100%{opacity:1;transform:translate(0px,0px);}}@keyframes firstSlideleft{0%{opacity:0;transform:translate(30px,0px);}100%{opacity:1;transform:translate(0px,0px);}}@keyframes firstSlidedown{0%{opacity:0;transform:translate(0px,-30px);}100%{opacity:1;transform:translate(0px,0px);}}@keyframes firstSlideup{0%{opacity:0;transform:translate(0px,30px);}100%{opacity:1;transform:translate(0px,0px);}}@keyframes firstSoftblur{0%{filter:blur(3px);opacity:0;}100%{filter:blur(1px);opacity:1;}}@keyframes firstHardblur{0%{filter:blur(10px);opacity:0;}100%{filter:blur(1px);opacity:1;}}@keyframes firstScaleup{0%{transform:scale(1,0)translateY(100%);opacity:1;}100%{transform:scale(1,1)translateY(0);opacity:1;}}@keyframes firstScaledown{0%{transform:scale(1,0)translateY(-100%);opacity:1;}100%{transform:scale(1,1)translateY(0);opacity:1;}}@keyframes firstBlow{0%{transform:scale(0,0);opacity:1;}15%{transform:scale(1.3,1.3);opacity:1;}30%{transform:scale(.8,.8);opacity:1;}50%{transform:scale(1.1,1.1);opacity:1;}70%{transform:scale(.95,.95);opacity:1;}90%{transform:scale(1.05,1.05);opacity:1;}100%{transform:scale(1,1);opacity:1;}}@keyframes firstGlide{0%{transform:translateX(-100%);opacity:0;}70%{transform:translateX(10%);opacity:0.7;}100%{transform:translateX(0%);opacity:1;}}@keyframes firstElastic{0%{transform:translateY(40%);opacity:1;}20%{transform:translateY(-5%);opacity:1;}35%{transform:translateY(2%);opacity:1;}50%{transform:translateY(-1%);opacity:1;}70%{transform:translateY(2%);opacity:1;}90%{transform:translateY(-1%);opacity:1;}100%{transform:translateY(0%);opacity:1;}}@keyframes firstBounce{0%{transform:translateY(-40%);opacity:1;}30%{transform:translateY(0%);opacity:1;}35%{transform:translateY(-5%);opacity:1;}60%{transform:translateY(0%);opacity:1;}80%{transform:translateY(-2%);opacity:1;}100%{transform:translateY(0%);opacity:1;}}@keyframes firstGrow{0%{transform:scale(0,0);opacity:1;}100%{transform:scale(1,1);opacity:1;}}@keyframes firstRunright{0%{transform:rotate(-300deg)translateX(50%)translateY(0%);opacity:0;}70%{transform:rotate(30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}}@keyframes firstRunleft{0%{transform:rotate(300deg)translateX(-50%)translateY(0%);opacity:0;}70%{transform:rotate(-30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}}@keyframes firstRolldown{0%{transform:rotate(-300deg)translateX(0%)translateY(50%);opacity:0;}70%{transform:rotate(30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}}@keyframes firstRollup{0%{transform:rotate(300deg)translateX(0%)translateY(-50%);opacity:0;}70%{transform:rotate(-30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}}@keyframes firstZoom{0%{transform:scale(3,3);opacity:0;}100%{transform:scale(1,1);opacity:1;}}@keyframes firstFocus{0%{transform:scale(1.5,1.5);opacity:0;}100%{transform:scale(1,1);opacity:1;}}@keyframes firstFlipup{0%{transform:scaleY(0);opacity:0;}100%{transform:scaleY(1);opacity:1;}}@keyframes firstFlipdown{0%{transform:scaleY(0);opacity:0;}100%{transform:scaleY(1);opacity:1;}}@keyframes firstFlipright{0%{transform:scaleX(0);opacity:0;}100%{transform:scaleX(1);opacity:1;}}@keyframes firstFlipleft{0%{transform:scaleX(0);opacity:0;}100%{transform:scaleX(1);opacity:1;}}@keyframes firstReveal{0%{transform:skew(-7deg,-30deg);opacity:0;}100%{transform:skew(0deg,0deg);opacity:1;}}@keyframes firstRotatein{0%{transform:rotate(-30deg);opacity:0.5}100%{transform:rotate(0deg);opacity:1}}@keyframes firstRotateout{0%{transform:rotate(30deg);opacity:0.5}100%{transform:rotate(0deg);opacity:1}}@keyframes lastNone{0%{opacity:1;}99%{opacity:1;}100%{opacity:0;}}@keyframes lastFade{0%{opacity:1;}100%{opacity:0;}}@keyframes lastBasic{0%{opacity:1;}100%{opacity:0;}}@keyframes lastSlideright{0%{opacity:1;transform:translate(0px,0px);}100%{opacity:0;transform:translate(30px,0px);}}@keyframes lastSlideleft{0%{opacity:1;transform:translate(0px,0px);}100%{opacity:0;transform:translate(-30px,0px);}}@keyframes lastSlidedown{0%{opacity:1;transform:translate(0px,0px);}100%{opacity:0;transform:translate(0px,30px);}}@keyframes lastSlideup{0%{opacity:1;transform:translate(0px,0px);}100%{opacity:0;transform:translate(0px,-30px);}}@keyframes lastSoftblur{0%{filter:blur(1px);opacity:1;}100%{filter:blur(3px);opacity:0;}}@keyframes lastHardblur{0%{filter:blur(1px);opacity:1;}100%{filter:blur(10px);opacity:0;}}@keyframes lastScaleup{0%{transform:scale(1,1)translateY(0);opacity:1;}100%{transform:scale(1,0)translateY(100%);opacity:0;}}@keyframes lastScaledown{0%{transform:scale(1,1)translateY(0);opacity:1;}100%{transform:scale(1,0)translateY(-100%);opacity:0;}}@keyframes lastBlow{0%{transform:scale(1,1);opacity:1;}10%{transform:scale(1.05,1.05);opacity:1;}30%{transform:scale(.95,.95);opacity:1;}50%{transform:scale(1.1,1.1);opacity:1;}70%{transform:scale(.8,.8);opacity:1;}85%{transform:scale(1.3,1.3);opacity:1;}100%{transform:scale(0,0);opacity:0;}}@keyframes lastGlide{0%{transform:translateX(0%);opacity:1;}30%{transform:translateX(10%);opacity:0.7;}100%{transform:translateX(-100%);opacity:0;}}@keyframes lastElastic{0%{transform:translateY(0%);opacity:1;}10%{transform:translateY(-1%);opacity:1;}30%{transform:translateY(2%);opacity:1;}50%{transform:translateY(-1%);opacity:1;}65%{transform:translateY(2%);opacity:1;}80%{transform:translateY(-5%);opacity:1;}100%{transform:translateY(40%);opacity:0;}}@keyframes lastBounce{0%{transform:translateY(0%);opacity:1;}20%{transform:translateY(-2%);opacity:1;}40%{transform:translateY(0%);opacity:1;}65%{transform:translateY(-5%);opacity:1;}70%{transform:translateY(0%);opacity:1;}100%{transform:translateY(-40%);opacity:0;}}@keyframes lastGrow{0%{transform:scale(1,1);opacity:1;}100%{transform:scale(0,0);opacity:0;}}@keyframes lastRunright{0%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}30%{transform:rotate(30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(-300deg)translateX(50%)translateY(0%);opacity:0;}}@keyframes lastRunleft{0%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}30%{transform:rotate(-30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(300deg)translateX(-50%)translateY(0%);opacity:0;}}@keyframes lastRolldown{0%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}30%{transform:rotate(30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(-300deg)translateX(0%)translateY(50%);opacity:0;}}@keyframes lastRollup{0%{transform:rotate(0deg)translateX(0%)translateY(0%);opacity:1;}30%{transform:rotate(-30deg)translateX(0%)translateY(0%);opacity:1;}100%{transform:rotate(300deg)translateX(0%)translateY(-50%);opacity:0;}}@keyframes lastZoom{0%{transform:scale(1,1);opacity:1;}100%{transform:scale(3,3);opacity:0;}}@keyframes lastFocus{0%{transform:scale(1,1);opacity:1;}100%{transform:scale(1.5,1.5);opacity:0;}}@keyframes lastFlipup{0%{transform:scaleY(1);opacity:1;}100%{transform:scaleY(0);opacity:0;}}@keyframes lastFlipdown{0%{transform:scaleY(1);opacity:1;}100%{transform:scaleY(0);opacity:0;}}@keyframes lastFlipright{0%{transform:scaleX(1);opacity:1;}100%{transform:scaleX(0);opacity:0;}}@keyframes lastFlipleft{0%{transform:scaleX(1);opacity:1;}100%{transform:scaleX(0);opacity:0;}}@keyframes lastReveal{0%{transform:skew(0deg,0deg);opacity:1;}100%{transform:skew(-7deg,-30deg);opacity:0;}}@keyframes lastRotatein{0%{transform:rotate(0deg);opacity:1}100%{transform:rotate(-30deg);opacity:0}}@keyframes lastRotateout{0%{transform:rotate(0deg);opacity:1}100%{transform:rotate(30deg);opacity:0}}</style>");
						html.append("<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script type='text/javascript'>var googlefonts=['ABeeZee','Abel','Abhaya Libre','Abril Fatface','Aclonica','Acme','Actor','Adamina','Advent Pro','Aguafina Script','Akronim','Aladin','Aldrich','Alef','Alegreya','Alegreya SC','Alegreya Sans','Arbutus Slab','Archivo','Archivo Black','Archivo Narrow','Aref Ruqaa','Arima Madurai','Arimo','Arizonia','Armata','Arsenal','Artifika','Arvo','Arya','Asap','Asap Condensed','Asar','Asset','Assistant','Astloch','Asul','Athiti','Atma','Atomic Age','Aubrey','Audiowide','Autour One','Average','Average Sans','Averia Gruesa Libre','Averia Libre','Bad Script','Bahiana','Baloo','Baloo Bhai','Baloo Bhaijaan','Baloo Bhaina','Bowlby One SC','Brawler','Bree Serif','Bubblegum Sans','Bubbler One','Buenard','Bungee','Bungee Hairline','Bungee Inline','Bungee Outline','Bungee Shade','Butcherman','Butterfly Kids','Cabin','Cabin Condensed','Cabin Sketch','Caesar Dressing','Cagliostro','Cairo','Calligraffitti','Cambay','Cambo','Candal','Cantarell','Cantata One','Cantora One','Capriola','Cardo','Carme','Carrois Gothic','Carrois Gothic SC','Carter One','Cormorant Garamond','Cormorant Infant','Days One','Dekko','Delius','Delius Swash Caps','Delius Unicase','Della Respira','Denk One','Devonshire','Dhurjati','Didact Gothic','Diplomata','Diplomata SC','Do Hyeon','Dokdo','Domine','EB Garamond','Eagle Lake','East Sea Dokdo','Eater','Economica','Eczar','El Messiri','Electrolize','Elsie','Elsie Swash Caps','Emblema One','Emilys Candy','Encode Sans','Euphoria Script','Ewert','Exo','Exo 2','Expletus Sans','Fanwood Text','Farsan','Fascinate','Fascinate Inline','Gaegu','Gafata','Galada','Galdeano','Galindo','Gamja Flower','Gentium Basic','Gentium Book Basic','Geo','Geostar','Geostar Fill','Germania One','Gidugu','Gilda Display','Give You Glory','Glass Antiqua','Glegoo','Gloria Hallelujah','Goblin One','Gochi Hand','Gudea','Gugi','Gurajada','Habibi','Halant','Hammersmith One','Hanalei','Hanalei Fill','Handlee','Hanuman','Happy Monkey','Harmattan','Homenaje','IBM Plex Mono','IBM Plex Sans','IBM Plex Sans Condensed','IBM Plex Serif','IM Fell DW Pica','IM Fell DW Pica SC','IM Fell Double Pica','Italiana','Italianno','Itim','Jacques Francois','Jacques Francois Shadow','Jaldi','Jim Nightshade','Jockey One','Jolly Lodger','Jomhuria','Junge','Jura','Just Another Hand','Just Me Again Down Here','Kadwa','Kalam','Kameron','Kanit','Kantumruy','Karla','Karma','Katibeh','Kite One','Knewave','Kotta One','Koulen','Kranky','Kreon','Kristi','Krona One','Kumar One','Kumar One Outline','Kurale','La Belle Aurore','Laila','Lakki Reddy','Lalezar','Lora','Love Ya Like A Sister','Loved by the King','Lovers Quarrel','Luckiest Guy','Lusitana','Lustria','Macondo','Macondo Swash Caps','Mada','Magra','Monda','Monofett','Monoton','Monsieur La Doulaise','Montaga','Montez','Montserrat','Nanum Myeongjo','Nunito','Nunito Sans','Odor Mean Chey','Offside','Old Standard TT','Oldenburg','Oleo Script','Oleo Script Swash Caps','Open Sans','Oranienbaum','Orbitron','Oregano','Orienta','Original Surfer','Oswald','Over the Rainbow','Overlock','Overlock SC','Overpass','Overpass Mono','Ovo','Oxygen','Oxygen Mono','PT Mono','PT Sans','PT Sans Caption','PT Sans Narrow','PT Serif','PT Serif Caption','Pacifico','Padauk','Palanquin','Palanquin Dark','Pangolin','Paprika','Parisienne','Passero One','Passion One','Pathway Gothic One','Patrick Hand','Patrick Hand SC','Pattaya','Patua One','Pavanam','Paytone One','Peddana','Peralta','Permanent Marker','Petit Formal Script','Petrona','Philosopher','Piedra','Pinyon Script','Pirata One','Plaster','Play','Playball','Playfair Display','Playfair Display SC','Podkova','Poiret One','Poller One','Poly','Pompiere','Pontano Sans','Poor Story','Rosarivo','Rouge Script','Rozha One','Rubik','Rubik Mono One','Ruda','Rufina','Ruge Boogie','Ruluko','Rum Raisin','Ruslan Display','Russo One','Ruthie','Rye','Sacramento','Sahitya','Sail','Saira','Saira Condensed','Saira Extra Condensed','Saira Semi Condensed','Sofia','Song Myung','Sonsie One','Sorts Mill Goudy','Source Code Pro','Source Sans Pro','Source Serif Pro','Space Mono','Special Elite','Spectral','Spectral SC','Spicy Rice','Spinnaker','Spirax','Squada One','Sree Krushnadevaraya','Sriracha','Stalemate','Taviraj','Teko','Telex','Tenali Ramakrishna','Tenor Sans','Text Me One','The Girl Next Door','Tienne','Tillana','Timmana','Tinos','Titan One','Titillium Web','Trade Winds','Trirong','Trocchi','Trochut','Trykker','Tulpen One','Ubuntu','Ubuntu Condensed','Ubuntu Mono','Ultra','Uncial Antiqua','Underdog','Unica One','UnifrakturMaguntia','Unkempt','Unlock','Unna','VT323','Vampiro One','Varela','Varela Round','Vast Shadow','Vesper Libre','Vibur','Vidaloka','Viga','Voces','Volkhov','Vollkorn','Vollkorn SC','Voltaire','Waiting for the Sunrise','Wallpoet','Walter Turncoat','Warnes','Wellfleet','Wendy One','Wire One','Work Sans','Yanone Kaffeesatz','Yantramanav','Yatra One','Yellowtail','Yeon Sung','Yeseva One','Yesteryear','Yrsa','Zeyada','Zilla Slab','Zilla Slab Highlight'];$(document).ready(function(){console.log('jquery loaded');for(var i=0;i<googlefonts.length;i++){$('body').append(\"<link href='https://fonts.googleapis.com/css?family=\"+googlefonts[i]+\"' rel='stylesheet'>\")} animation();function animation(){var timerID=[];$('.layer').each(function(){$(this).css({'opacity':'0', 'animation-name':'first'+$(this).attr('animation_first_name'), 'animation-duration':$(this).attr('animation_first_duration')+'s', 'animation-delay':$(this).attr('animation_delay')+'s'});(setTimeout(last_animation.bind(null, $(this)), ($(this).attr('animation_duration')-$(this).attr('animation_last_duration')+Number($(this).attr('animation_delay')))*1000));});}setInterval(function(){$('.layer').css({'animation-name': 'None', 'animation-duration':'1s'});$('.layer').css('opacity', '1');animation();}, "+animation_duration+"*1000);function last_animation(data){data.css({'animation-name':'last'+data.attr('animation_last_name'), 'animation-duration':data.attr('animation_last_duration')+'s', 'animation-delay':'0s'});} console.log('end'); $('.layer').each(function(){if($(this).attr('action')=='GoToURL'){$(this).click(function(){location.href=$(this).attr('action_url')})}}); });</script>");
						/*var url = html.find('.banner_background').css('background-image').replace('url(\"', '').replace('\")', '');
						urls = [];
						if (url != 'none' && url != '') {
							urls['banner_background'] = url;
							urls['length'] = 1;
						}
						html.find('.layer').each(function() {
							url = $(this).css('background-image').replace('url(\"', '').replace('\")', '');
							if (url != 'none' && url != '') {
								var layer_class = $(this).attr('class').split(' ')[1];
								urls[layer_class] = url;
								urls['length'] = urls['length'] + 1;
							}
						})
						for (var key in urls) {
							convertImgToDataURLviaCanvas(urls[key], key, function(base64Img, selector) {
								urls.length--;
								html.find('.'+selector).css('background-image', "url("+base64Img+")");
								if (urls.length == 0) {
									document.getElementById('export_download').href = 'data:text/html;charset=UTF-8,'+encodeURIComponent(html[0].outerHTML);
									document.getElementById('export_download').download = 'download.html';
									document.getElementById('export_download').click();
								}
							})
						}*/
						var zip = new JSZip();
						zip.file('download.html', html[0].outerHTML);
						zip.generateAsync({type:"base64"}).then(function (base64) {
					        window.location = "data:application/zip;base64," + base64;
					    }, function (err) {
					        jQuery("#data_uri").text(err);
					    });
						break;
					case 'MP4':
						video = new Whammy.Video(25, 0.99);
						var export_panel = "<div class='Notifier__cont' style='height: 98px;'><span><div class='Notifier__notify' id='notification-0'><div class='Notify__container'><div class='Notify__header'><span class='Notify__headerIcon'><div class='Icon__iconComponent Icon__large Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><path d='M18.4952612,11.3166465 C19.3263055,10.5894827 19.1061002,10 17.9951185,10 L15,10 L15,3 L9, 3 L9,10 L6.0048815,10 C4.89761602,10 4.66831553,10.5847761 5.50473881,11.3166465 L11.2473794, 16.341457 C11.6630403,16.7051603 12.34375,16.6992188 12.7526206,16.341457 L18.4952612, 11.3166465 Z M5,19 L5,21 L19,21 L19,19 L5,19 Z'></path></g></svg></div></span><span class='Notify__headerTitle'>Preparing download</span><span class='Notify__closeIcon'><div class='IconButton__iconButton IconButton__whiteGrey IconButton__large'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__small Icon__block Icon__white'><svg viewBox='0 0 18 18'><polygon points='17.71 1.71 16.29 0.29 9 7.59 1.71 0.29 0.29 1.71 7.59 9 0.29 16.29 1.71 17.71 9 10.41 16.29 17.71 17.71 16.29 10.41 9 17.71 1.71'></polygon></svg></div></div></div></span></div><div class='Notify__body'><span><div class='NotifyMessage__message NotifyMessage__hasStatus'><div class='NotifyMessage__messageText'>MP4</div><div class='NotifyMessage__linkContainer'><a class='Link__link Link__blue Link__normal' download style='display:none;'>Download here</a><span>0%</span></div><div class='NotifyMessage__loaderContainer'><div class='NotifyMessage__loader' style='width: 0%;'></div></div></div></span></div></div></div></span></div>";
						$('#my_banner_container').append(export_panel);
						slides = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['banner_content']);
						if (my_banners[$(this).parent().attr('banner_order')]['slide_transition'] == '') {
							slide_transition = [];
						} else {
							slide_transition = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['slide_transition']);
						}
						slide_num = 0;
						sort_num = my_banners[$(this).parent().attr('banner_order')]['sort_num'];
						banner_background = my_banners[$(this).parent().attr('banner_order')]['banner_background'];
						banner_title = my_banners[$(this).parent().attr('banner_order')]['banner_title'];
						banner_width = my_banners[$(this).parent().attr('banner_order')]['banner_width'];
						banner_height = my_banners[$(this).parent().attr('banner_order')]['banner_height'];
						banner_anchor = my_banners[$(this).parent().attr('banner_order')]['banner_anchor'];
						banner_url = my_banners[$(this).parent().attr('banner_order')]['banner_url'];
						banner_loop = my_banners[$(this).parent().attr('banner_order')]['banner_loop'];

						$('#export_banner_process').html("<div class='banner_area' style='width:"+banner_width+"px; height:"+banner_height+"px;'><div class='banner_background'></div></div>");
						$('#export_banner_process .banner_background').css('background', banner_background);
						var whole_time = 0;
						for (var i = 0; i < slides.length; i++) {
							whole_time += Number(slides[i][0])*1000;
						}
						get_frame(0);
						function get_frame(slide) {
							$('#export_banner_process .layer').remove();
							for (var i = 1; i < slides[slide].length; i++) {
								$('#export_banner_process .banner_area').append(slides[slide][i]);
							}
							layers = [];
							$('#export_banner_process .layer').each(function() {
								$(this).css({'transition':'none', 'opacity':0});
								layers.push($(this));
							})
							time = 0;
							export_banner_mp4();
							function export_banner_mp4() {
								draw_preview(40);
								html2canvas(document.querySelector('#export_banner_process .banner_area')).then(function(canvas) {
						            video.add(canvas.getContext('2d'));
									if (time > slides[slide][0]*1000) {
										slide = Number(slide) + 1;
										if (slide < slides.length) {
											console.log(slide)
											get_frame(slide);
										} else {
											console.log('end');
											$('.NotifyMessage__loader').css('width', '99%');
											$('#export_banner_process').empty();
											$('.NotifyMessage__linkContainer >a').css('display', 'block');
											$('.NotifyMessage__linkContainer >span').css('display', 'none');
											/*
											document.getElementById('export_download').href = webkitURL.createObjectURL(video.compile());
											document.getElementById('export_download').download = 'download.mp4';
											$('.NotifyMessage__linkContainer >a').click(function() {
												document.getElementById('export_download').click();
												$('.Notifier__cont').remove();
											})*/

											return;
										}
									}
									var process_time = 0;
									for (var i = 0; i < slide; i++) process_time += Number(slides[i][0])*1000;
									process_time += time;
									var process_percent = Math.round(process_time/whole_time*100) + '%';
									$('.NotifyMessage__loader').css('width', process_percent);
									$('.NotifyMessage__linkContainer >span').html(process_percent);
									export_banner_mp4();
								})
							}
						}
						break;
					case 'ANIMATED GIF':
						var export_panel = "<div class='Notifier__cont' style='height: 98px;'><span><div class='Notifier__notify' id='notification-0'><div class='Notify__container'><div class='Notify__header'><span class='Notify__headerIcon'><div class='Icon__iconComponent Icon__large Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><path d='M18.4952612,11.3166465 C19.3263055,10.5894827 19.1061002,10 17.9951185,10 L15,10 L15,3 L9, 3 L9,10 L6.0048815,10 C4.89761602,10 4.66831553,10.5847761 5.50473881,11.3166465 L11.2473794, 16.341457 C11.6630403,16.7051603 12.34375,16.6992188 12.7526206,16.341457 L18.4952612, 11.3166465 Z M5,19 L5,21 L19,21 L19,19 L5,19 Z'></path></g></svg></div></span><span class='Notify__headerTitle'>Preparing download</span><span class='Notify__closeIcon'><div class='IconButton__iconButton IconButton__whiteGrey IconButton__large'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__small Icon__block Icon__white'><svg viewBox='0 0 18 18'><polygon points='17.71 1.71 16.29 0.29 9 7.59 1.71 0.29 0.29 1.71 7.59 9 0.29 16.29 1.71 17.71 9 10.41 16.29 17.71 17.71 16.29 10.41 9 17.71 1.71'></polygon></svg></div></div></div></span></div><div class='Notify__body'><span><div class='NotifyMessage__message NotifyMessage__hasStatus'><div class='NotifyMessage__messageText'>GIF</div><div class='NotifyMessage__linkContainer'><a class='Link__link Link__blue Link__normal' download style='display:none;'>Download here</a><span>0%</span></div><div class='NotifyMessage__loaderContainer'><div class='NotifyMessage__loader' style='width: 0%;'></div></div></div></span></div></div></div></span></div>";
						$('#my_banner_container').append(export_panel);
						slides = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['banner_content']);
						if (my_banners[$(this).parent().attr('banner_order')]['slide_transition'] == '') {
							slide_transition = [];
						} else {
							slide_transition = JSON.parse(my_banners[$(this).parent().attr('banner_order')]['slide_transition']);
						}
						slide_num = 0;
						sort_num = my_banners[$(this).parent().attr('banner_order')]['sort_num'];
						banner_background = my_banners[$(this).parent().attr('banner_order')]['banner_background'];
						banner_title = my_banners[$(this).parent().attr('banner_order')]['banner_title'];
						banner_width = my_banners[$(this).parent().attr('banner_order')]['banner_width'];
						banner_height = my_banners[$(this).parent().attr('banner_order')]['banner_height'];
						banner_anchor = my_banners[$(this).parent().attr('banner_order')]['banner_anchor'];
						banner_url = my_banners[$(this).parent().attr('banner_order')]['banner_url'];
						banner_loop = my_banners[$(this).parent().attr('banner_order')]['banner_loop'];

						$('#export_banner_process').html("<div class='banner_area' style='width:"+banner_width+"px; height:"+banner_height+"px;'><div class='banner_background'></div></div>");
						$('#export_banner_process .banner_background').css('background', banner_background);
						var whole_time = 0;
						for (var i = 0; i < slides.length; i++) {
							whole_time += Number(slides[i][0])*1000;
						}
						var images = [];
						get_frame_gif(0);
						function get_frame_gif(slide) {
							$('#export_banner_process .layer').remove();
							for (var i = 1; i < slides[slide].length; i++) {
								$('#export_banner_process .banner_area').append(slides[slide][i]);
							}
							layers = [];
							$('#export_banner_process .layer').each(function() {
								$(this).css({'transition':'none', 'opacity':0});
								layers.push($(this));
							})
							time = 0;
							setTimeout(function() { export_banner_gif(); }, 1);
							function export_banner_gif() {
								draw_preview(90);
								html2canvas(document.querySelector('#export_banner_process .banner_area')).then(function(canvas) {
									if (time > animation_duration*1000) {
										slide = Number(slide) + 1;
										if (slide < slides.length) {
											console.log(slide)
											get_frame_gif(slide);
										} else {
											console.log('end');
											$('.NotifyMessage__loader').css('width', '99%');
											gifshot.createGIF({
												'images': images,
												'gifWidth': banner_width,
												'gifHeight': banner_height,
												'numFrames': 10,
												'frameDuration': 1
											},function(obj) {
												if(!obj.error) {
													$('.NotifyMessage__linkContainer >a').css('display', 'block');
													$('.NotifyMessage__linkContainer >span').css('display', 'none');
													$('#test_image').attr('src', obj.image);
													document.getElementById('export_download').href = obj.image;
													document.getElementById('export_download').download = 'download.gif';
													$('.NotifyMessage__linkContainer >a').click(function() {
														document.getElementById('export_download').click();
														$('.Notifier__cont').remove();
													})
												}
												$('#export_banner_process').empty();
											});
											return;
										}
									}
									images.push(canvas.toDataURL('image/png'));
									var process_time = 0;
									for (var i = 0; i < slide; i++) process_time += Number(slides[i][0])*1000;
									process_time += time;
									var process_percent = Math.round(process_time/whole_time*100) + '%';
									$('.NotifyMessage__loader').css('width', process_percent);
									$('.NotifyMessage__linkContainer >span').html(process_percent);
									export_banner_gif();
								})
							}
						}
						break;
				}
			})
		} else {

			var str = "<div class='BannerList__bannerListContent'><div class='BannerList__bannerList'><div style='position: relative; overflow: hidden; width: 100%; height: 100%;'><div style='position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: scroll; margin-right: -17px; margin-bottom: -17px;'><div class='BannerList__containerBanners'><div class='BannerList__noItemsContainer'><div class='BannerList__topRow'><div class='BannerList__noItemsIcon'><svg width='340px' height='280px' viewBox='0 0 340 280'><defs></defs><g id='Symbols' stroke-width='1' fill-rule='evenodd' opacity='0.5'><g id='Empty---Create-new'><g id='Group-2' transform='translate(6.000000, 43.000000)'><path d='M0,23.0022179 C0,20.2402757 2.24025549,18 5.00079916,18 L70.9992008,18 C73.7621745,18 76,20.2351255 76,23.0022179 L76,173.997782 C76,176.759724 73.7597445,179 70.9992008,179 L5.00079916,179 C2.23782554,179 0,176.764875 0,173.997782 L0,23.0022179 Z M3,23.0022179 L3,173.997782 C3,175.109125 3.8957883,176 5.00079916,176 L70.9992008,176 C72.1021838,176 73,175.103576 73,173.997782 L73,23.0022179 C73,21.8908746 72.1042117,21 70.9992008,21 L5.00079916,21 C3.89781616,21 3,21.8964235 3,23.0022179 Z' id='Combined-Shape' fill='#B9BCC7'></path><path d='M252,23.0022179 C252,20.2402757 254.240255,18 257.000799,18 L322.999201,18 C325.762174,18 328,20.2351255 328,23.0022179 L328,173.997782 C328,176.759724 325.759745,179 322.999201,179 L257.000799,179 C254.237826,179 252,176.764875 252,173.997782 L252,23.0022179 Z M255,23.0022179 L255,173.997782 C255,175.109125 255.895788,176 257.000799,176 L322.999201,176 C324.102184,176 325,175.103576 325,173.997782 L325,23.0022179 C325,21.8908746 324.104212,21 322.999201,21 L257.000799,21 C255.897816,21 255,21.8964235 255,23.0022179 Z' id='Combined-Shape' fill='#B9BCC7'></path><rect id='Rectangle-23' fill='#F5F6FA' x='54' y='20' width='220' height='173'></rect><path d='M54,5.00523183 L54,190.994768 C54,192.110609 54.8968333,193 56.0031332,193 L271.996867,193 C273.113596,193 274,192.102227 274,190.994768 L274,5.00523183 C274,3.8893908 273.103167,3 271.996867,3 L56.0031332,3 C54.8864042,3 54,3.89777287 54,5.00523183 Z M51,5.00523183 C51,2.24041461 53.2300211,0 56.0031332,0 L271.996867,0 C274.761684,0 277,2.23419156 277,5.00523183 L277,190.994768 C277,193.759585 274.769979,196 271.996867,196 L56.0031332,196 C53.2383161,196 51,193.765808 51,190.994768 L51,5.00523183 Z' id='Rectangle-22' fill='#8F94A5'></path><rect id='Rectangle-22' fill='#DFE0E6' x='54' y='3' width='220' height='18' rx='2'></rect><polygon id='Rectangle-22' fill='#8F94A5' points='54 21 274 21 274 18 54 18'></polygon><path d='M13,125 L41,125 L41,31 L13,31 L13,125 Z M10,29.9975379 C10,28.8943282 10.8919411,28 11.9999204,28 L42.0000796,28 C43.1046051,28 44,28.8950515 44,29.9975379 L44,126.002462 C44,127.105672 43.1080589,128 42.0000796,128 L11.9999204,128 C10.8953949,128 10,127.104949 10,126.002462 L10,29.9975379 Z' id='Rectangle' fill='#B9BCC7'></path><path d='M13,138 L13,166 L41,166 L41,138 L13,138 Z M10,136.99992 C10,135.895395 10.8919411,135 11.9999204,135 L42.0000796,135 C43.1046051,135 44,135.891941 44,136.99992 L44,167.00008 C44,168.104605 43.1080589,169 42.0000796,169 L11.9999204,169 C10.8953949,169 10,168.108059 10,167.00008 L10,136.99992 Z' id='Rectangle' fill='#B9BCC7'></path><rect id='Rectangle-10-Copy-6' fill='#B9BCC7' x='17' y='52' width='12' height='3'></rect><rect id='Rectangle-10-Copy-5' fill='#B9BCC7' x='17' y='36' width='20' height='3'></rect><rect id='Rectangle-10-Copy-5' fill='#B9BCC7' x='17' y='44' width='20' height='3'></rect><path d='M21,145 L34,145 L34,148 L21,148 L21,145 Z M29,148 L29,159 L26,159 L26,148 L29,148 Z' id='Combined-Shape' fill='#B9BCC7'></path><path d='M287,165 L315,165 L315,121 L287,121 L287,165 Z M284,119.990914 C284,118.891363 284.891941,118 285.99992,118 L316.00008,118 C317.104605,118 318,118.889064 318,119.990914 L318,166.009086 C318,167.108637 317.108059,168 316.00008,168 L285.99992,168 C284.895395,168 284,167.110936 284,166.009086 L284,119.990914 Z' id='Rectangle' fill='#B9BCC7'></path><path d='M287,110 L315,110 L315,84 L287,84 L287,110 Z M284,83.0017433 C284,81.896211 284.891941,81 285.99992,81 L316.00008,81 C317.104605,81 318,81.8892617 318,83.0017433 L318,110.998257 C318,112.103789 317.108059,113 316.00008,113 L285.99992,113 C284.895395,113 284,112.110738 284,110.998257 L284,83.0017433 Z' id='Rectangle' fill='#B9BCC7'></path><rect id='Rectangle-10-Copy-6' fill='#B9BCC7' x='291' y='132' width='13' height='3'></rect><rect id='Rectangle-10-Copy-5' fill='#B9BCC7' x='291' y='125' width='20' height='3'></rect><path d='M287,31 L287,73 L315,73 L315,31 L287,31 Z M284,30.0013893 C284,28.8960525 284.891941,28 285.99992,28 L316.00008,28 C317.104605,28 318,28.8949384 318,30.0013893 L318,73.9986107 C318,75.1039475 317.108059,76 316.00008,76 L285.99992,76 C284.895395,76 284,75.1050616 284,73.9986107 L284,30.0013893 Z' id='Rectangle' fill='#B9BCC7'></path><rect id='Rectangle-10-Copy-9' fill='#B9BCC7' x='291' y='41' width='20' height='3'></rect><rect id='Rectangle-10-Copy-8' fill='#B9BCC7' x='291' y='35' width='20' height='3'></rect><circle id='Oval-3' fill='#8F94A5' cx='70.5' cy='10.5' r='2.5'></circle><circle id='Oval-3' fill='#8F94A5' cx='79.5' cy='10.5' r='2.5'></circle><circle id='Oval-3' fill='#8F94A5' cx='61.5' cy='10.5' r='2.5'></circle><rect id='Rectangle-15-Copy-2' fill-opacity='0.5' fill='#B9BCC7' x='291' y='151' width='20' height='10' rx='1'></rect><rect id='Rectangle-15' fill-opacity='0.5' fill='#B9BCC7' x='291' y='88' width='20' height='18' rx='1'></rect><rect id='Rectangle-15-Copy' fill-opacity='0.5' fill='#B9BCC7' x='291' y='49' width='20' height='20' rx='1'></rect><rect id='Rectangle-15-Copy-3' fill-opacity='0.2' fill='#B9BCC7' x='18' y='79' width='18' height='41' rx='1'></rect><rect id='Rectangle-24' fill-opacity='0.5' fill='#DFE0E6' x='70' y='36' width='188' height='140' rx='2'></rect><polygon id='Combined-Shape' fill='#8F94A5' points='139 102 139 106 162 106 162 130 166 130 166 106 189 106 190 106 190 102 166 102 166 79 162 79 162 102'></polygon></g></g></g></svg></div><div class='BannerList__noItemsHeading'><span class='BaseLabel__baseLabel BaseLabel__xlarge BaseLabel__darkGrey'>Hey there,</span></div><div class='BannerList__noItemsMessage'><span class='BaseLabel__baseLabel BaseLabel__lmedium BaseLabel__lightGrey'>Looks like you have no banners created yet. Let's change this!</span></div><div class='BannerList__button'><button id='make_banner' class='Button__defaultButton Button__large Button__blue'>Make a banner</button></div></div><div class='BannerList__row'><div><span class='BaseLabel__baseLabel BaseLabel__medium BaseLabel__lightGrey'>Saved banners will also show up here later on.</span></div></div></div></div></div><div style='position: absolute; height: 6px; transition: opacity 600ms; opacity: 0;'><div class='ScrollArea__thumb ScrollArea__stageGrey' style='position: relative; display: block; height: 100%; width: 0px;'></div></div><div class='ScrollArea__track ScrollArea__trackVertical normal ScrollArea__stageGrey' style='position: absolute; width: 6px; transition: opacity 600ms; opacity: 0;'><div class='ScrollArea__thumb ScrollArea__stageGrey' style='position: relative; display: block; width: 100%; height: 0px;'></div></div></div></div></div>";
			$('#my_banner_container').html(str);
			$('#make_banner').click(function() {
				initialize_create_new();
			})
		}
	})
}
function initialize_editor() {
	if (Number(banner_id) != 0) {
		$.get('editor/get_selected_banner/'+banner_id, function(data) {
			var banner = JSON.parse(data)[0];
			slides = JSON.parse(banner['banner_content']);
			if (banner['slide_transition'] == '') {
				slide_transition = [];
			} else {
				slide_transition = JSON.parse(banner['slide_transition']);
			}
			slide_num = 0;
			sort_num = banner['sort_num'];
			banner_background = banner['banner_background'];
			banner_title = banner['banner_title'];
			banner_width = banner['banner_width'];
			banner_height = banner['banner_height'];
			banner_anchor = banner['banner_anchor'];
			banner_url = banner['banner_url'];
			banner_loop = banner['banner_loop'];
			banner_cash_redo = [];
			banner_cash_undo = [];
			$('#btn_undo').addClass('IconButton__disabled');
			$('#btn_redo').addClass('IconButton__disabled');
			$('.input_banner_loop').val(banner_loop);
			populate_editor();
			setTimeout(function() {
				$('#canvas_area').scrollTop((Number(banner_height) + 700 - $('#canvas_area').height()) / 2);
				$('#canvas_area').scrollLeft(Math.abs(Number(banner_width) + 700 - $('#canvas_area').width()) / 2);
			}, 0)
		})
	} else {
		slide_num = 0;
		banner_cash_redo = [];
		banner_cash_undo = [];
		$('#btn_undo').addClass('IconButton__disabled');
		$('#btn_redo').addClass('IconButton__disabled');
		populate_editor();
		setTimeout(function() {
			$('#canvas_area').scrollTop((Number(banner_height) + 700 - $('#canvas_area').height()) / 2);
			$('#canvas_area').scrollLeft(Math.abs(Number(banner_width) + 700 - $('#canvas_area').width()) / 2);
		}, 0)
	}
}
function populate_editor() {
	$('#canvas_content >div').css({'width':banner_width+'px', 'height':banner_height+'px'});
	$("#bo_container").removeAttr('class');
	$("#bo_container").attr('class', '');
	$('#bo_container')[0].className = '';
	$('#bo_container').addClass('editor');
	$('.Slides__slidesList').empty();
	for (var i = 0; i < slides.length; i++) {
		var slide_preview = "<div class='banner_area' style='transform:scale("+134/Number(banner_width)+"); width:"+banner_width+"px; height:"+banner_height+"px'><div class='banner_background'></div>";
		for (var j = slides[i].length-1; j > 0; j--) {
			slide_preview += slides[i][j];
		}
		slide_preview += '</div>';
		var transition = "";
		if (slides.length > 1) {
			if (slide_transition[i] == undefined || slide_transition[i] == '') {
				transition += "<div class='Slide__transition'><div class='SlideTransition__transitionContainer'><div class='SlideTransition__addNewTransitionButton'>Add transition</div></div></div>";
			} else {
				transition += "<div class='Slide__transition'><div class='SlideTransition__transitionContainer'><div class='SlideTransition__addNewTransitionButton'>"+slide_transition[i]['name']+"</div></div><input class='input_transition_duration' maxlength='5' style='width:40px; height:28px; margin:0 5px;' value='"+slide_transition[i]['duration']+"'>s</div>";
			}
		}
		var slide_item = "<div class='Slides__slideItem' slide_num='"+i+"' style='pointer-events: all;'><div class='Slide__slideContainer'><div class='Slide__slide' style='height: 205px;'><div data-grab-slide='true'><div class='Slide__buttons' slide_num = '"+i+"'><div class='duplicate_slide IconButton__iconButton IconButton__black IconButton__large tool_tip_black' data-toggle='tooltip' data-placement='top' title='' data-original-title='Duplicate'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path fill='#FFF' fill-rule='evenodd' d='M28,18 L20,18 C18.9,18 18,18.9 18,20 L18,29 L20,29 L20,20 L28,20 L28,18 Z M32.1333333,22 L23.8666667,22 C22.84,22 22,22.7 22,23.5555556 L22,32.4444444 C22,33.3 22.84,34 23.8666667,34 L32.1333333,34 C33.16,34 34,33.3 34,32.4444444 L34,23.5555556 C34,22.7 33.16,22 32.1333333,22 Z M32,32 L24,32 L24,24 L32,24 L32,32 Z' transform='translate(-14 -14)'></path></svg></div></div></div>";
		if (slides.length > 1) slide_item += "<div class='delete_slide IconButton__iconButton IconButton__black IconButton__large tool_tip_black' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g style='stroke: none; stroke-width: 1; fill-rule: evenodd;'><g><path d='M10 4v1H6v2h1v10.997C7 19.103 7.9 20 9.001 20H14.999A2 2 0 0 0 17 18.003V7h1V5h-4V4h-4zM9 9.001h6V7H9v2.001zM9 18h6v-7H9v7z'></path></g></g></svg></div></div></div>";
		slide_item += "</div><div class='Slide__slidePreview'>"+slide_preview+"</div><div class='Slide__slideInfo'><span class='Slide__slideName' data-grab-slide='true'>"+(i+1)+"</span><div class='Slide__wrappingContainer'><div class='BaseLabel__editableLabel'><label class='slide_duration BaseLabel__editableLabel BaseLabel__bold BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>"+slides[i][0]+"</label><input id='editableLabel0.13008836901346732' type='text' class='TextInput__editableLabelInput TextInput__bold TextInput__small TextInput__right TextInput__blue' maxlength='4' value='' style='display: none; padding-top: 1px;'></div><span class='Slide__seconds'>s</span><div class='Slide__stopSlide tool_tip_black' data-toggle='tooltip' data-placement='left' title='' data-original-title='Stop slide'><div class='IconButton__iconButton blue IconButton__large'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24' height='24' viewBox='0 0 24 24'><g fill='none' fill-rule='evenodd'><rect class='stopSlideRectangle' width='18' height='18' x='3' y='3' fill='#F33246' rx='2'></rect><path class='stopSlideSquare' fill='#FFF' d='M8 8h8v8H8z'></path></g></svg></div></div></div></div></div></div></div><div class='Slide__resizeHandler' data-resize-handler='resize'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='more-svg' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M2,10 L6,10 L6,14 L2,14 L2,10 Z M10,10 L14,10 L14,14 L10,14 L10,10 Z M18,10 L22,10 L22,14 L18,14 L18,10 Z' id='Combined-Shape'></path></g></svg></div></div>"+transition+"</div></div>" ;
		$('.Slides__slidesList').append(slide_item);
	}
	var transitoin_activator = function() {
		$('.SlideTransition__transitionContainer').click(function() {
			var i = $(this).parent().parent().parent().attr('slide_num');
			$('#transition_tool').html("<div class='InspectorPanel__inspectorPanel' style='padding: 0px;'><div class='InspectorPanel__panelHeader' style='margin-left: 0px; margin-top: 0px; width: 100%;'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Slide transition</span></div><div class='InspectorTransitions__inspectorTransitions'><div class='InspectorTransitions__body InspectorTransitions__noMenu'><div class='InspectorTransitions__transitionTypesGroup'><div class='InspectorTransitions__crossSlide'><div class='InspectorTransitions__crossSlideLabel'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Type</span></div><div><div tabindex='0' data-allow-shortcuts='false' class='Select__selectComponent' style='width: 200px;'><select class='input_transition_method' transition_id='"+i+"'><option value='0'>Hide current slide</option><option value='1'>Show next slide</option><option value='2'>Cross slide transition</option></select></div></div></div><div class='InspectorTransitions__transitionTypes'><div class='InspectorTransitions__transitionTypesSelect'><div tabindex='0' data-allow-shortcuts='false' class='Select__selectComponent' style='width: 200px;'><select class='input_transition_name' transition_id='"+i+"'><option value='None'>None</option><option value='Alpha'>Alpha</option><option value='Blur'>Blur</option><option value='Slide'>Slide</option><option value='Scale'>Scale</option><option value='Roll'>Roll</option><option value='Zoom'>Zoom</option><option value='Rotate'>Rotate</option></select></div></div></div></div></div></div></div>");
			if (slide_transition[i] != undefined && slide_transition[i] != '') {
				$('.input_transition_method').val(slide_transition[i]['method']);
				$('.input_transition_name').val(slide_transition[i]['name']);
			} else {
				$('.InspectorTransitions__crossSlide').css('display', 'none');
			}
			$('.input_transition_name').change(function() {
				if ($(this).val() == 'None') {
					$('.InspectorTransitions__crossSlide').css('display', 'none');
					slide_transition[i] = '';
				} else {
					$('.InspectorTransitions__crossSlide').css('display', 'block');
					for (var j = 0; j <= i; j++) {
						if (slide_transition[j] == undefined) {
							slide_transition.push('');
						}
					}
					if (slide_transition[i] == '') {
						slide_transition[i] = {'name':$(this).val(), 'method':0, 'duration':1};
						$('.input_transition_method').val(0);
						$('.input_transition_duration').val(1);
					} else {
						slide_transition[i]['name'] = $(this).val();
					}
				}
				populate_editor();
			})
			$('.input_transition_method').change(function() {
				slide_transition[i]['method'] = $(this).val();
				populate_editor();
			})
		})
		$('.input_transition_duration').change(function() {
			var i = $(this).parent().parent().parent().attr('slide_num');
			slide_transition[i]['duration'] = $(this).val();
			populate_editor();
		})
	}
	transitoin_activator();
	$(".Slides__slideItem[slide_num="+slide_num+"]").find('.Slide__slide').addClass('Slide__selected');
	$('.Slide__slide').click(function() {
		slide_num = $(this).parent().parent().attr('slide_num');
		populate_editor();
	})
	$('.duplicate_slide').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		var ary = [];
		for (var i = 0; i < slides.length; i++) {
			if (i == $(this).parent().attr('slide_num')) {
				ary.push(slides[i]);
				var ary_slide = [slides[i][0]];
				for (var j = 1; j < slides[i].length; j++) {
					var layer = $(slides[i][j]).removeAttr('class');
					sort_num++;
					layer.attr({'class':'layer layer_'+sort_num, 'sort_num':sort_num});
					ary_slide.push(layer[0].outerHTML);
				}
				ary.push(ary_slide);
			} else {
				ary.push(slides[i]);
			}
		}
		slides = ary;
		slide_num = Number($(this).parent().attr('slide_num')) + 1;
		populate_editor();
	})
	$('.delete_slide').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_transition':slide_transition, 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		var ary = [];
		var ary_transition = [];
		for (var i = 0; i < slides.length; i++) {
			if (i != $(this).parent().attr('slide_num')) {
				ary.push(slides[i]);
				ary_transition.push(slide_transition[i]);
			}
		}
		slides = ary;
		slide_transition = ary_transition;
		if ($(this).parent().attr('slide_num') == 0) {
			slide_num = 0;
		} else {
			slide_num = $(this).parent().attr('slide_num') - 1;
		}
		populate_editor();
	})
	populate_layer();
}
function populate_layer() {
	//banner_width, banner_height
	$('#canvas_content >div').css({'width':banner_width+'px', 'height':banner_height+'px'});
	//unselect_layer
	$('.layer_hover').removeClass('selected');
	$('.Layer__layerComponent').removeClass('selected');
	$('.transition_wrapper').removeClass('selected');
	$('#select_tool_panel').empty();
	$('#select_tool_menu').empty();
	$('.amination_panel').empty();
	$('.layer_hover').removeClass('selected');

	$('.banner_background').css('background', banner_background);
	$('#canvas_content .layer').remove();
	$('#banner_hover').empty();
	$('.LayersList__sortableList').empty();
	$('.transition_container').empty();
	$('.transition_container').append("<div id='ruler_progress'></div>");
	for (var i = slides[slide_num].length-1; i > 0 ; i--) {
		$('#canvas_content .banner_area').append(slides[slide_num][i]);
		$('#banner_out_area').append(slides[slide_num][i]);
		var current_layer = $('#canvas_content .layer:last-child');
		var layer_name = current_layer.attr('class').split(' ')[1];
		var height = current_layer.css('height');
		var width = current_layer.css('width');
		var left = current_layer.css('left');
		var top = current_layer.css('top');
		$('#banner_hover').append("<div class='layer_hover' layer='"+layer_name+"'></div>");
		var layer_hover = $(".layer_hover:last-child");
		layer_hover.css({'width': width,'height': height,'left': left,'top': top, 'z-index': current_layer.css('z-index')});
		layer_hover.attr({'data-x': left, 'data-y': top})
		//timeline populate
		var layer_list_template = "<li class='Layer__layerComponent ' layer='" + layer_name + "' data-overlay='false'><div class='Layer__grabLayerIcon' id='grab-icon'><svg width='12px' height='12px' viewBox='0 0 12 12' id='grab-icon'><g stroke-width='1' fill-rule='evenodd' id='grab-icon'><path id='grab-icon' d='M0,1 L12,1 L12,3 L0,3 L0,1 Z M0,5 L12,5 L12,7 L0,7 L0,5 Z M0,9 L12,9 L12,11 L0,11 L0,9 Z'></path></g></svg></div><div class='Layer__layer'>";
		switch (current_layer.attr('layer_type')) {
			case 'image':
				layer_list_template = layer_list_template +"<div class='Layer__layerIcon'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Symbols' stroke='none' stroke-width='1' fill-rule='evenodd'><g id='Toolbar-Image-ON'><path d='M6,6 L1.99508929,6 C0.892622799,6 0,6.8932319 0,7.99508929 L0,22.0049107 C0,23.1073772 0.893231902,24 1.99508929,24 L16.0049107,24 C17.1073772,24 18,23.1067681 18,22.0049107 L18,12.9975446 L18,18 L16,18 L16,22 L2,22 L2,8 L6,8 L6,6 Z' id='Combined-Shape'></path><path d='M6,1.99508929 C6,0.893231902 6.8926228,0 7.99508929,0 L22.0049107,0 C23.1067681,0 24,0.892622799 24,1.99508929 L24,16.0049107 C24,17.1067681 23.1073772,18 22.0049107,18 L7.99508929,18 C6.8932319,18 6,17.1073772 6,16.0049107 L6,1.99508929 Z M8,2 L22,2 L22,16 L8,16 L8,2 Z' id='Combined-Shape'></path><polygon id='Fill-3' points='12 10 14 13 17 9 21 14 9 14'></polygon><circle id='Oval' cx='17.5' cy='5.5' r='1.5'></circle></g></g></svg></div>";
				break;
			case 'text':
				layer_list_template = layer_list_template +"<div class='Layer__layerIcon'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Symbols' stroke='none' stroke-width='1'><g id='Toolbar-Text-ON'><path d='M0,2 L0,4 L8,4 L8,22 L10,22 L10,4 L18,4 L18,2 L0,2 Z M24,11 L20,11 L18,11 L14,11 L14,13 L18,13 L18,22 L20,22 L20,13 L24,13 L24,11 Z' id='Combined-Shape'></path></g></g></svg></div>";
				layer_hover.text($(current_layer[0]).text());
				layer_hover.css({'line-height':current_layer.css('line-height'), 'font-size':current_layer.css('font-size'), 'font-weight':current_layer.css('font-weight'), 'font-style':current_layer.css('font-style'), 'letter-spacing':current_layer.css('letter-spacing'), 'text-align':current_layer.css('text-align')});
				layer_hover.attr('spellcheck', false);
				layer_hover.click(function(){$(this).attr({'contenteditable':'true'})})
				break;
			case 'button':
				layer_list_template = layer_list_template +"<div class='Layer__layerIcon'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Symbols' stroke='none' stroke-width='1'><g id='Toolbar-Text-ON'><path d='M0,2 L0,4 L8,4 L8,22 L10,22 L10,4 L18,4 L18,2 L0,2 Z M24,11 L20,11 L18,11 L14,11 L14,13 L18,13 L18,22 L20,22 L20,13 L24,13 L24,11 Z' id='Combined-Shape'></path></g></g></svg></div>";
				layer_hover.text($(current_layer[0]).text());
				layer_hover.attr('spellcheck', false);
				current_layer.css({'padding':'0 5px', 'word-wrap':'unset', 'overflow':'hidden', 'line-height':height});
				layer_hover.css({'padding':'0 5px', 'word-wrap':'unset', 'overflow':'hidden', 'height':current_layer.css('height'), 'line-height':current_layer.css('height'), 'letter-spacing':current_layer.css('letter-spacing'), 'font-size':current_layer.css('font-size'), 'text-align':current_layer.css('text-align'), 'font-weight':current_layer.css('font-weight'), 'font-style':current_layer.css('font-style'), 'font-family':current_layer.css('font-family')});
				layer_hover.click(function(){$(this).attr({'contenteditable':'true'})})
				break;
		}
		layer_list_template = layer_list_template +"<div class='Layer__layerName'><div class='BaseLabel__editableLabel'><label class='BaseLabel__editableLabel BaseLabel__medium left noSkin' style='display: inline-block;'>" + current_layer.attr('display_name') + "</label><input id='editableLabel0.14626162520853003' type='text' class='TextInput__editableLabelInput TextInput__medium left noSkin' maxlength='30' value='' style='display: none; padding-top: 1px;'></div></div></div><div class='Layer__visibilityIcon Layer__visible'><svg width='24px' height='24px' viewBox='0 0 24 24'><g fill-rule='nonzero'><path d='M12,7 C7,7 4,10.6666667 4,12.3333333 C4,14 7,17.6666667 12,17.6666667 C17,17.6666667 20,14 20,12.3333333 C20,10.6666667 17,7 12,7 Z M12,15.8888889 C10.0373333,15.8888889 8.44444444,14.296 8.44444444,12.3333333 C8.44444444,10.3706667 10.0373333,8.77777778 12,8.77777778 C13.9626667,8.77777778 15.5555556,10.3706667 15.5555556,12.3333333 C15.5555556,14.296 13.9626667,15.8888889 12,15.8888889 Z M12,10.5555556 C11.0162963,10.5555556 10.2222222,11.3496296 10.2222222,12.3333333 C10.2222222,13.317037 11.0162963,14.1111111 12,14.1111111 C12.9837037,14.1111111 13.7777778,13.317037 13.7777778,12.3333333 C13.7777778,11.3496296 12.9837037,10.5555556 12,10.5555556 Z'></path></g></svg></div><div class='Layer__borderSelected'></div></li>";
		$('.LayersList__sortableList').append(layer_list_template);
		var animation_first_name = current_layer.attr('animation_first_name')
		var animation_last_name = current_layer.attr('animation_last_name')
		var animation_first_duration = current_layer.attr('animation_first_duration')
		var animation_last_duration = current_layer.attr('animation_last_duration')
		var animation_duration = current_layer.attr('animation_duration')
		var animation_delay = current_layer.attr('animation_delay')
		var transition = "<div class='transition_wrapper' layer='"+layer_name+"'><div class='transition_transition'><div class='first_transition' animation_name='"+animation_first_name+"'><span>"+animation_first_name+"</span></div><div class='last_transition' animation_name='"+animation_last_name+"'><span>"+animation_last_name+"<span></div></div></div>"
		$('.transition_container').append(transition)
		var current_transition = $(".transition_wrapper[layer="+layer_name+"] >.transition_transition");
		current_transition.css({'width':animation_duration*100+'px', 'transform':'translate('+animation_delay*100+'px, 0px)'});
		current_transition.attr({'data-x':animation_delay*100})
		current_transition.find('.first_transition').css({'width':animation_first_duration*100+'px'})
		current_transition.find('.last_transition').css({'width':animation_last_duration*100+'px'})
	}
	$('.Ruler__bannerDuration').css('width', slides[slide_num][0] * 100 + 'px');
	layer_activator();
	layer_list_activator();
}
function configure_app() {
	$('body').click(function() { $('.SaveButton__dropdown').css('display', 'none'); })
	$('.SaveButton__arrowContainer.SaveButton__green').click(function() {
		setTimeout(function() {
			$('.SaveButton__dropdown').css('display', 'block');
		},0)
	})
	$('#banner_rename_btn').click(function() {
		$.post('editor/rename_banner', {
			'banner_id':$('.input_banner_id').val(),
			'banner_title':$('.input_banner_title').val()
		}, function(data) {
			$('.cancel_btn').click();
			initialize_my_banners();
		})
	})
	$('#delete_banner_btn').click(function() {
		$.post('editor/delete_banner', {'banner_id':$(this).attr('banner_id')}, function(data) {
			$('.cancel_btn').click();
			initialize_my_banners();
		})
	})
	$('.MyImages__dropzone').click(function() {
		$('#image_file').click();
	})
	$('.StageMenu__addFileButton').click(function() {
		$('#image_file').click();
	})
	$('#image_file').change(function() {
		$.ajax({
			url:'editor/do_upload',
			type:"post",
			data:new FormData($('#upload_form')[0]),
			processData:false,
			contentType:false,
			cache:false,
			async:false,
			success: function(data) {
				if (data != 'failed') {
				  	var image_image = "<div class='image_item_container'><div class='image_setting_icon'><svg viewBox='0 0 18 18'><path d='M18,7.51l-2.29-.43a7.63,7.63,0,0,0-.82-1.51L16,3.66h0L14.31,2h0L12.39,3.11a9.15,9.15,0,0,0-1.74-.72L10,0.05V0H7.51L7.08,2.29a7.63,7.63,0,0,0-1.51.82L3.66,2h0L2,3.69H2L3.11,5.61A7.28,7.28,0,0,0,2.4,7.08l-2.34.43H0v2.93H0l2.28,0.43a7.68,7.68,0,0,0,.83,1.52L2,14.31H2L3.86,16H3.76l1.86-1.12a7,7,0,0,0,1.48.73L7.52,18v0h2.93l0.43-2.28a7.68,7.68,0,0,0,1.52-.83L14.31,16h0L16,14.14v0.1l-1.12-1.86a7,7,0,0,0,.74-1.53L18,10.43h0V7.51h0ZM9,13a4,4,0,1,1,4-4A4,4,0,0,1,9,13Z'></path><circle cx='9' cy='9' r='2'></circle></svg></div><img alt='presentation' src='"+data+"' class='ImageItem__image'><div class='image_info_icon'><svg viewBox='0 0 10.47 24'><path d='M20.07,27.85a2.14,2.14,0,0,1-1.36-.32,1.51,1.51,0,0,1-.39-1.2,6.5,6.5,0,0,1,.12-1c0.09-.45.18-0.86,0.28-1.22L20,19.63a7,7,0,0,0,.25-1.34c0-.48.07-0.82,0.07-1a2.93,2.93,0,0,0-1-2.28,4,4,0,0,0-2.76-.88,6.76,6.76,0,0,0-2.11.36c-0.74.24-1.52,0.53-2.34,0.86l-0.33,1.37,0.86-.29a3.59,3.59,0,0,1,1-.14,1.92,1.92,0,0,1,1.32.33,1.62,1.62,0,0,1,.35,1.19,5.68,5.68,0,0,1-.11,1.05c-0.07.37-.17,0.78-0.28,1.2L13.65,24.5c-0.11.47-.19,0.88-0.24,1.25a8.72,8.72,0,0,0-.07,1.09,2.88,2.88,0,0,0,1,2.26,4.06,4.06,0,0,0,2.81.9,6.11,6.11,0,0,0,2.06-.32c0.59-.21,1.38-0.51,2.38-0.9l0.33-1.37a5.8,5.8,0,0,1-.83.28A3.88,3.88,0,0,1,20.07,27.85ZM19.28,11.59a3,3,0,0,0,2.09-.82,2.62,2.62,0,0,0,.86-2,2.65,2.65,0,0,0-.86-2,3.09,3.09,0,0,0-4.18,0,2.66,2.66,0,0,0-.87,2,2.63,2.63,0,0,0,.87,2A3,3,0,0,0,19.28,11.59Z' transform='translate(-11.77 -6)'></path></svg></div></div>";
				  	$('.my_image_result').append(image_image);
				  	activate_my_image();
				}
           	}
        });
	})
	$('.input_banner_loop').change(function() {
		banner_loop = $(this).val();
	})
	document.querySelector('#canvas_scale').oninput = function() {
		$('#canvas_content').css('transform', 'scale('+(this.value/100)+')');
	}
	$('#canvas_scale_down').click(function() {
		var current_scale = $('#canvas_scale').val();
		if (current_scale < 40) {
			current_scale = 20;
		} else {
			current_scale -= 20;
		}
		$('#canvas_scale').val(current_scale);
		$('#canvas_content').css('transform', 'scale('+(current_scale/100)+')');
	})
	$('#canvas_scale_up').click(function() {
		var current_scale = $('#canvas_scale').val();
		if (current_scale > 180) {
			current_scale = 200;
		} else {
			current_scale = Number(current_scale) + 20;
		}
		$('#canvas_scale').val(current_scale);
		$('#canvas_content').css('transform', 'scale('+(current_scale/100)+')');
	})
	$('[data-toggle="tooltip"]').tooltip();
	var oAddClass = $.fn.addClass;
	$.fn.addClass = function () {
		for (var i in arguments) {
		    var arg = arguments[i];
		    if ( !! (arg && arg.constructor && arg.call && arg.apply)) {
		        arg();
		        delete arg;
		    }
		}
		return oAddClass.apply(this, arguments);
	}
	hide = true;
	$('body').on("click", function () {
	    if (hide) $('.bo-select-btn').parent().removeClass('bo-select-open');
	    hide = true;
	});
	$('body').on('click', '.bo-select-btn', function () {
	    var self = $(this).parent();
	    if (self.hasClass('bo-select-open')) {
	        $('.bo-select-btn').parent().removeClass('bo-select-open');
	        return false;
	    }
	    $('.bo-select-btn').parent().removeClass('bo-select-open');
	    self.toggleClass('bo-select-open');
	    hide = false;
	});
	$('.bo_toolbar_item_btn').click(function() {
		if ($('#editor_container').hasClass('hide_side_bar')) {
			$("#side_bar_container").removeAttr('class');
			$("#side_bar_container").attr('class', '');
			$('#side_bar_container')[0].className = '';
			$('#side_bar_container').addClass($(this).attr('data'));
			$('#editor_container').removeClass('hide_side_bar');
			return;
		}
		$("#side_bar_container").removeAttr('class');
		$("#side_bar_container").attr('class', '');
		$('#side_bar_container')[0].className = '';
		$('#side_bar_container').addClass($(this).attr('data'));
	})
	$('.tool_panel_close').click(function() {
		$('#editor_container').addClass('hide_side_bar');
	})

	//template nav tab (static/animated)
	$('.tabs_menu_static').click(function() {
		$('#templates_tabs_menu').removeClass('animated');
		$('#templates_tabs_menu').addClass('static');
	})
	$('.tabs_menu_animated').click(function() {
		$('#templates_tabs_menu').removeClass('static');
		$('#templates_tabs_menu').addClass('animated');
	})

	//template nav search select
	$('#templates_search_container .search_searchIcon').click(function() {
		$('#templates_search_container').removeClass('select');
		$('#templates_search_container').addClass('search');
	})
	$('#templates_search_container .select_icon').click(function() {
		$('#templates_search_container').removeClass('search');
		$('#templates_search_container').addClass('select');
	})

	//background nav tab (colors/gradients/textures/images)
	$('.tabs_menu_colors').click(function() {
		$("#background_panel").removeAttr('class');
		$("#background_panel").attr('class', '');
		$('#background_panel')[0].className = '';
		$('#background_panel').addClass('colors');
	})
	$('.tabs_menu_gradients').click(function() {
		$("#background_panel").removeAttr('class');
		$("#background_panel").attr('class', '');
		$('#background_panel')[0].className = '';
		$('#background_panel').addClass('gradients');
	})
	$('.tabs_menu_textures').click(function() {
		$("#background_panel").removeAttr('class');
		$("#background_panel").attr('class', '');
		$('#background_panel')[0].className = '';
		$('#background_panel').addClass('textures');
	})
	$('.tabs_menu_images').click(function() {
		$("#background_panel").removeAttr('class');
		$("#background_panel").attr('class', '');
		$('#background_panel')[0].className = '';
		$('#background_panel').addClass('images');
	})

	//background nav tab image (stockphotos/myimages)
	$('.tabs_menu_stockphotos').click(function() {
		$("#background_image_tab").removeAttr('class');
		$("#background_image_tab").attr('class', '');
		$('#background_image_tab')[0].className = '';
		$('#background_image_tab').addClass('stockphotos');
	})
	$('.tabs_menu_myimages').click(function() {
		$("#background_image_tab").removeAttr('class');
		$("#background_image_tab").attr('class', '');
		$('#background_image_tab')[0].className = '';
		$('#background_image_tab').addClass('myimages');
	})
	$('.tabs_menu_imagesettings').click(function() {
		$("#background_image_tab").removeAttr('class');
		$("#background_image_tab").attr('class', '');
		$('#background_image_tab')[0].className = '';
		$('#background_image_tab').addClass('imagesettings');
	})

	//photos nav tab (photo_stockphotos/photo_myimages)
	$('.tabs_menu_photo_stockphotos').click(function() {
		$("#photos_panel").removeAttr('class');
		$("#photos_panel").attr('class', '');
		$('#photos_panel')[0].className = '';
		$('#photos_panel').addClass('photo_stockphotos');
	})
	$('.tabs_menu_photo_myimages').click(function() {
		$("#photos_panel").removeAttr('class');
		$("#photos_panel").attr('class', '');
		$('#photos_panel')[0].className = '';
		$('#photos_panel').addClass('photo_myimages');
	})

	//canvas header
	$('.SlidesAndLayers__toggleButton').click(function() {
		$('#editor_container').toggleClass('hide_layer_slide');
	})
	$('.TabsMenuSwitch__tab.tab-layers').click(function() {
		$("#canvas_container").removeAttr('class');
		$("#canvas_container").attr('class', '');
		$('#canvas_container')[0].className = '';
		$('#canvas_container').addClass('tab_layer');
	})
	$('.TabsMenuSwitch__tab.tab-slides').click(function() {
		$("#canvas_container").removeAttr('class');
		$("#canvas_container").attr('class', '');
		$('#canvas_container')[0].className = '';
		$('#canvas_container').addClass('tab_slide');
	})
	$('.hide_timeline_toggle').click(function() {
		$('#canvas_container').toggleClass('tab_timeline');
	})
	//canvas area
	// target elements with the "draggable" class
	$('#canvas_area').click(function(e) {
		if (!$(e.target).hasClass('selected')) {
			$('.layer_hover').removeClass('selected');
			$('.Layer__layerComponent').removeClass('selected')
			$('.transition_wrapper').removeClass('selected')
			$('#select_tool_panel').empty();
			$('#select_tool_menu').empty();
			$('.amination_panel').empty();
			$('#transition_tool').empty();
		}
	})
	//ruler duration
	interact('.Ruler__bannerDuration').resizable({
		edges: { right: true },
		restrictEdges: { outer: 'parent' },
		restrictSize: { min: { width: 20, height: 49 } },
		inertia: true,
	}).on('resizestart', function(event) {
		event.preventDefault();
	}).on('resizemove', function (event) {
	    var target = event.target,
	        x = (parseFloat(target.getAttribute('data-x')) || 0);
	    target.style.width  = event.rect.width + 'px';
	    x += event.deltaRect.left;
	    target.setAttribute('data-x', x);
	    $('.Slides__slideItem[slide_num='+slide_num+'] .slide_duration').text(Math.round(event.rect.width / 10) / 10);
	    slides[slide_num][0] = Math.round(event.rect.width / 10) / 10;
	}).on('resizeend', function(event) {
		event.target.childNodes[0].textContent = event.target.getAttribute('animation_name');
	});
	//activate new slide
	$('.Slides__addNewSlide').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		slides.push(['3']);
		slide_num = slides.length - 1;
		populate_editor();
	})
	$('#btn_undo').click(function() {
		if (banner_cash_undo.length > 0) {
			var undo = banner_cash_undo.pop();
			switch (undo.type) {
				case 'slide':
					banner_cash_redo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
					$('#btn_redo').removeClass('IconButton__disabled');
					slides = JSON.parse(undo.slides);
					slide_num = undo.slide_num;
					populate_editor();
					break;
				case 'banner_size':
					banner_cash_redo.push({'type':'banner_size', 'banner_width':banner_width, 'banner_height':banner_height});
					$('#btn_redo').removeClass('IconButton__disabled');
					banner_width = undo.banner_width;
					banner_height = undo.banner_height;
					populate_editor();
					break;
				case 'background':
					banner_cash_redo.push({'type':'background', 'background':$('.banner_background').css('background')});
					$('#btn_redo').removeClass('IconButton__disabled');
					banner_background = undo.background;
					$('.banner_background').css('background', banner_background);
					break;
			}
			if (banner_cash_undo.length == 0) {
				$('#btn_undo').addClass('IconButton__disabled');
			}
		}
	})
	$('#btn_redo').click(function() {
		if (banner_cash_redo.length > 0) {
			var redo = banner_cash_redo.pop();
			switch (redo.type) {
				case 'slide':
					banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
					$('#btn_undo').removeClass('IconButton__disabled');
					slides = JSON.parse(redo.slides);
					slide_num = redo.slide_num;
					populate_editor();
					break;
				case 'banner_size':
					banner_cash_undo.push({'type':'banner_size', 'banner_width':banner_width, 'banner_height':banner_height});
					$('#btn_undo').removeClass('IconButton__disabled');
					banner_width = redo.banner_width;
					banner_height = redo.banner_height;
					populate_editor();
					break;
				case 'background':
					banner_cash_undo.push({'type':'background', 'background':$('.banner_background').css('background')});
					$('#btn_undo').removeClass('IconButton__disabled');
					banner_background = redo.background;
					$('.banner_background').css('background', banner_background);
					break;
			}
			if (banner_cash_redo.length == 0) {
				$('#btn_redo').addClass('IconButton__disabled');
			}
		}
	})
}
function activate_my_image() {
	var my_background_image = $(".background_image_myimages .my_image_result .image_item_container:last");
	var my_stock_image = $("#photo_myimages_content .my_image_result .image_item_container:last");
	my_background_image.find('img').click(function() {
		banner_cash_undo.push({'type':'background', 'background':$('.banner_background').css('background')});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		$('.banner_background').css({'background': "url('"+$(this).attr('src')+"')", 'background-size': '100%', 'background-position': '50% 50%'});
		banner_background = $('.banner_background').css('background');
	})
	my_stock_image.find('img').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		sort_num++;
		var image_layer = "<div class='layer layer_"+sort_num+"' sort_num='"+sort_num+"' display_name='image "+sort_num+"' layer_type='image' animation_first_name='None' animation_last_name='None' animation_duration='3' animation_first_duration='1' animation_last_duration='1' animation_delay='0' style='z-index:"+sort_num+";'></div>";
		$('#banner_out_area').append($(image_layer).css({'background':"url('"+$(this).attr('src')+"')", 'background-size':'100%', 'background-position':'50% 50%', 'width':$(this).css('width'), 'height':$(this).css('height')}));
		sort_slide();
		populate_layer();
		selectedLayer = $('.layer.layer_'+sort_num);
		select_layer();
	})
}
function left_tool_activator() {
	$.get('editor/get_my_images', function(data) {
		data = JSON.parse(data);
		for (var i = 0; i < data.length; i++) {
		  	var image_image = "<div class='image_item_container'><div class='image_setting_icon'><svg viewBox='0 0 18 18'><path d='M18,7.51l-2.29-.43a7.63,7.63,0,0,0-.82-1.51L16,3.66h0L14.31,2h0L12.39,3.11a9.15,9.15,0,0,0-1.74-.72L10,0.05V0H7.51L7.08,2.29a7.63,7.63,0,0,0-1.51.82L3.66,2h0L2,3.69H2L3.11,5.61A7.28,7.28,0,0,0,2.4,7.08l-2.34.43H0v2.93H0l2.28,0.43a7.68,7.68,0,0,0,.83,1.52L2,14.31H2L3.86,16H3.76l1.86-1.12a7,7,0,0,0,1.48.73L7.52,18v0h2.93l0.43-2.28a7.68,7.68,0,0,0,1.52-.83L14.31,16h0L16,14.14v0.1l-1.12-1.86a7,7,0,0,0,.74-1.53L18,10.43h0V7.51h0ZM9,13a4,4,0,1,1,4-4A4,4,0,0,1,9,13Z'></path><circle cx='9' cy='9' r='2'></circle></svg></div><img alt='presentation' src='"+data[i]['url']+"' class='ImageItem__image'><div class='image_info_icon'><svg viewBox='0 0 10.47 24'><path d='M20.07,27.85a2.14,2.14,0,0,1-1.36-.32,1.51,1.51,0,0,1-.39-1.2,6.5,6.5,0,0,1,.12-1c0.09-.45.18-0.86,0.28-1.22L20,19.63a7,7,0,0,0,.25-1.34c0-.48.07-0.82,0.07-1a2.93,2.93,0,0,0-1-2.28,4,4,0,0,0-2.76-.88,6.76,6.76,0,0,0-2.11.36c-0.74.24-1.52,0.53-2.34,0.86l-0.33,1.37,0.86-.29a3.59,3.59,0,0,1,1-.14,1.92,1.92,0,0,1,1.32.33,1.62,1.62,0,0,1,.35,1.19,5.68,5.68,0,0,1-.11,1.05c-0.07.37-.17,0.78-0.28,1.2L13.65,24.5c-0.11.47-.19,0.88-0.24,1.25a8.72,8.72,0,0,0-.07,1.09,2.88,2.88,0,0,0,1,2.26,4.06,4.06,0,0,0,2.81.9,6.11,6.11,0,0,0,2.06-.32c0.59-.21,1.38-0.51,2.38-0.9l0.33-1.37a5.8,5.8,0,0,1-.83.28A3.88,3.88,0,0,1,20.07,27.85ZM19.28,11.59a3,3,0,0,0,2.09-.82,2.62,2.62,0,0,0,.86-2,2.65,2.65,0,0,0-.86-2,3.09,3.09,0,0,0-4.18,0,2.66,2.66,0,0,0-.87,2,2.63,2.63,0,0,0,.87,2A3,3,0,0,0,19.28,11.59Z' transform='translate(-11.77 -6)'></path></svg></div></div>";
		  	$('.my_image_result').append(image_image);
		  	activate_my_image();
		}
	})
	$('.toggle_background').click(function() {
		$('.tool_background').removeClass('background_setting');
		$('.tool_background').addClass('background_panel');
	})
	$('#background_size_select').change(function() {
		var width = $(this).val().split('x')[0];
		var height = $(this).val().split('x')[1];
		$('#input_banner_width').val(width);
		$('#input_banner_height').val(height);
	})
	$('#input_banner_width').change(function() {
		$('#background_size_select').val($(this).val()+'x'+$('#input_banner_height').val());
	})
	$('#input_banner_height').change(function() {
		$('#background_size_select').val($('#input_banner_width').val()+'x'+$(this).val());
	})
	$('#apply_banner_size').click(function() {
		banner_cash_undo.push({'type':'banner_size', 'banner_width':banner_width, 'banner_height':banner_height});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		banner_width = $('#input_banner_width').val();
		banner_height = $('#input_banner_height').val();
		populate_editor();
	})
	$('.toggle_size').click(function() {
		$('.tool_background').removeClass('background_panel');
		$('.tool_background').addClass('background_setting');
	})
	$('.template.blank').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		slides = [['3']];
		slide_transition = [];
		sort_num = 1;
		slide_num = 0;
		banner_background = '';
		banner_title = '';
		populate_editor();
	})
	$('.color_template >div').click(function() {
		banner_cash_undo.push({'type':'background', 'background':$('.banner_background').css('background')});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		$('.banner_background').css({'background': $(this).css('background')});
		banner_background = $(this).css('background');
	})
	$('.color_template:first-child .color_picker').change(function() {
		banner_cash_undo.push({'type':'background', 'background':$('.banner_background').css('background')});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		$('.banner_background').css({'background': $(this).val()});
		banner_background = $(this).val();
	})
	$('.color_template:nth-child(2)').click(function() {
		banner_cash_undo.push({'type':'background', 'background':$('.banner_background').css('background')});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		$('.banner_background').css({'background': 'url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M0FFNTQzRTU5ODRGMTFFMjhBRDVEODk3RjlCOUZGREIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6M0FFNTQzRTY5ODRGMTFFMjhBRDVEODk3RjlCOUZGREIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozQUU1NDNFMzk4NEYxMUUyOEFENUQ4OTdGOUI5RkZEQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDozQUU1NDNFNDk4NEYxMUUyOEFENUQ4OTdGOUI5RkZEQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PnjjAFIAAAAmSURBVHjaYvz//z8DEjh79iwyl4kBL6CpNAuaW4yNjQeL0wACDAApUAh6jNqwUwAAAABJRU5ErkJggg==)'});
		banner_background = 'url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAIAAAACUFjqAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M0FFNTQzRTU5ODRGMTFFMjhBRDVEODk3RjlCOUZGREIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6M0FFNTQzRTY5ODRGMTFFMjhBRDVEODk3RjlCOUZGREIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozQUU1NDNFMzk4NEYxMUUyOEFENUQ4OTdGOUI5RkZEQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDozQUU1NDNFNDk4NEYxMUUyOEFENUQ4OTdGOUI5RkZEQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PnjjAFIAAAAmSURBVHjaYvz//z8DEjh79iwyl4kBL6CpNAuaW4yNjQeL0wACDAApUAh6jNqwUwAAAABJRU5ErkJggg==)';
	})
	$('.texture_template >img').click(function() {
		banner_cash_undo.push({'type':'background', 'background':$('.banner_background').css('background')});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		$('.banner_background').css({'background': 'url('+$(this).attr('src')+')', 'background-size': '50%', 'background-position': '50% 50%'});
		banner_background = $('.banner_background').css('background');
	})
	$('.background_image_result img').click(function() {
		banner_cash_undo.push({'type':'background', 'background':$('.banner_background').css('background')});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		$('.banner_background').css({'background': "url('"+$(this).attr('src')+"')", 'background-size': '100%', 'background-position': '50% 50%'});
		banner_background = $('.banner_background').css('background');
	})
	$('.stock_image_result img').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		sort_num++;
		var image_layer = "<div class='layer layer_"+sort_num+"' sort_num='"+sort_num+"' display_name='image "+sort_num+"' layer_type='image' animation_first_name='None' animation_last_name='None' animation_duration='3' animation_first_duration='1' animation_last_duration='1' animation_delay='0' style='z-index:"+sort_num+";'></div>";
		$('#banner_out_area').append($(image_layer).css({'background':"url('"+$(this).attr('src')+"')", 'background-size':'100%', 'background-position':'50% 50%', 'width':$(this).css('width'), 'height':$(this).css('height')}));
		sort_slide();
		populate_layer();
		selectedLayer = $('.layer.layer_'+sort_num);
		select_layer();
	})
	$('.side_tool_panel.text .TextList__textList >div').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		sort_num++;
		var text_layer = "<div class='layer layer_"+sort_num+"' sort_num='"+sort_num+"' display_name='text "+sort_num+"' layer_type='text' animation_first_name='None' animation_last_name='None' animation_duration='3' animation_first_duration='1' animation_last_duration='1' animation_delay='0' style='z-index:"+sort_num+";'></div>";
		$('#banner_out_area').append($(text_layer).text($(this).text()).css({'width':$(this).css('width'), 'height':$(this).css('height'), 'font-size':$(this).css('font-size'), 'font-weight':$(this).css('font-weight'), 'line-height':$(this).css('line-height')}));
		sort_slide();
		populate_layer();
		selectedLayer = $('.layer.layer_'+sort_num);
		select_layer();
	})
	$('.ClipartList__clipartList .ClipartItem__clipartItemContainer').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		sort_num++;
		var shape_layer = "<div class='layer layer_"+sort_num+"' sort_num='"+sort_num+"' display_name='shape "+sort_num+"' layer_type='shape' animation_first_name='None' animation_last_name='None' animation_duration='3' animation_first_duration='1' animation_last_duration='1' animation_delay='0' style='z-index:"+sort_num+";'></div>";
		shape_layer = $(shape_layer).append($(this).find('svg')[0].outerHTML);
		$('#banner_out_area').append(shape_layer.css({'width':$(this).css('width'), 'height':$(this).css('height')}));
		sort_slide();
		populate_layer();
		selectedLayer = $('.layer.layer_'+sort_num);
		select_layer();
	})
	$('.ShapeList__shapeList .ShapeItem__shapeItem').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		sort_num++;
		var shape_layer = "<div class='layer layer_"+sort_num+"' sort_num='"+sort_num+"' display_name='shape "+sort_num+"' layer_type='basic_shape' animation_first_name='None' animation_last_name='None' animation_duration='3' animation_first_duration='1' animation_last_duration='1' animation_delay='0' style='z-index:"+sort_num+";'></div>";
		$('#banner_out_area').append($(shape_layer).css({'width':$(this).css('width'), 'height':$(this).css('height'), 'border':$(this).css('border'), 'border-radius':$(this).css('border-radius'), 'background':$(this).css('background')}));
		sort_slide();
		populate_layer();
		selectedLayer = $('.layer.layer_'+sort_num);
		select_layer();
	})
	$('.Button__element.Button__button').click(function() {
		banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
		$('#btn_undo').removeClass('IconButton__disabled');
		banner_cash_redo = [];
		$('#btn_redo').addClass('IconButton__disabled');
		sort_num++;
		var button_layer = "<div class='layer layer_"+sort_num+"' sort_num='"+sort_num+"' display_name='button "+sort_num+"' layer_type='button' animation_first_name='None' animation_last_name='None' animation_duration='3' animation_first_duration='1' animation_last_duration='1' animation_delay='0' style='z-index:"+sort_num+";'></div>";
		$('#banner_out_area').append($(button_layer).css({'width':$(this).css('width'), 'height':$(this).css('height'), 'border-radius':$(this).css('border-radius'), 'background-color':$(this).css('background-color'), 'background-image':$(this).css('background-image'), 'height':$(this).css('height'), 'line-height':$(this).css('line-height'), 'border':$(this).css('border'), 'color':$(this).children().css('color'), 'font-family':$(this).children().css('font-family'), 'font-size':$(this).children().css('font-size'), 'font-weight':$(this).children().css('font-weight'), 'font-style':$(this).children().css('font-style'), 'letter-spacing':$(this).children().css('letter-spacing')}).text($(this).children().text()));
		sort_slide();
		populate_layer();
		selectedLayer = $('.layer.layer_'+sort_num);
		select_layer();
	})
	//background setting activator
	switch ($('.banner_background').css('background-size')) {
		case 'cover':
			$('.input_background_mode').val('scalecrop');
			$('.ImageSettings__alignTool').css('display', 'flex');
			$('.ImageSettings__tileSettings').css('display', 'none');
			break;
		case '100% 100%':
			$('.input_background_mode').val('exactfit');
			$('.ImageSettings__alignTool').css('display', 'none');
			$('.ImageSettings__tileSettings').css('display', 'none');
			break;
		case 'contain':
			$('.input_background_mode').val('maintainaspect');
			$('.ImageSettings__alignTool').css('display', 'flex');
			$('.ImageSettings__tileSettings').css('display', 'none');
			break;
		case 'auto':
			$('.input_background_mode').val('noscale');
			$('.ImageSettings__alignTool').css('display', 'flex');
			$('.ImageSettings__tileSettings').css('display', 'none');
			break;
		default:
			$('.input_background_mode').val('tile');
			$('.ImageSettings__tileSettings').css('display', 'block');
			$('.ImageSettings__alignTool').css('display', 'none');
			break;
	}
	$('.input_background_mode').change(function() {
		switch ($(this).val()) {
			case 'scalecrop':
				$('.banner_background').css({'background-repeat': 'no-repeat'});
				$('.banner_background').css({'background-size': 'cover'});
				$('.ImageSettings__alignTool').css('display', 'flex');
				$('.ImageSettings__tileSettings').css('display', 'none');
				break;
			case 'exactfit':
				$('.banner_background').css({'background-repeat': 'no-repeat'});
				$('.banner_background').css({'background-size': '100% 100%'});
				$('.ImageSettings__alignTool').css('display', 'none');
				$('.ImageSettings__tileSettings').css('display', 'none');
				break;
			case 'maintainaspect':
				$('.banner_background').css({'background-repeat': 'no-repeat'});
				$('.banner_background').css({'background-size': 'contain'});
				$('.ImageSettings__alignTool').css('display', 'flex');
				$('.ImageSettings__tileSettings').css('display', 'none');
				break;
			case 'noscale':
				$('.banner_background').css({'background-repeat': 'no-repeat'});
				$('.banner_background').css({'background-size': 'auto'});
				$('.ImageSettings__alignTool').css('display', 'flex');
				$('.ImageSettings__tileSettings').css('display', 'none');
				break;
			case 'tile':
				$('.banner_background').css({'background-repeat': 'repeat'});
				$('.banner_background').css({'background-size': '88.5px'});
				$('.ImageSettings__tileSettings').css('display', 'block');
				$('.ImageSettings__alignTool').css('display', 'none');
				break;
		}
		save_slides();
	});
	var backgroundAlginToolAtivator = function() {
		switch ($('.banner_background').css('background-position')) {
			case '0px 0px':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__topLeft').addClass('AlignTool__selected');
				break;
			case '50% 0px':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__centerTop').addClass('AlignTool__selected');
				break;
			case '100% 0px':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__topRight').addClass('AlignTool__selected');
				break;
			case '0px 50%':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__middleLeft').addClass('AlignTool__selected');
				break;
			case '50% 50%':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__center').addClass('AlignTool__selected');
				break;
			case '100% 50%':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__middleRight').addClass('AlignTool__selected');
				break;
			case '0px 100%':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__bottomLeft').addClass('AlignTool__selected');
				break;
			case '50% 100%':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__centerBottom').addClass('AlignTool__selected');
				break;
			case '100% 100%':
				$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
				$('.AlignTool__alignControl_background.AlignTool__bottomRight').addClass('AlignTool__selected');
				break;
			default:
				break;
		}
		$('.AlignTool__alignControl_background.AlignTool__topLeft').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '0px 0px'})
			save_slides();
		})
		$('.AlignTool__alignControl_background.AlignTool__centerTop').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '50% 0px'})
			save_slides();
			
		})
		$('.AlignTool__alignControl_background.AlignTool__topRight').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '100% 0px'})
			save_slides();
		})
		$('.AlignTool__alignControl_background.AlignTool__middleLeft').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '0px 50%'})
			save_slides();
		})
		$('.AlignTool__alignControl_background.AlignTool__center').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '50% 50%'})
			save_slides();
		})
		$('.AlignTool__alignControl_background.AlignTool__middleRight').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '100% 50%'})
			save_slides();
		})
		$('.AlignTool__alignControl_background.AlignTool__bottomLeft').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '0px 100%'})
			save_slides();
		})
		$('.AlignTool__alignControl_background.AlignTool__centerBottom').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '50% 100%'})
			save_slides();
		})
		$('.AlignTool__alignControl_background.AlignTool__bottomRight').click(function() {
			$('.AlignTool__alignControl_background').removeClass('AlignTool__selected');
			$(this).addClass('AlignTool__selected');
			$('.banner_background').css({'background-position': '100% 100%'})
			save_slides();
		})
	}
	var backgroundTileToolActivator = function() {
		document.querySelector('.input_background_tilezoom').oninput = function() {
			$('.label_background_tilezoom').text(this.value);
			$('.banner_background').css({'background-size': 177*this.value/100+'px'});
		}
		$('.input_background_tilezoom').change(function() { save_slides(); })
		document.querySelector('.input_background_offsetx').oninput = function() {
			$('.label_background_offsetx').text(this.value);
			var pos = $('.banner_background').css('background-position').split(" ");
			$('.banner_background').css({'background-position': this.value+'% '+pos[1]});
		}
		$('.input_background_offsetx').change(function() { save_slides(); })
		document.querySelector('.input_background_offsety').oninput = function() {
			$('.label_background_offsety').text(this.value);
			var pos = $('.banner_background').css('background-position').split(" ");
			$('.banner_background').css({'background-position': pos[0]+' '+this.value+'%'});
		}
		$('.input_background_offsety').change(function() { save_slides(); })
	}
	backgroundAlginToolAtivator();
	backgroundTileToolActivator();
}
function save_slides() {
	banner_cash_undo.push({'type':'slide', 'slides':JSON.stringify(slides), 'slide_num':slide_num});
	$('#btn_undo').removeClass('IconButton__disabled');
	banner_cash_redo = [];
	$('#btn_redo').addClass('IconButton__disabled');
	slides = [];
	$('.Slides__slideItem').each(function() {
		var slide = [];
		slide.push($(this).find('.slide_duration').text());
		$(this).find('.banner_area').find('.layer').each(function() {
			slide.push($(this)[0].outerHTML);
		})
		slides.push(slide);
	})
	banner_background = $('.banner_background').css('background');
}
function select_layer() {

	var image_tool = "<div class='InspectorPanel__inspectorPanel' style='width: 40px; position: absolute; padding: 0px; left: 30px; top: 90px; z-index: 10000;'><div class='InspectorBar__toolbarIcons select_tool_menu_item_image_color' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 2px 2px 0px 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='color-a' d='M17.505 12C16.704 12 16 11.302 16 10.501c0-.801.704-1.499 1.505-1.499.795 0 1.499.698 1.499 1.499 0 .801-.704 1.499-1.499 1.499m-3.004-3.999c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.801 0 1.499.697 1.499 1.499 0 .8-.698 1.499-1.499 1.499m-5.001 0c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.802 0 1.499.697 1.499 1.499 0 .8-.697 1.499-1.499 1.499M6.502 12c-.801 0-1.499-.698-1.499-1.499 0-.801.698-1.499 1.499-1.499.8 0 1.499.698 1.499 1.499 0 .801-.699 1.499-1.499 1.499M12 3c-5 0-9 3.999-9 9 0 5.001 4 9 9 9 .802 0 1.499-.698 1.499-1.499 0-.4-.097-.698-.4-1.001-.195-.298-.395-.095-.395-.495 0-.802.698-1.005 1.499-1.005H16c2.804 0 5-2.697 5-5.501C21 7.1 17.001 3 12 3'></path></defs><g fill-rule='evenodd'><mask id='color-b' fill='#fff'><use xlink:href='#color-a'></use></mask><g mask='url(#color-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_image_setting' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__medium'><svg viewBox='0 0 18 18'><path d='M18,7.51l-2.29-.43a7.63,7.63,0,0,0-.82-1.51L16,3.66h0L14.31,2h0L12.39,3.11a9.15,9.15,0,0,0-1.74-.72L10,0.05V0H7.51L7.08,2.29a7.63,7.63,0,0,0-1.51.82L3.66,2h0L2,3.69H2L3.11,5.61A7.28,7.28,0,0,0,2.4,7.08l-2.34.43H0v2.93H0l2.28,0.43a7.68,7.68,0,0,0,.83,1.52L2,14.31H2L3.86,16H3.76l1.86-1.12a7,7,0,0,0,1.48.73L7.52,18v0h2.93l0.43-2.28a7.68,7.68,0,0,0,1.52-.83L14.31,16h0L16,14.14v0.1l-1.12-1.86a7,7,0,0,0,.74-1.53L18,10.43h0V7.51h0ZM9,13a4,4,0,1,1,4-4A4,4,0,0,1,9,13Z'></path><circle cx='9' cy='9' r='2'></circle></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_image_layer' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='layers-a' d='M11.929 3l9.928 4.964-9.928 4.965L2 7.964 11.929 3zm7.928 7.964l2 1-9.928 4.965L2 11.964l2-1 7.929 3.965 7.928-3.965zm0 4l2 1-9.928 4.965L2 15.964l2-1 7.929 3.965 7.928-3.965z'></path></defs><g fill-rule='evenodd'><mask id='layers-b' fill='#fff'><use xlink:href='#layers-a'></use></mask><g mask='url(#layers-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_action' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='link-a' d='M3 12c.138-2.052 1.701-3.72 4-4h4V6H7c-3.48 0-6 2.688-6 6s2.52 6 6 6h4v-2H7c-2.299-.28-3.862-1.948-4-4zm5 1h8v-2H8v2zm9-7h-4v2h4c2.299.28 3.863 1.948 4 4-.137 2.052-1.701 3.72-4 4h-4v2h4c3.48 0 6-2.688 6-6s-2.52-6-6-6z'></path></defs><g fill-rule='evenodd'><mask id='link-b' fill='#fff'><use xlink:href='#link-a'></use></mask><g mask='url(#link-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_duplicate' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='dup-a' d='M7.992 3C6.892 3 6 3.888 6 5v2h-.999A2.003 2.003 0 0 0 3 9.006v9.988C3 20.102 3.897 21 5.006 21h9.989c1.108 0 2.006-.9 2.006-2.001V18h2C20.104 18 21 17.107 21 16.008V4.992C21 3.892 20.107 3 19.008 3H7.992zM8 5h11v11h-2V7h-9V5zM11 11v2h2v2h-2v2H9v-2H7v-2h2v-2h2zM5 9h10v10H5V9z'></path></defs><g fill-rule='evenodd'><mask id='dup-b' fill='#fff'><use xlink:href='#dup-a'></use></mask><g mask='url(#dup-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_delete' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px 0px 2px 2px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='del-a' d='M10 3v1H6v2h1v13.008A2 2 0 0 0 9.001 21h6.998C17.104 21 18 20.1 18 19.008V6h1V4h-4V3h-5zM9 8.001h7V7H9v1.001zM15 19h1v-9h-1v9zm-2.999 0h1v-9h-1v9zM9 19h1v-9H9v9z'></path></defs><g fill-rule='evenodd'><mask id='del-b' fill='#fff'><use xlink:href='#del-a'></use></mask><g mask='url(#del-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div></div>";
	var text_tool = "<div class='InspectorPanel__inspectorPanel' style='width: 40px; position: absolute; padding: 0px; left: 30px; top: 90px; z-index: 10000;'><div class='InspectorBar__toolbarIcons select_tool_menu_item_text_text' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 2px 2px 0px 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg viewBox='0 0 24 24'><defs><path id='text-i' d='M4 4v3h7v12h3V7h7V4z'></path></defs><g fill-rule='evenodd'><mask id='text-b' fill='#fff'><use xlink:href='#text-i'></use></mask><g mask='url(#text-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_text_color' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='color-a' d='M17.505 12C16.704 12 16 11.302 16 10.501c0-.801.704-1.499 1.505-1.499.795 0 1.499.698 1.499 1.499 0 .801-.704 1.499-1.499 1.499m-3.004-3.999c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.801 0 1.499.697 1.499 1.499 0 .8-.698 1.499-1.499 1.499m-5.001 0c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.802 0 1.499.697 1.499 1.499 0 .8-.697 1.499-1.499 1.499M6.502 12c-.801 0-1.499-.698-1.499-1.499 0-.801.698-1.499 1.499-1.499.8 0 1.499.698 1.499 1.499 0 .801-.699 1.499-1.499 1.499M12 3c-5 0-9 3.999-9 9 0 5.001 4 9 9 9 .802 0 1.499-.698 1.499-1.499 0-.4-.097-.698-.4-1.001-.195-.298-.395-.095-.395-.495 0-.802.698-1.005 1.499-1.005H16c2.804 0 5-2.697 5-5.501C21 7.1 17.001 3 12 3'></path></defs><g fill-rule='evenodd'><mask id='color-b' fill='#fff'><use xlink:href='#color-a'></use></mask><g mask='url(#color-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_text_layer' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='layers-a' d='M11.929 3l9.928 4.964-9.928 4.965L2 7.964 11.929 3zm7.928 7.964l2 1-9.928 4.965L2 11.964l2-1 7.929 3.965 7.928-3.965zm0 4l2 1-9.928 4.965L2 15.964l2-1 7.929 3.965 7.928-3.965z'></path></defs><g fill-rule='evenodd'><mask id='layers-b' fill='#fff'><use xlink:href='#layers-a'></use></mask><g mask='url(#layers-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_action' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='link-a' d='M3 12c.138-2.052 1.701-3.72 4-4h4V6H7c-3.48 0-6 2.688-6 6s2.52 6 6 6h4v-2H7c-2.299-.28-3.862-1.948-4-4zm5 1h8v-2H8v2zm9-7h-4v2h4c2.299.28 3.863 1.948 4 4-.137 2.052-1.701 3.72-4 4h-4v2h4c3.48 0 6-2.688 6-6s-2.52-6-6-6z'></path></defs><g fill-rule='evenodd'><mask id='link-b' fill='#fff'><use xlink:href='#link-a'></use></mask><g mask='url(#link-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_duplicate' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='dup-a' d='M7.992 3C6.892 3 6 3.888 6 5v2h-.999A2.003 2.003 0 0 0 3 9.006v9.988C3 20.102 3.897 21 5.006 21h9.989c1.108 0 2.006-.9 2.006-2.001V18h2C20.104 18 21 17.107 21 16.008V4.992C21 3.892 20.107 3 19.008 3H7.992zM8 5h11v11h-2V7h-9V5zM11 11v2h2v2h-2v2H9v-2H7v-2h2v-2h2zM5 9h10v10H5V9z'></path></defs><g fill-rule='evenodd'><mask id='dup-b' fill='#fff'><use xlink:href='#dup-a'></use></mask><g mask='url(#dup-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_delete' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px 0px 2px 2px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='del-a' d='M10 3v1H6v2h1v13.008A2 2 0 0 0 9.001 21h6.998C17.104 21 18 20.1 18 19.008V6h1V4h-4V3h-5zM9 8.001h7V7H9v1.001zM15 19h1v-9h-1v9zm-2.999 0h1v-9h-1v9zM9 19h1v-9H9v9z'></path></defs><g fill-rule='evenodd'><mask id='del-b' fill='#fff'><use xlink:href='#del-a'></use></mask><g mask='url(#del-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div></div>";
	var button_tool = "<div class='InspectorPanel__inspectorPanel' style='width: 40px; position: absolute; padding: 0px; left: 30px; top: 90px; z-index: 10000;'><div class='InspectorBar__toolbarIcons select_tool_menu_item_button_color' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 2px 2px 0px 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='color-a' d='M17.505 12C16.704 12 16 11.302 16 10.501c0-.801.704-1.499 1.505-1.499.795 0 1.499.698 1.499 1.499 0 .801-.704 1.499-1.499 1.499m-3.004-3.999c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.801 0 1.499.697 1.499 1.499 0 .8-.698 1.499-1.499 1.499m-5.001 0c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.802 0 1.499.697 1.499 1.499 0 .8-.697 1.499-1.499 1.499M6.502 12c-.801 0-1.499-.698-1.499-1.499 0-.801.698-1.499 1.499-1.499.8 0 1.499.698 1.499 1.499 0 .801-.699 1.499-1.499 1.499M12 3c-5 0-9 3.999-9 9 0 5.001 4 9 9 9 .802 0 1.499-.698 1.499-1.499 0-.4-.097-.698-.4-1.001-.195-.298-.395-.095-.395-.495 0-.802.698-1.005 1.499-1.005H16c2.804 0 5-2.697 5-5.501C21 7.1 17.001 3 12 3'></path></defs><g fill-rule='evenodd'><mask id='color-b' fill='#fff'><use xlink:href='#color-a'></use></mask><g mask='url(#color-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_button_text' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg viewBox='0 0 24 24'><defs><path id='text-i' d='M4 4v3h7v12h3V7h7V4z'></path></defs><g fill-rule='evenodd'><mask id='text-b' fill='#fff'><use xlink:href='#text-i'></use></mask><g mask='url(#text-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_button_border' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='bord-a' d='M15 4v1H9.001V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1v6H4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4.001a1 1 0 0 0 1-1v-1H15v1a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-.999V9H20a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1zm2.001 3h2V5h-2v2zM5 7h2V5H5v2zm2 2h1.001a1 1 0 0 0 1-1V7H15v1a1 1 0 0 0 1 1h1.001v6H16a1 1 0 0 0-1 1v1H9.001v-1a1 1 0 0 0-1-1H7V9zm10.001 10h2v-2h-2v2zM5 19h2v-2H5v2z'></path></defs><g fill-rule='evenodd'><mask id='bord-b' fill='#fff'><use xlink:href='#bord-a'></use></mask><g mask='url(#bord-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_button_layer' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='layers-a' d='M11.929 3l9.928 4.964-9.928 4.965L2 7.964 11.929 3zm7.928 7.964l2 1-9.928 4.965L2 11.964l2-1 7.929 3.965 7.928-3.965zm0 4l2 1-9.928 4.965L2 15.964l2-1 7.929 3.965 7.928-3.965z'></path></defs><g fill-rule='evenodd'><mask id='layers-b' fill='#fff'><use xlink:href='#layers-a'></use></mask><g mask='url(#layers-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_action' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='link-a' d='M3 12c.138-2.052 1.701-3.72 4-4h4V6H7c-3.48 0-6 2.688-6 6s2.52 6 6 6h4v-2H7c-2.299-.28-3.862-1.948-4-4zm5 1h8v-2H8v2zm9-7h-4v2h4c2.299.28 3.863 1.948 4 4-.137 2.052-1.701 3.72-4 4h-4v2h4c3.48 0 6-2.688 6-6s-2.52-6-6-6z'></path></defs><g fill-rule='evenodd'><mask id='link-b' fill='#fff'><use xlink:href='#link-a'></use></mask><g mask='url(#link-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_duplicate' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='dup-a' d='M7.992 3C6.892 3 6 3.888 6 5v2h-.999A2.003 2.003 0 0 0 3 9.006v9.988C3 20.102 3.897 21 5.006 21h9.989c1.108 0 2.006-.9 2.006-2.001V18h2C20.104 18 21 17.107 21 16.008V4.992C21 3.892 20.107 3 19.008 3H7.992zM8 5h11v11h-2V7h-9V5zM11 11v2h2v2h-2v2H9v-2H7v-2h2v-2h2zM5 9h10v10H5V9z'></path></defs><g fill-rule='evenodd'><mask id='dup-b' fill='#fff'><use xlink:href='#dup-a'></use></mask><g mask='url(#dup-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_delete' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px 0px 2px 2px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='del-a' d='M10 3v1H6v2h1v13.008A2 2 0 0 0 9.001 21h6.998C17.104 21 18 20.1 18 19.008V6h1V4h-4V3h-5zM9 8.001h7V7H9v1.001zM15 19h1v-9h-1v9zm-2.999 0h1v-9h-1v9zM9 19h1v-9H9v9z'></path></defs><g fill-rule='evenodd'><mask id='del-b' fill='#fff'><use xlink:href='#del-a'></use></mask><g mask='url(#del-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div></div>";
	var shape_tool = "<div class='InspectorPanel__inspectorPanel' style='width: 40px; position: absolute; padding: 0px; left: 30px; top: 90px; z-index: 10000;'><div class='InspectorBar__toolbarIcons select_tool_menu_item_shape_color' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 2px 2px 0px 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='color-a' d='M17.505 12C16.704 12 16 11.302 16 10.501c0-.801.704-1.499 1.505-1.499.795 0 1.499.698 1.499 1.499 0 .801-.704 1.499-1.499 1.499m-3.004-3.999c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.801 0 1.499.697 1.499 1.499 0 .8-.698 1.499-1.499 1.499m-5.001 0c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.802 0 1.499.697 1.499 1.499 0 .8-.697 1.499-1.499 1.499M6.502 12c-.801 0-1.499-.698-1.499-1.499 0-.801.698-1.499 1.499-1.499.8 0 1.499.698 1.499 1.499 0 .801-.699 1.499-1.499 1.499M12 3c-5 0-9 3.999-9 9 0 5.001 4 9 9 9 .802 0 1.499-.698 1.499-1.499 0-.4-.097-.698-.4-1.001-.195-.298-.395-.095-.395-.495 0-.802.698-1.005 1.499-1.005H16c2.804 0 5-2.697 5-5.501C21 7.1 17.001 3 12 3'></path></defs><g fill-rule='evenodd'><mask id='color-b' fill='#fff'><use xlink:href='#color-a'></use></mask><g mask='url(#color-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_image_layer' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='layers-a' d='M11.929 3l9.928 4.964-9.928 4.965L2 7.964 11.929 3zm7.928 7.964l2 1-9.928 4.965L2 11.964l2-1 7.929 3.965 7.928-3.965zm0 4l2 1-9.928 4.965L2 15.964l2-1 7.929 3.965 7.928-3.965z'></path></defs><g fill-rule='evenodd'><mask id='layers-b' fill='#fff'><use xlink:href='#layers-a'></use></mask><g mask='url(#layers-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_action' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='link-a' d='M3 12c.138-2.052 1.701-3.72 4-4h4V6H7c-3.48 0-6 2.688-6 6s2.52 6 6 6h4v-2H7c-2.299-.28-3.862-1.948-4-4zm5 1h8v-2H8v2zm9-7h-4v2h4c2.299.28 3.863 1.948 4 4-.137 2.052-1.701 3.72-4 4h-4v2h4c3.48 0 6-2.688 6-6s-2.52-6-6-6z'></path></defs><g fill-rule='evenodd'><mask id='link-b' fill='#fff'><use xlink:href='#link-a'></use></mask><g mask='url(#link-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_duplicate' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='dup-a' d='M7.992 3C6.892 3 6 3.888 6 5v2h-.999A2.003 2.003 0 0 0 3 9.006v9.988C3 20.102 3.897 21 5.006 21h9.989c1.108 0 2.006-.9 2.006-2.001V18h2C20.104 18 21 17.107 21 16.008V4.992C21 3.892 20.107 3 19.008 3H7.992zM8 5h11v11h-2V7h-9V5zM11 11v2h2v2h-2v2H9v-2H7v-2h2v-2h2zM5 9h10v10H5V9z'></path></defs><g fill-rule='evenodd'><mask id='dup-b' fill='#fff'><use xlink:href='#dup-a'></use></mask><g mask='url(#dup-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_delete' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px 0px 2px 2px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='del-a' d='M10 3v1H6v2h1v13.008A2 2 0 0 0 9.001 21h6.998C17.104 21 18 20.1 18 19.008V6h1V4h-4V3h-5zM9 8.001h7V7H9v1.001zM15 19h1v-9h-1v9zm-2.999 0h1v-9h-1v9zM9 19h1v-9H9v9z'></path></defs><g fill-rule='evenodd'><mask id='del-b' fill='#fff'><use xlink:href='#del-a'></use></mask><g mask='url(#del-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div></div>";
	var basic_shape_tool = "<div class='InspectorPanel__inspectorPanel' style='width: 40px; position: absolute; padding: 0px; left: 30px; top: 90px; z-index: 10000;'><div class='InspectorBar__toolbarIcons select_tool_menu_item_button_color' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 2px 2px 0px 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='color-a' d='M17.505 12C16.704 12 16 11.302 16 10.501c0-.801.704-1.499 1.505-1.499.795 0 1.499.698 1.499 1.499 0 .801-.704 1.499-1.499 1.499m-3.004-3.999c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.801 0 1.499.697 1.499 1.499 0 .8-.698 1.499-1.499 1.499m-5.001 0c-.8 0-1.499-.699-1.499-1.499 0-.802.699-1.499 1.499-1.499.802 0 1.499.697 1.499 1.499 0 .8-.697 1.499-1.499 1.499M6.502 12c-.801 0-1.499-.698-1.499-1.499 0-.801.698-1.499 1.499-1.499.8 0 1.499.698 1.499 1.499 0 .801-.699 1.499-1.499 1.499M12 3c-5 0-9 3.999-9 9 0 5.001 4 9 9 9 .802 0 1.499-.698 1.499-1.499 0-.4-.097-.698-.4-1.001-.195-.298-.395-.095-.395-.495 0-.802.698-1.005 1.499-1.005H16c2.804 0 5-2.697 5-5.501C21 7.1 17.001 3 12 3'></path></defs><g fill-rule='evenodd'><mask id='color-b' fill='#fff'><use xlink:href='#color-a'></use></mask><g mask='url(#color-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_button_border' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='bord-a' d='M15 4v1H9.001V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1v6H4a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4.001a1 1 0 0 0 1-1v-1H15v1a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-.999V9H20a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1zm2.001 3h2V5h-2v2zM5 7h2V5H5v2zm2 2h1.001a1 1 0 0 0 1-1V7H15v1a1 1 0 0 0 1 1h1.001v6H16a1 1 0 0 0-1 1v1H9.001v-1a1 1 0 0 0-1-1H7V9zm10.001 10h2v-2h-2v2zM5 19h2v-2H5v2z'></path></defs><g fill-rule='evenodd'><mask id='bord-b' fill='#fff'><use xlink:href='#bord-a'></use></mask><g mask='url(#bord-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_image_layer' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='layers-a' d='M11.929 3l9.928 4.964-9.928 4.965L2 7.964 11.929 3zm7.928 7.964l2 1-9.928 4.965L2 11.964l2-1 7.929 3.965 7.928-3.965zm0 4l2 1-9.928 4.965L2 15.964l2-1 7.929 3.965 7.928-3.965z'></path></defs><g fill-rule='evenodd'><mask id='layers-b' fill='#fff'><use xlink:href='#layers-a'></use></mask><g mask='url(#layers-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_action' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='link-a' d='M3 12c.138-2.052 1.701-3.72 4-4h4V6H7c-3.48 0-6 2.688-6 6s2.52 6 6 6h4v-2H7c-2.299-.28-3.862-1.948-4-4zm5 1h8v-2H8v2zm9-7h-4v2h4c2.299.28 3.863 1.948 4 4-.137 2.052-1.701 3.72-4 4h-4v2h4c3.48 0 6-2.688 6-6s-2.52-6-6-6z'></path></defs><g fill-rule='evenodd'><mask id='link-b' fill='#fff'><use xlink:href='#link-a'></use></mask><g mask='url(#link-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_duplicate' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='dup-a' d='M7.992 3C6.892 3 6 3.888 6 5v2h-.999A2.003 2.003 0 0 0 3 9.006v9.988C3 20.102 3.897 21 5.006 21h9.989c1.108 0 2.006-.9 2.006-2.001V18h2C20.104 18 21 17.107 21 16.008V4.992C21 3.892 20.107 3 19.008 3H7.992zM8 5h11v11h-2V7h-9V5zM11 11v2h2v2h-2v2H9v-2H7v-2h2v-2h2zM5 9h10v10H5V9z'></path></defs><g fill-rule='evenodd'><mask id='dup-b' fill='#fff'><use xlink:href='#dup-a'></use></mask><g mask='url(#dup-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div><div class='InspectorBar__toolbarIcons select_tool_menu_item_delete' data-original-title='' title=''><div class='IconButton__iconButtonOld IconButton__blue bgHover' draggable='false' style='width: 40px; height: 40px; border-radius: 0px 0px 2px 2px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24' height='24' viewBox='0 0 24 24'><defs><path id='del-a' d='M10 3v1H6v2h1v13.008A2 2 0 0 0 9.001 21h6.998C17.104 21 18 20.1 18 19.008V6h1V4h-4V3h-5zM9 8.001h7V7H9v1.001zM15 19h1v-9h-1v9zm-2.999 0h1v-9h-1v9zM9 19h1v-9H9v9z'></path></defs><g fill-rule='evenodd'><mask id='del-b' fill='#fff'><use xlink:href='#del-a'></use></mask><g mask='url(#del-b)'><path d='M0 0h24v24H0z'></path></g></g></svg></div></div></div></div>"

	var layer = selectedLayer.attr('class').split(' ')[1];
	//unselect_layer
	$('.layer_hover').removeClass('selected');
	$('.Layer__layerComponent').removeClass('selected')
	$('.transition_wrapper').removeClass('selected')
	$('#select_tool_panel').empty();
	$('#select_tool_menu').empty();
	$('.amination_panel').empty();
	$('.layer_hover').removeClass('selected')

	$('.layer_hover[layer=' + layer).addClass('selected')
	$('.layer[layer=' + layer).addClass('selected')
	$('.Layer__layerComponent[layer=' + layer).addClass('selected')
	$('.transition_wrapper[layer=' + layer).addClass('selected')

	switch (selectedLayer.attr('layer_type')) {
		case 'image':
			$('#select_tool_menu').html(image_tool);
			break;
		case 'text':
			$('#select_tool_menu').html(text_tool);
			break;
		case 'button':
			$('#select_tool_menu').html(button_tool);
			break;
		case 'shape':
			$('#select_tool_menu').html(shape_tool);
			break;
		case 'basic_shape':
			$('#select_tool_menu').html(basic_shape_tool);
			break;
	}

	//image select_menu_item
	$('.select_tool_menu_item_image_color').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		image_color();
	})
	$('.select_tool_menu_item_image_setting').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		image_setting();
	})
	$('.select_tool_menu_item_image_layer').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		image_layer();
	})
	//text select_menu_item
	$('.select_tool_menu_item_text_text').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		text_text();
	})
	$('.select_tool_menu_item_text_color').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		text_color();
	})
	$('.select_tool_menu_item_text_layer').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		text_layer();
	})
	//button select_menu_item
	$('.select_tool_menu_item_button_color').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		button_color();
	})
	$('.select_tool_menu_item_button_text').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		button_text();
	})
	$('.select_tool_menu_item_button_border').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		button_border();
	})
	$('.select_tool_menu_item_button_layer').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		button_layer();
	})
	//shape select_mennu_item
	$('.select_tool_menu_item_shape_color').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		shape_color();
	})
	//common select_menu_item
	$('.select_tool_menu_item_action').click(function() {
		if ($(this).hasClass('active')) {
			$('.InspectorBar__toolbarIcons').removeClass('active');
			$('#select_tool_panel').empty();
			return;
		}
		$('#select_tool_panel').empty();
		$('.InspectorBar__toolbarIcons').removeClass('active');
		$(this).toggleClass('active');
		action();
	})
	$('.select_tool_menu_item_duplicate').click(function() {
		sort_num++;
		$('#canvas_content .banner_area').append(selectedLayer[0].outerHTML);
		$('#banner_out_area').append(selectedLayer[0].outerHTML);
		var layer_hover = $('.layer_hover.selected');
		$('#banner_hover').append(layer_hover[0].outerHTML);
		var left = layer_hover.css('left');
		var top = layer_hover.css('top');
		left = Number(left.substr(0, left.length-2)) + 10;
		top = Number(top.substr(0, top.length-2)) + 10;
		layer_hover.css({'z-index': sort_num, 'left': left+'px', 'top': top+'px'});
		layer_hover.attr({'layer': 'layer_'+sort_num, 'data-x': left, 'data-y': top})
		left = selectedLayer.css('left');
		top = selectedLayer.css('top');
		left = Number(left.substr(0, left.length-2)) + 10;
		top = Number(top.substr(0, top.length-2)) + 10;
		selectedLayer.css({'z-index': sort_num, 'left': left+'px', 'top': top+'px'});
		selectedLayer.attr({'sort_num':sort_num, 'class': 'layer layer_'+sort_num, 'display_name': selectedLayer.attr('layer_type')+' '+sort_num})
		
		save_slides();
		sort_slide();
		populate_layer();
		//unselect_layer
		$('.layer_hover').removeClass('selected');
		$('.Layer__layerComponent').removeClass('selected')
		$('.transition_wrapper').removeClass('selected')
		$('#select_tool_panel').empty();
		$('#select_tool_menu').empty();
		$('.amination_panel').empty();

		selectedLayer = $('.layer.layer_'+sort_num);
		select_layer();
	})
	$('.select_tool_menu_item_delete').click(function() {
		var layer = selectedLayer.attr('class').split(' ')[1];
		$('.layer.'+layer).remove();
		$("[layer="+layer).remove();
		//unselect_layer
		$('.layer_hover').removeClass('selected');
		$('.Layer__layerComponent').removeClass('selected')
		$('.transition_wrapper').removeClass('selected')
		$('#select_tool_panel').empty();
		$('#select_tool_menu').empty();
		$('.amination_panel').empty();
		save_slides();
	})
	// image tool activator
	var image_color = function () {

		var image_color_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Color</span></div><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Opacity</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_opacity BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' for='editableLabel0.7509611213412872' style='display: inline-block;'>100</label><input id='editableLabel0.7509611213412872' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='100' style='display: none; padding-top: 1px;'></div></span><span class='InspectorPanel__percent'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>%</span></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_opacity' type='range' min='0' max='100' step='1' value='100'><div class='Slider__progressBarr' style='width: 176px; left: 0px;'></div></div></div><div style='padding-top: 10px;'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Blur</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_blur BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' for='editableLabel0.5814104305587644' style='display: inline-block;'>0</label><input id='editableLabel0.5814104305587644' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_blur' type='range' min='0' max='10' step='0.5' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 0px;'></div></div></div></div><div><div class='ImageFiltersGroup__imageFiltersGroup'><div class='ImageFiltersGroup__label image'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Filters</span></div><div class='ImageFiltersGroup__imageFilters clearfix'><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__original normal' data='none'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__vivid normal' data='contrast(180%)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__blackAndWhite normal' data='grayscale(100%)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__washed normal' data='grayscale(50%)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__faded normal ImageFiltersGroup__lastOnRow' data='grayscale(10%)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__landscape normal' data='brightness(130%)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__sunset normal' data='sepia(20%)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__toy normal' data='hue-rotate(330deg)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__retro normal' data='hue-rotate(300deg)'></div><div class='ImageFiltersGroup__filterPreset ImageFiltersGroup__blackburn normal ImageFiltersGroup__lastOnRow' data='grayscale(100%)'></div></div></div></div><div class='InspectorPanel__group InspectorPanel__dropShadowGroup' style='padding-top: 0px;'><hr class='InspectorPanel__dropShadowSpacer'></div><div class='InspectorPanel__inspectorPanel InspectorPanel__extraShadow' style='top: 243px;'><div><div class='InspectorPanel__group InspectorPanel__dropShadowGroup' style='padding-bottom:10px;'><div class='Checkbox__checkbox Checkbox__blue'><label for='checkbox'><input class='input_shadow' type='checkbox' name='checkbox' class='Checkbox__checkboxInput'><div class='Checkbox__checkboxBackground Checkbox__blue Checkbox__roundedRectangle' style='margin-right: 8px;'><div class='Checkbox__checkmark Checkbox__blue Checkbox__roundedRectangle'></div></div><span>Drop Shadow</span></label></div></div><div class='shadow_panel' style='display:none;'><div class='InspectorPanel__group InspectorPanel__opacityColor clearfix editor'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Opacity</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_opacity BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>100</label></div></span><span class='InspectorPanel__percent'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>%</span></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_opacity' type='range' min='0' max='100' step='1' value='100'><div class='Slider__progressBarr' style='width: 165px; left: 0px;'></div></div></div><div class='InspectorPanel__selectColor'><div class='SelectedColor__selectedColorFrame SelectedColor__withHover' style='cursor: pointer;'><input class='input_shadow_color' type='color'></div></div></div><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Vertical Shadow</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_vertical BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>0</label></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_vertical' type='range' min='-100' max='100' step='1' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 88px;'></div></div></div></div><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Horizontal Shadow</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_horizontal BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>0</label><input id='editableLabel0.8720963831172428' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='4' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_horizontal' type='range' min='-100' max='100' step='1' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 88px;'></div></div></div></div><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Blur</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_blur BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>3</label></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_blur' type='range' min='0' max='100' step='1' value='3'><div class='Slider__progressBarr' style='width: 4px; left: 0px;'></div></div></div></div></div></div></div></div>";

		$('#select_tool_panel').html(image_color_panel);

		$('.input_opacity').val(selectedLayer.css('opacity')*100);
		$('.input_opacity').siblings().css({width: 176*selectedLayer.css('opacity')+'px'});
		$('.label_opacity').text(selectedLayer.css('opacity')*100);
		if (selectedLayer.css('filter') != 'none') {
			var str = selectedLayer.css('filter').split('px)');
			for (var i = 0; i < str.length; i++) {
				if (str[i].includes('blur')) {
					var value = str[i].slice(5, str[i].length-3);
					$('.input_blur').siblings().css({width: 176/10*value+'px'});
					$('.input_blur').val(value);
					$('.label_blur').text(value);
				}
				if (str[i].includes('drop-shadow')) {
					var drop_shadow = str[i].trim().split('(').join('').split('px').join('').replace('drop-shadowrgb','').replace(')','').split(',').join('').split(' ');
					$('.input_shadow').prop('checked', true);
					$('.shadow_panel').css('display', 'block');
					var shadow_color, shadow_horizontal, shadow_vertical, shadow_opacity, shadow_blur;
					if (drop_shadow[0].includes('a')) {
						shadow_color = rgb2hex('rgb('+drop_shadow[0].replace('a','')+', '+drop_shadow[1]+', '+drop_shadow[2]+')');
						shadow_opacity = Number(drop_shadow[3])*100;
						shadow_horizontal = drop_shadow[4];
						shadow_vertical = drop_shadow[5];
						shadow_blur = drop_shadow[6];
					} else {
						shadow_color = rgb2hex('rgb('+drop_shadow[0]+', '+drop_shadow[1]+', '+drop_shadow[2]+')');
						shadow_opacity = 100;
						shadow_horizontal = drop_shadow[3];
						shadow_vertical = drop_shadow[4];
						shadow_blur = drop_shadow[5];
					}
					$('.input_shadow_color').val(shadow_color);
					$('.input_shadow_opacity').val(shadow_opacity);
					$('.input_shadow_horizontal').val(shadow_horizontal);
					$('.input_shadow_vertical').val(shadow_vertical);
					$('.input_shadow_blur').val(shadow_blur);
				}
			}
		}
		//activator
		$('.input_shadow').change(function() {
			var filter = selectedLayer.css('filter');
			if($(this).prop("checked") == true) {
				var shadow_color = hex2rgb($('.input_shadow_color').val());
				shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';
				$('.shadow_panel').css('display', 'block');
				if (filter != 'none') {
					filter += ' drop-shadow('+shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px)';
				} else {
					filter = 'drop-shadow('+shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px)';
				}
				selectedLayer.css('filter', filter);
			} else {
				$('.shadow_panel').css('display', 'none');
				filter = filter.trim().split('px)');
				if (filter.length > 1) {
					var ary = [];
					for (var i = 0; i < filter.length; filter++) {
						if (filter[i].includes('drop-shadow')) {
						} else {
							ary.push(filter[i]);
						}
					}
					filter = ary.join('px)');
				} else  {
					filter = 'none';
				}
				selectedLayer.css('filter', filter);
			}
		})
		$('.input_shadow_color').change(function() {
			var shadow_color = hex2rgb($(this).val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';

			var filter = selectedLayer.css('filter').split('px)');
			if (filter.length > 1) {
				var ary = [];
				for (var i = 0; i < filter.length; filter++) {
					if (filter[i].includes('drop-shadow')) {
					} else {
						ary.push(filter[i]);
					}
				}
				filter = ary.join('px)');
			} else  {
				filter = '';
			}
			filter += ' drop-shadow('+shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px)';
			selectedLayer.css('filter', filter);
		})
		document.querySelector('.input_shadow_opacity').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+(this.value/100)+')';

			var filter = selectedLayer.css('filter').split('px)');
			if (filter.length > 1) {
				var ary = [];
				for (var i = 0; i < filter.length; filter++) {
					if (filter[i].includes('drop-shadow')) {
					} else {
						ary.push(filter[i]);
					}
				}
				filter = ary.join('px)');
			} else  {
				filter = '';
			}
			filter += ' drop-shadow('+shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px)';
			selectedLayer.css('filter', filter);
		}
		document.querySelector('.input_shadow_horizontal').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';

			var filter = selectedLayer.css('filter').split('px)');
			if (filter.length > 1) {
				var ary = [];
				for (var i = 0; i < filter.length; filter++) {
					if (filter[i].includes('drop-shadow')) {
					} else {
						ary.push(filter[i]);
					}
				}
				filter = ary.join('px)');
			} else  {
				filter = '';
			}
			filter += ' drop-shadow('+shadow_color+' '+this.value+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px)';
			selectedLayer.css('filter', filter);
		}
		document.querySelector('.input_shadow_vertical').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';

			var filter = selectedLayer.css('filter').split('px)');
			if (filter.length > 1) {
				var ary = [];
				for (var i = 0; i < filter.length; filter++) {
					if (filter[i].includes('drop-shadow')) {
					} else {
						ary.push(filter[i]);
					}
				}
				filter = ary.join('px)');
			} else  {
				filter = '';
			}
			filter += ' drop-shadow('+shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+this.value+'px '+$('.input_shadow_blur').val()+'px)';
			selectedLayer.css('filter', filter);
		}
		document.querySelector('.input_shadow_blur').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';

			var filter = selectedLayer.css('filter').split('px)');
			if (filter.length > 1) {
				var ary = [];
				for (var i = 0; i < filter.length; filter++) {
					if (filter[i].includes('drop-shadow')) {
					} else {
						ary.push(filter[i]);
					}
				}
				filter = ary.join('px)');
			} else  {
				filter = '';
			}
			filter += ' drop-shadow('+shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+this.value+'px)';
			selectedLayer.css('filter', filter);
		}
		$('.ImageFiltersGroup__filterPreset').click(function() {
			selectedLayer.css({ filter: $(this).attr('data')});
			save_slides();
		})
		document.querySelector('.input_opacity').oninput = function() {
			$('.input_opacity').siblings().css({width: 176/100*this.value+'px'});
			$('.label_opacity').text(this.value);
			selectedLayer.css({opacity: this.value/100});
		}
		$('.input_opacity').change(function() { save_slides(); })
		document.querySelector('.input_blur').oninput = function() {
			$('.input_blur').siblings().css({width: 176/10*this.value+'px'});
			$('.label_blur').text(this.value);
			selectedLayer.css({filter: 'blur('+this.value+'px)'});
		}
		$('.input_blur').change(function() { save_slides(); })
	}
	var image_setting = function () {
		var image_setting_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Settings</span></div><div class='InspectorPanel__group'><div><div class='InspectorPanel__group clearfix'><div class='setting_select' style='float: left; margin-top: 16px;'><select value='scalecrop'><option value='scalecrop'>Scale crop</option><option value='exactfit'>Exact fit</option><option value='maintainaspect'>Maintain aspect</option><option value='noscale'>No scale</option><option value='tile'>Tile</option></select></div><div class='image_setting_alignTool' style='float: right; margin-top: 16px;'><div class='AlignTool__alignTool AlignTool__blue'><div class='AlignTool__lineDivHoriz' style='left: 12px; top: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 31px; top: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 12px; bottom: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 31px; bottom: 5px;'></div><div class='AlignTool__lineDivVert' style='left: 5px; top: 12px;'></div><div class='AlignTool__lineDivVert' style='left: 5px; top: 31px;'></div><div class='AlignTool__lineDivVert' style='right: 5px; top: 12px;'></div><div class='AlignTool__lineDivVert' style='right: 5px; top: 31px;'></div><div class='AlignTool__alignControl AlignTool__topLeft'></div><div class='AlignTool__alignControl AlignTool__centerTop'></div><div class='AlignTool__alignControl AlignTool__topRight'></div><div class='AlignTool__alignControl AlignTool__middleLeft'></div><div class='AlignTool__alignControl AlignTool__center AlignTool__selected'></div><div class='AlignTool__alignControl AlignTool__middleRight'></div><div class='AlignTool__alignControl AlignTool__bottomLeft'></div><div class='AlignTool__alignControl AlignTool__centerBottom'></div><div class='AlignTool__alignControl AlignTool__bottomRight'></div></div></div></div></div><div class='InspectorPanel__group' style='margin-top: 5px;'><a class='Link__link Link__blue Link__normal' href='#'' target='_self'>Reset to original size</a></div></div></div>";
		var alignTool = "<div class='AlignTool__alignTool AlignTool__blue'><div class='AlignTool__lineDivHoriz' style='left: 12px; top: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 31px; top: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 12px; bottom: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 31px; bottom: 5px;'></div><div class='AlignTool__lineDivVert' style='left: 5px; top: 12px;'></div><div class='AlignTool__lineDivVert' style='left: 5px; top: 31px;'></div><div class='AlignTool__lineDivVert' style='right: 5px; top: 12px;'></div><div class='AlignTool__lineDivVert' style='right: 5px; top: 31px;'></div><div class='AlignTool__alignControl AlignTool__topLeft'></div><div class='AlignTool__alignControl AlignTool__centerTop'></div><div class='AlignTool__alignControl AlignTool__topRight'></div><div class='AlignTool__alignControl AlignTool__middleLeft'></div><div class='AlignTool__alignControl AlignTool__center AlignTool__selected'></div><div class='AlignTool__alignControl AlignTool__middleRight'></div><div class='AlignTool__alignControl AlignTool__bottomLeft'></div><div class='AlignTool__alignControl AlignTool__centerBottom'></div><div class='AlignTool__alignControl AlignTool__bottomRight'></div></div>";
		var tileTool = "<div class='InspectorPanel__tileGroup'><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Tile zoom</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue label_tilezoom' style='display: inline-block;'>50</label></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_tilezoom' type='range' min='10' max='100' step='1' value='50'><div class='Slider__progressBarr' style='width: 80px; left: 0px;'></div></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Offset X</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue label_offsetx' style='display: inline-block;'>50</label></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_offsetx' type='range' min='0' max='100' step='1' value='50'><div class='Slider__progressBarr' style='width: 82px; left: 0px;'></div></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Offset Y</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue label_offsety' style='display: inline-block;'>50</label></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_offsety' type='range' min='0' max='100' step='1' value='50'><div class='Slider__progressBarr' style='width: 82px; left: 0px;'></div></div></div></div></div>";

		$('#select_tool_panel').html(image_setting_panel);

		var alginToolAtivator = function() {
			switch (selectedLayer.css('background-position')) {
				case '0px 0px':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__topLeft').addClass('AlignTool__selected');
					break;
				case '50% 0px':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__centerTop').addClass('AlignTool__selected');
					break;
				case '100% 0px':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__topRight').addClass('AlignTool__selected');
					break;
				case '0px 50%':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__middleLeft').addClass('AlignTool__selected');
					break;
				case '50% 50%':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__center').addClass('AlignTool__selected');
					break;
				case '100% 50%':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__middleRight').addClass('AlignTool__selected');
					break;
				case '0px 100%':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__bottomLeft').addClass('AlignTool__selected');
					break;
				case '50% 100%':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__centerBottom').addClass('AlignTool__selected');
					break;
				case '100% 100%':
					$('.AlignTool__alignControl').removeClass('AlignTool__selected');
					$('.AlignTool__alignControl.AlignTool__bottomRight').addClass('AlignTool__selected');
					break;
				default:
					break;
			}
			$('.AlignTool__alignControl.AlignTool__topLeft').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '0px 0px'})
				save_slides();
			})
			$('.AlignTool__alignControl.AlignTool__centerTop').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '50% 0px'})
				save_slides();
				
			})
			$('.AlignTool__alignControl.AlignTool__topRight').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '100% 0px'})
				save_slides();
			})
			$('.AlignTool__alignControl.AlignTool__middleLeft').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '0px 50%'})
				save_slides();
			})
			$('.AlignTool__alignControl.AlignTool__center').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '50% 50%'})
				save_slides();
			})
			$('.AlignTool__alignControl.AlignTool__middleRight').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '100% 50%'})
				save_slides();
			})
			$('.AlignTool__alignControl.AlignTool__bottomLeft').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '0px 100%'})
				save_slides();
			})
			$('.AlignTool__alignControl.AlignTool__centerBottom').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '50% 100%'})
				save_slides();
			})
			$('.AlignTool__alignControl.AlignTool__bottomRight').click(function() {
				$('.AlignTool__alignControl').removeClass('AlignTool__selected');
				$(this).addClass('AlignTool__selected');
				selectedLayer.css({'background-position': '100% 100%'})
				save_slides();
			})
		}
		var tileToolActivator = function() {
			document.querySelector('.input_tilezoom').oninput = function() {
				$('.input_tilezoom').siblings().css({width: 176/100*this.value+'px'});
				$('.label_tilezoom').text(this.value);
				selectedLayer.css({'background-size': 177*this.value/100+'px'});
			}
			$('.input_tilezoom').change(function() { save_slides(); })
			document.querySelector('.input_offsetx').oninput = function() {
				$('.input_offsetx').siblings().css({width: 176/100*this.value+'px'});
				$('.label_offsetx').text(this.value);
				var pos = selectedLayer.css('background-position').split(" ");
				selectedLayer.css({'background-position': this.value+'% '+pos[1]});
			}
			$('.input_offsetx').change(function() { save_slides(); })
			document.querySelector('.input_offsety').oninput = function() {
				$('.input_offsety').siblings().css({width: 176/100*this.value+'px'});
				$('.label_offsety').text(this.value);
				var pos = selectedLayer.css('background-position').split(" ");
				selectedLayer.css({'background-position': pos[0]+' '+this.value+'%'});
			}
			$('.input_offsety').change(function() { save_slides(); })
		}
		// alginToolAtivator();
		$('#select_tool_panel select').change(function() {
			switch ($(this).val()) {
				case 'scalecrop':
					$('.InspectorPanel__tileGroup').remove();
					selectedLayer.css({'background-repeat': 'no-repeat'});
					selectedLayer.css({'background-size': 'cover'});
					$('.image_setting_alignTool').html(alignTool);
					alginToolAtivator();
					break;
				case 'exactfit':
					$('.InspectorPanel__tileGroup').remove();
					selectedLayer.css({'background-repeat': 'no-repeat'});
					$('.image_setting_alignTool').empty();
					selectedLayer.css({'background-size': '100% 100%'});
					break;
				case 'maintainaspect':
					$('.InspectorPanel__tileGroup').remove();
					selectedLayer.css({'background-repeat': 'no-repeat'});
					selectedLayer.css({'background-size': 'contain'});
					$('.image_setting_alignTool').html(alignTool);
					alginToolAtivator();
					break;
				case 'noscale':
					$('.InspectorPanel__tileGroup').remove();
					selectedLayer.css({'background-repeat': 'no-repeat'});
					selectedLayer.css({'background-size': 'auto'});
					$('.image_setting_alignTool').html(alignTool);
					alginToolAtivator();
					break;
				case 'tile':
					$('.InspectorPanel__tileGroup').remove();
					selectedLayer.css({'background-repeat': 'repeat'});
					selectedLayer.css({'background-size': '88.5px'});
					$('.image_setting_alignTool').empty();
					$('.image_setting_alignTool').parent().parent().append(tileTool);
					tileToolActivator();
					break;
			}
			save_slides();
		});

		switch (selectedLayer.css('background-size')) {
			case 'cover':
				$('#select_tool_panel select').val('scalecrop');
				$('.image_setting_alignTool').html(alignTool);
				alginToolAtivator();
				break;
			case '100% 100%':
				$('#select_tool_panel select').val('exactfit');
				$('.image_setting_alignTool').empty();
				break;
			case 'contain':
				$('#select_tool_panel select').val('maintainaspect');
				$('.image_setting_alignTool').html(alignTool);
				alginToolAtivator();
				break;
			case 'auto':
				$('#select_tool_panel select').val('noscale');
				$('.image_setting_alignTool').html(alignTool);
				alginToolAtivator();
				break;
			default:
				$('#select_tool_panel select').val('tile');
				$('.image_setting_alignTool').empty();
				$('.image_setting_alignTool').parent().parent().append(tileTool);
				tileToolActivator();
				break;
		}
	}
	var image_layer = function() {

		var image_layer_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Layer</span></div><div class='InspectorPanel__group' style='margin-bottom: 10px;'><div class='SizeAndPositionGroup__sizeAndPositionGroup'><div class='SizeAndPositionGroup__sizeAndPositionLabel'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Size and position</span></div><div class='SizeAndPositionGroup__sizeInputs'><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>W:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_width Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>H:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_height Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div></div><div class='SizeAndPositionGroup__positionInputs'><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>X:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_left Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Y:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_top Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div></div></div></div><div class='InspectorPanel__group'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Flip layer</span></div><div class='InspectorLayers__flipLayers'><span class='input_flip_horizontal'><div class='IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;' data-original-title='' title=''><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Flip-H' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M15,21 L17,21 L17,19 L15,19 L15,21 Z M19,9 L21,9 L21,7 L19,7 L19,9 Z M3,5 L3,19 C3,20.1 3.9,21 5,21 L9,21 L9,19 L5,19 L5,5 L9,5 L9,3 L5,3 C3.9,3 3,3.9 3,5 Z M19,3 L19,5 L21,5 C21,3.9 20.1,3 19,3 Z M11,23 L13,23 L13,1 L11,1 L11,23 Z M19,17 L21,17 L21,15 L19,15 L19,17 Z M15,5 L17,5 L17,3 L15,3 L15,5 Z M19,13 L21,13 L21,11 L19,11 L19,13 Z M19,21 C20.1,21 21,20.1 21,19 L19,19 L19,21 Z' id='Shape'></path></g></svg></div></div></span><div class='Separator__separator' style='margin: 0px 7px;'><div class='Separator__separatorBar Separator__grey Separator__small'></div></div><span class='input_flip_vertical'><div class='IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;' data-original-title='' title=''><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Flip-V' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M15,21 L17,21 L17,19 L15,19 L15,21 Z M19,9 L21,9 L21,7 L19,7 L19,9 Z M3,5 L3,19 C3,20.1 3.9,21 5,21 L9,21 L9,19 L5,19 L5,5 L9,5 L9,3 L5,3 C3.9,3 3,3.9 3,5 Z M19,3 L19,5 L21,5 C21,3.9 20.1,3 19,3 Z M11,23 L13,23 L13,1 L11,1 L11,23 Z M19,17 L21,17 L21,15 L19,15 L19,17 Z M15,5 L17,5 L17,3 L15,3 L15,5 Z M19,13 L21,13 L21,11 L19,11 L19,13 Z M19,21 C20.1,21 21,20.1 21,19 L19,19 L19,21 Z' id='Shape' transform='translate(12.000000, 12.000000) rotate(90.000000) translate(-12.000000, -12.000000) '></path></g></svg></div></div></span></div></div></div>";

		$('#select_tool_panel').html(image_layer_panel);

		var width = selectedLayer.css('width');
		$('.input_width').val(width.substr(0, width.length-2));
		var height = selectedLayer.css('height');
		$('.input_height').val(height.substr(0, height.length-2));
		var left = selectedLayer.css('left');
		$('.input_left').val(left.substr(0, left.length-2));
		var top = selectedLayer.css('top');
		$('.input_top').val(top.substr(0, top.length-2));
		if (selectedLayer.css('transform') != 'none') {
			var str = selectedLayer.css('transform').split(',');
			if (str[0] == "matrix(-1")
				$('.input_flip_horizontal').addClass('active');
			if (str[3] == ' -1')
				$('.input_flip_vertical').addClass('active');
		}

		$('.input_width').change(function() {
			selectedLayer.css({'width': $(this).val()});
			$('.layer_hover.selected').css({'width': $(this).val()});
			save_slides();
		})
		$('.input_height').change(function() {
			selectedLayer.css({'height': $(this).val()});
			$('.layer_hover.selected').css({'height': $(this).val()});
			save_slides();
		})
		$('.input_left').change(function() {
			selectedLayer.css({'left': $(this).val()+'px'});
			$('.layer_hover.selected').css({'left': $(this).val()+'px'});
			save_slides();
		})
		$('.input_top').change(function() {
			selectedLayer.css({'top': $(this).val()+'px'});
			$('.layer_hover.selected').css({'top': $(this).val()+'px'});
			save_slides();
		})
		$('.input_flip_horizontal').click(function() {
			$(this).toggleClass('active');
			if ($(this).hasClass('active')) {
				if (selectedLayer.css('transform') != 'none') {
					var str = selectedLayer.css('transform').split(',');
					str[0] = "matrix(-1";
					selectedLayer.css({'transform': str[0].concat(',', str[1], ',', str[2], ',', str[3], ',', str[4], ',', str[5])});
				}
			} else {
				if (selectedLayer.css('transform') != 'none') {
					var str = selectedLayer.css('transform').split(',');
					str[0] = "matrix(1";
					selectedLayer.css({'transform': str[0].concat(',', str[1], ',', str[2], ',', str[3], ',', str[4], ',', str[5])});
				}
			}
			save_slides();
		})
		$('.input_flip_vertical').click(function() {
			$(this).toggleClass('active');
			if ($(this).hasClass('active')) {
				if (selectedLayer.css('transform') != 'none') {
					var str = selectedLayer.css('transform').split(',');
					selectedLayer.css({'transform': str[0].concat(',', str[1], ',', str[2], ', -1', ',', str[4], ',', str[5])});
				}
			} else {
				if (selectedLayer.css('transform') != 'none') {
					var str = selectedLayer.css('transform').split(',');
					selectedLayer.css({'transform': str[0].concat(',', str[1], ',', str[2], ', 1', ',', str[4], ',', str[5])});
				}
			}
			save_slides();
		})
	}
	// text tool activator
	var text_text = function () {

		var text_text_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>TEXT</span></div><div class='Panel__group'><div class='Panel__label'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Typeface</span></div><div class='Panel__select'><select class='input_text_fontfamily' style='width:100%; height:25px;'></select></div><div class='Panel__select'><select class='input_text_fontstyle' style='width:100%; height:25px;'><option value='normal'>Normal</option><option value='italic'>Italic</option><option value='oblique'>Oblique</option></select></div></div><div class='Panel__group' style='padding-top: 15px;'><div class='AlignTextGroup__alignTextGroup'><div class='text_align_item text_align_left IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Left-align' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M15,15 L3,15 L3,17 L15,17 L15,15 Z M15,7 L3,7 L3,9 L15,9 L15,7 Z M3,13 L21,13 L21,11 L3,11 L3,13 Z M3,21 L21,21 L21,19 L3,19 L3,21 Z M3,3 L3,5 L21,5 L21,3 L3,3 Z' id='Shape'></path></g></svg></div></div><div class='text_align_item text_align_center IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Center-align' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M7,15 L7,17 L17,17 L17,15 L7,15 Z M3,21 L21,21 L21,19 L3,19 L3,21 Z M3,13 L21,13 L21,11 L3,11 L3,13 Z M7,7 L7,9 L17,9 L17,7 L7,7 Z M3,3 L3,5 L21,5 L21,3 L3,3 Z' id='Shape'></path></g></svg></div></div><div class='text_align_item text_align_right IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Right-align' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M3,21 L21,21 L21,19 L3,19 L3,21 Z M9,17 L21,17 L21,15 L9,15 L9,17 Z M3,13 L21,13 L21,11 L3,11 L3,13 Z M9,9 L21,9 L21,7 L9,7 L9,9 Z M3,3 L3,5 L21,5 L21,3 L3,3 Z' id='Shape'></path></g></svg></div></div><div class='text_transform_item text_transform_uppercase IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Capital' stroke='none' stroke-width='1' fill-rule='evenodd'><polygon id='Shape' points='5 4 5 6 11 6 11 20 13 20 13 6 19 6 19 4'></polygon></g></svg></div></div><div class='text_transform_item text_transform_lowercase IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Small-Caps' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M11,7 L11,4 L13,4 L13,7 L16,7 L16,9 L13,9 L13,17 C12.9948261,17.504802 13.4430304,17.9627931 14,18 L16,18 L16,20 L14,20 C12.319212,19.9460447 10.9950837,18.5930034 11,17 L11,9 L9,9 L9,7 L11,7 Z' id='Combined-Shape'></path></g></svg></div></div><div class='text_decoration_underline IconButton__iconButtonOld IconButton__blue IconButton__inlineBlock' draggable='false' style='width: 28px; height: 28px;'><div class='BaseIcon__iconComponent BaseIcon__large'><svg width='24px' height='24px' viewBox='0 0 24 24'><defs></defs><g id='Properties-bar---Underline' stroke='none' stroke-width='1' fill-rule='evenodd'><path d='M5,21 L19,21 L19,19 L5,19 L5,21 Z M16,3 L16,10.9924559 C16,13.2039831 14.2052968,15 12,15 C9.78850042,15 8,13.2105736 8,10.9924559 L8,3 L6,3 L6,10.9924559 C6,14.3149115 8.68369912,17 12,17 C15.3101941,17 18,14.3082251 18,10.9924559 L18,3 L16,3 Z' id='Combined-Shape'></path></g></svg></div></div></div></div><div class='Panel__fontSize'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Size</span></div><div class='Panel__fontSizeSlider'><div class='white' style='min-height: 18px; position: relative;'><input class='input_text_size' type='range' min='6' max='120' step='1' value='77'><div class='Slider__progressBarr' style='width: 63px; left: 0px;'></div></div></div><div class='Panel__fontSizeSelect'><div tabindex='0' data-allow-shortcuts='false' class='Select__selectComponent' style='width: 100%;'><div class='Select__select Select__white normal Select__noBackgroundHover'><div class='Select__textContainer Select__fontSize Icon'><div class='BaseLabel__editableLabel'><input type='text' class='input_text_size TextInput__editableLabelInput TextInput__normal left TextInput__blue' maxlength='3' value='77' style='border-bottom: none;'></div></div></div></div></div></div><div class='Panel__group Panel__sliderGroup'><div class='clearfix Panel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Line Height</span><div class='Panel__content'><span><div class='BaseLabel__editableLabel'><label class='label_text_lineheight BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__bold BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>1.4</label><input id='editableLabel0.7982321138488631' type='text' class='TextInput__editableLabelInput TextInput__bold TextInput__small TextInput__right TextInput__blue' maxlength='5' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_text_lineheight' type='range' min='0.5' max='5' step='0.1' value='1.4'><div class='Slider__progressBarr' style='width: 33px; left: 0px;'></div></div></div><div class='Panel__group'><div class='Panel__group Panel__sliderGroup'><div class='clearfix Panel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Letter Spacing</span><div class='Panel__content'><span><div class='BaseLabel__editableLabel'><label class='label_text_letterspacing BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__bold BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>0</label><input id='editableLabel0.2700885637027777' type='text' class='TextInput__editableLabelInput TextInput__bold TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_text_letterspacing' type='range' min='-20' max='20' step='1' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 88px;'></div></div></div></div></div>";

		$('#select_tool_panel').html(text_text_panel);

		var googlefonts_backup = ['ABeeZee', 'Abel', 'Abhaya Libre', 'Abril Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent Pro', 'Aguafina Script', 'Akronim', 'Aladin', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya SC', 'Alegreya Sans', 'Alegreya Sans SC', 'Alex Brush', 'Alfa Slab One', 'Alice', 'Alike', 'Alike Angular', 'Allan', 'Allerta', 'Allerta Stencil', 'Allura', 'Almendra', 'Almendra Display', 'Almendra SC', 'Amarante', 'Amaranth', 'Amatic SC', 'Amethysta', 'Amiko', 'Amiri', 'Amita', 'Anaheim', 'Andada', 'Andika', 'Angkor', 'Annie Use Your Telescope', 'Anonymous Pro', 'Antic', 'Antic Didone', 'Antic Slab', 'Anton', 'Arapey', 'Arbutus', 'Arbutus Slab', 'Architects Daughter', 'Archivo', 'Archivo Black', 'Archivo Narrow', 'Aref Ruqaa', 'Arima Madurai', 'Arimo', 'Arizonia', 'Armata', 'Arsenal', 'Artifika', 'Arvo', 'Arya', 'Asap', 'Asap Condensed', 'Asar', 'Asset', 'Assistant', 'Astloch', 'Asul', 'Athiti', 'Atma', 'Atomic Age', 'Aubrey', 'Audiowide', 'Autour One', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Averia Sans Libre', 'Averia Serif Libre', 'Bad Script', 'Bahiana', 'Baloo', 'Baloo Bhai', 'Baloo Bhaijaan', 'Baloo Bhaina', 'Baloo Chettan', 'Baloo Da', 'Baloo Paaji', 'Baloo Tamma', 'Baloo Tammudu', 'Baloo Thambi', 'Balthazar', 'Bangers', 'Barlow', 'Barlow Condensed', 'Barlow Semi Condensed', 'Barrio', 'Basic', 'Battambang', 'Baumans', 'Bayon', 'Belgrano', 'Bellefair', 'Belleza', 'BenchNine', 'Bentham', 'Berkshire Swash', 'Bevan', 'Bigelow Rules', 'Bigshot One', 'Bilbo', 'Bilbo Swash Caps', 'BioRhyme', 'Biryani', 'Bitter', 'Black And White Picture', 'Black Han Sans', 'Black Ops One', 'Bokor', 'Bonbon', 'Boogaloo', 'Bowlby One', 'Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buenard', 'Bungee', 'Bungee Hairline', 'Bungee Inline', 'Bungee Outline', 'Bungee Shade', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Cabin Sketch', 'Caesar Dressing', 'Cagliostro', 'Cairo', 'Calligraffitti', 'Cambay', 'Cambo', 'Candal', 'Cantarell', 'Cantata One', 'Cantora One', 'Capriola', 'Cardo', 'Carme', 'Carrois Gothic', 'Carrois Gothic SC', 'Carter One', 'Catamaran', 'Caudex', 'Caveat', 'Caveat Brush', 'Cedarville Cursive', 'Ceviche One', 'Changa', 'Changa One', 'Chango', 'Chathura', 'Chau Philomene One', 'Chela One', 'Chelsea Market', 'Chenla', 'Cherry Cream Soda', 'Cherry Swash', 'Chewy', 'Chicle', 'Chivo', 'Chonburi', 'Cinzel', 'Cinzel Decorative', 'Clicker Script', 'Codystar', 'Coiny', 'Combo', 'Comfortaa', 'Coming Soon', 'Concert One', 'Condiment', 'Content', 'Contrail One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Cormorant', 'Cormorant Garamond', 'Cormorant Infant', 'Cormorant SC', 'Cormorant Unicase', 'Cormorant Upright', 'Courgette', 'Cousine', 'Coustard', 'Covered By Your Grace', 'Crafty Girls', 'Creepster', 'Crete Round', 'Crimson Text', 'Croissant One', 'Crushed', 'Cuprum', 'Cute Font', 'Cutive', 'Cutive Mono', 'Damion', 'Dancing Script', 'Dangrek', 'David Libre', 'Dawning of a New Day', 'Days One', 'Dekko', 'Delius', 'Delius Swash Caps', 'Delius Unicase', 'Della Respira', 'Denk One', 'Devonshire', 'Dhurjati', 'Didact Gothic', 'Diplomata', 'Diplomata SC', 'Do Hyeon', 'Dokdo', 'Domine', 'Donegal One', 'Doppio One', 'Dorsa', 'Dosis', 'Dr Sugiyama', 'Duru Sans', 'Dynalight', 'EB Garamond', 'Eagle Lake', 'East Sea Dokdo', 'Eater', 'Economica', 'Eczar', 'El Messiri', 'Electrolize', 'Elsie', 'Elsie Swash Caps', 'Emblema One', 'Emilys Candy', 'Encode Sans', 'Encode Sans Condensed', 'Encode Sans Expanded', 'Encode Sans Semi Condensed', 'Encode Sans Semi Expanded', 'Engagement', 'Englebert', 'Enriqueta', 'Erica One', 'Esteban', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fanwood Text', 'Farsan', 'Fascinate', 'Fascinate Inline', 'Faster One', 'Fasthand', 'Fauna One', 'Faustina', 'Federant', 'Federo', 'Felipa', 'Fenix', 'Finger Paint', 'Fira Mono', 'Fira Sans', 'Fira Sans Condensed', 'Fira Sans Extra Condensed', 'Fjalla One', 'Fjord One', 'Flamenco', 'Flavors', 'Fondamento', 'Fontdiner Swanky', 'Forum', 'Francois One', 'Frank Ruhl Libre', 'Freckle Face', 'Fredericka the Great', 'Fredoka One', 'Freehand', 'Fresca', 'Frijole', 'Fruktur', 'Fugaz One', 'GFS Didot', 'GFS Neohellenic', 'Gabriela', 'Gaegu', 'Gafata', 'Galada', 'Galdeano', 'Galindo', 'Gamja Flower', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gidugu', 'Gilda Display', 'Give You Glory', 'Glass Antiqua', 'Glegoo', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Gorditas', 'Gothic A1', 'Goudy Bookletter 1911', 'Graduate', 'Grand Hotel', 'Gravitas One', 'Great Vibes', 'Griffy', 'Gruppo', 'Gudea', 'Gugi', 'Gurajada', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Harmattan', 'Headland One', 'Heebo', 'Henny Penny', 'Herr Von Muellerhoff', 'Hi Melody', 'Hind', 'Hind Guntur', 'Hind Madurai', 'Hind Siliguri', 'Hind Vadodara', 'Holtwood One SC', 'Homemade Apple', 'Homenaje', 'IBM Plex Mono', 'IBM Plex Sans', 'IBM Plex Sans Condensed', 'IBM Plex Serif', 'IM Fell DW Pica', 'IM Fell DW Pica SC', 'IM Fell Double Pica', 'IM Fell Double Pica SC', 'IM Fell English', 'IM Fell English SC', 'IM Fell French Canon', 'IM Fell French Canon SC', 'IM Fell Great Primer', 'IM Fell Great Primer SC', 'Iceberg', 'Iceland', 'Imprima', 'Inconsolata', 'Inder', 'Indie Flower', 'Inika', 'Inknut Antiqua', 'Irish Grover', 'Istok Web', 'Italiana', 'Italianno', 'Itim', 'Jacques Francois', 'Jacques Francois Shadow', 'Jaldi', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Jomhuria', 'Josefin Sans', 'Josefin Slab', 'Joti One', 'Jua', 'Judson', 'Julee', 'Julius Sans One', 'Junge', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kadwa', 'Kalam', 'Kameron', 'Kanit', 'Kantumruy', 'Karla', 'Karma', 'Katibeh', 'Kaushan Script', 'Kavivanar', 'Kavoon', 'Kdam Thmor', 'Keania One', 'Kelly Slab', 'Kenia', 'Khand', 'Khmer', 'Khula', 'Kirang Haerang', 'Kite One', 'Knewave', 'Kotta One', 'Koulen', 'Kranky', 'Kreon', 'Kristi', 'Krona One', 'Kumar One', 'Kumar One Outline', 'Kurale', 'La Belle Aurore', 'Laila', 'Lakki Reddy', 'Lalezar', 'Lancelot', 'Lateef', 'Lato', 'League Script', 'Leckerli One', 'Ledger', 'Lekton', 'Lemon', 'Lemonada', 'Libre Barcode 128', 'Libre Barcode 128 Text', 'Libre Barcode 39', 'Libre Barcode 39 Extended', 'Libre Barcode 39 Extended Text', 'Libre Barcode 39 Text', 'Libre Baskerville', 'Libre Franklin', 'Life Savers', 'Lilita One', 'Lily Script One', 'Limelight', 'Linden Hill', 'Lobster', 'Lobster Two', 'Londrina Outline', 'Londrina Shadow', 'Londrina Sketch', 'Londrina Solid', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Lovers Quarrel', 'Luckiest Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo Swash Caps', 'Mada', 'Magra', 'Maiden Orange', 'Maitree', 'Mako', 'Mallanna', 'Mandali', 'Manuale', 'Marcellus', 'Marcellus SC', 'Marck Script', 'Margarine', 'Marko One', 'Marmelad', 'Martel', 'Martel Sans', 'Marvel', 'Mate', 'Mate SC', 'Maven Pro', 'McLaren', 'Meddon', 'MedievalSharp', 'Medula One', 'Meera Inimai', 'Megrim', 'Meie Script', 'Merienda', 'Merienda One', 'Merriweather', 'Merriweather Sans', 'Metal', 'Metal Mania', 'Metamorphous', 'Metrophobic', 'Michroma', 'Milonga', 'Miltonian', 'Miltonian Tattoo', 'Mina', 'Miniver', 'Miriam Libre', 'Mirza', 'Miss Fajardose', 'Mitr', 'Modak', 'Modern Antiqua', 'Mogra', 'Molengo', 'Monda', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Montserrat Alternates', 'Montserrat Subrayada', 'Moul', 'Moulpali', 'Mountains of Christmas', 'Mouse Memoirs', 'Mr Bedfort', 'Mr Dafoe', 'Mr De Haviland', 'Mrs Saint Delafield', 'Mrs Sheppards', 'Mukta', 'Mukta Mahee', 'Mukta Malar', 'Mukta Vaani', 'Muli', 'Mystery Quest', 'NTR', 'Nanum Brush Script', 'Nanum Gothic', 'Nanum Gothic Coding', 'Nanum Myeongjo', 'Nanum Pen Script', 'Neucha', 'Neuton', 'New Rocker', 'News Cycle', 'Niconne', 'Nixie One', 'Nobile', 'Nokora', 'Norican', 'Nosifer', 'Nothing You Could Do', 'Noticia Text', 'Noto Sans', 'Noto Serif', 'Nova Cut', 'Nova Flat', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Nunito Sans', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original Surfer', 'Oswald', 'Over the Rainbow', 'Overlock', 'Overlock SC', 'Overpass', 'Overpass Mono', 'Ovo', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans', 'PT Sans Caption', 'PT Sans Narrow', 'PT Serif', 'PT Serif Caption', 'Pacifico', 'Padauk', 'Palanquin', 'Palanquin Dark', 'Pangolin', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Patrick Hand', 'Patrick Hand SC', 'Pattaya', 'Patua One', 'Pavanam', 'Paytone One', 'Peddana', 'Peralta', 'Permanent Marker', 'Petit Formal Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Play', 'Playball', 'Playfair Display', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Poor Story', 'Poppins', 'Port Lligat Sans', 'Port Lligat Slab', 'Pragati Narrow', 'Prata', 'Preahvihear', 'Press Start 2P', 'Pridi', 'Princess Sofia', 'Prociono', 'Prompt', 'Prosto One', 'Proza Libre', 'Puritan', 'Purple Purse', 'Quando', 'Quantico', 'Quattrocento', 'Quattrocento Sans', 'Questrial', 'Quicksand', 'Quintessential', 'Qwigley', 'Racing Sans One', 'Radley', 'Rajdhani', 'Rakkas', 'Raleway', 'Raleway Dots', 'Ramabhadra', 'Ramaraja', 'Rambla', 'Rammetto One', 'Ranchers', 'Rancho', 'Ranga', 'Rasa', 'Rationale', 'Ravi Prakash', 'Redressed', 'Reem Kufi', 'Reenie Beanie', 'Revalia', 'Rhodium Libre', 'Ribeye', 'Ribeye Marrow', 'Righteous', 'Risque', 'Roboto', 'Roboto Condensed', 'Roboto Mono', 'Roboto Slab', 'Rochester', 'Rock Salt', 'Rokkitt', 'Romanesco', 'Ropa Sans', 'Rosario', 'Rosarivo', 'Rouge Script', 'Rozha One', 'Rubik', 'Rubik Mono One', 'Ruda', 'Rufina', 'Ruge Boogie', 'Ruluko', 'Rum Raisin', 'Ruslan Display', 'Russo One', 'Ruthie', 'Rye', 'Sacramento', 'Sahitya', 'Sail', 'Saira', 'Saira Condensed', 'Saira Extra Condensed', 'Saira Semi Condensed', 'Salsa', 'Sanchez', 'Sancreek', 'Sansita', 'Sarala', 'Sarina', 'Sarpanch', 'Satisfy', 'Scada', 'Scheherazade', 'Schoolbell', 'Scope One', 'Seaweed Script', 'Secular One', 'Sedgwick Ave', 'Sedgwick Ave Display', 'Sevillana', 'Seymour One', 'Shadows Into Light', 'Shadows Into Light Two', 'Shanti', 'Share', 'Share Tech', 'Share Tech Mono', 'Shojumaru', 'Short Stack', 'Shrikhand', 'Siemreap', 'Sigmar One', 'Signika', 'Signika Negative', 'Simonetta', 'Sintony', 'Sirin Stencil', 'Six Caps', 'Skranji', 'Slabo 13px', 'Slabo 27px', 'Slackey', 'Smokum', 'Smythe', 'Sniglet', 'Snippet', 'Snowburst One', 'Sofadi One', 'Sofia', 'Song Myung', 'Sonsie One', 'Sorts Mill Goudy', 'Source Code Pro', 'Source Sans Pro', 'Source Serif Pro', 'Space Mono', 'Special Elite', 'Spectral', 'Spectral SC', 'Spicy Rice', 'Spinnaker', 'Spirax', 'Squada One', 'Sree Krushnadevaraya', 'Sriracha', 'Stalemate', 'Stalinist One', 'Stardos Stencil', 'Stint Ultra Condensed', 'Stint Ultra Expanded', 'Stoke', 'Strait', 'Stylish', 'Sue Ellen Francisco', 'Suez One', 'Sumana', 'Sunshiney', 'Supermercado One', 'Sura', 'Suranna', 'Suravaram', 'Suwannaphum', 'Swanky and Moo Moo', 'Syncopate', 'Tajawal', 'Tangerine', 'Taprom', 'Tauri', 'Taviraj', 'Teko', 'Telex', 'Tenali Ramakrishna', 'Tenor Sans', 'Text Me One', 'The Girl Next Door', 'Tienne', 'Tillana', 'Timmana', 'Tinos', 'Titan One', 'Titillium Web', 'Trade Winds', 'Trirong', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen One', 'Ubuntu', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncial Antiqua', 'Underdog', 'Unica One', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro One', 'Varela', 'Varela Round', 'Vast Shadow', 'Vesper Libre', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Vollkorn SC', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Warnes', 'Wellfleet', 'Wendy One', 'Wire One', 'Work Sans', 'Yanone Kaffeesatz', 'Yantramanav', 'Yatra One', 'Yellowtail', 'Yeon Sung', 'Yeseva One', 'Yesteryear', 'Yrsa', 'Zeyada', 'Zilla Slab', 'Zilla Slab Highlight'];
		var googlefonts = ['ABeeZee', 'Abel', 'Abhaya Libre', 'Abril Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent Pro', 'Aguafina Script', 'Akronim', 'Aladin', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya SC', 'Alegreya Sans', 'Arbutus Slab', 'Archivo', 'Archivo Black', 'Archivo Narrow', 'Aref Ruqaa', 'Arima Madurai', 'Arimo', 'Arizonia', 'Armata', 'Arsenal', 'Artifika', 'Arvo', 'Arya', 'Asap', 'Asap Condensed', 'Asar', 'Asset', 'Assistant', 'Astloch', 'Asul', 'Athiti', 'Atma', 'Atomic Age', 'Aubrey', 'Audiowide', 'Autour One', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Bad Script', 'Bahiana', 'Baloo', 'Baloo Bhai', 'Baloo Bhaijaan', 'Baloo Bhaina','Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buenard', 'Bungee', 'Bungee Hairline', 'Bungee Inline', 'Bungee Outline', 'Bungee Shade', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Cabin Sketch', 'Caesar Dressing', 'Cagliostro', 'Cairo', 'Calligraffitti', 'Cambay', 'Cambo', 'Candal', 'Cantarell', 'Cantata One', 'Cantora One', 'Capriola', 'Cardo', 'Carme', 'Carrois Gothic', 'Carrois Gothic SC', 'Carter One', 'Cormorant Garamond', 'Cormorant Infant', 'Days One', 'Dekko', 'Delius', 'Delius Swash Caps', 'Delius Unicase', 'Della Respira', 'Denk One', 'Devonshire', 'Dhurjati', 'Didact Gothic', 'Diplomata', 'Diplomata SC', 'Do Hyeon', 'Dokdo', 'Domine', 'EB Garamond', 'Eagle Lake', 'East Sea Dokdo', 'Eater', 'Economica', 'Eczar', 'El Messiri', 'Electrolize', 'Elsie', 'Elsie Swash Caps', 'Emblema One', 'Emilys Candy', 'Encode Sans', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fanwood Text', 'Farsan', 'Fascinate', 'Fascinate Inline', 'Gaegu', 'Gafata', 'Galada', 'Galdeano', 'Galindo', 'Gamja Flower', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gidugu', 'Gilda Display', 'Give You Glory', 'Glass Antiqua', 'Glegoo', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Gudea', 'Gugi', 'Gurajada', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Harmattan', 'Homenaje', 'IBM Plex Mono', 'IBM Plex Sans', 'IBM Plex Sans Condensed', 'IBM Plex Serif', 'IM Fell DW Pica', 'IM Fell DW Pica SC', 'IM Fell Double Pica', 'Italiana', 'Italianno', 'Itim', 'Jacques Francois', 'Jacques Francois Shadow', 'Jaldi', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Jomhuria', 'Junge', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kadwa', 'Kalam', 'Kameron', 'Kanit', 'Kantumruy', 'Karla', 'Karma', 'Katibeh', 'Kite One', 'Knewave', 'Kotta One', 'Koulen', 'Kranky', 'Kreon', 'Kristi', 'Krona One', 'Kumar One', 'Kumar One Outline', 'Kurale', 'La Belle Aurore', 'Laila', 'Lakki Reddy', 'Lalezar', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Lovers Quarrel', 'Luckiest Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo Swash Caps', 'Mada', 'Magra', 'Monda', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Nanum Myeongjo', 'Nunito', 'Nunito Sans', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original Surfer', 'Oswald', 'Over the Rainbow', 'Overlock', 'Overlock SC', 'Overpass', 'Overpass Mono', 'Ovo', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans', 'PT Sans Caption', 'PT Sans Narrow', 'PT Serif', 'PT Serif Caption', 'Pacifico', 'Padauk', 'Palanquin', 'Palanquin Dark', 'Pangolin', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Patrick Hand', 'Patrick Hand SC', 'Pattaya', 'Patua One', 'Pavanam', 'Paytone One', 'Peddana', 'Peralta', 'Permanent Marker', 'Petit Formal Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Play', 'Playball', 'Playfair Display', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Poor Story', 'Rosarivo', 'Rouge Script', 'Rozha One', 'Rubik', 'Rubik Mono One', 'Ruda', 'Rufina', 'Ruge Boogie', 'Ruluko', 'Rum Raisin', 'Ruslan Display', 'Russo One', 'Ruthie', 'Rye', 'Sacramento', 'Sahitya', 'Sail', 'Saira', 'Saira Condensed', 'Saira Extra Condensed', 'Saira Semi Condensed', 'Sofia', 'Song Myung', 'Sonsie One', 'Sorts Mill Goudy', 'Source Code Pro', 'Source Sans Pro', 'Source Serif Pro', 'Space Mono', 'Special Elite', 'Spectral', 'Spectral SC', 'Spicy Rice', 'Spinnaker', 'Spirax', 'Squada One', 'Sree Krushnadevaraya', 'Sriracha', 'Stalemate', 'Taviraj', 'Teko', 'Telex', 'Tenali Ramakrishna', 'Tenor Sans', 'Text Me One', 'The Girl Next Door', 'Tienne', 'Tillana', 'Timmana', 'Tinos', 'Titan One', 'Titillium Web', 'Trade Winds', 'Trirong', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen One', 'Ubuntu', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncial Antiqua', 'Underdog', 'Unica One', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro One', 'Varela', 'Varela Round', 'Vast Shadow', 'Vesper Libre', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Vollkorn SC', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Warnes', 'Wellfleet', 'Wendy One', 'Wire One', 'Work Sans', 'Yanone Kaffeesatz', 'Yantramanav', 'Yatra One', 'Yellowtail', 'Yeon Sung', 'Yeseva One', 'Yesteryear', 'Yrsa', 'Zeyada', 'Zilla Slab', 'Zilla Slab Highlight'];

		for (var i = 0; i < googlefonts.length; i++) {
			$('.input_text_fontfamily').append($('<option></option>').attr({'value':googlefonts[i]}).text(googlefonts[i]).css({'font-family':googlefonts[i]}))
		}

		var layer = selectedLayer.attr('class').split(' ')[1];
		var layer_hover = $('.layer_hover[layer='+layer+']');
		$('.input_text_fontfamily').val(selectedLayer.css('font-family').replace(/"/g,""));
		$('.input_text_fontstyle').val(selectedLayer.css('font-style'));
		switch (selectedLayer.css('text-align')) {
			case 'center':
				$('.text_align_item').removeClass('IconButton__selected');
				$('.text_align_item.text_align_center').addClass('IconButton__selected');
				break;
			case 'left':
				$('.text_align_item').removeClass('IconButton__selected');
				$('.text_align_item.text_align_left').addClass('IconButton__selected');
				break;
			case 'right':
				$('.text_align_item').removeClass('IconButton__selected');
				$('.text_align_item.text_align_left').addClass('IconButton__selected');
				break;
		}
		switch (selectedLayer.css('text-transform')) {
			case 'uppercase':
				$('.text_transform_item').removeClass('IconButton__selected');
				$('.text_transform_item.text_transform_uppercase').addClass('IconButton__selected');
				break;
			case 'lowercase':
				$('.text_transform_item').removeClass('IconButton__selected');
				$('.text_transform_item.text_transform_lowercase').addClass('IconButton__selected');
				break;
		}
		if (selectedLayer.css('text-decoration') == 'underline') {
			$('.text_decoration_underline').addClass('IconButton__selected');
		} else {
			$('.text_decoration_underline').removeClass('IconButton__selected');
		}
		var font_size = selectedLayer.css('font-size').substr(0, selectedLayer.css('font-size').length-2);
		$('.input_text_size').val(font_size);
		$('.input_text_size').siblings().css({width: 113/120*font_size+'px'});
		var line_height = selectedLayer.css('line-height').substr(0, selectedLayer.css('line-height').length-2)/font_size;
		$('.input_text_lineheight').val(line_height);
		$('.input_text_lineheight').siblings().css({width: 163/5*line_height+'px'});
		$('.label_text_lineheight').text(line_height);
		var letter_spacing = selectedLayer.css('letter-spacing').substr(0, selectedLayer.css('letter-spacing').length-2);
		$('.input_text_letterspacing').val(letter_spacing);
		$('.label_text_letterspacing').text(letter_spacing);

		//text_text_tool activator
		$('.input_text_fontfamily').change(function() {
			selectedLayer.css({'font-family':$(this).val()});
			layer_hover.css({'font-family':$(this).val()});
			save_slides();
		})
		$('.input_text_fontstyle').change(function() {
			selectedLayer.css({'font-style':$(this).val()});
			layer_hover.css({'font-style':$(this).val()});
			save_slides();
		})
		$('.text_align_center').click(function() {
			selectedLayer.css({'text-align':'center'});
			layer_hover.css({'text-align':'center'});
			$('.text_align_item').removeClass('IconButton__selected');
			$(this).addClass('IconButton__selected');
			save_slides();
		})
		$('.text_align_left').click(function() {
			selectedLayer.css({'text-align':'left'});
			layer_hover.css({'text-align':'left'});
			$('.text_align_item').removeClass('IconButton__selected');
			$(this).addClass('IconButton__selected');
			save_slides();
		})
		$('.text_align_right').click(function() {
			selectedLayer.css({'text-align':'right'});
			layer_hover.css({'text-align':'right'});
			$('.text_align_item').removeClass('IconButton__selected');
			$(this).addClass('IconButton__selected');
			save_slides();
		})
		$('.text_transform_lowercase').click(function() {
			if ($(this).hasClass('IconButton__selected')) {
				selectedLayer.css({'text-transform':'none'});
				layer_hover.css({'text-transform':'none'});
				$('.text_transform_item').removeClass('IconButton__selected');
			} else {
				selectedLayer.css({'text-transform':'lowercase'});
				layer_hover.css({'text-transform':'lowercase'});
				$('.text_transform_item').removeClass('IconButton__selected');
				$(this).addClass('IconButton__selected');
			}
			save_slides();
		})
		$('.text_transform_uppercase').click(function() {
			if ($(this).hasClass('IconButton__selected')) {
				selectedLayer.css({'text-transform':'none'});
				layer_hover.css({'text-transform':'none'});
				$('.text_transform_item').removeClass('IconButton__selected');
			} else {
				selectedLayer.css({'text-transform':'uppercase'});
				layer_hover.css({'text-transform':'uppercase'});
				$('.text_transform_item').removeClass('IconButton__selected');
				$(this).addClass('IconButton__selected');
			}
			save_slides();
		})
		$('.text_decoration_underline').click(function() {
			if ($(this).hasClass('IconButton__selected')) {
				selectedLayer.css({'text-decoration':'none'});
				layer_hover.css({'text-decoration':'none'});
				$(this).removeClass('IconButton__selected');
			} else {
				selectedLayer.css({'text-decoration':'underline'});
				layer_hover.css({'text-decoration':'underline'});
				$(this).addClass('IconButton__selected');
			}
			save_slides();
		})
		document.querySelector('.input_text_size').oninput = function() {
			$('.input_text_size').siblings().css({width: 113/120*this.value+'px'});
			$('.input_text_size').val(this.value);
			selectedLayer.css({'font-size':this.value+'px'});
			layer_hover.css({'font-size':this.value+'px'});
		}
		$('.input_text_size').change(function() {
			$('.input_text_size').val($(this).val());
			$('.input_text_size').siblings().css({width: 113/120*$(this).val()+'px'});
			selectedLayer.css({'font-size':$(this).val()+'px'});
			layer_hover.css({'font-size':$(this).val()+'px'});
			save_slides();
		})
		document.querySelector('.input_text_lineheight').oninput = function() {
			$('.input_text_lineheight').siblings().css({width: 163/5*this.value+'px'});
			$('.label_text_lineheight').text(this.value);
			selectedLayer.css({'line-height':this.value});
			layer_hover.css({'line-height':this.value});
		}
		$('.input_text_lineheight').change(function() { save_slides(); })
		document.querySelector('.input_text_letterspacing').oninput = function() {
			if (this.value > 0) {
				$('.input_text_letterspacing').siblings().css({width: 163/40*this.value+'px'});
				$('.label_text_letterspacing').text(this.value);
			} else {
				var width = 163/40*this.value*(-1);
				$('.input_text_letterspacing').siblings().css({width: width+'px', left:(88-width)+'px'});
				$('.label_text_letterspacing').text(this.value);
			}
			selectedLayer.css({'letter-spacing':this.value+'px'});
			layer_hover.css({'letter-spacing':this.value+'px'});
		}
		$('.input_text_letterspacing').change(function() { save_slides(); })
	}
	var text_color = function () {

		var text_color_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Color</span></div><div class='InspectorPanel__group'><div class='ColorPickerGroup__colorPickerGroup'><div class='SelectedColor__selectedColorFrame SelectedColor__withHover' style='cursor: pointer;'><input class='input_text_color' type='color'></div><div><input type='text' class='input_text_color TextInput__defaultTextInput TextInput__white' maxlength='7' placeholder='' width='100%' value='#000' style='width: 70px; height: 28px; font-weight: 400; font-size: 12px; margin-top: 1px; padding-left: 3px;'></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Opacity</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_text_opacity BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>100</label><input id='editableLabel0.7818806386752715' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span><span class='InspectorPanel__percent'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>%</span></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_text_opacity' type='range' min='0' max='100' step='1' value='100'><div class='Slider__progressBarr' style='width: 165px; left: 0px;'></div></div></div><div style='padding-top: 10px;'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Blur</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_text_blur BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>0</label><input id='editableLabel0.410340608183861' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_text_blur' type='range' min='0' max='10' step='1' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 0px;'></div></div></div></div><div class='InspectorPanel__inspectorPanel InspectorPanel__extraShadow' style='top: 183px;'><div><div class='InspectorPanel__group InspectorPanel__dropShadowGroup' style='padding-bottom:10px;'><div class='Checkbox__checkbox Checkbox__blue'><label for='checkbox'><input class='input_shadow' type='checkbox' name='checkbox' class='Checkbox__checkboxInput'><div class='Checkbox__checkboxBackground Checkbox__blue Checkbox__roundedRectangle' style='margin-right: 8px;'><div class='Checkbox__checkmark Checkbox__blue Checkbox__roundedRectangle'></div></div><span>Drop Shadow</span></label></div></div><div class='shadow_panel' style='display:none;'><div class='InspectorPanel__group InspectorPanel__opacityColor clearfix editor'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Opacity</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_opacity BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>100</label></div></span><span class='InspectorPanel__percent'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>%</span></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_opacity' type='range' min='0' max='100' step='1' value='100'><div class='Slider__progressBarr' style='width: 165px; left: 0px;'></div></div></div><div class='InspectorPanel__selectColor'><div class='SelectedColor__selectedColorFrame SelectedColor__withHover' style='cursor: pointer;'><input class='input_shadow_color' type='color'></div></div></div><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Vertical Shadow</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_vertical BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>0</label></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_vertical' type='range' min='-100' max='100' step='1' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 88px;'></div></div></div></div><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Horizontal Shadow</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_horizontal BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>0</label><input id='editableLabel0.8720963831172428' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='4' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_horizontal' type='range' min='-100' max='100' step='1' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 88px;'></div></div></div></div><div class='InspectorPanel__group'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Blur</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_shadow_blur BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>3</label></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_shadow_blur' type='range' min='0' max='100' step='1' value='3'><div class='Slider__progressBarr' style='width: 4px; left: 0px;'></div></div></div></div></div></div></div></div>";

		$('#select_tool_panel').html(text_color_panel);

		$('.input_text_color').val(rgb2hex(selectedLayer.css('color')));
		$('.input_text_opacity').val(selectedLayer.css('opacity')*100)
		$('.label_text_opacity').text(selectedLayer.css('opacity')*100)
		if (selectedLayer.css('filter') != 'none') {
			var str = selectedLayer.css('filter').split(' ');
			for (var i = 0; i < str.length; i++) {
				if (str[i].includes('blur')) {
					var value = str[i].slice(5, str[i].length-3);
					$('.input_text_blur').siblings().css({width: 176/10*value+'px'});
					$('.input_text_blur').val(value);
					$('.label_text_blur').text(value);
				}
			}
		}
		if (selectedLayer.css('text-shadow') != 'none') {
			var str = selectedLayer.css('text-shadow');
			if (str != 'none') {
				var drop_shadow = str.trim().split('(').join('').split('px').join('').replace('rgb','').replace(')','').split(',').join('').split(' ');
				$('.input_shadow').prop('checked', true);
				$('.shadow_panel').css('display', 'block');
				var shadow_color, shadow_horizontal, shadow_vertical, shadow_opacity, shadow_blur;
				if (drop_shadow[0].includes('a')) {
					shadow_color = rgb2hex('rgb('+drop_shadow[0].replace('a','')+', '+drop_shadow[1]+', '+drop_shadow[2]+')');
					shadow_opacity = Number(drop_shadow[3])*100;
					shadow_horizontal = drop_shadow[4];
					shadow_vertical = drop_shadow[5];
					shadow_blur = drop_shadow[6];
				} else {
					shadow_color = rgb2hex('rgb('+drop_shadow[0]+', '+drop_shadow[1]+', '+drop_shadow[2]+')');
					shadow_opacity = 100;
					shadow_horizontal = drop_shadow[3];
					shadow_vertical = drop_shadow[4];
					shadow_blur = drop_shadow[5];
				}
				$('.input_shadow_color').val(shadow_color);
				$('.input_shadow_opacity').val(shadow_opacity);
				$('.input_shadow_horizontal').val(shadow_horizontal);
				$('.input_shadow_vertical').val(shadow_vertical);
				$('.input_shadow_blur').val(shadow_blur);
			}
		}
		//activator
		$('.input_shadow').change(function() {
			var filter;
			if($(this).prop("checked") == true) {
				var shadow_color = hex2rgb($('.input_shadow_color').val());
				shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';
				$('.shadow_panel').css('display', 'block');
				filter = shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px';
				selectedLayer.css('text-shadow', filter);
			} else {
				$('.shadow_panel').css('display', 'none');
				selectedLayer.css('text-shadow', 'none');
			}
		})
		$('.input_shadow_color').change(function() {
			var shadow_color = hex2rgb($(this).val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';
			var text_shadow = shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px';
			selectedLayer.css('text-shadow', text_shadow);
		})
		document.querySelector('.input_shadow_opacity').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+(this.value/100)+')';

			var text_shadow = shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px';
			selectedLayer.css('text-shadow', text_shadow);
		}
		document.querySelector('.input_shadow_horizontal').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';

			var text_shadow = shadow_color+' '+this.value+'px '+$('.input_shadow_vertical').val()+'px '+$('.input_shadow_blur').val()+'px';
			selectedLayer.css('text-shadow', text_shadow);
		}
		document.querySelector('.input_shadow_vertical').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';

			var text_shadow = shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+this.value+'px '+$('.input_shadow_blur').val()+'px';
			selectedLayer.css('text-shadow', text_shadow);
		}
		document.querySelector('.input_shadow_blur').oninput = function() {
			var shadow_color = hex2rgb($('.input_shadow_color').val());
			shadow_color = 'rgba('+shadow_color.r+', '+shadow_color.g+', '+shadow_color.b+', '+($('.input_shadow_opacity').val()/100)+')';

			var text_shadow = shadow_color+' '+$('.input_shadow_horizontal').val()+'px '+$('.input_shadow_vertical').val()+'px '+this.value+'px';
			selectedLayer.css('text-shadow', text_shadow);
		}
		//text_color activator
		$('.input_text_color').change(function() {
			$('.input_text_color').val($(this).val());
			selectedLayer.css({'color':$(this).val()});
			save_slides();
		})
		document.querySelector('.input_text_opacity').oninput = function() {
			$('.input_text_opacity').siblings().css({width: 176/100*this.value+'px'});
			$('.label_text_opacity').text(this.value);
			selectedLayer.css({opacity: this.value/100});
		}
		$('.input_text_opacity').change(function() { save_slides(); })
		document.querySelector('.input_text_blur').oninput = function() {
			$('.input_text_blur').siblings().css({width: 176/10*this.value+'px'});
			$('.label_text_blur').text(this.value);
			selectedLayer.css({filter: 'blur('+this.value+'px)'});
		}
		$('.input_text_blur').change(function() { save_slides(); })
	}
	var text_layer = function() {

		var text_layer_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Layer</span></div><div class='InspectorPanel__group' style='margin-bottom: 10px;'><div class='SizeAndPositionGroup__sizeAndPositionGroup'><div class='SizeAndPositionGroup__sizeAndPositionLabel'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Position</span></div><div class='SizeAndPositionGroup__positionInputs'><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>X:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' value='205' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Y:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' value='1190' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div></div></div></div></div>";

		$('#select_tool_panel').html(text_layer_panel);
	}
	var action = function() {

		var action_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Action</span></div><div class='InspectorPanel__group'><div class='InspectorPanel__group'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>On click</span></div><div class='InspectorPanel__group'><div tabindex='0' data-allow-shortcuts='false' class='Select__selectComponent' style='width: 100%;'><div class='Select__select Select__white normal'><select class='input_action' style='width:100%; height:100%;'><option value=''>None</option><option value='GoToURL'>GoToURL</option></select></div></div></div><div class='InspectorPanel__group'><input type='text' class='input_action_url TextInput__defaultTextInput TextInput__white' placeholder='http://example.com' width='100%' style='width: 100%;'></div><div class='InspectorPanel__group'><div tabindex='0' data-allow-shortcuts='false' class='Select__selectComponent' style='width: 100%;'><div class='Select__select Select__white normal'><select style='width:100%; height:100%;'><option value='_blank'>_blank</option><option value='_self'>_self</option><option value='_parent'>_parent</option><option value='_top'>_top</option></select></div></div></div><div><hr><div class='Checkbox__checkbox Checkbox__blue'><label for='checkbox'><input type='checkbox' name='checkbox' class='input_cursor Checkbox__checkboxInput'>Use hand cursor</label></div></div></div></div>";

		$('#select_tool_panel').html(action_panel);
		if (selectedLayer.css('cursor') == 'pointer') {
			$('.input_cursor').prop('checked', true);
		}
		$('.input_action').val(selectedLayer.attr('action'));
		$('.input_action_url').val(selectedLayer.attr('action_url'));

		$('.input_action').change(function() {
			selectedLayer.attr('action', $(this).val());
			save_slides();
		})
		$('.input_action_url').change(function() {
			selectedLayer.attr('action_url', $(this).val());
			save_slides();
		})
		$('.input_cursor').change(function() {
			if ($(this).prop('checked') == true) {
				selectedLayer.css('cursor', 'pointer');
			} else {
				selectedLayer.css('cursor', 'default');
			}
		})
	}
	// button tool activator
	var button_color = function() {

		var button_color_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Color</span></div><div class='InspectorPanel__group'><div class='ColorPickerGroup__colorPickerGroup'><div class='SelectedColor__selectedColorFrame SelectedColor__withHover' style='cursor: pointer;'><input class='input_button_background_color' type='color'></div><div><input type='text' class='input_button_background_color TextInput__defaultTextInput TextInput__white' maxlength='7' placeholder='' width='100%' value='#000' style='width: 70px; height: 28px; font-weight: 400; font-size: 12px; margin-top: 1px; padding-left: 3px;'></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><input class='input_button_background_transparent' type='checkbox'><span style='padding-left:20px; position:absolute; top:93px;'>None</span></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Opacity</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_opacity BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' for='editableLabel0.7509611213412872' style='display: inline-block;'>100</label><input id='editableLabel0.7509611213412872' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='100' style='display: none; padding-top: 1px;'></div></span><span class='InspectorPanel__percent'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>%</span></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_opacity' type='range' min='0' max='100' step='1' value='100'><div class='Slider__progressBarr' style='width: 176px; left: 0px;'></div></div></div><div class='InspectorPanel__group InspectorPanel__dropShadowGroup' style='padding-top: 0px;'><hr class='InspectorPanel__dropShadowSpacer'></div></div>";

		$('#select_tool_panel').html(button_color_panel);

		$('.input_button_background_color').val(rgb2hex(selectedLayer.css('background-color')))
		$('.input_opacity').val(selectedLayer.css('opacity')*100);
		$('.input_opacity').siblings().css({width: 176*selectedLayer.css('opacity')+'px'});
		$('.label_opacity').text(selectedLayer.css('opacity')*100);
		if (rgb2hex(selectedLayer.css('background-color')) == '#000000') {
			$('.input_button_background_transparent').prop('checked', true);
		}
		//activator
		$('.input_button_background_color').change(function() {
			$('.input_button_background_color').val($(this).val());
			selectedLayer.css('background-color', $(this).val());
			save_slides();
		})
		document.querySelector('.input_opacity').oninput = function() {
			$('.input_opacity').siblings().css({width: 176/100*this.value+'px'});
			$('.label_opacity').text(this.value);
			selectedLayer.css({opacity: this.value/100});
		}
		$('.input_opacity').change(function() { save_slides(); })
		$('.input_button_background_transparent').change(function() {
			if ($(this).prop('checked')) {
				selectedLayer.css('background-color', 'transparent');
			} else {
				selectedLayer.css('background-color', $('.input_button_background_color').val());
			}
			save_slides();
		})
	}
	var button_border = function() {

		var button_border_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Border</span></div><div class='Panel__group'><div class='ColorPickerGroup__colorPickerGroup'><div class='SelectedColor__selectedColorFrame SelectedColor__withHover'><input class='input_button_border_color' type='color'></div><div><input type='text' class='input_button_border_color TextInput__defaultTextInput TextInput__white' maxlength='7' placeholder='' width='100%' value='#000000' style='width: 64px; height: 28px; font-weight: 400; font-size: 12px;'></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Weight</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_button_border_weight BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>4</label><input type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='2' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_button_border_weight' type='range' min='0' max='10' step='1' value='4'><div class='Slider__progressBarr' style='width: 66px; left: 0px;'></div></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Opacity</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_button_border_opacity BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' for='editableLabel0.4732611712363466' style='display: inline-block;'>100</label><input id='editableLabel0.4732611712363466' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span><span class='InspectorPanel__percent'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>%</span></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_button_border_opacity' type='range' min='0' max='100' step='1' value='100'><div class='Slider__progressBarr' style='width: 176px; left: 0px;'></div></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Rounded corners</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_button_border_radius BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' for='editableLabel0.23729016433611605' style='display: inline-block;'>47</label><input id='editableLabel0.23729016433611605' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_button_border_radius' type='range' min='0' max='100' step='1' value='47'><div class='Slider__progressBarr' style='width: 77px; left: 0px;'></div></div></div></div></div>";
		$('#select_tool_panel').html(button_border_panel);

		var border_color = selectedLayer.css('border-color');
		$('.input_button_border_color').val(rgb2hex(border_color));
		var border_width = selectedLayer.css('border-left-width').substr(0, selectedLayer.css('border-left-width').length-2);
		$('.input_button_border_weight').val(border_width);
		$('.label_button_border_weight').text(border_width);
		$('.input_button_border_weight').siblings().css({width: 176/10*border_width+'px'});
		var border_radius = selectedLayer.css('border-radius').substr(0, selectedLayer.css('border-radius').length-2);
		$('.input_button_border_radius').val(border_radius);
		$('.label_button_border_radius').text(border_radius);
		$('.input_button_border_radius').siblings().css({width: 176/100*border_radius+'px'});
		$('.input_button_border_opacity').val();
		//activator
		$('.input_button_border_color').change(function() {
			console.log($(this).val())
			$('.input_button_border_color').val($(this).val());
			selectedLayer.css('border-color', $(this).val());
			save_slides();
		})
		document.querySelector('.input_button_border_weight').oninput = function() {
			$('.input_button_border_weight').siblings().css({width: 176/10*this.value+'px'});
			$('.label_button_border_weight').text(this.value);
			var border_color = selectedLayer.css('border-color');
			selectedLayer.css({'border': this.value+'px solid '+border_color});
			var line_height = selectedLayer.css('height').substr(0,selectedLayer.css('height').length-2)-$(this).val()*2;
			selectedLayer.css('line-height', selectedLayer.css('line-height', line_height+'px'));
		}
		$('.input_button_border_weight').change(function() { save_slides(); })
		document.querySelector('.input_button_border_opacity').oninput = function() {
			$('.input_button_border_opacity').siblings().css({width: 176/100*this.value+'px'});
			$('.label_button_border_opacity').text(this.value);
		}
		$('.input_button_border_opacity').change(function() { save_slides(); })
		document.querySelector('.input_button_border_radius').oninput = function() {
			$('.input_button_border_radius').siblings().css({width: 176/100*this.value+'px'});
			$('.label_button_border_radius').text(this.value);
			selectedLayer.css({'border-radius': this.value+'px'});
		}
		$('.input_button_border_radius').change(function() { save_slides(); })
	}
	var button_text = function () {

		var text_text_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>TEXT</span></div><div class='ColorPickerGroup__colorPickerGroup' style='margin-top:10px;'><div class='SelectedColor__selectedColorFrame SelectedColor__withHover' style='cursor: pointer;'><input class='input_text_color' type='color'></div><div><input type='text' class='input_text_color TextInput__defaultTextInput TextInput__white' maxlength='7' placeholder='' width='100%' value='#000' style='width: 70px; height: 28px; font-weight: 400; font-size: 12px; margin-top: 1px; padding-left: 3px;'></div></div><div class='Panel__group'><div class='Panel__label'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Typeface</span></div><div class='Panel__select'><select class='input_text_fontfamily' style='width:100%; height:25px;'></select></div><div class='Panel__select'><select class='input_text_fontstyle' style='width:100%; height:25px;'><option value='normal'>Normal</option><option value='italic'>Italic</option><option value='oblique'>Oblique</option></select></div></div><div class='Panel__fontSize'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Size</span></div><div class='Panel__fontSizeSlider'><div class='white' style='min-height: 18px; position: relative;'><input class='input_text_size' type='range' min='6' max='120' step='1' value='77'><div class='Slider__progressBarr' style='width: 63px; left: 0px;'></div></div></div><div class='Panel__fontSizeSelect'><div tabindex='0' data-allow-shortcuts='false' class='Select__selectComponent' style='width: 100%;'><div class='Select__select Select__white normal Select__noBackgroundHover'><div class='Select__textContainer Select__fontSize Icon'><div class='BaseLabel__editableLabel'><input type='text' class='input_text_size TextInput__editableLabelInput TextInput__normal left TextInput__blue' maxlength='3' value='77' style='border-bottom: none;'></div></div></div></div></div></div><div class='Panel__group'><div class='Panel__group Panel__sliderGroup'><div class='clearfix Panel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Letter Spacing</span><div class='Panel__content'><span><div class='BaseLabel__editableLabel'><label class='label_text_letterspacing BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__bold BaseLabel__small BaseLabel__right BaseLabel__blue' style='display: inline-block;'>0</label><input id='editableLabel0.2700885637027777' type='text' class='TextInput__editableLabelInput TextInput__bold TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_text_letterspacing' type='range' min='-20' max='20' step='1' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 88px;'></div></div></div></div></div>";

		$('#select_tool_panel').html(text_text_panel);

		var googlefonts = ['ABeeZee', 'Abel', 'Abhaya Libre', 'Abril Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent Pro', 'Aguafina Script', 'Akronim', 'Aladin', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya SC', 'Alegreya Sans', 'Arbutus Slab', 'Archivo', 'Archivo Black', 'Archivo Narrow', 'Aref Ruqaa', 'Arima Madurai', 'Arimo', 'Arizonia', 'Armata', 'Arsenal', 'Artifika', 'Arvo', 'Arya', 'Asap', 'Asap Condensed', 'Asar', 'Asset', 'Assistant', 'Astloch', 'Asul', 'Athiti', 'Atma', 'Atomic Age', 'Aubrey', 'Audiowide', 'Autour One', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Bad Script', 'Bahiana', 'Baloo', 'Baloo Bhai', 'Baloo Bhaijaan', 'Baloo Bhaina','Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buenard', 'Bungee', 'Bungee Hairline', 'Bungee Inline', 'Bungee Outline', 'Bungee Shade', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Cabin Sketch', 'Caesar Dressing', 'Cagliostro', 'Cairo', 'Calligraffitti', 'Cambay', 'Cambo', 'Candal', 'Cantarell', 'Cantata One', 'Cantora One', 'Capriola', 'Cardo', 'Carme', 'Carrois Gothic', 'Carrois Gothic SC', 'Carter One', 'Cormorant Garamond', 'Cormorant Infant', 'Days One', 'Dekko', 'Delius', 'Delius Swash Caps', 'Delius Unicase', 'Della Respira', 'Denk One', 'Devonshire', 'Dhurjati', 'Didact Gothic', 'Diplomata', 'Diplomata SC', 'Do Hyeon', 'Dokdo', 'Domine', 'EB Garamond', 'Eagle Lake', 'East Sea Dokdo', 'Eater', 'Economica', 'Eczar', 'El Messiri', 'Electrolize', 'Elsie', 'Elsie Swash Caps', 'Emblema One', 'Emilys Candy', 'Encode Sans', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fanwood Text', 'Farsan', 'Fascinate', 'Fascinate Inline', 'Gaegu', 'Gafata', 'Galada', 'Galdeano', 'Galindo', 'Gamja Flower', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gidugu', 'Gilda Display', 'Give You Glory', 'Glass Antiqua', 'Glegoo', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Gudea', 'Gugi', 'Gurajada', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Harmattan', 'Homenaje', 'IBM Plex Mono', 'IBM Plex Sans', 'IBM Plex Sans Condensed', 'IBM Plex Serif', 'IM Fell DW Pica', 'IM Fell DW Pica SC', 'IM Fell Double Pica', 'Italiana', 'Italianno', 'Itim', 'Jacques Francois', 'Jacques Francois Shadow', 'Jaldi', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Jomhuria', 'Junge', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kadwa', 'Kalam', 'Kameron', 'Kanit', 'Kantumruy', 'Karla', 'Karma', 'Katibeh', 'Kite One', 'Knewave', 'Kotta One', 'Koulen', 'Kranky', 'Kreon', 'Kristi', 'Krona One', 'Kumar One', 'Kumar One Outline', 'Kurale', 'La Belle Aurore', 'Laila', 'Lakki Reddy', 'Lalezar', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Lovers Quarrel', 'Luckiest Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo Swash Caps', 'Mada', 'Magra', 'Monda', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Nanum Myeongjo', 'Nunito', 'Nunito Sans', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original Surfer', 'Oswald', 'Over the Rainbow', 'Overlock', 'Overlock SC', 'Overpass', 'Overpass Mono', 'Ovo', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans', 'PT Sans Caption', 'PT Sans Narrow', 'PT Serif', 'PT Serif Caption', 'Pacifico', 'Padauk', 'Palanquin', 'Palanquin Dark', 'Pangolin', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Patrick Hand', 'Patrick Hand SC', 'Pattaya', 'Patua One', 'Pavanam', 'Paytone One', 'Peddana', 'Peralta', 'Permanent Marker', 'Petit Formal Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Play', 'Playball', 'Playfair Display', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Poor Story', 'Rosarivo', 'Rouge Script', 'Rozha One', 'Rubik', 'Rubik Mono One', 'Ruda', 'Rufina', 'Ruge Boogie', 'Ruluko', 'Rum Raisin', 'Ruslan Display', 'Russo One', 'Ruthie', 'Rye', 'Sacramento', 'Sahitya', 'Sail', 'Saira', 'Saira Condensed', 'Saira Extra Condensed', 'Saira Semi Condensed', 'Sofia', 'Song Myung', 'Sonsie One', 'Sorts Mill Goudy', 'Source Code Pro', 'Source Sans Pro', 'Source Serif Pro', 'Space Mono', 'Special Elite', 'Spectral', 'Spectral SC', 'Spicy Rice', 'Spinnaker', 'Spirax', 'Squada One', 'Sree Krushnadevaraya', 'Sriracha', 'Stalemate', 'Taviraj', 'Teko', 'Telex', 'Tenali Ramakrishna', 'Tenor Sans', 'Text Me One', 'The Girl Next Door', 'Tienne', 'Tillana', 'Timmana', 'Tinos', 'Titan One', 'Titillium Web', 'Trade Winds', 'Trirong', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen One', 'Ubuntu', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncial Antiqua', 'Underdog', 'Unica One', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro One', 'Varela', 'Varela Round', 'Vast Shadow', 'Vesper Libre', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Vollkorn SC', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Warnes', 'Wellfleet', 'Wendy One', 'Wire One', 'Work Sans', 'Yanone Kaffeesatz', 'Yantramanav', 'Yatra One', 'Yellowtail', 'Yeon Sung', 'Yeseva One', 'Yesteryear', 'Yrsa', 'Zeyada', 'Zilla Slab', 'Zilla Slab Highlight'];

		for (var i = 0; i < googlefonts.length; i++) {
			$('.input_text_fontfamily').append($('<option></option>').attr({'value':googlefonts[i]}).text(googlefonts[i]).css({'font-family':googlefonts[i]}))
		}

		var layer = selectedLayer.attr('class').split(' ')[1];
		var layer_hover = $('.layer_hover[layer='+layer+']');
		$('.input_text_color').val(rgb2hex(selectedLayer.css('color')));
		$('.input_text_fontfamily').val(selectedLayer.css('font-family').replace(/"/g,""));
		$('.input_text_fontstyle').val(selectedLayer.css('font-style'));
		var font_size = selectedLayer.css('font-size').substr(0, selectedLayer.css('font-size').length-2);
		$('.input_text_size').val(font_size);
		$('.input_text_size').siblings().css({width: 113/120*font_size+'px'});
		var line_height = selectedLayer.css('line-height').substr(0, selectedLayer.css('line-height').length-2)/font_size;
		$('.input_text_lineheight').val(line_height);
		$('.input_text_lineheight').siblings().css({width: 163/5*line_height+'px'});
		$('.label_text_lineheight').text(line_height);
		var letter_spacing = selectedLayer.css('letter-spacing').substr(0, selectedLayer.css('letter-spacing').length-2);
		$('.input_text_letterspacing').val(letter_spacing);
		$('.label_text_letterspacing').text(letter_spacing);

		//text_text_tool activator
		$('.input_text_color').change(function() {
			$('.input_text_color').val($(this).val());
			selectedLayer.css({'color':$(this).val()});
			save_slides();
		})
		$('.input_text_fontfamily').change(function() {
			selectedLayer.css({'font-family':$(this).val()});
			layer_hover.css({'font-family':$(this).val()});
			save_slides();
		})
		$('.input_text_fontstyle').change(function() {
			selectedLayer.css({'font-style':$(this).val()});
			layer_hover.css({'font-style':$(this).val()});
			save_slides();
		})
		$('.text_align_center').click(function() {
			selectedLayer.css({'text-align':'center'});
			layer_hover.css({'text-align':'center'});
			$('.text_align_item').removeClass('IconButton__selected');
			$(this).addClass('IconButton__selected');
			save_slides();
		})
		$('.text_align_left').click(function() {
			selectedLayer.css({'text-align':'left'});
			layer_hover.css({'text-align':'left'});
			$('.text_align_item').removeClass('IconButton__selected');
			$(this).addClass('IconButton__selected');
			save_slides();
		})
		$('.text_align_right').click(function() {
			selectedLayer.css({'text-align':'right'});
			layer_hover.css({'text-align':'right'});
			$('.text_align_item').removeClass('IconButton__selected');
			$(this).addClass('IconButton__selected');
			save_slides();
		})
		$('.text_transform_lowercase').click(function() {
			if ($(this).hasClass('IconButton__selected')) {
				selectedLayer.css({'text-transform':'none'});
				layer_hover.css({'text-transform':'none'});
				$('.text_transform_item').removeClass('IconButton__selected');
			} else {
				selectedLayer.css({'text-transform':'lowercase'});
				layer_hover.css({'text-transform':'lowercase'});
				$('.text_transform_item').removeClass('IconButton__selected');
				$(this).addClass('IconButton__selected');
			}
			save_slides();
		})
		$('.text_transform_uppercase').click(function() {
			if ($(this).hasClass('IconButton__selected')) {
				selectedLayer.css({'text-transform':'none'});
				layer_hover.css({'text-transform':'none'});
				$('.text_transform_item').removeClass('IconButton__selected');
			} else {
				selectedLayer.css({'text-transform':'uppercase'});
				layer_hover.css({'text-transform':'uppercase'});
				$('.text_transform_item').removeClass('IconButton__selected');
				$(this).addClass('IconButton__selected');
			}
			save_slides();
		})
		$('.text_decoration_underline').click(function() {
			if ($(this).hasClass('IconButton__selected')) {
				selectedLayer.css({'text-decoration':'none'});
				layer_hover.css({'text-decoration':'none'});
				$(this).removeClass('IconButton__selected');
			} else {
				selectedLayer.css({'text-decoration':'underline'});
				layer_hover.css({'text-decoration':'underline'});
				$(this).addClass('IconButton__selected');
			}
			save_slides();
		})
		document.querySelector('.input_text_size').oninput = function() {
			$('.input_text_size').siblings().css({width: 113/120*this.value+'px'});
			$('.input_text_size').val(this.value);
			selectedLayer.css({'font-size':this.value+'px'});
			layer_hover.css({'font-size':this.value+'px'});
		}
		$('.input_text_size').change(function() {
			$('.input_text_size').val($(this).val());
			$('.input_text_size').siblings().css({width: 113/120*$(this).val()+'px'});
			selectedLayer.css({'font-size':$(this).val()+'px'});
			layer_hover.css({'font-size':$(this).val()+'px'});
			save_slides();
		})
		document.querySelector('.input_text_letterspacing').oninput = function() {
			if (this.value > 0) {
				$('.input_text_letterspacing').siblings().css({width: 163/40*this.value+'px'});
				$('.label_text_letterspacing').text(this.value);
			} else {
				var width = 163/40*this.value*(-1);
				$('.input_text_letterspacing').siblings().css({width: width+'px', left:(88-width)+'px'});
				$('.label_text_letterspacing').text(this.value);
			}
			selectedLayer.css({'letter-spacing':this.value+'px'});
			layer_hover.css({'letter-spacing':this.value+'px'});
		}
		$('.input_text_letterspacing').change(function() { save_slides(); })
	}
	var button_layer = function() {

		var image_layer_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Layer</span></div><div class='InspectorPanel__group' style='margin-bottom: 10px;'><div class='SizeAndPositionGroup__sizeAndPositionGroup'><div class='SizeAndPositionGroup__sizeAndPositionLabel'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Size and position</span></div><div class='SizeAndPositionGroup__sizeInputs'><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>W:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_width Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>H:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_height Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div></div><div class='SizeAndPositionGroup__positionInputs'><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>X:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_left Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div><div class='SizeAndPositionGroup__sizeAndPositionInputGroup'><div><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Y:</span></div><div class='NumberInput__numberInput' style='height: 28px; width: 58px;'><input class='input_top Input__input Input__whiteBlue Input__medium' type='text' placeholder='' maxlength='5' style='width: 58px; height: 28px;'><div class='NumberInput__controls'><div class='control NumberInput__up' tabindex='-1' draggable='false'></div><div class='control NumberInput__down' tabindex='-1' draggable='false'></div></div></div></div></div></div></div></div>";

		$('#select_tool_panel').html(image_layer_panel);

		var width = selectedLayer.css('width');
		$('.input_width').val(width.substr(0, width.length-2));
		var height = selectedLayer.css('height');
		$('.input_height').val(height.substr(0, height.length-2));
		var left = selectedLayer.css('left');
		$('.input_left').val(left.substr(0, left.length-2));
		var top = selectedLayer.css('top');
		$('.input_top').val(top.substr(0, top.length-2));
		//activator
		$('.input_width').change(function() {
			selectedLayer.css({'width': $(this).val()});
			$('.layer_hover.selected').css({'width': $(this).val()});
			save_slides();
		})
		$('.input_height').change(function() {
			selectedLayer.css({'height': $(this).val()});
			$('.layer_hover.selected').css({'height': $(this).val()});
			save_slides();
		})
		$('.input_left').change(function() {
			selectedLayer.css({'left': $(this).val()+'px'});
			$('.layer_hover.selected').css({'left': $(this).val()+'px'});
			save_slides();
		})
		$('.input_top').change(function() {
			selectedLayer.css({'top': $(this).val()+'px'});
			$('.layer_hover.selected').css({'top': $(this).val()+'px'});
			save_slides();
		})
	}
	// shape tool activator
	var shape_color = function () {

		var image_color_panel = "<div class='InspectorPanel__inspectorPanel' style='width: 200px; left: 75px; top: 90px; z-index: 10000;'><div class='InspectorPanel__panelHeader'><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__white'>Color</span></div><div class='InspectorPanel__group'><div class='ColorPickerGroup__colorPickerGroup'><div class='SelectedColor__selectedColorFrame SelectedColor__withHover' style='cursor: pointer;'><input class='input_shape_color' type='color'></div><div><input type='text' class='input_shape_color TextInput__defaultTextInput TextInput__white' maxlength='7' placeholder='' width='100%' value='#000' style='width: 70px; height: 28px; font-weight: 400; font-size: 12px; margin-top: 1px; padding-left: 3px;'></div></div><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Opacity</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_opacity BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' for='editableLabel0.7509611213412872' style='display: inline-block;'>100</label><input id='editableLabel0.7509611213412872' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='100' style='display: none; padding-top: 1px;'></div></span><span class='InspectorPanel__percent'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>%</span></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_opacity' type='range' min='0' max='100' step='1' value='100'><div class='Slider__progressBarr' style='width: 176px; left: 0px;'></div></div></div><div style='padding-top: 10px;'><div class='InspectorPanel__group InspectorPanel__sliderGroup'><div class='clearfix InspectorPanel__labelCont'><span class='BaseLabel__baseLabel BaseLabel__normal BaseLabel__white'>Blur</span><div class='InspectorPanel__content'><span><div class='BaseLabel__editableLabel'><label class='label_blur BaseLabel__editableLabel BaseLabel__hoverBorder BaseLabel__small BaseLabel__right BaseLabel__blue' for='editableLabel0.5814104305587644' style='display: inline-block;'>0</label><input id='editableLabel0.5814104305587644' type='text' class='TextInput__editableLabelInput TextInput__small TextInput__right TextInput__blue' maxlength='3' value='' style='display: none; padding-top: 1px;'></div></span></div></div><div class='white' style='min-height: 18px; position: relative;'><input class='input_blur' type='range' min='0' max='10' step='0.5' value='0'><div class='Slider__progressBarr' style='width: 0px; left: 0px;'></div></div></div></div><div class='InspectorPanel__group InspectorPanel__dropShadowGroup' style='padding-top: 0px;'><hr class='InspectorPanel__dropShadowSpacer'></div></div>";

		$('#select_tool_panel').html(image_color_panel);

		$('.input_shape_color').val(rgb2hex(selectedLayer.children().css('fill')));
		$('.input_opacity').val(selectedLayer.css('opacity')*100);
		$('.input_opacity').siblings().css({width: 176*selectedLayer.css('opacity')+'px'});
		$('.label_opacity').text(selectedLayer.css('opacity')*100);
		if (selectedLayer.css('filter') != 'none') {
			var str = selectedLayer.css('filter').split(' ');
			for (var i = 0; i < str.length; i++) {
				if (str[i].includes('blur')) {
					var value = str[i].slice(5, str[i].length-3);
					$('.input_blur').siblings().css({width: 176/10*value+'px'});
					$('.input_blur').val(value);
					$('.label_blur').text(value);
				}
			}
		}
		//activator
		$('.input_shape_color').change(function() {
			$('.input_shape_color').val($(this).val());
			selectedLayer.children().css('fill', $(this).val());
			save_slides();
		})
		document.querySelector('.input_opacity').oninput = function() {
			$('.input_opacity').siblings().css({width: 176/100*this.value+'px'});
			$('.label_opacity').text(this.value);
			selectedLayer.css({opacity: this.value/100});
		}
		$('.input_opacity').change(function() { save_slides(); })
		document.querySelector('.input_blur').oninput = function() {
			$('.input_blur').siblings().css({width: 176/10*this.value+'px'});
			$('.label_blur').text(this.value);
			selectedLayer.css({filter: 'blur('+this.value+'px)'});
		}
		$('.input_blur').change(function() { save_slides(); })
	}
}
function sort_slide() {
	var layer = $('#banner_out_area .layer');
	slides[slide_num] = [slides[slide_num][0]];
	ary = [];
	for (var i = 0; i < layer.length; i++) {
		ary[$(layer[i]).attr('sort_num')] = layer[i].outerHTML;
	}
	for (var i = 0; i < ary.length; i++) {
		if (ary[i] != undefined) {
			slides[slide_num].push(ary[i])
		}
	}
	populate_editor();
}
function layer_activator() {
	
	var draggable_activator = function() {
		interact('.layer_hover').draggable({
		    restrict: {
				restriction: "#canvas_content",
				endOnly: true,
				elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
		    },
		    onstart: function (event) {
			    var target = event.target;
			    var rect = target.getBoundingClientRect();

			    // store the center as the target has css `transform-origin: center center`
			    target.dataset.centerX = rect.left + rect.width / 2;
			    target.dataset.centerY = rect.top + rect.height / 2;
			    // get the angle of the target when the drag starts
			    target.dataset.angle = getDragAngle(event);
		    },
			onmove: function(event) {
				if (isRotate) {
					var target = event.target;
				    var center = {
				      x: parseFloat(target.dataset.centerX) || 0,
				      y: parseFloat(target.dataset.centerY) || 0,
				    };
				    var angle = getDragAngle(event);

				    // update transform style on dragmove
				    target.style.transform = 'rotate(' + angle + 'rad' + ')';
				    selectedLayer.css({transform: 'rotate(' + angle + 'rad' + ')'});
				} else {
				    var target = event.target,
				        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
			        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
				    target.setAttribute('data-x', x);
				    target.setAttribute('data-y', y);
				    target.setAttribute('contenteditable', 'false');
				    target.style.left = x + 'px';
				    target.style.top = y + 'px';
				    selectedLayer.css({left: x+'px', top: y+'px'});
				}
		    },
		    onend: function(event) {
		    	if (isRotate) {
		    		var target = event.target;

				    // save the angle on dragend
				    target.dataset.angle = getDragAngle(event);
		    	}
		    	event.target.setAttribute('contenteditable', 'false');
		    	save_slides();
		    }
		}).resizable({
		    edges: { right: true, bottom: true },
		    restrictSize: {
		      	min: { width: 10, height: 10 },
		    },
		    inertia: true,
		}).on('resizemove', function (event) {
		    var target = event.target,
		        x = (parseFloat(target.getAttribute('data-x')) || 0),
		        y = (parseFloat(target.getAttribute('data-y')) || 0);
		    x += event.deltaRect.left;
		    y += event.deltaRect.top;
		    target.setAttribute('data-x', x);
		    target.setAttribute('data-y', y);
		    target.style.left = x + 'px';
		    target.style.top = y + 'px';
		    target.style.width = event.rect.width + 'px';
		    target.style.height = event.rect.height + 'px';
		    selectedLayer.css({width: event.rect.width, height: event.rect.height, left: x+'px', top: y+'px'});
		    if (selectedLayer.attr('layer_type') == 'button') {
		    	var line_height = event.rect.height - selectedLayer.css('border-left-width').substr(0,selectedLayer.css('border-left-width').length-2) * 2;
		    	selectedLayer.css({'line-height':line_height+'px'});
		    	$('.layer_hover.selected').css('line-height', event.rect.height+'px');
		    }
		}).on('resizeend', function(event) {
			save_slides();
		})

		function getDragAngle(event) {
		  var target = event.target;
		  var startAngle = parseFloat(target.dataset.angle) || 0;
		  var center = {
		    x: parseFloat(target.dataset.centerX) || 0,
		    y: parseFloat(target.dataset.centerY) || 0,
		  };
		  var angle = Math.atan2(center.y - event.clientY,
		                         center.x - event.clientX);

		  return angle - startAngle;
		}
	}
	if (!layer_hover_activated) {
		layer_hover_activated = true;
		if (isRotate) {
			rotatable_activator();
		} else {
			draggable_activator();
		}
	}
	$('.layer_hover').mousedown(function() {
		selectedLayer = $('.' + $(this).attr('layer'));
		select_layer();
	})
	$('.layer_hover').keydown(function() {
		var layer_hover = $(this);
		setTimeout(function() {
			$(".layer."+layer_hover.attr('layer')).html(layer_hover.html());
			save_slides();
		}, 0)
	})
}
function layer_list_activator() {

	var animation_panel_first = "<div class='BuildPanel__buildPanelContainer' style='width: 220px;'><div class='BuildPanel__header'><div><span class='BuildPanel__buildIcon'><svg width='10' height='10' viewBox='0 0 10 10'><defs><polygon id='build-in-a' points='7 17 17 17 17 7'></polygon></defs><use fill-rule='nonzero' xlink:href='#build-in-a' transform='translate(-7 -7)'></use></svg></span><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__pureWhite'>build In</span></div><div class='BuildPanel__settingsIcon' data-original-title='Advanced mode' title=''><svg><path d='M3,17 L3,19 L9,19 L9,17 L3,17 Z M3,5 L3,7 L13,7 L13,5 L3,5 Z M13,21 L13,19 L21,19 L21,17 L13,17 L13,15 L11,15 L11,21 L13,21 Z M7,9 L7,11 L3,11 L3,13 L7,13 L7,15 L9,15 L9,9 L7,9 Z M21,13 L21,11 L11,11 L11,13 L21,13 Z M15,9 L17,9 L17,7 L21,7 L21,5 L17,5 L17,3 L15,3 L15,9 Z' transform='rotate(90 12 12)'></path></svg></div></div><div class='BuildPanel__body'><span><div class=''><div class='BuildPanel__stickyPresets'><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><path fill='#122f4a' fill-opacity='.8' fill-rule='evenodd' d='M28,26 L37,26 L37,29 L28,29 L28,38 L25,38 L25,29 L16,29 L16,26 L25,26 L25,17 L28,17 L28,26 Z'></path></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Custom</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><path fill='#122f4a' fill-opacity='.8' d='M25.9096788,34.7483868 C31.8957329,34.7483868 36.7483885,29.8957311 36.7483885,23.9096771 C36.7483885,21.6386841 36.0484345,19.4753459 34.7703122,17.6656388 L19.6705411,32.7737683 C21.4792924,34.0497195 23.6407655,34.7483868 25.9096788,34.7483868 Z M32.3665104,15.2031675 C30.5165981,13.8284496 28.2717652,13.0709674 25.9096788,13.0709674 C19.9236247,13.0709674 15.0709691,17.923623 15.0709691,23.9096771 C15.0709691,26.2738456 15.8297934,28.5205347 17.2067471,30.3713223 L32.3665104,15.2031675 Z M26,38 C18.2680135,38 12,31.7319865 12,24 C12,16.2680135 18.2680135,10 26,10 C33.7319865,10 40,16.2680135 40,24 C40,31.7319865 33.7319865,38 26,38 Z'></path></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>None</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><circle cx='26' cy='24' r='14' fill='#122f4a' fill-opacity='.8' fill-rule='evenodd'></circle></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Basic</span></div></div></div><div class='BuildPanel__separator'></div><div><div class='BuildPanel__presets'><div class='BuildPanel__preset BuildPanel__selected'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><rect id='fade-a' width='52' height='40'></rect><filter id='fade-b' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><rect id='fade-a' width='52' height='40'></rect><circle cx='19' cy='24' r='14' fill='#122f4a' fill-opacity='.2' filter='url(#fade-b)' mask='url(#fade-c)'></circle><circle cx='33' cy='24' r='14' fill='#122f4a' fill-opacity='.8' mask='url(#fade-c)'></circle></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Fade</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='soft-blur-a' width='121.4%' height='121.4%' x='-10.7%' y='-10.7%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic' stdDeviation='1'></feGaussianBlur></filter><filter id='soft-blur-b' width='121.4%' height='121.4%' x='-10.7%' y='-10.7%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic' stdDeviation='1'></feGaussianBlur></filter></defs><g fill='#122f4a' fill-rule='evenodd'><circle cx='19' cy='24' r='14' fill-opacity='.2' filter='url(#soft-blur-a)'></circle><circle cx='33' cy='24' r='14' fill-opacity='.8' filter='url(#soft-blur-b)'></circle></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Softblur</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='blur-a' width='142.9%' height='142.9%' x='-21.4%' y='-21.4%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic' stdDeviation='2'></feGaussianBlur></filter><filter id='blur-b' width='142.9%' height='142.9%' x='-21.4%' y='-21.4%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic' stdDeviation='2'></feGaussianBlur></filter></defs><g fill='#122f4a' fill-rule='evenodd'><circle cx='19' cy='24' r='14' fill-opacity='.2' filter='url(#blur-a)'></circle><circle cx='33' cy='24' r='14' fill-opacity='.6' filter='url(#blur-b)'></circle></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Hardblur</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.2' d='M46,40 L6,40 C6,28.954305 14.954305,20 26,20 C37.045695,20 46,28.954305 46,40 Z'></path><path fill-opacity='.16' d='M40.1152914,40 L11.8799973,40 C11.8799973,32.2030388 18.2006831,25.8823529 25.9976443,25.8823529 C33.7946055,25.8823529 40.1152914,32.2030388 40.1152914,40 Z'></path><path d='M34.2352941,40 L17.7647059,40 C17.7647059,35.4517726 21.4517726,31.7647059 26,31.7647059 C30.5482274,31.7647059 34.2352941,35.4517726 34.2352941,40 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Scaleup</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.2' d='M46,20 L6,20 C6,8.954305 14.954305,-4.97379915e-14 26,-4.97379915e-14 C37.045695,-4.97379915e-14 46,8.954305 46,20 Z' transform='matrix(1 0 0 -1 0 20)'></path><path fill-opacity='.16' d='M40.1152914,14.1176471 L11.8799973,14.1176471 C11.8799973,6.32068589 18.2006831,8.8817842e-16 25.9976443,8.8817842e-16 C33.7946055,8.8817842e-16 40.1152914,6.32068589 40.1152914,14.1176471 Z' transform='matrix(1 0 0 -1 0 14.118)'></path><path d='M34.2352941,8.23529412 L17.7647059,8.23529412 C17.7647059,3.68706677 21.4517726,-2.34479103e-13 26,-2.34479103e-13 C30.5482274,-2.34479103e-13 34.2352941,3.68706677 34.2352941,8.23529412 Z' transform='matrix(1 0 0 -1 0 8.235)'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Scaledown</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='slide-right-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='20' cy='24' r='14' fill='#122f4a' fill-opacity='.2' filter='url(#slide-right-a)'></circle><circle cx='32' cy='24' r='14' fill='#122f4a' fill-opacity='.8'></circle><path fill='#FFF' d='M32,26 L26,26 L26,22 L32,22 L32,18 L39.0673828,24 L32,30 L32,26 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Slideright</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='slide-left-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='32' cy='24' r='14' fill='#122f4a' fill-opacity='.2' filter='url(#slide-left-a)' transform='matrix(-1 0 0 1 64 0)'></circle><circle cx='20' cy='24' r='14' fill='#122f4a' fill-opacity='.8' transform='matrix(-1 0 0 1 40 0)'></circle><path fill='#FFF' d='M20,22 L26,22 L26,26 L20,26 L20,30 L12.9326172,24 L20,18 L20,22 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Slideleft</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='slide-up-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='25' cy='17' r='14' fill='#122f4a' fill-opacity='.2' filter='url(#slide-up-a)' transform='matrix(-1 0 0 1 50 0)'></circle><circle cx='25' cy='26' r='14' fill='#122f4a' fill-opacity='.8' transform='matrix(-1 0 0 1 50 0)'></circle><path fill='#FFF' d='M23,26 L23,20 L27,20 L27,26 L31,26 L25,33.0673828 L19,26 L23,26 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Slidedown</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='slide-down-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='25' cy='26' r='14' fill='#122f4a' fill-opacity='.2' filter='url(#slide-down-a)' transform='matrix(-1 0 0 1 50 0)'></circle><circle cx='25' cy='17' r='14' fill='#122f4a' fill-opacity='.8' transform='matrix(-1 0 0 1 50 0)'></circle><path fill='#FFF' d='M27,17 L27,23 L23,23 L23,17 L19,17 L25,9.93261719 L31,17 L27,17 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Slideup</span></div></div></div></div></div></span></div><div class='BuildPanel__footer'><div class='BuildPanel__arrow BuildPanel__left' data='none'><div class='IconButton__iconButton IconButton__darkGrey IconButton__medium IconButton__disabled'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><polygon points='7.41 9 12 13.58 16.59 9 18 10.41 12 16.41 6 10.41'></polygon></g></svg></div></div></div></div><div class='BuildPanel__pagesBullets'><div class='BuildPanel__bullet BuildPanel__selected'></div><div class='BuildPanel__bullet'></div><div class='BuildPanel__bullet'></div></div><div class='BuildPanel__arrow BuildPanel__right' data='second'><div class='IconButton__iconButton IconButton__darkGrey IconButton__medium'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><polygon points='7.41 9 12 13.58 16.59 9 18 10.41 12 16.41 6 10.41'></polygon></g></svg></div></div></div></div></div></div>";
	var animation_panel_second = "<div class='BuildPanel__buildPanelContainer' style='width: 220px;'><div class='BuildPanel__header'><div><span class='BuildPanel__buildIcon'><svg width='10' height='10' viewBox='0 0 10 10'><defs><polygon id='build-in-a' points='7 17 17 17 17 7'></polygon></defs><use fill-rule='nonzero' xlink:href='#build-in-a' transform='translate(-7 -7)'></use></svg></span><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__pureWhite'>build In</span></div><div class='BuildPanel__settingsIcon' data-original-title='' title=''><svg><path d='M3,17 L3,19 L9,19 L9,17 L3,17 Z M3,5 L3,7 L13,7 L13,5 L3,5 Z M13,21 L13,19 L21,19 L21,17 L13,17 L13,15 L11,15 L11,21 L13,21 Z M7,9 L7,11 L3,11 L3,13 L7,13 L7,15 L9,15 L9,9 L7,9 Z M21,13 L21,11 L11,11 L11,13 L21,13 Z M15,9 L17,9 L17,7 L21,7 L21,5 L17,5 L17,3 L15,3 L15,9 Z' transform='rotate(90 12 12)'></path></svg></div></div><div class='BuildPanel__body'><span><div><div class='BuildPanel__stickyPresets'><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><path fill='#122f4a' fill-opacity='.8' fill-rule='evenodd' d='M28,26 L37,26 L37,29 L28,29 L28,38 L25,38 L25,29 L16,29 L16,26 L25,26 L25,17 L28,17 L28,26 Z'></path></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Custom</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><path fill='#122f4a' fill-opacity='.8' d='M25.9096788,34.7483868 C31.8957329,34.7483868 36.7483885,29.8957311 36.7483885,23.9096771 C36.7483885,21.6386841 36.0484345,19.4753459 34.7703122,17.6656388 L19.6705411,32.7737683 C21.4792924,34.0497195 23.6407655,34.7483868 25.9096788,34.7483868 Z M32.3665104,15.2031675 C30.5165981,13.8284496 28.2717652,13.0709674 25.9096788,13.0709674 C19.9236247,13.0709674 15.0709691,17.923623 15.0709691,23.9096771 C15.0709691,26.2738456 15.8297934,28.5205347 17.2067471,30.3713223 L32.3665104,15.2031675 Z M26,38 C18.2680135,38 12,31.7319865 12,24 C12,16.2680135 18.2680135,10 26,10 C33.7319865,10 40,16.2680135 40,24 C40,31.7319865 33.7319865,38 26,38 Z'></path></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>None</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><circle cx='26' cy='24' r='14' fill='#122f4a' fill-opacity='.8' fill-rule='evenodd'></circle></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Basic</span></div></div></div><div class='BuildPanel__separator'></div><div><div class='BuildPanel__presets'><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><circle cx='26' cy='22' r='18' fill-opacity='.2' transform='matrix(1 0 0 -1 0 44)'></circle><circle cx='26' cy='22' r='13' fill-opacity='.4' transform='matrix(1 0 0 -1 0 44)'></circle><circle cx='26' cy='22' r='8' transform='matrix(1 0 0 -1 0 44)'></circle></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Blow</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='glide-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter><filter id='glide-b' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='17' cy='25' r='11' fill='#122f4a' fill-opacity='.2' filter='url(#glide-a)'></circle><circle cx='26' cy='25' r='11' fill='#122f4a' fill-opacity='.4' filter='url(#glide-b)'></circle><circle cx='35' cy='25' r='11' fill='#122f4a' fill-opacity='.8'></circle><path fill='#FFF' d='M42,25 L36,30 L36,20 L42,25 Z M36,25 L30,30 L30,20 L36,25 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Glide</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='elastic-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter><filter id='elastic-b' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='25' cy='29' r='11' fill='#122f4a' fill-opacity='.2' filter='url(#elastic-a)' transform='matrix(-1 0 0 1 50 0)'></circle><circle cx='25' cy='22' r='11' fill='#122f4a' fill-opacity='.4' filter='url(#elastic-b)' transform='matrix(-1 0 0 1 50 0)'></circle><circle cx='25' cy='15' r='11' fill='#122f4a' fill-opacity='.8' transform='matrix(-1 0 0 1 50 0)'></circle><path fill='#FFF' d='M25.0280996,14.188623 L20.99278,8.98028963 L28.99278,8.98028963 L25.0280996,14.188623 Z M25.0280996,14.811377 L28.99278,20.0197104 L20.99278,20.0197104 L25.0280996,14.811377 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Elastic</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='bounce-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter><filter id='bounce-b' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='25' cy='15' r='11' fill='#122f4a' fill-opacity='.2' filter='url(#bounce-a)' transform='matrix(1 0 0 -1 0 30)'></circle><circle cx='25' cy='22' r='11' fill='#122f4a' fill-opacity='.4' filter='url(#bounce-b)' transform='matrix(1 0 0 -1 0 44)'></circle><circle cx='25' cy='29' r='11' fill='#122f4a' fill-opacity='.8' transform='matrix(1 0 0 -1 0 58)'></circle><path fill='#FFF' d='M24.9719004,36.188623 L21.00722,30.9802896 L29.00722,30.9802896 L24.9719004,36.188623 Z M24.9719004,22.811377 L29.00722,28.0197104 L21.00722,28.0197104 L24.9719004,22.811377 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Bounce</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.2' d='M26,4 C35.9411255,4 44,12.0588745 44,22 C44,31.9411255 35.9411255,40 26,40 C16.0588745,40 8,31.9411255 8,22 C8,12.0588745 16.0588745,4 26,4 Z M26,9 C18.8202983,9 13,14.8202983 13,22 C13,29.1797017 18.8202983,35 26,35 C33.1797017,35 39,29.1797017 39,22 C39,14.8202983 33.1797017,9 26,9 Z'></path><circle cx='26' cy='22' r='8' transform='matrix(1 0 0 -1 0 44)'></circle></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Grow</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='none' fill-rule='evenodd'><rect width='22' height='22' x='24' y='13' fill='#585B6B' rx='2'></rect><rect width='22' height='22' x='15' y='13' fill='#122f4a' fill-opacity='.4' rx='2' transform='rotate(-15 26 24)'></rect><rect width='22' height='22' x='7' y='13' fill='#122f4a' fill-opacity='.2' rx='2' transform='rotate(-30 18 24)'></rect><path fill='#FFF' d='M35,26 L29,26 L29,22 L35,22 L35,18 L42.0673828,24 L35,30 L35,26 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Runright</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='none' fill-rule='evenodd'><rect width='22' height='22' x='15' y='13' fill='#122f4a' fill-opacity='.4' rx='2' transform='scale(-1 1) rotate(-15 0 221.49)'></rect><rect width='22' height='22' x='23' y='13' fill='#122f4a' fill-opacity='.2' rx='2' transform='scale(-1 1) rotate(-30 0 150.89)'></rect><rect width='22' height='22' x='6' y='13' fill='#122f4a' fill-opacity='.8' rx='2' transform='matrix(-1 0 0 1 34 0)'></rect><path fill='#FFF' d='M17,22 L23,22 L23,26 L17,26 L17,30 L9.93261719,24 L17,18 L17,22 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Runleft</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='none' fill-rule='evenodd'><rect width='20' height='20' x='16' y='12' fill='#122f4a' fill-opacity='.4' rx='2' transform='scale(-1 1) rotate(60 0 -23.033)'></rect><rect width='20' height='20' x='15' y='8' fill='#122f4a' fill-opacity='.2' rx='2' transform='scale(-1 1) rotate(75 0 -14.58)'></rect><rect width='20' height='20' x='16' y='16' fill='#122f4a' fill-opacity='.8' rx='2' transform='scale(1 -1) rotate(-45 -36.77 0)'></rect><path fill='#FFF' d='M24,26 L24,20 L28,20 L28,26 L32,26 L26,33.0673828 L20,26 L24,26 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Rolldown</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><rect id='roll-up-a' width='52' height='40'></rect></defs><g fill='none' fill-rule='evenodd'><mask id='roll-up-b' fill='#fff'><rect id='roll-up-a' width='52' height='40'></rect></mask><rect width='20' height='20' x='16' y='14' fill='#122f4a' fill-opacity='.4' mask='url(#roll-up-b)' rx='2' transform='rotate(-120 26 24)'></rect><rect width='20' height='20' x='15' y='18' fill='#122f4a' fill-opacity='.2' mask='url(#roll-up-b)' rx='2' transform='rotate(-105 25 28)'></rect><rect width='20' height='20' x='16' y='10' fill='#122f4a' fill-opacity='.8' mask='url(#roll-up-b)' rx='2' transform='rotate(-45 26 20)'></rect><path fill='#FFF' d='M28,20 L28,26 L24,26 L24,20 L20,20 L26,12.9326172 L32,20 L28,20 Z' mask='url(#roll-up-b)'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Rollup</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div></div></div></div></span></div><div class='BuildPanel__footer'><div class='BuildPanel__arrow BuildPanel__left' data='first'><div class='IconButton__iconButton IconButton__darkGrey IconButton__medium'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><polygon points='7.41 9 12 13.58 16.59 9 18 10.41 12 16.41 6 10.41'></polygon></g></svg></div></div></div></div><div class='BuildPanel__pagesBullets'><div class='BuildPanel__bullet'></div><div class='BuildPanel__bullet BuildPanel__selected'></div><div class='BuildPanel__bullet'></div></div><div class='BuildPanel__arrow BuildPanel__right' data='third'><div class='IconButton__iconButton IconButton__darkGrey IconButton__medium'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><polygon points='7.41 9 12 13.58 16.59 9 18 10.41 12 16.41 6 10.41'></polygon></g></svg></div></div></div></div></div></div></div>";
	var animation_panel_third = "<div class='BuildPanel__buildPanelContainer' style='width: 220px;'><div class='BuildPanel__header'><div><span class='BuildPanel__buildIcon'><svg width='10' height='10' viewBox='0 0 10 10'><defs><polygon id='build-in-a' points='7 17 17 17 17 7'></polygon></defs><use fill-rule='nonzero' xlink:href='#build-in-a' transform='translate(-7 -7)'></use></svg></span><span class='BaseLabel__baseLabel BaseLabel__smedium BaseLabel__pureWhite'>build In</span></div><div class='BuildPanel__settingsIcon' data-original-title='' title=''><svg><path d='M3,17 L3,19 L9,19 L9,17 L3,17 Z M3,5 L3,7 L13,7 L13,5 L3,5 Z M13,21 L13,19 L21,19 L21,17 L13,17 L13,15 L11,15 L11,21 L13,21 Z M7,9 L7,11 L3,11 L3,13 L7,13 L7,15 L9,15 L9,9 L7,9 Z M21,13 L21,11 L11,11 L11,13 L21,13 Z M15,9 L17,9 L17,7 L21,7 L21,5 L17,5 L17,3 L15,3 L15,9 Z' transform='rotate(90 12 12)'></path></svg></div></div><div class='BuildPanel__body'><span><div><div class='BuildPanel__stickyPresets'><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><path fill='#122f4a' fill-opacity='.8' fill-rule='evenodd' d='M28,26 L37,26 L37,29 L28,29 L28,38 L25,38 L25,29 L16,29 L16,26 L25,26 L25,17 L28,17 L28,26 Z'></path></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Custom</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><path fill='#122f4a' fill-opacity='.8' d='M25.9096788,34.7483868 C31.8957329,34.7483868 36.7483885,29.8957311 36.7483885,23.9096771 C36.7483885,21.6386841 36.0484345,19.4753459 34.7703122,17.6656388 L19.6705411,32.7737683 C21.4792924,34.0497195 23.6407655,34.7483868 25.9096788,34.7483868 Z M32.3665104,15.2031675 C30.5165981,13.8284496 28.2717652,13.0709674 25.9096788,13.0709674 C19.9236247,13.0709674 15.0709691,17.923623 15.0709691,23.9096771 C15.0709691,26.2738456 15.8297934,28.5205347 17.2067471,30.3713223 L32.3665104,15.2031675 Z M26,38 C18.2680135,38 12,31.7319865 12,24 C12,16.2680135 18.2680135,10 26,10 C33.7319865,10 40,16.2680135 40,24 C40,31.7319865 33.7319865,38 26,38 Z'></path></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>None</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><circle cx='26' cy='24' r='14' fill='#122f4a' fill-opacity='.8' fill-rule='evenodd'></circle></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Basic</span></div></div></div><div class='BuildPanel__separator'></div><div><div class='BuildPanel__presets'><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='zoom-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter><filter id='zoom-b' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><path fill='#122f4a' fill-opacity='.8' d='M26,38 C16.6111593,38 9,30.3888407 9,21 C9,11.6111593 16.6111593,4 26,4 C35.3888407,4 43,11.6111593 43,21 C43,30.3888407 35.3888407,38 26,38 Z M26,29 C30.418278,29 34,25.418278 34,21 C34,16.581722 30.418278,13 26,13 C21.581722,13 18,16.581722 18,21 C18,25.418278 21.581722,29 26,29 Z'></path><path fill='#FFF' fill-opacity='.4' d='M26,36 C17.7157288,36 11,29.2842712 11,21 C11,12.7157288 17.7157288,6 26,6 C34.2842712,6 41,12.7157288 41,21 C41,29.2842712 34.2842712,36 26,36 Z M26,29 C30.418278,29 34,25.418278 34,21 C34,16.581722 30.418278,13 26,13 C21.581722,13 18,16.581722 18,21 C18,25.418278 21.581722,29 26,29 Z' filter='url(#zoom-a)'></path><path fill='#FFF' fill-opacity='.4' d='M26,33 C19.372583,33 14,27.627417 14,21 C14,14.372583 19.372583,9 26,9 C32.627417,9 38,14.372583 38,21 C38,27.627417 32.627417,33 26,33 Z M26,29 C30.418278,29 34,25.418278 34,21 C34,16.581722 30.418278,13 26,13 C21.581722,13 18,16.581722 18,21 C18,25.418278 21.581722,29 26,29 Z' filter='url(#zoom-b)'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Zoom</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><defs><filter id='focus-a' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter><filter id='focus-b' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter><filter id='focus-c' width='100%' height='100%' x='0%' y='0%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic'></feGaussianBlur></filter><filter id='focus-d' width='175%' height='175%' x='-37.5%' y='-37.5%' filterUnits='objectBoundingBox' color-interpolation-filters='sRGB'><feGaussianBlur in='SourceGraphic' stdDeviation='2'></feGaussianBlur></filter></defs><g fill='none' fill-rule='evenodd'><circle cx='26' cy='21' r='17' fill='#122f4a' fill-opacity='.1' filter='url(#focus-a)'></circle><circle cx='26' cy='21' r='15' fill='#122f4a' fill-opacity='.2' filter='url(#focus-b)'></circle><circle cx='26' cy='21' r='12' fill='#122f4a' fill-opacity='.8' filter='url(#focus-c)'></circle><circle cx='26' cy='21' r='8' fill='#FFF' filter='url(#focus-d)'></circle></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Focus</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.2' d='M18,31 L34,31 C35.6568542,31 37,32.3431458 37,34 L37,40 L15,40 L15,34 C15,32.3431458 16.3431458,31 18,31 Z'></path><path fill-opacity='.8' d='M18,28 C16.3431458,28 15,26.6568542 15,25 L15,9 C15,7.34314575 16.3431458,6 18,6 L34,6 C35.6568542,6 37,7.34314575 37,9 L37,25 C37,26.6568542 35.6568542,28 34,28 L18,28 Z M26,15 L31,9 L21,9 L26,15 Z' transform='matrix(1 0 0 -1 0 34)'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Flipup</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.2' d='M18,0 L34,4.4408921e-16 C35.6568542,1.39730022e-16 37,1.34314575 37,3 L37,9 L15,9 L15,3 C15,1.34314575 16.3431458,-1.39730022e-16 18,-4.4408921e-16 Z' transform='rotate(-180 26 4.5)'></path><path fill-opacity='.8' d='M18,34 C16.3431458,34 15,32.6568542 15,31 L15,15 C15,13.3431458 16.3431458,12 18,12 L34,12 C35.6568542,12 37,13.3431458 37,15 L37,31 C37,32.6568542 35.6568542,34 34,34 L18,34 Z M26,21 L31,15 L21,15 L26,21 Z' transform='matrix(-1 0 0 1 52 0)'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Flipdown</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.8' d='M30,37 C28.3431458,37 27,35.6568542 27,34 L27,18 C27,16.3431458 28.3431458,15 30,15 L46,15 C47.6568542,15 49,16.3431458 49,18 L49,34 C49,35.6568542 47.6568542,37 46,37 L30,37 Z M38,24 L43,18 L33,18 L38,24 Z' transform='matrix(0 1 1 0 12 -12)'></path><rect width='22' height='22' x='3' y='15' fill-opacity='.2' rx='3' transform='rotate(90 14 26)'></rect></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Flipright</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg xmlns='http://www.w3.org/2000/svg' width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.8' d='M3,34 L3,18 C3,16.3431458 4.34314575,15 6,15 L22,15 C23.6568542,15 25,16.3431458 25,18 L25,34 C25,35.6568542 23.6568542,37 22,37 L6,37 C4.34314575,37 3,35.6568542 3,34 Z M16,26 L22,31 L22,21 L16,26 Z'></path><rect width='22' height='22' x='27' y='15' fill-opacity='.2' rx='3' transform='rotate(-90 38 26)'></rect></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Flipleft</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg xmlns='http://www.w3.org/2000/svg' width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-rule='evenodd'><path fill-opacity='.8' d='M18,16 L34,16 C35.6568542,16 37,17.3431458 37,19 L37,35 C37,36.6568542 35.6568542,38 34,38 L18,38 C16.3431458,38 15,36.6568542 15,35 L15,19 C15,17.3431458 16.3431458,16 18,16 Z M24.363961,25.0710678 L24.363961,18 L17.2928932,25.0710678 L24.363961,25.0710678 Z'></path><rect width='12' height='12' x='3' y='4' fill-opacity='.2' rx='2'></rect></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Reveal</span></div><div class='Flag__flag Flag__premium Flag__transitionPreset'><svg viewBox='0 0 16 20'><path d='M0,0V20l8-4.95L16,20V0H0Z'></path><polygon points='8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54'></polygon></svg></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg xmlns='http://www.w3.org/2000/svg' width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-opacity='.8' fill-rule='evenodd'><circle cx='26' cy='23' r='7'></circle><path d='M40.6330883,21.2534177 L40.6330883,13.3903303 L38.0773377,16.1766268 C35.7959534,11.8019686 31.2506835,9 25.9945317,9 C18.2973205,9 12,15.2973205 12,22.9945317 C12,30.7026795 18.2973205,37 25.9945317,37 C30.1985782,37 34.0439028,35.0773377 36.4958988,32.0960081 L33.8732911,29.8233732 C31.9506289,32.0960081 29.1486603,33.4958988 25.9945317,33.4958988 C20.2287321,33.4958988 15.5041012,28.7712679 15.5041012,22.9945317 C15.5041012,17.2287321 20.2287321,12.5041012 25.9945317,12.5041012 C30.1985782,12.5041012 33.8732911,15.1267089 35.6253418,18.6198734 L33.0027342,21.2534177 L40.6330883,21.2534177 Z'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Rotatein</span></div></div><div class='BuildPanel__preset'><div class='BuildPanel__icon'><svg xmlns='http://www.w3.org/2000/svg' width='52' height='40' viewBox='0 0 52 40'><g fill='#122f4a' fill-opacity='.8' fill-rule='evenodd'><circle cx='27' cy='23' r='7' transform='matrix(-1 0 0 1 54 0)'></circle><path d='M41,21.2534177 L41,13.3903303 L38.4442494,16.1766268 C36.1628651,11.8019686 31.6175952,9 26.3614434,9 C18.6642322,9 12.3669117,15.2973205 12.3669117,22.9945317 C12.3669117,30.7026795 18.6642322,37 26.3614434,37 C30.5654899,37 34.4108145,35.0773377 36.8628104,32.0960081 L34.2402028,29.8233732 C32.3175405,32.0960081 29.5155719,33.4958988 26.3614434,33.4958988 C20.5956438,33.4958988 15.8710129,28.7712679 15.8710129,22.9945317 C15.8710129,17.2287321 20.5956438,12.5041012 26.3614434,12.5041012 C30.5654899,12.5041012 34.2402028,15.1267089 35.9922535,18.6198734 L33.3696458,21.2534177 L41,21.2534177 Z' transform='matrix(-1 0 0 1 53.367 0)'></path></g></svg></div><div class='BuildPanel__label'><span class='BaseLabel__baseLabel BaseLabel__xsmall BaseLabel__darkGrey'>Rotateout</span></div></div></div></div></div></span></div><div class='BuildPanel__footer'><div class='BuildPanel__arrow BuildPanel__left' data='second'><div class='IconButton__iconButton IconButton__darkGrey IconButton__medium'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><polygon points='7.41 9 12 13.58 16.59 9 18 10.41 12 16.41 6 10.41'></polygon></g></svg></div></div></div></div><div class='BuildPanel__pagesBullets'><div class='BuildPanel__bullet'></div><div class='BuildPanel__bullet'></div><div class='BuildPanel__bullet BuildPanel__selected'></div></div><div class='BuildPanel__arrow BuildPanel__right' data='none'><div class='IconButton__iconButton IconButton__darkGrey IconButton__medium IconButton__disabled'><div class='IconButton__cont'><div class='Icon__iconComponent Icon__large Icon__block Icon__white'><svg width='24px' height='24px' viewBox='0 0 24 24'><g><polygon points='7.41 9 12 13.58 16.59 9 18 10.41 12 16.41 6 10.41'></polygon></g></svg></div></div></div></div></div></div>";

	var animation_tool_activator = function(param) {
		var toggle_animation_panel = function(data) {
			switch (data) {
				case 'first':
					$('.amination_panel').html(animation_panel_first);
					animation_tool_activator(param);
					break;
				case 'second':
					$('.amination_panel').html(animation_panel_second);
					animation_tool_activator(param);
					break;
				case 'third':
					$('.amination_panel').html(animation_panel_third);
					animation_tool_activator(param);
					break;
			}
		}
		interact('.amination_panel').draggable({
			inertia: true,
		    restrict: {
				restriction: "body",
				endOnly: true,
				elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
		    },
			onmove: function(event) {
				var target = event.target,
		        // keep the dragged position in the data-x/data-y attributes
		        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
		        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

			    // translate the element
			    target.style.webkitTransform =
			    target.style.transform =
			      'translate(' + x + 'px, ' + y + 'px)';

			    // update the posiion attributes
			    target.setAttribute('data-x', x);
			    target.setAttribute('data-y', y);
			}
		});
		$('.BuildPanel__preset').click(function() {
			var animation_name = $(this).find('span').text();
			selectedLayer.css({'animation-name': param+animation_name,})
			// console.log(selectedLayer);
			if (param == 'first')
				selectedLayer.attr({"animation_first_name": animation_name})
			else
				selectedLayer.attr({"animation_last_name": animation_name})
			$(".transition_wrapper.selected ."+param+"_transition").attr({'animation_name': animation_name});
			$(".transition_wrapper.selected ."+param+"_transition span").text(animation_name);
			setTimeout(function() {
				selectedLayer.css({'animation-name': 'none'})
				save_slides();
			}, 1000)
		})
		$('.BuildPanel__arrow.BuildPanel__right').click(function() {
			toggle_animation_panel($(this).attr('data'));
		})
		$('.BuildPanel__arrow.BuildPanel__left').click(function() {
			toggle_animation_panel($(this).attr('data'));
		})
	}

	$('.Layer__layerComponent').click(function() {
		selectedLayer = $('.'+$(this).attr('layer'));
		$(this).addClass('selected');
		select_layer();
	})
	$('.LayersList__sortableList').sortable({
		stop: function(event, ui) {
			z_index = 0;
			slides[slide_num] = [slides[slide_num][0]];
			for (var i = $('.Layer__layerComponent').length-1; i >= 0 ; i--) {
				var layer = $($('.Layer__layerComponent')[i]).attr('layer')
				z_index++;
				$('#banner_out_area .'+layer).css('z-index', z_index);
				slides[slide_num].push($('#banner_out_area .'+layer)[0].outerHTML);
			}
			populate_editor();
		}
	});
	$('.LayersList__sortableList').disableSelection();
	
	interact('.transition_transition').draggable({
	    onmove: function(event) {
			var target = event.target, x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
		    target.style.webkitTransform = target.style.transform = 'translate(' + x + 'px, 0px)';
		    target.setAttribute('data-x', x);
		    var layer = target.parentElement.getAttribute('layer');
		    $('.layer.'+layer).attr({'animation_delay':x/100});
	    },
	    onend: function(event) {
	    	save_slides();
	    },
	    snap: {
			targets: [
				interact.createSnapGrid({ x: 10, y: 10 })
			],
			range: Infinity,
			relativePoints: [ { x: 0, y: 0 } ]
	    },
	    restrict: {
			restriction: 'parent',
			elementRect: { top: 0, left: 0, bottom: 0, right: 0 }
	    },
  	}).resizable({
		edges: { right: true }, 
		restrictEdges: { outer: 'parent' },
		restrictSize: { min: { width: 20, height: 36 } }, 
		inertia: true,
	}).on('resizemove', function (event) {
	    var target = event.target;
	    var first_transition = target.childNodes[0];
	    var last_transition = target.childNodes[1];
	    var limit = Number(first_transition.style.width.substr(0, first_transition.style.width.length-2)) + Number(last_transition.style.width.substr(0, last_transition.style.width.length-2));
	    if (target.style.width.substr(0, target.style.width.length-2) > limit) {
	    	target.style.width  = event.rect.width + 'px';
		    var layer = target.parentElement.getAttribute('layer');
		    $('.layer.'+layer).attr({'animation_duration':event.rect.width/100})
	    }
	}).on('resizeend', function(event) {
	    var target = event.target;
	    var first_transition = target.childNodes[0];
	    var last_transition = target.childNodes[1];
	    var limit = Number(first_transition.style.width.substr(0, first_transition.style.width.length-2)) + Number(last_transition.style.width.substr(0, last_transition.style.width.length-2));
	    if (target.style.width.substr(0, target.style.width.length-2) <= limit) {
	    	target.style.width  = limit + 1 + 'px';
		    var layer = target.parentElement.getAttribute('layer');
		    $('.layer.'+layer).attr({'animation_duration':limit/100})
	    }
	    save_slides();
	});

	interact('.first_transition').resizable({
		edges: { right: true },
		restrictEdges: { outer: 'parent' },
		restrictSize: { min: { width: 20, height: 36 } },
		inertia: true,
	}).on('resizestart', function(event) {
		event.preventDefault();
	}).on('resizemove', function (event) {
	    var target = event.target;
	    target.style.width  = event.rect.width + 'px';
	    target.childNodes[0].textContent = Math.round(event.rect.width / 10) / 10 + ' s';
	    var layer = target.parentElement.parentElement.getAttribute('layer');
	    $('.layer.'+layer).attr({'animation_first_duration':event.rect.width/100});
	}).on('resizeend', function(event) {
		event.target.childNodes[0].textContent = event.target.getAttribute('animation_name');
		save_slides();
	})

	interact('.last_transition').resizable({
		edges: { left: true },
		restrictEdges: { outer: 'parent' },
		restrictSize: { min: { width: 20, height: 36 } },
		inertia: true,
	}).on('resizestart', function(event) {
		event.preventDefault();
	}).on('resizemove', function (event) {
	    var target = event.target,
	        x = (parseFloat(target.getAttribute('data-x')) || 0);
	    target.style.width  = event.rect.width + 'px';
	    x += event.deltaRect.left;
	    target.setAttribute('data-x', x);
	    target.childNodes[0].textContent = Math.round(event.rect.width / 10) / 10 + ' s';
	    var layer = target.parentElement.parentElement.getAttribute('layer');
	    $('.layer.'+layer).attr({'animation_last_duration':event.rect.width/100});
	}).on('resizeend', function(event) {
		event.target.childNodes[0].textContent = event.target.getAttribute('animation_name');
		save_slides();
	})

	$('.transition_wrapper').click(function() {
		selectedLayer = $("." + $(this).attr('layer'))
		select_layer();
	})
	$('.first_transition span').click(function() {
		setTimeout(function() {
			$('.amination_panel').empty();
			$('.amination_panel').html(animation_panel_first);
			animation_tool_activator('first');
		}, 0)
	})
	$('.last_transition span').click(function() {
		setTimeout(function() {
			$('.amination_panel').empty();
			$('.amination_panel').html(animation_panel_first);
			animation_tool_activator('last');
		}, 0)
	})
}
//save banner
$('.SaveButton__principalButton.SaveButton__hasDropdown').click(function() {
	$('.input_banner_name').val(banner_title);
	$('.input_banner_url').val(banner_url);
	$('.input_banner_anchor').val(banner_anchor);
	$('#save_modal').modal();
})
$('#banner_save_btn').click(function() {
	sort_slide();
	$('#export_banner_process').html("<div class='banner_area' style='width:"+banner_width+"px; height:"+banner_height+"px;'>" + $('#canvas_content .banner_background')[0].outerHTML + "</div>")
	for (var i = 1; i < slides[0].length; i++) {
		$('#export_banner_process .banner_area').append(slides[0][i]);
	}
	html2canvas(document.querySelector("#export_banner_process .banner_area")).then(function(canvas) {
		banner_url = $('.input_banner_url').val();
		banner_title = $('.input_banner_name').val();
		banner_anchor = $('.input_banner_anchor').val();
		$.post('editor/save_banner', {
			'banner_content':JSON.stringify(slides),
			'slide_transition':JSON.stringify(slide_transition),
			'banner_id':banner_id,
			'sort_num':sort_num,
			'banner_title':banner_title,
			'banner_url':banner_url,
			'banner_anchor':banner_anchor,
			'banner_background':banner_background,
			'preview_image':canvas.toDataURL(),
			'banner_width':banner_width,
			'banner_height':banner_height,
			'banner_loop':banner_loop
		}, function(data) {
			if (data == 'success') {
				if (banner_id == 0) {
					initialize_my_banners();
				}
			} else {
				console.log(data)
			}
			$('#cancel_btn').click();
		})
		populate_layer()
	});
})
$('.SaveButton__dropdown').click(function() {
	banner_id = 0;
	$('.input_banner_name').val('Copy of ' + banner_title);
	$('.input_banner_url').val(banner_url);
	$('.input_banner_anchor').val(banner_anchor);
	$('#save_modal').modal();
})
//animation run
$('#playSlideButton').click(function() {
	//unselect_layer
	$('.layer_hover').removeClass('selected');
	$('.Layer__layerComponent').removeClass('selected')
	$('.transition_wrapper').removeClass('selected')
	$('#select_tool_panel').empty();
	$('#select_tool_menu').empty();
	$('.amination_panel').empty();
	$('#ruler_progress').css({'animation-name': 'ruler'});
	var timerID = [];
	$('#canvas_content .layer').each(function() {
		$(this).css({'opacity':'0', 'animation-name':'first'+$(this).attr('animation_first_name'), 'animation-duration':$(this).attr('animation_first_duration')+'s', 'animation-delay':$(this).attr('animation_delay')+'s'});
		timerID.push(setTimeout(last_animation.bind(null, $(this)), ($(this).attr('animation_duration')-$(this).attr('animation_last_duration')+Number($(this).attr('animation_delay')))*1000));
	})
	function last_animation(data) {
		data.css({'animation-name':'last'+data.attr('animation_last_name'), 'animation-duration':data.attr('animation_last_duration')+'s', 'animation-delay':'0s'});
	}
	setTimeout(function() {
		$('#ruler_progress').css({'animation-name': 'None'});
		$('#canvas_content .layer').css({'animation-name': 'None', 'animation-duration':'1s'});
		for (var i = 0; i < timerID.length; i++) clearTimeout(timerID[i]);
		$('#canvas_content .layer').css('opacity', '1');
	}, Number(slides[slide_num][0])*1000);
})

//cavas preview.
$('.PlayButton__playButton').click(function() {
	banner_loop = $('.input_banner_loop').val();
	$('#preview_container').html("<div class='banner_area' style='width:"+banner_width+"px; height:"+banner_height+"px;'><div class='banner_background'></div></div>");
	$('#preview_container .banner_background').css('background', banner_background);
	$('#preview_banner').modal();
	preview_banner(0);
})
$('#preview_replay').click(function() {
	banner_loop = $('.input_banner_loop').val();
	preview_banner(0);
})
function preview_banner(slide) {
	clearInterval(interval);
	clearInterval(slide_interval);
	layers = [];
	time = 0;
	if ($('#preview_container .slide_'+slide).length == 0) {
		$('#preview_container .banner_area').append("<div class='slide slide_"+slide+"'></div>");
	}
	$('#preview_container .slide_'+slide+' .layer').remove();
	for (var i = 1; i < slides[slide].length; i++) {
		$('#preview_container .slide_'+slide).append(slides[slide][i]);
	}
	$('#preview_container .slide_'+slide+' .layer').each(function() {
		$(this).css({'transition':'none', 'opacity':0});
		layers.push($(this));
	})
	// slide transition
	slide_time = 0;
	if (slide > 0 && slide_transition[slide-1] != undefined && slide_transition[slide-1] != '') {
		$('#preview_container .slide_'+slide).css({'opacity':1, 'filter':'none', 'transform':'none'});
		slide_interval = setInterval(function() {
			if (slide_time > slide_transition[slide-1]['duration'] * 1000) {
				$('#preview_container .slide_'+(slide-1)).css({'opacity':0, 'filter':'none', 'transform':'none'});
				$('#preview_container .slide_'+slide).css({'opacity':1, 'filter':'none', 'transform':'none'});
				clearInterval(slide_interval);
				interval = setInterval(function() {
					if (time > slides[slide][0] * 1000) {
						clearInterval(interval);
						slide += 1;
						if (slide < slides.length) {
							preview_banner(slide);
						} else {
							banner_loop = Number(banner_loop) - 1;
							if (banner_loop > 0) {
								preview_banner(0);
							} else {
								banner_loop = $('.input_banner_loop').val();
							}
						}
						return;
					}
					draw_preview(30);
				}, 30)
				return;
			}
			switch(Number(slide_transition[slide-1]['method'])) {
				case 0:
					switch(slide_transition[slide-1]['name']) {
						case 'Alpha':
							var opacity = 1-slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+(slide-1)).css({'opacity':opacity});
							break;
						case 'Blur':
							var blur = slide_time/100/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+(slide-1)).css({'filter':'blur('+blur+'px)'});
							break;
						case 'Slide':
							var opacity = 1-slide_time/1000/slide_transition[slide-1]['duration'];
							var transform = 100-100*opacity;
							$('#preview_container .slide_'+(slide-1)).css({'opacity':opacity, 'transform':'translateX('+transform+'px)'});
							break;
						case 'Scale':
							var opacity = 1-slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+(slide-1)).css({'opacity':opacity, 'transform':'scale('+opacity+')'});
							break;
						case 'Roll':
							var opacity = 1-slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+(slide-1)).css({'opacity':opacity});
							break;
						case 'Zoom':
							var opacity = 1-slide_time/1000/slide_transition[slide-1]['duration'];
							var zoom = 1+slide_time/1000/slide_transition[slide-1]['duration']*10;
							$('#preview_container .slide_'+(slide-1)).css({'opacity':opacity, 'transform':'scale('+zoom+')'});
							break;
						case 'Rotate':
							var opacity = 1-slide_time/1000/slide_transition[slide-1]['duration'];
							var rotate = slide_time/1000/slide_transition[slide-1]['duration']*30;
							var zoom = 1+slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+(slide-1)).css({'opacity':opacity, 'transform':'rotate('+rotate+'deg) scale('+zoom+')'});
							break;
					}
					break;
				case 1:
					draw_preview(0);
					switch(slide_transition[slide-1]['name']) {
						case 'Alpha':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'opacity':opacity});
							break;
						case 'Blur':
							var blur = 10-slide_time/100/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'filter':'blur('+blur+'px)'});
							break;
						case 'Slide':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							var transform = 100*opacity-100;
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'translateX('+transform+'px)'});
							break;
						case 'Scale':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'scale('+opacity+')'});
							break;
						case 'Roll':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'opacity':opacity});
							break;
						case 'Zoom':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							var zoom = 11-slide_time/1000/slide_transition[slide-1]['duration']*10;
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'scale('+zoom+')'});
							break;
						case 'Rotate':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							var rotate = 30-slide_time/1000/slide_transition[slide-1]['duration']*30;
							var zoom = 2-opacity;
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'rotate('+rotate+'deg) scale('+zoom+')'});
							break;
					}
					break;
				case 2:
					draw_preview(0);
					switch(slide_transition[slide-1]['name']) {
						case 'Alpha':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'opacity':opacity});
							$('#preview_container .slide_'+(slide-1)).css({'opacity':1-opacity});
							break;
						case 'Blur':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							var blur = 10-slide_time/100/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'opacity':opacity,'filter':'blur('+blur+'px)'});
							$('#preview_container .slide_'+(slide-1)).css({'opacity':1-opacity,'filter':'blur('+(10-blur)+'px)'});
							break;
						case 'Slide':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							var transform = 100*opacity-100;
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'translateX('+transform+'px)'});
							$('#preview_container .slide_'+(slide-1)).css({'opacity':1-opacity, 'transform':'translateX('+(transform+100)+'px)'});
							break;
						case 'Scale':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'scale('+opacity+')'});
							$('#preview_container .slide_'+(slide-1)).css({'opacity':1-opacity, 'transform':'scale('+(1-opacity)+')'});
							break;
						case 'Roll':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							$('#preview_container .slide_'+slide).css({'opacity':opacity});
							$('#preview_container .slide_'+(slide-1)).css({'opacity':1-opacity});
							break;
						case 'Zoom':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							var zoom = 11-slide_time/1000/slide_transition[slide-1]['duration']*10;
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'scale('+zoom+')'});
							$('#preview_container .slide_'+(slide-1)).css({'opacity':1-opacity, 'transform':'scale('+(12-zoom)+')'});
							break;
						case 'Rotate':
							var opacity = slide_time/1000/slide_transition[slide-1]['duration'];
							var rotate = 30-slide_time/1000/slide_transition[slide-1]['duration']*30;
							var zoom = 2-opacity;
							$('#preview_container .slide_'+slide).css({'opacity':opacity, 'transform':'rotate('+rotate+'deg) scale('+zoom+')'});
							$('#preview_container .slide_'+(slide-1)).css({'opacity':1-opacity, 'transform':'rotate('+(30-rotate)+'deg) scale('+(3-zoom)+')'});
							break;
					}
					break;
			}
			slide_time += 30;
		}, 30)
	} else {
		if (slide == 0) {
			$('#preview_container .slide_'+(slides.length-1)).css('opacity', 0);
		} else {
			$('#preview_container .slide_'+(slide-1)).css('opacity', 0);
		}
		$('#preview_container .slide_'+slide).css('opacity', 1);
		interval = setInterval(function() {
			if (time > slides[slide][0] * 1000) {
				clearInterval(interval);
				slide += 1;
				if (slide < slides.length) {
					preview_banner(slide);
				} else {
					banner_loop = Number(banner_loop) - 1;
					if (banner_loop > 0) {
						preview_banner(0);
					} else {
						banner_loop = $('.input_banner_loop').val();
					}
				}
				return;
			}
			draw_preview(30);
		}, 30)
	}
}
function draw_preview(frame) {
	for (var i = 0; i < layers.length; i++) {
		switch (layers[i].attr('animation_first_name')) {
			case 'Slideup':
				if (time > Number(layers[i].attr('animation_delay'))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_first_duration')))*1000) {
					var opacity = (time/1000-Number(layers[i].attr('animation_delay')))/layers[i].attr('animation_first_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+transform[4]+','+(1-opacity)*30+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Slidedown':
				if (time > Number(layers[i].attr('animation_delay'))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_first_duration')))*1000) {
					var opacity = (time/1000-Number(layers[i].attr('animation_delay')))/layers[i].attr('animation_first_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+transform[4]+','+(opacity-1)*30+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Slideright':
				if (time > Number(layers[i].attr('animation_delay'))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_first_duration')))*1000) {
					var opacity = (time/1000-Number(layers[i].attr('animation_delay')))/layers[i].attr('animation_first_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+(opacity-1)*30+','+transform[5]+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Slideleft':
				if (time > Number(layers[i].attr('animation_delay'))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_first_duration')))*1000) {
					var opacity = (time/1000-Number(layers[i].attr('animation_delay')))/layers[i].attr('animation_first_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+(1-opacity)*30+','+transform[5]+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Fade':
				if (time > Number(layers[i].attr('animation_delay'))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_first_duration')))*1000) {
					var opacity = (time/1000-Number(layers[i].attr('animation_delay')))/layers[i].attr('animation_first_duration');
					layers[i].css({'opacity':opacity});
				}
				break;
			case 'Basic':
				if (time > Number(layers[i].attr('animation_delay'))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_first_duration')))*1000) {
					var opacity = (time/1000-Number(layers[i].attr('animation_delay')))/layers[i].attr('animation_first_duration');
					layers[i].css({'opacity':opacity});
				}
				break;
			default:
				layers[i].css('opacity', 1);
				break;
		}
		switch (layers[i].attr('animation_last_name')) {
			case 'Slideup':
				if (time > (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-Number(layers[i].attr('animation_last_duration')))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration')))*1000) {
					var opacity = (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-time/1000)/layers[i].attr('animation_last_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+transform[4]+','+(opacity-1)*30+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Slidedown':
				if (time > (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-Number(layers[i].attr('animation_last_duration')))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration')))*1000) {
					var opacity = (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-time/1000)/layers[i].attr('animation_last_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+transform[4]+','+(1-opacity)*30+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Slideright':
				if (time > (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-Number(layers[i].attr('animation_last_duration')))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration')))*1000) {
					var opacity = (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-time/1000)/layers[i].attr('animation_last_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+(1-opacity)*30+','+transform[5]+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Slideleft':
				if (time > (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-Number(layers[i].attr('animation_last_duration')))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration')))*1000) {
					var opacity = (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-time/1000)/layers[i].attr('animation_last_duration');
					var transform = layers[i].css('transform').replace('matrix(', '').replace(' ', '').replace(')', '').split(',');
					transform = 'matrix('+transform[0]+','+transform[1]+','+transform[2]+','+transform[3]+','+(opacity-1)*30+','+transform[5]+')';
					layers[i].css({'opacity':opacity, 'transform':transform});
				}
				break;
			case 'Fade':
				if (time > (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-Number(layers[i].attr('animation_last_duration')))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration')))*1000) {
					var opacity = (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-time/1000)/layers[i].attr('animation_last_duration');
					layers[i].css({'opacity':opacity});
				}
				break;
			case 'Basic':
				if (time > (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-Number(layers[i].attr('animation_last_duration')))*1000 && time <= (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration')))*1000) {
					var opacity = (Number(layers[i].attr('animation_delay'))+Number(layers[i].attr('animation_duration'))-time/1000)/layers[i].attr('animation_last_duration');
					layers[i].css({'opacity':opacity});
				}
				break;
			default:
				break;
		}
	}
	time += frame;
}

//export banner html 5
function convertImgToDataURLviaCanvas(url, key, callback, outputFormat) {
	var img = new Image();
	img.crossOrigin = 'Anonymous';
	img.onload = function() {
		var canvas = document.createElement('CANVAS');
		var ctx = canvas.getContext('2d');
		var dataURL;
		canvas.height = this.height;
		canvas.width = this.width;
		ctx.drawImage(this, 0, 0);
		dataURL = canvas.toDataURL(outputFormat);
		callback(dataURL, key);
		canvas = null;
	};
	img.src = url;
}

})

// $('body').on('click','.layer_hover.selected', function(){
// 	isRotate = 0;
// 	if ($('#rotateHandle')) {
// 		$('#rotateHandle').remove();
// 	}
// 	// get the selection range (or cursor     position)
// 	var range = window.getSelection().getRangeAt(0); 
// 	// create a span
// 	var newElement = document.createElement('div');
// 	newElement.id = 'rotateHandle';
// 	// console.log('createhandle',newElement);
// 	// newElement.innerHTML = 'Hello World!';
// 	// console.log(range.startContainer);
// 	// if the range is in #myDiv ;)
// 	if(range.startContainer.className==='layer_hover selected') {
// 	   // delete whatever is on the range
// 	   range.deleteContents();
// 	   // place your span
// 	   range.insertNode(newElement);
// 	} else {
// 		if(range.startContainer.parentNode.className==='layer_hover selected') {
// 		   // delete whatever is on the range
// 		   range.deleteContents();
// 		   // place your span
// 		   range.insertNode(newElement);
// 		}
// 	}

// });

// $('body').on('mousedown','#rotateHandle',function(){
// 	isRotate = 1;
// 	console.log('mdown',isRotate);
// });

// $('body').on('mouseup','#rotateHandle',function(){
// 	isRotate = 0;
// 	console.log('mup',isRotate);
// });

$('body').on('dblclick','.layer_hover.selected',function(){
	if(isRotate) {
		isRotate = 0;
	} else {
		isRotate = 1;
	}
});

$('body').on('click','.layer_hover.selected', function(){
	isRotate = 0;
	if ($('#rotateHandle')) {
		$('#rotateHandle').remove();
	}

	$('#banner_hover').append('<div id="rotateHandle"><input type="range" id="angle" min="-360" max="360" /></div>');

});
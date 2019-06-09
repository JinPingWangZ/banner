// $('body').on('click','.bo_toolbar_item_btn[data=templates]',function(){
// 	var template_type = $('#templates_tabs_menu').attr('class');
// 	var template_search_category = $('#template_search_category').find('select').val();
// 	$.post('editor/get_templates', {
// 		template_type: template_type
// 	}).done(function(res){
// 		var templates = JSON.parse(res);
// 		console.log(templates);
// 		if (templates.length > 0) {
// 			var templates_html = '<div class="template blank" draggable="true">' + 
// 									'<div><div class="template_plusSign"></div></div>' + 
// 								'</div>';
// 			for (var i = 0; i < templates.length; i++) {
// 				templates_html += '<div class="template" data-id="'+ templates[i].id +'" data-title="'+ templates[i].banner_title +'" draggable="true">' + 
// 									'<img alt="presentation" src="'+ templates[i].preview_image +'">' + 
// 								'</div>'; 
// 			}
// 			$('#templates_result .templates_result_content').html(templates_html);
// 		}
// 	}).fail(function(err){
// 		console.log(err);
// 	})
// });

// $('body').on('click','.template',function(){
// 	var banner_id = this.getAttribute('data-id');
// 	initialize_editor();
// });
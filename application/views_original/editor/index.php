<!DOCTYPE html>
<html>
<head>
	<title>Banner Maker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url();?>src/favicon.ico">
	<link rel="stylesheet" href="<?php echo base_url();?>src/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>src/vendor/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/style.css">
</head>
<body>
	<img id="test_image" src="" style="position: absolute; z-index: 1000; left: 0; top:0;">
	<div id="export_banner_process"></div>
	<a id="export_download" download></a>
	<form id="upload_form" action="/upload_image" method="POST" enctype="multipart/form-data" style="position: absolute; z-index: -1;">
		<input type="file" name="file" id="image_file">
		<!-- CSRF token -->
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
	</form>
	<div id="bo_container" class="my_banners">

		<div id="header_container">
			<nav class="nav_top">
				<div class="bo_logo" style="">
					<a href="<?php echo base_url(); ?>" style="height: 28px;">
						<svg width="28px" height="28px" viewBox="0 0 28 28"><g><path d="M19.975177,11.4740165 L23.3545571,14.8691938 C24.6689421,16.189723 23.8584948,18.2920052 21.9825106,18.294889 L18.9030162,18.2996228 L21.6792105,23.9045224 C22.3156523,25.1894442 21.6394297,26.68879 20.2857385,27.0599949 L17.1544626,27.9186435 C15.9871072,28.238752 14.7513303,27.5865725 14.3265597,26.4481133 L12.2196874,20.8013291 L10.3452364,22.74488 C8.99438867,24.1455256 6.91362488,23.1748359 7.01133793,21.2483209 L7.18451136,17.8340259 L4.91838406,18.3273534 C3.84246494,18.561577 2.80797976,17.872182 2.60643347,16.78016 L0.054004827,2.95054225 C-0.246747033,1.32100276 0.849624906,0 2.50206622,0 L19.5889229,0 C21.2417018,0 22.2834813,1.31216129 21.9183587,2.91954147 L19.975177,11.4740165 Z M22.1378005,16.1191476 L11.2762812,5.20685521 C10.3721836,4.29853126 9.58775377,4.61364114 9.52207679,5.90853142 L8.73945269,21.3387834 C8.72268337,21.6694081 8.88847463,21.7434667 9.10923169,21.5145717 L12.4785365,18.0210604 C12.6991271,17.7923379 12.9698617,17.852138 13.0828675,18.1550131 L15.9446267,25.8250256 C16.054875,26.1205102 16.3974041,26.3053791 16.7035278,26.2214348 L19.8348037,25.3627863 C20.1365652,25.2800382 20.274645,24.9797374 20.1334702,24.6947174 L16.3528955,17.0620595 C16.2120715,16.7777478 16.353764,16.5455909 16.6701583,16.5451045 L21.9798922,16.5369423 C22.2917161,16.5364629 22.3669844,16.3494029 22.1378005,16.1191476 Z"></path></g></svg>
					</a>
				</div>
				<ul class="bo_menu">
					<li class="menu-item item_create_new" data="create_new"><span>CREATE NEW</span><effect></effect></li>
					<li class="menu-item item_my_banners" data="my_banners"><span>MY BANNERS</span><effect></effect></li>
					<li class="menu-item item_editor" data="editor"><span>EDITOR</span><effect></effect></li>
				</ul>
				<div class="navtop_controls">
					<div class="nav_item_help tool_tip_black" data-toggle="tooltip" data-placement="bottom" title="Help">
						<a href="#" style="height: 24px;">
							<svg width="24px" height="24px" viewBox="0 0 24 24"><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><path d="M23,-8.8817842e-16 C23.5522847,-9.89631482e-16 24,0.44771525 24,1 L24,1 L24,19 C24,19.5522847 23.5522847,20 23,20 L16,20 L7,24 L7,20 L1,20 C0.44771525,20 6.76353751e-17,19.5522847 0,19 L0,1 C-6.76353751e-17,0.44771525 0.44771525,-7.86725357e-16 1,-8.8817842e-16 L1,-8.8817842e-16 L23,-8.8817842e-16 Z M13,17 L13,15 L11,15 L11,17 L13,17 Z M15.07,9.25 C15.64,8.68 16,7.88 16,7 C16,4.79 14.21,3 12,3 C9.79,3 8,4.79 8,7 L10,7 C10,5.9 10.9,5 12,5 C13.1,5 14,5.9 14,7 C14,7.55 13.78,8.05 13.41,8.41 L12.17,9.67 C11.45,10.4 11,11.4 11,12.5 L11,13 L13,13 C13,11.5 13.45,10.9 14.17,10.17 L15.07,9.25 Z" id="path-1"></path></g></svg>
						</a>
					</div>
					<div class="nav_item_goPremium tool_tip_black" data-toggle="tooltip" data-placement="bottom" title="The Free plan allows you to create up to 10 banners/lifetime. Go premium if you want to create more banners.">
						<a href="#">
							<span id="">1/10</span>
							<span><svg width="24px" height="24px" viewBox="0 0 24 24"><g stroke="none" stroke-width="1" fill-rule="evenodd"><g><path d="M12 16.663L17.562 20l-1.476-6.29L21 9.478l-6.471-.546L12 3 9.471 8.932 3 9.478l4.914 4.232L6.438 20z"></path></g></g></svg></span>
							<span>GO PREMIUM</span>
						</a>
					</div>
					<div class="nav_item_myaccount bo-select-wrap">
						<div class="bo-select-btn">
							<img width="28" height="28" class="MyAccount__profilePicMask" src="https://lh3.googleusercontent.com/-yGE6HVOCkes/AAAAAAAAAAI/AAAAAAAAACY/wux2UjlEdEg/photo.jpg" alt="valery alecksey">
							<span></span>
						</div>
						<div class="bo-select-list">
							<div class="bo_select__cnt">
								<div class="bo-select-item"><button>Save as PNG</button></div>
								<div class="bo-select-item"><button>Save as JPEG</button></div>
								<div class="bo-select-item"><button>Copy HTML5 code</button></div>
								<div class="bo-select-item"><button>Share link</button></div>
								<div class="bo-select-item"><button>Download ZIP</button></div>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>

		<div id="create_container">

		</div>

		<div id="my_banner_container">

		</div>

		<div id="editor_container">
			<div id="side_bar_container" class="background">

				<div class="side_tool_bar">
					<ul class="bo_toolbar">
						<li class="bo_toolbar_item_btn" data='templates'>
							<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><g id="Toolbar-Templates-ON"><path d="M13,22 L22,22 L22,13 L13,13 L13,22 Z M2,22 L11,22 L11,2 L2,2 L2,22 Z M13,11 L22,11 L22,2 L13,2 L13,11 Z M0,2 L0,22 C0,23.105 0.895,24 2,24 L22,24 C23.105,24 24,23.105 24,22 L24,2 C24,0.895 23.105,0 22,0 L2,0 C0.895,0 0,0.895 0,2 L0,2 Z" id="Page-1"></path></g></g></svg>
							<span class="bo_tooltip">Templates</span>
						</li>
						<li class="bo_toolbar_item_btn" data='background'>
							<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="Symbols" stroke="none" stroke-width="1"><g id="Toolbar-Background-ON"><path d="M19,17 L21,17 L21,5 C21,3.9 20.1,3 19,3 L7,3 L7,5 L19,5 L19,17 Z" id="Fill-1"></path><path d="M5,19 L5,0 L3,0 L3,3 L0,3 L0,5 L3,5 L3,19 C3,20.1 3.9,21 5,21 L19,21 L19,24 L21,24 L21,21 L24,21 L24,19 L5,19 Z" id="Fill-3"></path><polygon id="Fill-5" points="7 9 17 9 17 7 7 7"></polygon><polygon id="Fill-7" points="7 13 17 13 17 11 7 11"></polygon><polygon id="Fill-8" points="7 17 17 17 17 15 7 15"></polygon></g></g></svg>
							<span class="bo_tooltip">Background</span>
						</li>
						<li class="bo_toolbar_item_btn" data='text'>
							<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="Symbols" stroke="none" stroke-width="1"><g id="Toolbar-Text-ON"><path d="M0,2 L0,4 L8,4 L8,22 L10,22 L10,4 L18,4 L18,2 L0,2 Z M24,11 L20,11 L18,11 L14,11 L14,13 L18,13 L18,22 L20,22 L20,13 L24,13 L24,11 Z" id="Combined-Shape"></path></g></g></svg>
							<span class="bo_tooltip">Add text</span>
						</li>
						<li class="bo_toolbar_item_btn" data='image'>
							<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><g id="Toolbar-Image-ON"><path d="M6,6 L1.99508929,6 C0.892622799,6 0,6.8932319 0,7.99508929 L0,22.0049107 C0,23.1073772 0.893231902,24 1.99508929,24 L16.0049107,24 C17.1073772,24 18,23.1067681 18,22.0049107 L18,12.9975446 L18,18 L16,18 L16,22 L2,22 L2,8 L6,8 L6,6 Z" id="Combined-Shape"></path><path d="M6,1.99508929 C6,0.893231902 6.8926228,0 7.99508929,0 L22.0049107,0 C23.1067681,0 24,0.892622799 24,1.99508929 L24,16.0049107 C24,17.1067681 23.1073772,18 22.0049107,18 L7.99508929,18 C6.8932319,18 6,17.1073772 6,16.0049107 L6,1.99508929 Z M8,2 L22,2 L22,16 L8,16 L8,2 Z" id="Combined-Shape"></path><polygon id="Fill-3" points="12 10 14 13 17 9 21 14 9 14"></polygon><circle id="Oval" cx="17.5" cy="5.5" r="1.5"></circle></g></g></svg>
							<span class="bo_tooltip">Add image</span>
						</li>
						<li class="bo_toolbar_item_btn" data='shape'>
							<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><g id="Toolbar-Shape-ON"><path d="M16.5223768,0.130528918 C12.2079155,-0.609939263 7.98640918,1.86135467 6.52,5.98597747 L1.99164257,5.98597747 C0.891688752,5.98597747 0,6.87860027 0,7.98106676 L0,21.9908882 C0,23.0927456 0.892622799,23.9859775 1.99508929,23.9859775 L16.0049107,23.9859775 C17.1067681,23.9859775 18,23.0930703 18,21.9943349 L18,17.4659775 C21.5940912,16.1952751 23.9977627,12.7980859 24,8.98597747 C23.9927713,4.60844199 20.836838,0.870997098 16.5223768,0.130528918 Z M16,21.9859775 L2,21.9859775 L2,7.98597747 L6.06,7.98597747 C5.77552005,10.5304409 6.58821885,13.0756332 8.29464378,14.9843859 C10.0010687,16.8931387 12.4396833,17.9847622 15,17.9859775 C15.3341835,17.9843951 15.6680248,17.9643646 16,17.9259775 L16,21.9859775 L16,21.9859775 Z M15,15.9859775 C11.1340068,15.9859775 8,12.8519707 8,8.98597747 C8,5.11998422 11.1340068,1.98597747 15,1.98597747 C18.8659932,1.98597747 22,5.11998422 22,8.98597747 C22,10.8424929 21.2625021,12.6229703 19.9497475,13.9357249 C18.6369928,15.2484796 16.8565154,15.9859775 15,15.9859775 Z" id="Shape"></path></g></g></svg>
							<span class="bo_tooltip">Add shape</span>
						</li>
						<li class="bo_toolbar_item_btn" data='button'>
							<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><g id="Toolbar-Button-ON"><path d="M22,2 L2,2 C0.8954305,2 1.66533454e-16,2.74619208 0,4 L0,20 C1.66533454e-16,21.2538079 0.8954305,22 2,22 L22,22 C23.1045695,22 24,21.2538079 24,20 L24,4 C24,2.74619208 23.1045695,2 22,2 Z M2,20 L2,4 L22,4 L22,20 L2,20 Z" id="Shape"></path><polygon id="Shape" points="18 12 14 16 11 16 14 13 6 13 6 11 14 11 11 8 14 8"></polygon></g></g></svg>
							<span class="bo_tooltip">Add button</span>
						</li>
						<li class="bo_toolbar_item_btn" data='magic_animator'>
							<svg width="24" height="24" viewBox="0 0 24 24"><g><path d="M6 6V2c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2h-4v4.005A1.995 1.995 0 0 1 16.005 24H1.995A1.995 1.995 0 0 1 0 22.005V7.995C0 6.893.893 6 1.995 6H6zm0 2H2v14h14v-4H8c-1.1 0-2-.9-2-2V8zm16 8V2H8v14h14zM13 5l5 4-5 4V5z"></path></g></svg>
							<span class="bo_tooltip">Magic animator</span>
						</li>
						<li class="bo_toolbar_item_btn" data='more'>
							<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><g id="Toolbar-More-ON"><path d="M0,10 L4,10 L4,14 L0,14 L0,10 Z M10,10 L14,10 L14,14 L10,14 L10,10 Z M20,10 L24,10 L24,14 L20,14 L20,10 Z" id="Combined-Shape"></path></g></g></svg>
							<span class="bo_tooltip">More</span>
						</li>
					</ul>
				</div>

				<div class="side_tool_panel templates">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_header">
						<span>TEMPLATES</span>
					</div>
					<div class="tool_panel_content">
						<div class="tool_templates">
							<div class="tool_templates_content">

								<div id="templates_tabs_menu" class="static">
									<div class="tabs_menu_static tabs_menu_item">Static</div>
									<div class="tabs_menu_animated tabs_menu_item">Animated</div>
									<hr class="tabsMenu__bottomBorder">
									<hr class="tabsMenu__underline">
								</div>

								<div id="templates_search_container" class="select">
									<div class="template_search_wrap">
										<div class="search_container">
											<div class="search_searchIcon">
												<svg width="24px" height="24px" viewBox="0 0 24 24">
													<g stroke="none" stroke-width="1" fill-rule="evenodd"><g fill-rule="nonzero"><path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 Z"></path></g></g>
												</svg>
											</div>
											<input class="search_searchInput" type="text" maxlength="100" autocapitalize="none" placeholder="Search in all categories" value="">
											<div class="search_clear"><svg viewBox="0 0 18 18" width="14"><polygon points="17.71 1.71 16.29 0.29 9 7.59 1.71 0.29 0.29 1.71 7.59 9 0.29 16.29 1.71 17.71 9 10.41 16.29 17.71 17.71 16.29 10.41 9 17.71 1.71"></polygon></svg></div>
										</div>
									</div>
									<div class="template_search_category">
										<div class="select_icon">
											<svg width="12px" height="12px" viewBox="0 0 12 12" id="grab-icon"><g stroke-width="1" fill-rule="evenodd" id="grab-icon"><path id="grab-icon" d="M0,1 L12,1 L12,3 L0,3 L0,1 Z M0,5 L12,5 L12,7 L0,7 L0,5 Z M0,9 L12,9 L12,11 L0,11 L0,9 Z"></path></g></svg>
										</div>
										<div class="select_component">
											<div class="custom-select category_select" style="width: 100%; height: 100%;">
												<!-- <select>
													<option selected='ture' value="all">All cartegories</option>
													<option value="automotive">Automotive</option>
													<option value="bloglifestyle">Blog & Lifestyle</option>
													<option value="business">Business</option>
													<option value="ecommerce">Ecommerce</option>
													<option value="education">Education</option>
													<option value="fashionjewelry">Fashion & Jewelry</option>
													<option value="foodservices">Food & Services</option>
													<option value="health">Health</option>
													<option value="holidaysevents">Holidays & Events</option>
													<option value="other">Other</option>
													<option value="realestate">Real Estate</option>
													<option value="softwaretechnology">Software & Technology</option>
													<option value="sport">Sport</option>
													<option value="travel">Travel</option>
												</select> -->
												<select id="template_search_category">
													<option value="336x280">Large Rectangle - 336x280</option>
													<option value="300x250">Medium Rectangle - 300x250</option>
													<option value="728x90">Leaderboard - 728x90</option>
													<option value="320x100">Large Mobile - 320x100</option>
													<option value="468x60">Main Banner - 468x60</option>
													<option value="300x600">Half Page - 300x600</option>
													<option value="250x250">Square - 250x250</option>
													<option value="160x600">Wide Skyscraper - 160x600</option>
													<option value="1200x900">Facebook Post - 1200x900</option>
													<option value="851x315">Facebook Cover - 851x315</option>
													<option value="2560x1440">YouTube Channel Cover - 2560x1440</option>
													<option value="320x50">Mobile - 320x50</option>
													<option value="120x600">Skyscraper - 120x600</option>
													<option value="200x200">Small Square - 200x200</option>
													<option value="300x1050">Portrait - 300x1050</option>
													<option value="970x250">Billboard - 970x250</option>
													<option value="970x90">Large Leaderboard - 970x90</option>
													<option value="234x60">Half Banner - 234x60</option>
													<option value="120x240">Vertical Banner - 120x240</option>
													<option value="180x150">Small Rectalgle - 180x150</option>
													<option value="1200x628">Facebook Ad - 1200x628</option>
													<option value="1200x444">Page Like Ad - 1200x444</option>
													<option value="600x600">Click to Website Ad - 600x600</option>
													<option value="1500x500">Twitter Cover - 1500x500</option>
													<option value="1024x512">Twitter Post - 1024x512</option>
													<option value="1280x720">YouTube Video Thumbnail - 1280x720</option>
													<option value="1080x1080">Instagram Post - 1080x1080</option>
													<option value="400x400">Profile Picture - 400x400</option>
													<option value="600x1200">Pinterest Post - 600x1200</option>
													<option value="1584x396">LinkeIn Cover - 1584x396</option>
													<option value="1080x1920">Story - 1080x1920</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div id="templates_result">
									<div class="templates_result_content">
										<div class="template blank" draggable="true">
											<div><div class="template_plusSign"></div></div>
										</div>
										<div class="template" draggable="true">
											<img alt="presentation" src="src/images/templates/medium(1).jfif">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium(2).jfif">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium(3).jfif">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium(4).png">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium(5).png">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium(6).png">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium(7).jfif">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium(8).png">
										</div>
										<div class="template" draggable="true">
											<div class="flag_premium"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div>
											<img alt="presentation" src="src/images/templates/medium.jfif">
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="side_tool_panel background">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_content">
						<div class="tool_background background_panel">
							<div class="background_size_toggle">
								<div class="toggle_background">BACKGROUND</div>
								<div class="toggle_size">SIZE</div>
							</div>
							<div id="background_panel" class="colors">
								<div id="background_tabs_menu">
									<div class="tabs_menu_colors tabs_menu_item">Colors</div>
									<div class="tabs_menu_gradients tabs_menu_item">Gradients</div>
									<div class="tabs_menu_textures tabs_menu_item">Textures</div>
									<div class="tabs_menu_images tabs_menu_item">Images</div>
									<hr class="tabsMenu__bottomBorder">
									<hr class="tabsMenu__underline">
								</div>
								<div class="background_template_colors background_tab_content">
									<div class="color_template">
										<input type="color" class="color_picker">
										<svg viewBox="0 0 16.94 17" height="28px" style='margin:21px;'><polygon points="17 8 9 8 9 0 8 0 8 8 0 8 0 9 8 9 8 17 9 17 9 9 17 9 17 8" fill="#ffffff"></polygon></svg>
									</div>
									<div class="color_template">
										<svg viewBox="0 0 70 70" fill="rgb(67, 71, 89)"><rect width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="20" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="40" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="60" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="50" y="10" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="30" y="10" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="10" y="10" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect y="20" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="20" y="20" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="40" y="20" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="60" y="20" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="50" y="30" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="30" y="30" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="10" y="30" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect y="40" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="20" y="40" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="40" y="40" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="60" y="40" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="50" y="50" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="30" y="50" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="10" y="50" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect y="60" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="20" y="60" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="40" y="60" width="10" height="10" fill="rgb(123, 126, 138)"></rect><rect x="60" y="60" width="10" height="10" fill="rgb(123, 126, 138)"></rect></svg>
									</div>
									<div class="color_template">
										<div style="background: rgb(255, 255, 255);"></div>
									</div>
									<div class="color_template">
										<div style="background: rgb(0, 0, 0);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(121, 64, 64);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(218, 67, 67);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(117, 76, 36);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(255, 82, 0);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(0, 0, 0);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(247, 146, 74);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(255, 201, 77);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(145, 219, 92);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(79, 179, 85);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(52, 224, 210);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(87, 190, 255);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(0, 144, 237);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(0, 74, 179);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(11, 37, 61);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(45, 20, 64);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(93, 71, 191);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(130, 110, 220);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(219, 194, 255);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(255, 143, 180);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(255, 93, 138);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(236, 0, 140);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(235, 88, 92);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(235, 47, 53);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(51, 41, 36);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(128, 104, 70);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(191, 145, 80);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(247, 237, 223);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(162, 176, 184);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: rgb(68, 78, 87);"></div>
									</div>
								</div>
								<div class="background_template_gradients background_tab_content">
									<div class="color_template">
										<svg viewBox="0 0 16.94 17" height="28px" style='margin:21px;'><polygon points="17 8 9 8 9 0 8 0 8 8 0 8 0 9 8 9 8 17 9 17 9 9 17 9 17 8" fill="#ffffff"></polygon></svg>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(255, 255, 255) 0%, rgb(225, 230, 236) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(216, 223, 227) 0%, rgb(174, 184, 189) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(42, 42, 42) 0%, rgb(0, 0, 0) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(255, 180, 61) 0%, rgb(255, 142, 61) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(255, 230, 93) 0%, rgb(247, 195, 74) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(203, 255, 90) 0%, rgb(129, 213, 69) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(81, 189, 73) 0%, rgb(55, 134, 49) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(115, 229, 220) 0%, rgb(52, 224, 210) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(96, 204, 255) 0%, rgb(0, 156, 255) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(0, 132, 255) 0%, rgb(13, 85, 185) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(29, 62, 89) 0%, rgb(11, 37, 61) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(91, 43, 127) 0%, rgb(45, 20, 64) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(126, 104, 223) 0%, rgb(83, 61, 178) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(162, 141, 255) 0%, rgb(121, 97, 230) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(243, 234, 255) 0%, rgb(219, 194, 255) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(255, 125, 164) 0%, rgb(246, 52, 111) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(255, 101, 105) 0%, rgb(239, 58, 63) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(246, 74, 34) 0%, rgb(199, 9, 15) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(82, 65, 57) 0%, rgb(51, 41, 36) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(165, 133, 87) 0%, rgb(128, 104, 70) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(229, 186, 125) 0%, rgb(191, 145, 80) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(255, 248, 238) 0%, rgb(245, 231, 211) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(169, 188, 198) 0%, rgb(108, 123, 131) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(4, 187, 198) 0%, rgb(144, 58, 243) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(68, 222, 255) 0%, rgb(41, 66, 255) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(68, 222, 255) 0%, rgb(33, 255, 126) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(245, 231, 211) 0%, rgb(255, 252, 84) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(237, 160, 91) 0%, rgb(197, 37, 25) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(234, 248, 235) 0%, rgb(139, 251, 249) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(226, 241, 251) 0%, rgb(238, 168, 175) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(38, 248, 253) 0%, rgb(195, 186, 248) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(183, 225, 232) 0%, rgb(255, 214, 245) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(238, 243, 245) 0%, rgb(249, 61, 95) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: linear-gradient(rgb(81, 102, 199) 0%, rgb(30, 178, 205) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(255, 255, 255) 0%, rgb(225, 230, 236) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(216, 223, 227) 0%, rgb(174, 184, 189) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(42, 42, 42) 0%, rgb(0, 0, 0) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(255, 180, 61) 0%, rgb(255, 142, 61) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(255, 230, 93) 0%, rgb(247, 195, 74) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(203, 255, 90) 0%, rgb(129, 213, 69) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(81, 189, 73) 0%, rgb(55, 134, 49) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(115, 229, 220) 0%, rgb(52, 224, 210) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(96, 204, 255) 0%, rgb(0, 156, 255) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(0, 132, 255) 0%, rgb(13, 85, 185) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(29, 62, 89) 0%, rgb(11, 37, 61) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(91, 43, 127) 0%, rgb(45, 20, 64) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(126, 104, 223) 0%, rgb(83, 61, 178) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(162, 141, 255) 0%, rgb(121, 97, 230) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(243, 234, 255) 0%, rgb(219, 194, 255) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(255, 125, 164) 0%, rgb(246, 52, 111) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(255, 101, 105) 0%, rgb(239, 58, 63) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(246, 74, 34) 0%, rgb(199, 9, 15) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(82, 65, 57) 0%, rgb(51, 41, 36) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(165, 133, 87) 0%, rgb(128, 104, 70) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(229, 186, 125) 0%, rgb(191, 145, 80) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(255, 248, 238) 0%, rgb(245, 231, 211) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(169, 188, 198) 0%, rgb(108, 123, 131) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(4, 187, 198) 0%, rgb(144, 58, 243) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(68, 222, 255) 0%, rgb(41, 66, 255) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(68, 222, 255) 0%, rgb(33, 255, 126) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(245, 231, 211) 0%, rgb(255, 252, 84) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(237, 160, 91) 0%, rgb(197, 37, 25) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(234, 248, 235) 0%, rgb(139, 251, 249) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(226, 241, 251) 0%, rgb(238, 168, 175) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(38, 248, 253) 0%, rgb(195, 186, 248) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(183, 225, 232) 0%, rgb(255, 214, 245) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(238, 243, 245) 0%, rgb(249, 61, 95) 100%);"></div>
									</div>
									<div class="color_template">
										<div class="ColorPreset__colorPreset" style="background: radial-gradient(rgb(81, 102, 199) 0%, rgb(30, 178, 205) 100%);"></div>
									</div>
									<div class="color_template">
										
									</div>
								</div>
								<div class="background_template_textures background_tab_content">
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_1" draggable="false">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_2" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_3" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_4" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_5" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_6" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_7" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_8" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_9" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_10" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_11" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_12" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_13" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_14" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_15" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_16" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_17" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_18" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_19" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_20" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_21" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_22" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_23" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_24" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_25" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_26" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_27" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_28" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_29" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_30" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_31" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/texture_32" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/33.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/34.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/35.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/36.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/37.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/39.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/40.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/41.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/42.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/43.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/44.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/45.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/46.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/47.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/48.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/49.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/50.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/51.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/52.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/53.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/54.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/55.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/56.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/57.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/58.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/59.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/60.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/61.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/62.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/63.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/64.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/65.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/100.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/101.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/102.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/103.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/104.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/105.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/106.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/107.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/108.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/109.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/110.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/111.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/112.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/113.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/114.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/115.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/116.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/117.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/118.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
									<div class="texture_template">
										<img class="ImageItem__thumb" src="src/images/texture/119.png" alt="presentation" role="presentation" draggable="false" style="width: 96px; height: 96px;">
									</div>
								</div>
								<div class="background_template_images background_tab_content">
									<div id="background_image_tab" class="stockphotos">
										<div id="background_image_menu">
											<div class="tabs_menu_stockphotos tabs_menu_item">Stock Photos</div>
											<div class="tabs_menu_myimages tabs_menu_item">My Images</div>
											<div class="tabs_menu_imagesettings tabs_menu_item">Image Settings</div>
											<hr class="tabsMenu__bottomBorder">
											<hr class="tabsMenu__underline">
										</div>
										<div class="background_image_stockphotos">
											<div id="background_image_search">
												<div class="search_container">
													<div class="search_searchIcon">
														<svg width="24px" height="24px" viewBox="0 0 24 24">
															<g stroke="none" stroke-width="1" fill-rule="evenodd"><g fill-rule="nonzero"><path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 Z"></path></g></g>
														</svg>
													</div>
													<input class="search_searchInput" type="text" maxlength="100" autocapitalize="none" placeholder="Search over 1 million images..." value="">
													<div class="search_clear"><svg viewBox="0 0 18 18" width="14"><polygon points="17.71 1.71 16.29 0.29 9 7.59 1.71 0.29 0.29 1.71 7.59 9 0.29 16.29 1.71 17.71 9 10.41 16.29 17.71 17.71 16.29 10.41 9 17.71 1.71"></polygon></svg></div>
												</div>
											</div>
											<div class="background_image_result">
												<?php for ($i = 1; $i <= 13; $i++) { ?>
												<div class="image_item_container">
													<div class="image_setting_icon"><svg viewBox="0 0 18 18"><path d="M18,7.51l-2.29-.43a7.63,7.63,0,0,0-.82-1.51L16,3.66h0L14.31,2h0L12.39,3.11a9.15,9.15,0,0,0-1.74-.72L10,0.05V0H7.51L7.08,2.29a7.63,7.63,0,0,0-1.51.82L3.66,2h0L2,3.69H2L3.11,5.61A7.28,7.28,0,0,0,2.4,7.08l-2.34.43H0v2.93H0l2.28,0.43a7.68,7.68,0,0,0,.83,1.52L2,14.31H2L3.86,16H3.76l1.86-1.12a7,7,0,0,0,1.48.73L7.52,18v0h2.93l0.43-2.28a7.68,7.68,0,0,0,1.52-.83L14.31,16h0L16,14.14v0.1l-1.12-1.86a7,7,0,0,0,.74-1.53L18,10.43h0V7.51h0ZM9,13a4,4,0,1,1,4-4A4,4,0,0,1,9,13Z"></path><circle cx="9" cy="9" r="2"></circle></svg></div>
													<img alt="presentation" src="<?php echo base_url(); ?>src/images/stock/low600(<?php echo $i; ?>).png" class="ImageItem__image" style="height: 154.5px; width: 103px;">
													<div class="image_info_icon"><svg viewBox="0 0 10.47 24"><path d="M20.07,27.85a2.14,2.14,0,0,1-1.36-.32,1.51,1.51,0,0,1-.39-1.2,6.5,6.5,0,0,1,.12-1c0.09-.45.18-0.86,0.28-1.22L20,19.63a7,7,0,0,0,.25-1.34c0-.48.07-0.82,0.07-1a2.93,2.93,0,0,0-1-2.28,4,4,0,0,0-2.76-.88,6.76,6.76,0,0,0-2.11.36c-0.74.24-1.52,0.53-2.34,0.86l-0.33,1.37,0.86-.29a3.59,3.59,0,0,1,1-.14,1.92,1.92,0,0,1,1.32.33,1.62,1.62,0,0,1,.35,1.19,5.68,5.68,0,0,1-.11,1.05c-0.07.37-.17,0.78-0.28,1.2L13.65,24.5c-0.11.47-.19,0.88-0.24,1.25a8.72,8.72,0,0,0-.07,1.09,2.88,2.88,0,0,0,1,2.26,4.06,4.06,0,0,0,2.81.9,6.11,6.11,0,0,0,2.06-.32c0.59-.21,1.38-0.51,2.38-0.9l0.33-1.37a5.8,5.8,0,0,1-.83.28A3.88,3.88,0,0,1,20.07,27.85ZM19.28,11.59a3,3,0,0,0,2.09-.82,2.62,2.62,0,0,0,.86-2,2.65,2.65,0,0,0-.86-2,3.09,3.09,0,0,0-4.18,0,2.66,2.66,0,0,0-.87,2,2.63,2.63,0,0,0,.87,2A3,3,0,0,0,19.28,11.59Z" transform="translate(-11.77 -6)"></path></svg></div>
												</div>
												<?php } ?>
											</div>
										</div>
										<div class="background_image_myimages">
											<div class="MyImages__dropzoneContainer">
												<div class="MyImages__dropzone">
													<div class="MyImages__dropZoneWrapper">
														<div class="MyImages__dropZoneContent">
															<div class="MyImages__dropZoneButton">
																<div class="MyImages__icon"><svg viewBox="0 0 24 24"><path d="M19.35,10.04 C18.67,6.59 15.64,4 12,4 C9.11,4 6.6,5.64 5.35,8.04 C2.34,8.36 0,10.91 0,14 C0,17.31 2.69,20 6,20 L19,20 C21.76,20 24,17.76 24,15 C24,12.36 21.95,10.22 19.35,10.04 Z M14,13 L14,17 L10,17 L10,13 L7,13 L12,8 L17,13 L14,13 Z" id="Shape"></path></svg>
																</div>
																<div class="MyImages__label">Upload image(s)</div>
															</div>
															<div class="MyImages__dropZoneLabel">
																or Drag and Drop to upload image
																<div class="MyImages__info">
																	<div class="Icon__iconComponent Icon__small Icon__white" data-original-title="" title="">
																		<svg viewBox="0 0 10.47 24"><path d="M20.07,27.85a2.14,2.14,0,0,1-1.36-.32,1.51,1.51,0,0,1-.39-1.2,6.5,6.5,0,0,1,.12-1c0.09-.45.18-0.86,0.28-1.22L20,19.63a7,7,0,0,0,.25-1.34c0-.48.07-0.82,0.07-1a2.93,2.93,0,0,0-1-2.28,4,4,0,0,0-2.76-.88,6.76,6.76,0,0,0-2.11.36c-0.74.24-1.52,0.53-2.34,0.86l-0.33,1.37,0.86-.29a3.59,3.59,0,0,1,1-.14,1.92,1.92,0,0,1,1.32.33,1.62,1.62,0,0,1,.35,1.19,5.68,5.68,0,0,1-.11,1.05c-0.07.37-.17,0.78-0.28,1.2L13.65,24.5c-0.11.47-.19,0.88-0.24,1.25a8.72,8.72,0,0,0-.07,1.09,2.88,2.88,0,0,0,1,2.26,4.06,4.06,0,0,0,2.81.9,6.11,6.11,0,0,0,2.06-.32c0.59-.21,1.38-0.51,2.38-0.9l0.33-1.37a5.8,5.8,0,0,1-.83.28A3.88,3.88,0,0,1,20.07,27.85ZM19.28,11.59a3,3,0,0,0,2.09-.82,2.62,2.62,0,0,0,.86-2,2.65,2.65,0,0,0-.86-2,3.09,3.09,0,0,0-4.18,0,2.66,2.66,0,0,0-.87,2,2.63,2.63,0,0,0,.87,2A3,3,0,0,0,19.28,11.59Z" transform="translate(-11.77 -6)"></path></svg>
																	</div>
																</div>
															</div>
														</div>
														<div class="MyImages__draggingContainer"><svg viewBox="0 0 24 24"><path d="M19.35,10.04 C18.67,6.59 15.64,4 12,4 C9.11,4 6.6,5.64 5.35,8.04 C2.34,8.36 0,10.91 0,14 C0,17.31 2.69,20 6,20 L19,20 C21.76,20 24,17.76 24,15 C24,12.36 21.95,10.22 19.35,10.04 Z M14,13 L14,17 L10,17 L10,13 L7,13 L12,8 L17,13 L14,13 Z" id="Shape"></path></svg></div>
													</div>
													<input accept="image/jpg,image/jpeg,image/png,image/gif,image/svg+xml" type="file" multiple="" style="display: none;">
												</div>
											</div>
											<div id="background_myimage_search">
												<div class="search_container">
													<div class="search_searchIcon">
														<svg width="24px" height="24px" viewBox="0 0 24 24">
															<g stroke="none" stroke-width="1" fill-rule="evenodd"><g fill-rule="nonzero"><path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 Z"></path></g></g>
														</svg>
													</div>
													<input class="search_searchInput" type="text" maxlength="100" autocapitalize="none" placeholder="Search for images..." value="">
													<div class="search_clear"><svg viewBox="0 0 18 18" width="14"><polygon points="17.71 1.71 16.29 0.29 9 7.59 1.71 0.29 0.29 1.71 7.59 9 0.29 16.29 1.71 17.71 9 10.41 16.29 17.71 17.71 16.29 10.41 9 17.71 1.71"></polygon></svg></div>
												</div>
											</div>
											<div class="MyImages__breadCrumb">
												<div class="BreadCrumb__breadCrumbContainer skin_addPhotos">Showing results for All images</div>
											</div>
											<div class="my_image_result">
												
											</div>
										</div>
										<div class="background_image_imagesettings">
											<div class='ImageSettings__imageSettingsContainer'>
												<div class='ImageSettings__row'>
													<div class='ImageSettings__scaleMode ImageSettings__withMargin'>
														<p class='ImageSettings__text'>Scale mode:</p>
														<div tabindex='0' data-allow-shortcuts='false' class='Select__selectComponent' style='width: 140px;'>
															<div class='Select__select Select__lblue Select__medium'>
																<select class="input_background_mode" style="width: 100%; height: 100%;">
																	<option value="exactfit">Exact fit</option>
																	<option value="tile">Tile</option>
																	<option value="scalecrop">Scale crop</option>
																	<option value="noscale">No scale</option>
																	<option value="maintainaspect">Maintain aspect</option>
																</select>
															</div>
														</div>
													</div>
													<div class='ImageSettings__alignTool'><p class='ImageSettings__text'>Align:</p><div class='AlignTool__alignTool AlignTool__lblue'><div class='AlignTool__lineDivHoriz' style='left: 12px; top: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 31px; top: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 12px; bottom: 5px;'></div><div class='AlignTool__lineDivHoriz' style='left: 31px; bottom: 5px;'></div><div class='AlignTool__lineDivVert' style='left: 5px; top: 12px;'></div><div class='AlignTool__lineDivVert' style='left: 5px; top: 31px;'></div><div class='AlignTool__lineDivVert' style='right: 5px; top: 12px;'></div><div class='AlignTool__lineDivVert' style='right: 5px; top: 31px;'></div><div class='AlignTool__alignControl_background AlignTool__topLeft'></div><div class='AlignTool__alignControl_background AlignTool__centerTop'></div><div class='AlignTool__alignControl_background AlignTool__topRight'></div><div class='AlignTool__alignControl_background AlignTool__middleLeft'></div><div class='AlignTool__alignControl_background AlignTool__center'></div><div class='AlignTool__alignControl_background AlignTool__middleRight'></div><div class='AlignTool__alignControl_background AlignTool__bottomLeft AlignTool__selected'></div><div class='AlignTool__alignControl_background AlignTool__centerBottom'></div><div class='AlignTool__alignControl_background AlignTool__bottomRight'></div></div></div>
												</div>
												<div class='ImageSettings__row'>
													<div class='ImageSettings__tileSettings'>
														<div class='ImageSettings__group'>
															<p class='ImageSettings__label'>Tile zoom</p>
															<div class='ImageSettings__slider'>
																<div class='Slider__lblue' style='min-height: 18px; position: relative;'>
																	<input class="input_background_tilezoom" type='range' min='10' max='100' step='1' value='100'>
																</div>
															</div>
															<p class='ImageSettings__label'><span class="label_background_tilezoom">100</span> %</p>
														</div>
														<div class='ImageSettings__group'>
															<p class='ImageSettings__label'>Offset X</p>
															<div class='ImageSettings__slider'>
																<div class='Slider__lblue' style='min-height: 18px; position: relative;'>
																	<input class="input_background_offsetx" type='range' min='0' max='100' step='1' value='48'>
																</div>
															</div>
															<p class='ImageSettings__label'><span class="label_background_offsetx">48</span> %</p>
														</div>
														<div class='ImageSettings__group'>
															<p class='ImageSettings__label'>Offset Y</p>
															<div class='ImageSettings__slider'>
																<div class='Slider__lblue' style='min-height: 18px; position: relative;'>
																	<input class="input_background_offsety" type='range' min='0' max='100' step='1' value='49'>
																</div>
															</div>
															<p class='ImageSettings__label'><span class="label_background_offsety">49</span> %</p>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							<div id="background_setting">
								<select id="background_size_select">
									<option value="">Custom size</option>
									<option value="336x280">Large Rectangle - 336x280</option>
									<option value="300x250">Medium Rectangle - 300x250</option>
									<option value="728x90">Leaderboard - 728x90</option>
									<option value="320x100">Large Mobile - 320x100</option>
									<option value="468x60">Main Banner - 468x60</option>
									<option value="300x600">Half Page - 300x600</option>
									<option value="250x250">Square - 250x250</option>
									<option value="160x600">Wide Skyscraper - 160x600</option>
									<option value="1200x900">Facebook Post - 1200x900</option>
									<option value="851x315">Facebook Cover - 851x315</option>
									<option value="2560x1440">YouTube Channel Cover - 2560x1440</option>
									<option value="320x50">Mobile - 320x50</option>
									<option value="120x600">Skyscraper - 120x600</option>
									<option value="200x200">Small Square - 200x200</option>
									<option value="300x1050">Portrait - 300x1050</option>
									<option value="970x250">Billboard - 970x250</option>
									<option value="970x90">Large Leaderboard - 970x90</option>
									<option value="234x60">Half Banner - 234x60</option>
									<option value="120x240">Vertical Banner - 120x240</option>
									<option value="180x150">Small Rectalgle - 180x150</option>
									<option value="1200x628">Facebook Ad - 1200x628</option>
									<option value="1200x444">Page Like Ad - 1200x444</option>
									<option value="600x600">Click to Website Ad - 600x600</option>
									<option value="1500x500">Twitter Cover - 1500x500</option>
									<option value="1024x512">Twitter Post - 1024x512</option>
									<option value="1280x720">YouTube Video Thumbnail - 1280x720</option>
									<option value="1080x1080">Instagram Post - 1080x1080</option>
									<option value="400x400">Profile Picture - 400x400</option>
									<option value="600x1200">Pinterest Post - 600x1200</option>
									<option value="1584x396">LinkeIn Cover - 1584x396</option>
									<option value="1080x1920">Story - 1080x1920</option>
								</select>
								<div class="SizePanel__customSizeContainer"><div class="SizePanel__customSizeInputs"><div class="LabelTextInput__labelTextInput"><span class="BaseLabel__baseLabel BaseLabel__normalThick BaseLabel__blue">Width:</span><input id="input_banner_width" type="text" class="TextInput__defaultTextInput TextInput__blue" width="47px" id="widthInput" maxlength="4" placeholder="" value="1080" style="width: 47px;"></div><div class="SizePanel__lockIconContainer" data-original-title="" title=""><div class="SizePanel__lockIcon"><svg width="8px" height="10px" viewBox="0 0 8 10"><g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="groupWithFill" transform="translate(-102.000000, -85.000000)" fill-rule="nonzero"><g id="Group-6" transform="translate(97.000000, 81.000000)"><g id="ic_phonelink_lock_black_18px" transform="translate(5.000000, 4.000000)"><path d="M6.8,4 L6.8,2.5 C6.8,1.1 5.4,0 4,0 C2.6,0 1.2,1.1 1.2,2.5 L1.2,4 C0.6,4 0,4.6 0,5.2 L0,8.7 C0,9.4 0.6,10 1.2,10 L6.7,10 C7.4,10 8,9.4 8,8.8 L8,5.3 C8,4.6 7.4,4 6.8,4 Z M5.5,4 L2.5,4 L2.5,2.5 C2.5,1.7 3.2,1.2 4,1.2 C4.8,1.2 5.5,1.7 5.5,2.5 L5.5,4 Z" id="Shape"></path></g></g></g></g></svg></div></div><div class="LabelTextInput__labelTextInput"><span class="BaseLabel__baseLabel BaseLabel__normalThick BaseLabel__blue">Height:</span><input id="input_banner_height" type="text" class="TextInput__defaultTextInput TextInput__blue" width="47px" id="heightInput" maxlength="4" placeholder="" value="192" style="width: 47px;"></div></div><div><button id="apply_banner_size" class="Button__defaultButton Button__small Button__whiteGrey" style="min-width: 92px;">Apply</button></div></div>
							</div>
						</div>
					</div>
				</div>

				<div class="side_tool_panel text">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_header">
						<span>Add text</span>
					</div>
					<div class="tool_panel_content">
						<div class="TextList__textList">
							<div style="font-size: 32px; font-weight: 800; line-height: 50px;">Heading text</div>
							<div style="font-size: 24px; font-weight: 600; line-height: 45px;">Subheading text</div>
							<div style="font-size: 16px; font-weight: 400; line-height: 40px;">Body text</div>
							<div style="font-size: 12px; font-weight: 400; line-height: 35px;">Small text</div>
							<div class="TextList__line"></div>
						</div>
					</div>
				</div>

				<div class="side_tool_panel image">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_header">
						<span>photos</span>
					</div>
					<div class="tool_panel_content">
						<div id="photos_panel" class="photo_stockphotos">
							<div class="photos_tabs_menu">
								<div class="tabs_menu_photo_stockphotos tabs_menu_item">Stock Photos</div>
								<div class="tabs_menu_photo_myimages tabs_menu_item">My Images</div>
								<hr class="tabsMenu__bottomBorder">
								<hr class="tabsMenu__underline">
							</div>
							<div id="photo_stockphotos_content">
								<div id="photo_search">
									<div class="search_container">
										<div class="search_searchIcon">
											<svg width="24px" height="24px" viewBox="0 0 24 24">
												<g stroke="none" stroke-width="1" fill-rule="evenodd"><g fill-rule="nonzero"><path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 Z"></path></g></g>
											</svg>
										</div>
										<input class="search_searchInput" type="text" maxlength="100" autocapitalize="none" placeholder="Search over 1 million images..." value="">
										<div class="search_clear"><svg viewBox="0 0 18 18" width="14"><polygon points="17.71 1.71 16.29 0.29 9 7.59 1.71 0.29 0.29 1.71 7.59 9 0.29 16.29 1.71 17.71 9 10.41 16.29 17.71 17.71 16.29 10.41 9 17.71 1.71"></polygon></svg></div>
									</div>
								</div>

								<div class="stock_image_result">
									<?php for ($i = 1; $i <= 15; $i++) { ?>
									<div class="image_item_container">
										<div class="image_setting_icon"><svg viewBox="0 0 18 18"><path d="M18,7.51l-2.29-.43a7.63,7.63,0,0,0-.82-1.51L16,3.66h0L14.31,2h0L12.39,3.11a9.15,9.15,0,0,0-1.74-.72L10,0.05V0H7.51L7.08,2.29a7.63,7.63,0,0,0-1.51.82L3.66,2h0L2,3.69H2L3.11,5.61A7.28,7.28,0,0,0,2.4,7.08l-2.34.43H0v2.93H0l2.28,0.43a7.68,7.68,0,0,0,.83,1.52L2,14.31H2L3.86,16H3.76l1.86-1.12a7,7,0,0,0,1.48.73L7.52,18v0h2.93l0.43-2.28a7.68,7.68,0,0,0,1.52-.83L14.31,16h0L16,14.14v0.1l-1.12-1.86a7,7,0,0,0,.74-1.53L18,10.43h0V7.51h0ZM9,13a4,4,0,1,1,4-4A4,4,0,0,1,9,13Z"></path><circle cx="9" cy="9" r="2"></circle></svg></div>
										<img alt="presentation" role="presentation" src="<?php echo base_url(); ?>src/images/stock/low600(<?php echo $i; ?>).png" class="ImageItem__image">
										<div class="image_info_icon"><svg viewBox="0 0 10.47 24"><path d="M20.07,27.85a2.14,2.14,0,0,1-1.36-.32,1.51,1.51,0,0,1-.39-1.2,6.5,6.5,0,0,1,.12-1c0.09-.45.18-0.86,0.28-1.22L20,19.63a7,7,0,0,0,.25-1.34c0-.48.07-0.82,0.07-1a2.93,2.93,0,0,0-1-2.28,4,4,0,0,0-2.76-.88,6.76,6.76,0,0,0-2.11.36c-0.74.24-1.52,0.53-2.34,0.86l-0.33,1.37,0.86-.29a3.59,3.59,0,0,1,1-.14,1.92,1.92,0,0,1,1.32.33,1.62,1.62,0,0,1,.35,1.19,5.68,5.68,0,0,1-.11,1.05c-0.07.37-.17,0.78-0.28,1.2L13.65,24.5c-0.11.47-.19,0.88-0.24,1.25a8.72,8.72,0,0,0-.07,1.09,2.88,2.88,0,0,0,1,2.26,4.06,4.06,0,0,0,2.81.9,6.11,6.11,0,0,0,2.06-.32c0.59-.21,1.38-0.51,2.38-0.9l0.33-1.37a5.8,5.8,0,0,1-.83.28A3.88,3.88,0,0,1,20.07,27.85ZM19.28,11.59a3,3,0,0,0,2.09-.82,2.62,2.62,0,0,0,.86-2,2.65,2.65,0,0,0-.86-2,3.09,3.09,0,0,0-4.18,0,2.66,2.66,0,0,0-.87,2,2.63,2.63,0,0,0,.87,2A3,3,0,0,0,19.28,11.59Z" transform="translate(-11.77 -6)"></path></svg></div>
									</div>
									<?php } ?>
								</div>
							</div>
							<div id="photo_myimages_content">
								<div class="MyImages__dropzoneContainer">
									<div class="MyImages__dropzone">
										<div class="MyImages__dropZoneWrapper">
											<div class="MyImages__dropZoneContent">
												<div class="MyImages__dropZoneButton">
													<div class="MyImages__icon"><svg viewBox="0 0 24 24"><path d="M19.35,10.04 C18.67,6.59 15.64,4 12,4 C9.11,4 6.6,5.64 5.35,8.04 C2.34,8.36 0,10.91 0,14 C0,17.31 2.69,20 6,20 L19,20 C21.76,20 24,17.76 24,15 C24,12.36 21.95,10.22 19.35,10.04 Z M14,13 L14,17 L10,17 L10,13 L7,13 L12,8 L17,13 L14,13 Z" id="Shape"></path></svg>
													</div>
													<div class="MyImages__label">Upload image(s)</div>
												</div>
												<div class="MyImages__dropZoneLabel">
													or Drag and Drop to upload image
													<div class="MyImages__info">
														<div class="Icon__iconComponent Icon__small Icon__white" data-original-title="" title="">
															<svg viewBox="0 0 10.47 24"><path d="M20.07,27.85a2.14,2.14,0,0,1-1.36-.32,1.51,1.51,0,0,1-.39-1.2,6.5,6.5,0,0,1,.12-1c0.09-.45.18-0.86,0.28-1.22L20,19.63a7,7,0,0,0,.25-1.34c0-.48.07-0.82,0.07-1a2.93,2.93,0,0,0-1-2.28,4,4,0,0,0-2.76-.88,6.76,6.76,0,0,0-2.11.36c-0.74.24-1.52,0.53-2.34,0.86l-0.33,1.37,0.86-.29a3.59,3.59,0,0,1,1-.14,1.92,1.92,0,0,1,1.32.33,1.62,1.62,0,0,1,.35,1.19,5.68,5.68,0,0,1-.11,1.05c-0.07.37-.17,0.78-0.28,1.2L13.65,24.5c-0.11.47-.19,0.88-0.24,1.25a8.72,8.72,0,0,0-.07,1.09,2.88,2.88,0,0,0,1,2.26,4.06,4.06,0,0,0,2.81.9,6.11,6.11,0,0,0,2.06-.32c0.59-.21,1.38-0.51,2.38-0.9l0.33-1.37a5.8,5.8,0,0,1-.83.28A3.88,3.88,0,0,1,20.07,27.85ZM19.28,11.59a3,3,0,0,0,2.09-.82,2.62,2.62,0,0,0,.86-2,2.65,2.65,0,0,0-.86-2,3.09,3.09,0,0,0-4.18,0,2.66,2.66,0,0,0-.87,2,2.63,2.63,0,0,0,.87,2A3,3,0,0,0,19.28,11.59Z" transform="translate(-11.77 -6)"></path></svg>
														</div>
													</div>
												</div>
											</div>
											<div class="MyImages__draggingContainer"><svg viewBox="0 0 24 24"><path d="M19.35,10.04 C18.67,6.59 15.64,4 12,4 C9.11,4 6.6,5.64 5.35,8.04 C2.34,8.36 0,10.91 0,14 C0,17.31 2.69,20 6,20 L19,20 C21.76,20 24,17.76 24,15 C24,12.36 21.95,10.22 19.35,10.04 Z M14,13 L14,17 L10,17 L10,13 L7,13 L12,8 L17,13 L14,13 Z" id="Shape"></path></svg></div>
										</div>
										<input accept="image/jpg,image/jpeg,image/png,image/gif,image/svg+xml" type="file" multiple="" style="display: none;">
									</div>
								</div>
								<div id="background_myimage_search">
									<div class="search_container">
										<div class="search_searchIcon">
											<svg width="24px" height="24px" viewBox="0 0 24 24">
												<g stroke="none" stroke-width="1" fill-rule="evenodd"><g fill-rule="nonzero"><path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 Z"></path></g></g>
											</svg>
										</div>
										<input class="search_searchInput" type="text" maxlength="100" autocapitalize="none" placeholder="Search for images..." value="">
										<div class="search_clear"><svg viewBox="0 0 18 18" width="14"><polygon points="17.71 1.71 16.29 0.29 9 7.59 1.71 0.29 0.29 1.71 7.59 9 0.29 16.29 1.71 17.71 9 10.41 16.29 17.71 17.71 16.29 10.41 9 17.71 1.71"></polygon></svg></div>
									</div>
								</div>
								<div class="MyImages__breadCrumb">
									<div class="BreadCrumb__breadCrumbContainer skin_addPhotos">
										Showing results for All images
									</div>
								</div>
								<div class="my_image_result">
									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="side_tool_panel shape">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_header">
						<span>shapes</span>
					</div>
					<div class="tool_panel_content">
						<div id="shape_tabs_menu">
							<div class="tabs_menu_basicshapes tabs_menu_item">Basic shapes</div>
							<hr class="tabsMenu__bottomBorder">
							<hr class="tabsMenu__underline">
						</div>
						<div class="ShapesPanel__shapesPanelContent">
							<div class="ShapeList__shapeList clearfix">
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer ShapeItem__selected">
										<div class="ShapeItem__shapeItem ShapeItem__bgFill" style="background-color: rgb(255, 255, 255); height: 65px; width: 65px; border: 0px solid rgb(255, 255, 255); border-radius: 0px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__borderFill" style="background-color: transparent; height: 65px; width: 65px; border: 2px solid rgb(255, 255, 255); border-radius: 0px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__borderFill" style="background-color: transparent; height: 65px; width: 65px; border: 4px solid rgb(255, 255, 255); border-radius: 0px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__borderFill" style="background-color: transparent; height: 65px; width: 65px; border: 8px solid rgb(255, 255, 255); border-radius: 0px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__bgFill" style="background-color: rgb(255, 255, 255); height: 65px; width: 65px; border: 0px solid rgb(255, 255, 255); border-radius: 7px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__borderFill" style="background-color: transparent; height: 65px; width: 65px; border: 2px solid rgb(255, 255, 255); border-radius: 7px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__borderFill" style="background-color: transparent; height: 65px; width: 65px; border: 4px solid rgb(255, 255, 255); border-radius: 7px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__borderFill" style="background-color: transparent; height: 65px; width: 65px; border: 8px solid rgb(255, 255, 255); border-radius: 7px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__bgFill" style="background-color: rgb(255, 255, 255); height: 65px; width: 65px; border: 0px solid rgb(255, 255, 255); border-radius: 50px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__borderFill" style="background-color: transparent; height: 65px; width: 65px; border: 2px solid rgb(255, 255, 255); border-radius: 50px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__bgFill" style="background-color: rgb(255, 255, 255); height: 2px; width: 65px; border: 0px solid rgb(255, 255, 255); border-radius: 0px;"></div>
									</div>
								</div>
								<div class="ShapeList__shapeItem">
									<div draggable="true" class="ShapeItem__shapeItemContainer">
										<div class="ShapeItem__shapeItem ShapeItem__bgFill" style="background-color: rgb(255, 255, 255); height: 6px; width: 65px; border: 0px solid rgb(255, 255, 255); border-radius: 0px;"></div>
									</div>
								</div>
							</div>
						</div>
						<div id="shape_tabs_menu">
							<div class="tabs_menu_basicshapes tabs_menu_item">Cliparts</div>
							<hr class="tabsMenu__bottomBorder">
							<hr class="tabsMenu__underline" style="width: 41px;">
						</div>
						<div class="ClipartList__clipartList editor clearfix">
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><g><path d="M94.4,0H5.5C2.5,0,0,2.5,0,5.5v88.9c0,3,2.5,5.5,5.5,5.5h47.9V61.2h-13V46.1h13V35c0-12.9,7.9-19.9,19.4-19.9c5.5,0,10.3,0.4,11.6,0.6v13.5l-8,0c-6.3,0-7.5,3-7.5,7.3v9.6h14.9l-1.9,15.1h-13v38.7h25.5c3,0,5.5-2.5,5.5-5.5V5.5C99.9,2.5,97.5,0,94.4,0z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></g></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M99.3,19.7c-3.7,1.5-7.6,2.8-11.6,3.1c4.3-2.5,7.3-6.5,8.8-11.1c-4,2.5-8.2,4-12.8,4.9c-3.7-4-9.1-6.5-14.9-6.5c-11.3,0-20.4,9.2-20.4,20.3c0,1.5,0.3,3.1,0.6,4.6C32,34.2,17.1,26.2,7,13.9C5.2,17,4.3,20.3,4.3,24c0,7.1,4,13.2,9.4,16.6c-3.4,0-5.5-0.9-8.8-2.5v0.3c0,9.9,6.7,17.9,15.8,19.7c-1.8,0.3-3.7,0.6-5.5,0.6c-1.2,0-2.7,0-4-0.3c2.7,8,10.1,13.9,18.9,13.9c-7,5.5-15.8,8.6-25.3,8.6c-1.5,0-3.4,0-4.9-0.3c9.1,5.9,19.8,8.9,31.4,8.9c37.5,0,57.9-30.8,57.9-57.3c0-0.9,0-1.8,0-2.5C93.3,27.4,96.6,23.7,99.3,19.7z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M31.8,45.1V56h18c-0.7,4.7-5.4,13.7-18,13.7c-10.9,0-19.7-9-19.7-20.1c0-11.1,8.9-20.1,19.7-20.1c6.2,0,10.3,2.6,12.7,4.9l8.6-8.3c-5.5-5.2-12.7-8.3-21.3-8.3C14.2,17.9,0,32.1,0,49.7c0,17.6,14.2,31.8,31.8,31.8c18.3,0,30.5-12.9,30.5-31.1c0-2.1-0.2-3.7-0.5-5.3H31.8L31.8,45.1L31.8,45.1z"></path><polygon points="99.9,45.1 90.8,45.1 90.8,36 81.7,36 81.7,45.1 72.7,45.1 72.7,54.2 81.7,54.2 81.7,63.3 90.8,63.3 90.8,54.2 99.9,54.2"></polygon><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M92.4,0H7.3C3.4,0,0,3.4,0,7.3v85.2c0,3.8,3.4,7.3,7.3,7.3H92c4.2,0,7.3-3.1,7.3-7.3V7.3C99.7,3.4,96.2,0,92.4,0z M29.4,84.8H14.9V37.4h14.9v47.4H29.4z M22.1,30.9c-4.6,0-8.4-3.8-8.4-8.8c0-4.6,3.8-8.4,8.4-8.4c4.6,0,8.4,3.8,8.4,8.4C30.5,27.1,26.7,30.9,22.1,30.9z M84.8,84.8H69.9V61.5c0-5.3,0-12.6-7.6-12.6s-8.8,6.1-8.8,12.2v23.7H38.6V37.4h14.1v6.5h0.4c1.9-3.8,6.9-7.6,14.1-7.6c14.9,0,17.6,9.9,17.6,22.5V84.8z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><g><g><path d="M99.3,30.7c0,0-1-6.9-4-10c-3.8-4-8.1-4-10-4.2c-14-1-35.1-1-35.1-1h0c0,0-21,0-35.1,1c-2,0.2-6.2,0.3-10,4.2c-3,3-4,10-4,10s-1,8.1-1,16.2v7.6c0,8.1,1,16.2,1,16.2s1,6.9,4,10c3.8,4,8.8,3.9,11.1,4.3c8,0.8,34.1,1,34.1,1s21.1,0,35.1-1c2-0.2,6.2-0.3,10-4.2c3-3,4-10,4-10s1-8.1,1-16.2v-7.6C100.3,38.8,99.3,30.7,99.3,30.7zM39.8,63.7l0-28.2l27.1,14.1L39.8,63.7z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></g></g></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 240.17 240.17"><path d="M158.9,60.45c32.06,0,35.86.12,48.52,0.7,11.71,0.53,18.07,2.49,22.3,4.13a39.77,39.77,0,0,1,22.79,22.79c1.64,4.23,3.6,10.59,4.13,22.3,0.58,12.66.7,16.46,0.7,48.52s-0.12,35.86-.7,48.52c-0.53,11.71-2.49,18.07-4.13,22.3a39.77,39.77,0,0,1-22.79,22.79c-4.23,1.64-10.59,3.6-22.3,4.13-12.66.58-16.46,0.7-48.52,0.7s-35.86-.12-48.52-0.7c-11.71-.53-18.07-2.49-22.3-4.13a39.77,39.77,0,0,1-22.79-22.79c-1.64-4.23-3.6-10.59-4.13-22.3-0.58-12.66-.7-16.46-0.7-48.52s0.12-35.86.7-48.52c0.53-11.71,2.49-18.07,4.13-22.3A39.77,39.77,0,0,1,88.08,65.29c4.23-1.64,10.59-3.6,22.3-4.13,12.66-.58,16.46-0.7,48.52-0.7m0-21.64c-32.61,0-36.7.14-49.51,0.72s-21.51,2.61-29.15,5.58A61.4,61.4,0,0,0,45.12,80.24c-3,7.64-5,16.37-5.58,29.15s-0.72,16.9-.72,49.51,0.14,36.7.72,49.51,2.61,21.51,5.58,29.15a61.4,61.4,0,0,0,35.12,35.12c7.64,3,16.37,5,29.15,5.58s16.9,0.72,49.51.72,36.7-.14,49.51-0.72,21.51-2.61,29.15-5.58a61.4,61.4,0,0,0,35.12-35.12c3-7.64,5-16.37,5.58-29.15s0.72-16.9.72-49.51-0.14-36.7-.72-49.51-2.61-21.51-5.58-29.15a61.4,61.4,0,0,0-35.12-35.12c-7.64-3-16.37-5-29.15-5.58s-16.9-.72-49.51-0.72h0Z" transform="translate(-38.82 -38.82)"></path><path d="M158.9,97.24a61.66,61.66,0,1,0,61.66,61.67A61.67,61.67,0,0,0,158.9,97.24Zm0,101.69a40,40,0,1,1,40-40A40,40,0,0,1,158.9,198.93Z" transform="translate(-38.82 -38.82)"></path><circle cx="184.19" cy="55.98" r="14.41"></circle><rect class="actionMask" fill="transparent" x="0" y="0" height="240.17" width="240.17"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><g><g><path d="M49.9,0C22.4,0,0.1,22.3,0.1,49.8c0,21.1,13.1,39.1,31.6,46.4c-0.4-3.9-0.8-10,0.2-14.3c0.9-3.9,5.8-24.7,5.8-24.7s-1.5-3-1.5-7.4c0-6.9,4-12.1,9-12.1c4.2,0,6.3,3.2,6.3,7c0,4.3-2.7,10.7-4.1,16.6c-1.2,5,2.5,9,7.4,9c8.8,0,15.7-9.3,15.7-22.8c0-11.9-8.6-20.3-20.8-20.3c-14.2,0-22.5,10.6-22.5,21.6c0,4.3,1.6,8.9,3.7,11.4c0.4,0.5,0.5,0.9,0.3,1.4c-0.4,1.6-1.2,5-1.4,5.6c-0.2,0.9-0.7,1.1-1.7,0.7C22,65,18.1,55.9,18.1,48.6c0-15.7,11.4-30.1,32.9-30.1c17.3,0,30.7,12.3,30.7,28.8c0,17.2-10.8,31-25.8,31c-5,0-9.8-2.6-11.4-5.7c0,0-2.5,9.5-3.1,11.8c-1.1,4.3-4.2,9.7-6.2,13.1c4.7,1.4,9.6,2.2,14.7,2.2c27.5,0,49.8-22.3,49.8-49.8C99.7,22.3,77.4,0,49.9,0z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></g></g></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M49,2v47H2V2H49 M51,0H0v51h51V0L51,0z"></path><path d="M47,47H4V4h43V47z"></path><path class="actionMask" fill="transparent" d="M51,51H0V0h51V51z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M46,2c1.7,0,3,1.3,3,3v41c0,1.7-1.3,3-3,3H5c-1.7,0-3-1.3-3-3V5c0-1.7,1.3-3,3-3H46 M46,0H5C2.2,0,0,2.2,0,5v41c0,2.8,2.2,5,5,5h41c2.8,0,5-2.2,5-5V5C51,2.2,48.8,0,46,0L46,0z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9,4h33c2.8,0,5,2.2,5,5v33c0,2.8-2.2,5-5,5H9c-2.8,0-5-2.2-5-5V9C4,6.2,6.2,4,9,4z"></path><path class="actionMask" fill="transparent" fill-rule="evenodd" clip-rule="evenodd" d="M5,0h41c2.8,0,5,2.2,5,5v41c0,2.8-2.2,5-5,5H5c-2.8,0-5-2.2-5-5V5C0,2.2,2.2,0,5,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 45 45"><path class="actionMask" d="M0,45L22.5,0L45,45H0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 45 45"><path d="M22.5,4.5L41.8,43H3.2L22.5,4.5 M22.5,0L0,45h45L22.5,0L22.5,0z"></path><path class="actionMask" fill="transparent" d="M0,45L22.5,0L45,45H0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 45 45"><path d="M22.5,8.9l16,32.1H6.5L22.5,8.9 M22.5,0L0,45h45L22.5,0L22.5,0z"></path><path class="actionMask" fill="transparent" d="M0,45L22.5,0L45,45H0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 45 45"><path d="M22.5,4.5L41.8,43H3.2L22.5,4.5 M22.5,0L0,45h45L22.5,0L22.5,0z"></path><path d="M7,41L22.5,9L38,41H7z"></path><path class="actionMask" fill="transparent" d="M0,45L22.5,0L45,45H0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M25.5,2C38.5,2,49,12.5,49,25.5S38.5,49,25.5,49S2,38.5,2,25.5S12.5,2,25.5,2 M25.5,0C11.4,0,0,11.4,0,25.5S11.4,51,25.5,51S51,39.6,51,25.5S39.6,0,25.5,0L25.5,0z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M25.5,4C37.4,4,47,13.6,47,25.5S37.4,47,25.5,47S4,37.4,4,25.5S13.6,4,25.5,4z"></path><path class="actionMask" fill="transparent" fill-rule="evenodd" clip-rule="evenodd" d="M25.5,0C39.6,0,51,11.4,51,25.5S39.6,51,25.5,51S0,39.6,0,25.5S11.4,0,25.5,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path class="actionMask" d="M25.5,0l4.8,3.1l5.6-0.9L39.1,7l5.5,1.5l0.9,5.6l4.4,3.6l-1.4,5.5l2.6,5.1L47.4,33l0.3,5.7l-5.1,2.6l-2.1,5.3L34.9,47l-4.1,4l-5.3-2l-5.3,2l-4.1-4l-5.7-0.3l-2.1-5.3l-5.1-2.6L3.6,33L0,28.5l2.6-5.1l-1.4-5.5l4.4-3.6l0.9-5.6L11.9,7l3.1-4.8l5.6,0.9L25.5,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M25.5,2.4l3.7,2.4l0.6,0.4l0.7-0.1L35,4.4l2.4,3.7l0.4,0.6l0.7,0.2l4.3,1.2l0.7,4.4l0.1,0.7l0.6,0.5l3.4,2.8l-1.1,4.3l-0.2,0.7l0.3,0.7l2,4l-2.8,3.5l-0.5,0.6l0,0.7l0.2,4.4l-3.9,2l-0.7,0.3l-0.3,0.7l-1.6,4.1L34.8,45L34,45l-0.5,0.5l-3.1,3.1l-4.1-1.6l-0.7-0.3l-0.7,0.3l-4.1,1.6l-3.1-3.1L17,45l-0.8,0l-4.4-0.3l-1.6-4.1l-0.3-0.7l-0.7-0.3l-3.9-2L5.6,33l0-0.7l-0.5-0.6l-2.8-3.5l2-4l0.3-0.7l-0.2-0.7l-1.1-4.3l3.4-2.8l0.6-0.5l0.1-0.7l0.7-4.4l4.3-1.2l0.7-0.2l0.4-0.6L16,4.4l4.4,0.7l0.7,0.1l0.6-0.4L25.5,2.4 M25.5,0l-4.8,3.1l-5.6-0.9L11.9,7L6.4,8.5l-0.9,5.6l-4.4,3.6l1.4,5.5L0,28.5L3.6,33l-0.3,5.7l5.1,2.6l2.1,5.3l5.7,0.3l4.1,4l5.3-2l5.3,2l4.1-4l5.7-0.3l2.1-5.3l5.1-2.6L47.4,33l3.6-4.5l-2.6-5.1l1.4-5.5l-4.4-3.6l-0.9-5.6L39.1,7l-3.1-4.8l-5.6,0.9L25.5,0L25.5,0z"></path><path class="actionMask" fill="transparent" d="M25.5,0l4.8,3.1l5.6-0.9L39.1,7l5.5,1.5l0.9,5.6l4.4,3.6l-1.4,5.5l2.6,5.1L47.4,33l0.3,5.7l-5.1,2.6l-2.1,5.3L34.9,47l-4.1,4l-5.3-2l-5.3,2l-4.1-4l-5.7-0.3l-2.1-5.3l-5.1-2.6L3.6,33L0,28.5l2.6-5.1l-1.4-5.5l4.4-3.6l0.9-5.6L11.9,7l3.1-4.8l5.6,0.9L25.5,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M25.5,4.8l2.6,1.7l1.3,0.8L30.9,7L34,6.6l1.7,2.6l0.8,1.3l1.5,0.4l3,0.8l0.5,3.1l0.2,1.5l1.2,1l2.4,2l-0.8,3.1l-0.4,1.4l0.7,1.3l1.4,2.8l-2,2.5l-0.9,1.2l0.1,1.5l0.1,3.2l-2.8,1.5l-1.3,0.7l-0.5,1.4l-1.1,2.9L34.6,43l-1.5,0.1l-1.1,1.1l-2.2,2.2l-2.9-1.1l-1.4-0.5l-1.4,0.5l-2.9,1.1l-2.2-2.2l-1.1-1.1L16.4,43l-3.1-0.2l-1.1-2.9l-0.5-1.4l-1.3-0.7l-2.8-1.5l0.1-3.2l0.1-1.5l-0.9-1.2l-2-2.5l1.4-2.8l0.7-1.3l-0.4-1.4l-0.8-3.1l2.4-2l1.2-1l0.2-1.5l0.5-3.1l3-0.8l1.5-0.4l0.8-1.3L17,6.6L20.1,7l1.5,0.2l1.3-0.8L25.5,4.8 M25.5,0l-4.8,3.1l-5.6-0.9L11.9,7L6.4,8.5l-0.9,5.6l-4.4,3.6l1.4,5.5L0,28.5L3.6,33l-0.3,5.7l5.1,2.6l2.1,5.3l5.7,0.3l4.1,4l5.3-2l5.3,2l4.1-4l5.7-0.3l2.1-5.3l5.1-2.6L47.4,33l3.6-4.5l-2.5-5.1l1.4-5.5l-4.4-3.6l-0.9-5.6L39.1,7l-3.1-4.8l-5.6,0.9L25.5,0L25.5,0z"></path><path class="actionMask" fill="transparent" d="M25.5,0l4.8,3.1l5.6-0.9L39.1,7l5.5,1.5l0.9,5.6l4.4,3.6l-1.4,5.5l2.6,5.1L47.4,33l0.3,5.7l-5.1,2.6l-2.1,5.3L34.9,47l-4.1,4l-5.3-2l-5.3,2l-4.1-4l-5.7-0.3l-2.1-5.3l-5.1-2.6L3.6,33L0,28.5l2.6-5.1l-1.4-5.5l4.4-3.6l0.9-5.6L11.9,7l3.1-4.8l5.6,0.9L25.5,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M25.5,2.4l3.7,2.4l0.6,0.4l0.7-0.1L35,4.4l2.4,3.7l0.4,0.6l0.7,0.2l4.3,1.2l0.7,4.4l0.1,0.7l0.6,0.5l3.4,2.8l-1.1,4.3l-0.2,0.7l0.3,0.7l2,4l-2.8,3.5l-0.5,0.6l0,0.7l0.2,4.4l-3.9,2l-0.7,0.3l-0.3,0.7l-1.6,4.1L34.8,45L34,45l-0.5,0.5l-3.1,3.1l-4.1-1.6l-0.7-0.3l-0.7,0.3l-4.1,1.6l-3.1-3.1L17,45l-0.8,0l-4.4-0.3l-1.6-4.1l-0.3-0.7l-0.7-0.3l-3.9-2L5.6,33l0-0.7l-0.5-0.6l-2.8-3.5l2-4l0.3-0.7l-0.2-0.7l-1.1-4.3l3.4-2.8l0.6-0.5l0.1-0.7l0.7-4.4l4.3-1.2l0.7-0.2l0.4-0.6L16,4.4l4.4,0.7l0.7,0.1l0.6-0.4L25.5,2.4 M25.5,0l-4.8,3.1l-5.6-0.9L11.9,7L6.4,8.5l-0.9,5.6l-4.4,3.6l1.4,5.5L0,28.5L3.6,33l-0.3,5.7l5.1,2.6l2.1,5.3l5.7,0.3l4.1,4l5.3-2l5.3,2l4.1-4l5.7-0.3l2.1-5.3l5.1-2.6L47.4,33l3.6-4.5l-2.6-5.1l1.4-5.5l-4.4-3.6l-0.9-5.6L39.1,7l-3.1-4.8l-5.6,0.9L25.5,0L25.5,0z"></path><path d="M25.5,5l3.9,2.5l4.5-0.7l2.5,3.8l4.4,1.2l0.7,4.5l3.5,2.9L44,23.8l2.1,4.1l-2.9,3.6l0.2,4.6l-4.1,2.1l-1.7,4.3L33,42.8L29.8,46l-4.3-1.6L21.2,46L18,42.8l-4.6-0.3l-1.7-4.3l-4.1-2.1l0.2-4.6L5,27.9l2.1-4.1l-1.2-4.5l3.5-2.9l0.7-4.5l4.4-1.2l2.5-3.8l4.5,0.7L25.5,5z"></path><path class="actionMask" fill="transparent" d="M25.5,0l4.8,3.1l5.6-0.9L39.1,7l5.5,1.5l0.9,5.6l4.4,3.6l-1.4,5.5l2.6,5.1L47.4,33l0.3,5.7l-5.1,2.6l-2.1,5.3L34.9,47l-4.1,4l-5.3-2l-5.3,2l-4.1-4l-5.7-0.3l-2.1-5.3l-5.1-2.6L3.6,33L0,28.5l2.6-5.1l-1.4-5.5l4.4-3.6l0.9-5.6L11.9,7l3.1-4.8l5.6,0.9L25.5,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path class="actionMask" d="M18.7,51L6.8,44.2L0,32.3V18.7L6.8,6.8L18.7,0h13.7l11.8,6.8L51,18.7v13.7l-6.8,11.8L32.3,51H18.7z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M31.8,2l10.9,6.3L49,19.2v12.6l-6.3,10.9L31.8,49H19.2L8.3,42.7L2,31.8V19.2L8.3,8.3L19.2,2H31.8 M32.3,0H18.7L6.8,6.8L0,18.7v13.7l6.8,11.8L18.7,51h13.7l11.8-6.8L51,32.3V18.7L44.2,6.8L32.3,0L32.3,0z"></path><path class="actionMask" fill="transparent" d="M18.7,51L6.8,44.2L0,32.3V18.7L6.8,6.8L18.7,0h13.7l11.8,6.8L51,18.7v13.7l-6.8,11.8L32.3,51H18.7z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M31.3,4l10,5.8l5.8,10v11.5l-5.8,10l-10,5.8H19.7l-10-5.8L4,31.3V19.7l5.8-10l10-5.8H31.3 M32.3,0H18.7L6.8,6.8L0,18.7v13.7l6.8,11.8L18.7,51h13.7l11.8-6.8L51,32.3V18.7L44.2,6.8L32.3,0L32.3,0z"></path><path class="actionMask" fill="transparent" d="M18.7,51L6.8,44.2L0,32.3V18.7L6.8,6.8L18.7,0h13.7l11.8,6.8L51,18.7v13.7l-6.8,11.8L32.3,51H18.7z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M31.8,2l10.9,6.3L49,19.2v12.6l-6.3,10.9L31.8,49H19.2L8.3,42.7L2,31.8V19.2L8.3,8.3L19.2,2H31.8 M32.3,0H18.7L6.8,6.8L0,18.7v13.7l6.8,11.8L18.7,51h13.7l11.8-6.8L51,32.3V18.7L44.2,6.8L32.3,0L32.3,0z"></path><path d="M19.7,47l-10-5.8L4,31.3V19.7l5.8-10l10-5.8h11.5l10,5.8l5.8,10v11.5l-5.8,10l-10,5.8H19.7z"></path><path class="actionMask" fill="transparent" d="M18.7,51L6.8,44.2L0,32.3V18.7L6.8,6.8L18.7,0h13.7l11.8,6.8L51,18.7v13.7l-6.8,11.8L32.3,51H18.7z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 40 58"><path class="actionMask" d="M40,48.8L20,58L0,48.8V9.2L20,0l20,9.2V48.8z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 40 58"><path d="M20,2.2l18,8.2v37.1l-18,8.2L2,47.6V10.4L20,2.2 M20,0L0,9.2v39.7L20,58l20-9.2V9.2L20,0L20,0z"></path><path class="actionMask" fill="transparent" d="M40,48.8L20,58L0,48.8V9.2L20,0l20,9.2V48.8z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 40 58"><path d="M20,4.4l16,7.3v34.5l-16,7.3L4,46.3V11.7L20,4.4 M20,0L0,9.2v39.7L20,58l20-9.2V9.2L20,0L20,0z"></path><path class="actionMask" fill="transparent" d="M40,48.8L20,58L0,48.8V9.2L20,0l20,9.2V48.8z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 40 58"><path d="M36,45.7L20,53L4,45.7V12.3L20,5l16,7.3V45.7z"></path><path d="M20,2.2l18,8.2v37.1l-18,8.2L2,47.6V10.4L20,2.2 M20,0L0,9.2v39.7L20,58l20-9.2V9.2L20,0L20,0z"></path><path class="actionMask" fill="transparent" d="M40,48.8L20,58L0,48.8V9.2L20,0l20,9.2V48.8z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 63 34"><path class="actionMask" d="M63,17L31.5,34L0,17L31.5,0L63,17z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 63 34"><path d="M31.5,2.3L58.8,17L31.5,31.7L4.2,17L31.5,2.3 M31.5,0L0,17l31.5,17L63,17L31.5,0L31.5,0z"></path><path class="actionMask" fill="transparent" d="M63,17L31.5,34L0,17L31.5,0L63,17z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 63 34"><path d="M31.5,4.5L54.6,17L31.5,29.5L8.4,17L31.5,4.5 M31.5,0L0,17l31.5,17L63,17L31.5,0L31.5,0z"></path><path class="actionMask" fill="transparent" d="M63,17L31.5,34L0,17L31.5,0L63,17z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 63 34"><path d="M31.5,2.3L58.8,17L31.5,31.7L4.2,17L31.5,2.3 M31.5,0L0,17l31.5,17L63,17L31.5,0L31.5,0z"></path><path d="M55,17L31,29L8,17L31,5L55,17z"></path><path class="actionMask" fill="transparent" d="M63,17L31.5,34L0,17L31.5,0L63,17z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path class="actionMask" fill-rule="evenodd" clip-rule="evenodd" d="M50.829,24.856c-0.279-1.086-1.227-1.987-1.35-2.99c-0.015-0.123-0.043-0.241-0.083-0.357c-0.001-0.111-0.013-0.221-0.037-0.33c-0.209-0.991,0.395-2.142,0.307-3.269c-0.041-0.529-0.157-1.04-0.353-1.535c-0.184-0.493-0.44-0.952-0.763-1.373c-0.683-0.89-1.906-1.35-2.413-2.226c-0.061-0.106-0.134-0.206-0.217-0.296c-0.043-0.101-0.097-0.198-0.162-0.289c-0.581-0.831-0.474-2.125-0.995-3.128c-0.246-0.471-0.553-0.897-0.924-1.276c-0.363-0.382-0.777-0.704-1.239-0.964c-0.983-0.557-2.28-0.497-3.09-1.106c-0.099-0.074-0.204-0.138-0.316-0.188c-0.082-0.077-0.17-0.145-0.264-0.204c-0.857-0.537-1.272-1.775-2.138-2.489c-0.41-0.338-0.859-0.61-1.35-0.813c-0.483-0.211-0.991-0.345-1.518-0.404c-1.123-0.128-2.294,0.434-3.279,0.189c-0.118-0.029-0.24-0.046-0.363-0.049c-0.103-0.039-0.212-0.067-0.322-0.085c-1-0.159-1.866-1.136-2.943-1.455C26.508,0.071,25.989-0.004,25.457,0c-0.526-0.004-1.045,0.071-1.555,0.221c-1.035,0.307-1.785,1.15-2.71,1.405c-0.954,0.059-1.91-0.459-2.983-0.391c-0.53,0.034-1.043,0.142-1.542,0.33c-0.496,0.177-0.958,0.426-1.384,0.743c-0.859,0.639-1.255,1.647-2.017,2.218c-0.876,0.362-1.92,0.207-2.898,0.633C9.881,5.373,9.435,5.649,9.031,5.994C8.625,6.329,8.275,6.721,7.982,7.165C7.359,8.107,7.33,9.404,6.667,10.17c-0.047,0.053-0.088,0.109-0.127,0.167c-0.028,0.032-0.055,0.065-0.08,0.099c-0.608,0.81-1.871,1.113-2.661,1.923c-0.37,0.38-0.679,0.804-0.923,1.276c-0.25,0.464-0.426,0.958-0.529,1.479c-0.221,1.107,0.242,2.32-0.086,3.279c-0.039,0.119-0.065,0.238-0.079,0.361c-0.047,0.103-0.085,0.209-0.113,0.319c-0.242,0.984-1.286,1.757-1.695,2.81c-0.193,0.495-0.311,1.006-0.351,1.536c-0.049,0.525-0.017,1.049,0.092,1.568c0.229,1.106,1.13,2.04,1.206,3.051c0.014,0.194,0.06,0.379,0.139,0.554c-0.029,0.181-0.025,0.366,0.007,0.55c0.178,0.996-0.46,2.128-0.405,3.256c0.024,0.531,0.125,1.046,0.304,1.546c0.169,0.498,0.41,0.964,0.72,1.395c0.661,0.917,1.866,1.405,2.346,2.297c0.04,0.076,0.087,0.149,0.139,0.218c0.029,0.06,0.061,0.119,0.098,0.176c0.545,0.853,0.391,2.149,0.869,3.165c0.225,0.481,0.516,0.918,0.872,1.311c0.347,0.397,0.748,0.735,1.2,1.014c0.961,0.595,2.258,0.587,3.044,1.23c0.034,0.028,0.069,0.054,0.106,0.079c0.728,0.639,1.019,1.766,1.809,2.519c0.386,0.367,0.814,0.669,1.289,0.907c0.466,0.244,0.963,0.413,1.487,0.511c1.109,0.207,2.316-0.27,3.281,0.043c0.117,0.038,0.237,0.063,0.357,0.076c0.103,0.046,0.208,0.082,0.318,0.108c0.987,0.23,1.773,1.264,2.832,1.66c0.496,0.186,1.009,0.299,1.54,0.332c0.523,0.042,1.05,0.003,1.568-0.111c1.104-0.243,2.027-1.154,3.038-1.242c0.124-0.01,0.244-0.034,0.36-0.071c0.111,0.003,0.223-0.006,0.332-0.024c0.999-0.174,2.127,0.47,3.256,0.422c0.532-0.022,1.046-0.119,1.548-0.295c0.5-0.166,0.967-0.407,1.399-0.713c0.92-0.655,1.416-1.856,2.312-2.33c0.108-0.058,0.208-0.127,0.302-0.206c0.103-0.04,0.203-0.092,0.296-0.152c0.853-0.55,2.141-0.399,3.163-0.884c0.481-0.228,0.916-0.519,1.308-0.878c0.395-0.349,0.732-0.751,1.009-1.204c0.592-0.962,0.577-2.26,1.216-3.047c0.077-0.096,0.145-0.198,0.198-0.307c0.079-0.078,0.151-0.164,0.214-0.256c0.568-0.84,1.815-1.203,2.566-2.049c0.352-0.397,0.64-0.836,0.861-1.319c0.226-0.475,0.38-0.978,0.458-1.502c0.167-1.117-0.353-2.307-0.073-3.28c0.034-0.118,0.054-0.238,0.063-0.36c0.042-0.102,0.075-0.209,0.096-0.319c0.195-0.995,1.201-1.818,1.56-2.888c0.168-0.504,0.263-1.019,0.276-1.551C51.019,25.894,50.961,25.369,50.829,24.856z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><path d="M25.5,0v2c0.323,0,0.633,0.045,0.949,0.139c0.232,0.069,0.57,0.285,0.897,0.495c0.597,0.382,1.338,0.857,2.266,1.012l0.278,0.105l0.306,0.008c0.318,0.076,0.647,0.113,1.005,0.113c0.534,0,1.033-0.085,1.474-0.16c0.336-0.057,0.653-0.111,0.895-0.111c0.042,0,0.085,0.002,0.129,0.007c0.331,0.037,0.648,0.122,0.977,0.264C34.983,4,35.259,4.166,35.519,4.381c0.186,0.153,0.412,0.485,0.631,0.805c0.4,0.585,0.896,1.312,1.694,1.821l0.226,0.211l0.265,0.119c0.758,0.559,1.611,0.762,2.298,0.925c0.378,0.09,0.768,0.182,0.986,0.305c0.287,0.162,0.547,0.363,0.792,0.621c0.234,0.239,0.423,0.501,0.579,0.8c0.113,0.217,0.191,0.61,0.267,0.99c0.137,0.688,0.307,1.541,0.842,2.329l0.117,0.275l0.209,0.227c0.479,0.811,1.187,1.332,1.757,1.752c0.313,0.23,0.636,0.468,0.782,0.659c0.203,0.265,0.364,0.553,0.49,0.89c0.121,0.306,0.192,0.618,0.219,0.955c0.019,0.244-0.063,0.637-0.142,1.017c-0.144,0.693-0.322,1.553-0.134,2.482l0.009,0.298l0.091,0.275c0.122,0.936,0.571,1.695,0.933,2.305c0.198,0.334,0.402,0.679,0.462,0.913c0.084,0.325,0.119,0.651,0.103,1.012c-0.008,0.323-0.065,0.639-0.173,0.962c-0.078,0.231-0.306,0.561-0.527,0.879c-0.403,0.581-0.903,1.302-1.094,2.231l-0.112,0.275l-0.02,0.298c-0.253,0.91-0.136,1.781-0.043,2.482c0.051,0.384,0.105,0.782,0.069,1.023c-0.049,0.327-0.145,0.642-0.298,0.965c-0.138,0.301-0.315,0.571-0.538,0.824c-0.163,0.184-0.502,0.398-0.831,0.605c-0.598,0.377-1.341,0.846-1.877,1.623l-0.225,0.222L43.2,39.018c-0.586,0.737-0.819,1.582-1.006,2.262c-0.103,0.374-0.209,0.76-0.339,0.971c-0.173,0.282-0.384,0.534-0.653,0.772c-0.244,0.224-0.511,0.403-0.816,0.547c-0.222,0.106-0.619,0.17-1.003,0.233c-0.699,0.114-1.569,0.256-2.369,0.766l-0.276,0.122l-0.223,0.178c-0.83,0.449-1.375,1.137-1.815,1.691c-0.241,0.304-0.49,0.618-0.687,0.758c-0.275,0.195-0.568,0.345-0.904,0.457c-0.313,0.11-0.629,0.17-1.009,0.185c-0.247,0-0.6-0.086-0.974-0.178c-0.53-0.129-1.13-0.276-1.795-0.276c-0.231,0-0.459,0.018-0.674,0.054l-0.301-0.008l-0.286,0.09c-0.939,0.09-1.709,0.51-2.329,0.848c-0.341,0.186-0.693,0.378-0.932,0.43C24.566,48.973,24.322,49,24.083,49c-0.085,0-0.169-0.003-0.287-0.012c-0.328-0.021-0.644-0.089-0.965-0.209c-0.229-0.086-0.551-0.326-0.862-0.558c-0.572-0.427-1.285-0.959-2.175-1.164l-0.287-0.128l-0.293-0.031c-0.423-0.134-0.88-0.199-1.395-0.199c-0.386,0-0.758,0.036-1.086,0.069c-0.274,0.027-0.533,0.052-0.75,0.052c-0.111,0-0.203-0.007-0.272-0.02c-0.332-0.062-0.644-0.169-0.958-0.333c-0.299-0.15-0.563-0.336-0.806-0.568c-0.185-0.176-0.373-0.502-0.572-0.848c-0.304-0.529-0.683-1.186-1.297-1.725l-0.052-0.052L11.918,43.2c-0.742-0.606-1.599-0.846-2.287-1.039c-0.374-0.105-0.76-0.213-0.97-0.343c-0.283-0.175-0.534-0.387-0.768-0.654c-0.226-0.25-0.404-0.517-0.546-0.822c-0.103-0.218-0.166-0.615-0.226-0.998c-0.11-0.694-0.247-1.553-0.754-2.372L6.288,36.81l-0.106-0.14c-0.454-0.834-1.15-1.378-1.71-1.816c-0.306-0.239-0.622-0.487-0.763-0.683c-0.195-0.271-0.346-0.563-0.461-0.902c-0.111-0.311-0.173-0.626-0.189-0.967c-0.012-0.244,0.082-0.635,0.172-1.013c0.163-0.683,0.365-1.53,0.214-2.444l0.085-0.532L3.31,27.831c-0.084-0.929-0.49-1.695-0.818-2.313c-0.182-0.342-0.369-0.696-0.42-0.943c-0.068-0.323-0.088-0.65-0.055-1.005c0.025-0.331,0.097-0.644,0.221-0.962c0.089-0.228,0.333-0.546,0.569-0.855c0.435-0.567,0.975-1.273,1.192-2.162l0.119-0.236l0.037-0.317c0.31-0.908,0.234-1.796,0.173-2.509c-0.033-0.386-0.067-0.785-0.018-1.03c0.064-0.324,0.174-0.632,0.344-0.949c0.15-0.292,0.339-0.552,0.576-0.795c0.172-0.176,0.521-0.374,0.86-0.565c0.622-0.352,1.396-0.79,1.947-1.527l0.07-0.076l0.073-0.107c0.627-0.724,0.891-1.573,1.103-2.256c0.115-0.37,0.234-0.753,0.369-0.957c0.184-0.278,0.404-0.525,0.681-0.754c0.249-0.213,0.523-0.383,0.838-0.52c0.242-0.106,0.591-0.148,0.995-0.197c0.561-0.068,1.196-0.144,1.866-0.421l0.233-0.096l0.202-0.151c0.599-0.449,0.996-0.979,1.346-1.448c0.245-0.328,0.456-0.61,0.667-0.767c0.267-0.199,0.557-0.355,0.895-0.476c0.31-0.117,0.626-0.184,0.963-0.206l0.071-0.002c0.252,0,0.583,0.076,0.934,0.157c0.496,0.115,1.058,0.244,1.697,0.244c0.092,0,0.185-0.003,0.277-0.008l0.208-0.013l0.201-0.055c0.755-0.208,1.339-0.588,1.854-0.923c0.332-0.216,0.646-0.42,0.892-0.493C24.782,2.047,25.1,2,25.414,2l0.051,0l0.008,0L25.5,0 M25.5,0c-0.014,0-0.029,0-0.043,0c-0.014,0-0.029,0-0.043,0c-0.511,0-1.016,0.075-1.512,0.222c-1.035,0.307-1.785,1.15-2.71,1.405c-0.051,0.003-0.103,0.005-0.154,0.005c-0.844,0-1.694-0.402-2.631-0.402c-0.066,0-0.132,0.002-0.198,0.006c-0.53,0.034-1.043,0.142-1.542,0.33c-0.496,0.177-0.958,0.426-1.384,0.743c-0.859,0.639-1.255,1.647-2.017,2.218c-0.876,0.362-1.92,0.207-2.898,0.633C9.881,5.373,9.435,5.649,9.031,5.994C8.625,6.329,8.275,6.721,7.982,7.165C7.359,8.107,7.33,9.404,6.667,10.17c-0.047,0.053-0.088,0.109-0.127,0.167c-0.028,0.032-0.055,0.065-0.08,0.099c-0.608,0.81-1.871,1.113-2.661,1.923c-0.37,0.38-0.679,0.804-0.923,1.276c-0.25,0.464-0.426,0.958-0.529,1.479c-0.221,1.107,0.242,2.32-0.086,3.279c-0.039,0.119-0.065,0.238-0.079,0.361c-0.047,0.103-0.085,0.209-0.113,0.319c-0.242,0.984-1.286,1.757-1.695,2.81c-0.193,0.495-0.311,1.006-0.351,1.536c-0.049,0.525-0.017,1.049,0.092,1.568c0.229,1.106,1.13,2.04,1.206,3.051c0.014,0.194,0.059,0.379,0.139,0.554c-0.029,0.181-0.025,0.366,0.007,0.55c0.178,0.996-0.46,2.128-0.405,3.256c0.024,0.531,0.125,1.046,0.304,1.546c0.169,0.498,0.41,0.964,0.72,1.395c0.661,0.917,1.866,1.405,2.346,2.297c0.04,0.076,0.087,0.149,0.139,0.218c0.029,0.06,0.061,0.119,0.098,0.176c0.545,0.853,0.391,2.149,0.869,3.165c0.225,0.481,0.516,0.918,0.872,1.311c0.347,0.397,0.748,0.735,1.2,1.014c0.961,0.595,2.258,0.587,3.044,1.23c0.034,0.028,0.069,0.054,0.106,0.079c0.728,0.639,1.019,1.766,1.809,2.519c0.386,0.367,0.814,0.669,1.289,0.907c0.466,0.244,0.963,0.413,1.487,0.511c0.211,0.039,0.425,0.054,0.641,0.054c0.621,0,1.252-0.121,1.836-0.121c0.281,0,0.551,0.028,0.804,0.11c0.117,0.038,0.237,0.063,0.357,0.076c0.103,0.046,0.208,0.082,0.318,0.108c0.987,0.23,1.773,1.264,2.832,1.66c0.496,0.186,1.009,0.299,1.54,0.332C23.808,50.995,23.946,51,24.083,51c0.386,0,0.773-0.043,1.155-0.127c1.104-0.243,2.027-1.154,3.038-1.242c0.124-0.01,0.244-0.034,0.36-0.071c0.015,0,0.029,0.001,0.044,0.001c0.096,0,0.193-0.009,0.288-0.025c0.119-0.021,0.24-0.03,0.363-0.03c0.868,0,1.816,0.454,2.769,0.454c0.041,0,0.083-0.001,0.124-0.003c0.532-0.021,1.046-0.119,1.548-0.295c0.5-0.166,0.967-0.407,1.399-0.713c0.92-0.655,1.416-1.856,2.312-2.33c0.108-0.057,0.208-0.127,0.302-0.206c0.103-0.04,0.203-0.092,0.296-0.152c0.853-0.55,2.141-0.399,3.163-0.884c0.481-0.228,0.916-0.519,1.308-0.878c0.395-0.349,0.732-0.751,1.009-1.204c0.592-0.962,0.577-2.26,1.216-3.047c0.077-0.096,0.145-0.198,0.198-0.307c0.079-0.078,0.151-0.164,0.214-0.256c0.568-0.84,1.815-1.203,2.566-2.049c0.352-0.397,0.64-0.836,0.861-1.319c0.226-0.475,0.38-0.978,0.458-1.502c0.167-1.117-0.353-2.307-0.073-3.28c0.034-0.118,0.054-0.238,0.063-0.36c0.042-0.102,0.075-0.209,0.096-0.319c0.195-0.995,1.201-1.818,1.56-2.888c0.168-0.504,0.263-1.019,0.276-1.551c0.024-0.524-0.033-1.048-0.166-1.561c-0.279-1.086-1.227-1.987-1.35-2.99c-0.015-0.123-0.043-0.241-0.083-0.357c-0.001-0.111-0.013-0.221-0.037-0.33c-0.209-0.991,0.395-2.142,0.307-3.269c-0.041-0.529-0.157-1.04-0.353-1.535c-0.184-0.493-0.44-0.952-0.763-1.373c-0.683-0.89-1.906-1.349-2.413-2.226c-0.061-0.106-0.134-0.206-0.217-0.296c-0.043-0.101-0.097-0.198-0.162-0.289c-0.581-0.831-0.474-2.125-0.995-3.128c-0.246-0.471-0.553-0.897-0.924-1.276c-0.363-0.382-0.777-0.704-1.239-0.964c-0.983-0.557-2.28-0.497-3.09-1.106c-0.099-0.074-0.204-0.138-0.316-0.188c-0.082-0.077-0.17-0.145-0.264-0.204c-0.857-0.537-1.272-1.775-2.138-2.489c-0.41-0.338-0.859-0.61-1.35-0.813c-0.483-0.211-0.991-0.345-1.518-0.404c-0.117-0.013-0.235-0.019-0.353-0.019c-0.806,0-1.624,0.271-2.369,0.271c-0.191,0-0.377-0.018-0.557-0.062c-0.118-0.029-0.24-0.046-0.363-0.049c-0.103-0.039-0.212-0.067-0.322-0.085c-1-0.159-1.866-1.136-2.944-1.455C26.522,0.075,26.017,0,25.5,0L25.5,0z"></path><path class="actionMask" fill="transparent" fill-rule="evenodd" clip-rule="evenodd" d="M50.829,24.856c-0.279-1.086-1.227-1.987-1.35-2.99c-0.015-0.123-0.043-0.241-0.083-0.357c-0.001-0.111-0.013-0.221-0.037-0.33c-0.209-0.991,0.395-2.142,0.307-3.269c-0.041-0.529-0.157-1.04-0.353-1.535c-0.184-0.493-0.44-0.952-0.763-1.373c-0.683-0.89-1.906-1.35-2.413-2.226c-0.061-0.106-0.134-0.206-0.217-0.296c-0.043-0.101-0.097-0.198-0.162-0.289c-0.581-0.831-0.474-2.125-0.995-3.128c-0.246-0.471-0.553-0.897-0.924-1.276c-0.363-0.382-0.777-0.704-1.239-0.964c-0.983-0.557-2.28-0.497-3.09-1.106c-0.099-0.074-0.204-0.138-0.316-0.188c-0.082-0.077-0.17-0.145-0.264-0.204c-0.857-0.537-1.272-1.775-2.138-2.489c-0.41-0.338-0.859-0.61-1.35-0.813c-0.483-0.211-0.991-0.345-1.518-0.404c-1.123-0.128-2.294,0.434-3.279,0.189c-0.118-0.029-0.24-0.046-0.363-0.049c-0.103-0.039-0.212-0.067-0.322-0.085c-1-0.159-1.866-1.136-2.943-1.455C26.508,0.071,25.989-0.004,25.457,0c-0.526-0.004-1.045,0.071-1.555,0.221c-1.035,0.307-1.785,1.15-2.71,1.405c-0.954,0.059-1.91-0.459-2.983-0.391c-0.53,0.034-1.043,0.142-1.542,0.33c-0.496,0.177-0.958,0.426-1.384,0.743c-0.859,0.639-1.255,1.647-2.017,2.218c-0.876,0.362-1.92,0.207-2.898,0.633C9.881,5.373,9.435,5.649,9.031,5.994C8.625,6.329,8.275,6.721,7.982,7.165C7.359,8.107,7.33,9.404,6.667,10.17c-0.047,0.053-0.088,0.109-0.127,0.167c-0.028,0.032-0.055,0.065-0.08,0.099c-0.608,0.81-1.871,1.113-2.661,1.923c-0.37,0.38-0.679,0.804-0.923,1.276c-0.25,0.464-0.426,0.958-0.529,1.479c-0.221,1.107,0.242,2.32-0.086,3.279c-0.039,0.119-0.065,0.238-0.079,0.361c-0.047,0.103-0.085,0.209-0.113,0.319c-0.242,0.984-1.286,1.757-1.695,2.81c-0.193,0.495-0.311,1.006-0.351,1.536c-0.049,0.525-0.017,1.049,0.092,1.568c0.229,1.106,1.13,2.04,1.206,3.051c0.014,0.194,0.06,0.379,0.139,0.554c-0.029,0.181-0.025,0.366,0.007,0.55c0.178,0.996-0.46,2.128-0.405,3.256c0.024,0.531,0.125,1.046,0.304,1.546c0.169,0.498,0.41,0.964,0.72,1.395c0.661,0.917,1.866,1.405,2.346,2.297c0.04,0.076,0.087,0.149,0.139,0.218c0.029,0.06,0.061,0.119,0.098,0.176c0.545,0.853,0.391,2.149,0.869,3.165c0.225,0.481,0.516,0.918,0.872,1.311c0.347,0.397,0.748,0.735,1.2,1.014c0.961,0.595,2.258,0.587,3.044,1.23c0.034,0.028,0.069,0.054,0.106,0.079c0.728,0.639,1.019,1.766,1.809,2.519c0.386,0.367,0.814,0.669,1.289,0.907c0.466,0.244,0.963,0.413,1.487,0.511c1.109,0.207,2.316-0.27,3.281,0.043c0.117,0.038,0.237,0.063,0.357,0.076c0.103,0.046,0.208,0.082,0.318,0.108c0.987,0.23,1.773,1.264,2.832,1.66c0.496,0.186,1.009,0.299,1.54,0.332c0.523,0.042,1.05,0.003,1.568-0.111c1.104-0.243,2.027-1.154,3.038-1.242c0.124-0.01,0.244-0.034,0.36-0.071c0.111,0.003,0.223-0.006,0.332-0.024c0.999-0.174,2.127,0.47,3.256,0.422c0.532-0.022,1.046-0.119,1.548-0.295c0.5-0.166,0.967-0.407,1.399-0.713c0.92-0.655,1.416-1.856,2.312-2.33c0.108-0.058,0.208-0.127,0.302-0.206c0.103-0.04,0.203-0.092,0.296-0.152c0.853-0.55,2.141-0.399,3.163-0.884c0.481-0.228,0.916-0.519,1.308-0.878c0.395-0.349,0.732-0.751,1.009-1.204c0.592-0.962,0.577-2.26,1.216-3.047c0.077-0.096,0.145-0.198,0.198-0.307c0.079-0.078,0.151-0.164,0.214-0.256c0.568-0.84,1.815-1.203,2.566-2.049c0.352-0.397,0.64-0.836,0.861-1.319c0.226-0.475,0.38-0.978,0.458-1.502c0.167-1.117-0.353-2.307-0.073-3.28c0.034-0.118,0.054-0.238,0.063-0.36c0.042-0.102,0.075-0.209,0.096-0.319c0.195-0.995,1.201-1.818,1.56-2.888c0.168-0.504,0.263-1.019,0.276-1.551C51.019,25.894,50.961,25.369,50.829,24.856z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 51"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M46.855,24.957c-0.236-0.915-1.035-1.675-1.138-2.521c-0.012-0.104-0.037-0.203-0.07-0.301c-0.001-0.094-0.011-0.186-0.031-0.278c-0.176-0.836,0.333-1.806,0.259-2.756c-0.035-0.446-0.133-0.877-0.297-1.294c-0.155-0.416-0.371-0.802-0.644-1.157c-0.575-0.751-1.607-1.138-2.034-1.876c-0.051-0.09-0.113-0.173-0.183-0.249c-0.036-0.086-0.082-0.167-0.137-0.244c-0.49-0.701-0.4-1.792-0.839-2.637c-0.207-0.398-0.466-0.756-0.779-1.076c-0.306-0.322-0.655-0.594-1.045-0.813c-0.829-0.469-1.922-0.419-2.606-0.933c-0.083-0.062-0.172-0.116-0.266-0.158c-0.069-0.065-0.143-0.122-0.223-0.172C36.1,8.039,35.75,6.995,35.02,6.393c-0.345-0.285-0.725-0.514-1.138-0.685c-0.408-0.178-0.836-0.291-1.28-0.341c-0.947-0.108-1.934,0.366-2.764,0.16c-0.1-0.025-0.202-0.039-0.306-0.041c-0.087-0.033-0.178-0.056-0.271-0.071c-0.843-0.134-1.573-0.958-2.482-1.227C26.35,4.06,25.912,3.997,25.464,4c-0.443-0.004-0.881,0.06-1.311,0.187c-0.873,0.259-1.505,0.97-2.285,1.185c-0.804,0.05-1.61-0.387-2.515-0.33c-0.447,0.029-0.88,0.12-1.3,0.278c-0.418,0.149-0.808,0.359-1.167,0.627c-0.724,0.539-1.059,1.389-1.701,1.87c-0.738,0.305-1.619,0.174-2.443,0.534c-0.411,0.179-0.787,0.412-1.128,0.703c-0.342,0.283-0.637,0.613-0.885,0.987c-0.525,0.795-0.549,1.888-1.109,2.534c-0.039,0.045-0.074,0.092-0.107,0.14c-0.024,0.027-0.046,0.055-0.067,0.083c-0.513,0.683-1.577,0.939-2.244,1.621c-0.312,0.32-0.573,0.678-0.778,1.076c-0.211,0.392-0.36,0.808-0.446,1.247c-0.187,0.933,0.204,1.956-0.072,2.765c-0.033,0.1-0.055,0.201-0.067,0.304c-0.04,0.087-0.072,0.176-0.095,0.269c-0.204,0.83-1.084,1.481-1.429,2.37c-0.163,0.417-0.262,0.848-0.296,1.295c-0.041,0.442-0.015,0.884,0.078,1.322c0.193,0.933,0.953,1.72,1.017,2.572c0.012,0.164,0.05,0.32,0.117,0.467c-0.024,0.153-0.021,0.309,0.006,0.464c0.15,0.84-0.387,1.794-0.341,2.745C4.915,31.764,5,32.198,5.151,32.619c0.143,0.42,0.346,0.813,0.607,1.176c0.558,0.773,1.573,1.184,1.978,1.937c0.034,0.064,0.073,0.125,0.117,0.184c0.024,0.05,0.051,0.101,0.083,0.148c0.46,0.719,0.329,1.812,0.732,2.669c0.19,0.406,0.435,0.774,0.735,1.105c0.293,0.334,0.631,0.619,1.012,0.855c0.81,0.502,1.904,0.495,2.567,1.037c0.029,0.023,0.058,0.045,0.089,0.066c0.614,0.539,0.859,1.489,1.525,2.124c0.325,0.309,0.686,0.564,1.086,0.765c0.393,0.206,0.812,0.349,1.253,0.431c0.935,0.174,1.953-0.228,2.767,0.036c0.099,0.032,0.2,0.053,0.301,0.064c0.087,0.039,0.175,0.069,0.268,0.091c0.833,0.194,1.495,1.066,2.388,1.4c0.419,0.157,0.851,0.252,1.298,0.28c0.441,0.035,0.885,0.003,1.322-0.093c0.931-0.205,1.709-0.973,2.561-1.047c0.104-0.009,0.205-0.029,0.303-0.06c0.094,0.003,0.188-0.005,0.28-0.021c0.843-0.146,1.793,0.397,2.745,0.355c0.448-0.018,0.882-0.1,1.305-0.249c0.422-0.14,0.816-0.343,1.18-0.602c0.776-0.553,1.194-1.565,1.949-1.965c0.091-0.048,0.175-0.107,0.255-0.173c0.087-0.034,0.171-0.078,0.249-0.128c0.719-0.464,1.805-0.336,2.667-0.745c0.405-0.192,0.772-0.438,1.103-0.74c0.333-0.294,0.617-0.633,0.851-1.015c0.499-0.811,0.487-1.906,1.026-2.569c0.065-0.081,0.122-0.167,0.167-0.259c0.067-0.066,0.127-0.138,0.18-0.216c0.479-0.708,1.53-1.015,2.163-1.728c0.296-0.335,0.539-0.704,0.726-1.112c0.191-0.401,0.32-0.825,0.386-1.266c0.141-0.941-0.298-1.945-0.062-2.766c0.029-0.099,0.046-0.201,0.053-0.304c0.035-0.086,0.063-0.176,0.081-0.269c0.164-0.839,1.013-1.533,1.316-2.435c0.142-0.425,0.222-0.859,0.233-1.307C47.016,25.832,46.967,25.389,46.855,24.957z"></path><g><path d="M25.5,0v2c0.323,0,0.633,0.045,0.949,0.139c0.232,0.069,0.57,0.285,0.897,0.495c0.597,0.382,1.338,0.857,2.266,1.012l0.278,0.105l0.306,0.008c0.318,0.076,0.647,0.113,1.005,0.113c0.534,0,1.033-0.085,1.474-0.16c0.336-0.057,0.653-0.111,0.895-0.111c0.042,0,0.085,0.002,0.129,0.007c0.331,0.037,0.648,0.122,0.977,0.264C34.983,4,35.259,4.166,35.519,4.381c0.186,0.153,0.412,0.485,0.631,0.805c0.4,0.585,0.896,1.312,1.694,1.821l0.226,0.211l0.265,0.119c0.758,0.559,1.611,0.762,2.298,0.925c0.378,0.09,0.768,0.182,0.986,0.305c0.287,0.162,0.547,0.363,0.792,0.621c0.234,0.239,0.423,0.501,0.579,0.8c0.113,0.217,0.191,0.61,0.267,0.99c0.137,0.688,0.307,1.541,0.842,2.329l0.117,0.275l0.209,0.227c0.479,0.811,1.187,1.332,1.757,1.752c0.313,0.23,0.636,0.468,0.782,0.659c0.203,0.265,0.364,0.553,0.49,0.89c0.121,0.306,0.192,0.618,0.219,0.955c0.019,0.244-0.063,0.637-0.142,1.017c-0.144,0.693-0.322,1.553-0.134,2.482l0.009,0.298l0.091,0.275c0.122,0.936,0.571,1.695,0.933,2.305c0.198,0.334,0.402,0.679,0.462,0.913c0.084,0.325,0.119,0.651,0.103,1.012c-0.008,0.323-0.065,0.639-0.173,0.962c-0.078,0.231-0.306,0.561-0.527,0.879c-0.403,0.581-0.903,1.302-1.094,2.231l-0.112,0.275l-0.02,0.298c-0.253,0.91-0.136,1.781-0.043,2.482c0.051,0.384,0.105,0.782,0.069,1.023c-0.049,0.327-0.145,0.642-0.298,0.965c-0.138,0.301-0.315,0.571-0.538,0.824c-0.163,0.184-0.502,0.398-0.831,0.605c-0.598,0.377-1.341,0.846-1.877,1.623l-0.225,0.222L43.2,39.018c-0.586,0.737-0.819,1.582-1.006,2.262c-0.103,0.374-0.209,0.76-0.339,0.971c-0.173,0.282-0.384,0.534-0.653,0.772c-0.244,0.224-0.511,0.403-0.816,0.547c-0.222,0.106-0.619,0.17-1.003,0.233c-0.699,0.114-1.569,0.256-2.369,0.766l-0.276,0.122l-0.223,0.178c-0.83,0.449-1.375,1.137-1.815,1.691c-0.241,0.304-0.49,0.618-0.687,0.758c-0.275,0.195-0.568,0.345-0.904,0.457c-0.313,0.11-0.629,0.17-1.009,0.185c-0.247,0-0.6-0.086-0.974-0.178c-0.53-0.129-1.13-0.276-1.795-0.276c-0.231,0-0.459,0.018-0.674,0.054l-0.301-0.008l-0.286,0.09c-0.939,0.09-1.709,0.51-2.329,0.848c-0.341,0.186-0.693,0.378-0.932,0.43C24.566,48.973,24.322,49,24.083,49c-0.085,0-0.169-0.003-0.287-0.012c-0.328-0.021-0.644-0.089-0.965-0.209c-0.229-0.086-0.551-0.326-0.862-0.558c-0.572-0.427-1.285-0.959-2.175-1.164l-0.287-0.128l-0.293-0.031c-0.423-0.134-0.88-0.199-1.395-0.199c-0.386,0-0.758,0.036-1.086,0.069c-0.274,0.027-0.533,0.052-0.75,0.052c-0.111,0-0.203-0.007-0.272-0.02c-0.332-0.062-0.644-0.169-0.958-0.333c-0.299-0.15-0.563-0.336-0.806-0.568c-0.185-0.176-0.373-0.502-0.572-0.848c-0.304-0.529-0.683-1.186-1.297-1.725l-0.052-0.052L11.918,43.2c-0.742-0.606-1.599-0.846-2.287-1.039c-0.374-0.105-0.76-0.213-0.97-0.343c-0.283-0.175-0.534-0.387-0.768-0.654c-0.226-0.25-0.404-0.517-0.546-0.822c-0.103-0.218-0.166-0.615-0.226-0.998c-0.11-0.694-0.247-1.553-0.754-2.372L6.288,36.81l-0.106-0.14c-0.454-0.834-1.15-1.378-1.71-1.816c-0.306-0.239-0.622-0.487-0.763-0.683c-0.195-0.271-0.346-0.563-0.461-0.902c-0.111-0.311-0.173-0.626-0.189-0.967c-0.012-0.244,0.082-0.635,0.172-1.013c0.163-0.683,0.365-1.53,0.214-2.444l0.085-0.532L3.31,27.831c-0.084-0.929-0.49-1.695-0.818-2.313c-0.182-0.342-0.369-0.696-0.42-0.943c-0.068-0.323-0.088-0.65-0.055-1.005c0.025-0.331,0.097-0.644,0.221-0.962c0.089-0.228,0.333-0.546,0.569-0.855c0.435-0.567,0.975-1.273,1.192-2.162l0.119-0.236l0.037-0.317c0.31-0.908,0.234-1.796,0.173-2.509c-0.033-0.386-0.067-0.785-0.018-1.03c0.064-0.324,0.174-0.632,0.344-0.949c0.15-0.292,0.339-0.552,0.576-0.795c0.172-0.176,0.521-0.374,0.86-0.565c0.622-0.352,1.396-0.79,1.947-1.527l0.07-0.076l0.073-0.107c0.627-0.724,0.891-1.573,1.103-2.256c0.115-0.37,0.234-0.753,0.369-0.957c0.184-0.278,0.404-0.525,0.681-0.754c0.249-0.213,0.523-0.383,0.838-0.52c0.242-0.106,0.591-0.148,0.995-0.197c0.561-0.068,1.196-0.144,1.866-0.421l0.233-0.096l0.202-0.151c0.599-0.449,0.996-0.979,1.346-1.448c0.245-0.328,0.456-0.61,0.667-0.767c0.267-0.199,0.557-0.355,0.895-0.476c0.31-0.117,0.626-0.184,0.963-0.206l0.071-0.002c0.252,0,0.583,0.076,0.934,0.157c0.496,0.115,1.058,0.244,1.697,0.244                        c0.092,0,0.185-0.003,0.277-0.008l0.208-0.013l0.201-0.055c0.755-0.208,1.339-0.588,1.854-0.923c0.332-0.216,0.646-0.42,0.892-0.493C24.782,2.047,25.1,2,25.414,2l0.051,0l0.008,0L25.5,0 M25.5,0c-0.014,0-0.029,0-0.043,0c-0.014,0-0.029,0-0.043,0c-0.511,0-1.016,0.075-1.512,0.222c-1.035,0.307-1.785,1.15-2.71,1.405c-0.051,0.003-0.103,0.005-0.154,0.005c-0.844,0-1.694-0.402-2.631-0.402c-0.066,0-0.132,0.002-0.198,0.006c-0.53,0.034-1.043,0.142-1.542,0.33c-0.496,0.177-0.958,0.426-1.384,0.743c-0.859,0.639-1.255,1.647-2.017,2.218c-0.876,0.362-1.92,0.207-2.898,0.633C9.881,5.373,9.435,5.649,9.031,5.994C8.625,6.329,8.275,6.721,7.982,7.165C7.359,8.107,7.33,9.404,6.667,10.17c-0.047,0.053-0.088,0.109-0.127,0.167c-0.028,0.032-0.055,0.065-0.08,0.099c-0.608,0.81-1.871,1.113-2.661,1.923c-0.37,0.38-0.679,0.804-0.923,1.276c-0.25,0.464-0.426,0.958-0.529,1.479c-0.221,1.107,0.242,2.32-0.086,3.279c-0.039,0.119-0.065,0.238-0.079,0.361c-0.047,0.103-0.085,0.209-0.113,0.319c-0.242,0.984-1.286,1.757-1.695,2.81c-0.193,0.495-0.311,1.006-0.351,1.536c-0.049,0.525-0.017,1.049,0.092,1.568c0.229,1.106,1.13,2.04,1.206,3.051c0.014,0.194,0.059,0.379,0.139,0.554c-0.029,0.181-0.025,0.366,0.007,0.55c0.178,0.996-0.46,2.128-0.405,3.256c0.024,0.531,0.125,1.046,0.304,1.546c0.169,0.498,0.41,0.964,0.72,1.395c0.661,0.917,1.866,1.405,2.346,2.297c0.04,0.076,0.087,0.149,0.139,0.218c0.029,0.06,0.061,0.119,0.098,0.176c0.545,0.853,0.391,2.149,0.869,3.165c0.225,0.481,0.516,0.918,0.872,1.311c0.347,0.397,0.748,0.735,1.2,1.014c0.961,0.595,2.258,0.587,3.044,1.23c0.034,0.028,0.069,0.054,0.106,0.079c0.728,0.639,1.019,1.766,1.809,2.519c0.386,0.367,0.814,0.669,1.289,0.907c0.466,0.244,0.963,0.413,1.487,0.511c0.211,0.039,0.425,0.054,0.641,0.054c0.621,0,1.252-0.121,1.836-0.121c0.281,0,0.551,0.028,0.804,0.11c0.117,0.038,0.237,0.063,0.357,0.076c0.103,0.046,0.208,0.082,0.318,0.108c0.987,0.23,1.773,1.264,2.832,1.66c0.496,0.186,1.009,0.299,1.54,0.332C23.808,50.995,23.946,51,24.083,51c0.386,0,0.773-0.043,1.155-0.127c1.104-0.243,2.027-1.154,3.038-1.242c0.124-0.01,0.244-0.034,0.36-0.071c0.015,0,0.029,0.001,0.044,0.001c0.096,0,0.193-0.009,0.288-0.025c0.119-0.021,0.24-0.03,0.363-0.03c0.868,0,1.816,0.454,2.769,0.454c0.041,0,0.083-0.001,0.124-0.003c0.532-0.021,1.046-0.119,1.548-0.295c0.5-0.166,0.967-0.407,1.399-0.713c0.92-0.655,1.416-1.856,2.312-2.33c0.108-0.057,0.208-0.127,0.302-0.206c0.103-0.04,0.203-0.092,0.296-0.152c0.853-0.55,2.141-0.399,3.163-0.884c0.481-0.228,0.916-0.519,1.308-0.878c0.395-0.349,0.732-0.751,1.009-1.204c0.592-0.962,0.577-2.26,1.216-3.047c0.077-0.096,0.145-0.198,0.198-0.307c0.079-0.078,0.151-0.164,0.214-0.256c0.568-0.84,1.815-1.203,2.566-2.049c0.352-0.397,0.64-0.836,0.861-1.319c0.226-0.475,0.38-0.978,0.458-1.502c0.167-1.117-0.353-2.307-0.073-3.28c0.034-0.118,0.054-0.238,0.063-0.36c0.042-0.102,0.075-0.209,0.096-0.319c0.195-0.995,1.201-1.818,1.56-2.888c0.168-0.504,0.263-1.019,0.276-1.551c0.024-0.524-0.033-1.048-0.166-1.561c-0.279-1.086-1.227-1.987-1.35-2.99c-0.015-0.123-0.043-0.241-0.083-0.357c-0.001-0.111-0.013-0.221-0.037-0.33c-0.209-0.991,0.395-2.142,0.307-3.269c-0.041-0.529-0.157-1.04-0.353-1.535c-0.184-0.493-0.44-0.952-0.763-1.373c-0.683-0.89-1.906-1.349-2.413-2.226c-0.061-0.106-0.134-0.206-0.217-0.296c-0.043-0.101-0.097-0.198-0.162-0.289c-0.581-0.831-0.474-2.125-0.995-3.128c-0.246-0.471-0.553-0.897-0.924-1.276c-0.363-0.382-0.777-0.704-1.239-0.964c-0.983-0.557-2.28-0.497-3.09-1.106c-0.099-0.074-0.204-0.138-0.316-0.188c-0.082-0.077-0.17-0.145-0.264-0.204c-0.857-0.537-1.272-1.775-2.138-2.489c-0.41-0.338-0.859-0.61-1.35-0.813c-0.483-0.211-0.991-0.345-1.518-0.404c-0.117-0.013-0.235-0.019-0.353-0.019c-0.806,0-1.624,0.271-2.369,0.271c-0.191,0-0.377-0.018-0.557-0.062c-0.118-0.029-0.24-0.046-0.363-0.049c-0.103-0.039-0.212-0.067-0.322-0.085c-1-0.159-1.866-1.136-2.944-1.455C26.522,0.075,26.017,0,25.5,0L25.5,0z"></path></g></g><path class="actionMask" fill="transparent" fill-rule="evenodd" clip-rule="evenodd" d="M50.829,24.856c-0.279-1.086-1.227-1.987-1.35-2.99c-0.015-0.123-0.043-0.241-0.083-0.357c-0.001-0.111-0.013-0.221-0.037-0.33c-0.209-0.991,0.395-2.142,0.307-3.269c-0.041-0.529-0.157-1.04-0.353-1.535c-0.184-0.493-0.44-0.952-0.763-1.373c-0.683-0.89-1.906-1.35-2.413-2.226c-0.061-0.106-0.134-0.206-0.217-0.296c-0.043-0.101-0.097-0.198-0.162-0.289c-0.581-0.831-0.474-2.125-0.995-3.128c-0.246-0.471-0.553-0.897-0.924-1.276c-0.363-0.382-0.777-0.704-1.239-0.964c-0.983-0.557-2.28-0.497-3.09-1.106c-0.099-0.074-0.204-0.138-0.316-0.188c-0.082-0.077-0.17-0.145-0.264-0.204c-0.857-0.537-1.272-1.775-2.138-2.489c-0.41-0.338-0.859-0.61-1.35-0.813c-0.483-0.211-0.991-0.345-1.518-0.404c-1.123-0.128-2.294,0.434-3.279,0.189c-0.118-0.029-0.24-0.046-0.363-0.049c-0.103-0.039-0.212-0.067-0.322-0.085c-1-0.159-1.866-1.136-2.943-1.455C26.508,0.071,25.989-0.004,25.457,0c-0.526-0.004-1.045,0.071-1.555,0.221c-1.035,0.307-1.785,1.15-2.71,1.405c-0.954,0.059-1.91-0.459-2.983-0.391c-0.53,0.034-1.043,0.142-1.542,0.33c-0.496,0.177-0.958,0.426-1.384,0.743c-0.859,0.639-1.255,1.647-2.017,2.218c-0.876,0.362-1.92,0.207-2.898,0.633C9.881,5.373,9.435,5.649,9.031,5.994C8.625,6.329,8.275,6.721,7.982,7.165C7.359,8.107,7.33,9.404,6.667,10.17c-0.047,0.053-0.088,0.109-0.127,0.167c-0.028,0.032-0.055,0.065-0.08,0.099c-0.608,0.81-1.871,1.113-2.661,1.923c-0.37,0.38-0.679,0.804-0.923,1.276c-0.25,0.464-0.426,0.958-0.529,1.479c-0.221,1.107,0.242,2.32-0.086,3.279c-0.039,0.119-0.065,0.238-0.079,0.361c-0.047,0.103-0.085,0.209-0.113,0.319c-0.242,0.984-1.286,1.757-1.695,2.81c-0.193,0.495-0.311,1.006-0.351,1.536c-0.049,0.525-0.017,1.049,0.092,1.568c0.229,1.106,1.13,2.04,1.206,3.051c0.014,0.194,0.06,0.379,0.139,0.554c-0.029,0.181-0.025,0.366,0.007,0.55c0.178,0.996-0.46,2.128-0.405,3.256c0.024,0.531,0.125,1.046,0.304,1.546c0.169,0.498,0.41,0.964,0.72,1.395c0.661,0.917,1.866,1.405,2.346,2.297c0.04,0.076,0.087,0.149,0.139,0.218c0.029,0.06,0.061,0.119,0.098,0.176c0.545,0.853,0.391,2.149,0.869,3.165c0.225,0.481,0.516,0.918,0.872,1.311c0.347,0.397,0.748,0.735,1.2,1.014c0.961,0.595,2.258,0.587,3.044,1.23c0.034,0.028,0.069,0.054,0.106,0.079c0.728,0.639,1.019,1.766,1.809,2.519c0.386,0.367,0.814,0.669,1.289,0.907c0.466,0.244,0.963,0.413,1.487,0.511c1.109,0.207,2.316-0.27,3.281,0.043c0.117,0.038,0.237,0.063,0.357,0.076c0.103,0.046,0.208,0.082,0.318,0.108c0.987,0.23,1.773,1.264,2.832,1.66c0.496,0.186,1.009,0.299,1.54,0.332c0.523,0.042,1.05,0.003,1.568-0.111c1.104-0.243,2.027-1.154,3.038-1.242c0.124-0.01,0.244-0.034,0.36-0.071c0.111,0.003,0.223-0.006,0.332-0.024c0.999-0.174,2.127,0.47,3.256,0.422c0.532-0.022,1.046-0.119,1.548-0.295c0.5-0.166,0.967-0.407,1.399-0.713c0.92-0.655,1.416-1.856,2.312-2.33c0.108-0.058,0.208-0.127,0.302-0.206c0.103-0.04,0.203-0.092,0.296-0.152c0.853-0.55,2.141-0.399,3.163-0.884c0.481-0.228,0.916-0.519,1.308-0.878c0.395-0.349,0.732-0.751,1.009-1.204c0.592-0.962,0.577-2.26,1.216-3.047c0.077-0.096,0.145-0.198,0.198-0.307c0.079-0.078,0.151-0.164,0.214-0.256c0.568-0.84,1.815-1.203,2.566-2.049c0.352-0.397,0.64-0.836,0.861-1.319c0.226-0.475,0.38-0.978,0.458-1.502c0.167-1.117-0.353-2.307-0.073-3.28c0.034-0.118,0.054-0.238,0.063-0.36c0.042-0.102,0.075-0.209,0.096-0.319c0.195-0.995,1.201-1.818,1.56-2.888c0.168-0.504,0.263-1.019,0.276-1.551C51.019,25.894,50.961,25.369,50.829,24.856z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 26"><path class="actionMask" d="M51,26H0V0h51V26z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 26"><path d="M49,2v22H2V2H49 M51,0H0v26h51V0L51,0z"></path><path class="actionMask" fill="transparent" d="M51,26H0V0h51V26z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 51 26"><path d="M47,22H4V4h43V22z"></path><path d="M0,0v26h51V0H0z M49,24H2V2h47V24z"></path><path class="actionMask" fill="transparent" d="M51,26H0V0h51V26z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M97,33.583c0-5.702-4.082-10.444-9.48-11.477c0.183-0.872,0.28-1.776,0.28-2.703 c0-7.283-5.901-13.184-13.181-13.184c-3.704,0-7.045,1.531-9.438,3.991C63.25,4.283,57.69,0,51.12,0 c-5.437,0-10.174,2.938-12.746,7.308c-2.399-2.507-5.771-4.074-9.512-4.074c-7.28,0-13.18,5.902-13.18,13.184 c0,0.018,0.002,0.033,0.002,0.051c-0.329-0.028-0.66-0.051-0.997-0.051C8.232,16.417,3,21.651,3,28.109 c0,2.639,0.884,5.066,2.359,7.021c-0.553,1.454-0.867,3.024-0.867,4.67c0,7.282,5.9,13.185,13.18,13.185 c0.698,0,1.375-0.069,2.044-0.175c0.546,6.78,6.207,12.114,13.125,12.114c3.81,0,7.231-1.626,9.638-4.211 c2.702,3.537,6.953,5.828,11.748,5.828c5.776,0,10.764-3.315,13.2-8.141c1.85,0.985,3.956,1.549,6.196,1.549 c7.28,0,13.181-5.901,13.181-13.184c0-0.536-0.041-1.063-0.104-1.582C92.5,44.497,97,39.57,97,33.583z"></path><path d="M42.104,73.383c-0.378,0-0.738,0.07-1.083,0.17c-0.418-2.221-2.359-3.901-4.698-3.901 c-1.739,0-3.247,0.937-4.083,2.322c-0.643-0.442-1.418-0.705-2.258-0.705c-1.813,0-3.324,1.221-3.804,2.879 c-0.06-0.003-0.114-0.018-0.174-0.018c-2.197,0-3.979,1.781-3.979,3.979c0,1.88,1.308,3.445,3.058,3.861 c0,0.041-0.011,0.078-0.011,0.119c0,2.197,1.781,3.98,3.979,3.98c0.559,0,1.089-0.117,1.572-0.325 c0.821,1.45,2.362,2.438,4.147,2.438c1.717,0,3.212-0.911,4.057-2.269c0.334,0.091,0.678,0.155,1.042,0.155 c2.197,0,3.979-1.783,3.979-3.98c0-0.375-0.068-0.731-0.166-1.073c1.413-0.612,2.404-2.015,2.404-3.653 C46.084,75.165,44.302,73.383,42.104,73.383z M37.1,79.236c-0.044-0.025-0.089-0.048-0.134-0.072 c0.083-0.012,0.171-0.01,0.252-0.024C37.18,79.172,37.137,79.201,37.1,79.236z"></path><path d="M26.154,92.955c0.004-0.058,0.035-0.109,0.035-0.169c0-1.441-1.17-2.612-2.611-2.612 c-0.715,0-1.362,0.289-1.834,0.758c-0.471-0.469-1.119-0.758-1.833-0.758c-1.442,0-2.612,1.171-2.612,2.612 c0,0.177,0.068,0.332,0.101,0.499c-0.682,0.473-1.158,1.221-1.158,2.113c0,1.441,1.169,2.611,2.611,2.611 c0.233,0,0.443-0.076,0.659-0.132c0.235,1.198,1.244,2.122,2.512,2.122c1.276,0,2.291-0.935,2.518-2.147 c0.249,0.079,0.501,0.157,0.777,0.157c1.441,0,2.611-1.17,2.611-2.611C27.93,94.254,27.18,93.308,26.154,92.955z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><ellipse cx="50" cy="32.661" rx="50" ry="30.161"></ellipse><ellipse cx="31.323" cy="74.333" rx="15.916" ry="9.034"></ellipse><ellipse cx="15.843" cy="92.765" rx="7.995" ry="4.735"></ellipse><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M79.25,0h-58.5C15.374,0,11,4.348,11,9.692v58.151c0,5.344,4.374,9.692,9.75,9.692h1.464 c1.554,0,3.022,0.607,4.13,1.709c1.109,1.104,1.718,2.562,1.718,4.105v10.932c0,1.526,0.248,2.775,0.735,3.713 C29.464,99.27,30.599,100,31.913,100c1.499,0,3.018-0.936,4.517-2.781l11.678-14.373c2.338-2.878,7.461-5.311,11.185-5.311H79.25 c5.376,0,9.75-4.349,9.75-9.692V9.692C89,4.348,84.626,0,79.25,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M31.914,100c-1.316,0-2.451-0.73-3.115-2.006c-0.489-0.938-0.735-2.187-0.735-3.713V83.35 c0-1.544-0.61-3.002-1.72-4.105c-1.107-1.102-2.575-1.709-4.129-1.709H20.75c-5.376,0-9.75-4.349-9.75-9.692V9.692 C11,4.348,15.374,0,20.75,0h58.5C84.626,0,89,4.348,89,9.692v58.151c0,5.344-4.374,9.692-9.75,9.692H59.292 c-3.724,0-8.846,2.433-11.185,5.311L36.43,97.219C34.931,99.064,33.412,100,31.914,100z M20.75,3.877 c-3.225,0-5.85,2.608-5.85,5.815v58.151c0,3.206,2.625,5.815,5.85,5.815h1.464c2.596,0,5.042,1.011,6.888,2.845 c1.845,1.835,2.862,4.267,2.861,6.847v10.932c0,0.845,0.104,1.389,0.203,1.696c0.272-0.178,0.696-0.536,1.23-1.192l11.677-14.373 c3.075-3.788,9.321-6.754,14.218-6.754H79.25c3.226,0,5.85-2.609,5.85-5.815V9.692c0-3.207-2.624-5.815-5.85-5.815H20.75z"></path><path class="actionMask" fill="transparent" d="M79.25,0h-58.5C15.374,0,11,4.348,11,9.692v58.151c0,5.344,4.374,9.692,9.75,9.692h1.464 c1.554,0,3.022,0.607,4.13,1.709c1.109,1.104,1.718,2.562,1.718,4.105v10.932c0,1.526,0.248,2.775,0.735,3.713 C29.464,99.27,30.599,100,31.913,100c1.499,0,3.018-0.936,4.517-2.781l11.678-14.373c2.338-2.878,7.461-5.311,11.185-5.311H79.25 c5.376,0,9.75-4.349,9.75-9.692V9.692C89,4.348,84.626,0,79.25,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M89.381,0H10.62C2.833,0,0,2.832,0,10.619V65.39c0,7.787,2.833,11.8,10.62,11.8h31.807L34.563,100 l23.016-22.811h31.803c7.787,0,10.619-2.833,10.619-10.619V10.619C100,2.832,97.168,0,89.381,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M85.841,14H14.159C6.372,14,0,20.4,0,28.222v28.939c0,7.823,6.372,14.224,14.159,14.224h56.585 L67.601,86l12.397-14.615h5.843c7.786,0,14.159-6.4,14.159-14.224V28.222C100,20.4,93.627,14,85.841,14z"></path><path class="actionMask" fill="transparent" d="M85.841,14H14.159C6.372,14,0,20.4,0,28.222v28.939c0,7.823,6.372,14.224,14.159,14.224h56.585 L67.601,86l12.397-14.615h5.843c7.786,0,14.159-6.4,14.159-14.224V28.222C100,20.4,93.627,14,85.841,14z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M99.992,47.883c0.226-7.122-4.666-13.184-11.301-14.571c0.007-0.034,0.021-0.065,0.027-0.1 c1.508-7.667-5.533-15.5-15.728-17.494c-7.797-1.525-15.169,0.816-18.887,5.428C51.16,16.881,45.618,14,39.253,14 c-7.369,0-13.631,3.861-16.038,9.264c-3.802-1.861-8.475-2.085-12.793-0.211C2.848,26.34-0.753,34.812,2.374,41.976 c0.06,0.135,0.134,0.259,0.197,0.392c-2.503,3.695-3.331,8.615-1.803,13.394c2.555,7.984,10.675,12.533,18.144,10.161 c0.347-0.109,0.68-0.247,1.013-0.383c2.493,5.673,9.314,10.454,17.937,11.858c7.008,1.141,13.595-0.222,18.061-3.231 c1.902,2.836,2.449,7.754-2.819,11.833c6.661-0.901,13.974-4.166,16.462-11.063c0.924,0.128,1.864,0.21,2.832,0.21 c9.297,0,16.844-6.138,17.083-13.78C95.365,59.759,99.785,54.395,99.992,47.883z"></path><path class="actionMask" fill="transparent" d="M99.992,47.883c0.226-7.122-4.666-13.184-11.301-14.571c0.007-0.034,0.021-0.065,0.027-0.1 c1.508-7.667-5.533-15.5-15.728-17.494c-7.797-1.525-15.169,0.816-18.887,5.428C51.16,16.881,45.618,14,39.253,14 c-7.369,0-13.631,3.861-16.038,9.264c-3.802-1.861-8.475-2.085-12.793-0.211C2.848,26.34-0.753,34.812,2.374,41.976 c0.06,0.135,0.134,0.259,0.197,0.392c-2.503,3.695-3.331,8.615-1.803,13.394c2.555,7.984,10.675,12.533,18.144,10.161 c0.347-0.109,0.68-0.247,1.013-0.383c2.493,5.673,9.314,10.454,17.937,11.858c7.008,1.141,13.595-0.222,18.061-3.231 c1.902,2.836,2.449,7.754-2.819,11.833c6.661-0.901,13.974-4.166,16.462-11.063c0.924,0.128,1.864,0.21,2.832,0.21 c9.297,0,16.844-6.138,17.083-13.78C95.365,59.759,99.785,54.395,99.992,47.883z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M50,15.5c-27.614,0-50,13.877-50,30.996c0,17.12,22.386,30.995,50,30.995 c12.148,0,23.284-2.687,31.947-7.152c0.596,5.244-0.374,9.761-1.293,14.161C94.94,73.845,100,55.144,100,46.496 C100,29.377,77.614,15.5,50,15.5z"></path><path class="actionMask" fill="transparent" d="M50,15.5c-27.614,0-50,13.877-50,30.996c0,17.12,22.386,30.995,50,30.995 c12.148,0,23.284-2.687,31.947-7.152c0.596,5.244-0.374,9.761-1.293,14.161C94.94,73.845,100,55.144,100,46.496 C100,29.377,77.614,15.5,50,15.5z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M27.861,82c-3.135,0-5.16-2.219-5.16-5.653c0-1.74-0.815-3.395-2.296-4.656 c-1.534-1.306-3.575-2.025-5.749-2.025h-4.311C4.64,69.665,0,65.029,0,59.332v-31C0,22.636,4.64,18,10.345,18h79.31 C95.359,18,100,22.636,100,28.333v31c0,5.697-4.641,10.333-10.345,10.333H60.648c-4.818,0-12.431,2.009-16.622,4.387l-11.612,6.586 C30.844,81.529,29.27,82,27.861,82z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M27.861,82c-3.135,0-5.16-2.219-5.16-5.653c0-1.74-0.815-3.395-2.296-4.656 c-1.534-1.306-3.575-2.025-5.749-2.025h-4.311C4.64,69.665,0,65.029,0,59.332v-31C0,22.636,4.64,18,10.345,18h79.31 C95.359,18,100,22.636,100,28.333v31c0,5.697-4.641,10.333-10.345,10.333H60.648c-4.818,0-12.431,2.009-16.622,4.387l-11.612,6.586 C30.844,81.529,29.27,82,27.861,82z M10.345,20.296c-4.437,0-8.046,3.606-8.046,8.036v31c0,4.431,3.61,8.037,8.046,8.037h4.311 c2.72,0,5.291,0.913,7.24,2.572c2.002,1.706,3.105,3.982,3.104,6.405c0,2.165,1.016,3.357,2.861,3.357 c1.011,0,2.192-0.369,3.417-1.063l11.612-6.587c4.556-2.584,12.522-4.686,17.758-4.686h29.007c4.436,0,8.046-3.606,8.046-8.037v-31 c0-4.43-3.61-8.036-8.046-8.036H10.345z"></path><path class="actionMask" fill="transparent" d="M27.861,82c-3.135,0-5.16-2.219-5.16-5.653c0-1.74-0.815-3.395-2.296-4.656 c-1.534-1.306-3.575-2.025-5.749-2.025h-4.311C4.64,69.665,0,65.029,0,59.332v-31C0,22.636,4.64,18,10.345,18h79.31 C95.359,18,100,22.636,100,28.333v31c0,5.697-4.641,10.333-10.345,10.333H60.648c-4.818,0-12.431,2.009-16.622,4.387l-11.612,6.586 C30.844,81.529,29.27,82,27.861,82z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M23.235,81.5l0.001-14.408H0V18.5h100v48.592H51.487L23.235,81.5z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M23.235,85l0.001-16.009H0V15h100v53.991H51.487L23.235,85z M2.353,66.643h23.236l-0.001,14.324 l25.277-14.324h46.782V17.347H2.353V66.643z"></path><path class="actionMask" fill="transparent" d="M23.235,81.5l0.001-14.408H0V18.5h100v48.592H51.487L23.235,81.5z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M100,43.415C100,27.721,77.614,15,50,15C22.387,15,0,27.721,0,43.415 c0,13.407,16.342,24.637,38.32,27.627C35.921,76.629,32.722,81.163,29.167,85c8.247-1.202,17.582-7.855,22.2-13.191 C78.347,71.396,100,58.85,100,43.415z"></path><path class="actionMask" fill="transparent" d="M100,43.415C100,27.721,77.614,15,50,15C22.387,15,0,27.721,0,43.415 c0,13.407,16.342,24.637,38.32,27.627C35.921,76.629,32.722,81.163,29.167,85c8.247-1.202,17.582-7.855,22.2-13.191 C78.347,71.396,100,58.85,100,43.415z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M50,0C22.43,0,0,22.43,0,50c0,27.57,22.43,50,50,50c27.57,0,50-22.43,50-50C100,22.43,77.57,0,50,0z  M50,92.079C26.796,92.079,7.921,73.203,7.921,50C7.921,26.796,26.796,7.921,50,7.921c23.203,0,42.079,18.875,42.079,42.079 C92.079,73.203,73.203,92.079,50,92.079z"></path><path d="M50,12.21c-2.187,0-3.96,1.773-3.96,3.96v32.345L30.019,66.866c-1.439,1.648-1.269,4.15,0.378,5.589 c0.75,0.656,1.679,0.977,2.603,0.977c1.104,0,2.203-0.459,2.986-1.355l16.999-19.471c0.63-0.722,0.977-1.648,0.977-2.605V16.17 C53.961,13.983,52.188,12.21,50,12.21z"></path><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M0,69.047V35.714c0-2.619,2.143-4.762,4.762-4.762h90.476c2.62,0,4.763,2.143,4.763,4.762v33.333H0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon class="actionMask" points="50,81.307 80.903,97.553 75.001,63.143 100,38.774 65.451,33.754 50,2.447 34.549,33.754 0,38.774 25,63.143 19.097,97.553"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M100,38.774l-34.55-5.02L50,2.447L34.55,33.754L0,38.774l25,24.369l-5.903,34.409L50,81.308 l30.902,16.245L75,63.144L100,38.774z M54.349,73.034L50,70.748l-4.349,2.286l-14.139,7.434l2.7-15.744l0.831-4.843l-3.519-3.43 l-11.438-11.15l15.808-2.297l4.863-0.706l2.174-4.408L50,23.567l7.069,14.323l2.175,4.408l4.861,0.706l15.81,2.297l-11.438,11.15 l-3.519,3.43l0.83,4.843l2.7,15.744L54.349,73.034z"></path><polygon class="actionMask" fill="transparent" points="50,81.307 80.903,97.553 75.001,63.143 100,38.774 65.451,33.754 50,2.447 34.549,33.754 0,38.774 25,63.143 19.097,97.553"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M86.48,89.796c0-1.993,1.429-3.645,3.315-4.004v-5.257c-1.887-0.359-3.315-2.012-3.315-4.004 c0-1.993,1.429-3.646,3.315-4.004v-5.259c-1.887-0.357-3.315-2.011-3.315-4.004c0-1.992,1.429-3.645,3.315-4.004v-5.257 C87.909,53.645,86.48,51.992,86.48,50s1.429-3.646,3.315-4.004v-5.258c-1.887-0.358-3.315-2.012-3.315-4.004 c0-1.992,1.429-3.645,3.315-4.004v-5.257c-1.887-0.359-3.315-2.013-3.315-4.004c0-1.992,1.429-3.646,3.315-4.004v-5.258 c-1.887-0.359-3.315-2.012-3.315-4.004c0-1.992,1.429-3.646,3.315-4.004V0h-6.123c0,2.254-1.827,4.082-4.081,4.082 c-2.255,0-4.082-1.827-4.082-4.082h-3.673c0,2.254-1.827,4.082-4.082,4.082c-2.254,0-4.081-1.827-4.081-4.082h-3.673 c0,2.254-1.828,4.082-4.082,4.082S51.837,2.254,51.837,0h-3.674c0,2.254-1.828,4.082-4.082,4.082C41.827,4.082,40,2.254,40,0h-3.673 c0,2.254-1.828,4.082-4.082,4.082c-2.254,0-4.082-1.827-4.082-4.082H24.49c0,2.254-1.828,4.082-4.082,4.082S16.327,2.254,16.327,0 h-6.123v6.123c2.254,0,4.082,1.827,4.082,4.082c0,2.254-1.828,4.082-4.082,4.082v5.103c2.254,0,4.082,1.827,4.082,4.082 c0,2.253-1.828,4.081-4.082,4.081v5.102c2.254,0,4.082,1.828,4.082,4.082c0,2.254-1.828,4.082-4.082,4.082v5.102 c2.254,0,4.082,1.827,4.082,4.082c0,2.254-1.828,4.082-4.082,4.082v5.102c2.254,0,4.082,1.828,4.082,4.081 c0,2.255-1.828,4.082-4.082,4.082v5.103c2.254,0,4.082,1.827,4.082,4.082c0,2.254-1.828,4.081-4.082,4.081v5.102 c2.254,0,4.082,1.828,4.082,4.082s-1.828,4.082-4.082,4.082V100h6.123c0-2.254,1.828-4.082,4.082-4.082S24.49,97.746,24.49,100 h3.673c0-2.254,1.827-4.082,4.082-4.082c2.254,0,4.082,1.828,4.082,4.082H40c0-2.254,1.827-4.082,4.082-4.082 c2.253,0,4.082,1.828,4.082,4.082h3.674c0-2.254,1.828-4.082,4.082-4.082s4.082,1.828,4.082,4.082h3.673 c0-2.254,1.827-4.082,4.081-4.082c2.255,0,4.082,1.828,4.082,4.082h3.673c0-2.254,1.827-4.082,4.082-4.082 c2.254,0,4.081,1.828,4.081,4.082h6.123v-6.2C87.909,93.44,86.48,91.789,86.48,89.796z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M50,0C41.897,21.207,0.001,29.139,0.001,55.861c0,20.172,13.793,29.656,24.999,29.656 c8.068,0,18.842-7.379,23.373-14.733l0.004,0.006c0,16.537-10.316,22.162-10.316,26.624c0,2.328,1.422,2.586,2.974,2.586h17.932 c1.552,0,2.975-0.258,2.975-2.586c0-4.462-10.318-10.087-10.318-26.624l0.005-0.006c4.531,7.354,15.304,14.733,23.373,14.733 c11.206,0,24.997-9.484,24.997-29.656C99.998,29.139,58.103,21.207,50,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M95.237,45.239h-8.179l3.353-6.631c1.187-2.347,0.244-5.212-2.102-6.399 c-2.345-1.186-5.213-0.245-6.398,2.102l-5.524,10.928H58.248l9.069-15.709l12.226,0.68c0.092,0.005,0.18,0.007,0.27,0.007 c2.509,0,4.609-1.961,4.749-4.497c0.147-2.626-1.863-4.873-4.489-5.019l-7.419-0.413l4.089-7.085 c1.315-2.277,0.535-5.189-1.742-6.504c-2.277-1.313-5.189-0.535-6.505,1.743l-4.09,7.085l-4.067-6.22 c-1.438-2.199-4.39-2.82-6.592-1.379c-2.2,1.439-2.818,4.392-1.38,6.592l6.703,10.248L50,40.478l-9.069-15.71l6.701-10.248 c1.439-2.2,0.822-5.152-1.378-6.592c-2.203-1.44-5.152-0.821-6.592,1.379l-4.067,6.22l-4.09-7.085 C30.191,6.166,27.278,5.382,25,6.699c-2.277,1.315-3.058,4.228-1.743,6.504l4.09,7.085l-7.419,0.413 c-2.626,0.146-4.636,2.393-4.49,5.019c0.14,2.536,2.241,4.497,4.75,4.497c0.089,0,0.178-0.002,0.269-0.007l12.226-0.68l9.07,15.709 h-18.14l-5.524-10.928c-1.186-2.347-4.052-3.288-6.398-2.102c-2.347,1.187-3.288,4.052-2.102,6.399l3.352,6.631h-8.18 C2.132,45.239,0,47.372,0,50.001c0,2.63,2.132,4.763,4.762,4.763h8.18l-3.352,6.631c-1.186,2.347-0.245,5.211,2.102,6.397 c0.688,0.35,1.422,0.515,2.145,0.515c1.739,0,3.415-0.957,4.253-2.615l5.524-10.928h18.139l-9.07,15.707l-12.226-0.679 c-2.624-0.151-4.873,1.865-5.019,4.489c-0.146,2.626,1.864,4.872,4.49,5.019l7.419,0.414l-4.09,7.083 c-1.315,2.277-0.535,5.189,1.743,6.504c0.75,0.434,1.568,0.641,2.376,0.641c1.646,0,3.247-0.855,4.128-2.383l4.09-7.084l4.067,6.219 c0.914,1.397,2.436,2.157,3.99,2.157c0.894,0,1.798-0.252,2.602-0.778c2.2-1.439,2.818-4.39,1.378-6.592l-6.701-10.248L50,59.523 l9.069,15.709L52.366,85.48c-1.438,2.202-0.82,5.152,1.38,6.592c0.805,0.526,1.709,0.778,2.602,0.778c1.554,0,3.076-0.76,3.99-2.157 l4.067-6.219l4.09,7.084c0.883,1.527,2.482,2.383,4.129,2.383c0.807,0,1.626-0.207,2.376-0.641c2.277-1.314,3.058-4.227,1.742-6.504 l-4.089-7.083l7.419-0.414c2.626-0.146,4.637-2.393,4.489-5.019c-0.145-2.627-2.384-4.648-5.019-4.489l-12.226,0.679l-9.069-15.707 h18.139l5.524,10.928c0.839,1.658,2.514,2.615,4.253,2.615c0.722,0,1.456-0.165,2.146-0.515c2.346-1.187,3.288-4.051,2.102-6.397 l-3.353-6.631h8.179c2.631,0,4.763-2.133,4.763-4.763C100,47.372,97.868,45.239,95.237,45.239z"></path><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M83.333,0C74.462,7.098,54.183,4.563,50,0c-4.183,4.563-24.461,7.098-33.333,0 C8.175,6.844,1.331,23.574,1.331,37.135C1.331,46.388,5.767,89.227,50,100c44.232-10.773,48.67-53.612,48.67-62.865 C98.67,23.574,91.825,6.844,83.333,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M98.996,22.408c-4.85-4.85-20.401-21.405-20.401-21.572C70.695,8.736,55.646,8.36,50,0 c-5.646,8.36-20.695,8.736-28.595,0.836c0,0.167-15.552,16.722-20.402,21.572c5.852,5.642,7.525,11.913,7.525,18.06 c0,7.523-7.525,13.417-7.525,27.256c0,11.746,7.758,20.604,14.715,24.582C27.925,99.287,44.73,90.006,50,100 c5.27-9.994,22.076-0.713,34.281-7.693c6.957-3.979,14.715-12.836,14.715-24.582c0-13.839-7.524-19.733-7.524-27.256 C91.472,34.321,93.146,28.05,98.996,22.408z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M99.975,8.151c-0.187-1.295-1.383-2.19-2.682-2.007L84.472,7.992l0.022-0.319 c0.096-1.305-0.887-2.439-2.19-2.535c-1.323-0.079-2.44,0.887-2.535,2.192l-0.098,1.352L2.032,19.866 c-0.635,0.091-1.207,0.437-1.583,0.957s-0.525,1.17-0.413,1.802l6.417,36.13c0.2,1.13,1.183,1.954,2.332,1.954h67.11l-0.508,7.008 H8.785c-1.308,0-2.369,1.063-2.369,2.369c0,1.31,1.061,2.37,2.369,2.37h68.806c1.241,0,2.273-0.959,2.363-2.199l2.155-29.704 c0.072-0.227,0.121-0.462,0.121-0.714c0-0.137-0.017-0.271-0.041-0.402l1.932-26.609l13.847-1.994 C99.264,10.647,100.163,9.447,99.975,8.151z M5.13,24.207l10.188-1.468l1.053,14.732H7.486L5.13,24.207z M10.772,55.971 L8.327,42.209h8.381l0.983,13.762H10.772z M20.021,22.062l15.167-2.185l0.972,17.594H21.122L20.021,22.062z M22.443,55.971 L21.46,42.209h14.961l0.76,13.762H22.443z M39.897,19.199l21.147-3.046l0.529,21.318H40.905L39.897,19.199z M41.927,55.971 l-0.76-13.762h20.525l0.342,13.762H41.927z M76.24,55.971h-9.467l-0.342-13.762h10.807L76.24,55.971z M77.582,37.471H66.315 L65.77,15.472l13.55-1.952L77.582,37.471z"></path><circle cx="20.435" cy="86.574" r="8.292"></circle><circle cx="71.64" cy="86.574" r="8.292"></circle><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M59.352,55.315c-0.959-0.918-2.363-1.849-4.211-2.79c5.063-0.74,8.807-2.474,11.232-5.202 c2.425-2.728,3.636-6.08,3.636-10.057c0-3.083-0.731-5.9-2.197-8.451c-1.463-2.549-3.419-4.328-5.868-5.334 c-2.447-1.007-6.023-1.511-10.729-1.511H27.814v56.059h6.984V53.135h8.101c1.8,0,3.096,0.091,3.888,0.268 c1.079,0.281,2.142,0.778,3.186,1.492c1.044,0.713,2.225,1.964,3.545,3.747c1.319,1.785,3.002,4.359,5.042,7.725l6.985,11.663 h8.782l-9.181-15.257C63.322,59.788,61.391,57.304,59.352,55.315z M49.811,46.712H34.798V28.166h16.706 c3.912,0,6.774,0.854,8.587,2.562c1.812,1.709,2.718,3.888,2.718,6.539c0,1.811-0.468,3.487-1.403,5.029 c-0.937,1.542-2.305,2.664-4.106,3.365C55.498,46.361,53.001,46.712,49.811,46.712z"></path><path d="M50,0C22.43,0,0,22.43,0,50s22.43,50,50,50s50-22.43,50-50S77.57,0,50,0z M50,91.857 C26.919,91.857,8.143,73.079,8.143,50C8.143,26.919,26.919,8.143,50,8.143c23.079,0,41.857,18.777,41.857,41.857 C91.857,73.079,73.079,91.857,50,91.857z"></path><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M60.802,67.872c-2.705,2.248-6.006,3.374-9.904,3.374c-3.207,0-6.186-0.829-8.936-2.479 c-2.75-1.649-4.779-4.143-6.083-7.481c-1.304-3.339-1.955-7.241-1.955-11.717c0-3.469,0.55-6.836,1.651-10.102 c1.099-3.265,3.007-5.868,5.724-7.805c2.715-1.938,6.093-2.906,10.138-2.906c3.516,0,6.434,0.874,8.755,2.62 c2.319,1.746,4.092,4.534,5.311,8.361l6.854-1.616c-1.41-4.855-3.909-8.624-7.499-11.303c-3.589-2.679-8.014-4.019-13.277-4.019 c-4.641,0-8.893,1.058-12.756,3.177c-3.865,2.117-6.842,5.214-8.936,9.292c-2.094,4.081-3.141,8.859-3.141,14.336 c0,5.024,0.928,9.724,2.782,14.104c1.853,4.376,4.558,7.723,8.109,10.03c3.553,2.309,8.164,3.461,13.834,3.461 c5.478,0,10.113-1.499,13.906-4.503c3.79-3.002,6.416-7.363,7.876-13.08l-6.963-1.76C65.334,62.284,63.505,65.623,60.802,67.872z"></path><path d="M50,0C22.429,0,0,22.431,0,50.001C0,77.57,22.429,100,50,100c27.57,0,50-22.43,50-49.999 C100,22.431,77.57,0,50,0z M50,91.918c-23.114,0-41.918-18.802-41.918-41.917c0-23.116,18.805-41.92,41.918-41.92 c23.114,0,41.918,18.805,41.918,41.92C91.918,73.116,73.114,91.918,50,91.918z"></path><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M74.881,30.685l7.967-20.049l-5.439,3.174c-0.153,0.086-4.524-12.979-13.465-12.979 c-3.474,0-22.76,0-30.372,0c13.005,0,23.833,24.644,23.834,24.646l-6.395,3.73L74.881,30.685z"></path><path d="M32.557,0.925c-6.503,0.95-11.252,10.621-11.252,10.621l-8.276,14.854L32.685,37.41l15.663-23.753 C44.283,7.761,38.707,1.719,32.557,0.925z"></path><path d="M65.816,69.718l-0.082-7.403L52.65,82.332l13.49,16.837l-0.069-6.298 c0-0.175,13.519,2.485,17.938-5.287c1.719-3.021,11.251-19.785,15.014-26.402C92.595,72.487,65.818,69.718,65.816,69.718z"></path><path d="M95.772,45.222l-8.821-14.537L67.664,42.329l12.904,25.356c7.136-0.617,15.144-2.479,18.874-7.433 C101.831,54.131,95.772,45.222,95.772,45.222z"></path><path d="M25.871,53.263l6.376,3.765L21.892,35.469L0.504,38.294l5.426,3.201 c0.149,0.091-9.124,10.281-4.762,18.085c1.694,3.03,11.102,19.868,14.815,26.512C9.64,74.739,25.869,53.265,25.871,53.263z"></path><path d="M16.56,86.934c4.001,5.211,14.76,4.641,14.76,4.641l17.005-0.022l0.023-22.529l-28.376-2.083 C16.808,73.36,14.253,81.178,16.56,86.934z"></path><path fill="#000" opacity="0.2" d="M32.556,0.831C26.054,1.78,21.304,11.451,21.304,11.451l-8.276,14.853l19.657,11.011l15.661-23.753 C44.283,7.667,38.706,1.624,32.556,0.831z"></path><path fill="#000" opacity="0.2" d="M95.772,45.222l-8.821-14.537L67.664,42.33l12.904,25.356c7.136-0.616,15.144-2.479,18.873-7.432 C101.829,54.132,95.772,45.222,95.772,45.222z"></path><path fill="#000" opacity="0.2" d="M16.56,86.934c4.002,5.211,14.76,4.641,14.76,4.641l17.005-0.022l0.023-22.529l-28.376-2.083 C16.808,73.36,14.253,81.178,16.56,86.934z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon class="actionMask" points="100,11.046 0,45.931 0,88.954 100,88.954"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M71.482,14.414c-3.017-1.616-6.762-0.484-8.376,2.526c-1.615,3.009-0.486,6.759,2.525,8.375 c10.785,5.789,17.486,16.976,17.486,29.195c0,18.263-14.857,33.118-33.118,33.118S16.881,72.773,16.881,54.511 c0-12.22,6.701-23.407,17.488-29.195c3.01-1.616,4.14-5.366,2.525-8.375c-1.613-3.01-5.358-4.142-8.376-2.526 C13.71,22.362,4.51,37.726,4.51,54.511C4.51,79.596,24.917,100,50,100c25.082,0,45.489-20.404,45.489-45.489 C95.489,37.726,86.29,22.362,71.482,14.414z"></path><path d="M50,67.011c3.417,0,6.186-2.771,6.186-6.187V6.186C56.186,2.77,53.417,0,50,0 s-6.186,2.77-6.186,6.186v54.639C43.814,64.239,46.583,67.011,50,67.011z"></path><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M89.509,39.507c-0.486,0-0.95,0.079-1.416,0.143c-0.89-3.281-2.179-6.392-3.833-9.274 c0.372-0.284,0.753-0.553,1.093-0.894c4.099-4.097,4.099-10.741,0-14.837c-4.095-4.097-10.739-4.097-14.836,0 c-0.341,0.341-0.611,0.722-0.895,1.095c-2.883-1.655-5.993-2.942-9.272-3.831c0.063-0.468,0.142-0.931,0.142-1.416 C60.491,4.697,55.794,0,50,0c-5.794,0-10.492,4.697-10.492,10.492c0,0.485,0.079,0.948,0.142,1.416 c-3.281,0.889-6.392,2.177-9.275,3.833c-0.283-0.373-0.553-0.754-0.894-1.095c-4.098-4.097-10.741-4.097-14.837,0 c-4.098,4.098-4.098,10.74,0,14.838c0.34,0.341,0.722,0.61,1.095,0.894c-1.656,2.883-2.943,5.992-3.833,9.272 c-0.467-0.064-0.93-0.143-1.416-0.143C4.697,39.507,0,44.204,0,49.998s4.697,10.491,10.492,10.491c0.484,0,0.949-0.078,1.416-0.142 c0.889,3.281,2.176,6.392,3.83,9.274c-0.372,0.284-0.754,0.554-1.095,0.896c-4.098,4.096-4.098,10.74,0,14.837 s10.739,4.097,14.837,0c0.34-0.339,0.611-0.723,0.895-1.095c2.883,1.654,5.994,2.943,9.275,3.833 c-0.063,0.466-0.142,0.932-0.142,1.416C39.508,95.303,44.206,100,50,100c5.794,0,10.491-4.697,10.491-10.491 c0-0.484-0.079-0.95-0.142-1.416c3.281-0.89,6.39-2.177,9.272-3.831c0.284,0.373,0.556,0.754,0.896,1.096 c4.099,4.096,10.741,4.096,14.837,0c4.099-4.099,4.099-10.741,0-14.838c-0.339-0.34-0.723-0.61-1.095-0.895 c1.656-2.885,2.943-5.996,3.833-9.277c0.466,0.063,0.932,0.142,1.416,0.142c5.794,0,10.491-4.697,10.491-10.491 S95.303,39.507,89.509,39.507z M50,77.87c-15.395,0-27.87-12.477-27.87-27.87c0-15.392,12.476-27.87,27.87-27.87 c15.394,0,27.87,12.478,27.87,27.87C77.87,65.394,65.394,77.87,50,77.87z"></path><circle cx="50" cy="50" r="14.755"></circle><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M100,56.41c0,6.51-5.325,11.835-11.835,11.835H11.834C5.326,68.245,0,62.92,0,56.41V43.589 c0-6.509,5.326-11.834,11.834-11.834h76.331c6.51,0,11.835,5.326,11.835,11.834V56.41z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon class="actionMask" points="85.254,15.593 50,1.186 14.746,15.593 0,50 14.746,84.405 50,98.814 85.254,84.405 100,50"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M85.372,14.628c-19.505-19.504-51.24-19.504-70.744,0c-19.504,19.504-19.504,51.239,0,70.744 c19.504,19.504,51.238,19.504,70.744,0C104.876,65.867,104.876,34.132,85.372,14.628z M23.29,23.29 c13.251-13.25,33.954-14.538,48.702-3.948L19.344,71.994C8.752,57.244,10.041,36.542,23.29,23.29z M76.708,76.71 c-13.249,13.25-33.952,14.538-48.703,3.946l52.651-52.651C91.245,42.756,89.957,63.459,76.708,76.71z"></path><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon points="94.01,17.949 5.991,17.949 50,46.93"></polygon><polygon points="0,20.143 0,77.042 28.942,39.204"></polygon><polygon points="50,53.069 33.238,42.031 2.625,82.051 97.374,82.051 66.762,42.031"></polygon><polygon points="71.058,39.204 100,77.042 100,20.143"></polygon><rect class="actionMask" fill="transparent" x="0" y="18" height="64" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M0,16.279v67.441h100V16.279H0z M89.915,20.931L50,47.216L10.084,20.931H89.915z M4.651,22.92 l26.25,17.288L4.651,74.527V22.92z M7.032,79.07l27.766-36.298L50,52.784l15.203-10.012L92.968,79.07H7.032z M95.349,74.527 l-26.25-34.319l26.25-17.288V74.527z"></path><rect class="actionMask" fill="transparent" x="0" y="16" height="68" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon class="actionMask" points="25,93.302 0,50 25,6.698 75,6.698 100,50 75,93.302"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M66.231,21.885L82.463,50L66.231,78.114H33.769L17.536,50l16.232-28.115H66.231 M75,6.698H25L0,50 l25,43.302h50L100,50L75,6.698L75,6.698z"></path><polygon class="actionMask" fill="transparent" points="25,93.302 0,50 25,6.698 75,6.698 100,50 75,93.302"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M71.706,3.395c-8.914,0-17.829,7.17-21.706,10.851C46.124,10.565,37.208,3.395,28.294,3.395 C19.38,3.395,0,12.697,0,33.045c0,27.42,36.824,54.453,50,63.56c13.176-9.106,50-36.14,50-63.56 C100,12.697,80.619,3.395,71.706,3.395z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M71.174,13.611c0.139,0,13.99,0.174,13.99,15.311c0,16.729-21.361,37.351-35.164,52.58 c-13.803-15.229-35.163-35.851-35.163-52.58c0-15.137,13.85-15.311,13.989-15.311c5.918,0,7.667,2.074,10.567,5.51l0.21,0.25 L50,31.674l10.396-12.304l0.21-0.25C63.507,15.686,65.257,13.611,71.174,13.611 M71.174,0C58.694,0,53.549,6.386,50,10.586 C46.452,6.386,41.305,0,28.826,0c-12.285,0-27.6,9.073-27.6,28.922C1.226,55.672,37.147,91.116,50,100 c12.854-8.884,48.773-44.328,48.773-71.078C98.773,9.073,83.46,0,71.174,0L71.174,0z"></path><path class="actionMask" fill="transparent" d="M71.706,3.395c-8.914,0-17.829,7.17-21.706,10.851C46.124,10.565,37.208,3.395,28.294,3.395 C19.38,3.395,0,12.697,0,33.045c0,27.42,36.824,54.453,50,63.56c13.176-9.106,50-36.14,50-63.56 C100,12.697,80.619,3.395,71.706,3.395z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M92.646,0C80.773,16,43.613,42.064,7.354,50.323C33.677,52.129,82.968,85.548,92.646,100 C78.322,64.387,82.839,19.742,92.646,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M90.401,30.215c-3.526,0-76.787,0-76.787,0L0,50l13.615,19.785c0,0,73.26,0,76.787,0 C93.927,69.785,100,61.853,100,50C100,38.149,93.927,30.215,90.401,30.215z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M99.996,56.191c0.266-2.2-11.707-8.133-19.182-8.895c7.203-2.138,17.867-10.195,17.196-12.306 c-0.684-2.108-14.039-2.453-21.141,0c5.596-4.974,11.808-16.717,10.37-18.416c-1.593-1.561-13.791,3.628-19.213,8.774 c3.301-6.754,4.587-20.063,2.58-20.997c-2.025-0.896-11.183,8.842-14.087,15.774h-0.007C56.658,12.61,52.214,0,50,0 c-2.215,0-6.658,12.61-6.515,20.127h-0.006c-2.903-6.933-12.062-16.67-14.087-15.774c-2.007,0.935-0.721,14.243,2.581,20.997 c-5.422-5.146-17.62-10.335-19.213-8.774c-1.438,1.699,4.774,13.442,10.37,18.416c-7.101-2.453-20.457-2.108-21.14,0 c-0.671,2.11,9.993,10.168,17.196,12.306c-7.475,0.762-19.447,6.694-19.182,8.895c0.226,2.203,13.215,5.338,20.673,4.426 C14.203,64.432,5.796,74.821,6.956,76.709c1.148,1.895,14.227-0.848,20.571-4.875c-4.308,6.16-7.644,19.104-5.807,20.34 c1.841,1.231,12.533-6.789,16.579-13.126c-1.432,7.381,0.781,20.564,2.961,20.945c1.746,0.321,6.354-11.163,8.739-17.931 c2.385,6.768,6.993,18.252,8.739,17.931c2.181-0.381,4.393-13.564,2.961-20.945c4.046,6.337,14.738,14.357,16.58,13.126 c1.837-1.235-1.5-14.18-5.808-20.34c6.344,4.027,19.423,6.77,20.571,4.875c1.16-1.888-7.247-12.277-13.722-16.092 C86.781,61.529,99.77,58.395,99.996,56.191z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M100,50c0-7.523-5.095-13.84-12.019-15.732c3.559-6.234,2.695-14.303-2.626-19.623 c-5.32-5.32-13.39-6.184-19.623-2.627C63.839,5.095,57.523,0,50,0S36.16,5.095,34.267,12.018 c-6.233-3.556-14.302-2.692-19.622,2.627c-5.319,5.32-6.183,13.388-2.628,19.623C5.095,36.16,0,42.477,0,50 s5.095,13.839,12.018,15.732c-3.556,6.233-2.692,14.303,2.627,19.623c5.32,5.321,13.389,6.185,19.623,2.626 C36.16,94.905,42.477,100,50,100c7.521,0,13.839-5.095,15.732-12.019c6.233,3.559,14.303,2.695,19.623-2.626 c5.321-5.32,6.185-13.39,2.626-19.623C94.905,63.839,100,57.523,100,50z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 627 627"><path d="M276.3,211c3.1-33.8,15.1-65,33.6-91.3C294.8,51.3,233.8,0,161,0C77,0,8.6,68.4,8.6,152.5 c0,73.2,51.8,134.4,120.7,149.1C163.9,254.3,216.1,221,276.3,211z M100,188.8c0-5.5,4.3-9.8,9.8-9.8h31.3v-7.3l-4.3-7.3h-27 c-5.6,0-9.8-4.3-9.8-9.8s4.3-9.8,9.8-9.8h15.4L91.9,89.9c-1.8-3-3.5-6.8-3.5-10.3c0-13.9,12.9-18.4,21.7-18.4 c10.6,0,15.4,8.3,17.2,11.8l33.8,64.3l33.8-64.3c1.8-3.5,6.6-11.8,17.1-11.8c8.8,0,21.7,4.5,21.7,18.4c0,3.5-1.8,7.3-3.5,10.3 l-33.3,54.7h15.4c5.5,0,9.8,4.3,9.8,9.8s-4.3,9.8-9.8,9.8h-27l-4.3,7.3v7.3h31.3c5.5,0,9.8,4.3,9.8,9.8c0,5.5-4.3,9.8-9.8,9.8 h-31.3v24.9c0,12.1-7.3,20.2-19.9,20.2c-12.6,0-19.9-8.1-19.9-20.2v-24.9h-31.3C104.3,198.6,100,194.3,100,188.8z"></path><path d="M466,76.2c-77,0-140.6,57.4-150.9,131.6c29.1,0.2,56.8,6,82.4,16.1c1.7-3.9,5.2-6.3,10.6-6.3h5.3 c-5.3-7.6-7.6-17.1-7.6-27c0-31.2,27.7-53.2,63.3-53.2c44.2,0,65.6,23.7,65.6,43.4c0,11.4-7.8,17.6-18.9,17.6 c-22.2,0-8.6-30.7-42.6-30.7c-14.9,0-29,8.8-29,25.2c0,8.6,4.3,17.1,8.3,24.7H480c10.3,0,15.6,3.8,15.6,12.1 c0,8.3-5.3,12.1-15.6,12.1H460c0.8,2,1.3,3.8,1.3,6.1c0,4.1-1,8.1-2.6,12c8.2,6.8,15.8,14.4,23.1,22.2c7,1.4,13.2,3,20.6,3 c4.3,0,14.6-2.8,18.6-2.8c9.3,0,14.6,7.1,14.6,16.1c0,14.2-12.7,20.4-25.8,21.3c8.7,14.6,15.9,30.1,21.3,46.6 c51.5-24.5,87.3-76.9,87.3-137.6C618.4,144.6,550,76.2,466,76.2z"></path><path d="M323.6,454.6V517c18.9-1.3,38.8-10.1,38.8-30.9C362.3,464.7,340.6,458.4,323.6,454.6z"></path><path d="M269.4,379.9c0,15.8,11.7,24.9,35.3,29.6v-56.4C283.2,353.8,269.4,366.4,269.4,379.9z"></path><path d="M313.5,245.9c-105.1,0-190.6,85.5-190.6,190.6S208.4,627,313.5,627s190.6-85.5,190.6-190.6S418.6,245.9,313.5,245.9z  M323.6,549.1v19.5c0,5.4-4.1,10.7-9.5,10.7s-9.4-5.3-9.4-10.7v-19.5c-53.2-1.3-79.7-33.1-79.7-58c0-12.6,7.6-19.8,19.5-19.8 c35.3,0,7.9,43.5,60.2,45.7v-65.9c-46.7-8.5-75-29-75-64c0-42.8,35.6-64.9,75-66.2v-16.8c0-5.4,4.1-10.7,9.4-10.7 s9.5,5.3,9.5,10.7V321c24.5,0.7,74.9,16,74.9,47c0,12.3-9.2,19.5-19.9,19.5c-20.5,0-20.2-33.7-55.1-34.3V413 c41.6,8.8,78.4,21.1,78.4,69.7C402,524.9,370.5,546.3,323.6,549.1z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="627" width="627"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M76.319,85.695c-5.861,3.718-15.962,1.923-25.73,0.189c-4.818-0.858-9.706-1.726-14.403-2.006 c3.223-5.371,5.271-10.707,6.164-15.975h17.208v-8.067H42.783c-0.293-3.912-1.347-8.004-2.63-12.101h19.405v-8.068H37.476 c-1.475-4.416-2.794-8.729-2.794-11.598c0-6.526,6.165-15.967,17.312-15.967c11.961,0,17.314,6.985,17.314,13.908h12.102 C81.409,13.085,71.305,0,51.993,0C34.398,0,22.579,14.514,22.579,28.07c0,3.596,0.928,7.497,2.187,11.598H17.2v8.068h10.227 c1.44,4.286,2.779,8.555,3.199,12.101H17.2v8.067h12.791c-1.633,6.548-5.874,13.508-12.705,20.775l7.893,9.095 c4.666-3.285,14.135-1.604,23.292,0.022C54.612,98.889,60.857,100,66.81,100c5.721,0,11.172-1.028,15.991-4.081L76.319,85.695z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M83.068,82.85c-4.966,4.134-11.039,6.201-18.205,6.201c-5.893,0-11.369-1.519-16.425-4.552 c-5.056-3.035-8.784-7.62-11.179-13.754c-0.861-2.201-1.51-4.584-2.063-7.056h41.507l1.31-8.357H33.906 c-0.157-1.974-0.243-4.012-0.243-6.124c0-1.453,0.067-2.892,0.174-4.324h45.815l1.311-8.357H35.092 c0.443-1.979,0.951-3.947,1.605-5.887c2.022-6.002,5.53-10.786,10.521-14.346c4.99-3.563,11.201-5.344,18.638-5.344 c6.463,0,11.826,1.606,16.095,4.816c1.55,1.167,2.963,2.595,4.248,4.269L90.16,7.142C83.627,2.392,75.621,0,66.115,0 c-8.528,0-16.346,1.944-23.448,5.838c-7.103,3.892-12.577,9.586-16.426,17.085c-2.124,4.138-3.64,8.682-4.591,13.604h-7.552 l-1.31,8.357h7.821c-0.085,1.439-0.141,2.896-0.141,4.389c0,2.051,0.098,4.066,0.266,6.059h-9.586l-1.31,8.357h12.135 c0.847,3.96,2.039,7.802,3.609,11.508c3.408,8.048,8.376,14.194,14.908,18.438C47.02,97.88,55.497,100,65.92,100 c7.692,0,14.472-1.622,20.356-4.842V79.621C85.293,80.803,84.228,81.887,83.068,82.85z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M79.125,56.16c-2.268-3.361-5.778-6.14-10.534-8.334c-2.911-1.321-8.023-2.846-15.311-4.568V17.445 c4.577,0.412,8.179,1.668,10.767,3.792c3.215,2.639,5.103,6.542,5.66,11.707l10.368-0.781c-0.188-4.793-1.526-9.086-4.015-12.876 c-2.492-3.791-6.049-6.661-10.674-8.612c-3.6-1.516-7.644-2.427-12.106-2.764V0h-6.123v7.842c-4.631,0.219-8.911,1.088-12.793,2.693 c-4.497,1.857-7.915,4.58-10.257,8.165c-2.341,3.587-3.512,7.442-3.512,11.567c0,3.755,0.957,7.145,2.871,10.172 c1.913,3.029,4.822,5.566,8.723,7.609c2.898,1.539,7.903,3.173,14.968,4.9v29.277c-2.82-0.367-5.464-1.043-7.888-2.097 c-3.717-1.616-6.458-3.734-8.221-6.356c-1.766-2.618-2.89-5.972-3.374-10.06l-10.201,0.892c0.148,5.462,1.645,10.358,4.488,14.688 c2.842,4.331,6.763,7.573,11.762,9.728c3.787,1.633,8.27,2.641,13.434,3.038V100h6.123v-7.793c5.441-0.113,10.38-1.144,14.78-3.158 c4.664-2.137,8.241-5.129,10.73-8.975c2.491-3.847,3.735-7.944,3.735-12.291C82.526,63.398,81.394,59.524,79.125,56.16z  M47.157,41.817c-6.832-1.71-11.159-3.388-12.96-5.028c-2.118-1.896-3.177-4.309-3.177-7.247c0-3.38,1.495-6.27,4.487-8.667 c2.57-2.061,6.459-3.229,11.65-3.518V41.817z M69.788,75.67c-1.54,2.139-3.892,3.818-7.051,5.046 c-2.772,1.077-5.941,1.651-9.457,1.784V54.461c4.529,1.148,7.614,2.042,9.233,2.675c3.418,1.301,5.872,2.909,7.358,4.821 c1.485,1.914,2.23,4.152,2.23,6.717C72.103,71.201,71.331,73.533,69.788,75.67z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 484.184 484.184"><path d="M309.43,219.944c-19-10.5-39.2-18.5-59.2-26.8c-11.6-4.8-22.7-10.4-32.5-18.2c-19.3-15.4-15.6-40.4,7-50.3 c6.4-2.8,13.1-3.7,19.9-4.1c26.2-1.4,51.1,3.4,74.8,14.8c11.8,5.7,15.7,3.9,19.7-8.4c4.2-13,7.7-26.2,11.6-39.3 c2.6-8.8-0.6-14.6-8.9-18.3c-15.2-6.7-30.8-11.5-47.2-14.1c-21.4-3.3-21.4-3.4-21.5-24.9c-0.1-30.3-0.1-30.3-30.5-30.3 c-4.4,0-8.8-0.1-13.2,0c-14.2,0.4-16.6,2.9-17,17.2c-0.2,6.4,0,12.8-0.1,19.3c-0.1,19-0.2,18.7-18.4,25.3c-44,16-71.2,46-74.1,94 c-2.6,42.5,19.6,71.2,54.5,92.1c21.5,12.9,45.3,20.5,68.1,30.6c8.9,3.9,17.4,8.4,24.8,14.6c21.9,18.1,17.9,48.2-8.1,59.6 c-13.9,6.1-28.6,7.6-43.7,5.7c-23.3-2.9-45.6-9-66.6-19.9c-12.3-6.4-15.9-4.7-20.1,8.6c-3.6,11.5-6.8,23.1-10,34.7 c-4.3,15.6-2.7,19.3,12.2,26.6c19,9.2,39.3,13.9,60,17.2c16.2,2.6,16.7,3.3,16.9,20.1c0.1,7.6,0.1,15.3,0.2,22.9 c0.1,9.6,4.7,15.2,14.6,15.4c11.2,0.2,22.5,0.2,33.7-0.1c9.2-0.2,13.9-5.2,13.9-14.5c0-10.4,0.5-20.9,0.1-31.3 c-0.5-10.6,4.1-16,14.3-18.8c23.5-6.4,43.5-19,58.9-37.8C386.33,329.544,370.03,253.444,309.43,219.944z"></path><rect class="actionMask" fill="transparent" x="110" y="0" height="485" width="260"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 481.569 481.569"><path d="M444.288,429.288c-5.4-13.2-10.9-26.4-16.9-39.4c-5.3-11.6-12.1-15-24.8-12.1c-16.1,3.7-31.9,8.6-48,11.9 c-31.1,6.5-62.3,7.1-93-2.6c-38.5-12.1-59-40-71.6-76h104.4c8.2,0,14.8-6.6,14.8-14.8v-32.9c0-8.2-6.6-14.8-14.8-14.8h-114.4 c0-9.2-0.1-18,0-26.8h114.4c8.2,0,14.8-6.6,14.8-14.8v-32.9c0-8.2-6.6-14.8-14.8-14.8h-100c0-0.4,0-0.8,0.2-1 c12-27.3,29.5-49.2,58.2-60.6c33.4-13.2,67.5-12.9,101.9-5.8c16.3,3.3,32.3,8.3,48.6,12c11.9,2.7,18.8-0.8,23.9-11.9 c5.9-12.8,11.3-25.8,16.7-38.9c5.1-12.3,2.1-21-9.5-27.8c-2.9-1.7-5.9-3.1-9-4.3c-48.2-18.8-97.9-25.8-149.2-17.6 c-36.1,5.8-69.8,18.2-98.9,40.8c-36.7,28.4-60.5,65.9-74.3,110l-1.7,5.1h-51.4c-8.2,0-14.8,6.6-14.8,14.8v32.9 c0,8.2,6.6,14.8,14.8,14.8h40.5c0,9,0,17.7,0,26.8h-40.5c-8.2,0-14.8,6.6-14.8,14.8v32.9c0,8.2,6.6,14.8,14.8,14.8h48.8 c3.7,12,6.8,24.2,11.5,35.7c24.7,59.6,66.1,102,128.4,122.2c51.5,16.7,103.4,16.2,155.3,1.9c13.5-3.7,26.9-8.5,39.7-14.4 C445.988,450.788,449.188,441.188,444.288,429.288z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="481.569" width="481.569"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 489.9 489.9"><path d="M386.458,272.6c-5.5-4.3-62.9-68-78.4-77V30.3c0-16.8-13.6-30.3-30.3-30.3h-156.1c-16.8,0-30.3,13.6-30.3,30.3v289.4 c0,16.8,13.6,30.3,30.3,30.3h50.1h17.9l-2.8-23.8c-0.9-0.8-1.5-1.3-2.4-2.1h-10h-20c1-4,1.3-8.4,0.5-12.9 c-2.2-12.5-12.1-22.6-24.6-24.9c-4.6-0.9-9.1-0.6-13.2,0.4V61.4c1.8,0.3,3.7,0.5,5.6,0.5c17,0,30.7-13.8,30.7-30.7 c0-1.8-0.2-3.6-0.5-5.4h93.2c-0.3,1.8-0.5,3.6-0.5,5.4c0,17,13.7,30.7,30.7,30.7c1.9,0,3.8-0.2,5.6-0.5v219.9l0,0v63.2 c-10.6-7.8-22.4-32.2-22.4-32.2s-5.8-64.9-38.7-64.9c-0.9,0-1.7,0-2.6,0.1c0,0-24.9,2.1-4.3,73.3l9.2,79.1 c0,0,10.3,42.9,38.7,72.6v8.8c0,4.7,3.8,8.6,8.6,8.6h92.5c4.4,0,8-3.3,8.5-7.6c3.3-30.8,16.1-145.3,23.6-162.7 c1.2-2.8,2.2-5.6,2.6-8.6C399.358,301.2,399.958,283.2,386.458,272.6z"></path><path d="M 133.258 177.1 c 0 31.7 22.2 58.2 51.9 64.9 c 0.9 -1.7 1.8 -3.2 2.9 -4.8 c 9.8 -14.3 23.1 -16.9 27.6 -17.3 c 1.8 -0.2 3.6 -0.3 5.4 -0.3 c 6.4 0 15.1 1.2 24.1 6 c 12.9 -12.1 21 -29.4 21 -48.5 c 0 -36.7 -29.8 -66.5 -66.5 -66.5 S 133.258 140.4 133.258 177.1 Z M 159.858 171.2 c 4 0 4.1 0 4.7 -4 c 0.5 -3.1 1.4 -6 2.6 -8.9 c 0.7 -1.6 1.8 -2.2 3.4 -1.7 c 2.5 0.7 4.9 1.4 7.4 2.2 c 2.3 0.7 2.6 1.5 1.6 3.7 c -2.2 4.5 -3.1 9.1 -2.8 14.1 c 0.1 1.3 0.2 2.6 0.8 3.7 c 1.9 4.3 6.6 4.9 9.5 1.3 c 1.5 -1.8 2.5 -3.9 3.4 -6.1 c 1.6 -3.8 3.1 -7.6 5 -11.1 c 6.3 -11.4 20.6 -14.5 30.4 -6.4 c 3.5 2.9 5.9 6.7 7.1 11.1 c 0.5 1.9 1.5 2.8 3.5 2.7 s 3.9 0 5.9 0 c 1.8 0 2.7 0.9 2.7 2.6 c 0.1 2.1 0.1 4.2 0 6.3 c 0 1.9 -1.1 2.7 -2.9 2.7 c -1.4 0 -2.9 0 -4.3 0 c -3.2 0 -3.3 0.1 -3.8 3.2 c -0.6 3.9 -1.5 7.7 -3.2 11.3 c -1.4 2.8 -2.1 3.1 -5 2.3 c -2.2 -0.6 -4.4 -1.2 -6.5 -1.9 c -2.5 -0.8 -2.8 -1.5 -1.6 -3.8 c 2.1 -3.9 3.2 -8.1 3.8 -12.5 c 0.4 -2.8 0.1 -5.6 -1.1 -8.2 c -2.1 -4.9 -7.8 -5.7 -11.2 -1.5 c -1.2 1.4 -2 3 -2.7 4.7 c -1.9 4.3 -3.3 8.8 -5.7 12.8 c -3.9 6.6 -9.3 10.7 -17.3 10.2 c -9 -0.5 -14.7 -5.7 -17.7 -13.9 c -1.2 -3.4 -1.2 -3.4 -4.8 -3.5 c -1.2 0 -2.4 0 -3.6 0 c -2.7 -0.1 -3.2 -0.5 -3.2 -3.2 c 0 -0.8 0 -1.7 0 -2.5 C 154.158 171.3 154.158 171.3 159.858 171.2 Z"></path><circle cx="203.058" cy="80.3" r="18.4"></circle><rect class="actionMask" fill="transparent" x="85" y="0" height="490" width="315"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 13.531 13.531"><path d="M11.432,10.994v2.537H2.099v-1.658c1.086-0.449,2.271-1.616,2.271-3.009 c0-0.287,0-0.552-0.041-0.819H2.322V5.917h1.64C3.858,5.404,3.798,4.83,3.798,4.257C3.798,1.7,5.66,0,8.424,0 c1.105,0,1.943,0.245,2.395,0.492l-0.493,2.354c-0.41-0.225-0.983-0.368-1.739-0.368c-1.454,0-1.904,0.921-1.904,1.923 c0,0.534,0.084,1.005,0.206,1.517h2.804v2.128H7.155c0.021,0.492-0.04,0.982-0.185,1.453c-0.183,0.513-0.511,1.024-1.002,1.453 v0.042H11.432z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="13.531" width="13.531"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 401.991 401.991"><path d="M346.209,4.57C344.306,1.524,341.735,0,338.502,0H283.97c-3.997,0-6.759,1.812-8.281,5.424l-54.532,119.914 c-1.335,3.237-3.953,9.042-7.847,17.419c-3.902,8.375-6.804,14.845-8.707,19.414c-7.042-16.562-12.372-28.458-15.989-35.691 L127.227,5.14C125.318,1.713,122.562,0,118.945,0h-55.39c-3.422,0-6.089,1.524-7.992,4.57c-1.521,3.044-1.521,6.09,0,9.136 l91.647,165.023H86.109c-2.474,0-4.615,0.9-6.423,2.708c-1.807,1.812-2.712,3.949-2.712,6.423v29.695 c0,2.666,0.905,4.856,2.712,6.567c1.809,1.711,3.949,2.566,6.423,2.566h82.226v24.271H86.109c-2.474,0-4.615,0.903-6.423,2.71 c-1.807,1.808-2.712,3.949-2.712,6.427v29.403c0,2.669,0.905,4.859,2.712,6.57c1.809,1.712,3.949,2.567,6.423,2.567h82.229v94.219 c0,2.662,0.903,4.853,2.712,6.563s3.949,2.57,6.423,2.57h49.11c2.471,0,4.609-0.903,6.43-2.714c1.8-1.811,2.704-3.949,2.704-6.42 v-94.219h82.799c2.471,0,4.613-0.855,6.42-2.567c1.811-1.711,2.71-3.901,2.71-6.57v-29.403c0-2.478-0.896-4.619-2.71-6.427 c-1.807-1.81-3.949-2.71-6.42-2.71h-82.799V226.69h82.799c2.471,0,4.613-0.855,6.42-2.566c1.811-1.711,2.71-3.901,2.71-6.567 v-29.695c0-2.474-0.896-4.611-2.71-6.423c-1.807-1.805-3.949-2.708-6.42-2.708h-61.384l89.366-165.311 C348.016,10.186,347.923,7.236,346.209,4.57z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="401.991" width="401.991"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 403.5 403.5"><path d="M 106.9 184.3 c -7.6 0 -13.4 2.4 -13.4 2.4 l -1.6 9.6 c 0 0 4.8 -2 12.1 -2 c 4.1 0 7.2 0.5 7.2 3.8 c 0 2 -0.4 2.8 -0.4 2.8 s -3.3 -0.3 -4.8 -0.3 c -9.6 0 -19.7 4.1 -19.7 16.5 c 0 9.7 6.6 12 10.7 12 c 7.8 0 11.2 -5.1 11.4 -5.1 l -0.4 4.2 h 9.8 l 4.4 -30.6 C 122.1 184.7 110.8 184.3 106.9 184.3 Z M 101.4 219.8 c -3.4 0 -4.3 -2.6 -4.3 -4.2 c 0 -3 1.6 -6.7 9.8 -6.7 c 1.9 0 2.1 0.2 2.4 0.3 C 109.4 211.1 108.1 219.8 101.4 219.8 Z M 136.1 198.2 c 0 5.5 13.2 2.8 13.2 16.6 c 0 14.8 -14.3 14.1 -16.8 14.1 c -9.3 0 -12.2 -1.3 -12.5 -1.4 l 1.5 -9.7 c 0 -0.1 4.7 1.7 9.9 1.7 c 3 0 6.9 -0.3 6.9 -3.9 c 0 -5.4 -13.9 -4.1 -13.9 -16.8 c 0 -11.2 8.3 -14.5 16.6 -14.5 c 6.3 0 10.2 0.9 10.2 0.9 l -1.4 9.8 c 0 0 -6 -0.5 -7.6 -0.5 C 138.2 194.5 136.1 195.4 136.1 198.2 Z M 162.4 215.1 c -0.2 1.5 0.2 3.6 4 3.6 c 1 0 2.1 -0.3 2.9 -0.3 l -1.4 9.4 c -1.1 0.3 -4.3 1.4 -8.3 1.5 c -5.2 0.1 -8.9 -2.9 -8.9 -9.4 c 0 -4.4 6.3 -40.7 6.6 -40.9 h 11.1 l -1.1 6.5 h 5.5 l -1.4 10.4 h -5.9 L 162.4 215.1 Z M 205.3 210.5 c 0 0 1.5 -7.2 1.5 -10.1 c 0 -7.3 -3.6 -16.2 -15.8 -16.2 c -11.2 0 -19.4 12 -19.4 25.6 c 0 15.7 10.4 19.4 19.2 19.4 c 8.1 0 11.7 -1.8 11.7 -1.8 l 2 -10.7 c 0 0 -6.2 2.7 -11.8 2.7 c -11.9 0 -9.8 -8.9 -9.8 -8.9 S 205.3 210.5 205.3 210.5 Z M 190.9 194.1 c 6.3 0 5.1 7 5.1 7.6 h -12.3 C 183.7 201 184.9 194.1 190.9 194.1 Z M 90.2 175.4 l -8.8 52.9 H 70.1 l 6.3 -39.9 l -14.3 39.9 h -7.6 l -1 -39.9 l -6.8 39.9 H 36 l 8.9 -52.9 h 16.2 l 0.6 32.5 l 10.9 -32.5 H 90.2 Z M 230.7 168.5 H 173 c 0.6 -1.1 2.6 -5.4 5.6 -11.2 h 47.5 C 227.9 160.9 229.4 164.6 230.7 168.5 Z M 220.2 146.3 h -35.4 c 2.3 -3.7 4.8 -7.6 7.4 -11.2 h 19.8 C 215 138.7 217.7 142.4 220.2 146.3 Z M 201.7 279.1 c -3.9 -3.5 -7.4 -7.4 -10.7 -11.4 h 21.5 c -3.2 4 -6.8 7.7 -10.6 11.2 h 0 c 0 0 0 0 0 0 C 201.9 279 201.8 279 201.7 279.1 Z M 220.3 257 h -37 c -2.3 -3.6 -4.4 -7.3 -6.2 -11.2 h 49.2 C 224.6 249.7 222.5 253.4 220.3 257 Z M 233.5 185 c -1.5 3 -2.8 5.8 -4.1 12.9 c -7.7 -2.7 -8.3 12.2 -11.5 30.6 h -11.4 l 6.9 -43 h 10.3 l -1 6.2 c 0 0 3.7 -6.8 8.7 -6.8 C 232.8 184.8 233.5 185 233.5 185 Z M 254.1 218.4 c 3.7 0 9.2 -2.7 9.2 -2.7 l -2 12.1 c 0 0 -6 1.5 -9.7 1.5 c -13.3 0 -20 -9.1 -20 -23 c 0 -20.9 12.5 -32 25.3 -32 c 5.8 0 12.5 2.7 12.5 2.7 l -1.8 11.8 c 0 0 -4.5 -3.2 -10.2 -3.2 c -7.6 0 -14.3 7.2 -14.3 20.3 C 243 212.3 246.2 218.4 254.1 218.4 Z M 362.5 222.2 c -0.5 0.3 -1 0.7 -1.3 1.3 c -0.3 0.5 -0.5 1.1 -0.5 1.7 s 0.2 1.1 0.5 1.7 c 0.3 0.5 0.7 1 1.2 1.3 c 0.5 0.3 1.1 0.4 1.7 0.4 c 0.6 0 1.2 -0.2 1.7 -0.4 c 0.5 -0.3 0.9 -0.7 1.2 -1.3 c 0.3 -0.5 0.4 -1.1 0.4 -1.7 c 0 -0.6 -0.1 -1.2 -0.4 -1.7 c -0.3 -0.5 -0.7 -1 -1.3 -1.3 c -0.5 -0.3 -1.1 -0.4 -1.7 -0.4 C 363.6 221.8 363 221.9 362.5 222.2 Z M 366.6 223.7 c 0.3 0.5 0.4 0.9 0.4 1.4 c 0 0.5 -0.1 1 -0.4 1.4 c -0.2 0.4 -0.6 0.8 -1 1.1 c -0.4 0.2 -0.9 0.4 -1.4 0.4 c -0.5 0 -1 -0.1 -1.4 -0.4 c -0.5 -0.3 -0.8 -0.6 -1.1 -1.1 c -0.3 -0.5 -0.4 -0.9 -0.4 -1.4 c 0 -0.5 0.1 -0.9 0.4 -1.4 c 0.3 -0.4 0.6 -0.8 1.1 -1 s 0.9 -0.4 1.4 -0.4 c 0.5 0 0.9 0.1 1.4 0.4 C 366 222.9 366.3 223.3 366.6 223.7 Z M 321.5 210.9 c 0 9.1 4.5 18 13.8 18 c 6.7 0 10.3 -4.6 10.3 -4.6 l -0.5 4 h 10.8 l 8.5 -52.8 l -11.1 0 l -2.4 14.9 c 0 0 -4.2 -5.8 -10.7 -5.8 C 330 184.6 321.5 196.9 321.5 210.9 Z M 348.1 204.5 c 0 5.9 -2.9 13.7 -8.9 13.7 c -4 0 -5.9 -3.4 -5.9 -8.6 c 0 -8.6 3.9 -14.3 8.8 -14.3 C 346 195.3 348.1 198 348.1 204.5 Z M 394.5 70.1 H 9 c -5.8 0 -10.5 4.7 -10.5 10.5 V 323 c 0 5.8 4.7 10.5 10.5 10.5 h 385.5 c 5.8 0 10.5 -4.7 10.5 -10.5 V 80.5 C 405 74.7 400.3 70.1 394.5 70.1 Z M 376 201.8 c 0 57.6 -46.7 104.3 -104.3 104.3 c -26.9 0 -51.5 -10.2 -70 -27 c -18.5 16.7 -43 26.9 -69.9 26.9 c -57.6 0 -104.3 -46.7 -104.3 -104.3 c 0 -57.4 46.4 -103.9 103.6 -104.3 c 0.2 0 0.4 0 0.7 0 c 26.9 0 51.4 10.2 69.9 26.9 c 18.5 -16.8 43 -27 70 -27 C 329.3 97.4 376 144.1 376 201.8 C 376 201.7 376 201.7 376 201.8 Z M 362.7 223.4 v 3.6 h 0.6 v -1.5 h 0.3 c 0.2 0 0.4 0 0.5 0.1 c 0.2 0.1 0.4 0.4 0.6 0.9 l 0.3 0.6 h 0.7 l -0.4 -0.7 c -0.2 -0.3 -0.4 -0.6 -0.5 -0.7 c -0.1 -0.1 -0.2 -0.1 -0.3 -0.2 c 0.3 0 0.6 -0.1 0.7 -0.3 c 0.2 -0.2 0.3 -0.4 0.3 -0.7 c 0 -0.2 -0.1 -0.4 -0.2 -0.5 c -0.1 -0.2 -0.3 -0.3 -0.4 -0.4 c -0.2 -0.1 -0.5 -0.1 -0.9 -0.1 H 362.7 L 362.7 223.4 Z M 364.8 224.1 c 0.1 0.1 0.1 0.2 0.1 0.3 c 0 0.2 -0.1 0.3 -0.2 0.4 c -0.1 0.1 -0.4 0.2 -0.7 0.2 h -0.7 v -1.1 h 0.7 c 0.3 0 0.5 0 0.6 0.1 C 364.6 224 364.7 224 364.8 224.1 Z M 286.9 184.3 c -7.6 0 -13.5 2.4 -13.5 2.4 l -1.6 9.6 c 0 0 4.8 -2 12.1 -2 c 4.1 0 7.2 0.5 7.2 3.8 c 0 2 -0.4 2.8 -0.4 2.8 s -3.3 -0.3 -4.8 -0.3 c -9.6 0 -19.7 4.1 -19.7 16.5 c 0 9.7 6.6 12 10.7 12 c 7.8 0 11.2 -5.1 11.4 -5.1 l -0.4 4.2 h 9.8 l 4.4 -30.6 C 302.1 184.7 290.8 184.3 286.9 184.3 Z M 281.4 219.8 c -3.5 0 -4.3 -2.6 -4.3 -4.2 c 0 -3 1.6 -6.7 9.8 -6.7 c 1.9 0 2.1 0.2 2.4 0.3 C 289.5 211.1 288.1 219.8 281.4 219.8 Z M 322.6 197.8 c -7.7 -2.7 -8.3 12.2 -11.5 30.6 h -11.4 l 6.9 -43 h 10.3 l -1 6.2 c 0 0 3.7 -6.8 8.7 -6.8 c 1.4 0 2.1 0.1 2.1 0.1 C 325.3 188 324 190.7 322.6 197.8 Z"></path><rect class="actionMask" fill="transparent" x="0" y="70" height="265" width="403.5"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 455 455"><path d="M364.443,201.31c-1.496,4.303-4.103,11.255-3.933,10.954c0,0-9.351,25.48-11.809,32.081h24.603 c-1.175-5.742-6.86-33.132-6.86-33.132L364.443,201.31z"></path><path d="M0,89.331v276.338h455V89.331H0z M101.741,284.947l-23.686-89.602L44.25,170.349l59.733,0l15.403,78.211l28.992-78.208 h31.407l-46.675,114.596H101.741z M202.88,285.037h-29.638l18.543-114.778h29.636L202.88,285.037z M254.477,286.744 c-13.302-0.146-26.11-2.921-33.023-6.118l4.145-25.691l3.816,1.827c9.746,4.284,16.051,6.021,27.916,6.021 c8.524,0,17.662-3.525,17.739-11.212c0.049-5.024-3.831-8.622-15.382-14.243c-11.234-5.479-26.142-14.689-25.962-31.183 c0.179-22.309,20.806-37.887,50.108-37.887c11.475,0,20.699,2.514,26.558,4.818l-4.008,24.881l-2.663-1.312 c-5.476-2.331-12.485-4.568-22.186-4.409c-11.608,0-16.972,5.106-16.979,9.874c-0.073,5.39,6.287,8.915,16.643,14.241 c17.104,8.189,25,18.103,24.896,31.188C305.86,271.354,285.624,286.744,254.477,286.744z M381.743,285.082 c0,0-2.727-13.197-3.61-17.193c-4.316,0-34.561-0.067-37.958-0.067c-1.152,3.111-6.232,17.261-6.232,17.261h-31.136l44.023-105.193 c3.106-7.482,8.429-9.514,15.535-9.514h22.901l23.985,114.708H381.743z"></path><rect class="actionMask" fill="transparent" x="0" y="85" height="280" width="455"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 86.001 86.001"><path d="M77.276,17.176c1.363,2.564,2.039,5.744,2.039,9.557c0,8.666-3.652,15.652-10.945,20.959 c-7.299,5.312-17.492,7.961-30.59,7.961h-3.066c-2.307,0-4.609,1.812-5.129,4.021l-3.682,15.695 c-0.512,2.219-2.82,4.031-5.123,4.031h-6.705l-0.6,2.564C12.954,84.188,14.415,86,16.718,86h10.746 c2.305,0,4.613-1.812,5.123-4.031l3.684-15.695c0.52-2.209,2.822-4.021,5.129-4.021h3.066c13.098,0,23.291-2.648,30.588-7.961 c7.295-5.308,10.947-12.294,10.947-20.96c0-3.812-0.678-6.992-2.039-9.557c-1.357-2.547-3.33-4.629-5.902-6.217 C77.784,17.393,77.562,17.332,77.276,17.176z M19.218,68.77l3.683-15.696c0.52-2.209,2.82-4.021,5.127-4.021h3.066 c13.1,0,23.293-2.648,30.59-7.961c7.295-5.307,10.945-12.293,10.945-20.959c0-3.812-0.676-6.992-2.039-9.557 c-1.355-2.547-3.33-4.629-5.9-6.215c-2.635-1.611-5.73-2.73-9.314-3.385C51.78,0.326,47.577,0,42.745,0H20.368 c-2.311,0-4.613,1.801-5.137,4.021L0.106,68.768c-0.521,2.221,0.939,4.031,3.242,4.031h10.746 C16.397,72.799,18.706,70.988,19.218,68.77z M27.993,31.201l3.229-13.744c0.523-2.213,2.83-4.023,5.125-4.023h3.518 c4.1,0,7.207,0.688,9.291,2.062c2.082,1.361,3.127,3.455,3.127,6.297c0,4.299-1.625,7.617-4.85,9.945 c-3.229,2.324-7.719,3.5-13.52,3.5h-2.662C28.944,35.238,27.485,33.418,27.993,31.201z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="86.001" width="86.001"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon class="actionMask" points="50,0 9.234,50 50,100 90.766,50"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M50,0L9.234,50L50,100l40.766-50L50,0z M20.024,50L50,13.233L79.977,50L50,86.767L20.024,50z"></path><polygon class="actionMask" fill="transparent" points="50,0 9.234,50 50,100 90.766,50"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon class="actionMask" points="100,13.63 19.047,13.63 0,86.37 80.953,86.37"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M95.672,43.134c-2.391,0-4.328,1.938-4.328,4.328c0,0.415,0.076,0.808,0.186,1.187l-18.694,1.947 l-3.651-16.62c2.141-0.263,3.802-2.065,3.802-4.275c0-2.391-1.938-4.329-4.329-4.329c-2.39,0-4.328,1.938-4.328,4.329 c0,1.379,0.658,2.593,1.662,3.386L50,47.015L34.009,33.087c1.005-0.792,1.663-2.007,1.663-3.386c0-2.391-1.938-4.329-4.329-4.329 c-2.39,0-4.328,1.938-4.328,4.329c0,2.209,1.662,4.012,3.801,4.275l-3.652,16.62L8.471,48.649c0.108-0.379,0.186-0.772,0.186-1.187 c0-2.39-1.938-4.328-4.329-4.328C1.938,43.134,0,45.072,0,47.462c0,2.391,1.938,4.329,4.328,4.329c1.173,0,2.233-0.472,3.014-1.229 c4.241,5.599,15.331,20.226,18.33,24.064c8.507-3.731,18.955-6.269,24.328-6.269s15.821,2.537,24.328,6.269 c2.999-3.839,14.09-18.466,18.33-24.064c0.78,0.757,1.841,1.229,3.014,1.229c2.391,0,4.328-1.938,4.328-4.329 C100,45.072,98.063,43.134,95.672,43.134z"></path><rect class="actionMask" fill="transparent" x="0" y="25" height="50" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M47.769,0c-0.012,0-0.024,0.001-0.035,0.001c7.997,7.792,12.98,18.662,12.98,30.71 c0,23.691-19.202,42.894-42.894,42.894c-5.507,0-10.753-1.075-15.589-2.967C10.089,87.952,27.516,100,47.769,100 c27.616,0,50-22.385,50-50C97.77,22.386,75.385,0,47.769,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M69.102,16.209C80.353,23.26,87.849,35.771,87.849,50c0,21.973-17.874,39.848-39.847,39.848 c-7.991,0-15.629-2.413-22.046-6.678c25.516-3.83,45.142-25.895,45.142-52.459C71.098,25.732,70.419,20.865,69.102,16.209 M48.001,0 c-0.012,0-0.024,0.001-0.036,0.001c7.998,7.792,12.979,18.662,12.979,30.71c0,23.691-19.201,42.894-42.892,42.894 c-5.506,0-10.753-1.075-15.589-2.967C10.321,87.952,27.748,100,48.001,100c27.617,0,50-22.385,50-50 C98.001,22.386,75.618,0,48.001,0L48.001,0z"></path><path class="actionMask" fill="transparent" d="M47.769,0c-0.012,0-0.024,0.001-0.035,0.001c7.997,7.792,12.98,18.662,12.98,30.71 c0,23.691-19.202,42.894-42.894,42.894c-5.507,0-10.753-1.075-15.589-2.967C10.089,87.952,27.516,100,47.769,100 c27.616,0,50-22.385,50-50C97.77,22.386,75.385,0,47.769,0z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M49.999,25.686c-13.406,0-24.314,10.907-24.314,24.314c0,13.408,10.908,24.314,24.314,24.314 c13.405,0,24.313-10.906,24.313-24.314C74.313,36.593,63.404,25.686,49.999,25.686z M49.999,61.985 c-6.61,0-11.986-5.376-11.986-11.985s5.376-11.986,11.986-11.986c6.61,0,11.984,5.376,11.984,11.986S56.609,61.985,49.999,61.985z"></path><rect x="45.889" y="0" height="18.493" width="8.22"></rect><rect x="45.889" y="81.507" height="18.493" width="8.22"></rect><rect x="0" y="45.889" height="8.22" width="18.493"></rect><rect x="81.507" y="45.889" height="8.22" width="18.493"></rect><rect transform="matrix(0.7071 0.7071 -0.7071 0.7071 21.1826 -8.7739)" x="11.936" y="17.075" height="8.219" width="18.493"></rect><rect transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 78.8159 190.2833)" x="69.571" y="74.708" height="8.221" width="18.491"></rect><rect transform="matrix(-0.707 -0.7072 0.7072 -0.707 -19.5788 149.5206)" x="17.073" y="69.568" height="18.495" width="8.219"></rect><rect transform="matrix(0.7073 0.7069 -0.7069 0.7073 38.0423 -49.5158)" x="74.707" y="11.936" height="18.492" width="8.22"></rect><circle class="actionMask" fill="transparent" cx="50" cy="50" r="50"></circle></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path d="M97.938,0.957C96.171,6.849,94.551,29.823,100,38.512C78.203,48.38,50.368,83.431,42.563,99.043 C39.028,92.563,12.813,66.642,0,63.255c5.596-3.683,25.332-15.169,27.688-16.643c2.946,3.977,12.224,21.944,13.992,26.363 C43.888,63.991,60.824,22.754,97.938,0.957z"></path><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M96.662,68.525C99.387,64.179,100,53.764,100,50s-0.613-14.179-3.338-18.525 c0.096-0.098,0.194-0.189,0.288-0.293c1.527-1.714,2.106-3.689,1.295-4.412c-0.812-0.722-2.707,0.08-4.232,1.792 c-0.169,0.189-0.321,0.383-0.467,0.575C84.667,25.962,56.473,25.024,50,25.024c-6.472,0-34.667,0.938-43.546,4.112 c-0.145-0.192-0.297-0.386-0.466-0.575c-1.526-1.712-3.422-2.515-4.233-1.792c-0.812,0.723-0.232,2.698,1.295,4.412 c0.093,0.104,0.192,0.196,0.288,0.293C0.612,35.821,0,46.236,0,50s0.612,14.179,3.338,18.525c-0.096,0.098-0.195,0.188-0.288,0.294 c-1.527,1.714-2.107,3.688-1.295,4.412c0.811,0.722,2.707-0.08,4.233-1.793c0.169-0.189,0.321-0.383,0.466-0.575 c8.879,3.176,37.075,4.111,43.546,4.111c6.473,0,34.667-0.936,43.546-4.111c0.146,0.192,0.298,0.386,0.467,0.575 c1.525,1.713,3.421,2.515,4.232,1.793c0.812-0.724,0.232-2.698-1.295-4.412C96.856,68.714,96.758,68.623,96.662,68.525z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><path class="actionMask" d="M100,77.381c-33.637-3.798-66.363-3.798-100,0c7.838-17.531,7.833-37.23,0-54.762 c33.637,3.798,66.363,3.798,100,0C92.161,40.151,92.167,59.85,100,77.381z"></path></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon class="actionMask" points="15.235,0 14.384,0 0,14.384 85.616,100 100,85.616 100,84.765 100,0"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon points="74.07,25.782 76.397,31.359 66.145,31.359 66.145,22.554 50,14.727 33.855,22.554 33.855,31.359 23.602,31.359 25.93,25.782 0,36.35 0,45.743 16.047,58.854 19.354,50.929 35.764,50.929 34.932,54.355 22.896,54.355 22.896,63.748 50,85.272 77.104,63.748 77.104,54.355 65.069,54.355 64.236,50.929 80.645,50.929 83.953,58.854 100,45.743 100,36.35"></polygon><polygon fill="#000" opacity="0.2" points="42.662,22.553 33.855,22.553 33.855,31.358 40.521,31.358"></polygon><polygon fill="#000" opacity="0.2" points="59.479,31.358 66.145,31.358 66.145,22.553 57.338,22.553"></polygon><polygon fill="#000" opacity="0.2" points="83.953,49.461 80.645,41.535 61.952,41.535 65.069,54.353 64.236,50.928 80.645,50.928 83.953,58.854 100,45.742 100,36.349"></polygon><polygon fill="#000" opacity="0.2" points="22.896,54.353 22.896,63.746 50,85.272 77.104,63.746 77.104,54.353 50,75.88"></polygon><polygon fill="#000" opacity="0.2" points="34.932,54.353 38.047,41.535 19.354,41.535 16.047,49.461 0,36.349 0,45.742 16.047,58.854 19.354,50.928 35.764,50.928"></polygon><polygon class="actionMask" fill="transparent" points="74.07,25.782 76.397,31.359 66.145,31.359 66.145,22.554 50,14.727 33.855,22.554 33.855,31.359 23.602,31.359 25.93,25.782 0,36.35 0,45.743 16.047,58.854 19.354,50.929 35.764,50.929 34.932,54.355 22.896,54.355 22.896,63.748 50,85.272 77.104,63.748 77.104,54.355 65.069,54.355 64.236,50.929 80.645,50.929 83.953,58.854 100,45.743 100,36.35"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon points="73.564,21.485 70.599,31.386 10.595,31.386 0,53.168 0,66.238 60.42,66.238 60.396,78.515 100,55.05 100,41.98"></polygon><polygon fill="#000" opacity="0.2" points="60.396,65.445 64.074,53.168 0,53.168 0,66.238 60.42,66.238 60.396,78.515 100,55.05 100,41.98"></polygon><polygon class="actionMask" fill="transparent" points="73.564,21.485 70.599,31.386 10.595,31.386 0,53.168 0,66.238 60.42,66.238 60.396,78.515 100,55.05 100,41.98"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon points="80.566,46.045 98.664,46.045 98.664,34.176 50,1.187 1.335,34.176 1.335,46.045 19.434,46.045 0,86.943 0,98.813 50,98.813 100,98.813 100,86.943"></polygon><polygon fill="#000" opacity="0.2" points="25.074,34.176 1.335,34.176 1.335,46.045 19.434,46.045"></polygon><polygon fill="#000" opacity="0.2" points="80.566,46.045 98.664,46.045 98.664,34.176 74.926,34.176"></polygon><polygon fill="#000" opacity="0.2" points="50,86.943 0,86.943 0,98.813 50,98.813 100,98.813 100,86.943"></polygon><polygon class="actionMask" fill="transparent" points="80.566,46.045 98.664,46.045 98.664,34.176 50,1.187 1.335,34.176 1.335,46.045 19.434,46.045 0,86.943 0,98.813 50,98.813 100,98.813 100,86.943"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon points="57.979,29.529 57.979,34.584 0,34.584 0,48.856 12.19,64.018 74.132,64.018 79.319,70.471 100,56.092 100,41.819"></polygon><polygon fill="#000" opacity="0.2" points="62.364,34.584 57.979,29.529 57.979,34.584"></polygon><polygon fill="#000" opacity="0.2" points="79.319,56.201 74.132,49.747 12.19,49.747 0,34.584 0,48.855 12.19,64.018 74.132,64.018 79.319,70.471 100,56.09 100,41.818"></polygon><polygon class="actionMask" fill="transparent" points="57.979,29.529 57.979,34.584 0,34.584 0,48.856 12.19,64.018 74.132,64.018 79.319,70.471 100,56.092 100,41.819"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon points="69.469,11.499 61.651,19.316 61.651,28.746 7.817,28.746 0,36.563 0,71.255 61.651,71.255 61.651,88.501 69.469,80.684 100,46.092"></polygon><polygon fill="#000" opacity="0.2" points="7.817,63.438 7.817,28.746 0,36.563 0,71.255 61.651,71.255 61.651,88.501 69.469,80.684 69.469,63.438"></polygon><polygon fill="#000" opacity="0.2" points="69.469,11.499 61.651,19.316 61.651,28.746 69.469,28.746"></polygon><polygon class="actionMask" fill="transparent" points="69.469,11.499 61.651,19.316 61.651,28.746 7.817,28.746 0,36.563 0,71.255 61.651,71.255 61.651,88.501 69.469,80.684 100,46.092"></polygon></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div class="ClipartList__clipartItem" style="position: relative;"><div draggable="true" class="ClipartItem__clipartItemContainer" style="width: 65px; height: 65px;"><div class="ClipartItem__clipartItem ClipartItem__lightBlue"><svg viewBox="0 0 100 100"><polygon points="96.742,0 51.075,0 59.314,8.241 49.015,8.241 57.95,17.177 5.318,69.951 8.402,73.035 3.258,78.192 25.066,100 82.921,42.146 94.682,53.905 94.682,43.604 96.742,45.665"></polygon><polygon fill="#000" opacity="0.2" points="63.097,12.021 59.314,8.241 49.015,8.241 57.95,17.177"></polygon><polygon fill="#000" opacity="0.2" points="84.981,33.905 27.126,91.76 8.402,73.035 3.258,78.192 25.066,100 82.921,42.146 94.682,53.905 94.682,43.604"></polygon><rect class="actionMask" fill="transparent" x="0" y="0" height="100" width="100"></rect></svg><div class="ClipartItem__clipartActionMask"></div></div></div><div class="Flag__flag Flag__premium Flag__cliparts"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
						</div>
					</div>
				</div>

				<div class="side_tool_panel button">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_header">
						<span>buttons</span>
					</div>
					<div class="tool_panel_content">
						<div class="ButtonsList__buttonList ButtonsList__editor">
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;">
								<div class="Button__element Button__button" style="background-color: rgb(0, 178, 255); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;">
									<div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Montserrat; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">MAKE IT</div>
								</div>
							</div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;">
								<div class="Button__element Button__button" style="background-color: rgb(0, 137, 255); background-image: -webkit-linear-gradient(180deg, rgb(0, 137, 255) 0%, rgb(0, 250, 255) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Montserrat; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">MAKE IT</div></div>
							</div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(0, 178, 255); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(0, 178, 255); font-family: Montserrat; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">MAKE IT</div></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(4, 210, 107); border: 0px solid rgb(0, 0, 0); border-radius: 2px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Roboto; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px; text-shadow: rgba(0, 0, 0, 0.2) 0px 2px 10px;">DOWNLOAD</div></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(4, 210, 107); background-image: -webkit-linear-gradient(180deg, rgb(4, 210, 107) 0%, rgb(191, 227, 64) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 2px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Roboto; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px; text-shadow: rgba(0, 0, 0, 0.2) 0px 2px 10px;">DOWNLOAD</div></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(4, 210, 107); border-radius: 2px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(4, 210, 107); font-family: Roboto; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">DOWNLOAD</div></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(134, 96, 246); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Oswald; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">SUBSCRIBE</div></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(134, 96, 246); background-image: -webkit-linear-gradient(360deg, rgb(134, 96, 246) 0%, rgb(65, 164, 255) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Oswald; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">SUBSCRIBE</div></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(134, 96, 246); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(134, 96, 246); font-family: Oswald; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">SUBSCRIBE</div></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(251, 185, 47); border: 0px solid rgb(0, 0, 0); border-radius: 4px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Sign up</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(255, 150, 15); background-image: -webkit-linear-gradient(90deg, rgb(255, 150, 15) 0%, rgb(251, 185, 47) 100%); background-position: -1px -1px; background-size: calc(100% + 2px) calc(100% + 2px); border: 1px solid rgb(238, 134, 0); border-radius: 4px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Sign up</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(251, 185, 47); border-radius: 4px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(251, 185, 47); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Sign up</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(237, 20, 91); border: 0px solid rgb(0, 0, 0); border-radius: 0px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Oswald; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">ADD TO CART</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(201, 7, 61); background-image: -webkit-linear-gradient(90deg, rgb(201, 7, 61) 0%, rgb(255, 63, 126) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 0px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Oswald; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">ADD TO CART</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(237, 20, 91); border-radius: 0px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(237, 20, 91); font-family: Oswald; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">ADD TO CART</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(255, 255, 255); border: 0px solid rgb(0, 0, 0); border-radius: 1px; opacity: 1; box-shadow: rgba(0, 0, 0, 0.21) 0px 10px 20px 0px; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(62, 62, 62); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Submit</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(229, 235, 242); background-image: -webkit-linear-gradient(90deg, rgb(229, 235, 242) 0%, rgb(255, 255, 255) 100%); border: 0px solid rgb(230, 230, 230); border-radius: 1px; opacity: 1; box-shadow: rgba(0, 0, 0, 0.21) 0px 10px 20px 0px; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(62, 62, 62); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Submit</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(221, 229, 237); border-radius: 2px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(221, 229, 237); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Submit</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(207, 172, 106); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Montserrat; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">BUY NOW</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(231, 199, 142); background-image: -webkit-linear-gradient(90deg, rgb(231, 199, 142) 0%, rgb(231, 199, 142) 5%, rgb(185, 149, 89) 6%, rgb(231, 199, 142) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Montserrat; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">BUY NOW</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(207, 172, 106); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(207, 172, 106); font-family: Montserrat; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">BUY NOW</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(238, 156, 167); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: &quot;Noto Sans&quot;; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Call now</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(255, 221, 225); background-image: -webkit-linear-gradient(90deg, rgb(255, 221, 225) 4%, rgb(238, 156, 167) 5%, rgb(238, 156, 167) 37%, rgb(245, 188, 194) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: &quot;Noto Sans&quot;; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Call now</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(245, 188, 194); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(245, 188, 194); font-family: &quot;Noto Sans&quot;; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Call now</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(81, 103, 188); border: 0px solid rgb(0, 0, 0); border-radius: 2px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: &quot;Open Sans&quot;; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Like</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(81, 103, 188); background-image: -webkit-linear-gradient(270deg, rgb(81, 103, 188) 0%, rgb(58, 84, 158) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: &quot;Open Sans&quot;; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Like</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(81, 103, 188); border-radius: 3px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(81, 103, 188); font-family: &quot;Open Sans&quot;; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Like</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(33, 35, 37); border: 0px solid rgb(0, 0, 0); border-radius: 2px; opacity: 1; box-shadow: rgba(0, 0, 0, 0.21) 0px 10px 20px 0px; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Buy now</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(33, 35, 37); background-image: -webkit-linear-gradient(90deg, rgb(33, 35, 37) 0%, rgb(49, 52, 54) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 3px; opacity: 1; box-shadow: rgba(0, 0, 0, 0.21) 0px 10px 20px 0px; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Buy now</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(33, 35, 37); border-radius: 2px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(33, 35, 37); font-family: Roboto; font-size: 14px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Buy now</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(0, 92, 255); border: 0px solid rgb(0, 0, 0); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Lato; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Learn more</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(0, 92, 255); background-image: -webkit-linear-gradient(90deg, rgb(0, 92, 255) 0%, rgb(61, 131, 255) 100%); background-position: -1px -1px; background-size: calc(100% + 2px) calc(100% + 2px); border: 1px solid rgb(0, 72, 199); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Lato; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Learn more</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(0, 92, 255); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(0, 92, 255); font-family: Lato; font-size: 13px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">Learn more</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(88, 255, 248); border: 0px solid rgb(0, 0, 0); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(27, 94, 100); font-family: Lato; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">UPLOAD</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(189, 255, 252); background-image: -webkit-linear-gradient(180deg, rgb(189, 255, 252) 22%, rgb(88, 255, 248) 100%); border: 0px solid rgb(0, 72, 199); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(27, 94, 100); font-family: Lato; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">UPLOAD</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(88, 255, 248); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(88, 255, 248); font-family: Lato; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">UPLOAD</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(138, 156, 169); border: 0px solid rgb(0, 0, 0); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Montserrat; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px; text-shadow: rgba(80, 91, 100, 0.5) 0px 1px 1px;">SEARCH</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(138, 156, 169); background-image: -webkit-linear-gradient(90deg, rgb(138, 156, 169) 0%, rgb(196, 208, 216) 100%); background-position: -1px -1px; background-size: calc(100% + 2px) calc(100% + 2px); border: 1px solid rgb(157, 169, 179); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Montserrat; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px; text-shadow: rgba(80, 91, 100, 0.6) 0px 1px 1px;">SEARCH</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(138, 156, 169); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(138, 156, 169); font-family: Montserrat; font-size: 12px; font-weight: 400; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">SEARCH</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(123, 199, 82); border: 0px solid rgb(0, 0, 0); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Lato; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">ADD</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(123, 199, 82); background-image: -webkit-linear-gradient(90deg, rgb(123, 199, 82) 0%, rgb(150, 214, 114) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Lato; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">ADD</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(123, 199, 82); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(123, 199, 82); font-family: Lato; font-size: 12px; font-weight: 700; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">ADD</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(255, 117, 63); border: 0px solid rgb(0, 0, 0); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Lato; font-size: 12px; font-weight: 900; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">CLOSE</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="background-color: rgb(255, 117, 63); background-image: -webkit-linear-gradient(180deg, rgb(255, 117, 63) 0%, rgb(236, 30, 104) 100%); border: 0px solid rgb(0, 0, 0); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 255, 255); font-family: Lato; font-size: 12px; font-weight: 900; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">CLOSE</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
							<div draggable="true" class="ButtonsList__buttonContainer" style="position: relative;"><div class="Button__element Button__button" style="border: 2px solid rgb(255, 117, 63); border-radius: 50px; opacity: 1; line-height: 33px;"><div class="Button__buttonLabel" contenteditable="false" style="color: rgb(255, 117, 63); font-family: Lato; font-size: 12px; font-weight: 900; font-style: normal; letter-spacing: 0px; margin-left: 0px; margin-top: 0px;">CLOSE</div></div><div class="Flag__flag Flag__premium Flag__buttons"><svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg></div></div>
						</div>
					</div>
				</div>

				<div class="side_tool_panel magic_animator">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_header">
						<span>magic animator</span>
					</div>
					<div class="tool_panel_content">
						<div class="MagicAnimatePanel__magicAnimatePanel">
							<div class="MagicAnimatePanel__subtitle">
								<span class="BaseLabel__baseLabel BaseLabel__normal BaseLabel__pureWhite">Choose an animation template to apply transitions to all the elements of the banner.</span>
							</div>
							<div class="MagicAnimatePanel__subtitle">
								<span class="BaseLabel__baseLabel BaseLabel__normal BaseLabel__semiTransparentWhite">Once applied, it will replace all your transitions settings.</span>
							</div>
							<div class="MagicAnimatePanel__presets">
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">
										<div class="MagicAnimatePanel__noneIcon"></div>
									</div>
									<div class="MagicAnimatePanel__title">None</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">A</div>
									<div class="MagicAnimatePanel__title">Alpha</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">B</div>
									<div class="MagicAnimatePanel__title">Bounce</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">C</div>
									<div class="MagicAnimatePanel__title">Cross</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">D</div>
									<div class="MagicAnimatePanel__title">Drop</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">E</div>
									<div class="MagicAnimatePanel__title">Expand</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">F</div>
									<div class="MagicAnimatePanel__title">Flip</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">G</div>
									<div class="MagicAnimatePanel__title">Grow</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">H</div>
									<div class="MagicAnimatePanel__title">Hit</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">I</div>
									<div class="MagicAnimatePanel__title">Intersect</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20">
											<path d="M0,0V20l8-4.95L16,20V0H0Z"></path>
											<polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon>
										</svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">J</div>
									<div class="MagicAnimatePanel__title">Joy</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
								<div class="MagicAnimatePanel__preset">
									<div class="MagicAnimatePanel__logo">K</div>
									<div class="MagicAnimatePanel__title">Keynote</div>
									<div class="MagicAnimatePanel__preview">
										<button class="Button__defaultButton Button__small white" style="background: rgb(255, 255, 255);">Preview</button>
									</div>
									<div class="Flag__flag Flag__premium Flag__magicAnimate">
										<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="side_tool_panel more">
					<div class="tool_panel_close"><svg x="0px" y="0px" viewBox="0 0 6 10" xml:space="preserve" height="10px"><polygon points="5,0.6 5.7,1.4 2.1,5 5.7,8.7 5,9.4 0.6,5 "></polygon></svg></div>
					<div class="tool_panel_header">
						<span>more tools</span>
					</div>
					<div class="tool_panel_content">
						<div class="moreToolsPanelContainer">
							<div class="MoreToolsPanelIconButton__moreToolsPanelIconButton" data-toggle="tooltip" data-placement="bottom" title="Add Video">
								<div class="IconButton__iconButtonOld IconButton__white" draggable="true" style="width: 75px; height: 75px;">
									<div class="BaseIcon__iconComponent BaseIcon__xlarge">
										<svg viewBox="0 0 74 60"><rect x="5" y="6" width="64" height="48" transform="translate(-5.31 8.11) rotate(-11.68)" style="fill: rgb(29, 48, 64);"></rect><rect class="add-video-rect" x="10" y="9" width="57" height="42"></rect><path d="M67,52H7V8H67V52ZM11,50H66V10H11V50Zm-2.4.2" style="fill: rgb(255, 255, 255);"></path><path d="M33,37.6V22.4L41.8,30Zm-0.4,0" style="fill: rgb(255, 255, 255);"></path><rect x="8" y="9" width="9" height="11" style="fill: rgb(49, 71, 89);"></rect><path d="M18,20H7V8H18V20ZM9,19h7V10H9v9Zm-0.4-.2" style="fill: rgb(255, 255, 255);"></path><polygon points="8 20 17 20 17 29 8 30 8 20" style="fill: rgb(49, 71, 89);"></polygon><path d="M18,31H7V18H18V31ZM9,30h7V20H9V30Zm-0.4-.4" style="fill: rgb(255, 255, 255);"></path><polygon points="8 30 17 29 17 40 8 41 8 30" style="fill: rgb(49, 71, 89);"></polygon><path d="M18,42H7V29H18V42ZM9,40h7V31H9v9Zm-0.4.4" style="fill: rgb(255, 255, 255);"></path><polygon points="8 41 17 40 17 51 8 51 8 41" style="fill: rgb(49, 71, 89);"></polygon><path d="M18,52H7V40H18V52ZM9,50h7V42H9v8Zm-0.4.2" style="fill: rgb(255, 255, 255);"></path><rect x="57" y="9" width="9" height="11" style="fill: rgb(49, 71, 89);"></rect><path d="M66,20H56V8H66V20Zm-8-1h7V10H58v9Zm-0.6-1.2" style="fill: rgb(255, 255, 255);"></path><rect x="57" y="20" width="9" height="9" style="fill: rgb(49, 71, 89);"></rect><path d="M66,30H56V18H66V30Zm-8-1h7V20H58v9Zm-0.6-.4" style="fill: rgb(255, 255, 255);"></path><rect x="57" y="29" width="9" height="11" style="fill: rgb(49, 71, 89);"></rect><path d="M66,41H56V29H66V41Zm-8-1h7V31H58v9Zm-0.6-.6" style="fill: rgb(255, 255, 255);"></path><rect x="57" y="40" width="9" height="11" style="fill: rgb(255, 255, 255);"></rect><path d="M66,52H56V40H66V52Zm-8-2h7V42H58v8Zm-0.6.2" style="fill: rgb(255, 255, 255);"></path><path d="M67,50A10,10,0,1,1,57,40,10,10,0,0,1,67,50h0Zm0,0" style="fill: rgb(88, 192, 118);"></path><polygon points="62 49 58 49 58 45 56 45 56 49 52 49 52 51 56 51 56 55 58 55 58 51 62 51 62 49" style="fill: rgb(255, 255, 255);"></polygon></svg>
									</div>
								</div>
							</div>
							<div class="MoreToolsPanelIconButton__moreToolsPanelIconButton" data-toggle="tooltip" data-placement="bottom" title="Add Embed">
								<div class="IconButton__iconButtonOld IconButton__white" draggable="true" style="width: 75px; height: 75px;">
									<div class="BaseIcon__iconComponent BaseIcon__xlarge">
										<svg viewBox="0 0 74 60"><rect x="5" y="6" width="64" height="48" transform="translate(-5.31 8.11) rotate(-11.68)" style="fill: rgb(29, 48, 64);"></rect><rect class="add-embed-rect" x="8" y="9" width="59" height="42"></rect><rect x="8" y="9" width="58" height="10" style="fill: rgb(49, 71, 89);"></rect><path d="M67,52H7V8H67V52ZM9,50H65V10H9V50Zm-0.4.2" style="fill: rgb(255, 255, 255);"></path><path d="M67,50A10,10,0,1,1,57,40,10,10,0,0,1,67,50h0Zm0,0" style="fill: rgb(88, 192, 118);"></path><polygon points="62 49 58 49 58 45 56 45 56 49 52 49 52 51 56 51 56 55 58 55 58 51 62 51 62 49" style="fill: rgb(255, 255, 255);"></polygon><rect x="8" y="18" width="57" height="2" style="fill: rgb(255, 255, 255);"></rect><rect x="12" y="13" width="6" height="2" style="fill: rgb(255, 255, 255);"></rect><rect x="60" y="13" width="2" height="2" style="fill: rgb(255, 255, 255);"></rect><rect x="55" y="13" width="2" height="2" style="fill: rgb(255, 255, 255);"></rect><rect x="50" y="13" width="2" height="2" style="fill: rgb(255, 255, 255);"></rect><polygon points="46.55 41.86 45.25 40.34 51.45 35 45.25 29.66 46.55 28.14 54.52 35 46.55 41.86" style="fill: rgb(255, 255, 255);"></polygon><polygon points="27.45 41.86 19.48 35 27.45 28.14 28.75 29.66 22.55 35 28.75 40.34 27.45 41.86" style="fill: rgb(255, 255, 255);"></polygon><rect x="26.6" y="34" width="20.81" height="2" transform="translate(-8.54 57.8) rotate(-70.01)" style="fill: rgb(255, 255, 255);"></rect></svg>
									</div>
								</div>
								<div class="Flag__flag Flag__premium Flag__more">
									<svg viewBox="0 0 16 20"><path d="M0,0V20l8-4.95L16,20V0H0Z"></path><polygon points="8 3.54 9.27 6.47 12.44 6.77 10.05 8.88 10.75 12 8 10.37 5.25 12 5.95 8.88 3.56 6.77 6.74 6.47 8 3.54"></polygon></svg>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="canvas_container" class="tab_layer">
				<div class="Stage__stageMenu">
					<div class="StageMenu__stageMenu">
						<div class="Bar__container Bar__grey" style="padding: 10px;">
							<div class="Bar__left">
								<div class="StageMenu__addFileButton">
									<div class="IconLabelFileReader__addFilesButton">
										<div class="IconLabelButton__iconLabelButtonOld stageMenu IconLabelButton__addFiles normal IconLabelButton__activeGrey IconLabelButton__uppercase IconLabelButton__noWrap">
											<svg viewBox="0 0 18 18"><g><path d="M16,0 L2,0 C0.89,0 0,0.9 0,2 L0,16 C0,17.1 0.89,18 2,18 L16,18 C17.1,18 18,17.1 18,16 L18,2 C18,0.9 17.1,0 16,0 Z M14,10 L10,10 L10,14 L8,14 L8,10 L4,10 L4,8 L8,8 L8,4 L10,4 L10,8 L14,8 L14,10 Z"></path></g></svg>
											<span class="BaseLabel__baseLabel BaseLabel__normal BaseLabel__blue">Add Image</span>
											<div class="IconLabelButton__selectedBorder"></div>
										</div>
										<input type="file" class="IconLabelFileReader__fileInput" accept="image/jpg,image/jpeg,image/png,image/gif,image/svg+xml" multiple="" value="">
									</div>
								</div>
							</div>
							<div class="Bar__center">
								<div class="StageMenu__center">
									<div class="UndoRedo__undoRedoContainer">
										<div id="btn_undo" class="IconButton__iconButton IconButton__darkGrey IconButton__xlarge tool_tip_black IconButton__disabled" data-toggle="tooltip" data-placement="bottom" title="Undo">
											<div class="IconButton__cont">
												<div class="Icon__iconComponent Icon__large Icon__block Icon__white">
													<svg viewBox="0 0 24 24"><g stroke="none" stroke-width="1" fill-rule="evenodd"><path d="M12.2589155,8 C9.66976063,8 7.32486566,8.99 5.51734245,10.6 L2,7 L2,16 L10.7933561,16 L7.25647289,12.38 C8.61455789,11.22 10.3439179,10.5 12.2589155,10.5 C15.7176356,10.5 18.6585247,12.81 19.6844162,16 L22,15.22 C20.641915,11.03 16.8021495,8 12.2589155,8 Z" id="Shape"></path></g></svg>
												</div>
											</div>
										</div>
										<div id="btn_redo" class="IconButton__iconButton IconButton__darkGrey IconButton__xlarge IconButton__disabled tool_tip_black" data-toggle="tooltip" data-placement="bottom" title="Redo">
											<div class="IconButton__cont">
												<div class="Icon__iconComponent Icon__large Icon__block Icon__white">
													<svg viewBox="0 0 24 24"><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><path d="M12.2589155,8 C9.66976063,8 7.32486566,8.99 5.51734245,10.6 L2,7 L2,16 L10.7933561,16 L7.25647289,12.38 C8.61455789,11.22 10.3439179,10.5 12.2589155,10.5 C15.7176356,10.5 18.6585247,12.81 19.6844162,16 L22,15.22 C20.641915,11.03 16.8021495,8 12.2589155,8 Z" transform="translate(12.000000, 11.500000) scale(-1, 1) translate(-12.000000, -11.500000) "></path></g></svg>
												</div>
											</div>
										</div>
									</div>
									<div class="StageMenu__iconBorder"></div>
									<div class="StageMenu__iconDiv">
										<div class="PlayButton__playButton">
											<div class="PlayButton__principalButton">
												<div class="PlayButton__iconAndLabel tool_tip_black" data-toggle="tooltip" data-placement="bottom" title="Play">
													<div class="PlayButton__icon">
														<div class="Icon__iconComponent Icon__large noSkin">
															<svg width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15V7l6 5-6 5z"></path></svg>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="Bar__right">
								<div class="StageMenu__saveFileButton">
									<div class="SaveButton__saveButton SaveButton__medium SaveButton__green">
										<div class="SaveButton__normalState SaveButton__green">
											<div class="SaveButton__principalButton SaveButton__hasDropdown">
												<div class="SaveButton__icon">
													<div class="Icon__iconComponent Icon__medium Icon__white">
														<svg class="save-svg"><g><g><path d="M14,0 L2,0 C0.89,0 0,0.9 0,2 L0,16 C0,17.1 0.89,18 2,18 L16,18 C17.1,18 18,17.1 18,16 L18,4 L14,0 Z M9,16 C7.34,16 6,14.66 6,13 C6,11.34 7.34,10 9,10 C10.66,10 12,11.34 12,13 C12,14.66 10.66,16 9,16 Z M12,6 L2,6 L2,2 L12,2 L12,6 Z" id="Shape"></path></g></g></svg>
													</div>
												</div>
												<div class="SaveButton__label">
													<span class="BaseLabel__baseLabel BaseLabel__medium BaseLabel__pureWhite">Save</span>
												</div>
											</div>
											<div class="SaveButton__arrowContainer SaveButton__green">
												<div class="SaveButton__arrowDown"></div>
											</div>
											<div class="SaveButton__dropdown">
												<div class="SaveButton__element SaveBanner">
													<span class="BaseLabel__baseLabel BaseLabel__normal BaseLabel__darkGrey">Save as</span>
												</div>
												<div class="SaveButton__element SaveStatic">
													<span class="BaseLabel__baseLabel BaseLabel__normal BaseLabel__darkGrey">Save as static template</span>
												</div>
												<div class="SaveButton__element SaveAnimated">
													<span class="BaseLabel__baseLabel BaseLabel__normal BaseLabel__darkGrey">Save as animated template</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="SlidesAndLayers__toggleButton">
								<span class="SlidesAndLayers__arrowIcon">
									<svg class='arrow_right' width="24px" height="24px" viewBox="0 0 24 24"><g><polygon points="7.41 9 12 13.58 16.59 9 18 10.41 12 16.41 6 10.41"></polygon></g></svg>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div id="layer_slide_container">
					<div class="SlidesAndLayers__slidesAndLayersHeader">
						<div class="SlidesAndLayers__tabs">
							<div class="TabsMenuSwitch__tabsContainer TabsMenuSwitch__large TabsMenuSwitch__grey TabsMenuSwitch__topLine">
								<div class="TabsMenuSwitch__select"></div>
								<div class="TabsMenuSwitch__tab tab-layers">
									<div class="TabsMenuSwitch__icon">
										<div class="Icon__iconComponent Icon__large">
											<svg width="24" height="24" viewBox="0 0 24 24"><g fill-rule="evenodd"><g><path d="M11.929 3l9.928 4.964-9.928 4.965L2 7.964 11.929 3zm7.928 7.964l2 1-9.928 4.965L2 11.964l2-1 7.929 3.965 7.928-3.965zm0 4l2 1-9.928 4.965L2 15.964l2-1 7.929 3.965 7.928-3.965z"></path></g></g></svg>
										</div>
									</div>
									<span class="TabsMenuSwitch__label TabsMenuSwitch__isUppercase">Layers</span>
								</div>
								<div class="TabsMenuSwitch__tab tab-slides">
									<div class="TabsMenuSwitch__icon">
										<div class="Icon__iconComponent Icon__large">
											<svg width="24px" height="24px" viewBox="0 0 24 24"><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><path d="M2,17 C2,17.55 2.45,18 3,18 L21,18 C21.55,18 22,17.55 22,17 L22,7 C22,6.45 21.55,6 21,6 L3,6 C2.45,6 2,6.45 2,7 L2,17 Z M10,8 L16,12 L10,16 L10,8 Z M6,4 L4,4 L4,3 C4,2.45 4.45,2 5,2 L19,2 C19.55,2 20,2.45 20,3 L20,4 L18,4 L6,4 Z M4,20 L6,20 L18,20 L20,20 L20,21 C20,21.55 19.55,22 19,22 L5,22 C4.45,22 4,21.55 4,21 L4,20 Z"></path></g></svg>
										</div>
									</div>
									<span class="TabsMenuSwitch__label TabsMenuSwitch__isUppercase">Slides</span>
								</div>
							</div>
						</div>
					</div>

					<div class="SlidesAndLayers__slidesHeader">
						<div class="SlidesAndLayers__iconAndText">
							<div class="Icon__iconComponent Icon__large Icon__grey">
								<svg width="24px" height="24px" viewBox="0 0 24 24"><g id="Symbols" stroke="none" stroke-width="1" fill-rule="evenodd"><path d="M2,17 C2,17.55 2.45,18 3,18 L21,18 C21.55,18 22,17.55 22,17 L22,7 C22,6.45 21.55,6 21,6 L3,6 C2.45,6 2,6.45 2,7 L2,17 Z M10,8 L16,12 L10,16 L10,8 Z M6,4 L4,4 L4,3 C4,2.45 4.45,2 5,2 L19,2 C19.55,2 20,2.45 20,3 L20,4 L18,4 L6,4 Z M4,20 L6,20 L18,20 L20,20 L20,21 C20,21.55 19.55,22 19,22 L5,22 C4.45,22 4,21.55 4,21 L4,20 Z"></path></g></svg>
							</div>
							<div class="SlidesAndLayers__text">Slides</div>
						</div>
						<div class="SlidesAndLayers__duration">9.1 s / -</div>
					</div>

					<div id="slide_container">

						<div id="slide_content">

							<div class="Slides__slidesList"></div>

							<div class="Slides__addNewSlide" data-original-title="" title="">
								<div class="Icon__iconComponent Icon__lmedium Icon__darkGrey">
									<svg width="40px" height="40px" viewBox="0 0 40 40"><g stroke="none" stroke-width="1" fill-rule="evenodd" fill-opacity="0.8"><g transform="translate(-310.000000, -260.000000)"><g transform="translate(-481.000000, 57.000000)"><g transform="translate(741.000000, 163.000000)"><g><g><path d="M71,58 L71,40 L68,40 L68,58 L50,58 L50,61 L68,61 L68,80 L71,80 L71,61 L90,61L90,58 L71,58 Z"></path></g></g></g></g></g></g></svg>
								</div>
							</div>
						</div>

						<div class="SlidesAndLayers__loopCountZone">
							<span class="BaseLabel__baseLabel BaseLabel__normal BaseLabel__darkGrey BaseLabel__whiteSpace">Loop count<sup data-original-title="" title=""> ?</sup></span>
							<div tabindex="0" data-allow-shortcuts="false" class="Select__selectComponent" style="width: 100px;">
								<div class="Select__select darkGrey normal">
									<select class="input_banner_loop" style="width: 100%; height: 100%;">
										<option value="1">Once</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="forever">Forever</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div id="layer_slide_tabs">
						<div class="hide_timeline_toggle">
							<div class="Icon__iconComponent Icon__large">
								<svg width="24" height="24" viewBox="0 0 24 24"><path id="a" d="M15 18v-3H1v3h14zm4-5v-3H5v3h14zm4-5V5H9v3h14z"></path></svg>
							</div>
						</div>
					</div>
				</div>

				<div id="canvas_area">
					<div id="canvas_content">
						<div class="banner_area">
							<div class="banner_background"></div>
						</div>
						<div id="banner_out_area">
						</div>
						<div id="banner_hover">
							<div class="layer_hover" layer='layer_1' style="width: 200px; height: 400px;"></div>
						</div>
					</div>
				</div>

				<div class="Timeline__resizeBar">
					<div class="Icon__iconComponent Icon__medium Icon__lightGrey">
						<svg width="24px" height="24px" viewBox="0 0 24 24"><defs></defs><g id="moreSmall-svg" stroke="none" stroke-width="1" fill-rule="evenodd"><path d="M6,11 L8,11 L8,13 L6,13 L6,11 Z M11,11 L13,11 L13,13 L11,13 L11,11 Z M16,11 L18,11 L18,13 L16,13 L16,11 Z" id="Combined-Shape"></path></g></svg>
					</div>
				</div>

				<div id="layer_container">
					<div class="layer_content">
						<div class="Timeline__layersHeader">
							<div class="Timeline__title"><div class="Timeline__layersIcon"><div class="Icon__iconComponent Icon__large Icon__white"><svg width="24" height="24" viewBox="0 0 24 24"><g fill-rule="evenodd"><g><path d="M11.929 3l9.928 4.964-9.928 4.965L2 7.964 11.929 3zm7.928 7.964l2 1-9.928 4.965L2 11.964l2-1 7.929 3.965 7.928-3.965zm0 4l2 1-9.928 4.965L2 15.964l2-1 7.929 3.965 7.928-3.965z"></path></g></g></svg></div></div><span>Timeline</span><div class="Timeline__betaBadge"><div class="Badge__badge Badge__orange Badge__xsmall">BETA</div></div></div><div id="playSlideButton" class="PlaySlide__playButton" data-original-title="" title=""><svg viewBox="0 0 42 42" height="14px"><path d="M36.068 20.176l-29-20A1 1 0 1 0 5.5.999v40a1 1 0 0 0 1.568.823l29-20a.999.999 0 0 0 0-1.646z"></path></svg></div>
						</div>
						<div class="LayersList__layerListContainer LayersList__withPadding">
							<ul class="LayersList__sortableList">
							</ul>
						</div>
					</div>
					<div id="timeline_container">
						<div class="Ruler__rulerContainer">
							<div class="Ruler__inner" style="left: 0px;">
								<div class="Ruler__bannerDuration" style="left: 0px; width: 300px;">
									<span class="Ruler__separator"></span>
								</div>
								<div class="Ruler__unitsContainer">
									<span class="Ruler__unitLine" data-unit="sec." style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="1" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="2" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="3" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="4" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="5" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="6" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="7" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="8" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="9" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="10" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="11" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="12" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="13" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="14" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="15" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="16" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="17" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="18" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="19" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__unitLine" data-unit="20" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
									<span class="Ruler__divisionLine" style="margin-right: 14px;"></span>
								</div>
							</div>
						</div>

						<div class="transition_container">
							<div class="transition_wrapper" layer='layer_1'>
								<div class="transition_transition">
									<div class="first_transition" animation_name='Fade'>
										<span>Fade</span>
									</div>
									<div class="last_transition"></div>
								</div>
							</div>
							<div class="transition_wrapper" layer='layer_2'>
								<div class="transition_transition">
									<div class="first_transition" animation_name='Fade'>
										<span>Fade</span>
									</div>
									<div class="last_transition"></div>
								</div>
							</div>
							<div id="ruler_progress"></div>
						</div>
					</div>
				</div>

				<div id="select_tool">
					<div id="select_tool_menu">
					</div>
					<div id="select_tool_panel">
					</div>
				</div>

				<div id="animation_tool"><div class="amination_panel"></div></div>

				<div id="canvas_scale_panel">
					<span id="canvas_scale_down" draggable='false'>-</span>
					<input id="canvas_scale" type="range" min="20" max="200" value="100">
					<span id="canvas_scale_up" draggable='false'>+</span>
				</div>

				<div id="transition_tool" style="position: absolute; z-index: 30000; width: 230px; right: 0; top: 150px;"></div>
			</div>
		</div>

	</div>

<!-- Modal -->
<div id="preview_banner" class="modal fade" role="dialog" style="z-index: 20000;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Preview</h4>
      </div>
      <div class="modal-body">
      	<div id="preview_container" style="width: fit-content; height: fit-content; margin: 0 auto;"></div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" id="preview_replay">Replay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="delete_modal" class="modal fade" role="dialog" style="z-index: 20000;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-body">
      	<p>You are about to remove banners from our servers.</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" banner_id='0' id="delete_banner_btn">Delete</button>
        <button type="button" class="btn btn-default cancel_btn" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="embed_modal" class="modal fade" role="dialog" style="z-index: 20000;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Embed code</h4>
      </div>
      <div class="modal-body">
      	<p style="color: rgb(46, 50, 70); font-size: 14px; user-select: none; font-weight: 700;">Use the code below to embed your banner:</p>
      	<textarea rows="8" style="width: 100%; max-width: 100%; min-width: 100%;"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>

<div id="save_modal" class="modal fade" role="dialog" style="z-index: 20000;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Save your banner</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<div class="container-fluid">
				<div class='row'>
					<div class="col-md-12">
						<input class="input_banner_name form-control" type="text" placeholder="Banner Name">
						<input class="input_banner_type form-control hidden" type="text" placeholder="Banner Type">
					</div>
				</div>
				<div class="row" style="margin-top: 15px;">
					<div class="col-md-9">
						<input class="input_banner_url form-control" type="text" placeholder="Banner URL (http://www.example.com)">
					</div>
					<div class="col-md-3">
						<select class="form-control" class="input_banner_anchor">
							<option value="_blank">_blank</option>
							<option value="_self">_self</option>
							<option value="_parent">_parent</option>
							<option value="_top">_top</option>
						</select>
					</div>
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button id="cancel_btn" type="button" class="btn btn-default cancel_btn" data-dismiss="modal">Cancel</button>
        <button id="banner_save_btn" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div id="save_template_modal" class="modal fade" role="dialog" style="z-index: 20000;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Save your template</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<div class="container-fluid">
				<div class='row'>
					<div class="col-md-12">
						<input class="input_banner_name form-control" type="text" placeholder="Banner Name">
						<input class="input_banner_type form-control hidden" type="text" placeholder="Banner Type">
					</div>
				</div>
				<div class="row" style="margin-top: 15px;">
					<div class="col-md-9">
						<input class="input_banner_url form-control" type="text" placeholder="Banner URL (http://www.example.com)">
					</div>
					<div class="col-md-3">
						<select class="form-control" class="input_banner_anchor">
							<option value="_blank">_blank</option>
							<option value="_self">_self</option>
							<option value="_parent">_parent</option>
							<option value="_top">_top</option>
						</select>
					</div>
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel_btn" data-dismiss="modal">Cancel</button>
        <button id="template_save_btn" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div id="rename_modal" class="modal fade" role="dialog" style="z-index: 20000;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rename</h4>
      </div>
      <div class="modal-body">
      	<p>Please enter a new name for this banner:</p>
		<div class="form-group">
			<input type="hidden" class='input_banner_id'>
			<input class="input_banner_title form-control" type="text" placeholder="Banner Name">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel_btn" data-dismiss="modal">Cancel</button>
        <button id="banner_rename_btn" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
function customSelect(selector) {
	var x, i, j, selElmnt, a, b, c;
	x = document.getElementsByClassName(selector);
	for (i = 0; i < x.length; i++) {
	  selElmnt = x[i].getElementsByTagName("select")[0];
	  a = document.createElement("DIV");
	  a.setAttribute("class", "select-selected");
	  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	  x[i].appendChild(a);
	  b = document.createElement("DIV");
	  b.setAttribute("class", "select-items select-hide");
	  for (j = 0; j < selElmnt.length; j++) {
	    c = document.createElement("DIV");
	    c.innerHTML = selElmnt.options[j].innerHTML;
	    c.addEventListener("click", function(e) {
	        var y, i, k, s, h;
	        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
	        h = this.parentNode.previousSibling;
	        for (i = 0; i < s.length; i++) {
	          if (s.options[i].innerHTML == this.innerHTML) {
	            s.selectedIndex = i;
	            h.innerHTML = this.innerHTML;
	            y = this.parentNode.getElementsByClassName("same-as-selected");
	            for (k = 0; k < y.length; k++) {
	              y[k].removeAttribute("class");
	            }
	            this.setAttribute("class", "same-as-selected");
	            break;
	          }
	        }
	        h.click();
	    });
	    b.appendChild(c);
	  }
	  x[i].appendChild(b);
	  a.addEventListener("click", function(e) {
	      e.stopPropagation();
	      closeAllSelect(this);
	      this.nextSibling.classList.toggle("select-hide");
	      this.classList.toggle("select-arrow-active");
	    });
	}
	function closeAllSelect(elmnt) {
	  var x, y, i, arrNo = [];
	  x = document.getElementsByClassName("select-items");
	  y = document.getElementsByClassName("select-selected");
	  for (i = 0; i < y.length; i++) {
	    if (elmnt == y[i]) {
	      arrNo.push(i)
	    } else {
	      y[i].classList.remove("select-arrow-active");
	    }
	  }
	  for (i = 0; i < x.length; i++) {
	    if (arrNo.indexOf(i)) {
	      x[i].classList.add("select-hide");
	    }
	  }
	}
	document.addEventListener("click", closeAllSelect);
}
customSelect('category_select');
</script>
</body>
<link rel="stylesheet" href="src/vendor/font-awesome.min.css">
<script type="text/javascript">
	var user_id = <?php echo $_SESSION['id']; ?>;
	var base_url = "<?php echo base_url(); ?>";
	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>', csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
<script src="<?php echo base_url();?>src/vendor/jquery.min.js"></script>
<script src="<?php echo base_url();?>src/vendor/jquery-ui.js"></script>
<script src="<?php echo base_url();?>src/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>src/interact.min.js"></script>
<script src="<?php echo base_url();?>src/vendor/html2canvas.min.js"></script>
<script src="<?php echo base_url();?>src/vendor/gifshot.min.js"></script>
<script src="<?php echo base_url();?>src/vendor/whammy.js"></script>
<script src="<?php echo base_url();?>src/vendor/ga.js"></script>
<script src="<?php echo base_url();?>src/vendor/jszip.min.js"></script>
<script src="<?php echo base_url();?>src/main.js"></script>
</html>

<?php

$googlefonts = array('ABeeZee', 'Abel', 'Abhaya Libre', 'Abril Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent Pro', 'Aguafina Script', 'Akronim', 'Aladin', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya SC', 'Alegreya Sans', 'Arbutus Slab', 'Archivo', 'Archivo Black', 'Archivo Narrow', 'Aref Ruqaa', 'Arima Madurai', 'Arimo', 'Arizonia', 'Armata', 'Arsenal', 'Artifika', 'Arvo', 'Arya', 'Asap', 'Asap Condensed', 'Asar', 'Asset', 'Assistant', 'Astloch', 'Asul', 'Athiti', 'Atma', 'Atomic Age', 'Aubrey', 'Audiowide', 'Autour One', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Bad Script', 'Bahiana', 'Baloo', 'Baloo Bhai', 'Baloo Bhaijaan', 'Baloo Bhaina','Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buenard', 'Bungee', 'Bungee Hairline', 'Bungee Inline', 'Bungee Outline', 'Bungee Shade', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Cabin Sketch', 'Caesar Dressing', 'Cagliostro', 'Cairo', 'Calligraffitti', 'Cambay', 'Cambo', 'Candal', 'Cantarell', 'Cantata One', 'Cantora One', 'Capriola', 'Cardo', 'Carme', 'Carrois Gothic', 'Carrois Gothic SC', 'Carter One', 'Cormorant Garamond', 'Cormorant Infant', 'Days One', 'Dekko', 'Delius', 'Delius Swash Caps', 'Delius Unicase', 'Della Respira', 'Denk One', 'Devonshire', 'Dhurjati', 'Didact Gothic', 'Diplomata', 'Diplomata SC', 'Do Hyeon', 'Dokdo', 'Domine', 'EB Garamond', 'Eagle Lake', 'East Sea Dokdo', 'Eater', 'Economica', 'Eczar', 'El Messiri', 'Electrolize', 'Elsie', 'Elsie Swash Caps', 'Emblema One', 'Emilys Candy', 'Encode Sans', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fanwood Text', 'Farsan', 'Fascinate', 'Fascinate Inline', 'Gaegu', 'Gafata', 'Galada', 'Galdeano', 'Galindo', 'Gamja Flower', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gidugu', 'Gilda Display', 'Give You Glory', 'Glass Antiqua', 'Glegoo', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Gudea', 'Gugi', 'Gurajada', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Harmattan', 'Homenaje', 'IBM Plex Mono', 'IBM Plex Sans', 'IBM Plex Sans Condensed', 'IBM Plex Serif', 'IM Fell DW Pica', 'IM Fell DW Pica SC', 'IM Fell Double Pica', 'Italiana', 'Italianno', 'Itim', 'Jacques Francois', 'Jacques Francois Shadow', 'Jaldi', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Jomhuria', 'Junge', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kadwa', 'Kalam', 'Kameron', 'Kanit', 'Kantumruy', 'Karla', 'Karma', 'Katibeh', 'Kite One', 'Knewave', 'Kotta One', 'Koulen', 'Kranky', 'Kreon', 'Kristi', 'Krona One', 'Kumar One', 'Kumar One Outline', 'Kurale', 'La Belle Aurore', 'Laila', 'Lakki Reddy', 'Lalezar', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Lovers Quarrel', 'Luckiest Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo Swash Caps', 'Mada', 'Magra', 'Monda', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Nanum Myeongjo', 'Nunito', 'Nunito Sans', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original Surfer', 'Oswald', 'Over the Rainbow', 'Overlock', 'Overlock SC', 'Overpass', 'Overpass Mono', 'Ovo', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans', 'PT Sans Caption', 'PT Sans Narrow', 'PT Serif', 'PT Serif Caption', 'Pacifico', 'Padauk', 'Palanquin', 'Palanquin Dark', 'Pangolin', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Patrick Hand', 'Patrick Hand SC', 'Pattaya', 'Patua One', 'Pavanam', 'Paytone One', 'Peddana', 'Peralta', 'Permanent Marker', 'Petit Formal Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Play', 'Playball', 'Playfair Display', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Poor Story', 'Rosarivo', 'Rouge Script', 'Rozha One', 'Rubik', 'Rubik Mono One', 'Ruda', 'Rufina', 'Ruge Boogie', 'Ruluko', 'Rum Raisin', 'Ruslan Display', 'Russo One', 'Ruthie', 'Rye', 'Sacramento', 'Sahitya', 'Sail', 'Saira', 'Saira Condensed', 'Saira Extra Condensed', 'Saira Semi Condensed', 'Sofia', 'Song Myung', 'Sonsie One', 'Sorts Mill Goudy', 'Source Code Pro', 'Source Sans Pro', 'Source Serif Pro', 'Space Mono', 'Special Elite', 'Spectral', 'Spectral SC', 'Spicy Rice', 'Spinnaker', 'Spirax', 'Squada One', 'Sree Krushnadevaraya', 'Sriracha', 'Stalemate', 'Taviraj', 'Teko', 'Telex', 'Tenali Ramakrishna', 'Tenor Sans', 'Text Me One', 'The Girl Next Door', 'Tienne', 'Tillana', 'Timmana', 'Tinos', 'Titan One', 'Titillium Web', 'Trade Winds', 'Trirong', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen One', 'Ubuntu', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncial Antiqua', 'Underdog', 'Unica One', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro One', 'Varela', 'Varela Round', 'Vast Shadow', 'Vesper Libre', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Vollkorn SC', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Warnes', 'Wellfleet', 'Wendy One', 'Wire One', 'Work Sans', 'Yanone Kaffeesatz', 'Yantramanav', 'Yatra One', 'Yellowtail', 'Yeon Sung', 'Yeseva One', 'Yesteryear', 'Yrsa', 'Zeyada', 'Zilla Slab', 'Zilla Slab Highlight');

for ($i = 0; $i < count($googlefonts); $i++) {
	echo "<link href='https://fonts.googleapis.com/css?family=".$googlefonts[$i]."' rel='stylesheet'>";
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<? if ($why = get_field('why_group')['why_repeater']): ?>
		<style>
		<? $i=1; foreach ($why as $item): ?>
		
		.hvastalka .item:nth-of-type(<?=$i?>) .icon {		
			background-image: url("<?=$item['why_sub_group']['image']?>");
			transition: all 0.3s ease-in-out;
		}


		.hvastalka .item:nth-of-type(<?=$i?>) .icon:hover {		
			background-image: url("<?=$item['why_sub_group']['image_active']?>");
			background-color: #CFF1FF !important;	
			box-shadow: 5px 5px 20px 0 rgba(75,101,129,0.4) !important;
			cursor: pointer;
			transition: all 0.3s ease-in-out;			
		}

		.hvastalka .item:nth-of-type(<?=$i?>) .title:hover ~ .icon {
			background-image: url("<?=$item['why_sub_group']['image_active']?>");
			background-color: #CFF1FF !important;	
			box-shadow: 5px 5px 20px 0 rgba(75,101,129,0.4) !important;
			transition: all 0.3s ease-in-out;
		}

		.iconHoveClass_<?=$i?> {
			background-image: url("<?=$item['why_sub_group']['image_active']?>") !important;
			background-color: #CFF1FF !important;	
			box-shadow: 5px 5px 20px 0 rgba(75,101,129,0.4) !important;
			cursor: pointer !important;
			transition: all 0.3s ease-in-out !important;
		}

/*
		.borderSolidContainer_<=$i?> {

		}

		.borderSolidTriangle_<=$i?> {

		}*/


		<? $i++; endforeach; ?>

		.borderSolidContainer_1 { border-top: 2px solid #08005A !important; }
		.borderSolidTriangle_1 { border-left: 2px solid #08005A !important; }

		.borderSolidContainer_2 { border-top: 2px solid #08005A !important; }
		.borderSolidTriangle_2 {  border-left: 2px solid #08005A !important; }

		.borderSolidContainer_3 {  border-top : 2px solid #08005A !important; }
		.borderSolidTriangle_3 {  border-top : 2px solid #08005A !important; }

		.borderSolidContainer_4 {  border-top : 2px solid #08005A !important; }
		.borderSolidTriangle_4 {  border-top : 2px solid #08005A !important; }

		.borderSolidContainer_5 {  border-bottom : 2px solid #08005A !important; }
		.borderSolidTriangle_5 {  border-right : 2px solid #08005A !important; }

		.borderSolidContainer_6 {  border-top : 2px solid #08005A !important; }
		.borderSolidTriangle_6 {  border-left : 2px solid #08005A !important; }

		.borderSolidContainer_7 {  border-top : 2px solid #08005A !important; }
		.borderSolidTriangle_7 {  border-top : 2px solid #08005A !important; }

		.borderSolidContainer_8 {  border-top : 2px solid #08005A !important; }
		.borderSolidTriangle_8 {  border-right : 2px solid #08005A !important; }												

		</style>
	<? endif; ?>
	
	<script>
		<? if (!get_img_path()): ?>
			glob_slides_img = ["<?=get_template_directory_uri()?>/img/bg_foto_splash.png"]; glob_effect = "hide";
		<? elseif (count(get_img_path()) == 1): ?>
			glob_slides_img = <?=json_encode(get_img_path()); ?>; glob_effect = "hide";		
		<? else: ?>	
			glob_slides_img = <?=json_encode(get_img_path()); ?>; glob_effect = "clip";
		<? endif; ?>
		
		glob_read_more = '<?=(get_field('read_more_group')['read_more'] ?? 'Read more')?>'; 
		glob_show_less = '<?=(get_field('read_more_group')['show_less'] ?? 'Show less')?>';
		glob_file_select = '<?=(get_field('contacts_group')['form_fields_group']['no_file_selected'] ?? 'File not selected')?>';
		glob_address = '<?=(get_field('contacts_group')['address'] ?? '120 Nan Shi St. New Taipei City. Linkou. Taiwan, 24441')?>';
		glob_read_more_procc = '<?=(get_field('learn_more_about_process') ?? 'Learn More About Process')?>';

		// широта и долгота для карты(из админки)
		glob_lat = '<?=(get_coordinate()['lat'] ?? '25.074448')?>';
		glob_lng = '<?=(get_coordinate()['lng'] ?? '121.363022')?>';


	</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZoV8o7zh0ostbnkJekaf72VZs-RF1z6c">
</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="my-page">
		<div id="my-header">
			<header class="site-header">
				<div class="menu-full" id="menu-full">
					<div class="wrapper">
						<div class="menu-block" id="menu">
		 						<h1 class="logo">
								    <a href="/"
								    	<?php if (get_field('logo')['image']) echo "style='background: url(" . get_field('logo')['image'] . ") no-repeat; width: " . getimagesize(get_field('logo')['image'])[0] .  "px; height: " . getimagesize(get_field('logo')['image'])[1] . "px;'"?> 
								    >
								    	<?=(get_field('logo')['title'] ?? '')?>
								    </a>
								</h1>						
		 						<div class="menu">
									<? if ($menu_items = get_field('items')): ?>
										<nav>
											<ul>
												<li class="home">
													<a class="fa fa-home active" href="/"></a>
												</li>
												<? foreach($menu_items as $item): ?>
													<li class="item">
														<a href="#<?=$item['block_name']?>">
															<?=$item['item_name']?>
														</a>
													</li>
												<? endforeach; ?>
											</ul>	
										</nav>
									<? endif; ?>							
								</div> 
		 						<div class="btn-block">
									<a href="#contacts" class="btn btn-light">
										<?=(get_field('contact_us_now') ?? '')?>									
									</a>							
								</div>
						</div>
					</div>
				</div>
				<div id="change-bg" class="slider-full">
					<div class="wrapper">
						<div class="slider-block">
							<div class="slider">
								<? if ($sliders = get_field('slider_repeater')): ?>
									<?php  ?>
									    <div class="quotes">
										    <div class="quote-dots"></div>
											    <div class="quote-contain">																
											 		<? foreach($sliders as $slide): ?>
											 			<div class="quote-rotate">
											 				<?=($slide['slider_group']['text'] ?? '')?>
											 			</div>
											 		<? endforeach; ?>
								 				</div>
								 		</div>
							 	<? endif; ?>													
										<a href="#contacts" class="btn btn-bg">
											<?=(get_field('contact_us_now') ?? '')?>									
										</a>
										<div class="syntel-bg">syntelect</div>								 		
							</div>
						</div>
					</div>
				</div>
			</header>			
		</div>
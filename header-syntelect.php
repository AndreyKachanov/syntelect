<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<? if (!get_img_path()): ?>
		<script> glob_slides_img = ["<?=get_template_directory_uri()?>/img/bg_foto_splash.png"]; glob_effect = "hide";</script>
	<? elseif (count(get_img_path()) == 1): ?>
		<script> glob_slides_img = <?=json_encode(get_img_path()); ?>; glob_effect = "hide";</script>		
	<? else: ?>	
		<script> glob_slides_img = <?=json_encode(get_img_path()); ?>; glob_effect = "clip";</script>
	<? endif; ?>
	


	<script> glob_read_more = '<?=(get_field('read_more_group')['read_more'] ?? 'Read more')?>'; </script>
	<script> glob_show_less = '<?=(get_field('read_more_group')['show_less'] ?? 'Show less')?>'; </script>

	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="my-page">
		<div id="my-header">
			<header class="site-header">
				<div class="menu-full" id="menu-full">
					<div class="wrapper">
						<div class="menu-block" id="menu">
							<!-- <div class="menu-wrap"> -->
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
							<!-- </div>									 -->
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
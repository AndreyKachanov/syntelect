<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

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
				<div id="change-bg" class="slider-full" 
					<?php if (get_field('slider_repeater')[0]['slider_group']['image']) echo "style='background-image: url(" . get_field('slider_repeater')[0]['slider_group']['image'] . ");'"; 
					?> 
				>
					<div class="wrapper">
						<div class="slider-block">
							<div class="slider">
								<? if ($sliders = get_field('slider_repeater')): ?>
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
		<div id="my-content">
			<div id="about"></div>
			<div id="why"></div>
			<div id="services"></div>
			<div id="process"></div>
					
		</div>		
		<div id="my-footer">
			<div id="contacts"></div>			
		</div>
	</div>





<!-- 	<ul>
		<li><a class="fa fa-home active" href="/"></a></li>
	</ul> -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'syntelect' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'syntelect' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

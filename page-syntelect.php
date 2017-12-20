<?php
/**
 * Template name: Syntelect
*/
get_header('syntelect'); ?>

		<div id="my-content">
			<section id="about" class="about">
				<div class="wrapper">
					<div class="about-content">
						<h2 class="h2"><?=(get_field('about_group')['title'] ?? '')?></h2>
						<h3 class="h3"><?=(get_field('about_group')['sub_title'] ?? '')?></h3>
						<div id="readmore" class="content"><?=(get_field('about_group')['text'] ?? '')?></div>
					</div>
				</div>
			</section>
			<div id="why">why</div>
			<div id="services">services</div>
			<div id="process">process</div>
					
		</div>


<?php
get_footer('syntelect');
<?php
/**
 * Template name: Syntelect
*/
get_header('syntelect'); ?>

		<div id="my-content">
			<section id="about" class="about">
				<div class="wrapper">
					<div class="about-content">
						<h2 class="h2"><?=(get_field('about_group')['title'] ?? 'About Us')?></h2>
						<h3 class="h3"><?=(get_field('about_group')['sub_title'] ?? '')?></h3>
						<div id="readmore" class="content"><?=(get_field('about_group')['text'] ?? '')?></div>
					</div>
				</div>
			</section>
			<section id="why" class="why">
				<div class="wrapper">
					<div class="why-content">
						<h2 class="h2"><?=(get_field('why_group')['title'] ?? 'Why Choose Us')?></h2>
						<h3 class="h3"><?=(get_field('why_group')['sub_title'] ?? '')?></h3>
					</div>
				</div>
			</section>

			<section id="services" class="services">
				<div class="wrapper">
						<h2 class="h2"><?=(get_field('services_group')['title'] ?? 'Services')?></h2>
						<h3 class="h3"><?=(get_field('services_group')['sub_title'] ?? '')?></h3>

						<? if ($services = get_field('services_group')['services_repeater']): ?>
						<div class="serv-block">
							<? foreach($services as $service): ?>

							<? endforeach; ?>								
						</div>
						<? endif; ?>	
				</div>
			</section>

			<section id="process" class="process">
				<div class="wrapper">
						<h2 class="h2"><?=(get_field('process_group')['title'] ?? 'Our Process')?></h2>
						<h3 class="h3"><?=(get_field('process_group')['sub_title'] ?? '')?></h3>
					
					<? if ($processes = get_field('process_group')['process_repeater']): ?>
					
					<div class="proc-block">

						<? $i=0; foreach($processes as $process): ?>
							
							<div class="proc-item">

								<? if ($i % 2 == 0): ?>
								<? else: ?>	
								<? endif; ?>

								<div class="proc-text-wrap">
									<div class="proc-heading">
										<?=($process['process_sub_group']['title'] ?? '')?>
									</div>
									<div class="proc-text">
										<?=($process['process_sub_group']['text'] ?? '')?>
									</div>									
								</div>
								<div class="wrap-proc-img">									
									<div class="proc-img" style="background: url('<?=($process['process_sub_group']['image'] ?? '')?>') no-repeat  center, url('<?=get_template_directory_uri()?>/img/ico_splash.svg') no-repeat center center, url('<?=get_template_directory_uri()?>/img/ico_splash.svg') no-repeat center center; background-size: contain, contain;">
									</div>
<!-- 									<div class="proc-img" style="background:  url('<?=($process['process_sub_group']['image'] ?? '')?>') no-repeat  center, url('<?=get_template_directory_uri()?>/img/ico_splash.svg') no-repeat center center; background-size: contain, contain;">
									</div>	 -->													
								</div>
							</div>

						<? endforeach; ?>						
					</div>
					<? endif; ?>	
				</div>
			</section>
					
		</div>


<?php
get_footer('syntelect');
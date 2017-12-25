<?php
/**
 * Template name: Syntelect
*/
get_header('syntelect'); ?>
		<div id="my-content">
<!-- 			<section id="about" class="about">
				<div class="wrapper">
					<div class="about-content">
						<h2 class="h2"><?=(get_field('about_group')['title'] ?? 'About Us')?></h2>
						<h3 class="h3"><?=(get_field('about_group')['sub_title'] ?? '')?></h3>
						<div id="readmore" class="content"><?=(get_field('about_group')['text'] ?? '')?></div>
					</div>
				</div>
			</section> -->
			<section id="why" class="why">
				<div class="wrapper">
						<h2 class="h2"><?=(get_field('why_group')['title'] ?? 'Why Choose Us')?></h2>
						<h3 class="h3"><?=(get_field('why_group')['sub_title'] ?? '')?></h3>
						<? if ($why = get_field('why_group')['why_repeater']): ?>
						<div class="why-content">
							<div class="hvastalka">

								<? foreach ($why as $item): ?>
									<div class="item">
										<div class="reason"><?=($item['why_sub_group']['reason_number'] ?? '')?></div>
										<div class="title" title="<?=($item['why_sub_group']['title'] ?? '')?>">
											<?=($item['why_sub_group']['title'] ?? '')?>
										</div>
										<div class="icon" id="why_icon" title="<?=($item['why_sub_group']['title'] ?? '')?>"></div>
										<div class="text" id="why_text"><?=($item['why_sub_group']['text'] ?? '')?></div>
										<div class="container">
											<div class="triangle"></div>
											<div class="point"></div>
										</div>
									</div>
								<? endforeach; ?>

								<div class="center">									
									<div class="title-default"><?=(get_field('why_group')['title_center'] ?? '')?></div>
									<div class="text-default"><?=(get_field('why_group')['text_center'] ?? '')?></div>
								</div>								

							</div>
						</div>
						<? endif; ?>

				</div>
			</section>
			<div class="wave-top"></div>
			<section id="services" class="services">
				<div class="wrapper">

						<h2 class="h2"><?=(get_field('services_group')['title'] ?? 'Services')?></h2>
						<h3 class="h3"><?=(get_field('services_group')['sub_title'] ?? '')?></h3>

						<? if ($services = get_field('services_group')['service_repeater']): ?>
							<div id="tabsToAccordion" class="serv-block">
								<ul class="resp-tabs-list">
									<? foreach ($services as $service) echo "<li>{$service['service_group']['title']}</li>";?>
								</ul>
								<div class="resp-tabs-container">
									<? foreach ($services as $service) echo "<div>{$service['service_group']['text']}</div>";?>
								</div>
							</div>
						<? endif; ?>	
				</div>
			</section>
			<div class="wave-bottom"></div>

			<section id="process" class="process">
				<div class="wrapper">
						<h2 class="h2"><?=(get_field('process_group')['title'] ?? 'Our Process')?></h2>
						<h3 class="h3"><?=(get_field('process_group')['sub_title'] ?? '')?></h3>
					
					<? if ($processes = get_field('process_group')['process_repeater']): ?>
					
					<div class="proc-block" id="readmore-proc">

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


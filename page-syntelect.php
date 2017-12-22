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

			<div id="services">services</div>

			<section id="process" class="process">
				<div class="wrapper">
						<h2 class="h2"><?=(get_field('process_group')['title'] ?? 'Our Process')?></h2>
						 <h3 class="h3"><?=(get_field('process_group')['sub_title'] ?? '')?></h3>
					<div class="proc-block">
						<? if ($processes = get_field('process_group')['process_repeater']): ?>
						<? foreach($processes as $process): ?>
							<div>
								<?=($process['process_sub_group']['title'] ?? '')?>
								<?=($process['process_sub_group']['text'] ?? '')?>
								<?=($process['process_sub_group']['image'] ?? '')?>
							</div>
						<? endforeach; ?>
						<?php
							// $services = get_field('process_group')['process_repeater'];
							// echo "<pre>";
							// print_r($services); 
							// echo "</pre>"; 
							// die();

						?>
						<div class="left"></div>
						<div class="right"></div>
						<? endif; ?>
					</div>	
				</div>
			</section>
					
		</div>


<?php
get_footer('syntelect');
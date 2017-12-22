
		<footer id="my-footer">
			<div id="contacts" class="contacts">
				<div class="wrapper">
						<h2 class="h2"><?=(get_field('contacts_group')['title'] ?? 'Contacts')?></h2>
						<h3 class="h3"><?=(get_field('contacts_group')['sub_title'] ?? '')?></h3>
						<form method="POST">
							<div class="contacts-content">
								<div class="form-title">
									<div class="title">
										<?=(get_field('contacts_group')['contact_form_group']['title'] ?? 'Сontact form')?>
									</div>
									<div class="text">
										<?=(get_field('contacts_group')['contact_form_group']['text'] ?? 'If you have any further questions, please don’t hesitate to contact us.')?>
									</div>
			 						<div class="btn-block-footer">
			 							<button type="submit" class="btn btn-bg"><?=(get_field('send') ?? 'Send')?></button>						
									</div>																					
								</div>
								<div class="form-first">
									<input type="text" name="name" placeholder="<?=(get_field('contacts_group')['form_fields_group']['your_name'] ?? 'Your name')?>" required>
									<input type="email" name="email" placeholder="<?=(get_field('contacts_group')['form_fields_group']['your_email'] ?? 'Your email')?>" required>
									<input id="input-file" name="file" type="file" placeholder="<?=(get_field('contacts_group')['form_fields_group']['no_file_selected'] ?? 'No file selected')?>" required>
								</div>
								<div class="form-second">
									<input type="text" name="subject" placeholder="<?=(get_field('contacts_group')['form_fields_group']['subject'] ?? 'Subject')?>" required>
									<textarea name="message" placeholder="<?=(get_field('contacts_group')['form_fields_group']['text_area'] ?? 'Text area')?>" required></textarea>
								</div>								
							</div>
						</form>
				</div>				
			</div>
			<div class="wave-dots"></div>
			<div class="address">
				<div class="wrapper">
					<div class="address-block">
						<div class="addr" id="addr">
							<?=(get_field('contacts_group')['address'] ?? '120 Nan Shi St. New Taipei City. 
Linkou. Taiwan, 24441')?>
						</div>
						<div class="email">
							<a href="mailto:<?=(get_field('contacts_group')['email'] ?? '')?>"><?=(get_field('contacts_group')['email'] ?? '')?></a>		
						</div>
						<div class="phone">
							<?=(get_field('contacts_group')['call_us_group']['title'] ?? '')?>
							<a href="tel:<?=(get_field('contacts_group')['call_us_group']['phone'] ?? '')?>"> <?=(get_field('contacts_group')['call_us_group']['phone'] ?? '')?></a>
							<div class='fax'>
								<?=(get_field('contacts_group')['call_us_group']['fax_title'] ?? '')?> 
								<span><?=(get_field('contacts_group')['call_us_group']['fax_phone'] ?? '')?></span>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<div class="map" id="map"></div>
			<div class="bottom-menu">
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
		</footer>
	</div>
<?php wp_footer(); ?>



</body>
</html>


		<footer id="my-footer">
			<section id="contacts" class="contacts">
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
			</section>			
		</footer>
	</div>
<?php wp_footer(); ?>

</body>
</html>

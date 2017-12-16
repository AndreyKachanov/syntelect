
<?php
/**
 * Template name: Syntelect
*/
get_header('syntelect'); ?>


			<div style="border: 1px solid red;" class="container">
			<?php
			while ( have_posts() ) : the_post();

				the_title();
				the_content();


			endwhile; // End of the loop.
			?>
			<p style="font-weight: bold;"><?=get_field('text')?></p>
			<hr>
			<?php
				if (get_field('top_slider')) {

					$slides = get_field("top_slider");
					
					foreach ($slides as $slide) {
						echo "<p>";
						echo $slide['url'];
						echo $slide['caption'];
						echo "</p>";
					}
				}

			?>
			</div>


<?php
get_footer('syntelect');
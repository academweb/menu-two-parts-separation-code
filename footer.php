<?php $homepageID = get_option('page_on_front');?>

<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<a href="/">
					<div class="footer-logo">
						<?php $main_logo = get_field('logo', $homepageID); ?>
						<img src="<?php echo $main_logo['url']; ?>" alt="">
					</div>
				</a>

				<a href="<?php echo get_field('tripadvisor_link', $homepageID); ?>" target="_blank">
					<img class="trip" src="<?php echo get_template_directory_uri() . '/img/ta_primary.svg'; ?>" alt="">
				</a>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
				<div class="footer-nuv">
					<p><?php echo get_field('label_menu', 'options'); ?></p>
					<?php 
					$menu_name = 'footer';
				     //Check to see if our menu object exists and is set
					if(($locations = get_nav_menu_locations()) && isset($locations[$menu_name])){
						$menu = wp_get_nav_menu_object($locations[$menu_name]);
						$menu_items = wp_get_nav_menu_items($menu->term_id);

						

				          //Create a new array with just the top level objects
						$newMenu = array();
						foreach($menu_items as $item){
							if($item->menu_item_parent != 0) continue;
							array_push($newMenu, $item);
						}

				          //Split menu array in half
						$len = count($newMenu);
						$firsthalf = array_slice($newMenu, 0, $len / 2);
						$secondhalf = array_slice($newMenu, $len / 2);

				          //Create left menu
						echo '<ul>';
						foreach($firsthalf as $item){
							echo "<li><a href='".$item->url."'>".$item->title."</a></li>";
						}
						echo '</ul>'; ?>

				         
				  </div>
				</div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
				<div class="footer-nuv">
					<p>&nbsp;</p>
				 <?php //Create right menu
				          echo '<ul>';
				          foreach($secondhalf as $item){
				          	echo "<li><a href='".$item->url."'>".$item->title."</a></li>";
				          }
				          echo '</ul>';
				      }
				      ?>
				</div>
			</div>
			</div>
	</div>
</div>
<div class="copyright">
	<div class="container">
	<p><?php echo get_field('copyright_text', $homepageID); ?></p>

	<div class="nuv">
		<?php 
		$cop_nuv = array(
			'theme_location' => 'copy'
		);
		wp_nav_menu( $cop_nuv );
		?>
	</div>
	<div class="clearfix"></div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
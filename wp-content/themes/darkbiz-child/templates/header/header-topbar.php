<?php
/**
 * Comtent for header topbar
 *
 * @since 1.0.0
 *
 * @package Darkbiz Child WordPress Theme
 */

if( Darkbiz_Child_Theme::topbar_has_content() ): ?>
  <div class="<?php echo esc_attr( Darkbiz_Helper::with_prefix( 'top-bar' ) ); ?>">
  	<div class="container">
  		<div class="row align-items-center">
  			<div class="col-12">
  				<div class="<?php echo esc_attr( Darkbiz_Helper::with_prefix( 'top-bar-info' ) ); ?>">
  					<ul>
  						<?php 
  							$data = array(
  								'location' => array(
  									'icon' => 'fa-map-marker',
  									'href' => false
  								),
  								'phone-num' => array(
  									'icon' => 'fa-phone',
  									'href' => 'tel:'
  								),
  								'email' => array(
  									'icon' => 'fa-envelope',
  									'href' => 'mailto:'
  								),
  							);
                
 							foreach( $data as $setting => $d ){
 								$value = darkbiz_get( $setting );
 								$href = $d[ 'href' ] ? $d[ 'href' ] . $value : false;
 								if( !empty( $value ) ):?>							
 									<li>
 										<?php if( $href ) : ?>
 											<a href="<?php echo esc_attr( $href ); ?>">											
 												<i class="fa <?php echo esc_attr( $d[ 'icon' ] ); ?>"></i>
 												<span>
 													<?php echo esc_html( $value); ?>	
 												</span>
 											</a>
 										<?php else: ?>
 											<i class="fa <?php echo esc_attr( $d[ 'icon' ] ); ?>"></i> 
 											<span>
 												<?php echo esc_html( $value ); ?>	
 											</span>
 										<?php endif; ?>
 									</li>
 								<?php endif;
 							}
  						?>
  					</ul>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
<?php endif; ?>
<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'fire_department_template_team_1_theme_setup' ) ) {
	add_action( 'fire_department_action_before_init_theme', 'fire_department_template_team_1_theme_setup', 1 );
	function fire_department_template_team_1_theme_setup() {
		fire_department_add_template(array(
			'layout' => 'team-1',
			'template' => 'team-1',
			'mode'   => 'team',
			'title'  => esc_html__('Team /Style 1/', 'fire-department'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'fire-department'),
			'w' => 390,
			'h' => 390
		));
	}
}

// Template output
if ( !function_exists( 'fire_department_template_team_1_output' ) ) {
	function fire_department_template_team_1_output($post_options, $post_data) {
		$show_title = true;
		$parts = explode('_', $post_options['layout']);
		$style = $parts[0];
		$columns = max(1, min(12, empty($parts[1]) ? (!empty($post_options['columns_count']) ? $post_options['columns_count'] : 1) : (int) $parts[1]));
		if (fire_department_param_is_on($post_options['slider'])) {
			?><div class="swiper-slide" data-style="<?php echo esc_attr($post_options['tag_css_wh']); ?>" style="<?php echo esc_attr($post_options['tag_css_wh']); ?>"><?php
		} else if ($columns > 1) {
			?><div class="column-1_<?php echo esc_attr($columns); ?> column_padding_bottom"><?php
		}
		?>
			<div<?php echo !empty($post_options['tag_id']) ? ' id="'.esc_attr($post_options['tag_id']).'"' : ''; ?>
				class="sc_team_item sc_team_item_<?php echo esc_attr($post_options['number']) . ($post_options['number'] % 2 == 1 ? ' odd' : ' even') . ($post_options['number'] == 1 ? ' first' : '') . (!empty($post_options['tag_class']) ? ' '.esc_attr($post_options['tag_class']) : ''); ?>"
				<?php echo (!empty($post_options['tag_css']) ? ' style="'.esc_attr($post_options['tag_css']).'"' : '') 
					. (!fire_department_param_is_off($post_options['tag_animation']) ? ' data-animation="'.esc_attr(fire_department_get_animation_classes($post_options['tag_animation'])).'"' : ''); ?>>
				<div class="sc_team_item_avatar"><?php fire_department_show_layout($post_options['photo']); ?></div>
				<div class="sc_team_item_info">
					<h5 class="sc_team_item_title"><?php echo ($post_data['post_title']); ?></h5>
					<div class="sc_team_item_position"><?php fire_department_show_layout($post_options['position']);?></div>
					<div class="sc_team_item_description">
						<?php the_content(); ?>
					</div>
					<div class="sc_team_item_contact">
						<?php if (($post_options['email']) !="") { ?>
							<span>Email:  <a href="mailto:<?php fire_department_show_layout($post_options['email']); ?>"><?php fire_department_show_layout($post_options['email']);?></a></span>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php
		if (fire_department_param_is_on($post_options['slider']) || $columns > 1) {
			?></div><?php
		}
	}
}
?>
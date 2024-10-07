<?php
namespace Creative_Addons\Widgets;
use Creative_Addons\Includes\Utilities_Plugin;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;

defined( 'ABSPATH' ) || exit();

/**
 * Notification Box widget for Elementor
 */
class Notification_Box extends Creative_Widget_Base {
	
	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Notification Box', 'creative-addons-for-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'crelfont crel-notification-box-icon';
	}

	/**
	 * Retrieve the widget Demo URL.
	 *
	 * @return string Widget Demo URL.
	 */
	public function get_demo_url() {
		return 'https://www.creative-addons.com/elementor-widgets/notification-box/';
	}

	/**
	 * Retrieve the widget Documentation URL.
	 *
	 * @return string Widget Documentation URL.
	 */
	public function get_documentation_url() {
		return 'https://www.creative-addons.com/elementor-docs/notification-box-widget/';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'info', 'box', 'notification', 'text', 'alert', 'notice', 'message' ];
	}

	protected function get_config_defaults() {
		$default_color = '#000000';

		return [
			// Container
			'crel_notificationBox__container_borderColor'	                => '#000000',
			'crel_notificationBox__container_backgroundColor_color'         => '#F9F9F9',
			'crel_notificationBox__container_backgroundColor_background'    => 'classic',
			'crel_notificationBox__container_widthBorder'	                => [
				'size' => '0',
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_borderRadius'	                => [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_padding'                       => [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_boxShadow_box_shadow_type'     => [
				'box_shadow_type' => [
					'default' => 'no',
				],
			],
			'crel_notificationBox__container_boxShadow_box_shadow'          => [
				'horizontal' => 0,
				'vertical' => 0,
				'blur' => 0,
				'spread' => 0,
				'color' => '',
			],

			// Icon / Image
			'crel_notificationBox__icon_type'	                            => 'icon',
			'crel_notificationBox__icon_image'	                            => [
				'url' => Utils::get_placeholder_image_src(),
			],
			'crel_notificationBox__fontIcon'                                => [
				'value' => 'far fa-check-circle',
				'library' => 'fa-regular'
			],
			'crel_notificationBox__icon_color'                              => $default_color,
			'crel_notificationBox__icon_backgroundColor'                    => '#cccccc',
			'crel_notificationBox__icon_alignment'	                        => 'crel-notification-box-icon-center-aligned',
			'crel_notificationBox__icon_size'                               => [
				'size' => 60,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_size_mobile'                               => [
				'size' => 33,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_padding'	                        => [
				'size' => 20,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_padding_mobile'	                        => [
				'size' => 15,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_rotate'	                            => [
				'unit' => 'deg',
				'sizes' => []
			],

			// Title
			'crel_notificationBox__title_toggle'	                        => 'yes',
			'crel_notificationBox__title_text'	                            => esc_html__( 'Warning, Tip, Notice, or Information.', 'creative-addons-for-elementor' ),
			'crel_notificationBox__title_color'                             => $default_color,
			'crel_notificationBox__title_marginTop'	                        => [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__title_marginBottom'	                    => [
				'size' => 10,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__title_marginBottom_mobile'	                    => [
				'size' => 10,
				'unit' => 'px',
				'sizes' => []
			],

			// Description
			'crel_notificationBox__desc_text'	                            => esc_html__( 'Write a short description to inform or warn users, or to provide more details.', 'creative-addons-for-elementor'),
			'crel_notificationBox__desc_color'                              => '#000000',
			'crel_notificationBox__desc_marginBottom'	                    => [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			
			// Button
			'crel_notificationBox__button_color'                            => $default_color,
			'crel_notificationBox__button_iconColor'                        => '#000000',
			'crel_notificationBox__button_paddingLeftRight'	                => [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_paddingTopBottom'	=> [
				'size' => 10,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_marginBottom'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_borderRadius'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_iconSize'	=> [
				'size' => 15,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_textSpace'	=> [
				'size' => 12,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_text'	=> esc_html__( 'Learn More', 'creative-addons-for-elementor' ),
			'crel_notificationBox__button_URL'	=> [
				'url'	=> '#'
			],
			'crel_notificationBox__button_icon'	=> [
				'value' => 'fas fa-external-link-square-alt',
				'library' => 'fa-solid',
			],

			// other
			'crel_notificationBox__alignment'	=> 'crel-notification-box-align--left',
			'crel_notificationBox__border_position'	=> 'crel-notification-box-border--left',
			'crel_notificationBox__body_paddingLeftRight'	=> [
				'size' => 20,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__body_paddingLeftRight_mobile'	=> [
				'size' => 10,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__body_paddingTopBottom'	=> [
				'size' => 20,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__body_paddingTopBottom_mobile'	=> [
				'size' => 15,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__border_radius'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			
			'crel_notificationBox__title_typography_typography'         => 'custom',
			'crel_notificationBox__title_typography_font_size'   => [
				'size' => 16,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__title_typography_font_weight'   => 'bold',
			
			'crel_notificationBox__desc_typography_typography'         => 'custom',
			'crel_notificationBox__desc_typography_font_size'   => [
				'size' => 16,
				'unit' => 'px',
				'sizes' => []
			],
			
			'crel_notificationBox__button_typography_typography'         => 'custom',
			'crel_notificationBox__button_typography_font_size'   => [
				'size' => 16,
				'unit' => 'px',
				'sizes' => []
			],
		];
	}

	protected function get_config_rtl_defaults() {
		return [
			'crel_notificationBox__border_position' 		=> 'crel-notification-box-border--right',
		];
	}

	protected function get_presets_defaults() {
		
		return [

			// Container
			'crel_notificationBox__container_backgroundColor_background'    => 'classic',
			'crel_notificationBox__container_widthBorder'	=> [
				'size' => '0',
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_widthBorder_tablet'	                => [
				'size' => '0',
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_widthBorder_mobile'	                => [
				'size' => '0',
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_borderRadius'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_padding' => [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__container_boxShadow_box_shadow_type' => [
				'box_shadow_type' => [
					'default' => 'no',
				],
			],
			'crel_notificationBox__container_boxShadow_box_shadow'      => [
				'horizontal' => 0,
				'vertical' => 0,
				'blur' => 0,
				'spread' => 0,
				'color' => '',
			],

			// Icon / Image
			'crel_notificationBox__icon_type'	=> 'icon',
			'crel_notificationBox__icon_image'	=> [
				'url' => Utils::get_placeholder_image_src(),
			],
			'crel_notificationBox__fontIcon'  => [
				'value' => 'far fa-check-circle',
				'library' => 'fa-regular'
			],
			'crel_notificationBox__icon_alignment'	=> 'crel-notification-box-icon-center-aligned',
			'crel_notificationBox__icon_size' => [
				'size' => 60,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_size_mobile' => [
				'size' => 33,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_padding'	=> [
				'size' => 20,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_padding_mobile'	=> [
				'size' => 15,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__icon_margin' => [],
			'crel_notificationBox__icon_margin_mobile' => [],
			'crel_notificationBox__icon_rotate'	=> [
				'unit' => 'deg',
				'sizes' => []
			],

			// Title
			'crel_notificationBox__title_toggle'	=> 'yes',
			'crel_notificationBox__title_marginTop'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__title_marginBottom'	=> [
				'size' => 10,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__title_marginBottom_mobile'	                    => [
				'size' => 10,
				'unit' => 'px',
				'sizes' => []
			],

			// Description
			'crel_notificationBox__desc_typography_font_weight'             => '400',
			'crel_notificationBox__desc_marginBottom'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__desc_typography_font_size'   => [
				'size' => '16',
				'unit' => 'px',
				'sizes' => []
			],

			// Button
			'crel_notificationBox__button_paddingLeftRight'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_paddingTopBottom'	=> [
				'size' => 10,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_marginBottom'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_borderRadius'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_iconSize'	=> [
				'size' => 15,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_textSpace'	=> [
				'size' => 12,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__button_URL'	=> [
				'url'	=> '#'
			],
			'crel_notificationBox__button_icon'	=> [
				'value' => 'fas fa-external-link-square-alt',
				'library' => 'fa-solid',
			],

			// other
			'crel_notificationBox__alignment'	=> 'crel-notification-box-align--left',
			'crel_notificationBox__border_position'	=> 'crel-notification-box-border--left',
			'crel_notificationBox__body_paddingLeftRight'	=> [
				'size' => 20,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__body_paddingTopBottom'	=> [
				'size' => 20,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__border_radius'	=> [
				'size' => 0,
				'unit' => 'px',
				'sizes' => []
			],
		];
	}

	protected function get_presets_rtl_defaults() {
		return [
			'crel_notificationBox__border_position' 		=> 'crel-notification-box-border--right',
		];
	}

	public function get_presets_options() {

		$default_options = array();
		
		$default_options['color'] = array(
			'title' => esc_html__( 'Color', 'creative-addons-for-elementor'),
			'description' => esc_html__( 'Look and structure', 'creative-addons-for-elementor'),
			'options' => array()
		);
		
		$default_options['style'] = array(
			'title' => esc_html__( 'Style', 'creative-addons-for-elementor'),
			'description' => esc_html__( 'Look and structure', 'creative-addons-for-elementor'),
			'options' => array()
		);

		// Warning Type options
		$warning = array(
			'title' => esc_html__( 'Warning', 'creative-addons-for-elementor'),
			'description' => esc_html__( 'Warn users about risks, potential issues, and important information.', 'creative-addons-for-elementor'),
			'icon' => 'exclamation-triangle',
			'options' => $default_options
		);

		// Tip Type options
		$tip = array(
			'title' => esc_html__( 'Tip', 'creative-addons-for-elementor'),
			'description' => esc_html__( "Tips and tricks that will help your users be more productive and effective.", 'creative-addons-for-elementor'),
			'icon' => 'check',
			'options' => $default_options
		);

		// Note Type options
		$note = array(
			'title' => esc_html__( 'Note', 'creative-addons-for-elementor'),
			'description' => esc_html__( 'Additional, less important, information about this subject.', 'creative-addons-for-elementor'),
			'icon' => 'pen',
			'options' => $default_options
		);

		// Info Type options
		$info = array(
			'title' => esc_html__( 'Info', 'creative-addons-for-elementor'),
			'description' => esc_html__( 'Important information you want to emphasize so that a user does not miss it.', 'creative-addons-for-elementor'),
			'icon' => 'info',
			'options' => $default_options
		);

		$presets_categories = array(
			'warning' => $warning,
			'info' => $info,
			'tip' => $tip,
			'note' => $note,
		);
		
		// Presets for Warning
		$presets_categories['warning']['options']['style']['options']   = $this->get_style_options( 
													'fas fa-exclamation-triangle', 
													'fa-solid',
													[ 
														'crel_notificationBox__icon_padding' => [
															'size' => 16,
															'unit' => 'px',
															'sizes' => []
														]
													] );
		$presets_categories['warning']['options']['color']['options']   = $this->get_warning_color_options();

		// Presets for Tip
		$presets_categories['tip']['options']['style']['options']       = $this->get_style_options( 'fas fa-check' );
		$presets_categories['tip']['options']['color']['options']       = $this->get_tip_color_options();

		// Presets for Note
		$presets_categories['note']['options']['style']['options']      = $this->get_style_options( 'fas fa-pen' );
		$presets_categories['note']['options']['color']['options']      = $this->get_note_color_options();

		// Presets for Info
		$presets_categories['info']['options']['style']['options']      = $this->get_style_options( 'fas fa-info-circle' );
		$presets_categories['info']['options']['color']['options']      = $this->get_info_color_options();
		
		return $presets_categories;
	}

	protected function get_style_options( $default_icon = 'fas fa-exclamation-triangle', $default_weight = 'fa-solid', $special_defaults = [] ) {
		$options = array();

		$options['design-1'] = array(
			'title' => esc_html__( 'Style 1', 'creative-addons-for-elementor'),
			'colors' => [
				'style_1_color_set_1',
				'style_1_color_set_2',
				'style_1_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-1.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_widthBorder'   =>  [
					'size' => '0',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__border_position'         => 'crel-notification-box-border--all',

				// Icon
				'crel_notificationBox__icon_alignment'          => 'crel-notification-box-icon-top-aligned',
				'crel_notificationBox__icon_size'               => [
					'size' => '22',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_size_mobile'        => [
					'size' => '18',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__fontIcon'                => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_padding'            => [
					'size' => '10',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_margin'             => [
					'top'       => '20',
					'left'      => '8',
					'right'     => '0',
					'bottom'    => '8',
					'unit'      => 'px'
				],
				'crel_notificationBox__icon_margin_mobile'      => [
					'top'       => '15',
					'left'      => '8',
					'right'     => '0',
					'bottom'    => '8',
					'unit'      => 'px'
				],
				'crel_notificationBox__border_radius'           => [
					'size' => '150',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__container_borderRadius'	=> [
					'size' => 6,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__title_marginBottom'	=> [
					'size' => 5,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__title_typography_font_weight' => 'normal',
				'crel_notificationBox__body_paddingLeftRight'       => [
					'size' => '5',
					'unit' => 'px',
					'sizes' => []
				],

			), true, $special_defaults )
		);

		$options['design-2'] = array(
			'title' => esc_html__( 'Style 2', 'creative-addons-for-elementor'),
			'colors' => [
				'style_2_color_set_1',
				'style_2_color_set_2',
				'style_2_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-2.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_widthBorder'   =>  [
					'size' => '1',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__border_position'         => 'crel-notification-box-border--all',

				// Icon
				'crel_notificationBox__icon_alignment'          => 'crel-notification-box-icon-top-aligned',
				'crel_notificationBox__icon_size'               => [
					'size' => '22',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_size_mobile'        => [
					'size' => '18',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__fontIcon'                => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_padding'            => [
					'size' => '10',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_margin'             => [
					'top'       => '20',
					'left'      => '8',
					'right'     => '0',
					'bottom'    => '8',
					'unit'      => 'px'
				],
				'crel_notificationBox__icon_margin_mobile'      => [
					'top'       => '15',
					'left'      => '8',
					'right'     => '0',
					'bottom'    => '8',
					'unit'      => 'px'
				],
				'crel_notificationBox__border_radius'           => [
					'size' => '150',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__container_borderRadius'	=> [
					'size' => 0,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__title_marginBottom'	=> [
					'size' => 5,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__title_typography_font_weight' => 'bold',
				'crel_notificationBox__body_paddingLeftRight'       => [
					'size' => '5',
					'unit' => 'px',
					'sizes' => []
				],

			), true, $special_defaults )
		);

		$options['design-3'] = array(
			'title' => esc_html__( 'Style 3', 'creative-addons-for-elementor'),
			'colors' => [
					'style_3_color_set_1',
					'style_3_color_set_2',
					'style_3_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-3.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_boxShadow_box_shadow_type'     => [
					'box_shadow_type' => [
						'default' => 'yes',
					],
				],
				'crel_notificationBox__container_boxShadow_box_shadow'          => [
					'horizontal' => 2,
					'vertical' => 7,
					'blur' => 9,
					'spread' => -6,
					'color' => '#545454',
				],
				'crel_notificationBox__icon_alignment'	=> 'crel-notification-box-icon-center-aligned',

				'crel_notificationBox__border_position'	=> 'crel-notification-box-border--left',
				'crel_notificationBox__container_borderRadius'	                => [
					'size' => 0,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_size'                               => [
					'size' => '60',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_padding'	                        => [
					'size' => 20,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__title_marginBottom'	                    => [
					'size' => 10,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__body_paddingLeftRight'	=> [
					'size' => 20,
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__border_radius'	=> [
					'size' => '0',
					'unit' => 'px',
					'sizes' => []
				],
				// Icon / Image
				'crel_notificationBox__fontIcon'                                => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_margin'             => [
					'top'       => '0',
					'left'      => '0',
					'right'     => '0',
					'bottom'    => '0',
					'unit'      => 'px'
				],
				'crel_notificationBox__icon_margin_mobile'      => [
					'top'       => '0',
					'left'      => '0',
					'right'     => '0',
					'bottom'    => '0',
					'unit'      => 'px'
				],
			), true, $special_defaults )
		);

		$options['design-4'] = array(
			'title' => esc_html__( 'Style 4', 'creative-addons-for-elementor'),
			'colors' => [
				'style_4_color_set_1',
				'style_4_color_set_2',
				'style_4_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-4.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_widthBorder'                   => [
					'size' => '1',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__border_position'                         => 'crel-notification-box-border--all',

				// Icon / Image
				'crel_notificationBox__fontIcon'                                => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_size'                               => [
					'size' => '25',
					'unit' => 'px',
					'sizes' => []
				],

			), true, $special_defaults )
		);

		$options['design-5'] = array(
			'title' => esc_html__( 'Style 5', 'creative-addons-for-elementor'),
			'colors' => [
				'style_5_color_set_1',
				'style_5_color_set_2',
				'style_5_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-5.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_widthBorder'   =>  [
					'size' => '1',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__border_position'         => 'crel-notification-box-border--all',

				// Icon
				'crel_notificationBox__icon_alignment'          => 'crel-notification-box-icon-top-aligned',
				'crel_notificationBox__icon_size'               => [
					'size' => '22',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_size_mobile'        => [
					'size' => '18',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__fontIcon'                => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_padding'            => [
					'size' => '10',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_margin'             => [
					'top'       => '20',
					'left'      => '8',
					'right'     => '0',
					'bottom'    => '8',
					'unit'      => 'px'
				],
				'crel_notificationBox__icon_margin_mobile'      => [
					'top'       => '15',
					'left'      => '8',
					'right'     => '0',
					'bottom'    => '8',
					'unit'      => 'px'
				],
				'crel_notificationBox__border_radius'           => [
					'size' => '150',
					'unit' => 'px',
					'sizes' => []
				],


			), true, $special_defaults )
		);

		$options['design-6'] = array(
			'title' => esc_html__( 'Style 6', 'creative-addons-for-elementor'),
			'colors' => [
				'style_6_color_set_1',
				'style_6_color_set_2',
				'style_6_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-6.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_widthBorder'           =>  [
					'size' => '7',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__container_widthBorder_mobile'    =>  [
					'size' => '4',
					'unit' => 'px',
					'sizes' => []
				],

				// Icon
				'crel_notificationBox__fontIcon'                        => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_type'                       => 'none',
				'crel_notificationBox__icon_alignment'                  => 'crel-notification-box-icon-top-aligned',
				'crel_notificationBox__icon_size'                       => [
					'size' => '30',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_size_mobile'                => [
					'size' => '23',
					'unit' => 'px',
					'sizes' => []
				],

				// Button
				'crel_notificationBox__button_toggle'                   => 'yes',

			), true, $special_defaults )
		);

		$options['design-7'] = array(
			'title' => esc_html__( 'Style 7', 'creative-addons-for-elementor'),
			'colors' => [
				'style_7_color_set_1',
				'style_7_color_set_2',
				'style_7_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-7.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__border_position'             => 'crel-notification-box-border--all',
				'crel_notificationBox__container_borderRadius'      => [
					'size' => '7',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__container_widthBorder'       => [
					'size' => '2',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__container_padding'           => [
					'size' => '15',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__body_paddingLeftRight'       => [
					'size' => '0',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__body_paddingTopBottom'       => [
					'size' => '0',
					'unit' => 'px',
					'sizes' => []
				],

				// Title
				'crel_notificationBox__title_toggle'                => 'no',

				// Description
				'crel_notificationBox__desc_typography_font_weight' => 'bold',

				// Icon / Image
				'crel_notificationBox__icon_type'                   => 'none',
				'crel_notificationBox__icon_size'                   => [
					'size' => '40',
					'unit' => 'px',
					'sizes' => []
				],
				
				'crel_notificationBox__icon_padding'                => [
					'size' => '5',
					'unit' => 'px',
					'sizes' => []
				],
				// Icon
				'crel_notificationBox__fontIcon'                    => [
					'value' => $default_icon,
					'library' => $default_weight,
				],

				// Button
				'crel_notificationBox__button_toggle'               => 'No'

			), true, $special_defaults )
		);

		$options['design-8'] = array(
			'title' => esc_html__( 'Style 8', 'creative-addons-for-elementor'),
			'colors' => [
				'style_8_color_set_1',
				'style_8_color_set_2',
				'style_8_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-8.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__border_position'                 => 'crel-notification-box-border--right',
				'crel_notificationBox__container_widthBorder'           => [
					'size' => '8',
					'unit' => 'px',
					'sizes' => []
				],

				'crel_notificationBox__container_widthBorder_mobile'           => [
					'size' => '5',
					'unit' => 'px',
					'sizes' => []
				],

				// Description
				'crel_notificationBox__desc_typography_font_weight'     => 'bold',

				// Icon / Image
				'crel_notificationBox__fontIcon'                        => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_size'                       => [
					'size' => '52',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_size_mobile'                       => [
					'size' => '48',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_padding'                    => [
					'size' => '8',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_margin'                     => [
					'top'       => '0',
					'left'      => '0',
					'right'     => '0',
					'bottom'    => '0',
					'unit'      => 'px'
				],

				// Button
				'crel_notificationBox__button_toggle'                   => 'yes',

			), true, $special_defaults )
		);

		$options['design-9'] = array(
			'title' => esc_html__( 'Style 9', 'creative-addons-for-elementor'),
			'colors' => [
				'style_9_color_set_1',
				'style_9_color_set_2',
				'style_9_color_set_3',
			],
			'preview_url' => $this->presets_preview_url( 'notification-box-design-9.png' ),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__border_position'                         => 'crel-notification-box-border--all',
				'crel_notificationBox__container_widthBorder'                   => [
					'size' => '1',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_boxShadow_box_shadow_type'     => [
					'box_shadow_type' => [
						'default' => 'yes',
					],
				],
				'crel_notificationBox__body_paddingTopBottom'                   => [
					'size' => '14',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__container_borderRadius'                  => [
					'size' => '25',
					'unit' => 'px',
					'sizes' => []
				],

				// Title
				'crel_notificationBox__title_toggle'                            => 'no',

				// Description
				'crel_notificationBox__desc_typography_font_weight'   => 'bold',

				// Icon / Image
				'crel_notificationBox__fontIcon'                                => [
					'value' => $default_icon,
					'library' => $default_weight,
				],
				'crel_notificationBox__icon_size'                               => [
					'size' => '23',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_size_mobile'                               => [
					'size' => '20',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_padding'                            => [
					'size' => '10',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_notificationBox__icon_margin'                             => [
					'top'       => '0',
					'left'      => '0',
					'right'     => '0',
					'bottom'    => '0',
					'unit'      => 'px'
				],

				// Button
				'crel_notificationBox__button_toggle'                           => 'no',

			), true, $special_defaults )
		);

		return $options;
	}

	// Presets for Warning Type
	protected function get_warning_color_options() {

		$lightLightColor           = '#FFDED3';
		$lightColor                = '#EC5C29';
		$darkColor                 = '#C03B0C';
		$neutralColor              = '#262626';

		$gradientTopColor          = '#FCE4DC';
		$gradientBottomColor       = '#DD807B';
		$darkgradientColor         = '#B83025';

		$options = $this->get_shared_color_sets( $lightLightColor, $lightColor, $darkColor, $neutralColor, $gradientTopColor, $gradientBottomColor, $darkgradientColor );

		return $options;
	}

	// Presets for Tip Type
	protected function get_tip_color_options() {

		$lightLightColor        = '#EAF5E5';
		$lightColor             = '#45AA6D';
		$darkColor              = '#207140';
		$neutralColor           = '#262626';

		$gradientTopColor       = '#F7FCDC';
		$gradientBottomColor    = '#C7DD7B';
		$darkgradientColor      = '#AFC660';

		$options = $this->get_shared_color_sets( $lightLightColor, $lightColor, $darkColor, $neutralColor, $gradientTopColor, $gradientBottomColor, $darkgradientColor );

		return $options;
	}

	// Presets for Note Type
	protected function get_note_color_options() {

	   // Grey Color
	   $lightLightColor        = '#E0E0E0';
	   $lightColor             = '#8E8E8E';
	   $darkColor              = '#676767';
	   $neutralColor           = '#262626';

	   $gradientTopColor       = '#E5E5E5';
	   $gradientBottomColor    = '#ACACAC';
	   $darkgradientColor      = '#5F5F5F';

		$options = $this->get_shared_color_sets( $lightLightColor, $lightColor, $darkColor, $neutralColor, $gradientTopColor, $gradientBottomColor, $darkgradientColor );

		return $options;
	}

	// Presets for Info Type
	protected function get_info_color_options() {

	   // Blue colors
	   $lightLightColor        = '#C1D9F3';
	   $lightColor             = '#2986EC';
	   $darkColor              = '#0F5CB1';
	   $neutralColor           = '#262626';

	   $gradientTopColor       = '#A4CFFF';
	   $gradientBottomColor    = '#3F95F4';
	   $darkgradientColor      = '#2F6198';

		$options = $this->get_shared_color_sets( $lightLightColor, $lightColor, $darkColor, $neutralColor, $gradientTopColor, $gradientBottomColor, $darkgradientColor );

		return $options;
	}

	// Shared Color Sets
	protected function get_shared_color_sets( $lightLightColor, $lightColor, $darkColor, $neutralColor, $gradientTopColor, $gradientBottomColor, $darkgradientColor ) {
		$options = array();

		// Style 1 Colors
		$options['style_1_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => $lightColor,
				'crel_notificationBox__container_backgroundColor_background' => 'classic',
				'crel_notificationBox__container_backgroundColor_color'      => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                           => $lightColor,
				'crel_notificationBox__icon_backgroundColor'                 => 'transparent',

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_1_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $darkColor,
				'crel_notificationBox__icon_backgroundColor'                    => 'transparent',

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_1_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                       => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'             => 'transparent',

				// Title Color
				'crel_notificationBox__title_color'                      => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                       => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                     => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'           => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                 => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'      => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'            => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'          => '#cccccc',

			), false )
		);


		// Style 2 Colors
		$options['style_2_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => $lightColor,
				'crel_notificationBox__container_backgroundColor_background' => 'classic',
				'crel_notificationBox__container_backgroundColor_color'      => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                           => $lightColor,
				'crel_notificationBox__icon_backgroundColor'                 => 'transparent',

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_2_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $darkColor,
				'crel_notificationBox__icon_backgroundColor'                    => 'transparent',

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_2_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                       => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'             => 'transparent',

				// Title Color
				'crel_notificationBox__title_color'                      => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                       => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                     => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'           => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                 => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'      => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'            => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'          => '#cccccc',

			), false )
		);

		// Style 3 Colors
		$options['style_3_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background' => 'classic',

				'crel_notificationBox__container_backgroundColor_color'      => '#F9F9F9',

				// Icon / Image
				'crel_notificationBox__icon_color'                           => 'white',
				'crel_notificationBox__icon_backgroundColor'                 => $lightColor,

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => '#F9F9F9',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_3_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => '#F9F9F9',

				// Icon / Image
				'crel_notificationBox__icon_color'                              => 'white',
				'crel_notificationBox__icon_backgroundColor'                    => $darkColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_3_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                       => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'             => $darkgradientColor,

				// Title Color
				'crel_notificationBox__title_color'                      => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                       => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                     => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'           => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                 => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'      => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'            => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'          => '#cccccc',

			), false )
		);

		// Style 4 Colors
		$options['style_4_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background' => 'classic',

				'crel_notificationBox__container_backgroundColor_color'      => '#F9F9F9',

				// Icon / Image
				'crel_notificationBox__icon_color'                           => $lightColor,
				'crel_notificationBox__icon_backgroundColor'                 => '#F9F9F9',

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => '#F9F9F9',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_4_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => '#F9F9F9',

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $darkColor,
				'crel_notificationBox__icon_backgroundColor'                    => '#F9F9F9',

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_4_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                       => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'             => '',

				// Title Color
				'crel_notificationBox__title_color'                      => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                       => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                     => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'           => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                 => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'      => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'            => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'          => '#cccccc',

			), false )
		);

		// Style 5 Colors
		$options['style_5_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => $lightColor,
				'crel_notificationBox__container_backgroundColor_background' => 'classic',
				'crel_notificationBox__container_backgroundColor_color'      => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                           => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                 => $lightColor,

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_5_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                    => $darkColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_5_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => '#cccccc',
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                       => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'             => $gradientBottomColor,

				// Title Color
				'crel_notificationBox__title_color'                      => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                       => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                     => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'           => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                 => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'      => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'            => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'          => '#cccccc',

			), false )
		);

		// Style 6 Colors
		$options['style_6_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => $lightColor,
				'crel_notificationBox__container_backgroundColor_background' => 'classic',
				'crel_notificationBox__container_backgroundColor_color'      => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                           => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                 => $lightColor,

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_6_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                    => $darkColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => '#000000',

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_6_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkgradientColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'                    => $gradientBottomColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                            => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);

		// Style 7 Colors
		$options['style_7_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => $lightColor,
				'crel_notificationBox__container_backgroundColor_background' => 'classic',
				'crel_notificationBox__container_backgroundColor_color'      => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                           => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                 => $lightColor,

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => $lightColor,

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_7_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                    => $darkColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => $darkColor,

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_7_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkgradientColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'                    => $gradientBottomColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                            => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);

		// Style 8 Colors
		$options['style_8_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => $lightColor,
				'crel_notificationBox__container_backgroundColor_background' => 'classic',
				'crel_notificationBox__container_backgroundColor_color'      => '#FFFFFF',

				// Icon / Image
				'crel_notificationBox__icon_color'                           => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                 => $lightColor,

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => $lightColor,

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => '#FFFFFF',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_8_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => '#FFFFFF',

				// Icon / Image
				'crel_notificationBox__icon_color'                              => '#FFFFFF',
				'crel_notificationBox__icon_backgroundColor'                    => $darkColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => $darkColor,

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '#FFFFFF',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_8_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkgradientColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'                    => $gradientBottomColor,

				// Title Color
				'crel_notificationBox__title_color'                             => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                            => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);

		// Style 7 Colors
		$options['style_9_color_set_1'] = array(
			'title' => esc_html__( 'Light', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                => $lightColor,
				'crel_notificationBox__container_backgroundColor_background' => 'classic',
				'crel_notificationBox__container_backgroundColor_color'      => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                           => $lightColor,
				'crel_notificationBox__icon_backgroundColor'                 => '',

				// Title Color
				'crel_notificationBox__title_color'                          => $lightColor,

				// Desc Color
				'crel_notificationBox__desc_color'                           => $lightColor,

				// Button Text Color
				'crel_notificationBox__button_color'                         => $lightColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'               => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                     => $lightColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                    => $lightColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'          => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                => $lightColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'              => '#cccccc',

			), false )
		);
		$options['style_9_color_set_2'] = array(
			'title' => esc_html__( 'Dark', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'classic',
				'crel_notificationBox__container_backgroundColor_color'         => $lightLightColor,

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $darkColor,
				'crel_notificationBox__icon_backgroundColor'                    => '',

				// Title Color
				'crel_notificationBox__title_color'                             => $darkColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => $darkColor,

				// Button Text Color
				'crel_notificationBox__button_color'                            => $darkColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => $lightLightColor,

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $darkColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => $darkColor,

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '#F9F9F9',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => $darkColor,

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);
		$options['style_9_color_set_3'] = array(
			'title' => esc_html__( 'Gradient', 'creative-addons-for-elementor'),
			'options' => $this->get_defaults( array(

				// Container
				'crel_notificationBox__container_borderColor'                   => $darkgradientColor,
				'crel_notificationBox__container_backgroundColor_background'    => 'gradient',
				'crel_notificationBox__container_backgroundColor_color'         => $gradientTopColor,
				'crel_notificationBox__container_backgroundColor_color_b'       => $gradientBottomColor,
				'crel_notificationBox__container_boxShadow_box_shadow'          => [
					'horizontal'    => 2,
					'vertical'      => 8,
					'blur'          => 23,
					'spread'        => 3,
					'color'         => $darkgradientColor,
				],

				// Icon / Image
				'crel_notificationBox__icon_color'                              => $neutralColor,
				'crel_notificationBox__icon_backgroundColor'                    => '',

				// Title Color
				'crel_notificationBox__title_color'                             => $neutralColor,

				// Desc Color
				'crel_notificationBox__desc_color'                              => $neutralColor,

				// Button Text Color
				'crel_notificationBox__button_color'                            => $neutralColor,

				// Button Background Color
				'crel_notificationBox__button_backgroundColor'                  => '',

				// Button Icon Color
				'crel_notificationBox__button_iconColor'                        => $neutralColor,

				// Button Hover - Text Color
				'crel_notificationBox__button_colorHover'                       => '#F9F9F9',

				// Button Hover - Background Color
				'crel_notificationBox__button_backgroundColorHover'             => '',

				// Button Hover - Icon Color
				'crel_notificationBox__buttonIcon_ColorHover'                   => '#F9F9F9',

				// Border Hover - Color
				'crel_notificationBox__button_borderColorHover'                 => '#cccccc',

			), false )
		);

		return $options;
	}

	private function get_defaults( $options, $apply_defaults = true, $additional_options = [] ) {
		
		if ( $apply_defaults ) {
			$options = array_merge( $this->get_presets_defaults(), $options, $additional_options );
		}
		
		return $options;
	}
	
	protected function get_config_old_defaults() {
		return [
			'crel_notificationBox__title_typography_typography' => 'custom', 
			'crel_notificationBox__title_typography_font_weight' => 'bold',
			'crel_notificationBox__title_typography_font_size' => [ 
				'size' => 25,
				'unit' => 'px',
				'sizes' => []
			],
			'crel_notificationBox__title_typography_font_size_mobile' => [ 
				'size' => 18,
				'unit' => 'px',
				'sizes' => []
			],

			// Description
			
			'crel_notificationBox__desc_typography_font_weight'             => '400',
			'crel_notificationBox__desc_typography_typography'               => 'custom',
			
			'crel_notificationBox__desc_typography_font_size'               => [
				'size' => '16',
				'unit' => 'px',
				'sizes' => []
			],
			
			'crel_notificationBox__desc_typography_font_size_mobile'               => [
				'size' => '14',
				'unit' => 'px',
				'sizes' => []
			],
			
			'crel_notificationBox__desc_typography_line_height_mobile'               => [
				'size' => '1.2',
				'unit' => 'em',
				'sizes' => []
			],
		];
	}

	public function get_first_level_presets() {

		$presets = $this->get_presets_options();
		foreach ( $presets as $label_2 => $options_2 ) {
			if ( ! is_array( $options_2['options'] ) || empty( $options_2['options'] ) ) {
				continue;
			}

			// level 2 e.g. Color
			foreach ( $options_2['options'] as $label_3 => $options_3 ) {
				if ( $label_3 == 'color' || ! is_array( $options_2['options'] ) || empty( $options_2['options'] ) ) {
					continue;
				}

				return $options_3['options'];
			}
		}
	}
	/**
	 * CONTENT tab for this widget
	 */
	protected function register_content_controls() {

		// CONTENT =================================[ TAB ]====================================/


		// ICON / IMAGE ----------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__iconImage__section_content',
			[
				'label' => esc_html__( 'Icon / Image', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT
			]
		);

			// Icon Type selection
			$this->add_control_responsive(
				'crel_notificationBox__icon_type',
				[
					'label' => esc_html__( 'Image or Icon', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options' => [
						'none' => [
							'title' => esc_html__( 'None', 'creative-addons-for-elementor'),
							'icon' => 'fa fa-ban',
						],
						'number' => [
							'title' => esc_html__( 'Number', 'creative-addons-for-elementor'),
							'icon' => 'fa fa-keyboard',
						],
						'icon' => [
							'title' => esc_html__( 'Icon', 'creative-addons-for-elementor'),
							'icon' => 'fa fa-laugh',
						],
						'img' => [
							'title' => esc_html__( 'Image', 'creative-addons-for-elementor'),
							'icon' => 'eicon-slideshow',
						]
					],
					'force_preset' => true
				]
			);

			// Icon Image
			$this->add_control(
				'crel_notificationBox__icon_image',
				[
					'label' => esc_html__( 'Icon Image', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'crel_notificationBox__icon_type' => 'img'
					]
				]
			);

			// Size
			$this->add_control_group(
				Group_Control_Image_Size::get_type(),
				[
					'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
					'condition' => [
						'crel_notificationBox__icon_type' => 'img'
					]
				]
			);

			// Icon Font Icon
			$this->add_control(
				'crel_notificationBox__fontIcon',
				[
					'label' => esc_html__( 'Icon', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::ICONS,
					'condition' => [
						'crel_notificationBox__icon_type' => 'icon'
					],
					'force_preset' => true
				]
			);

			// Icon - Number
			$this->add_control(
				'crel_notificationBox__numberIcon',
				[
					'label' => esc_html__( 'Number', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::TEXT,
					'condition' => [
						'crel_notificationBox__icon_type' => 'number'
					]
				]
			);

		$this->end_controls_section();


		// TITLE -----------------------------------[SECTION]-------------/
		$this->start_controls_section(
			'crel_notificationBox__title__section_content',
			[
				'label' => esc_html__( 'Title', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			// Show Title Toggle
			$this->add_control(
				'crel_notificationBox__title_toggle',
				[
					'label'     => esc_html__( 'Show Title', 'creative-addons-for-elementor'),
					'type'      => Controls_Manager::SWITCHER,
					'label_on'  => esc_html__( 'Yes', 'creative-addons-for-elementor'),
					'label_off' => esc_html__( 'No', 'creative-addons-for-elementor'),
					'force_preset' => true
				]
			);

			// Title
			$this->add_control(
				'crel_notificationBox__title_text',
				[
					'label' => esc_html__( 'Title', 'creative-addons-for-elementor' ),
					'label_block' => true,
					'type' => Controls_Manager::TEXT,

					'placeholder' => esc_html__( 'Type Notification Box Title', 'creative-addons-for-elementor' ),
					'condition'	=> [
						'crel_notificationBox__title_toggle'	=> 'yes'
					]
				]
			);

		$this->end_controls_section();

		// DESCRIPTION -----------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__desc__section_content',
			[
				'label' => esc_html__( 'Description', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			// Description
			$this->add_control(
				'crel_notificationBox__desc_text',
				[
					'label' => esc_html__( 'Description', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
				]
			);

		$this->end_controls_section();


		// BUTTON ----------------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__Button__section_content',
			[
				'label' => esc_html__( 'Link', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			// Show Link Toggle
			$this->add_control(
				'crel_notificationBox__button_toggle',
				[
					'label' => esc_html__( 'Show Link', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'creative-addons-for-elementor'),
					'label_off' => esc_html__( 'No', 'creative-addons-for-elementor'),
					'force_preset' => true
				]
			);

			// Link Text
			$this->add_control(
				'crel_notificationBox__button_text',
				[
					'label' => esc_html__( 'Link Text', 'creative-addons-for-elementor' ),
					'label_block' => true,
					'type' => Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Learn More', 'creative-addons-for-elementor' ),
					'condition'	=> [
						'crel_notificationBox__button_toggle'	=> 'yes'
					]
				]
			);

			// Link URL
			$this->add_control(
				'crel_notificationBox__button_URL',
				[
					'label' => esc_html__( 'Link URL', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::URL,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter link URL for the button', 'creative-addons-for-elementor'),
					'show_external'	=> true,
					'title' => esc_html__( 'Enter heading for the button', 'creative-addons-for-elementor'),
					'condition'	=> [
						'crel_notificationBox__button_toggle'	=> 'yes'
					]
				]
			);

			// Link Icon
			$this->add_control(
				'crel_notificationBox__button_icon',
				[
					'label' => esc_html__( 'Icon', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::ICONS,
					'condition'	=> [
						'crel_notificationBox__button_toggle'	=> 'yes',
					],
					'force_preset' => true
				]
			);


		$this->end_controls_section();
	}

	/**
	 * STYLE tab for this widget
	 */
	protected function register_style_controls() {

		// STYLE ===================================[ TAB ]====================================/

		// Container ---------------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__general__section_style',
			[
				'label' => esc_html__( 'Container', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			// Container Position Style
			$this->add_control(
				'crel_notificationBox__alignment',
				[
					'label'       	=> esc_html__( 'Alignment', 'creative-addons-for-elementor'),
					'type' 			=> Controls_Manager::SELECT,
					'label_block' 	=> false,
					'options' 		=> [
						'crel-notification-box-align--left' 	=> is_rtl() ? esc_html__( 'Right', 'creative-addons-for-elementor') : esc_html__( 'Left', 'creative-addons-for-elementor'),
						'crel-notification-box-align--right'    =>  is_rtl() ? esc_html__( 'Left', 'creative-addons-for-elementor') : esc_html__( 'Right', 'creative-addons-for-elementor'),
					],

				]
			);

			// Container Border Position
			$this->add_control(
				'crel_notificationBox__border_position',
				[
					'label'       	=> esc_html__( 'Border Position', 'creative-addons-for-elementor'),
					'type' 			=> Controls_Manager::SELECT,
					'label_block' 	=> false,
					'options' 		=> [
						'crel-notification-box-border--left' 	=> esc_html__( 'Left', 'creative-addons-for-elementor'),
						'crel-notification-box-border--right'   => esc_html__( 'Right', 'creative-addons-for-elementor'),
						'crel-notification-box-border--all'     => esc_html__( 'All', 'creative-addons-for-elementor'),
					],
					'separator'     => 'before'

				]
			);

			// Container Border Color
			$this->add_control(
				'crel_notificationBox__container_borderColor',
				[
					'label'     => esc_html__( 'Container Border Color', 'creative-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box-container' => 'border-color: {{VALUE}};',
					],
				]
			);

			// Container Border Width
			$this->add_control_responsive(
				'crel_notificationBox__container_widthBorder',
				[
					'label' => esc_html__( 'Container Border Width', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box-container' => 'border-width: {{SIZE}}px;'
					],
					'separator'     => 'after'
				]
			);

			// Background Gradient
			$this->add_control_group(
				Group_Control_Background::get_type(),
				[
					'name' => 'crel_notificationBox__container_backgroundColor',
					'label' => esc_html__( 'Background Gradient', 'plugin-domain' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .crel-notification-box-container',
					'separator' => 'before'
				]
			);

			// Container Radius
			$this->add_control_responsive(
				'crel_notificationBox__container_borderRadius',
				[
					'label' => esc_html__( 'Container Radius', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box-container' => 'border-radius: {{SIZE}}px;'
					],
					'separator' => 'before'
				]
			);

			// Container Padding
			$this->add_control_responsive(
				'crel_notificationBox__container_padding',
				[
					'label' => esc_html__( 'Container Padding', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box-container' => 'padding: {{SIZE}}px;'
					]
				]
			);

			// Container Box Shadow
			$this->add_control_group(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'crel_notificationBox__container_boxShadow',
					'label' => esc_html__( 'Box Shadow', 'creative-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .crel-notification-box-container',
				]
			);

			// Body ( Title, Desc, Button ) Padding Left / Right
			$this->add_control_responsive(
				'crel_notificationBox__body_paddingLeftRight',
				[
					'label' => esc_html__( 'Body Padding ( Left / Right )', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box__body' => 'padding-left: {{SIZE}}px; padding-right: {{SIZE}}px;'
					],
					'separator' => 'before'
				]
			);

			// Body ( Title, Desc, Button ) Padding Top / Bottom
			$this->add_control_responsive(
				'crel_notificationBox__body_paddingTopBottom',
				[
					'label' => esc_html__( 'Body Padding ( Top / Bottom )', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box__body' => 'padding-top: {{SIZE}}px; padding-bottom: {{SIZE}}px;'
					],

				]
			);

		$this->end_controls_section();

		// ICON / IMAGE ----------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__iconImg__section_style',
			[
				'label' => esc_html__( 'Icon / Image', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

			// Icon Position Style
			$this->add_control(
				'crel_notificationBox__icon_alignment',
				[
					'label'       	=> esc_html__( 'Icon Alignment', 'creative-addons-for-elementor'),
					'type' 			=> Controls_Manager::SELECT,
					'label_block' 	=> false,
					'options' 		=> [
						'crel-notification-box-icon-top-aligned' 	=> esc_html__( 'Top', 'creative-addons-for-elementor'),
						'crel-notification-box-icon-center-aligned' => esc_html__( 'Center', 'creative-addons-for-elementor'),
					],

				]
			);

			// Icon Size
			$this->add_control_responsive(
				'crel_notificationBox__icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 20,
							'max' => 1500,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box__icon--icon'                                                => 'font-size: {{SIZE}}px;',
						'{{WRAPPER}} .crel-notification-box__icon--number .crel-notification-box__icon__inner'          => 'font-size: {{SIZE}}px;',
						'{{WRAPPER}} .crel-notification-box__icon--svg .crel-notification-box__icon__inner--svg-icon'   => 'font-size: {{SIZE}}px;',
						'{{WRAPPER}} .crel-notification-box__icon__inner img, 
						 {{WRAPPER}} .crel-notification-box__icon--img .crel-notification-box__icon__inner'	            => 'min-width: {{SIZE}}px;',
						'{{WRAPPER}} .crel-notification-box__icon__inner--svg-icon'	                                    => 'width: {{SIZE}}px;',
					]
				]
			);

			// Icon Margin
			$this->add_control_responsive(
				'crel_notificationBox__icon_margin',
				[
					'label' => esc_html__( 'Margin', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box__icon__inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Icon Padding
			$this->add_control_responsive(
			'crel_notificationBox__icon_padding',
			[
				'label' => esc_html__( 'Padding', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__icon__inner'	=> 'padding: {{SIZE}}px;'
				]
			]
		);

			// Icon Color
			$this->add_control(
				'crel_notificationBox__icon_color',
				[
					'label'     => esc_html__( 'Color', 'creative-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box__icon__inner' => 'color: {{VALUE}};',
						'{{WRAPPER}} .crel-notification-box__icon__inner--svg-icon' => 'fill: {{VALUE}};',
					],
				]
			);

			// Icon Background Color
			$this->add_control(
				'crel_notificationBox__icon_backgroundColor',
				[
					'label' => esc_html__( 'Background Color', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box__icon__inner' => 'background-color: {{VALUE}};',
					],
				]
			);

			// Icon Border Type
			$this->add_control_group(
				Group_Control_Border::get_type(),
				[
					'name' => 'crel_notificationBox__icon_borderType',
					'label' => esc_html__( 'Border', 'creative-addons-for-elementor'),
					'selector' => '{{WRAPPER}} .crel-notification-box__icon__inner'
				]
			);

			// Icon Border Radius
			$this->add_control_responsive(
				'crel_notificationBox__border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-notification-box__icon__inner' => 'border-radius: {{SIZE}}px;'
					]
				]
			);

			// Icon Box Shadow
			$this->add_control_group(
				Group_Control_Box_Shadow::get_type(),
				[
					'label' => esc_html__( 'Icon Shadow', 'creative-addons-for-elementor'),
					'name' => 'crel_notificationBox__icon_shadow',
					'selector' =>
							'{{WRAPPER}} .crel-notification-box__icon__inner',
				]
			);

			// Icon Rotate
			$this->add_control(
				'crel_notificationBox__icon_rotate',
				[
					'label' => esc_html__( 'Rotate', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'deg' ],
					'range' => [
						'deg' => [
							'min' => 0,
							'max' => 360,
						],
					],
					'selectors' => [
						'(desktop){{WRAPPER}} .crel-notification-box__icon__inner' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg);',
						'(tablet){{WRAPPER}} .crel-notification-box__icon__inner' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg);',
						'(mobile){{WRAPPER}} .crel-notification-box__icon__inner' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg);',
					],
				]
			);

		$this->end_controls_section();

		// TITLE -----------------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__title__section_style',
			[
				'label' => esc_html__( 'Title', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'crel_notificationBox__title_toggle'	=> 'yes'
				]
			]
		);

		// Title Margin Top
		$this->add_control_responsive(
			'crel_notificationBox__title_marginTop',
			[
				'label' => esc_html__( 'Margin Top', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__title' => 'margin-top: {{SIZE}}px;',
				]
			]
		);

		// Title Margin Bottom
		$this->add_control_responsive(
			'crel_notificationBox__title_marginBottom',
			[
				'label' => esc_html__( 'Margin Bottom', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__title' => 'margin-bottom: {{SIZE}}px;',
				]
			]
		);

		// Title Color
		$this->add_control(
			'crel_notificationBox__title_color',
			[
				'label' => esc_html__( 'Text Color', 'creative-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__title' => 'color: {{VALUE}};',
				],
			]
		);


		// Title Typography
		$this->add_control_group(
			Group_Control_Typography::get_type(),
			[
				'name' => 'crel_notificationBox__title_typography',
				'selector' => '{{WRAPPER}} .crel-notification-box__body__title',
			]
		);


		$this->end_controls_section();

		// DESCRIPTION -----------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__style__section_content',
			[
				'label' => esc_html__( 'Description', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Desc Margin Bottom
		$this->add_control_responsive(
			'crel_notificationBox__desc_marginBottom',
			[
				'label' => esc_html__( 'Margin Bottom', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__desc' => 'margin-bottom: {{SIZE}}px;',
				]
			]
		);

		// Desc Color
		$this->add_control(
			'crel_notificationBox__desc_color',
			[
				'label' => esc_html__( 'Text Color', 'creative-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__desc' => 'color: {{VALUE}};',
				],
			]
		);

		// Desc Typography
		$this->add_control_group(
			Group_Control_Typography::get_type(),
			[
				'name' => 'crel_notificationBox__desc_typography',
				'selector' => '{{WRAPPER}} .crel-notification-box__body__desc p, {{WRAPPER}} .crel-notification-box__body__desc',
				'fields_options' => [],
			]
		);


		$this->end_controls_section();

		// BUTTON ----------------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_notificationBox__button__section_style',
			[
				'label' => esc_html__( 'Link', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Button Padding Left / Right
		$this->add_control_responsive(
			'crel_notificationBox__button_paddingLeftRight',
			[
				'label' => esc_html__( 'Padding ( Left / Right )', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__learn-more-btn a' => 'padding-left: {{SIZE}}px; padding-right: {{SIZE}}px;'
				]
			]
		);

		// Button Padding Top / Bottom
		$this->add_control_responsive(
			'crel_notificationBox__button_paddingTopBottom',
			[
				'label' => esc_html__( 'Padding ( Top / Bottom )', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__learn-more-btn a' => 'padding-top: {{SIZE}}px; padding-bottom: {{SIZE}}px;'
				],
				'separator' => 'after'
			]
		);

		// Button Margin Bottom
		$this->add_control_responsive(
			'crel_notificationBox__button_marginBottom',
			[
				'label' => esc_html__( 'Margin Bottom', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__learn-more-btn' => 'margin-bottom: {{SIZE}}px;',
				]
			]
		);

		// Button Typography
		$this->add_control_group(
			Group_Control_Typography::get_type(),
			[
				'name' => 'crel_notificationBox__button_typography',
				'selector' => '{{WRAPPER}} .crel-notification-box__body__learn-more-btn a',
			]
		);

		// Button Border Type
		$this->add_control_group(
			Group_Control_Border::get_type(),
			[
				'name'      => 'crel_notificationBox__button_borderType',
				'label'     => esc_html__( 'Border', 'creative-addons-for-elementor'),
				'selector'  => '{{WRAPPER}} .crel-notification-box__body__learn-more-btn a',
				'separator' => 'before'
			]
		);

		// Button Border Radius
		$this->add_control_responsive(
			'crel_notificationBox__button_borderRadius',
			[
				'label'     => esc_html__( 'Border Radius', 'creative-addons-for-elementor'),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__learn-more-btn a' => 'border-radius: {{SIZE}}px;'
				],
				'separator' => 'after'
			]
		);

		// Button Icon Size
		$this->add_control_responsive(
			'crel_notificationBox__button_iconSize',
			[
				'label' => esc_html__( 'Icon Size', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-notification-box__body__learn-more-btn .crel-notification-box__body__learn-more-btn__icon' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .crel-notification-box__body__learn-more-btn svg' => 'width: {{SIZE}}px;'
				]
			]
		);

		// Space Between Icon and Text
		$this->add_control_responsive(
			'crel_notificationBox__button_textSpace',
			[
				'label' => esc_html__( 'Space Between Icon and Text', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'html:not([dir=rtl]) {{WRAPPER}} .crel-notification-box__body__learn-more-btn__text' => 'margin-right: {{SIZE}}px;',
					'[dir=rtl] {{WRAPPER}} .crel-notification-box__body__learn-more-btn__text' => 'margin-left: {{SIZE}}px;'
				]
			]
		);

		// Button Icon Spacing
		$this->add_control(
			'crel_notificationBox__buttonIcon_spacing',
			[
				'label' => esc_html__( 'Icon Spacing', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 60,
					],
				],
				'condition' => [
					'eael_infobox_button_icon_new!' => '',
					'eael_show_infobox_button'	=> 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .eael_infobox_button_icon_right' => 'margin-left: {{SIZE}}px;',
					'{{WRAPPER}} .eael_infobox_button_icon_left' => 'margin-right: {{SIZE}}px;',
				],
			]
		);

		$this->start_controls_tabs( '_tabs_button' );

			// Normal Tab ----------------------------/
			$this->start_controls_tab(
				'crel_notificationBox__tabButton_normal_content',
				[
					'label' => esc_html__( 'Normal', 'creative-addons-for-elementor' ),
				]
			);

				// Button Text Color
				$this->add_control(
					'crel_notificationBox__button_color',
					[
						'label' => esc_html__( 'Text Color', 'creative-addons-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn a' => 'color: {{VALUE}};',
						],

					]
				);

				// Button Background Color
				$this->add_control(
					'crel_notificationBox__button_backgroundColor',
					[
						'label' => esc_html__( 'Background Color', 'creative-addons-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn a' => 'background-color: {{VALUE}};',
						],
					]
				);

				// Button Icon Color
				$this->add_control(
					'crel_notificationBox__button_iconColor',
					[
						'label' => esc_html__( 'Icon Color', 'creative-addons-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn__icon' => 'color: {{VALUE}};',
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn svg' => 'fill: {{value}};'
						],
					]
				);

			$this->end_controls_tab();

			// Hover Tab -----------------------------/
			$this->start_controls_tab(
				'crel_notificationBox__tabButton_hover',
				[
					'label' => esc_html__( 'Hover', 'creative-addons-for-elementor' ),
				]
			);

				// Button Hover - Text Color
				$this->add_control(
					'crel_notificationBox__button_colorHover',
					[
						'label' => esc_html__( 'Text Color', 'creative-addons-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn a:hover' => 'color: {{VALUE}};',
						],
					]
				);

				// Button Hover - Background Color
				$this->add_control(
					'crel_notificationBox__button_backgroundColorHover',
					[
						'label' => esc_html__( 'Background Color', 'creative-addons-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn a:hover' => 'background-color: {{VALUE}};',
						],
					]
				);

				// Button Hover - Icon Color
				$this->add_control(
					'crel_notificationBox__buttonIcon_ColorHover',
					[
						'label' => esc_html__( 'Icon Color', 'creative-addons-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn:hover .crel-notification-box__body__learn-more-btn__icon' => 'color: {{VALUE}};',
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn:hover svg' => 'fill: {{VALUE}};',
						],
					]
				);

				// Border Hover - Color
				$this->add_control(
					'crel_notificationBox__button_borderColorHover',
					[
						'label' => esc_html__( 'Border Color', 'creative-addons-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .crel-notification-box__body__learn-more-btn:hover a' => 'border-color: {{VALUE}};',
						],
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render_notification_box_title() {
		$settings = $this->get_settings_for_display();

		$title                  = sanitize_text_field($settings['crel_notificationBox__title_text']);
		
		$this->add_render_attribute( 'crel_notificationBox__title_text', [
			'class' => [ 'crel-notification-box__body__title' ]
		] );

		$this->add_inline_editing_attributes( 'crel_notificationBox__title_text', 'none' );
		
		if ( $settings['crel_notificationBox__title_toggle'] === 'yes' ) {
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<span ' . $this->get_render_attribute_string( 'crel_notificationBox__title_text' ) . '>' . esc_html( $title ) . '</span>';
		}
	}

	/**
	 * Renders the Icon / Image HTML
	 */
	protected function render_notification_box_icon() {
		$settings = $this->get_settings_for_display();

		// ICON / IMAGE -----------------------------/
		$main_icon              = $settings['crel_notificationBox__fontIcon'];
		$icon_type              = esc_attr($settings['crel_notificationBox__icon_type']);
		$number                 = esc_attr($settings['crel_notificationBox__numberIcon']);
		$image_data             = $settings['crel_notificationBox__icon_image'];

		switch ($icon_type) {
			case 'none':
				echo "";
				break;

			case 'number': 
				$this->add_render_attribute( 'crel_notificationBox__numberIcon', [
					'class' => [ 'crel-notification-box__icon__inner' ]
				] );
			
				$this->add_inline_editing_attributes( 'crel_notificationBox__numberIcon', 'none' );			?>

				<div class="crel-notification-box__icon crel-notification-box__icon--number">
					<div <?php
						//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $this->get_render_attribute_string( 'crel_notificationBox__numberIcon' ); ?>><?php echo esc_html( $number ); ?></div>
				</div>				<?php
				break;

			case 'icon':

				// Elementor Ongoing Experiments - Inline Font Icons setting
				$suffix = 'icon';
				$class  = 'crel-notification-box__icon__inner';
				$is_inline_font_icons = false;
				$instance = Utilities_Plugin::elementor();
				if ( $instance && method_exists( $instance->experiments, 'is_feature_active' ) ) {
					$is_inline_font_icons = $instance->experiments->is_feature_active( 'e_font_icon_svg' );
					$suffix = $is_inline_font_icons ? 'svg' : 'icon';
					$class  = $is_inline_font_icons ? 'crel-notification-box__icon__inner--svg-icon' : 'crel-notification-box__icon__inner';
				}   ?>

				<div class="crel-notification-box__icon crel-notification-box__icon--<?php echo esc_attr( $suffix ); ?>">       <?php
					if ( $is_inline_font_icons ) {
						echo '<div class="crel-notification-box__icon__inner">';
					}
					Icons_Manager::render_icon( $main_icon, array( 'class' => $class ), 'div' );
					if ( $is_inline_font_icons ) {
						echo '</div>';
					} ?>
				</div>  <?php

				break;

			case 'img':

				$style = '';
				$srcset = '';

				if ( $image_data['id'] ) {

					// not a placeholder image
					$meta_data = get_post_meta( $image_data['id'], '_wp_attachment_image_alt', true );
					if ( empty($meta_data) ) {
						$image_alt = '';
					} else {
						$image_alt = trim( wp_strip_all_tags( $meta_data ) );
					}

					$image_url = Group_Control_Image_Size::get_attachment_image_src( $image_data['id'], 'image', $settings );

					$srcset = ( $settings['image_size'] == 'custom' ) ? '' : wp_get_attachment_image_srcset( $image_data['id'], $settings['image_size']);
					if ( $srcset ) $srcset = 'srcset="' . $srcset . '"';

				} else {
					$image_alt = '';
					$image_url = $this->filter_image_url( $image_data['url'] );
				}

				if ( $settings['image_size'] == 'custom' ) {
					if ( ! empty( $settings['image_custom_dimension']['width'] ) ) {
						$style .= ' max-width: ' . $settings['image_custom_dimension']['width'] . 'px; ';
					}

					if ( ! empty( $settings['image_custom_dimension']['height'] ) ) {
						$style .= ' max-height: ' . $settings['image_custom_dimension']['height'] . 'px; ';
					}
				} else {
					foreach ( $this->get_image_sizes() as $size_name => $size_data ) {
						if ( $settings['image_size'] == $size_name ) {
							$style = ( $size_data['width'] ? 'max-width: ' . $size_data['width'] . 'px; ' : '' ) . ( $size_data['height'] ? 'max-height: ' . $size_data['height'] . 'px; ' : '' );
						}
					}
				}

				if ( ! $image_url ) {
					$image_url = Utils::get_placeholder_image_src();
				}				?>

				<div class="crel-notification-box__icon crel-notification-box__icon--img">
					<div class="crel-notification-box__icon__inner" style="<?php echo esc_attr( $style ); ?>"><img src=<?php echo esc_url( $image_url ); ?> alt="<?php echo esc_attr( $image_alt ); ?> <?php echo esc_attr( $srcset ); ?> loading="lazy"></div>
				</div>				<?php
				break;
		}
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		//GENERAL
		$main_alignment         = esc_attr($settings['crel_notificationBox__alignment']);
		$main_border_position   = esc_attr($settings['crel_notificationBox__border_position']);

		// ICON
		$icon_position          = esc_attr($settings['crel_notificationBox__icon_alignment']);

		// TITLE & DESCRIPTION ----------------------/
		$desc                   = wp_kses_post($settings['crel_notificationBox__desc_text']);

		// BUTTON ----------------------------------/
		$button_active          = esc_attr($settings['crel_notificationBox__button_toggle']);
		$button_text            = esc_attr($settings['crel_notificationBox__button_text']);
		$button_url             = is_array( $settings['crel_notificationBox__button_URL'] ) ? esc_url($settings['crel_notificationBox__button_URL']['url']) : '';
		$button_url_external    = is_array( $settings['crel_notificationBox__button_URL'] ) ? esc_attr($settings['crel_notificationBox__button_URL']['is_external']) : '';
		$button_url_nofollow    = is_array( $settings['crel_notificationBox__button_URL'] ) ? esc_attr($settings['crel_notificationBox__button_URL']['nofollow']) : '';
		$button_icon            = $settings['crel_notificationBox__button_icon'];  // array		?>

		<!-- Notification Box -->
		<div class="crel-notification-box-container <?php echo esc_attr( $main_alignment . ' ' . $main_border_position . ' ' . $icon_position ); ?>">			<?php

			$this->render_notification_box_icon(); ?>

			<div class="crel-notification-box__body"><?php 
				
				$this->render_notification_box_title(); 
					
				$this->add_render_attribute( 'crel_notificationBox__desc_text', [
					'class' => [ 'crel-notification-box__body__desc' ]
				] );

				$this->add_inline_editing_attributes( 'crel_notificationBox__desc_text', 'advanced' ); ?>

				<div <?php
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $this->get_render_attribute_string( 'crel_notificationBox__desc_text' ); ?>><?php echo wp_kses_post( $desc ); ?></div>				<?php

				if ( $button_active === 'yes' ) { ?>
					<span class="crel-notification-box__body__learn-more-btn">
						<a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_url( $button_url_external ); ?>" rel="<?php echo esc_url( $button_url_nofollow ); ?>"><?php
							$this->add_render_attribute( 'crel_notificationBox__button_text', [
								'class' => [ 'crel-notification-box__body__learn-more-btn__text' ]
							] );

							$this->add_inline_editing_attributes( 'crel-notification-box__body__learn-more-btn__text', 'none' ); ?>
							
							<span <?php
								//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								echo $this->get_render_attribute_string( 'crel_notificationBox__button_text' ); ?>><?php echo esc_html( $button_text ); ?></span>
							<?php Icons_Manager::render_icon( $button_icon, array('class' => 'crel-notification-box__body__learn-more-btn__icon' ), 'span' ); ?>
						</a>
					</span>				<?php
				} ?>

			</div>

		</div>		<?php
	}
	
	/**
	 * Dynamically render Notification Box
	 */
	protected function content_template() {		?>
	
	<!-- Notification Box -->
		<div class="crel-notification-box-container {{{ settings.crel_notificationBox__alignment }}} {{{ settings.crel_notificationBox__icon_alignment }}} {{{ settings.crel_notificationBox__border_position }}}">

			<?php $this->render_js_notification_box_icon(); ?>

			<div class="crel-notification-box__body">				<?php

				$this->render_js_notification_box_title(); ?><#
				
				view.addRenderAttribute( 'crel_notificationBox__desc_text',	{
					'class': [ 'crel-notification-box__body__desc' ],
				} );

				view.addInlineEditingAttributes( 'crel_notificationBox__desc_text', 'advanced' ); #>
				
				<div {{{ view.getRenderAttributeString( 'crel_notificationBox__desc_text' ) }}}>{{{ settings.crel_notificationBox__desc_text }}}</div>				<#

				if ( settings.crel_notificationBox__button_toggle == 'yes' ) { #>
					<span class="crel-notification-box__body__learn-more-btn">
						<a href="{{{ settings.crel_notificationBox__button_URL.url }}}"><# 
							view.addRenderAttribute( 'crel_notificationBox__button_text',	{
								'class': [ 'crel-notification-box__body__learn-more-btn__text' ],
							} );

							view.addInlineEditingAttributes( 'crel_notificationBox__button_text', 'none' ); #>
							<span {{{ view.getRenderAttributeString( 'crel_notificationBox__button_text' ) }}}>{{{ settings.crel_notificationBox__button_text }}}</span>
							{{{ elementor.helpers.renderIcon( view, settings.crel_notificationBox__button_icon, { 'class' : 'crel-notification-box__body__learn-more-btn__icon' }, 'span' , 'object' ).value }}}
						</a>
					</span><#
				} #>

			</div>

		</div>		<?php
	} 
	
	protected function render_js_notification_box_icon() { ?> <#

		switch ( settings.crel_notificationBox__icon_type ) {
			case 'none':
				break;

			case 'number': 
				view.addRenderAttribute( 'crel_notificationBox__numberIcon',	{
					'class': [ 'crel-notification-box__icon__inner' ],
				} );
				
				view.addInlineEditingAttributes( 'crel_notificationBox__numberIcon', 'none' );
			#>
				<div class="crel-notification-box__icon crel-notification-box__icon--number">
					<div {{{ view.getRenderAttributeString( 'crel_notificationBox__numberIcon' ) }}}>{{{ settings.crel_notificationBox__numberIcon }}}</div>
				</div><#
			break;

		case 'icon': #> <?php

				// Elementor Ongoing Experiments - Inline Font Icons setting
				$suffix = 'icon';
				$class  = 'crel-notification-box__icon__inner';
				$is_inline_font_icons = false;
				$instance = Utilities_Plugin::elementor();
				if ( $instance && method_exists( $instance->experiments, 'is_feature_active' ) ) {
					$is_inline_font_icons = $instance->experiments->is_feature_active( 'e_font_icon_svg' );
					$suffix = $is_inline_font_icons ? 'svg' : 'icon';
					$class  = $is_inline_font_icons ? 'crel-notification-box__icon__inner--svg-icon' : 'crel-notification-box__icon__inner';
				}

				echo '<div class="crel-notification-box__icon crel-notification-box__icon--' . esc_attr( $suffix ) . '">';
					if ( $is_inline_font_icons ) {
						echo '<div class="crel-notification-box__icon__inner">';
					} ?>
					{{{ elementor.helpers.renderIcon( view, settings.crel_notificationBox__fontIcon, { 'class' : '<?php echo esc_attr( $class ); ?>' }, 'div' , 'object' ).value }}} <?php
					if ( $is_inline_font_icons ) {
						echo '</div>';
					}
				echo '</div>'; ?> <#

				break;

			case 'img':

				let image_url = '';
				let style = '';				<?php

				$image_sizes = $this->get_image_sizes();
				foreach ( $image_sizes as $size_name => $size_data ) { ?>
					if ( settings.image_size == '<?php echo esc_attr( $size_name ); ?>' ) {
						style = '<?php
						echo $size_data['width'] ? 'max-width: ' . esc_attr( $size_data['width'] ) . 'px; ' : ' ';
						echo $size_data['height'] ? 'max-height: ' . esc_attr( $size_data['height'] ) . 'px; ' : ' '; ?>';
					}				<?php
				} ?>

				if ( settings.image_size == 'custom' && typeof settings.image_custom_dimension == 'object' ) {
					if ( typeof settings.image_custom_dimension.width != 'undefined' && settings.image_custom_dimension.width ) {
						style += ' max-width: ' + settings.image_custom_dimension.width + 'px; ';
					}

					if ( typeof settings.image_custom_dimension.height != 'undefined' && settings.image_custom_dimension.height ) {
						style += ' max-height: ' + settings.image_custom_dimension.height + 'px; ';
					}
				}

				if ( typeof settings.crel_notificationBox__icon_image.id == 'undefined' || ! settings.crel_notificationBox__icon_image.id ) {
					image_url = '<?php echo esc_url( Utils::get_placeholder_image_src() ); // if user did not choose yet an image ?>';
				} else {
					let image = {
						id: settings.crel_notificationBox__icon_image.id,
						url: settings.crel_notificationBox__icon_image.url,
						size: settings.image_size,
						dimension: settings.image_custom_dimension,
						model: view.getEditModel()
					}
					image_url = elementor.imagesManager.getImageUrl( image );
				}

				if ( ! image_url ) {
					image_url = '<?php echo esc_url( Utils::get_placeholder_image_src() ); ?>';
				} #>
					<div class="crel-notification-box__icon crel-notification-box__icon--img">
						<div style="{{{style}}}" class="crel-notification-box__icon__inner"><img src="{{{ image_url }}}"></div>
					</div><#

				break;
		} #>		<?php
	}
	
	protected function render_js_notification_box_title() { ?> <#
		if ( settings.crel_notificationBox__title_toggle == 'yes' )  { 
			view.addRenderAttribute( 'crel_notificationBox__title_text',	{
				'class': [ 'crel-notification-box__body__title' ],
			} );
			
			view.addInlineEditingAttributes( 'crel_notificationBox__title_text', 'none' );
		#>
			<span {{{ view.getRenderAttributeString( 'crel_notificationBox__title_text' ) }}}>{{{ settings.crel_notificationBox__title_text }}}</span><#
		} #> <?php 
	}
}
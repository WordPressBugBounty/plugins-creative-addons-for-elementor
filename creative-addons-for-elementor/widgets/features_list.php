<?php
namespace Creative_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

defined( 'ABSPATH' ) || exit();

/**
 * Features List widget for Elementor
 */
class Features_List extends Creative_Widget_Base {


	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Features List', 'creative-addons-for-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'crelfont crel-feature-list-icon';
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
		return [ 'features', 'list' ];
	}

	protected function get_config_defaults() {
		return [
			'crel_features_list__title'                                 => esc_html__( 'Features List Title', 'creative-addons-for-elementor' ),
			'crel_features_list__title__HTML_tag'                         => 'h4',
			'crel_features_list__subtitle'                              => '',
			'crel_features_list__title_toggle'                           => 'yes',
			'crel_features_list__title__border_border'              => 'none',
			'crel_features_list__title__borderRadius'               => [
				'size'  => 0,
				'unit'  => 'px',
				'sizes' => []
			],
			'crel_features_list__top_description_toggle'                           => 'yes',
			'crel_features_list__top_description'                       => '',
			'crel_features_list__list'                                  => [
				[
					'crel_features_list__item_title'     => esc_html__( 'Save time and focus on your core business', 'creative-addons-for-elementor' ),
					'crel_features_list__item_icon'       => [
						'value'   => 'fas fa-check',
						'library' => 'fa-solid',
					],
					'crel_features_list__item_link_text' => ''
				],
				[
					'crel_features_list__item_title'    => esc_html__( 'Engage your website visitors and gain new customers', 'creative-addons-for-elementor' ),
					'crel_features_list__item_icon'       => [
						'value'   => 'fas fa-check',
						'library' => 'fa-solid',
					],
					'crel_features_list__item_text'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa enim esse excepturi nemo nesciunt officia officiis optio.', 'creative-addons-for-elementor' ),
					'crel_features_list__item_link_url' => '#'
				],
				[
					'crel_features_list__item_title'      => esc_html__( 'Provide the best content and information tailored to your website pages.', 'creative-addons-for-elementor' ),
					'crel_features_list__item_icon'       => [
						'value'   => 'fas fa-check',
						'library' => 'fa-solid',
					],
				],
			],
			'crel_features_list__bottom_description_toggle'                           => 'yes',
			'crel_features_list__bottom_description'                    => esc_html__( '$99 / per year (ex. VAT ) All Premium features are aimed at saving you time. Use the Workouts to start optimizing quickly.', 'creative-addons-for-elementor' ),
			'crel_features_list__link_toggle'                           => 'yes',
			'crel_features_list__link_text'                             => esc_html__( 'Link Text', 'creative-addons-for-elementor' ),
			'crel_features_list__container__background'                 => '',
			'crel_features_list__container__border_border'              => 'none',
			'crel_features_list__container__borderRadius'               => [
				'size'  => 0,
				'unit'  => 'px',
				'sizes' => []
			],
			'crel_features_list__container__box_shadow_box_shadow'      => [
				'horizontal' => 0,
				'vertical'   => 0,
				'blur'       => 12,
				'spread'     => - 5,
				'color'      => '#000000B3',
			],
			'crel_features_list__container__box_shadow_box_shadow_type' => [
				'box_shadow_type' => [
					'default' => 'no',
				],
			],
			'crel_features_list__container_align'                       => 'left',
			'crel_features_list__header_alignment'                      => 'center',
			'crel_features_list__header_background_background'          => 'gradient',
			'crel_features_list__header_background_color'               => '#6C737C',
			'crel_features_list__header_background_color_b'             => '#54595F',
			'crel_features_list__header_padding'                        => [
				'top'      => '10',
				'right'    => '10',
				'bottom'   => '10',
				'left'     => '10',
				'isLinked' => false,
				'unit'     => 'px'
			],
			'crel_features_list__header_color'                          => '#fff',
			'crel_features_list__header_subtitle_color'                 => '#fff',

			'crel_features_list__header_box_shadow_box_shadow'      => [
				'horizontal' => 0,
				'vertical'   => 4,
				'blur'       => 12,
				'spread'     => - 5,
				'color'      => '#000000B3',
			],
			'crel_features_list__header_box_shadow_box_shadow_type' => [
				'box_shadow_type' => [
					'default' => 'no',
				],
			],
			'crel_features_list__description_padding'               => [
				'top'      => '10',
				'right'    => '10',
				'bottom'   => '10',
				'left'     => '10',
				'isLinked' => false,
				'unit'     => 'px'
			],

			'crel_features_list__container_padding' => [
				'top'      => '10',
				'right'    => '10',
				'bottom'   => '10',
				'left'     => '10',
				'isLinked' => false,
				'unit'     => 'px'
			],

			'crel_features_list__item_padding' => [
				'top'      => '0',
				'right'    => '0',
				'bottom'   => '10',
				'left'     => '0',
				'isLinked' => false,
				'unit'     => 'px'
			],

			'crel_features_list__features__icon_size' => [
				'size'  => '18',
				'unit'  => 'px',
				'sizes' => []
			],

			'crel_features_list__features_alignment'                      => 'left',

			'crel_features_list__features_border'              => 'none',
			'crel_features_list__features_border_radius'               => [
				'size'  => 0,
				'unit'  => 'px',
				'sizes' => []
			],
			'crel_features_list__features_margin_bottom' => [
				'size'  => '10',
				'unit'  => 'px',
				'sizes' => []
			],

			'crel_features_list__button_color'                 => '#fff',
			'crel_features_list__button_background_background' => 'gradient',
			'crel_features_list__button_background_color'      => '#1565C0',
			'crel_features_list__button_background_color_b'    => '#1455A1',
			'crel_features_list__button_border_radius'         => [
				'top'    => '10',
				'left'   => '10',
				'right'  => '10',
				'bottom' => '10',
				'unit'   => 'px'
			],

			'crel_features_list__button_padding' => [
				'top'      => '10',
				'right'    => '10',
				'bottom'   => '10',
				'left'     => '10',
				'isLinked' => false,
				'unit'     => 'px'
			],

			'crel_features_list__button_margin' => [
				'top'      => '10',
				'right'    => '10',
				'bottom'   => '10',
				'left'     => '10',
				'isLinked' => false,
				'unit'     => 'px'
			],
		];
	}

	protected function get_config_rtl_defaults() {
		return [];
	}

	// get_config_defaults until preset defaults are the same as config defaults
	protected function get_presets_defaults() {
		return $this->get_config_defaults();
	}

	// get_config_defaults until preset defaults are the same as config defaults
	protected function get_presets_rtl_defaults() {
		return $this->get_config_rtl_defaults();
	}

	/**
	 * Return presets for this widget
	 */
	public function get_presets_options() {
		$options = array();

		$options['default'] = array(
			'title' => 'Design 1',
			'preview_url'   => $this->presets_preview_url( 'features-list-design-1.jpg' ),
			'options' => array()
		);

		// Design 2
		$options['design-2'] = array(
			'title' => 'Design 2',
			'preview_url'   => $this->presets_preview_url( 'features-list-design-2.jpg' ),
			'options' => array(

				'crel_features_list__title_toggle'                  => 'no',
				'crel_features_list__top_description_toggle'        => 'no',
				'crel_features_list__bottom_description_toggle'     => 'yes',
				'crel_features_list__features__desc_color'          => '#5c5c5c',
                'crel_features_list__button_color'                  => '#1B1B1B',
				'crel_features_list__button_background_background'  => 'classic',
                'crel_features_list__button_background_color'       => '#FEC228',
				'crel_features_list__button_border_border'          => 'solid',
				'crel_features_list__button_border_color'           => '#CB9B20',
				'crel_features_list__button_border_width'           => [
					'top'       => '0',
					'right'     => '0',
					'bottom'    => '5',
					'left'      => '0',
					'isLinked'  => false,
					'unit'      => 'px'
				],
				'crel_features_list__button_border_radius'          => [
					'top'    => '10',
					'left'   => '10',
					'right'  => '10',
					'bottom' => '10',
					'unit'   => 'px'
				],
				'crel_features_list__button_padding'                => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'isLinked' => false,
					'unit'     => 'px'
				],
				'crel_features_list__button_margin'                 => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'isLinked' => false,
					'unit'     => 'px'
				],
            )
		);
		// Design 3
		$options['design-3'] = array(
			'title' => 'Design 3',
			'preview_url'   => $this->presets_preview_url( 'features-list-design-3.jpg' ),
			'options' => array(

				'crel_features_list__container__box_shadow_box_shadow'      => [
					'horizontal' => 0,
					'vertical'   => 0,
					'blur'       => 0,
					'spread'     => 0,
					'color'      => '#000000B3',
				],
				'crel_features_list__container__box_shadow_box_shadow_type' => [
					'box_shadow_type' => [
						'default' => 'no',
					],
				],
				'crel_features_list__title_toggle'                          => 'yes',
				'crel_features_list__header_alignment'                      => 'left',
				'crel_features_list__header_background_background'          => 'classic',
				'crel_features_list__header_color'                          => '#A4269F',
				'crel_features_list__header_background_color'               => '#FFFFFF',
				'crel_features_list__header_box_shadow_box_shadow'          => [
					'horizontal' => 0,
					'vertical'   => 0,
					'blur'       => 0,
					'spread'     => 0,
					'color'      => '#000000B3',
				],
				'crel_features_list__title__border_border'                  => 'solid',
				'crel_features_list__title__border_color'                   => '#D3D3D3',
				'crel_features_list__title__border_width'                   => [
					'top'       => '0',
					'right'     => '0',
					'bottom'    => '1',
					'left'      => '0',
					'isLinked'  => false,
					'unit'      => 'px'
				],
				'crel_features_list__top_description_toggle'                => 'no',
				'crel_features_list__bottom_description_toggle'             => 'no',
				'crel_features_list__features__desc_color'                  => '#5c5c5c',
				'crel_features_list__container_padding'                     => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'isLinked' => false,
					'unit'     => 'px'
				],
				'crel_features_list__item_padding'                          => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'isLinked' => false,
					'unit'     => 'px'
				],
				'crel_features_list__features_border_border'                => 'solid',
				'crel_features_list__features_border_color'                 => '#D3D3D3',
				'crel_features_list__features_border_width'                 => [
					'top'       => '0',
					'right'     => '0',
					'bottom'    => '1',
					'left'      => '0',
					'isLinked'  => false,
					'unit'      => 'px'
				],
				'crel_features_list__features_height'                       => [
					'size' => '102',
					'unit' => 'px',
					'sizes' => []
				],
				'crel_features_list__link_toggle'                           => 'no',

			)
		);

		return $options;
	}

	/**
	 * CONTENT tab for this widget
	 */
	protected function register_content_controls() {

		// CONTENT =================================[ TAB ]====================================/

		// HEADER ------------------------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_features_list__header__section_content',
			[
				'label' => esc_html__( 'Header', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'crel_features_list__title',
				[
					'label'         => esc_html__( 'Title', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::TEXT,
					'condition' => [
						'crel_features_list__title_toggle' => 'yes'
					]
				]
			);

			$this->add_control(
				'crel_features_list__title__HTML_tag',
				[
					'label' => esc_html__( 'Title HTML Tag', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'h1'  => [
							'title' => 'H1',
							'icon' => 'eicon-editor-h1'
						],
						'h2'  => [
							'title' => 'H2',
							'icon' => 'eicon-editor-h2'
						],
						'h3'  => [
							'title' => 'H3',
							'icon' => 'eicon-editor-h3'
						],
						'h4'  => [
							'title' => 'H4',
							'icon' => 'eicon-editor-h4'
						],
						'h5'  => [
							'title' => 'H5',
							'icon' => 'eicon-editor-h5'
						],
						'h6'  => [
							'title' => 'H6',
							'icon' => 'eicon-editor-h6'
						]
					],
					'toggle' => false,
					'condition' => [
						'crel_features_list__title_toggle' => 'yes'
					]
				]
			);

			$this->add_control(
				'crel_features_list__subtitle',
				[
					'label'         => esc_html__( 'Subtitle', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::TEXT,
					'condition' => [
						'crel_features_list__title_toggle' => 'yes'
					]
				]
			);

			$this->add_control(
				'crel_features_list__title_toggle',
				[
					'label' => esc_html__( 'Show Header', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on'  => esc_html__( 'Yes', 'creative-addons-for-elementor' ),
					'label_off' => esc_html__( 'No', 'creative-addons-for-elementor' ),
					'default' => 'yes',
					'force_preset' => true
				]
			);

		$this->end_controls_section();

		// BODY ------------------------------------------[SECTION]-------------/

		$this->start_controls_section(
			'crel_features_list__top_description__section_content',
			[
				'label' => esc_html__( 'Top Description', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'crel_features_list__top_description_toggle',
				[
					'label' => esc_html__( 'Show Description', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on'  => esc_html__( 'Yes', 'creative-addons-for-elementor' ),
					'label_off' => esc_html__( 'No', 'creative-addons-for-elementor' ),
					'default' => 'yes',
					'force_preset' => true
				]
			);

			$this->add_control(
				'crel_features_list__top_description',
				[
					'label'         => esc_html__( 'Description', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::WYSIWYG,
					'condition' => [
						'crel_features_list__top_description_toggle' => 'yes'
					]
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'crel_features_list__list__section_content',
			[
				'label' => esc_html__( 'Features List', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$list = new Repeater();

			$list->add_control(
				'crel_features_list__item_title',
				[
					'label'         => esc_html__( 'Title', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::TEXT,
					'default'   => esc_html__( 'Item', 'creative-addons-for-elementor' ),
				]
			);

			$list->add_control(
				'crel_features_list__item_text',
				[
					'label'         => esc_html__( 'Text', 'creative-addons-for-elementor'),
					'type'          => Controls_Manager::TEXTAREA,
					'label_block'   => true,
				]
			);

			$list->add_control(
				'crel_features_list__item_info_icon__toggle',
				[
					'label' => esc_html__( 'Show Info Icon', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on'  => esc_html__( 'Yes', 'creative-addons-for-elementor' ),
					'label_off' => esc_html__( 'No', 'creative-addons-for-elementor' ),
					'default' => 'yes'
				]
			);

			// Icon Type selection
			$list->add_control(
				'crel_features_list__item_info_icon_type',
				[
					'label' => esc_html__( 'Image or Icon', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options' => [
						'none' => [
							'title' => esc_html__( 'None', 'creative-addons-for-elementor'),
							'icon' => 'fa fa-ban',
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
					'default' => 'icon'
				]
			);

			// Icon Image
			$list->add_control(
				'crel_features_list__item_info_image',
				[
					'label' => esc_html__( 'Icon Image', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'crel_features_list__item_info_icon_type' => 'img'
					]
				]
			);

			// Size
			$list->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
					'condition' => [
						'crel_features_list__item_info_icon_type' => 'img'
					]
				]
			);

			$list->add_control(
				'crel_features_list__item_icon',
				[
					'label' => esc_html__( 'Icon', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::ICONS,
					'fa4compatibility' => 'icon',
					'default' => [
						'value' => 'fas fa-check-circle',
						'library' => 'fa-solid',
					],
					'condition' => [
						'crel_features_list__item_info_icon_type' => 'icon'
					]
				]
			);

			$list->add_control(
				'crel_features_list__item_icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}} .crel-list-item__icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
					],
					'default' => '#43A047',
					'condition' => [
						'crel_features_list__item_info_icon_type' => 'icon'
					]
				]
			);

			$list->add_control(
				'crel_features_list__item_link_text',
				[
					'label'         => esc_html__( 'Link Text', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::TEXT,
					'default'   => esc_html__( 'Learn More', 'creative-addons-for-elementor' ),
				]
			);

			$list->add_control(
				'crel_features_list__item_link_url',
				[
					'label'         => esc_html__( 'Link URL', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::URL,
				]
			);

			$this->add_control(
				'crel_features_list__list',
				[
					'label'     => esc_html__( 'Items', 'creative-addons-for-elementor' ),
					'type'      => Controls_Manager::REPEATER,
					'fields'    => $list->get_controls(),
					'title_field' => '{{{ crel_features_list__item_title }}}',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'crel_features_list__bottom_description__section_content',
			[
				'label' => esc_html__( 'Bottom Description', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'crel_features_list__bottom_description_toggle',
				[
					'label' => esc_html__( 'Show Description', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on'  => esc_html__( 'Yes', 'creative-addons-for-elementor' ),
					'label_off' => esc_html__( 'No', 'creative-addons-for-elementor' ),
					'default' => 'yes',
					'force_preset' => true
				]
			);

			$this->add_control(
				'crel_features_list__bottom_description',
				[
					'label'         => esc_html__( 'Description', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::WYSIWYG,
					'condition' => [
						'crel_features_list__bottom_description_toggle' => 'yes'
					]
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'crel_features_list__link__section_content',
			[
				'label' => esc_html__( 'Link', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'crel_features_list__link_toggle',
				[
					'label' => esc_html__( 'Show Link', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on'  => esc_html__( 'Yes', 'creative-addons-for-elementor' ),
					'label_off' => esc_html__( 'No', 'creative-addons-for-elementor' ),
					'force_preset' => true
				]
			);

			$this->add_control(
				'crel_features_list__link_text',
				[
					'label' => esc_html__( 'Link Text', 'creative-addons-for-elementor' ),
					'label_block' => true,
					'type' => Controls_Manager::TEXT,
					'condition'	=> [
						'crel_features_list__link_toggle'	=> 'yes'
					]
				]
			);

			$this->add_control(
				'crel_features_list__link_url',
				[
					'label'         => esc_html__( 'Link URL', 'creative-addons-for-elementor' ),
					'type'          => Controls_Manager::URL,
					'condition'	=> [
						'crel_features_list__link_toggle'	=> 'yes'
					]
				]
			);

		$this->end_controls_section();

	}

	/**
	 * STYLE tab for this widget
	 */
	protected function register_style_controls() {

		// STYLE ===================================[ TAB ]====================================/

		// CONTAINER SECTION

		$this->start_controls_section(
			'crel_features_list__container__section_style',
			[
				'label' => esc_html__( 'Container', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'crel_features_list__general_link_color',
			[
				'label' => esc_html__( 'General Link Color', 'creative-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .crel-features-list-items-container .crel-list-item__learn-more-link a' => 'color: {{VALUE}};', // Feature List Header
					'{{WRAPPER}} .crel-features-list-items-container .crel-list-item__desc a' => 'color: {{VALUE}};',            // Feature List Desc
					'{{WRAPPER}} .crel-features-list-body .crel-features-list-body__top-desc a' => 'color: {{VALUE}};',          // Top Desc
					'{{WRAPPER}} .crel-features-list-body .crel-features-list-body__bottom-desc a' => 'color: {{VALUE}};',       // Bottom Desc
				]
			]
		);

			$this->add_control_group(
				Group_Control_Background::get_type(),
				[
					'name' => 'crel_features_list__container__background',
					'label' => esc_html__( 'Background', 'plugin-domain' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .crel-features-list-container',
				]
			);

			$this->add_control_group(
				Group_Control_Border::get_type(),
				[
					'name'      => 'crel_features_list__container__border',
					'label'     => esc_html__( 'Border', 'creative-addons-for-elementor'),
					'selector'  => '{{WRAPPER}} .crel-features-list-container',
				]
			);

			$this->add_control_responsive(
				'crel_features_list__container__borderRadius',
				[
					'label' => esc_html__( 'Radius', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-container' => 'border-radius: {{SIZE}}px;'
					]
				]
			);

			$this->add_control_group(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'crel_features_list__container__box_shadow',
					'label'     => esc_html__( 'Box Shadow', 'creative-addons-for-elementor'),
					'selector' => '{{WRAPPER}} .crel-features-list-container',
				]
			);

			$this->add_control_responsive(
				'crel_features_list__container_align',
				[
					'label' => esc_html__( 'Alignment', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					 'selectors' => [
						 '{{WRAPPER}} .crel-features-list-container' => 'text-align: {{VALUE}};',
					 ],
				]
			);

		$this->end_controls_section();

		// HEADER SECTION
		$this->start_controls_section(
			'crel_features_list__header__section_style',
			[
				'label' => esc_html__( 'Header', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control_responsive(
				'crel_features_list__header_alignment',
				[
					'label' => esc_html__( 'Alignment', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'creative-addons-for-elementor' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => 	[
                            '{{WRAPPER}} .crel-features-list-header'                                      => 'text-align: {{VALUE}};',
                            '{{WRAPPER}} .crel-features-list-header .crel-features-list-header__title'    => 'text-align: {{VALUE}};',
                            '{{WRAPPER}} .crel-features-list-header .crel-features-list-sub-header__text' => 'text-align: {{VALUE}};',

                    ],
				]
			);

			$this->add_control_group(
				Group_Control_Background::get_type(),
				[
					'name' => 'crel_features_list__header_background',
					'label' => esc_html__( 'Background', 'plugin-domain' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .crel-features-list-header',
					'separator' => 'before'
				]
			);

			$this->add_control_group(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'crel_features_list__header_box_shadow',
					'label'     => esc_html__( 'Box Shadow', 'creative-addons-for-elementor'),
					'selector' => '{{WRAPPER}} .crel-features-list-header',
				]
			);

			$this->add_responsive_control(
				'crel_features_list__header_padding',
				[
					'label' => esc_html__( 'Padding', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],

				]
			);

			$this->add_responsive_control(
				'crel_features_list__header_margin',
				[
					'label' => esc_html__( 'Margin', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],

				]
			);

			$this->add_control_group(
				Group_Control_Border::get_type(),
				[
					'name'      => 'crel_features_list__title__border',
					'label'     => esc_html__( 'Border', 'creative-addons-for-elementor'),
					'selector'  => '{{WRAPPER}} .crel-features-list-header',
				]
			);

			$this->add_control_responsive(
				'crel_features_list__title__borderRadius',
				[
					'label' => esc_html__( 'Radius', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-header' => 'border-radius: {{SIZE}}px;'
					]
				]
			);

			$this->add_control(
				'crel_features_list__header_color',
				[
					'label' => esc_html__( 'Title Color', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-header__title' => 'color: {{VALUE}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_control_group(
				Group_Control_Typography::get_type(),
				[
					'name' => 'crel_features_list__header_typography',
					'selector' => '{{WRAPPER}} .crel-features-list-header__title',
				]
			);

			$this->add_control(
				'crel_features_list__header_subtitle_color',
				[
					'label' => esc_html__( 'Sub Title Color', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-sub-header__text' => 'color: {{VALUE}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_control_group(
				Group_Control_Typography::get_type(),
				[
					'name' => 'crel_features_list__header_subtitle_typography',
					'selector' => '{{WRAPPER}} .crel-features-list-sub-header__text',
				]
			);

			$this->add_control_responsive(
				'crel_features_list__header_subtitle_margin_top',
				[
					'label' => esc_html__( 'Subtitle Top Margin', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-sub-header__text' => 'margin-top: {{SIZE}}px;'
					]
				]
			);

		$this->end_controls_section();

        // DESCRIPTION SECTION
		$this->start_controls_section(
			'crel_features_list__description__section_style',
			[
				'label' => esc_html__( 'Description', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control_responsive(
				'crel_features_list__description_margin_bottom',
				[
					'label' => esc_html__( 'Description Bottom Margin', 'creative-addons-for-elementor'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-body__top-desc, {{WRAPPER}} .crel-features-list-body__bottom-desc' => 'margin-bottom: {{SIZE}}px;'
					]
				]
			);

			$this->add_control(
				'crel_features_list__description_color',
				[
					'label' => esc_html__( 'Color', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-body__top-desc, {{WRAPPER}} .crel-features-list-body__bottom-desc' => 'color: {{VALUE}};',
					]
				]
			);

			$this->add_responsive_control(
				'crel_features_list__description_padding',
				[
					'label' => esc_html__( 'Padding', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-body__top-desc, {{WRAPPER}} .crel-features-list-body__bottom-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],

				]
			);

			$this->add_control_group(
				Group_Control_Typography::get_type(),
				[
					'name' => 'crel_features_list__description_typography',
					'selector' => '{{WRAPPER}} .crel-features-list-body__top-desc, {{WRAPPER}} .crel-features-list-body__bottom-desc',
				]
			);

		$this->end_controls_section();

        // FEATURES SECTION
		$this->start_controls_section(
			'crel_features_list__features__section_style',
			[
				'label' => esc_html__( 'Features', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


            // Icon Section
            $this->add_control_responsive(
                'crel_features_list__features__icon_size',
                [
                    'label' => esc_html__('Icon Size', 'creative-addons-for-elementor'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 5,
                            'max' => 400,
                            'step' => 1,
                        ]
                    ],
                    'selectors' => [
	                    '{{WRAPPER}} .e-font-icon-svg'              => 'width: {{SIZE}}px; min-width: calc({{SIZE}}px + 10px); ',
						'{{WRAPPER}} .crel-list-item__icon'         => 'font-size: {{SIZE}}px; min-width: calc({{SIZE}}px + 10px); width: {{SIZE}}px;',
                        '{{WRAPPER}} .crel-list-item__icon--img'    => 'width: {{SIZE}}px;',

                    ],
	                'separator' => 'after',
                ]
            );

            // Text Section
            $this->add_control(
                'crel_features_list__features__text_color',
                [
                    'label' => esc_html__( 'Text Color', 'creative-addons-for-elementor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .crel-list-item__header, {{WRAPPER}} .crel-list-item__header a' => 'color: {{VALUE}};',
                    ]
                ]
            );

            $this->add_control_group(
                Group_Control_Typography::get_type(),
                [
                    'label' => esc_html__( 'Text Typography', 'creative-addons-for-elementor' ),
                    'name' => 'crel_features_list__features__text__typography',
                    'selector' => '{{WRAPPER}} .crel-list-item__header',
                ]
            );

            // Description
            $this->add_control(
                'crel_features_list__features__desc_color',
                [
                    'label' => esc_html__( 'Description Color', 'creative-addons-for-elementor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .crel-list-item__body' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control_group(
                Group_Control_Typography::get_type(),
                [
                    'label' => esc_html__( 'Description Typography', 'creative-addons-for-elementor' ),
                    'name' => 'crel_features_list__features__desc__typography',
                    'selector' => '{{WRAPPER}} .crel-list-item__body',
                ]
            );


            // General Sub Section
		    $this->add_control_responsive(
			'crel_features_list__features_alignment',
			[
				'label' => esc_html__( 'Alignment', 'creative-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'creative-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'creative-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'creative-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .crel-list-item__header' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .crel-list-item' => 'justify-content: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		    $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'crel_features_list__features_border',
				'label'     => esc_html__( 'Border', 'creative-addons-for-elementor'),
				'selector'  => '{{WRAPPER}} .crel-list-item',
			]
		);

		    $this->add_responsive_control(
			'crel_features_list__features_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'creative-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .crel-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


			$this->add_responsive_control(
				'crel_features_list__container_padding',
				[
					'label' => esc_html__( 'Container Padding', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-items-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],

				]
			);

			$this->add_responsive_control(
				'crel_features_list__item_padding',
				[
					'label' => esc_html__( 'Item Padding', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],

				]
			);

		    $this->add_control_responsive(
			'crel_features_list__features_margin_bottom',
			[
				'label' => esc_html__( 'Bottom Margin', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-list-item' => 'margin-bottom: {{SIZE}}px;'
				]
			]
		);

		    $this->add_control_responsive(
			'crel_features_list__features_height',
			[
				'label' => esc_html__( 'Min Height', 'creative-addons-for-elementor'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .crel-list-item' => 'min-height: {{SIZE}}px;'
				]
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'crel_features_list__button__section_style',
			[
				'label' => esc_html__( 'Button Link', 'creative-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control_group(
				Group_Control_Typography::get_type(),
				[
					'name' => 'crel_features_list__button__typography',
					'selector' => '{{WRAPPER}} .crel-features-list-footer_btn-link a',
				]
			);

			$this->start_controls_tabs(
				'crel_features_list__button__tabs'
			);

				$this->start_controls_tab(
					'crel_features_list__button__tab_normal',
					[
						'label' => esc_html__( 'Normal', 'creative-addons-for-elementor' ),
					]
				);

					$this->add_control(
						'crel_features_list__button_color',
						[
							'label' => esc_html__( 'Color', 'creative-addons-for-elementor' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .crel-features-list-footer_btn-link a' => 'color: {{VALUE}};',
							]
						]
					);

					$this->add_control_group(
						Group_Control_Background::get_type(),
						[
							'name' => 'crel_features_list__button_background',
							'label' => esc_html__( 'Background', 'plugin-domain' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .crel-features-list-footer_btn-link a',
							'separator' => 'before'
						]
					);

					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name'      => 'crel_features_list__button_border',
							'label'     => esc_html__( 'Border', 'creative-addons-for-elementor'),
							'selector'  => '{{WRAPPER}} .crel-features-list-footer_btn-link a',
						]
					);

					$this->add_responsive_control(
						'crel_features_list__button_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'creative-addons-for-elementor' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .crel-features-list-footer_btn-link a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control_group(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'crel_features_list__button_box_shadow',
							'label'     => esc_html__( 'Box Shadow', 'creative-addons-for-elementor'),
							'selector' => '{{WRAPPER}} .crel-features-list-footer_btn-link a',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'crel_features_list__button__tab_hover',
					[
						'label' => esc_html__( 'Hover', 'creative-addons-for-elementor' ),
					]
				);

					$this->add_control(
						'crel_features_list__button_color_hover',
						[
							'label' => esc_html__( 'Color', 'creative-addons-for-elementor' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .crel-features-list-footer_btn-link a:hover' => 'color: {{VALUE}};',
							]
						]
					);

					$this->add_control_group(
						Group_Control_Background::get_type(),
						[
							'name' => 'crel_features_list__button_background_hover',
							'label' => esc_html__( 'Background', 'plugin-domain' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .crel-features-list-footer_btn-link a:hover',
							'separator' => 'before'
						]
					);

					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name'      => 'crel_features_list__button_border_hover',
							'label'     => esc_html__( 'Border', 'creative-addons-for-elementor'),
							'selector'  => '{{WRAPPER}} .crel-features-list-footer_btn-link a:hover',
						]
					);

					$this->add_responsive_control(
						'crel_features_list__button_border_radius_hover',
						[
							'label' => esc_html__( 'Border Radius', 'creative-addons-for-elementor' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .crel-features-list-footer_btn-link a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control_group(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'crel_features_list__button_box_shadow_hover',
							'label'     => esc_html__( 'Box Shadow', 'creative-addons-for-elementor'),
							'selector' => '{{WRAPPER}} .crel-features-list-footer_btn-link a:hover',
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_responsive_control(
				'crel_features_list__button_padding',
				[
					'label' => esc_html__( 'Padding', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-footer_btn-link a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],

				]
			);

			$this->add_responsive_control(
				'crel_features_list__button_margin',
				[
					'label' => esc_html__( 'Margin', 'creative-addons-for-elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .crel-features-list-footer_btn-link a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],

				]
			);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

        $title_text              = $settings['crel_features_list__title'];

		$title_html_tag_escaped  = $this->sanitize_html_tag( $settings['crel_features_list__title__HTML_tag'], 'h4' );

		$sub_header_text         = $settings['crel_features_list__subtitle'];
		$header_toggle           = $settings['crel_features_list__title_toggle'] == 'yes';

		$body_top_desc_toggle    = $settings['crel_features_list__top_description_toggle'] == 'yes';
        $body_top_desc           = $settings['crel_features_list__top_description'];
		$body_bottom_desc_toggle = $settings['crel_features_list__bottom_description_toggle'] == 'yes';
        $body_bottom_desc        = $settings['crel_features_list__bottom_description'];

		$footer_btn_text         = $settings['crel_features_list__link_text'];
		$footer_btn_url          = $settings['crel_features_list__link_url'];

		// title
		$this->add_render_attribute( 'crel_features_list__title', [
			'class' => [ 'crel-features-list-header__title' ]
		] );
		$this->add_inline_editing_attributes( 'crel_features_list__title', 'none' );

		// subtitle
		$this->add_render_attribute( 'crel_features_list__subtitle', [
			'class' => [ 'crel-features-list-sub-header__text' ]
		] );
		$this->add_inline_editing_attributes( 'crel_features_list__subtitle', 'none' );

		// top description
		$this->add_render_attribute( 'crel_features_list__top_description', [
			'class' => [ 'crel-features-list-body__top-desc' ]
		] );
		$this->add_inline_editing_attributes( 'crel_features_list__top_description', 'advanced' );

		// bottom description
		$this->add_render_attribute( 'crel_features_list__bottom_description', [
			'class' => [ 'crel-features-list-body__bottom-desc' ]
		] );
		$this->add_inline_editing_attributes( 'crel_features_list__bottom_description', 'advanced' ); ?>

		<!-- Features -->
		<div class="crel-features-list-container">

            <!----- HEADER --------------><?php
            if ( $header_toggle ) { ?>
				<div class="crel-features-list-header">
					<<?php echo esc_attr( $title_html_tag_escaped ); ?> <?php
	                //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	                echo $this->get_render_attribute_string( 'crel_features_list__title' ); ?>><?php echo esc_html( $title_text ); ?></<?php echo esc_attr( $title_html_tag_escaped ); ?>>
					<div <?php
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $this->get_render_attribute_string( 'crel_features_list__subtitle' ); ?>><?php echo esc_html( $sub_header_text ); ?></div>
				</div><?php
			} ?>

            <!----- BODY ---------------->
            <div class="crel-features-list-body">

                <!----- Top Desc ----------------><?php
				if ( $body_top_desc_toggle ) { ?>
                <div <?php
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $this->get_render_attribute_string( 'crel_features_list__top_description' ); ?>><?php echo wp_kses_post( $body_top_desc ); ?></div><?php
                } ?>

                <!----- Features ---------------->
                <div class="crel-features-list-items-container"><?php
					$i = 0;
					foreach ( $settings['crel_features_list__list'] as $key => $item ) {

						$title_key = $this->get_repeater_setting_key( 'crel_features_list__item_title', 'crel_features_list__list', $i );
						$descr_key = $this->get_repeater_setting_key( 'crel_features_list__item_text', 'crel_features_list__list', $i );
						$i++;
						$class              = 'elementor-repeater-item-' . $item['_id'];
						$header_text        = $item['crel_features_list__item_title'];
						$learn_more_url     = $item['crel_features_list__item_link_url'];
						$learn_more_text    = $item['crel_features_list__item_link_text'];
						$header_icon        = $item['crel_features_list__item_icon'];
						$header_icon_type   = $item['crel_features_list__item_info_icon_type'];
						$item_desc          = $item['crel_features_list__item_text'];
						$image_data         = $item['crel_features_list__item_info_image'];

						$class .= $item['crel_features_list__item_info_icon__toggle'] == 'yes' ? ' crel-list-item--info-icon-show ' : ' crel-list-item--info-icon-hide ';

						if ( $learn_more_text ) {
							$learn_more_text .= '<span class="eicon eicon-editor-external-link"></span>';
						} ?>

					<div class="crel-list-item <?php echo esc_attr( $class ); ?>">

                        <!----- Icon ---------------->
                        <?php
                        // Icon
						if ( $header_icon_type == 'icon' ) {
							Icons_Manager::render_icon( $header_icon, [ 'class' => 'crel-list-item__icon' ], 'span' );
						}
                        // Image
						if ( $header_icon_type == 'img' ) {
							$style = '';
							$srcset = '';

							if ( ! empty( $image_data['id'] ) ) {

								// not a placeholder image
								$meta_data = get_post_meta( $image_data['id'], '_wp_attachment_image_alt', true );
								if ( empty($meta_data) ) {
									$image_alt = '';
								} else {
									$image_alt = trim( wp_strip_all_tags( $meta_data ) );
								}

								$image_url = Group_Control_Image_Size::get_attachment_image_src( $image_data['id'], 'image', $item );

								$srcset = ( $item['image_size'] == 'custom' ) ? '' : wp_get_attachment_image_srcset( $image_data['id'], $item['image_size']);


							} else {
								$image_alt = '';
								$image_url = $this->filter_image_url( $image_data['url'] );
							}

							if ( $item['image_size'] == 'custom' ) {
								if ( ! empty( $item['image_custom_dimension']['width'] ) ) {
									$style .= ' max-width: ' . $item['image_custom_dimension']['width'] . 'px; ';
								}

								if ( ! empty( $item['image_custom_dimension']['height'] ) ) {
									$style .= ' max-height: ' . $item['image_custom_dimension']['height'] . 'px; ';
								}
							} else {
								foreach ( $this->get_image_sizes() as $size_name => $size_data ) {
									if ( $item['image_size'] == $size_name ) {
										$style = ( $size_data['width'] ? 'max-width: ' . $size_data['width'] . 'px; ' : '' ) . ( $size_data['height'] ? 'max-height: ' . $size_data['height'] . 'px; ' : '' );
									}
								}
							}

							if ( ! $image_url ) {
								$image_url = Utils::get_placeholder_image_src();
							} ?>

							<div class="crel-list-item__icon crel-list-item__icon--img">
								<div class="crel-list-item__icon__inner" style="<?php echo esc_attr( $style ); ?>">
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr($image_alt); ?>" <?php if ( $srcset ) { echo 'srcset="' . esc_attr( $srcset ) . '"'; } ?> loading="lazy">
								</div>
							</div>			<?php
						}                        ?>

                        <!----- Content ---------------->
                        <div class="crel-list-item__content">

                            <!----- Item Header ---------------->
                            <div class="crel-list-item__header"><?php

		                        $this->add_inline_editing_attributes( $title_key, 'none' );

		                        ?>
                                <div class="crel-list-item__header__text">
									<span <?php
										//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										echo $this->get_render_attribute_string( $title_key ); ?>><?php echo wp_kses( $header_text, [
				                        'em'     => [],
				                        'i'      => [],
				                        'strong' => [],
				                        'b'      => [],
				                        'a' => array(
					                        'href' => array(),
					                        'title' => array()
				                        ),
			                        ]); ?></span><?php

									if ( empty( $item_desc ) && !empty( $learn_more_url['url'] ) && !empty( $learn_more_text ) ) { ?>
                                        <div class="crel-list-item__learn-more-link"><?php
			                                $this->add_link_attributes( 'url-' . $key, $learn_more_url );
	                                        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			                                printf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url-' . $key ), wp_kses_post( $learn_more_text ) ); ?>
                                        </div>
		                                <?php
	                                } ?>

                                </div>
                                <?php
		                        if (  !empty( $item_desc ) ) { ?>
                                    <div class="crel-list-item__header__info crelfa crelfa-info-circle"></div>
			                        <?php
		                        } ?>
                            </div>

                            <!----- Item Body ------------------>
	                        <?php if ( !empty( $item_desc ) ) { ?>
                                <div class="crel-list-item__body"><?php
			                        $this->add_render_attribute( $descr_key, [
				                        'class' => [ 'crel-list-item__desc' ]
			                        ] );
			                        $this->add_inline_editing_attributes( $descr_key, 'none' ); ?>

                                    <div <?php
                                        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        echo $this->get_render_attribute_string( $descr_key ); ?>>				                        <?php
	                                    echo wp_kses_post( $item_desc ); ?>
                                    </div>			                        <?php
	                                if ( !empty( $learn_more_url['url'] ) && !empty( $learn_more_text ) ) { ?>
                                        <div class="crel-list-item__learn-more-link"><?php
					                        $this->add_link_attributes( 'url-' . $key, $learn_more_url );
	                                        //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					                        printf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url-' . $key ), wp_kses_post( $learn_more_text ) ); ?>
                                        </div>			                        <?php
	                                } ?>
                                </div>
	                        <?php } ?>

                        </div>

                    </div><?php
                    } ?>

                </div>

                <!----- Bottom Desc -------------><?php
				if ( $body_bottom_desc_toggle ) { ?>
                    <div <?php
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $this->get_render_attribute_string( 'crel_features_list__bottom_description' ); ?>><?php echo wp_kses_post( $body_bottom_desc ); ?></div><?php
                } ?>

            </div>

            <!----- FOOTER ----------------> <?php
            if ( $settings['crel_features_list__link_toggle'] == 'yes' ) { ?>
				<div class="crel-features-list-footer">
					<div class="crel-features-list-footer_btn-link"><?php
						// button title
						$this->add_render_attribute( 'crel_features_list__link_text', [
							'class' => [ 'crel-features-list-header__title' ]
						] );
						$this->add_inline_editing_attributes( 'crel_features_list__link_text', 'none' );
						$this->add_link_attributes( 'crel_features_list__link_text', $footer_btn_url );
						//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						printf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'crel_features_list__link_text' ), esc_html( $footer_btn_text ) ); ?></div>
				</div><?php
            } ?>

		</div> <?php
	}

	/**
	 * Dynamically render Features List
	 */
	protected function content_template() { ?>

		<!-- Features -->
		<div class="crel-features-list-container">



            <!----- HEADER --------------><#

			let titleHtmlTag = settings.crel_features_list__title__HTML_tag;

			if (['h1', 'h2', 'h3', 'h4', 'h5', 'h6'].includes(titleHtmlTag)) {
				// It's already one of the allowed tags, so do nothing.
			} else if (['1', '2', '3', '4', '5', '6'].includes(titleHtmlTag)) {
				titleHtmlTag = 'h' + titleHtmlTag;
			} else {
				titleHtmlTag = 'h4';
			}

			if ( settings.crel_features_list__title_toggle == 'yes' ) { #>
            <div class="crel-features-list-header"><#
				view.addRenderAttribute( 'crel_features_list__title', {
					'class': [ 'crel-features-list-header__title' ],
				} );
				view.addInlineEditingAttributes( 'crel_features_list__title', 'none' ); #>
                <{{{titleHtmlTag}}} {{{ view.getRenderAttributeString( 'crel_features_list__title' ) }}}>
					{{{settings.crel_features_list__title}}}
				</{{{titleHtmlTag}}}> <#

				view.addRenderAttribute( 'crel_features_list__subtitle', {
					'class': [ 'crel-features-list-sub-header__text' ],
				} );
				view.addInlineEditingAttributes( 'crel_features_list__subtitle', 'none' ); #>
                <div {{{ view.getRenderAttributeString( 'crel_features_list__subtitle' ) }}}>{{{settings.crel_features_list__subtitle}}}</div>
            </div><#
			} #>

            <!----- BODY ---------------->
            <div class="crel-features-list-body">

                <!----- Top Desc ----------------><#
				if ( settings.crel_features_list__top_description_toggle == 'yes' ) {
					view.addRenderAttribute( 'crel_features_list__top_description', {
					'class': [ 'crel-features-list-body__top-desc' ],
					} );
					view.addInlineEditingAttributes( 'crel_features_list__top_description', 'advanced' ); #>
					<div {{{ view.getRenderAttributeString( 'crel_features_list__top_description' ) }}}>{{{settings.crel_features_list__top_description}}}</div><#
				} #>

                <!----- Features ---------------->
                <div class="crel-features-list-items-container">
					<# if ( settings.crel_features_list__list.length ) {
					_.each( settings.crel_features_list__list, function( item, index ) {

						let elClass          = 'elementor-repeater-item-' + item._id;
						let header_text      = item.crel_features_list__item_title;
						let learn_more_url   = item.crel_features_list__item_link_url.url;
						let learn_more_text  = item.crel_features_list__item_link_text;
						let header_icon      = item.crel_features_list__item_icon;
						let header_icon_type = item.crel_features_list__item_info_icon_type;
						let item_desc        = item.crel_features_list__item_text;

						elClass += item.crel_features_list__item_info_icon__toggle == 'yes' ? ' crel-list-item--info-icon-show ' : ' crel-list-item--info-icon-hide ';

						if ( learn_more_text ) {
							learn_more_text += `<span class="eicon eicon-editor-external-link"></span>`;
						} #>

					<div class="crel-list-item {{{elClass}}}">

                        <!----- Icon ---------------->
                        <#
                        if ( header_icon_type == 'icon' ) {
                        let iconHTML = elementor.helpers.renderIcon( view, header_icon, { class: 'crel-list-item__icon' }, 'span' , 'object' ); #>
                        {{{ iconHTML.value }}} <#
                        }

                        if ( header_icon_type == 'img' ) {
                        let image_url = '';
                        let style = '';						<?php

						$image_sizes = $this->get_image_sizes();
						foreach ( $image_sizes as $size_name => $size_data ) { ?>
                            if ( item.image_size == '<?php echo esc_attr( $size_name ); ?>' ) {
                            style = '<?php
							echo $size_data['width'] ? 'max-width: ' . esc_attr( $size_data['width'] ) . 'px; ' : ' ';
							echo $size_data['height'] ? 'max-height: ' . esc_attr( $size_data['height'] ) . 'px; ' : ' '; ?>';
                            }						<?php
						} ?>

                        if ( item.image_size == 'custom' && typeof item.image_custom_dimension == 'object' ) {
                        if ( typeof item.image_custom_dimension.width != 'undefined' && item.image_custom_dimension.width ) {
                        style += ' max-width: ' + item.image_custom_dimension.width + 'px; ';
                        }

                        if ( typeof item.image_custom_dimension.height != 'undefined' && item.image_custom_dimension.height ) {
                        style += ' max-height: ' + item.image_custom_dimension.height + 'px; ';
                        }
                        }

                        if ( typeof item.crel_features_list__item_info_image.id == 'undefined' || ! item.crel_features_list__item_info_image.id ) {
							image_url = '<?php echo esc_url( Utils::get_placeholder_image_src() ); // if user did not choose yet an image ?>';
                        } else {
							let image = {
								id: item.crel_features_list__item_info_image.id,
								url: item.crel_features_list__item_info_image.url,
								size: item.image_size,
								dimension: item.image_custom_dimension,
								model: view.getEditModel()
       		                 }

         	               image_url = elementor.imagesManager.getImageUrl( image );
                        }

                        if ( ! image_url ) {
							image_url = '<?php echo esc_url( Utils::get_placeholder_image_src() ); ?>';
                        } #>

                        <div class="crel-list-item__icon crel-list-item__icon--img">
                            <div style="{{{style}}}" class="crel-list-item__icon__inner"><img src="{{{ image_url }}}"></div>
                        </div><#
                        } #>

                        <!----- Content ---------------->
                        <div class="crel-list-item__content">

                            <!----- Item Header ---------------->
                            <div class="crel-list-item__header"><#

                                let header_key = view.getRepeaterSettingKey( 'crel_features_list__item_title', 'crel_features_list__list', index );

                                view.addInlineEditingAttributes( header_key, 'none' ); #>
                                <div class="crel-list-item__header__text">
									<span {{{ view.getRenderAttributeString( header_key ) }}}>{{{ header_text }}}</span>

                                    <# if ( ! item_desc && learn_more_url && learn_more_text ) { #>
                                    <div class="crel-list-item__learn-more-link"><a href="{{{ learn_more_url }}}">{{{ learn_more_text }}}</a>
                                    </div>
                                    <# } #>
                                </div>

                                <# if ( item_desc ) { #>
                                    <div class="crel-list-item__header__info crelfa crelfa-info-circle"></div>
                                <# } #>
                            </div>

                            <!----- Item Body ------------------>
                            <# if ( item_desc ) { #>
                                <div class="crel-list-item__body">
                                    <# let descr_key = view.getRepeaterSettingKey( 'crel_features_list__item_text', 'crel_features_list__list', index );

                                    view.addRenderAttribute( descr_key,	{
                                    'class': [ 'crel-list-item__desc' ],
                                    } );

                                    view.addInlineEditingAttributes( descr_key, 'none' ); #>
                                    <div {{{ view.getRenderAttributeString( header_key ) }}}>
                                        {{{item_desc}}}


                                    </div>
                                    <# if ( learn_more_url && learn_more_text ) { #>
                                        <div class="crel-list-item__learn-more-link"><a href="{{{ learn_more_url }}}">{{{ learn_more_text }}}</a>
                                        </div>
                                    <# } #>
                                </div>
                            <# } #>

                        </div>

                    </div>
					<# }); } #>
                </div>

                <!----- Bottom Desc -------------><#
				if ( settings.crel_features_list__bottom_description_toggle == 'yes' ) {
					view.addRenderAttribute( 'crel_features_list__bottom_description', {
					'class': [ 'crel-features-list-body__bottom-desc' ],
					} );
					view.addInlineEditingAttributes( 'crel_features_list__bottom_description', 'advanced' ); #>
					<div {{{ view.getRenderAttributeString( 'crel_features_list__bottom_description' ) }}}>{{{settings.crel_features_list__bottom_description}}}</div><#
				} #>

            </div>

            <!----- FOOTER ---------------->
			<# if ( settings.crel_features_list__link_toggle == 'yes' ) {
				view.addRenderAttribute( 'crel_features_list__link_text', {
				'href': settings.crel_features_list__link_url,
				} );
				view.addInlineEditingAttributes( 'crel_features_list__link_text', 'none' ); #>
				<div class="crel-features-list-footer">
					<div class="crel-features-list-footer_btn-link"><a {{{ view.getRenderAttributeString( 'crel_features_list__link_text' ) }}}>{{{ settings.crel_features_list__link_text }}}</a>
				</div>
            <# } #>

		</div> <?php
	}
}

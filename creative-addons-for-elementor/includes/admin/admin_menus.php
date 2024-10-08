<?php
namespace Creative_Addons\includes\admin;

use Creative_Addons\includes\Assets_Manager;
use Creative_Addons\Includes\Utilities;

defined( 'ABSPATH' ) || exit();

class Admin_Menus {

    public static function init() {
	    add_action( 'admin_menu', [__CLASS__, 'add_plugin_menus'], 20 );
        add_action( 'admin_menu', [__CLASS__, 'admin_menu_change_name' ], 200 );
    }

	/**
	 *  Register plugin menus
	 * @noinspection PhpUnused
	 */
	public static function add_plugin_menus() {

		add_menu_page( esc_html__( 'Creative Addons', 'creative-addons-for-elementor' ), esc_html__( 'Creative Addons', 'creative-addons-for-elementor' ),
                            'manage_options', 'creative-addons', [new Admin_Pages(), 'show_dashboard'], self::get_b64_icon(), '58.6' );

		add_submenu_page( 'creative-addons', esc_html__( 'Add-ons / News', 'creative-addons-for-elementor' ), New_Features_Page::get_menu_item_title(),
							'manage_options', 'crel-new-features', array( new New_Features_Page(), 'display_new_features_page') );

		add_submenu_page( 'creative-addons', esc_html__( 'Get Help - Creative Addons', 'creative-addons-for-elementor' ), esc_html__( 'Get Help', 'creative-addons-for-elementor' ),
							'manage_options', 'creative-addons-get-help', [new Admin_Pages(), 'get_help'] );
	}

	private static function get_b64_icon() {
		return 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTAwcHQiIGhlaWdodD0iMTAwcHQiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiB2ZXJzaW9uPSIxLjEiPgo8ZyBpZD0ic3VyZmFjZTEiPgo8cGF0aCBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDAlLDAlLDAlKTtmaWxsLW9wYWNpdHk6MTsiIGQ9Ik0gNTIuODk0NTMxIDMuNjAxNTYyIEMgNDYuNjgzNTk0IDQuMjkyOTY5IDQxLjM4NjcxOSA1LjgzNTkzOCAzNi4wODk4NDQgOC41MDc4MTIgQyAzNS4zNTU0NjkgOC44ODI4MTIgMzQuNTU4NTk0IDkuMzIwMzEyIDM0LjMzMjAzMSA5LjQ2ODc1IEMgMzQuMTI1IDkuNjMyODEyIDMzLjg5ODQzOCA5Ljc1MzkwNiAzMy44Mzk4NDQgOS43NTM5MDYgQyAzMy42MTMyODEgOS43NTM5MDYgMjguOTkyMTg4IDEyLjk0OTIxOSAyNy45MTAxNTYgMTMuODUxNTYyIEMgMjQuOTg0Mzc1IDE2LjI4MTI1IDIyLjAyNzM0NCAxOS40NjA5MzggMjAuMDc4MTI1IDIyLjIzODI4MSBDIDE5LjU1NDY4OCAyMi45ODgyODEgMTkuMDQyOTY5IDIzLjY3OTY4OCAxOC45Mzc1IDIzLjc4NTE1NiBDIDE4Ljg0NzY1NiAyMy45MDYyNSAxOC43NTc4MTIgMjQuMDIzNDM4IDE4Ljc1NzgxMiAyNC4wODU5MzggQyAxOC43NTc4MTIgMjQuMTI4OTA2IDE4LjM5ODQzOCAyNC42ODM1OTQgMTcuOTQ1MzEyIDI1LjMzMjAzMSBDIDE3LjE2Nzk2OSAyNi40NDE0MDYgMTQuODU1NDY5IDMwLjg5ODQzOCAxNC44NTU0NjkgMzEuMjczNDM4IEMgMTQuODU1NDY5IDMxLjM3ODkwNiAxNC41ODU5MzggMzIuMTI4OTA2IDE0LjI1MzkwNiAzMi45NTMxMjUgQyAxMy42MDkzNzUgMzQuNTI3MzQ0IDEyLjc2OTUzMSAzNy4wMzUxNTYgMTIuNjc5Njg4IDM3LjY2NDA2MiBDIDEyLjY0ODQzOCAzNy44NzUgMTIuNTg5ODQ0IDM4LjE3NTc4MSAxMi41NDY4NzUgMzguMzM5ODQ0IEMgMTAuODk0NTMxIDQ1LjY2NDA2MiAxMC43NDYwOTQgNTIuNDkyMTg4IDEyLjA3ODEyNSA1OS4yNzM0MzggQyAxMi4xOTkyMTkgNTkuODkwNjI1IDEyLjMzNTkzOCA2MC42ODM1OTQgMTIuMzc4OTA2IDYxLjAzMTI1IEMgMTIuNDg0Mzc1IDYxLjkyOTY4OCAxMy40MTQwNjIgNjQuOTE0MDYyIDE0LjE3OTY4OCA2Ni44NTE1NjIgQyAxNC41MzkwNjIgNjcuNzUzOTA2IDE0Ljg4NjcxOSA2OC42Njc5NjkgMTQuOTQ1MzEyIDY4Ljg3ODkwNiBDIDE1LjA4MjAzMSA2OS4zODY3MTkgMTYuOTU3MDMxIDczLjEyNSAxNy41NzAzMTIgNzQuMTI4OTA2IEMgMTcuODU1NDY5IDc0LjU3ODEyNSAxOC40NTcwMzEgNzUuNDgwNDY5IDE4LjkwNjI1IDc2LjE0MDYyNSBDIDE5LjM1OTM3NSA3Ni43ODUxNTYgMTkuODA4NTk0IDc3LjQyOTY4OCAxOS44ODI4MTIgNzcuNTgyMDMxIEMgMjAuMzc4OTA2IDc4LjQwNjI1IDIzLjQ1MzEyNSA4MS45NzY1NjIgMjQuOTUzMTI1IDgzLjQ3NjU2MiBDIDI2LjMwNDY4OCA4NC44MTI1IDMwLjg2NzE4OCA4OC41MzUxNTYgMzEuMTUyMzQ0IDg4LjUzNTE1NiBDIDMxLjIxMDkzOCA4OC41MzUxNTYgMzEuNDY4NzUgODguNjgzNTk0IDMxLjcyMjY1NiA4OC44Nzg5MDYgQyAzMi44MzIwMzEgODkuNzA3MDMxIDM1LjkxMDE1NiA5MS40MDIzNDQgMzguMjgxMjUgOTIuNDk2MDk0IEMgMzkuNzM0Mzc1IDkzLjE3MTg3NSA0My41MzEyNSA5NC40OTIxODggNDUuMzk0NTMxIDk0Ljk4ODI4MSBDIDQ5LjY2Nzk2OSA5Ni4wOTc2NTYgNTMuNzgxMjUgOTYuNTYyNSA1OC40OTIxODggOTYuNDQ1MzEyIEMgNjQuNDY0ODQ0IDk2LjMwODU5NCA2OS4zNDM3NSA5NS4zMTY0MDYgNzQuMjAzMTI1IDkzLjI2MTcxOSBDIDc3LjM4NjcxOSA5MS45MTAxNTYgODIuMzUxNTYyIDg4Ljk1NzAzMSA4NS4xMTMyODEgODYuNzY1NjI1IEMgODYuNjQ0NTMxIDg1LjU1MDc4MSA4OC4zODY3MTkgODMuODk4NDM4IDg4LjM4NjcxOSA4My42NjAxNTYgQyA4OC4zODY3MTkgODMuNDMzNTk0IDczLjEwOTM3NSA2OC40MjU3ODEgNzIuODgyODEyIDY4LjQyNTc4MSBDIDcyLjc5Mjk2OSA2OC40MjU3ODEgNzIuMzQzNzUgNjguNzEwOTM4IDcxLjg5NDUzMSA2OS4wNzQyMTkgQyA2OC44MTY0MDYgNzEuNDQ1MzEyIDY0Ljc4MTI1IDczLjMyMDMxMiA2MC44Nzg5MDYgNzQuMTYwMTU2IEMgNTguNjcxODc1IDc0LjY0MDYyNSA1NC40NzI2NTYgNzQuNjQwNjI1IDUyLjI4MTI1IDc0LjE2MDE1NiBDIDUwLjQyMTg3NSA3My43NTM5MDYgNDguMDM1MTU2IDcyLjk0NTMxMiA0Ni42MDkzNzUgNzIuMjIyNjU2IEMgNDMuNjY3OTY5IDcwLjczODI4MSA0MC4yMTQ4NDQgNjcuODU1NDY5IDM3Ljk0OTIxOSA2NC45OTIxODggQyAyOC4yNTc4MTIgNTIuNjcxODc1IDMyLjE1NjI1IDM0LjgwMDc4MSA0Ni4wNzAzMTIgMjcuODIwMzEyIEMgNTQuNDg4MjgxIDIzLjYwNTQ2OSA2NC42MTcxODggMjQuNTkzNzUgNzEuOTY4NzUgMzAuMzQzNzUgQyA3Mi40ODA0NjkgMzAuNzMwNDY5IDcyLjk0NTMxMiAzMS4wNjI1IDczLjAwMzkwNiAzMS4wNjI1IEMgNzMuMTI1IDMxLjA2MjUgNzUuOTI5Njg4IDI4LjMzMjAzMSA4NC4xMDkzNzUgMjAuMjI2NTYyIEwgODguMzA4NTk0IDE2LjA3MDMxMiBMIDg3Ljc4NTE1NiAxNS41MTU2MjUgQyA4NC45NDkyMTkgMTIuNTU4NTk0IDc4LjE5NTMxMiA4LjI4NTE1NiA3My4yNzM0MzggNi4zMTY0MDYgQyA3MC41MTE3MTkgNS4yMjI2NTYgNjYuOTQxNDA2IDQuMzA4NTk0IDYzLjU1MDc4MSAzLjgxMjUgQyA2MS42MTMyODEgMy41NDI5NjkgNTQuNzI2NTYyIDMuNDA2MjUgNTIuODk0NTMxIDMuNjAxNTYyIFogTSA1Mi44OTQ1MzEgMy42MDE1NjIgIi8+CjwvZz4KPC9zdmc+Cg==';
	}

    public static function admin_menu_change_name() {
        global $submenu;

        if ( isset( $submenu['creative-addons'] ) ) {
            $submenu['creative-addons'][0][0] = esc_html__( 'Settings', 'creative-addons-for-elementor' );
        }
    }
}

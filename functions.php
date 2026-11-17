<?php

function makoa_fse_styles() {
    // Load Makoa's own stylesheet by its URL, so that child themes (e.g. Makoa Personal) keep it.
    wp_enqueue_style(
        'makoa-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( get_template() )->get( 'Version' )
    );

    if ( is_child_theme() ) {
        wp_enqueue_style(
            'makoa-child-style',
            get_stylesheet_uri(),
            array( 'makoa-style' ),
            wp_get_theme()->get( 'Version' )
        );
    }
}

add_action( 'wp_enqueue_scripts', 'makoa_fse_styles' );


if ( ! function_exists( 'makoa_fse_setup' ) ) {
    function makoa_fse_setup() {
        add_theme_support( 'wp-block-styles' );
        add_editor_style( 'style.css' );
    }
}

add_action( 'after_setup_theme', 'makoa_fse_setup' );

remove_theme_support( 'core-block-patterns' );

add_filter( 'should_load_remote_block_patterns', '__return_false' );

function makoa_register_pattern_categories() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'makoa',
            array(
                'label' => __( 'Makoa', 'makoa' ),
                'description' => __( 'Makoa patterns', 'makoa' ),
            )
        );
    }
}

add_action( 'init', 'makoa_register_pattern_categories' );

function makoa_setup_notice() {
    $notice_option_name = 'makoa_setup_notice_dismissed';
    $is_dismissed = get_option( $notice_option_name );

    if ( ! $is_dismissed && current_user_can( 'edit_theme_options' ) ) {
    $image_url = get_template_directory_uri() . '/assets/images/me.jpg';
    $notice_text = '<img src="' . esc_url( $image_url ) . '" style="max-width: 100%;" alt="" />
    <div class="makoa-notice-text" style="margin-top: 15px;">
        <h3 style="margin-top: 0px; font-size: 18px;">' . __('Hi, I\'m Roman Fink, the creator of the Makoa theme!','makoa') . ' 😊</h3>
        <p style="margin: 5px 0 0;"><b>' . __('Just CLOSE this notice to hide it forever. Thanks for your support!','makoa') . ' 🚀</b></p>
    </div>';
    echo '<div id="makoa-notice" class="notice notice-info is-dismissible">' . wp_kses_post( $notice_text ) . '</div>';
}

}

add_action( 'admin_notices', 'makoa_setup_notice' );


function makoa_notice_script() {
    if ( get_option( 'makoa_setup_notice_dismissed' ) || ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
        wp_enqueue_script( 'jquery' );
    }
    wp_enqueue_script( 'makoa-notice-script', get_template_directory_uri() . '/assets/js/admin-notice.js', array( 'jquery' ), wp_get_theme( get_template() )->get( 'Version' ), true );
    wp_localize_script( 'makoa-notice-script', 'makoaNotice', array( 'nonce' => wp_create_nonce( 'makoa_dismiss_notice' ) ) );
}

add_action( 'admin_enqueue_scripts', 'makoa_notice_script' );


function makoa_enqueue_custom_admin_styles() {
    $notice_option_name = 'makoa_setup_notice_dismissed';
    $is_dismissed = get_option( $notice_option_name );
    if ( ! $is_dismissed ) {
        wp_enqueue_style( 'makoa-admin-notice', get_template_directory_uri() . '/assets/css/admin-notice.css' );
    }
}

add_action( 'admin_enqueue_scripts', 'makoa_enqueue_custom_admin_styles' );


function makoa_dismiss_notice() {
    check_ajax_referer( 'makoa_dismiss_notice', 'nonce' );
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die();
    }
    update_option( 'makoa_setup_notice_dismissed', true );
    wp_die();
}

add_action( 'wp_ajax_makoa_dismiss_notice', 'makoa_dismiss_notice' );


// --- Makoa About Page ---

function makoa_add_about_page() {
	add_theme_page(
		__( 'About Makoa', 'makoa' ),
		__( 'About Makoa', 'makoa' ),
		'edit_theme_options',
		'makoa-about',
		'makoa_about_page_html'
	);
}
add_action( 'admin_menu', 'makoa_add_about_page' );

function makoa_about_page_styles( $hook ) {
	if ( 'appearance_page_makoa-about' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'makoa-about-page', get_template_directory_uri() . '/assets/css/admin-about.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'admin_enqueue_scripts', 'makoa_about_page_styles' );

function makoa_about_page_html() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );
	$image   = get_template_directory_uri() . '/assets/images/me.jpg';
	?>
	<div class="wrap makoa-about-wrap">
		<h1><?php esc_html_e( 'Makoa Theme', 'makoa' ); ?> <span class="makoa-version"><?php echo esc_html( $version ); ?></span></h1>

		<div class="makoa-about-columns">
			<div class="makoa-about-card makoa-about-author">
				<img src="<?php echo esc_url( $image ); ?>" alt="Roman Fink" class="makoa-author-photo" />
				<h2><?php esc_html_e( 'Hi, I\'m Roman Fink', 'makoa' ); ?></h2>
				<p><?php esc_html_e( 'The creator of the Makoa theme! With alpaca\'s help, of course.', 'makoa' ); ?> 😊</p>
			</div>



		</div>
	</div>
	<?php
}
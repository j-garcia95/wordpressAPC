<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$primary_color     = ClenixTheme::$options['primary_color']; // #14287b
$primary_rgb       = ClenixTheme_Helper::hex2rgb( $primary_color ); // 20, 40, 123
$secondary_color   = ClenixTheme::$options['secondary_color']; // #287ff9
$secondary_rgb     = ClenixTheme_Helper::hex2rgb( $secondary_color ); // 40, 127, 249
$alter_bg_color    = ClenixTheme::$options['alter_bg_color']; // #fef22e
$alter_text_color  = ClenixTheme::$options['alter_text_color']; // #3e3e3e

/*---------------------------------    
INDEX
===================================
#. EL: Button
#. EL: Section Title
#. EL: Slider
#. EL: Owl Nav 1
#. EL: Owl Nav 2
#. EL: Owl Nav 3
#. EL: About
#. EL: Text With Button
#. EL: Info Box
#. EL: Counter
#. EL: Team
#. EL: Portfolio
#. EL: Service Layout
#. EL: Testimonial
#. EL: Post Grid
#. EL: Pricing Table
#. EL: Widget
#. EL: Others
----------------------------------*/

/*-----------------------
#. EL: Button
------------------------*/
?>
.entry-content a.grid-fill-btn:hover,
.entry-content .rt-grid-fill-btn a.grid-fill-btn:hover,
.entry-content .rt-text-with-btn a.light-box:hover {
	color: <?php echo esc_html($primary_color); ?> !important;
}
.multiscroll-wrapper .ms-left .left-slide .item-btn {
	color: <?php echo esc_html($primary_color); ?>;
}
.entry-content a.grid-fill-btn,
.entry-content .rt-grid-fill-btn a.grid-fill-btn {
	border-color: <?php echo esc_html($primary_color); ?>;
	background: <?php echo esc_html($primary_color); ?>;
}
.entry-content .rt-text-with-btn a.light-box,
.multiscroll-wrapper .ms-left .left-slide .item-btn:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.title-text-button .rtin-dark .clenix-button {
	border-color: <?php echo esc_html($primary_color); ?>;
}
.ig-block .instagallery-actions .igact-instalink {
    background: <?php echo esc_html($primary_color); ?> !important;
}
.ig-block .instagallery-actions .igact-instalink:hover {
    background: <?php echo esc_html($secondary_color); ?> !important;
}
.multiscroll-wrapper .ms-left .left-slide1 .item-btn {
	border-color: <?php echo esc_html($primary_color); ?>;
}
.multiscroll-wrapper .ms-left .left-slide1 .item-btn:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-box .rtin-dark .clenix-button {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rtin-contact-box .rtin-dark .clenix-button:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-box .rtin-light .clenix-button:hover {
    background: <?php echo esc_html($secondary_color); ?>;
}
.title-text-button .rtin-dark .clenix-button:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.clenix-ghost {
	border-color: <?php echo esc_html($primary_color); ?>;
}
.clenix-ghost:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.call-to-action-content .item-content .item-title span {
	color: <?php echo esc_html($primary_color); ?>;
}
.call-to-action-content .item-content .action-button:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.light-button:before {
    background: <?php echo esc_html($primary_color); ?>;
}
.yellow-button-1:before {
    background: <?php echo esc_html($primary_color); ?>;
}
.yellow-button-2:hover {
	color: <?php echo esc_html($primary_color); ?> !important;
}
.online-form .form-group input[type="submit"]:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.footer-button .contact-btn {
	border-color: <?php echo esc_html($secondary_color); ?>;
}
.footer-top-area .mc4wp-form .form-group .item-btn:hover,
.footer-button .contact-btn:hover {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
<?php /*button bag color*/ ?>
a.slider-button,
.rtin-service2-wrap a.service-button,
.call-to-action-content .item-content .action-button {
	background-color: <?php echo esc_html( $alter_bg_color );?>;
}
.portfolio-slider-default .rtin-item .rtin-read a,
.team-multi-layout-1 .rtin-content .rtin-social li a,
.team-multi-layout-2 ul.rtin-social li a,
.team-multi-layout-3 ul.rtin-social li a,
.team-multi-layout-4 .rtin-content .rtin-social li a,
.portfolio-multi-layout-3 .rtin-item h3 a i,
.portfolio-multi-layout-4 .rtin-item .rtin-content .rtin-read a:hover {
	background-color: <?php echo esc_html( $alter_bg_color );?>;
}
.service-tab-layout .slick-navigation {
	color: <?php echo esc_html( $alter_bg_color );?>;
	border-color: <?php echo esc_html( $alter_bg_color );?>;
}
.rtin-pricing-layout3:hover .rtin-pricing-price,
.service-tab-layout .slick-navigation:hover {
	background-color: <?php echo esc_html( $alter_bg_color );?>;
}
.yellow-button-1 {
	background-color: <?php echo esc_html( $alter_bg_color );?>;
}
.rtin-testimonial-1 .rtin-item:hover .rtin-icon,
.info-style3 .rtin-item span {
	background-color: <?php echo esc_html( $alter_bg_color );?>;
}
.info-style3 .rtin-item:hover span,
.rtin-testimonial-1 .rtin-item .rtin-icon {
	color: <?php echo esc_html( $alter_bg_color );?>;
}
.portfolio-multi-layout-4 .rtin-item .rtin-content .rtin-read a {
	border-color: <?php echo esc_html( $alter_bg_color );?>;
}
<?php /*button text color*/ ?>
a.slider-button,
.yellow-button-1 {
	color: <?php echo esc_html( $alter_text_color );?> !important;
}
a.slider-button,
.rtin-service2-wrap a.service-button,
.call-to-action-content .item-content .action-button,
.portfolio-slider-default .rtin-item .rtin-read a,
.team-multi-layout-1 .rtin-content .rtin-social li a,
.team-multi-layout-2 ul.rtin-social li a,
.team-multi-layout-3 ul.rtin-social li a,
.team-multi-layout-4 .rtin-content .rtin-social li a,
.portfolio-multi-layout-3 .rtin-item h3 a i,
.portfolio-multi-layout-4 .rtin-item .rtin-content .rtin-read a:hover,
.service-tab-layout .slick-navigation:hover {
	color: <?php echo esc_html( $alter_text_color );?>;
}
.rtin-pricing-layout3.active-class .rtin-pricing-price .rtin-price, 
.rtin-pricing-layout3:hover .rtin-pricing-price .rtin-price {
	color: <?php echo esc_html( $alter_text_color );?>;
}
<?php
/*-----------------------
#. EL: Section Title
------------------------*/
?>
.sec-title .rtin-title {
	color: <?php echo esc_html($primary_color); ?>;
}
.sec-title .sub-title {
	color: <?php echo esc_html($secondary_color); ?>;
}
.sec-title .title-svg svg path {
	fill: <?php echo esc_html($secondary_color); ?>;
}
.section-title h2:after,
.sec-title.style2 .rtin-title:before,
.sec-title.style2 .rtin-title:after {
	background: <?php echo esc_html($primary_color); ?>;
}
.sec-title.style2 .section-title span {
	color: <?php echo esc_html($primary_color); ?>;
}
.barshow .title-bar,
.about-info-text h2:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.sec-title.style4 .rtin-title:after {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*-----------------------
#. EL: Slider
------------------------*/
?>
.slider-left-side-content .side-content,
.slider-right-side-content ul.footer-social li a,
.multiscroll-wrapper .ms-social-link li a,
.fullpage-wrapper .fullpage-scroll-content .item-btn:hover,
.multiscroll-wrapper .ms-copyright a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.multiscroll-wrapper .ms-social-link li a:hover,
.slider-right-side-content ul.footer-social li a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.fps-menu-list li.active a,
.ms-menu-list li a {
	color: <?php echo esc_html($primary_color); ?>;
}
.ls-layers .slider-ghost-button:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.slider-white-button {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-el-slider .nivo-directionNav a.nivo-prevNav, 
.rt-el-slider .nivo-directionNav a.nivo-nextNav {
	border-color: <?php echo esc_html($primary_color); ?>;
}
.rt-el-slider .nivo-directionNav a.nivo-prevNav:hover, 
.rt-el-slider .nivo-directionNav a.nivo-nextNav:hover,
.rt-el-slider .nivo-controlNav .nivo-control.active {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.ls-v6 .ls-layers h2 {
	color: <?php echo esc_html($primary_color); ?>;
}
.ls-v6 .ls-layers h4 {
	color: <?php echo esc_html($secondary_color); ?>;
}
.ls-v6 a.ls-nav-prev:hover, 
.ls-v6 a.ls-nav-next:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.slider-button:before {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. EL: About
------------------------*/
?>
.about-image-text .about-content .sub-rtin-title{
	color: <?php echo esc_html($secondary_color); ?>;
}
.title-text-button ul li:after {
	color: <?php echo esc_html($primary_color); ?>;
}
.title-text-button .rtin-title {
	color: <?php echo esc_html($primary_color); ?>;
}
.title-text-button .subtitle {
	color: <?php echo esc_html($secondary_color); ?>;
}
.title-text-button.text-style1 .subtitle:after {
	background: <?php echo esc_html($secondary_color); ?>;
}
.about-image-text ul li:before {
	color: <?php echo esc_html($primary_color); ?>;
}
.about-layout-style4:after {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rtin-video .item-icon .rtin-play i:before {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Owl Nav 1
---------------------------------------*/
?>
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dots .owl-dot:hover span,
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dots .owl-dot.active span {
	background: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Owl Nav 2
---------------------------------------*/
?>
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot:hover span,
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot.active span {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-nav > div {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Owl Nav 3
---------------------------------------*/
?>
.rt-owl-nav-3.slider-dot-enabled .owl-carousel .owl-dot:hover span ,
.rt-owl-nav-3.slider-dot-enabled .owl-carousel .owl-dot.active span {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rt-owl-nav-3.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Info Box
---------------------------------------*/
?>
.info-style5 .rtin-item-title,
.info-style2 .rtin-item .rtin-item-title a,
.info-style6 .rtin-item .rtin-content h3 a,
.info-style10 .rtin-item .rtin-item-title a {
	color: <?php echo esc_html($primary_color); ?>;
}
.info-style1 .rtin-item .rtin-item-title a:hover,
.info-style2 .rtin-item:hover .rtin-item-title a,
.info-style5 .rtin-item .rtin-item-title a:hover,
.info-style2 .rtin-icon .rtin-media span i,
.info-style9 .rtin-item:hover .rtin-content h3 a,
.info-style10 .rtin-item:hover .rtin-item-title a,
.info-style10 .rtin-icon:hover .rtin-media span i {
	color: <?php echo esc_html($secondary_color); ?>;
}
.info-style1 .rtin-item ul li:after,
.info-style3 .rtin-item span {
	color: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-address ul li a:hover,
.info-style6 .rtin-item:hover .rtin-media > span {
	color: <?php echo esc_html($primary_color); ?>;
}
.info-style5 .rtin-icon span i {
	color: <?php echo esc_html($secondary_color); ?>;
	border-color: <?php echo esc_html($secondary_color); ?>;
}
.info-style2 .rtin-image .rtin-media .image-svg svg,
.info-style3 .rtin-item .rtin-media .image-svg svg,
.info-style5 .rtin-item .rtin-media .image-svg svg,
.info-style10 .rtin-item:hover .rtin-media .image-svg svg {
	fill: <?php echo esc_html($secondary_color); ?>;
}
.info-style6 .rtin-item:hover .rtin-media .image-svg svg {
	fill: <?php echo esc_html($primary_color); ?>;
}
.info-style1 .rtin-item:hover .rtin-icon,
.info-style3 .rtin-item:hover span,
.info-style6.dark .rtin-item,
.info-style7.dark .rtin-item:hover,
.info-style8.dark .rtin-item {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.info-style1 .rtin-item .rtin-icon,
.info-style3.dark .rtin-item,
.info-style4.dark .rtin-item,
.info-style6 .rtin-item .rtin-media > span,
.info-style7.dark .rtin-item,
.info-style6 .rtin-item:hover,
.info-style8.dark .rtin-item:hover,
.info-style9 .rtin-item .rtin-media span > span,
.info-style10 .rtin-item .rtin-media > span {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.info-style8 .rtin-icon span i,
.info-style8 .rtin-item .rtin-content h3,
.info-style8 .rtin-item .rtin-content h3 a,
.info-style8 .rtin-item .rtin-content h3:after {
	color: <?php echo esc_html($primary_color); ?>;
}
.info-style8 .rtin-item span svg {
	fill: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. EL: Counter
------------------------*/
?>
.rt-counter .rtin-item i {
	color: <?php echo esc_html($primary_color); ?>;
}
.rtin-progress-bar .progress .progress-bar {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.rt-counter .rtin-item .rtin-media .image-svg svg {
	fill: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Team
--------------------------------*/
?>
.team-single .rtin-heading h2,
.team-single .rtin-skills h3,
.team-single .team-contact-wrap h3,
.team-default .rtin-content .rtin-title a {
	color: <?php echo esc_html($primary_color); ?>;
}
.team-single ul.rtin-social span i,
.team-single .rtin-content ul.rtin-team-info li i,
.team-single .rtin-content ul.rtin-team-info li i:before {	
  color: <?php echo esc_html($secondary_color); ?>;
}
.team-default .rtin-content .rtin-title a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.team-multi-layout-2 ul.rtin-social li a,
.team-single .rtin-heading .designation span,
.team-single .rtin-content ul li span {
	color: <?php echo esc_html($primary_color); ?>;
}
.team-multi-layout-1 .rtin-content .rtin-social li a:hover,
.team-multi-layout-2 .rtin-content-wrap .rtin-content,
.team-multi-layout-3 ul.rtin-social li a:hover,
.team-multi-layout-4 .rtin-content .rtin-social li a:hover,
.team-multi-layout-6 .rtin-social,
.team-multi-layout-5 .rtin-content .rtin-social li a:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.team-single .rtin-content a:hover,
.team-multi-layout-6 .rtin-social li a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.team-multi-layout-2 ul.rtin-social li a:hover,
.rtin-skills .rtin-skill-each .progress .progress-bar,
.team-single .rtin-skills h3:after,
.team-single .team-contact-wrap h3:after {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.team-multi-layout-5 .rtin-content .rtin-social li a {
    background-color: <?php echo esc_html( $alter_bg_color );?>;
    color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Portfolio
--------------------------------*/
?>
.portfolio-default .rt-portfolio-tab a.current, 
.portfolio-default .rt-portfolio-tab a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.portfolio-multi-layout-1 .rtin-item h3 a:hover,
.portfolio-multi-layout-1 .rtin-item .rtin-cat a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.portfolio-multi-layout-2 .rtin-item .rtin-cat a:hover,
.portfolio-multi-layout-2 .rtin-item h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.portfolio-multi-layout-1 .rtin-item .rtin-icon a,
.portfolio-multi-layout-2 .rtin-item .rtin-figure .rtin-icon i:before {
	color: <?php echo esc_html($primary_color); ?>;
}
.portfolio-multi-layout-1 .rtin-item .rtin-figure:after,
.portfolio-multi-layout-2 .rtin-item .rtin-figure:before,
.portfolio-multi-layout-3 .rtin-item h3 {
	background-color: rgba(<?php echo esc_html( $secondary_rgb );?>, 0.9);
}
.portfolio-single .portfolio-details ul.rtin-portfolio-info li a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.portfolio-multi-layout-1 .rtin-item .rtin-icon a:hover,
.portfolio-multi-layout-3 .rtin-item:hover h3 a i {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.portfolio-slider-default .rtin-item:after{
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.9);
}
.portfolio-single .portfolio-details h3:after {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.single-portfolio-slider .rt-port-swiper-container .swiper-button > div:hover,
.single-portfolio-slider .rt-port-swiper-container .swiper-button > div:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.portfolio-multi-layout-4 .rtin-item .rtin-content {
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 1);
}
<?php
/*------------------------------
#. EL: Service Layout
--------------------------------*/
?>
.service-default .rt-service-tab a.current,
.service-default .rt-service-tab a:hover {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.service-grid-layout1 .rtin-item .rtin-content .rtin-icon span,
.service-tab-layout .single-item .media {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.service-grid-layout1 .rtin-item:hover .rtin-content .rtin-icon span,
.service-tab-layout .slick-slide.slick-current .nav-item,
.service-tab-layout .slick-slide .nav-item:hover,
.service-slider-default .rtin-icon span {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.service-grid-layout1 .rtin-item:hover:before {
	background-color: rgba(<?php echo esc_html( $secondary_rgb );?>, 0.8);
}
.service-grid-layout1 .rtin-item .rtin-content h3 a,
.service-grid-layout2 .rtin-item .rtin-content h3 a,
.service-grid-layout1 .rtin-item .rtin-content .rtin-read a,
.service-grid-layout2 .rtin-item .rtin-content .rtin-read a {
	color: <?php echo esc_html($primary_color); ?>;
}
.service-grid-layout1 .rtin-item .rtin-content h3 a:hover,
.service-grid-layout2 .rtin-item:hover .rtin-content h3 a,
.service-tab-layout .slick-slide .nav-item i:before,
.service-slider-default .rtin-content .rtin-read a i,
.service-slider-default .rtin-item:hover .rtin-title a,
.service-slider-default .rtin-item:hover .rtin-read a {
	color: <?php echo esc_html($secondary_color); ?>;
}
.rtin-service-wrap h3,
.service-grid-layout2 .rtin-item .rtin-icon i, 
.service-grid-layout2 .rtin-item .rtin-icon i:before {
	color: <?php echo esc_html($primary_color); ?>;
}
.rtin-service-wrap h3:after,
.rtin-service2-wrap h3:after,
.service-isotope-layout2 .rtin-item .rtin-content .rtin-icon span {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.rtin-service-wrap a.service-button:hover,
.rtin-service2-wrap a.service-button:hover,
.service-slider-default .rtin-item:hover span,
.service-isotope-layout2 .rtin-item:hover .rtin-content .rtin-icon span {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.service-slider-default .rtin-item .rtin-title a {
	color: <?php echo esc_html($primary_color); ?>;
}
.service-isotope-layout2 .rtin-item .rtin-content h3 a {
	color: <?php echo esc_html($primary_color); ?>;
}
.service-isotope-layout1 .rtin-item .rtin-read a:hover,
.service-isotope-layout2 .rtin-item .rtin-content h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.service-isotope-layout1 .rtin-item .rtin-content {
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.9);
}
.service-isotope-layout1 .rtin-item .rtin-read a {
	background-color: <?php echo esc_html($alter_bg_color); ?>;
}
<?php
/*------------------------------
#. EL: Testimonial
--------------------------------*/
?>
.default-testimonial .rtin-item .rtin-title {
	color: <?php echo esc_html($primary_color); ?>;
}
.rtin-testimonial-1 .rtin-item .rtin-icon {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.rtin-testimonial-1 .rtin-item:hover .rtin-icon {
	color: <?php echo esc_html($secondary_color); ?>;
}
.rtin-testimonial-4 .slick-carousel-nav .slick-list .slick-track .slick-slide.slick-current .nav-item img {
	border-color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*------------------------------
#. EL: Post Grid
--------------------------------*/
?>
.post-grid-style1 .rtin-single-post .rtin-content h3 a,
.post-grid-style2 .rtin-single-post .rtin-content h3 a,
.post-grid-style3 .post-content h3 a,
.post-grid-style1 .rtin-content ul li i,
.post-grid-style2 .rtin-content ul li i,
.post-grid-style2 .rtin-content .author-meta i,
.post-grid-style3 .post-content .author-meta i {
	color: <?php echo esc_html($primary_color); ?>;
}
.post-grid-style1 .rtin-single-post:hover .post-grid-more,
.post-grid-style2 .rtin-single-post:hover .post-grid-more,
.post-grid-style3 .post-box:hover .post-grid-more,
.post-grid-style1 .rtin-single-post .rtin-content h3 a:hover,
.post-grid-style2 .rtin-single-post .rtin-content h3 a:hover,
.post-grid-style3 .post-content h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-grid-style1 .rtin-content ul li a:hover,
.post-grid-style2 .rtin-content ul li a:hover,
.post-grid-style3 .post-content ul li a:hover,
.post-grid-style3 .post-content .item-author a:hover,
.post-grid-style1 .rtin-single-post .post-grid-more i,
.post-grid-style2 .rtin-single-post .post-grid-more i,
.post-grid-style3 .post-box .post-grid-more i,
.post-grid-style2 .rtin-content ul li i,
.post-grid-style3 .post-content ul li i {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-grid-style1 .rtin-single-post .rtin-img .date-meta {
    background: <?php echo esc_html( $primary_color );?>;
}
.post-grid-style2 .rtin-content ul li.blog-cat a,
.post-grid-style3 .post-content ul li.blog-cat a {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*------------------------------
#. EL: Pricing Table
--------------------------------*/
?>
.rtin-pricing-layout1 .rt-price-table-box .rtin-icon i,
.rtin-pricing-layout1 .rtin-pricing-price .rtin-price {
	color: <?php echo esc_html($secondary_color); ?>;
}
.rt-price-table-box:hover .rtin-icon i,
.rtin-pricing-layout1 .rt-price-table-box ul li:before {
	color: <?php echo esc_html($primary_color); ?>;
}
.offer-active .rt-price-table-box .offer {
    background: <?php echo esc_html( $secondary_color );?>;
}
.rtin-pricing-layout1 .rt-price-table-box .rtin-icon .image-svg svg {
	fill: <?php echo esc_html( $secondary_color );?>;
}
rtin-pricing-layout1 .rt-price-table-box:hover .rtin-icon .image-svg svg {
	fill: <?php echo esc_html( $primary_color );?>;
}
.rtin-pricing-layout2:hover .rt-price-table-box .price-header .rtin-title,
.rtin-pricing-layout2.active-class .rt-price-table-box .price-header .rtin-title,
.rtin-pricing-layout2 .rt-price-table-box .header-wrap {
    background: <?php echo esc_html( $primary_color );?>;
}
.rtin-pricing-layout2 .price-header .rtin-title,
.rtin-pricing-layout2:hover .rt-price-table-box .header-wrap,
.rtin-pricing-layout2.active-class .rt-price-table-box .header-wrap,
.rtin-pricing-layout3 .rtin-pricing-price {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*------------------------------
#. EL: Widget
--------------------------------*/
?>
.fixed-sidebar-left .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
.fix-bar-bottom-copyright .rt-about-widget ul li a:hover, 
.fixed-sidebar-left .rt-about-widget ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.element-side-title h5:after {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*------------------------------
#. EL: Others
--------------------------------*/
?>
.element-side-title h5,
.rtin-service2-wrap h3,
.portfolio-single .portfolio-details h3 {
    color: <?php echo esc_html( $primary_color );?>;
}
.fixed-sidebar-addon .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
.fixed-sidebar-addon .rt-about-widget .footer-social li a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-cat-list-widget li:before,
.rtin-faq .faq-item .faq-number span {
    background: <?php echo esc_html( $primary_color );?>;
}
.elementor-icon-list-items .elementor-icon-list-item i {
    color: <?php echo esc_html( $secondary_color ); ?>;
}
.elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.rtin-address-default .rtin-item .rtin-info a:hover,
.rtin-address-default .rtin-item .rtin-icon i,
.rtin-address-default .rtin-item .rtin-icon i:before {
	color: <?php echo esc_html( $secondary_color );?>;
}
.rtin-logo-slider .rtin-item:hover {
    border-color: <?php echo esc_html($primary_color); ?>;
}
.service-single .elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active,
.faq-style .elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active {
    background: <?php echo esc_html( $primary_color );?>;
}
.faq-style .elementor-accordion .elementor-active .elementor-accordion-icon > span {
    background: <?php echo esc_html( $secondary_color );?>;
}
@-webkit-keyframes pulse {
  0% {
    -webkit-box-shadow: 0 0 0 0 <?php echo esc_html( $primary_color );?>;
    box-shadow: 0 0 0 0 <?php echo esc_html( $primary_color );?>;
  }
  40% {
    -webkit-box-shadow: 0 0 0 50px rgba(<?php echo esc_html( $primary_rgb );?>, 0);
    box-shadow: 0 0 0 50px rgba(<?php echo esc_html( $primary_rgb );?>, 0);
  }
  70% {
    -webkit-box-shadow: 0 0 0 50px rgba(<?php echo esc_html( $primary_rgb );?>, 0);
    box-shadow: 0 0 0 50px rgba(<?php echo esc_html( $primary_rgb );?>, 0);
  }
  100% {
    -webkit-box-shadow: 0 0 0 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0);
    box-shadow: 0 0 0 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0);
  }
}
@keyframes pulse {
  0% {
    -webkit-box-shadow: 0 0 0 0 <?php echo esc_html( $primary_color );?>;
    box-shadow: 0 0 0 0 <?php echo esc_html( $primary_color );?>;
  }
  40% {
    -webkit-box-shadow: 0 0 0 50px rgba(<?php echo esc_html( $primary_rgb );?>, 0);
    box-shadow: 0 0 0 50px rgba(0, 102, 204, 0);
  }
  70% {
    -webkit-box-shadow: 0 0 0 50px rgba(<?php echo esc_html( $primary_rgb );?>, 0);
    box-shadow: 0 0 0 50px rgba(<?php echo esc_html( $primary_rgb );?>, 0);
  }
  100% {
    -webkit-box-shadow: 0 0 0 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0);
    box-shadow: 0 0 0 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0);
  }
}

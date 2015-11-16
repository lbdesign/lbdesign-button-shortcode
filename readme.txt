 how to use:

 [button link="http://something.com" color="red" size="big"]Call to Action![/button]

How to style (can also be found in LBD Client Theme):

 /* DEFAULT button shortcode styles */
a.button {
	background: $color_buttons; /* Old browsers */
	color: #fff !important;
	text-decoration: none;
	font-weight: bold;
	padding: 15px 20px;
	display: inline-block;
	text-transform: uppercase;
	margin-bottom: 20px;
	border: 0;
}
a.button:hover,
a.button:focus {
	background: $color_buttons_hover; /* Old browsers */
}
/* COLOR button styles */
a.button.orange {
	background: $color_buttons_alt; /* Old browsers */
}
a.button.orange:hover,
a.button.orange:focus {
	background: $color_buttons_alt_hover;
}
/* SIZE button styles */
a.button.big {
	padding: 25px 20px;
	font-size: 1.2em;
}
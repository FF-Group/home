<script type="text/javascript">
$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
			width:					870,
			height:					302,
			auto:					false,
			interval:				5000,
			continuous:				true,
			loading:				true,
			tooltip_width:			0,
			tooltip_icon_width:		0,
			tooltip_icon_height:	0,
			tooltip_offsetx:		0,
			tooltip_offsety:		0,
			arrows:					true,
			buttons:				true,
			btn_numbers:			false,
			keybord_keys:			false,
			mousetrace:				false,
			pauseonover:			false,
			transition:				'vslide', /* vslide/hslide/fade */
			transition_speed:		500,
			show_caption:			'onload', /* onload/onhover/show */
			thumbnails:				false,
			thumbnails_position:	'outside-first', /* outside-last/outside-first/inside-last/inside-first */
			thumbnails_direction:	'horizontal', /* vertical/horizontal */
			thumbnails_slidex:		0 /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */	});
});
</script>
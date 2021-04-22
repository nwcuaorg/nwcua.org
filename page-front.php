<?php

/*
Template Name: Homepage
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="content-pad">

		<div class="articles">
			<?php print do_shortcode( '[articles /]' ); ?>
		</div>

		<div class="events">
			<div class="event-list">
				<div class="event first">
					<div class="event-date">
						<span class="event-date-month">Apr</span><span class="event-date-day">22</span>
					</div>
					<h3><a href="/event/example-event-two/">Example Event One</a></h3><div class="event-location">Office 234</div>
					<div class="event-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sagittis dolor et nibh facilisis, id pharetra diam sagittis. Curabitur vel eleifend neque. Aliquam at ligula ex. Nullam iaculis felis quis enim commodo commodo.</div>
				</div>
				<div class="event">
					<div class="event-date">
						<span class="event-date-month">Apr</span><span class="event-date-day">23</span>
					</div>
					<h3><a href="/event/example-event-two/">Example Event Two</a></h3><div class="event-location">Office 234</div>
					<div class="event-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sagittis dolor et nibh facilisis, id pharetra diam sagittis. Curabitur vel eleifend neque. Aliquam at ligula ex. Nullam iaculis felis quis enim commodo commodo.</div>
				</div>
				<div class="event">
					<div class="event-date">
						<span class="event-date-month">Apr</span><span class="event-date-day">25</span>
					</div>
					<h3><a href="/event/example-event-two/">Example Event Three</a></h3><div class="event-location">Office 234</div>
					<div class="event-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sagittis dolor et nibh facilisis, id pharetra diam sagittis. Curabitur vel eleifend neque. Aliquam at ligula ex. Nullam iaculis felis quis enim commodo commodo.</div>
				</div>
				<div class="event">
					<div class="event-date">
						<span class="event-date-month">Apr</span><span class="event-date-day">27</span>
					</div>
					<h3><a href="/event/example-event-two/">Example Event Four</a></h3><div class="event-location">Office 234</div>
					<div class="event-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sagittis dolor et nibh facilisis, id pharetra diam sagittis. Curabitur vel eleifend neque. Aliquam at ligula ex. Nullam iaculis felis quis enim commodo commodo.</div>
				</div>
				<div class="event">
					<div class="event-date">
						<span class="event-date-month">Apr</span><span class="event-date-day">28</span>
					</div>
					<h3><a href="/event/example-event-two/">Example Event Five</a></h3><div class="event-location">Office 234</div>
					<div class="event-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sagittis dolor et nibh facilisis, id pharetra diam sagittis. Curabitur vel eleifend neque. Aliquam at ligula ex. Nullam iaculis felis quis enim commodo commodo.</div>
				</div>
				<div class="event">
					<div class="event-date">
						<span class="event-date-month">Apr</span><span class="event-date-day">30</span>
					</div>
					<h3><a href="/event/example-event-two/">Example Event Six</a></h3><div class="event-location">Office 234</div>
					<div class="event-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sagittis dolor et nibh facilisis, id pharetra diam sagittis. Curabitur vel eleifend neque. Aliquam at ligula ex. Nullam iaculis felis quis enim commodo commodo.</div>
				</div>
			</div>
		</div>

	</div>

<?php

get_footer();

?>
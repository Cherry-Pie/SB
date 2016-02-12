<?php
/**
 * The template for displaying the footer
 */
?>

<footer class="footer">
	<ul>
		<li><a href="<?php the_field('social_facebook', 'option'); ?>"><i class="fa fa-facebook"></i></a></li>
		<li><a href="<?php the_field('social_google_plus', 'option'); ?>"><i class="fa fa-google-plus"></i></a></li>
		<li><a href="<?php the_field('social_twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a></li>
	</ul>
	<p><?php the_field('footer_copyright_text', 'option'); ?></p>
</footer>

<!-- Sing In Modal -->
<div class="modal fade" id="sing-in-modal" tabindex="-1" role="dialog" aria-labelledby="singInModalLabel">
	<div class="modal-dialog loginmodal-holder" role="document">
		<div class="loginmodal-container">
			<button type="button" class="close loginmodal-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p id="singInModalLabel">Login to Your Account</p>
			<form>
				<input type="text" name="user" placeholder="Username">
				<input type="password" name="pass" placeholder="Password">
				<input type="submit" name="login" class="btn btn-primary" value="Login">
			</form>

			<div class="login-help">
				<a href="#">Register</a> - <a href="#">Forgot Password</a>
			</div>
		</div>
	</div>
</div>
<!-- Sing In Modal End -->

<!-- Sing Up Modal -->
<div class="modal fade" id="sing-up-modal" tabindex="-1" role="dialog" aria-labelledby="singUpModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog loginmodal-holder" role="document">
		<div class="loginmodal-container">
			<button type="button" class="close loginmodal-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p id="singInModalLabel">Register Your Account</p>
			<form>
				<input type="text" name="user" placeholder="Username">
				<input type="password" name="pass" placeholder="Password">
				<input type="submit" name="login" class="btn btn-primary" value="Register">
			</form>
		</div>
	</div>
</div>
<!-- Sing In Modal End -->

<?php wp_footer(); ?>
</body>
</html>
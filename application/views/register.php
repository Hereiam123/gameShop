<form role="form" method="post" action="<?php base_url(); ?>users/register">
	<div class="form-group">
		<label>First Name*</label>
		<input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name">
	</div>
	<div class="form-group">
		<label>Last Name*</label>
		<input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name">
	</div>
	<div class="form-group">
		<label>Email Address*</label>
		<input type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
	</div>
	<div class="form-group">
		<label>Choose Username*</label>
		<input type="text" class="form-control" name="username" placeholder="Create A Username">
	</div>
	<div class="form-group">
		<label>Password*</label>
		<input type="password" class="form-control" name="password" placeholder="Enter A Password">
	</div>
	<div class="form-group">
		<label>Confirm Password*</label>
		<input type="password" class="form-control" name="password2" placeholder="Enter Password Again">
	</div>

	<button type="submit" class="btn btn-primary">Register</button>
</form>

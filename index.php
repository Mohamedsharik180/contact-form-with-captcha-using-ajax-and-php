<?php 
include("header.php"); 
?>
<title>phpzag.com : Demo Create Bootstrap Contact Form with Captcha using PHP and Ajax</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link href='style.css' rel='stylesheet' type='text/css'>
<script src="ajax_contact.js"></script>
<?php include('container.php');?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<h2>Bootstrap Contact Form with Captcha using PHP & Ajax</h2>
			<form id="contact_form" method="post" action="process_contact.php" role="form">
				<div class="messages"></div>
				<div class="controls">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_name">Firstname *</label>
								<input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_lastname">Lastname *</label>
								<input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_email">Email *</label>
								<input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_phone">Phone</label>
								<input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="form_message">Message *</label>
								<textarea id="form_message" name="message" class="form-control" placeholder="Please enter message *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">                                       
								<div class="g-recaptcha" data-sitekey="6LfwyDEUAAAAAHwP7cx_q_Rdk4UN1dJ8S1XR9A04"></div>
							</div>
						</div>
						<div class="col-md-12">
							<input type="submit" class="btn btn-success btn-send" value="Send message">
						</div>
					</div> 
					<div class="row">
						<div class="col-md-12">
							<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/bootstrap-contact-form-with-captcha-using-ajax-and-php/">Back to Tutorial</a>		
						</div>
					</div>					
				</div>
			</form>
		</div>
	</div>		
</div>
<?php include('footer.php');?>





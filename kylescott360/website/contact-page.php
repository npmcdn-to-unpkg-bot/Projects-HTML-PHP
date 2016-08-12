<?php include("header.php"); ?>    
<link rel="stylesheet" href="css/killua.css">
<link rel="stylesheet" id="colors" href="css/colors/blue.css">       
<div class="killua-container">
		<form action="#" class="killua">
			<header>
				<i class="icon-mail-forward"></i>
				Contact Form
			</header>
			<fieldset>
			
				<section class="form-field first clearfix">
					<label class="label one-quarter" for="name">Your Name *</label>
					<div class="three-quarter">
						<input type="text" name="name" id="name" class="full-input" required placeholder="Type your name">
					</div>
				</section>
                <section class="form-field clearfix">
                <label class="label one-quarter" for="subject">Phone</label>
                <div class="three-quarter">
                <input type="text" name="subject" id="subject" class="full-input" required placeholder="Phone">
                </div>
                </section>
				<section class="form-field clearfix">
					<label class="label one-quarter" for="email">E-mail *</label>
					<div class="three-quarter">
						<input type="email" name="email" id="email" class="full-input" required placeholder="Type your email">
						<span class="note color-change hidden-note">Please type a valid email for feedback.</span>
					</div>
				</section>
				<section class="form-field clearfix">
					<label class="label one-quarter" for="message">Message *</label>
					<div class="three-quarter">
						<textarea name="message" id="message" class="full-input no-resize" required placeholder="Type your message"></textarea>
					</div>
				</section>		
				
			</fieldset>
			<footer>
				<input type="reset" class="btn" value="Clear">
				<input type="submit" class="btn" value="Submit">
			</footer>
		</form>
	</div>
</div>



	<!-- END -->
	<script>
	/* 
		This code is just for the demo purpose. 
	*/
		(function() {
			var colors = document.querySelectorAll('.colors li'),
				i = 0,
				color;
				
				function createStyle( style ) {
					var cl =document.getElementById('colors');
						document.head.removeChild(cl);
					var link = document.createElement('link');
					link.rel = 'stylesheet';
					link.id = 'colors';
					link.setAttribute('href','css/colors/'+style)
					document.head.appendChild(link);
				}
				
				for(; i< colors.length; i++ ) {
					if( !window.attachEvent ) {
					
						colors[i].addEventListener('click', function() {
							color = this.getAttribute('data-color');	
							createStyle(color);
						}, false);
						
					} else {
						
						colors[i].attachEvent('onclick', function() {
							color = this.getAttribute('data-color');
							createStyle(color);
						});
						
					}
				}

		})();
	</script>
</body>
</html>
<?php
	require 'header.php';
?>
<link href="Contact.css" rel="stylesheet" />
<h1>Contact Us</h1>
<!-- contact info box -->
<article id="contact">
<h3>The best way to contact us is by calling the store during our open hours.</h3>
<h3>Please call (937) 433-1044 and we will be happy to assist you</h3>
</article>
<br>
<!-- contatct form -->
<form id="survey" action="addMessage.php" method="post" >
	<fieldset id="custInfo">
		
		<div class="formRow">
		<label for="name">Name:</label>
		<input name="name" id="name" type="text" placeholder="John Smith" required />
		</div>
		<br>
		
		<div class="formRow">
		<label for="mail">E-mail:</label>
		<input name="email" id="mail" type="email" placeholder="johnsmith@example.com"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required />
		</div>
		<br>
			<div class="formRow">
		<label for="subject">Subject:</label>
		<input name="subject" id="mail" type="text" placeholder="subject"/>
		</div>
		<br>
		<label for="commBox">Message:</label>
		<textarea name="message" id="commBox" required></textarea>	
		<br>
		<div id="buttons">
			<button type="submit" name="addMessage">Send</button>
		</div>
	</form>
  </section>
  </fieldset>
<?php
	require 'footer.php';
?>

<?php
	require 'header.php';
?>
<link href="Review.css" rel="stylesheet" />
<h1>Review</h1>
<section id="customers">
<?php
			$sql = "SELECT * FROM review";
			$query = mysqli_query($connect, $sql);
			while ($row = mysqli_fetch_array($query))
			{
				if ($row['display'] == "yes"){
				echo '<h3>';		
					for($counter=1; $counter <= $row['rating']; $counter++)
					{
					echo '&#9733; ';
					}
					$counter--;
					echo'</h3>
				<p><i><b>"'.$row['review'].'"</i></p></b>
				<h3 class="right"> '.$counter.' out of 5 stars </h3>';
				}else{
				}
			}

?>
 </section>
 <section id="review">
	<form action="addReview.php" method="post">
	<fieldset id="custInfo">
		<legend>Rate your experience</legend>
		
		<div class="formRow">
		<label for="name">Name:</label>
		<input name="name" id="name" type="text" placeholder="John Smith" required />
		</div>
		<br>
		
		<div class="formRow">
		<label for="mail">E-mail:</label>
		<input name="email" id="mail" type="email" placeholder="johnsmith@example.com"/>
		</div>
		<br>
		
		<div class="formRow">
			<label for="visit">Date of Visit:</label>
			<input name="date" id="visit" type="date" required />
		</div>
		<br>
			<label for="commBox">Tell us more about your experience!</label><br>
			<textarea name="review"> </textarea>
		<br>
		
			<label for="rangeBox">Rate the overall service:<br></label>
			<input class="slider" name="rating" id="rangeBox" type="range" value="5" step="1" min="1" max="5" onchange="showRating(this.value)" />
			<p><span id="display"></span> out of 5</p>

		 <script>
			// This gets the value of slider and displays it
			var sliderValue = document.getElementById("rangeBox");
			var screenOutput = document.getElementById("display");
				screenOutput.innerHTML = sliderValue.value;

				sliderValue.oninput = function() {
					screenOutput.innerHTML = this.value;
				}
		</script>
		<div id="buttons">
			<button type="submit" name="addReview" >Submit review</button>
		</div>
	  </fieldset>
	</form>
  </section>

<?php
	require 'footer.php';
?>
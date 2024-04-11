<?php
	require "header.php";
?>
<link href="Menu.css" rel="stylesheet" />
<h1>Menu</h1>
<article>
	<?php
			$sql = "SELECT * FROM menu";
			$query = mysqli_query($connect, $sql);
			echo '<fieldset><legend>Pizza</legend>';
			while ($row = mysqli_fetch_array($query))
			{
				if ($row['sections'] == 'pizza'){
				echo '<h3>'.$row['food'].' | $'.$row['cost'].'</h3>
				<div class="description"><p><b>'.$row['description'].'</b></p></div>';
				}else{}
			}
			echo '</fieldset><br>';
			$sql = "SELECT * FROM menu";
			$query = mysqli_query($connect, $sql);
			echo '<fieldset><legend>Not Pizza</legend>';
			while ($row = mysqli_fetch_array($query))
			{
				if ($row['sections'] == 'not'){
				echo '<h3>'.$row['food'].' | $'.$row['cost'].'</h3>
				<div class="description"><p><b>'.$row['description'].'</b></p></div>';
				}else{}
			}
			echo '</fieldset>';
	?>
</article>
<?php
	require "footer.php";
?>
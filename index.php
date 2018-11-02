<?php 
	error_reporting(E_ALL);
ini_set('display_errors', 1);
	require __DIR__."/model/reciepe.php";
	require __DIR__."/model/calculate.php";
	
	
	/* counter */

	//opens countlog.txt to read the number of hits
	$datei = fopen(__DIR__."/countlog.txt","r");
	$count = fgets($datei,1000);

	fclose($datei);
	$count=$count + 1 ;

	// opens countlog.txt to change new hit number
	$datei = fopen(__DIR__."/countlog.txt","w");
	fwrite($datei, $count);
	fclose($datei);
?>

<html>
	<h1>Item Crafter <?php echo "($count Clicks)"; ?></h1><a href="http://iamfat.squareplayn.com/guestbook"><h2>Guestbook</h2></a>

	<table>
	<tr>
		<td style="padding:20px;background:grey;vertical-align: top;">
			<form name="myLetters" method="POST">
				<h2>Enter Account ID:</h2>
				<input name="user_id"
				<?php 
					if(isset($_POST["user_id"]))
					{
						echo " value ='".$_POST["user_id"]."'";
					}
				?>
				><a href="https://clwo.eu/jailbreak/profile.php" target="_blank">Get Account ID here</a></input>
				
				<h2>Select Item:</h2>
				<!-- Create Select Menu from Elements above-->
				<select name="to_craft">
					<?php 	
					foreach ($reciepes as $key => $value)
					{
					//
						if(isset($_POST["to_craft"]) && $_POST["to_craft"] == $key)
						{
							echo "<option value=\"$key\" selected=\"selected\">$key</option>\n";
						}
						else
						{
							echo "<option value=\"$key\">$key</option>\n";
						}
					}
					?>
				</select>
				<h2>Select Amount</h2>
				<select name="to_craft_amount">
					<?php 	
					for ($i = 1; $i <= 30; $i++) {
						if(isset($_POST["to_craft_amount"]) && $_POST["to_craft_amount"] == $i)
						{
							echo "<option value=\"$i\" selected=\"selected\">$i</option>\n";
						}
						else
						{
							echo "<option value=\"$i\">$i</option>\n";
						}
					}
					?>
				</select>
				

				<button>Calculate</button>
			</form>
		</td>
		<td style="height: 600px;padding:20px;background:#c2c2c2;width:100%;vertical-align: top;">
		<?php 
            // HERE IS ALL THE MAGIC DONE !!!!
			if(isset($_POST["to_craft"]) && isset($_POST["to_craft_amount"]))
			{
				echo "<div><br/>".calculate_reciepes($_POST["to_craft"],$_POST["to_craft_amount"])."</div>";
			}
            // HERE IS ALL THE MAGIC DONE !!!!
		?>
		</td>
	<tr>
	<tr>
		<td>
		   <p>If you want to know which data i process:</p>
		   <p>I track the number of calls of the page (no ip tracking or whatever), nothing more</p>
		   <p>Thanks to Square for offering his server to run the crafting helper</p>
			<?php 
				echo "<p>Processed Data:</p>";
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";
			?>
			
		</td>
		<td>
		<a href="https://clwo.eu/jailbreak/profile.php" target="_blank"><h2>Get Account ID here</h2></a>
			<img src="https://i.imgur.com/nXZqCOa.png" style="width:40%"></img>
		</td>
	</tr>
	</table>


</html>
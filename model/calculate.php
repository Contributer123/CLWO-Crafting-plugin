<?php 
global $obj;
global $buyable_resources;
global $findable_resources;
global $debug;
global $craft_guide;
global $commands;

$commands = "";

$craft_guide = "";
$debug = false;
function modify_object()
{
	global $obj;
	global $debug;
	$obj["Data"]["explosivepart"] = $obj["Data"]["explosive"];
	$obj["Data"]["electronicpart"] = $obj["Data"]["electronic"];
	$obj["Data"]["weaponpart"] = $obj["Data"]["weapon"];

	unset($obj["Data"]["explosive"]);
	unset($obj["Data"]["electronic"]);
	unset($obj["Data"]["weapon"]);

}

function calculate_reciepes($item, $amount)
{	
	global $craft_guide;
	global $commands;
	global $debug;
	global $obj;
	global $buyable_resources;	
	global $findable_resources;
	$buyable_resources = array("gold", "iron", "silver", "copper", "platinum", "phosphorus", "fiber");
	$findable_resources = array("strengthserum", "penicillin");
	include "model/reciepe.php";

	//$json = file_get_contents('https://clwo.eu/jailbreak/api/v2/crafting.php?AccountID=74630545');
	if(isset($_POST["user_id"]) && $_POST["user_id"] != "")
	{
		$json = file_get_contents('https://clwo.eu/jailbreak/api/v2/crafting.php?AccountID='.$_POST["user_id"]);	

		$obj = json_decode($json , true);
	}
	if(!isset($obj["Data"]))
	{
		echo "<b style=\"color:blue;\">Invalid Account ID was registered, use empty account</b>";
		$json = file_get_contents('https://clwo.eu/jailbreak/api/v2/crafting.php?AccountID=11659591');	
		$obj = json_decode($json , true);
	}
	modify_object();

	$str = "$item to craft $amount times";
	
	get_basics($item, $amount, "-");

	$resources_needed = "<ul>";
	foreach($buyable_resources as $key)
	{
		if($obj["Data"]["".strtolower($key)] < 0)
		{
			$resources_needed .= "<li> Buy ".((-1)*$obj["Data"]["".strtolower($key)])." ".strtolower($key)." for ".ceil(((-1)/(10))*$obj["Data"]["".strtolower($key)])." Platinum</li>";
		}
	}
	if($resources_needed != "<ul>")
	{
		echo "<h2>Step 1 - Buy / Find Resources</h2>";
		echo "You have ".$obj["Data"]["platinumcoins"]." Platinum";
		echo "$resources_needed</ul>";
	}
	foreach($findable_resources as $key)
	{
		if($obj["Data"]["".strtolower($key)] < 0)
		{
			print "<p> Find ".((-1)*$obj["Data"]["".strtolower($key)])." ".strtolower($key)."</p>";
		}
	}
	
	echo "<h2>Step 2 - Craft</h2>";
	
	echo "<ol>$craft_guide</ol>";
	
	echo "<h2>Step 2 (using commands)</h2>";
	
	echo "<ol>$commands</ol>";
	
	$resources_available = "";
	foreach($buyable_resources as $key)
	{
		if($obj["Data"]["".strtolower($key)] > 0)
		{
			$resources_available .= "<li> ".($obj["Data"]["".strtolower($key)])." ".strtolower($key)." left, worth ".floor(($obj["Data"]["".strtolower($key)])/15)." Platinum</li>";
		}
	} 
	echo "<h2>Resources Left:</h2>";
	echo "<ul>$resources_available</ul>";	
}

function get_basics($item, $amount, $tab)
{
	global $craft_guide;
	global $commands;
	global $debug;
	global $obj;
	global $buyable_resources;
	global $findable_resources;
	include "model/reciepe.php";
	if(!array_key_exists($item, $reciepes))// !(isset($reciepes{$item})))
	{
		if(array_key_exists(strtolower($item), $obj["Data"]))
		{
			$resource_name = strtolower($item);
			if(in_array($resource_name, $buyable_resources))
			{
		        //What we have 
				
				$obj["Data"]["".strtolower($item)] -= $amount;
				if($obj["Data"]["".strtolower($item)] < 0)
				{
					if($debug) 
						$craft_guide .= "<b> buy some</b>";
					//$craft_guide .= "<h1>buy ".$obj["Data"]["".strtolower($item)]." $resource_name </h1>";
				}
				else
				{
					if($debug) 
						$craft_guide .= "<li>$tab we have enough $resource_name ".$obj["Data"]["".strtolower($item)]." left</li>";
				}
				
			}
			else if(in_array($resource_name, $findable_resources))
			{
				$obj["Data"]["".strtolower($item)] -= $amount;
				if($obj["Data"]["".strtolower($item)] < 0)
				{
					if($debug)
						$craft_guide .= "<b> FIND some</b>";
				}
				else
				{
					$craft_guide .= "<li>$tab we have enough $resource_name ".$obj["Data"]["".strtolower($item)]." left</li>";

				//	$craft_guide .= "we have enough $resource_name";
				}
			}
			else
			{
				$craft_guide .= "<h1>BLUB $resource_name  not found</h1>";
			}
		}
		//$craft_guide .= "<li><h1>$tab not found $item in reciepes list</h1></li>";
		return;
	}
	else
	{
		if($debug) 
		{
			$craft_guide .= "<li>$tab Reciepe found for $item</li>";
		}
	}
	
	foreach ($reciepes{$item} as $key => $value)
	{
		if($key == "cNiceName" || $key == "NeedsOvenUses" || $key == "Returns" || $key == "Frozen" ||$key == "Illegal" || $key == "StoveUsage")
		{
			continue;
		}
		if($debug) 
		{
			$craft_guide .= "<li>$tab $key => ".(intval($amount)*intval($value))."</li>";
		}
		$query = "Required";
		if(substr($key, 0, strlen($query)) === $query)
		{
			// Without Required string
			$item_name = substr($key, strlen($query));
			$needed_total = (intval($amount)*intval($value));
			$have_total = $obj["Data"][strtolower(substr($key, strlen($query)))];
			if($needed_total - $have_total <= 0)
			{
				continue;
			}
			$have_to_craft = $needed_total - $have_total;
			if($debug) 
			{
				$craft_guide .= "<li>$tab should look up $item_name /|\ $needed_total times </li>";
				$craft_guide .= "<li>$tab we have already $have_total</li>";
			
				$craft_guide .= "<li>$tab we only need ".($needed_total - $have_total)."</li>" ;
			}
			if(in_array(strtolower($item_name), $buyable_resources) || in_array(strtolower($item_name), $findable_resources))
			{
				if($debug) $craft_guide .= "Case1";
				get_basics(substr($key, strlen($query)), (intval($amount)*intval($value)), $tab."<b>->$item</b>");
				}
			else
			{
				if($debug) $craft_guide .= "Case2";
				get_basics(substr($key, strlen($query)), $have_to_craft, $tab."<b>->$item</b>");
			}
			// Check how many of these things we already have
			// We do not need to craft it if we have it already !
			
		}
		else
		{
			$craft_guide .= "<h1>$tab not found</h1>";
		}
	}

	
	if(strtolower($item) == "explosivepart")
	{
		$item = "explosive";
	}
	if(strtolower($item) == "electronicpart")
	{
		$item = "electronic";
	}
	if(strtolower($item) == "weaponpart")
	{
		$item = "weapon";
	}
	
	$legal = "";
	$frozen = "";
	if(isset($reciepes{$item}["Frozen"]))
	{
		$frozen = "<span style='color: blue;font-weight: bold;'> freeze </span>";
	}
	if(isset($reciepes{$item}["Illegal"]))
	{
		$legal = "<span style='color: red;font-weight: bold;'> illegal </span>";
	}

	if(isset($reciepes{$item}["StoveUsage"]))
	{
/*	// $commands .= "<li> Usage left:".intval($obj["Data"]["ovenuses"])."</li>";

		if($obj["Data"]["ovenuses"] == 0)
		{
			$craft_guide .= "<li> Get a Stove (Oven) first </li>";
			$commands .= "<li> Find a Stove (Oven) first </li>";
			$obj["Data"]["ovenuses"] = 20;
		}
		else if(intval($obj["Data"]["ovenuses"]) > 0 && $amount <= intval($obj["Data"]["ovenuses"]))
		{
			//everything is fine
			$obj["Data"]["ovenuses"] = intval($obj["Data"]["ovenuses"]) - $amount;
		}
		else
		{
			$uses = intval($obj["Data"]["ovenuses"]);
			$craft_guide .= "<li> You can only craft $uses $item, then get a new stove</li>";
			$commands .= "<li> You can only craft $uses $item, then get a new stove</li>";
			$obj["Data"]["ovenuses"] = 0;
		}
	*/	
	}
	
	if($debug)
	{
		$craft_guide .= "<li> $tab Craft $item $amount times $legal $frozen</li>";
		$commands .= "<li> <i>sm_craftrecipe ".strtolower($item)." $amount</i> $legal $frozen</li>";
	}
	else
	{
		$craft_guide .= "<li> Craft $item $amount times $legal $frozen </li>";
		$commands .= "<li> <i>sm_craftrecipe ".strtolower($item)." $amount</i> $legal $frozen</li>";
	}
	if($tab == "-" && $debug == true)
	{
		echo "<pre>";
		print_r($obj["Data"]);
		echo "</pre>";
	}
	return $obj;
	
}
?>
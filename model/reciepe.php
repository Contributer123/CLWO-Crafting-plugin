<?php 
	$reciepes = array();
	$reciepes{"Bomb"} = array(
			"cNiceName" => "Bomb",
			"Returns" => 1,
			"RequiredElectronicPart" => 1, 
			"RequiredExplosivePart" => 3, 
			"Illegal" => true,
			);
			
	$reciepes{"Mine"} = array(
		"cNiceName" => "Bomb",
		"Returns" => 1,
		"RequiredElectronicPart" => 1, 
		"RequiredExplosivePart" => 3, 
		"Illegal" => true,
		"Frozen" => true,
		);
		
	$reciepes{"Flashbang"} = array(
		"cNiceName" => "Flashbang",
		"Returns" => 4,
		"RequiredExplosivePart" => 1, 
		"RequiredCartridges" => 4, 
		);
		
		
	$reciepes{"HE grenade"} = array(
		"cNiceName" => "HE grenade",
		"Returns" => 2,
		"RequiredExplosivePart" => 1, 
		"RequiredCartridges" => 4, 
		"Illegal" => true,
		);
		
		
	$reciepes{"Molotov"} = array(
		"cNiceName" => "Molotov",
		"Returns" => 1,
		"RequiredExplosivePart" => 1, 
		"RequiredCartridges" => 1, 
		"Illegal" => true,
		);
		
		
	$reciepes{"Smoke grenade"} = array(
		"cNiceName" => "Smoke grenade",
		"Returns" => 2,
		"RequiredPyrophoric" => 1, 
		"RequiredMedical" => 2, 
		"RequiredCartridges" => 2, 
		);
		
		
	$reciepes{"Body armor"} = array(
		"cNiceName" => "Body armor",
		"Returns" => 1,
		"RequiredKevlar" => 3, 
		);
		
		
	$reciepes{"Helmet + body armor"} = array(
		"cNiceName" => "Helmet + body armor",
		"Returns" => 1,
		"RequiredKevlar" => 5, 
		);
		
		
	$reciepes{"USP"} = array(
		"cNiceName" => "USP",
		"Returns" => 1,
		"RequiredWeaponPart" => 2, 
		"RequiredAmmunition" => 1, 
		"Illegal" => true,
		);
		
	$reciepes{"P250"} = array(
		"cNiceName" => "P250",
		"Returns" => 1,
		"RequiredWeaponPart" => 2, 
		"RequiredAmmunition" => 1, 
		"Illegal" => true,
		);
		
	$reciepes{"MAC-10"} = array(
		"cNiceName" => "MAC-10",
		"Returns" => 1,
		"RequiredWeaponPart" => 2, 
		"RequiredAmmunition" => 2, 
		"Illegal" => true,
		);
		
	$reciepes{"UMP-45"} = array(
		"cNiceName" => "UMP-45",
		"Returns" => 1,
		"RequiredWeaponPart" => 2, 
		"RequiredAmmunition" => 2, 
		"Illegal" => true,
		);
	$reciepes{"AK-47"} = array(
		"cNiceName" => "AK-47",
		"Returns" => 1,
		"RequiredWeaponPart" => 3, 
		"RequiredAmmunition" => 2, 
		"Illegal" => true,
		);
	$reciepes{"M4A1-S"} = array(
		"cNiceName" => "M4A1-S",
		"Returns" => 1,
		"RequiredWeaponPart" => 3, 
		"RequiredAmmunition" => 2, 
		"Illegal" => true,
		);
	$reciepes{"M4A4"} = array(
		"cNiceName" => "M4A4",
		"Returns" => 1,
		"RequiredWeaponPart" => 3, 
		"RequiredAmmunition" => 2,
		"Illegal" => true,
		);
	$reciepes{"AWP"} = array(
		"cNiceName" => "AWP",
		"Returns" => 1,
		"RequiredWeaponPart" => 5,
		"RequiredAmmunition" => 3, 
		"Illegal" => true,
		);
	$reciepes{"Ammunition"} = array(
		"cNiceName" => "Ammunition",
		"Returns" => 3,
        "RequiredCartridges" => 3,
        "RequiredPyrophoric" => 1,
        "RequiredSteel" => 1,
		"Illegal" => true,
		
		);
	$reciepes{"ElectronicPart"} = array(
		"cNiceName" => "ElectronicPart",
		"RequiredElecktrum" => 3,
		"RequiredPlatinum" => 40,
		"NeedsOvenUses" => 1,
		"Returns" => 1,
		"StoveUsage" => true,
		);
	$reciepes{"ExplosivePart"} = array(
		"cNiceName" => "ExplosivePart",
		"RequiredPyrophoric" => 4,
		"RequiredSteel" => 1,
		"Returns" => 1,
		"Illegal" => true,
		"Frozen" => true,
		);
	$reciepes{"WeaponPart"} = array(
		"cNiceName" => "WeaponPart",
		"RequiredSteel" => 5,
		"Returns" => 1,
		);
	$reciepes{"Healthshot"} = array(
		"cNiceName" => "Healthshot",
		"Returns" => 1,
		"RequiredPlatinum" => 20,
		"RequiredMedical" => 4,
		);
	$reciepes{"Tank"} = array(
		"cNiceName" => "Tank",
		"Illegal" => true,
		"Returns" => 1,
		"RequiredStrengthSerum" => 5,
		"RequiredKevlar" => 3,
		);
	$reciepes{"Carepackage"} = array(
		"cNiceName" => "Carepackage",
		"Returns" => 1,
		"RequiredCurrencyGuardCoins" => 400,
		);
	$reciepes{"Lootpackage"} = array(
		"cNiceName" => "Lootpackage",
		"Returns" => 1,
		"RequiredCurrencyPlatinum" => 40,

		);
	$reciepes{"Elecktrum"} = array(
		"cNiceName" => "Elecktrum",
		"RequiredGold" => 16,
		"RequiredSilver" => 4,
		"NeedsOvenUses" => 1,
		"Returns" => 1,
		"StoveUsage" => true,
		);
	$reciepes{"Steel"} = array(
		"cNiceName" => "Steel",
		"RequiredIron" => 20,
		"NeedsOvenUses" => 1,
		"Returns" => 1,
		"StoveUsage" => true,
		);
	$reciepes{"Pyrophoric"} = array(
		"Illegal" => true,
		"Frozen" => true,
		"cNiceName" => "Pyrophoric",
		"RequiredIron" => 4,
		"RequiredPhosphorus" => 16,
		"Returns" => 1,
		);
	$reciepes{"Cartridges"} = array(
		"cNiceName" => "Cartridges",
		"RequiredCopper" => 16,
		"RequiredGold" => 4,
		"NeedsOvenUses" => 1,
		"Returns" => 1,
		"Illegal" => true,
		"StoveUsage" => true,
		);
	$reciepes{"Medical"} = array(
		"cNiceName" => "Medical",
		"RequiredPenicillin" => 20,
		"Returns" => 1,
		);
	$reciepes{"Freeday"} = array(
		"cNiceName" => "Freeday",
		"RequiredCurrencyGuardCoins" => 250,
		"Returns" => 1,
		);
	$reciepes{"Antiserum"} = array(
		"cNiceName" => "Antiserum",
		"Collectable" => true
		);
	$reciepes{"Strength Serum"} = array(
		"cNiceName" => "Strength Serum",
		"Collectable" => true
		);
	$reciepes{"Luck Potion"} = array(
		"cNiceName" => "Luck Potion",
		"Collectable" => true,
		);
	$reciepes{"Kevlar"} = array(
		"cNiceName" => "Kevlar",
		"RequiredFiber" => 20,
		"Returns" => 1,
		);
	?>
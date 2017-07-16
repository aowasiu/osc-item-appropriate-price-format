<?php
	/*
	Insert the following snippet in Osclass/oc-includes/osclass/helpers/hitems.php
	Although, it shouldn't matter but just to be on the safe side, paste the code right after function osc_item_formated_price() definition
	*/
?>

<?php

	/**
	* Author:	Adisa Wasiu Olayemi
	* Facebook:	www.facebook.com/AdisaWasiuOlayemi
	* Gmail:	aowasiu@gmail.com
	*
	* First of all, 
	*	You'll be using only the currency symbol
	*	e.g. '₦' instead of 'Nigeria Naira $'
	*	So change the currency Description in the Admin Dashboard to just the symbol
	*	Admin Dashboard >> Settings >> Currencies
	*
	* This function changes price format of e.g.: 
	*	500000.00 ₦ to ₦500000.00 
	*
	* Osclass version 3.7 and above
	* function name:	osc_item_appropriate_price_format
	* Calls osc_item_formated_price
	*
	* @return string
	*/
	function osc_item_appropriate_price_format() {
		if(preg_match('/\d+/', osc_item_formated_price())){
			$data_splitter = explode(' ', osc_item_formated_price());
			$the_currency_symbol = $data_splitter[1]; //e.g. '₦'
			$the_price_amount = $data_splitter[0]*1; //e.g. 500000.34
			$modified_data = $the_currency_symbol . number_format($the_price_amount, 2, '.', ',');
			return $modified_data;
		} else { 
			return osc_item_formated_price();
		}
	}

?>


<?php
	/*
	Now everywhere osc_item_formated_price()is called to display the formated price the function has to be replace by osc_item_appropriate_price_format() instead.

	So for Osclass version 3.7, Edit the following scripts:
		Osclass\oc-content\themes\bender\item.php				
		Osclass\oc-content\themes\bender\loop-single-premium.php
		Osclass\oc-content\themes\bender\loop-single.php
	C:\xampp\htdocs\genieverse.com\AutoBlast\oc-content\themes\bender\item.php
		Osclass/oc-includes/osclass/helpers/hitems.php

	*/
?>
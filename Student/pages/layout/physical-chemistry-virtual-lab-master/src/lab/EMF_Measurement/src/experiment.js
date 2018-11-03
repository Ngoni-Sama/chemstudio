/**Event handling functions starts here*/
function waterTempSliderFn(scope) {
    /**in each sliderchange calculate the emf*/
    emfCalculation(scope);
}

/**function for changing concentration of cathode*/
function concCathodeSliderFn(scope) {
    /**in each sliderchange calculate the emf*/
    emfCalculation(scope);
}

/**function for changing concentration of cathode*/
function concAnodeSliderFn(scope) {
    /**in each sliderchange calculate the emf*/
    emfCalculation(scope);
}

/**function used for changing cathode,solution and connection*/
function changeOptionCathode(scope) {
	/**based on the dropdown selection make previous cathode, cathode solution and cathode connection as hidden */
	getChild(selected_cathode).alpha = 0;
	getChild(cathode_solution).alpha = 0;
	getChild(cathode_connection).alpha = 0;
	/**based on the dropdown selection make cathode, cathode solution and cathode connection as visible */
	getChild(cathode_Item_Array[scope.cathode_type]).alpha = 1;
	getChild(cathode_Solution_Array[scope.cathode_type]).alpha = 1;
	getChild(cathode_Connection_Array[scope.cathode_type]).alpha = 1;
	/**change cathode text based on the dropdown selection*/
	getChild("cathode_txt").text = electrode_Array[scope.cathode_type];
	/**change cathode solution text based on the dropdown selection*/
	getChild("cathode_solution_txt").text = electrode_Solution_Array[scope.cathode_type];
	/**set electrode potential value based on the dropdown selection*/
	electrode_potential_cathode = electrode_Potential_Array[scope.cathode_type];
	/**store selected cathode value as searching key in the json*/
	search_cathode = electrode_Item_Array[scope.cathode_type];
	/**set current cathode, cathode solution and cathode connection as previous*/
	selected_cathode = cathode_Item_Array[scope.cathode_type];
	cathode_solution = cathode_Solution_Array[scope.cathode_type];
	cathode_connection = cathode_Connection_Array[scope.cathode_type];
	emfCalculation(scope);
	emf_measurement_stage.update();
}
	
/**function used for changing anode,solution and connection*/
function changeOptionAnode(scope) {
	/**based on the dropdown selection make previous anode, anode solution and anode connection as hidden */
	getChild(selected_anode).alpha = 0;
	getChild(anode_solution).alpha = 0;
	getChild(anode_connection).alpha = 0;
	/**based on the dropdown selection make anode, anode solution and anode connection as visible */
	getChild(anode_Item_Array[scope.anode_type]).alpha = 1;
	getChild(anode_Solution_Array[scope.anode_type]).alpha = 1;
	getChild(anode_Connection_Array[scope.anode_type]).alpha = 1;
	/**change anode text based on the dropdown selection*/
	getChild("anode_txt").text = electrode_Array[scope.anode_type];
	/**change anode solution text based on the dropdown selection*/
	getChild("anode_solution_txt").text = electrode_Solution_Array[scope.anode_type];
	/**set electrode potential value based on the dropdown selection*/
	electrode_potential_anode = electrode_Potential_Array[scope.anode_type];
	/**store selected anode value as searching key in the json*/
	search_anode = electrode_Item_Array[scope.anode_type];
	/**set current anode, anode solution and anode connection as previous*/
	selected_anode = anode_Item_Array[scope.anode_type];
	anode_solution = anode_Solution_Array[scope.anode_type];
	anode_connection = anode_Connection_Array[scope.anode_type];
	emfCalculation(scope);
	emf_measurement_stage.update();
}
/**Event handling functions ends here*/

/** Calculation function starts here */
function emfCalculation(scope) {
	/**the selected anode and cathode pair is compare with the json file ,then retrieve corresponding
oxidation component,reduction component & no of electrons value from the json file */
	var obj = JSON.parse(text);
	for (var i = 0; i < obj.electrodes.length; i++) {
		if ((obj.electrodes[i].anode == search_anode) && (obj.electrodes[i].cathode == search_cathode)) {
			oxidation_component = obj.electrodes[i].x;
			reduction_component = obj.electrodes[i].y;
			no_of_electrons = obj.electrodes[i].n;
		}
	}
	/**take selected concentration of cathode from the concentration slider*/
	conc_cathode = (scope.concentration1).toFixed(2);
	/**take selected concentration of anode from the concentration slider*/
	conc_anode = (scope.concentration2).toFixed(2);
	/**take selected temperature from the temperature slider*/
	temperature = scope.solution_temp;
	/**convert temperature from degree celcius to kelvin*/
	temp_kelvin = temperature + KELVIN_CONST;
	/**standard cell potential can be calculated using the formula,Standard Cell potential 
(E°Cell = E° Cathode - E° Anode)*/
	standard_cell_potential = electrode_potential_cathode - electrode_potential_anode;
	/**emf is calculated using the formula emf=E°Cell-2.303 RT/nF log((concentration of anode)^x /(concentration of cathode)^y),
here R is the universal gas constant,T is temperature,n is the number of electrons, x is the number ions undergo oxidation,
y is the number ions undergo reduction and F is Faradays constant.*/
	emf = ((standard_cell_potential - (LOG_CONST * (GAS_CONST * temp_kelvin) / (no_of_electrons * FARADAY_CONST)) * (Math.log(Math.pow(conc_anode, oxidation_component) / Math.pow(conc_cathode, reduction_component))))).toFixed(3);
	/**the calculated reading is displayed in the result part and in the voltmeter sametime*/
	scope.emf_value = emf;
	getChild("voltmeter_txt").text = emf;
	emf_measurement_stage.update();
}
/** Calculation function ends here */

function getChild(name) {
    return emf_measurement_stage.getChildByName(name);
}
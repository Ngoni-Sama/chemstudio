/** Function for creating dynamic rectangles */
function createDynamicRect(name, x_val, y_val, width, height, cursor) {
    name.graphics.beginFill("white").drawRect(x_val, y_val, width, height);
    name.alpha = 0.01;
    name.cursor = cursor;
    spectrophotometry_stage.addChild(name);
}

/** Solution drop down list change function */
function changeSolutionFn(scope) {
    for ( var i=0; i<6; i++ ) {
        /** Check each solution whether it match with the dropdown selection */
        if ( scope.Solution == i ) {
            getChild(known_solution_item_array[i]).visible=true;
            getChild(unknown_solution_item_array[i]).visible=true;
        } else {
            /** Visible set as false rest of the solutions */
            getChild(known_solution_item_array[i]).visible=false;
            getChild(unknown_solution_item_array[i]).visible=false;
        }
    }
}

/** Resetting the experiment */
function resetSimulatorFn(scope) {
	window.location.reload(); /** Resetting the experiment */	
}

/** Click event of Calculated concentration submit button */
function submitBtnFn(scope, dialogs) {
    if ( scope.calculatedConctrn != unknown_concentration ) { /** If the concentration is not correct, it will displays error */
        dialogs.error();
    } else { /** Else tick mark will displays */
        scope.correct_ans_hide = false;
    }
}

/** Calculations starts here */

/** Function for calculating absorbance and transmittance */
function calculation(scope) {
    index_value = ((wavelength-initial_wavelength)/5)-1; /** Finding the index of all arrays with respect to the selected wavelength */
    /** The molar_absorbtivity_sample_array contains the absorptivity constants of each selected solution */
    if ( scope.Solution == 0 ) { /** If the selected solution is Cobalt(II) Chloride */
        molar_absorbtivity_sample_array = cobalt_absorptivity_const_array;
    } else if ( scope.Solution == 1 ) { /** Else if the selected solution is Hexaaquacobalt(II) Ion */
        molar_absorbtivity_sample_array = hexa_aqua_cobalt_absorptivity_const_array;
    } else if ( scope.Solution == 2 ) { /** Else if the selected solution is Ferrocene */
        molar_absorbtivity_sample_array = ferrocene_absorptivity_const_array;
    } else if ( scope.Solution == 3 ) { /** Else if the selected solution is Crystal Violet */
        molar_absorbtivity_sample_array = crystal_violet_absorptivity_const_array;
    } else if ( scope.Solution == 4 ) { /** Else if the selected solution is Rose Bengal */
        molar_absorbtivity_sample_array = rose_bengal_absorptivity_const_array;
    } else if ( scope.Solution == 5 ) { /** Else if the selected solution is Coumarin */
        molar_absorbtivity_sample_array = coumarin_absorptivity_const_array;
    }    
    /** Calculating absorbance of known concentration solution, unknown concentration solution and blank tubes.
    Absorbance = (Conc*(Mol. Abs. of sample - Mol. Abs. of blank))/Initial conc */
    if ( known_solution_flag ) {
        absorbance = ((scope.concentration*(molar_absorbtivity_sample_array[index_value]-blank_absorptivity_const_array[index_value]))/INITIAL_CONCEN_CONST).toFixed(4);
    } else if ( unknown_solution_flag ) {        
        absorbance = ((unknown_concentration*(molar_absorbtivity_sample_array[index_value]-blank_absorptivity_const_array[index_value]))/INITIAL_CONCEN_CONST).toFixed(4); 
    } else {
        absorbance = blank_absorptivity_const_array[index_value];
    }
    transmittance = Math.pow(10, (-absorbance+2)).toFixed(4); /** Transmittance = Math.pow(10, (-absorbance+2)) */
    getChild("absorbance_transmittance_value").text = absorbance+" A";
}

/** Calculation ends here */
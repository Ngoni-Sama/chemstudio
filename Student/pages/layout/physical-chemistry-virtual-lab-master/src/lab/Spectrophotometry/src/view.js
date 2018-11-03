(function() {
    angular
        .module('users')
        .directive("experiment", directiveFunction)
})();

var spectrophotometry_stage, exp_canvas, tick; /** Stage, canvas and tick timer for stage updation */

var open_flag, absorbance, transmittance, INITIAL_CONCEN_CONST, known_solution_flag, unknown_solution_flag, blank_flag, concentration_unit;

var unknown_concentration, solution_in_machine_flag, initial_wavelength, wavelength, index_value, absorbance_flag, transmittance_flag;

var solution_array = known_solution_item_array = unknown_solution_item_array = help_array = [];

var blank_absorptivity_const_array = cobalt_absorptivity_const_array = hexa_aqua_cobalt_absorptivity_const_array = [];

var ferrocene_absorptivity_const_array = crystal_violet_absorptivity_const_array = molar_absorbtivity_sample_array = [];

var rose_bengal_absorptivity_const_array = coumarin_absorptivity_const_array = [];

var open_rect = new createjs.Shape();
var close_rect = new createjs.Shape();
var known_solution_rect = new createjs.Shape();
var unknown_solution_rect = new createjs.Shape();
var blank_rect = new createjs.Shape();
var solution_tube_return_rect = new createjs.Shape();
var machine_value_display_rect = new createjs.Shape();

function directiveFunction() {
	return {
		restrict: "A",
		link: function(scope, element, attrs, dialogs) {
			/** Variable that decides if something should be drawn on mouse move */
			var experiment = true;
			if (element[0].width > element[0].height) {
				element[0].width = element[0].height;
				element[0].height = element[0].height;
			} else {
				element[0].width = element[0].width;
				element[0].height = element[0].width;
			}
			if (element[0].offsetWidth > element[0].offsetHeight) {
				element[0].offsetWidth = element[0].offsetHeight;
			} else {
				element[0].offsetWidth = element[0].offsetWidth;
				element[0].offsetHeight = element[0].offsetWidth;
			}
			exp_canvas = document.getElementById("demoCanvas");
			exp_canvas.width = element[0].width;
			exp_canvas.height = element[0].height;
			spectrophotometry_stage = new createjs.Stage("demoCanvas");
			queue = new createjs.LoadQueue(true);
			queue.installPlugin(createjs.Sound);
			loadingProgress(queue, spectrophotometry_stage, exp_canvas.width)
			queue.on("complete", handleComplete, this);
			queue.loadManifest([{
				id: "background",
				src: "././images/background.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "percentage_button_down",
				src: "././images/percentage_button_down.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "percentage_button",
				src: "././images/percentage_button.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "AT_button_down",
				src: "././images/AT_button_down.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "AT_button",
				src: "././images/AT_button.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "machine_open",
				src: "././images/machine_open.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "print_button_down",
				src: "././images/print_button_down.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "print_button",
				src: "././images/print_button.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "switch_down_arrow_down",
				src: "././images/switch_down_arrow_down.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "switch_down_arrow",
				src: "././images/switch_down_arrow.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "switch_up_arrow_down",
				src: "././images/switch_up_arrow_down.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "switch_up_arrow",
				src: "././images/switch_up_arrow.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "tube",
				src: "././images/tube.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "cobalt_solution",
				src: "././images/cobalt_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "hexa_aqua_cobalt_solution",
				src: "././images/hexa_aqua_cobalt_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "ferrocene_solution",
				src: "././images/ferrocene_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "crystal_violet_solution",
				src: "././images/crystal_violet_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "rose_bengal_solution",
				src: "././images/rose_bengal_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "stand_top",
				src: "././images/stand_top.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "tool_tip",
				src: "././images/tool_tip.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "machine_open_top",
				src: "././images/machine_open_top.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "machine_close",
				src: "././images/machine_close.svg",
				type: createjs.LoadQueue.IMAGE
			}]);
			spectrophotometry_stage.enableDOMEvents(true);
			spectrophotometry_stage.enableMouseOver();
			createjs.Touch.enable(spectrophotometry_stage);
			tick = setInterval(updateTimer, 100); /** Stage update function in a timer */

			function handleComplete() {
				/** Loading images, text and containers */
				loadImages(queue.getResult("background"), "background", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("percentage_button_down"), "percentage_button_down", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("percentage_button"), "percentage_button", 507, 423, "pointer", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("AT_button_down"), "AT_button_down", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("AT_button"), "AT_button", 515, 465, "pointer", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("machine_open"), "machine_open", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("print_button_down"), "print_button_down", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("print_button"), "print_button", 522, 506, "pointer", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("switch_down_arrow_down"), "switch_down_arrow_down", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("switch_down_arrow"), "switch_down_arrow", 422, 432, "pointer", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("switch_up_arrow_down"), "switch_up_arrow_down", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("switch_up_arrow"), "switch_up_arrow", 352, 432, "pointer", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("ferrocene_solution"), "known_coumarin_solution", 477, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("rose_bengal_solution"), "known_rose_bengal_solution", 477, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("crystal_violet_solution"), "known_crystal_violet_solution", 477, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("ferrocene_solution"), "known_ferrocene_solution", 477, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("hexa_aqua_cobalt_solution"), "known_hexa_aqua_cobalt_solution", 477, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("cobalt_solution"), "known_conctrn_cobalt_solution", 477, 63, "", 0, spectrophotometry_stage, 1);				
				loadImages(queue.getResult("tube"), "known_conctrn_tube", 478, 38, "", 0, spectrophotometry_stage, 1);				
				loadImages(queue.getResult("ferrocene_solution"), "unknown_coumarin_solution", 524, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("rose_bengal_solution"), "unknown_rose_bengal_solution", 524, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("crystal_violet_solution"), "unknown_crystal_violet_solution", 524, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("ferrocene_solution"), "unknown_ferrocene_solution", 524, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("hexa_aqua_cobalt_solution"), "unknown_hexa_aqua_cobalt_solution", 524, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("cobalt_solution"), "unknown_conctrn_cobalt_solution", 524, 63, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("tube"), "unknown_conctrn_tube", 525, 38, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("tube"), "blank_tube", 570, 38, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("stand_top"), "stand_top", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("tool_tip"), "tool_tip", 300, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("machine_open_top"), "machine_open_top", 0, 0, "", 0, spectrophotometry_stage, 1);
				loadImages(queue.getResult("machine_close"), "machine_close", 0, 0, "", 0, spectrophotometry_stage, 1);

				/** Text box loading */
				setText("open_txt", 140, 530, _("Click here to open"), "white", 1, spectrophotometry_stage);
				setText("close_txt", 158, 180, _("Click here to close"), "white", 1, spectrophotometry_stage);
				setText("wavelength_value", 360, 352, "350 nm", "black", 1.1, spectrophotometry_stage);
				setText("absorbance_transmittance_value", 360, 372, "0.00000 A", "black", 1.2, spectrophotometry_stage);
				setText("known_conctrn_txt", 335, 28, _("Known Concentration"), "black", 1, spectrophotometry_stage);
				setText("unknown_conctrn_txt", 375, 28, _("Unknown Concentration"), "black", 1, spectrophotometry_stage);
				setText("blank_txt", 480, 28, _("Blank"), "black", 1, spectrophotometry_stage);				

				createDynamicRect(solution_tube_return_rect, 140, 480, 135, 60, "pointer");				
				createDynamicRect(open_rect, 140, 480, 135, 60, "pointer");
				createDynamicRect(close_rect, 155, 150, 135, 60, "pointer");
				createDynamicRect(known_solution_rect, 480, 35, 22, 85, "pointer");
                createDynamicRect(unknown_solution_rect, 527, 35, 22, 85, "pointer");
                createDynamicRect(blank_rect, 572, 35, 22, 85, "pointer");
                createDynamicRect(machine_value_display_rect, 350, 355, 130, 25, "pointer");

				initialisationOfVariables(); /** Initializing the variables */               
				initialisationOfImages(); /** Function call for images used in the apparatus visibility */
				translationLabels(); /** Translation of strings using gettext */				

                machineOpenCloseFn(scope); /** Machene open and close functionality */
                mouseOverOutOfTube(known_solution_rect, 300, "known_conctrn_txt"); /** Tooltip for known solution */
                mouseOverOutOfTube(unknown_solution_rect, 350, "unknown_conctrn_txt"); /** Tooltip for unknown solution */
                mouseOverOutOfTube(blank_rect, 400, "blank_txt"); /** Tooltip for blank tube */
                switchEffectsOfButton("switch_up_arrow", "switch_up_arrow_down"); /** Common switch effects of each button */
                switchEffectsOfButton("switch_down_arrow", "switch_down_arrow_down");
                switchEffectsOfButton("percentage_button", "percentage_button_down");
                switchEffectsOfButton("AT_button", "AT_button_down");
                switchEffectsOfButton("print_button", "print_button_down");
                wavelengthIncrease(scope); /** Switch up arrow click event, wavelength increasing on each click */
                wavelengthDecrease(scope); /** Switch down arrow click event, wavelength decreasing on each click */
                atButtonEvent(scope); /** AT button click event, absorbance and transmittance displays on each alternate clicks */
                percentage100ButtonEffect(); /** 100% T button click event */
			}

			/** Add all the strings used for the language translation here. '_' is the short cut for calling the gettext function defined in the gettext-definition.js */
			function translationLabels() {
				/** This help array shows the hints for this experiment */
				help_array = [_("help1"), _("help2"), _("help3"), _("help4"), _("help5"), _("help6"), _("help7"), _("help8"), _("help9"), _("help10"), _("help11"), _("help12"), _("help13"), _("help14"), _("help15"), _("help16"), _("help17"), _("Next"), _("Close")];
				scope.heading = _("Spectrophotometry");
				scope.variables = _("Variables");
				scope.solution_txt = _("Solution");
				scope.solution = _("Cobalt(II) Chloride");
				scope.concentration_txt = _("Concentration");
				scope.reset_btn_txt = _("Reset");
				scope.cuvette_length_txt = _("Cuvette Length = 1 cm");
				concentration_unit = "M";
				scope.unit = concentration_unit;
				scope.calculated_conctrn_txt = _("Calculated Concentration")+"("+concentration_unit+")";
				scope.submit_btn_txt = _("Submit");
				scope.correct_ans_txt = _("Correct Answer");
				scope.result = _("Result");
				scope.copyright = _("copyright");
				/** The solution_array contains the values and types of the solution dropdown */
				scope.solution_array = [{
                    solution: _("Cobalt(II) Chloride"),
                    type: 0
                }, {
                    solution: _("Hexaaquacobalt(II) Ion"),
                    type: 1
                }, {
                    solution: _("Ferrocene"),
                    type: 2
                }, {
                    solution: _("Crystal Violet"),
                    type: 3
                }, {
                    solution: _("Rose Bengal"),
                    type: 4
                }, {
                    solution: _("Coumarin"),
                    type: 5
                }];
				scope.$apply();
			}
		}
	}
}

/** Createjs stage updation happens in every interval */
function updateTimer() {
	spectrophotometry_stage.update();
}

/** All the texts loading and added to the stage */
function setText(name, textX, textY, value, color, fontSize, container) {
	var _text = new createjs.Text(value, "bold " + fontSize + "em Tahoma, Geneva, sans-serif", color);
	_text.x = textX;
	_text.y = textY;
	_text.textBaseline = "alphabetic";
	_text.name = name;
	_text.text = value;
	_text.color = color;
	if ( name == "absorbance_transmittance_value" ) {
		_text.mask = machine_value_display_rect;
	}
	container.addChild(_text); /** Adding text to the container */
}

/** All the images loading and added to the natural_convection_stage */
function loadImages(image, name, xPos, yPos, cursor, rot, container, scale) {
    var _bitmap = new createjs.Bitmap(image).set({});
    _bitmap.x = xPos;
    _bitmap.y = yPos;
    _bitmap.scaleX = _bitmap.scaleY = scale;
    _bitmap.name = name;
    _bitmap.alpha = 1;
    _bitmap.rotation = rot;
    _bitmap.cursor = cursor;
    container.addChild(_bitmap); /** Adding bitmap to the container */
}

/** Function to return child element of stage */
function getChild(child_name) {
    return spectrophotometry_stage.getChildByName(child_name); /** Returns the child element of stage */
}

/** All variables initialising in this function */
function initialisationOfVariables() {
	document.getElementById("site-sidenav").style.display="block";
	absorbance = 0;
	transmittance = 0;
	index_value = 0;
	wavelength = 350;
	initial_wavelength = 345;
	INITIAL_CONCEN_CONST = 0.005;
	open_flag = false;
	blank_flag = false;
	absorbance_flag = true;
	transmittance_flag = false;
	known_solution_flag = false;
	unknown_solution_flag = false;	
	solution_in_machine_flag = false;	
	unknown_concentration = (Math.random()/10).toFixed(4); /** Taking the random values between 0 and 0.1 */
	known_solution_item_array = ["known_conctrn_cobalt_solution", "known_hexa_aqua_cobalt_solution", "known_ferrocene_solution", 
								"known_crystal_violet_solution", "known_rose_bengal_solution", "known_coumarin_solution"];
	unknown_solution_item_array = ["unknown_conctrn_cobalt_solution", "unknown_hexa_aqua_cobalt_solution", "unknown_ferrocene_solution", 
								"unknown_crystal_violet_solution", "unknown_rose_bengal_solution", "unknown_coumarin_solution"];
	blank_absorptivity_const_array = [2.316, -0.028, -0.006, -0.067, -0.2, -0.098, -0.2, -0.2, -0.2, -0.2, -0.2, -0.2, -0.089, -0.072, -0.047, -0.036,
									-0.032, -0.024, -0.021, -0.2, -0.022, -0.007, -0.03, -0.053, -0.087, -0.2, -0.095, -0.056, -0.024, -0.011, -0.007,
									-0.008, -0.008, -0.009, -0.011, -0.011, -0.011, -0.011, -0.012, -0.008, -0.012, -0.01, -0.01, -0.011, -0.009, 
									-0.009, -0.009, 0.56, -0.046, -0.05, -0.036, -0.035, -0.022, -0.019, -0.015, -0.009, -0.005, 0.015, 0.024, -0.08, 
									-0.2, -0.2, -0.023, 0.049, 0.056, 0.041, 0.031, 0.023, 0.017, 0.013, 0.01];
	cobalt_absorptivity_const_array = [2.49, 0.1435, 0.168, 0.112, -0.016, 0.0895, -0.0075, -0.0025, 0.005, 0.019, 0.045, 0.0815, 0.2335, 0.292, 
									0.358, 0.403, 0.4355, 0.47, 0.498, 0.344, 0.547, 0.5895, 0.5955, 0.596, 0.587, 0.499, 0.6335, 0.697, 0.754, 
									0.7855, 0.8085, 0.8175, 0.8225, 0.81, 0.7895, 0.7695, 0.748, 0.7155, 0.656, 0.611, 0.532, 0.4565, 0.3875, 
									0.299, 0.255, 0.215, 0.1825, 0.724, 0.0995, 0.0855, 0.0935, 0.0895, 0.101, 0.1055, 0.1095, 0.1165, 0.1255, 
									0.147, 0.1595, 0.062, -0.053, -0.043, 0.1425, 0.221, 0.224, 0.2015, 0.184, 0.1735, 0.174, 0.1775, 0.1855];
	hexa_aqua_cobalt_absorptivity_const_array = [2.316, -0.028, -0.005, -0.064, -0.196, -0.091, -0.19, -0.186, -0.18, -0.176, -0.172, -0.165, 
												-0.05, -0.024, 0.011, 0.039, 0.063, 0.094, 0.129, -0.02, 0.2, 0.251, 0.264, 0.268, 0.259, 0.171, 
												0.292, 0.349, 0.403, 0.443, 0.469, 0.489, 0.498, 0.494, 0.475, 0.449, 0.409, 0.363, 0.307, 0.274, 
												0.22, 0.179, 0.142, 0.107, 0.081, 0.061, 0.047, 0.608, -0.003, -0.011, 0, -0.001, 0.01, 0.012, 
												0.015, 0.022, 0.027, 0.046, 0.054, -0.049, -0.172, -0.172, 0.003, 0.074, 0.08, 0.063, 0.05, 0.04, 
												0.033, 0.027, 0.023];
	ferrocene_absorptivity_const_array = [0.23293, 0.16936, 0.14878, 0.16372, 0.20509, 0.26273, 0.35888, 0.46702, 0.58102, 0.71239, 0.83737, 
										0.94891, 1.04913, 1.13498, 1.20463, 1.26162, 1.29306, 1.31131, 1.32351, 1.31159, 1.29117, 1.2604, 
										1.21007, 1.14643, 1.06741, 0.97348, 0.86889, 0.76544, 0.65854, 0.55577, 0.45182, 0.35975, 0.28014, 
										0.21842, 0.16252, 0.12187, 0.088, 0.06694, 0.04492, 0.03401, 0.02235, 0.02032, 0.01103, 0.00969, 
										0.00857, 0.00854, 0.00623, 0.00775, 0.00771, 0.00504, 0.00298, 0.00233, 0.00588, 0.0062, 0.00426, 
										0.00802, 0.0035, 0.00223, 0.00559, 0.00283, 0.00454, 0.0051, 0.00332, 0.00407, 0.0024, 0.00419, 
										0.00404, 0.00169, 0.00176, 0.00412, 0.00168];
	crystal_violet_absorptivity_const_array = [0.02998, 0.02876, 0.02673, 0.02668, 0.02257, 0.02263, 0.02096, 0.0124, 0.00743, 0.01014, 0.01282, 
											0.01048, 0.0099, 0.01262, 0.00946, 0.01645, 0.01755, 0.02221, 0.02537, 0.03182, 0.04015, 0.05111, 
											0.06309, 0.07523, 0.09333, 0.11531, 0.14211, 0.16639, 0.20132, 0.23537, 0.28181, 0.33201, 0.39273, 
											0.4594, 0.53252, 0.60393, 0.67396, 0.73027, 0.78716, 0.82983, 0.85283, 0.87838, 0.90389, 0.93837, 
											0.99607, 1.0574, 1.14183, 1.21189, 1.23849, 1.19545, 1.09199, 0.93069, 0.748, 0.58033, 0.41744, 
											0.29416, 0.19953, 0.13365, 0.08809, 0.06145, 0.03946, 0.02675, 0.01651, 0.01127, 0.00722, 
											0.00402, 0.00171, 0.00261, 0.00383, 0.00323, 0.00048];
	rose_bengal_absorptivity_const_array = [0.04974, 0.04446, 0.03274, 0.01954, 0.01673, 0.00993, 0.01121, 0.00721, 0.00578, 0.00682, 0.00934, 
											0.01101, 0.01351, 0.01614, 0.01831, 0.01704, 0.01861, 0.01507, 0.01548, 0.01667, 0.01597, 0.01829, 
											0.02002, 0.02537, 0.03192, 0.0436, 0.06004, 0.06731, 0.08001, 0.0961, 0.12885, 0.18156, 0.25665, 
											0.3244, 0.34905, 0.33269, 0.31752, 0.34327, 0.43973, 0.61395, 0.85055, 1.09487, 1.18107, 0.98119, 
											0.61487, 0.32394, 0.14094, 0.05922, 0.02366, 0.01005, 0.00064, 0.00268, 0.00223, -0.00056, 0.00138, 
											0.00124, -0.00271, -0.00242, -0.0014, -0.00233, -0.00168, -0.00162, -0.00168, -0.00131, -0.00222, 
											-0.0025, -0.00287, -0.00291, 0.00009, -0.002, -0.00042];
	coumarin_absorptivity_const_array = [0.1137, 0.1497, 0.19533, 0.25042, 0.30911, 0.37108, 0.4575, 0.55016, 0.64276, 0.74314, 0.83671, 
										0.93099, 1.02579, 1.10502, 1.16752, 1.21676, 1.248, 1.27241, 1.29907, 1.30418, 1.26884, 1.16572, 
										0.97861, 0.72748, 0.47946, 0.27993, 0.13602, 0.06439, 0.02599, 0.00949, 0.00494, -0.00272, -0.00141, 
										-0.0009, -0.00206, -0.00176, 0.00002, -0.0027, -0.00079, -0.00221, -0.00201, -0.00214, -0.00105, 
										-0.00225, 0.00029, -0.00379, -0.00193, -0.00121, -0.00213, 0.00008, 0.00024, -0.00466, -0.0004, 
										-0.00197, -0.00144, -0.00259, -0.00445, -0.00135, -0.00322, -0.00351, -0.00028, -0.00504, -0.00478, 
										-0.0022, -0.00324, -0.00447, -0.00318, -0.00275, -0.00195, -0.00371, -0.00129];						
}

/** Set the initial status of the bitmap and text depends on its visibility and initial values */
function initialisationOfImages() {
	close_rect.mouseEnabled = false; 
	getChild("machine_open").visible = false;
	getChild("close_txt").visible = false;
	getChild("switch_up_arrow_down").visible = false;
	getChild("switch_down_arrow_down").visible = false;
	getChild("percentage_button_down").visible = false;
	getChild("AT_button_down").visible = false;
	getChild("print_button_down").visible = false;
	getChild("tool_tip").visible = false;
	getChild("known_conctrn_txt").visible = false;
	getChild("unknown_conctrn_txt").visible = false;
	getChild("blank_txt").visible = false;
	getChild("machine_open_top").visible = false;
	getChild("machine_close").visible = false;
	for ( var i=1; i<6; i++ ) {
        getChild(known_solution_item_array[i]).visible=false;
        getChild(unknown_solution_item_array[i]).visible=false;
    }
}

/** Function for open and close the top of the machine */
function machineOpenCloseFn(scope) {
	open_rect.on("click", function() { /** If click on the open rect */
		open_flag = true;
		open_rect.mouseEnabled = false;
    	close_rect.mouseEnabled = true;
    	getChild("machine_open").visible = true;        
    	getChild("open_txt").visible = false;
    	getChild("close_txt").visible = true;
    	getChild("machine_open_top").visible = true;
        getChild("machine_close").visible = false;        
    	mouseClickOfTube(scope, known_solution_rect);
    	mouseClickOfTube(scope, unknown_solution_rect);
    	mouseClickOfTube(scope, blank_rect);   	
    });
    close_rect.on("click", function() { /** If click on the close rect */
    	open_flag = false;
    	open_rect.mouseEnabled = true;
    	close_rect.mouseEnabled = true;    	
        getChild("open_txt").visible = true;
        getChild("close_txt").visible = false;
        getChild("machine_close").visible = true;    	
    	getChild("machine_open").visible = false;
    	getChild("machine_open_top").visible = false;
    	if ( solution_in_machine_flag ) {
    		calculation(scope);
    	}    		
    });            
}

/** Tooltip for known, unknown and blank tubes */
function mouseOverOutOfTube(name, x_val, txt_name) {
	name.on("mouseover", function(event) {
		getChild("tool_tip").visible = true;
		getChild("tool_tip").x = x_val;
		getChild(txt_name).visible = true;
    });
    name.on("mouseout", function(event) {
		getChild("tool_tip").visible = false;
		getChild(txt_name).visible = false;
    });
}

/** Switch effects for all buttons in machine */
function switchEffectsOfButton(up_img, down_img) {
	getChild(up_img).on("mousedown", function() {
		getChild(up_img).visible = false;
		getChild(down_img).visible = true;
	});
	getChild(up_img).on("pressup", function() {
		getChild(up_img).visible = true;
		getChild(down_img).visible = false;
	});
}

/** Switch up arrow click function, wavelength increasing on each click */
function wavelengthIncrease(scope) {
    getChild("switch_up_arrow").on("pressup", function() {   
        if ( wavelength >= 350 & wavelength < 700 ) {
            wavelength = wavelength+5;       
            getChild("wavelength_value").text = wavelength+" nm";
            if ( solution_in_machine_flag ) {
            	calculation(scope); 
	            if ( absorbance_flag == true ) { /** If absorbance flag is true absorbance displays else transmittance displays */
	                getChild("absorbance_transmittance_value").text = absorbance+" A";
	            } else {
	                getChild("absorbance_transmittance_value").text = transmittance+" %T";
	            }
            }            
        }               
    });
}

/** Switch down arrow click function, wavelength decreasing on each click */
function wavelengthDecrease (scope) {
    getChild("switch_down_arrow").on("pressup", function() {
        if ( wavelength > 350 & wavelength <= 700 ) {
            wavelength = wavelength-5;
            getChild("wavelength_value").text = wavelength+" nm";
            if ( solution_in_machine_flag ) {
	            calculation(scope);
	            if ( absorbance_flag == true ) { /** If absorbance flag is true absorbance displays else transmittance displays */
	                getChild("absorbance_transmittance_value").text = absorbance+" A";
	            } else {
	                getChild("absorbance_transmittance_value").text = transmittance+" %T";
	            }
	        }
        }
    });    
}

/** AT button click event, absorbance and transmittance displays on each alternate clicks */
function atButtonEvent(scope) {    
    getChild("AT_button").on("pressup", function() {
        calculation(scope);   
        if ( absorbance_flag == true ) {
            getChild("absorbance_transmittance_value").text = transmittance+" %T";
            absorbance_flag = false;
            transmittance_flag = true;
        } else {
            getChild("absorbance_transmittance_value").text = absorbance+" A";
            absorbance_flag = true;
            transmittance_flag = false;
        }
    });
}

/** Click event of each tubes */
function mouseClickOfTube(scope, name) {
	name.on("click", function(event) {
		if ( open_flag ) {
			scope.solution_disable = true;
			scope.concentration_disable = true;
			known_solution_rect.mouseEnabled = false;
			unknown_solution_rect.mouseEnabled = false;
			blank_rect.mouseEnabled = false;
	        close_rect.mouseEnabled = false;
			if ( name == known_solution_rect ) { /** If the selected tube is known concentration tube */
	            known_solution_flag = true;
				solutionTubeMovement("known_conctrn_tube", known_solution_item_array[scope.Solution], 478, 38); /** Movement of solution tube */
			} else if ( name == unknown_solution_rect ) { /** Else if the selected tube is unknown concentration tube */
	            unknown_solution_flag = true;
				solutionTubeMovement("unknown_conctrn_tube", unknown_solution_item_array[scope.Solution], 525, 38); /** Movement of solution tube */
			} else {
	            blank_flag = true;
				solutionTubeMovement("blank_tube","", 570, 38); /** Movement of blank tube */
			}
			scope.$apply();
		}				
    });    
}

/** Movement of tube */
function solutionTubeMovement(tube, solution, x_pos, y_pos) {  
    var tube_tween = createjs.Tween.get(getChild(tube)).to({
        x: 193, y:410
    }, 3000).call(function() { solutionInMachine(tube, solution, x_pos, y_pos)});
    if ( tube != "blank_tube" ) { /** If selected tube is blank */
    	var solution_tween = createjs.Tween.get(getChild(solution)).to({
	        x: 192, y:435
	    }, 3000);
    }
}

/** Tube move to machine */
function solutionInMachine(tube, solution, x_pos, y_pos) {
    var tube_tween = createjs.Tween.get(getChild(tube)).to({
        y:470
    }, 2000).call(function() { solutionTubeReturn(tube, solution, x_pos, y_pos)}); /** Tube will return to the stand if we needed */
    if ( tube != "blank_tube" ) { /** If selected tube is blank */
        var solution_tween = createjs.Tween.get(getChild(solution)).to({
            y:495
        }, 2000);
    }    
}

/** Tube return click event function */
function solutionTubeReturn(tube, solution, x_pos, y_pos) {
	close_rect.mouseEnabled = true;
	solution_in_machine_flag = true;
    solution_tube_return_rect.mouseEnabled = true;  
    solution_tube_return_rect.on("mousedown", function(event) { /** Tube return mouse down function */
        solution_tube_return_rect.mouseEnabled = false;
        getChild(tube).x = x_pos;
        getChild(tube).y = y_pos;
        if ( tube != "blank_tube" ) { /** If selected tube is blank */
	        getChild(solution).x = x_pos-1;
	        getChild(solution).y = y_pos+25;                                                                                           
	    }
        known_solution_rect.mouseEnabled = true;
        getChild("absorbance_transmittance_value").text = "0.00000 A";  
		unknown_solution_rect.mouseEnabled = true;
		blank_rect.mouseEnabled = true;
        known_solution_flag = false;
        unknown_solution_flag = false;
        solution_in_machine_flag = false;
        blank_flag = false;
    });
}

/** 100% T button click event function */
function percentage100ButtonEffect() {
	getChild("percentage_button").on("pressup", function() {
		if ( absorbance_flag == true ) { /** If absorbance flag is true absorbance displays else transmittance displays */
            getChild("absorbance_transmittance_value").text = "0.00000 A";
        } else {
            getChild("absorbance_transmittance_value").text = "100% T";
        }
	});
}
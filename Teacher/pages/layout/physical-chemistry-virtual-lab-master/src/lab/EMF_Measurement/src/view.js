(function() {
    angular
        .module('users')
        .directive("experiment", directiveFunction)
})();

/**variable declaration*/
var emf_measurement_stage, exp_canvas;

var tick;

var materialArray = helpArray = electrode_Potential_Array = electrode_Item_Array = electrode_Array = electrode_Solution_Array = [];

var cathode_Item_Array = anode_Item_Array = cathode_Solution_Array = anode_Solution_Array = anode_Connection_Array = cathode_Connection_Array = prev_Array = [];

var selected_cathode, selected_anode, anode_solution, cathode_solution, anode_connection, cathode_connection;

var temp_kelvin, anode_type_val, cathode_type_val, electrode_type_val;

var anode_const, cathode_const, electrons_num, oxidation_component, reduction_component;

var conc_cathode, conc_anode, temperature;

var electrode_potential_anode, electrode_potential_cathode, standard_cell_potential;

var KELVIN_CONST, FARADAY_CONST, GAS_CONST, LOG_CONST;

var no_of_electrons, search_anode, search_cathode, angle_const, emf;

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
			/** Stage initialization */
            emf_measurement_stage = new createjs.Stage("demoCanvas");
			queue = new createjs.LoadQueue(true);
			queue.loadManifest([{
				id: "background",
				src: "././images/background.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "lithium",
				src: "././images/lithium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "barium",
				src: "././images/barium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "pottasium",
				src: "././images/pottasium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "sodium",
				src: "././images/sodium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "calcium",
				src: "././images/calcium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "cadmium",
				src: "././images/cadmium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "magnesium",
				src: "././images/magnesium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "aluminium",
				src: "././images/aluminium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "manganese",
				src: "././images/manganese.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "chromium",
				src: "././images/chromium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "zinc",
				src: "././images/zinc.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "iron",
				src: "././images/iron.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "thallium",
				src: "././images/thallium.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "cobalt",
				src: "././images/cobalt.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "nickel",
				src: "././images/nickel.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "tin",
				src: "././images/tin.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "lead",
				src: "././images/lead.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "copper",
				src: "././images/copper.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "silver",
				src: "././images/silver.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "gold",
				src: "././images/gold.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "hydrogen",
				src: "././images/hydrogen.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "blackclip",
				src: "././images/blackclip.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "black_wire_piece",
				src: "././images/black_wire_piece.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "red_wire_piece",
				src: "././images/red_wire_piece.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "redclip",
				src: "././images/redclip.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "beaker",
				src: "././images/beaker.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "salt_bridge",
				src: "././images/salt_bridge.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "common_solution",
				src: "././images/common_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "manganese_sulphate_solution",
				src: "././images/manganese_sulphate_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "cromium_nitrite_solution",
				src: "././images/cromium_nitrite_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "ferrous_sulphate_solution",
				src: "././images/ferrous_sulphate_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "cobalt_sulphate_solution",
				src: "././images/cobalt_sulphate_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "nickel_sulphate_solution",
				src: "././images/nickel_sulphate_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "copper_sulphate_solution",
				src: "././images/copper_sulphate_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}, {
				id: "gold_nitrite_solution",
				src: "././images/gold_nitrite_solution.svg",
				type: createjs.LoadQueue.IMAGE
			}]);

            queue.installPlugin(createjs.Sound);
			loadingProgress(queue,emf_measurement_stage,exp_canvas.width)
            queue.on("complete", handleComplete, this);
            emf_measurement_stage.enableDOMEvents(true);
            emf_measurement_stage.enableMouseOver();
            /** Stage update function in a timer */
            tick = setInterval(updateTimer, 100);
            function handleComplete() {
				/** Loading all images in the queue to the stage */
				loadImages(queue.getResult("background"), "background", 0, 0, "", 0, 1, 1);
				loadImages(queue.getResult("lithium"), "lithium", 150, 85, "", 0, 1, 1);
				loadImages(queue.getResult("lithium"), "lithium1", 512, 85, "", 0, 1, 1);
				loadImages(queue.getResult("barium"), "barium", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("barium"), "barium1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("magnesium"), "magnesium", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("magnesium"), "magnesium1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("aluminium"), "aluminium", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("aluminium"), "aluminium1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("manganese"), "manganese", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("manganese"), "manganese1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("zinc"), "zinc", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("zinc"), "zinc1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("iron"), "iron", 150, 85, "", 0, 0, 1, 1);
				loadImages(queue.getResult("iron"), "iron1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("thallium"), "thallium", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("thallium"), "thallium1", 510, 85, "", 0, 0, 1);
				loadImages(queue.getResult("iron"), "iron", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("iron"), "iron1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("chromium"), "chromium", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("chromium"), "chromium1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("cobalt"), "cobalt", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("cobalt"), "cobalt1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("nickel"), "nickel", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("nickel"), "nickel1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("tin"), "tin", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("tin"), "tin1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("lead"), "lead", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("lead"), "lead1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("copper"), "copper", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("copper"), "copper1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("silver"), "silver", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("silver"), "silver1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("gold"), "gold", 150, 85, "", 0, 0, 1);
				loadImages(queue.getResult("gold"), "gold1", 512, 85, "", 0, 0, 1);
				loadImages(queue.getResult("blackclip"), "blackclip", 120, 68, "", 0, 1, 1);
				loadImages(queue.getResult("black_wire_piece"), "black_wire_piece", 120, 68, "", 0, 0, 1);
				loadImages(queue.getResult("calcium"), "calcium", 152, 102, "", 0, 0, 1);
				loadImages(queue.getResult("pottasium"), "pottasium", 154, 110, "", 0, 0, 1);
				loadImages(queue.getResult("sodium"), "sodium", 153, 102, "", 0, 0, 1);
				loadImages(queue.getResult("cadmium"), "cadmium", 152, 102, "", 0, 0, 1);
				loadImages(queue.getResult("hydrogen"), "hydrogen", 147, 102, "", 0, 0, 1);
				loadImages(queue.getResult("redclip"), "redclip", 538, 74, "", 0, 1, 1);
				loadImages(queue.getResult("red_wire_piece"), "red_wire_piece", 534, 76, "", 0, 0, 1);
				loadImages(queue.getResult("pottasium"), "pottasium1", 514, 110, "", 0, 0, 1);
				loadImages(queue.getResult("sodium"), "sodium1", 514, 102, "", 0, 0, 1);
				loadImages(queue.getResult("cadmium"), "cadmium1", 513, 102, "", 0, 0, 1);
				loadImages(queue.getResult("calcium"), "calcium1", 512, 102, "", 0, 0, 1);
				loadImages(queue.getResult("hydrogen"), "hydrogen1", 508, 102, "", 0, 0, 1);
				loadImages(queue.getResult("salt_bridge"), "salt_bridge", 230, 135, "", 0, 1, 1.2);
				loadImages(queue.getResult("common_solution"), "common_solution1", 112, 252, "", 0, 1, 1);
				loadImages(queue.getResult("manganese_sulphate_solution"), "manganese_sulphate_solution1", 112, 252, "", 0, 0, 1);
				loadImages(queue.getResult("cromium_nitrite_solution"), "cromium_nitrite_solution1", 112, 252, "", 0, 0, 1);
				loadImages(queue.getResult("ferrous_sulphate_solution"), "ferrous_sulphate_solution1", 112, 252, "", 0, 0, 1);
				loadImages(queue.getResult("cobalt_sulphate_solution"), "cobalt_sulphate_solution1", 112, 252, "", 0, 0, 1);
				loadImages(queue.getResult("nickel_sulphate_solution"), "nickel_sulphate_solution1", 112, 252, "", 0, 0, 1);
				loadImages(queue.getResult("copper_sulphate_solution"), "copper_sulphate_solution1", 112, 252, "", 0, 0, 1);
				loadImages(queue.getResult("gold_nitrite_solution"), "gold_nitrite_solution1", 112, 252, "", 0, 0, 1);
				loadImages(queue.getResult("beaker"), "beaker_anode", 107, 196, "", 0, 1, 1);
				loadImages(queue.getResult("common_solution"), "common_solution2", 422, 252, "", 0, 1, 1);
				loadImages(queue.getResult("manganese_sulphate_solution"), "manganese_sulphate_solution2", 422, 252, "", 0, 0, 1);
				loadImages(queue.getResult("cromium_nitrite_solution"), "cromium_nitrite_solution2", 422, 252, "", 0, 0, 1);
				loadImages(queue.getResult("ferrous_sulphate_solution"), "ferrous_sulphate_solution2", 422, 252, "", 0, 0, 1);
				loadImages(queue.getResult("cobalt_sulphate_solution"), "cobalt_sulphate_solution2", 422, 252, "", 0, 0, 1);
				loadImages(queue.getResult("nickel_sulphate_solution"), "nickel_sulphate_solution2", 422, 252, "", 0, 0, 1);
				loadImages(queue.getResult("copper_sulphate_solution"), "copper_sulphate_solution2", 422, 252, "", 0, 0, 1);
				loadImages(queue.getResult("gold_nitrite_solution"), "gold_nitrite_solution2", 422, 252, "", 0, 0, 1);
				loadImages(queue.getResult("beaker"), "beaker_cathode", 416, 196, "", 0, 1, 1);
				/**text that displayed in the cathode*/
				setText("cathode_txt", 531, 182, "Li", "white", 1, 1);
				/**text that displayed in the solution of cathode*/
				setText("cathode_solution_txt", 506, 370, "LiCl", "black", 1, 1);
				/**text that displayed in the anode*/
				setText("anode_txt", 170, 182, "Li", "white", 1, 1);
				/**text that displayed in the solution of anode*/
				setText("anode_solution_txt", 194, 370, "LiCl", "black", 1, 1);
				/**result value that is shown in the voltmeter*/
				setText("voltmeter_txt", 320, 510, "0.000", "black", 1, 1.8);
				setText("voltmeter_unit", 410, 510, "V", "black", 1.1, 1);
				/**anode and cathode label*/
				setText("anode_label", 156, 461, _('anode'), "black", 1.1, 1);
				setText("cathode_label", 502, 461, _('cathode'), "black", 1.1, 1);
				/** Initializing the variables */
				initialisationOfVariables(scope);
				/** Translation of strings using gettext */
				translationLabels();
				emf_measurement_stage.update();
			}
            /** Add all the strings used for the language translation here. '_' is the short cut for 
			calling the gettext function defined in the gettext-definition.js */
            function translationLabels() {
                /** This help array shows the hints for this experiment */
                helpArray = [_("help1"), _("help2"), _("help3"), _("help4"), _("help5"), _("Next"), _("Close")];
                /**experiment name*/
                scope.heading = _("EMF Measurements");
                scope.variables = _("Variables");
                /**label for electrode in the dropdown*/
                scope.lithium = _("Lithium");
                /**label for temperature slider*/
                scope.solution_temperature = _("Temperature");
                /**label for cathode*/
                scope.cathode = _("Cathode ");
                /**label for anode*/
                scope.anode = _("Anode ");
                scope.electrode_types = _("Select Electrode");
                /**label for concentration slider*/
                scope.concentration_solution = _("Concentration");
				scope.emf_label = _("Emf");  
				scope.emf_unit = _("v");
                scope.result = _("Result");
                scope.copyright = _("copyright");
                /** The materialArray contains the values and indexes of the dropdown */
                scope.materialArray = [{
                    material: _('Lithium'),
                    type: 0
                }, {
                    material: _('Potassium'),
                    type: 1
                }, {
                    material: _('Barium'),
                    type: 2
                }, {
                    material: _('Calcium'),
                    type: 3
                }, {
                    material: _('Sodium'),
                    type: 4
                }, {
                    material: _('Magnesium'),
                    type: 5
                }, {
                    material: _('Aluminium'),
                    type: 6
                }, {
                    material: _('Manganese'),
                    type: 7
                }, {
                    material: _('Zinc'),
                    type: 8
                }, {
                    material: _('Chromium'),
                    type: 9
                }, {
                    material: _('Iron'),
                    type: 10
                }, {
                    material: _('Cadmium'),
                    type: 11
                }, {
                    material: _('Thallium'),
                    type: 12
                }, {
                    material: _('Cobalt'),
                    type: 13
                }, {
                    material: _('Nickel'),
                    type: 14
                }, {
                    material: _('Tin'),
                    type: 15
                }, {
                    material: _('Lead'),
                    type: 16
                }, {
                    material: _('Copper'),
                    type: 17
                }, {
                    material: _('Silver'),
                    type: 18
                }, {
                    material: _('Gold'),
                    type: 19
                }, {
                    material: _('Hydrogen'),
                    type: 20
                }];
                scope.$apply();

            }
        }
    }
}

/** Createjs stage updation happens in every interval */
function updateTimer() {
    emf_measurement_stage.update();
}

/** All the texts loading and added to the stage */
function setText(name, textX, textY, value, color, fontSize) {
    var _text = new createjs.Text(value, "bold " + fontSize + "em Tahoma, Geneva, sans-serif", color);
    _text.x = textX;
    _text.y = textY;
    _text.textBaseline = "alphabetic";
    _text.name = name;
    _text.text = value;
	_text.color = color;
	if(name=="voltmeter_txt"){
		_text.font = "2.5em digiface";
	}
    /** Adding text to the stage */
    emf_measurement_stage.addChild(_text);
}

/** All the images loading and added to the stage */
function loadImages(image, name, xPos, yPos, cursor, rot, alpha_value, scale) {
    var _bitmap = new createjs.Bitmap(image).set({});
    _bitmap.x = xPos;
    _bitmap.y = yPos;
    _bitmap.name = name;
    _bitmap.scaleX = _bitmap.scaleY = scale;
    _bitmap.alpha = alpha_value;
    /**setting registration point for voltmeter needle*/
    if (name == "voltmeter_needle") {
        _bitmap.regX = _bitmap.image.width;
        _bitmap.regY = _bitmap.image.height;
    }
    _bitmap.rotation = rot;
    _bitmap.cursor = cursor;
    /** Adding bitmap to the stage */
    emf_measurement_stage.addChild(_bitmap);
}

/** All variables initialising in this function */
function initialisationOfVariables(scope) {
    /**initially stores all electrodes in an array for changing cathode based on the dropdown selection*/
    cathode_Item_Array = ["lithium1", "pottasium1", "barium1", "calcium1", "sodium1", "magnesium1", "aluminium1", "manganese1", "zinc1", "chromium1", "iron1", "cadmium1", "thallium1", "cobalt1", "nickel1", "tin1", "lead1", "copper1", "silver1", "gold1", "hydrogen1"];
    /**initially stores all electrodes in an array for changing anode based on the dropdown selection*/
    anode_Item_Array = ["lithium", "pottasium", "barium", "calcium", "sodium", "magnesium", "aluminium", "manganese", "zinc", "chromium", "iron", "cadmium", "thallium", "cobalt", "nickel", "tin", "lead", "copper", "silver", "gold", "hydrogen"];
    /**initially stores all solutions in an array for changing cathode solution based on the dropdown selection*/
    cathode_Solution_Array = ["common_solution2", "common_solution2", "common_solution2", "common_solution2", "common_solution2", "common_solution2", "common_solution2", "manganese_sulphate_solution2", "common_solution2", "cromium_nitrite_solution2", "ferrous_sulphate_solution2", "common_solution2", "common_solution2", "cobalt_sulphate_solution2", "nickel_sulphate_solution2", "common_solution2", "common_solution2", "copper_sulphate_solution2", "common_solution2", "gold_nitrite_solution2", "common_solution2"];
    /**initially stores all solutions in an array for changing anode solution based on the dropdown selection*/
    anode_Solution_Array = ["common_solution1", "common_solution1", "common_solution1", "common_solution1", "common_solution1", "common_solution1", "common_solution1", "manganese_sulphate_solution1", "common_solution1", "cromium_nitrite_solution1", "ferrous_sulphate_solution1", "common_solution1", "common_solution1", "cobalt_sulphate_solution1", "nickel_sulphate_solution1", "common_solution1", "common_solution1", "copper_sulphate_solution1", "common_solution1", "gold_nitrite_solution1", "common_solution1"];
    /** Array stores different connections based on cathode selected from the dropdown*/
    anode_Connection_Array = ["blackclip", "black_wire_piece", "blackclip", "black_wire_piece", "black_wire_piece", "blackclip", "blackclip", "blackclip", "blackclip", "blackclip", "blackclip", "black_wire_piece", "blackclip", "blackclip", "blackclip", "blackclip", "blackclip", "blackclip", "blackclip", "blackclip", "black_wire_piece"];
    /** Array stores different connections based on anode selected from the dropdown*/
    cathode_Connection_Array = ["redclip", "red_wire_piece", "redclip", "red_wire_piece", "red_wire_piece", "redclip", "redclip", "redclip", "redclip", "redclip", "redclip", "red_wire_piece", "redclip", "redclip", "redclip", "redclip", "redclip", "redclip", "redclip", "redclip", "red_wire_piece"];
    /**chemical formula for electrodes*/
    electrode_Array = ["Li", "K", "Ba", "Ca", "Na", "Mg", "Al", "Mn", "Zn", "Cr", "Fe", "Cd", "Tl", "Co", "Ni", "Sn", "Pb", "Cu", "Ag", "Au", "2H"];
    /**chemical formula for electrode solution*/
    electrode_Solution_Array = ["LiCl", "KCl", "BaCl₂", "CaCl₂", "NaCl", "MgSO₄", "Al(NO₃)₃", "MnSO₄", "ZnSO₄", "Cr(NO₃)₃", "FeSO₄", "CdSO₄", "TlNO₃", "CoSO₄", "NiSO₄", "SnSO₄", "Pb(No₃)₂", "CuSO₄", "AgNO₃", "AuNO₃", "HCl"];
    /**array that stores E°value for electrodes*/
    electrode_Potential_Array = [-3.04, -2.92, -2.90, -2.87, -2.71, -2.37, -1.66, -1.18, -0.76, -0.74, -0.44, -0.40, -0.34, -0.28, -0.24, -0.15, -0.13, 0.34, 0.80, 1.68, 0]
    /**initialise electrode potential of both anode and cathode*/
    electrode_potential_anode = -3.04;
    electrode_potential_cathode = -3.04;
    /** To set the initial value for cathode*/
    selected_cathode = cathode_Item_Array[0];
    /** To set the initial value for anode*/
    selected_anode = anode_Item_Array[0];
    /** To set the initial value for anode solution*/
    anode_solution = anode_Solution_Array[0];
    /** To set the initial value for cathode solution*/
    cathode_solution = cathode_Solution_Array[0];
    /** To set the initial value for anode connection*/
    anode_connection = anode_Connection_Array[0];
    /** To set the initial value for cathode connection*/
    cathode_connection = cathode_Connection_Array[0];
	/** Initial value of slider concentration(cathode) */
	scope.concentration1 = 0.01;
	/** Initial value of slider concentration(anode) */
	scope.concentration2 = 0.01; 
	/** Initial value of slider  temperature */
	scope.solution_temp = 10; 
	/** It disables the sliders */
	scope.slider_disable = false;
	/**Initial value of emf in the result part*/
	scope.emf_value = 0.000;
	/**Unit for temperature*/
	scope.temp_unit=_("℃");
	/**initialize concentration for cathode solution */
    conc_cathode = 0.01;
    /**initialize concentration for anode solution */
    conc_anode = 0.01;
    /**initial value for temperature */
    temperature = 10;
    KELVIN_CONST = 273;
    /**constant value for anode*/
    anode_type_val = -3.04;
    /**constant value for cathode*/
    cathode_type_val = -2.92;
    /**initialize number of electrons*/
    electrons_num = 1;
    /**initialize faraday constant*/
    FARADAY_CONST = 96500;
    /**initialize gas constant*/
    GAS_CONST = 8.314;
    /**initialize log constant*/
    LOG_CONST = 2.303;
    scope.cathode_type = 0;
    scope.anode_type = 0;
    angle_const = 13.4;
	/**initialize electrode array for calculating x,y & n values*/
    electrode_Item_Array = ["lithium", "pottasium", "barium", "calcium", "sodium", "magnesium", "aluminium", "manganese", "zinc", "chromium", "iron", "cadmium", "thallium", "cobalt", "nickel", "tin", "lead", "copper", "silver", "gold", "hydrogen"];
    /**initialize oxidation component,reduction component and number of electrons*/
    oxidation_component = 1;
    reduction_component = 1;
    no_of_electrons = 1;
    /**declare emf value as zero initially*/
    emf = 0;
}


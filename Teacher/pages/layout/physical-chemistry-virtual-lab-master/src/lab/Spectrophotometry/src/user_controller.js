(function(){
    angular
    .module('users',['FBAngular','ui.bootstrap','dialogs.main','pascalprecht.translate'])
    .controller('UserController', [
        '$mdSidenav', '$mdBottomSheet', '$log', '$q','$scope','$element','Fullscreen','$mdToast','$animate','$translate','dialogs',
        UserController
    ])
    .config(['dialogsProvider','$translateProvider',function(dialogsProvider,$translateProvider){
        dialogsProvider.useBackdrop('static');
        dialogsProvider.useEscClose(false);
        dialogsProvider.useCopy(false);
        dialogsProvider.setSize('sm');
        $translateProvider.translations(language,{DIALOGS_ERROR:(_("Error")),DIALOGS_ERROR_MSG:(_("Wrong Answer!")),DIALOGS_CLOSE:(_("Okay"))}),$translateProvider.preferredLanguage(language);
    }]);
	   
    /**
    * Main Controller for the Angular Material Starter App
    * @param $scope
    * @param $mdSidenav
    * @param avatarsService
    * @constructor
    */
    function UserController( $mdSidenav, $mdBottomSheet, $log, $q,$scope,$element,Fullscreen,$mdToast, $animate, $translate, dialogs) {
	    $scope.toastPosition = {
            bottom: true,
            top: false,
            left: true,
            right: false
        };
		$scope.toggleSidenav = function(ev) {
            $mdSidenav('right').toggle();
        };
        $scope.getToastPosition = function() {
            return Object.keys($scope.toastPosition)
            .filter(function(pos) { return $scope.toastPosition[pos]; })
            .join(' ');
        };
        $scope.showActionToast = function() {        
            var toast = $mdToast.simple()
            .content(help_array[0])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());
        
            var toast1 = $mdToast.simple()
            .content(help_array[1])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());
		  
            var toast2 = $mdToast.simple()
            .content(help_array[2])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());
            
            var toast3 = $mdToast.simple()
            .content(help_array[3])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());
            
            var toast4 = $mdToast.simple()
            .content(help_array[4])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());            

            var toast5 = $mdToast.simple()
            .content(help_array[5])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast6 = $mdToast.simple()
            .content(help_array[6])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast7 = $mdToast.simple()
            .content(help_array[7])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast8 = $mdToast.simple()
            .content(help_array[8])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast9 = $mdToast.simple()
            .content(help_array[9])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast10 = $mdToast.simple()
            .content(help_array[10])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast11 = $mdToast.simple()
            .content(help_array[11])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast12 = $mdToast.simple()
            .content(help_array[12])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast13 = $mdToast.simple()
            .content(help_array[13])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast14 = $mdToast.simple()
            .content(help_array[14])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast15 = $mdToast.simple()
            .content(help_array[15])
            .action(help_array[17])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            var toast16 = $mdToast.simple()
            .content(help_array[16])
            .action(help_array[18])
            .hideDelay(15000)
            .highlightAction(false)
            .position($scope.getToastPosition());

            $mdToast.show(toast).then(function() {
                $mdToast.show(toast1).then(function() {
                    $mdToast.show(toast2).then(function() {
                        $mdToast.show(toast3).then(function() {
                            $mdToast.show(toast4).then(function() {
                                $mdToast.show(toast5).then(function() {
                                    $mdToast.show(toast6).then(function() {
                                        $mdToast.show(toast7).then(function() {
                                            $mdToast.show(toast8).then(function() {
                                                $mdToast.show(toast9).then(function() {
                                                    $mdToast.show(toast10).then(function() {
                                                        $mdToast.show(toast11).then(function() {
                                                            $mdToast.show(toast12).then(function() {
                                                                $mdToast.show(toast13).then(function() {
                                                                    $mdToast.show(toast14).then(function() {
                                                                        $mdToast.show(toast15).then(function() {
                                                                            $mdToast.show(toast16).then(function() {
                                                                            });
                                                                        });
                                                                    });
                                                                });
                                                            });
                                                        });
                                                    });
                                                });
                                            });
                                        });
                                    });
                                });
			 				});
			  			});
			  		});
			  	});
            });		
        };
  
        var self = this;
        self.selected     = null;
        self.users        = [ ];
        self.toggleList   = toggleUsersList;
    
        $scope.showValue = false; /** It hides the 'Result' tab */
        $scope.showVariables = false; /** I hides the 'Variables' tab */
        $scope.isActive = true;
        $scope.isActive1 = true;

        $scope.solution_disable = false; /** It enables the solution dropdown */
        $scope.concentration_disable = false; /** It enables the concentration slider */
        $scope.correct_ans_hide = true; /** It hides the tick mark with text */
	
        /** Initial value settings of slider, textbox etc */
        $scope.concentration = 0.001;
        $scope.Solution = 0;

        $scope.goFullscreen = function () {
            /** Full screen */
            if (Fullscreen.isEnabled())
                Fullscreen.cancel();
            else
                Fullscreen.all();
            /** Set Full screen to a specific element (bad practice) */
            /** Full screen.enable( document.getElementById('img') ) */
        };
        
        $scope.toggle = function () {
            $scope.showValue=!$scope.showValue;
            $scope.isActive = !$scope.isActive;
        };
	
        $scope.toggle1 = function () {
            $scope.showVariables=!$scope.showVariables;
            $scope.isActive1 = !$scope.isActive1;
        };
        
        /** Function for changing the drop down list */
        $scope.changeSolution = function(){
            changeSolutionFn($scope); /** Function defined in experiment.js file */
        }
        /** Click event function of Reset button */
        $scope.resetSimulator = function() {
            resetSimulatorFn($scope); /** Function defined in experiment.js file */
        }
        /** Click event of Calculated concentration submit button */
        $scope.submitBtn = function() {
            submitBtnFn($scope, dialogs); /** Function defined in experiment.js file */
        }        

        /** 
        * First hide the bottom sheet IF visible, then
        * hide or Show the 'left' sideNav area
        */
        function toggleUsersList() {
            $mdSidenav('right').toggle();
        }
    }
})();
(function() {
    angular
        .module('users', ['FBAngular', 'ui.bootstrap', 'dialogs.main', 'pascalprecht.translate'])
        .controller('UserController', [
            '$mdSidenav', '$mdBottomSheet', '$log', '$q', '$scope', '$element', 'Fullscreen', '$mdToast', '$animate', '$translate', 'dialogs',
            UserController
        ])
        .config(['dialogsProvider', '$translateProvider', function(dialogsProvider, $translateProvider) {
            dialogsProvider.useBackdrop('static');
            dialogsProvider.useEscClose(false);
            dialogsProvider.useCopy(false);
            dialogsProvider.setSize('sm');
            $translateProvider.translations(language, {
                DIALOGS_ERROR: (_("Error")),
                DIALOGS_ERROR_MSG: (_("Voltage of both heaters must be same.")),
                DIALOGS_CLOSE: (_("Okay"))
            }), $translateProvider.preferredLanguage(language);
        }]);


    /**
     * Main Controller for the Angular Material Starter App
     * @param $scope
     * @param $mdSidenav
     * @param avatarsService
     * @constructor
     */
    function UserController($mdSidenav, $mdBottomSheet, $log, $q, $scope, $element, Fullscreen, $mdToast, $animate, $translate, dialogs) {
        $scope.toastPosition = {
            bottom: true,
            top: false,
            left: true,
            right: false
        };
        $scope.getToastPosition = function() {
            return Object.keys($scope.toastPosition)
                .filter(function(pos) {
                    return $scope.toastPosition[pos];
                })
                .join(' ');
        };
        $scope.showActionToast = function() {
            var toast = $mdToast.simple()
                .content(helpArray[0])
                .action(helpArray[5])
                .hideDelay(15000)
                .highlightAction(false)
                .position($scope.getToastPosition());

            var toast1 = $mdToast.simple()
                .content(helpArray[1])
                .action(helpArray[5])
                .hideDelay(15000)
                .highlightAction(false)
                .position($scope.getToastPosition());

            var toast2 = $mdToast.simple()
                .content(helpArray[2])
                .action(helpArray[5])
                .hideDelay(15000)
                .highlightAction(false)
                .position($scope.getToastPosition());

            var toast3 = $mdToast.simple()
                .content(helpArray[3])
                .action(helpArray[5])
                .hideDelay(15000)
                .highlightAction(false)
                .position($scope.getToastPosition());

            var toast4 = $mdToast.simple()
                .content(helpArray[4])
                .action(helpArray[6])
                .hideDelay(15000)
                .highlightAction(false)
                .position($scope.getToastPosition());

            $mdToast.show(toast).then(function() {
                $mdToast.show(toast1).then(function() {
                    $mdToast.show(toast2).then(function() {
                        $mdToast.show(toast3).then(function() {
                            $mdToast.show(toast4).then(function() {

                            });
                        });
                    });
                });
            });
        };

        var self = this;
        self.selected = null;
        self.users = [];
        self.toggleList = toggleUsersList;
        $scope.showValue = false; /** It hides the 'Result' tab */
        $scope.showVariables = false; /** I hides the 'Variables' tab */
        $scope.isActive = true;
        $scope.isActive1 = true;
        $scope.goFullscreen = function() {
            /** Full screen */
            if (Fullscreen.isEnabled())
                Fullscreen.cancel();
            else
                Fullscreen.all();
            /** Set Full screen to a specific element (bad practice) */
            /** Full screen.enable( document.getElementById('img') ) */
        };

        $scope.toggle = function() {
            $scope.showValue = !$scope.showValue;
            $scope.isActive = !$scope.isActive;
        };
        $scope.toggle1 = function() {
            $scope.showVariables = !$scope.showVariables;
            $scope.isActive1 = !$scope.isActive1;
        };
        /** Function for Water temperature slider */
        $scope.waterTempSlider = function() {
			waterTempSliderFn($scope); /** Function defined in experiment.js file */
		}
        /** Function for changing the drop down list for cathode */
        $scope.setCathodeType = function() {
			changeOptionCathode($scope); /** Function defined in experiment.js file */
		}
        /** Change event function of anode dropdown */
        $scope.setAnodeType = function() {
			changeOptionAnode($scope); /** Function defined in experiment.js file */
		}
        /** Change event function of concentration of anode slider */
        $scope.concAnodeSlider = function() {
			concAnodeSliderFn($scope); /** Function defined in experiment.js file */
		}
        /** Change event function of concentration of cathode slider */
        $scope.concCathodeSlider = function() {
			concCathodeSliderFn($scope); /** Function defined in experiment.js file */
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
var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'ngStorage']);

app.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'partials/login.html',
            navBoolean: false
//            controller: 'loginCtrl'
        })
            .when('/logout', {
                title: 'Logout',
                templateUrl: 'partials/login.html',
                controller: 'logoutCtrl',
                navBoolean: false
            })
            .when('/signup', {
                title: 'Signup',
                templateUrl: 'partials/signup.html',
                navBoolean: false
//                controller: 'authCtrl'
            })
            .when('/main', {
                title: 'main',
                templateUrl: 'partials/main.html',
                navBoolean: false
//                controller: 'authCtrl'
            })
            .when('/', {
                title: 'login',
                templateUrl: 'partials/login.html',
                navBoolean: false,
//                controller: 'authCtrl',
                role: '0'
            })
            .when('/add-entry', {
                title: 'add entry',
                templateUrl: 'partials/add-entry.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/hotspot', {
                title: 'hotspot',
                templateUrl: 'partials/hotspot.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/swapbox', {
                title: 'swapbox',
                templateUrl: 'partials/swapbox.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })            
            .when('/settings', {
                title: 'settings',
                templateUrl: 'partials/settings.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/reset', {
                title: 'reset password',
                templateUrl: 'partials/reset.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/spotify', {
                title: 'connect to spotify',
                templateUrl: 'partials/spotify.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/pin', {
                title: 'pin a song',
                templateUrl: 'partials/pin.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/spoofy', {
                title: 'pin ya song',
                templateUrl: 'partials/spoofy.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/edit-entry', {
                title: 'pin a song',
                templateUrl: 'partials/edit-entry.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .when('/concert-entry', {
                title: 'pin a song',
                templateUrl: 'partials/concert-entry.html',
                navBoolean: false
//                controller: 'authCtrl' 
            })
            .otherwise({
                redirectTo: '/login'
            });
  }]);

//save data between pages
app.factory('dataService', function() {
 var savedData = {};
 function set(data) {
   savedData = data;
 }
 function get() {
  return savedData;
 }

 return {
  set: set,
  get: get
 }

});

app.controller('MyCtrl', function ($scope, $route, $routeParams, $location) {
    
  var navBoolean = $scope.navBoolean;
  navBoolean = false;
  $scope.$route = $route;
  var hello = $location.path();
  $scope.$routeParams = $routeParams;

  console.log($location.path());
  console.log(hello);
  console.log(navBoolean);

  switch (hello){
      case '/login':
          $scope.navBoolean = true;
          console.log(navBoolean);
          break;
      case '/logout':
          $scope.navBoolean = true;
          console.log(navBoolean);
          break;
      case '/signup':
          $scope.navBoolean = true;
          console.log(navBoolean);
          break;
      case '/main':
          $scope.navBoolean = false;
          console.log(navBoolean);
          break; 
      case '/add-entry':
          $scope.navBoolean = true;
          console.log(navBoolean);
          break;
      case '/hotspot':
          $scope.navBoolean = false;
          console.log(navBoolean);
          break;
      case '/swapbox':
          $scope.navBoolean = false;
          console.log(navBoolean);
          break;
      case '/settings':
          $scope.navBoolean = false;
          console.log(navBoolean);
          // $scope.$digest();
          break;
      case '/reset':
          $scope.navBoolean = true;
          console.log(navBoolean);
          break;
      case '/spotify':
          $scope.navBoolean = true;
          console.log(navBoolean);
          // $scope.$digest();
          break;
      case '/pin':
          $scope.navBoolean = false;
          console.log(navBoolean);
          break;
      default:
      $scope.navBoolean = true;
          console.log('default' + navBoolean);
          break;
      } 
  });

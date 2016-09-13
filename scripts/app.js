'use strict';

angular.module('translateApp', ['ui.router','ngResource'])
    .config(function($stateProvider, $urlRouterProvider) {
        $stateProvider
        
            // route for the home page
            .state('app', {
                url:'/',
                views: {
                    'header': {
                        templateUrl : 'views/header.html',
                    },
                    'content': {
                        templateUrl : 'views/home.html',
                        /*controller  : 'IndexController'*/
                    },
                    'footer': {
                        templateUrl : 'views/footer.html',
                    }
                }

            })
        
            // route for the aboutus page
            .state('app.aboutus', {
                url:'aboutus',
                views: {
                    'content@': {
                        templateUrl : 'views/aboutus.html',
                                       
                    }
                }
            })
        
            // route for the lang page
            .state('app.lang', {
                url:'lang',
                views: {
                    'content@': {
                        templateUrl : 'views/lang.html',
                        /*controller  : 'LangController'                  */
                    }
                }
            })

            // route for the price page
            .state('app.price', {
                url: 'price',
                views: {
                    'content@': {
                        templateUrl : 'views/price.html',
                        
                    }
                }
            })

            // route for faq page
            .state('app.faq', {
                url: 'faq',
                views: {
                    'content@': {
                        templateUrl : 'views/faq.html',
                        
                   }
                }
            })

            .state('app.deal', {
                url: 'deal',
                views: {
                    'content@': {
                        templateUrl : 'views/deal.html',
                        
                   }
                }
            });
    
        $urlRouterProvider.otherwise('/');
    })
;

/**
 * Created by ayushimittal on 02/07/17.
 */
var app = angular.module("myApp",["ngRoute"]);
app.config(function ($routeProvider) {
   $routeProvider
       .when("/",{
           templateUrl: "introduction.htm"

        })
       .when("/introduction",{
           templateUrl: "introduction.htm"

       })
       .when("/editor",{
           templateUrl: "editor.htm",
           controller: "embedCtrl"

       })
       .when("/digital_footprint",{
           templateUrl: "digital-footprint.htm"

       })
       .when("/ats",{
           templateUrl: "ats.htm",
           controller: "atsCtrl"


       })
       .when("/resume_parser",{
           templateUrl: "resume_parser.htm"

       })
       .when("/opportunities",{
           templateUrl: "opportunities.htm"

       })
       .when("/resume_edit",{
           templateUrl: "resume_edit.htm"

       })
       .when("/custom",{
           templateUrl: "custom.htm",
           controller:'customCtrl'
       });
});

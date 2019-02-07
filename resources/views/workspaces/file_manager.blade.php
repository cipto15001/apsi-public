<!doctype html>
<html lang="en" data-ng-app="FileManagerApp">
<head>
  <!--
    * Angular FileManager v1.5.1 (https://github.com/joni2back/angular-filemanager)
    * Jonas Sciangula Street <joni2back@gmail.com>
    * Licensed under MIT (https://github.com/joni2back/angular-filemanager/blob/master/LICENSE)
  -->
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>angular-filemanager</title>

  <!-- third party -->
    <script src="{{ asset('vendors/angular-filemanager/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/angular-filemanager/node_modules/angular/angular.min.js') }}"></script>
    <script src="{{ asset('vendors/angular-filemanager/node_modules/angular-translate/dist/angular-translate.min.js') }}"></script>
    <script src="{{ asset('vendors/angular-filemanager/node_modules/ng-file-upload/dist/ng-file-upload.min.js') }}"></script>
    <script src="{{ asset('vendors/angular-filemanager/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendors/angular-filemanager/node_modules/bootswatch/paper/bootstrap.min.css') }}" />
  <!-- /third party -->

  <!-- Uncomment if you need to use raw source code
    <script src="src/js/app.js"></script>
    <script src="src/js/directives/directives.js"></script>
    <script src="src/js/filters/filters.js"></script>
    <script src="src/js/providers/config.js"></script>
    <script src="src/js/entities/chmod.js"></script>
    <script src="src/js/entities/item.js"></script>
    <script src="src/js/services/apihandler.js"></script>
    <script src="src/js/services/apimiddleware.js"></script>
    <script src="src/js/services/filenavigator.js"></script>
    <script src="src/js/providers/translations.js"></script>
    <script src="src/js/controllers/main.js"></script>
    <script src="src/js/controllers/selector-controller.js"></script>
    <link href="src/css/animations.css" rel="stylesheet">
    <link href="src/css/dialogs.css" rel="stylesheet">
    <link href="src/css/main.css" rel="stylesheet">
  -->

  <!-- Comment if you need to use raw source code -->
    <link href="{{ asset('vendors/angular-filemanager/dist/angular-filemanager.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendors/angular-filemanager/dist/angular-filemanager.min.js') }}"></script>
  <!-- /Comment if you need to use raw source code -->

  <script type="text/javascript">
    //example to override angular-filemanager default config
    angular.module('FileManagerApp').config(['fileManagerConfigProvider', function (config) {
      var defaults = config.$get();
      config.set({
        appName: 'angular-filemanager',
        pickCallback: function(item) {
          var msg = 'Picked %s "%s" for external use'
            .replace('%s', item.type)
            .replace('%s', item.fullPath());
          window.alert(msg);
        },

        allowedActions: angular.extend(defaults.allowedActions, {
          pickFiles: false,
          pickFolders: false,
        }),
      });
    }]);
  </script>
</head>

<body class="ng-cloak">
  <angular-filemanager></angular-filemanager>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-35182652-1', 'auto');
    ga('send', 'pageview');
  </script>
</body>
</html>

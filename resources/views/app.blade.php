<!DOCTYPE html>
<html lang="pt" class="h-full bg-white"> 
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon"  href="/images/logo.png" sizes="">
   <!--  <link href="../../resources/css/output.css" rel="stylesheet"> -->
    

    @routes
    @vite('resources/js/app.js')
    @inertiaHead

  </head>  

  <body class="h-full">
    @inertia
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <title>JML workspace layout</title>
  </head>

  <body class="bg-gray-100">
    <x-header />
    <main class="container mx-auto p-4">{{ $slot }}</main>

    @livewireScripts
  </body>
</html>

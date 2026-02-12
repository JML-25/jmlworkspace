<head>
  ...
  @vite('resources/css/app.css')
  @livewireStyles
</head>

<body class="bg-gray-100">
  <x-header />
  <main class="container mx-auto p-4">{{ $slot }}</main>

  @livewireScripts
</body>

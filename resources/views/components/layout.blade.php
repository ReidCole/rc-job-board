@props(['page_title'])

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @vite('resources/css/app.css')
  <title>RC Job Board<?php if (isset($page_title)) {
      echo ' - ' . $page_title;
  } ?></title>
</head>

<body class="flex flex-col">
  <x-header />
  {{ $slot }}
  <footer class="bg-gray-200 text-gray-600 p-4 text-center">
    &copy; Reid Cole 2022
  </footer>
</body>

</html>

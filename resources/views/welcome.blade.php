<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/images/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/png" href="/icon/logo.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/icon/logo.png" sizes="16x16" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    {{-- Shaka Player --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shaka-player@4.11.7/dist/controls.min.css">
    <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.11.7/dist/shaka-player.ui.min.js"></script>
    {{-- <script type="module" src="/resources/Tests/myapp.js"></script> --}}
    <style></style>
  </head>

  <body>
    <div id="app" class="bg-[#f6f6f6]"></div>
    <div id="app">
      <shaka-player></shaka-player>
    </div>
    @vite('resources/js/app.js')
    <script type="module" src="/resources/main.js"></script>
  </body>
</html>

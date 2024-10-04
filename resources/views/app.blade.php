<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link
          href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap"
          rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        
        <!-- icon -->
        <link rel="icon" href="/images/favicon.ico" />
        <link rel="icon" type="image/png" href="/icon/logo.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/icon/logo.png" sizes="16x16" />

        {{-- 網頁設定與設備同寬 --}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
       @inertia
    </body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <meta name="theme-color" content="#7952b3">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])

    {{-- CONSTS --}}
    <script type="text/javascript">
      const _URL = '{{ route('admin.index') }}'
      const _CATEGORY_URL = '{{ route('categories.index') }}'
    </script>
  </head>

  <body>
    
  <x-admin.header></x-admin.header>

  <div class="container-fluid">
    <div class="row">
      
      <x-admin.sidebar></x-admin.sidebar>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('admin.content')
      </main>
    </div>
  </div>



    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    @stack('js')
  </body>
</html>


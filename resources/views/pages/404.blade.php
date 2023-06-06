<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOUSS MASSA</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
  />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    defer
  ></script>
    
  </head>
  <body>
    <main class="h-full pb-16 overflow-y-auto">
    <div class="container flex flex-col items-center px-6 mx-auto">
      <svg
        class="w-12 h-12 mt-8 text-red-200"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          fill-rule="evenodd"
          d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
          clip-rule="evenodd"
        ></path>
      </svg>
      <h1 class="text-6xl font-semibold text-dark-700 dark:text-dark-200">
        404
      </h1>
      @if(session('message'))
          <p class="text-dark-700 dark:text-dark-300">
            {{ session('message') }}
            <a
              class="text-red-600 hover:underline dark:text-red-300"
              href="{{ route('login') }}"
            >
              go to login page
            </a>
            .
          </p>
      @else 
             <p class="text-dark-700 dark:text-dark-300">
                Page not found. Check the address or
                <a
                  class="text-red-600 hover:underline dark:text-red-300"
                  href="{{ route('login') }}"
                >
                go to login page
                </a>
                .
              </p>  
      @endif
     
    </div>
  </main>

  <script src="{{ asset('js/init-alpine.js') }}"></script>
  <script src="{{ asset('js/charts-lines.js') }}" defer></script>
  <script src="{{ asset('js/charts-pie.js') }}" defer></script>
</body>
</html>


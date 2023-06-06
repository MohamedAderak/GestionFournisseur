<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-1 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="https://i.postimg.cc/qMPktQRh/logo-crsm-removebg-preview.png"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="https://i.postimg.cc/qMPktQRh/logo-crsm-removebg-preview.png"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <form method="post" action="{{ route('signup.submit') }}">
                @csrf
                <h1 class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-200">
                    Sign Up
                </h1>
                @if ($errors->any())
                    @foreach ($errors->all() as $item)
                        <div class="bg-red-100 text-center border-red border-red-500 text-red-500 text-red-sm px-4 py-2">
                            {{ $item }}
                        </div>
                    @endforeach
                @endif
                @if(session('message'))
                    <div class="bg-red-100 text-center border-red border-red-500 text-red-500 text-red-sm px-4 py-2">
                        {{ session('message') }}
                    </div>
                @endif
            
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Username</span>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Username"
                    />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Example@email.com"
                    />
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Password</span>
                    <input name="password" required
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="***************"
                        type="password"
                    />
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                    <input name="password_confirmation" required
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="***************"
                        type="password"
                    />
                </label>
                <div class="mt-4 ml-3 float-right">
                    <label class="flex items-center">
                        <input type="checkbox" required name="Agree" id="Agree" class="text-purple-600 form-checkbox" />
                        <span class="ml-2 text-sm text-gray-600">Agree with Terms</span>
                    </label>
                </div>
            
                <!-- You should use a button here, as the anchor is only used for the example  -->
                <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit">Sign Up</button>
            </form>
            
              <hr class="my-8" />

              <p class="mt-1">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="{{ route('login') }}"
                >
                  Already have an account?
                </a>
              </p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

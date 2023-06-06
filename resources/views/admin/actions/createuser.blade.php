@extends('admin.admin_slidebar')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <div class="flex items-center min-h-screen p-1 bg-gray-50 dark:bg-gray-900">
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
            <form method="post" action="{{ route('client.store') }}" enctype="multipart/form-data">
                @csrf
              <h1
                class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-200"
              >
                Create New User
              </h1>
              @if ($errors->any())
                  @foreach ($errors->all() as $item)
                  <div class="bg-red-100 text-center border-red border-red-500 text-red-500 text-red-sm px-4 py-2">
                    {{ $item }}
                </div>
                  @endforeach
              @endif


              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>
              
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">image</span>
                <input name="image" required value="{{ old('image') }}" accept="image/jpeg, image/png, image/jpg, image/gif"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="file"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Role</span>
                <select id="role" name="role" required
                    class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    <option value="0">Select</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select> 
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" required value="{{ old('email') }}"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="email"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" required type="password"
                class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray"
              />
              </label>
     
            
              <!-- You should use a button here, as the anchor is only used for the example  -->
               <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">Ajouter</button> 
              </a>
            </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
    @endsection
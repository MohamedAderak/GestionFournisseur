@extends('admin.admin_slidebar')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">

      
      <!-- With actions -->
      <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
      >
       Demandes Table
      </h4>
      @if(session('success'))
            <div class="bg-green-100 text-center border border-green-400 text-green-700 px-4 py-2 mt-4">
                {{ session('success') }}
            </div>
        @endif
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
                <th class="px-4 py-3">Client</th>
                <th class="px-4 py-3">Produit</th>
                <th class="px-4 py-3">service</th>
                <th class="px-4 py-3">Quantity</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Actions</th>
              </tr>
            </thead>
            <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >
            @foreach ($demandes as $produit)
                
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                
                  <div>
                    <p class="font-semibold">{{ $produit->username }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                  {{ $produit->product }}
              </td>
              <td class="px-4 py-3 text-sm">
                  {{ $produit->service }}
              </td>
              <td class="px-4 py-3 text-xs">
                @foreach ($stock as $p)
                  @if ($p->product === $produit->product)
                    @if ($produit->Quantity < $p->Quantity)
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{ $produit->Quantity }}
                      </span>
                    @else
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-white dark:bg-red-600">
                        {{ $produit->Quantity }}
                      </span>
                    @endif
                    @break
                  @endif
                @endforeach
              </td>
              <td class="px-4 py-3 text-xs">
                         <span
                              class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                          >
                          {{ $produit->status }}
                         </span>
              </td>

              <td class="px-4 py-3 text-sm">
                  {{ $produit->created }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <form action="{{ route('accept.demande', $produit->id ) }}" method="post">
                    @csrf
                    <button
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                      aria-label="accept"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                      <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0" fill="green" />
                    </svg>
                                        
                    </button>
                  </form>
                  <form action="{{ route('refuse.demande', $produit->id ) }}" method="post">
                    @csrf
                    <button
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                      aria-label="refuse"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                      
                      <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" fill="red" />
                    </svg>
                                        
                    </button>
                  </form>
                
                  
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
          <span class="flex items-center col-span-3">
              Showing {{ $demandes->firstItem() }}-{{ $demandes->lastItem() }} of {{ $demandes->total() }}
          </span>
          <span class="col-span-2"></span>
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
              <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                      <li>
                        <a href="{{ $demandes->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous" @if(!$demandes->previousPageUrl()) disabled @endif
                      >
                      <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                          <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                      </svg>
                      </a>
                         
                      </li>
                      
                      <li>
                          <a href="{{ $demandes->nextPageUrl() }}"
                              class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                              aria-label="Next"
                              @if(!$demandes->nextPageUrl()) disabled @endif
                          >
                              <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                  <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                              </svg>
                          </a>
                      </li>
                  </ul>
              </nav>
          </span>
        
      </div>
      </div>
    </div>
  </main>
  @endsection
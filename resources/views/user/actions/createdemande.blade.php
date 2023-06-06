@extends('user.user_slidebar')

@section('data')
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
              <form method="post" action="{{ route('demande.store') }}">
                @csrf
              <h1
                class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-200"
              >
                Create New Demande
              </h1>
              @if(session('success'))
                  <div class="bg-green-100 text-center border border-green-400 text-green-700 px-4 py-2 mt-4">
                      {{ session('success') }}
                  </div>
              @endif
              @if ($errors->any())
                  @foreach ($errors->all() as $item)
                  <div class="bg-red-100 text-center border-red border-red-500 text-red-500 text-red-sm px-4 py-2">
                    {{ $item }}
                </div>
                  @endforeach
              @endif


              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Produit</span>
                <select name="product" required autofocus
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select"
                  onchange="updateDate(this)"
                >
                  <option value="">Select a product</option>
                  @foreach ($stock as $item)
                  <option value="{{ $item->product }}" data-date="{{ $item->date }}">{{ $item->product }}</option>
                  @endforeach
                </select>
              </label>
              
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Date De Produit</span>
                <input name="date" required
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="date" readonly
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Reason</span>
                <textarea name="Reason" required value="{{ old('Reason') }}"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    
                ></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Service</span>
                <select id="service" name="service" required
                    class="block w-full px-3 py-2 mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    <option value="0">Select</option>
                    <option value="Humaines et Logistique">Humaines et Logistique</option>
                    <option value="Service des Ressources Financières et Recouvrement">Service des Ressources Financières et Recouvrement</option>
                    <option value="Service du Budget et Comptabilité">Service du Budget et Comptabilité</option>
                    <option value="Service des marchés">Service des marchés</option>
                    <option value="Service de l'Aménagement du Territoire et du Transport">Service de l'Aménagement du Territoire et du Transport</option>
                    <option value="Service Environnement">Service Environnement</option>
                    <option value="Service des équipements">Service des équipements</option>
                    <option value="Service de la Coopération et du Partenariat">Service de la Coopération et du Partenariat</option>
                    <option value="Service Migration et développement">Service Migration et développement</option>
                    <option value="Service des Affaires Sociales (Santé, Education et Sport)">Service des Affaires Sociales (Santé, Education et Sport)</option>
                    <option value="Service des Affaires Culturelles et de la Préservation du Patrimoine">Service des Affaires Culturelles et de la Préservation du Patrimoine</option>
                    <option value="Service de Promotion de l'Investissement, d'Aide à l'Entreprise et de le Promotion du Travail">Service de Promotion de l'Investissement, d'Aide à l'Entreprise et de le Promotion du Travail</option>
                    <option value="Service du Développement Rural">Service du Développement Rural</option>
                    <option value="Service des Activités Economiques">Service des Activités Economiques</option>
                </select> 
              </label>
              
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Quantity</span>
                <input name="Quantity" required value="{{ old('Quantity') }}"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="number"
                />
              </label>
        
     
            
              <!-- You should use a button here, as the anchor is only used for the example  -->
               <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">New Demande</button> 
              </a>
            </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
  function updateDate(selectElement) {
    const dateInput = document.querySelector('input[name="date"]');
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const selectedDate = selectedOption.getAttribute('data-date');
    dateInput.value = selectedDate;
  }
</script>
    @endsection
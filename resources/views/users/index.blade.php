<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion d\'utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- {{dd($users)}} --}}
        
        <div class="container mx-auto p-6">
            <h2 class="text-2xl font-semibold mb-4">Liste des Utilisateurs</h2>
            
            <!-- Barre de recherche -->
            <div class="flex justify-between mb-4">
                <input
                    type="text"
                    id="search"
                    placeholder="Rechercher un utilisateur..."
                    class="px-4 py-2 w-1/3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500"
                >
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Ajouter Utilisateur</button>
            </div>
        
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-medium text-gray-700">Nom</th>
                            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-medium text-gray-700">Email</th>
                            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-medium text-gray-700">Sexe</th>
                            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-medium text-gray-700">Rôle</th>
                            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body">
                        @foreach ($users as $item)
                        
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b border-gray-200 text-gray-700">{{$item->name}}</td>
                            <td class="py-2 px-4 border-b border-gray-200 text-gray-700">{{$item->email}}</td>
                            <td class="py-2 px-4 border-b border-gray-200 text-gray-700">{{$item->sexe}}</td>
                            <td class="py-2 px-4 border-b border-gray-200 text-gray-700">{{$item->role->name}}</td>
                            <td class="py-2 px-4 border-b border-gray-200 text-gray-700">
                                <button type="button" onclick="changeRole(event, {{ $users }})" title="Changer rôle" data-modal-target="change-role" data-modal-toggle="change-role" class="px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z" />
                                        <path fill-rule="evenodd" d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z" clip-rule="evenodd" />
                                    </svg>                                      
                                </button>
                                <button class="text-red-500 hover:text-red-700">Supprimer</button>
                                <span class="opacity-95 border-green-400 border text-green-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                        </svg>
                                        En cours
                                </span>
                            </td>
                            <td class="">
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        {{dd($user)}}       
    </div>
    
    <x-editRole :roles="$roles" :user="$user" />
    
    <script>
        document.getElementById('search').addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#user-table-body tr');
            
            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
                
                if (rowText.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>

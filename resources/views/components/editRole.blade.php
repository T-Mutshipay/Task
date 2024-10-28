@props(['roles', 'user']) 

<div id="change-role" tabindex="-1" aria-hidden="true" class="hidden mx-auto overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center max-w-7xl md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div id="title"></div>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="change-role">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="max-h-auto mx-auto max-w-5xl">
                    <form class="w-full" action="{{ route('users.updateRole') }}" method="POST">
                        @csrf
                        <div id="id"></div>
                        <div class="flex">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white m-4">Rôle :</label>
                            <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-52 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" 
                                        @if ($user->role === $role->name) selected="true" @endif>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end mt-2 mb-2">
                            <button type="submit" class="text-white bg-theme focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-500">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeRole(event, user) { 
        event.preventDefault();
        const title = document.getElementById('title');
        title.innerHTML =
            `<h3 class="text-xl font-semibold text-gray-900 dark:text-white px-6">Changement du rôle de ${user.name}</h3>
             <h3 class="text-md font-semibold text-gray-900 dark:text-white px-6">Rôle actuel : ${user.role}</h3>`;
        const id = document.getElementById('id');
        id.innerHTML = `<input type="hidden" name="id" value="${user.id}">`;
    }
</script>
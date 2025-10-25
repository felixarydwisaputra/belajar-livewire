 <div wire:poll.visible class="w-1/2 h-full p-10 ">
     <div class="w-full">
         <h1 class="text-2xl/9 text-center font-bold">Users Page</h1>
         <form wire:submit="search" class="max-w-xl mx-auto my-8">
             <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
             <div class="relative">
                 <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                     <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                     </svg>
                 </div>
                 <input wire:model.live="query" type="search" id="default-search"
                     class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     placeholder="Search User(s) by name....." />
             </div>
         </form>

         <ul>
             @foreach ($this->users as $user)
                 <li class="hover:cursor-pointer hover:bg-gray-100">
                     <div class="flex items-center justify-between p-3">
                         <div class="flex items-center gap-5">
                             <div
                                 class="w-12 h-12 object-contain block rounded-full overflow-hidden border-2 border-gray-300">
                                 <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('img/default.jpg') }}"
                                     class="w-12 h-12 object-cover block" alt="profile picture">
                             </div>
                             <div class=" text-start">
                                 <h4>{{ $user->name }}</h4>
                                 <p class="text-xs font-light text-gray-700">{{ $user->email }}</p>
                             </div>
                         </div>
                         <p class="text-xs font-light text-gray-500">Joined
                             {{ $user->created_at->diffForHumans() }}</p>
                     </div>
                 </li>
                 <hr class="border text-gray-100">
             @endforeach
             <div class="mt-6">
                 {{ $this->users->links() }}
             </div>
         </ul>
     </div>
 </div>

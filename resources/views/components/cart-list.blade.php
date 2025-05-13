<div x-data>
    <ul role="list" class="divide-y divide-gray-200">
        <template x-for="item in $store.cart.items">
            <li class="flex px-4 py-6 sm:px-6">
                <div class="shrink-0">
                    <img x-bind:src="item.image" x-bind:alt="item.name" class="w-12"/>
                </div>

                <div class="ml-6 flex flex-1 flex-col">
                    <div class="flex">
                        <div class="min-w-0 flex-1">
                            <h4 class="text-sm">
                                <a class="font-medium text-gray-700 hover:text-gray-800"
                                   x-text="item.name"
                                >
                                </a>
                            </h4>
                        </div>

                        <div class="ml-4 flow-root shrink-0">
                            <button
                                x-on:click="$store.cart.remove(item)"
                                type="button"
                                class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Remove</span>
                                <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                          d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-1 items-end justify-between pt-2">
                        <p class="mt-1 text-sm font-medium text-gray-900"
                        >₦ <span x-text="item.price"></span></p>

                        <div class="ml-4">
                            <div class="grid grid-cols-1">
                                <input id="quantity" aria-label="Quantity"
                                       x-bind:name="'quantities['+ item.id +']'"
                                       x-bind:value="item.quantity"
                                       x-model="item.quantity"
                                       class="col-start-1 row-start-1 w-20 appearance-none rounded-md bg-white py-2 pr-8 pl-3
                                text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2
                                focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </template>

    </ul>
    <dl class="space-y-6 border-gray-200 px-4 py-6 sm:px-6">
        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
            <dt class="text-base font-medium">Total</dt>
            <dd class="text-base font-medium text-gray-900">₦ <span x-text="$store.cart.total()"></span></dd>


        </div>
    </dl>

</div>

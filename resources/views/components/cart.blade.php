@php use App\Models\Setting;use App\Services\CartService; @endphp
<x-layout-base>
    <div class="bg-gray-50">
        <div class="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Checkout</h2>

            <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16" action="{{route('checkout.post')}}"
                  method="POST" hx-boost="false"
                  enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                        <div class="mt-4">
                            <label for="email-address" class="block text-sm/6 font-medium text-gray-700">Email
                                address</label>
                            <div class="mt-2">
                                <input type="email" id="email-address" name="contact_email" autocomplete="email"
                                       required value="{{ old('contact_email') }}"
                                       class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('contact_email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="contact-phone-number" class="block text-sm/6 font-medium text-gray-700">Phone
                                Number</label>
                            <div class="mt-2">
                                <input type="text" id="contact-phone-number" name="contact_phone_number"
                                       required value="{{ old('contact_phone_number') }}"
                                       class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('contact_phone_number')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="contact-name" class="block text-sm/6 font-medium text-gray-700">Name</label>
                            <div class="mt-2">
                                <input type="text" id="contact-name" name="contact_name"
                                       required value="{{ old('contact_name') }}"
                                       class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            @error('contact_name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div>
                                <label for="first-name" class="block text-sm/6 font-medium text-gray-700">First
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" id="first-name" name="shipping_first_name"
                                           autocomplete="given-name"
                                           value="{{ old('shipping_first_name') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_first_name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="last-name" class="block text-sm/6 font-medium text-gray-700">Last
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" id="last-name" name="shipping_last_name"
                                           autocomplete="family-name"
                                           value="{{ old('shipping_last_name') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_last_name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm/6 font-medium text-gray-700">Address</label>
                                <div class="mt-2">
                                    <input type="text" name="shipping_address" id="address"
                                           autocomplete="street-address"
                                           value="{{ old('shipping_address') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_address')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="apartment" class="block text-sm/6 font-medium text-gray-700">Apartment,
                                    suite,
                                    etc.</label>
                                <div class="mt-2">
                                    <input type="text" name="shipping_apartment" id="apartment"
                                           value="{{ old('shipping_apartment') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_apartment')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="city" class="block text-sm/6 font-medium text-gray-700">City</label>
                                <div class="mt-2">
                                    <input type="text" name="shipping_city" id="city" autocomplete="address-level2"
                                           value="{{ old('shipping_city') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_city')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="country" class="block text-sm/6 font-medium text-gray-700">Country</label>
                                <div class="mt-2 grid grid-cols-1">
                                    <input id="country" name="shipping_country" autocomplete="country-name"
                                           value="{{ old('shipping_country') }}"
                                           class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"/>
                                </div>
                                @error('shipping_country')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="region" class="block text-sm/6 font-medium text-gray-700">State /
                                    Province</label>
                                <div class="mt-2">
                                    <input type="text" name="shipping_state" id="region" autocomplete="address-level1"
                                           value="{{ old('shipping_state') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_state')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="postal-code" class="block text-sm/6 font-medium text-gray-700">Postal
                                    code</label>
                                <div class="mt-2">
                                    <input type="text" name="shipping_zip" id="postal-code" autocomplete="postal-code"
                                           value="{{ old('shipping_zip') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_zip')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm/6 font-medium text-gray-700">Phone</label>
                                <div class="mt-2">
                                    <input type="text" name="shipping_phone_number" id="phone" autocomplete="tel"
                                           value="{{ old('shipping_phone_number') }}"
                                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('shipping_phone_number')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>

                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                    <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-xs">
                        <h3 class="sr-only">Items in your cart</h3>

                        <x-cart-list/>

                        <div class="mt-10 border-t border-gray-200 pt-10 px-6">
                            <h2 class="text-lg font-medium text-gray-900 mb-2">Payment</h2>

                            <div class=" p-4 rounded-sm bg-gray-100">
                                {!! Setting::firstWhere('key', 'payment')->value !!}
                            </div>

                            <input
                                required
                                type="file"
                                class="filepond mt-4"
                                name="proof"
                                id="proof"

                            >
                            @error('proof')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6" x-data>
                            <span class="text-gray-400" x-show="$store.cart.isEmpty()"
                                  x-transition>No items in cart</span>

                            <button
                                x-transistion
                                x-show="!$store.cart.isEmpty()"

                                type="submit"
                                class="w-full rounded-md border border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-xs hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 focus:outline-hidden">

                                Confirm Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout-base>


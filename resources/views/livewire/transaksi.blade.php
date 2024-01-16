<div>
    <div class="h-auto rounded-lg shadow-md mb-5 p-4 border">
        <div class="">
            <form>
                <div class="flex">
                    <label for="search-dropdown"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">All Produk <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            @foreach ($produk as $item)
                                <li>
                                    <button x-on:click="isDropdownOpen = false; $wire.selectProduk({{ $item->id }})"
                                        type="button"
                                        class="inline-flex w-full font-medium px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        - {{ $item->name }}</button>
                                    <hr>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full z-20 text-sm transition text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-orange-500"
                            placeholder="Cari menggunakan kode produk..." required>
                        {{-- <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-orange-700 rounded-e-lg border border-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button> --}}
                    </div>
                </div>
            </form>

        </div>

    </div>
    <div class="relative overflow-x-auto shadow-md border rounded">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-50 uppercase  bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Harga
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($selectedProduk as $index => $item)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="#" class="text-orange-500 hover:underline">{{ $item['product']->name }}</a>
                        </th>
                        <td class="px-6 py-4">
                            <!-- ... -->
                            <input wire:model="selectedProduk.{{ $index }}.quantity"
                                wire:change="updateQuantity({{ $index }}, $event.target.value)" type="number"
                                name="qty" class="h-7 focus:ring-0 ring-0" value="{{ $item['quantity'] }}">
                            <!-- ... -->

                        </td>
                        <td class="px-6 py-4">
                            {{ 'Rp.' . $item['product']->harga }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-2xl font-bold py-10">No products selected</td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white border-t">
                    <th scope="row" class="px-6 py-3 text-2xl text-gray-500">Total : </th>
                    <td class="px-6 py-3 text-xl text-gray-500">{{ $totalQuantity }}</td>
                    <td class="px-6 py-3 text-xl text-gray-500">Rp.{{ number_format($totalPrice, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="h-auto shadow-md mt-5 bg-white border">
        <div class="flex gap-10">
            <div class="grid gap-4 p-4 w-full max-w-xl">
                <div>
                    <select wire:model="selectedPelangganId"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>Pilih Pengguna</option>
                        @foreach ($pelanggan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="text" id="text-input" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="......." required>
                </div>
            </div>

            <div class="border-l pl-7">
                <div class="flex mt-4 gap-5">
                    <div>
                        <ul>
                            <li class="font-bold text-2xl mb-7">Fee Admin : </li>
                            <li class="font-bold text-2xl">Total Biaya : </li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li>
                                <span class="font-medium">Rp.</span>
                                <input wire:model="feeAdmin" type="number" name="" id=""
                                    class="h-8 mt-1">
                            </li>
                            <li class="mt-7 font-medium text-xl">
                                Rp.{{ number_format($this->calculateTotal(), 2) }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="bg-gray-50 h-20 border-t">
            <div class="flex justify-between p-4">
                <div>

                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 dark:peer-focus:ring-orange-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Off</span>
                    </label>

                </div>
                <div class="flex gap-5">
                    <button wire:click="submitForm"
                        class="bg-orange-400 text-white px-8 py-2 rounded font-medium hover:bg-orange-500 transition duration-300 shadow-md">
                        Submit
                    </button>
                    <button
                        class="bg-gray-400 text-white px-8 py-2 rounded font-medium hover:bg-gray-500 transition duration-300 shadow-md">Batal</button>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div id="alert-sukses"
            class="flex bottom-0 w-full max-w-md right-2 shadow-lg rounded-xl absolute items-center p-4 mb-4 text-lime-800 border-t-4 border-lime-300 bg-lime-50 dark:text-lime-400 dark:bg-gray-800 dark:border-lime-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                viewBox="0 0 24 24" width="512" height="512">
                <path
                    d="m18.214,9.098c.387.394.381,1.027-.014,1.414l-4.426,4.345c-.783.768-1.791,1.151-2.8,1.151-.998,0-1.996-.376-2.776-1.129l-1.899-1.867c-.394-.387-.399-1.02-.012-1.414.386-.395,1.021-.4,1.414-.012l1.893,1.861c.776.75,2.001.746,2.781-.018l4.425-4.344c.393-.388,1.024-.381,1.414.013Zm5.786,2.902c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-2,0c0-5.514-4.486-10-10-10S2,6.486,2,12s4.486,10,10,10,10-4.486,10-10Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-lime-50 text-lime-500 rounded-lg focus:ring-2 focus:ring-lime-400 p-1.5 hover:bg-lime-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-lime-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-sukses" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div id="alert-error"
            class="flex bottom-0 w-full max-w-md right-2 shadow-lg rounded-xl absolute items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
            role="alert">

            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                viewBox="0 0 24 24" width="512" height="512">
                <path
                    d="m15.707,9.707l-2.293,2.293,2.293,2.293c.391.391.391,1.023,0,1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-2.293-2.293-2.293,2.293c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023,0-1.414l2.293-2.293-2.293-2.293c-.391-.391-.391-1.023,0-1.414s1.023-.391,1.414,0l2.293,2.293,2.293-2.293c.391-.391,1.023-.391,1.414,0s.391,1.023,0,1.414Zm8.293,2.293c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-2,0c0-5.514-4.486-10-10-10S2,6.486,2,12s4.486,10,10,10,10-4.486,10-10Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-error" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
</div>

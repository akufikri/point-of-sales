@extends('layouts.app')
@section('title')
    Produk
@endsection
@section('header')
    Produk
@endsection
@section('content')
    <section>
        <div class="bg-red-100 shadow-md rounded-lg p-4">
            <div class="mb-3">
                <div class="flex justify-between">
                    <div>
                        <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal"
                            class="bg-lime-600 text-yellow-50 px-7 text-base py-2 font-medium shadow-md hover:scale-105 hover:bg-lime-700 transition rounded-xl">Create</button>
                    </div>
                    <div>
                        <div>
                            <input placeholder="Cari produk..."
                                class="border placeholder:text-sm placeholder:font-medium font-medium border-red-300 bg-orange-50 rounded-lg focus:border-orange-400 focus-visible:ring-0"
                                type="text" autocomplete="false" name="" id="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga (Rp)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stok
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!isset($produk) || $produk->isEmpty())
                            <div class="bg-orange-300 h-10 rounded-tl-md rounded-tr-md">
                                <p class="text-center pt-2 font-medium">produk tidak tersedia</p>
                            </div>
                        @else
                            @foreach ($produk as $i)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $i->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <img class="w-8 rounded-2xl" src="{{ asset('img_produk/' . $i->foto_produk) }}"
                                            alt="">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ 'Rp.' . $i->harga }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $i->stok }}
                                    </td>
                                    <td class="px-6 py-4 text-right flex gap-5">
                                        <button class="font-medium text-orange-600 dark:text-orange-500">
                                            <div class="flex">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" id="Outline"
                                                    viewBox="0 0 24 24" width="512" height="512">
                                                    <path
                                                        d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z" />
                                                    <path
                                                        d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z" />
                                                </svg>
                                            </div>
                                        </button>
                                        <button onclick="location.href='/produk/delete/{{ $i->id }}'"
                                            class="font-medium text-orange-600 dark:text-orange-500">
                                            <div class="flex">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" id="Outline"
                                                    viewBox="0 0 24 24" width="512" height="512">
                                                    <path
                                                        d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z" />
                                                    <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z" />
                                                    <path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                </svg>
                                            </div>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <x-modal id="static-modal" title="Create Product">
        <form action="/produk/insert" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Produk</label>
                <input name="name" type="text" id="text"
                    class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Gambar
                    Produk</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" name="foto_produk">
            </div>
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                    (Rp)</label>
                <input name="harga" type="text" id="text"
                    class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
            </div>
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                    Barang</label>
                <input name="stok" type="text" id="text"
                    class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
            </div>
            <div class="flex items-center justify-end space-x-4">
                <button type="button" data-modal-hide="static-modal"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-orange-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit"
                    class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Create</button>
            </div>
        </form>
    </x-modal>
@endsection

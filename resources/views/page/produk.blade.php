@extends('layouts.app')
@section('title')
    Produk
@endsection
@section('header')
    Produk
@endsection
@section('content')
    <section>
        <div>
            <button type="button" data-modal-target="modal-create" data-modal-toggle="modal-create"
                class="bg-gray-800 text-white px-7 text-sm py-2 font-normal shadow-md hover:scale-105 hover:bg-gray-700 transition rounded-full">Create</button>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-50 uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 font-normal py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 font-normal py-3">
                            Kd Produk
                        </th>
                        <th scope="col" class="px-6 font-normal py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 font-normal py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 font-normal py-3">
                            Harga (Rp)
                        </th>
                        <th scope="col" class="px-6 font-normal py-3">
                            Stok
                        </th>
                        <th scope="col" class="px-6 font-normal py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @if (!isset($produk) || $produk->isEmpty())
                        <div class="bg-gray-300 h-10 rounded-tl-md rounded-tr-md">
                            <p class="text-center pt-2 font-medium">produk tidak tersedia</p>
                        </div>
                    @else
                        @foreach ($produk as $i)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $no++ }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $i->kd_produk }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $i->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <img class="w-9 rounded-2xl" src="{{ asset('img_produk/' . $i->foto_produk) }}"
                                        alt="">
                                </td>
                                <td class="px-6 py-4">
                                    {{ 'Rp.' . $i->harga }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $i->stok }}
                                </td>
                                <td class="px-6 py-4 text-right flex gap-5">
                                    <button data-modal-target="modal-edit{{ $i->id }}"
                                        data-modal-toggle="modal-edit{{ $i->id }}"
                                        class="font-medium text-gray-600 dark:text-gray-500">
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
                                    <button data-modal-target="modal-konfirmasi-delete{{ $i->id }}"
                                        data-modal-toggle="modal-konfirmasi-delete{{ $i->id }}"
                                        class="font-medium text-gray-600 dark:text-gray-500">
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
                            <x-modal id="modal-edit{{ $i->id }}" title="Update Product : {{ $i->name }}">
                                <form action="/produk/update/{{ $i->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-5">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Produk</label>
                                        <input value="{{ $i->name }}" name="name" type="text" id="text"
                                            class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    </div>
                                    <div class="mb-5">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="file_input">Gambar
                                            Produk</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="file_input" type="file" value="{{ $i->foto_produk }}"
                                            name="foto_produk">
                                    </div>
                                    <div class="mb-5">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                            (Rp)
                                        </label>
                                        <input value="{{ $i->harga }}" name="harga" type="text" id="text"
                                            class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    </div>
                                    <div class="mb-5">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                                            Barang</label>
                                        <input value="{{ $i->stok }}" name="stok" type="text" id="text"
                                            class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    </div>
                                    <div class="flex items-center justify-end space-x-4">
                                        <button type="button" data-modal-hide="modal-edit{{ $i->id }}"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                        <button type="submit"
                                            class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Update</button>
                                    </div>
                                </form>
                            </x-modal>


                            {{-- modal konfirmasi hapus --}}
                            <x-modal id="modal-konfirmasi-delete{{ $i->id }}" title="Konfirmasi Hapus">
                                <h1 class="text-center text-2xl font-bold mb-20 mt-20 ">Yakin anda ingin
                                    menghapus ?
                                    <span class="text-red-500 block">{{ $i->name }}</span>
                                </h1>
                                <div class="flex items-center justify-center space-x-4">
                                    <button type="button" data-modal-hide="modal-konfirmasi-delete{{ $i->id }}"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                    <button onclick="location.href='/produk/delete/{{ $i->id }}'" type="button"
                                        class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Hapus</button>
                                </div>
                            </x-modal>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>

    <x-modal id="modal-create" title="Create Product">
        <form action="/produk/insert" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Produk</label>
                <input name="name" type="text" id="text"
                    class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
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
                    class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
            </div>
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                    Barang</label>
                <input name="stok" type="text" id="text"
                    class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
            </div>
            <div class="flex items-center justify-end space-x-4">
                <button type="button" data-modal-hide="modal-create"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit"
                    class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Create</button>
            </div>
        </form>
    </x-modal>
@endsection

@extends('layouts.app')
@section('title')
    Pelanggan
@endsection
@section('header')
    Pelanggan
@endsection
@section('content')
    <section>
        <div class="flex justify-between">
            <div class="max-w-md w-full">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-500 dark:text-gray-400"></i>
                        </div>

                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg transition focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                            placeholder="Cari pelanggan...." required>
                    </div>
                </form>
            </div>
            <div>
                <button type="button" data-modal-target="modal-create" data-modal-toggle="modal-create"
                    class="bg-gray-800 text-white px-7 text-sm py-2 font-normal shadow-md hover:scale-105 hover:bg-gray-700 transition rounded-full">Create</button>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-50 uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-normal">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 font-normal">
                            Nama pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3 font-normal">
                            No Telpon (+62)
                        </th>
                        <th scope="col" class="px-6 py-3 font-normal">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3 font-normal">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @if (!isset($pelanggan) || $pelanggan->isEmpty())
                        <div class="bg-gray-300 h-10 rounded-tl-md rounded-tr-md">
                            <p class="text-center pt-2 font-medium">pelanggan tidak tersedia</p>
                        </div>
                    @else
                        @foreach ($pelanggan as $i)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $no++ }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $i->nama }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $i->no_telp }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ Str::limit($i->alamat, 50, '...') }}
                                </td>
                                <td class="px-6 py-4 text-right flex gap-5">
                                    <button data-modal-target="modal-edit{{ $i->id }}"
                                        data-modal-toggle="modal-edit{{ $i->id }}"
                                        class="font-medium text-gray-600 dark:text-gray-500">
                                        <div class="flex">
                                            <i class="fa-regular fa-pen-circle text-2xl"></i>
                                        </div>
                                    </button>
                                    <button data-modal-target="modal-konfirmasi-delete{{ $i->id }}"
                                        data-modal-toggle="modal-konfirmasi-delete{{ $i->id }}"
                                        class="font-medium text-gray-600 dark:text-gray-500">
                                        <div class="flex">
                                            <i class="fa-regular fa-circle-trash text-2xl"></i>
                                        </div>
                                    </button>
                                </td>
                            </tr>

                            {{-- modal update --}}
                            <x-modal id="modal-edit{{ $i->id }}" title="Update Pelanggan : {{ $i->nama }}">
                                <form action="/pengaturan-sistem/pelanggan/update/{{ $i->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-5">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Pelanggan</label>
                                        <input value="{{ $i->nama }}" name="nama" type="text" id="text"
                                            class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    </div>
                                    <div class="mb-5">
                                        <label for="text"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                            Telpon</label>
                                        <input value="{{ $i->no_telp }}" name="no_telp" type="number" id="text"
                                            class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    </div>
                                    <div class="mb-5">

                                        <label for="alamat"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Alamat</label>
                                        <textarea name="alamat" id="alamat" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 transition dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                            placeholder="Write your thoughts here...">{{ $i->alamat }}</textarea>
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
                                    <span class="text-red-500 block">{{ $i->nama }}</span>
                                </h1>
                                <div class="flex items-center justify-center space-x-4">
                                    <button type="button" data-modal-hide="modal-konfirmasi-delete{{ $i->id }}"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                    <button
                                        onclick="location.href='/pengaturan-sistem/pelanggan/delete/{{ $i->id }}'"
                                        type="button"
                                        class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Hapus</button>
                                </div>
                            </x-modal>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
    {{-- modal insert --}}
    <x-modal id="modal-create" title="Create Pelanggan">
        <form action="/pengaturan-sistem/pelanggan/insert" method="POST">
            @csrf
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Pelanggan</label>
                <input name="nama" type="text" id="text"
                    class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
            </div>
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                    Telpon</label>
                <input name="no_telp" type="number" id="text"
                    class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
            </div>
            <div class="mb-5">

                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Alamat</label>
                <textarea name="alamat" id="alamat" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 transition dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                    placeholder="Write your thoughts here..."></textarea>
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

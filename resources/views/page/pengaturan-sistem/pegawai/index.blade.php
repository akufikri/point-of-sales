@extends('layouts.app')
@section('title')
    Pegawai
@endsection
@section('header')
    Pegawai
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="mb-5">
                <button data-modal-target="modal-create" data-modal-toggle="modal-create"
                    class="px-7 bg-gray-900 text-white py-2 hover:bg-gray-800 hover:scale-105 transition rounded-full text-sm">Create</button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-white font-normal">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-normal">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-normal">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-normal">
                                Password
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-normal">
                                Log Time
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-normal">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                1
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

    {{-- Modal insert --}}
    <x-modal id="modal-create" title="Create pegawai">

    </x-modal>
    {{-- Modal insert --}}
@endsection

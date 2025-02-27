@extends('layouts.app')
@section('title','Download')
@section('content')
<!-- Main Container -->
<div class="flex justify-center p-6">
    <!-- Table Container -->
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-4xl">
        <!-- Table Title -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Download Files</h1>
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 text-left text-gray-700">File Name</th>
                        <th class="py-3 px-4 text-left text-gray-700">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($downloads as $item)
                      <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4 text-gray-700">{{$item->file_name}}</td>
                        <td class="py-3 px-4">
                          <a href="{{$item->file_path}}" download class="text-blue-500 hover:text-blue-700">
                            Download
                          </a>
                        </td>
                      </tr>
                    @endforeach


                  </tbody>
              </table>
          </div>
    </div>
  </div>
@endsection
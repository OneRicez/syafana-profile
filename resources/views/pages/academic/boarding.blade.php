@extends('layouts.app')

@section('title','Kindergarten')
@section('content')
  <div class="mx-auto px-6 lg:px-8 "><x-breadcrumb 
    :items="[
      [
        'label' => 'Academic',
        'url' => route('academic'),
        'dropdown' => [
        ]
      ],
      [
        'label' => 'Boarding',
        'url' => '#',
        'dropdown' => [
          ['label' => 'Primary', 'url' => route('academic.primary')],
          ['label' => 'Secondary', 'url' => route('academic.secondary')],
          ['label' => 'Kindergarten', 'url' => route('academic.kindergarten')],
          ['label' => 'Boarding', 'url' => route('academic.boarding')]
        ]
      ],
    
        
    ]"
    :hasDropdown="true"
    /></div>
  <div class="container mx-auto flex flex-row">
    <div class="py-8 my-4">
      {!! clean($boarding['text'])!!}
    </div>
    <div class="h-auto w-auto py-10 px-10">
      <img src="{{asset('storage/'. $boarding['images'][""])}}" alt=""/>
    </div>
  </div>
@endsection
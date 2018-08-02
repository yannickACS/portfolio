@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Ajouter une page')
        @endslot
        <form method="POST" action="{{ route('page.store') }}">
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => true,
                ])
            @include('partials.form-group', [
                'title' => __('Slug'),
                'type' => 'text',
                'name' => 'slug',
                'required' => true,
                ])     
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
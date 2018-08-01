@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifier une page')
        @endslot
        <form method="POST" action="{{ route('page.update', $page->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'value' => $page->name,
                'required' => true,
                ])
            @include('partials.form-group', [
                'title' => __('Slug'),
                'type' => 'text',
                'name' => 'slug',
                'value' => $page->slug,
                'required' => true,
                ])    
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
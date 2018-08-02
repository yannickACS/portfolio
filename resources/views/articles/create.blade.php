@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Ajouter un article')
        @endslot
        <form method="POST" action="{{ route('article.store') }}">
            {{ csrf_field() }}
            @include('partials.form-group-select', [
                'title' => __('Selection page'),
                'name' => 'page',
                'options' => $pages,
                'required' => true,
                ])
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
            @include('partials.form-group', [
                'title' => __('Titre'),
                'type' => 'text',
                'name' => 'title',
                'required' => true,
                ])
            @include('partials.form-group', [
            'title' => __('Sous-titre'),
            'type' => 'text',
            'name' => 'subtitle',
            'required' => true,
            ])
            @include('partials.form-group-textarea', [
            'title' => __('Contenu'),
            'name' => 'content',
            'required' => true,
            ])       
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
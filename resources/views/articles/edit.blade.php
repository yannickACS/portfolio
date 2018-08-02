@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifier un article')
        @endslot
        <form method="POST" action="{{ route('article.update', $article->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
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
                'value' => $article->name,
                'required' => true,
                ])
            @include('partials.form-group', [
            'title' => __('Slug'),
            'type' => 'text',
            'name' => 'slug',
            'value' => $article->slug,
            'required' => true,
            ])
            @include('partials.form-group', [
                'title' => __('Titre'),
                'type' => 'text',
                'name' => 'title',
                'value' => $article->title,
                'required' => true,
                ])
            @include('partials.form-group', [
            'title' => __('Sous-titre'),
            'type' => 'text',
            'name' => 'subtitle',
            'value' => $article->subtitle,
            'required' => true,
            ])
            @include('partials.form-group-textarea', [
            'title' => __('Contenu'),
            'name' => 'content',
            'value' => $article->content,
            'required' => true,
            ])       
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
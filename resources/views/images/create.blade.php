@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Ajouter un image')
        @endslot
        <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('partials.form-group-select', [
                'title' => __('Selection page'),
                'name' => 'page',
                'options' => $pages,
                'required' => true,
                ])
                @include('partials.form-group-select', [
                'title' => __('Selection article'),
                'name' => 'article',
                'options' => $articles,
                'required' => true,
                ])
            @include('partials.form-group', [
                'title' => __('Image à ajouter'),
                'type' => 'file',
                'name' => 'image',
                'required' => true,
                ])    
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
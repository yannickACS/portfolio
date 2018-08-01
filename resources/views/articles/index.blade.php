@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des Articles')
        @endslot
        
        <table class="table table-dark">
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->name }}</td>
                        <td>                            
                            <a type="button" href="{{ route('article.destroy', $article->id) }}" class="btn btn-danger btn-sm pull-right" data-toggle="tooltip" title="@lang('Supprimer l\' article') {{ $article->name }}"><i class="fas fa-trash fa-lg"></i></a>
                            <a type="button" href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm pull-right mr-2" data-toggle="tooltip" title="@lang('Modifier l\' article') {{ $article->name }}"><i class="fas fa-edit fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endcomponent            
@endsection
@section('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })
            $('[data-toggle="tooltip"]').tooltip()
            $('a.btn-danger').click(function(e) {
                let that = $(this)
                e.preventDefault()
                swal({
                    title: '@lang('Vraiment supprimer cet article ?')',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: '@lang('Oui')',
                    cancelButtonText: '@lang('Non')'
                }).then(function () {
                    $('[data-toggle="tooltip"]').tooltip('hide')
                    $.ajax({                        
                        url: that.attr('href'),
                        type: 'DELETE'
                    })
                        .done(function () {
                            that.parents('tr').remove()
                        })
                        .fail(function () {
                            swal({
                                title: '@lang('Il semble y avoir une erreur sur le serveur, veuillez réessayer plus tard...')',
                                type: 'warning'
                            })
                        }
                    )
                })
            })
        })
    </script>
@endsection
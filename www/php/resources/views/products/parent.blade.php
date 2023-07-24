@extends('layouts.layout')

@section('content')
    <?php $lang = \App\Models\Language::getStatus()->id; ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/">{{$parent->title}}</a></li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>{{__('messages.title')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($parent->categories as $category)
                <tr>
                        @if($category->language_id == $lang)
                            <td>
                                <a href="/category/{{$category->id}}">{{$category->title}}</a>
                            </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>

@endsection

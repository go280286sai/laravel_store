@extends('layouts.layout')

@section('content')
    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>{{__('messages.title')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($parent->categories as $category)
                @foreach($category->category_descriptions as $description)

                @endforeach
                <tr>
                        @if($description->language_id == $lang)
                            <td>
                                <a href="/category/{{$description->id}}">{{$description->title}}</a>
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

@extends("dashboard_layout")
@section('pageContent')

@if (Session('insertion_true'))
    <b>{{Session('insertion_true')}}</b>    
@endif
    <table border="1px" width="100%">
        <tr>
            <td>ID</td>
            <td>USER_ID</td>
            <td>NAME</td>
            <td>OPERATIONS</td>

        </tr>

        @foreach ($data as $entry)
            <tr>
                <td>{{$entry->id}}</td>
                <td>{{$entry->user_id}}</td>
                <td>{{$entry->name}}</td>
                <td>

                    <form action="{{route("deleteCategory", $entry->id)}}" method="POST">
                        @csrf
                        @method("delete")
                        <input type="submit" value="حذف الفئة">
                        <a href="{{route("updateCategory", $entry->id)}}">تحديث</a>
                    </form>
                </td>

            </tr>
            
        @endforeach
        
    </table>
    {{-- {{$data}} --}}
@endsection
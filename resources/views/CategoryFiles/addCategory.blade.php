@extends("dashboard_layout")
@section('pageContent')
    <form action="{{route('addCategoryOnTable')}}" method="POST">
        @csrf
        <input type="text" name="categoryName" placeholder="اسم الفئة">
        @error('categoryName')
            <b>{{$message}}</b>
        @enderror
        <input type="submit" name="submitCategory">
    </form>
@endsection
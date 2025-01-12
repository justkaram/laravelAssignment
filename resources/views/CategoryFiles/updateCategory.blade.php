@extends("dashboard_layout")
@section('pageContent')
    <form action="{{route('updateCategoryDb', $category->id)}}" method="POST">
        @csrf
        @method("put")
        <input type="text" name="categoryName" placeholder="اسم الفئة" value="{{$category->name}}">
        @error('categoryName')
            <b>{{$message}}</b>
        @enderror
        <input type="submit" name="submitCategory">
    </form>
@endsection
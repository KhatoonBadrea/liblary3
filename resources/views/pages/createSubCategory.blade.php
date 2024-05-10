<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sub category</title>
</head>
<body>
    <form action="{{route('add_sub_category')}}" method="post">
        @csrf
        <label >Main Category:</label><br><br>
        <select name="main_id" >
            @foreach ($main_categories as $main_category)
            <option value="{{$main_category->id}}">{{$main_category->main_name}}</option>
            
            @endforeach
        </select><br><br>
        <label >Sub Category:</label><br><br>
        <input type="text" name="sub_name" ><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
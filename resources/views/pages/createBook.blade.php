<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>main category</title>
</head>
<body>
    <form action=" {{route('add_book')}}" method="post">
        @csrf
        <label >book name:</label><br><br>
        <input type="text" name="name" ><br><br>
        <label >Author name:</label><br><br>
        <input type="text" name="author" ><br><br>

        <label >Main Category:</label><br><br>
        <select name="main_id"    onchange="console.log($(this).val())">
            @foreach ($list_main as $main_category)
            <option value="{{$main_category->id}}">{{$main_category->main_name}}</option>
                
            @endforeach
        </select><br><br>
        
        <label >sub Category:</label><br><br>
        <select name="sub_id" >
            @foreach ($sub_categories as $sub_category)
            <option value="{{$sub_category->id}}">{{$sub_category->sub_name}}</option>
                
            @endforeach

           
        </select>
        <input type="submit" value="submit">
    </form>

</body>
</html>

{{-- @section('js')
                      
<script>
    $(document).ready(function () {
        $('select[name="main_id"]').on('change', function () {
            var main_id = $(this).val();
            if (main_id) {
                $.ajax({
                    url: "{{ URL::to('show') }}/" + main_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="sub_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="sub_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>

@endsection                                                             --}}
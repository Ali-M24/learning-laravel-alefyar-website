<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>{{ $page_title }}</title>
</head>

<body dir="rtl">
    @include('layouts.topmenu')
    <div class="container">
        @include('layouts.messages')
        <div class="d-flex justify-content-center">
            <form action="{{route('store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان دسته بندی</label>
                    <input type="text" name="title" class="form-control">    
                </div>
                <br>
                <div class="form-group">
                    <label for="description">شرح دسته بندی</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">وضعیت</label>
                    <select name="active">
                        <option value="1">منتشر شده</option>
                        <option value="0">منتشر نشده</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

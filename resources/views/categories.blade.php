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
            <table class="table">
                <thead>
                    <tr>
                        <td>شناسه</td>
                        <td>عنوان</td>
                        <td>توضیحات</td>
                        <td>ویرایش</td>
                        <td>حذف</td>
                    </tr>
                </thead>

                <body>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><a href="{{ route('show', $category->id) }}">{{ $category->title }}</a></td>
                            <td>{{ $category->description }}</td>
                            <td><a class="btn btn-warning" href="{{ route('edit', $category->id) }}">ویرایش</a></td>
                            <td><a href="{{ route('destroy', $category->id) }}" class="btn btn-danger"
                                    onclick="return confirm('آیتم مورد نظر حذف شود؟');">حذف</a></td>
                        </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
</body>

</html>

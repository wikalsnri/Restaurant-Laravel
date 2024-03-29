<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <x-app-layout>

    </x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <base href="/public">
        @include('admin.admincss')
    </head>

    <body>
        <div class="container-scroller">
            @include('admin.navbar')

            <form action="{{ url('/updatefoodchef', $data->id) }}" method="Post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Chef Name </label>
                    <input style="color: blue;" type="text" name="name" value="{{ $data->name }}">
                </div>

                <div>
                    <label>Speciality </label>
                    <input style="color: blue;" type="text" name="speciality" value="{{ $data->speciality }}">
                </div>

                <div>
                    <label>Old Image </label>
                    <img height="100" width="100" src="/chefimage/{{ $data->image }}" </div>

                    <div>
                        <label>New Image </label>
                        <input type="file" name="image">
                    </div>

                    <div>

                        <input style="color: blue;" type="submit" value="Update Chef" required="">
                    </div>
            </form>

        </div>

        @include('admin.adminscript')
    </body>

    </html>

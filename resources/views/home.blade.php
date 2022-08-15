<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Query Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"
    <link rel="stylesheet" href="css/styles.css">
    {{-- @toastr_css --}}
    
</head>
<body>
    <div class="container mt-5" style="box-sizing: 1px solid white; box-shadow:1px 2px 3px red">
        <div class="row">
            <div class="col-sm-6">
                <h2>Enter the Detail's of Student:</h2><br><br>
                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter student's full name.">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Address</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter student's city.">
                    </div>

                    <div class="mb-3">
                        <label for="marks" class="form-label">Marks</label>
                        <input type="text" class="form-control" id="marks" name="marks" placeholder="Enter student's marks.">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @if (session()->has('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>                    
                @endif
            </div>
            <div class="col-sm-6">
                <h2>The Detail's of Student:</h2><br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $stu)
                        <tr>
                            <td>{{$stu->id}}</td>
                            <td>{{$stu->name}}</td>
                            <td>{{$stu->city}}</td>
                            <td>{{$stu->marks}}</td>
                            <td>
                                <a href="{{url('/edit', $stu->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{url('/delete', $stu->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>
{{-- 
    @toastr_js
    @toastr_render --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
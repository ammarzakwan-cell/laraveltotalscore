<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 Score  </h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('scores.create') }}"> Create score</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>score Name</th>
                <th>score g1</th>
                <th>score g2</th>
                <th>score g3</th>
                <th>total</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($scores as $score)
            <tr>
                <td>{{ $score->id }}</td>
                <td>{{ $score->name }}</td>
                <td>{{ $score->g1 }}</td>
                <td>{{ $score->g2 }}</td>
                <td>{{ $score->g3 }}</td>
                <td>{{ $score->total}}</td>
                <td>
                    <form action="{{ route('scores.destroy',$score->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('scores.edit',$score->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <?php include 'C:\Users\User\OneDrive\Desktop\Dev\Laravel\mysqlcalc\app\Service\total.php';?>
    {!! $scores->links() !!}
</body>
</html>
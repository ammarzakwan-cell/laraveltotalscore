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
                    <h2>LARAVEL SCORE</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-primary" href="{{ route('scores.create') }}"> CREATE SCORE</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table">
            <thead class= "thead-dark">
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>SCORE 1</th>
                    <th>SCORE 2</th>
                    <th>SCORE 3</th>
                    <th>TOTAL</th>
                    <th width="200px">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $score)
                <tr>
                    <td>{{ $score->id }}</td>
                    <td>{{ strtoupper($score->name) }}</td>
                    <td>{{ $score->g1 }}</td>
                    <td>{{ $score->g2 }}</td>
                    <td>{{ $score->g3 }}</td>
                    <td>{{ $score->total}}</td>
                    <td>
                        <form action="{{ route('scores.destroy',$score->id) }}" method="Post">
                        <a class="btn btn-warning" href="{{ route('scores.edit',$score->id) }}">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <?php include 'C:\Users\User\OneDrive\Desktop\Dev\Laravel\mysqlcalc\app\Service\total.php';?>
    {!! $scores->links() !!}
</body>
</html>
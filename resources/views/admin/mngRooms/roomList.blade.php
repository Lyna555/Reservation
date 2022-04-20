<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rooms/halls</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <script src="{{ mix('js/app.js') }}" defer></script>
  <style>
    body {
      background-image: url('{{url("images/web.png")}}');
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
    }

    td {
      text-align: center;
    }

    th {
      text-align: center;
    }
  </style>
</head>

<body>
  @include('admin.navigation-menu')
  <div style="display: flex;width:100%;justify-content:center;align-items:center">
    <div class="card mb-3" style="width:90%;margin-top:30px">
      @if(session()->has('message'))
      <div id="hh" class="alert alert-danger">
        {{session()->get('message')}}
      </div>
      @endif
      <div class="card-body">
        <div style="display: flex;justify-content: space-between;width:91%">
          <h1 style="font-weight: bold;">Rooms/Halls List</h1>
          <a href="{{ route('addRoom') }}" class="btn btn-sm btn-warning" style="background: rgb(255, 152, 67);color:white;border:none">Add Room/Hall</a>
        </div>
        <table class="table">
          <thead class="thread-light">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Capacity</th>
              <th scope="col">Floor</th>
              <th scope="col">Type</th>
              <th scope="col">State</th>
              <th scope="col">Operations</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rooms as $room)
            <div id="overlay">
              <div style="display:flex; flex-direction:column;justify-content:center;align-items:center;gap:20px;width:30%;height:20%;background:white;border-radius:20px;">
                <p><strong>Are you sure to delete this Room/Hall?</strong></p>
                <div style="display:flex;flex-direction:row;justify-content:center; gap:20px">
                  <a href="{{ url('/destroy/'.$room->id) }}" class="btn btn-sm btn-warning" style="background: rgb(224, 54, 54);color:white;border:none">Delete</a>
                  <a href="" onclick="document.getElementById('overlay').style.display='none';" class="btn btn-sm btn-warning" style="background: lightgray;border:none">Cancel</a>
                </div>
              </div>
            </div>
            <tr>
              <td>{{ $room->name }}</td>
              <td>{{ $room->capacity }}</td>
              <td>{{ $room->floor }}</td>
              <td>{{ $room->type }}</td>
              <td>{{ $room->state }}</td>
              <td>
                <button onclick="document.getElementById('overlay').style.display='flex'" class="btn btn-sm btn-warning">Delete</button>
                <a href="{{ url('/edit/'.$room->id) }}" class="btn btn-sm btn-warning">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
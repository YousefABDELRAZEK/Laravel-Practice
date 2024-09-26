<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Note Taking app</title>
</head>
<style>
    </style>
<body>
<div class="d1">
    <form action="{{route('create')}}" method="POST">
        @csrf
    <label>Title</label>
    <input type="text" name="title" value="title" class="first"/>
    <br>
    <label>Notes</label>
    <textarea name="notes" class="second"></textarea>
    <button type="submit">Add Note</button>
    </form>
</div>
    <div class="d2">
        <h2>All notes</h2>
        @foreach($notes as $note)
        <div class="d3">
            <form method="POST" action="{{route('update', $note->id)}}">
                @csrf
                <label>Title</label>
                <input type="text" name="title" value="{{$note->title}}" class="first"/>
                <br>
                <label>Notes</label>
                <textarea name="notes"  class="second">{{$note->notes}}</textarea>
                <div class="card">
                    <h3>{{$note->title}}</h3>
                    <p>{{$note->notes}}</p>
                    <button type="submit">edit</button>

                </div>


            </form>
            <form method="POST" action="{{ route('delete', $note->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>


    </div>
    @endforeach
</div>
</body>
</html>

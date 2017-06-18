@extends('layouts.app')
@section('title', 'Home ')

@section('content')
    <div class="row">
    <div class="col-lg-3 col-lg-offset-4">
        <form action="{{ route('todo.index')}}" method="get" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="s" placeholder="Keresés" value="{{ isset($s) ? $s : '' }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"> </span> Keresés</button>
            </div>
        </form>

    </div>
    </div>
    <br>
    <div class="row">

        <div class="col-lg-4 col-lg-offset-4" id="todos">

            @if($todos != false)

                @foreach ($todos as $todo)
                    @if($todo->finished!=0)
                        <div class="details" style="display:none">
                            <ul class="list-group">
                                <li class="list-group-item"  style="background-color: red">
                            <span class="pull-left">
                            {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['todo.destroy', $todo->id]
                                ]) !!}
                                {!! Form::button('', ['type' => 'submit', 'class' => 'glyphicon glyphicon-trash', 'style' =>'background-color: Transparent; border: none;'] ) !!}
                                {!! Form::close() !!}
                            </span>
                                    <a class="secondary-content" href="{{url('/todo/'.$todo->id)}}"><span class="glyphicon glyphicon-triangle-right"></span></a>
                                    {{$todo->todo}}
                                    <span class="pull-right">{{$todo->updated_at->diffForHumans()}}</span>
                                </li>
                            </ul>
                        </div>
                    @else
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a class="secondary-content" href="{{url('/todo/'.$todo->id)}}"><span class="glyphicon glyphicon-triangle-right"></span></a>
                                <a class="secondary-content" href="{{url('/todo/'.$todo->id).'/edit'}}"><span class="glyphicon glyphicon-pencil"></span></a>

                                <span class="pull-right">
                            {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['todo.destroy', $todo->id]
                                ]) !!}
                                    {!! Form::button('', ['type' => 'submit', 'class' => 'glyphicon glyphicon-trash', 'style' =>'background-color: Transparent; border: none;'] ) !!}
                                    {!! Form::close() !!}
                            </span>
                                {{$todo->todo}}
                                <span class="pull-right">{{$todo->created_at->diffForHumans()}}</span>
                            </li>
                        </ul>
                            @endif

                    @endforeach
                @else
                    <li class="list-group-item">Még nincs teendőd. <a href="{{ url('/todo/create') }}"> Kattint ide</a> új feladatok hozzáadásához. </li>
                @endif
                        <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Elvégzett feladatok elrejtése':'Elvégzett feladatok mutatása');});">Elvégzett feladatok mutatása</a>
        </div>

    </div>
@endsection
@extends('layouts.app')

@section('title', 'Módosítás')

@section('content')
    <div class="row">
        <div class="col-m-6">

                <form class="form-horizontal" method="post" action="{{url('/todo/'.$todo->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="todo" class="col-sm-2 control-label">Feladat</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="todo" name="todo" placeholder="Feladat" value="{{$todo->todo}}">
                            @if ($errors->has('todo'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('todo') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Leírás</label>
                        <div class="col-md-5">
                            <textarea class="form-control" id="description" name="description" placeholder="leírás">{{$todo->description}}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Feladat elvégezve</label>
                        <div class="col-md-5">
                            <input type="checkbox"id="finished" name="finished" value="{{$todo->finished+1}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-md-5">
                            <a href="{{url('/todo')}}">
                                <button type="submit" class="btn btn-default">Módosítás</button></a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
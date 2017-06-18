@extends('layouts.app')

@section('title', 'Új feladat hozzáadása')

@section('content')
    <div class="row">
        <div class="col-m-6">
            <form class="form-horizontal" method="post" action="{{url('/todo')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="todo" class="col-sm-2 control-label">Feladat</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="todo" name="todo" placeholder="feladat" value="{{ old('todo') }}">
                        @if ($errors->has('todo'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('todo') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Leírás</label>
                    <div class="col-md-5">
                        <textarea class="form-control" id="description" name="description" placeholder="leírás" value="{{ old('description') }}"></textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-md-5">
                        <button type="submit" class="btn btn-default">Hozzáadás</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
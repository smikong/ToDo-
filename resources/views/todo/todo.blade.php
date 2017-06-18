@extends('layouts.app')
@section('title', title_case($todo->todo))
@section('content')
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3>{{title_case($todo->todo)}}
                        @if($todo->finished !=0 )
                            <div style="float: right; color: black">
                            Ezt a feladatot már elvégezted
                            </div>
                        @else
                        <a href="{{url('/todo/'.$todo->id).'/edit'}}" class="btn btn-warning btn-group-sm pull-right ">Módosítás</a>
                    @endif
                    </h3>
                </div>
                @if(strlen($todo->description) != 0)
                <div class="panel-body">
                    {{$todo->description}}
                </div>
                @endif
                <div class="panel-footer"><span>{{$todo->created_at->diffForHumans()}}</span></div>

            </div>

        </div>
    </div>

@endsection
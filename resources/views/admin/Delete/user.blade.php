@extends('layouts.admin')

@section('title', ' | Dashboard ')

@section('content')

    <h3>Users</h3>

    @foreach($users as $user)
        {{$user->firstname}}
    @endforeach
    <div class="panel panel-default">
        <div class="panel-heading">Registered User</div>
        
        <div class="panel-body">
            <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">{{$user->firstname}},{{$user->lastname}} 
                <div class="btn-group  pull-right" style="margin-top:-4px;">
                    
                    @if( $user -> user == 1)
                        <button type="button" class="btn btn-primary btn-sm disabled">User</button>
                        <button type="button" class="btn btn-primary btn-sm">Author</button>
                        <button type="button" class="btn btn-primary btn-sm ">Admin</button>
                    @endif 

                    @if( $user -> author == 1)
                        <button type="button" class="btn btn-primary btn-sm">User</button>
                        <button type="button" class="btn btn-primary btn-sm disabled">Author</button>
                        <button type="button" class="btn btn-primary btn-sm ">Admin</button>
                    @endif

                    @if( $user -> admin == 1)
                        <button type="button" class="btn btn-primary btn-sm">User</button>
                        <button type="button" class="btn btn-primary btn-sm ">Author</button>
                        <button type="button" class="btn btn-primary btn-sm disabled">Admin</button>
                    @endif

                    @if( $user -> status == 1)
                        
                        <a href="/admin/user/activate" class="btn btn-primary btn-sm disabled">Activate</a>
                        <a href="{{ action('Admin\UserController@deactivate')}}/{{$user->id}}" class="btn btn-primary btn-sm ">Deactivate</a>

                        <form action="{{ action('Admin\UserController@deactivate')}}/{{$user->id}}" class="pull-right" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <button class="btn btn-primary btn-sm" type="submit">Deactivate</button>
                        </form>


                    @else
                        <a href="{{url('/admin/user/activate/'.$user->id)}}" class="btn btn-primary btn-sm ">Activate</a>
                        <a href="{{url('/admin/user/deactivate')}}" class="btn btn-primary btn-sm disabled">Deactivate</a>
                    @endif
                    
                </div>
                </li>
            @endforeach    
            </ul>
        </div>

        <div class="panel-footer">
            <ul class="pagination pagination-sm" style="margin:0;padding:0;">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
        </div>
    </div>

@endsection
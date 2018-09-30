 <!--Error list-->          
@if($errors->any())
    <div class="alert alert-warning">
        <ul>                       
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--Patient addition success message-->
@if(session()->has('response_msg'))
    <div class="alert alert-success">{{session()->get('response_msg')}}</div>
@endif
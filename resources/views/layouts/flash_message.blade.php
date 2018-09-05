@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ implode('', $errors->all(':message')) }}
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {!! session('error') !!}
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {!! session('success') !!}
    </div>
@endif
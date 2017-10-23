@extends('admin.layouts.admin')

@section('title', __('views.admin.address.index.title'))

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <form action="{{ url()->current() }}" class="pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for..." value="@if(isset($search_text)){{$search_text}}@endif">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Go!</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-sm-8">
            <div class="text-right">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-user"></i> Add User</a>
            </div>
        </div>
    </div>
    <div class="row">
    @foreach($addresses as $add)
        <div class="col-sm-3">
            <p>{{ $add->getAddress() }}</p>
        </div>
    @endforeach
    </div>
@endsection
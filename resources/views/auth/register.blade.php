@extends('layout.app')
@section('title')
    Registration Page
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">registration form</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                @if($errors->any())
                                    <ul class="bg-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            @if(Session::has('message'))
                                <h4 class="text-capitalize text-center text-success">{{Session::get('message')}}</h4>
                            @endif
                            <h4 class="text-center text-danger text-capitalize">{{Session::has('fail') ? Session::get('fail') : ''}}</h4>
                            <form action="{{route('registration.user')}}" method="post">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control">
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">UserName</label>
                                    <div class="col-md-8">
                                        <input type="text" name="username" class="form-control">
                                        <span class="text-danger">{{$errors->has('username') ? $errors->first('username') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control">
                                        <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control">
                                        <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Confirm Password</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password_confirmation" class="form-control">
                                        <span class="text-danger">{{$errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-primary" value="Registration">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

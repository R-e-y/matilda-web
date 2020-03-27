@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Worker</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('workers/add') }}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}

                      <div class="form-group">
                         <label for="idParalax" class="col-sm-3 control-label">idParalax</label>

                        <div class="col-sm-6">
                          <input type="text" name="idParalax" id="idParalax" class="form-control">
                        </div>

                        <label for="name" class="col-sm-3 control-label">Worker Name</label>

                        <div class="col-sm-6">
                          <input type="text" name="name" id="name" class="form-control">
                        </div>


                        <label for="fixedSalary" class="col-sm-3 control-label">Salary</label>

                        <div class="col-sm-6">
                          <input type="text" name="fixedSalary" id="fixedSalary" class="form-control">
                        </div>




                          <label for="idPost" class="col-sm-3 control-label">Post</label>
                        <div class="col-sm-6">
                          <select name="idPost" class="form-control">
                            @foreach ($posts as $post)
                              <option value="{{ $post->idPost }}">{{ $post->namePost }}</option>
                            @endforeach
                          </select>
                        </div>

                        <label for="idOffice" class="col-sm-3 control-label">Office</label>
                        <div class="col-sm-6">
                          <select name="idOffice" class="form-control">
                            @foreach ($offices as $office)
                              <option value="{{ $office->idOffice }}">{{ $office->nameOffice }}</option>
                            @endforeach
                          </select>
                        </div>


                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Сохранить
                          </button>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

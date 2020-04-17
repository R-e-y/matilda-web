@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Изменение сотрудника</div>

                <div class="card-body">
                  @include('common.errors')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('workers/update/'.$worker->id) }}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}

                      <div class="form-group">
                        <label for="idParalax" class="col-sm-3 control-label">idParalax</label>

                        <div class="col-sm-6">
                          <input type="text" name="idParalax" id="idParalax" class="form-control" value="{{ $worker->idParalax}}">
                        </div>

                        <label for="name" class="col-sm-3 control-label">Имя</label>

                        <div class="col-sm-6">
                          <input type="text" name="name" id="name" class="form-control" value="{{ $worker->name}}">
                        </div>



                        <label for="idPost" class="col-sm-3 control-label">Должность</label>

<div class="col-sm-6">
  <select name="idPost" id="idPost" class="form-control">
    @foreach ($posts as $post)

      <option value="{{ $post->idPost }}"
          @if ($post->idPost == old('myselect', $worker->idPost))
              selected="selected"
          @endif
          >{{ $post->namePost }}</option>
    @endforeach
  </select>
</div>

                        <label for="idOffice" class="col-sm-3 control-label">Офис</label>

                        <div class="col-sm-6">
                          <select id="idOffice" name="idOffice" class="form-control">
                            @foreach ($offices as $office)

                              <option value="{{ $office->idOffice }}"
                                  @if ($office->idOffice == old('myselect', $worker->idOffice))
                                      selected="selected"
                                  @endif
                                  >{{ $office->nameOffice }}</option>
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
  <title>matilda</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
                  <form method="post" action="{{url('actions/read')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="input-group control-group increment" >
  <input type="file" name="filename[]" class="form-control">
  <div class="input-group-btn">
    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
  </div>
</div>
<div class="clone hide">
  <div class="control-group input-group" style="margin-top:10px">
    <input type="file" name="filename[]" class="form-control">
    <div class="input-group-btn">
      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
    </div>
  </div>
</div>
<button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button>
</form>
   <br><hr>

                  <br> <br>
                  <div class="card">
                      <div class="card-header">
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($actions) > 0)
                    <div class="panel-body">


                <!-- Поле поиска -->
          <!--   <form action="/search" method="POST" role="search">
                  {{ csrf_field() }}
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="поиск" aria-label="поиск">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"></button>
                </form>
             </form> -->


                <!-- Поле поиска -->
                <form action="/search" method="POST" role="search">
                  {{ csrf_field() }}
                  <div class="input-group">
                      <input type="text" class="form-control mr-sm-2" name="q"
                          placeholder="Поиск сотрудника">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Найти</button>
                        </span>
                  </div>
                </form>



                      <table class="table table-striped task-table">

                        <!-- Заголовок таблицы -->
                        <thead>
                          <th>время</th>
                          <th>id Paralax</th>
                          <th>Действие</th>
                        </thead>

                        <!-- Тело таблицы -->
                        <tbody>
                          @foreach ($actions as $action)
                            <tr>
                              <td class="table-text">
                                <div>{{ $action->date }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $action->idParalax }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $action->action }}</div>
                              </td>

                              <td class="table-text">
                                <div>
                                  <form action="{{ url('actions/delete/'.$action->id) }}" method="POST" class="delete">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger btn-sm" value="DELETE">
                                      <i class="fa fa-trash-o fa-fw"></i> Удалить
                                    </button>
                                  </form>
                                  <form action="{{ url('actions/edit/'.$action->id) }}" method="GET">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                      <i class="fa fa-pencil fa-fw"></i> Изменить
                                    </button>
                                  </form>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    @else
                        No Records
                    @endif
                    <br>
                    <br>


                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".delete").on("submit", function(){
        return confirm("Вы уверены?");
    });
</script>

</body>
</html>

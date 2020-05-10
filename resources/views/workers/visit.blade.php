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
                  <form method="post" visit="{{url('visits/read')}}" enctype="multipart/form-data">
  {{csrf_field()}}

</form>            <br> <br>
                  <div class="card">
                      <div class="card-header">
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($visits) > 0)
                    <div class="panel-body">


                <!-- Поле поиска -->
          <!--   <form visit="/search" method="POST" role="search">
                  {{ csrf_field() }}
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="поиск" aria-label="поиск">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"></button>
                </form>
             </form> -->



                      <table class="table table-striped task-table">

                        <!-- Заголовок таблицы -->
                        <thead>
                          <th>время</th>
                          <th>id Paralax</th>
                          <th>Действие</th>
                        </thead>

                        <!-- Тело таблицы -->
                        <tbody>
                          @foreach ($visits as $visit)
                            <tr>
                              <td class="table-text">
                                <div>{{ $visit->datetime }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $visit->idParalax }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $visit->action }}</div>
                              </td>

                              <td class="table-text">
                                <div>
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

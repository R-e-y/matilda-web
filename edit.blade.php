@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Course</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('courses/update/'.$course->id) }}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}

                      <div class="form-group">
                        <label for="course_name" class="col-sm-3 control-label">Course Name</label>

                        <div class="col-sm-6">
                          <input type="text" name="course_name" id="course_name" class="form-control" value="{{ $course->course_name}}">
                        </div>

                        <label for="course_description" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-6">
                          <input type="text" name="course_description" id="course_description" class="form-control" value="{{ $course->course_description}}">
                        </div>

                        <label for="course_credit" class="col-sm-3 control-label">Credits</label>

                        <div class="col-sm-6">
                          <input type="text" name="course_credit" id="course_credit" class="form-control" value="{{ $course->course_credit}}">
                        </div>

                        <label for="course_semestr" class="col-sm-3 control-label">Semestr</label>

                        <div class="col-sm-6">
                          <input type="text" name="course_semestr" id="course_semestr" class="form-control" value="{{ $course->course_semestr}}">
                        </div>

                        <label for="course_teacher" class="col-sm-3 control-label">Lecturer</label>

                        <div class="col-sm-6">
                          <input type="text" name="course_teacher" id="course_teacher" class="form-control" value="{{ $course->course_teacher}}">
                        </div>

                        <label for="course_department" class="col-sm-3 control-label">Department</label>

                        <div class="col-sm-6">
                          <select id="course_department" class="form-control">
                            @foreach ($departments as $department)
                              
                              <option value="{{ $department->departments_id }}"
                                  @if ($department->departments_id == old('myselect', $course->course_department))
                                      selected="selected"
                                  @endif
                                  >{{ $department->departments_abbr }}</option>
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

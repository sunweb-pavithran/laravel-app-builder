@extends('layouts.app')
@section('content')
  <style media="screen">
    .main-wrapper{
      margin-top: 20px;
    }
    .build_form{
      max-width: 70%;
    }
  </style>
  <div class="container main-wrapper">
    <h4>Laravel App Builder</h4>
    <hr>
    <form class="build_form" action="" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label for="project_name">Project Name</label>
        <input id="project_name" class="form-control" type="text" name="project_name" value="" required>
      </div>
      <div class="form-group">
        <label for="version">Laravel Version</label>
        <select id="version" class="form-control" name="version" required>
          <option value="" selected disabled>Select a version</option>
          <option value="5.1">Laravel 5.1</option>
          <option value="5.2">Laravel 5.2</option>
          <option value="5.3">Laravel 5.3</option>
          <option value="5.4">Laravel 5.4</option>
          <option value="5.5">Laravel 5.5</option>
          <option value="5.6">Laravel 5.6</option>
          <option value="5.7">Laravel 5.7</option>
          <option value="5.8">Laravel 5.8</option>
        </select>
      </div>
      <label for="auth">Use default auth?</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="auth" id="yes" value="yes">
        <label class="form-check-label" for="exampleRadios1">
        Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="auth" id="no" value="no">
        <label class="form-check-label" for="exampleRadios2">
          No
        </label>
      </div>
      <br>
      <button id="btnBuild" class="btn btn-primary" type="button" name="button">Build project</button>
      <button id="btnClear" class="btn btn-success" type="button" name="button">Clear output</button>
      <br>
      <div id=loading style="display:none;">
        <img width="60" height="30" src="{{asset('images/loader.gif')}}" alt="">
        <span>Building project. Please be patient.</span>
      </div>
    </form>
    <br>
    <label for="">Output: </label>
    <div class="display-output" style="color:green;background-color:#000;padding: 20px;border:1px solid #d3d3d3;">

    </div>
  </div>
  <script type="text/javascript">
      $('#btnBuild').on('click', function(){
        var formData = $('.build_form').serialize()
        $('#loading').css('display', 'inline')
        $(this).prop('disabled', true)
        $.ajax({
          url: '{{url('build-project')}}',
          type: 'POST',
          data: formData,
          success: function(data){
            if(data.msg){
              swal({
                text: data.msg,
                icon: 'success'
              })
              $.each(data.output, function(k,v){
                $('.display-output').append('<p>'+v+'</p>')
              })
              clear()
            }
            else if(data.warn){
              swal({
                text: data.warn,
                icon: 'success'
              })
              $.each(data.output, function(k,v){
                $('.display-output').append('<p>'+v+'</p>')
              })
              $.each(data.output1, function(k,v){
                $('.display-output').append('<p>'+v+'</p>')
              })
            }
            else if(data.errors){
              swal({
                text: data.errors[0],
                icon: 'warning'
              })
            }
            $('#loading').css('display', 'none')
            $('#btnBuild').prop('disabled', false)
          },
          error: function(){
            $('#loading').css('display', 'none')
            $('#btnBuild').prop('disabled', false)
          }
        })
      })

      function clear(){
        $('#project_name').val('')
        $('#version').val('').trigger('change')
      }

      $('#btnClear').on('click', function(){
        $('.display-output').empty()
      })
  </script>
@endsection

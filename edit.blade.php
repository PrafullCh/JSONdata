@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Post</h1>
    {!! Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
    {{ Form::label('title','Title') }}
    {{ Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title']) }}
    </div> 
    <div class="form-group">
    {{ Form::label('body','Body') }}
    {{ Form::textarea('body',$post->body,['id'=>'article-ckeditor', 'class'=>'form-control','placeholder'=>'Body']) }}
    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close()!!}
</div>
<input type="file" id="txtfiletoread" />
    <div>The File Contents are as below:</div> 
     <div id="filecontents">
    </div>
<script type="text/javascript" rel="script "src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script type="text/javascript">
                CKEDITOR.replace( 'article-ckeditor' );
                
      </script> 
      <script type="text/javascript">
            //Global declaration of counts 
            var countPolitic = 0;
            var countSport = 0;
            var countEconomic = 0;
            var countEnv = 0;
            var countEdu = 0;
            //JSON request sent down here
        var obj = new XMLHttpRequest();
		obj.open('GET','http://localhost:82/lsapp/public/js/DataSet.json');
        obj.send();
        //parsing JSON
        obj.onload = function(){
            var a=JSON.parse(obj.responseText);
        console.log(a);
        };
        


        ///////////////////////////////
        document.getElementById('article-ckeditor').addEventListener('change',function(){console.log("hello");}); 
        function countPerc(TotalPolitic,TotalSport,TotalEnv,TotalEdu,TotalEco)
            {
                console.log("In count perc function ");
                var percPolitic = (countPolitic/TotalPolitic)*100;
                var percSport = (countSport/TotalSport)*100;
                var percEnv = (countEnv/TotalEnv)*100;
                var percEdu = (countEdu/TotalEdu)*100;
                var percEco = (countEconomic/TotalEco)*100;
                console.log(percPolitic+" "+percSport+" "+percEnv+" "+percEdu+" "+percEco);
            }
    </script>
@endsection 
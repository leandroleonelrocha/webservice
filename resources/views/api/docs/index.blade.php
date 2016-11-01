<!DOCTYPE html>
<html>
    <head>
        <title>GECO</title>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{asset('css/geco-styles.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">GECO</div>
                <div>
                    {!! Form::open(['route'=>'administracion.postLogin','method' => 'post']) !!}
                        <div>
                            {!! Form::text('usuario', null, array('class' => 'form-control', 'placeholder'=>'Email')) !!}
                        </div>
                        <div>
                            {!! Form::password('password', array('class' => 'form-control', 'placeholder'=>'Password')) !!}
                        </div>
                        <button class="btn btn-green">Sign In</button>
                    {!! Form::close() !!}
                </div>           
            </div>
        </div>
    </body>
</html>

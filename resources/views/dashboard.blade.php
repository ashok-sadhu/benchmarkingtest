@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category"> QR code</h5>
                            <h2 class="card-title">Generate QR Code</h2>
                        </div>
                    </div>
                </div>
                <!-- content, size, background_color, fill_color. -->
                <div class="col-12">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    {!! Form::open(['route' => 'generateqr', 'files' => true, 'class' => 'login-form', 'id' => 'parsely-frm']) !!}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {{ Form::label('content', null, ['class' => 'control-label']) }}
                                {!! Form::text('content',null,['data-required' => 'true','class' => 'form-control', 'placeholder' => 'Content']) !!}
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                {{ Form::label('size', null, ['class' => 'control-label']) }}
                                {!! Form::text('size',null,['data-required' => 'true','class' => 'form-control', 'placeholder' => 'Size']) !!}
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                {{ Form::label('background_color', null, ['class' => 'control-label']) }}
                                <div id="background_color">
                                  <input type="text" name="background_color" value="#000000" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                {{ Form::label('fill_color', null, ['class' => 'control-label']) }}
                                <div id="fill_color">
                                  <input type="text" name="fill_color" value="#FFFFFF" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group mt-10">
                                {!! Form::button('Submit',['data-required' => 'true','class' => 'form-control btn btn-success', 'onClick'=>'getMessage()']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12" style="text-align: center;"> 
                        <div id="qrdisplay"> </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $('#background_color').colorpicker({
                color: '#000000',
                format: 'rgba'
            });
            $('#fill_color').colorpicker({
                color: '#FFFFFF',
                format: 'rgba'
            });
        });

         function getMessage() {
            $.ajax({
               type:'POST',
               url:'/generateqr',
               data:$('#parsely-frm').serialize(),
               beforeSend: function() {
                    $(".print-error-msg").hide();
                    $("#qrdisplay").html('');
               },
               success:function(data) {
                    if($.isEmptyObject(data.error)){
                        $("#qrdisplay").html(data.html);
                    }else{
                        printErrorMsg(data.error);
                    }
               }
            });
         }
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
        </script>
@endsection

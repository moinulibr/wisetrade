@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-success" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('addemployee') }}" class="form-horizontal form-label-left" novalidate >
                        @csrf
                        <span class="section">Create Employee</span>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="{{ old('name') }}" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                    data-validate-words="2" name="name"  required="required" type="text">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="{{ old('designation') }}" type="text" id="designation" name="designation" required="required" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('designation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif  
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salary <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="{{ old('salary') }}" type="text"  id="salary" name="salary" required="required" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('salary'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('salary') }}</strong>
                                </span>
                                @endif  
                            </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Joining Date
                                    
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="datepicker" autocomplete="off" type="text" value="{{ old('date') }}"  name="date"
                                        class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        <!--
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="status" name="status" required="required" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif  
                            </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userid">Userid <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="userid" name="userid" required="required" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('userid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('userid') }}</strong>
                                    </span>
                                    @endif  
                                </div>
                            </div>
                        <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="verified">Verified <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="verified" name="verified" required="required" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('verified'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('verified') }}</strong>
                                    </span>
                                    @endif  
                                </div>
                        </div>
                    -->
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">

                                <input class="btn btn-primary" type="submit" value="Save" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Date Picker Script Start -->
<script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        }); 
    </script>
    <!-- Date Picker Script End -->
    
@endsection

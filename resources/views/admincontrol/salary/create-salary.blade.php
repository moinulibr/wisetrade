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
                    <br>
                 <!-------------------->
                    <form action="{{ route('addsalary') }}" method="GET" class="form-inline">
                        <div class="form-group">
                            <label for="ex3">Year</label>
                            <select name="year" id="year" class="form-control year">
                                <option value="0"> Select One</option>
                                @php
                                $year = date('Y');
                                $year2 = 2017;
                                @endphp
                                @for ($i = 1; $year2 <= $year; $year--)
                                 <option value="{{ $year }}"> {{ $year }} </option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Month</label>
                            <select name="month" id="month" class="form-control month">
                                <option value="0">Select One</option>
                                @php
                                $month = 12;
                                @endphp
                                @for ($i = 1; $i<=$month; $month--)
                                 <option value="{{ $month }}"> {{ $month }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span> Search</button>
                    </form>
                    <!--------------------->
                   <br><br>
               

                <form method="POST" action="{{ route('createsalary') }}" class="form-horizontal form-label-left">
                    @csrf
                    <span class="section">Panding Salary Of This Month</span>
                    @isset ($nodata)
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>

                            {{ $nodata }}

                        </strong>
                    </div>
                    @endisset
                    <br>
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width: 25%">Employee Name</th>
                                <th style="width: 17%">Designation</th>
                                <th style="width: 14%">Amount</th>
                                <th style="width: 15%">Bonus</th>
                                <th style="width: 15%">Penalty</th>
                                <th style="width: 25%">Total</th>
                            </tr>
                        </thead>

                        @isset($employee)
                        @foreach ($employee as $item)
                        <tbody id="tbody">
                            <tr>
                                <td>
                                    <input type="checkbox" name="status[]" value="{{ $item->empid }}" checked />
                                </td>
                                <td>
                                    {{ $item->empid }}
                                    {{ $item->empname }}
                                </td>
                                <td>
                                    {{ $item->empdes }}
                                </td>
                                <td id="salary_{{ $item->empid  }}">
                                    {{$item->empsalery}} Tk
                                </td>
                                <td>

                                    <input value="0" type="text" id="bon_{{ $item->empid }}" name="bonus_{{ $item->empid  }}"
                                        required="required" class="form-control col-md-7 col-xs-12 slaryStatement">
                                    @if ($errors->has('bonus'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bonus') }}</strong>
                                    </span>
                                    @endif
                                </td>
                                <td>

                                    <input value="0" type="text" id="pen_{{ $item->empid }}" name="penalty_{{ $item->empid }}"
                                        required="required" class="form-control col-md-7 col-xs-12 slaryStatement">
                                    @if ($errors->has('penalty'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('penalty') }}</strong>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <b class="TotalSalery" id="total_{{ $item->empid  }}">{{ $item->empsalery }} </b>Tk
                                </td>
                                <td>
                                    <input id="yearmonth" name="yearmonth" class="yearmonth" type="hidden" value="{{ Session::get('yearmonth')}}">
                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                        @endisset
                    </table>
                    <input id="save" class="btn btn-primary pull-right" type="submit" value="Save" style="margin-left:40px;" />

                </form>

            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function () {
        $("body").on("change", ".slaryStatement", function () {
            //$('.slaryStatement').change(function () {
            var id = parseInt($(this).attr("id").substr(4));
            var salary = parseFloat($("#salary_" + id).text());
            var bonus = parseFloat($("#bon_" + id).val());
            var penalty = parseFloat($("#pen_" + id).val());

            var total_salary = salary + bonus - penalty;


            $("#total_" + id).text(total_salary);

        });
    });

</script>
@endsection

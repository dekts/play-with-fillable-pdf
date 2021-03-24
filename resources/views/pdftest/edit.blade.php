@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">PDF Test</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! session()->get('success') !!}</li>
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="/pdftest/save" aria-label="{{ __('Save Changes') }}">
                            @csrf

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Type</td>
                                        <td>Value</td>
                                    </tr>
                                </thead>
                            @foreach($fields as $field)
                                <tbody>
                                    <tr>
                                        <td>{{$field['FieldName']}}</td>
                                        <td>{{$field['FieldType']}}</td>
                                        <td>{{json_encode($field['FieldValue'])}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                            </table>
                            {{--@foreach($fields as $field)--}}
                                {{--<div class="form-group row">--}}
                                    {{--<label for="{{$field['FieldName']}}">{{ __($field['FieldName']) }}</label>--}}
                                    {{--@switch($field['FieldType'])--}}
                                        {{--@case('Text')--}}
                                            {{--<div class="col-md-6">--}}
                                                {{--<input type="text" id="{{$field['FieldName']}}" name="{{$field['FieldName']}}" value="{{json_encode($field['FieldValue'])}}">--}}
                                            {{--</div>--}}
                                        {{--@break--}}
                                        {{--@case('Choice')--}}
                                            {{--<div class="col-md-6">--}}
                                                {{--<select id="{{$field['FieldName']}}" name="{{$field['FieldName']}}" value="{{json_encode($field['FieldValue'])}}">--}}
                                                    {{--<option value="{{$field['FieldValue']}}">{{$field['FieldValue']}}</option>--}}
                                                    {{--@foreach($field["FieldStateOption"] as $option)--}}
                                                        {{--<option value="{{$option}}" >{{__($option)}}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--@break--}}
                                        {{--@case('Button')--}}
                                            {{--<div class="col-md-6">--}}
                                                {{--@if($field['FieldValue']=="1")--}}
                                                    {{--<input type="checkbox" id="{{$field['FieldName']}}" name="{{$field['FieldName']}}" value="{{$field['FieldValue']}}" checked>--}}
                                                {{--@else--}}
                                                    {{--<input type="checkbox" id="{{$field['FieldName']}}" name="{{$field['FieldName']}}" value="{{$field['FieldValue']}}">--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--@break--}}
                                    {{--@endswitch--}}
                                {{--</div>--}}
                            {{--@endforeach--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save changes') }}
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
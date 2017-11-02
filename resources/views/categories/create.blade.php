@extends('layouts.app')

@section('template_title')
    Create New Category
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Create New Category

                        <a href="{{ route('categories.index') }}" class="btn btn-info btn-xs pull-right">
                            <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                            Back <span class="hidden-xs">to</span><span class="hidden-xs"> Categories</span>
                        </a>

                    </div>
                    <div class="panel-body">

                        {!! Form::open(array('action' => 'Categories@store')) !!}

                        <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                            {!! Form::label('name', trans('Category Name'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('Category Name'))) !!}
                                    <label class="input-group-addon" for="name"></label>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('min_age') ? ' has-error ' : '' }}">
                            {!! Form::label('min_age', trans('Min Age'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('min_age', NULL, array('id' => 'min_age', 'class' => 'form-control', 'placeholder' => trans('Min Age'))) !!}
                                    <label class="input-group-addon" for="min_age"></label>
                                </div>
                                @if ($errors->has('min_age'))
                                    <span class="help-block"><strong>{{ $errors->first('min_age') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('max_age') ? ' has-error ' : '' }}">
                            {!! Form::label('max_age', trans('Max Age'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('max_age', NULL, array('id' => 'max_age', 'class' => 'form-control', 'placeholder' => trans('Max Age'))) !!}
                                    <label class="input-group-addon" for="max_age"></label>
                                </div>
                                @if ($errors->has('max_age'))
                                    <span class="help-block"><strong>{{ $errors->first('max_age') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        {!! Form::button('' . trans('Create New Category'), array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection

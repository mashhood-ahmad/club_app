@extends('layouts.app')

@section('template_title')
    Edit Member
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Edit Member

                        <a href="{{ route('members.index') }}" class="btn btn-info btn-xs pull-right">
                            <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                            Back <span class="hidden-xs">to</span><span class="hidden-xs"> Members</span>
                        </a>

                    </div>
                    <div class="panel-body">

                        <form method="post" action="{{ route('members.update', ['id' => $member->id ]) }}">
                            {{ csrf_field() }}
                            {{ method_field("put") }}

                        <div class="form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
                            {!! Form::label('first_name', trans('First Name'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('first_name', $member->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('First Name of Member'))) !!}
                                    <label class="input-group-addon" for="first_name"></label>
                                </div>
                                @if ($errors->has('first_name'))
                                    <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                            {!! Form::label('last_name', trans('Last Name'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('last_name', $member->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('Last Name of Member'))) !!}
                                    <label class="input-group-addon" for="last_name"></label>
                                </div>
                                @if ($errors->has('last_name'))
                                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('age') ? ' has-error ' : '' }}">
                            {!! Form::label('age', trans('Age'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('age', $member->age, array('id' => 'age', 'class' => 'form-control', 'placeholder' => trans('Age of the Member'))) !!}
                                    <label class="input-group-addon" for="age"></label>
                                </div>
                                @if ($errors->has('age'))
                                    <span class="help-block"><strong>{{ $errors->first('age') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('category_id') ? ' has-error ' : '' }}">
                            {!! Form::label('category', trans('Category'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    {{ $member->category->id == $category->id ? "selected" : ""}}>
                                                {{ $category->name }}
                                                (age {{ $category->min_age }} - age {{ $category->max_age }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('category_id'))
                                    <span class="help-block"><strong>Category must be chosen for Member</strong></span>
                                @endif
                            </div>
                        </div>

                        {!! Form::button('' . trans('Update Member'), array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection

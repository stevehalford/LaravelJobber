@extends('layouts.base')

@section('title', 'Post a Job - Design Jobs Wales')

@section('body')

    <div class="steps">
        <div id="step-1" class="step-active">
            Step 1: Write
        </div>
        <div id="step-2">
            Step 2: Verify
        </div>
        <div id="step-3">
            Step 3: Confirm
        </div>
        <div class="clear"></div>
    </div>
    <br />

    {{ Form::open(array('action' => 'JobController@store', 'id' => 'publish_form')) }}
        {{ Form::token() }}
        <fieldset>
            <legend>Job details</legend>
            <table border="0" cellspacing="2" cellpadding="2">
                <tr>
                    <td colspan="2">
                        @foreach ($types as $type)
                            {{ Form::radio('type_id', $type->id, null, array('id' => 'type_id_'.$type->id, 'required' => 'required')); }}
                            <label for="type_id_{{$type->id}}"><img src="{{Config::get('app.url')}}/img/icon-{{$type->var_name}}.png" alt="{{$type->name}}" /></label>
                        @endforeach
                        {{ Form::select('category_id', $categories) }}
                    </td>
                </tr>
                <tr>
                    <td class="publish-label" valign="top">Title:</td>
                    <td>
                        {{ Form::text('title', null, array('size' => 50, 'class' => $errors->has('title') ? 'error' : '', 'required' => 'required')) }}
                        {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Location:</td>
                    <td>
                        {{ Form::select('city_id', $cities) }}
                        <a id="other_location_label" href="#">other</a>
                        <div id="location_outside_ro" {if $job.location_outside_ro != '' OR $smarty.post.location_outside_ro_where != ''}style="display: block;"{else}style="display: none;"{/if}>
                            where? {{ Form::text('location_outside_ro_where') }}
                            <div class="suggestion">e.g. London, UK</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Description:</td>
                    <td>
                        {{ Form::textarea('description', null, array('cols' => '80', 'rows' => '15', 'class' => $errors->has('description') ? 'error' : '', 'required' => 'required')) }}
                        {{ $errors->first('description', '<span class="help-inline">:message</span>') }}
                        <div class="suggestion">You can use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">markdown</a> to style your text.</div>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Hiring company or person</legend>
            <table border="0" cellspacing="2" cellpadding="2">
                <tr>
                    <td class="publish-label">Company Name:</td>
                    <td>
                        {{ Form::text('company', null, array('size' => 40, 'class' => $errors->has('company') ? 'error' : '', 'required' => 'required')) }}
                        {{ $errors->first('company', '<span class="help-inline">:message</span>') }}
                    </td>
                </tr>
                <tr>
                    <td valign="top">Website:</td>
                    <td>
                        http://{{ Form::text('url', null, array('size' => 35, 'class' => $errors->has('url') ? 'error' : '')) }}
                        {{ $errors->first('url', '<span class="help-inline">:message</span>') }}
                    </td>
                </tr>
                <tr>
                    <td class="publish-label">
                        Email
                        <br /><strong>(not published)</strong>:
                    </td>
                    <td>
                        {{ Form::email('poster_email', null, array('size' => 40, 'class' => $errors->has('poster_email') ? 'error' : '', 'required' => 'required')) }}
                        {{ $errors->first('poster_email', '<span class="help-inline">:message</span>') }}
                        <div class="suggestion">
                            Online applications will be sent to this address
                        </div>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            {{ Form::checkbox('apply_online', 1, true) }}
            <strong>Allow Online Applications</strong> (If you are unchecking it, then add a description on how to apply online above)
        </fieldset>
        <fieldset>
            <legend>Anti-spam</legend>
            {{ Form::captcha() }}
            {{ $errors->first('recaptchaResponse', '<span class="help-inline">:message</span>') }}
        </fieldset>
        <fieldset>
            <input type="submit" name="submit" id="submit" value="Step 2. Verify ad" />
        </fieldset>
    {{ Form::close() }}
@stop

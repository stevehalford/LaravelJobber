<div id="apply-online">
    {{ Form::open(array('action' => array('JobController@apply', $job->id) ,'files' => true)) }}
        {{ Form::token() }}
        <table>
            <tbody>
                <tr>
                    <td>{{ Form::label('apply_name', 'Your Name:') }}</td>
                    <td>
                        {{ Form::text('apply_name', null, array('required' => 'required', 'maxlength' => '50', 'size' => '30', 'class' => $errors->has('apply_name') ? 'error' : '')) }}
                        {{ $errors->first('apply_name', '<span class="help-inline">:message</span>') }}
                    </td>
                </tr>
                <tr>
                    <td>{{ Form::label('apply_email', 'Your Email:') }}</td>
                    <td>
                        {{ Form::email('apply_email', null, array('required' => 'required', 'maxlength' => '50', 'size' => '30', 'class' => $errors->has('apply_email') ? 'error' : '')) }}
                        {{ $errors->first('apply_email', '<span class="help-inline">:message</span>') }}
                    </td>
                </tr>
                <tr>
                    <td>{{ Form::label('apply_msg', 'Message or letter of intention:') }}</td>
                    <td>
                        {{ Form::textarea('apply_msg', null, array('required' => 'required', 'class' => $errors->has('apply_msg') ? 'error' : '')) }}
                        {{ $errors->first('apply_msg', '<span class="help-inline">:message</span>') }}
                        <div class="suggestion">You can use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">markdown</a> to style your text.</div>
                    </td>
                </tr>
                <tr>
                    <td>{{ Form::label('apply_cv', 'Upload resume/CV:') }}</td>
                    <td>
                        {{ Form::file('apply_cv') }}
                        <div class="suggestion">Max. 33 MB. Recommended formats: PDF, RTF, DOC, ODT. </div>
                        {{ $errors->first('apply_cv', '<span class="help-inline">:message</span>') }}
                    </td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td>{{ Form::label('recaptcha_response_field', 'Anti-spam') }}</td>
                    <td>
                        {{ Form::captcha() }}
                        {{ $errors->first('recaptcha_response_field', '<span class="help-inline">:message</span>') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {{ Form::submit('submit', array('id' => 'submit')) }} or
                        <a href="#" id="cancel-apply">cancel</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="job_id" id="job_id" value="2896">
    </form>
</div>

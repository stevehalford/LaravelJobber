<div id="apply-online">
    {{ Form::open(array('action' => array('JobController@apply', $job->id))) }}
        {{ Form::token() }}
        <table>
            <tbody><tr>
                <td><label for="apply_name">Your name:</label></td>
                <td>
                    <input type="text" name="apply_name" id="apply_name" maxlength="50" size="30" value="">
                    <span class="validation-error"></span>
                </td>
            </tr>
            <tr>
                <td><label for="apply_email">Your e-mail:</label></td>
                <td>
                    <input type="text" name="apply_email" id="apply_email" maxlength="50" size="30" value="">
                    <span class="validation-error"></span>
                </td>
            </tr>
            <tr>
                <td valign="top"><label for="apply_msg">Message<br>or letter of intention:</label></td>
                <td>
                    <textarea name="apply_msg" id="apply_msg" cols="60" rows="15"></textarea>
                    <span class="validation-error"></span>
                </td>
            </tr>
            <tr>
                <td valign="top"><label for="apply_cv">Upload resume/CV:</label></td>
                <td>
                    <input type="file" name="apply_cv" id="apply_cv">
                    <span class="validation-error"></span>
                    <div class="suggestion">Max. 3 MB. Recommended formats: PDF, RTF, DOC, ODT. </div>
                </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" id="submit" value="Send my application"> or
                    <a href="#" id="cancel-apply">cancel</a>
                </td>
            </tr>
        </tbody></table>
        <input type="hidden" name="job_id" id="job_id" value="2896">
    </form>
</div>

@extends('layouts.base')

@section('title', 'Post a Job - Design Jobs Wales')

@section('body')
<div class="steps">
    <div id="step-1">
        Step 1: Write
    </div>
    <div id="step-2">
        Step 2: Verify
    </div>
    <div id="step-3" class="step-active">
        Step 3: Confirm
    </div>
    <div class="clear"></div>
</div>
<br />

<div class="post-status pending">
    Your job was posted, but since this is the first time you have posted with this e-mail address, we need to manually verify it.<br>Thank you for your patience, the ad should be published ASAP. We'll send you an e-mail when that happens. <br><br>From now on, every ad you post with this e-mail address will instantly be published.<br>
</div>
@stop

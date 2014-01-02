@extends('layouts.base')

@section('body')
    <div id="job-details">
        <div id="applied-to-job">
            1
            <p>applicant</p>
        </div>
        <h2><img src="http://www.designjobswales.co.uk/_templates/djw/img/icon-{{ $job->type->var_name }}.png" alt="{{ $job->type->name }}">
            {{ $job->title }}
        </h2>
        <p>
            <span class="fading">at</span>
            <a href="http://{{ $job->url }}">{{ $job->company }}</a>
            <span class="fading">in</span> <strong>{{ $job->city->name }}</strong>
        </p>

        <div id="job-description">
            {{ $job->description }}
        </div>
        <br>

        <div id="apply_online_now"><a href="#" onclick="$('#apply-online').toggle(); window.location.href = '#apply'; return false;">» Apply now</a></div>

        <br>

        <!--twitter-->
       <p><iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1387492107.html#_=1388698982681&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fwww.designjobswales.co.uk%2Fjob%2F2895%2Fexperienced-designer-at-spindogs%2F&amp;size=m&amp;text=Experienced%20Designer%20at%20Spindogs%20%2F%20Design%20Jobs%20Wales&amp;url=http%3A%2F%2Fwww.designjobswales.co.uk%2Fjob%2F2895%2Fexperienced-designer-at-spindogs%2F&amp;via=designjobswales" class="twitter-share-button twitter-tweet-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 108px; height: 20px;"></iframe><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></p>


        <!--facebook like button -->

        <!--<p><fb:like show_faces="false"></fb:like></p>-->
        <div id="fb-root" class=" fb_reset"><script type="text/javascript" src="http://connect.facebook.net/en_GB/all.js" async=""></script><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tab-index="-1" src="http://static.ak.facebook.com/connect/xd_arbiter.php?version=28#channel=f239a194b&amp;channel_path=%2Fjob%2F2895%2Fexperienced-designer-at-spindogs%2F%3Ffb_xd_fragment%23xd_sig%3Df1a12b687c%26&amp;origin=http%3A%2F%2Fwww.designjobswales.co.uk" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tab-index="-1" src="https://s-static.ak.facebook.com/connect/xd_arbiter.php?version=28#channel=f239a194b&amp;channel_path=%2Fjob%2F2895%2Fexperienced-designer-at-spindogs%2F%3Ffb_xd_fragment%23xd_sig%3Df1a12b687c%26&amp;origin=http%3A%2F%2Fwww.designjobswales.co.uk" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="f2e3f72448" frameborder="0" allowtransparency="true" scrolling="no" src="https://www.facebook.com/connect/ping?client_id=116931001673503&amp;domain=www.designjobswales.co.uk&amp;origin=1&amp;redirect_uri=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D28%23cb%3Df3ffa2dc78%26domain%3Dwww.designjobswales.co.uk%26origin%3Dhttp%253A%252F%252Fwww.designjobswales.co.uk%252Ff239a194b%26relation%3Dparent&amp;response_type=token%2Csigned_request%2Ccode&amp;sdk=joey" style="display: none;"></iframe></div></div></div>
        <script>
          window.fbAsyncInit = function() {
            FB.init({appId: '116931001673503', status: true, cookie: true,
                     xfbml: true});
          };
          (function() {
            var e = document.createElement('script');
            e.type = 'text/javascript';
            e.src = document.location.protocol +
              '//connect.facebook.net/en_GB/all.js';
            e.async = true;
            document.getElementById('fb-root').appendChild(e);
          }());
        </script>

        <br>


    <!-- Jobs from the same company -->
<!-- Jobs from the same company -->         </div><!-- #job-details -->

    <div id="job-bottom">
        <div id="job-post-utils">
            <a href="{{ Config::get('app.url') }}/jobs/{{ $job->category->var_name }}/" title="category home">« Go back to category</a><br>
            Is this job ad fake? <a href="#" onclick="Jobber.ReportSpam('http://www.designjobswales.co.uk/report-spam/', 2895); return false;" title="report fake ad">Report it!</a>
            &nbsp;&nbsp;<span id="report-spam-response"></span><br>
            <a href="#" onclick="Jobber.SendToFriend.showHide(); return false;" title="Recommend to a friend">Recommend to a friend</a>
        </div><!-- #job-post-utils -->
        <div id="number-views">
            Published at <strong>{{ date('d-m-Y', strtotime($job->created_on)) }}</strong><br>
            Viewed: <strong>{{ $job->views_count }}</strong> times
        </div><!-- #number-views -->
        <div class="clear"></div>
    </div><!-- #job-bottom -->

    <div id="send-to-friend" style="display: none;">
        <form id="frm-send-to-friend" method="post" action="http://www.designjobswales.co.uk/send-to-friend/">
            <table>
                <tbody><tr>
                    <td class="send-to-friend-address-label"><label for="friend_email">Friend's e-mail:</label></td>
                    <td><input type="text" name="friend_email" id="friend_email" maxlength="50" size="30"></td>
                </tr>
                <tr>
                    <td><label for="my_email">Your e-mail:</label></td>
                    <td><input type="text" name="my_email" id="my_email" maxlength="50" size="30"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" id="submit" value="Send">
                        &nbsp;&nbsp;<span id="send-to-friend-response"></span>
                    </td>
                </tr>
            </tbody></table>
        </form>
    </div><!-- #send-to-friend -->
@stop

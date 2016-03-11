<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>
    <title>@yield('title', 'Design Jobs Wales')</title>
    <meta name="description" content="@yield('description', 'Design Jobs Wales makes it easy for agencies and recruiters to fill design jobs in Wales and is a must for design related professionals in Wales.')">
    <meta name="keywords" content="@yield('keywords', 'design, jobs, wales, cardiff, recruitment, newport, swansea, design jobs, north wales')}}">
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8">
    <meta name="author" content="Filip Cherecheş-Toşa (http://www.filipcte.ro)">

    <!--facebook og -->
    <meta property="fb:admins" content="789248635">
    <meta property="og:title" content="@yield('title', 'Design Jobs Wales')">
    <meta property="og:description" content="@yield('description', 'Design Jobs Wales makes it easy for agencies and recruiters to fill design jobs in Wales and is a must for design related professionals in Wales.')">
    <meta property="og:type" content="article">
    <meta property="og:url" content="">
    <meta property="og:image" content="http://www.designjobswales.co.uk/_templates/djw/img/djw-logo.png">

    <meta name="viewport" content="width=device-width">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="http://www.designjobswales.co.uk/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="http://www.designjobswales.co.uk/apple-touch-icon.png">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.designjobswales.co.uk/rss/all/">
    <link rel="stylesheet" href="{{ Config::get('app.url') }}/css/compiled.css" type="text/css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{ Config::get('app.url') }}/scripts/main.js" type="text/javascript"></script>
<body>
    <div id="container">
        <div id="header">
            <h1 id="logo"><a href="{{ Config::get('app.url') }}" title="Design Jobs Wales">Design Jobs Wales</a></h1>
            <div id="comms">
                <a href="{{ Config::get('app.url') }}/rss/all/" title="Subscribe to the Jobs RSS feed" id="rss">Jobs RSS</a>
                <a href="http://www.twitter.com/designjobswales" id="twitter">Follow</a>
            </div>

            <div id="categs-nav">
                <label for="show-menu" class="show-menu">Show Menu</label>
                <input type="checkbox" id="show-menu" role="button">
                <ul>
                    @foreach($categories as $category)
                        <li id="{{ $category->var_name }}"><a href="{{ Config::get('app.url') . '/jobs/' . $category->var_name }}" title="{{ $category->title }}"><span>{{ $category->name }}</span></a></li>
                    @endforeach
                </ul>
                <div id="search">
                    {{ Form::open(array('action' => 'SearchController@search', 'method' => 'GET')) }}
                        {{ Form::text('keywords', null, array('placeholder' => 'Search Jobs', 'class' => 'text', 'max-length' => '30'))}}
                    {{ Form::close() }}
                </div><!-- #search -->
            </div><!-- #categs-nav -->

        </div><!-- #header -->

        <div class="clear"></div>

        <div id="sidebar">
            <a href="{{ Config::get('app.url') }}/post/" title="" class="add btn">Post a job</a>

            @include('partials/influads')

        </div><!-- #sidebar -->

        <div id="content">

            @include('partials/notifications')
            @yield('body')

        </div><!-- #container -->

    <div class="footer">
        <div id="footer-contents">
            <div class="left" id="footer-col1">
                Use:<br>
                <a href="{{ Config::get('app.url') }}/post/" title="Post a new job for free!">Post a new job</a><br>
                <a href="{{ Config::get('app.url') }}/rss/" title="An overview of all our available RSS Feeds.">RSS Feeds</a><br>
            </div>
            <div class="left" id="footer-col2">
                Find out more:<br>
                <a href="{{ Config::get('app.url') }}/about/" title="More information about us.">About</a><br>
                <a href="{{ Config::get('app.url') }}/contact/" title="Don't hesitate to contact us!">Contact</a><br>
                <a href="http://www.twitter.com/designjobswales/" title="Follow us on twitter">Follow on Twitter</a><br>
            </div>
            <div class="left" id="footer-copyright">
                Built by <a href="http://www.stevehalford.co.uk">me</a>
            </div>
            <div class="clear"></div>
        </div><!-- #footer-contents -->
    </div><!-- .footer -->

    <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
    <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-162604-4");
    pageTracker._trackPageview();
    } catch(err) {}</script>

</body>
</html>

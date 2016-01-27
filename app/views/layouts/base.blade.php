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
                <a href="http://blog.designjobswales.co.uk/feed/" title="Subscribe to the Blog RSS feed" id="rss">Blog RSS</a>
                <a href="http://www.twitter.com/designjobswales" id="twitter">Follow Us</a>
            </div>

            <div id="categs-nav">
                <ul>
                    @foreach($categories as $category)
                        <li id="{{ $category->var_name }}"><a href="{{ Config::get('app.url') . '/jobs/' . $category->var_name }}" title="{{ $category->title }}"><span>{{ $category->name }}</span></a></li>
                    @endforeach
                    <li><a href="http://blog.designjobswales.co.uk">Blog</a></li>
                </ul>
            </div><!-- #categs-nav -->

        </div><!-- #header -->

        <div id="box">
            <h2 id="tagline">Design and development jobs in Wales and just over the border</h2>
            <div id="search">
                {{ Form::open(array('action' => 'SearchController@search', 'method' => 'GET')) }}
                <form id="search_form" method="post" action="http://www.designjobswales.co.uk/search/">
                    <fieldset>
                        <div>
                            {{ Form::text('keywords', null, array('placeholder' => 'Search Jobs', 'class' => 'text', 'max-length' => '30'))}}
                            <input type="submit" name="submit" value="Search" class="submit">
                        </div>
                    </fieldset>
                {{ Form::close() }}
            </div><!-- #search -->
        </div><!-- #box -->

        <div class="clear"></div>

        <div id="sidebar">
            <div class="sidebar_block">
                <div class="addJob">
                    <a href="{{ Config::get('app.url') }}/post/" title="" class="add">Post a job</a>
                </div>
                <div class="text">
                    <p>100% Free (as in beer)</p>
                    <p class="smallprint">Just £20 for recruitment agencies</p>
                </div>
            </div>

            @include('partials/influads')

            <a href="https://itunes.apple.com/us/app/design-jobs-wales/id695154003?ls=1&amp;mt=8" class="appad">
                <img src="http://www.designjobswales.co.uk/_templates/djw/img/app_ad.png" alt="Get the DJW App">
            </a>
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
                                                                                                <a href="{{ Config::get('app.url') }}/widgets/" title="Would you like to display our latest jobs on your site?">Site widget</a><br>
                                                                                                <a href="{{ Config::get('app.url') }}/rss/" title="An overview of all our available RSS Feeds.">RSS Feeds</a><br>
                                                                                                <a href="{{ Config::get('app.url') }}/companies/" title="An overview of all available companies.">Companies</a><br>
                                                                                                <a href="{{ Config::get('app.url') }}/sitemap/" title="Sitemap">Sitemap</a><br>
                                                                        </div>
            <div class="left" id="footer-col2">
                Find out more:<br>
                                                                                        <a href="{{ Config::get('app.url') }}/about/" title="More information about us.">About Us</a><br>
                                                                                                <a href="{{ Config::get('app.url') }}/contact/" title="Don't hesitate to contact us!">Contact</a><br>
                                                                                                <a href="http://www.twitter.com/designjobswales/" title="Follow us on twitter">Follow Us on Twitter</a><br>
                                                                        </div>
            <div class="left" id="footer-col3">
                Links:<br>
                                                                                        <a href="http://blog.designjobswales.co.uk/" title="The Blog of Design Jobs Wales">Design Jobs Wales Blog</a><br>
                                                                                                <a href="http://www.creative-wales.com/" title="A blog about Art, Design and Media in Wales. We aim to provide the latest information about the sector, artists, designers and other stuff happening in Welsh Art, Design and Media.">Creative Wales</a><br>
                                                                                                <a href="http://www.creativeboom.co.uk//" title="A regional online magazine about the creative industries in Cardiff and the rest of Wales">Creative Boom</a><br>
                                                                        </div>
            <div class="left" id="footer-copyright">
                Designed and built by <a href="http://www.inknpixel.co.uk">inknpixel.co.uk</a>
                <br>Powered by <a href="http://www.jobberbase.com">jobberBase</a>
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

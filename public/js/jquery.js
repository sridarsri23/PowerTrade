



<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled is-u2f-enabled">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    

    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/frameworks-83796007490d53d3c7150b5b8d1bb223f645cc84b20ea8a123fd6d4867541050.css" integrity="sha256-g3lgB0kNU9PHFQtbjRuyI/ZFzISyDqihI/1tSGdUEFA=" media="all" rel="stylesheet" />
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-d8ed145bdf068fa6112b605071db55ccd9a7045533a2919d609fd28fbdf7d956.css" integrity="sha256-2O0UW98Gj6YRK2BQcdtVzNmnBFUzopGdYJ/Sj7332VY=" media="all" rel="stylesheet" />
    
    
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/site-f4b3d32cffc56de06873b8a6d88ae6139de92dc0fc31574232803d68729f6fac.css" integrity="sha256-9LPTLP/FbeBoc7im2IrmE53pLcD8MVdCMoA9aHKfb6w=" media="all" rel="stylesheet" />
    

    <link as="script" href="https://assets-cdn.github.com/assets/frameworks-404cdd1add1f710db016a02e5e31fff8a9089d14ff0c227df862b780886db7d5.js" rel="preload" />
    
    <link as="script" href="https://assets-cdn.github.com/assets/github-00274be02ca83717fd26c1217d72ead4b257c847581b6c7497ad0a88ccd20723.js" rel="preload" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">
    
    <title>datetimepicker/jquery.js at master · xdan/datetimepicker · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <meta property="fb:app_id" content="1401488693436528">

      <meta content="https://avatars3.githubusercontent.com/u/794318?v=3&amp;s=400" name="twitter:image:src" /><meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="xdan/datetimepicker" name="twitter:title" /><meta content="datetimepicker - jQuery Plugin Date and Time Picker" name="twitter:description" />
      <meta content="https://avatars3.githubusercontent.com/u/794318?v=3&amp;s=400" property="og:image" /><meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="xdan/datetimepicker" property="og:title" /><meta content="https://github.com/xdan/datetimepicker" property="og:url" /><meta content="datetimepicker - jQuery Plugin Date and Time Picker" property="og:description" />
      <meta name="browser-stats-url" content="https://api.github.com/_private/browser/stats">
    <meta name="browser-errors-url" content="https://api.github.com/_private/browser/errors">
    <link rel="assets" href="https://assets-cdn.github.com/">
    
    <meta name="pjax-timeout" content="1000">
    

    <meta name="msapplication-TileImage" content="/windows-tile.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="selected-link" value="repo_source" data-pjax-transient>

    <meta name="google-site-verification" content="KT5gs8h0wvaagLKAVWq8bbeNwnZZK1r1XQysX3xurLU">
<meta name="google-site-verification" content="ZzhVyEFwb7w3e0-uOTltm8Jsck2F5StVihD0exw2fsA">
    <meta name="google-analytics" content="UA-3769691-2">

<meta content="collector.githubapp.com" name="octolytics-host" /><meta content="github" name="octolytics-app-id" /><meta content="7BE77AAC:2D4E:6472581:579C5850" name="octolytics-dimension-request_id" />
<meta content="/&lt;user-name&gt;/&lt;repo-name&gt;/blob/show" data-pjax-transient="true" name="analytics-location" />



  <meta class="js-ga-set" name="dimension1" content="Logged Out">



        <meta name="hostname" content="github.com">
    <meta name="user-login" content="">

        <meta name="expected-hostname" content="github.com">
      <meta name="js-proxy-site-detection-payload" content="OGE0MTE4ZjIyMTY3OWY2ZmQ3ZDhjMDJiZTc4OTU0YzgxMmFhNzU0N2E2YWY1ZWE4ZTViNGE0ODZiNDRlYWNlYXx7InJlbW90ZV9hZGRyZXNzIjoiMTIzLjIzMS4xMjIuMTcyIiwicmVxdWVzdF9pZCI6IjdCRTc3QUFDOjJENEU6NjQ3MjU4MTo1NzlDNTg1MCIsInRpbWVzdGFtcCI6MTQ2OTg2NDAyMH0=">


      <link rel="mask-icon" href="https://assets-cdn.github.com/pinned-octocat.svg" color="#4078c0">
      <link rel="icon" type="image/x-icon" href="https://assets-cdn.github.com/favicon.ico">

    <meta name="html-safe-nonce" content="ba811a45ff03810c125f0835cd1efb5f5b7ba64c">
    <meta content="63f302d0e8175cd0b507a8533c7cd429427e3d3e" name="form-nonce" />

    <meta http-equiv="x-pjax-version" content="b9d16bd019cf28edf4e2b3202dae5d5b">
    

      
  <meta name="description" content="datetimepicker - jQuery Plugin Date and Time Picker">
  <meta name="go-import" content="github.com/xdan/datetimepicker git https://github.com/xdan/datetimepicker.git">

  <meta content="794318" name="octolytics-dimension-user_id" /><meta content="xdan" name="octolytics-dimension-user_login" /><meta content="14083440" name="octolytics-dimension-repository_id" /><meta content="xdan/datetimepicker" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="14083440" name="octolytics-dimension-repository_network_root_id" /><meta content="xdan/datetimepicker" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/xdan/datetimepicker/commits/master.atom" rel="alternate" title="Recent Commits to datetimepicker:master" type="application/atom+xml">


      <link rel="canonical" href="https://github.com/xdan/datetimepicker/blob/master/jquery.js" data-pjax-transient>
  </head>


  <body class="logged-out  env-production windows vis-public page-blob">
    <div id="js-pjax-loader-bar" class="pjax-loader-bar"></div>
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>

    
    
    



          <header class="site-header js-details-container" role="banner">
  <div class="container-responsive">
    <a class="header-logo-invertocat" href="https://github.com/" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
      <svg aria-hidden="true" class="octicon octicon-mark-github" height="32" version="1.1" viewBox="0 0 16 16" width="32"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
    </a>

    <button class="btn-link right site-header-toggle js-details-target" type="button" aria-label="Toggle navigation">
      <svg aria-hidden="true" class="octicon octicon-three-bars" height="24" version="1.1" viewBox="0 0 12 16" width="18"><path d="M11.41 9H.59C0 9 0 8.59 0 8c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zm0-4H.59C0 5 0 4.59 0 4c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zM.59 11H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1H.59C0 13 0 12.59 0 12c0-.59 0-1 .59-1z"></path></svg>
    </button>

    <div class="site-header-menu">
      <nav class="site-header-nav site-header-nav-main">
        <a href="/personal" class="js-selected-navigation-item nav-item nav-item-personal" data-ga-click="Header, click, Nav menu - item:personal" data-selected-links="/personal /personal">
          Personal
</a>        <a href="/open-source" class="js-selected-navigation-item nav-item nav-item-opensource" data-ga-click="Header, click, Nav menu - item:opensource" data-selected-links="/open-source /open-source">
          Open source
</a>        <a href="/business" class="js-selected-navigation-item nav-item nav-item-business" data-ga-click="Header, click, Nav menu - item:business" data-selected-links="/business /business/features /business/customers /business">
          Business
</a>        <a href="/explore" class="js-selected-navigation-item nav-item nav-item-explore" data-ga-click="Header, click, Nav menu - item:explore" data-selected-links="/explore /trending /trending/developers /integrations /integrations/feature/code /integrations/feature/collaborate /integrations/feature/ship /explore">
          Explore
</a>      </nav>

      <div class="site-header-actions">
            <a class="btn btn-primary site-header-actions-btn" href="/join?source=header-repo" data-ga-click="(Logged out) Header, clicked Sign up, text:sign-up">Sign up</a>
          <a class="btn site-header-actions-btn mr-2" href="/login?return_to=%2Fxdan%2Fdatetimepicker%2Fblob%2Fmaster%2Fjquery.js" data-ga-click="(Logged out) Header, clicked Sign in, text:sign-in">Sign in</a>
      </div>

        <nav class="site-header-nav site-header-nav-secondary">
          <a class="nav-item" href="/pricing">Pricing</a>
          <a class="nav-item" href="/blog">Blog</a>
          <a class="nav-item" href="https://help.github.com">Support</a>
          <a class="nav-item header-search-link" href="https://github.com/search">Search GitHub</a>
              <div class="header-search scoped-search site-scoped-search js-site-search" role="search">
  <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/xdan/datetimepicker/search" class="js-site-search-form" data-scoped-search-url="/xdan/datetimepicker/search" data-unscoped-search-url="/search" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <label class="form-control header-search-wrapper js-chromeless-input-container">
      <div class="header-search-scope">This repository</div>
      <input type="text"
        class="form-control header-search-input js-site-search-focus js-site-search-field is-clearable"
        data-hotkey="s"
        name="q"
        placeholder="Search"
        aria-label="Search this repository"
        data-unscoped-placeholder="Search GitHub"
        data-scoped-placeholder="Search"
        autocapitalize="off">
    </label>
</form></div>

        </nav>
    </div>
  </div>
</header>



    <div id="start-of-content" class="accessibility-aid"></div>

      <div id="js-flash-container">
</div>


    <div role="main">
        <div itemscope itemtype="http://schema.org/SoftwareSourceCode">
    <div id="js-repo-pjax-container" data-pjax-container>
      
<div class="pagehead repohead instapaper_ignore readability-menu experiment-repo-nav">
  <div class="container repohead-details-container">

    

<ul class="pagehead-actions">

  <li>
      <a href="/login?return_to=%2Fxdan%2Fdatetimepicker"
    class="btn btn-sm btn-with-count tooltipped tooltipped-n"
    aria-label="You must be signed in to watch a repository" rel="nofollow">
    <svg aria-hidden="true" class="octicon octicon-eye" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
    Watch
  </a>
  <a class="social-count" href="/xdan/datetimepicker/watchers">
    171
  </a>

  </li>

  <li>
      <a href="/login?return_to=%2Fxdan%2Fdatetimepicker"
    class="btn btn-sm btn-with-count tooltipped tooltipped-n"
    aria-label="You must be signed in to star a repository" rel="nofollow">
    <svg aria-hidden="true" class="octicon octicon-star" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74z"></path></svg>
    Star
  </a>

    <a class="social-count js-social-count" href="/xdan/datetimepicker/stargazers">
      1,896
    </a>

  </li>

  <li>
      <a href="/login?return_to=%2Fxdan%2Fdatetimepicker"
        class="btn btn-sm btn-with-count tooltipped tooltipped-n"
        aria-label="You must be signed in to fork a repository" rel="nofollow">
        <svg aria-hidden="true" class="octicon octicon-repo-forked" height="16" version="1.1" viewBox="0 0 10 16" width="10"><path d="M8 1a1.993 1.993 0 0 0-1 3.72V6L5 8 3 6V4.72A1.993 1.993 0 0 0 2 1a1.993 1.993 0 0 0-1 3.72V6.5l3 3v1.78A1.993 1.993 0 0 0 5 15a1.993 1.993 0 0 0 1-3.72V9.5l3-3V4.72A1.993 1.993 0 0 0 8 1zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3 10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3-10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
        Fork
      </a>

    <a href="/xdan/datetimepicker/network" class="social-count">
      781
    </a>
  </li>
</ul>

    <h1 class="public ">
  <svg aria-hidden="true" class="octicon octicon-repo" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path></svg>
  <span class="author" itemprop="author"><a href="/xdan" class="url fn" rel="author">xdan</a></span><!--
--><span class="path-divider">/</span><!--
--><strong itemprop="name"><a href="/xdan/datetimepicker" data-pjax="#js-repo-pjax-container">datetimepicker</a></strong>

</h1>

  </div>
  <div class="container">
    
<nav class="reponav js-repo-nav js-sidenav-container-pjax"
     itemscope
     itemtype="http://schema.org/BreadcrumbList"
     role="navigation"
     data-pjax="#js-repo-pjax-container">

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/xdan/datetimepicker" aria-selected="true" class="js-selected-navigation-item selected reponav-item" data-hotkey="g c" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches /xdan/datetimepicker" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-code" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M9.5 3L8 4.5 11.5 8 8 11.5 9.5 13 14 8 9.5 3zm-5 0L0 8l4.5 5L6 11.5 2.5 8 6 4.5 4.5 3z"></path></svg>
      <span itemprop="name">Code</span>
      <meta itemprop="position" content="1">
</a>  </span>

    <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
      <a href="/xdan/datetimepicker/issues" class="js-selected-navigation-item reponav-item" data-hotkey="g i" data-selected-links="repo_issues repo_labels repo_milestones /xdan/datetimepicker/issues" itemprop="url">
        <svg aria-hidden="true" class="octicon octicon-issue-opened" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg>
        <span itemprop="name">Issues</span>
        <span class="counter">234</span>
        <meta itemprop="position" content="2">
</a>    </span>

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/xdan/datetimepicker/pulls" class="js-selected-navigation-item reponav-item" data-hotkey="g p" data-selected-links="repo_pulls /xdan/datetimepicker/pulls" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-git-pull-request" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M11 11.28V5c-.03-.78-.34-1.47-.94-2.06C9.46 2.35 8.78 2.03 8 2H7V0L4 3l3 3V4h1c.27.02.48.11.69.31.21.2.3.42.31.69v6.28A1.993 1.993 0 0 0 10 15a1.993 1.993 0 0 0 1-3.72zm-1 2.92c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zM4 3c0-1.11-.89-2-2-2a1.993 1.993 0 0 0-1 3.72v6.56A1.993 1.993 0 0 0 2 15a1.993 1.993 0 0 0 1-3.72V4.72c.59-.34 1-.98 1-1.72zm-.8 10c0 .66-.55 1.2-1.2 1.2-.65 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
      <span itemprop="name">Pull requests</span>
      <span class="counter">9</span>
      <meta itemprop="position" content="3">
</a>  </span>

    <a href="/xdan/datetimepicker/wiki" class="js-selected-navigation-item reponav-item" data-hotkey="g w" data-selected-links="repo_wiki /xdan/datetimepicker/wiki">
      <svg aria-hidden="true" class="octicon octicon-book" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M3 5h4v1H3V5zm0 3h4V7H3v1zm0 2h4V9H3v1zm11-5h-4v1h4V5zm0 2h-4v1h4V7zm0 2h-4v1h4V9zm2-6v9c0 .55-.45 1-1 1H9.5l-1 1-1-1H2c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1h5.5l1 1 1-1H15c.55 0 1 .45 1 1zm-8 .5L7.5 3H2v9h6V3.5zm7-.5H9.5l-.5.5V12h6V3z"></path></svg>
      Wiki
</a>

  <a href="/xdan/datetimepicker/pulse" class="js-selected-navigation-item reponav-item" data-selected-links="pulse /xdan/datetimepicker/pulse">
    <svg aria-hidden="true" class="octicon octicon-pulse" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M11.5 8L8.8 5.4 6.6 8.5 5.5 1.6 2.38 8H0v2h3.6l.9-1.8.9 5.4L9 8.5l1.6 1.5H14V8z"></path></svg>
    Pulse
</a>
  <a href="/xdan/datetimepicker/graphs" class="js-selected-navigation-item reponav-item" data-selected-links="repo_graphs repo_contributors /xdan/datetimepicker/graphs">
    <svg aria-hidden="true" class="octicon octicon-graph" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M16 14v1H0V0h1v14h15zM5 13H3V8h2v5zm4 0H7V3h2v10zm4 0h-2V6h2v7z"></path></svg>
    Graphs
</a>

</nav>

  </div>
</div>

<div class="container new-discussion-timeline experiment-repo-nav">
  <div class="repository-content">

    

<a href="/xdan/datetimepicker/blob/428499aad2d615084b0dfe6d8dd867930578fac4/jquery.js" class="hidden js-permalink-shortcut" data-hotkey="y">Permalink</a>

<!-- blob contrib key: blob_contributors:v21:37acfddc0741b0662f007fcd36392f96 -->

<div class="file-navigation js-zeroclipboard-container">
  
<div class="select-menu branch-select-menu js-menu-container js-select-menu left">
  <button class="btn btn-sm select-menu-button js-menu-target css-truncate" data-hotkey="w"
    title="master"
    type="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <i>Branch:</i>
    <span class="js-select-button css-truncate-target">master</span>
  </button>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <svg aria-label="Close" class="octicon octicon-x js-menu-close" height="16" role="img" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
        <span class="select-menu-title">Switch branches/tags</span>
      </div>

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="form-control js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" data-filter-placeholder="Filter branches/tags" class="js-select-menu-tab" role="tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" data-filter-placeholder="Find a tag…" class="js-select-menu-tab" role="tab">Tags</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches" role="menu">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <a class="select-menu-item js-navigation-item js-navigation-open selected"
               href="/xdan/datetimepicker/blob/master/jquery.js"
               data-name="master"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text" title="master">
                master
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/xdan/datetimepicker/blob/revert-218-emptyformatpatch/jquery.js"
               data-name="revert-218-emptyformatpatch"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text" title="revert-218-emptyformatpatch">
                revert-218-emptyformatpatch
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/xdan/datetimepicker/blob/revert-455-master/jquery.js"
               data-name="revert-455-master"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text" title="revert-455-master">
                revert-455-master
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/xdan/datetimepicker/blob/v.1.0.1/jquery.js"
               data-name="v.1.0.1"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text" title="v.1.0.1">
                v.1.0.1
              </span>
            </a>
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/v.1.0.1/jquery.js"
              data-name="v.1.0.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="v.1.0.1">
                v.1.0.1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.5.4/jquery.js"
              data-name="2.5.4"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.5.4">
                2.5.4
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.5.3/jquery.js"
              data-name="2.5.3"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.5.3">
                2.5.3
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.5.2/jquery.js"
              data-name="2.5.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.5.2">
                2.5.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.5.1/jquery.js"
              data-name="2.5.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.5.1">
                2.5.1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.5.0/jquery.js"
              data-name="2.5.0"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.5.0">
                2.5.0
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.9/jquery.js"
              data-name="2.4.9"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.9">
                2.4.9
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.8/jquery.js"
              data-name="2.4.8"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.8">
                2.4.8
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.7/jquery.js"
              data-name="2.4.7"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.7">
                2.4.7
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.6/jquery.js"
              data-name="2.4.6"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.6">
                2.4.6
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.5/jquery.js"
              data-name="2.4.5"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.5">
                2.4.5
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.4/jquery.js"
              data-name="2.4.4"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.4">
                2.4.4
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.3/jquery.js"
              data-name="2.4.3"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.3">
                2.4.3
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.2/jquery.js"
              data-name="2.4.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.2">
                2.4.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.4.1/jquery.js"
              data-name="2.4.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.4.1">
                2.4.1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.9/jquery.js"
              data-name="2.3.9"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.9">
                2.3.9
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.8/jquery.js"
              data-name="2.3.8"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.8">
                2.3.8
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.7/jquery.js"
              data-name="2.3.7"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.7">
                2.3.7
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.6/jquery.js"
              data-name="2.3.6"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.6">
                2.3.6
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.5/jquery.js"
              data-name="2.3.5"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.5">
                2.3.5
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.4/jquery.js"
              data-name="2.3.4"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.4">
                2.3.4
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.3/jquery.js"
              data-name="2.3.3"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.3">
                2.3.3
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.2/jquery.js"
              data-name="2.3.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.2">
                2.3.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.1/jquery.js"
              data-name="2.3.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.1">
                2.3.1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.3.0/jquery.js"
              data-name="2.3.0"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3.0">
                2.3.0
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.9/jquery.js"
              data-name="2.2.9"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.9">
                2.2.9
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.8/jquery.js"
              data-name="2.2.8"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.8">
                2.2.8
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.7/jquery.js"
              data-name="2.2.7"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.7">
                2.2.7
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.6/jquery.js"
              data-name="2.2.6"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.6">
                2.2.6
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.5/jquery.js"
              data-name="2.2.5"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.5">
                2.2.5
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.4/jquery.js"
              data-name="2.2.4"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.4">
                2.2.4
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.3/jquery.js"
              data-name="2.2.3"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.3">
                2.2.3
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.2.2/jquery.js"
              data-name="2.2.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2.2">
                2.2.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.9/jquery.js"
              data-name="2.1.9"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.9">
                2.1.9
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.8/jquery.js"
              data-name="2.1.8"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.8">
                2.1.8
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.7/jquery.js"
              data-name="2.1.7"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.7">
                2.1.7
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.6/jquery.js"
              data-name="2.1.6"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.6">
                2.1.6
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.5/jquery.js"
              data-name="2.1.5"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.5">
                2.1.5
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.4/jquery.js"
              data-name="2.1.4"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.4">
                2.1.4
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.3/jquery.js"
              data-name="2.1.3"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.3">
                2.1.3
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.2/jquery.js"
              data-name="2.1.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.2">
                2.1.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.1/jquery.js"
              data-name="2.1.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.1">
                2.1.1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.1.0/jquery.js"
              data-name="2.1.0"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1.0">
                2.1.0
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.9/jquery.js"
              data-name="2.0.9"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.9">
                2.0.9
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.8/jquery.js"
              data-name="2.0.8"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.8">
                2.0.8
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.7/jquery.js"
              data-name="2.0.7"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.7">
                2.0.7
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.6/jquery.js"
              data-name="2.0.6"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.6">
                2.0.6
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.5/jquery.js"
              data-name="2.0.5"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.5">
                2.0.5
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.4/jquery.js"
              data-name="2.0.4"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.4">
                2.0.4
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.3/jquery.js"
              data-name="2.0.3"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.3">
                2.0.3
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.2/jquery.js"
              data-name="2.0.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.2">
                2.0.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.1/jquery.js"
              data-name="2.0.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.1">
                2.0.1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/2.0.0/jquery.js"
              data-name="2.0.0"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.0.0">
                2.0.0
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.1.1/jquery.js"
              data-name="1.1.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.1.1">
                1.1.1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.1.0/jquery.js"
              data-name="1.1.0"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.1.0">
                1.1.0
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.10/jquery.js"
              data-name="1.0.10"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.10">
                1.0.10
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.9/jquery.js"
              data-name="1.0.9"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.9">
                1.0.9
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.8/jquery.js"
              data-name="1.0.8"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.8">
                1.0.8
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.7/jquery.js"
              data-name="1.0.7"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.7">
                1.0.7
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.5/jquery.js"
              data-name="1.0.5"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.5">
                1.0.5
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.4/jquery.js"
              data-name="1.0.4"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.4">
                1.0.4
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.3/jquery.js"
              data-name="1.0.3"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.3">
                1.0.3
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.2/jquery.js"
              data-name="1.0.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.2">
                1.0.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/xdan/datetimepicker/tree/1.0.1/jquery.js"
              data-name="1.0.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="1.0.1">
                1.0.1
              </span>
            </a>
        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div>

    </div>
  </div>
</div>

  <div class="btn-group right">
    <a href="/xdan/datetimepicker/find/master"
          class="js-pjax-capture-input btn btn-sm"
          data-pjax
          data-hotkey="t">
      Find file
    </a>
    <button aria-label="Copy file path to clipboard" class="js-zeroclipboard btn btn-sm zeroclipboard-button tooltipped tooltipped-s" data-copied-hint="Copied!" type="button">Copy path</button>
  </div>
  <div class="breadcrumb js-zeroclipboard-target">
    <span class="repo-root js-repo-root"><span class="js-path-segment"><a href="/xdan/datetimepicker"><span>datetimepicker</span></a></span></span><span class="separator">/</span><strong class="final-path">jquery.js</strong>
  </div>
</div>


  <div class="commit-tease">
      <span class="right">
        <a class="commit-tease-sha" href="/xdan/datetimepicker/commit/37e4d8ad8c3ff12b6d7450ddd9f195886b60148e" data-pjax>
          37e4d8a
        </a>
        <relative-time datetime="2013-11-03T10:34:48Z">Nov 3, 2013</relative-time>
      </span>
      <div>
        <img alt="@xdan" class="avatar" height="20" src="https://avatars0.githubusercontent.com/u/794318?v=3&amp;s=40" width="20" />
        <a href="/xdan" class="user-mention" rel="author">xdan</a>
          <a href="/xdan/datetimepicker/commit/37e4d8ad8c3ff12b6d7450ddd9f195886b60148e" class="message" data-pjax="true" title="Rename jquery-1.10.2.min.js to jquery.js">Rename jquery-1.10.2.min.js to jquery.js</a>
      </div>

    <div class="commit-tease-contributors">
      <button type="button" class="btn-link muted-link contributors-toggle" data-facebox="#blob_contributors_box">
        <strong>1</strong>
         contributor
      </button>
      
    </div>

    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header" data-facebox-id="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list" data-facebox-id="facebox-description">
          <li class="facebox-user-list-item">
            <img alt="@xdan" height="24" src="https://avatars2.githubusercontent.com/u/794318?v=3&amp;s=48" width="24" />
            <a href="/xdan">xdan</a>
          </li>
      </ul>
    </div>
  </div>

<div class="file">
  <div class="file-header">
  <div class="file-actions">

    <div class="btn-group">
      <a href="/xdan/datetimepicker/raw/master/jquery.js" class="btn btn-sm " id="raw-url">Raw</a>
        <a href="/xdan/datetimepicker/blame/master/jquery.js" class="btn btn-sm js-update-url-with-hash">Blame</a>
      <a href="/xdan/datetimepicker/commits/master/jquery.js" class="btn btn-sm " rel="nofollow">History</a>
    </div>

        <a class="btn-octicon tooltipped tooltipped-nw"
           href="https://windows.github.com"
           aria-label="Open this file in GitHub Desktop"
           data-ga-click="Repository, open with desktop, type:windows">
            <svg aria-hidden="true" class="octicon octicon-device-desktop" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M15 2H1c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h5.34c-.25.61-.86 1.39-2.34 2h8c-1.48-.61-2.09-1.39-2.34-2H15c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm0 9H1V3h14v8z"></path></svg>
        </a>

        <button type="button" class="btn-octicon disabled tooltipped tooltipped-nw"
          aria-label="You must be signed in to make or propose changes">
          <svg aria-hidden="true" class="octicon octicon-pencil" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"></path></svg>
        </button>
        <button type="button" class="btn-octicon btn-octicon-danger disabled tooltipped tooltipped-nw"
          aria-label="You must be signed in to make or propose changes">
          <svg aria-hidden="true" class="octicon octicon-trashcan" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"></path></svg>
        </button>
  </div>

  <div class="file-info">
      7 lines (6 sloc)
      <span class="file-info-divider"></span>
    90.9 KB
  </div>
</div>

  

  <div itemprop="text" class="blob-wrapper data type-javascript">
      <table class="highlight tab-size js-file-line-container" data-tab-size="8">
      <tr>
        <td id="L1" class="blob-num js-line-number" data-line-number="1"></td>
        <td id="LC1" class="blob-code blob-code-inner js-file-line">/*! jQuery v1.10.2 | (c) 2005, 2013 jQuery Foundation, Inc. | jquery.org/license</td>
      </tr>
      <tr>
        <td id="L2" class="blob-num js-line-number" data-line-number="2"></td>
        <td id="LC2" class="blob-code blob-code-inner js-file-line">//@ sourceMappingURL=jquery-1.10.2.min.map</td>
      </tr>
      <tr>
        <td id="L3" class="blob-num js-line-number" data-line-number="3"></td>
        <td id="LC3" class="blob-code blob-code-inner js-file-line">*/</td>
      </tr>
      <tr>
        <td id="L4" class="blob-num js-line-number" data-line-number="4"></td>
        <td id="LC4" class="blob-code blob-code-inner js-file-line">(function(e,t){var n,r,i=typeof t,o=e.location,a=e.document,s=a.documentElement,l=e.jQuery,u=e.$,c={},p=[],f=&quot;1.10.2&quot;,d=p.concat,h=p.push,g=p.slice,m=p.indexOf,y=c.toString,v=c.hasOwnProperty,b=f.trim,x=function(e,t){return new x.fn.init(e,t,r)},w=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,T=/\S+/g,C=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,N=/^(?:\s*(&lt;[\w\W]+&gt;)[^&gt;]*|#([\w-]*))$/,k=/^&lt;(\w+)\s*\/?&gt;(?:&lt;\/\1&gt;|)$/,E=/^[\],:{}\s]*$/,S=/(?:^|:|,)(?:\s*\[)+/g,A=/\\(?:[&quot;\\\/bfnrt]|u[\da-fA-F]{4})/g,j=/&quot;[^&quot;\\\r\n]*&quot;|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,D=/^-ms-/,L=/-([\da-z])/gi,H=function(e,t){return t.toUpperCase()},q=function(e){(a.addEventListener||&quot;load&quot;===e.type||&quot;complete&quot;===a.readyState)&amp;&amp;(_(),x.ready())},_=function(){a.addEventListener?(a.removeEventListener(&quot;DOMContentLoaded&quot;,q,!1),e.removeEventListener(&quot;load&quot;,q,!1)):(a.detachEvent(&quot;onreadystatechange&quot;,q),e.detachEvent(&quot;onload&quot;,q))};x.fn=x.prototype={jquery:f,constructor:x,init:function(e,n,r){var i,o;if(!e)return this;if(&quot;string&quot;==typeof e){if(i=&quot;&lt;&quot;===e.charAt(0)&amp;&amp;&quot;&gt;&quot;===e.charAt(e.length-1)&amp;&amp;e.length&gt;=3?[null,e,null]:N.exec(e),!i||!i[1]&amp;&amp;n)return!n||n.jquery?(n||r).find(e):this.constructor(n).find(e);if(i[1]){if(n=n instanceof x?n[0]:n,x.merge(this,x.parseHTML(i[1],n&amp;&amp;n.nodeType?n.ownerDocument||n:a,!0)),k.test(i[1])&amp;&amp;x.isPlainObject(n))for(i in n)x.isFunction(this[i])?this[i](n[i]):this.attr(i,n[i]);return this}if(o=a.getElementById(i[2]),o&amp;&amp;o.parentNode){if(o.id!==i[2])return r.find(e);this.length=1,this[0]=o}return this.context=a,this.selector=e,this}return e.nodeType?(this.context=this[0]=e,this.length=1,this):x.isFunction(e)?r.ready(e):(e.selector!==t&amp;&amp;(this.selector=e.selector,this.context=e.context),x.makeArray(e,this))},selector:&quot;&quot;,length:0,toArray:function(){return g.call(this)},get:function(e){return null==e?this.toArray():0&gt;e?this[this.length+e]:this[e]},pushStack:function(e){var t=x.merge(this.constructor(),e);return t.prevObject=this,t.context=this.context,t},each:function(e,t){return x.each(this,e,t)},ready:function(e){return x.ready.promise().done(e),this},slice:function(){return this.pushStack(g.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(e){var t=this.length,n=+e+(0&gt;e?t:0);return this.pushStack(n&gt;=0&amp;&amp;t&gt;n?[this[n]]:[])},map:function(e){return this.pushStack(x.map(this,function(t,n){return e.call(t,n,t)}))},end:function(){return this.prevObject||this.constructor(null)},push:h,sort:[].sort,splice:[].splice},x.fn.init.prototype=x.fn,x.extend=x.fn.extend=function(){var e,n,r,i,o,a,s=arguments[0]||{},l=1,u=arguments.length,c=!1;for(&quot;boolean&quot;==typeof s&amp;&amp;(c=s,s=arguments[1]||{},l=2),&quot;object&quot;==typeof s||x.isFunction(s)||(s={}),u===l&amp;&amp;(s=this,--l);u&gt;l;l++)if(null!=(o=arguments[l]))for(i in o)e=s[i],r=o[i],s!==r&amp;&amp;(c&amp;&amp;r&amp;&amp;(x.isPlainObject(r)||(n=x.isArray(r)))?(n?(n=!1,a=e&amp;&amp;x.isArray(e)?e:[]):a=e&amp;&amp;x.isPlainObject(e)?e:{},s[i]=x.extend(c,a,r)):r!==t&amp;&amp;(s[i]=r));return s},x.extend({expando:&quot;jQuery&quot;+(f+Math.random()).replace(/\D/g,&quot;&quot;),noConflict:function(t){return e.$===x&amp;&amp;(e.$=u),t&amp;&amp;e.jQuery===x&amp;&amp;(e.jQuery=l),x},isReady:!1,readyWait:1,holdReady:function(e){e?x.readyWait++:x.ready(!0)},ready:function(e){if(e===!0?!--x.readyWait:!x.isReady){if(!a.body)return setTimeout(x.ready);x.isReady=!0,e!==!0&amp;&amp;--x.readyWait&gt;0||(n.resolveWith(a,[x]),x.fn.trigger&amp;&amp;x(a).trigger(&quot;ready&quot;).off(&quot;ready&quot;))}},isFunction:function(e){return&quot;function&quot;===x.type(e)},isArray:Array.isArray||function(e){return&quot;array&quot;===x.type(e)},isWindow:function(e){return null!=e&amp;&amp;e==e.window},isNumeric:function(e){return!isNaN(parseFloat(e))&amp;&amp;isFinite(e)},type:function(e){return null==e?e+&quot;&quot;:&quot;object&quot;==typeof e||&quot;function&quot;==typeof e?c[y.call(e)]||&quot;object&quot;:typeof e},isPlainObject:function(e){var n;if(!e||&quot;object&quot;!==x.type(e)||e.nodeType||x.isWindow(e))return!1;try{if(e.constructor&amp;&amp;!v.call(e,&quot;constructor&quot;)&amp;&amp;!v.call(e.constructor.prototype,&quot;isPrototypeOf&quot;))return!1}catch(r){return!1}if(x.support.ownLast)for(n in e)return v.call(e,n);for(n in e);return n===t||v.call(e,n)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},error:function(e){throw Error(e)},parseHTML:function(e,t,n){if(!e||&quot;string&quot;!=typeof e)return null;&quot;boolean&quot;==typeof t&amp;&amp;(n=t,t=!1),t=t||a;var r=k.exec(e),i=!n&amp;&amp;[];return r?[t.createElement(r[1])]:(r=x.buildFragment([e],t,i),i&amp;&amp;x(i).remove(),x.merge([],r.childNodes))},parseJSON:function(n){return e.JSON&amp;&amp;e.JSON.parse?e.JSON.parse(n):null===n?n:&quot;string&quot;==typeof n&amp;&amp;(n=x.trim(n),n&amp;&amp;E.test(n.replace(A,&quot;@&quot;).replace(j,&quot;]&quot;).replace(S,&quot;&quot;)))?Function(&quot;return &quot;+n)():(x.error(&quot;Invalid JSON: &quot;+n),t)},parseXML:function(n){var r,i;if(!n||&quot;string&quot;!=typeof n)return null;try{e.DOMParser?(i=new DOMParser,r=i.parseFromString(n,&quot;text/xml&quot;)):(r=new ActiveXObject(&quot;Microsoft.XMLDOM&quot;),r.async=&quot;false&quot;,r.loadXML(n))}catch(o){r=t}return r&amp;&amp;r.documentElement&amp;&amp;!r.getElementsByTagName(&quot;parsererror&quot;).length||x.error(&quot;Invalid XML: &quot;+n),r},noop:function(){},globalEval:function(t){t&amp;&amp;x.trim(t)&amp;&amp;(e.execScript||function(t){e.eval.call(e,t)})(t)},camelCase:function(e){return e.replace(D,&quot;ms-&quot;).replace(L,H)},nodeName:function(e,t){return e.nodeName&amp;&amp;e.nodeName.toLowerCase()===t.toLowerCase()},each:function(e,t,n){var r,i=0,o=e.length,a=M(e);if(n){if(a){for(;o&gt;i;i++)if(r=t.apply(e[i],n),r===!1)break}else for(i in e)if(r=t.apply(e[i],n),r===!1)break}else if(a){for(;o&gt;i;i++)if(r=t.call(e[i],i,e[i]),r===!1)break}else for(i in e)if(r=t.call(e[i],i,e[i]),r===!1)break;return e},trim:b&amp;&amp;!b.call(&quot;\ufeff\u00a0&quot;)?function(e){return null==e?&quot;&quot;:b.call(e)}:function(e){return null==e?&quot;&quot;:(e+&quot;&quot;).replace(C,&quot;&quot;)},makeArray:function(e,t){var n=t||[];return null!=e&amp;&amp;(M(Object(e))?x.merge(n,&quot;string&quot;==typeof e?[e]:e):h.call(n,e)),n},inArray:function(e,t,n){var r;if(t){if(m)return m.call(t,e,n);for(r=t.length,n=n?0&gt;n?Math.max(0,r+n):n:0;r&gt;n;n++)if(n in t&amp;&amp;t[n]===e)return n}return-1},merge:function(e,n){var r=n.length,i=e.length,o=0;if(&quot;number&quot;==typeof r)for(;r&gt;o;o++)e[i++]=n[o];else while(n[o]!==t)e[i++]=n[o++];return e.length=i,e},grep:function(e,t,n){var r,i=[],o=0,a=e.length;for(n=!!n;a&gt;o;o++)r=!!t(e[o],o),n!==r&amp;&amp;i.push(e[o]);return i},map:function(e,t,n){var r,i=0,o=e.length,a=M(e),s=[];if(a)for(;o&gt;i;i++)r=t(e[i],i,n),null!=r&amp;&amp;(s[s.length]=r);else for(i in e)r=t(e[i],i,n),null!=r&amp;&amp;(s[s.length]=r);return d.apply([],s)},guid:1,proxy:function(e,n){var r,i,o;return&quot;string&quot;==typeof n&amp;&amp;(o=e[n],n=e,e=o),x.isFunction(e)?(r=g.call(arguments,2),i=function(){return e.apply(n||this,r.concat(g.call(arguments)))},i.guid=e.guid=e.guid||x.guid++,i):t},access:function(e,n,r,i,o,a,s){var l=0,u=e.length,c=null==r;if(&quot;object&quot;===x.type(r)){o=!0;for(l in r)x.access(e,n,l,r[l],!0,a,s)}else if(i!==t&amp;&amp;(o=!0,x.isFunction(i)||(s=!0),c&amp;&amp;(s?(n.call(e,i),n=null):(c=n,n=function(e,t,n){return c.call(x(e),n)})),n))for(;u&gt;l;l++)n(e[l],r,s?i:i.call(e[l],l,n(e[l],r)));return o?e:c?n.call(e):u?n(e[0],r):a},now:function(){return(new Date).getTime()},swap:function(e,t,n,r){var i,o,a={};for(o in t)a[o]=e.style[o],e.style[o]=t[o];i=n.apply(e,r||[]);for(o in t)e.style[o]=a[o];return i}}),x.ready.promise=function(t){if(!n)if(n=x.Deferred(),&quot;complete&quot;===a.readyState)setTimeout(x.ready);else if(a.addEventListener)a.addEventListener(&quot;DOMContentLoaded&quot;,q,!1),e.addEventListener(&quot;load&quot;,q,!1);else{a.attachEvent(&quot;onreadystatechange&quot;,q),e.attachEvent(&quot;onload&quot;,q);var r=!1;try{r=null==e.frameElement&amp;&amp;a.documentElement}catch(i){}r&amp;&amp;r.doScroll&amp;&amp;function o(){if(!x.isReady){try{r.doScroll(&quot;left&quot;)}catch(e){return setTimeout(o,50)}_(),x.ready()}}()}return n.promise(t)},x.each(&quot;Boolean Number String Function Array Date RegExp Object Error&quot;.split(&quot; &quot;),function(e,t){c[&quot;[object &quot;+t+&quot;]&quot;]=t.toLowerCase()});function M(e){var t=e.length,n=x.type(e);return x.isWindow(e)?!1:1===e.nodeType&amp;&amp;t?!0:&quot;array&quot;===n||&quot;function&quot;!==n&amp;&amp;(0===t||&quot;number&quot;==typeof t&amp;&amp;t&gt;0&amp;&amp;t-1 in e)}r=x(a),function(e,t){var n,r,i,o,a,s,l,u,c,p,f,d,h,g,m,y,v,b=&quot;sizzle&quot;+-new Date,w=e.document,T=0,C=0,N=st(),k=st(),E=st(),S=!1,A=function(e,t){return e===t?(S=!0,0):0},j=typeof t,D=1&lt;&lt;31,L={}.hasOwnProperty,H=[],q=H.pop,_=H.push,M=H.push,O=H.slice,F=H.indexOf||function(e){var t=0,n=this.length;for(;n&gt;t;t++)if(this[t]===e)return t;return-1},B=&quot;checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped&quot;,P=&quot;[\\x20\\t\\r\\n\\f]&quot;,R=&quot;(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+&quot;,W=R.replace(&quot;w&quot;,&quot;w#&quot;),$=&quot;\\[&quot;+P+&quot;*(&quot;+R+&quot;)&quot;+P+&quot;*(?:([*^$|!~]?=)&quot;+P+&quot;*(?:([&#39;\&quot;])((?:\\\\.|[^\\\\])*?)\\3|(&quot;+W+&quot;)|)|)&quot;+P+&quot;*\\]&quot;,I=&quot;:(&quot;+R+&quot;)(?:\\((([&#39;\&quot;])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|&quot;+$.replace(3,8)+&quot;)*)|.*)\\)|)&quot;,z=RegExp(&quot;^&quot;+P+&quot;+|((?:^|[^\\\\])(?:\\\\.)*)&quot;+P+&quot;+$&quot;,&quot;g&quot;),X=RegExp(&quot;^&quot;+P+&quot;*,&quot;+P+&quot;*&quot;),U=RegExp(&quot;^&quot;+P+&quot;*([&gt;+~]|&quot;+P+&quot;)&quot;+P+&quot;*&quot;),V=RegExp(P+&quot;*[+~]&quot;),Y=RegExp(&quot;=&quot;+P+&quot;*([^\\]&#39;\&quot;]*)&quot;+P+&quot;*\\]&quot;,&quot;g&quot;),J=RegExp(I),G=RegExp(&quot;^&quot;+W+&quot;$&quot;),Q={ID:RegExp(&quot;^#(&quot;+R+&quot;)&quot;),CLASS:RegExp(&quot;^\\.(&quot;+R+&quot;)&quot;),TAG:RegExp(&quot;^(&quot;+R.replace(&quot;w&quot;,&quot;w*&quot;)+&quot;)&quot;),ATTR:RegExp(&quot;^&quot;+$),PSEUDO:RegExp(&quot;^&quot;+I),CHILD:RegExp(&quot;^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(&quot;+P+&quot;*(even|odd|(([+-]|)(\\d*)n|)&quot;+P+&quot;*(?:([+-]|)&quot;+P+&quot;*(\\d+)|))&quot;+P+&quot;*\\)|)&quot;,&quot;i&quot;),bool:RegExp(&quot;^(?:&quot;+B+&quot;)$&quot;,&quot;i&quot;),needsContext:RegExp(&quot;^&quot;+P+&quot;*[&gt;+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(&quot;+P+&quot;*((?:-\\d)?\\d*)&quot;+P+&quot;*\\)|)(?=[^-]|$)&quot;,&quot;i&quot;)},K=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,et=/^(?:input|select|textarea|button)$/i,tt=/^h\d$/i,nt=/&#39;|\\/g,rt=RegExp(&quot;\\\\([\\da-f]{1,6}&quot;+P+&quot;?|(&quot;+P+&quot;)|.)&quot;,&quot;ig&quot;),it=function(e,t,n){var r=&quot;0x&quot;+t-65536;return r!==r||n?t:0&gt;r?String.fromCharCode(r+65536):String.fromCharCode(55296|r&gt;&gt;10,56320|1023&amp;r)};try{M.apply(H=O.call(w.childNodes),w.childNodes),H[w.childNodes.length].nodeType}catch(ot){M={apply:H.length?function(e,t){_.apply(e,O.call(t))}:function(e,t){var n=e.length,r=0;while(e[n++]=t[r++]);e.length=n-1}}}function at(e,t,n,i){var o,a,s,l,u,c,d,m,y,x;if((t?t.ownerDocument||t:w)!==f&amp;&amp;p(t),t=t||f,n=n||[],!e||&quot;string&quot;!=typeof e)return n;if(1!==(l=t.nodeType)&amp;&amp;9!==l)return[];if(h&amp;&amp;!i){if(o=Z.exec(e))if(s=o[1]){if(9===l){if(a=t.getElementById(s),!a||!a.parentNode)return n;if(a.id===s)return n.push(a),n}else if(t.ownerDocument&amp;&amp;(a=t.ownerDocument.getElementById(s))&amp;&amp;v(t,a)&amp;&amp;a.id===s)return n.push(a),n}else{if(o[2])return M.apply(n,t.getElementsByTagName(e)),n;if((s=o[3])&amp;&amp;r.getElementsByClassName&amp;&amp;t.getElementsByClassName)return M.apply(n,t.getElementsByClassName(s)),n}if(r.qsa&amp;&amp;(!g||!g.test(e))){if(m=d=b,y=t,x=9===l&amp;&amp;e,1===l&amp;&amp;&quot;object&quot;!==t.nodeName.toLowerCase()){c=mt(e),(d=t.getAttribute(&quot;id&quot;))?m=d.replace(nt,&quot;\\$&amp;&quot;):t.setAttribute(&quot;id&quot;,m),m=&quot;[id=&#39;&quot;+m+&quot;&#39;] &quot;,u=c.length;while(u--)c[u]=m+yt(c[u]);y=V.test(e)&amp;&amp;t.parentNode||t,x=c.join(&quot;,&quot;)}if(x)try{return M.apply(n,y.querySelectorAll(x)),n}catch(T){}finally{d||t.removeAttribute(&quot;id&quot;)}}}return kt(e.replace(z,&quot;$1&quot;),t,n,i)}function st(){var e=[];function t(n,r){return e.push(n+=&quot; &quot;)&gt;o.cacheLength&amp;&amp;delete t[e.shift()],t[n]=r}return t}function lt(e){return e[b]=!0,e}function ut(e){var t=f.createElement(&quot;div&quot;);try{return!!e(t)}catch(n){return!1}finally{t.parentNode&amp;&amp;t.parentNode.removeChild(t),t=null}}function ct(e,t){var n=e.split(&quot;|&quot;),r=e.length;while(r--)o.attrHandle[n[r]]=t}function pt(e,t){var n=t&amp;&amp;e,r=n&amp;&amp;1===e.nodeType&amp;&amp;1===t.nodeType&amp;&amp;(~t.sourceIndex||D)-(~e.sourceIndex||D);if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function ft(e){return function(t){var n=t.nodeName.toLowerCase();return&quot;input&quot;===n&amp;&amp;t.type===e}}function dt(e){return function(t){var n=t.nodeName.toLowerCase();return(&quot;input&quot;===n||&quot;button&quot;===n)&amp;&amp;t.type===e}}function ht(e){return lt(function(t){return t=+t,lt(function(n,r){var i,o=e([],n.length,t),a=o.length;while(a--)n[i=o[a]]&amp;&amp;(n[i]=!(r[i]=n[i]))})})}s=at.isXML=function(e){var t=e&amp;&amp;(e.ownerDocument||e).documentElement;return t?&quot;HTML&quot;!==t.nodeName:!1},r=at.support={},p=at.setDocument=function(e){var n=e?e.ownerDocument||e:w,i=n.defaultView;return n!==f&amp;&amp;9===n.nodeType&amp;&amp;n.documentElement?(f=n,d=n.documentElement,h=!s(n),i&amp;&amp;i.attachEvent&amp;&amp;i!==i.top&amp;&amp;i.attachEvent(&quot;onbeforeunload&quot;,function(){p()}),r.attributes=ut(function(e){return e.className=&quot;i&quot;,!e.getAttribute(&quot;className&quot;)}),r.getElementsByTagName=ut(function(e){return e.appendChild(n.createComment(&quot;&quot;)),!e.getElementsByTagName(&quot;*&quot;).length}),r.getElementsByClassName=ut(function(e){return e.innerHTML=&quot;&lt;div class=&#39;a&#39;&gt;&lt;/div&gt;&lt;div class=&#39;a i&#39;&gt;&lt;/div&gt;&quot;,e.firstChild.className=&quot;i&quot;,2===e.getElementsByClassName(&quot;i&quot;).length}),r.getById=ut(function(e){return d.appendChild(e).id=b,!n.getElementsByName||!n.getElementsByName(b).length}),r.getById?(o.find.ID=function(e,t){if(typeof t.getElementById!==j&amp;&amp;h){var n=t.getElementById(e);return n&amp;&amp;n.parentNode?[n]:[]}},o.filter.ID=function(e){var t=e.replace(rt,it);return function(e){return e.getAttribute(&quot;id&quot;)===t}}):(delete o.find.ID,o.filter.ID=function(e){var t=e.replace(rt,it);return function(e){var n=typeof e.getAttributeNode!==j&amp;&amp;e.getAttributeNode(&quot;id&quot;);return n&amp;&amp;n.value===t}}),o.find.TAG=r.getElementsByTagName?function(e,n){return typeof n.getElementsByTagName!==j?n.getElementsByTagName(e):t}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if(&quot;*&quot;===e){while(n=o[i++])1===n.nodeType&amp;&amp;r.push(n);return r}return o},o.find.CLASS=r.getElementsByClassName&amp;&amp;function(e,n){return typeof n.getElementsByClassName!==j&amp;&amp;h?n.getElementsByClassName(e):t},m=[],g=[],(r.qsa=K.test(n.querySelectorAll))&amp;&amp;(ut(function(e){e.innerHTML=&quot;&lt;select&gt;&lt;option selected=&#39;&#39;&gt;&lt;/option&gt;&lt;/select&gt;&quot;,e.querySelectorAll(&quot;[selected]&quot;).length||g.push(&quot;\\[&quot;+P+&quot;*(?:value|&quot;+B+&quot;)&quot;),e.querySelectorAll(&quot;:checked&quot;).length||g.push(&quot;:checked&quot;)}),ut(function(e){var t=n.createElement(&quot;input&quot;);t.setAttribute(&quot;type&quot;,&quot;hidden&quot;),e.appendChild(t).setAttribute(&quot;t&quot;,&quot;&quot;),e.querySelectorAll(&quot;[t^=&#39;&#39;]&quot;).length&amp;&amp;g.push(&quot;[*^$]=&quot;+P+&quot;*(?:&#39;&#39;|\&quot;\&quot;)&quot;),e.querySelectorAll(&quot;:enabled&quot;).length||g.push(&quot;:enabled&quot;,&quot;:disabled&quot;),e.querySelectorAll(&quot;*,:x&quot;),g.push(&quot;,.*:&quot;)})),(r.matchesSelector=K.test(y=d.webkitMatchesSelector||d.mozMatchesSelector||d.oMatchesSelector||d.msMatchesSelector))&amp;&amp;ut(function(e){r.disconnectedMatch=y.call(e,&quot;div&quot;),y.call(e,&quot;[s!=&#39;&#39;]:x&quot;),m.push(&quot;!=&quot;,I)}),g=g.length&amp;&amp;RegExp(g.join(&quot;|&quot;)),m=m.length&amp;&amp;RegExp(m.join(&quot;|&quot;)),v=K.test(d.contains)||d.compareDocumentPosition?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&amp;&amp;t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&amp;&amp;16&amp;e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},A=d.compareDocumentPosition?function(e,t){if(e===t)return S=!0,0;var i=t.compareDocumentPosition&amp;&amp;e.compareDocumentPosition&amp;&amp;e.compareDocumentPosition(t);return i?1&amp;i||!r.sortDetached&amp;&amp;t.compareDocumentPosition(e)===i?e===n||v(w,e)?-1:t===n||v(w,t)?1:c?F.call(c,e)-F.call(c,t):0:4&amp;i?-1:1:e.compareDocumentPosition?-1:1}:function(e,t){var r,i=0,o=e.parentNode,a=t.parentNode,s=[e],l=[t];if(e===t)return S=!0,0;if(!o||!a)return e===n?-1:t===n?1:o?-1:a?1:c?F.call(c,e)-F.call(c,t):0;if(o===a)return pt(e,t);r=e;while(r=r.parentNode)s.unshift(r);r=t;while(r=r.parentNode)l.unshift(r);while(s[i]===l[i])i++;return i?pt(s[i],l[i]):s[i]===w?-1:l[i]===w?1:0},n):f},at.matches=function(e,t){return at(e,null,null,t)},at.matchesSelector=function(e,t){if((e.ownerDocument||e)!==f&amp;&amp;p(e),t=t.replace(Y,&quot;=&#39;$1&#39;]&quot;),!(!r.matchesSelector||!h||m&amp;&amp;m.test(t)||g&amp;&amp;g.test(t)))try{var n=y.call(e,t);if(n||r.disconnectedMatch||e.document&amp;&amp;11!==e.document.nodeType)return n}catch(i){}return at(t,f,null,[e]).length&gt;0},at.contains=function(e,t){return(e.ownerDocument||e)!==f&amp;&amp;p(e),v(e,t)},at.attr=function(e,n){(e.ownerDocument||e)!==f&amp;&amp;p(e);var i=o.attrHandle[n.toLowerCase()],a=i&amp;&amp;L.call(o.attrHandle,n.toLowerCase())?i(e,n,!h):t;return a===t?r.attributes||!h?e.getAttribute(n):(a=e.getAttributeNode(n))&amp;&amp;a.specified?a.value:null:a},at.error=function(e){throw Error(&quot;Syntax error, unrecognized expression: &quot;+e)},at.uniqueSort=function(e){var t,n=[],i=0,o=0;if(S=!r.detectDuplicates,c=!r.sortStable&amp;&amp;e.slice(0),e.sort(A),S){while(t=e[o++])t===e[o]&amp;&amp;(i=n.push(o));while(i--)e.splice(n[i],1)}return e},a=at.getText=function(e){var t,n=&quot;&quot;,r=0,i=e.nodeType;if(i){if(1===i||9===i||11===i){if(&quot;string&quot;==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=a(e)}else if(3===i||4===i)return e.nodeValue}else for(;t=e[r];r++)n+=a(t);return n},o=at.selectors={cacheLength:50,createPseudo:lt,match:Q,attrHandle:{},find:{},relative:{&quot;&gt;&quot;:{dir:&quot;parentNode&quot;,first:!0},&quot; &quot;:{dir:&quot;parentNode&quot;},&quot;+&quot;:{dir:&quot;previousSibling&quot;,first:!0},&quot;~&quot;:{dir:&quot;previousSibling&quot;}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(rt,it),e[3]=(e[4]||e[5]||&quot;&quot;).replace(rt,it),&quot;~=&quot;===e[2]&amp;&amp;(e[3]=&quot; &quot;+e[3]+&quot; &quot;),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),&quot;nth&quot;===e[1].slice(0,3)?(e[3]||at.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*(&quot;even&quot;===e[3]||&quot;odd&quot;===e[3])),e[5]=+(e[7]+e[8]||&quot;odd&quot;===e[3])):e[3]&amp;&amp;at.error(e[0]),e},PSEUDO:function(e){var n,r=!e[5]&amp;&amp;e[2];return Q.CHILD.test(e[0])?null:(e[3]&amp;&amp;e[4]!==t?e[2]=e[4]:r&amp;&amp;J.test(r)&amp;&amp;(n=mt(r,!0))&amp;&amp;(n=r.indexOf(&quot;)&quot;,r.length-n)-r.length)&amp;&amp;(e[0]=e[0].slice(0,n),e[2]=r.slice(0,n)),e.slice(0,3))}},filter:{TAG:function(e){var t=e.replace(rt,it).toLowerCase();return&quot;*&quot;===e?function(){return!0}:function(e){return e.nodeName&amp;&amp;e.nodeName.toLowerCase()===t}},CLASS:function(e){var t=N[e+&quot; &quot;];return t||(t=RegExp(&quot;(^|&quot;+P+&quot;)&quot;+e+&quot;(&quot;+P+&quot;|$)&quot;))&amp;&amp;N(e,function(e){return t.test(&quot;string&quot;==typeof e.className&amp;&amp;e.className||typeof e.getAttribute!==j&amp;&amp;e.getAttribute(&quot;class&quot;)||&quot;&quot;)})},ATTR:function(e,t,n){return function(r){var i=at.attr(r,e);return null==i?&quot;!=&quot;===t:t?(i+=&quot;&quot;,&quot;=&quot;===t?i===n:&quot;!=&quot;===t?i!==n:&quot;^=&quot;===t?n&amp;&amp;0===i.indexOf(n):&quot;*=&quot;===t?n&amp;&amp;i.indexOf(n)&gt;-1:&quot;$=&quot;===t?n&amp;&amp;i.slice(-n.length)===n:&quot;~=&quot;===t?(&quot; &quot;+i+&quot; &quot;).indexOf(n)&gt;-1:&quot;|=&quot;===t?i===n||i.slice(0,n.length+1)===n+&quot;-&quot;:!1):!0}},CHILD:function(e,t,n,r,i){var o=&quot;nth&quot;!==e.slice(0,3),a=&quot;last&quot;!==e.slice(-4),s=&quot;of-type&quot;===t;return 1===r&amp;&amp;0===i?function(e){return!!e.parentNode}:function(t,n,l){var u,c,p,f,d,h,g=o!==a?&quot;nextSibling&quot;:&quot;previousSibling&quot;,m=t.parentNode,y=s&amp;&amp;t.nodeName.toLowerCase(),v=!l&amp;&amp;!s;if(m){if(o){while(g){p=t;while(p=p[g])if(s?p.nodeName.toLowerCase()===y:1===p.nodeType)return!1;h=g=&quot;only&quot;===e&amp;&amp;!h&amp;&amp;&quot;nextSibling&quot;}return!0}if(h=[a?m.firstChild:m.lastChild],a&amp;&amp;v){c=m[b]||(m[b]={}),u=c[e]||[],d=u[0]===T&amp;&amp;u[1],f=u[0]===T&amp;&amp;u[2],p=d&amp;&amp;m.childNodes[d];while(p=++d&amp;&amp;p&amp;&amp;p[g]||(f=d=0)||h.pop())if(1===p.nodeType&amp;&amp;++f&amp;&amp;p===t){c[e]=[T,d,f];break}}else if(v&amp;&amp;(u=(t[b]||(t[b]={}))[e])&amp;&amp;u[0]===T)f=u[1];else while(p=++d&amp;&amp;p&amp;&amp;p[g]||(f=d=0)||h.pop())if((s?p.nodeName.toLowerCase()===y:1===p.nodeType)&amp;&amp;++f&amp;&amp;(v&amp;&amp;((p[b]||(p[b]={}))[e]=[T,f]),p===t))break;return f-=i,f===r||0===f%r&amp;&amp;f/r&gt;=0}}},PSEUDO:function(e,t){var n,r=o.pseudos[e]||o.setFilters[e.toLowerCase()]||at.error(&quot;unsupported pseudo: &quot;+e);return r[b]?r(t):r.length&gt;1?(n=[e,e,&quot;&quot;,t],o.setFilters.hasOwnProperty(e.toLowerCase())?lt(function(e,n){var i,o=r(e,t),a=o.length;while(a--)i=F.call(e,o[a]),e[i]=!(n[i]=o[a])}):function(e){return r(e,0,n)}):r}},pseudos:{not:lt(function(e){var t=[],n=[],r=l(e.replace(z,&quot;$1&quot;));return r[b]?lt(function(e,t,n,i){var o,a=r(e,null,i,[]),s=e.length;while(s--)(o=a[s])&amp;&amp;(e[s]=!(t[s]=o))}):function(e,i,o){return t[0]=e,r(t,null,o,n),!n.pop()}}),has:lt(function(e){return function(t){return at(e,t).length&gt;0}}),contains:lt(function(e){return function(t){return(t.textContent||t.innerText||a(t)).indexOf(e)&gt;-1}}),lang:lt(function(e){return G.test(e||&quot;&quot;)||at.error(&quot;unsupported lang: &quot;+e),e=e.replace(rt,it).toLowerCase(),function(t){var n;do if(n=h?t.lang:t.getAttribute(&quot;xml:lang&quot;)||t.getAttribute(&quot;lang&quot;))return n=n.toLowerCase(),n===e||0===n.indexOf(e+&quot;-&quot;);while((t=t.parentNode)&amp;&amp;1===t.nodeType);return!1}}),target:function(t){var n=e.location&amp;&amp;e.location.hash;return n&amp;&amp;n.slice(1)===t.id},root:function(e){return e===d},focus:function(e){return e===f.activeElement&amp;&amp;(!f.hasFocus||f.hasFocus())&amp;&amp;!!(e.type||e.href||~e.tabIndex)},enabled:function(e){return e.disabled===!1},disabled:function(e){return e.disabled===!0},checked:function(e){var t=e.nodeName.toLowerCase();return&quot;input&quot;===t&amp;&amp;!!e.checked||&quot;option&quot;===t&amp;&amp;!!e.selected},selected:function(e){return e.parentNode&amp;&amp;e.parentNode.selectedIndex,e.selected===!0},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeName&gt;&quot;@&quot;||3===e.nodeType||4===e.nodeType)return!1;return!0},parent:function(e){return!o.pseudos.empty(e)},header:function(e){return tt.test(e.nodeName)},input:function(e){return et.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return&quot;input&quot;===t&amp;&amp;&quot;button&quot;===e.type||&quot;button&quot;===t},text:function(e){var t;return&quot;input&quot;===e.nodeName.toLowerCase()&amp;&amp;&quot;text&quot;===e.type&amp;&amp;(null==(t=e.getAttribute(&quot;type&quot;))||t.toLowerCase()===e.type)},first:ht(function(){return[0]}),last:ht(function(e,t){return[t-1]}),eq:ht(function(e,t,n){return[0&gt;n?n+t:n]}),even:ht(function(e,t){var n=0;for(;t&gt;n;n+=2)e.push(n);return e}),odd:ht(function(e,t){var n=1;for(;t&gt;n;n+=2)e.push(n);return e}),lt:ht(function(e,t,n){var r=0&gt;n?n+t:n;for(;--r&gt;=0;)e.push(r);return e}),gt:ht(function(e,t,n){var r=0&gt;n?n+t:n;for(;t&gt;++r;)e.push(r);return e})}},o.pseudos.nth=o.pseudos.eq;for(n in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})o.pseudos[n]=ft(n);for(n in{submit:!0,reset:!0})o.pseudos[n]=dt(n);function gt(){}gt.prototype=o.filters=o.pseudos,o.setFilters=new gt;function mt(e,t){var n,r,i,a,s,l,u,c=k[e+&quot; &quot;];if(c)return t?0:c.slice(0);s=e,l=[],u=o.preFilter;while(s){(!n||(r=X.exec(s)))&amp;&amp;(r&amp;&amp;(s=s.slice(r[0].length)||s),l.push(i=[])),n=!1,(r=U.exec(s))&amp;&amp;(n=r.shift(),i.push({value:n,type:r[0].replace(z,&quot; &quot;)}),s=s.slice(n.length));for(a in o.filter)!(r=Q[a].exec(s))||u[a]&amp;&amp;!(r=u[a](r))||(n=r.shift(),i.push({value:n,type:a,matches:r}),s=s.slice(n.length));if(!n)break}return t?s.length:s?at.error(e):k(e,l).slice(0)}function yt(e){var t=0,n=e.length,r=&quot;&quot;;for(;n&gt;t;t++)r+=e[t].value;return r}function vt(e,t,n){var r=t.dir,o=n&amp;&amp;&quot;parentNode&quot;===r,a=C++;return t.first?function(t,n,i){while(t=t[r])if(1===t.nodeType||o)return e(t,n,i)}:function(t,n,s){var l,u,c,p=T+&quot; &quot;+a;if(s){while(t=t[r])if((1===t.nodeType||o)&amp;&amp;e(t,n,s))return!0}else while(t=t[r])if(1===t.nodeType||o)if(c=t[b]||(t[b]={}),(u=c[r])&amp;&amp;u[0]===p){if((l=u[1])===!0||l===i)return l===!0}else if(u=c[r]=[p],u[1]=e(t,n,s)||i,u[1]===!0)return!0}}function bt(e){return e.length&gt;1?function(t,n,r){var i=e.length;while(i--)if(!e[i](t,n,r))return!1;return!0}:e[0]}function xt(e,t,n,r,i){var o,a=[],s=0,l=e.length,u=null!=t;for(;l&gt;s;s++)(o=e[s])&amp;&amp;(!n||n(o,r,i))&amp;&amp;(a.push(o),u&amp;&amp;t.push(s));return a}function wt(e,t,n,r,i,o){return r&amp;&amp;!r[b]&amp;&amp;(r=wt(r)),i&amp;&amp;!i[b]&amp;&amp;(i=wt(i,o)),lt(function(o,a,s,l){var u,c,p,f=[],d=[],h=a.length,g=o||Nt(t||&quot;*&quot;,s.nodeType?[s]:s,[]),m=!e||!o&amp;&amp;t?g:xt(g,f,e,s,l),y=n?i||(o?e:h||r)?[]:a:m;if(n&amp;&amp;n(m,y,s,l),r){u=xt(y,d),r(u,[],s,l),c=u.length;while(c--)(p=u[c])&amp;&amp;(y[d[c]]=!(m[d[c]]=p))}if(o){if(i||e){if(i){u=[],c=y.length;while(c--)(p=y[c])&amp;&amp;u.push(m[c]=p);i(null,y=[],u,l)}c=y.length;while(c--)(p=y[c])&amp;&amp;(u=i?F.call(o,p):f[c])&gt;-1&amp;&amp;(o[u]=!(a[u]=p))}}else y=xt(y===a?y.splice(h,y.length):y),i?i(null,a,y,l):M.apply(a,y)})}function Tt(e){var t,n,r,i=e.length,a=o.relative[e[0].type],s=a||o.relative[&quot; &quot;],l=a?1:0,c=vt(function(e){return e===t},s,!0),p=vt(function(e){return F.call(t,e)&gt;-1},s,!0),f=[function(e,n,r){return!a&amp;&amp;(r||n!==u)||((t=n).nodeType?c(e,n,r):p(e,n,r))}];for(;i&gt;l;l++)if(n=o.relative[e[l].type])f=[vt(bt(f),n)];else{if(n=o.filter[e[l].type].apply(null,e[l].matches),n[b]){for(r=++l;i&gt;r;r++)if(o.relative[e[r].type])break;return wt(l&gt;1&amp;&amp;bt(f),l&gt;1&amp;&amp;yt(e.slice(0,l-1).concat({value:&quot; &quot;===e[l-2].type?&quot;*&quot;:&quot;&quot;})).replace(z,&quot;$1&quot;),n,r&gt;l&amp;&amp;Tt(e.slice(l,r)),i&gt;r&amp;&amp;Tt(e=e.slice(r)),i&gt;r&amp;&amp;yt(e))}f.push(n)}return bt(f)}function Ct(e,t){var n=0,r=t.length&gt;0,a=e.length&gt;0,s=function(s,l,c,p,d){var h,g,m,y=[],v=0,b=&quot;0&quot;,x=s&amp;&amp;[],w=null!=d,C=u,N=s||a&amp;&amp;o.find.TAG(&quot;*&quot;,d&amp;&amp;l.parentNode||l),k=T+=null==C?1:Math.random()||.1;for(w&amp;&amp;(u=l!==f&amp;&amp;l,i=n);null!=(h=N[b]);b++){if(a&amp;&amp;h){g=0;while(m=e[g++])if(m(h,l,c)){p.push(h);break}w&amp;&amp;(T=k,i=++n)}r&amp;&amp;((h=!m&amp;&amp;h)&amp;&amp;v--,s&amp;&amp;x.push(h))}if(v+=b,r&amp;&amp;b!==v){g=0;while(m=t[g++])m(x,y,l,c);if(s){if(v&gt;0)while(b--)x[b]||y[b]||(y[b]=q.call(p));y=xt(y)}M.apply(p,y),w&amp;&amp;!s&amp;&amp;y.length&gt;0&amp;&amp;v+t.length&gt;1&amp;&amp;at.uniqueSort(p)}return w&amp;&amp;(T=k,u=C),x};return r?lt(s):s}l=at.compile=function(e,t){var n,r=[],i=[],o=E[e+&quot; &quot;];if(!o){t||(t=mt(e)),n=t.length;while(n--)o=Tt(t[n]),o[b]?r.push(o):i.push(o);o=E(e,Ct(i,r))}return o};function Nt(e,t,n){var r=0,i=t.length;for(;i&gt;r;r++)at(e,t[r],n);return n}function kt(e,t,n,i){var a,s,u,c,p,f=mt(e);if(!i&amp;&amp;1===f.length){if(s=f[0]=f[0].slice(0),s.length&gt;2&amp;&amp;&quot;ID&quot;===(u=s[0]).type&amp;&amp;r.getById&amp;&amp;9===t.nodeType&amp;&amp;h&amp;&amp;o.relative[s[1].type]){if(t=(o.find.ID(u.matches[0].replace(rt,it),t)||[])[0],!t)return n;e=e.slice(s.shift().value.length)}a=Q.needsContext.test(e)?0:s.length;while(a--){if(u=s[a],o.relative[c=u.type])break;if((p=o.find[c])&amp;&amp;(i=p(u.matches[0].replace(rt,it),V.test(s[0].type)&amp;&amp;t.parentNode||t))){if(s.splice(a,1),e=i.length&amp;&amp;yt(s),!e)return M.apply(n,i),n;break}}}return l(e,f)(i,t,!h,n,V.test(e)),n}r.sortStable=b.split(&quot;&quot;).sort(A).join(&quot;&quot;)===b,r.detectDuplicates=S,p(),r.sortDetached=ut(function(e){return 1&amp;e.compareDocumentPosition(f.createElement(&quot;div&quot;))}),ut(function(e){return e.innerHTML=&quot;&lt;a href=&#39;#&#39;&gt;&lt;/a&gt;&quot;,&quot;#&quot;===e.firstChild.getAttribute(&quot;href&quot;)})||ct(&quot;type|href|height|width&quot;,function(e,n,r){return r?t:e.getAttribute(n,&quot;type&quot;===n.toLowerCase()?1:2)}),r.attributes&amp;&amp;ut(function(e){return e.innerHTML=&quot;&lt;input/&gt;&quot;,e.firstChild.setAttribute(&quot;value&quot;,&quot;&quot;),&quot;&quot;===e.firstChild.getAttribute(&quot;value&quot;)})||ct(&quot;value&quot;,function(e,n,r){return r||&quot;input&quot;!==e.nodeName.toLowerCase()?t:e.defaultValue}),ut(function(e){return null==e.getAttribute(&quot;disabled&quot;)})||ct(B,function(e,n,r){var i;return r?t:(i=e.getAttributeNode(n))&amp;&amp;i.specified?i.value:e[n]===!0?n.toLowerCase():null}),x.find=at,x.expr=at.selectors,x.expr[&quot;:&quot;]=x.expr.pseudos,x.unique=at.uniqueSort,x.text=at.getText,x.isXMLDoc=at.isXML,x.contains=at.contains}(e);var O={};function F(e){var t=O[e]={};return x.each(e.match(T)||[],function(e,n){t[n]=!0}),t}x.Callbacks=function(e){e=&quot;string&quot;==typeof e?O[e]||F(e):x.extend({},e);var n,r,i,o,a,s,l=[],u=!e.once&amp;&amp;[],c=function(t){for(r=e.memory&amp;&amp;t,i=!0,a=s||0,s=0,o=l.length,n=!0;l&amp;&amp;o&gt;a;a++)if(l[a].apply(t[0],t[1])===!1&amp;&amp;e.stopOnFalse){r=!1;break}n=!1,l&amp;&amp;(u?u.length&amp;&amp;c(u.shift()):r?l=[]:p.disable())},p={add:function(){if(l){var t=l.length;(function i(t){x.each(t,function(t,n){var r=x.type(n);&quot;function&quot;===r?e.unique&amp;&amp;p.has(n)||l.push(n):n&amp;&amp;n.length&amp;&amp;&quot;string&quot;!==r&amp;&amp;i(n)})})(arguments),n?o=l.length:r&amp;&amp;(s=t,c(r))}return this},remove:function(){return l&amp;&amp;x.each(arguments,function(e,t){var r;while((r=x.inArray(t,l,r))&gt;-1)l.splice(r,1),n&amp;&amp;(o&gt;=r&amp;&amp;o--,a&gt;=r&amp;&amp;a--)}),this},has:function(e){return e?x.inArray(e,l)&gt;-1:!(!l||!l.length)},empty:function(){return l=[],o=0,this},disable:function(){return l=u=r=t,this},disabled:function(){return!l},lock:function(){return u=t,r||p.disable(),this},locked:function(){return!u},fireWith:function(e,t){return!l||i&amp;&amp;!u||(t=t||[],t=[e,t.slice?t.slice():t],n?u.push(t):c(t)),this},fire:function(){return p.fireWith(this,arguments),this},fired:function(){return!!i}};return p},x.extend({Deferred:function(e){var t=[[&quot;resolve&quot;,&quot;done&quot;,x.Callbacks(&quot;once memory&quot;),&quot;resolved&quot;],[&quot;reject&quot;,&quot;fail&quot;,x.Callbacks(&quot;once memory&quot;),&quot;rejected&quot;],[&quot;notify&quot;,&quot;progress&quot;,x.Callbacks(&quot;memory&quot;)]],n=&quot;pending&quot;,r={state:function(){return n},always:function(){return i.done(arguments).fail(arguments),this},then:function(){var e=arguments;return x.Deferred(function(n){x.each(t,function(t,o){var a=o[0],s=x.isFunction(e[t])&amp;&amp;e[t];i[o[1]](function(){var e=s&amp;&amp;s.apply(this,arguments);e&amp;&amp;x.isFunction(e.promise)?e.promise().done(n.resolve).fail(n.reject).progress(n.notify):n[a+&quot;With&quot;](this===r?n.promise():this,s?[e]:arguments)})}),e=null}).promise()},promise:function(e){return null!=e?x.extend(e,r):r}},i={};return r.pipe=r.then,x.each(t,function(e,o){var a=o[2],s=o[3];r[o[1]]=a.add,s&amp;&amp;a.add(function(){n=s},t[1^e][2].disable,t[2][2].lock),i[o[0]]=function(){return i[o[0]+&quot;With&quot;](this===i?r:this,arguments),this},i[o[0]+&quot;With&quot;]=a.fireWith}),r.promise(i),e&amp;&amp;e.call(i,i),i},when:function(e){var t=0,n=g.call(arguments),r=n.length,i=1!==r||e&amp;&amp;x.isFunction(e.promise)?r:0,o=1===i?e:x.Deferred(),a=function(e,t,n){return function(r){t[e]=this,n[e]=arguments.length&gt;1?g.call(arguments):r,n===s?o.notifyWith(t,n):--i||o.resolveWith(t,n)}},s,l,u;if(r&gt;1)for(s=Array(r),l=Array(r),u=Array(r);r&gt;t;t++)n[t]&amp;&amp;x.isFunction(n[t].promise)?n[t].promise().done(a(t,u,n)).fail(o.reject).progress(a(t,l,s)):--i;return i||o.resolveWith(u,n),o.promise()}}),x.support=function(t){var n,r,o,s,l,u,c,p,f,d=a.createElement(&quot;div&quot;);if(d.setAttribute(&quot;className&quot;,&quot;t&quot;),d.innerHTML=&quot;  &lt;link/&gt;&lt;table&gt;&lt;/table&gt;&lt;a href=&#39;/a&#39;&gt;a&lt;/a&gt;&lt;input type=&#39;checkbox&#39;/&gt;&quot;,n=d.getElementsByTagName(&quot;*&quot;)||[],r=d.getElementsByTagName(&quot;a&quot;)[0],!r||!r.style||!n.length)return t;s=a.createElement(&quot;select&quot;),u=s.appendChild(a.createElement(&quot;option&quot;)),o=d.getElementsByTagName(&quot;input&quot;)[0],r.style.cssText=&quot;top:1px;float:left;opacity:.5&quot;,t.getSetAttribute=&quot;t&quot;!==d.className,t.leadingWhitespace=3===d.firstChild.nodeType,t.tbody=!d.getElementsByTagName(&quot;tbody&quot;).length,t.htmlSerialize=!!d.getElementsByTagName(&quot;link&quot;).length,t.style=/top/.test(r.getAttribute(&quot;style&quot;)),t.hrefNormalized=&quot;/a&quot;===r.getAttribute(&quot;href&quot;),t.opacity=/^0.5/.test(r.style.opacity),t.cssFloat=!!r.style.cssFloat,t.checkOn=!!o.value,t.optSelected=u.selected,t.enctype=!!a.createElement(&quot;form&quot;).enctype,t.html5Clone=&quot;&lt;:nav&gt;&lt;/:nav&gt;&quot;!==a.createElement(&quot;nav&quot;).cloneNode(!0).outerHTML,t.inlineBlockNeedsLayout=!1,t.shrinkWrapBlocks=!1,t.pixelPosition=!1,t.deleteExpando=!0,t.noCloneEvent=!0,t.reliableMarginRight=!0,t.boxSizingReliable=!0,o.checked=!0,t.noCloneChecked=o.cloneNode(!0).checked,s.disabled=!0,t.optDisabled=!u.disabled;try{delete d.test}catch(h){t.deleteExpando=!1}o=a.createElement(&quot;input&quot;),o.setAttribute(&quot;value&quot;,&quot;&quot;),t.input=&quot;&quot;===o.getAttribute(&quot;value&quot;),o.value=&quot;t&quot;,o.setAttribute(&quot;type&quot;,&quot;radio&quot;),t.radioValue=&quot;t&quot;===o.value,o.setAttribute(&quot;checked&quot;,&quot;t&quot;),o.setAttribute(&quot;name&quot;,&quot;t&quot;),l=a.createDocumentFragment(),l.appendChild(o),t.appendChecked=o.checked,t.checkClone=l.cloneNode(!0).cloneNode(!0).lastChild.checked,d.attachEvent&amp;&amp;(d.attachEvent(&quot;onclick&quot;,function(){t.noCloneEvent=!1}),d.cloneNode(!0).click());for(f in{submit:!0,change:!0,focusin:!0})d.setAttribute(c=&quot;on&quot;+f,&quot;t&quot;),t[f+&quot;Bubbles&quot;]=c in e||d.attributes[c].expando===!1;d.style.backgroundClip=&quot;content-box&quot;,d.cloneNode(!0).style.backgroundClip=&quot;&quot;,t.clearCloneStyle=&quot;content-box&quot;===d.style.backgroundClip;for(f in x(t))break;return t.ownLast=&quot;0&quot;!==f,x(function(){var n,r,o,s=&quot;padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;&quot;,l=a.getElementsByTagName(&quot;body&quot;)[0];l&amp;&amp;(n=a.createElement(&quot;div&quot;),n.style.cssText=&quot;border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px&quot;,l.appendChild(n).appendChild(d),d.innerHTML=&quot;&lt;table&gt;&lt;tr&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;t&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;&quot;,o=d.getElementsByTagName(&quot;td&quot;),o[0].style.cssText=&quot;padding:0;margin:0;border:0;display:none&quot;,p=0===o[0].offsetHeight,o[0].style.display=&quot;&quot;,o[1].style.display=&quot;none&quot;,t.reliableHiddenOffsets=p&amp;&amp;0===o[0].offsetHeight,d.innerHTML=&quot;&quot;,d.style.cssText=&quot;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;&quot;,x.swap(l,null!=l.style.zoom?{zoom:1}:{},function(){t.boxSizing=4===d.offsetWidth}),e.getComputedStyle&amp;&amp;(t.pixelPosition=&quot;1%&quot;!==(e.getComputedStyle(d,null)||{}).top,t.boxSizingReliable=&quot;4px&quot;===(e.getComputedStyle(d,null)||{width:&quot;4px&quot;}).width,r=d.appendChild(a.createElement(&quot;div&quot;)),r.style.cssText=d.style.cssText=s,r.style.marginRight=r.style.width=&quot;0&quot;,d.style.width=&quot;1px&quot;,t.reliableMarginRight=!parseFloat((e.getComputedStyle(r,null)||{}).marginRight)),typeof d.style.zoom!==i&amp;&amp;(d.innerHTML=&quot;&quot;,d.style.cssText=s+&quot;width:1px;padding:1px;display:inline;zoom:1&quot;,t.inlineBlockNeedsLayout=3===d.offsetWidth,d.style.display=&quot;block&quot;,d.innerHTML=&quot;&lt;div&gt;&lt;/div&gt;&quot;,d.firstChild.style.width=&quot;5px&quot;,t.shrinkWrapBlocks=3!==d.offsetWidth,t.inlineBlockNeedsLayout&amp;&amp;(l.style.zoom=1)),l.removeChild(n),n=d=o=r=null)}),n=s=l=u=r=o=null,t</td>
      </tr>
      <tr>
        <td id="L5" class="blob-num js-line-number" data-line-number="5"></td>
        <td id="LC5" class="blob-code blob-code-inner js-file-line">}({});var B=/(?:\{[\s\S]*\}|\[[\s\S]*\])$/,P=/([A-Z])/g;function R(e,n,r,i){if(x.acceptData(e)){var o,a,s=x.expando,l=e.nodeType,u=l?x.cache:e,c=l?e[s]:e[s]&amp;&amp;s;if(c&amp;&amp;u[c]&amp;&amp;(i||u[c].data)||r!==t||&quot;string&quot;!=typeof n)return c||(c=l?e[s]=p.pop()||x.guid++:s),u[c]||(u[c]=l?{}:{toJSON:x.noop}),(&quot;object&quot;==typeof n||&quot;function&quot;==typeof n)&amp;&amp;(i?u[c]=x.extend(u[c],n):u[c].data=x.extend(u[c].data,n)),a=u[c],i||(a.data||(a.data={}),a=a.data),r!==t&amp;&amp;(a[x.camelCase(n)]=r),&quot;string&quot;==typeof n?(o=a[n],null==o&amp;&amp;(o=a[x.camelCase(n)])):o=a,o}}function W(e,t,n){if(x.acceptData(e)){var r,i,o=e.nodeType,a=o?x.cache:e,s=o?e[x.expando]:x.expando;if(a[s]){if(t&amp;&amp;(r=n?a[s]:a[s].data)){x.isArray(t)?t=t.concat(x.map(t,x.camelCase)):t in r?t=[t]:(t=x.camelCase(t),t=t in r?[t]:t.split(&quot; &quot;)),i=t.length;while(i--)delete r[t[i]];if(n?!I(r):!x.isEmptyObject(r))return}(n||(delete a[s].data,I(a[s])))&amp;&amp;(o?x.cleanData([e],!0):x.support.deleteExpando||a!=a.window?delete a[s]:a[s]=null)}}}x.extend({cache:{},noData:{applet:!0,embed:!0,object:&quot;clsid:D27CDB6E-AE6D-11cf-96B8-444553540000&quot;},hasData:function(e){return e=e.nodeType?x.cache[e[x.expando]]:e[x.expando],!!e&amp;&amp;!I(e)},data:function(e,t,n){return R(e,t,n)},removeData:function(e,t){return W(e,t)},_data:function(e,t,n){return R(e,t,n,!0)},_removeData:function(e,t){return W(e,t,!0)},acceptData:function(e){if(e.nodeType&amp;&amp;1!==e.nodeType&amp;&amp;9!==e.nodeType)return!1;var t=e.nodeName&amp;&amp;x.noData[e.nodeName.toLowerCase()];return!t||t!==!0&amp;&amp;e.getAttribute(&quot;classid&quot;)===t}}),x.fn.extend({data:function(e,n){var r,i,o=null,a=0,s=this[0];if(e===t){if(this.length&amp;&amp;(o=x.data(s),1===s.nodeType&amp;&amp;!x._data(s,&quot;parsedAttrs&quot;))){for(r=s.attributes;r.length&gt;a;a++)i=r[a].name,0===i.indexOf(&quot;data-&quot;)&amp;&amp;(i=x.camelCase(i.slice(5)),$(s,i,o[i]));x._data(s,&quot;parsedAttrs&quot;,!0)}return o}return&quot;object&quot;==typeof e?this.each(function(){x.data(this,e)}):arguments.length&gt;1?this.each(function(){x.data(this,e,n)}):s?$(s,e,x.data(s,e)):null},removeData:function(e){return this.each(function(){x.removeData(this,e)})}});function $(e,n,r){if(r===t&amp;&amp;1===e.nodeType){var i=&quot;data-&quot;+n.replace(P,&quot;-$1&quot;).toLowerCase();if(r=e.getAttribute(i),&quot;string&quot;==typeof r){try{r=&quot;true&quot;===r?!0:&quot;false&quot;===r?!1:&quot;null&quot;===r?null:+r+&quot;&quot;===r?+r:B.test(r)?x.parseJSON(r):r}catch(o){}x.data(e,n,r)}else r=t}return r}function I(e){var t;for(t in e)if((&quot;data&quot;!==t||!x.isEmptyObject(e[t]))&amp;&amp;&quot;toJSON&quot;!==t)return!1;return!0}x.extend({queue:function(e,n,r){var i;return e?(n=(n||&quot;fx&quot;)+&quot;queue&quot;,i=x._data(e,n),r&amp;&amp;(!i||x.isArray(r)?i=x._data(e,n,x.makeArray(r)):i.push(r)),i||[]):t},dequeue:function(e,t){t=t||&quot;fx&quot;;var n=x.queue(e,t),r=n.length,i=n.shift(),o=x._queueHooks(e,t),a=function(){x.dequeue(e,t)};&quot;inprogress&quot;===i&amp;&amp;(i=n.shift(),r--),i&amp;&amp;(&quot;fx&quot;===t&amp;&amp;n.unshift(&quot;inprogress&quot;),delete o.stop,i.call(e,a,o)),!r&amp;&amp;o&amp;&amp;o.empty.fire()},_queueHooks:function(e,t){var n=t+&quot;queueHooks&quot;;return x._data(e,n)||x._data(e,n,{empty:x.Callbacks(&quot;once memory&quot;).add(function(){x._removeData(e,t+&quot;queue&quot;),x._removeData(e,n)})})}}),x.fn.extend({queue:function(e,n){var r=2;return&quot;string&quot;!=typeof e&amp;&amp;(n=e,e=&quot;fx&quot;,r--),r&gt;arguments.length?x.queue(this[0],e):n===t?this:this.each(function(){var t=x.queue(this,e,n);x._queueHooks(this,e),&quot;fx&quot;===e&amp;&amp;&quot;inprogress&quot;!==t[0]&amp;&amp;x.dequeue(this,e)})},dequeue:function(e){return this.each(function(){x.dequeue(this,e)})},delay:function(e,t){return e=x.fx?x.fx.speeds[e]||e:e,t=t||&quot;fx&quot;,this.queue(t,function(t,n){var r=setTimeout(t,e);n.stop=function(){clearTimeout(r)}})},clearQueue:function(e){return this.queue(e||&quot;fx&quot;,[])},promise:function(e,n){var r,i=1,o=x.Deferred(),a=this,s=this.length,l=function(){--i||o.resolveWith(a,[a])};&quot;string&quot;!=typeof e&amp;&amp;(n=e,e=t),e=e||&quot;fx&quot;;while(s--)r=x._data(a[s],e+&quot;queueHooks&quot;),r&amp;&amp;r.empty&amp;&amp;(i++,r.empty.add(l));return l(),o.promise(n)}});var z,X,U=/[\t\r\n\f]/g,V=/\r/g,Y=/^(?:input|select|textarea|button|object)$/i,J=/^(?:a|area)$/i,G=/^(?:checked|selected)$/i,Q=x.support.getSetAttribute,K=x.support.input;x.fn.extend({attr:function(e,t){return x.access(this,x.attr,e,t,arguments.length&gt;1)},removeAttr:function(e){return this.each(function(){x.removeAttr(this,e)})},prop:function(e,t){return x.access(this,x.prop,e,t,arguments.length&gt;1)},removeProp:function(e){return e=x.propFix[e]||e,this.each(function(){try{this[e]=t,delete this[e]}catch(n){}})},addClass:function(e){var t,n,r,i,o,a=0,s=this.length,l=&quot;string&quot;==typeof e&amp;&amp;e;if(x.isFunction(e))return this.each(function(t){x(this).addClass(e.call(this,t,this.className))});if(l)for(t=(e||&quot;&quot;).match(T)||[];s&gt;a;a++)if(n=this[a],r=1===n.nodeType&amp;&amp;(n.className?(&quot; &quot;+n.className+&quot; &quot;).replace(U,&quot; &quot;):&quot; &quot;)){o=0;while(i=t[o++])0&gt;r.indexOf(&quot; &quot;+i+&quot; &quot;)&amp;&amp;(r+=i+&quot; &quot;);n.className=x.trim(r)}return this},removeClass:function(e){var t,n,r,i,o,a=0,s=this.length,l=0===arguments.length||&quot;string&quot;==typeof e&amp;&amp;e;if(x.isFunction(e))return this.each(function(t){x(this).removeClass(e.call(this,t,this.className))});if(l)for(t=(e||&quot;&quot;).match(T)||[];s&gt;a;a++)if(n=this[a],r=1===n.nodeType&amp;&amp;(n.className?(&quot; &quot;+n.className+&quot; &quot;).replace(U,&quot; &quot;):&quot;&quot;)){o=0;while(i=t[o++])while(r.indexOf(&quot; &quot;+i+&quot; &quot;)&gt;=0)r=r.replace(&quot; &quot;+i+&quot; &quot;,&quot; &quot;);n.className=e?x.trim(r):&quot;&quot;}return this},toggleClass:function(e,t){var n=typeof e;return&quot;boolean&quot;==typeof t&amp;&amp;&quot;string&quot;===n?t?this.addClass(e):this.removeClass(e):x.isFunction(e)?this.each(function(n){x(this).toggleClass(e.call(this,n,this.className,t),t)}):this.each(function(){if(&quot;string&quot;===n){var t,r=0,o=x(this),a=e.match(T)||[];while(t=a[r++])o.hasClass(t)?o.removeClass(t):o.addClass(t)}else(n===i||&quot;boolean&quot;===n)&amp;&amp;(this.className&amp;&amp;x._data(this,&quot;__className__&quot;,this.className),this.className=this.className||e===!1?&quot;&quot;:x._data(this,&quot;__className__&quot;)||&quot;&quot;)})},hasClass:function(e){var t=&quot; &quot;+e+&quot; &quot;,n=0,r=this.length;for(;r&gt;n;n++)if(1===this[n].nodeType&amp;&amp;(&quot; &quot;+this[n].className+&quot; &quot;).replace(U,&quot; &quot;).indexOf(t)&gt;=0)return!0;return!1},val:function(e){var n,r,i,o=this[0];{if(arguments.length)return i=x.isFunction(e),this.each(function(n){var o;1===this.nodeType&amp;&amp;(o=i?e.call(this,n,x(this).val()):e,null==o?o=&quot;&quot;:&quot;number&quot;==typeof o?o+=&quot;&quot;:x.isArray(o)&amp;&amp;(o=x.map(o,function(e){return null==e?&quot;&quot;:e+&quot;&quot;})),r=x.valHooks[this.type]||x.valHooks[this.nodeName.toLowerCase()],r&amp;&amp;&quot;set&quot;in r&amp;&amp;r.set(this,o,&quot;value&quot;)!==t||(this.value=o))});if(o)return r=x.valHooks[o.type]||x.valHooks[o.nodeName.toLowerCase()],r&amp;&amp;&quot;get&quot;in r&amp;&amp;(n=r.get(o,&quot;value&quot;))!==t?n:(n=o.value,&quot;string&quot;==typeof n?n.replace(V,&quot;&quot;):null==n?&quot;&quot;:n)}}}),x.extend({valHooks:{option:{get:function(e){var t=x.find.attr(e,&quot;value&quot;);return null!=t?t:e.text}},select:{get:function(e){var t,n,r=e.options,i=e.selectedIndex,o=&quot;select-one&quot;===e.type||0&gt;i,a=o?null:[],s=o?i+1:r.length,l=0&gt;i?s:o?i:0;for(;s&gt;l;l++)if(n=r[l],!(!n.selected&amp;&amp;l!==i||(x.support.optDisabled?n.disabled:null!==n.getAttribute(&quot;disabled&quot;))||n.parentNode.disabled&amp;&amp;x.nodeName(n.parentNode,&quot;optgroup&quot;))){if(t=x(n).val(),o)return t;a.push(t)}return a},set:function(e,t){var n,r,i=e.options,o=x.makeArray(t),a=i.length;while(a--)r=i[a],(r.selected=x.inArray(x(r).val(),o)&gt;=0)&amp;&amp;(n=!0);return n||(e.selectedIndex=-1),o}}},attr:function(e,n,r){var o,a,s=e.nodeType;if(e&amp;&amp;3!==s&amp;&amp;8!==s&amp;&amp;2!==s)return typeof e.getAttribute===i?x.prop(e,n,r):(1===s&amp;&amp;x.isXMLDoc(e)||(n=n.toLowerCase(),o=x.attrHooks[n]||(x.expr.match.bool.test(n)?X:z)),r===t?o&amp;&amp;&quot;get&quot;in o&amp;&amp;null!==(a=o.get(e,n))?a:(a=x.find.attr(e,n),null==a?t:a):null!==r?o&amp;&amp;&quot;set&quot;in o&amp;&amp;(a=o.set(e,r,n))!==t?a:(e.setAttribute(n,r+&quot;&quot;),r):(x.removeAttr(e,n),t))},removeAttr:function(e,t){var n,r,i=0,o=t&amp;&amp;t.match(T);if(o&amp;&amp;1===e.nodeType)while(n=o[i++])r=x.propFix[n]||n,x.expr.match.bool.test(n)?K&amp;&amp;Q||!G.test(n)?e[r]=!1:e[x.camelCase(&quot;default-&quot;+n)]=e[r]=!1:x.attr(e,n,&quot;&quot;),e.removeAttribute(Q?n:r)},attrHooks:{type:{set:function(e,t){if(!x.support.radioValue&amp;&amp;&quot;radio&quot;===t&amp;&amp;x.nodeName(e,&quot;input&quot;)){var n=e.value;return e.setAttribute(&quot;type&quot;,t),n&amp;&amp;(e.value=n),t}}}},propFix:{&quot;for&quot;:&quot;htmlFor&quot;,&quot;class&quot;:&quot;className&quot;},prop:function(e,n,r){var i,o,a,s=e.nodeType;if(e&amp;&amp;3!==s&amp;&amp;8!==s&amp;&amp;2!==s)return a=1!==s||!x.isXMLDoc(e),a&amp;&amp;(n=x.propFix[n]||n,o=x.propHooks[n]),r!==t?o&amp;&amp;&quot;set&quot;in o&amp;&amp;(i=o.set(e,r,n))!==t?i:e[n]=r:o&amp;&amp;&quot;get&quot;in o&amp;&amp;null!==(i=o.get(e,n))?i:e[n]},propHooks:{tabIndex:{get:function(e){var t=x.find.attr(e,&quot;tabindex&quot;);return t?parseInt(t,10):Y.test(e.nodeName)||J.test(e.nodeName)&amp;&amp;e.href?0:-1}}}}),X={set:function(e,t,n){return t===!1?x.removeAttr(e,n):K&amp;&amp;Q||!G.test(n)?e.setAttribute(!Q&amp;&amp;x.propFix[n]||n,n):e[x.camelCase(&quot;default-&quot;+n)]=e[n]=!0,n}},x.each(x.expr.match.bool.source.match(/\w+/g),function(e,n){var r=x.expr.attrHandle[n]||x.find.attr;x.expr.attrHandle[n]=K&amp;&amp;Q||!G.test(n)?function(e,n,i){var o=x.expr.attrHandle[n],a=i?t:(x.expr.attrHandle[n]=t)!=r(e,n,i)?n.toLowerCase():null;return x.expr.attrHandle[n]=o,a}:function(e,n,r){return r?t:e[x.camelCase(&quot;default-&quot;+n)]?n.toLowerCase():null}}),K&amp;&amp;Q||(x.attrHooks.value={set:function(e,n,r){return x.nodeName(e,&quot;input&quot;)?(e.defaultValue=n,t):z&amp;&amp;z.set(e,n,r)}}),Q||(z={set:function(e,n,r){var i=e.getAttributeNode(r);return i||e.setAttributeNode(i=e.ownerDocument.createAttribute(r)),i.value=n+=&quot;&quot;,&quot;value&quot;===r||n===e.getAttribute(r)?n:t}},x.expr.attrHandle.id=x.expr.attrHandle.name=x.expr.attrHandle.coords=function(e,n,r){var i;return r?t:(i=e.getAttributeNode(n))&amp;&amp;&quot;&quot;!==i.value?i.value:null},x.valHooks.button={get:function(e,n){var r=e.getAttributeNode(n);return r&amp;&amp;r.specified?r.value:t},set:z.set},x.attrHooks.contenteditable={set:function(e,t,n){z.set(e,&quot;&quot;===t?!1:t,n)}},x.each([&quot;width&quot;,&quot;height&quot;],function(e,n){x.attrHooks[n]={set:function(e,r){return&quot;&quot;===r?(e.setAttribute(n,&quot;auto&quot;),r):t}}})),x.support.hrefNormalized||x.each([&quot;href&quot;,&quot;src&quot;],function(e,t){x.propHooks[t]={get:function(e){return e.getAttribute(t,4)}}}),x.support.style||(x.attrHooks.style={get:function(e){return e.style.cssText||t},set:function(e,t){return e.style.cssText=t+&quot;&quot;}}),x.support.optSelected||(x.propHooks.selected={get:function(e){var t=e.parentNode;return t&amp;&amp;(t.selectedIndex,t.parentNode&amp;&amp;t.parentNode.selectedIndex),null}}),x.each([&quot;tabIndex&quot;,&quot;readOnly&quot;,&quot;maxLength&quot;,&quot;cellSpacing&quot;,&quot;cellPadding&quot;,&quot;rowSpan&quot;,&quot;colSpan&quot;,&quot;useMap&quot;,&quot;frameBorder&quot;,&quot;contentEditable&quot;],function(){x.propFix[this.toLowerCase()]=this}),x.support.enctype||(x.propFix.enctype=&quot;encoding&quot;),x.each([&quot;radio&quot;,&quot;checkbox&quot;],function(){x.valHooks[this]={set:function(e,n){return x.isArray(n)?e.checked=x.inArray(x(e).val(),n)&gt;=0:t}},x.support.checkOn||(x.valHooks[this].get=function(e){return null===e.getAttribute(&quot;value&quot;)?&quot;on&quot;:e.value})});var Z=/^(?:input|select|textarea)$/i,et=/^key/,tt=/^(?:mouse|contextmenu)|click/,nt=/^(?:focusinfocus|focusoutblur)$/,rt=/^([^.]*)(?:\.(.+)|)$/;function it(){return!0}function ot(){return!1}function at(){try{return a.activeElement}catch(e){}}x.event={global:{},add:function(e,n,r,o,a){var s,l,u,c,p,f,d,h,g,m,y,v=x._data(e);if(v){r.handler&amp;&amp;(c=r,r=c.handler,a=c.selector),r.guid||(r.guid=x.guid++),(l=v.events)||(l=v.events={}),(f=v.handle)||(f=v.handle=function(e){return typeof x===i||e&amp;&amp;x.event.triggered===e.type?t:x.event.dispatch.apply(f.elem,arguments)},f.elem=e),n=(n||&quot;&quot;).match(T)||[&quot;&quot;],u=n.length;while(u--)s=rt.exec(n[u])||[],g=y=s[1],m=(s[2]||&quot;&quot;).split(&quot;.&quot;).sort(),g&amp;&amp;(p=x.event.special[g]||{},g=(a?p.delegateType:p.bindType)||g,p=x.event.special[g]||{},d=x.extend({type:g,origType:y,data:o,handler:r,guid:r.guid,selector:a,needsContext:a&amp;&amp;x.expr.match.needsContext.test(a),namespace:m.join(&quot;.&quot;)},c),(h=l[g])||(h=l[g]=[],h.delegateCount=0,p.setup&amp;&amp;p.setup.call(e,o,m,f)!==!1||(e.addEventListener?e.addEventListener(g,f,!1):e.attachEvent&amp;&amp;e.attachEvent(&quot;on&quot;+g,f))),p.add&amp;&amp;(p.add.call(e,d),d.handler.guid||(d.handler.guid=r.guid)),a?h.splice(h.delegateCount++,0,d):h.push(d),x.event.global[g]=!0);e=null}},remove:function(e,t,n,r,i){var o,a,s,l,u,c,p,f,d,h,g,m=x.hasData(e)&amp;&amp;x._data(e);if(m&amp;&amp;(c=m.events)){t=(t||&quot;&quot;).match(T)||[&quot;&quot;],u=t.length;while(u--)if(s=rt.exec(t[u])||[],d=g=s[1],h=(s[2]||&quot;&quot;).split(&quot;.&quot;).sort(),d){p=x.event.special[d]||{},d=(r?p.delegateType:p.bindType)||d,f=c[d]||[],s=s[2]&amp;&amp;RegExp(&quot;(^|\\.)&quot;+h.join(&quot;\\.(?:.*\\.|)&quot;)+&quot;(\\.|$)&quot;),l=o=f.length;while(o--)a=f[o],!i&amp;&amp;g!==a.origType||n&amp;&amp;n.guid!==a.guid||s&amp;&amp;!s.test(a.namespace)||r&amp;&amp;r!==a.selector&amp;&amp;(&quot;**&quot;!==r||!a.selector)||(f.splice(o,1),a.selector&amp;&amp;f.delegateCount--,p.remove&amp;&amp;p.remove.call(e,a));l&amp;&amp;!f.length&amp;&amp;(p.teardown&amp;&amp;p.teardown.call(e,h,m.handle)!==!1||x.removeEvent(e,d,m.handle),delete c[d])}else for(d in c)x.event.remove(e,d+t[u],n,r,!0);x.isEmptyObject(c)&amp;&amp;(delete m.handle,x._removeData(e,&quot;events&quot;))}},trigger:function(n,r,i,o){var s,l,u,c,p,f,d,h=[i||a],g=v.call(n,&quot;type&quot;)?n.type:n,m=v.call(n,&quot;namespace&quot;)?n.namespace.split(&quot;.&quot;):[];if(u=f=i=i||a,3!==i.nodeType&amp;&amp;8!==i.nodeType&amp;&amp;!nt.test(g+x.event.triggered)&amp;&amp;(g.indexOf(&quot;.&quot;)&gt;=0&amp;&amp;(m=g.split(&quot;.&quot;),g=m.shift(),m.sort()),l=0&gt;g.indexOf(&quot;:&quot;)&amp;&amp;&quot;on&quot;+g,n=n[x.expando]?n:new x.Event(g,&quot;object&quot;==typeof n&amp;&amp;n),n.isTrigger=o?2:3,n.namespace=m.join(&quot;.&quot;),n.namespace_re=n.namespace?RegExp(&quot;(^|\\.)&quot;+m.join(&quot;\\.(?:.*\\.|)&quot;)+&quot;(\\.|$)&quot;):null,n.result=t,n.target||(n.target=i),r=null==r?[n]:x.makeArray(r,[n]),p=x.event.special[g]||{},o||!p.trigger||p.trigger.apply(i,r)!==!1)){if(!o&amp;&amp;!p.noBubble&amp;&amp;!x.isWindow(i)){for(c=p.delegateType||g,nt.test(c+g)||(u=u.parentNode);u;u=u.parentNode)h.push(u),f=u;f===(i.ownerDocument||a)&amp;&amp;h.push(f.defaultView||f.parentWindow||e)}d=0;while((u=h[d++])&amp;&amp;!n.isPropagationStopped())n.type=d&gt;1?c:p.bindType||g,s=(x._data(u,&quot;events&quot;)||{})[n.type]&amp;&amp;x._data(u,&quot;handle&quot;),s&amp;&amp;s.apply(u,r),s=l&amp;&amp;u[l],s&amp;&amp;x.acceptData(u)&amp;&amp;s.apply&amp;&amp;s.apply(u,r)===!1&amp;&amp;n.preventDefault();if(n.type=g,!o&amp;&amp;!n.isDefaultPrevented()&amp;&amp;(!p._default||p._default.apply(h.pop(),r)===!1)&amp;&amp;x.acceptData(i)&amp;&amp;l&amp;&amp;i[g]&amp;&amp;!x.isWindow(i)){f=i[l],f&amp;&amp;(i[l]=null),x.event.triggered=g;try{i[g]()}catch(y){}x.event.triggered=t,f&amp;&amp;(i[l]=f)}return n.result}},dispatch:function(e){e=x.event.fix(e);var n,r,i,o,a,s=[],l=g.call(arguments),u=(x._data(this,&quot;events&quot;)||{})[e.type]||[],c=x.event.special[e.type]||{};if(l[0]=e,e.delegateTarget=this,!c.preDispatch||c.preDispatch.call(this,e)!==!1){s=x.event.handlers.call(this,e,u),n=0;while((o=s[n++])&amp;&amp;!e.isPropagationStopped()){e.currentTarget=o.elem,a=0;while((i=o.handlers[a++])&amp;&amp;!e.isImmediatePropagationStopped())(!e.namespace_re||e.namespace_re.test(i.namespace))&amp;&amp;(e.handleObj=i,e.data=i.data,r=((x.event.special[i.origType]||{}).handle||i.handler).apply(o.elem,l),r!==t&amp;&amp;(e.result=r)===!1&amp;&amp;(e.preventDefault(),e.stopPropagation()))}return c.postDispatch&amp;&amp;c.postDispatch.call(this,e),e.result}},handlers:function(e,n){var r,i,o,a,s=[],l=n.delegateCount,u=e.target;if(l&amp;&amp;u.nodeType&amp;&amp;(!e.button||&quot;click&quot;!==e.type))for(;u!=this;u=u.parentNode||this)if(1===u.nodeType&amp;&amp;(u.disabled!==!0||&quot;click&quot;!==e.type)){for(o=[],a=0;l&gt;a;a++)i=n[a],r=i.selector+&quot; &quot;,o[r]===t&amp;&amp;(o[r]=i.needsContext?x(r,this).index(u)&gt;=0:x.find(r,this,null,[u]).length),o[r]&amp;&amp;o.push(i);o.length&amp;&amp;s.push({elem:u,handlers:o})}return n.length&gt;l&amp;&amp;s.push({elem:this,handlers:n.slice(l)}),s},fix:function(e){if(e[x.expando])return e;var t,n,r,i=e.type,o=e,s=this.fixHooks[i];s||(this.fixHooks[i]=s=tt.test(i)?this.mouseHooks:et.test(i)?this.keyHooks:{}),r=s.props?this.props.concat(s.props):this.props,e=new x.Event(o),t=r.length;while(t--)n=r[t],e[n]=o[n];return e.target||(e.target=o.srcElement||a),3===e.target.nodeType&amp;&amp;(e.target=e.target.parentNode),e.metaKey=!!e.metaKey,s.filter?s.filter(e,o):e},props:&quot;altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which&quot;.split(&quot; &quot;),fixHooks:{},keyHooks:{props:&quot;char charCode key keyCode&quot;.split(&quot; &quot;),filter:function(e,t){return null==e.which&amp;&amp;(e.which=null!=t.charCode?t.charCode:t.keyCode),e}},mouseHooks:{props:&quot;button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement&quot;.split(&quot; &quot;),filter:function(e,n){var r,i,o,s=n.button,l=n.fromElement;return null==e.pageX&amp;&amp;null!=n.clientX&amp;&amp;(i=e.target.ownerDocument||a,o=i.documentElement,r=i.body,e.pageX=n.clientX+(o&amp;&amp;o.scrollLeft||r&amp;&amp;r.scrollLeft||0)-(o&amp;&amp;o.clientLeft||r&amp;&amp;r.clientLeft||0),e.pageY=n.clientY+(o&amp;&amp;o.scrollTop||r&amp;&amp;r.scrollTop||0)-(o&amp;&amp;o.clientTop||r&amp;&amp;r.clientTop||0)),!e.relatedTarget&amp;&amp;l&amp;&amp;(e.relatedTarget=l===e.target?n.toElement:l),e.which||s===t||(e.which=1&amp;s?1:2&amp;s?3:4&amp;s?2:0),e}},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==at()&amp;&amp;this.focus)try{return this.focus(),!1}catch(e){}},delegateType:&quot;focusin&quot;},blur:{trigger:function(){return this===at()&amp;&amp;this.blur?(this.blur(),!1):t},delegateType:&quot;focusout&quot;},click:{trigger:function(){return x.nodeName(this,&quot;input&quot;)&amp;&amp;&quot;checkbox&quot;===this.type&amp;&amp;this.click?(this.click(),!1):t},_default:function(e){return x.nodeName(e.target,&quot;a&quot;)}},beforeunload:{postDispatch:function(e){e.result!==t&amp;&amp;(e.originalEvent.returnValue=e.result)}}},simulate:function(e,t,n,r){var i=x.extend(new x.Event,n,{type:e,isSimulated:!0,originalEvent:{}});r?x.event.trigger(i,null,t):x.event.dispatch.call(t,i),i.isDefaultPrevented()&amp;&amp;n.preventDefault()}},x.removeEvent=a.removeEventListener?function(e,t,n){e.removeEventListener&amp;&amp;e.removeEventListener(t,n,!1)}:function(e,t,n){var r=&quot;on&quot;+t;e.detachEvent&amp;&amp;(typeof e[r]===i&amp;&amp;(e[r]=null),e.detachEvent(r,n))},x.Event=function(e,n){return this instanceof x.Event?(e&amp;&amp;e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||e.returnValue===!1||e.getPreventDefault&amp;&amp;e.getPreventDefault()?it:ot):this.type=e,n&amp;&amp;x.extend(this,n),this.timeStamp=e&amp;&amp;e.timeStamp||x.now(),this[x.expando]=!0,t):new x.Event(e,n)},x.Event.prototype={isDefaultPrevented:ot,isPropagationStopped:ot,isImmediatePropagationStopped:ot,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=it,e&amp;&amp;(e.preventDefault?e.preventDefault():e.returnValue=!1)},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=it,e&amp;&amp;(e.stopPropagation&amp;&amp;e.stopPropagation(),e.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=it,this.stopPropagation()}},x.each({mouseenter:&quot;mouseover&quot;,mouseleave:&quot;mouseout&quot;},function(e,t){x.event.special[e]={delegateType:t,bindType:t,handle:function(e){var n,r=this,i=e.relatedTarget,o=e.handleObj;return(!i||i!==r&amp;&amp;!x.contains(r,i))&amp;&amp;(e.type=o.origType,n=o.handler.apply(this,arguments),e.type=t),n}}}),x.support.submitBubbles||(x.event.special.submit={setup:function(){return x.nodeName(this,&quot;form&quot;)?!1:(x.event.add(this,&quot;click._submit keypress._submit&quot;,function(e){var n=e.target,r=x.nodeName(n,&quot;input&quot;)||x.nodeName(n,&quot;button&quot;)?n.form:t;r&amp;&amp;!x._data(r,&quot;submitBubbles&quot;)&amp;&amp;(x.event.add(r,&quot;submit._submit&quot;,function(e){e._submit_bubble=!0}),x._data(r,&quot;submitBubbles&quot;,!0))}),t)},postDispatch:function(e){e._submit_bubble&amp;&amp;(delete e._submit_bubble,this.parentNode&amp;&amp;!e.isTrigger&amp;&amp;x.event.simulate(&quot;submit&quot;,this.parentNode,e,!0))},teardown:function(){return x.nodeName(this,&quot;form&quot;)?!1:(x.event.remove(this,&quot;._submit&quot;),t)}}),x.support.changeBubbles||(x.event.special.change={setup:function(){return Z.test(this.nodeName)?((&quot;checkbox&quot;===this.type||&quot;radio&quot;===this.type)&amp;&amp;(x.event.add(this,&quot;propertychange._change&quot;,function(e){&quot;checked&quot;===e.originalEvent.propertyName&amp;&amp;(this._just_changed=!0)}),x.event.add(this,&quot;click._change&quot;,function(e){this._just_changed&amp;&amp;!e.isTrigger&amp;&amp;(this._just_changed=!1),x.event.simulate(&quot;change&quot;,this,e,!0)})),!1):(x.event.add(this,&quot;beforeactivate._change&quot;,function(e){var t=e.target;Z.test(t.nodeName)&amp;&amp;!x._data(t,&quot;changeBubbles&quot;)&amp;&amp;(x.event.add(t,&quot;change._change&quot;,function(e){!this.parentNode||e.isSimulated||e.isTrigger||x.event.simulate(&quot;change&quot;,this.parentNode,e,!0)}),x._data(t,&quot;changeBubbles&quot;,!0))}),t)},handle:function(e){var n=e.target;return this!==n||e.isSimulated||e.isTrigger||&quot;radio&quot;!==n.type&amp;&amp;&quot;checkbox&quot;!==n.type?e.handleObj.handler.apply(this,arguments):t},teardown:function(){return x.event.remove(this,&quot;._change&quot;),!Z.test(this.nodeName)}}),x.support.focusinBubbles||x.each({focus:&quot;focusin&quot;,blur:&quot;focusout&quot;},function(e,t){var n=0,r=function(e){x.event.simulate(t,e.target,x.event.fix(e),!0)};x.event.special[t]={setup:function(){0===n++&amp;&amp;a.addEventListener(e,r,!0)},teardown:function(){0===--n&amp;&amp;a.removeEventListener(e,r,!0)}}}),x.fn.extend({on:function(e,n,r,i,o){var a,s;if(&quot;object&quot;==typeof e){&quot;string&quot;!=typeof n&amp;&amp;(r=r||n,n=t);for(a in e)this.on(a,n,r,e[a],o);return this}if(null==r&amp;&amp;null==i?(i=n,r=n=t):null==i&amp;&amp;(&quot;string&quot;==typeof n?(i=r,r=t):(i=r,r=n,n=t)),i===!1)i=ot;else if(!i)return this;return 1===o&amp;&amp;(s=i,i=function(e){return x().off(e),s.apply(this,arguments)},i.guid=s.guid||(s.guid=x.guid++)),this.each(function(){x.event.add(this,e,i,r,n)})},one:function(e,t,n,r){return this.on(e,t,n,r,1)},off:function(e,n,r){var i,o;if(e&amp;&amp;e.preventDefault&amp;&amp;e.handleObj)return i=e.handleObj,x(e.delegateTarget).off(i.namespace?i.origType+&quot;.&quot;+i.namespace:i.origType,i.selector,i.handler),this;if(&quot;object&quot;==typeof e){for(o in e)this.off(o,n,e[o]);return this}return(n===!1||&quot;function&quot;==typeof n)&amp;&amp;(r=n,n=t),r===!1&amp;&amp;(r=ot),this.each(function(){x.event.remove(this,e,r,n)})},trigger:function(e,t){return this.each(function(){x.event.trigger(e,t,this)})},triggerHandler:function(e,n){var r=this[0];return r?x.event.trigger(e,n,r,!0):t}});var st=/^.[^:#\[\.,]*$/,lt=/^(?:parents|prev(?:Until|All))/,ut=x.expr.match.needsContext,ct={children:!0,contents:!0,next:!0,prev:!0};x.fn.extend({find:function(e){var t,n=[],r=this,i=r.length;if(&quot;string&quot;!=typeof e)return this.pushStack(x(e).filter(function(){for(t=0;i&gt;t;t++)if(x.contains(r[t],this))return!0}));for(t=0;i&gt;t;t++)x.find(e,r[t],n);return n=this.pushStack(i&gt;1?x.unique(n):n),n.selector=this.selector?this.selector+&quot; &quot;+e:e,n},has:function(e){var t,n=x(e,this),r=n.length;return this.filter(function(){for(t=0;r&gt;t;t++)if(x.contains(this,n[t]))return!0})},not:function(e){return this.pushStack(ft(this,e||[],!0))},filter:function(e){return this.pushStack(ft(this,e||[],!1))},is:function(e){return!!ft(this,&quot;string&quot;==typeof e&amp;&amp;ut.test(e)?x(e):e||[],!1).length},closest:function(e,t){var n,r=0,i=this.length,o=[],a=ut.test(e)||&quot;string&quot;!=typeof e?x(e,t||this.context):0;for(;i&gt;r;r++)for(n=this[r];n&amp;&amp;n!==t;n=n.parentNode)if(11&gt;n.nodeType&amp;&amp;(a?a.index(n)&gt;-1:1===n.nodeType&amp;&amp;x.find.matchesSelector(n,e))){n=o.push(n);break}return this.pushStack(o.length&gt;1?x.unique(o):o)},index:function(e){return e?&quot;string&quot;==typeof e?x.inArray(this[0],x(e)):x.inArray(e.jquery?e[0]:e,this):this[0]&amp;&amp;this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){var n=&quot;string&quot;==typeof e?x(e,t):x.makeArray(e&amp;&amp;e.nodeType?[e]:e),r=x.merge(this.get(),n);return this.pushStack(x.unique(r))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}});function pt(e,t){do e=e[t];while(e&amp;&amp;1!==e.nodeType);return e}x.each({parent:function(e){var t=e.parentNode;return t&amp;&amp;11!==t.nodeType?t:null},parents:function(e){return x.dir(e,&quot;parentNode&quot;)},parentsUntil:function(e,t,n){return x.dir(e,&quot;parentNode&quot;,n)},next:function(e){return pt(e,&quot;nextSibling&quot;)},prev:function(e){return pt(e,&quot;previousSibling&quot;)},nextAll:function(e){return x.dir(e,&quot;nextSibling&quot;)},prevAll:function(e){return x.dir(e,&quot;previousSibling&quot;)},nextUntil:function(e,t,n){return x.dir(e,&quot;nextSibling&quot;,n)},prevUntil:function(e,t,n){return x.dir(e,&quot;previousSibling&quot;,n)},siblings:function(e){return x.sibling((e.parentNode||{}).firstChild,e)},children:function(e){return x.sibling(e.firstChild)},contents:function(e){return x.nodeName(e,&quot;iframe&quot;)?e.contentDocument||e.contentWindow.document:x.merge([],e.childNodes)}},function(e,t){x.fn[e]=function(n,r){var i=x.map(this,t,n);return&quot;Until&quot;!==e.slice(-5)&amp;&amp;(r=n),r&amp;&amp;&quot;string&quot;==typeof r&amp;&amp;(i=x.filter(r,i)),this.length&gt;1&amp;&amp;(ct[e]||(i=x.unique(i)),lt.test(e)&amp;&amp;(i=i.reverse())),this.pushStack(i)}}),x.extend({filter:function(e,t,n){var r=t[0];return n&amp;&amp;(e=&quot;:not(&quot;+e+&quot;)&quot;),1===t.length&amp;&amp;1===r.nodeType?x.find.matchesSelector(r,e)?[r]:[]:x.find.matches(e,x.grep(t,function(e){return 1===e.nodeType}))},dir:function(e,n,r){var i=[],o=e[n];while(o&amp;&amp;9!==o.nodeType&amp;&amp;(r===t||1!==o.nodeType||!x(o).is(r)))1===o.nodeType&amp;&amp;i.push(o),o=o[n];return i},sibling:function(e,t){var n=[];for(;e;e=e.nextSibling)1===e.nodeType&amp;&amp;e!==t&amp;&amp;n.push(e);return n}});function ft(e,t,n){if(x.isFunction(t))return x.grep(e,function(e,r){return!!t.call(e,r,e)!==n});if(t.nodeType)return x.grep(e,function(e){return e===t!==n});if(&quot;string&quot;==typeof t){if(st.test(t))return x.filter(t,e,n);t=x.filter(t,e)}return x.grep(e,function(e){return x.inArray(e,t)&gt;=0!==n})}function dt(e){var t=ht.split(&quot;|&quot;),n=e.createDocumentFragment();if(n.createElement)while(t.length)n.createElement(t.pop());return n}var ht=&quot;abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video&quot;,gt=/ jQuery\d+=&quot;(?:null|\d+)&quot;/g,mt=RegExp(&quot;&lt;(?:&quot;+ht+&quot;)[\\s/&gt;]&quot;,&quot;i&quot;),yt=/^\s+/,vt=/&lt;(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^&gt;]*)\/&gt;/gi,bt=/&lt;([\w:]+)/,xt=/&lt;tbody/i,wt=/&lt;|&amp;#?\w+;/,Tt=/&lt;(?:script|style|link)/i,Ct=/^(?:checkbox|radio)$/i,Nt=/checked\s*(?:[^=]|=\s*.checked.)/i,kt=/^$|\/(?:java|ecma)script/i,Et=/^true\/(.*)/,St=/^\s*&lt;!(?:\[CDATA\[|--)|(?:\]\]|--)&gt;\s*$/g,At={option:[1,&quot;&lt;select multiple=&#39;multiple&#39;&gt;&quot;,&quot;&lt;/select&gt;&quot;],legend:[1,&quot;&lt;fieldset&gt;&quot;,&quot;&lt;/fieldset&gt;&quot;],area:[1,&quot;&lt;map&gt;&quot;,&quot;&lt;/map&gt;&quot;],param:[1,&quot;&lt;object&gt;&quot;,&quot;&lt;/object&gt;&quot;],thead:[1,&quot;&lt;table&gt;&quot;,&quot;&lt;/table&gt;&quot;],tr:[2,&quot;&lt;table&gt;&lt;tbody&gt;&quot;,&quot;&lt;/tbody&gt;&lt;/table&gt;&quot;],col:[2,&quot;&lt;table&gt;&lt;tbody&gt;&lt;/tbody&gt;&lt;colgroup&gt;&quot;,&quot;&lt;/colgroup&gt;&lt;/table&gt;&quot;],td:[3,&quot;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&quot;,&quot;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&quot;],_default:x.support.htmlSerialize?[0,&quot;&quot;,&quot;&quot;]:[1,&quot;X&lt;div&gt;&quot;,&quot;&lt;/div&gt;&quot;]},jt=dt(a),Dt=jt.appendChild(a.createElement(&quot;div&quot;));At.optgroup=At.option,At.tbody=At.tfoot=At.colgroup=At.caption=At.thead,At.th=At.td,x.fn.extend({text:function(e){return x.access(this,function(e){return e===t?x.text(this):this.empty().append((this[0]&amp;&amp;this[0].ownerDocument||a).createTextNode(e))},null,e,arguments.length)},append:function(){return this.domManip(arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=Lt(this,e);t.appendChild(e)}})},prepend:function(){return this.domManip(arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=Lt(this,e);t.insertBefore(e,t.firstChild)}})},before:function(){return this.domManip(arguments,function(e){this.parentNode&amp;&amp;this.parentNode.insertBefore(e,this)})},after:function(){return this.domManip(arguments,function(e){this.parentNode&amp;&amp;this.parentNode.insertBefore(e,this.nextSibling)})},remove:function(e,t){var n,r=e?x.filter(e,this):this,i=0;for(;null!=(n=r[i]);i++)t||1!==n.nodeType||x.cleanData(Ft(n)),n.parentNode&amp;&amp;(t&amp;&amp;x.contains(n.ownerDocument,n)&amp;&amp;_t(Ft(n,&quot;script&quot;)),n.parentNode.removeChild(n));return this},empty:function(){var e,t=0;for(;null!=(e=this[t]);t++){1===e.nodeType&amp;&amp;x.cleanData(Ft(e,!1));while(e.firstChild)e.removeChild(e.firstChild);e.options&amp;&amp;x.nodeName(e,&quot;select&quot;)&amp;&amp;(e.options.length=0)}return this},clone:function(e,t){return e=null==e?!1:e,t=null==t?e:t,this.map(function(){return x.clone(this,e,t)})},html:function(e){return x.access(this,function(e){var n=this[0]||{},r=0,i=this.length;if(e===t)return 1===n.nodeType?n.innerHTML.replace(gt,&quot;&quot;):t;if(!(&quot;string&quot;!=typeof e||Tt.test(e)||!x.support.htmlSerialize&amp;&amp;mt.test(e)||!x.support.leadingWhitespace&amp;&amp;yt.test(e)||At[(bt.exec(e)||[&quot;&quot;,&quot;&quot;])[1].toLowerCase()])){e=e.replace(vt,&quot;&lt;$1&gt;&lt;/$2&gt;&quot;);try{for(;i&gt;r;r++)n=this[r]||{},1===n.nodeType&amp;&amp;(x.cleanData(Ft(n,!1)),n.innerHTML=e);n=0}catch(o){}}n&amp;&amp;this.empty().append(e)},null,e,arguments.length)},replaceWith:function(){var e=x.map(this,function(e){return[e.nextSibling,e.parentNode]}),t=0;return this.domManip(arguments,function(n){var r=e[t++],i=e[t++];i&amp;&amp;(r&amp;&amp;r.parentNode!==i&amp;&amp;(r=this.nextSibling),x(this).remove(),i.insertBefore(n,r))},!0),t?this:this.remove()},detach:function(e){return this.remove(e,!0)},domManip:function(e,t,n){e=d.apply([],e);var r,i,o,a,s,l,u=0,c=this.length,p=this,f=c-1,h=e[0],g=x.isFunction(h);if(g||!(1&gt;=c||&quot;string&quot;!=typeof h||x.support.checkClone)&amp;&amp;Nt.test(h))return this.each(function(r){var i=p.eq(r);g&amp;&amp;(e[0]=h.call(this,r,i.html())),i.domManip(e,t,n)});if(c&amp;&amp;(l=x.buildFragment(e,this[0].ownerDocument,!1,!n&amp;&amp;this),r=l.firstChild,1===l.childNodes.length&amp;&amp;(l=r),r)){for(a=x.map(Ft(l,&quot;script&quot;),Ht),o=a.length;c&gt;u;u++)i=l,u!==f&amp;&amp;(i=x.clone(i,!0,!0),o&amp;&amp;x.merge(a,Ft(i,&quot;script&quot;))),t.call(this[u],i,u);if(o)for(s=a[a.length-1].ownerDocument,x.map(a,qt),u=0;o&gt;u;u++)i=a[u],kt.test(i.type||&quot;&quot;)&amp;&amp;!x._data(i,&quot;globalEval&quot;)&amp;&amp;x.contains(s,i)&amp;&amp;(i.src?x._evalUrl(i.src):x.globalEval((i.text||i.textContent||i.innerHTML||&quot;&quot;).replace(St,&quot;&quot;)));l=r=null}return this}});function Lt(e,t){return x.nodeName(e,&quot;table&quot;)&amp;&amp;x.nodeName(1===t.nodeType?t:t.firstChild,&quot;tr&quot;)?e.getElementsByTagName(&quot;tbody&quot;)[0]||e.appendChild(e.ownerDocument.createElement(&quot;tbody&quot;)):e}function Ht(e){return e.type=(null!==x.find.attr(e,&quot;type&quot;))+&quot;/&quot;+e.type,e}function qt(e){var t=Et.exec(e.type);return t?e.type=t[1]:e.removeAttribute(&quot;type&quot;),e}function _t(e,t){var n,r=0;for(;null!=(n=e[r]);r++)x._data(n,&quot;globalEval&quot;,!t||x._data(t[r],&quot;globalEval&quot;))}function Mt(e,t){if(1===t.nodeType&amp;&amp;x.hasData(e)){var n,r,i,o=x._data(e),a=x._data(t,o),s=o.events;if(s){delete a.handle,a.events={};for(n in s)for(r=0,i=s[n].length;i&gt;r;r++)x.event.add(t,n,s[n][r])}a.data&amp;&amp;(a.data=x.extend({},a.data))}}function Ot(e,t){var n,r,i;if(1===t.nodeType){if(n=t.nodeName.toLowerCase(),!x.support.noCloneEvent&amp;&amp;t[x.expando]){i=x._data(t);for(r in i.events)x.removeEvent(t,r,i.handle);t.removeAttribute(x.expando)}&quot;script&quot;===n&amp;&amp;t.text!==e.text?(Ht(t).text=e.text,qt(t)):&quot;object&quot;===n?(t.parentNode&amp;&amp;(t.outerHTML=e.outerHTML),x.support.html5Clone&amp;&amp;e.innerHTML&amp;&amp;!x.trim(t.innerHTML)&amp;&amp;(t.innerHTML=e.innerHTML)):&quot;input&quot;===n&amp;&amp;Ct.test(e.type)?(t.defaultChecked=t.checked=e.checked,t.value!==e.value&amp;&amp;(t.value=e.value)):&quot;option&quot;===n?t.defaultSelected=t.selected=e.defaultSelected:(&quot;input&quot;===n||&quot;textarea&quot;===n)&amp;&amp;(t.defaultValue=e.defaultValue)}}x.each({appendTo:&quot;append&quot;,prependTo:&quot;prepend&quot;,insertBefore:&quot;before&quot;,insertAfter:&quot;after&quot;,replaceAll:&quot;replaceWith&quot;},function(e,t){x.fn[e]=function(e){var n,r=0,i=[],o=x(e),a=o.length-1;for(;a&gt;=r;r++)n=r===a?this:this.clone(!0),x(o[r])[t](n),h.apply(i,n.get());return this.pushStack(i)}});function Ft(e,n){var r,o,a=0,s=typeof e.getElementsByTagName!==i?e.getElementsByTagName(n||&quot;*&quot;):typeof e.querySelectorAll!==i?e.querySelectorAll(n||&quot;*&quot;):t;if(!s)for(s=[],r=e.childNodes||e;null!=(o=r[a]);a++)!n||x.nodeName(o,n)?s.push(o):x.merge(s,Ft(o,n));return n===t||n&amp;&amp;x.nodeName(e,n)?x.merge([e],s):s}function Bt(e){Ct.test(e.type)&amp;&amp;(e.defaultChecked=e.checked)}x.extend({clone:function(e,t,n){var r,i,o,a,s,l=x.contains(e.ownerDocument,e);if(x.support.html5Clone||x.isXMLDoc(e)||!mt.test(&quot;&lt;&quot;+e.nodeName+&quot;&gt;&quot;)?o=e.cloneNode(!0):(Dt.innerHTML=e.outerHTML,Dt.removeChild(o=Dt.firstChild)),!(x.support.noCloneEvent&amp;&amp;x.support.noCloneChecked||1!==e.nodeType&amp;&amp;11!==e.nodeType||x.isXMLDoc(e)))for(r=Ft(o),s=Ft(e),a=0;null!=(i=s[a]);++a)r[a]&amp;&amp;Ot(i,r[a]);if(t)if(n)for(s=s||Ft(e),r=r||Ft(o),a=0;null!=(i=s[a]);a++)Mt(i,r[a]);else Mt(e,o);return r=Ft(o,&quot;script&quot;),r.length&gt;0&amp;&amp;_t(r,!l&amp;&amp;Ft(e,&quot;script&quot;)),r=s=i=null,o},buildFragment:function(e,t,n,r){var i,o,a,s,l,u,c,p=e.length,f=dt(t),d=[],h=0;for(;p&gt;h;h++)if(o=e[h],o||0===o)if(&quot;object&quot;===x.type(o))x.merge(d,o.nodeType?[o]:o);else if(wt.test(o)){s=s||f.appendChild(t.createElement(&quot;div&quot;)),l=(bt.exec(o)||[&quot;&quot;,&quot;&quot;])[1].toLowerCase(),c=At[l]||At._default,s.innerHTML=c[1]+o.replace(vt,&quot;&lt;$1&gt;&lt;/$2&gt;&quot;)+c[2],i=c[0];while(i--)s=s.lastChild;if(!x.support.leadingWhitespace&amp;&amp;yt.test(o)&amp;&amp;d.push(t.createTextNode(yt.exec(o)[0])),!x.support.tbody){o=&quot;table&quot;!==l||xt.test(o)?&quot;&lt;table&gt;&quot;!==c[1]||xt.test(o)?0:s:s.firstChild,i=o&amp;&amp;o.childNodes.length;while(i--)x.nodeName(u=o.childNodes[i],&quot;tbody&quot;)&amp;&amp;!u.childNodes.length&amp;&amp;o.removeChild(u)}x.merge(d,s.childNodes),s.textContent=&quot;&quot;;while(s.firstChild)s.removeChild(s.firstChild);s=f.lastChild}else d.push(t.createTextNode(o));s&amp;&amp;f.removeChild(s),x.support.appendChecked||x.grep(Ft(d,&quot;input&quot;),Bt),h=0;while(o=d[h++])if((!r||-1===x.inArray(o,r))&amp;&amp;(a=x.contains(o.ownerDocument,o),s=Ft(f.appendChild(o),&quot;script&quot;),a&amp;&amp;_t(s),n)){i=0;while(o=s[i++])kt.test(o.type||&quot;&quot;)&amp;&amp;n.push(o)}return s=null,f},cleanData:function(e,t){var n,r,o,a,s=0,l=x.expando,u=x.cache,c=x.support.deleteExpando,f=x.event.special;for(;null!=(n=e[s]);s++)if((t||x.acceptData(n))&amp;&amp;(o=n[l],a=o&amp;&amp;u[o])){if(a.events)for(r in a.events)f[r]?x.event.remove(n,r):x.removeEvent(n,r,a.handle);</td>
      </tr>
      <tr>
        <td id="L6" class="blob-num js-line-number" data-line-number="6"></td>
        <td id="LC6" class="blob-code blob-code-inner js-file-line">u[o]&amp;&amp;(delete u[o],c?delete n[l]:typeof n.removeAttribute!==i?n.removeAttribute(l):n[l]=null,p.push(o))}},_evalUrl:function(e){return x.ajax({url:e,type:&quot;GET&quot;,dataType:&quot;script&quot;,async:!1,global:!1,&quot;throws&quot;:!0})}}),x.fn.extend({wrapAll:function(e){if(x.isFunction(e))return this.each(function(t){x(this).wrapAll(e.call(this,t))});if(this[0]){var t=x(e,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&amp;&amp;t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstChild&amp;&amp;1===e.firstChild.nodeType)e=e.firstChild;return e}).append(this)}return this},wrapInner:function(e){return x.isFunction(e)?this.each(function(t){x(this).wrapInner(e.call(this,t))}):this.each(function(){var t=x(this),n=t.contents();n.length?n.wrapAll(e):t.append(e)})},wrap:function(e){var t=x.isFunction(e);return this.each(function(n){x(this).wrapAll(t?e.call(this,n):e)})},unwrap:function(){return this.parent().each(function(){x.nodeName(this,&quot;body&quot;)||x(this).replaceWith(this.childNodes)}).end()}});var Pt,Rt,Wt,$t=/alpha\([^)]*\)/i,It=/opacity\s*=\s*([^)]*)/,zt=/^(top|right|bottom|left)$/,Xt=/^(none|table(?!-c[ea]).+)/,Ut=/^margin/,Vt=RegExp(&quot;^(&quot;+w+&quot;)(.*)$&quot;,&quot;i&quot;),Yt=RegExp(&quot;^(&quot;+w+&quot;)(?!px)[a-z%]+$&quot;,&quot;i&quot;),Jt=RegExp(&quot;^([+-])=(&quot;+w+&quot;)&quot;,&quot;i&quot;),Gt={BODY:&quot;block&quot;},Qt={position:&quot;absolute&quot;,visibility:&quot;hidden&quot;,display:&quot;block&quot;},Kt={letterSpacing:0,fontWeight:400},Zt=[&quot;Top&quot;,&quot;Right&quot;,&quot;Bottom&quot;,&quot;Left&quot;],en=[&quot;Webkit&quot;,&quot;O&quot;,&quot;Moz&quot;,&quot;ms&quot;];function tn(e,t){if(t in e)return t;var n=t.charAt(0).toUpperCase()+t.slice(1),r=t,i=en.length;while(i--)if(t=en[i]+n,t in e)return t;return r}function nn(e,t){return e=t||e,&quot;none&quot;===x.css(e,&quot;display&quot;)||!x.contains(e.ownerDocument,e)}function rn(e,t){var n,r,i,o=[],a=0,s=e.length;for(;s&gt;a;a++)r=e[a],r.style&amp;&amp;(o[a]=x._data(r,&quot;olddisplay&quot;),n=r.style.display,t?(o[a]||&quot;none&quot;!==n||(r.style.display=&quot;&quot;),&quot;&quot;===r.style.display&amp;&amp;nn(r)&amp;&amp;(o[a]=x._data(r,&quot;olddisplay&quot;,ln(r.nodeName)))):o[a]||(i=nn(r),(n&amp;&amp;&quot;none&quot;!==n||!i)&amp;&amp;x._data(r,&quot;olddisplay&quot;,i?n:x.css(r,&quot;display&quot;))));for(a=0;s&gt;a;a++)r=e[a],r.style&amp;&amp;(t&amp;&amp;&quot;none&quot;!==r.style.display&amp;&amp;&quot;&quot;!==r.style.display||(r.style.display=t?o[a]||&quot;&quot;:&quot;none&quot;));return e}x.fn.extend({css:function(e,n){return x.access(this,function(e,n,r){var i,o,a={},s=0;if(x.isArray(n)){for(o=Rt(e),i=n.length;i&gt;s;s++)a[n[s]]=x.css(e,n[s],!1,o);return a}return r!==t?x.style(e,n,r):x.css(e,n)},e,n,arguments.length&gt;1)},show:function(){return rn(this,!0)},hide:function(){return rn(this)},toggle:function(e){return&quot;boolean&quot;==typeof e?e?this.show():this.hide():this.each(function(){nn(this)?x(this).show():x(this).hide()})}}),x.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Wt(e,&quot;opacity&quot;);return&quot;&quot;===n?&quot;1&quot;:n}}}},cssNumber:{columnCount:!0,fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{&quot;float&quot;:x.support.cssFloat?&quot;cssFloat&quot;:&quot;styleFloat&quot;},style:function(e,n,r,i){if(e&amp;&amp;3!==e.nodeType&amp;&amp;8!==e.nodeType&amp;&amp;e.style){var o,a,s,l=x.camelCase(n),u=e.style;if(n=x.cssProps[l]||(x.cssProps[l]=tn(u,l)),s=x.cssHooks[n]||x.cssHooks[l],r===t)return s&amp;&amp;&quot;get&quot;in s&amp;&amp;(o=s.get(e,!1,i))!==t?o:u[n];if(a=typeof r,&quot;string&quot;===a&amp;&amp;(o=Jt.exec(r))&amp;&amp;(r=(o[1]+1)*o[2]+parseFloat(x.css(e,n)),a=&quot;number&quot;),!(null==r||&quot;number&quot;===a&amp;&amp;isNaN(r)||(&quot;number&quot;!==a||x.cssNumber[l]||(r+=&quot;px&quot;),x.support.clearCloneStyle||&quot;&quot;!==r||0!==n.indexOf(&quot;background&quot;)||(u[n]=&quot;inherit&quot;),s&amp;&amp;&quot;set&quot;in s&amp;&amp;(r=s.set(e,r,i))===t)))try{u[n]=r}catch(c){}}},css:function(e,n,r,i){var o,a,s,l=x.camelCase(n);return n=x.cssProps[l]||(x.cssProps[l]=tn(e.style,l)),s=x.cssHooks[n]||x.cssHooks[l],s&amp;&amp;&quot;get&quot;in s&amp;&amp;(a=s.get(e,!0,r)),a===t&amp;&amp;(a=Wt(e,n,i)),&quot;normal&quot;===a&amp;&amp;n in Kt&amp;&amp;(a=Kt[n]),&quot;&quot;===r||r?(o=parseFloat(a),r===!0||x.isNumeric(o)?o||0:a):a}}),e.getComputedStyle?(Rt=function(t){return e.getComputedStyle(t,null)},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),l=s?s.getPropertyValue(n)||s[n]:t,u=e.style;return s&amp;&amp;(&quot;&quot;!==l||x.contains(e.ownerDocument,e)||(l=x.style(e,n)),Yt.test(l)&amp;&amp;Ut.test(n)&amp;&amp;(i=u.width,o=u.minWidth,a=u.maxWidth,u.minWidth=u.maxWidth=u.width=l,l=s.width,u.width=i,u.minWidth=o,u.maxWidth=a)),l}):a.documentElement.currentStyle&amp;&amp;(Rt=function(e){return e.currentStyle},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),l=s?s[n]:t,u=e.style;return null==l&amp;&amp;u&amp;&amp;u[n]&amp;&amp;(l=u[n]),Yt.test(l)&amp;&amp;!zt.test(n)&amp;&amp;(i=u.left,o=e.runtimeStyle,a=o&amp;&amp;o.left,a&amp;&amp;(o.left=e.currentStyle.left),u.left=&quot;fontSize&quot;===n?&quot;1em&quot;:l,l=u.pixelLeft+&quot;px&quot;,u.left=i,a&amp;&amp;(o.left=a)),&quot;&quot;===l?&quot;auto&quot;:l});function on(e,t,n){var r=Vt.exec(t);return r?Math.max(0,r[1]-(n||0))+(r[2]||&quot;px&quot;):t}function an(e,t,n,r,i){var o=n===(r?&quot;border&quot;:&quot;content&quot;)?4:&quot;width&quot;===t?1:0,a=0;for(;4&gt;o;o+=2)&quot;margin&quot;===n&amp;&amp;(a+=x.css(e,n+Zt[o],!0,i)),r?(&quot;content&quot;===n&amp;&amp;(a-=x.css(e,&quot;padding&quot;+Zt[o],!0,i)),&quot;margin&quot;!==n&amp;&amp;(a-=x.css(e,&quot;border&quot;+Zt[o]+&quot;Width&quot;,!0,i))):(a+=x.css(e,&quot;padding&quot;+Zt[o],!0,i),&quot;padding&quot;!==n&amp;&amp;(a+=x.css(e,&quot;border&quot;+Zt[o]+&quot;Width&quot;,!0,i)));return a}function sn(e,t,n){var r=!0,i=&quot;width&quot;===t?e.offsetWidth:e.offsetHeight,o=Rt(e),a=x.support.boxSizing&amp;&amp;&quot;border-box&quot;===x.css(e,&quot;boxSizing&quot;,!1,o);if(0&gt;=i||null==i){if(i=Wt(e,t,o),(0&gt;i||null==i)&amp;&amp;(i=e.style[t]),Yt.test(i))return i;r=a&amp;&amp;(x.support.boxSizingReliable||i===e.style[t]),i=parseFloat(i)||0}return i+an(e,t,n||(a?&quot;border&quot;:&quot;content&quot;),r,o)+&quot;px&quot;}function ln(e){var t=a,n=Gt[e];return n||(n=un(e,t),&quot;none&quot;!==n&amp;&amp;n||(Pt=(Pt||x(&quot;&lt;iframe frameborder=&#39;0&#39; width=&#39;0&#39; height=&#39;0&#39;/&gt;&quot;).css(&quot;cssText&quot;,&quot;display:block !important&quot;)).appendTo(t.documentElement),t=(Pt[0].contentWindow||Pt[0].contentDocument).document,t.write(&quot;&lt;!doctype html&gt;&lt;html&gt;&lt;body&gt;&quot;),t.close(),n=un(e,t),Pt.detach()),Gt[e]=n),n}function un(e,t){var n=x(t.createElement(e)).appendTo(t.body),r=x.css(n[0],&quot;display&quot;);return n.remove(),r}x.each([&quot;height&quot;,&quot;width&quot;],function(e,n){x.cssHooks[n]={get:function(e,r,i){return r?0===e.offsetWidth&amp;&amp;Xt.test(x.css(e,&quot;display&quot;))?x.swap(e,Qt,function(){return sn(e,n,i)}):sn(e,n,i):t},set:function(e,t,r){var i=r&amp;&amp;Rt(e);return on(e,t,r?an(e,n,r,x.support.boxSizing&amp;&amp;&quot;border-box&quot;===x.css(e,&quot;boxSizing&quot;,!1,i),i):0)}}}),x.support.opacity||(x.cssHooks.opacity={get:function(e,t){return It.test((t&amp;&amp;e.currentStyle?e.currentStyle.filter:e.style.filter)||&quot;&quot;)?.01*parseFloat(RegExp.$1)+&quot;&quot;:t?&quot;1&quot;:&quot;&quot;},set:function(e,t){var n=e.style,r=e.currentStyle,i=x.isNumeric(t)?&quot;alpha(opacity=&quot;+100*t+&quot;)&quot;:&quot;&quot;,o=r&amp;&amp;r.filter||n.filter||&quot;&quot;;n.zoom=1,(t&gt;=1||&quot;&quot;===t)&amp;&amp;&quot;&quot;===x.trim(o.replace($t,&quot;&quot;))&amp;&amp;n.removeAttribute&amp;&amp;(n.removeAttribute(&quot;filter&quot;),&quot;&quot;===t||r&amp;&amp;!r.filter)||(n.filter=$t.test(o)?o.replace($t,i):o+&quot; &quot;+i)}}),x(function(){x.support.reliableMarginRight||(x.cssHooks.marginRight={get:function(e,n){return n?x.swap(e,{display:&quot;inline-block&quot;},Wt,[e,&quot;marginRight&quot;]):t}}),!x.support.pixelPosition&amp;&amp;x.fn.position&amp;&amp;x.each([&quot;top&quot;,&quot;left&quot;],function(e,n){x.cssHooks[n]={get:function(e,r){return r?(r=Wt(e,n),Yt.test(r)?x(e).position()[n]+&quot;px&quot;:r):t}}})}),x.expr&amp;&amp;x.expr.filters&amp;&amp;(x.expr.filters.hidden=function(e){return 0&gt;=e.offsetWidth&amp;&amp;0&gt;=e.offsetHeight||!x.support.reliableHiddenOffsets&amp;&amp;&quot;none&quot;===(e.style&amp;&amp;e.style.display||x.css(e,&quot;display&quot;))},x.expr.filters.visible=function(e){return!x.expr.filters.hidden(e)}),x.each({margin:&quot;&quot;,padding:&quot;&quot;,border:&quot;Width&quot;},function(e,t){x.cssHooks[e+t]={expand:function(n){var r=0,i={},o=&quot;string&quot;==typeof n?n.split(&quot; &quot;):[n];for(;4&gt;r;r++)i[e+Zt[r]+t]=o[r]||o[r-2]||o[0];return i}},Ut.test(e)||(x.cssHooks[e+t].set=on)});var cn=/%20/g,pn=/\[\]$/,fn=/\r?\n/g,dn=/^(?:submit|button|image|reset|file)$/i,hn=/^(?:input|select|textarea|keygen)/i;x.fn.extend({serialize:function(){return x.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=x.prop(this,&quot;elements&quot;);return e?x.makeArray(e):this}).filter(function(){var e=this.type;return this.name&amp;&amp;!x(this).is(&quot;:disabled&quot;)&amp;&amp;hn.test(this.nodeName)&amp;&amp;!dn.test(e)&amp;&amp;(this.checked||!Ct.test(e))}).map(function(e,t){var n=x(this).val();return null==n?null:x.isArray(n)?x.map(n,function(e){return{name:t.name,value:e.replace(fn,&quot;\r\n&quot;)}}):{name:t.name,value:n.replace(fn,&quot;\r\n&quot;)}}).get()}}),x.param=function(e,n){var r,i=[],o=function(e,t){t=x.isFunction(t)?t():null==t?&quot;&quot;:t,i[i.length]=encodeURIComponent(e)+&quot;=&quot;+encodeURIComponent(t)};if(n===t&amp;&amp;(n=x.ajaxSettings&amp;&amp;x.ajaxSettings.traditional),x.isArray(e)||e.jquery&amp;&amp;!x.isPlainObject(e))x.each(e,function(){o(this.name,this.value)});else for(r in e)gn(r,e[r],n,o);return i.join(&quot;&amp;&quot;).replace(cn,&quot;+&quot;)};function gn(e,t,n,r){var i;if(x.isArray(t))x.each(t,function(t,i){n||pn.test(e)?r(e,i):gn(e+&quot;[&quot;+(&quot;object&quot;==typeof i?t:&quot;&quot;)+&quot;]&quot;,i,n,r)});else if(n||&quot;object&quot;!==x.type(t))r(e,t);else for(i in t)gn(e+&quot;[&quot;+i+&quot;]&quot;,t[i],n,r)}x.each(&quot;blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu&quot;.split(&quot; &quot;),function(e,t){x.fn[t]=function(e,n){return arguments.length&gt;0?this.on(t,null,e,n):this.trigger(t)}}),x.fn.extend({hover:function(e,t){return this.mouseenter(e).mouseleave(t||e)},bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,&quot;**&quot;):this.off(t,e||&quot;**&quot;,n)}});var mn,yn,vn=x.now(),bn=/\?/,xn=/#.*$/,wn=/([?&amp;])_=[^&amp;]*/,Tn=/^(.*?):[ \t]*([^\r\n]*)\r?$/gm,Cn=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Nn=/^(?:GET|HEAD)$/,kn=/^\/\//,En=/^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,Sn=x.fn.load,An={},jn={},Dn=&quot;*/&quot;.concat(&quot;*&quot;);try{yn=o.href}catch(Ln){yn=a.createElement(&quot;a&quot;),yn.href=&quot;&quot;,yn=yn.href}mn=En.exec(yn.toLowerCase())||[];function Hn(e){return function(t,n){&quot;string&quot;!=typeof t&amp;&amp;(n=t,t=&quot;*&quot;);var r,i=0,o=t.toLowerCase().match(T)||[];if(x.isFunction(n))while(r=o[i++])&quot;+&quot;===r[0]?(r=r.slice(1)||&quot;*&quot;,(e[r]=e[r]||[]).unshift(n)):(e[r]=e[r]||[]).push(n)}}function qn(e,n,r,i){var o={},a=e===jn;function s(l){var u;return o[l]=!0,x.each(e[l]||[],function(e,l){var c=l(n,r,i);return&quot;string&quot;!=typeof c||a||o[c]?a?!(u=c):t:(n.dataTypes.unshift(c),s(c),!1)}),u}return s(n.dataTypes[0])||!o[&quot;*&quot;]&amp;&amp;s(&quot;*&quot;)}function _n(e,n){var r,i,o=x.ajaxSettings.flatOptions||{};for(i in n)n[i]!==t&amp;&amp;((o[i]?e:r||(r={}))[i]=n[i]);return r&amp;&amp;x.extend(!0,e,r),e}x.fn.load=function(e,n,r){if(&quot;string&quot;!=typeof e&amp;&amp;Sn)return Sn.apply(this,arguments);var i,o,a,s=this,l=e.indexOf(&quot; &quot;);return l&gt;=0&amp;&amp;(i=e.slice(l,e.length),e=e.slice(0,l)),x.isFunction(n)?(r=n,n=t):n&amp;&amp;&quot;object&quot;==typeof n&amp;&amp;(a=&quot;POST&quot;),s.length&gt;0&amp;&amp;x.ajax({url:e,type:a,dataType:&quot;html&quot;,data:n}).done(function(e){o=arguments,s.html(i?x(&quot;&lt;div&gt;&quot;).append(x.parseHTML(e)).find(i):e)}).complete(r&amp;&amp;function(e,t){s.each(r,o||[e.responseText,t,e])}),this},x.each([&quot;ajaxStart&quot;,&quot;ajaxStop&quot;,&quot;ajaxComplete&quot;,&quot;ajaxError&quot;,&quot;ajaxSuccess&quot;,&quot;ajaxSend&quot;],function(e,t){x.fn[t]=function(e){return this.on(t,e)}}),x.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:yn,type:&quot;GET&quot;,isLocal:Cn.test(mn[1]),global:!0,processData:!0,async:!0,contentType:&quot;application/x-www-form-urlencoded; charset=UTF-8&quot;,accepts:{&quot;*&quot;:Dn,text:&quot;text/plain&quot;,html:&quot;text/html&quot;,xml:&quot;application/xml, text/xml&quot;,json:&quot;application/json, text/javascript&quot;},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:&quot;responseXML&quot;,text:&quot;responseText&quot;,json:&quot;responseJSON&quot;},converters:{&quot;* text&quot;:String,&quot;text html&quot;:!0,&quot;text json&quot;:x.parseJSON,&quot;text xml&quot;:x.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?_n(_n(e,x.ajaxSettings),t):_n(x.ajaxSettings,e)},ajaxPrefilter:Hn(An),ajaxTransport:Hn(jn),ajax:function(e,n){&quot;object&quot;==typeof e&amp;&amp;(n=e,e=t),n=n||{};var r,i,o,a,s,l,u,c,p=x.ajaxSetup({},n),f=p.context||p,d=p.context&amp;&amp;(f.nodeType||f.jquery)?x(f):x.event,h=x.Deferred(),g=x.Callbacks(&quot;once memory&quot;),m=p.statusCode||{},y={},v={},b=0,w=&quot;canceled&quot;,C={readyState:0,getResponseHeader:function(e){var t;if(2===b){if(!c){c={};while(t=Tn.exec(a))c[t[1].toLowerCase()]=t[2]}t=c[e.toLowerCase()]}return null==t?null:t},getAllResponseHeaders:function(){return 2===b?a:null},setRequestHeader:function(e,t){var n=e.toLowerCase();return b||(e=v[n]=v[n]||e,y[e]=t),this},overrideMimeType:function(e){return b||(p.mimeType=e),this},statusCode:function(e){var t;if(e)if(2&gt;b)for(t in e)m[t]=[m[t],e[t]];else C.always(e[C.status]);return this},abort:function(e){var t=e||w;return u&amp;&amp;u.abort(t),k(0,t),this}};if(h.promise(C).complete=g.add,C.success=C.done,C.error=C.fail,p.url=((e||p.url||yn)+&quot;&quot;).replace(xn,&quot;&quot;).replace(kn,mn[1]+&quot;//&quot;),p.type=n.method||n.type||p.method||p.type,p.dataTypes=x.trim(p.dataType||&quot;*&quot;).toLowerCase().match(T)||[&quot;&quot;],null==p.crossDomain&amp;&amp;(r=En.exec(p.url.toLowerCase()),p.crossDomain=!(!r||r[1]===mn[1]&amp;&amp;r[2]===mn[2]&amp;&amp;(r[3]||(&quot;http:&quot;===r[1]?&quot;80&quot;:&quot;443&quot;))===(mn[3]||(&quot;http:&quot;===mn[1]?&quot;80&quot;:&quot;443&quot;)))),p.data&amp;&amp;p.processData&amp;&amp;&quot;string&quot;!=typeof p.data&amp;&amp;(p.data=x.param(p.data,p.traditional)),qn(An,p,n,C),2===b)return C;l=p.global,l&amp;&amp;0===x.active++&amp;&amp;x.event.trigger(&quot;ajaxStart&quot;),p.type=p.type.toUpperCase(),p.hasContent=!Nn.test(p.type),o=p.url,p.hasContent||(p.data&amp;&amp;(o=p.url+=(bn.test(o)?&quot;&amp;&quot;:&quot;?&quot;)+p.data,delete p.data),p.cache===!1&amp;&amp;(p.url=wn.test(o)?o.replace(wn,&quot;$1_=&quot;+vn++):o+(bn.test(o)?&quot;&amp;&quot;:&quot;?&quot;)+&quot;_=&quot;+vn++)),p.ifModified&amp;&amp;(x.lastModified[o]&amp;&amp;C.setRequestHeader(&quot;If-Modified-Since&quot;,x.lastModified[o]),x.etag[o]&amp;&amp;C.setRequestHeader(&quot;If-None-Match&quot;,x.etag[o])),(p.data&amp;&amp;p.hasContent&amp;&amp;p.contentType!==!1||n.contentType)&amp;&amp;C.setRequestHeader(&quot;Content-Type&quot;,p.contentType),C.setRequestHeader(&quot;Accept&quot;,p.dataTypes[0]&amp;&amp;p.accepts[p.dataTypes[0]]?p.accepts[p.dataTypes[0]]+(&quot;*&quot;!==p.dataTypes[0]?&quot;, &quot;+Dn+&quot;; q=0.01&quot;:&quot;&quot;):p.accepts[&quot;*&quot;]);for(i in p.headers)C.setRequestHeader(i,p.headers[i]);if(p.beforeSend&amp;&amp;(p.beforeSend.call(f,C,p)===!1||2===b))return C.abort();w=&quot;abort&quot;;for(i in{success:1,error:1,complete:1})C[i](p[i]);if(u=qn(jn,p,n,C)){C.readyState=1,l&amp;&amp;d.trigger(&quot;ajaxSend&quot;,[C,p]),p.async&amp;&amp;p.timeout&gt;0&amp;&amp;(s=setTimeout(function(){C.abort(&quot;timeout&quot;)},p.timeout));try{b=1,u.send(y,k)}catch(N){if(!(2&gt;b))throw N;k(-1,N)}}else k(-1,&quot;No Transport&quot;);function k(e,n,r,i){var c,y,v,w,T,N=n;2!==b&amp;&amp;(b=2,s&amp;&amp;clearTimeout(s),u=t,a=i||&quot;&quot;,C.readyState=e&gt;0?4:0,c=e&gt;=200&amp;&amp;300&gt;e||304===e,r&amp;&amp;(w=Mn(p,C,r)),w=On(p,w,C,c),c?(p.ifModified&amp;&amp;(T=C.getResponseHeader(&quot;Last-Modified&quot;),T&amp;&amp;(x.lastModified[o]=T),T=C.getResponseHeader(&quot;etag&quot;),T&amp;&amp;(x.etag[o]=T)),204===e||&quot;HEAD&quot;===p.type?N=&quot;nocontent&quot;:304===e?N=&quot;notmodified&quot;:(N=w.state,y=w.data,v=w.error,c=!v)):(v=N,(e||!N)&amp;&amp;(N=&quot;error&quot;,0&gt;e&amp;&amp;(e=0))),C.status=e,C.statusText=(n||N)+&quot;&quot;,c?h.resolveWith(f,[y,N,C]):h.rejectWith(f,[C,N,v]),C.statusCode(m),m=t,l&amp;&amp;d.trigger(c?&quot;ajaxSuccess&quot;:&quot;ajaxError&quot;,[C,p,c?y:v]),g.fireWith(f,[C,N]),l&amp;&amp;(d.trigger(&quot;ajaxComplete&quot;,[C,p]),--x.active||x.event.trigger(&quot;ajaxStop&quot;)))}return C},getJSON:function(e,t,n){return x.get(e,t,n,&quot;json&quot;)},getScript:function(e,n){return x.get(e,t,n,&quot;script&quot;)}}),x.each([&quot;get&quot;,&quot;post&quot;],function(e,n){x[n]=function(e,r,i,o){return x.isFunction(r)&amp;&amp;(o=o||i,i=r,r=t),x.ajax({url:e,type:n,dataType:o,data:r,success:i})}});function Mn(e,n,r){var i,o,a,s,l=e.contents,u=e.dataTypes;while(&quot;*&quot;===u[0])u.shift(),o===t&amp;&amp;(o=e.mimeType||n.getResponseHeader(&quot;Content-Type&quot;));if(o)for(s in l)if(l[s]&amp;&amp;l[s].test(o)){u.unshift(s);break}if(u[0]in r)a=u[0];else{for(s in r){if(!u[0]||e.converters[s+&quot; &quot;+u[0]]){a=s;break}i||(i=s)}a=a||i}return a?(a!==u[0]&amp;&amp;u.unshift(a),r[a]):t}function On(e,t,n,r){var i,o,a,s,l,u={},c=e.dataTypes.slice();if(c[1])for(a in e.converters)u[a.toLowerCase()]=e.converters[a];o=c.shift();while(o)if(e.responseFields[o]&amp;&amp;(n[e.responseFields[o]]=t),!l&amp;&amp;r&amp;&amp;e.dataFilter&amp;&amp;(t=e.dataFilter(t,e.dataType)),l=o,o=c.shift())if(&quot;*&quot;===o)o=l;else if(&quot;*&quot;!==l&amp;&amp;l!==o){if(a=u[l+&quot; &quot;+o]||u[&quot;* &quot;+o],!a)for(i in u)if(s=i.split(&quot; &quot;),s[1]===o&amp;&amp;(a=u[l+&quot; &quot;+s[0]]||u[&quot;* &quot;+s[0]])){a===!0?a=u[i]:u[i]!==!0&amp;&amp;(o=s[0],c.unshift(s[1]));break}if(a!==!0)if(a&amp;&amp;e[&quot;throws&quot;])t=a(t);else try{t=a(t)}catch(p){return{state:&quot;parsererror&quot;,error:a?p:&quot;No conversion from &quot;+l+&quot; to &quot;+o}}}return{state:&quot;success&quot;,data:t}}x.ajaxSetup({accepts:{script:&quot;text/javascript, application/javascript, application/ecmascript, application/x-ecmascript&quot;},contents:{script:/(?:java|ecma)script/},converters:{&quot;text script&quot;:function(e){return x.globalEval(e),e}}}),x.ajaxPrefilter(&quot;script&quot;,function(e){e.cache===t&amp;&amp;(e.cache=!1),e.crossDomain&amp;&amp;(e.type=&quot;GET&quot;,e.global=!1)}),x.ajaxTransport(&quot;script&quot;,function(e){if(e.crossDomain){var n,r=a.head||x(&quot;head&quot;)[0]||a.documentElement;return{send:function(t,i){n=a.createElement(&quot;script&quot;),n.async=!0,e.scriptCharset&amp;&amp;(n.charset=e.scriptCharset),n.src=e.url,n.onload=n.onreadystatechange=function(e,t){(t||!n.readyState||/loaded|complete/.test(n.readyState))&amp;&amp;(n.onload=n.onreadystatechange=null,n.parentNode&amp;&amp;n.parentNode.removeChild(n),n=null,t||i(200,&quot;success&quot;))},r.insertBefore(n,r.firstChild)},abort:function(){n&amp;&amp;n.onload(t,!0)}}}});var Fn=[],Bn=/(=)\?(?=&amp;|$)|\?\?/;x.ajaxSetup({jsonp:&quot;callback&quot;,jsonpCallback:function(){var e=Fn.pop()||x.expando+&quot;_&quot;+vn++;return this[e]=!0,e}}),x.ajaxPrefilter(&quot;json jsonp&quot;,function(n,r,i){var o,a,s,l=n.jsonp!==!1&amp;&amp;(Bn.test(n.url)?&quot;url&quot;:&quot;string&quot;==typeof n.data&amp;&amp;!(n.contentType||&quot;&quot;).indexOf(&quot;application/x-www-form-urlencoded&quot;)&amp;&amp;Bn.test(n.data)&amp;&amp;&quot;data&quot;);return l||&quot;jsonp&quot;===n.dataTypes[0]?(o=n.jsonpCallback=x.isFunction(n.jsonpCallback)?n.jsonpCallback():n.jsonpCallback,l?n[l]=n[l].replace(Bn,&quot;$1&quot;+o):n.jsonp!==!1&amp;&amp;(n.url+=(bn.test(n.url)?&quot;&amp;&quot;:&quot;?&quot;)+n.jsonp+&quot;=&quot;+o),n.converters[&quot;script json&quot;]=function(){return s||x.error(o+&quot; was not called&quot;),s[0]},n.dataTypes[0]=&quot;json&quot;,a=e[o],e[o]=function(){s=arguments},i.always(function(){e[o]=a,n[o]&amp;&amp;(n.jsonpCallback=r.jsonpCallback,Fn.push(o)),s&amp;&amp;x.isFunction(a)&amp;&amp;a(s[0]),s=a=t}),&quot;script&quot;):t});var Pn,Rn,Wn=0,$n=e.ActiveXObject&amp;&amp;function(){var e;for(e in Pn)Pn[e](t,!0)};function In(){try{return new e.XMLHttpRequest}catch(t){}}function zn(){try{return new e.ActiveXObject(&quot;Microsoft.XMLHTTP&quot;)}catch(t){}}x.ajaxSettings.xhr=e.ActiveXObject?function(){return!this.isLocal&amp;&amp;In()||zn()}:In,Rn=x.ajaxSettings.xhr(),x.support.cors=!!Rn&amp;&amp;&quot;withCredentials&quot;in Rn,Rn=x.support.ajax=!!Rn,Rn&amp;&amp;x.ajaxTransport(function(n){if(!n.crossDomain||x.support.cors){var r;return{send:function(i,o){var a,s,l=n.xhr();if(n.username?l.open(n.type,n.url,n.async,n.username,n.password):l.open(n.type,n.url,n.async),n.xhrFields)for(s in n.xhrFields)l[s]=n.xhrFields[s];n.mimeType&amp;&amp;l.overrideMimeType&amp;&amp;l.overrideMimeType(n.mimeType),n.crossDomain||i[&quot;X-Requested-With&quot;]||(i[&quot;X-Requested-With&quot;]=&quot;XMLHttpRequest&quot;);try{for(s in i)l.setRequestHeader(s,i[s])}catch(u){}l.send(n.hasContent&amp;&amp;n.data||null),r=function(e,i){var s,u,c,p;try{if(r&amp;&amp;(i||4===l.readyState))if(r=t,a&amp;&amp;(l.onreadystatechange=x.noop,$n&amp;&amp;delete Pn[a]),i)4!==l.readyState&amp;&amp;l.abort();else{p={},s=l.status,u=l.getAllResponseHeaders(),&quot;string&quot;==typeof l.responseText&amp;&amp;(p.text=l.responseText);try{c=l.statusText}catch(f){c=&quot;&quot;}s||!n.isLocal||n.crossDomain?1223===s&amp;&amp;(s=204):s=p.text?200:404}}catch(d){i||o(-1,d)}p&amp;&amp;o(s,c,p,u)},n.async?4===l.readyState?setTimeout(r):(a=++Wn,$n&amp;&amp;(Pn||(Pn={},x(e).unload($n)),Pn[a]=r),l.onreadystatechange=r):r()},abort:function(){r&amp;&amp;r(t,!0)}}}});var Xn,Un,Vn=/^(?:toggle|show|hide)$/,Yn=RegExp(&quot;^(?:([+-])=|)(&quot;+w+&quot;)([a-z%]*)$&quot;,&quot;i&quot;),Jn=/queueHooks$/,Gn=[nr],Qn={&quot;*&quot;:[function(e,t){var n=this.createTween(e,t),r=n.cur(),i=Yn.exec(t),o=i&amp;&amp;i[3]||(x.cssNumber[e]?&quot;&quot;:&quot;px&quot;),a=(x.cssNumber[e]||&quot;px&quot;!==o&amp;&amp;+r)&amp;&amp;Yn.exec(x.css(n.elem,e)),s=1,l=20;if(a&amp;&amp;a[3]!==o){o=o||a[3],i=i||[],a=+r||1;do s=s||&quot;.5&quot;,a/=s,x.style(n.elem,e,a+o);while(s!==(s=n.cur()/r)&amp;&amp;1!==s&amp;&amp;--l)}return i&amp;&amp;(a=n.start=+a||+r||0,n.unit=o,n.end=i[1]?a+(i[1]+1)*i[2]:+i[2]),n}]};function Kn(){return setTimeout(function(){Xn=t}),Xn=x.now()}function Zn(e,t,n){var r,i=(Qn[t]||[]).concat(Qn[&quot;*&quot;]),o=0,a=i.length;for(;a&gt;o;o++)if(r=i[o].call(n,t,e))return r}function er(e,t,n){var r,i,o=0,a=Gn.length,s=x.Deferred().always(function(){delete l.elem}),l=function(){if(i)return!1;var t=Xn||Kn(),n=Math.max(0,u.startTime+u.duration-t),r=n/u.duration||0,o=1-r,a=0,l=u.tweens.length;for(;l&gt;a;a++)u.tweens[a].run(o);return s.notifyWith(e,[u,o,n]),1&gt;o&amp;&amp;l?n:(s.resolveWith(e,[u]),!1)},u=s.promise({elem:e,props:x.extend({},t),opts:x.extend(!0,{specialEasing:{}},n),originalProperties:t,originalOptions:n,startTime:Xn||Kn(),duration:n.duration,tweens:[],createTween:function(t,n){var r=x.Tween(e,u.opts,t,n,u.opts.specialEasing[t]||u.opts.easing);return u.tweens.push(r),r},stop:function(t){var n=0,r=t?u.tweens.length:0;if(i)return this;for(i=!0;r&gt;n;n++)u.tweens[n].run(1);return t?s.resolveWith(e,[u,t]):s.rejectWith(e,[u,t]),this}}),c=u.props;for(tr(c,u.opts.specialEasing);a&gt;o;o++)if(r=Gn[o].call(u,e,c,u.opts))return r;return x.map(c,Zn,u),x.isFunction(u.opts.start)&amp;&amp;u.opts.start.call(e,u),x.fx.timer(x.extend(l,{elem:e,anim:u,queue:u.opts.queue})),u.progress(u.opts.progress).done(u.opts.done,u.opts.complete).fail(u.opts.fail).always(u.opts.always)}function tr(e,t){var n,r,i,o,a;for(n in e)if(r=x.camelCase(n),i=t[r],o=e[n],x.isArray(o)&amp;&amp;(i=o[1],o=e[n]=o[0]),n!==r&amp;&amp;(e[r]=o,delete e[n]),a=x.cssHooks[r],a&amp;&amp;&quot;expand&quot;in a){o=a.expand(o),delete e[r];for(n in o)n in e||(e[n]=o[n],t[n]=i)}else t[r]=i}x.Animation=x.extend(er,{tweener:function(e,t){x.isFunction(e)?(t=e,e=[&quot;*&quot;]):e=e.split(&quot; &quot;);var n,r=0,i=e.length;for(;i&gt;r;r++)n=e[r],Qn[n]=Qn[n]||[],Qn[n].unshift(t)},prefilter:function(e,t){t?Gn.unshift(e):Gn.push(e)}});function nr(e,t,n){var r,i,o,a,s,l,u=this,c={},p=e.style,f=e.nodeType&amp;&amp;nn(e),d=x._data(e,&quot;fxshow&quot;);n.queue||(s=x._queueHooks(e,&quot;fx&quot;),null==s.unqueued&amp;&amp;(s.unqueued=0,l=s.empty.fire,s.empty.fire=function(){s.unqueued||l()}),s.unqueued++,u.always(function(){u.always(function(){s.unqueued--,x.queue(e,&quot;fx&quot;).length||s.empty.fire()})})),1===e.nodeType&amp;&amp;(&quot;height&quot;in t||&quot;width&quot;in t)&amp;&amp;(n.overflow=[p.overflow,p.overflowX,p.overflowY],&quot;inline&quot;===x.css(e,&quot;display&quot;)&amp;&amp;&quot;none&quot;===x.css(e,&quot;float&quot;)&amp;&amp;(x.support.inlineBlockNeedsLayout&amp;&amp;&quot;inline&quot;!==ln(e.nodeName)?p.zoom=1:p.display=&quot;inline-block&quot;)),n.overflow&amp;&amp;(p.overflow=&quot;hidden&quot;,x.support.shrinkWrapBlocks||u.always(function(){p.overflow=n.overflow[0],p.overflowX=n.overflow[1],p.overflowY=n.overflow[2]}));for(r in t)if(i=t[r],Vn.exec(i)){if(delete t[r],o=o||&quot;toggle&quot;===i,i===(f?&quot;hide&quot;:&quot;show&quot;))continue;c[r]=d&amp;&amp;d[r]||x.style(e,r)}if(!x.isEmptyObject(c)){d?&quot;hidden&quot;in d&amp;&amp;(f=d.hidden):d=x._data(e,&quot;fxshow&quot;,{}),o&amp;&amp;(d.hidden=!f),f?x(e).show():u.done(function(){x(e).hide()}),u.done(function(){var t;x._removeData(e,&quot;fxshow&quot;);for(t in c)x.style(e,t,c[t])});for(r in c)a=Zn(f?d[r]:0,r,u),r in d||(d[r]=a.start,f&amp;&amp;(a.end=a.start,a.start=&quot;width&quot;===r||&quot;height&quot;===r?1:0))}}function rr(e,t,n,r,i){return new rr.prototype.init(e,t,n,r,i)}x.Tween=rr,rr.prototype={constructor:rr,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||&quot;swing&quot;,this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(x.cssNumber[n]?&quot;&quot;:&quot;px&quot;)},cur:function(){var e=rr.propHooks[this.prop];return e&amp;&amp;e.get?e.get(this):rr.propHooks._default.get(this)},run:function(e){var t,n=rr.propHooks[this.prop];return this.pos=t=this.options.duration?x.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):e,this.now=(this.end-this.start)*t+this.start,this.options.step&amp;&amp;this.options.step.call(this.elem,this.now,this),n&amp;&amp;n.set?n.set(this):rr.propHooks._default.set(this),this}},rr.prototype.init.prototype=rr.prototype,rr.propHooks={_default:{get:function(e){var t;return null==e.elem[e.prop]||e.elem.style&amp;&amp;null!=e.elem.style[e.prop]?(t=x.css(e.elem,e.prop,&quot;&quot;),t&amp;&amp;&quot;auto&quot;!==t?t:0):e.elem[e.prop]},set:function(e){x.fx.step[e.prop]?x.fx.step[e.prop](e):e.elem.style&amp;&amp;(null!=e.elem.style[x.cssProps[e.prop]]||x.cssHooks[e.prop])?x.style(e.elem,e.prop,e.now+e.unit):e.elem[e.prop]=e.now}}},rr.propHooks.scrollTop=rr.propHooks.scrollLeft={set:function(e){e.elem.nodeType&amp;&amp;e.elem.parentNode&amp;&amp;(e.elem[e.prop]=e.now)}},x.each([&quot;toggle&quot;,&quot;show&quot;,&quot;hide&quot;],function(e,t){var n=x.fn[t];x.fn[t]=function(e,r,i){return null==e||&quot;boolean&quot;==typeof e?n.apply(this,arguments):this.animate(ir(t,!0),e,r,i)}}),x.fn.extend({fadeTo:function(e,t,n,r){return this.filter(nn).css(&quot;opacity&quot;,0).show().end().animate({opacity:t},e,n,r)},animate:function(e,t,n,r){var i=x.isEmptyObject(e),o=x.speed(t,n,r),a=function(){var t=er(this,x.extend({},e),o);(i||x._data(this,&quot;finish&quot;))&amp;&amp;t.stop(!0)};return a.finish=a,i||o.queue===!1?this.each(a):this.queue(o.queue,a)},stop:function(e,n,r){var i=function(e){var t=e.stop;delete e.stop,t(r)};return&quot;string&quot;!=typeof e&amp;&amp;(r=n,n=e,e=t),n&amp;&amp;e!==!1&amp;&amp;this.queue(e||&quot;fx&quot;,[]),this.each(function(){var t=!0,n=null!=e&amp;&amp;e+&quot;queueHooks&quot;,o=x.timers,a=x._data(this);if(n)a[n]&amp;&amp;a[n].stop&amp;&amp;i(a[n]);else for(n in a)a[n]&amp;&amp;a[n].stop&amp;&amp;Jn.test(n)&amp;&amp;i(a[n]);for(n=o.length;n--;)o[n].elem!==this||null!=e&amp;&amp;o[n].queue!==e||(o[n].anim.stop(r),t=!1,o.splice(n,1));(t||!r)&amp;&amp;x.dequeue(this,e)})},finish:function(e){return e!==!1&amp;&amp;(e=e||&quot;fx&quot;),this.each(function(){var t,n=x._data(this),r=n[e+&quot;queue&quot;],i=n[e+&quot;queueHooks&quot;],o=x.timers,a=r?r.length:0;for(n.finish=!0,x.queue(this,e,[]),i&amp;&amp;i.stop&amp;&amp;i.stop.call(this,!0),t=o.length;t--;)o[t].elem===this&amp;&amp;o[t].queue===e&amp;&amp;(o[t].anim.stop(!0),o.splice(t,1));for(t=0;a&gt;t;t++)r[t]&amp;&amp;r[t].finish&amp;&amp;r[t].finish.call(this);delete n.finish})}});function ir(e,t){var n,r={height:e},i=0;for(t=t?1:0;4&gt;i;i+=2-t)n=Zt[i],r[&quot;margin&quot;+n]=r[&quot;padding&quot;+n]=e;return t&amp;&amp;(r.opacity=r.width=e),r}x.each({slideDown:ir(&quot;show&quot;),slideUp:ir(&quot;hide&quot;),slideToggle:ir(&quot;toggle&quot;),fadeIn:{opacity:&quot;show&quot;},fadeOut:{opacity:&quot;hide&quot;},fadeToggle:{opacity:&quot;toggle&quot;}},function(e,t){x.fn[e]=function(e,n,r){return this.animate(t,e,n,r)}}),x.speed=function(e,t,n){var r=e&amp;&amp;&quot;object&quot;==typeof e?x.extend({},e):{complete:n||!n&amp;&amp;t||x.isFunction(e)&amp;&amp;e,duration:e,easing:n&amp;&amp;t||t&amp;&amp;!x.isFunction(t)&amp;&amp;t};return r.duration=x.fx.off?0:&quot;number&quot;==typeof r.duration?r.duration:r.duration in x.fx.speeds?x.fx.speeds[r.duration]:x.fx.speeds._default,(null==r.queue||r.queue===!0)&amp;&amp;(r.queue=&quot;fx&quot;),r.old=r.complete,r.complete=function(){x.isFunction(r.old)&amp;&amp;r.old.call(this),r.queue&amp;&amp;x.dequeue(this,r.queue)},r},x.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2}},x.timers=[],x.fx=rr.prototype.init,x.fx.tick=function(){var e,n=x.timers,r=0;for(Xn=x.now();n.length&gt;r;r++)e=n[r],e()||n[r]!==e||n.splice(r--,1);n.length||x.fx.stop(),Xn=t},x.fx.timer=function(e){e()&amp;&amp;x.timers.push(e)&amp;&amp;x.fx.start()},x.fx.interval=13,x.fx.start=function(){Un||(Un=setInterval(x.fx.tick,x.fx.interval))},x.fx.stop=function(){clearInterval(Un),Un=null},x.fx.speeds={slow:600,fast:200,_default:400},x.fx.step={},x.expr&amp;&amp;x.expr.filters&amp;&amp;(x.expr.filters.animated=function(e){return x.grep(x.timers,function(t){return e===t.elem}).length}),x.fn.offset=function(e){if(arguments.length)return e===t?this:this.each(function(t){x.offset.setOffset(this,e,t)});var n,r,o={top:0,left:0},a=this[0],s=a&amp;&amp;a.ownerDocument;if(s)return n=s.documentElement,x.contains(n,a)?(typeof a.getBoundingClientRect!==i&amp;&amp;(o=a.getBoundingClientRect()),r=or(s),{top:o.top+(r.pageYOffset||n.scrollTop)-(n.clientTop||0),left:o.left+(r.pageXOffset||n.scrollLeft)-(n.clientLeft||0)}):o},x.offset={setOffset:function(e,t,n){var r=x.css(e,&quot;position&quot;);&quot;static&quot;===r&amp;&amp;(e.style.position=&quot;relative&quot;);var i=x(e),o=i.offset(),a=x.css(e,&quot;top&quot;),s=x.css(e,&quot;left&quot;),l=(&quot;absolute&quot;===r||&quot;fixed&quot;===r)&amp;&amp;x.inArray(&quot;auto&quot;,[a,s])&gt;-1,u={},c={},p,f;l?(c=i.position(),p=c.top,f=c.left):(p=parseFloat(a)||0,f=parseFloat(s)||0),x.isFunction(t)&amp;&amp;(t=t.call(e,n,o)),null!=t.top&amp;&amp;(u.top=t.top-o.top+p),null!=t.left&amp;&amp;(u.left=t.left-o.left+f),&quot;using&quot;in t?t.using.call(e,u):i.css(u)}},x.fn.extend({position:function(){if(this[0]){var e,t,n={top:0,left:0},r=this[0];return&quot;fixed&quot;===x.css(r,&quot;position&quot;)?t=r.getBoundingClientRect():(e=this.offsetParent(),t=this.offset(),x.nodeName(e[0],&quot;html&quot;)||(n=e.offset()),n.top+=x.css(e[0],&quot;borderTopWidth&quot;,!0),n.left+=x.css(e[0],&quot;borderLeftWidth&quot;,!0)),{top:t.top-n.top-x.css(r,&quot;marginTop&quot;,!0),left:t.left-n.left-x.css(r,&quot;marginLeft&quot;,!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent||s;while(e&amp;&amp;!x.nodeName(e,&quot;html&quot;)&amp;&amp;&quot;static&quot;===x.css(e,&quot;position&quot;))e=e.offsetParent;return e||s})}}),x.each({scrollLeft:&quot;pageXOffset&quot;,scrollTop:&quot;pageYOffset&quot;},function(e,n){var r=/Y/.test(n);x.fn[e]=function(i){return x.access(this,function(e,i,o){var a=or(e);return o===t?a?n in a?a[n]:a.document.documentElement[i]:e[i]:(a?a.scrollTo(r?x(a).scrollLeft():o,r?o:x(a).scrollTop()):e[i]=o,t)},e,i,arguments.length,null)}});function or(e){return x.isWindow(e)?e:9===e.nodeType?e.defaultView||e.parentWindow:!1}x.each({Height:&quot;height&quot;,Width:&quot;width&quot;},function(e,n){x.each({padding:&quot;inner&quot;+e,content:n,&quot;&quot;:&quot;outer&quot;+e},function(r,i){x.fn[i]=function(i,o){var a=arguments.length&amp;&amp;(r||&quot;boolean&quot;!=typeof i),s=r||(i===!0||o===!0?&quot;margin&quot;:&quot;border&quot;);return x.access(this,function(n,r,i){var o;return x.isWindow(n)?n.document.documentElement[&quot;client&quot;+e]:9===n.nodeType?(o=n.documentElement,Math.max(n.body[&quot;scroll&quot;+e],o[&quot;scroll&quot;+e],n.body[&quot;offset&quot;+e],o[&quot;offset&quot;+e],o[&quot;client&quot;+e])):i===t?x.css(n,r,s):x.style(n,r,i,s)},n,a?i:t,a,null)}})}),x.fn.size=function(){return this.length},x.fn.andSelf=x.fn.addBack,&quot;object&quot;==typeof module&amp;&amp;module&amp;&amp;&quot;object&quot;==typeof module.exports?module.exports=x:(e.jQuery=e.$=x,&quot;function&quot;==typeof define&amp;&amp;define.amd&amp;&amp;define(&quot;jquery&quot;,[],function(){return x}))})(window);</td>
      </tr>
</table>

  </div>

</div>

<button type="button" data-facebox="#jump-to-line" data-facebox-class="linejump" data-hotkey="l" class="hidden">Jump to Line</button>
<div id="jump-to-line" style="display:none">
  <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="" class="js-jump-to-line-form" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <input class="form-control linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" aria-label="Jump to line" autofocus>
    <button type="submit" class="btn">Go</button>
</form></div>

  </div>
  <div class="modal-backdrop js-touch-events"></div>
</div>


    </div>
  </div>

    </div>

        <div class="container site-footer-container">
  <div class="site-footer" role="contentinfo">
    <ul class="site-footer-links right">
        <li><a href="https://github.com/contact" data-ga-click="Footer, go to contact, text:contact">Contact GitHub</a></li>
      <li><a href="https://developer.github.com" data-ga-click="Footer, go to api, text:api">API</a></li>
      <li><a href="https://training.github.com" data-ga-click="Footer, go to training, text:training">Training</a></li>
      <li><a href="https://shop.github.com" data-ga-click="Footer, go to shop, text:shop">Shop</a></li>
        <li><a href="https://github.com/blog" data-ga-click="Footer, go to blog, text:blog">Blog</a></li>
        <li><a href="https://github.com/about" data-ga-click="Footer, go to about, text:about">About</a></li>

    </ul>

    <a href="https://github.com" aria-label="Homepage" class="site-footer-mark" title="GitHub">
      <svg aria-hidden="true" class="octicon octicon-mark-github" height="24" version="1.1" viewBox="0 0 16 16" width="24"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
</a>
    <ul class="site-footer-links">
      <li>&copy; 2016 <span title="0.07200s from github-fe132-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="https://github.com/site/terms" data-ga-click="Footer, go to terms, text:terms">Terms</a></li>
        <li><a href="https://github.com/site/privacy" data-ga-click="Footer, go to privacy, text:privacy">Privacy</a></li>
        <li><a href="https://github.com/security" data-ga-click="Footer, go to security, text:security">Security</a></li>
        <li><a href="https://status.github.com/" data-ga-click="Footer, go to status, text:status">Status</a></li>
        <li><a href="https://help.github.com" data-ga-click="Footer, go to help, text:help">Help</a></li>
    </ul>
  </div>
</div>



    

    <div id="ajax-error-message" class="ajax-error-message flash flash-error">
      <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"></path></svg>
      <button type="button" class="flash-close js-flash-close js-ajax-error-dismiss" aria-label="Dismiss error">
        <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
      </button>
      Something went wrong with that request. Please try again.
    </div>


      
      <script crossorigin="anonymous" integrity="sha256-QEzdGt0fcQ2wFqAuXjH/+KkInRT/DCJ9+GK3gIhtt9U=" src="https://assets-cdn.github.com/assets/frameworks-404cdd1add1f710db016a02e5e31fff8a9089d14ff0c227df862b780886db7d5.js"></script>
      <script async="async" crossorigin="anonymous" integrity="sha256-ACdL4CyoNxf9JsEhfXLq1LJXyEdYG2x0l60KiMzSByM=" src="https://assets-cdn.github.com/assets/github-00274be02ca83717fd26c1217d72ead4b257c847581b6c7497ad0a88ccd20723.js"></script>
      
      
      
      
      
      
    <div class="js-stale-session-flash stale-session-flash flash flash-warn flash-banner hidden">
      <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"></path></svg>
      <span class="signed-in-tab-flash">You signed in with another tab or window. <a href="">Reload</a> to refresh your session.</span>
      <span class="signed-out-tab-flash">You signed out in another tab or window. <a href="">Reload</a> to refresh your session.</span>
    </div>
    <div class="facebox" id="facebox" style="display:none;">
  <div class="facebox-popup">
    <div class="facebox-content" role="dialog" aria-labelledby="facebox-header" aria-describedby="facebox-description">
    </div>
    <button type="button" class="facebox-close js-facebox-close" aria-label="Close modal">
      <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
    </button>
  </div>
</div>

  </body>
</html>


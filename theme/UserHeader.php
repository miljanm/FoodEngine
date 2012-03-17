
	
<div style="margin-top: 10px"></div>

<div class="container">
  <div class="row">
    <div class="span3">
      <div class="well sidebar-nav" style="padding:2px">
        <ul class="nav nav-list">
          <li style="text-align: center">
          	<a href="<?=URL?>"><h1>DZone Snippets</h1></a>
          	<h6>Store, share, learn, teach. <br />5582 users have already registered.</h6>
          </li>
          <li>
          	<a href="#" style="text-align: center" id="showDZoneExp">What is DZone snippets?</a>
          	
          	<div id="whatIsDZone" style="display: none">
          		
			    <p class="welcome_blurb"><b>Snippets is a <span class='highlighted'>public source code repository.</span></b> Easily build up your personal collection of code snippets, categorize them with tags / keywords, and share them with the world
			    <br /><br />
			    <b>What next?</b><br />
			    1. <a href="http://del.icio.us/post?title=DZone+Snippets&url=http://snippets.dzone.com/">Bookmark us with del.icio.us</a> or <a href="http://digg.com/submit?phase=2&url=http://snippets.dzone.com/">Digg Us!</a>
			    <br />
			    2. Subscribe to <a href="/rss">this site's RSS feed</a>
			    <br />
			    3. Browse the site.
			    <br />
			    4. Post your own code snippets to the site!</p>

          	</div>
          </li>
          
          <li <?if(empty($_GET['url'])) { ?>class="active"<?} ?>>
          	<br />
          	<h6>Control panel</h6>
      		<a href="<?=URL?>">
      			<i class="icon-home"></i> Home
      		</a>
          </li>
          <li <?if($_GET['url'] == "Snippets/UserSnippets/add") { ?>class="active"<?} ?>>
      		<a href="<?=URL?>Snippets/UserSnippets/add">
      			<i class="icon-pencil"></i> Add a new snippet
      		</a>
          </li>
          <li <?if($_GET['url'] == "Snippets/UserSnippets/show") { ?>class="active"<?} ?>>
      		<a href="<?=URL?>Snippets/UserSnippets/show">
      			<i class="icon-folder-close"></i> Your snippets
      		</a>
          </li>    
          <li <?if($_GET['url'] == "Snippets/Snippet/favoritedPage") { ?>class="active"<?} ?>>
      		<a href="<?=URL?>Snippets/Snippet/favoritedPage">
      			<i class="icon-star"></i> Your favorited snippets
      		</a>
          </li>                          
          <li>
      		<a href="<?=URL?>MainPage/Index/logout">
      			<i class="icon-off"></i> Log out
      		</a>
          </li>
          <li><hr /></li>
          <li><h6>Best snippets</h6>Coming soon!</li><li><hr /></li>
          <li><h6>Best revisors</h6>Coming soon!</li><li><hr /></li>
          <li><h6>Latest comments</h6>Coming soon!</li><li><hr /></li>
          <li><h6>Top tags</h6>Coming soon!</li><li><hr /></li>
          <li><h6>Top Tags Alphabetically</h6>Coming soon!</li><li><hr /></li>
        </ul>
      </div><!--/.well -->
    </div><!--/span-->
    <div class="span9">
      <div class="well">


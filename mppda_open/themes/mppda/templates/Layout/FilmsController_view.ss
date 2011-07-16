<div id="content" class="typography">
    <% if Breadcrumbs %>
    <div id="breadcrumbs"><p>$Breadcrumbs</p></div>
    <% end_if %>
    <div id="nonav_onecol">
        <% control Item %>
        <h1>$Title <% if Year %>($Year)<% end_if %></h1>

        <dl>
            <dt>Title:</dd>
            <dd>$Title</dd>
            <% if Year %>
            <dt>Year:</dt>
            <dd>$Year</dd>
            <% end_if %>
            <% if IMDBLink %>
            <dt>IMDB Link:</dt>
            <dd><a href="$IMDBLink" target="_blank">$IMDBLink</a></dd>
            <% end_if %>
            <% if StudioID %>
            <dt>Studio:</dt>
            <dd><a href="$Studio.Link">$Studio.Title</a></dd>
            <% end_if %>
            <% if IMDBID %>
            <dt>Movie Poster:</dt>
            <dd>
                <script type="text/javascript"
                        src="http://www.movieposterdb.com/embed.inc.php?movie_id=$IMDBID">
                </script>
            </dd>
            <% end_if %>

        </dl>

        <% include LinkedRecords %>
        <% end_control %>

        <% include ItemComments %>
    </div>
</div>
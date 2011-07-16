<ul class="newsArticles">
    <% if Articles %>
    <% control Articles %>
    <li>
        <h3>$Title</h3>
        <% if Thumbnail %>
	$Thumbnail.SetRatioSize(50,50)
        <% end_if %>
        <p>$Content.Summary(50)</p>
        <p><a href="$Link">Read the full article... </a></p>
    </li>
    <% end_control %>
    <% else %>
    <li>
        <p>Sorry, no news published.</p>
    </li>
    <% end_if %>
</ul>
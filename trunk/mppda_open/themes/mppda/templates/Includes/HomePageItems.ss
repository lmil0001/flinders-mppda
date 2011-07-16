<div id="fp_cols" class="block">
    <div id="fp_news" class="block" >
        <div class="center">
            <h2>Latest News</h2>
            <a href="news" title="Read more News"><img src="themes/mppda/images/icon_news.jpg" width="140" alt="News"  /></a>
        </div>
        <% if LatestNews %>
        <% control LatestNews %>
        <h3>$Title</h3>
        <p>Published: $OriginalPublishedDate.Nice</p>
        $Summary
        <div id="read_more">
            <a href="$Link" title="Read more on &quot;{$Title}&quot;"><img src="themes/mppda/images/read_more.png" alt="Read more image" /></a>
        </div>
        <% end_control %>
        <% else %>
        <p>No news items available</p>
        <% end_if %>
    </div>
    <div id="fp_record" class="block">
        <div class="center">
            <h2>Featured Record</h2>
            <a href="records" title="Read more mppda records"><img src="themes/mppda/images/icon_records.jpg" style="margin-bottom:15px" width="70" alt="Records" /></a>
        </div>
        <% if getRandomFeaturedRecord %>
        <% control getRandomFeaturedRecord %>
        <p><strong>$ShortDescription.LimitSentences(10)</strong></p>
        <p>$LongDescription.LimitSentences(5)</p>
        <div id="read_more">
            <a href="$Link" title="Read more on &quot;{$Title}&quot;"><img src="themes/mppda/images/read_more.png" alt="Read more image" /></a>
        </div>
        <% end_control %>
        <% else %>
        <p>No featured records available</p>
        <% end_if %>
    </div>
    <div id="fp_org" class="block">
        <div class="center">
            <h2>Featured Organisations</h2>
            <a href="organisations" title="Read more on Organisations"><img src="themes/mppda/images/icon_organisations.jpg" style="margin-bottom:15px" width="120" alt="Organisations" /></a>
        </div>
        <% if getRandomFeaturedOrganisation %>
        <% control getRandomFeaturedOrganisation %>
        <p><strong><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></strong></p>
        <% end_control %>
        <% else %>
        <p>No featured organisations available</p>
        <% end_if %>
    </div>
</div>
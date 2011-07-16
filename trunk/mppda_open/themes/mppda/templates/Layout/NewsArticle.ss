<div id="content" class="typography">
    <div id="breadcrumbs">
        <% if Level(2) %>
        <% include Breadcrumbs %>
        <% end_if %>
    </div>
    <div id="nonav_onecol">
        <h1>$Title</h1>
        <div class="newsArticlePublishedDate">
            <p><strong>Published:</strong> $OriginalPublishedDate.Nice</p>
            <% if Author %><p><strong>Author:</strong> $Author</p><% end_if %>
        </div>
        <div class="newsArticleSummary">
	$Summary
        </div>
        <div class="newsArticleContent">
	$Content
        </div>
	$Form
	$PageComments
    </div>
</div>

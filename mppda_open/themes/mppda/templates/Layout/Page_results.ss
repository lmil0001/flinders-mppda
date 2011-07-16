<div id="content" class="typography">
    <div id="breadcrumbs">
        <% if Level(2) %>
        <% include Breadcrumbs %>
        <% end_if %>
    </div>
    <div id="nonav_onecol">
        <h2>$Title</h2>
        <% if Query %>
        <h3 class="searchQuery"><% _t('SEARCHQUERYTERM', 'You searched for') %> &quot;<strong>{$Query}</strong>&quot;</h3>
        <% end_if %>

        <% if Results %>
        <ul id="SearchResults">
            <% control Results %>
            <li>
                <h3><a class="searchResultHeader" href="$Link">
                        <% if MenuTitle %>
		              $MenuTitle
                        <% else %>
		              $Title
                        <% end_if %>
                    </a></h3>
                <p>$Content.LimitWordCount(40)</p>
                <p><a class="readMoreLink" href="$Link" title="<% _t('SEARCHREADMORE', 'Read more about') %> &quot;{$Title}&quot;"><% _t('SEARCHREADMORE', 'Read more about') %> &quot;{$Title}&quot;...</a></p>
            </li>
            <% end_control %>
        </ul>
        <% else %>
        <p>Sorry, your search did not match any results.</p>
        <p>Suggestions:
        <ul>
            <li>Make sure all words are spelled correctly.</li>
            <li>Try different keywords.</li>
            <li>Try more general keywords.</li>
            <li>Try fewer keywords.</li>
        </ul>
        <% end_if %>

        <% if Results.MoreThanOnePage %>
        <div id="PageNumbers">
            <% if Results.NotLastPage %>
            <a class="next" href="$Results.NextLink" title="<% _t('PAGENEXTTITLE', 'View the next page') %>"><% _t('PAGENEXT', 'Next') %></a>
            <% end_if %>
            <% if Results.NotFirstPage %>
            <a class="prev" href="$Results.PrevLink" title="<% _t('PAGEPREVTITLE', 'View the previous page') %>"><% _t('PAGEPREV', 'Next') %></a>
            <% end_if %>
            <span>
                <% control Results.Pages %>
                <% if CurrentBool %>
		            $PageNum
                <% else %>
                <a href="$Link" title="<% _t('PAGENUM', 'View page number') %> $PageNum">$PageNum</a>
                <% end_if %>
                <% end_control %>
            </span>
            <p>Page $Results.CurrentPage of $Results.TotalPages</p>
        </div>
        <% end_if %>
    </div>
</div>
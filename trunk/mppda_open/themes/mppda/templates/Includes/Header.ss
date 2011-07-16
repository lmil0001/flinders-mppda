<div id="header">
    <div id="header_inner">
        <h1><a href="" title="Link to: $SiteConfig.Title Home">$SiteConfig.Title</a></h1>
        $SearchForm
        <% if SiteConfig.Tagline %>
        <p>$SiteConfig.Tagline</p>
        <% end_if %>
        <div id="sitelogo"><a href="$SiteConfig.LogoUrl" target="_blank" title="Link to: $SiteConfig.LogoTitle">$SiteConfig.SiteLogo</a></div>
        <div id="mainmenu">
            <div id="tab">
                <ul>
                    <% control Menu(1) %>
                    <li>
                        <a class="$LinkingMode" href="$Link" title="Link to: $Title"><span>$MenuTitle.XML</span></a>
                    </li>
                    <% end_control %>
                </ul>
            </div>
        </div>
    </div>
</div>
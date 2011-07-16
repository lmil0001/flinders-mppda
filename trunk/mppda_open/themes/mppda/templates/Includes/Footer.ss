<div id="footer">
    <div class="content">
        <div id="footerleft">
            <p><a href="#top">^ Back To Top</a></p>
            <p>&copy;  $Now.Year $Siteconfig.Copyright</p>
            <ul>
                <% control footerLinks %>
                <li>
                    <a class="$LinkingMode" href="$Link" title="Link to: $Title"><span>$MenuTitle.XML</span></a>
                </li>
                <% end_control %>
            </ul>
        </div>
<!--        <div id="footerlogo">
            <a href="http://ands.org.au" target="_blank" title="Link to: Australian National Data Service"><img alt="ANDS Logo" src="themes/mppda/images/footer_ands_logo.png"/></a>
        </div>-->
    </div>
</div>
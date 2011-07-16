<div id="sidebar">
    <img src="themes/mppda/images/sidenav_top.png" alt="side nav curve image" class="block_img" />
    <div id="sidebarbox">
        <h3>$Level(1).Title</h3>
        <% if Menu(2) %>
        <ul id="menu2">
            <% control Menu(2) %>
            <li class="$LinkingMode parent"><a href="$Link" title="Go to the $Title.XML page" class="$LinkingMode parentlink"><span>$MenuTitle.XML</span></a>
                <% if LinkOrSection = section %>
                <% if Children %>
                <ul class="sub">
                    <% control Children %>
                    <li class="$LinkingMode" ><a href="$Link" title="Go to the $Title.XML page" class="$LinkingMode sublink"><span>$MenuTitle.XML</span></a>
                        <% if LinkOrSection = section %>
                        <% if Children %>
                        <ul class="subsub">
                            <% control Children %>
                            <li class="$LinkingMode"><a href="$Link" title="Go to the $Title.XML page" class="$LinkingMode subsublink"><span>$MenuTitle.XML</span></a></li>
                            <% end_control %>
                        </ul>
                        <% end_if %>
                        <% end_if %>
                    </li>
                    <% end_control %>
                </ul>
                <% end_if %>
                <% end_if %>
            </li>
            <% end_control %>
        </ul>
        <% end_if %>
    </div>
    <div id="sidebarbottom"></div>
    <img src="themes/mppda/images/sidenav_bottom.png" alt="side nav curve image" class="block_img" />
</div>
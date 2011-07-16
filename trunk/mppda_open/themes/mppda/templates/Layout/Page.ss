<div id="content" class="typography">
    <div id="breadcrumbs">
        <% if Level(2) %>
        <% include Breadcrumbs %>
        <% end_if %>
    </div>
    <% include Sidebar %>
    <div id="sidenav_twocol">
        $Content
        $Form
        $Pagecomments
    </div>
</div>
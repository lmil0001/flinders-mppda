<div id="content" class="typography">
	<div id="breadcrumbs">
		<% if Level(2) %><% include Breadcrumbs %><% end_if %>
	</div>
	
	<% include Sidebar %>
	
	<div id="sidenav_twocol">
		$Content
		
		<% control FeaturedPeople %>
			<div class="featured-person">
				<h3><a href="$Link">$Name<% if BornYear %> ($BornYear<% if DiedYear %> - $DiedYear<% end_if %>)<% end_if %></a></h3>
				<p>$About.Summary</p>
				<p class="last"><a href="$Link">Read more about $Name &raquo;</a></p>
			</div>
		<% end_control %>
		
		$Form
		$Pagecomments
	</div>
</div>
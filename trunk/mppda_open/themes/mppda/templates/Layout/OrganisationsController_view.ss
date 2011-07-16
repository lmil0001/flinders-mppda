<div id="content" class="typography">
	<% if Breadcrumbs %>
		<div id="breadcrumbs"><p>$Breadcrumbs</p></div>
	<% end_if %>
	<div id="nonav_onecol">
		<% control Item %>
			<h1>$FullTitle</h1>

			<dl>
				<dt>Title:</dd>
				<dd>$Title</dd>
				<% if Division %>
					<dt>Division:</dd>
					<dd>$Division</dd>
				<% end_if %>
			</dl>

			<% if Description %>
				<h2>Description</h2>
				$Description
			<% end_if %>

			<% if Comments %>
				<h2>Comments</h2>
				$Comments
			<% end_if %>

			
			<% if People %>
				<h2>Linked People</h2>
				<ul>
					<% control People  %>
						<li><a href="$Link">$Name</a></li>
					<% end_control %>
				</ul>
			<% end_if %>

			<% include LinkedRecords %>
		<% end_control %>
		
		<% include ItemComments %>
	</div>
</div>
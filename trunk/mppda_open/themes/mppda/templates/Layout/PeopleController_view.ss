<div id="content" class="typography">
	<% if Breadcrumbs %>
		<div id="breadcrumbs"><p>$Breadcrumbs</p></div>
	<% end_if %>
	<div id="nonav_onecol">
		<% control Item %>
			<h1>$Name</h1>

			<dl>
				<dt>Name:</dd>
				<dd>$Name</dd>
				<% if Role %>
					<dt>Role:</dt>
					<dd>$Role</dd>
				<% end_if %>
				<% if BornYear %>
					<dt>Born:</dd>
					<dd>$BornYear</dd>
				<% end_if %>
				<% if DiedYear %>
					<dt>Died:</dd>
					<dd>$DiedYear</dd>
				<% end_if %>
			</dl>

			<% if About %>
				<h2>About</h2>
				$About
			<% end_if %>

			<% if Organisations %>
				<h2>Linked Organisations</h2>
				<ul>
					<% control Organisations %>
						<li><a href="$Link">$Title</a></li>
					<% end_control %>
				</ul>
			<% end_if %>

			<% include LinkedRecords %>
		<% end_control %>
		
		<% include ItemComments %>
	</div>
</div>
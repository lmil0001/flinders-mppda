<h2>Linked Records</h2>
<% if Records %>
	<ul>
		<% control Records %>
			<li><a href="$Link">$DescriptionSummary</a></li>
		<% end_control %>
	</ul>
<% else %>
	<p>There are no records linked to this $Top.SingularName.Lower.</p>
<% end_if %>
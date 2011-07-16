<div class="record-scan">
	<% control Scan %>
		<div class="record-scan-thumb <% if CurrentMember %>record-scan-zoom<% end_if %>" data-image-link="$Thumbnail.URL">
			<a href="$Thumbnail.URL">$Thumbnail.SetWidth(400)</a>
		</div>
	<% end_control %>

	<h3>Scan #$Scan.FrameReference For Record #$Record.ID</h3>
	<% if CurrentMember %>
		<p class="record-scan-link">
			<a href="$Scan.Thumbnail.URL">View the full size scan.</a> You can
			also hover over the image to view a zoomed in version.
		</p>
	<% else %>
		<p class="record-scan-link">
			You must <a href="Security/login">log in</a> to view full size scans.
		</p>
	<% end_if %>
</div>

<% require css(mysite/thirdparty/facebox/src/facebox.css) %>
<% require themedCSS(RecordsController) %>

<% require javascript(sapphire/thirdparty/jquery/jquery.js) %>
<% require javascript(mysite/thirdparty/facebox/src/facebox.js) %>
<% require javascript(mysite/thirdparty/jquery-multipleelements-cycle/jquery.multipleelements.cycle.min.js) %>
<% require javascript(mysite/thirdparty/jquery-zoomer/jquery.zoomer.js) %>
<% require javascript(mysite/javascript/RecordsController.js) %>

<div id="content" class="typography">
	<% if Breadcrumbs %>
		<div id="breadcrumbs"><p>$Breadcrumbs</p></div>
	<% end_if %>
	<div id="nonav_onecol">
		<% control Item %>
			<h1>$Title</h1>
			
			<dl>
				<% if Date %>
					<dt>Date:</dt>
					<dd>$Date.Nice</dd>
				<% end_if %>
				<% if Type %>
					<dt>Record Type:</dt>
					<dd><a href="$ParentController.Link/records/FilterForm?Type__ID=$Type.ID">$Type.Title</a></dd>
				<% end_if %>
				<% if CorrespondenceEntities(Sender) %>
					<dt>From/By:</dt>
					<dd>
						<% control CorrespondenceEntities(Sender) %>
							<a href="$Link">$Title</a><% if Last %><% else %><br /><% end_if %>
						<% end_control %>
					</dd>
				<% end_if %>
				<% if CorrespondenceEntities(Receiver) %>
					<dt>To:</dt>
					<dd>
						<% control CorrespondenceEntities(Receiver) %>
							<a href="$Link">$Title</a><% if Last %><% else %><br /><% end_if %>
						<% end_control %>
					</dd>
				<% end_if %>
				<dt>Reel:</dt>
				<dd>$Reel.Title</dd>
				<% if FrameStart %>
					<dt>Frame Start:</dt>
					<dd>$FrameStart</dd>
				<% end_if %>
				<% if FrameEnd %>
					<dt>Frame End:</dt>
					<dd>$FrameEnd</dd>
				<% end_if %>
				<% if InfoLink %>
					<dt>Link:</dt>
					<dd><a href="$InfoLink">$InfoLink</a></dd>
				<% end_if %>
                                <% if LegacyID %>
					<dt>Legacy ID:</dt>
					<dd>$LegacyID</dd>
				<% end_if %>
                                <% if Year %>
					<dt>Legacy Year:</dt>
					<dd>$Year</dd>
				<% end_if %>
                                <% if Index %>
					<dt>Legacy Index:</dt>
					<dd>$Index</dd>
				<% end_if %>
                                <% if Comments %>
					<dt>Legacy Comments:</dt>
					<dd>$Comments</dd>
				<% end_if %>
			</dl>
			
			<% if ShortDescription %>
				<p>$ShortDescription</p>
			<% end_if %>
			
			<h2>Keywords</h2>
			<% if Keywords %>
				<p id="linked-keywords">
					<% control LinkedKeywords %>
						<a href="$Link">$Title ($Count)</a><% if Last %><% else %>, <% end_if %>
					<% end_control %>
					<a href="$Link(keywords)" id="show-keywords">Show all keywords&hellip;</a>
				</p>
			<% else %>
				<p>
					There are no keywords associated with this record.
					<a href="$Link(keywords)" id="show-keywords">Show all keywords&hellip;</a>
				</p>
			<% end_if %>
			
			<div id="all-keywords" class="loading">
			</div>
			
			<% if Scans %>
				<h2>Scans</h2>
				<div id="scans-container">
					<div id="scans-cycle-prev" class="scans-cycle">
						<a href="#">Scroll Left</a>
					</div>
					<div id="scans">
						<div id="scans-overlay"></div>
						<ul>
							<% control Scans %>
								<li>
									<a href="$Top.Link/scan/$Number" title="Scan $FrameReference  for Record #$Top.Item.ID">
										$Thumbnail.SetSize(115, 150)
										<span>$FrameReference</span>
									</a>
								</li>
							<% end_control %>
						</ul>
					</div>
					<div id="scans-cycle-next" class="scans-cycle">
						<a href="#">Scroll Right</a>
					</div>
				</div>
			<% end_if %>
			
			<% if TranscriptLinks %>
				<h2>Transcript Links</h2>
				<ul>
					<% control TranscriptLinks %>
						<li><a href="$Link">$Title</a></li>
					<% end_control %>
				</ul>
			<% end_if %>
			
			<% if Documents %>
				<h2>Documents</h2>
				<% if CurrentMember %>
					<ul>
						<% control Documents %>
							<li><a href="$File.URL">$Title</a> ($File.Size, $File.Extension.Upper)</li>
						<% end_control %>
					</ul>
				<% else %>
					<p>Please <a href="Security/login">log in</a> to view documents associated to this record.</p>
				<% end_if %>
			<% end_if %>
			
			<% if LongDescription %>
				<h2>Long Description:</h2>
				$LongDescription
			<% end_if %>
			
			<% if Films %>
				<h2>Linked Films</h2>
				<ul>
					<% control Films %>
						<li><a href="$Link">$Title</a></li>
					<% end_control %>
				</ul>
			<% end_if %>
			
			
			<% if Organisations %>
				<h2>Linked Organisations</h2>
				<ul>
					<% control Organisations %>
						<li><a href="$Link">$Summary</a></li>
					<% end_control %>
				</ul>
			<% end_if %>
			
			<% if People %>
				<h2>Linked People</h2>
				<ul>
					<% control People %>
						<li><a href="$Link">$Summary</a></li>
					<% end_control %>
				</ul>
			<% end_if %>
		<% end_control %>
		
		<% include ItemComments %>
	</div>
</div>
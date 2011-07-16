<% require javascript(sapphire/thirdparty/jquery/jquery.js) %>
<% require javascript(sapphire/thirdparty/jquery-metadata/jquery.metadata.js) %>
<% require javascript(mysite/javascript/ListingController.js) %>
<% require themedCSS(ListingController) %>

<div id="content" class="typography">
	<div id="sidebar">
		<img src="themes/mppda/images/sidenav_top.png" alt="side nav curve image" />
		<div id="sidebarbox">
			<h3>$Title</h3>
			$CachedFilterForm
		</div>
		<div id="sidebarbottom"></div>
		<img src="themes/mppda/images/sidenav_bottom.png" alt="side nav curve image" />
		
		<div id="listing-types">
			<h3>Browse</h3>
			<ul>
				<% control ListingLinks %>
					<li>
						<% if Current %>
							$Title
						<% else %>
							<a href="$Link">$Title</a>
						<% end_if %>
					</li>
				<% end_control %>
			</ul>
		</div>
	</div>
	<div id="sidenav_twocol">
		<% if Content %>$Content<% end_if %>
		<table id="listing-items">
			<thead>
				<tr>
					<% control HeaderRow %>
						<th class="$Name.HTMLATT">
							<% if Sortable %>
								<a href="$SortLink" class="$SortClass">$Title</a>
							<% else %>
								$Title
							<% end_if %>
						</th>
					<% end_control %>
				<tr>
			</thead>
			<tbody>
				<% if TableItems %>
					<% control TableItems %>
						<tr class="$EvenOdd">
							<% control Me %>
								<td class="$Name.HTMLATT">
									<a href="$Link">
										<% if Value %>$Value<% end_if %>
									</a>
								</td>
							<% end_control %>
						</tr>
					<% end_control %>
				<% else %>
					<tr id="listing-no-items">
						<td colspan="$HeaderRow.Count">No $PluralName found.</td>
					</tr>
				<% end_if %>
			</tbody>
		</table>

		<div id="listing-pagination">
			<div id="listing-per-page">
				<% control PerPageSummary %>
					<% if Current %>
						$Num
					<% else %>
						<a href="$Link">$Num</a>
					<% end_if %>
				<% end_control %>
				$PluralName per page
			</div>

			<div id="listing-items-num">
				Displaying $TableItems.Count of $TableItems.TotalItems results
			</div>

			<% if TableItems.MoreThanOnePage %>
				<div id="listing-items-pagination-controls">
					<% if TableItems.NotFirstPage %>
						<a class="prev" href="$TableItems.PrevLink">← Previous</a>
					<% end_if %>
					<% control TableItems.PaginationSummary(4) %>
						<% if CurrentBool %>
							$PageNum
						<% else %>
							<% if Link %>
								<a href="$Link">$PageNum</a>
							<% else %>
								&hellip;
							<% end_if %>
						<% end_if %>
					<% end_control %>
					<% if TableItems.NotLastPage %>
						<a class="next" href="$TableItems.NextLink">Next →</a>
					<% end_if %>
				</div>
			<% end_if %>
		</div>
	</div>
</div>
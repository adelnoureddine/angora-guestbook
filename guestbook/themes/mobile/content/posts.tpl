<!-- BEGIN: posts -->

	<!-- BEGIN: search_countries -->
		<div class="countriesTitle"><img src="{SEARCH_COUNTRY_ICON}" alt="{SEARCH_COUNTRY_NAME}" /> {SEARCH_COUNTRY_NAME}</div>
	<!-- END: search_countries -->
	
	<!-- BEGIN: num_posts -->
		<div class="countriesTitle">{MESSAGES_LANG} {NUM_MESSAGES}</div>
	<!-- END: num_posts -->

	<!-- BEGIN: fetch_posts -->
		<div class="posts">
			<table class="tablePosts">
				<tr class="topInfos">
					<td align="left">
						<a href="{PAGE_ADDR}">{NAME}</a>, {DATE}, {LOCATION}, {COUNTRY}
					</td>
				</tr>
				<tr>
					<td class="message">{MESSAGE}</td>
				</tr>
				<tr class="topInfos">
				<td align="left">
					<img src="{RATING_ICON}" alt="{RATING}" /> 
					<img src="{OS_ICON}" alt="OS" /> 
					<img src="{BROWSER_ICON}" alt="Browser" />
				</td>
				</tr>
			</table>
			<!-- BEGIN: fetch_adminReply -->
				<table class="tableReply">
					<tr class="topInfos">
						<td align="left">
							{AD_NAME}, {AD_DATE} 
						</td>
					</tr>
					<tr>
						<td class="message">{AD_MESSAGE}</td>
					</tr>
				</table>
			<!-- END: fetch_adminReply -->
		</div>
	<!-- END: fetch_posts -->
	
	<!-- BEGIN: no_posts -->
		<div>{NO_MESSAGES}</div>
	<!-- END: no_posts -->

<!-- END: posts -->
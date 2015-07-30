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
				<tr class="topInfos" width="20%">
					<td align="left" valign="top">
						<a href="{PAGE_ADDR}">{NAME}</a>
						<br />
						{DATE}, {LOCATION}
						<br />
						<a href="{COUNTRY_ADDR}"><img src="{COUNTRY_ICON}" alt="{COUNTRY}" /></a>
						<img src="{OS_ICON}" alt="OS" /> <img src="{BROWSER_ICON}" alt="Browser" />
						<br />
						<img src="{RATING_ICON}" alt="{RATING}" />
					</td>
					<td class="message" width="80%">{MESSAGE}</td>
				</tr>
			</table>
			<!-- BEGIN: fetch_adminReply -->
				<table class="tableReply">
					<tr class="topInfos">
						<td align="left" valign="top" width="20%">
							{AD_NAME}, {AD_DATE} 
						</td>
						<td class="message" width="80%">{AD_MESSAGE}</td>
					</tr>
				</table>
			<!-- END: fetch_adminReply -->
		</div>
	<!-- END: fetch_posts -->
	
	<!-- BEGIN: no_posts -->
		<div>{NO_MESSAGES}</div>
	<!-- END: no_posts -->

<!-- END: posts -->
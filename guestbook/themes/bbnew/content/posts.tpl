<!-- BEGIN: posts -->
	
	<!-- BEGIN: search_countries -->
		<div class="countriesTitle"><img src="{SEARCH_COUNTRY_ICON}" alt="{SEARCH_COUNTRY_NAME}" /> {SEARCH_COUNTRY_NAME}</div>
	<!-- END: search_countries -->

	<!-- BEGIN: search_os -->
		<div class="countriesTitle"><img src="{SEARCH_OS_ICON}" alt="{SEARCH_OS_NAME}" /> {SEARCH_OS_NAME}</div>
	<!-- END: search_os -->

	<!-- BEGIN: search_browsers -->
		<div class="countriesTitle"><img src="{SEARCH_BROWSER_ICON}" alt="{SEARCH_BROWSER_NAME}" /> {SEARCH_BROWSER_NAME}</div>
	<!-- END: search_browsers -->

	<!-- BEGIN: search_rates -->
		<div class="countriesTitle"><img src="{SEARCH_RATE_ICON}" alt="{SEARCH_RATE_NAME}" /></div>
	<!-- END: search_rates -->
	
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
						{DATE}, <a href="https://www.openstreetmap.org/search?query={LOCATION}" target="_blank">{LOCATION}</a>
						<br />
						<a href="{COUNTRY_ADDR}"><img src="{COUNTRY_ICON}" alt="{COUNTRY}" /></a>
						<a href="{OS_ADDR}"><img src="{OS_ICON}" alt="OS" /></a> <a href="{BROWSER_ADDR}"><img src="{BROWSER_ICON}" alt="Browser" /></a>
						<br />
						<a href="{RATING_ADDR}"><img src="{RATING_ICON}" alt="{RATING}" /></a>
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

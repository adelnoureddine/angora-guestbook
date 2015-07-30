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
					<td align="left" width="84%">
						<a href="{PAGE_ADDR}">{NAME}</a>, <span class="small">{DATE}, {LOCATION}</span>
					</td>
					<td align="right" width="16%">
						<img src="{RATING_ICON}" alt="{RATING}" />
						<a href="{COUNTRY_ADDR}"><img src="{COUNTRY_ICON}" alt="{COUNTRY}" width="18px" height="12px" /></a>
					</td>
				</tr>
				<tr>
					<td width="84%" class="message">{MESSAGE}</td>
					<td align="right" width="16%">
						<img src="{OS_ICON}" alt="OS" /> <img src="{BROWSER_ICON}" alt="Browser" width="15px" height="15px" />
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
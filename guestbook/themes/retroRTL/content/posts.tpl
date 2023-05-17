<!-- BEGIN: posts -->

	<script type="text/javascript">
		function toggle(obj) {
			var el = document.getElementById('i' + obj);
			var el1 = document.getElementById('m' + obj);
			if ( el.style.display != 'none' ) {
				el.style.display = 'none';
				el1.src = 'images/posts/toggle.gif';
			}
			else {
				el.style.display = '';
				el1.src = 'images/posts/toggle1.gif';
			}
		}
	</script>
	
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
				<tr class="topInfos">
					<td align="right" width="30%"><a href="{PAGE_ADDR}">{NAME}</a></td>
					<td align="right" width="20%"><a href="https://www.openstreetmap.org/search?query={LOCATION}" target="_blank">{LOCATION}</a></td>
					<td align="right" width="35%">{DATE}</td>
					<td align="right" width="5%"><a href="{COUNTRY_ADDR}"><img src="{COUNTRY_ICON}" alt="{COUNTRY}" /></a></td>
					
					<td align="left" width="10%">
						<a href="javascript:toggle({POST_ID})"><img src="images/posts/toggle1.gif" id="m{POST_ID}" alt="toggle" /></a>
					</td>
				</tr>
				<tr>
					<td colspan="5" class="message" id='i{POST_ID}'>{MESSAGE}</td>
				</tr>
				<tr class="topInfos">
					<td align="right"><a href="{RATING_ADDR}"><img src="{RATING_ICON}" alt="{RATING}" /></a></td>
					<td colspan="3"></td>
					<td align="left"><a href="{OS_ADDR}"><img src="{OS_ICON}" alt="OS" /></a> <a href="{BROWSER_ADDR}"><img src="{BROWSER_ICON}" alt="Browser" /></a></td>
				</tr>
			</table>
			<!-- BEGIN: fetch_adminReply -->
				<table class="tableReply">
					<tr class="topInfos">
						<td align="right">{AD_NAME}</td>
						<td algin="right">{AD_DATE}</td>
					</tr>
					<tr>
						<td class="message" colspan="2">{AD_MESSAGE}</td>
					</tr>
				</table>
			<!-- END: fetch_adminReply -->
		</div>
	<!-- END: fetch_posts -->
	
	<!-- BEGIN: no_posts -->
		<div>{NO_MESSAGES}</div>
	<!-- END: no_posts -->

<!-- END: posts -->

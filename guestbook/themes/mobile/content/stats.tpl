<!-- BEGIN: stats -->
	<div class="stats">
	
		<!-- BEGIN: stats_posts -->
			<div align="right">{LANG_WHEN} : {ALL_TIME} - {LAST_MONTH}</a></div>
		
			<table class="statistics">
				<tr class="topStats">
					<td width="30%">{LANG_OS}</td>
					<td>{LANG_NB_POSTS}</td>
					<td width="165px">%</td>
				</tr>
			<!-- BEGIN: statOS -->
				<tr>
					<td>{OS_NAME}</td>
					<td>{NUM_OS}</td>
					<td><img src="images/stats/bar.gif" alt="{PER_OS}" width="{PER_OS}" height="12" /> {PER_OS}%</td>
				</tr>
			<!-- END: statOS -->
			
			</table>
			
			<table class="statistics">
				<tr class="topStats">
					<td width="30%">{LANG_BROWSER}</td>
					<td>{LANG_NB_POSTS}</td>
					<td width="165px">%</td>
				</tr>
		
			<!-- BEGIN: statBrowser -->
				<tr>
					<td>{BROWSER_NAME}</td>
					<td>{NUM_BROWSER}</td>
					<td><img src="images/stats/bar.gif" alt="{PER_BROWSER}" width="{PER_BROWSER}" height="12" /> {PER_BROWSER}%</td>
				</tr>
			<!-- END: statBrowser -->
			
			</table>
		
			<table class="statistics">
				<tr class="topStats">
					<td width="30%">{LANG_COUNTRY}</td>
					<td>{LANG_NB_POSTS}</td>
					<td width="165px">%</td>
				</tr>
				
			<!-- BEGIN: flagStats -->
				<tr>
					<td>
						<img src="{FLAG_ICON}" alt="{FLAG_ID}" /> <a href="{URL_FLAG}">{NAME_FLAG}</a>
					</td>
					<td>{NUM_FLAG}</td>
					<td><img src="images/stats/bar.gif" alt="{PER_FLAG}" width="{PER_FLAG}" height="12" /> {PER_FLAG}%</td>
				</tr>
			<!-- END: flagStats -->
			
				<tr class="topStats">
					<td>{LANG_TOTAL}</td>
					<td>{TOTAL_FLAGS}</td>
					<td>100%</td>
				</tr>
			</table>
		<!-- END: stats_posts -->

		<!-- BEGIN: no_posts -->
			<div>{NO_MESSAGES}</div>
		<!-- END: no_posts -->
	</div>
<!-- END: stats -->
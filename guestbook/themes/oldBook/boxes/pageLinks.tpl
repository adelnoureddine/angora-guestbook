<!-- BEGIN: pageLinks -->
	<table class="pageLinks">
		<tr>
			<td align="left" width="30%">
				<!-- BEGIN: previous -->
					<a href="{URL_PREVIOUS}">{LANG_PREVIOUS}</a>
				<!-- END: previous -->
			</td>
			<td align="center" width="40%">
				{LANG_PAGE} {PAGE_NUM}/{NUM_PAGES}
			</td>
			<td align="right" width="20%">
				<!-- BEGIN: next -->
					<a href="{URL_NEXT}">{LANG_NEXT}</a>
				<!-- END: next -->
			</td>
			<td align="center" width="10%">
				<select onchange="location = this.options[this.selectedIndex].value;">
					<!-- BEGIN: allPages -->
						<option value="{URL_PAGE}" {SELECTED}>{PAGE_NUM}</option>
					<!-- END: allPages -->
				</select>
			</td>
		</tr>
	</table>
<!-- END: pageLinks -->
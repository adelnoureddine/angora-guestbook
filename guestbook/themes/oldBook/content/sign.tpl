<!-- BEGIN: sign -->
	{SCRIPTS}
	
	<!-- BEGIN: bannedIP -->
		<div class="signError">
			{IP_BANNED}
		</div>	
	<!-- END: bannedIP -->
	
	<!-- BEGIN: signCheck -->
		<div class="signError">
			{ERROR_MSG}
		</div>
	<!-- END: signCheck -->
	
	<!-- BEGIN: signErr -->
		<div class="signError">
			{ERROR_MSG}
		</div>
	<!-- END: signErr -->
	
	<!-- BEGIN: signOK -->
		<div class="signOK">
			<p>{LANG_OK_MSG}</p>
			<meta http-equiv="refresh" content="2;url={URL_REDIRECT}">
			<img src="images/posts/loading.gif" alt="loading" /><br />
			<a href='{URL_REDIRECT}'>{LANG_REDIRECT}</a>
		</div>	
	<!-- END: signOK -->
	
	<!-- BEGIN: signForm -->
		<div>
			<form method="post" action="{URL_SIGN}" id="{FORM_NAME}">
				<fieldset>
					<table border="0">
						<tr>
							<td>{LANG_NAME}</td>
							<td><input type="text" name="{NAME_FIELD}" maxlength="{MAX_CHAR_FIELD}" value="{NAME_VALUE}" /></td>
						</tr>
						<tr>
							<td>{LANG_LOCATION}</td>
							<td><input type="text" name="{LOCATION_FIELD}" maxlength="{MAX_CHAR_FIELD}" value="{LOCATION_VALUE}" /></td>
						</tr>
						<tr>
							<td>{LANG_COUNTRY}</td>
							<td>
								<select name="{COUNTRY_FIELD}" style="width:160px" onchange="showFlag(this)">
									<option value="00">--------</option>
									<!-- BEGIN: countries -->
										<option value="{ID_COUNTRY}" {SELECTED}>{COUNTRY_NAME}</option>
									<!-- END: countries -->
								</select>
							</td>
						</tr>
						<tr>
							<td>{LANG_EMAIL}</td>
							<td><input type="text" name="{EMAIL_FIELD}" maxlength="{MAX_CHAR_FIELD}" value="{EMAIL_VALUE}" /></td>
						</tr>
						<tr>
							<td>{LANG_RATING}</td>
							<td>
								<select name="{RATING_FIELD}"  onchange="showStar(this)">
									<option value="-1">--</option>
									<!-- BEGIN: rating -->
										<option value="{ID_RATE}" {SELECTED}>{RATE_NAME}</option>
									<!-- END: rating -->
								</select>
								<img id="{FLAG_ICON}" src="{FLAG_IMG}" alt="{LANG_COUNTRY}" />
								<img id="{STAR_ICON}" src="{STAR_IMG}" alt="{LANG_RATING}" />
							</td>
						</tr>
					</table>
					<br />{LANG_MESSAGE}<br />
					<textarea name="{MESSAGE_FIELD}" id="{MESSAGE_FIELD}" style="width: 305px; height: 200px;">{MESSAGE_VALUE}</textarea>
					<!-- BEGIN: captcha -->
						<p>
							{LANG_CAPTCHA} : <input type="text" name="{CAPTCHA_FIELD}" size="5" maxlength="5" autocomplete="off" /> {CAPTCHA}
						</p>
					<!-- END: captcha -->
					<!-- BEGIN: recaptcha -->
						<p>{CAPTCHA}</p>
					<!-- END: recaptcha -->
					<p>
						<input type="hidden" name="{HIDDEN_FIELD}" value="" />
						<input type="submit" name="submit" value="{LANG_SEND}" />
					</p>
				</fieldset>
			</form>
		</div>
	<!-- END: signForm -->
<!-- END: sign -->
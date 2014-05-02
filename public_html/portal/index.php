<?php require("libinc/header.php"); ?>
	<style type="text/css">
		div#divNav a{
			display: block;
			padding: 3px;
			cursor: pointer;
		}
		ui-datepicker { font-size: .8em; }
	</style>
		<div id="portalNav" style="padding: 10px;">
			<div id="divNav">
				<h4>Portal Menu</h4>
				<a ng-click="chgPortalTemplate('templates/portalMain.html')">PortalHome</a>
				<a ng-click="chgPortalTemplate('templates/portalPersonal.html')">Personal Information</a>
				<a ng-click="chgPortalTemplate('templates/portalInsurance.html')">Insurance Information</a>
				<a ng-click="chgPortalTemplate('templates/portalEmployer.html')">Employer Information</a>
				<h4>SD Patient Forms</h4>
				<a ng-click="chgPortalTemplate('templates/portalForms.html')">Forms</a>
			</div>
		</div>
		<div id="portalContent">
			<h3>Patient Portal</h3>
			<div id="sd_pageWrap" ng-model="pgTemplate" ng-include="pgTemplate"></div>
		</div>
		<div id="chgPassword">
			<form id="frmChgPassword" name="frmChgPassword" action="" method="post">
				<table border="0" cellpadding="3" cellspacing="0" style="width: 100%;">
					<tr>
						<td style="width: 25%;"><label for="oldpw">Old Password:</label></td>
						<td><input type="password" id="oldpw" name="oldpw" value="" style="width: 100%;"/></td>
					</tr>
					<tr>
						<td><label for="newpw">New Password:</label></td>
						<td><input type="password" id="newpw" name="newpw" value="" style="width: 100%;"/></td>
					</tr>
					<tr>
						<td><label for="newpwmatch">Re-Type New Password:</label></td>
						<td><input type="password" id="newpwmatch" name="newpwmatch" value="" style="width: 100%"/></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							<button type="submit">Change Password</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="confirmChgPassword">
			<div id="confirmChgPasswordIcon" style="width: 40px; float: left; margin-right: 10px;"><img src="/img/icons/get_info.png" width="32" height="32"/></div>
			<div id="confirmChgPasswordTxt" style="width: 320px;"></div>
		</div>
		<div id="confirmCancelDialog">
			<div id="confirmCancelIcon" style="width: 40px; float: left; margin-right: 10px;"><img src="/img/icons/questionmark.png" width="32" height="32"/></div>
			<div id="confirmCancelText" style="width: 320px;"></div>
		</div>
<?php require("libinc/footer.php"); ?>
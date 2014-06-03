<script language="javascript" src="/js/products/products.js"></script>
<script language="javascript" src="/js/jquery.nyroModal/js/jquery.nyroModal.custom.min.js"></script>
<div id="prodForm" ng-app ng-controller="ProdCtrl">
	<table width="80%" border="0" cellpadding="1" cellspacing="0">
		<tr>
			<td>
				<input type="radio" id="rbMachines" name="prodType" checked="checked" value="machines" onclick="fnGetItems('machine')"/> CPAP/Auto PAP Machines<br />
				<input type="radio" id="rbFullFaceMasks" name="prodType" value="maskfullface" onclick="fnGetItems('maskfullface')"/> Full Face Masks&nbsp;&nbsp;
				<input type="radio" id="rbNasalMasks" name="prodType" value="masknasal" onclick="fnGetItems('masknasal')"/> Nasal Masks&nbsp;&nbsp;
				<input type="radio" id="rbNasalPillowMasks" name="prodType" value="masknasalpillow" onclick="fnGetItems('masknasalpillow')"/> Nasal Pillow Masks
			</td>
		</tr>
		<tr>
			<td id="tdProdSelect"></td>
		</tr>
	</table>
</div>
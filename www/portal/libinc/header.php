<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Patient Portal</title>

		<link rel="shortcut icon" href="/favicon.png">
		<link rel="icon" href="/favicon.png">
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="/css/Default.css" />
		<link rel="stylesheet" type="text/css" href="/portal/css/sdportal.css"/>

		<script language="javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script language="javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script language="javascript" src="/portal/js/vendor/jquery.validate.min.js"></script>
		<script language="javascript" src="/portal/js/vendor/additional-methods.min.js"></script>
		<script language="javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>

		<script language="javascript" src="/portal/js/sdportal.js"></script>
		<script language="javascript" src="/portal/js/controllers/portalCtrl.js"></script>
		<script language="javascript" src="/portal/js/controllers/personCtrl.js"></script>
	</head>
	<body ng-app>
		<div class="sf_outer_wrapper">
			<div class="sf_wrapper">
				<nav class="nav">
					<ul>
						<li><a href="/index.sd">Home</a></li>
						<li><a href="/about/index.sd">About Us</a>
							<ul class="subnav">
								<li><a href="/about/staff.sd">Staff</a></li>
								<li><a href="/about/resources.sd">Resources and Forms</a></li>
								<li><a href="/about/locations.sd">Locations</a></li>
								<li><a href="/about/sleepDisorders.sd">Sleep Disorders</a></li>
								<li><a href="/about/innovations.sd">Home Sleep Innovations</a></li>
							</ul>
						</li>
						<li><a href="#/services/">Services</a>
							<ul class="subnav">
								<li><a href="/services/testing.sd">In-Facility Testing</a></li>
								<li><a href="/services/cpap.sd">CPAP</a></li>
								<li><a href="/services/monitoring.sd">Follow Up &amp; Monitoring</a></li>
								<li><a href="/services/insurance.sd">Insurance Providers</a></li>
								<li><a href="/services/education.sd">Continuing Education</a></li>
							</ul>
						</li>
						<li><a href="/contact.sd">Contact</a></li>
					</ul>
				</nav>
				<div class="sf_extra5"><span></span></div>
				<div id="divPortal" class="sf_main_wrapper" style="min-height: 200px;" ng-controller="PortalCtrl">
<?php
/*
 * $Id$
 * 
 * written by Manuel Kasper <mk@neon1.net> for Monzoon Networks AG
 */

error_reporting(0);

require_once('func.inc');

$as = str_replace('as','',str_replace(' ','',strtolower($_GET['as'])));
if ($as)
	$asinfo = getASInfo($as);

$rrdfile = getRRDFileForAS($as);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Refresh" content="300" />
	<title>History for AS<?php echo $as; ?>: <?php echo $asinfo['descr']; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body  onload="document.forms[0].as.focus(); document.forms[0].as.select();">

<div id="nav"><?php include('headermenu.inc'); ?></div>

<?php if ($as): ?>
<div class="pgtitle">History for AS<?php echo $as; ?>: <?php echo $asinfo['descr']; ?>
	<?php if (!empty($customlinks)): ?>
	<div class="customlinks">
	<?php 
		$htmllinks = array();
		foreach ($customlinks as $linkname => $url) {
			$url = str_replace("%as%", $as, $url);
			$htmllinks[] = "<a href=\"$url\" target=\"_blank\">" . htmlspecialchars($linkname) . "</a>\n";
		}
		echo join(" | ", $htmllinks);
		?>
	</div>
	<?php endif; ?>
</div>

<?php if (!file_exists($rrdfile)): ?>
<p>No data found for AS <?php echo $as; ?></p>
<?php else: ?>
<div class="title">4 Hourly</div>
<?php if ($showv6): ?>
<img class="detailgraph" src="gengraph.php?v=4&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 4*3600);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV4"); ?>" alt="weekly graph" />
<img class="detailgraph2" src="gengraph.php?v=6&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 4*3600);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV6"); ?>" alt="weekly graph" />
<?php else: ?>
<img class="detailgraph" src="gengraph.php?as=<?php echo $as; ?>&amp;start=<?php echo (time() - 4*3600);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . ""); ?>" alt="weekly graph" />
<?php endif; ?>

<div class="title">Daily</div>
<?php if ($showv6): ?>
<img class="detailgraph" src="gengraph.php?v=4&amp;as=<?php echo $as; ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV4"); ?>" alt="daily graph" />
<img class="detailgraph2" src="gengraph.php?v=6&amp;as=<?php echo $as; ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV6"); ?>" alt="daily graph" />
<?php else: ?>
<img class="detailgraph" src="gengraph.php?as=<?php echo $as; ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . ""); ?>" alt="daily graph" />
<?php endif; ?>

<div class="title">Weekly</div>
<?php if ($showv6): ?>
<img class="detailgraph" src="gengraph.php?v=4&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 7*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV4"); ?>" alt="weekly graph" />
<img class="detailgraph2" src="gengraph.php?v=6&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 7*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV6"); ?>" alt="weekly graph" />
<?php else: ?>
<img class="detailgraph" src="gengraph.php?as=<?php echo $as; ?>&amp;start=<?php echo (time() - 7*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . ""); ?>" alt="weekly graph" />
<?php endif; ?>

<div class="title">Monthly</div>
<?php if ($showv6): ?>
<img class="detailgraph" src="gengraph.php?v=4&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 30*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV4"); ?>" alt="monthly graph" />
<img class="detailgraph2" src="gengraph.php?v=6&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 30*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV6"); ?>" alt="monthly graph" />
<?php else: ?>
<img class="detailgraph" src="gengraph.php?as=<?php echo $as; ?>&amp;start=<?php echo (time() - 30*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . ""); ?>" alt="monthly graph" />
<?php endif; ?>

<div class="title">Yearly</div>
<?php if ($showv6): ?>
<img class="detailgraph" src="gengraph.php?v=4&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 365*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV4"); ?>" alt="yearly graph" />
<img class="detailgraph2" src="gengraph.php?v=6&amp;as=<?php echo $as; ?>&amp;start=<?php echo (time() - 365*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . " - IPV6"); ?>" alt="yearly graph" />
<?php else: ?>
<img class="detailgraph" src="gengraph.php?as=<?php echo $as; ?>&amp;start=<?php echo (time() - 365*86400);?>&amp;end=<?php echo time(); ?>&amp;dname=<?php echo rawurlencode("AS" . $as . " - " . $asinfo['descr'] . ""); ?>" alt="yearly graph" />
<?php endif; ?>
<?php endif; ?>
<?php else: ?>

<div class="pgtitle">View history for an AS</div>

<form action="" method="get">
AS: <input type="text" name="as" size="6" />
<input type="submit" value="Go" />
</form>
<?php endif; ?>

<?php include('footer.inc'); ?>

</body>
</html>

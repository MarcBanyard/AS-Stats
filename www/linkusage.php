<?php
/*
 * $Id$
 * 
 * written by Manuel Kasper <mk@neon1.net> for Monzoon Networks AG
 */

require_once('func.inc');

$knownlinks = getknownlinks();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Refresh" content="300" />
	<title>Link usage</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div id="nav"><?php include('headermenu.inc'); ?></div>
<div class="pgtitle">Link usage - top 10 AS per link</div>

<table class="astable">

<?php $i = 0; foreach ($knownlinks as $link):
$class = (($i % 2) == 0) ? "even" : "odd";
?>
<tr class="<?php echo $class; ?>">
	<?php if (($showtitledetail && !$hidelinkusagename) || (!$showtitledetail)): ?>
	<th style="width: 15em">
		<div class="title">
			<?php echo $link['descr']; ?>
		</div>
	</th>
	<?php endif; ?>
	<td>
		<?php if ($showv6): ?>
		<img alt="link graph" src="linkgraph.php?link=<?php echo $link['tag']; ?>&amp;width=500&amp;height=300&amp;v=4&amp;dname=<?php echo rawurlencode($link['descr'] . " - IPV4"); ?>" width="581" height="499" border="0" />
		<img alt="link graph" src="linkgraph.php?link=<?php echo $link['tag']; ?>&amp;width=500&amp;height=300&amp;v=6&amp;dname=<?php echo rawurlencode($link['descr'] . " - IPV4"); ?>" width="581" height="499" border="0" />
		<?php else: ?>
		<img alt="link graph" src="linkgraph.php?link=<?php echo $link['tag']; ?>&amp;width=500&amp;height=300&amp;dname=<?php echo rawurlencode($link['descr'] . ""); ?>" width="581" height="481" border="0" />
		<?php endif; ?>
	</td>
</tr>
<?php $i++; endforeach; ?>

</table>

<?php include('footer.inc'); ?>

</body>
</html>

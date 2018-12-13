<?
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=html-to-excel-".date('dmY').".xls");
?>
<table cellpadding="0" cellspacing="0" border="1">
	<thead> 
		<tr>
			<th>Col 1</th>
			<th>Col 2</th>
			<th>Col 3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Cell 1</td>
			<td>Cell 2</td>
			<td>Cell 3</td>                    
		</tr>
	</tbody>
</table>
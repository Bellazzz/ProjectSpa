<thead>
	<tr>
		<th class="icon-col"></th>
        <th class="action-col"></th>
		<?
		// Create table head
		foreach($tableData[0] as $fieldEn => $value) {
			$fieldTh	 = $tableInfo['fieldNameList'][$fieldEn];
			$classSorter = 'tablesorter-header';
			if($fieldEn == $sortCol) {
				$classSorter .= $sortBy == 'asc' ? ' tablesorter-headerAsc' : ' tablesorter-headerDesc';
			}
			?>
			<th id="tf-<?=$fieldEn?>" class="<?=$classSorter?>">
				<div class="table-sorter-header-inner">
					<a class="mbk-table-header-content"><?=$fieldTh?></a>
				</div>
			</th>
			<?
		}
		?>
	</tr>
</thead>
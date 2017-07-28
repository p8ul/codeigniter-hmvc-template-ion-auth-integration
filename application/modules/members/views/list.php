<div class="panel panel-white">
<div class="panel-heading">
		<h4 class="panel-title">Church Members</h4>
		<div class="heading-elements">
		
		</div>
	</div>
<div class="panel-body">
<table class="table datatable-show-all">
<thead>
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Middle Name</th>
		<th>DOB</th>
		<th>Gender</th>
		<th>District</th>
		<th>Membership</th>
		<th>Baptism</th>
		<th>Phone</th>
		<th class="text-center"></th>
	</tr>
</thead>
<tbody>

<?php foreach ($members as $member): ?>
	<tr>
		<td><?=$member->first_name;?></td>
		<td><?=$member->last_name;?></td>		
		<td><?=$member->middle_name;?></td>
		<td><?=$member->dob;?></td>
		<td><?=$member->gender;?></td>
		<td><?=$member->district;?></td>
		<td><?=$member->membership;?></td>
		<td><?=$member->baptism_date;?></td>
		<td><?=$member->phone;?></td>
	</tr>
<?php endforeach; ?>


</tbody>
</table>
</div>
</div>
<?=theme_js("plugins/tables/datatables/datatables.min.js");?>
<?=theme_js("pages/datatables_advanced.js");?>
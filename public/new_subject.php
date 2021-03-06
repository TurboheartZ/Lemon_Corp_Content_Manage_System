<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php $layout_context ="admin"; ?>
<?php include("../includes/layouts/header.php") ?>
<?php find_selected_page(); ?>

<div id="main" >
  <div id="navigation">
	<h2>Navigation</h2>
		<a href = "manage_content.php">&laquo; Manage Content </a><br/>
		<?php echo navigation($current_subject, $current_page); ?>
  </div>
  <div id="page">
		<?php echo message();	?>
		<?php $errors = errors();	echo form_errors($errors); ?>
		<h2>Create Subject</h2>
		<form action = "create_subject.php" method = "post">
			<p>
				Menu Name : <input type = "text" name = "menu_name" value = "" />
			</p>
			<p>
				Position : 
				<select name = "position">
					<?php 
					$subject_set = find_all_subjects(false);
					$row_num = mysqli_num_rows($subject_set);
					for($count = 1; $count<=$row_num+1; $count++){
						echo "<option value = \"{$count}\">{$count}</option>";
					} ?>
				</select>
			</p>
			<p>
				Visible : 
				<input type = "radio" name = "visible" value = "0"/> No 
				&nbsp;
				<input type = "radio" name = "visible" value = "1"/> Yes
			</p>
			<input type = "submit" name = "submit" value = "Create Subject"/>
		</form>
		<br/>
		<a href = "manage_content.php">Cancel</a><br/>
  </div>
</div>

<?php include("../includes/layouts/footer.php") ?>
<?php require_once("../includes/db_connection_close.php") ?>
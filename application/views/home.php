<table class='post'>
	<tr>
		<td class='top_post'>
			<h2>What's new, <?php echo $username; ?> ?</h2>
		</td>
	</tr>
	<tr >
		<td class='bottom_post'>
			<form method="post" action="post/addPost">
				<textarea name="content" id="content"></textarea><br />
				<input class ="button" type="submit" value="Post" />
			</form>	
		</td>
	</tr>
</table>
<br />
<?php foreach($allPosts as $numPost => $post) { ?>
	<table class='post'>
		<tr>
			<td class='top_post'>
				<?php echo $post->USERNAMEPOST . " said: "; ?>
			</td>
		</tr>
		<tr >
			<td class='bottom_post'>
				<?php  echo $post->CONTENT; ?>
			</td>
		</tr>
	</table>
	<br />
<?php } ?>
<hr>
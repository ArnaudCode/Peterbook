<h1>Welcome <?php echo $username; ?></h1>
<form method="post" action="addPost">
	<p>
		<label for="content">What's new?</label><br />
		<textarea name="content" id="content"></textarea><br />
		<input class ="button" type="submit" value="Post" />
	</p>
</form>
<hr>
<p>All posts from <span id="peterbookTitle">Peterbook</span>:</p>
<p>-</p>
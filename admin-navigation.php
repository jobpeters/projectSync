<div id="navigatie admin-navigatie">
	<ul>
		<li onclick="location.href = 'index.php?page=kosten'">kosten</li>
		<li onclick="location.href = 'index.php?page=projecten'">projecten</li>
		<li onclick="location.href = 'index.php?page=consultants'">consultants</li>
		<li id="ja"onclick="this.childNodes[1].style.display = 'block';">Overzicht
			<ul id="options" style="display:none;">
				<li onclick="location.href = 'index.php?page=overzicht'; this.parentNode.style.display = 'none';">per consultant per project</li>
				<li onclick="location.href = 'index.php?page=overzicht'; this.parentNode.style.display = 'none';">per project per consultant </li>
			</ul>
		</li>
		<li onclick="confirm_logout()">Loguit</li>
	</ul>
</div>

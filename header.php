<header>
		<div id="logo_principal">
				<img src="logos/logo_gbaf.png" alt="Logo GBAF">
		</div>
		<?php
		if (!isset($_SESSION))
		{
				session_start();
		}
		if (isset($_SESSION['id_utilisateur']))
		{
		?>
				<div class="bonjour_utilisateur">
				<?php
				include("session.php");
				?>
				</div>
		<?php
		}
		?>
</header>

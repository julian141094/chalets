<!-- Main -->
				<div class="wrapper">
					<div class="container" id="main">

						<!-- Content -->
							<?php

							if ($rows!=0) {
							   
							foreach ($rows as $key) {
							?>
							<article id="content">
								<header>
									<h2> <?= $key->titulo?> </h2>
									<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit
									dolor neque semper.</p>
								</header>
								<a href="#" class="image featured"><img src="<?=base_url('uploads/blog/'.$key->codigo.'/'.$key->image)?>" alt="" /></a>
								<p><?= $key->descripcion ?></p>
								<hr>
							</article>

								<?php }
							} ?>

						<div class="row features">
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper first">
									<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								</div>
								<header>
									<h3>Dolor sit consequat magna</h3>
								</header>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
								<ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul>
							</section>
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
								</div>
								<header>
									<h3>Dolor sit consequat magna</h3>
								</header>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
								<ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul>
							</section>
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
								</div>
								<header>
									<h3>Dolor sit consequat magna</h3>
								</header>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
								<ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul>
							</section>
						</div>
					</div>
				</div>
 
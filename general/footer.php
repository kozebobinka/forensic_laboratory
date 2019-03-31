		<footer>
			<div class="container">
				<div class="d-flex justify-content-center">
					<div class="footer-brand"></div>
				</div>
				<div class="row justify-content-center px-3 px-md-0">
					<div class="col-12 col-md-5">
						<? foreach ($footers1 as $footer) : ?>
						<p><?=typo($footer['text'])?></p>
						<? endforeach ?>
					</div>
					<div class="col-12 col-md-6 col-xl-5">
						<? foreach ($footers2 as $footer) : ?>
						<p><?=typo($footer['text'])?></p>
						<? endforeach ?>
					</div>
					<div class="text-center">
						<p class="copyrights"><?=$copyrights?></p>
					</div>
				</div>
			</div>
		</footer>
		<div class="to-top"></div>
		
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="<?=$url?>assets/js/peritus.js"></script>	
	</body>
</html>		
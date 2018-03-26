<div class="intro">
	<div class="container">
		<div class="pull-left">
			<a href="javascript:void(0)" class="top-phone"><span class="fa fa-phone"></span> {{ $contact->number_phone }}</a>
			<a href="mailto:sinhhocthayken@gmail.com" class="top-mail"><span class="fa fa-envelope-o"></span> {{ $contact->email }}</a>
		</div>
		<div class="pull-right">
			<ul class="socials">
				<li class="facebook" title="Facebook">
					<a href="{{ $contact->link_fanpage }}" target="_blank"><span class="fa fa-facebook"></span></a>
				</li>
				<li class="youtube" title="Youtube">
					<a href="{{ isset($contact->link_youtube) ? $contact->link_youtube : null }}" target="_blank"><span class="fa fa-youtube"></span></a>
				</li>
				<li class="google-plus" title="Google+">
					<a href="{{ isset($contact->link_google) ? $contact->link_google : 'javascript:void(0)' }}"><span class="fa fa-google-plus"></span></a>
				</li>
			</ul>
		</div>
	</div>
</div> 
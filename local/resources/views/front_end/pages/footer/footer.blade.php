<footer class="footer-site-up">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4><span class="fa fa-address-book"></span> THÔNG TIN LIÊN HỆ</h4>
					<div class="line-footer"></div>

					<p>Họ và tên: {{ $contact->name }}</p>
					<p>Địa chỉ: {{ $contact->address }}</p>
					<p>Email: {{ $contact->email }}</p>
					<p>Webiste: <a href="{{ $contact->webiste }}" id="author" target="_blank"> {{ $contact->website }}</a></p>
					<p>Hotline: {{ $contact->number_phone }}</p>

				</div>
				<div class="col-md-3">
					<h4><span class="fa fa-taxi"></span> BẢN ĐỒ CHỈ DẪN</h4>
					<div class="line-footer"></div>

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.3314169217124!2d107.59172401531922!3d16.458747933251804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a13f6391a5c3%3A0x42c7c757f39ff4cc!2zMSwgODMgTmd1eeG7hW4gSHXhu4csIFBow7ogTmh14bqtbiwgVGjDoG5oIHBo4buRIEh14bq_LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1520604592921" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>

				</div>
				<div class="col-md-3">
					<h4><span class="fa fa-phone"></span> TƯ VẤN TRÊN SKYPE</h4>
					<div class="line-footer"></div>
					<a href="Skype:vannhat:Chat" id="skype"><span class="fa fa-skype"></span> Mr. Nhật - {{ $contact->number_phone }}</a>
				</div>
				<div class="col-md-3">
					<h4><span class="fa fa-cubes"></span> SINH HỌC THẦY KEN TRÊN MẠNG XÃ HỘI</h4>
					<div class="line-footer"></div>

					<ul class="socials">
						<li class="facebook" title="Facebook">
							<a href="{{ $contact->link_fanpage }}" target="_blank"><span class="fa fa-facebook fa-3x"></span></a>
						</li>
						<li class="youtube" title="Youtube">
							<a href="{{  isset($contact->link_youtube) ? $contact->link_youtube : 'javascript:void(0)' }}" target="_blank"><span class="fa fa-youtube fa-3x"></span></a>
						</li>
						<li class="google-plus" title="Google+">
							<a href="{{  isset($contact->link_google) ? $contact->link_google : 'javascript:void(0)' }}" target="_blank"><span class="fa fa-google-plus fa-3x"></span></a>
						</li>
					</ul>

				</div>
			</div>
		</div>
	</footer>
	<footer class="footer-site-down">
		<div class="container">
			<div class="row">
				<div class="lap1 col-md-4">
					<ul class="socials">
						<li class="facebook" title="Facebook">
							<a href="{{ $contact->link_fanpage }}" target="_blank"><span class="fa fa-facebook"></span></a>
						</li>
						<li class="youtube" title="Youtube">
							<a href="{{  isset($contact->link_youtube) ? $contact->link_youtube : 'javascript:void(0)' }}" target="_blank"><span class="fa fa-youtube"></span></a>
						</li>
						<li class="google-plus" title="Google+">
							<a href="{{  isset($contact->link_google) ? $contact->link_google : 'javascript:void(0)' }}" target="_blank"><span class="fa fa-google-plus"></span></a>
						</li>
					</ul>
				</div>
				<div class="col-md-4">
					<p style="text-align: center;">&copy; Copy right 2018 by Học Sinh Thầy Ken.</p>
				</div>
				<div class="col-md-4">
					<p id="author-footer-down">Design by: <a href="https://www.facebook.com/tuan.rent" id="author" target="_blank"> Nguyễn Minh Tuấn</a></p>
				</div>
			</div>
		</div>
	</footer>
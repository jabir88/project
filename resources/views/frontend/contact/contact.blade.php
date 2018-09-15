@extends('frontend.master')

@section('title')
Contact
@endsection
@section('myContent')
<!-- banner-2 -->
@include('frontend.inc.banner_2.banner_2')
	<!-- //banner-2 -->
	<!-- page -->
	@include('frontend.inc.bread.bread')

	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Contact Us
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						@if (session('status'))
						    <div class="alert alert-success">
						        {{ session('status') }}
						    </div>
						@endif
						@if (session('failed'))
						    <div class="alert alert-danger">
						        {{ session('failed') }}
						    </div>
						@endif
						<form action="{{ route('contact_submit') }}" method="post">
							@csrf
							<div class="">
								<input type="text" name="name" placeholder="Name" value="{{old('name')}}">
								@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
												<strong style="color:red">{{ $errors->first('name') }}</strong>
										</span>
								@endif
							</div>

							<div class="">
								<input class="text" type="text" name="subject" placeholder="Subject" value="{{old('subject')}}">
								@if ($errors->has('subject'))
										<span class="invalid-feedback" role="alert">
												<strong style="color:red">{{ $errors->first('subject') }}</strong>
										</span>
								@endif
							</div>

							<div class="">
								<input class="email" type="text" name="email" placeholder="Email" value="{{old('email')}}">
								@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
												<strong style="color:red">{{ $errors->first('email') }}</strong>
										</span>
								@endif
							</div>
							<div class="">
								<textarea placeholder="Message" name="message" >{{old('message')}}</textarea>
								@if ($errors->has('message'))
										<span class="invalid-feedback" role="alert">
												<strong style="color:red">{{ $errors->first('message') }}</strong>
										</span>
								@endif
							</div>
							<input type="submit" value="Submit">
						</form>
					</div>
					<div class="contact-right wthree">

						<div class="col-xs-7 contact-text w3-agileits">
							<h4>GET IN TOUCH :</h4>
							<p>
								<i class="fa fa-map-marker"></i> 123 Sebastian, NY 10002, USA.</p>
							<p>
								<i class="fa fa-phone"></i> Telephone : 333 222 3333</p>
							<p>
								<i class="fa fa-fax"></i> FAX : +1 888 888 4444</p>
							<p>
								<i class="fa fa-envelope-o"></i> Email :
								<a href="mailto:example@mail.com">mail@example.com</a>
							</p>
						</div>
						<div class="col-xs-5 contact-agile">
							<img src="images/contact2.jpg" alt="">
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>

	<div class="map w3layouts">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55565170.29301636!2d-132.08532758867793!3d31.786060306224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1512365940398" allowfullscreen=""></iframe>
	</div>
@endsection

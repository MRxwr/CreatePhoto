<!-- header -->
<div class="headerClass">
            <div class="row m-0 w-100" style="height: 50px;">
                <div class="col-2 d-flex align-items-center justify-content-center">
                <?php 
                $enable_multilanguage = get_config('enable_multilanguage');
                if($enable_multilanguage==1){ ?>
                 <ul>
                   <li><a class="dropdown-item ar SegoeUIL" id="lang_ar" href="{{URL::current()}}?lang=ar">@lang('theme::app.arabic')</a></li>
                    <li><a class="dropdown-item en SegoeUIL" id="lang_en" href="{{URL::current()}}?lang=en">@lang('theme::app.english')</a></li> 
                </ul>
                <?php } ?>
                </div>
                <div class="col-10 d-flex align-items-center justify-content-center">
                   {{ get_config('title') }}
                </div>
            </div>
        </div>	<!-- end of header -->

	<!-- mobile hero section -->
	<div class="row m-0 w-100">
        <div class="col-12 p-0 d-block d-md-none">
            <div class="heroBg">
                <div class="heroLogoBg">
                <img src="{{ upload_url(get_config('logo')) }}" class="heroLogo">
                </div>
            </div>
        </div>
    </div>	<!-- end of mobile hero section -->

	<!-- social Media Bar -->
	<div class="row py-3 m-0">
	<div class="col-md-12 d-flex justify-content-center align-items-center">
		<div class="row p-3 socialMediaBar">
					<div class="col-2 d-flex align-items-center justify-content-center socialIconDiv">
				<span class="socialMediaSpan"><i class="fa fa-facebook" aria-hidden="true"></i></span>
			</div>
						<div class="col-2 d-flex align-items-center justify-content-center socialIconDiv">
				<span class="socialMediaSpan"><i class="fa fa-instagram" aria-hidden="true"></i></span>
			</div>
						<div class="col-2 d-flex align-items-center justify-content-center socialIconDiv">
				<span class="socialMediaSpan"><i class="fa fa-snapchat" aria-hidden="true"></i></span>
			</div>
						<div class="col-2 d-flex align-items-center justify-content-center socialIconDiv">
				<span class="socialMediaSpan"><i class="fa fa-twitter" aria-hidden="true"></i></span>
			</div>
						<div class="col-2 d-flex align-items-center justify-content-center socialIconDiv">
				<span class="socialMediaSpan"><i class="fa fa-globe" aria-hidden="true"></i></span>
			</div>
						<div class="col-2 d-flex align-items-center justify-content-center socialIconDiv">
				<span class="socialMediaSpan"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
			</div>
					</div>
	</div>
</div>	<!-- end of social media bar -->
	
<x-header />

<div id="wrap" >
  <section class="bodymain" style="min-height:580px;">
    <aside class="middle-container">
      <div class="admin-inr"><br>
		<form action="{{url('/')}}/changed-password" method="post">
			@csrf
			<div class="form-outer" style="margin-left:320px; width:500px;">
		          <h1>Change Password</h1>
		          <div class="contact-row">
		            <div class="name">Current Password</div>
		            <div class="txtfld-box">
						@if (session()->has('status'))
							<input type="text" value="{{session()->get('password')}}" name="old_pass">
						@else
							<input type="text" value="">
						@endif

		            </div>
		            <div class="req-field"> This Field Required </div>
		          </div>
		          <div class="clear"></div>
		          <div class="contact-row">
		            <div class="name">New Password</div>
		            <div class="txtfld-box">
						<span style="color:red">
							<input type="password" name="password">
							@error('password')
								{{$message}}
							@enderror
						</span>
		            </div>
		          </div>
		          <div class="clear"></div>
		          <div class="contact-row">
		            <div class="name">Confirm Password</div>
		            <div class="txtfld-box">
		              <input type="password" name="password_confirmation">
					  <span style="color:red">
						@error('password_confirmation')
							{{$message}}
						@enderror
					</span>
					</div>
		          </div>
		          <div class="clear">&nbsp;</div>
		          <div class="contact-row">
		            <div class="name" style="float:right; width:1px;">&nbsp;</div>
		            <div style="background:none; border:none; float:left;">
		              <input type="submit" class="btn" value="Change Password" name="submit">
		              <br>
		            </div>
		          </div>
		        </div>
		        <div class="clear">&nbsp;</div>

        <div class="clear"></div>
		{{-- <pre>
			{{print_r(session()->get('password'))}}
			{{print_r(session()->get('email'))}}
		</pre> --}}
      </div>
	</form>

    </aside>
    <div class="clear"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </section>
</div>
<div class="clear"></div>

<x-footer />
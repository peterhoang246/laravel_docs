@extends('frontend.layout.layout')
@section('generalDoc', view('frontend.layout.generalDoc'))
@section('content')
<div class="col-md-12">
@if (isset($message))
	{!! $message !!}
	<?php header('Refresh: 5;url='.URL('/')); ?>
@else
   	<h2 class="page_titel">Đăng ký tài khoản</h2>

	<div class="panel panel-default">
		<form action="{{ route('postRegister') }}" method="post" name="frmTransaction" id="frmTransaction">
	    	<div class="panel-body">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	            <div class="form-group">
	                <label class="control-label" for="ctrlhotentxt">Họ tên<span class="asterisk_input"></span></label>
	                <input type="text" id="ctrlhotentxt"  name="ctrlhotentxt" value="{{ old('ctrlhotentxt') }}" class="form-control" placeholder="Họ tên" maxlength="50" tabindex="1">
	            	{!! $errors->first('ctrlhotentxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlemailtxt">Địa chỉ email<span class="asterisk_input"></span></label>
	                <input type="email" id="ctrlemailtxt" name="ctrlemailtxt" class="form-control" placeholder="Địa chỉ email" value="{{ old('ctrlemailtxt') }}" autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3">
	            	{!! $errors->first('ctrlemailtxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlphonetxt">Số điện thoại<span class="asterisk_input"></span></label>
	                <input type="text" id="ctrlphonetxt" name="ctrlphonetxt" value="{{ old('ctrlphonetxt') }}" class="form-control" placeholder="Số điện thoại" maxlength="12" tabindex="2">
	            	{!! $errors->first('ctrlphonetxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlpasstxt">Mật khẩu<span class="asterisk_input"></span></label>
	                <input type="password" id="ctrlpasstxt" name="ctrlpasstxt" class="form-control" placeholder="Mật khẩu" autocomplete="off" tabindex="4">
	            	{!! $errors->first('ctrlpasstxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlrepasstxt">Nhập lại mật khẩu<span class="asterisk_input"></span></label>
	                <input type="password" id="ctrlrepasstxt" name="ctrlrepasstxt" class="form-control" placeholder="Mật khẩu" autocomplete="off" tabindex="5">
	            	{!! $errors->first('ctrlrepasstxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlbirthday">Ngày sinh</label>
	                <input type="date" id="ctrlbirthday" name="ctrlbirthday" class="form-control" value="{{ old('ctrlbirthday') }}" placeholder="Ngày sinh" autocomplete="off" tabindex="5">
	            </div>
				<div class="form-group">
	                <label class="control-label">Giới tính</label>
	                <input type="radio" id="ctrlgender" name="ctrlgender" class="form-control" value="1" checked="" autocomplete="off" tabindex="5">Nam&nbsp
	                <input type="radio" id="ctrlgender" name="ctrlgender" class="form-control" value="0" autocomplete="off" tabindex="5">Nữ
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrladdress">Địa chỉ</label>
	                <input type="text" id="ctrladdress" name="ctrladdress" class="form-control" placeholder="Địa chỉ" value="{{ old('ctrladdress') }}" autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3">
	            </div>
	    	</div>
		    <div class="form-inline">
		        <div class="form-group">
		            <div class="col-sm-12">
		                <label class="control-label" for="ValidateCode">Nhập mã kiểm tra<span class="asterisk_input"></span></label>
		                <input maxlength="40" class="form-control" autocomplete="off" data-val="true" placeholder="Nhập mã kiểm tra" data-val-required="Vui lòng điền mã xác nhận" id="ValidateCode" name="captcha" type="text" value="" tabindex="6">
		            	{!! $errors->first('captcha') !!}
		            </div>
		        </div>
		        <div class="form-group">
		            <label class="control-label" for="ValidateCode">&nbsp;</label>
		           	<p id="codeImg"><?php echo Captcha::img(); ?></p>
		            <p id="GetNewCode" style="cursor:pointer">Đổi ảnh</p>
		        </div>        
		    </div>	
		    <div class="form-group">        
		        
		        
		    </div>
		    <br />
		    <div class="form-group">        
		        <div class="col-sm-12">Bằng cách nhấn vào "Đăng ký tài khoản", bạn đồng ý với <a href="#" target="_blank">Điều khoản & Điều kiện</a> của chúng tôi và rằng bạn đã đọc <a href="#" target="_blank">chính sách bảo mật</a></div>
		        <div class="clearfix"></div>
		    </div>

		    <div class="panel-footer">
		        <button type="submit" class="btn btn-primary" id="ctrregisterbtn" data-dismiss="modal" tabindex="7"><i class="fa fa-sign-in"></i> Đăng ký tài khoản</button>        
		        <div class="clearfix"></div>
		    </div>
        </form>
	</div>
@endif
</div>
<script>
	$('#GetNewCode').on('click', function(){
        $.ajax({
            url: "{{URL('/')}}/reInitCaptcha",
            method: "GET",
            success: function(data){
                if (data.img != ''){
                    $('#codeImg').html(data.img);
                }
            },
            dataType: "json"
        });
    });
</script>
@endsection
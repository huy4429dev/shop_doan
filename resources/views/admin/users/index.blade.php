@foreach($us as $users)
<p>avatar</p>
<input type="file" class="form-control"  placeholder="Enter avatar">
<p>tài khoản</p>
<input type="text" class="form-control" value="{{$us->tai_khoan}}"  placeholder="Enter avatar">
<p>mật khẩu</p>
<input type="password" class="form-control"  placeholder="Enter avatar">
<p>số điện thoại</p>
<input type="text" class="form-control"  placeholder="Enter avatar">
<p>mô tả</p>
<input type="text" class="form-control"  placeholder="Enter avatar">
<p>role</p>
<input type="text" class="form-control"  placeholder="Enter avatar">
@endforeach
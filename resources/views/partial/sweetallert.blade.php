@if (session()->has('berhasil_input'))
<?php toast('Record Successfully.','success')->autoClose(1000); ?>

@elseif(session()->has('gagal_input'))
<?php toast('Failed data Entry.', 'error')->autoClose(1000); ?>

@elseif(session()->has('gagal_validasi'))
<?php toast('Wrong Data Entry.','error')->autoClose(1000); ?>

@elseif(session()->has('Berhasil_edit'))
<?php toast('Changes Successfully', 'success')->autoClose(1000); ?>

@elseif(session()->has('gagal_Login'))
<?php toast('Account Not Found!', 'error')->autoClose(1000); ?>

@endif

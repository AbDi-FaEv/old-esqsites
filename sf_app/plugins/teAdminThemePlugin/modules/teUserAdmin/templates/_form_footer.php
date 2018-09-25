<script>
  $().ready(function(){
    $("#sf_guard_user_password").after('<br /><input type="checkbox" id="show_password" /><label style="float:none;" for="show_password">Show Password</label><div style="display:none" id="password_strength">potentially hackable in: <span id="feedback"></span></div>');
    $('#sf_guard_user_password,#sf_guard_user_password_again').showPassword('#show_password');
    $('#sf_guard_user_password').keyup(function(){
      $('#sf_guard_user_password').val() == '' ? $("#password_strength").hide() : $("#password_strength").show();
    }).pwdstr('#password_strength #feedback');
    if($(".sf_admin_form_field_sf_guard_user_group_list .checkbox_list option").length() == 0)
    {
      $('.sf_admin_form_field_sf_guard_user_group_list').hide();
    }
  });
</script>
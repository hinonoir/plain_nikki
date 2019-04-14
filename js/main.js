// コピー&ペーストボタン
function copy_paste(){
  var username = document.getElementById("copy_username").value;
  var password = document.getElementById("copy_password").value;
  document.getElementById("name1").value = username;
  document.getElementById("pass1").value = password;
}

// ダブルクリック防止（アラート）
var set=0;
function double_click_alert() {
  if(set==0){
    set=1;
  }else{
  alert("ただ今処理中です。\nそのままお待ちください。");
  return false;
  }
}

// ダブルクリック防止（ボタン停止）
function double_click_button(form) {
  var elements = form.elements;
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].type == 'submit') {
      elements[i].disabled = true;
    }
  }
}

// アカウント削除の確認ダイアログ
function check_account_delete() {
  if (window.confirm('本当に削除しますか？')) {
    return true;
  } else {
    return false;
  }
}

// 日記削除の確認ダイアログ
function check_diary_delete() {
  if (window.confirm('本当に削除しますか？')) {
    return true;
  } else {
    return false;
  }
}

// パスワードの文字数制限
function pass_limit(input){
  var pass = input.value;
  // 16文字を越えたらエラーを表示する。
  if(pass.length > 16){
    input.setCustomValidity("パスワードは16文字以内にして下さい。");
  }else if(8 > pass.length){
    input.setCustomValidity("パスワードは8文字以上にして下さい。");
  }else{
    input.setCustomValidity("");
  }
}

// ユーザー名の文字数制限
function name_limit(input){
  var name = input.value;
  // 20文字を越えたらエラーを表示する。
  if(name.length > 20){
    input.setCustomValidity("ユーザー名は20文字以内にして下さい。");
  }else{
    input.setCustomValidity("");
  }
}

// パスワード（再確認）:パスワード変更
function check_password_change(){
  // 入力値取得
  var input1 = new_password.value;
  var input2 = confirm_password1.value;
  // パスワード比較
  if(input1 != input2){
    confirm_password1.setCustomValidity("入力値が一致しません。");
  }else{
    confirm_password1.setCustomValidity('');
  }
}

// パスワード（再確認）：アカウント削除
function check_password_delete(){
  // 入力値取得
  var input1 = password_delete.value;
  var input2 = confirm_password2.value;
  // パスワード比較
  if(input1 != input2){
    confirm_password2.setCustomValidity("入力値が一致しません。");
  }else{
    confirm_password2.setCustomValidity('');
  }
}

// 編集ページの日記削除
function submit_delete(url){
  // 確認のダイアログ
  if(window.confirm('本当に削除しますか？')){
    $('#diary_form').attr('action',url);
    $('#diary_form').submit();
  }else{
    return false;
  }
}

// パスワード表示・非表示
// ログインフォーム
$('#pass1-visi').change(function(){
  if ( $(this).prop('checked') ) {
    $('#pass1').attr('type','text');
  } else {
    $('#pass1').attr('type','password');
  }
});

// 登録フォーム
$('#pass2-visi').change(function(){
  if ( $(this).prop('checked') ) {
    $('#pass2').attr('type','text');
  } else {
    $('#pass2').attr('type','password');
  }
});

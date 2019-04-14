<!-- ユーザー名変更 -->
<div class="modal fade" id="username_change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ユーザー名変更</h5>
      </div><!-- /.modal-header -->
      <div class="modal-body">
      
        <form method="post" action="function_php/username_change.php">
          <!-- トークン認証 -->
          <input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">

          <label for="name" class="m-0">新しいユーザー名</label>
          <input type="text" class="form-control mb-3" id="name" name="new_username" required placeholder="20文字以内" onInput="name_limit(this)">

          <label for="password" class="m-0">パスワード</label>
          <input type="password" class="form-control mb-3" id="password" name="password" required placeholder="パスワード" onInput="pass_limit(this)">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">変更する</button>
        </form>
      </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal fade -->
<!-- /ユーザー名変更 -->

<!-- パスワード変更 -->
<div class="modal fade" id="password_change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">パスワード変更</h5>
      </div><!-- /.modal-header -->
      <div class="modal-body">
      
        <form method="post" action="function_php/password_change.php">
        <!-- トークン認証 -->
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">

        <label for="current_password" class="m-0">現在のパスワード</label>
        <input type="password" class="form-control mb-3" id="current_password" name="current_password" required placeholder="現在のパスワード" onInput="pass_limit(this)">

        <label for="new_password" class="m-0">新しいパスワード
          <span style="font-size:13px;">（大文字、小文字、-のみ）</span>
        </label>
        <input type="password" class="form-control mb-3" id="new_password" name="new_password" required placeholder=" 半角英数字（8~16文字以内）" onInput="pass_limit(this)">

        <label for="confirm_password1" class="m-0">新しいパスワード（再確認）</label>
        <input type="password" class="form-control mb-3" id="confirm_password1" name="confirm_password1" required placeholder="新しいパスワード（再確認）"  onInput="return check_password_change();">
        
        <div class="form-group">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">変更する</button>
        </div>
      
        </form>
      </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal fade -->
<!-- /パスワード変更 -->

<!-- アカウント削除 -->
<div class="modal fade" id="account_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">アカウント削除</h5>
      </div><!-- /.modal-header -->
      <div class="modal-body">

        <form method="post" action="function_php/account_delete.php" onSubmit="return check_account_delete()">
          <!-- トークン認証 -->
          <input type="hidden" name="csrf_token" value="<?php echo $csrf_token?>">

          <label for="password_delete" class="m-0">パスワード
            <span style="font-size:13px;">（大文字、小文字、-のみ）</span>
          </label>
          <input type="password" class="form-control mb-3" id="password_delete" name="password_delete" required placeholder="パスワード" onInput="pass_limit(this)">

          <label for="confirm_password2" class="m-0">パスワード（再確認）</label>
          <input type="password" class="form-control mb-3" id="confirm_password2" name="confirm_password2" required placeholder="パスワード（再確認）" onInput="return check_password_delete()">
        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary" >削除する</button>
        </form>
      </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal fade -->
<!-- /アカウント削除 -->

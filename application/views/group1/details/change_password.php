
<div class="container">

    <div class="panel panel-success">
        <div class="panel-heading">
            Enter Password
        </div>
        <div class="panel-body">
            <form action="change_password" method="post" onsubmit="return checkPassword(this);">
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <input type="hidden" name="doit" value="1">
                <div class="form-group">
                    <label for="enter_password">Enter Password:</label>
                    <input type="password" class="form-control" name="passwd" id="enter_password" pattern=".{6,}"   required title="6 characters minimum">
                    <label for="verify_password">Verify Password:</label>
                    <input type="password" class="form-control" name="verify_passwd" id="verify_password" pattern=".{6,}"   required title="6 characters minimum">
                </div>       
                <input type="submit" class="btn btn-success" value="Change Password">         
            </form>
        </div>
    </div>

</div>
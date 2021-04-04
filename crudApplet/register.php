<h1>Register New User</h1>
<form method='post' action='register_new_user.php'>
<table class='table table-hover table-responsive table-bordered'>
<tr>
    <td>Role</td>
		<td> <!--<input type='text' name='role' class='form-control' />-->
		<select name = 'role'>

		<option value = 'admin'disabled>Admin</option>
		<option value = 'user' selected>User</option>
				</select>
				</td>
				</tr>
		<tr><td>First</td><td><input type='text' name='fname' class='form-control' /></td></tr>
		<tr><td>Last</td><td><input type='text' name='lname' class='form-control' /></td></tr>
        <tr><td>Email</td><td><input type='text' name='email' class='form-control' /></td></tr>
		<tr><td>Phone</td><td><input type='text' name='phone' class='form-control' /></td></tr>
		<tr><td>Password</td><td><input type='password' name='password' class='form-control' /></td></tr>
		<!--<tr><td>Password_hash</td><td><input type='text' name='password_hash' class='form-control' /></td></tr>
		<tr><td>Password_salt</td><td><input type='text' name='password_salt' class='form-control' /></td></tr>
		-->
		<tr><td>Address</td><td><input type='text' name='address' class='form-control' /></td></tr>
		<tr><td>Address2</td><td><input type='text' name='address2' class='form-control' /></td></tr>
		<tr><td>City</td><td><input type='text' name='city' class='form-control' /></td></tr>
		<tr><td>State</td><td><input type='text' name='state' class='form-control' /></td></tr>
		<tr><td>Zip Code</td><td><input type='text' name='zip_code' class='form-control' /></td></tr>
		

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
  
    </table>
</form>
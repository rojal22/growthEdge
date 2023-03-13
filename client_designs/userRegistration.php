<!DOCTYPE html>
<html>
<head>

<div class="container">
  <h1>User Registration</h1>
  
</div>
</head>
<form name="registration" class="registartion-form" >
<body>
    <table>
        <tr>
            <td><label for="fname"> First Name:</label></td>
            <td><input type="text" name="fname" id="fname" placeholder="Your first name"></td>
        </tr>
        <tr>
            <td><label for="mname"> Middle Name:</label></td>
            <td><input type="text" name="mname" id="mname" placeholder="Your middle name"></td>
        </tr>
         <tr>
            <td><label for="lname"> Last Name:</label></td>
            <td><input type="text" name="lname" id="lname" placeholder="Your last name"></td>
        </tr>
	    <tr>
            <td><label for="gender">Gender:</label></td>
            <td>Male: <input type="radio" name="gender" value="male">
             Female: <input type="radio" name="gender" value="female">
            Other: <input type="radio" name="gender" value="other"></td>
        </tr>
	    <tr>
            <td><label for="dob"> Date of Birth:</label></td>
            <td><input type="text" name="dob" id="dob" placeholder="DOB"></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="text" name="email" id="email" placeholder="Your email"></td>
        </tr>
 	    <tr>
            <td><label for="phoneNumber">Phone Number:</label></td>
            <td><input type="text" name="phoneNumber" id="phoneNumber" placeholder="Your Phone number"></td>
        </tr>      
        <tr>
            <td><label for="add"> Address:</label></td>
            <td><input type="text" name="add" id="add" placeholder="Your Address"></td>
        </tr>
        <tr>
            <td><label for="country">Country:</label></td>
            <td><input type="text" name="country" id="country" placeholder="Your Country"></td>
        </tr>    
	    <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="password" id="password" placeholder="Your Password"></td>
        </tr> 
        <tr><td>
        <label for="security question">Security Question:</label>

	        <select name="seq" id="seq">
 	 	        <option value="Car">Which is your favourite car?</option>
 	 	        <option value="Hero">Who is your favourite hero?</option>
  		        <option value="Birth Place">Where is your Birth Place?</option>
  		        <option value="Mother name">What is your Mother's Middle name?</option>
	        </select>
            </td>
        </tr>    
        <tr>
            <td><label for="sqa">Answer:</label></td>
            <td><textarea name="sqa" id="sqa" placeholder="Type your answer"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="submit" value="Register" /></td>
        </tr>
    </table>
    <p>Already Registred? Click here to <a href="signin.php">sign in</a><p>

  </form>
</body>
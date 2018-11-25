<?php /* Template Name: OW Fake User */ ?>
<!-- Created By https://www.onwebsite.ir/ -->
<title>OW Fake User Generator</title>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

<br>
<div class="container">
    <div class="row text-white bg-secondary">

        <div class="col-md-9">

            <h2 class="text-info">
                <a href="https://www.onwebsite.ir/" target="_blank">OnWebSite</a> Generate Fake Users System!
            </h2>

            <div class="clear-fix"></div>

            <form action="" method="post">


                <div class="form-group">
                    <label for="username">Username List:</label>
                    <textarea name="username" id="username" cols="30" rows="10" class="form-control"></textarea>
                    <p class="text-warning">
                        in each line 1 user
                    </p>
                    <p class="text-warning">
                        <a href="https://jimpix.co.uk/words/random-username-list.asp" target="_blank">Get username List</a>
                    </p>
                </div>

                <button type="submit" class="btn btn-success" name="submit">Generate</button>


            </form>

        </div>

        <div class="col-md-3">

        </div>

    </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<?php

if ( isset( $_POST['submit'] ) ) {
	$username  = $_POST['username'];
	$username  = nl2br( $username );
	$username  = str_replace( '<br />', ',', $username );
	$username  = explode( ',', $username );
	$c         = count( $username );
	$usersData = array();
	for ( $i = 0; $i < $c; $i ++ ) {
		$password    = randomPassword();
		$email       = emailGenerate( $username[ $i ] );
		$usersData[] = array(
			'username' => $username[ $i ],
			'password' => $password,
			'email'    => $email
		);
	}
	
	
	foreach($usersData as $user){
		
		@wp_create_user( $user['username'], $user['password'], $user['email'] );
		
	}


	echo 'success!';
	
}


// Email Generator
function emailGenerate( $username ) {
	return rand( 0, 9999 ) . '_ow_' . $username . '@gmail.com';
}

// Password Generator
function randomPassword() {
	$alphabet    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+';
	$pass        = array(); //remember to declare $pass as an array
	$alphaLength = strlen( $alphabet ) - 1; //put the length -1 in cache
	for ( $i = 0; $i < 13; $i ++ ) {
		$n      = rand( 0, $alphaLength );
		$pass[] = $alphabet[ $n ];
	}

	return implode( $pass );
}

?>

<!-- Created By https://www.onwebsite.ir/ -->

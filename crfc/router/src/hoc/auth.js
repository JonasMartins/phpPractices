import React from 'react';

const Auth = (props) => {
	const pass = 'password';
	if(pass != 'password'){
		return <h3>You are not authorized</h3>
	}else{
		return props.children // this children is the card div from profile	
	}
} 

export default Auth;
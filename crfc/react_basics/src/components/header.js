import React from 'react';

const user = {
	name:'Francis',
	lastname:'Jones',
	age:16
}

const getYear = () => {
	const newDate = new Date();
	return newDate.getFullYear();	
}

const Header = () => {
	// return <div>
	// <h1>The date is</h1>{
	// 	getYear()	
	// }
	// </div>

	return (
		<div>
			<div>{user.name}</div>
			<div>{user.lastname}</div>
			<div>{user.age}</div>
			
		</div>
		)


}

// the name of component to share with another components
export default Header;
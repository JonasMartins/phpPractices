import React from 'react';
import UserHoc from  '../hoc/userHoc';

const User = () => {
	return (
		<div>
			Home
		</div>
		)
}
 
export default  UserHoc(User,'Hello');
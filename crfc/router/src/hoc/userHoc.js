import React from 'react';

const UserHoc = (WrappedComponent, arg1) => {
	return (props) => (
			<div>

				{arg1}
				<WrappedComponent />
				
			</div>
		)
}

export default UserHoc;